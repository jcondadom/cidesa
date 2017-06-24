<?php

/**
 * precompro actions.
 *
 * @package    Roraima
 * @subpackage precompro
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 60604 2015-02-10 19:59:41Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class precomproActions extends autoprecomproActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpcompro/filters');

     $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
     $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');

     // 15    // pager
    $this->pager = new sfPropelPager('Cpcompro', 15);
    $c = new Criteria();
    if ($filsoldir=='S'){
      $this->sql='cpcompro.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpcomproPeer::CODDIREC,$this->sql,Criteria::CUSTOM);
    }
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
	public function editing() {
		$this->configGrid($this->cpcompro->getRefcom());
    $this->configGrid2($this->cpcompro->getRefcom());
		$this->setVars();
    if (!$this->cpcompro->getId()){
      $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');
      if ($filsoldir=='S'){
         $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
         $t= new Criteria();
         $t->add(SegdirusuPeer::LOGUSE,$loguse);
         $t->setLimit(1);
         $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
         $regt= SegdirusuPeer::doSelectOne($t);
         if ($regt){
          if ($this->cpcompro->getCoddirec()=='')
            $this->cpcompro->setCoddirec($regt->getCoddirec());
         }
      }
    }
	}

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
	public function configGrid($refcom='', $refprc='') {
        $this->params=array();
        $reg=array();

        if ($refprc!="")
        {
            $c = new Criteria();
            $c->add(CpimpprcPeer::REFPRC,$refprc);
            $reg2 = CpimpprcPeer::doSelect($c);
            if ($reg2)
            {
                foreach ($reg2 as $obj2)
                {
                    $cpimpc= new Cpimpcom();
                    $monto=$obj2->getMonimp()-$obj2->getMoncom()-$obj2->getMonaju();
                    $cpimpc->setCodpre($obj2->getCodpre());
                    $cpimpc->setMonimp($monto);
                    $cpimpc->setMondis(H::FormatoMonto($monto));
                    $cpimpc->setRefere($obj2->getRefprc());
                    $cpimpc->setMonporcom(H::FormatoMonto($monto));
                    $reg[]=$cpimpc;
                }
            }
        }else  {
            $c = new Criteria();
            $c->add(CpimpcomPeer::REFCOM,$refcom);
            $reg = CpimpcomPeer::doSelect($c);
        }

        /*if ($refprc!="")
            $this->columnas = Herramientas :: getConfigGrid('grid_cpimpcom_edit');
        else */
          $this->columnas = Herramientas :: getConfigGrid($this->cpcompro->getId()=='' ? 'grid_cpimpcom_create' : 'grid_cpimpcom_edit');
      if ($this->cpcompro->getId()=='')
      {
        $mascara=H::formatoPresupuesto();
        $loncod=strlen($mascara);
        $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
        $params= array('param1' => $categoriasusu);

        $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
        $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'PrePagar_Cpasiini2',$params);
      }

      $this->obj = $this->columnas[0]->getConfig($reg);

    	//$this->params['grid'] = $this->obj;
      $this->params=array('grid' => $this->obj);
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
        $detprecom=$this->getRequestParameter('cpcompro_detprecom', '');
        $feccom = $this->getRequestParameter('cpcompro_feccom','');
        $refprc = $this->getRequestParameter('cpcompro_refprc','');
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
        $javascript="";  $jsonextra="";
      switch ($name) {
         case ('a'):   //grid a detalle presupuestario
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
                              //Presupuesto::armarCadenaDetPre($grid,&$cadena);
                              //$javascript="$('cpcompro_detprecom').value=''; $('cpcompro_detprecom').value='$cadena';";
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
                  if ($refprc!='')
                    $mondis=H::toFloat($grid[$fila][4]);
                  else
                    $mondis = H::Monto_disponible(H::getCodPreDis($grid[$fila][0]),$fec2);
                 if (H::toFloat($grid[$fila][$col-1])>H::toFloat($mondis))
                 {
                    $javascript = "alert_('El Monto a Imputar es mayor al Disponible');";
                    $grid[$fila][$col-1]="0,00";
                    $grid[$fila][4]=number_format($mondis,2,',','.');
                    $javascript.="calcularTotales()";
                 }else {
                  $cal1=H::toFloat($mondis)-H::toFloat($grid[$fila][$col-1]);
                  $grid[$fila][4]=number_format($cal1,2,',','.');
                  //Presupuesto::armarCadenaDetPre($grid,&$cadena);
                   //$javascript="$('cpcompro_detprecom').value=''; $('cpcompro_detprecom').value='$cadena';";
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
        case ('b'):  // grid detalle presupuestario por evento
          switch ($col) {
             case ('1'):   //Codigo Presupuestario
                if ($grid[$fila][$col-1]!="")
                {
                  /*$mascara=H::formatoPresupuesto();
                  $loncod=strlen($mascara);
                  $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
                  $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
                    if (strlen($grid[$fila][$col-1])==$loncod)
                    {
                       $c = new Criteria();
                       $c->add(CpasiiniPeer::CODPRE,$grid[$fila][$col-1]);
                       $regs = CpasiiniPeer::doSelectOne($c);
                       if ($regs)
                       {
                         $enc=Presupuesto::BuscarCodDetPre($grid[$fila][$col-1],$detprecom,&$monimp);
                         if ($enc)
                         {
                           $grid[$fila][1]=$monimp;
                         }else {
                           $javascript = "alert_('El C&oacute;digo Presupuestario no esta en el Detalle Presupuestario');";
                           $grid[$fila][$col-1]="";
                         }
                       }else {
                          $javascript = "alert_('El C&oacute;digo Presupuestario no Existe');";
                          $grid[$fila][$col-1]="";
                       }
                    }else {
                        $javascript = "alert_('El C&oacute;digo Presupuestario no es de &Uacute;ltimo Nivel');";
                        $grid[$fila][$col-1]="";
                    }  */
                    $valor=$grid[$fila][$col-1];
                    $javascript="BuscarCodpre('$valor','$fila')";
                  }


                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('3'):  //Codigo del Evento
                if ($grid[$fila][$col-1]!="")
                {
                  if ($grid[$fila][0]!="")
                  {
                      if (!Presupuesto::Repetido2($grid,$grid[$fila][$col-1],$fila,$col-1)) {
                        $r= new Criteria();
                        $r->add(CpeveprePeer::CODEVE,$grid[$fila][$col-1]);
                        $resul= CpeveprePeer::doSelectOne($r);
                        if ($resul)
                        {
                            $grid[$fila][3]=$resul->getDeseve();
                        }else {
                            $javascript = "alert_('El C&oacute;digo del Evento no Existe');";
                            $grid[$fila][$col-1]="";
                        }
                    }else {
                        $javascript = "alert_('El C&oacute;digo del Evento esta repetido con ese mismo C&oacute;digo Presupuestario');";
                        $grid[$fila][$col-1]="";
                    }
                   }else {
                        $javascript = "alert_('Debe seleccionar el C&oacute;digo Presupuestario ');";
                        $grid[$fila][$col-1]="";
                    }
                }
                $jsonextra = ',["javascript","' . $javascript . '",""]';
                break;
              case ('5'):  //Monto Evento
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
                  $javascript="alert('El Monto del Evento sobrepasa al Monto Total de la Imputacion Presupuestaria'); ActualizarSaldosGrid('b',ArrTotales_b);";
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

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {
    $ajax = $this->getRequestParameter('ajax','');
    $codigo = $this->getRequestParameter('codigo','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $refcom = $this->getRequestParameter('refcom','');
    $feccom = $this->getRequestParameter('feccom','');
    $salcau = $this->getRequestParameter('salcau','');
    $js=""; $dato=""; $sw=true;

    switch ($ajax){
      case '1':
      	$msj = Presupuesto::verificarAnuPrecompro($refcom,$salcau);
      	if ($msj==''){
      		$javascript="abrirAnular('$refcom','$feccom')";
      	}else {
      		$javascript="alert('$msj')";
      	}
        $output = '[["javascript","'.$javascript.'",""]]';
        break;
      case '2':
      	$refcom = $this->getRequestParameter('cpcompro[refcom]','');
        $id = $this->getRequestParameter('id','');
      	$c = new Criteria();
		$c->add(CpcomproPeer::REFCOM,$refcom);
		$reg = CpcomproPeer::doSelectOne($c);
		$codE=Presupuesto::autorizarCompromiso($reg);
		if ($codE!=-1){
			$msj=H::obtenerMensajeError($codE);
		}
		else {
			$msj='Compromiso aprobado';
		}
		$javascript="alert('$msj'); ;  f = document.sf_admin_edit_form; f.action = '/presupuesto'+getEnv()+'.php/precompro/edit/".$id."'; f.submit();";
		$output = '[["javascript","'.$javascript.'",""]]';
        break;
      case '3':
          $t= new Criteria();
          $t->add(CpdoccomPeer::TIPCOM,$codigo);
          $reg= CpdoccomPeer::doSelectOne($t);
          if ($reg)
          {
            if ($feccom!='') {
              $dato=$reg->getNomext();
              $refprc=$reg->getRefprc();
              $js="$('cpcompro_refprcc').value='$refprc';  if ('$refprc'!='N') { $$('.botoncat')[2].disabled=false; $('cpcompro_refprc').readOnly=false;}else { $$('.botoncat')[2].disabled=true;$('cpcompro_refprc').value='' ; $('cpcompro_desprc').value='' ; $('cpcompro_refprc').readOnly=true;}";
            }else $js="alert_('El Tipo de Documento no existe'); $('cpcompro_tipcom').value=''; $('cpcompro_tipcom').focus();";
          }else {
              $js="alert_('Debe seleccionar la Fecha del Compromiso'); $('cpcompro_tipcom').value=''; $('cpcompro_tipcom').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;
      case '4':
          $sw=false;
          $fecprc = explode('/', $feccom);
          $fecha=$fecprc[2].'-'.$fecprc[1].'-'.$fecprc[0];
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $filsoldir3=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');
          $t= new Criteria();
          $t->add(CpprecomPeer::REFPRC,$codigo);
          $t->add(CpprecomPeer::FECPRC, $fecha,Criteria::LESS_EQUAL);
          //$t->add(CpprecomPeer::SALCOM, CpprecomPeer::SALCOM . "<" . CpprecomPeer::MONPRC . "-" . CpprecomPeer::SALAJU, Criteria :: CUSTOM);
          if ($filsoldir3=='S'){
            $sql='cpprecom.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
            $t->add(CpprecomPeer::CODDIREC,$sql,Criteria::CUSTOM);
          }
          $reg= CpprecomPeer::doSelectOne($t);
          if ($reg)
          {
            $sql2="select sum(monimp) as totimp, sum(moncom) as totcom from cpimpprc where refprc='".$codigo."'";
            if (Herramientas::BuscarDatos($sql2,$result2)){
             if ($result2[0]["totimp"]>$result2[0]["totcom"]) {
               $dateFormat = new sfDateFormat('es_VE');
               $fec1 = $dateFormat->format($this->getRequestParameter('feccom'), 'i', $dateFormat->getInputPattern('d'));
               if ($reg->getFecprc()<=$fec1) {
                $dato=$reg->getDesprc();
                $cedrif=$reg->getCedrif();
                $nomben=H::getX_vacio('CEDRIF', 'Opbenefi', 'Nomben', $cedrif);
                $js="$('cpcompro_cedrif').value='$cedrif'; $('cpcompro_nomben').value='$nomben'; if ($cedrif!='') $$('.botoncat')[3].disabled=true;";
              }else {
                $js="alert_('La Fecha del Precompromiso es mayor a la del Compromiso'); $('cpcompro_refprc').value=''; $('cpcompro_refprc').focus();";
                $codigo='';
              }
            }else {
              $js="alert_('El Precompromiso fue Totalmente Comprometido'); $('cpcompro_refprc').value=''; $('cpcompro_refprc').focus();";
              $codigo='';
            }
           }
          }else {
            if ($filsoldir3=='S')
              $js="alert_('El Precompromiso  no existe, fue Totalmente Comprometido o No esta asociado al Usuario'); $('cpcompro_refprc').value=''; $('cpcompro_refprc').focus();";
            else
              $js="alert_('El Precompromiso  no existe o ya fue Totalmente Comprometido'); $('cpcompro_refprc').value=''; $('cpcompro_refprc').focus();";
              $codigo='';
          }
          $this->params=array();
          $this->cpcompro = $this->getCpcomproOrCreate();
          $this->labels = $this->getLabels();

          $this->configGrid('', $codigo);

          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["cpcompro_descom","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;
      case '5':
          $t= new Criteria();
          $t->add(OpbenefiPeer::CEDRIF,$codigo);
          $reg= OpbenefiPeer::doSelectOne($t);
          if ($reg)
          {
              $dato=$reg->getNomben();
          }else {
              $js="alert_('El Beneficiario no existe'); $('cpcompro_cedrif').value=''; $('cpcompro_cedrif').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
          break;
      case '6':
        $refcom = $this->getRequestParameter('cpcompro[refcom]','');
        $id = $this->getRequestParameter('id','');
        $c = new Criteria();
        $c->add(CpcomproPeer::REFCOM,$refcom);
        $reg = CpcomproPeer::doSelectOne($c);
        if ($reg){
          $reg->setAprcom('N');
          $reg->save();
          $msj='Compromiso Desaprobado';
        }
        $javascript="alert('$msj');  f = document.sf_admin_edit_form; f.action = '/presupuesto'+getEnv()+'.php/precompro/edit/".$id."'; f.submit();";
        $output = '[["javascript","'.$javascript.'",""]]';
        break;
      case '7':
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
            $js="alert_('El Estado no existe o no esta asociada al usuario'); $('cpcompro_coddirec').value=''; $('cpcompro_desdirec').value=''; $('cpcompro_coddirec').focus();";
          else
            $js="alert_('La Direcci&oacute;n no existe o no esta asociada al usuario'); $('cpcompro_coddirec').value=''; $('cpcompro_desdirec').value=''; $('cpcompro_coddirec').focus();";
        }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    if ($sw) return sfView::HEADER_ONLY;
  }

	public function validateEdit() {
		$this->coderr =-1;

		if($this->getRequest()->getMethod() == sfRequest::POST){
			$this->cpcompro = $this->getCpcomproOrCreate();
      try{ $this->updateCpcomproFromRequest();}catch(Exception $ex){}
      $t= new Criteria();
      $t->add(CpprecomPeer::REFPRC,$this->cpcompro->getRefprc());
      $reg= CpprecomPeer::doSelectOne($t);
      if ($reg)
      {
         if ($reg->getFecprc()>$this->cpcompro->getFeccom()) {
               $this->coderr=1385;
               return false;
         }
       }

       $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');
       $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
       if ($filsoldir=='S'){
         if ($this->getRequestParameter('cpcompro[coddirec]')==''){
            if ($cambiareti=='S') $this->coderr=3014; else $this->coderr=3013;
            return false;
         }
       }

			$this->configGrid();
			$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      if (!$this->cpcompro->getId()) {
         if (!H::validarPeriodoPresuesto($this->cpcompro->getFeccom()))
         {
            $this->coderr=151;
            return false;
         }
			if (count($grid)>0){
        if ($this->getRequestParameter('cpcompro[refprc]')!=''){
            $f=$grid[0];
            $k=0;
            while ($k<count($f))
            {
               $c = new Criteria();
               $c->add(CpimpprcPeer::REFPRC,$this->getRequestParameter('cpcompro[refprc]'));
               $c->add(CpimpprcPeer::CODPRE,$f[$k]->getCodpre());
               $reg2 = CpimpprcPeer::doSelectOne($c);
               if ($reg2){
                 $montoporimputar=$reg2->getMonimp()-$reg2->getMoncom()-$reg2->getMonaju();
                 if (H::toFloat($f[$k]->getMonimp())>H::toFloat($montoporimputar)){
                    $this->coderr=4010;
                    return false;
                 }
               }
              $k++;
            }
        }

        $afedis=H::getX_vacio('TIPCOM','Cpdoccom','Afedis',$this->cpcompro->getTipcom());
        if ($afedis=='R' && $this->cpcompro->getId()=='')
				  $this->coderr = Presupuesto::validarPreCom($this->cpcompro,$grid,$this->cpcompro->getFeccom());
        if ($this->coderr==-1)
        {
          $valeven=H::getConfApp2 ('valeven', 'presupuesto', 'precompro');
          if ($valeven=='S') {
            $this->configGrid2();
            $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
            if (count($grid2[0])==0)
              $this->coderr=1368;

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
              if (H::toFloat($this->getRequestParameter('cpcompro[moncom]'))!=H::toFloat($this->getRequestParameter('cpcompro[toteve]'))){
                  $this->coderr=1370;
              }
            }
          }
          }
        }
			else $this->coderr=1342;
      }
			if($this->coderr!=-1){
				return false;
			} else return true;
		}else return true;
	}

    public function updateError() {
    	$this->configGrid();
      $this->configGrid2();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
      $this->setVars();
    }

	public function executeAnular() {
		$this->refcom=$this->getRequestParameter('refcom');
  	$feccom=$this->getRequestParameter('feccom');
		$salcau=$this->getRequestParameter('salcau');

		$dateFormat = new sfDateFormat('es_VE');
   		$fec = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));

	   	$c = new Criteria();
   		$c->add(CpcomproPeer::REFCOM,$this->refcom);
   		$c->add(CpcomproPeer::FECCOM,$fec);
   		$this->cpcompro = CpcomproPeer::doSelectOne($c);
   		$id = $this->cpcompro->getId();

   		sfView::SUCCESS;
	}

	public function executeSalvaranu(){
		$refcom=$this->getRequestParameter('refcom');
		$feccom=$this->getRequestParameter('feccom');
  		$fecanu=$this->getRequestParameter('fecanu');
		$desanu=$this->getRequestParameter('desanu');

		$dateFormat = new sfDateFormat('es_VE');
   		$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

		$this->msj='';
		if (strtotime($fec) < strtotime($feccom)){
			$this->msj='La fecha de Anulación no puede ser menor a la del Compromiso';
		}else {
       $q= new Criteria();
       $q->add(CpimpcauPeer::REFERE,$refcom);
       $q->add(CpimpcauPeer::STAIMP,'N',Criteria::NOT_EQUAL);
       $resul= CpimpcauPeer::doSelectOne($q);
       if ($resul)
  			 $this->msj='No se puede anular el Compromiso porque ya está asociado a un Causado.';
       else {
         $r= new Criteria();
         $r->add(CaordcomPeer::ORDCOM,$refcom);
         $resulr= CaordcomPeer::doSelectOne($r);
         if ($resulr){
           $this->msj='No se puede anular el Compromiso porque ya que esta asociado a una Orden de Compra.';
         }else {
             $t= new Criteria();
             $t->add(CpajustePeer::REFERE,$refcom);
             $t->add(CpdocajuPeer::REFIER,'C');
             $t->addJoin(CpajustePeer::TIPAJU,CpdocajuPeer::TIPAJU);
             $regt=CpajustePeer::doSelectOne($t);
             if ($regt){
               if ($regt->getStaaju()=='N'){
                 $this->msj=Presupuesto::salvarAnuPrecompro($refcom,$fecanu,$desanu);
                  if ($this->msj!=-1)
                    $this->msj=H::obtenerMensajeError($this->msj);
                  else $this->msj='';
               }else $this->msj='No se puede anular el Compromiso porque tiene asociado un Ajuste.';
             }else {
              $this->msj=Presupuesto::salvarAnuPrecompro($refcom,$fecanu,$desanu);
              if ($this->msj!=-1)
                $this->msj=H::obtenerMensajeError($this->msj);
              else $this->msj='';
          }
         }
       }
		}
		sfView::SUCCESS;
	}

	public function setVars() {
		$cpdefniv = CpdefnivPeer::doSelectOne(new Criteria());

		$this->params[] = $cpdefniv->getForpre();
  		$this->params[] = strlen($cpdefniv->getForpre());
  		$this->params[] = H::getX('TIPCOM','Cpdoccom','Reqaut',$this->cpcompro->getTipcom());
  	}

  	public function saving($clasemodelo) {
  		$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
      $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
  		return Presupuesto::salvarPrecompro($clasemodelo,$grid,$grid2);
  	}

  	public function deleting($clasemodelo){
  		return Presupuesto::eliminarPrecompro($clasemodelo);
  	}

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2($refcom='') {
      $t = new Criteria();
      $t->add(CpdisevePeer::REFDOC,$refcom);
      $t->add(CpdisevePeer::TIPMOV ,'COM');
      $reg2 = CpdisevePeer::doSelect($t);

      $this->columnas = Herramientas :: getConfigGrid('grid_eventos');

      $mascara=H::formatoPresupuesto();
      $loncod=strlen($mascara);
      $categoriasusu = sfContext::getInstance()->getUser()->getAttribute('categoriasusu');
      $params= array('param1' => $categoriasusu);

      $this->columnas[1][0]->setHTML('type="text" size="40" maxlength="'.chr(39).$loncod.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
      $this->columnas[1][0]->setCatalogo('cpasiini','sf_admin_edit_form',array('codpre' => 1),'PrePagar_Cpasiini2',$params);

      $this->obj2 = $this->columnas[0]->getConfig($reg2);

      $this->cpcompro->setObj2($this->obj2);
    }

  public function getLabels()
  {
    $labels = parent::getLabels();
    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['cpcompro{coddirec}'] = 'Estado';
    return $labels;
  }
}
