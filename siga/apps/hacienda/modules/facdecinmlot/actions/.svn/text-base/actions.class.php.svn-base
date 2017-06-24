<?php

/**
 * facdecinmlot actions.
 *
 * @package    siga
 * @subpackage facdecinmlot
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facdecinmlotActions extends autofacdecinmlotActions
{


  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function executeIndex()
  {
    return $this->forward('facdecinmlot', 'edit');
  }
  public function editing()
  {    $this->setVars();
	$this->configGrid();
  }

public function setVars() {

        $this->fcdeclar->setFundec($this->getUser()->getAttribute('loguse'));
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($fcconrep)
  {
   null;

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($zondesde='',$zonhasta='',&$sw='')
  {
    $datos=array();
		$c = new Criteria();
    $c->add(FcreginmPeer::ESTINM,'D',Criteria::NOT_EQUAL);
    $c->add(FcreginmPeer::ESTDEC,'D',Criteria::NOT_EQUAL);
    $c->addJoin(FcreginmPeer::RIFCON,  FcconrepPeer::RIFCON);
    $c->addJoin(FcreginmPeer::CODCARINM, FccarinmPeer::CODCARINM);
    $c->addJoin(FcdetinmPeer::NROINM,FcreginmPeer::NROINM);
    $sql="Codzon >= '".$zondesde."' and Codzon <= '".$zonhasta."'";
    $c->add(FcdetinmPeer::CODZON,$sql,Criteria::CUSTOM);
    $c->add(FcconrepPeer::REPCON,'C');
    $c->addAscendingOrderByColumn(FcreginmPeer :: NROINM);
    $per = FcreginmPeer::doSelect($c);
    if(count($per)>0) $sw=true;
    else $sw=false;

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facdecinmlot/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->columnas[1][0]->setHTML('onClick="calcularTotales();"');
    $this->grid = $this->columnas[0]->getConfig($per);
		$this->fcdeclar->setGrid($this->grid);
	}


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $zonadesde= $this->getRequestParameter('zonadesde','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript='';$sw=false;

    switch ($ajax){
      case '1':
        $this->params=array();
        $this->fcdeclar = $this->getFcdeclarOrCreate();
        $this->labels = $this->getLabels();

        if(Hacienda::verificarZona($codigo) && Hacienda::verificarZona($zonadesde)){
           $this->ConfigGrid($zonadesde,$codigo,$sw);
           if($sw){
            $javascript= $javascript."alert('Se han cargado los Inmuebles que cumplen con los criterios de selección')";
           }else{
               $javascript= $javascript."alert('No hay registros que cumplen con los criterios de selección')";

               }
          }else{
           $this->ConfigGrid();
        }
        $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $this->configGrid($grid[0],$grid[1]);
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clase)
  {

  $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  return Hacienda::GenerarDeuda($clase,$grid);
  }

}
