<?php

/**
 * precausar actions.
 *
 * @package    siga
 * @subpackage precausar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class precausarActions extends autoprecausarActions
{


  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->listing();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpcausad/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');

     // 15    // pager
    $this->pager = new sfPropelPager('Cpcausad', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cpcausad.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpcausadPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing(){
   	$this->configGrid($this->cpcausad->getRefcau());
    $this->configGrid2($this->cpcausad->getRefcau());
    if (!$this->cpcausad->getId()){        
        $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->cpcausad->getCoddirec()=='')
              $this->cpcausad->setCoddirec($regt->getCoddirec());
           }
          
        }
      }
  }

  public function configGrid($refcau = '',$refcom = ''){
    $this->params = array();
    $reg=array();
    if ($refcom!="")
    {
        $c = new Criteria();
        $c->add(CpimpcomPeer::REFCOM,$refcom);
        $reg2 = CpimpcomPeer::doSelect($c);
        if ($reg2)
        {
            foreach ($reg2 as $obj2)
            {
                $cpimpc= new Cpimpcau();
                $cpimpc->setCodpre($obj2->getCodpre());
                $monto=$obj2->getMonimp()-$obj2->getMoncau()-$obj2->getMonaju();
                $cpimpc->setMonimp($monto);
                $cpimpc->setMonpag($obj2->getMonpag());
                $cpimpc->setMonaju($obj2->getMonaju());
                $cpimpc->setRefere($obj2->getRefcom());
                $disponible = H::Monto_disponible(H::getCodPreDis($obj2->getCodpre()),H::getX_vacio('REFCOM','Cpcompro','Feccom',$refcom));
                //$cpimpc->setSalpcau(H::FormatoMonto($disponible-$cpimpc->getMonimp()));                
                $cpimpc->setSalpcau(H::FormatoMonto($monto));                
                $reg[]=$cpimpc;
            }
        }
    }else  {
            $c = new Criteria();
            $c->add(CpimpcauPeer::REFCAU ,$refcau);
            $reg = CpimpcauPeer::doSelect($c);
        }
    
    /*if ($refcom!="") 
       $this->columnas = Herramientas :: getConfigGrid('grid_cpimpcau_edit');
    else*/
      $this->columnas = Herramientas :: getConfigGrid($this->cpcausad->getId()=='' ? 'grid_cpimpcau_create' : 'grid_cpimpcau_edit');
    
    if ($this->cpcausad->getId()=='')
      {
        if ($refcom=="") {
          $mascara=H::formatoPresupuesto();
          $loncod=strlen($mascara);
          $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
          $params= array('param1' => $categoriasusu);
          
          $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
          $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'PreCompro_Cpasiini2',$params);
       }/*else {
           $this->columnas[1][1]->setHTML('type="text" size="10" readonly=false onBlur="javascript: obj=this; ValidarMontoGridv2(obj,2);"');
        }*/
      }

      $this->obj = $this->columnas[0]->getConfig($reg);

    //$this->params['grid'] = $this->obj;
      $this->params=array('grid' => $this->obj);
  }

    public function configGrid2($refdoc=''){ //Eventos
    $c = new Criteria();
    $c->add(CpdisevePeer::REFDOC ,$refdoc);
    $c->add(CpdisevePeer::TIPMOV ,'CAU');
    $result = CpdisevePeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid('grid_eventos');
    $mascara=H::formatoPresupuesto();
    $loncod=strlen($mascara);
    $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
    $params= array('param1' => $categoriasusu);
      
    $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Preprecom_Cpasiini2',$params);
    
    $this->obj2 = $this->columnas[0]->getConfig($result);
    $this->cpcausad->setObj2($this->obj2);    
  }

  public function executeAjax(){

    $ajax = $this->getRequestParameter('ajax','');
    $referencia=$this->getRequestParameter('referencia','');
    $feccau =$this->getRequestParameter('feccau','');
    $totpag=$this->getRequestParameter('totpag','');
    $codigo = $this->getRequestParameter('codigo','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
        $mens=  Presupuesto::verificarAnuCausado($referencia,$totpag);

        if ($mens==''){
        	$javascript="abreAnular('$referencia','$feccau')";
        }else{
        	$javascript="alert('$mens')";
        }
        $output = '[["javascript","'.$javascript.'",""]]';
        break;
      case '2':
          $t= new Criteria();
          $t->add(CpdoccauPeer::TIPCAU,$codigo);
          $reg= CpdoccauPeer::doSelectOne($t);
          if ($reg)
          {
              if ($feccau!='') {
                $dato=$reg->getNomext();
                $refier=$reg->getRefier();
                $js="$('cpcausad_refer').value='$refier';  if ('$refier'=='C') { $$('.botoncat')[2].disabled=false; $('cpcausad_refcom').readOnly=false;}else { $$('.botoncat')[2].disabled=true; $('cpcausad_refcom').readOnly=true;}";
              }else $js="alert_('Debe serleccionar la Fecha del Causado'); $('cpcausad_tipcau').value=''; $('cpcausad_tipcau').focus();";
          }else {
              $js="alert_('El Tipo de Documento no existe'); $('cpcausad_tipcau').value=''; $('cpcausad_tipcau').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;        
      case '3':
          $sw=false;
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $filsoldir3=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');
          $t= new Criteria();
          $t->add(CpcomproPeer::REFCOM,$codigo);
          if ($filsoldir3=='S'){
            $sql='cpcompro.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
            $t->add(CpcomproPeer::CODDIREC,$sql,Criteria::CUSTOM); 
          }
          $reg= CpcomproPeer::doSelectOne($t);
          if ($reg)
          {
              $reqaut=H::getX_vacio('TIPCOM','Cpdoccom','Reqaut',$reg->getTipcom());
              if ($reqaut=='S' && $reg->getAprcom()=='N'){
                $js="alert_('El Compromiso  no ha sido aprobado'); $('cpcausad_refcom').value=''; $('cpcausad_refcom').focus();";
              $codigo='';
              }else {
                 $sql2="select sum(monimp-monaju) as totimp, sum(moncau) as totcau from cpimpcom where refcom='".$codigo."'";
                 if (Herramientas::BuscarDatos($sql2,$result2)){
                  if ($result2[0]["totimp"]>$result2[0]["totcau"]) {
                   $dateFormat = new sfDateFormat('es_VE');
                   $fec1 = $dateFormat->format($this->getRequestParameter('feccau'), 'i', $dateFormat->getInputPattern('d'));
                   if ($reg->getFeccom()<=$fec1) {                                    
                    $dato=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars($reg->getDescom()));//$reg->getDescom();                     
                    $cedrif=$reg->getCedrif();
                    $nomben=eregi_replace("[\n|\r|\n\r]", "", htmlspecialchars(H::getX_vacio('CEDRIF', 'Opbenefi', 'Nomben', $cedrif)));
                    $js="$('cpcausad_cedrif').value='$cedrif'; $('cpcausad_nomben').value='$nomben'; $$('.botoncat')[3].disabled=true;";
                   }else {
                     $js="alert_('La Fecha del Compromiso es mayor a la del Causado'); $('cpcausad_refcom').value=''; $('cpcausad_refcom').focus();";
                     $codigo='';
                   }
               }else {
                 $js="alert_('El Compromiso fue Totalmente Causado'); $('cpcausad_refcom').value=''; $('cpcausad_refcom').focus();";
                   $codigo='';
               }
             }
              }
          }else {
            if ($filsoldir3=='S')
              $js="alert_('El Compromiso  no existe o no esta asociado al Usuario'); $('cpcausad_refcom').value=''; $('cpcausad_refcom').focus();";
            else
              $js="alert_('El Compromiso  no existe'); $('cpcausad_refcom').value=''; $('cpcausad_refcom').focus();";
              $codigo='';
          }
          $this->params=array();
          $this->cpcausad = $this->getCpcausadOrCreate();
          $this->labels = $this->getLabels();

          $this->configGrid('', $codigo);
          
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cpcausad_descau","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;        
      case '4':
          $t= new Criteria();
          $t->add(OpbenefiPeer::CEDRIF,$codigo);
          $reg= OpbenefiPeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNomben();              
          }else {
              $js="alert_('El Beneficiario no existe'); $('cpcausad_cedrif').value=''; $('cpcausad_cedrif').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
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
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cpcausad_coddirec').value=''; $('cpcausad_desdirec').value=''; $('cpcausad_coddirec').focus();";
          else
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('cpcausad_coddirec').value=''; $('cpcausad_desdirec').value=''; $('cpcausad_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';        
        break;             
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($sw) return sfView::HEADER_ONLY;

  }

  public function validateEdit(){
  	 $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
	  $this->cpcausad = $this->getCpcausadOrCreate();
    try{ $this->updateCpcausadFromRequest();}catch(Exception $ex){}

    $refier=H::getX_vacio('TIPCAU','Cpdoccau','Refier',$this->cpcausad->getTipcau());
    if ($refier=='C'){
      if ($this->getRequestParameter('cpcausad[refcom]')==''){
         $this->coderr=4009;
         return false;
      }
    }

    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');  
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec'); 
       if ($filsoldir=='S'){
         if ($this->getRequestParameter('cpcausad[coddirec]')==''){
            if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
            return false;
         }
       }

     if (!H::validarPeriodoPresuesto($this->cpcausad->getFeccau()) && !$this->cpcausad->getId())
     {
        $this->coderr=151;
        return false;
     }

    $t= new Criteria();
    $t->add(CpcomproPeer::REFCOM,$this->getRequestParameter('cpcausad[refcom]'));
    $reg= CpcomproPeer::doSelectOne($t);
    if ($reg)
    {
       $dateFormat = new sfDateFormat('es_VE');
       $fec1 = $dateFormat->format($this->getRequestParameter('cpcausad[feccau]'), 'i', $dateFormat->getInputPattern('d'));
       if ($reg->getFeccom()>$fec1) {
          $this->coderr=1384;
          return false;
       }
    }

    $this->configGrid2();
     $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
     if (count($grid2[0])>0){
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
        if (H::toFloat($this->getRequestParameter('cpcausad[moncau]'))!=H::toFloat($this->getRequestParameter('cpcausad[toteve]'))){
            $this->coderr=1371;
            return false;
        }
      }
    }
    if (!$this->cpcausad->getId()) {
      $this->configGrid();
      $grid = Herramientas::CargarDatosGridV2($this,$this->obj);
      $afedis=H::getX_vacio('TIPCAU','Cpdoccau','Afedis',$this->cpcausad->getTipcau());
  	  if (count($grid[0])>0){
  	  	if ($afedis=='R')
          $this->coderr = Presupuesto::validarPreCom($this->cpcausad,$grid,$this->cpcausad->getFeccau());
  	  }
  	  else{
  	  	$this->coderr = 1342;
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
  public function updateError(){
    $this->configGrid();
    $this->configGrid2();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
  }

  public function saving($cpcausad){
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $gencomcon=H::getConfApp2('gencomcon', 'presupuesto', 'precausar');
    if ($gencomcon=='S')
      self::GrabarComprobanteCausado($cpcausad, $grid);                        
    return Presupuesto::salvarPrecausar($cpcausad,$grid,$grid2);

  }

  public function deleting($cpcausad){
    return Presupuesto::eliminarPrecausar($cpcausad);
  }

  public function executeAnular(){

	   $this->referencia=$this->getRequestParameter('referencia');
	   $feccau=$this->getRequestParameter('feccau');
	   $totpag=$this->getRequestParameter('totpag');

	   $dateFormat = new sfDateFormat('es_VE');
	   $fec = $dateFormat->format($feccau, 'i', $dateFormat->getInputPattern('d'));

	   $c = new Criteria();
	   $c->add(CpcausadPeer::REFCAU,$this->referencia);
	   $c->add(CpcausadPeer::FECCAU,$fec);
	   $this->cpcausad = CpcausadPeer::doSelectOne($c);
	   $id = $this->cpcausad->getId();

	   sfView::SUCCESS;
  }

    	public function executeAjaxgrid() {
		$name = $this->getRequestParameter('grid','a');
		$grid = $this->getRequestParameter('grid'.$name,'');
		$fila = $this->getRequestParameter('fila','');
    $col = $this->getRequestParameter('columna', '');
    $feccau = $this->getRequestParameter('cpcausad_feccau','');
    $refcom = $this->getRequestParameter('cpcausad_refcom','');
    $dateFormat = new sfDateFormat('es_VE');
    $fec2 = $dateFormat->format($feccau, 'i', $dateFormat->getInputPattern('d'));
    $javascript="";  $jsonextra="";
    switch ($name) {
      case ('a'):
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
                        }else {
                          $javascript = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario');";
                         $grid[$fila][$col-1]="";
                        }
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
              if ($refcom!='')
                $mondis=H::toFloat($grid[$fila][5]);
              else
                $mondis = H::Monto_disponible(H::getCodPreDis($grid[$fila][0]),$fec2);
             if (H::toFloat($grid[$fila][$col-1])>$mondis)
             {
                $javascript = "alert_('El Monto a Imputar es mayor al Disponible');";
                $grid[$fila][$col-1]="0,00";
             }else {
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
      case ('b'):
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
               $valcom=$grid[$fila][$col-5];//.'-'.$grid[$fila][$col-3];
               $totcod=$grid[$fila][$col-4];
               $moneve=$grid[$fila][$col-1];
               $i=0;
               $acum=0;
               while ($i<count($grid))
               {
                  $valcom2=$grid[$i][$col-5];//.'-'.$grid[$i][$col-3];
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
        default:
          break;            
      }

      $output = Herramientas::grid_to_json($grid,$name,$jsonextra);
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	return sfView::HEADER_ONLY;
    }

  public function executeSalvaranu(){
	$refcau=$this->getRequestParameter('refcau');
	$desanu=$this->getRequestParameter('desanu');
	$fecanu=$this->getRequestParameter('fecanu');
	$feccau=$this->getRequestParameter('feccau');
	$this->msg="";
    $dateFormat = new sfDateFormat('es_VE');
   	$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

	if (strtotime($fec) < strtotime($feccau)){
			$this->msg='La fecha de Anulación no puede ser menor a la del Causado';
		}else {
      $q= new Criteria();
      $q->add(CpimppagPeer::REFERE,$refcau);
      $q->add(CpimppagPeer::STAIMP,'N',Criteria::NOT_EQUAL);
      $resul= CpimppagPeer::doSelectOne($q);
      if ($resul)
       $this->msg='No se puede anular el Causado porque ya está asociado a un Pagado.';
     else {
       $tipcau=H::getX_vacio('REFCAU','Cpcausad','Tipcau',$refcau);
		   $r= new Criteria();
       $r->add(OpordpagPeer::NUMORD,$refcau);
       $r->add(OpordpagPeer::TIPCAU,$tipcau);
       $resulr= OpordpagPeer::doSelectOne($r);
       if ($resulr){
          $this->msg='No se puede anular el Causado porque está asociado a una Orden de Pago.';
       }else {
             $t= new Criteria();
             $t->add(CpajustePeer::REFERE,$refcau);
             $t->add(CpdocajuPeer::REFIER,'A');
             $t->addJoin(CpajustePeer::TIPAJU,CpdocajuPeer::TIPAJU);
             $regt=CpajustePeer::doSelectOne($t);
             if ($regt){
               if ($regt->getStaaju()=='N'){
                  $this->msg=Presupuesto::salvarAnuCausado($refcau,$fecanu,$desanu);
                if ($this->msg!=-1)
                  $this->msg=H::obtenerMensajeError($this->msg);
                else $this->msg='';
               }else $this->msg='No se puede anular el Causado porque tiene asociado a un Ajuste.';
             }else {
                $this->msg=Presupuesto::salvarAnuCausado($refcau,$fecanu,$desanu);
                if ($this->msg!=-1)
                  $this->msg=H::obtenerMensajeError($this->msg);
                else $this->msg='';
            }
       }
     }
		}
		sfView::SUCCESS;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->cpcausad = $this->getCpcausadOrCreate();
     $this->updateCpcausadFromRequest();
     $this->configGrid(); 
     $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

     $concom   = 0;
     $msjuno      = "";
     $this->msjtres  = "";
     $this->i        = "";
     $this->formulario = array();

     if ($this->cpcausad->getCedrif()=="" || count($grid[0])==0)
     {
       $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario y las Imputaciones Presupuestarias, para luego generar el comprobante";

     }
     if ($this->msjtres=="")
     {
      $x=Presupuesto::generarComprobanteCausado($this->cpcausad,$grid,$comprobante,$msjuno);
      if ($msjuno=="") {
      $concom = $concom + 1;

      $form = "sf_admin/precausar/confincomgen";
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

  public function GrabarComprobanteCausado(&$cpcausad, $grid)
  {
      $concom=1;
      $form="sf_admin/precausar/confincomgen";
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

          $codtiptra=H::getX_vacio('TIPCAU','Cpdoccau','Codtiptra',$cpcausad->getTipcau());

          $this->numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]),'PRE',$codtiptra,$cpcausad->getCoddirec());

          $cpcausad->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
  } 

  public function getLabels() 
  {
    $labels = parent::getLabels(); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cpcausad{coddirec}'] = 'Estado';
    return $labels;
  }        


}
