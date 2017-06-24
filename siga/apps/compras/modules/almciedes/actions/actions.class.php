<?php

/**
 * almciedes actions.
 *
 * @package    siga
 * @subpackage almciedes
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almciedesActions extends autoalmciedesActions
{
  public function executeIndex()
  {
    return $this->forward('almciedes', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($fecdes="", $fechas="")
  {
    $reg=array();

    if ($fecdes!="" && $fechas!="") {
     $this->sql2="cadphart.reqart in (select reqart from careqart where (stadesp<>'C' or stadesp is null)) and (cadphart.fecdph>='".$fecdes."' and cadphart.fecdph<='".$fechas."')";
     $c = new Criteria();     
     $c->add(CadphartPeer::DPHART,$this->sql2,Criteria::CUSTOM);
     $reg = CadphartPeer::doSelect($c);
    }
     $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almciedes/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->obj = $this->obj[0]->getConfig($reg);
     $this->cadphart->setGrid($this->obj);    

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos= $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
          $sw=false;
          if ($cajtexmos=='cadphart_fecdphhas')
          {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                if ($this->getRequestParameter('fecha')!="") {
                  $dateFormat = new sfDateFormat('es_VE');
                  $fec2 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                  
                  if ($fec1>$fec2)
                  {
                      $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('cadphart_fecdphdes').value=''; $('cadphart_fecdphdes').focus();";
                       $this->params=array();
                      $this->labels = $this->getLabels();
                      $this->cadphart = $this->getCadphartOrCreate();
                      $this->configGrid();
                  }else {
                      $this->params=array();
                      $this->labels = $this->getLabels();
                      $this->cadphart = $this->getCadphartOrCreate();
                      $this->configGrid($fec1, $fec2);
                }
              }else { $this->params=array();
                  $this->labels = $this->getLabels();
                  $this->cadphart = $this->getCadphartOrCreate();
                  $this->configGrid();
              }
          }else {
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($this->getRequestParameter('fecha'), 'i', $dateFormat->getInputPattern('d'));  //Fecha Desde

                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($codigo, 'i', $dateFormat->getInputPattern('d'));  //Fecha Hasta
                
                if ($fec1>$fec2)
                {
                    $js="alert('La fechas Desde no puede ser mayor la Fecha Hasta'); $('cadphart_fecdphhas').value=''; $('cadphart_fecdphhas').focus();";
                     $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->cadphart = $this->getCadphartOrCreate();
                    $this->configGrid();
                }else {
                    $this->params=array();
                    $this->labels = $this->getLabels();
                    $this->cadphart = $this->getCadphartOrCreate();
                    $this->configGrid($fec1, $fec2);
                }
          }
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
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
    foreach($grid[0] as  $dat)
    {
        if($dat->getCheck()=='1')
        {
          $c = new Criteria();
          $c->add(CareqartPeer::REQART,$dat->getReqart());
          $per = CareqartPeer::doSelectOne($c);            
          if($per)
          {
              $per->setStadesp('C');
              $per->save();
          }
          if (Despachos::actualizarArticulosCierre($dat->getDphart()))
          {
              Despachos::actualizarArticulosRequisionCierre($dat->getDphart());
          } 
        }
    }

    return -1;
  }
}
