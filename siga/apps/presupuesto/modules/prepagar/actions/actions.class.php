<?php

/**
 * prepagar actions.
 *
 * @package    siga
 * @subpackage prepagar
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class prepagarActions extends autoprepagarActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cppagos/filters');

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');  

     // 15    // pager
    $this->pager = new sfPropelPager('Cppagos', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cppagos.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CppagosPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
	public function editing() {
		$this->configGrid($this->cppagos->getRefpag());
    $this->configGrid2($this->cppagos->getRefpag());
    if (!$this->cppagos->getId()){        
        $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->cppagos->getCoddirec()=='')
              $this->cppagos->setCoddirec($regt->getCoddirec());
           }
          
        }
    }
	}

	public function configGrid($refpag = '',$refcau = '') {
        $this->params=array();
        $reg=array();
        if ($refcau!="")
        {
            $c = new Criteria();
            $c->add(CpimpcauPeer::REFCAU,$refcau);
            $reg2 = CpimpcauPeer::doSelect($c);
            if ($reg2)
            {
                foreach ($reg2 as $obj2)
                {
                    $cpimpc= new Cpimppag();
                    $cpimpc->setCodpre($obj2->getCodpre());
                    $monto=$obj2->getMonimp()-$obj2->getMonpag()-$obj2->getMonaju();
                    $cpimpc->setMonimp($monto);
                    $cpimpc->setMonaju($obj2->getMonaju());
                    $cpimpc->setRefere($refcau);//$obj2->getRefere());
                    $disponible = H::Monto_disponible(H::getCodPreDis($obj2->getCodpre()),H::getX_vacio('REFCAU','Cpcausad','Feccau',$refcau));
                    $cpimpc->setMondis(H::FormatoMonto($monto));                
                    $cpimpc->setSalparpag(H::FormatoMonto($monto));//H::FormatoMonto($disponible-$cpimpc->getMonimp()));                
                    $reg[]=$cpimpc;
                }
            }
        }else  {
            $c = new Criteria();
            $c->add(CpimppagPeer::REFPAG,$refpag);
            $reg = CpimppagPeer::doSelect($c);
        }

        /*if ($refcau!="") 
           $this->columnas = Herramientas :: getConfigGrid('grid_cpimppag_edit');
        else*/
          $this->columnas = Herramientas :: getConfigGrid($this->cppagos->getId()=='' ? 'grid_cpimppag_create' : 'grid_cpimppag_edit');
       if ($this->cppagos->getId()=='')
      {
        if ($refcau=="") {
        $mascara=H::formatoPresupuesto();
        $loncod=strlen($mascara);
        $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
        $params= array('param1' => $categoriasusu);
        
        $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
        $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'PreCompro_Cpasiini2',$params);
       }
      }
            
      $this->obj = $this->columnas[0]->getConfig($reg);

    	//$this->params['grid'] = $this->obj;
      $this->params=array('grid' => $this->obj);
	}

    public function configGrid2($refdoc=''){ //Eventos
    $c = new Criteria();
    $c->add(CpdisevePeer::REFDOC ,$refdoc);
    $c->add(CpdisevePeer::TIPMOV ,'PAG');
    $result = CpdisevePeer::doSelect($c);
    
    $this->columnas = Herramientas :: getConfigGrid('grid_eventos');
    $mascara=H::formatoPresupuesto();
    $loncod=strlen($mascara);
    $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
    $params= array('param1' => $categoriasusu);
      
    $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'Preprecom_Cpasiini2',$params);
    
    $this->obj2 = $this->columnas[0]->getConfig($result);
    $this->cppagos->setObj2($this->obj2);    
  }


  public function executeAjax() {
    $ajax = $this->getRequestParameter('ajax','');
    $refpag = $this->getRequestParameter('refpag','');
    $fecpag = $this->getRequestParameter('fecpag','');
    $codigo = $this->getRequestParameter('codigo','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
		    $msj = Presupuesto::verificarAnuPrepagar($refpag); //,$salcau
      	if ($msj==''){
      		$javascript="abrirAnular('$refpag','$fecpag')";
      	}else {
      		$javascript="alert('$msj')";
      	}
        $output = '[["javascript","'.$javascript.'",""]]';
        break;
      case '2':
          $t= new Criteria();
          $t->add(CpdocpagPeer::TIPPAG,$codigo);
          $reg= CpdocpagPeer::doSelectOne($t);
          if ($reg)
          {
            if ($fecpag!='') {
              $dato=$reg->getNomext();
              $refier=$reg->getRefier();
              $js="$('cppagos_refer').value='$refier';  if ('$refier'!='N') { $$('.botoncat')[2].disabled=false; }else { $$('.botoncat')[2].disabled=true;}";
            }else $js="alert_('Debe seleccionar la Fecha del Pagado'); $('cppagos_tippag').value=''; $('cppagos_tippag').focus();";
          }else {
              $js="alert_('El Tipo de Documento no existe'); $('cppagos_tippag').value=''; $('cppagos_tippag').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;        
      case '3':
          $sw=false;
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $filsoldir3=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');
          $t= new Criteria();
          $t->add(CpcausadPeer::REFCAU,$codigo);
          if ($filsoldir3=='S'){
            $sql='cpcausad.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
            $t->add(CpcausadPeer::CODDIREC,$sql,Criteria::CUSTOM); 
          }
          $reg= CpcausadPeer::doSelectOne($t);
          if ($reg)
          {
            $sql2="select sum(coalesce(monimp,0)-coalesce(monaju,0)) as totimp, sum(coalesce(monpag,0)) as totpag from cpimpcau where refcau='".$codigo."'";
            if (Herramientas::BuscarDatos($sql2,$result2)){
             if ($result2[0]["totimp"]>$result2[0]["totpag"]) {
              $dateFormat = new sfDateFormat('es_VE');
              $fec1 = $dateFormat->format($this->getRequestParameter('fecpag'), 'i', $dateFormat->getInputPattern('d'));
              if ($reg->getFeccau()<=$fec1) {
                $dato=$reg->getDescau();                     
                $cedrif=$reg->getCedrif();
                $nomben=H::getX_vacio('CEDRIF', 'Opbenefi', 'Nomben', $cedrif);
                $js="$('cppagos_cedrif').value='$cedrif'; $('cppagos_nomben').value='$nomben'; $$('.botoncat')[3].disabled=true;";
              }else {
                $js="alert_('La Fecha del Causado es mayor a la del Pagado'); $('cppagos_refcau').value=''; $('cppagos_refcau').focus();";
                $codigo='';
              }
            }else {
              $js="alert_('El Causado fue Pagado en su Totalidad'); $('cppagos_refcau').value=''; $('cppagos_refcau').focus();";
              $codigo='';
            }
          }
          }else {
            if ($filsoldir3=='S')
              $js="alert_('El Causado  no existe o no esta asociado al Usuario'); $('cppagos_refcau').value=''; $('cppagos_refcau').focus();";
            else
              $js="alert_('El Causado  no existe'); $('cppagos_refcau').value=''; $('cppagos_refcau').focus();";
              $codigo='';
          }
          $this->params=array();
          $this->cppagos = $this->getCppagosOrCreate();
          $this->labels = $this->getLabels();

          $this->configGrid('', $codigo);
          
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cppagos_despag","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;        
      case '4':
          $t= new Criteria();
          $t->add(OpbenefiPeer::CEDRIF,$codigo);
          $reg= OpbenefiPeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNomben();              
          }else {
              $js="alert_('El Beneficiario no existe'); $('cppagos_cedrif').value=''; $('cppagos_cedrif').focus();";
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
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cppagos_coddirec').value=''; $('cppagos_desdirec').value=''; $('cppagos_coddirec').focus();";
          else
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('cppagos_coddirec').value=''; $('cppagos_desdirec').value=''; $('cppagos_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';        
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
  public function validateEdit() {

  		$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST){
			$this->cppagos = $this->getCppagosOrCreate();
      try{ $this->updateCppagosFromRequest();}catch(Exception $ex){}

      $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');  
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec'); 
       if ($filsoldir=='S'){
         if ($this->getRequestParameter('cppagos[coddirec]')==''){
            if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
            return false;
         }
       }

      if (!H::validarPeriodoPresuesto($this->cppagos->getFecpag()) && !$this->cppagos->getId())
     {
        $this->coderr=151;
        return false;
     }

      $t= new Criteria();
      $t->add(CpcausadPeer::REFCAU,$this->getRequestParameter('cppagos[refcau]'));
      $reg= CpcausadPeer::doSelectOne($t);
      if ($reg)
      {
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($this->getRequestParameter('cppagos[fecpag]'), 'i', $dateFormat->getInputPattern('d'));
          if ($reg->getFeccau()>$fec1) {
              $this->coderr=1383;
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
        if (H::toFloat($this->getRequestParameter('cppagos[monpag]'))!=H::toFloat($this->getRequestParameter('cppagos[toteve]'))){
        $this->coderr=1372;
        return false;
        }
      }
    }
    

			$this->configGrid();
			$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
			if (count($grid)>0){
        $afedis=H::getX_vacio('TIPPAG','Cpdocpag','Afedis',$this->cppagos->getTippag());
        if ($afedis=='R' && $this->cppagos->getId()=='')
				  $this->coderr = Presupuesto::validarPreCom($this->cppagos,$grid,$this->cppagos->getFecpag());
			}
			else $this->coderr=1342;
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
  public function updateError() {
    $this->configGrid();
    $this->configGrid2();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
  }

  	public function executeAnular() {
		$this->refpag=$this->getRequestParameter('refpag');
  		$fecpag=$this->getRequestParameter('fecpag');
		//$salcau=$this->getRequestParameter('salcau');

		$dateFormat = new sfDateFormat('es_VE');
   		$fec = $dateFormat->format($fecpag, 'i', $dateFormat->getInputPattern('d'));

	   	$c = new Criteria();
   		$c->add(CppagosPeer::REFPAG,$this->refpag);
   		$c->add(CppagosPeer::FECPAG,$fec);
   		$this->cppagos = CppagosPeer::doSelectOne($c);
   		$id = $this->cppagos->getId();

   		sfView::SUCCESS;
	}

	public function executeSalvaranu(){
		$refpag=$this->getRequestParameter('refpag');
		$fecpag=$this->getRequestParameter('fecpag');
  		$fecanu=$this->getRequestParameter('fecanu');
		$desanu=$this->getRequestParameter('desanu');

		$dateFormat = new sfDateFormat('es_VE');
   		$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

		$this->msj='';
		if (strtotime($fec) < strtotime($fecpag)){
			$this->msj='La fecha de Anulación no puede ser menor a la del Pagado';
		}else {
      $q= new Criteria();
      $q->add(TsmovlibPeer::REFPAG,$refpag);
      $resulq= TsmovlibPeer::doSelectOne($q);
      if ($resulq){
        $this->msj='No se puede anular el Pagado porque está asociado a un Movimiento Según Libros.';
      }else {
         $t= new Criteria();
         $t->add(CpajustePeer::REFERE,$refpag);
         $t->add(CpdocajuPeer::REFIER,'G');
         $t->addJoin(CpajustePeer::TIPAJU,CpdocajuPeer::TIPAJU);
         $regt=CpajustePeer::doSelectOne($t);
         if ($regt){
           if ($regt->getStaaju()=='N'){
              $this->msj=Presupuesto::salvarAnuPrepagar($refpag,$fecanu,$desanu);
              if ($this->msj!=-1)
                $this->msj=H::obtenerMensajeError($this->msj);
              else $this->msj='';
           }else $this->msj='No se puede anular el Pagado porque tiene asociado a un Ajuste.';
         }else {
            $this->msj=Presupuesto::salvarAnuPrepagar($refpag,$fecanu,$desanu);
            if ($this->msj!=-1)
              $this->msj=H::obtenerMensajeError($this->msj);
            else $this->msj='';
         }
      }
		}
		sfView::SUCCESS;
	}

  public function saving($clasemodelo) {
     $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
     $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    return Presupuesto::salvarPrePagar($clasemodelo,$grid,$grid2);
  }

  public function deleting($clasemodelo){
    return Presupuesto::eliminarPrepagar($clasemodelo);
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
        $fecpag = $this->getRequestParameter('cppagos_fecpag','');
        $refcau = $this->getRequestParameter('cppagos_refcau','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($fecpag, 'i', $dateFormat->getInputPattern('d'));
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
                          $mondis = H::FormatoMonto(H::Monto_disponible(H::getCodPreDis($grid[$fila][$col-1]),$fec2));
                          $grid[$fila][4] = $mondis;
                        }else {
                          $javascript = "alert_('La Categoria del C&oacute;digo Presupuestario no esta asociada a este Usuario');";
                         $grid[$fila][$col-1]="";
                         $grid[$fila][4] = "0,00";
                        }
                      }else {
                        $mondis = H::FormatoMonto(H::Monto_disponible(H::getCodPreDis($grid[$fila][$col-1]),$fec2));
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
              if ($refcau!='')
                $mondis=H::toFloat($grid[$fila][6]);
              else
                $mondis = H::Monto_disponible(H::getCodPreDis($grid[$fila][0]),$fec2);
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
               if (H::toFloat($moneve)>H::toFloat($dif))
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

  public function getLabels()
  {
    $labels = parent::getLabels(); 
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cppagos{coddirec}'] = 'Estado';
    return $labels;
  }    
}
