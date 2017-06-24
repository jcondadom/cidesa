<?php

/**
 * almverordcom actions.
 *
 * @package    siga
 * @subpackage almverordcom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almverordcomActions extends autoalmverordcomActions
{
  public function executeIndex()
  {
    return $this->forward('almverordcom', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();
  }

  public function configGrid($ordcom1='', $ordcom2='', $fec1='', $fec2='')
  {
    $reg=array();
    $cade="";
    if ($ordcom1!='' && $ordcom2!='')    
      $cade=" and caordcom.ordcom>='".$ordcom1."' and  caordcom.ordcom<='".$ordcom2."' ";
    
    if ($fec1!='' && $fec2!='')    
      $cade.=" and caordcom.fecord>='".$fec1."' and  caordcom.fecord<='".$fec2."' ";

  if (($ordcom1!='' && $ordcom2!='') || ($fec1!='' && $fec2!='')) {
    $c = new Criteria();
    $sql = "caordcom.STAORD='A' ".$cade." and (caordcom.staver<>'S' or caordcom.staver is null) and caordcom.ordcom not in (select refcom from cpcompro)";
    $c->add(CaordcomPeer::ORDCOM, $sql, Criteria :: CUSTOM);
    $c->addAscendingOrderByColumn(CaordcomPeer::ORDCOM);
    $c->addAscendingOrderByColumn(CaordcomPeer::FECORD);
    $reg = CaordcomPeer::doSelect($c);
  }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almverordcom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    
    $this->obj =$this->columnas[0]->getConfig($reg);

    $this->caordcom->setObj($this->obj);
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':  
        $sw=false;        
        $ordcom1 = $this->getRequestParameter('ordcom1','');
        $ordcom2 = $this->getRequestParameter('ordcom2','');
        $fec1 = $this->getRequestParameter('fec1','');
        $fec2 = $this->getRequestParameter('fec2','');
        if ($fec1!='' && $fec2!=''){
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($this->getRequestParameter('fec1',''), 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

          $dateFormat = new sfDateFormat('es_VE');
          $fec2 = $dateFormat->format($this->getRequestParameter('fec2',''), 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
        }

        $this->params=array();
        $this->caordcom = $this->getCaordcomOrCreate();
        $this->updateCaordcomFromRequest();
        $this->labels = $this->getLabels();
        $this->configGrid($ordcom1,$ordcom2,$fec1,$fec2);

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
     $coderr = Orden_compra::salvarAlmverordcom($clasemodelo,$grid);

    return $coderr;
  }


}
