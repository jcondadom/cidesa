<?php

/**
 * viavercalviatra actions.
 *
 * @package    siga
 * @subpackage viavercalviatra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viavercalviatraActions extends autoviavercalviatraActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($fecdes="", $fechas="", $reg = array())
  {
    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'viaticos', 'viasolviatra');

    if ($fecdes!="" && $fechas!="") {
         $c = new Criteria();
         $c->add(ViacalviatraPeer::STATUS,'P');
         $c->add(ViacalviatraPeer::VERIFICADO,'N');
         //$c->add(ViacalviatraPeer::FECCAL,$fecdes,Criteria::GREATER_EQUAL);
         //$c->addAnd(ViacalviatraPeer::FECCAL,$fechas,Criteria::LESS_EQUAL);
         if ($filsoldir=='S'){
           $this->sql='viacalviatra.feccal>=\''.$fecdes.'\' and viacalviatra.feccal<=\''.$fechas.'\' and viasolviatra.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
           $c->add(ViacalviatraPeer::FECCAL,$this->sql,Criteria::CUSTOM); 
           $c->addJoin(ViacalviatraPeer::REFSOL,ViasolviatraPeer::NUMSOL); 
         }else {
          $this->sql="viacalviatra.feccal>='".$fecdes."' and viacalviatra.feccal<='".$fechas."'";
          $c->add(ViacalviatraPeer::FECCAL,$this->sql, Criteria::CUSTOM);
         }
         $reg = ViacalviatraPeer::doSelect($c);
     }

     $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viavercalviatra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     $this->obj = $this->obj[0]->getConfig($reg);
     $params['grid'] = $this->obj;
     $this->params = $params;
  }

  public function executeAjax()
  {
    $ajax = $this->getRequestParameter('ajax','');
    $fecdes = $this->getRequestParameter('fecdes','');
    $fechas = $this->getRequestParameter('fechas','');
    $sw = false;
    $js="";

    switch ($ajax){
      case '1':
        if($fecdes!='' && $fechas!=''){
            $dateFormat = new sfDateFormat('es_VE');
            $fecdes = $dateFormat->format($this->getRequestParameter('fecdes',''), 'i', $dateFormat->getInputPattern('d'));
            $dateFormat = new sfDateFormat('es_VE');
            $fechas = $dateFormat->format($this->getRequestParameter('fechas',''), 'i', $dateFormat->getInputPattern('d'));
            if($fecdes<=$fechas){
                $this->params=array();
                $this->configGrid($fecdes, $fechas);
                $output = '[["","",""],["","",""],["","",""]]';
            }else{
                $js="alert('El Rango de las fechas es incorrecto')";
                $output = '[["viavercalviatra_fecdes","",""],["viavercalviatra_fechas","",""],["javascript","'.$js.'",""]]';
                $this->configGrid();
            }
        }else{
            $this->params=array();
            $this->configGrid();
            $output = '[["","",""],["","",""],["","",""]]';
        }
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if($sw){
        return sfView::HEADER_ONLY;
    }
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this, $this->params['grid']);

    Viaticos::verificarCalculoViatico($grid);

    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }

  public function executeList()
  {
    $this->forward('viavercalviatra', 'create');
  }

}
