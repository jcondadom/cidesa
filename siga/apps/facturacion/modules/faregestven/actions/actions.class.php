<?php

/**
 * faregestven actions.
 *
 * @package    siga
 * @subpackage faregestven
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class faregestvenActions extends autofaregestvenActions
{

   public function executeIndex()
  {
    return $this->forward('faregestven', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($anoest='')
  {
    $reg=array();
    $c = new Criteria();
    $c->add(FaestvenPeer::ANOEST,$anoest);
    $reg = FaestvenPeer::doSelect($c);
    if (!$reg)
    {
      $i=1;
      while ($i<=12) 
      {
        $faestven2= new Faestven();
        if ($i<=9)
          $faestven2->setMesest('0'.$i);
        else
          $faestven2->setMesest($i);
        $reg[]=$faestven2;
        $i++;
      }   
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/faregestven/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->faestven->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
        $sw=false;
         $this->faestven = $this->getFaestvenOrCreate();
         $this->updateFaestvenFromRequest();
         $this->params=array();
         $this->labels = $this->getLabels();
         $this->configGrid($codigo);
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;
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

    if($this->getRequest()->getMethod() == sfRequest::POST){

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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Facturacion::SalvarEstimacionesVentas($clasemodelo,$grid);
    return -1;
  }
}
