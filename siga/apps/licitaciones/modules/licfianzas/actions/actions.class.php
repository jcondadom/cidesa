<?php

/**
 * licfianzas actions.
 *
 * @package    siga
 * @subpackage licfianzas
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licfianzasActions extends autolicfianzasActions
{

  public function listing()
  {
      $this->c = new Criteria();
      $sql = "(Licontrat.tipconpub='O')";
      $this->c->add(LicontratPeer::TIPCONPUB,$sql,Criteria::CUSTOM);
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridFia();
    $this->configGridActas();
  }

   public function configGridFia($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LiregfiacontPeer::NUMCONT,$this->licontrat->getNumcont());
      $reg_contrat = LiregfiacontPeer::doSelectJoinLiccomres($c);

      if(count($reg_contrat)==0){
        $c = new Criteria();
        $c->add(LiregofefiaPeer::NUMOFE,$this->licontrat->getNumofe());
        $reg_liregofefia = LiregofefiaPeer::doSelect($c);
        foreach($reg_liregofefia as $liregofefia){
          $regfiacont = new Liregfiacont();
          $regfiacont->setLiregofefiaId($liregofefia->getId());
          $regfiacont->setCodcomres($liregofefia->getCodcomres());
          $regfiacont->setPorcen($liregofefia->getPorcentaje());
          $regfiacont->setEmpresa($liregofefia->getEmpresa());
          $regfiacont->setFecemi($liregofefia->getFecemi());
          $regfiacont->setFecven($liregofefia->getFecven());
          $reg[] = $regfiacont;
        }
        
      }else{
        $reg = $reg_contrat;
      }

    }
    $this->obj8 = Herramientas::getConfigGrid('gridfia');

    $this->obj8 = $this->obj8[0]->getConfig($reg);
    $this->licontrat->setGridfia($this->obj8);

   }

   public function configGridActas($reg = array(),$regelim = array())
   {
    $this->regelim = $regelim;

    if(!(count($reg)>0))
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $c = new Criteria();
      $c->add(LidetactfiacontPeer::NUMCONT,$this->licontrat->getNumcont());
      $reg = LidetactfiacontPeer::doSelectJoinLiactas($c);

    }
    $obj = Herramientas::getConfigGrid('gridactas');

    $obj = $obj[0]->getConfig($reg);

    //$regobj['gridactas'] =
    $this->objactas = $obj;

    $this->params['gridactas'] = $obj;

   }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

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

      $this->licontrat = $this->getLicontratOrCreate();
      $this->updateLicontratFromRequest();

      $this->configGridFia();
      $gridfia = Herramientas::CargarDatosGridv2($this,$this->obj8);

      $this->coderr = Licitacion::ValidarGridRegFiaCont($this->licontrat,$gridfia);


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
    $this->configGridFia();

    $gridfia = Herramientas::CargarDatosGridv2($this,$this->obj8);

  }

  public function saving($clasemodelo)
  {
    $gridfia = Herramientas::CargarDatosGridv2($this,$this->obj8);
    $gridactas = Herramientas::CargarDatosGridv2($this,$this->objactas);

    $ret = Licitacion::SalvarGridRegFiaCont($clasemodelo, $gridfia);

    if($ret!=-1) return $ret;
    
    return Licitacion::SalvarGridRegActasFianzas($clasemodelo, $gridactas);
  }

  public function deleting($clasemodelo)
  {
    return -1;
  }


}
