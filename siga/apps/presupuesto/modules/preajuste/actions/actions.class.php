<?php

/**
 * preajuste actions.
 *
 * @package    siga
 * @subpackage preajuste
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class preajusteActions extends autopreajusteActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
      $this->configGrid($this->cpajuste->getRefaju());

  }

  public function configGrid($refaju="", $tipaju="", $afeaju="", $refere="")
  {
    $detalle=array();
    if ($this->cpajuste->getId()=='')
    {
      if ($refere!="")
      {
          if ($tipaju=='P')
          {
              $w= new Criteria();
              $w->add(CpimpprcPeer::REFPRC,$refere);
              $data= CpimpprcPeer::doSelect($w);
              if ($data)
              {
                  foreach ($data as $objd)
                  {
                      $cpmovaju2= new Cpmovaju();
                      $cpmovaju2->setCodpre($objd->getCodpre());
                      $cpmovaju2->setMonaju(0);
                      if ($afeaju=='R') {
                          $moncomp=$objd->getMonimp()-$objd->getMonaju()-$objd->getMoncom();
                          if ($moncomp>0)
                            $cpmovaju2->setMonto(H::FormatoMonto($moncomp));        
                      }else {
                          $moncomp=$objd->getMonimp()-$objd->getMonaju();
                          if ($moncomp>0)
                            $cpmovaju2->setMonto(H::FormatoMonto($moncomp)); 
                      }
                      $detalle[]=$cpmovaju2;
                  }
              }             
          }else if ($tipaju=='C') {
              $w= new Criteria();
              $w->add(CpimpcomPeer::REFCOM,$refere);
              $data= CpimpcomPeer::doSelect($w);
              if ($data)
              {
                  foreach ($data as $objd)
                  {
                      $cpmovaju2= new Cpmovaju();
                      $cpmovaju2->setCodpre($objd->getCodpre());
                      $cpmovaju2->setMonaju(0);
                      if ($afeaju=='R') {
                          $moncomp=$objd->getMonimp()-$objd->getMonaju()-$objd->getMoncau();
                          if ($moncomp>0) {
                            $cpmovaju2->setMonto(H::FormatoMonto($moncomp));        
                            $cpmovaju2->setRefprc($objd->getRefere());        
                          }
                      }else {
                          $moncomp=$objd->getMonimp()-$objd->getMonaju();
                          if ($moncomp>0) {
                            $cpmovaju2->setMonto(H::FormatoMonto($moncomp)); 
                            $cpmovaju2->setRefprc($objd->getRefere()); 
                          }
                      }
                      $detalle[]=$cpmovaju2;
                  }
              }              
          }else if ($tipaju=='A'){
              $w= new Criteria();
              $w->add(CpimpcauPeer::REFCAU,$refere);
              $data= CpimpcauPeer::doSelect($w);
              if ($data)
              {
                  foreach ($data as $objd)
                  {
                      $cpmovaju2= new Cpmovaju();
                      $cpmovaju2->setCodpre($objd->getCodpre());
                      $cpmovaju2->setMonaju(0);
                      if ($afeaju=='R') {
                          $moncomp=$objd->getMonimp()-$objd->getMonaju()-$objd->getMonpag();
                          if ($moncomp>0) {
                            $cpmovaju2->setMonto(H::FormatoMonto($moncomp));        
                            $cpmovaju2->setRefprc($objd->getRefprc());        
                            $cpmovaju2->setRefcom($objd->getRefere());        
                          }
                      }else {
                          $moncomp=$objd->getMonimp()-$objd->getMonaju();
                          if ($moncomp>0) {
                            $cpmovaju2->setMonto(H::FormatoMonto($moncomp)); 
                            $cpmovaju2->setRefprc($objd->getRefprc());        
                            $cpmovaju2->setRefcom($objd->getRefere());
                          }
                      }
                      $detalle[]=$cpmovaju2;
                  }
              }
          }else {
              $w= new Criteria();
              $w->add(CpimppagPeer::REFPAG,$refere);
              $data= CpimppagPeer::doSelect($w);
              if ($data)
              {
                  foreach ($data as $objd)
                  {
                      $cpmovaju2= new Cpmovaju();
                      $cpmovaju2->setCodpre($objd->getCodpre());
                      $cpmovaju2->setMonaju(0);
                      $moncomp=$objd->getMonimp()-$objd->getMonaju();
                      if ($moncomp>0) {
                        $cpmovaju2->setMonto(H::FormatoMonto($moncomp));        
                        $cpmovaju2->setRefprc($objd->getRefprc());        
                        $cpmovaju2->setRefcom($objd->getRefcom());        
                        $cpmovaju2->setRefcau($objd->getRefere());        
                      }
                      $detalle[]=$cpmovaju2;
                  }
              }
          }
      }
    }
    else
    {
      $c = new Criteria();
      $c->add(CpmovajuPeer::REFAJU,$refaju);
      $detalle = CpmovajuPeer::doSelect($c);
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/preajuste/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_mov');

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->cpajuste->setObj($this->obj);    
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $cajtexcom=$this->getRequestParameter('cajtexcom','');
    $dato=""; $js=""; $dato2=""; $sw=true;

    switch ($ajax){
      case '1':
          $gencomaju=H::getConfApp2('gencomaju', 'presupuesto', 'preajuste');
          $e= new Criteria();
          $e->add(CpdocajuPeer::TIPAJU,$codigo);
          $reg= CpdocajuPeer::doSelectOne($e);
          if ($reg)
          {
              $dato=$reg->getNomext();
              $dato2=$reg->getRefier();
              if ($dato2=='P'){
                  $js="$('divprecom').show(); $('divcompro').hide(); $('divcausad').hide(); $('divpagado').hide();";
                  if ($gencomaju=='S')
                    $js.="$$('.sf_admin_action_save')[0].hide();";   
              }else if ($dato2=='C'){
                  $js="$('divcompro').show(); $('divprecom').hide(); $('divcausad').hide(); $('divpagado').hide();";
                  if ($gencomaju=='S')
                    $js.="$$('.sf_admin_action_save')[0].hide();"; 
              }else if ($dato2=='A'){
                  $js="$('divcausad').show(); $('divprecom').hide(); $('divcompro').hide(); $('divpagado').hide();";
                  if ($gencomaju=='S')
                    $js.="$$('.sf_admin_action_save')[0].show();"; 
              }else {
                  $js="$('divpagado').show(); $('divprecom').hide(); $('divcompro').hide(); $('divcausad').hide();";              
                  if ($gencomaju=='S')
                    $js.="$$('.sf_admin_action_save')[0].show();"; 
                }
          }else {
              $js="alert('El tipo de ajuste no existe); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
          
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cpajuste_reftipaju","'.$dato2.'",""],["javascript","'.$js.'",""]]';
        break;
      case '2':
          $reftipaju=$this->getRequestParameter('reftipaju');
          $afeaju=$this->getRequestParameter('afeaju');
          $fecaju=$this->getRequestParameter('fecaju');
          $sw=false;
            $dateFormat = new sfDateFormat('es_VE');
            $fec1 = $dateFormat->format($fecaju, 'i', $dateFormat->getInputPattern('d'));
          
          if ($reftipaju!="")
          {
              if ($afeaju!="")
              {
                  if ($reftipaju=="P") {
                    if ($afeaju=='R')
                    {
                        $t= new Criteria();
                        $t->add(CpprecomPeer::REFPRC,$codigo);
                        $t->add(CpprecomPeer::STAPRC,'A');
                        $t->add(CpprecomPeer::FECPRC,$fec1,Criteria::LESS_EQUAL);
                        //$sql="(cpprecom.monprc-cpprecom.salaju-cpprecom.salcom)>0";
                        $sql="(Select Sum(monimp-monaju-moncom) as monprc from cpimpprc where refprc=cpprecom.refprc) > 0";
                        $t->add(CpprecomPeer::MONPRC,$sql,Criteria::CUSTOM);
                        $reg= CpprecomPeer::doSelectOne($t);              
                    }else {
                        $t= new Criteria();
                        $t->add(CpprecomPeer::REFPRC,$codigo);
                        $t->add(CpprecomPeer::STAPRC,'A');
                        $t->add(CpprecomPeer::FECPRC,$fec1,Criteria::LESS_EQUAL);
                        $sql="(Select Sum(monimp-monaju) as monprc from cpimpprc where refprc=cpprecom.refprc) > 0";
                        $t->add(CpprecomPeer::MONPRC,$sql,Criteria::CUSTOM);
                        $reg= CpprecomPeer::doSelectOne($t); 
                    }                    
                    if ($reg)
                    {
                        $dato2=date('d/m/Y',strtotime($reg->getFecprc()));
                        $dato=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDesprc()));     
                        $this->params=array();
                         $this->labels = $this->getLabels();
                         $this->cpajuste = $this->getCpajusteOrCreate();                        
                         $this->configGrid("",$reftipaju,$afeaju,$codigo);                                            
                    }else {
                         $this->params=array();
                         $this->labels = $this->getLabels();
                         $this->cpajuste = $this->getCpajusteOrCreate();                        
                         $this->configGrid();  
                         $js="alert('El Precompromiso no se puede ajustar'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                    }                    
                    
                  }else if ($reftipaju=="C"){
                      if ($afeaju=='R')
                    {
                        $t= new Criteria();
                        $t->add(CpcomproPeer::REFCOM,$codigo);
                        $t->add(CpcomproPeer::STACOM,'A');
                        $t->add(CpcomproPeer::FECCOM,$fec1,Criteria::LESS_EQUAL);
                        //$sql="(cpcompro.moncom-cpcompro.salaju-cpcompro.salcau)>0";
                        $sql="(Select Sum(monimp-monaju-moncau) as moncom from cpimpcom where refcom=cpcompro.refcom) > 0";
                        $t->add(CpcomproPeer::MONCOM,$sql,Criteria::CUSTOM);
                        $reg= CpcomproPeer::doSelectOne($t);              
                    }else {
                        $t= new Criteria();
                        $t->add(CpcomproPeer::REFCOM,$codigo);
                        $t->add(CpcomproPeer::STACOM,'A');
                        $t->add(CpcomproPeer::FECCOM,$fec1,Criteria::LESS_EQUAL);
                        $reg= CpcomproPeer::doSelectOne($t);
                    }                    
                    if ($reg)
                    {
                        $dato2=date('d/m/Y',strtotime($reg->getFeccom()));
                        $dato=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDescom()));     
                         $this->params=array();
                         $this->labels = $this->getLabels();
                         $this->cpajuste = $this->getCpajusteOrCreate();                        
                         $this->configGrid("",$reftipaju,$afeaju,$codigo);                                  
                    }else {
                         $this->params=array();
                         $this->labels = $this->getLabels();
                         $this->cpajuste = $this->getCpajusteOrCreate();                        
                         $this->configGrid();  
                         $js="alert('El Compromiso no se puede ajustar'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                    }                    
                  }else if ($reftipaju=="A") {
                    if ($afeaju=='R')
                    {
                        $t= new Criteria();
                        $t->add(CpcausadPeer::REFCAU,$codigo);
                        $t->add(CpcausadPeer::STACAU,'A');
                        $t->add(CpcausadPeer::FECCAU,$fec1,Criteria::LESS_EQUAL);
                        //$sql="(cpcausad.moncau-cpcausad.salaju-cpcausad.salpag)>0";
                        $sql="(Select Sum(monimp-monaju-monpag) as moncau from cpimpcau where refcau=cpcausad.refcau) > 0";
                        $t->add(CpcausadPeer::MONCAU,$sql,Criteria::CUSTOM);
                        $reg= CpcausadPeer::doSelectOne($t);              
                    }else {
                       $t= new Criteria();
                        $t->add(CpcausadPeer::REFCAU,$codigo);
                        $t->add(CpcausadPeer::STACAU,'A');
                        $t->add(CpcausadPeer::FECCAU,$fec1,Criteria::LESS_EQUAL);
                        $reg= CpcausadPeer::doSelectOne($t); 
                    }                    
                    if ($reg)
                    {
                        $dato2=date('d/m/Y',strtotime($reg->getFeccau()));
                        $dato=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDescau()));     
                         $this->params=array();
                         $this->labels = $this->getLabels();
                         $this->cpajuste = $this->getCpajusteOrCreate();                        
                         $this->configGrid("",$reftipaju,$afeaju,$codigo);                      
                    }else {
                         $this->params=array();
                         $this->labels = $this->getLabels();
                         $this->cpajuste = $this->getCpajusteOrCreate();                        
                         $this->configGrid();  
                         $js="alert('El Causado no se puede ajustar'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                    }    
                  }else {
                        $t= new Criteria();
                        $t->add(CppagosPeer::REFPAG,$codigo);
                        $t->add(CppagosPeer::STAPAG,'A');
                        $t->add(CppagosPeer::FECPAG,$fec1,Criteria::LESS_EQUAL);
                        //$sql="(cppagos.monpag-cppagos.salaju)>0";
                        $sql="(Select Sum(monimp-monaju) as monpag from cpimppag where refpag=cppagos.refpag) > 0";
                        $t->add(CppagosPeer::MONPAG,$sql,Criteria::CUSTOM);
                        $reg= CppagosPeer::doSelectOne($t);
                        if ($reg)
                        {
                             $dato2=date('d/m/Y',strtotime($reg->getFecpag()));
                             $dato=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDespag()));     
                             $this->params=array();
                             $this->labels = $this->getLabels();
                             $this->cpajuste = $this->getCpajusteOrCreate();                        
                             $this->configGrid("",$reftipaju,$afeaju,$codigo);                       
                        }else {
                             $this->params=array();
                             $this->labels = $this->getLabels();
                             $this->cpajuste = $this->getCpajusteOrCreate();                        
                             $this->configGrid();  
                             $js="alert('El Pagado no se puede ajustar'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                        }
                  }
              }else $js="alert('Debe indicar si el ajuste afecta disponibilidad o disminuye disponibilidad');";
          }else $js="alert('Debe seleccionar el Tipo de Ajuste');";                                                                        
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cpajuste_fecmov","'.$dato2.'",""],["javascript","'.$js.'",""]]';
        break; 
    case '3':
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        $c= new Criteria();
        $c->add(CpajustePeer::REFAJU,$this->getRequestParameter('refaju'));
        $data=CpajustePeer::doSelectOne($c);
        if ($data)
        {
          if ($fecha<$data->getFecaju())
          {
            $msj="alert('La Fecha de Anulacion no puede ser menor a la fecha del Ajuste'); $('cpajuste_fecanu').value=''; $('cpajuste_fecanu').focus();";
          }
          else
          {
	        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
	        {
	          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('cpajuste_fecanu').value=''; $('cpajuste_fecanu').focus();";
	        }
	        else { $msj=""; }
          }
        }
        else
        {
          $msj="";
        }
        $output = '[["javascript","'.$msj.'",""]]';
        break;        
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;
  }
  
 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxgrid()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $afeaju = $this->getRequestParameter('cpajuste_afeaju','');
    $refere = $this->getRequestParameter('cpajuste_refere','');
    $fecaju = $this->getRequestParameter('cpajuste_fecaju','');
    $dateFormat = new sfDateFormat('es_VE');
    $fec2 = $dateFormat->format($fecaju, 'i', $dateFormat->getInputPattern('d'));
    $reftipaju = $this->getRequestParameter('cpajuste_reftipaju','');
    $javascript="";  $jsonextra="";

    switch ($col) {   
          case ('2'):  //Monto Ajuste
            if (H::toFloat($grid[$fila][1])>=0)
            {
              if ($grid[$fila][0]!="")
              {
                 if ($afeaju=='R') {
                   if (H::toFloat($grid[$fila][1])>H::toFloat($grid[$fila][2]))   {
                        $grid[$fila][$col-1]="";
                        $javascript="alert('El Monto a Ajustar no puede ser mayor al Monto de la Imputacion');";
                   }else {                       
                       if ($reftipaju=='P') {  //Precompromisos
                           $tipdoc=H::getX_vacio ('REFPRC', 'Cpprecom', 'Tipprc', $refere);
                           $temp='PRC';
                           $afedis='S';         
                           $q= new Criteria();
                           $q->add(CpimpcomPeer::REFERE,$refere);
                           $q->add(CpimpcomPeer::CODPRE,$grid[$fila][0]);
                           $q->add(CpimpcomPeer::STAIMP,'A');
                           $resulq= CpimpcomPeer::doSelectOne($q);
                           if ($resulq){     
                              if ($resulq->getMonaju()==0 && H::toFloat($grid[$fila][2])==0) {
                                $grid[$fila][$col-1]="0,00";
                                $javascript="alert('Debe ajustar primero el Compromiso');";
                              }else {                      
                               //$monto=$resulq->getMonimp()-$resulq->getMonaju();
                               $q1 = new Criteria();
                               $q1->add(CpimpprcPeer::REFPRC,$refere);
                               $q1->add(CpimpprcPeer::CODPRE,$grid[$fila][0]);
                               $resulq1= CpimpprcPeer::doSelectOne($q1);
                               if ($resulq1){
                                 $monto1=$resulq1->getMonimp()-$resulq1->getMoncom()-$resulq1->getMonaju();
                                 //$dif=$monto-$monto1;
                                 if (H::toFloat($grid[$fila][1])>H::toFloat($monto1)) {
                                  $grid[$fila][$col-1]="0,00";
                                  $javascript="alert('El Monto a Ajustar sobrepasa el Monto del Compromiso');";                                 
                                }
                               }
                              }                            
                            }               
                       } else if ($reftipaju=='C') { //Compromisos
                           $tipdoc=H::getX_vacio ('REFCOM', 'Cpcompro', 'Tipcom', $refere);
                           $temp='COM';
                           $sql="Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as afedis,(case when RefPrc='S' then 'P' else 'N' end) as refier from CPDocCom where TipCom='" . $tipdoc . "'";
                           if (Herramientas::BuscarDatos($sql,$result))
                           {
                               $afedis=$result[0]["afedis"];                               
                           }
                           $q= new Criteria();
                           $q->add(CpimpcauPeer::REFERE,$refere);
                           $q->add(CpimpcauPeer::CODPRE,$grid[$fila][0]);
                           $q->add(CpimpcauPeer::STAIMP,'A');//para que nunca entre, esta validacion esta mal formulada
                           $resulq= CpimpcauPeer::doSelectOne($q);
                           if ($resulq){     
                              if ($resulq->getMonaju()==0 && H::toFloat($grid[$fila][2])==0) {
                                 $grid[$fila][$col-1]="0,00";
                                 $javascript="alert('Debe ajustar primero el Causado');";
                              }else {                      
                               //$monto=$resulq->getMonimp()-$resulq->getMonaju();
                               $q1 = new Criteria();
                               $q1->add(CpimpcomPeer::REFCOM,$refere);
                               $q1->add(CpimpcomPeer::CODPRE,$grid[$fila][0]);
                               $resulq1= CpimpcomPeer::doSelectOne($q1);
                               if ($resulq1){
                                 $monto1=$resulq1->getMonimp()-$resulq1->getMoncau()-$resulq1->getMonaju();
                                 //$dif=$monto-$monto1;
                                 if (H::toFloat($grid[$fila][1])>H::toFloat($monto1)) {
                                  $grid[$fila][$col-1]="0,00";
                                  $javascript="alert('El Monto a Ajustar sobrepasa el Monto del Ajuste de Causado');";                                 
                                }
                               }
                              }                            
                            }
                       } else if ($reftipaju=='A')  { //Causados
                           $tipdoc=H::getX_vacio ('REFCAU', 'Cpcausad', 'Tipcau', $refere);                       
                           $temp='CAU';
                           $sql="Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as afedis,refier as refier from CPDocCau where TipCau='" . $tipdoc . "'";
                           if (Herramientas::BuscarDatos($sql,$result))
                           {
                               $afedis=$result[0]["afedis"];
                           }
                           $q= new Criteria();
                           $q->add(CpimppagPeer::REFERE,$refere);
                           $q->add(CpimppagPeer::CODPRE,$grid[$fila][0]);
                           $q->add(CpimppagPeer::STAIMP,'A');
                           $resulq= CpimppagPeer::doSelectOne($q);
                           if ($resulq){     
                              if ($resulq->getMonaju()==0 && H::toFloat($grid[$fila][2])==0) {
                                $grid[$fila][$col-1]="0,00";
                                $javascript="alert('Debe ajustar primero el Pagado');";
                              }else {                      
                               //$monto=$resulq->getMonimp()-$resulq->getMonaju();
                               $q1 = new Criteria();
                               $q1->add(CpimpcauPeer::REFCAU,$refere);
                               $q1->add(CpimpcauPeer::CODPRE,$grid[$fila][0]);
                               $q1->add(CpimpcauPeer::REFERE,$grid[$fila][4]);
                               $resulq1= CpimpcauPeer::doSelectOne($q1);
                               if ($resulq1){
                                 $monto1=$resulq1->getMonimp()-$resulq1->getMonpag()-$resulq1->getMonaju();
                                 //$dif=$monto-$monto1;
                                 if (H::toFloat($grid[$fila][1])>H::toFloat($monto1)) {
                                  $grid[$fila][$col-1]="0,00";
                                  $javascript="alert('El Monto a Ajustar sobrepasa el Monto del Ajuste del Pagado');";                                 
                                }
                               }
                              }                            
                            }
                       } else { //Pagados
                           $tipdoc=H::getX_vacio ('REFPAG', 'Cppagos', 'Tippag', $refere);
                           $temp='PAG';
                           $sql="Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as afedis,refier as refier from CPDocPag where TipPag='" . $tipdoc . "'";
                           if (Herramientas::BuscarDatos($sql,$result))
                           {
                               $afedis=$result[0]["afedis"];
                           }
                       }                
                   }
                 }else {
                     if ($reftipaju=='P') { //Precompromiso
                           $tipdoc=H::getX_vacio ('REFPRC', 'Cpprecom', 'Tipprc', $refere);
                           $temp='PRC';
                           $afedis='S';                        
                       } else if ($reftipaju=='C') { //Compromisos
                           $tipdoc=H::getX_vacio ('REFCOM', 'Cpcompro', 'Tipcom', $refere);
                           $temp='COM';
                           $sql="Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as afedis,(case when RefPrc='S' then 'P' else 'N' end) as refier from CPDocCom where TipCom='" . $tipdoc . "'";
                           if (Herramientas::BuscarDatos($sql,$result))
                           {
                               $afedis=$result[0]["afedis"];                               
                           }
                           $q= new Criteria();
                           $q->add(CpimpcomPeer::REFCOM,$refere);
                           $q->add(CpimpcomPeer::CODPRE,$grid[$fila][0]);
                           $resulq= CpimpcomPeer::doSelectOne($q);
                           if ($resulq){                            
                            if ($resulq->getRefere()!=""){
                               $monto=$resulq->getMonimp()-$resulq->getMonaju();
                               $q1 = new Criteria();
                               $q1->add(CpimpprcPeer::REFPRC,$resulq->getRefere());
                               $q1->add(CpimpprcPeer::CODPRE,$grid[$fila][0]);
                               $q1->add(CpimpprcPeer::STAIMP,'A');                               
                               $resulq1= CpimpprcPeer::doSelectOne($q1);
                               if ($resulq1){
                                 if ($resulq1->getMonaju()==0) {
                                   $grid[$fila][$col-1]="0,00";
                                   $javascript="alert('Debe ajustar primero el Precompromiso');";
                                 }
                                 else { 
                                   $monto1=$resulq1->getMonimp()-$resulq1->getMonaju();
                                   $dif=$monto1-$monto;
                                   if (H::toFloat($grid[$fila][1])>H::toFloat($dif)){
                                    $grid[$fila][$col-1]="0,00";
                                    $javascript="alert('El Monto a Ajustar sobrepasa el Monto del Precompromiso');";
                                  }
                                 }
                               }
                            }
                            }
                       } else if ($reftipaju=='A')  { //Causados
                           $tipdoc=H::getX_vacio ('REFCAU', 'Cpcausad', 'Tipcau', $refere);                       
                           $temp='CAU';
                           $sql="Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as afedis,refier as refier from CPDocCau where TipCau='" . $tipdoc . "'";
                           if (Herramientas::BuscarDatos($sql,$result))
                           {
                               $afedis=$result[0]["afedis"];                               
                           }
                           $q= new Criteria();
                           $q->add(CpimpcauPeer::REFCAU,$refere);
                           $q->add(CpimpcauPeer::CODPRE,$grid[$fila][0]);
                           $resulq= CpimpcauPeer::doSelectOne($q);
                           if ($resulq){                            
                            if ($resulq->getRefere()!=""){
                               $monto=$resulq->getMonimp()-$resulq->getMonaju();
                               $q1 = new Criteria();
                               $q1->add(CpimpcomPeer::REFCOM,$resulq->getRefere());
                               $q1->add(CpimpcomPeer::CODPRE,$grid[$fila][0]);
                               $q1->add(CpimpcomPeer::STAIMP,'A');
                               $resulq1= CpimpcomPeer::doSelectOne($q1);
                               if ($resulq1){
                                 if ($resulq1->getMonaju()==0){
                                   $grid[$fila][$col-1]="0,00";
                                   $javascript="alert('Debe ajustar primero el Compromiso');";
                                 }
                                 else { 
                                   $monto1=$resulq1->getMonimp()-$resulq1->getMonaju();
                                   $dif=$monto1-$monto;
                                   if (H::toFloat($grid[$fila][1])>H::toFloat($dif)){
                                    $grid[$fila][$col-1]="0,00";
                                    $javascript="alert('El Monto a Ajustar sobrepasa el Monto del Compromiso');";
                                  }
                                 }
                               }
                            }
                            }
                       } else { //Pagados
                           $tipdoc=H::getX_vacio ('REFPAG', 'Cppagos', 'Tippag', $refere);
                           $temp='PAG';
                           $sql="Select coalesce((case when Afedis='N' then 'N' else 'S' end),'S') as afedis,refier as refier from CPDocPag where TipPag='" . $tipdoc . "'";
                           if (Herramientas::BuscarDatos($sql,$result))
                           {
                               $afedis=$result[0]["afedis"];                               
                           }
                           $q= new Criteria();
                           $q->add(CpimppagPeer::REFPAG,$refere);
                           $q->add(CpimppagPeer::CODPRE,$grid[$fila][0]);
                           $resulq= CpimppagPeer::doSelectOne($q);
                           if ($resulq){                            
                            if ($resulq->getRefere()!=""){
                               $monto=$resulq->getMonimp()-$resulq->getMonaju();
                               $q1 = new Criteria();
                               $q1->add(CpimpcauPeer::REFCAU,$resulq->getRefere());
                               $q1->add(CpimpcauPeer::CODPRE,$grid[$fila][0]);
                               $q1->add(CpimpcauPeer::STAIMP,'A');
                               $resulq1= CpimpcauPeer::doSelectOne($q1);
                               if ($resulq1){
                                 if ($resulq1->getMonaju()==0 && $monto>$resulq1->getMonimp()){
                                   $grid[$fila][$col-1]="0,00";
                                   $javascript="alert('Debe ajustar primero el Causado');";
                                 }
                                 else { 
                                   $monto1=$resulq1->getMonimp()-$resulq1->getMonaju();
                                   $dif=$monto1-$monto;
                                   if (H::toFloat($grid[$fila][1])>H::toFloat($dif)){
                                    $grid[$fila][$col-1]="0,00";
                                    $javascript="alert('El Monto a Ajustar sobrepasa el Monto del Causado');";
                                  }
                                 }
                               }
                            }
                            }
                       }
                     if ($javascript=="" && $afedis=='S') {
                       $codpre=H::getCodPreDis($grid[$fila][0]);
                       $disponible = H::Monto_disponible($codpre,$fec2);
                       if (H::toFloat($grid[$fila][1]) > H::toFloat($disponible)){
                            $grid[$fila][$col-1]="0,00";
                            $javascript="alert('El Monto a Ajustar es mayor al Monto Disponible.');";
                       } 
                     }                        
                 }                     
              }
            }else {
                $grid[$fila][$col-1]="0,00";
                $javascript="alert('El Monto a Ajustar debe ser mayor a cero'); ActualizarSaldosGrid('a',ArrTotales_a);";
            }
            $javascript.="calcularTotales()";                   
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          default:
            break;
        }

    $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
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
        $this->cpajuste = $this->getCpajusteOrCreate();
        try{ $this->updateCpajusteFromRequest();}
        catch (Exception $ex){}
       
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($this->getRequestParameter('cpajuste[fecaju]'), 'i', $dateFormat->getInputPattern('d'));
        
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($this->getRequestParameter('cpajuste[fecmov]'), 'i', $dateFormat->getInputPattern('d'));
        
        if (!H::validarPeriodoFiscal($this->getRequestParameter('cpajuste[fecaju]')))
        {
          $this->coderr=1334;
          return false;
      	}
        
         if (!Tesoreria::validarPeriodo($fec1, 'CPDEFNIV', $error))
      	{
          $this->coderr=$error;
          return false;
      	}
        
        if ($fec1<$fec2)
        {
          $this->coderr=23;
          return false;
      	}
        
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
        if (count($grid[0])==0)
            $this->coderr=1342;

        if (H::toFloat($this->getRequestParameter('cpajuste[totaju]'))==0)
          $this->coderr=1399;

        $gencomaju=H::getConfApp2('gencomaju', 'presupuesto', 'preajuste');

        if ($gencomaju=='S' && $this->validarGeneraComprobante() && ($this->getRequestParameter('cpajuste[reftipaju]')=='A' || $this->getRequestParameter('cpajuste[reftipaju]')=='G')){
          $this->coderr=508;
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
      if ($clasemodelo->getId())
      {
          $q= new Criteria();
          $q->add(CpajustePeer::REFAJU,$clasemodelo->getRefaju());
          $reg= CpajustePeer::doSelectOne($q);
          if ($reg)
          {
              $reg->setDesaju($clasemodelo->getDesaju());
              $reg->save();
          }          
      }else  {      
          $grid = Herramientas::CargarDatosGridv2($this,$this->obj);    
          $gencomaju=H::getConfApp2('gencomaju', 'presupuesto', 'preajuste');
          if ($gencomaju=='S')
            self::GenerarComprobante($clasemodelo, $grid);          
          Presupuesto::SalvarAjustesEjecucion($clasemodelo,$grid);
      }
    return -1;
  }

  public function deleting($clasemodelo)
  {
    $acum=0;
    $q= new Criteria();
    $q->add(CpmovajuPeer::REFAJU,$clasemodelo->getRefaju());
    $resulq= CpmovajuPeer::doSelect($q);
    if ($resulq){
      foreach ($resulq as $objq) {
        $acum+=$objq->getMonaju();
      }      
    }
    if ($acum<0)  $afeaju='S';
    else  $afeaju='R';

    $reftipaju=H::getX_vacio('TIPAJU','Cpdocaju','Refier',$clasemodelo->getTipaju());
    if ($afeaju=='R'){
      if ($reftipaju=='P') { //Ajuste Precompromiso
        $tipprc=H::getX_vacio('REFPRC','Cpprecom','Tipprc',$clasemodelo->getRefere());
        $afedis=H::getX_vacio('TIPPRC','Cpdocprc','Afedis',$tipprc);
         $q= new Criteria();
         $q->add(CpimpprcPeer::REFPRC,$clasemodelo->getRefere());
         $q->add(CpimpprcPeer::STAIMP,'A');
         $resulq= CpimpprcPeer::doSelect($q);
         if ($resulq){   
           foreach ($resulq as $objq) {
              if ($afedis=='R') {
               $codpre=H::getCodPreDis($objq->getCodpre());
               $disponible = H::Monto_disponible($codpre,date('Y-m-d'));
               if (H::toFloat($objq->getMonaju()) > $disponible){
                 return 4003;
               }
             }else {
               $t= new Criteria();
               $t->add(CpmovajuPeer::REFAJU,$clasemodelo->getRefaju(),Criteria::NOT_EQUAL);
               $t->add(CpmovajuPeer::REFPRC,$clasemodelo->getRefere());      
               $t->add(CpmovajuPeer::REFCOM,'NULO',Criteria::NOT_EQUAL);  
               $t->add(CpmovajuPeer::STAMOV,'A');
               $result= CpmovajuPeer::doSelectOne($t);
               if ($result)
                return 4001;
             }
           }
         
        H::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());     
        H::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
        H::EliminarRegistro('Cpmovaju', 'Refaju', $clasemodelo->getRefaju());            
        $clasemodelo->delete();                       
      }
     } else if ($reftipaju=='C') { //Ajuste Compromiso
         $tipcom=H::getX_vacio('REFCOM','Cpcompro','Tipcom',$clasemodelo->getRefere());
         $afedis=H::getX_vacio('TIPCOM','Cpdoccom','Afedis',$tipcom);         
         $q= new Criteria();
         $q->add(CpimpcomPeer::REFCOM,$clasemodelo->getRefere());
         $q->add(CpimpcomPeer::STAIMP,'A');
         $resulq= CpimpcomPeer::doSelect($q);
         if ($resulq){     
          foreach ($resulq as $obj1) {
            if ($afedis=='R'){
              $codpre=H::getCodPreDis($obj1->getCodpre());
               $disponible = H::Monto_disponible($codpre,date('Y-m-d'));
               if (H::toFloat($obj1->getMonaju()) > H::toFloat($disponible)){
                 return 4003;
               }
            }else {
              if ($obj1->getRefere()!='NULO'){
               $t= new Criteria();
               $t->add(CpmovajuPeer::REFAJU,$clasemodelo->getRefaju(),Criteria::NOT_EQUAL);
               $t->add(CpmovajuPeer::REFCOM,$clasemodelo->getRefere());
               $t->add(CpmovajuPeer::REFPRC,$obj1->getRefere());              
               $t->add(CpmovajuPeer::REFCAU,'NULO',Criteria::NOT_EQUAL);  
               $t->add(CpmovajuPeer::STAMOV,'A');
               $result= CpmovajuPeer::doSelectOne($t);
               if ($result)
                return 4004;                                                  
              }
            }
          }
            H::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());     
            H::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
            H::EliminarRegistro('Cpmovaju', 'Refaju', $clasemodelo->getRefaju());
            $clasemodelo->delete();   
         }
     } else if ($reftipaju=='A')  {  //Ajuste Causado
         $tipcau=H::getX_vacio('REFCAU','Cpcausad','Tipcau',$clasemodelo->getRefere());
         $afedis=H::getX_vacio('TIPCAU','Cpdoccau','Afedis',$tipcau);         
         $q1 = new Criteria();
         $q1->add(CpimpcauPeer::REFCAU,$clasemodelo->getRefere());
         $q1->add(CpimpcauPeer::STAIMP,'A');
         $resulq1= CpimpcauPeer::doSelect($q1);
         if ($resulq1){     
           foreach ($resulq1 as $obj1) {
             if ($afedis=='R'){
               $codpre=H::getCodPreDis($obj1->getCodpre());
               $disponible = H::Monto_disponible($codpre,date('Y-m-d'));
               if (H::toFloat($obj1->getMonaju()) > H::toFloat($disponible)){
                 return 4003;
               }
             }else {
               if ($obj1->getRefere()!='NULO' && $obj1->getMonaju()!=0){              
                   $t= new Criteria();
                   $t->add(CpmovajuPeer::REFAJU,$clasemodelo->getRefaju(),Criteria::NOT_EQUAL);
                   $t->add(CpmovajuPeer::REFCAU,$clasemodelo->getRefere());
                   $t->add(CpmovajuPeer::REFCOM,$obj1->getRefere());
                   $t->add(CpmovajuPeer::REFPRC,$obj1->getRefprc());
                   $t->add(CpmovajuPeer::REFPAG,'NULO',Criteria::NOT_EQUAL);
                   $t->add(CpmovajuPeer::STAMOV,'A');
                   $result= CpmovajuPeer::doSelectOne($t);
                   if ($result)
                    return 4005;
               }
            }
           } 
           H::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());     
           H::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
           H::EliminarRegistro('Cpmovaju', 'Refaju', $clasemodelo->getRefaju());
           $clasemodelo->delete();
         }                                   
     } else {  //Ajuste Pagado
      $tippag=H::getX_vacio('REFPAG','Cppagos','Tippag',$clasemodelo->getRefere());
      $afedis=H::getX_vacio('TIPPAG','Cpdocpag','Afedis',$tippag);
      if ($afedis=='R'){
         $q= new Criteria();
         $q->add(CpimppagPeer::REFPAG,$clasemodelo->getRefere());
         $q->add(CpimppagPeer::STAIMP,'A');
         $resulq= CpimppagPeer::doSelect($q);
         if ($resulq){                            
           foreach ($resulq as $obj1) {
               $codpre=H::getCodPreDis($objq->getCodpre());
               $disponible = H::Monto_disponible($codpre,date('Y-m-d'));
               if (H::toFloat($objq->getMonaju()) > H::toFloat($disponible)){
                 return 4003;
               }
           } 
         }
      }
     H::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());     
     H::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
     H::EliminarRegistro('Cpmovaju', 'Refaju', $clasemodelo->getRefaju());
     $clasemodelo->delete();       
     }
    }else {  //Suma
      if ($reftipaju=='P') { //Ajuste Precompromiso
            H::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());     
            H::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
            H::EliminarRegistro('Cpmovaju', 'Refaju', $clasemodelo->getRefaju());
            $clasemodelo->delete();             
     } else if ($reftipaju=='C') { //Ajuste Compromiso
         $q= new Criteria();
         $q->add(CpimpcomPeer::REFCOM,$clasemodelo->getRefere());
         $q->add(CpimpcomPeer::STAIMP,'A');
         $resulq= CpimpcomPeer::doSelect($q);
         if ($resulq){     
           foreach ($resulq as $obj1) {
             if ($obj1->getRefere()!='NULO'){
                 $t= new Criteria();
                 $t->add(CpmovajuPeer::REFAJU,$clasemodelo->getRefaju(),Criteria::NOT_EQUAL);
                 $t->add(CpmovajuPeer::REFPRC,$obj1->getRefere());
                 $t->add(CpmovajuPeer::REFCOM,'NULO');
                 $t->add(CpmovajuPeer::STAMOV,'A');
                 $result= CpmovajuPeer::doSelectOne($t);
                 if ($result)
                  return 4000;
             }
           } 
           H::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());     
           H::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
           H::EliminarRegistro('Cpmovaju', 'Refaju', $clasemodelo->getRefaju());
           $clasemodelo->delete();
         }
     } else if ($reftipaju=='A')  {  //Ajuste Causado
         $q1 = new Criteria();
         $q1->add(CpimpcauPeer::REFCAU,$clasemodelo->getRefere());
         $q1->add(CpimpcauPeer::STAIMP,'A');
         $resulq1= CpimpcauPeer::doSelect($q1);
         if ($resulq1){     
           foreach ($resulq1 as $obj1) {
             if ($obj1->getRefere()!='NULO'){
                 $t= new Criteria();
                 $t->add(CpmovajuPeer::REFAJU,$clasemodelo->getRefaju(),Criteria::NOT_EQUAL);
                 $t->add(CpmovajuPeer::REFCOM,$obj1->getRefere());
                 $t->add(CpmovajuPeer::REFCAU,'NULO');
                 $t->add(CpmovajuPeer::STAMOV,'A');
                 $result= CpmovajuPeer::doSelectOne($t);
                 if ($result)
                  return 4001;
             }
           } 
           H::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());     
           H::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
           H::EliminarRegistro('Cpmovaju', 'Refaju', $clasemodelo->getRefaju());
           $clasemodelo->delete();
         }                                   
     } else {  //Ajuste Pagado
         $q1 = new Criteria();
         $q1->add(CpimppagPeer::REFPAG,$clasemodelo->getRefere());
         $q1->add(CpimppagPeer::STAIMP,'A');
         $resulq1= CpimppagPeer::doSelect($q1);
         if ($resulq1){     
           foreach ($resulq1 as $obj1) {
             if ($obj1->getRefere()!='NULO'){
               $t= new Criteria();
               $t->add(CpmovajuPeer::REFAJU,$clasemodelo->getRefaju(),Criteria::NOT_EQUAL);
               $t->add(CpmovajuPeer::REFCAU,$obj1->getRefere());
               $t->add(CpmovajuPeer::REFPAG,'NULO');
               $t->add(CpmovajuPeer::STAMOV,'A');
               $result= CpmovajuPeer::doSelectOne($t);
               if ($result)
                return 4004;
          }
        }
         H::EliminarRegistro('Contabc1', 'Numcom', $clasemodelo->getNumcom());     
         H::EliminarRegistro('Contabc', 'Numcom', $clasemodelo->getNumcom());      
         H::EliminarRegistro('Cpmovaju', 'Refaju', $clasemodelo->getRefaju());
         $clasemodelo->delete();
       }
       }
     }          
    return -1;
  }
  
  public function GenerarComprobante($clasemodelo, $grid)
  {
      $concom=1;
      $form="sf_admin/preajuste/confincomgen";
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          $this->numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));

          $clasemodelo->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
  }
  
  public function validarGeneraComprobante()
  {
    $form="sf_admin/preajuste/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
  }
  
/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->cpajuste = $this->getCpajusteOrCreate();
     $this->updateCpajusteFromRequest();
     $this->editing();
     $detalle=Herramientas::CargarDatosGridv2($this,$this->obj);

     $concom   = 0;
     $msjuno      = "";
     $comprobante = "";
     $this->msjtres  = "";
     $this->i        = "";
     $this->formulario = array();

     if ($this->cpajuste->getAfeaju()=="" || count($detalle[0])==0)
     {
       $this->msjtres="No se puede Generar el Comprobante, Verique si selecciono Si afecta Negativamente o Positivamente y si cargo el detalle de los Movimientos, para luego generar el comprobante";
     }

     if ($this->msjtres=="")
     {
      $x = Presupuesto::generarComprobanteAjuste($this->cpajuste,$detalle,$comprobante,$msjuno);
      if ($msjuno=="") {
      $concom = $concom + 1;

      $form = "sf_admin/preajuste/confincomgen";
      $i    = 0;
      while ($i < $concom)
      {
       $f[$i] = $form.$i;
       $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
       $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
       $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
       $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
       $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
       $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
       $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
       $this->getUser()->setAttribute('tipmov', '');
       $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
       $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
       $i++;
      }
      $this->i = $concom - 1;
      $this->formulario = $f;
      }else {
        $this->msjtres=$msjuno;
      }
     }
      $output =  '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
  
  public function executeAnular()
  {
    $this->referencia=$this->getRequestParameter('referencia');
    $refaju = $this->getRequestParameter('refaju');
    $fecaju = $this->getRequestParameter('fecaju');
    
    $fectra = split('/', $fecaju);
    $fectra = $fectra[2] . "-" . $fectra[1] . "-" . $fectra[0];

    //Buscamos el movimiento a anular
    $c = new Criteria();
    $c->add(CpajustePeer::REFAJU,$refaju);
    $c->add(CpajustePeer::FECAJU,$fectra);
    $this->cpajuste= CpajustePeer::doSelectOne($c);

    sfView::SUCCESS;

  }

  public function executeSalvaranu()
  {
    $refaju=$this->getRequestParameter('refaju');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $fecaju=$this->getRequestParameter('fecaju');
    
    $fectra = split('/', $fecanu);
    $fectra = $fectra[2] . "-" . $fectra[1] . "-" . $fectra[0];    

    $gencomaju=H::getConfApp2('gencomaju', 'presupuesto', 'preajuste');
    $this->msg=-1;
    
  //Buscamo el registro para su anulacion
    $c = new Criteria();
    $c->add(CpajustePeer::REFAJU,$refaju);
    $c->add(CpajustePeer::FECAJU,$fecaju);
    $this->cpajuste = CpajustePeer::doSelectOne($c);
     if ($this->cpajuste) {
      if ($gencomaju=='S')
         $this->msg=Presupuesto::anular_comprobante($this->cpajuste,$fectra);  
   
       if ($this->msg==-1) {
           $this->msg="";
          $this->cpajuste->setDesanu($desanu);
          $this->cpajuste->setFecanu($fectra);
          $this->cpajuste->setStaaju('N');
          $this->cpajuste->save();
      
          //Anular el detalle
            $c = new Criteria();
            $c->add(CpmovajuPeer::REFAJU,$refaju);
            $detalle= CpmovajuPeer::doSelect($c);
             if ($detalle) {
                    foreach ($detalle as $impaju){
                      $impaju->setStamov('N');
                      $impaju->save();
                    }
             }
      }
   } 
   
    sfView::SUCCESS;
  }  


}
