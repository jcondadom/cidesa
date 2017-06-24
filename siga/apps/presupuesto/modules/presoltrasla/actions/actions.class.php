<?php

/**
 * presoltrasla actions.
 *
 * @package    siga
 * @subpackage presoltrasla
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class presoltraslaActions extends autopresoltraslaActions
{



  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridDesde();
    $this->configGridHasta();
    $this->configGridDetalle();
    $this->configGrid2($this->cpsoltrasla->getReftra());
    $this->configGrid3();
    $this->configGrid4();
      if (!$this->cpsoltrasla->getId())
    {
        $this->getUser()->getAttributeHolder()->remove('grabosol','presoltrasla');
        $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
        if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t); 
         if ($regt){
          if ($this->cpsoltrasla->getCoddirec()=='')
            $this->cpsoltrasla->setCoddirec($regt->getCoddirec());
         }
        
      }
    }

  }

  public function configGridDesde()
  {

    $reg = array(); 
    $mandisper=H::getConfApp2('mandisper', 'presupuesto', 'PreSolTrasla');

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/presoltrasla/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_desde');
    $mascarapar = $this->cpsoltrasla->getMascara();
    $lonpar = strlen($mascarapar);
    $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
    $parametros= array('param1' => $categoriasusu);

    $this->columnas[1][0]->setHTML('type="text" size="45" maxlength="'.chr(39).$lonpar.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapar.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="validarNoRepetido(this.id); validarOrigenDestino(this.id); toAjax(\'1\',getUrlModuloAjax(),this.value,\'\',\'&ides=\'+this.id)"');
    $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Presoltrasla_Cpasiini3',$parametros);
    $this->columnas[0]->setEliminar(true,'CalcularTotalDist()');

    if ($mandisper=='S') 
        $this->columnas[1][2]->setOculta(false);
    
    $this->objD =$this->columnas[0]->getConfig($reg);
    $params=$this->params;
    $params['objdesde'] = $this->objD;
    $this->params = $params;
  }

  public function configGridHasta()
  {
    $reg = array();
    $mandisper=H::getConfApp2('mandisper', 'presupuesto', 'PreSolTrasla');
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/presoltrasla/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_hasta');
    $mascarapar = $this->cpsoltrasla->getMascara();
    $lonpar = strlen($mascarapar);
    $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
    $parametros= array('param1' => $categoriasusu);

    $this->columnas[1][0]->setHTML('type="text" size="45" maxlength="'.chr(39).$lonpar.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapar.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="validarNoRepetido(this.id); validarOrigenDestino(this.id); toAjax(\'1\',getUrlModuloAjax(),this.value,\'\',\'&ides=\'+this.id)"');
    $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Presoltrasla_Cpasiini3',$parametros);
    $this->columnas[0]->setEliminar(true,'CalcularTotalDist()');
    if ($mandisper=='S') 
        $this->columnas[1][2]->setOculta(false);

    $this->objH =$this->columnas[0]->getConfig($reg);
    $params=$this->params;
    $params['objhasta'] = $this->objH;
    $this->params = $params;
  }

  public function configGridDetalle($reg=array())
  {
    $mandisper=H::getConfApp2('mandisper', 'presupuesto', 'PreSolTrasla');
    
    if($this->cpsoltrasla->getId()){
      $c = new Criteria();
      $c->add(CpsolmovtraPeer::REFTRA,$this->cpsoltrasla->getReftra());
      $reg = CpsolmovtraPeer::doSelect($c);

      }
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/presoltrasla/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle_new');
    if ($mandisper=='S' && $this->cpsoltrasla->getId()){
      $this->columnas[1][1]->setOculta(false);
      $this->columnas[1][4]->setOculta(false);
    }
    
    $this->objDetalle = $this->columnas[0]->getConfig($reg);//$objdetalle;
    $this->cpsoltrasla->setDetalle($this->objDetalle);


  }

    public function configGrid2($refdoc=''){ //Eventos
    $c = new Criteria();
    $c->add(CpdisevePeer::REFDOC ,$refdoc);
    $c->add(CpdisevePeer::TIPMOV ,'TRA');
    $result = CpdisevePeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid('grid_eventos');
    $mascara=H::formatoPresupuesto();
    $loncod=strlen($mascara);
    $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
    $params= array('param1' => $categoriasusu);
      
    $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Preprecom_Cpasiini2',$params);
    
    $this->obj2 = $this->columnas[0]->getConfig($result);
    $this->cpsoltrasla->setObj2($this->obj2);    
  }  

  public function configGrid3($reftra='', $codori='',$nuevo=''){ //Distribución por Período Origen
    $c = new Criteria();
    $c->add(CpsolmovtraperoriPeer::REFTRA ,$reftra);
    $c->add(CpsolmovtraperoriPeer::CODORI ,$codori);
    $result = CpsolmovtraperoriPeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/presoltrasla/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_perdes');
    if($nuevo=='S'){
       $this->columnas[1][0]->setHTML('type="text" size="10" readOnly="true"');
       $this->columnas[1][1]->setHTML('type="text" size="10" readOnly="true"');
       $this->columnas[1][0]->setAjaxgrid(false);
       $this->columnas[1][1]->setAjaxgrid(false);
    }
    $this->obj3 = $this->columnas[0]->getConfig($result);

    $this->cpsoltrasla->setObj3($this->obj3);    
  } 

  public function configGrid4($reftra='', $coddes='', $nuevo=''){ //Distribución por Período Destino
    $c = new Criteria();
    $c->add(CpsolmovtraperdesPeer::REFTRA ,$reftra);
    $c->add(CpsolmovtraperdesPeer::CODDES ,$coddes);
    $result = CpsolmovtraperdesPeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/presoltrasla/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_perhas');
    
    if($nuevo=='S'){
       $this->columnas[1][0]->setHTML('type="text" size="10" readOnly="true"');
       $this->columnas[1][1]->setHTML('type="text" size="10" readOnly="true"');
       $this->columnas[1][0]->setAjaxgrid(false);
       $this->columnas[1][1]->setAjaxgrid(false);
    }

    $this->obj4 = $this->columnas[0]->getConfig($result);

    $this->cpsoltrasla->setObj4($this->obj4);    
  }   

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $ides= $this->getRequestParameter('ides','');
    $this->ajaxs=$ajax;

    switch ($ajax){
      case '1':
        $monto = $this->getRequestParameter('monto','');
        $valiny=H::getConfApp2('valiny', 'presupuesto', 'PreSolTrasla');  
        $name=explode('_', $ides) ;
        $reg = CpdefnivPeer::doSelectOne(new Criteria());
        $msj=$js="";     
        if ($reg){
            if (strlen($codigo) != strlen($reg->getForPre()) ){
                $msj = "alert('El Titulo Presupuestario no es de último nivel.'); $('$ides').value=''; $('$monto').value='';";
            }else{
              if ($valiny=='S'){
                $s= new Criteria();
                if ($name[0]=='ax'){
                  $s->add(CpsolmovtraPeer::CODORI,$codigo);
                  $js="alert_('El C&oacute;digo Presupuestario de Origen ya se le ha inyectado dinero'); $('$ides').value='';";
                }else{
                  $s->add(CpsolmovtraPeer::CODDES,$codigo);
                  $js="alert_('El C&oacute;digo Presupuestario de Destino ya se le ha sacado dinero'); $('$ides').value='';";
                }
                $regs= CpsolmovtraPeer::doSelectOne($s);
                if ($regs){
                  $msj = $js;
                }else {
                  $s= new Criteria();
                  if ($name[0]=='ax'){
                    $s->add(CpsoladidisPeer::ADIDIS,'A');
                    $js="alert_('El C&oacute;digo Presupuestario de Origen ya se le ha inyectado dinero'); $('$ides').value='';";
                  }else{
                    $s->add(CpsoladidisPeer::ADIDIS,'D');
                    $js="alert_('El C&oacute;digo Presupuestario de Destino ya se le ha sacado dinero'); $('$ides').value='';";
                  }
                  $s->add(CpsolmovadiPeer::CODPRE,$codigo);
                  $s->addJoin(CpsoladidisPeer::REFADI,CpsolmovadiPeer::REFADI);
                  $regs= CpsoladidisPeer::doSelectOne($s);
                  if ($regs){
                    $msj = $js;
                  }else {
                    $c = new Criteria();
                    $c->add(CpdeftitPeer::CODPRE, $codigo);
                    $cpasiini = CpdeftitPeer::doSelectOne($c);
                    if ($cpasiini){
                       $z= new Criteria();
                       $z->add(CpasiiniPeer::CODPRE,$codigo);
                       $z->add(CpasiiniPeer::PERPRE,'00');
                       $regz= CpasiiniPeer::doSelectOne($z);
                       if ($regz) {
                         $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
                         $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
                         if ($categoriasusu!="") {
                            $y = new Criteria();
                            $y->add(SegcatusuPeer::LOGUSE,$loguse);
                            $y->add(SegcatusuPeer::CODCAT,substr($codigo,0,strlen(H::getObtener_FormatoCategoria())));                        
                            $regs2 = SegcatusuPeer::doSelectOne($y);
                            if (!$regs2) {
                             $msj = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario'); $('$ides').value='';";
                            }
                          }
                        }else {
                          $msj = "alert_('El Titulo Presupuestario no tiene Asignaci&oacute;n Inicial.'); $('$ides').value='';";
                        }
                    }else{
                        $msj = "alert('El Titulo Presupuestario no existe.'); $('$ides').value='';";
                    } 
                  }
                }
               }else {
                $c = new Criteria();
                $c->add(CpdeftitPeer::CODPRE, $codigo);
                $cpasiini = CpdeftitPeer::doSelectOne($c);
                if ($cpasiini){
                   $z= new Criteria();
                   $z->add(CpasiiniPeer::CODPRE,$codigo);
                   $z->add(CpasiiniPeer::PERPRE,'00');
                   $regz= CpasiiniPeer::doSelectOne($z);
                   if ($regz) {
                     $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
                     $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
                     if ($categoriasusu!="") {
                        $y = new Criteria();
                        $y->add(SegcatusuPeer::LOGUSE,$loguse);
                        $y->add(SegcatusuPeer::CODCAT,substr($codigo,0,strlen(H::getObtener_FormatoCategoria())));                        
                        $regs2 = SegcatusuPeer::doSelectOne($y);
                        if (!$regs2) {
                         $msj = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario'); $('$ides').value='';";
                        }
                      }
                    }else {
                      $msj = "alert_('El Titulo Presupuestario no tiene Asignaci&oacute;n Inicial.'); $('$ides').value='';";
                    }
                }else{
                    $msj = "alert('El Titulo Presupuestario no existe.'); $('$ides').value='';";
                }    
              }   
            }
        }

        $output = '[["javascript","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':
        $codpre = $this->getRequestParameter('codpre','');
        $codart = $this->getRequestParameter('codart','');
        $valpor=H::getConfApp2('valpor', 'presupuesto', 'PreSolTrasla');   
        $msj = "";
        $montoDis = 0;
        $montoI = 0;
        $fectra = $this->getRequestParameter('fectra','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));
        if ($codpre != ''){            
            $montoDis = Herramientas::Monto_disponible(H::getCodPreDis($codpre),$fec2);            
            $numero = H::toFloat($codigo);
            if ($valpor=='S'){
              if ($codart!=''){
                $porcentaje=H::getX_vacio('CODART','Cpartley','Portra',$codart);
                $montopuedetrasladar=H::toFloat($montoDis)*(H::toFloat($porcentaje)/100);
                if ($numero>$montopuedetrasladar){
                  $msj="alert('El Monto del Traslado supera el porcentaje permitido a trasladar'); $('$ides').value='0,00'; $('$ides').focus();";
                }else {
                  if ($numero > $montoDis){
                    $montoI = 0;
                    $msj = "alert('El Monto introducido sobrepasa la Disponibilidad.'); $('$ides').value = number_format($montoI, 2, ',','.');";
                  }else if ($numero <= $montoDis){
                      $msj = "";
                  }
                }
              }else {
                $msj = "alert('Debe introducir primero el Articulo de Ley.'); $('$ides').value='0,00';";
              }
            }else {
              if ($numero > $montoDis){
                  $montoI = 0;
                  $msj = "alert('El Monto introducido sobrepasa la Disponibilidad.'); $('$ides').value = number_format($montoI, 2, ',','.');";
              }else if ($numero <= $montoDis){
                  $msj = "";
              }
          }
        }else{
            $msj = "alert('Debe introducir primero el Titulo Presupuestario.'); $('$ides').value='';";
        }
        
        $output = '[["javascript","'.$msj.'",""]]';
        //$output = '[["javascript","alert('.$montoDis.'); alert('.$numero.')",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '3':
        $referencia = $this->getRequestParameter('referencia','');
        $fectra = $this->getRequestParameter('fectra','');
        $mens = Presupuesto::verificarAnularSolTrasla($referencia);
        if ($mens==''){
        	$javascript="abreAnular('$referencia','$fectra')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '4':
        $referencia = $this->getRequestParameter('referencia','');
        $fectra = $this->getRequestParameter('fectra','');
        $this->nivel = $this->getRequestParameter('nivel', '');
        $mens = Presupuesto::verificarAprobarSolTrasla($referencia);
        if ($mens==''){
        	$javascript="abreAprobar('$referencia','$fectra','$this->nivel')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '5':  
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
        $q= new Criteria();
        if ($filsoldir=='S'){
          $sql='cadefdirec.coddirec=\''.$codigo.'\' and cadefdirec.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
          $q->add(CadefdirecPeer::CODDIREC,$sql,Criteria::CUSTOM); 
        }else $q->add(CadefdirecPeer::CODDIREC,$codigo);
        $reg= CadefdirecPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDesdirec();                     
        }else {
            $dato="";
            if ($filsoldir=='S')
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cpsoltrasla_coddirec').value=''; $('cpsoltrasla_desdirec').value=''; $('cpsoltrasla_coddirec').focus();";
          else
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('cpsoltrasla_coddirec').value=''; $('cpsoltrasla_desdirec').value=''; $('cpsoltrasla_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';       
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY; 
        break; 
      case '6':  
        $codigopre = $this->getRequestParameter('codigopre');
        $reftra = $this->getRequestParameter('reftra');
        $nuevo = $this->getRequestParameter('nuevo');
        $montomov = $this->getRequestParameter('montomov','0,00');
        
        $this->params=array();
        $this->cpsoltrasla= $this->getCpsoltraslaOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid3($reftra, $codigopre, $nuevo);
        
        $js="$('divgrid_perdes').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';      
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');        
        break; 
      case '7':  
        $codigopre = $this->getRequestParameter('codigopre');
        $reftra = $this->getRequestParameter('reftra');
        $nuevo = $this->getRequestParameter('nuevo');
        $montomov = $this->getRequestParameter('montomov','0,00');
        
        $this->params=array();
        $this->cpsoltrasla= $this->getCpsoltraslaOrCreate();
        $this->labels = $this->getLabels();

        $this->configGrid4($reftra, $codigopre, $nuevo);
        
        $js="$('divgrid_perhas').show();";

        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';      
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');        
        break;                 
      default:
         $this->cpsoltrasla = $this->getCpsoltraslaOrCreate();
         $this->updateCpsoltraslaFromRequest();
         $this->configGridDesde();
         $this->configGridHasta();
         $this->configGrid2();
         //$this->editing();
         $gridDesde = Herramientas::CargarDatosGridv2($this,$this->objD);
         $gridHasta = Herramientas::CargarDatosGridv2($this,$this->objH);
         $gridEvento = Herramientas::CargarDatosGridv2($this,$this->obj2);   
         $x = $gridDesde[0];
         $y = $gridHasta[0];        
          /*
          * Distribución de las cuentas con los montos
          */
         $datosDetalles = array();          
         $i=0;
         $j=0;
         $filas = 0;
         $montoRestante = 0;
         $montoFaltante = 0;
         $montos = 0;
         $totales=0;
          $totori=H::toFloat($this->getRequestParameter('cpsoltrasla[totori]'));
          if($totori!=0){
              $totales=H::toFloat($totori);
          }
           $totdes=H::toFloat($this->getRequestParameter('cpsoltrasla[totdes]'));
        // $total = $this->cpsoltrasla->getTottra();
           //$totaldif=H::toFloat($totori)-H::toFloat($totdes);
           $totaldif=$totori-$totdes;
         if ($totaldif == 0){               
             while ($i<count($x))
             {
                if ($x[$i]){
                    if (($x[$i]->getCodpre() != '') && (H::toFloat($x[$i]->getMonasi()) != 0)){
                        $montoRestante = H::toFloat($x[$i]->getMonasi());
                        $montos += H::toFloat($x[$i]->getMonasi());

                        while (($j<count($y)) && ($montoRestante > 0))
                        { 
                            if ($y[$j]){
                                $datosDetalles[$filas]['id'] = 1;
                                if ($montoFaltante > 0)
                                {
                                    $datosDetalles[$filas]["codori"] = $x[$i]->getCodpre();
                                    $datosDetalles[$filas]["coddes"] = $y[$j]->getCodpre();
                                    
                                    if ($montoRestante >= $montoFaltante)
                                    { 
                                        $montoRestante =H::toFloat($montoRestante) - H::toFloat($montoFaltante);
                                        $datosDetalles[$filas]["monmov"] = H::FormatoMonto($montoFaltante);                                       
                                        $montoFaltante = 0;
                                        $j++;
                                        $filas++;
                                    }else{
                                        $datosDetalles[$filas]["monmov"] = H::FormatoMonto($montoRestante);
                                        $montoFaltante -= H::toFloat($montoRestante);
                                        $montoRestante = 0;
                                        $filas++;
                                    }
                                }else{
                                    $datosDetalles[$filas]["codori"] = $x[$i]->getCodpre();
                                    $datosDetalles[$filas]["coddes"] = $y[$j]->getCodpre();

                                    if ($montoRestante >= H::toFloat($y[$j]->getMonasi()))
                                    {
                                        $montoRestante -= H::toFloat($y[$j]->getMonasi());
                                        $datosDetalles[$filas]["monmov"] = H::FormatoMonto($y[$j]->getMonasi());
                                        $j++;
                                        $filas++;
                                    }else{
                                        $montoFaltante = H::toFloat($y[$j]->getMonasi()) - H::toFloat($montoRestante);
                                        $datosDetalles[$filas]["monmov"] = H::FormatoMonto($montoRestante);
                                        $montoRestante = 0;
                                        $filas++;
                                    }
                                }
                                
                            }else{
                                $j++;
                            }
                        }
                    }
                    $i++;
                }else{
                    $i++;
                }


           }
               $msj = "alert('La Distribución se realizo Exitosamente');";
               $this->configGridDetalle($datosDetalles);
           }else{
                 $msj = "alert('Aún existen diferencias entre los totales.')";
                 $this->configGridDetalle();

           }
           
       $output = '[["javascript","'.$msj.'",""],["cpsoltrasla_tottra","' .number_format($totales,2,',','.') . '",""]]';
    }
    
    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    //return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

    public function executeAjaxfila()
    {
    	$name = $this->getRequestParameter('grid','a');
    	$grid = $this->getRequestParameter('grid'.$name,'');
    	$fila = $this->getRequestParameter('fila','');
      $javascript="";

    	$codpre = $grid[$fila][0];
    	$monasi = $grid[$fila][1];
    	$c = new Criteria();
    	$c->add(CpasiiniPeer::CODPRE,$codpre);
    	$cpasiini = CpasiiniPeer::doSelectOne($c);
    	if(!$cpasiini) {
          $grid[$fila][0] = '';
          $grid[$fila][2] = 0.00;
          $javascript="alert_('El Titulo Presupuestario no tiene Asignaci&oacute;n Inicial.');";
    	}else{
       $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
       $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
       if ($categoriasusu!="") {
          $y = new Criteria();
          $y->add(SegcatusuPeer::LOGUSE,$codpre);
          $y->add(SegcatusuPeer::CODCAT,substr($codigo,0,strlen(H::getObtener_FormatoCategoria())));                        
          $regs2 = SegcatusuPeer::doSelectOne($y);
          if (!$regs2) {
             $javascript = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario'); ";
             $grid[$fila][0] = '';
             $grid[$fila][2] = 0.00;
          }else {
            $mondis = H::FormatoMonto($cpasini->getMondis());
            if($mondis > $monasi){
              $grid[$fila][2] = $monasi;
            }else{
            $grid[$fila][2] = $mondis;
            }
          }
        }else {
          $mondis = H::FormatoMonto($cpasini->getMondis());
          if($mondis > $monasi){
            $grid[$fila][2] = $monasi;
          }else{
          $grid[$fila][2] = $mondis;
          }
        }
    	}

      $jsonextra = ',["javascript","' . $javascript . '",""]';
        
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
    $this->cpsoltrasla = $this->getCpsoltraslaOrCreate();

    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');  
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec'); 
       if ($filsoldir=='S'){
         if ($this->getRequestParameter('cpsoltrasla[coddirec]')==''){
            if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
            return false;
         }
       }

     if (!H::validarPeriodoPresuesto($this->getRequestParameter('cpsoltrasla[fectra]')) && $this->getRequestParameter('id')=="")
     {
        $this->coderr=151;
        return false;
     }
    if (($this->getRequestParameter('cpsoltrasla[tottra]')=='0,00')){
         $this->coderr=1364;
         return false;
    }
    $this->configGrid2();
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $cont=0;
    $y=$grid2[0];
    $l=0;
    while ($l<count($y))
    {
      if ($y[$l]->getCodpre()!='' && $y[$l]->getCodeve()!='' && $y[$l]->getMoneve()>0)
        $cont++;
      $l++;
    }
    if ($cont>0) { 
      if (H::toFloat($this->getRequestParameter('cpsoltrasla[tottra]'))!=H::toFloat($this->getRequestParameter('cpsoltrasla[toteve]'))){
           $this->coderr=1373;
           return false;
      }
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
    $this->configGridDesde();
    $this->configGridDetalle();
    $this->configGridHasta();
    $this->configGrid2();
    $this->configGrid3();
    $this->configGrid4();
    $objD = Herramientas::CargarDatosGridv2($this,$this->objD);
    $objH = Herramientas::CargarDatosGridv2($this,$this->objH);
    $objDetalle = Herramientas::CargarDatosGridv2($this,$this->objDetalle, true);
    $grid2= Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3= Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4= Herramientas::CargarDatosGridv2($this,$this->obj4);
  }

  public function saving($cpsoltrasla)
  {
        $grid = Herramientas::CargarDatosGridv2($this, $this->objDetalle, true);
        $gridOri = Herramientas::CargarDatosGridv2($this, $this->objD, true);
        $gridDes = Herramientas::CargarDatosGridv2($this,$this->objH, true);
         $this->getUser()->setAttribute('grabosol', 'S','presoltrasla');
         $grid2= Herramientas::CargarDatosGridv2($this,$this->obj2);
        return Presupuesto::salvarSolicitudTraslado($cpsoltrasla, $grid, $gridOri, $gridDes, $grid2);
  }

  public function deleting($cpsoltrasla)
  {
    $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');
    $q= new Criteria();
    if ($cordissol=='S')
      $q->add(CptraslaPeer::REFSOLTRA,$cpsoltrasla->getReftra());
    else
      $q->add(CptraslaPeer::REFTRA,$cpsoltrasla->getReftra());
    $regq= CptraslaPeer::doSelectOne($q);
    if (!$regq){
        $error=Presupuesto::validarFechaPresupuesto($cpsoltrasla->getFectra());
        if ($error==-1) {
          return Presupuesto::eliminarSolTrasla($cpsoltrasla);        
        }else{
            return $error;
        }      
   }else {
     return 4014;
   }

   return -1;
  }

  public function executeAnular(){

   $this->referencia = $this->getRequestParameter('referencia');
   $fectra=$this->getRequestParameter('fectra');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));
   $c = new Criteria();
   $c->add(CpsoltraslaPeer::REFTRA,$this->referencia);
   $c->add(CpsoltraslaPeer::FECTRA,$fec);
   $this->cpsoltrasla = CpsoltraslaPeer::doSelectOne($c);  
   sfView::SUCCESS;
  }

  public function executeSalvaranu(){
      
	$reftra = $this->getRequestParameter('reftra');
	$desanu = $this->getRequestParameter('desanu');
	$fecanu = $this->getRequestParameter('fecanu');
	$fectra = $this->getRequestParameter('fectra');
  $id = $this->getRequestParameter('id');
	$this->msg="";

  $dateFormat = new sfDateFormat('es_VE');
  $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
  $cordissol=H::getConfApp2('cordissol', 'presupuesto', 'PreTrasla');

  $q= new Criteria();
  if ($cordissol=='S')
    $q->add(CptraslaPeer::REFSOLTRA,$reftra);
  else
    $q->add(CptraslaPeer::REFTRA,$reftra);
  $regq= CptraslaPeer::doSelectOne($q);
  if (!$regq){
    if (strtotime($fec) < strtotime($fectra))
      $this->msg='La fecha de Anulación no puede ser menor a la del Compromiso';
    else {
        $error=Presupuesto::validarFechaPresupuesto($fec);
        if ($error==-1) {
            $this->SalvarBitacora($id ,'Anular');
            Presupuesto::salvarAnularSolTrasla($reftra,$fecanu,$desanu);
        }else {
           $this->msg=Herramientas::obtenerMensajeError($error);
        }
    }
  }else $this->msg='No se puede anular la Solicitud ya tiene un Traslado asociado';
       
	sfView::SUCCESS;
  }

  public function executeAprobar(){

   $this->referencia = $this->getRequestParameter('referencia');
   $fectra=$this->getRequestParameter('fectra');
   $this->nivel = $this->getRequestParameter('nivel');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));
   $c = new Criteria();
   $c->add(CpsoltraslaPeer::REFTRA,$this->referencia);
   $c->add(CpsoltraslaPeer::FECTRA,$fec);
   $this->cpsoltrasla = CpsoltraslaPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvarapr(){

	$reftra = $this->getRequestParameter('reftra');
	$desapr = $this->getRequestParameter('desapr');
	$fecapr = $this->getRequestParameter('fecapr');
	$fectra = $this->getRequestParameter('fectra');
        $staapr = $this->getRequestParameter('staapr');
        $nivel = $this->getRequestParameter('nivel');
	$this->msg="";

        $dateFormat = new sfDateFormat('es_VE');
   	$fec = $dateFormat->format($fecapr, 'i', $dateFormat->getInputPattern('d'));

	if (strtotime($fec) < strtotime($fectra)){
            $this->msg='La fecha de Aprobación no puede ser menor a la del Compromiso';
        }else {
            Presupuesto::salvarAprobacionSolTrasla($reftra,$fecapr,$desapr, $nivel, $staapr);
        }

	sfView::SUCCESS;
  }
    public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->getUser()->getAttributeHolder()->remove('grabosol','presoltrasla');

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpsoltrasla/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   

     // 15    // pager
    $this->pager = new sfPropelPager('Cpsoltrasla', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cpsoltrasla.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpsoltraslaPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
    public function executeAjaxgrid() {
      $name = $this->getRequestParameter('grid','a');
      $grid = $this->getRequestParameter('grid'.$name,'');
      $fila = $this->getRequestParameter('fila','');
      $col = $this->getRequestParameter('columna', '');
      $javascript="";  $jsonextra="";
    switch ($name) {
      case ('z'):
        switch ($col) {
         case ('1'):   //Codigo Presupuestario
            if ($grid[$fila][$col-1]!="")
            {
              $mascara=H::formatoPresupuesto();
              $loncod=strlen($mascara);
              $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
              $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                if (strlen($grid[$fila][$col-1])==$loncod)
                {
                   $c = new Criteria();
                   $c->add(CpasiiniPeer::CODPRE,$grid[$fila][$col-1]);
                   $regs = CpasiiniPeer::doSelectOne($c);
                   if ($regs)
                   {
                     $codigopre=$grid[$fila][$col-1];
                     $javascript="colocarEvento('$codigopre','$fila','$col');";
                     if ($categoriasusu!="") {
                        $y = new Criteria();
                        $y->add(SegcatusuPeer::LOGUSE,$loguse);
                        $y->add(SegcatusuPeer::CODCAT,substr($grid[$fila][$col-1],0,strlen(H::getObtener_FormatoCategoria())));                        
                        $regs2 = SegcatusuPeer::doSelectOne($y);
                        if ($regs2) {
                          $mondis = H::FormatoMonto(H::Monto_disponible($grid[$fila][$col-1]));
                          $grid[$fila][4] = $mondis;
                        }else {
                          $javascript = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario');";
                         $grid[$fila][$col-1]="";
                         $grid[$fila][4] = "0,00";
                        }
                      }else {
                        $mondis = H::FormatoMonto(H::Monto_disponible($grid[$fila][$col-1]));
                        $grid[$fila][4] = $mondis;
                      }
                    }else {
                      $javascript = "alert_('El C&oacute;digo Presupuestario no Existe');";
                      $grid[$fila][$col-1]="";
                   }
                   }else {
                    $javascript = "alert_('El C&oacute;digo Presupuestario no es de &Uacute;ltimo Nivel');";
                    $grid[$fila][$col-1]="";
                  }                
                }else {
                  $javascript = "alert_('El C&oacute;digo Presupuestario esta Repetido');";
                  $grid[$fila][$col-1]="";
              }
              }
              
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;        
          case ('2'):  //Monto Imputación
            if (H::toFloat($grid[$fila][$col-1])>0)
            {
              $mondis = H::Monto_disponible($grid[$fila][0]);
             if (H::toFloat($grid[$fila][$col-1])>$mondis)
             {
                $javascript = "alert_('El Monto a Imputar es mayor al Disponible');";
                $grid[$fila][$col-1]="0,00";
                $grid[$fila][4]=number_format($mondis,2,',','.');
             }else {
              $cal1=$mondis-H::toFloat($grid[$fila][$col-1]);
              $grid[$fila][4]=number_format($cal1,2,',','.');            
              $valor=$grid[$fila][$col-1];
              $javascript="colocarEvento('$valor','$fila','$col');";
              
             }              
            }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          default:
            break;
        }
        break;            
      case ('d'):
        switch ($col) {
             case ('1'):
                  $valor=$grid[$fila][$col-1];  
                  $javascript="BuscarCodpre('$valor','$fila')";                 
                  $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;
             case ('3'):
              if (!Hacienda::Repetido2($grid,$grid[$fila][$col-1].'-'.$grid[$fila][$col-3],$fila,$col-1,$col-3))
              {
                 $r= new Criteria();
                 $r->add(CpeveprePeer::CODEVE,$grid[$fila][$col-1]);
                 $result= CpeveprePeer::doSelectOne($r);
                 if ($result)
                 {
                   $grid[$fila][$col]=$result->getDeseve();
                 }else {
                  $javascript = "alert_('El Evento no existe');";
                  $grid[$fila][$col-1]="";
                  $grid[$fila][$col]="";
                 }
              }else {
                $javascript = "alert_('El Evento esta Repetido con ese mismo C&oacute;digo Presupuestario');";
                $grid[$fila][$col-1]="";
              }
              $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;
             case ('5'):
               $valcom=$grid[$fila][$col-3].'-'.$grid[$fila][$col-5];
               $totcod=$grid[$fila][$col-4];
               $moneve=$grid[$fila][$col-1];
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                  $valcom2=$grid[$i][$col-3].'-'.$grid[$i][$col-5];
                  if ($i!=$fila)
                    if ($valcom==$valcom2)
                     $acum=$acum + H::toFloat($grid[$i][$col-1]);
                  
                   $i++;
               }
               $dif=H::toFloat($totcod)-$acum;
               if (H::toFloat($moneve)>$dif)
               {
                  $grid[$fila][$col-1]="0,00";                        
                  $javascript="alert('El Monto del Evento sobrepasa al Monto Total de la Imputacion Presupuestaria');";
               }
               $jsonextra = ',["javascript","' . $javascript . '",""]';
              break;
            default:
              break;
           }
          break;
        case ('e'):
          switch ($col) {
               case ('1'):
                  $fecadi = explode('/', $this->getRequestParameter('cpsoltrasla_fectra',''));
                  $mes=$grid[$fila][$col-1];  
                  $mesadi=$fecadi[1];
                  if ((int)$mes<(int)$mesadi ){
                     $grid[$fila][$col-1]="";                        
                     $javascript="alert('El Mes debe ser mayor o igual al mes de la Solicitud');";           
                  }else {
                    if ((int)$mes>12){
                      $grid[$fila][$col-1]="";                        
                     $javascript="alert_('El Mes no es v&aacute;lido');";           
                    }
                  }
                  $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;                                
              case ('2'):  //Monto
               $moncodpre=$grid[0][$col]; // Cantidad Total articulo (Grid detalle articulos)
               $monper=$grid[$fila][$col-1]; //Cantidad por período
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                  if ($i!=$fila)
                     $acum=$acum + H::toFloat($grid[$i][$col-1]);                  
                   $i++;
               }
               $dif=H::toFloat($moncodpre)-$acum;
               if (H::toFloat($monper)>H::toFloat($dif))
               {
                  $grid[$fila][$col-1]="0,00";                        
                  $javascript="alert_('La Monto para este Per&iacute;odo sobrepasa el Monto Total para ese C&oacute;digo Presupuestario');";
               }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              default:
                break;
             }
          break;
        case ('f'):
          switch ($col) {
               case ('1'):
                  $fecadi = explode('/', $this->getRequestParameter('cpsoltrasla_fectra',''));
                  $mes=$grid[$fila][$col-1];  
                  $mesadi=$fecadi[1];
                  if ((int)$mes<(int)$mesadi ){
                     $grid[$fila][$col-1]="";                        
                     $javascript="alert('El Mes debe ser mayor o igual al mes de la Solicitud');";           
                  }else {
                    if ((int)$mes>12){
                      $grid[$fila][$col-1]="";                        
                     $javascript="alert_('El Mes no es v&aacute;lido');";           
                    }
                  }
                  $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;                                
              case ('2'):  //Monto
               $moncodpre=$grid[0][$col]; // Cantidad Total articulo (Grid detalle articulos)
               $monper=$grid[$fila][$col-1]; //Cantidad por período
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                  if ($i!=$fila)
                     $acum=$acum + H::toFloat($grid[$i][$col-1]);                  
                   $i++;
               }
               $dif=H::toFloat($moncodpre)-$acum;
               if (H::toFloat($monper)>H::toFloat($dif))
               {
                  $grid[$fila][$col-1]="0,00";                        
                  $javascript="alert_('La Monto para este Per&iacute;odo sobrepasa el Monto Total para ese C&oacute;digo Presupuestario');";
               }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              default:
                break;
             }
          break;
        default:
          break;            
      }

      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }  

  public function getLabels()
  {
    $labels = parent::getLabels(); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cpsoltrasla{coddirec}'] = 'Estado';
    return $labels;
  }    
  
}
