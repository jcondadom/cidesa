<?php

/**
 * radarventas actions.
 *
 * @package    siga
 * @subpackage radarventas
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class radarventasActions extends autoradarventasActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {


  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $this->ajax = $ajax;

	$cc = new Criteria();
	$cc->add(RutaclientePeer::STATUS,true);
	$cc->add(RutaclientePeer::RUTA_ID,$codigo);
	$cc->add(CuentaxcobrarClientesPeer::CUENTAXCOBRAR,0);

	$cc->addJoin(FaclientePeer::ID,RutaclientePeer::FACLIENTE_ID);
	$cc->addJoin(CuentaxcobrarClientesPeer::CODCLIENTE,FaclientePeer::CODPRO);
	$faclientes = FaclientePeer::doSelect($cc);

	$ccv = new Criteria();
	$cc->add(RutavendedoresPeer::STATUS,true);
	$ccv->add(RutavendedoresPeer::RUTA_ID,$codigo);
	$ccv->addJoin(VendedoresPeer::ID,RutavendedoresPeer::VENDEDORES_ID);
	$vendedores = VendedoresPeer::doSelect($ccv);
    switch ($ajax){
      case '1':

        $output = '[["","",""],["","",""],["","",""]]';
        $this->radarventas = $faclientes;
        $this->radarventas1 = $vendedores;
        break;
	case '2':
		        $dato=TstipmovPeer::getDestip($codigo);
		        $output = '[["fafactur_destip","'.$dato.'",""]]';
		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		        return sfView::HEADER_ONLY;
             break;
      default:
        $output = "";//'[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    //$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

  }


  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
	if ($clasemodelo->getId()=="")
	{
		$radarventas= new Radarventas();
		$radarventas->setRutaId($clasemodelo->getRutaId());
		$radarventas->setFaclienteId($clasemodelo->getFaclienteId());
		$radarventas->setVendedoresId($clasemodelo->getVendedoresId());
		$radarventas->setFecha($clasemodelo->getFecha());
		$radarventas->setStatus($clasemodelo->getStatus());
		$radarventas->setFafacturId($clasemodelo->getFafacturId());
		$radarventas->save();
		$arreglo_articulos = $_POST['grida'];
		foreach ($arreglo_articulos as $articulos)
		{
		  	$codart = $articulos[2];
		  	$desart = $articulos[3];
		  	$cantidad = $articulos[6];
			$detaradarventas= new Detradarventas();
			$detaradarventas->setRadarventasId($radarventas->getId());
			$detaradarventas->setCodart($codart);
			$detaradarventas->setCantot($cantidad);
			$detaradarventas->save();
		}
		$this->setFlash('notice', 'El radar de ventas fue creado correctamente');
		$this->redirect('radarventas/index?reg=0');
	}
	else
	{
		//editar el radar
		$connection = Propel::getConnection();
		$query = "update radarventas set 
		ruta_id='".$clasemodelo->getRutaId()."',
		vendedores_id='".$clasemodelo->getVendedoresId()."',
		facliente_id='".$clasemodelo->getFaclienteId()."',
		fecha='".$clasemodelo->getFecha()."',
		status='".$clasemodelo->getStatus()."',
		fafactur_id='".$clasemodelo->getFafacturId()."'				
		where id=".$this->getRequestParameter('id');
		$statement = $connection->prepareStatement($query);
		$resultset = $statement->executeQuery();
		//editar los articulos				
		//delete articulos
		$connectiond = Propel::getConnection();
		$queryd = "delete from detradarventas where radarventas_id=".$this->getRequestParameter('id');

		$statementd = $connectiond->prepareStatement($queryd);
		$resultsetd = $statementd->executeQuery();
		$connectiond = Propel::getConnection();
		$arreglo_articulos = $_POST['grida'];
		foreach ($arreglo_articulos as $articulos)
		{
		  	$codart = $articulos[2];
		  	$desart = $articulos[3];
		  	$cantidad = $articulos[6];				
			//se registra				
			$detaradarventas= new Detradarventas();
			$detaradarventas->setRadarventasId($this->getRequestParameter('id'));
			$detaradarventas->setCodart($codart);
			$detaradarventas->setCantot($cantidad);
			$detaradarventas->save();

		}
		//redirect
		$this->setFlash('notice', 'El radar de ventas fue creado correctamente');
		$this->redirect('radarventas/index?reg=2');
	}
  
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);

  } 
  public function executeDelete()
  {
	$connection = Propel::getConnection();
	$query = "update radarventas set status='2' where id=".$this->getRequestParameter('id');
	$statement = $connection->prepareStatement($query);
	$resultset = $statement->executeQuery();
 	$this->setFlash('notice', 'El radar fue inactivado');
        $this->redirect('radarventas/index?reg=1');
  }
 public function executeMedidas()
  {
	if ($_GET['id']!="")
	{
		$cc = new Criteria();
		$cc->add(CaregartPeer::CODART,$_GET['id']);
		$resultadoc = CaregartPeer::doSelect($cc);
		echo $resultadoc['0']->getUnimed();	
	}
  }

}
