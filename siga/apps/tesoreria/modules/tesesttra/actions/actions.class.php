<?php

/**
 * tesesttra actions.
 *
 * @package    siga
 * @subpackage tesesttra
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesesttraActions extends autotesesttraActions
{

  public function executeIndex() {
    return $this->redirect('tesesttra/edit');
      
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGrid1();
    $this->configGrid2();
    $this->configGrid3();
    $this->configGrid4();
    $this->configGrid5();
    $this->configGrid6();
    $this->configGrid7();
  }

  public  function configGrid1($reqart='',$ordcom=''){
    $a= new Criteria();
    if ($ordcom!=''){
      $a->add(CaartordPeer::ORDCOM,$ordcom);
      $a->addJoin(CasolartPeer::REQART,CaartordPeer::REQART);
    }else {
      $a->add(CasolartPeer::REQART,$reqart);
    }   
    $a->setDistinct();
    $det= CasolartPeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesesttra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_req');
    
    $this->obj1 =$this->columnas[0]->getConfig($det);

    $this->opdefemp->setObj1($this->obj1);
  }

  public  function configGrid2($ordcom='', $reqart='', $numord=''){
    $a= new Criteria();
    if ($reqart!=''){
      $a->add(CaartordPeer::REQART,$reqart);
      $a->addJoin(CaordcomPeer::ORDCOM,CaartordPeer::ORDCOM);
    }else if ($numord!=''){
      $a->add(OpdetordPeer::NUMORD,$numord);
      $a->addJoin(CaordcomPeer::ORDCOM,OpdetordPeer::REFCOM);
    }else {    
      $a->add(CaordcomPeer::ORDCOM,$ordcom);
    }
    $a->setDistinct();
    $det= CaordcomPeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesesttra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordcom');
    
    $this->obj2 =$this->columnas[0]->getConfig($det);

    $this->opdefemp->setObj2($this->obj2);
  }  

  public  function configGrid3($numcal=''){

    $a= new Criteria();
    $a->add(ViacalviatraPeer::NUMCAL,$numcal);
    $det= ViacalviatraPeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesesttra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_calvia');
    
    $this->obj3 =$this->columnas[0]->getConfig($det);

    $this->opdefemp->setObj3($this->obj3);
  }  

  public  function configGrid4($refcom='', $reqart='', $numcal='',$numord=''){
    $a= new Criteria();
    if ($reqart!=''){      
      $a->add(CaartordPeer::REQART,$reqart);
      $a->addJoin(CaordcomPeer::ORDCOM,CaartordPeer::ORDCOM);
      $a->addJoin(CaordcomPeer::ORDCOM,CpcomproPeer::REFCOM);
   }else if ($numord!=''){
      $a->add(OpdetordPeer::NUMORD,$numord);
      $a->addJoin(CpcomproPeer::REFCOM,OpdetordPeer::REFCOM);
    }else if ($numcal!='') {
      $a->add(ViacalviatraPeer::NUMCAL,$numcal);
      $a->addJoin(CpcomproPeer::REFCOM,ViacalviatraPeer::REFCOM);
   }else {   
    $a->add(CpcomproPeer::REFCOM,$refcom);    
   }
   $a->setDistinct();
   $det= CpcomproPeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesesttra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_com');
    
    $this->obj4 =$this->columnas[0]->getConfig($det);

    $this->opdefemp->setObj4($this->obj4);
  }

  public  function configGrid5($numord='', $reqart='', $ordcom='', $numcal='',$compro='',$pagele='',$reflib='',$numcue='',$tipmov=''){

    $a= new Criteria();
    if ($reqart!=''){
      $a->add(CaartordPeer::REQART,$reqart);
      $a->addJoin(CaordcomPeer::ORDCOM,CaartordPeer::ORDCOM);
      $a->addJoin(OpdetordPeer::REFCOM,CaordcomPeer::ORDCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
    }else if ($ordcom!='') {
      $a->add(CaordcomPeer::ORDCOM,$ordcom);
      $a->addJoin(OpdetordPeer::REFCOM,CaordcomPeer::ORDCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
    }else if ($compro!=''){
      $a->add(OpdetordPeer::REFCOM,$compro);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
    }else if ($numcal!='') {
      $a->add(ViacalviatraPeer::NUMCAL,$numcal);
      $a->addJoin(CpcomproPeer::REFCOM,ViacalviatraPeer::REFCOM);
      $a->addJoin(OpdetordPeer::REFCOM,CpcomproPeer::REFCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
    }else if ($pagele!=''){
      $a->add(TsdetpagelePeer::REFPAG,$pagele);
      $a->addJoin(OpordpagPeer::NUMORD,TsdetpagelePeer::NUMORD);
    }else if ($reflib!='' && $numcue!='' && $tipmov!=''){
      $a->add(OpordchePeer::NUMCHE,$reflib);
      $a->add(OpordchePeer::CODCTA,$numcue);
      $a->add(OpordchePeer::TIPMOV,$tipmov);
      $a->addJoin(OpordpagPeer::NUMORD,OpordchePeer::NUMORD);
    }else $a->add(OpordpagPeer::NUMORD,$numord);
    $a->setDistinct();
    $det= OpordpagPeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesesttra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ordpag');
    
    $this->obj5 =$this->columnas[0]->getConfig($det);

    $this->opdefemp->setObj5($this->obj5);
  }

  public  function configGrid6($refpag='', $reqart='', $ordcom='', $numcal='', $compro='', $numord=''){
    
    $a= new Criteria();
    if ($reqart!=''){
      $a->add(CaartordPeer::REQART,$reqart);
      $a->addJoin(CaordcomPeer::ORDCOM,CaartordPeer::ORDCOM);
      $a->addJoin(OpdetordPeer::REFCOM,CaordcomPeer::ORDCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
      $a->addJoin(TsdetpagelePeer::NUMORD,OpordpagPeer::NUMORD);
      $a->addJoin(TspagelePeer::REFPAG,TsdetpagelePeer::REFPAG);
    }else if ($ordcom!='') {
      $a->add(CaordcomPeer::ORDCOM,$ordcom);
      $a->addJoin(OpdetordPeer::REFCOM,CaordcomPeer::ORDCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
      $a->addJoin(TsdetpagelePeer::NUMORD,OpordpagPeer::NUMORD);
      $a->addJoin(TspagelePeer::REFPAG,TsdetpagelePeer::REFPAG);
    }else if ($numcal!='') {
      $a->add(ViacalviatraPeer::NUMCAL,$numcal);
      $a->addJoin(CpcomproPeer::REFCOM,ViacalviatraPeer::REFCOM);
      $a->addJoin(OpdetordPeer::REFCOM,CpcomproPeer::REFCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
      $a->addJoin(TsdetpagelePeer::NUMORD,OpordpagPeer::NUMORD);
      $a->addJoin(TspagelePeer::REFPAG,TsdetpagelePeer::REFPAG);
    }else if ($compro!=''){
      $a->add(OpdetordPeer::REFCOM,$compro);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
      $a->addJoin(TsdetpagelePeer::NUMORD,OpordpagPeer::NUMORD);
      $a->addJoin(TspagelePeer::REFPAG,TsdetpagelePeer::REFPAG);
    }else if ($numord!='') {
      $a->add(TsdetpagelePeer::NUMORD,$numord);
      $a->addJoin(TspagelePeer::REFPAG,TsdetpagelePeer::REFPAG);
    }else  $a->add(TspagelePeer::REFPAG,$refpag);
    $a->setDistinct();
    $det= TspagelePeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesesttra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_pagele');
    
    $this->obj6 =$this->columnas[0]->getConfig($det);

    $this->opdefemp->setObj6($this->obj6);
  }  

  public  function configGrid7($reflib='', $numcue='', $tipmov='', $reqart='', $ordcom='', $numcal='', $compro='', $numord=''){
    
    $a= new Criteria();
    if ($reqart!=''){
      $a->add(CaartordPeer::REQART,$reqart);
      $a->addJoin(CaordcomPeer::ORDCOM,CaartordPeer::ORDCOM);
      $a->addJoin(OpdetordPeer::REFCOM,CaordcomPeer::ORDCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
      $a->addJoin(OpordchePeer::NUMORD,OpordpagPeer::NUMORD);
      $a->addJoin(TsmovlibPeer::REFLIB,OpordchePeer::NUMCHE);
      $a->addJoin(TsmovlibPeer::NUMCUE,OpordchePeer::CODCTA);
      $a->addJoin(TsmovlibPeer::TIPMOV,OpordchePeer::TIPMOV);
    }else if ( $ordcom!=''){
      $a->add(CaordcomPeer::ORDCOM,$ordcom);
      $a->addJoin(OpdetordPeer::REFCOM,CaordcomPeer::ORDCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
      $a->addJoin(OpordchePeer::NUMORD,OpordpagPeer::NUMORD);
      $a->addJoin(TsmovlibPeer::REFLIB,OpordchePeer::NUMCHE);
      $a->addJoin(TsmovlibPeer::NUMCUE,OpordchePeer::CODCTA);
      $a->addJoin(TsmovlibPeer::TIPMOV,OpordchePeer::TIPMOV);
    }else if ($numcal!='') {
      $a->add(ViacalviatraPeer::NUMCAL,$numcal);
      $a->addJoin(CpcomproPeer::REFCOM,ViacalviatraPeer::REFCOM);
      $a->addJoin(OpdetordPeer::REFCOM,CpcomproPeer::REFCOM);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
      $a->addJoin(OpordchePeer::NUMORD,OpordpagPeer::NUMORD);
      $a->addJoin(TsmovlibPeer::REFLIB,OpordchePeer::NUMCHE);
      $a->addJoin(TsmovlibPeer::NUMCUE,OpordchePeer::CODCTA);
      $a->addJoin(TsmovlibPeer::TIPMOV,OpordchePeer::TIPMOV);
    }else if ($compro!='') {
      $a->add(OpdetordPeer::REFCOM,$compro);
      $a->addJoin(OpordpagPeer::NUMORD,OpdetordPeer::NUMORD);
      $a->addJoin(OpordchePeer::NUMORD,OpordpagPeer::NUMORD);
      $a->addJoin(TsmovlibPeer::REFLIB,OpordchePeer::NUMCHE);
      $a->addJoin(TsmovlibPeer::NUMCUE,OpordchePeer::CODCTA);
      $a->addJoin(TsmovlibPeer::TIPMOV,OpordchePeer::TIPMOV);
    }else if ($numord!='') {
      $a->add(OpordchePeer::NUMORD,$numord);
      $a->addJoin(TsmovlibPeer::REFLIB,OpordchePeer::NUMCHE);
      $a->addJoin(TsmovlibPeer::NUMCUE,OpordchePeer::CODCTA);
      $a->addJoin(TsmovlibPeer::TIPMOV,OpordchePeer::TIPMOV);
    }else {
      $a->add(TsmovlibPeer::REFLIB,$reflib);
      $a->add(TsmovlibPeer::NUMCUE,$numcue);
      $a->add(TsmovlibPeer::TIPMOV,$tipmov);
    }
    $a->setDistinct();
    $det= TsmovlibPeer::doSelect($a);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesesttra/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_che');
    
    $this->obj7 =$this->columnas[0]->getConfig($det);

    $this->opdefemp->setObj7($this->obj7);
  }   

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $this->ajaxs=$ajax; $js="";
    $sw=false;

    switch ($ajax){
      case '1':     
        $reqart = $this->getRequestParameter('reqart','');
        $tiptra = $this->getRequestParameter('tiptra','');        
        
          $this->params=array();
          $this->labels = $this->getLabels();
          $this->opdefemp = $this->getOpdefempOrCreate();
          if ($tiptra=='1')
            $this->configGrid1($reqart);
          else if ($tiptra=='2')
            $this->configGrid1('',$reqart);
        
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':     
        $reqart = $this->getRequestParameter('reqart','');
        $tiptra = $this->getRequestParameter('tiptra','');
          $this->params=array();
          $this->labels = $this->getLabels();
          $this->opdefemp = $this->getOpdefempOrCreate();
          if ($tiptra=='1')
            $this->configGrid2('',$reqart);
          if ($tiptra=='5')
            $this->configGrid2('','',$reqart);
          else
            $this->configGrid2($reqart);        
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '3':     
        $reqart = $this->getRequestParameter('reqart','');
        $tiptra = $this->getRequestParameter('tiptra','');
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opdefemp = $this->getOpdefempOrCreate();
        $this->configGrid3($reqart);        
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '4':     
        $reqart = $this->getRequestParameter('reqart','');
        $tiptra = $this->getRequestParameter('tiptra','');
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opdefemp = $this->getOpdefempOrCreate();
        if ($tiptra=='1')
          $this->configGrid4('',$reqart);        
        else if ($tiptra=='2')
          $this->configGrid4($reqart);        
        else if ($tiptra=='3')
          $this->configGrid4('','',$reqart);        
        else if ($tiptra=='5')
          $this->configGrid4('','','',$reqart);        
        else
          $this->configGrid4($reqart);    

        $output = '[["","",""],["","",""],["","",""]]';
        break;   
      case '5':     
        $reqart = $this->getRequestParameter('reqart','');
        $tiptra = $this->getRequestParameter('tiptra','');
        $numcue = $this->getRequestParameter('numcue','');
        $tipmov = $this->getRequestParameter('tipmov','');
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opdefemp = $this->getOpdefempOrCreate();
        if ($tiptra=='1')
          $this->configGrid5('',$reqart);        
        else if ($tiptra=='2')
          $this->configGrid5('','',$reqart);        
        else if ($tiptra=='3')
          $this->configGrid5('','','',$reqart);        
        else if($tiptra=='4')
          $this->configGrid5('','','','',$reqart);
        else if($tiptra=='6')
          $this->configGrid5('','','','','',$reqart);  
        else if($tiptra=='7')
          $this->configGrid5('','','','','','',$reqart,$numcue,$tipmov);         
        else
          $this->configGrid5($reqart);    

        $output = '[["","",""],["","",""],["","",""]]';
        break;      
      case '6':     
        $reqart = $this->getRequestParameter('reqart','');
        $tiptra = $this->getRequestParameter('tiptra','');
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opdefemp = $this->getOpdefempOrCreate();
        if ($tiptra=='1')
          $this->configGrid6('',$reqart);        
        else if ($tiptra=='2')
          $this->configGrid6('','',$reqart);        
        else if ($tiptra=='3')
          $this->configGrid6('','','',$reqart);        
        else if($tiptra=='4')
          $this->configGrid6('','','','',$reqart);
        else if($tiptra=='5')
          $this->configGrid6('','','','','',$reqart);         
        else
          $this->configGrid6($reqart);    

        $output = '[["","",""],["","",""],["","",""]]';
        break;  
      case '7':     
        $reqart = $this->getRequestParameter('reqart','');
        $tiptra = $this->getRequestParameter('tiptra','');
        $numcue = $this->getRequestParameter('numcue','');
        $tipmov = $this->getRequestParameter('tipmov','');
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opdefemp = $this->getOpdefempOrCreate();
        if ($tiptra=='1')
          $this->configGrid7('','','',$reqart);        
        else if ($tiptra=='2')
          $this->configGrid7('','','','',$reqart);        
        else if ($tiptra=='3')
          $this->configGrid7('','','','','',$reqart);        
        else if($tiptra=='4')
          $this->configGrid7('','','','','','',$reqart);
        else if($tiptra=='5')
          $this->configGrid7('','','','','','','',$reqart); 
        else if($tiptra=='6')
          $this->configGrid7('','','','','','','','',$reqart);         
        else
          $this->configGrid7($reqart,$numcue,$tipmov);    

        $output = '[["","",""],["","",""],["","",""]]';
        break;                       
      default:
        $sw=true;
        $tiptra = $this->getRequestParameter('opdefemp[tiptra]','');
        $numref = $this->getRequestParameter('opdefemp[numref]','');        
        switch ($tiptra){
          case '1':
           $q= new Criteria();
           $q->add(CasolartPeer::REQART,$numref);
           $regq= CasolartPeer::doSelectOne($q);
           if ($regq){
            $js="cargarDatosRequi('$numref');";
            $tieOC=H::getX_vacio('REQART','Caartord','ORDCOM',$numref);            
            if ($tieOC){
              $js.="cargarDatosOC('$numref'); cargarDatosCOM('$numref'); cargarDatosOP('$numref'); cargarDatosPagos('$numref');";
            }
           }else $js="alert_('La Requisici&oacute;n no est&acute; registrada'); $('opdefemp_numref').value='';";
           break;
          case '2':
           $q= new Criteria();
           $q->add(CaordcomPeer::ORDCOM,$numref);
           $regq= CaordcomPeer::doSelectOne($q);
           if ($regq){
             $js="cargarDatosOC('$numref'); cargarDatosCOM('$numref');";
             $tieREQ=H::getX_vacio('ORDCOM','Caartord','REQART',$numref);
             if ($tieREQ!='')
              $js.="cargarDatosRequi('$numref');";
             $tieOP=H::getX_vacio('REFCOM','Opdetord','NUMORD',$numref);            
              if ($tieOP){
                $js.="cargarDatosOP('$numref'); cargarDatosPagos('$numref');";
              }
           }else $js="alert_('La Orden de Compra no est&acute; registrada'); $('opdefemp_numref').value='';";
           break;
          case '3':
           $q= new Criteria();
           $q->add(ViacalviatraPeer::NUMCAL,$numref);
           $regq= ViacalviatraPeer::doSelectOne($q);
           if ($regq){
             $js="cargarDatosCalvia('$numref');";
             if ($regq->getRefcom()!='') {
              $js.=" cargarDatosCOM('$numref');";
             $tieOP=H::getX_vacio('REFCOM','Opdetord','NUMORD',$regq->getRefcom());            
              if ($tieOP){
                $js.=" cargarDatosOP('$numref'); cargarDatosPagos('$numref');";
              }
            }
           }else $js="alert_('El C&aacute;lculo de Vi&aacute;ticos no est&acute; registrado'); $('opdefemp_numref').value='';";
           break;
          case '4':
           $q= new Criteria();
           $q->add(CpcomproPeer::REFCOM,$numref);
           $regq= CpcomproPeer::doSelectOne($q);
           if ($regq){
             $js="cargarDatosCOM('$numref');";
             $tieOP=H::getX_vacio('REFCOM','Opdetord','NUMORD',$numref);            
              if ($tieOP){
                $js.="cargarDatosOP('$numref'); cargarDatosPagos('$numref');";
              }            
           }else $js="alert_('El Compromiso no est&acute; registrado'); $('opdefemp_numref').value='';";
           break;
          case '5':
           $q= new Criteria();
           $q->add(OpordpagPeer::NUMORD,$numref);
           $regq= OpordpagPeer::doSelectOne($q);
           if ($regq){
             $js="cargarDatosOP('$numref');";
             $tieOC=H::getX_vacio('NUMORD','Opdetord','REFCOM',$numref);  
             if ($tieOC!='')
               $js.="cargarDatosOC('$numref'); cargarDatosCOM('$numref');";
             $tieche=H::getX_vacio('NUMORD','Opordche','NUMORD',$numref);            
              if ($tieche){
                $js.="cargarDatosPagos('$numref');";
              }            
           }else $js="alert_('La Orden de Pago no est&acute; registrada'); $('opdefemp_numref').value='';";
           break;
          case '6':
           $q= new Criteria();
           $q->add(TspagelePeer::REFPAG,$numref);
           $regq= TspagelePeer::doSelectOne($q);
           if ($regq){
             $js="cargarDatosPagEle('$numref'); cargarDatosOP('$numref');";        

           }else $js="alert_('El Pago Electrónico no est&acute; registrado'); $('opdefemp_numref').value='';";
           break;
          case '7':
           $numcue = $this->getRequestParameter('opdefemp[numcue]','');
           $tipmov = $this->getRequestParameter('opdefemp[tipmov]','');
           $q= new Criteria();
           $q->add(TsmovlibPeer::REFLIB,$numref);
           $q->add(TsmovlibPeer::NUMCUE,$numcue);
           $q->add(TsmovlibPeer::TIPMOV,$tipmov);
           $regq= TsmovlibPeer::doSelectOne($q);
           if ($regq){
             $js="cargarDatosChe('$numref');";  
             $y= new Criteria();
             $y->add(OpordchePeer::NUMCHE,$numref);   
             $y->add(OpordchePeer::CODCTA,$numcue);   
             $y->add(OpordchePeer::TIPMOV,$tipmov);   
             $regy=OpordchePeer::doSelectOne($y);
            if ($regy){
              $js.="cargarDatosCheOP('$numref');";  
            }
           }else $js="alert_('El Cheque no est&acute; registrado'); $('opdefemp_numref').value=''; $('opdefemp_numcue').value=''; $('opdefemp_tipmov').value='';";
           break;
           break;
        }
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
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

    $grid1 = Herramientas::CargarDatosGridv2($this,$this->obj1);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);
    $grid5 = Herramientas::CargarDatosGridv2($this,$this->obj5);
    $grid6 = Herramientas::CargarDatosGridv2($this,$this->obj6);
    $grid7 = Herramientas::CargarDatosGridv2($this,$this->obj7);

  }
}
