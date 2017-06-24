<?php

/**
 * manprogru actions.
 *
 * @package    siga
 * @subpackage manprogru
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class manprogruActions extends automanprogruActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid($this->manprogru->getCodgru());
  }

  public function configGrid($codgru='', $arreglo=array())
  {
    if (count($arreglo)>0){
      $j=0;
      while($j<count($arreglo)){
        $mandispro_est= new Mandispro();
        $mandispro_est->setFecini($arreglo[$j]["fecini"]);
        $det[]=$mandispro_est;
        $j++;
      }
    }else {
      $c= new Criteria();
      $c->add(MandisproPeer::CODGRU,$codgru);
      $det= MandisproPeer::doSelect($c);     
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/manprogru/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    
    $this->obj =$this->columnas[0]->getConfig($det);

    $this->manprogru->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $dato=$js=""; $sw=true; 
    $this->ajaxs=$ajax;

    switch ($ajax){
      case '1':      
        $sw=false;
        $codigo=$this->getRequestParameter('codigo');    
        $fecini=$this->getRequestParameter('fecini'); 
      
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->manprogru = $this->getManprogruOrCreate();
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($fecini, 'i', $dateFormat->getInputPattern('d'));

        Mantenimiento::CargarFechasProximas($codigo,$fec,$arreglo);
        $this->configGrid('',$arreglo);
        $output = '[["javascript","'.$js.'",""]]';
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
      if ($this->getRequestParameter('id')=='') {
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($this->getRequestParameter('manprogru[fecini]'), 'i', $dateFormat->getInputPattern('d'));

        $q= new Criteria();
        $q->add(ManprogruPeer::$this->getRequestParameter('manprogru[codgru]'));
        $q->add(ManprogruPeer::$fec);
        $regq= ManprogruPeer::doSelectOne($q);
        if ($regq)
          $this->coderr=6000;
      }

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
    Mantenimiento::SalvarProgGrupo($clasemodelo,$grid);
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $p= new Criteria();
    $p->add(MandisproPeer::CODGRU,$clasemodelo->getCodgru());
    $p->add(MandisproPeer::FECINI,$clasemodelo->getFecini());
    $p->addJoin(ManprogruPeer::CODGRU,MandisproPeer::CODGRU);
    $p->addJoin(ManprogruPeer::FECINI,MandisproPeer::FECINI);
    $regp= MandisproPeer::doSelect($p);
    if ($regp){
      foreach ($$regp as $objp) {
        $objp->delete();
      }
    }
    return parent::deleting($clasemodelo);
  }


}
