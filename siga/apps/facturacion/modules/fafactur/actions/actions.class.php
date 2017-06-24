<?php


/**
 * fafactur actions.
 *
 * @package    Roraima
 * @subpackage fafactur
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 40681 2010-09-17 21:03:38Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fafacturActions extends autofafacturActions {
	
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fafactur/filters');

    $loguse= $this->getUser()->getAttribute('loguse');
    $filcajusu=H::getConfApp2('filcajusu', 'facturacion', 'fafactur'); 
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 

     // 15    // pager
    $this->pager = new sfPropelPager('Fafactur', 15);
    $c = new Criteria();
    if ($filcajusu=='S' && $filsoldir=='S'){
      $this->sql='fafactur.codcaj in (select codcaj from "SIMA_USER".segcajusu where loguse=\''.$loguse.'\') and fafactur.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(FafacturPeer::CODCAJ,$this->sql,Criteria::CUSTOM);
    }else if ($filcajusu=='S')
    {
      $this->sql='fafactur.codcaj in (select codcaj from "SIMA_USER".segcajusu where loguse=\''.$loguse.'\')';
      $c->add(FafacturPeer::CODCAJ,$this->sql,Criteria::CUSTOM);
    }else if ($filsoldir=='S'){
      $this->sql='fafactur.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(FafacturPeer::CODDIREC,$this->sql,Criteria::CUSTOM); 
    }


    $this->c ? $c=$this->c : '';
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }


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
		if ($this->getUser()->getAttribute('clavecaja', null, 'fafactur') != "") {
			if($this->fafactur->getId()=='')
      {
        $this->fafactur->setReffac('########');
        
        $a= new Criteria();
        $a->add(FadefcajPeer::ID,$this->getUser()->getAttribute('clavecaja', null, 'fafactur'));
        $registro=FadefcajPeer::doSelectOne($a);
        if ($registro) {
          $this->fafactur->setCodcaj($registro->getId());
          $this->fafactur->setCodalmcaj($registro->getCodalm());
          $this->fafactur->setCodconpag($registro->getConpag());
          if ($this->fafactur->getCodconpag()!=''){
            $f= new Criteria();
            $f->add(FaconpagPeer::ID, $this->fafactur->getCodconpag());
            $result2= FaconpagPeer::doSelectOne($f);
            if ($result2)
            {
                $this->fafactur->setDesconpag($result2->getDesconpag());
                $this->fafactur->setTipconpag($result2->getTipconpag());
            }
          }
        }
        $bloqfec=H::getConfApp2('bloqfec', 'facturacion', 'fafactur');
        if ($bloqfec=='S'){
          if ($this->fafactur->getFecfac()=='')
            $this->fafactur->setFecfac(date('Y-m-d'));
        }
			}
	  }
		if($this->fafactur->getId())
	    {
    	  if ($this->fafactur->getStatus()=='N')
          {
          	if ($this->fafactur->getFecanu()!='')
           	$eti="ANULADA EL ".date('d/m/Y',strtotime($this->fafactur->getFecanu()));
           	else $eti="ANULADA ";
          	$this->fafactur->setEstatus($eti);
          }

              $t= new Criteria();
              $t->add(FaajustePeer::CODREF,$this->fafactur->getReffac());
              $resultado= FaajustePeer::doSelectOne($t);
              if ($resultado)
              {
                $etinc="N° N/C: ".$resultado->getRefaju().", Fecha: ".date('d/m/Y',strtotime($resultado->getFecaju()));
                $this->fafactur->setNotacredito($etinc);
	    }

	    }else {
        $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
        if ($filsoldir=='S'){
           $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
           $t= new Criteria();
           $t->add(SegdirusuPeer::LOGUSE,$loguse);
           $t->setLimit(1);
           $t->addAscendingOrderByColumn(SegdirusuPeer::CODDIREC);
           $regt= SegdirusuPeer::doSelectOne($t); 
           if ($regt){
            if ($this->fafactur->getCoddirec()=='')
              $this->fafactur->setCoddirec($regt->getCoddirec());
           }
          
        }
      }
		$c = new Criteria();
    $c->add(CadefartPeer::CODEMP,'001');
		$dato = CadefartPeer :: doSelectOne($c);
		if ($dato) {
			if ($dato->getApliclades() == 'S') {
				$this->fafactur->setApliclades('S');
			} else
				$this->fafactur->setApliclades('N');
		} else
			$this->fafactur->setApliclades('N');
		$this->fafactur->setReapor($this->getUser()->getAttribute('loguse', null));
		$this->setVars();
		$this->fafactur->setLonart($this->lonart);
		$this->fafactur->setDespnotent($this->despnotent);

		$this->configGrid();
	}

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->fafactur = $this->getFafacturOrCreate();
    $this->grabo=$this->getRequestParameter('grabo');

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFafacturFromRequest();

      if($this->saveFafactur($this->fafactur) ==-1){
        {
          if ($this->fafactur->getTipconpag()=='R')
          {
          	$sql="Select coalesce(Sum(MonDoc+RecDoc-DscDoc-AboDoc),0) as monto from CobDocume where CodCli='".$this->fafactur->getCodcli()."' Group by CodCli";
            if (Herramientas::BuscarDatos($sql,$result))
            {
            	if (count($result)>0)
            	{
                    $cal=H::tofloat($result[0]["monto"]) + $this->fafactur->getMonfac() - $this->fafactur->getMondesc();
                    if ($cal>H::tofloat($this->fafactur->getLimitecredito()))
                    {
                          $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
                    }else $this->setFlash('notice', 'Your modifications have been saved');
            	}else{
            	  $cal=$this->fafactur->getMonfac() - $this->fafactur->getMondesc();
	            	if ($cal>H::tofloat($this->fafactur->getLimitecredito()))
	            	{
	            	   $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
	            	}else $this->setFlash('notice', 'Your modifications have been saved');
            	}
            }
            else
            {
               $cal=$this->fafactur->getMonfac() - $this->fafactur->getMondesc();
            	if ($cal>H::tofloat($this->fafactur->getLimitecredito()))
            	{
            	   $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
            	}else $this->setFlash('notice', 'Your modifications have been saved');
            }
          }else $this->setFlash('notice', 'Your modifications have been saved');

         $id= $this->fafactur->getId();
         $arrobj= $this->fafactur->toArray();
         $cadobj=json_encode($arrobj);
         $this->SalvarBitacora($id ,'Guardo',$cadobj);}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('fafactur/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('fafactur/list');
        }
        else
        {
            return $this->redirect('fafactur/edit?id='.$this->fafactur->getId().'&grabo=S');
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid() {
		$this->configGridArtFac($this->fafactur->getReffac(), $this->fafactur->getTipref());
		$this->configGridDescFac($this->fafactur->getReffac());
		$this->configGridForPag($this->fafactur->getReffac());
		$this->configGridRgoArt($this->fafactur->getReffac());
		$this->configGridPedDes();
    $this->configGridFaclib($this->fafactur->getReffac());
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridArtFac($reffac = '', $tipref='',$tipo='', $arregloart=array()) {
		$consulta=false;
    $c = new Criteria();
    if($tipo=='PROFORMA')
    {
        $c->add(FaartfacproPeer :: REFFAC, $reffac);
        $c->add(FaartfacproPeer :: ESTATUS, 'A');
        $artfac = FaartfacproPeer :: doSelect($c);
    }else if($tipo=='D' || $tipo=='P' || $tipo=='E'){         
     $artfac=array();
     $t=0;
     while ($t<count($arregloart))
     {
       $faartfac1= new Faartfac();
       if ($arregloart[$t]["check"]=='1')
         $faartfac1->setCheck('1');
       else
         $faartfac1->setCheck('0');
       $faartfac1->setCodref($arregloart[$t]["codref"]);
       $faartfac1->setCodart($arregloart[$t]["codart"]);
       $faartfac1->setDesart($arregloart[$t]["desart"]);
       $faartfac1->setUnimed($arregloart[$t]["unimed"]);
       $faartfac1->setExiart($arregloart[$t]["exiart"]);
       $faartfac1->setCantot($arregloart[$t]["cantot"]);
       $faartfac1->setCanent($arregloart[$t]["canent"]);
       $faartfac1->setCandesp($arregloart[$t]["candesp"]);
       $faartfac1->setPrecio($arregloart[$t]["precio"]);
       $faartfac1->setPrecioe($arregloart[$t]["precioe"]);
       $faartfac1->setPrecio($arregloart[$t]["precio"]);
       $faartfac1->setMonrgo($arregloart[$t]["monrgo"]);
       $faartfac1->setTotart($arregloart[$t]["totart"]);
       $faartfac1->setDistot($arregloart[$t]["distot"]);
       $faartfac1->setPreant($arregloart[$t]["preant"]);
       $faartfac1->setCanpreart($arregloart[$t]["canpreart"]);
       $faartfac1->setCodctapro($arregloart[$t]["codctapro"]);
       $faartfac1->setMondes($arregloart[$t]["mondes"]);
       $faartfac1->setRecar($arregloart[$t]["recar"]);
       $faartfac1->setDesc($arregloart[$t]["desc"]);
       $faartfac1->setBlanco1($arregloart[$t]["blanco1"]);
       $faartfac1->setBlanco2($arregloart[$t]["blanco2"]);       
       $faartfac1->setRecargos($arregloart[$t]["recargos"]);
       $faartfac1->setDescuentos($arregloart[$t]["descuentos"]);
       $faartfac1->setBtucon($arregloart[$t]["btucon"]);
       $artfac[]=$faartfac1;

       $t++;
     }

    } 
    else
    {
        $c->add(FaartfacPeer :: REFFAC, $reffac);
        $artfac = FaartfacPeer :: doSelect($c);
        $consulta=true;
    }
		$mascara = $this->mascaraarticulo;
		$lonarti = $this->lonart;
		$obj = array (
			'codart' => 3,
			'desart' => 4
		);
		$params = array (
			'param1' => $lonarti,
      'param2' => "'+$('fafactur_codalmcaj').value+'",
			'val2'
		);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_faartfacv2');
    $mosreffac=H::getConfApp2('mosreffac', 'facturacion', 'fafactur');
                
		if ($tipref!="" && ($tipref=='P' || $tipref=='E'))
		{
      $this->columnas[0]->setFilas(1);
		  $this->columnas[0]->setAncho(1400);
		  $this->columnas[1][2]->setHTML('type="text" size="17" readonly=true');
		  //$this->columnas[1][6]->setHTML('readonly=true onKeyPress=cansol(event,this.id);');
      $this->columnas[1][6]->setHTML('readOnly=true');
      $this->columnas[1][6]->setOculta(false);
		  $this->columnas[1][7]->setOculta(false);
      $this->columnas[1][8]->setOculta(true);                  
      $this->columnas[1][7]->setHTML('size="10" onKeyPress=canentregar(event,this.id);');
      $oculaplrec=H::getConfApp2('oculaplrec', 'facturacion', 'fafactur');
      if  ($oculaplrec=='S')
      {
          $this->columnas[1][61]->setOculta(false);
          $this->columnas[1][62]->setOculta(false);
      }
		}
    else if ($tipref!="" && ($tipref=='D' || $tipref=='VC'))
		{
      $this->columnas[0]->setFilas(1);
		  $this->columnas[1][2]->setHTML('type="text" size="17" readonly=true');
		  $this->columnas[1][6]->setOculta(true);
		  $this->columnas[1][7]->setOculta(true);
      $this->columnas[1][8]->setOculta(false);
      $this->columnas[1][8]->setHTML(' size="10" onKeyPress=candespachar(event,this.id);');
		}
		else
		{
      $this->columnas[0]->setFilas($this->fafactur->getNumfilas());
      $this->columnas[1][2]->setHTML('type="text" size="25" maxlength="' . chr(39) . $lonarti . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter2(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,21);" onBlur="javascript:event.keyCode=13; ajaxarticulosfactura(event,this.id);"');
		  $this->columnas[1][2]->setCatalogo('caregart', 'sf_admin_edit_form', $obj, 'Caregart_FapedidoNew', $params);
		  $this->columnas[1][6]->setHTML('size="10" onKeyPress=cansol(event,this.id);');
		}
		$this->columnas[0]->setEliminar(true,'montoTotal()');
    $this->columnas[1][0]->setHTML('onClick="marcardesc(this.id)"');
		$this->columnas[1][9]->setCombo(FaartpvpPeer :: getPrecios());
		$this->columnas[1][9]->setHTML('onChange=Precio3(this.id);');
		$this->columnas[1][10]->setHTML('size="10" onKeyPress=Precio2(event,this.id);');
		$this->columnas[1][11]->setHTML(' size="10" onKeyPress=montorecargo(event,this.id);');
    $this->columnas[1][19]->setHTML('onClick="aplicardescuentos(this.id)"');
     if ($this->cambiolog!="S")
     {
     }else $this->columnas[0]->setAncho(1800);
     $this->columnas[1][35]->setCombo(array('L'=>'Largo','C'=>'Corto'));
     $this->columnas[1][22]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=mostrargridrecargos(this.id);'); //Aplicarecargos
     $this->columnas[1][23]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=mostrargriddescuentos(this.id);'); //Aplicardescuentos
		$oculcol=H::getConfApp2('oculcol', 'facturacion', 'fafactur');
    if ($oculcol=='S')
    {
      $this->columnas[0]->setAncho(800);
      $this->columnas[0]->setAncho(1000);
      for ($i=24; $i < 69; $i++) { 
        $this->columnas[1][$i]->setOculta(true);
      }
    }
    $mosdatprod=H::getConfApp2('mosdatprod', 'facturacion', 'fafactur');
    if ($mosdatprod=='S')
    {
      $this->columnas[1][66]->setOculta(false);
      $this->columnas[1][67]->setOculta(false);
      $this->columnas[1][68]->setOculta(false);
    }
    if ($consulta && $mosreffac=='S')
      $this->columnas[1][1]->setOculta(false);

    $this->obj1 = $this->columnas[0]->getConfig($artfac);

		$this->fafactur->setObj1($this->obj1);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDescFac($reffac = '', $tipo='', $tipcliente = '', $arreglo = array (), $codart='') {
		if ($tipcliente != '') {
			$descart = $arreglo;
		} else {
                    $c = new Criteria();
		    if ($tipo=='PROFORMA')
                    {                        
                        $c->add(FadescartproPeer :: REFDOC, $reffac);
                        $dreg = FadescartproPeer :: doSelect($c);
                        foreach ($dreg as $obj)
                        {
                          $fadescart2= new Fadescart();
                          $fadescart2->setCoddesc($obj->getCoddesc());
                          $fadescart2->setDesdesc($obj->getDesdesc());
                          $fadescart2->setMondesc($obj->getMondesc());
                          $fadescart2->setCodcta($obj->getCodcta());
                          $fadescart2->setCantidad(0);
                          $fadescart2->setMontdesc($obj->getMontdesc());
                          $fadescart2->setTipdesc($obj->getTipdesc());
                          $fadescart2->setTipret($obj->getTipret());                          
                          $descart[]=$fadescart2;
                        }
                    }else {                        
                        $c->add(FadescartPeer :: REFDOC, $reffac);
                        $c->add(FadescartPeer :: CODART, $codart);
                        $descart = FadescartPeer :: doSelect($c);
                    }
		}

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fadescart');
		$this->columnas[1][0]->setHTML('onBlur="javascript:event.keyCode=13; ajaxdescuentos(event,this.id);"');
		$this->columnas[1][2]->setHTML('onKeyPress=calcularMondesc(event,this.id);');
		$this->obj2 = $this->columnas[0]->getConfig($descart);

		$this->fafactur->setObj2($this->obj2);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridForPag($reffac = '') {
		$c = new Criteria();
		$c->add(FaforpagPeer :: REFFAC, $reffac);
		$forpag = FaforpagPeer :: doSelect($c);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_faforpag');
		$this->columnas[1][5]->setHTML('size=10 onKeyPress=calcularmontopago(event,this.id);');
		$this->obj3 = $this->columnas[0]->getConfig($forpag);

		$this->fafactur->setObj3($this->obj3);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridFaclib($reffac = '') {
        $c = new Criteria();
        $c->add(FafaclibPeer :: REFFAC, $reffac);
        $faclib = FafaclibPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fafaclib');
//		$this->columnas[1][5]->setHTML('size=10 onKeyPress=calcularmontopago(event,this.id);');
        $this->obj6 = $this->columnas[0]->getConfig($faclib);

        $this->fafactur->setObj6($this->obj6);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRgoArt($reffac = '', $tipo='', $codart='') {
       $c = new Criteria();
       if($tipo=='PROFORMA')
        {           
           $c->add(FargoartproPeer :: REFDOC, $reffac);
           $c->add(FargoartproPeer :: CODART, $codart);
           $rreg = FargoartproPeer :: doSelect($c);           
               foreach ($rreg as $obj)
                {
                  $fargoart2= new Fargoart();
                  $fargoart2->setCodrgo($obj->getCodrgo());
                  $fargoart2->setNomrgo($obj->getNomrgo());
                  $fargoart2->setRecfij($obj->getRecfij());
                  $fargoart2->setMonrgo($obj->getMonrgo());
                  $fargoart2->setCodcta($obj->getCodcta());
                  $fargoart2->setTipo($obj->getTipo());
                  $fargoart2->setMonrgo2($obj->getMonrgo2());
                  $rgoart[]=$fargoart2;
                }
           
        }else {            
            $c->add(FargoartPeer :: REFDOC, $reffac);
            $c->add(FargoartPeer :: CODART, $codart);            
            $rgoart = FargoartPeer :: doSelect($c);
            
        }

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fargoart');
        $this->columnas[1][0]->setHTML('onBlur="javascript:event.keyCode=13; ajaxrecargos(event,this.id);"');
        $this->columnas[1][3]->setHTML('onKeyPress=CalculoMontoRgo(event,this.id);');
        $this->obj4 = $this->columnas[0]->getConfig($rgoart);

        $this->fafactur->setObj4($this->obj4);
	}

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridPedDes($referencia = '', $codcli = '', $fechoy='', $fecdes='', $fechas='', $codalm='', $presupcon='', $codmon='') {
		$reg=array();
    if ($referencia == 'P') {
      Factura::buscarPedidosDis($codcli,$fecdes,$fechas,$reg);
			//$sql = "Select '' as check, NROPED as nroped,DESPED as desped,FECPED as fecped, 9 as id from FAPEDIDO WHERE CodCli='" . $codcli . "' and STATUS='A' and NroPed not in (Select CodRef from Fanotent where CodRef=FaPedido.NroPed and TipRef='P') order by NroPed";       
			//Herramientas :: BuscarDatos($sql, & $reg);
		}else if ($referencia == 'E') {
      Factura::buscarPresupuestos($codcli,$presupcon,$codmon,$reg);
      //$sql = "Select '' as check, refpre as refpre,despre as despre,fecpre as fecpre, 9 as id from fapresup WHERE CodCli='" . $codcli . "' and refpre not in (Select refped from FaPedido where refped=FaPresup.refpre and TipRef='PR') order by refpre";
      //Herramientas :: BuscarDatos($sql, $reg);
    } else  if ($referencia == 'D') {
      Factura::buscarDespachos($codcli,$fechoy,$fecdes,$fechas,$codalm,$reg);
			//$sql = "Select '' as check, DPHART as dphart,DESDPH as desdph,FECDPH as fecdph, 9 as id from CADPHART WHERE CodCli='" . $codcli . "' and STADPH='A' and TIPDPH<>'D' and REQART not in (Select NroNot From FaNotEnt where (TipNot='D') or (NroNot=CADPHART.REQART and TipRef='F')) order by DPHART";
			//Herramientas :: BuscarDatos($sql, & $reg);
		}
		$this->fil1 = count($reg);

		$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/fafactur/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fapeddes');
		if ($referencia == 'D') {
			$this->columnas[0]->setTabla('Cadphart');
      $this->columnas[1][0]->setNombrecampo('check');
			$this->columnas[1][1]->setNombrecampo('dphart');
			$this->columnas[1][2]->setNombrecampo('desdph');
			$this->columnas[1][3]->setNombrecampo('fecdph');
		}else if ($referencia == 'E') {
      $this->columnas[0]->setTabla('Fapresup');
      $this->columnas[1][1]->setNombrecampo('refpre');
      $this->columnas[1][2]->setNombrecampo('despre');
      $this->columnas[1][3]->setNombrecampo('fecpre');
    }

		$this->obj5 = $this->columnas[0]->getConfig($reg);

		$this->fafactur->setObj5($this->obj5);
	}

	/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax() {
		$codigo = $this->getRequestParameter('codigo', '');
		$ajax = $this->getRequestParameter('ajax', '');
		$cajtexmos = $this->getRequestParameter('cajtexmos', '');
		$cajtexcom = $this->getRequestParameter('cajtexcom', '');
		$javascript = "";
		switch ($ajax) {
			case '1' :
				$output = '[["","",""],["","",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '2' :
				if ($codigo != "") {
					$c = new Criteria();
					$c->add(FaclientePeer :: RIFPRO, $codigo);
					$reg = FaclientePeer :: doSelectOne($c);
					if ($reg) {
						$javascript = "$('fafactur_incluircliente').value='N'; ";
						$this->sql = "carecaud.codrec not in (select Farecpro.codrec from Farecpro where Farecpro.codpro='" . $reg->getCodpro() . "')";
						$c = new Criteria();
						$c->add(CarecaudPeer :: LIMREC, 'S');
						$c->add(CarecaudPeer :: CODTIPREC, $reg->getCodtiprec());
						$c->add(CarecaudPeer :: CODREC, $this->sql, Criteria :: CUSTOM);
						$reg2 = CarecaudPeer :: doSelectOne($c);
						if (!$reg2) {
							$dato1 = $reg->getNompro();
							$dato2 = $reg->getTelpro();
							$dato3 = $reg->getDirpro();
              $dato9=$reg->getDirent();
							$dato4 = $reg->getTipper();
							if ($dato4 == 'N') {
								$javascript = $javascript . "$('fafactur_tipper_N').checked=true; ";
							} else {
								$javascript = $javascript . "$('fafactur_tipper_J').checked=true; ";
							}
							$dato5 = $reg->getCodpro();
							$dato6 = $reg->getCodcta();
							$dato7 = $reg->getFatipcteId();
							$dato8 = $reg->getLimcre();
							Factura::mostrarDescuentos($dato7,$arreglodesc);
							//$javascript = $javascript . "actualizargrids('$arreglodesc'); ";
						} else {
							$javascript = $javascript . "alert('El Cliente no ha consignado todos los recaudos limitantes'); $('fafactur_rifpro').value='';";
							$dato1 = "";
							$dato2 = "";
							$dato3 = "";
							$dato4 = "";
							$dato5 = "";
							$dato6 = "";
							$dato7 = "";
							$dato8 = "";
              $dato9="";
						}
					} else {
						if ($this->getRequestParameter('tipref') == 'V') {
							$javascript = $javascript . " incluirCliente();";
							$dato1 = "";
							$dato2 = "";
							$dato3 = "";
							$dato4 = "";
							$dato5 = "";
							$dato6 = "";
							$dato7 = "";
							$dato8 = "";
              $dato9="";
						} else {
							$javascript = $javascript . "alert('El Cliente no Existe. No puede incluirlo directamente desde esta pantalla porque la factura no es una Venta Directa'); $('fafactur_rifpro').value='';";
							//$javascript = $javascript . " actualizardescuento();";
							$dato1 = "";
							$dato2 = "";
							$dato3 = "";
							$dato4 = "";
							$dato5 = "";
							$dato6 = "";
							$dato7 = "";
							$dato8 = "";
              $dato9="";
						}
					}
				} else {
					//$javascript = $javascript . " actualizardescuento();";
					$dato1 = "";
					$dato2 = "";
					$dato3 = "";
					$dato4 = "";
					$dato5 = "";
					$dato6 = "";
					$dato7 = "";
					$dato8 = "";
          $dato9="";
				}
				$output = '[["fafactur_nompro","' . $dato1 . '",""],["fafactur_telpro","' . $dato2 . '",""],["fafactur_dirpro","' . $dato3 . '",""],["fafactur_codcli","' . $dato5 . '",""],["fafactur_ctacli","' . $dato6 . '",""],["fafactur_tipocliente","' . $dato7 . '",""],["fafactur_limitecredito","' . $dato8 . '",""],["fafactur_dirent","' . $dato9 . '",""],["javascript","' . $javascript . '",""],["bx_0_5","1",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '3' :
				$c = new Criteria();
				$c->add(TsdesmonPeer :: CODMON, $codigo);
				$c->add(TsdesmonPeer :: FECMON, $this->getRequestParameter('fecha'));
				$result = TsdesmonPeer :: doSelectOne($c);
				if ($result) {
					$moneda = $result->getValmon();
					$posneg = $result->getAumdis();
					$codigomoneda = $result->getCodmon();
				} else {
					$sql = "Select MAX(VALMON) as VALMON,MAX(CODMON) as CODMON from TSDesMon where codmon='" . $codigo . "'";
					if (Herramientas :: BuscarDatos($sql, $result)) {
						if (!is_null($result[0]["codmon"])) {
							$moneda = $result[0]["valmon"];
							$posneg = "D";//$result[0]["aumdis"];
							$codigomoneda = $result[0]["codmon"];
						} else {
							$moneda = 0;
							$posneg = "D";
							$codigomoneda = "";
						}
					} else {
						$moneda = 0;
						$posneg = "D";
						$codigomoneda = "";
					}
				}
				//falta cambio de moneda

				$output = '[["fafactur_valmon","' . H::FormatoMonto($moneda,6) . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '4' :
				if ($codigo != "") {
					$c = new Criteria();
					$c->add(FaconpagPeer :: ID, $codigo);
					$result = FaconpagPeer :: doSelectOne($c);
					if ($result) {
						$dato1 = $result->getTipconpag();
						if ($this->getRequestParameter('incluir') == 'N' || ($this->getRequestParameter('incluir') == 'S' && $result->getTipconpag() != 'R')) {
							$dato2 = $result->getDesconpag();
							if ($this->getRequestParameter('ctacli') == "" && $result->getTipconpag() == 'R') {
								$javascript = "alert('No se puede Facturar debido a que el Cliente no posee Cuenta Contable asociada'); $('fafactur_codconpag').value=''; ";
								$dato1 = "";
								$dato2 = "";
							}
						} else {
							$javascript = "alert('La Factura no puede ser a Crédito porque está incluyendo al Cliente'); $('fafactur_codconpag').value='';";
							$dato1 = "";
							$dato2 = "";
						}
					} else {
						$javascript = "alert('La Condición de Pago no Existe'); $('fafactur_codconpag').value=''; ";
						$dato1 = "";
						$dato2 = "";
					}
				}
				$output = '[["fafactur_tipconpag","' . $dato1 . '",""],["fafactur_desconpag","' . $dato2 . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '5' :
				$javascript = "$('CajaPrinc').hide();";
        $correl = "########";
        $filalmcaj=H::getConfApp2('filalmcaj', 'facturacion', 'fafactur');     
				$this->getUser()->setAttribute('clavecaja', $this->getRequestParameter('codigocaja'), 'fafactur');
         $gencomext=H::getConfApp2('gencomext', 'facturacion', 'fafactur');
         if ($gencomext=='S')
          $javascript = $javascript . "$('FormaPrinc').show(); $$('.sf_admin_action_list')[0].show(); $$('.sf_admin_action_save')[6].show(); $$('.sf_admin_action_create')[0].show();";
        else
          $javascript = $javascript . "$('FormaPrinc').show(); $$('.sf_admin_action_list')[0].show(); $$('.sf_admin_action_save')[5].show(); $$('.sf_admin_action_create')[0].show();";
        if ($filalmcaj=='S') {
          $a= new Criteria();
          $a->add(FadefcajPeer::ID,$this->getRequestParameter('codigocaja'));
          $registro=FadefcajPeer::doSelectOne($a);
          if ($registro) {
            $codalm= $registro->getCodalm();
            $codconpag=$registro->getConpag();
            $desconpag=H::getX_vacio('ID','Faconpag','Desconpag',$codconpag);
            $javascript= $javascript. "$('fafactur_codalmcaj').value='".$codalm."'; $('fafactur_codconpag').value='".$codconpag."'; $('fafactur_desconpag').value='".$desconpag."';";
          }
        }
				$output = '[["javascript","' . $javascript . '",""],["fafactur_reffac","' . $correl . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '6' :
				$c = new Criteria();
				$c->add(FasinrgoPeer :: CODART, $this->getRequestParameter('articulo'));
				$c->add(FasinrgoPeer :: CODRGO, $this->getRequestParameter('recargo'));
				$resul = FasinrgoPeer :: doSelectOne($c);
				if ($resul) {
					$javascript = "$('fafactur_trajo').value='S'";
				} else
					$javascript = "$('fafactur_trajo').value='N'";

				$output = '[["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '7' :  //Recargos
				$cajtexmos = $this->getRequestParameter('cajtexmos');
				$recfij = $this->getRequestParameter('recfij');
				$monto = $this->getRequestParameter('monto');
				$cta = $this->getRequestParameter('cta');
				$tipo = $this->getRequestParameter('tipo');
				$monto2 = $this->getRequestParameter('monto2');
				$montota = $this->getRequestParameter('montot');
				$montot1 = $this->getRequestParameter('montot1');
				$valmonto = $this->getRequestParameter('valmonto');

				$c = new Criteria();
				$c->add(FarecargPeer :: CODRGO, $codigo);
				$resul = FarecargPeer :: doSelectOne($c);
				if ($resul) {
					$dato = $resul->getNomrgo();
					$dato1 = $resul->getCodcta();
					if ($resul->getCalcul() == 'S') {
						$dato2 = "Si";
						$montot = $montota;
					} else {
						$dato2 = "No";
						$montot = $montot1;
					}

					if ($resul->getTiprgo() == 'M') {
						if ($valmonto != "") {
							$dato3 = $valmonto;
						} else {
							$dato3 = number_format($resul->getMonrgo(), 2, ',', '.');
						}
					} else {
						if ($resul->getTiprgo() == 'P') {
							$cuenta = (($montot * $resul->getMonrgo()) / 100);
							$dato3 = number_format($cuenta, 2, ',', '.');
						} else {
							$dato3 = "0,00";
						}
					}
					$dato4 = $resul->getTiprgo();
					$dato5 = $resul->getMonrgo();
					$javascript = "calcularTotalRecargos();";
				} else {
					$dato = "";
					$dato1 = "";
					$dato2 = "";
					$dato3 = "";
					$dato4 = "";
					$dato5 = "";
					$javascript = "alert('El Recargo no existe'); $('$codigo').value=''; calcularTotalRecargos();";
				}
				$output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $recfij . '","' . $dato2 . '",""],["' . $monto . '","' . $dato3 . '",""],["' . $cta . '","' . $dato1 . '",""],["' . $tipo . '","' . $dato4 . '",""],["' . $monto2 . '","' . $dato5 . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '8' :
				$c = new Criteria();
				$c->add(FacladtoPeer :: LOGUSE, $this->getRequestParameter('login'));
				$resul = FacladtoPeer :: doSelectOne($c);
				if ($resul) {
					if ($resul->getClave() == $this->getRequestParameter('clave')) {
						$dato = $resul->getDescto();
						$javascript = "$('datosRecarg').hide(); $('datosDesc').show(); $('ClaveDes').hide();";
					} else {
						$dato = 0;
						$javascript = "alert('Clave Invalida'); $('fafactur_password').value=''";

					}
				} else {
					$dato = 0;
					$javascript = "alert('Clave Invalida'); $('fafactur_password').value=''";
				}
				$output = '[["fafactur_porcentajedescto","' . $dato . '",""],["javascript","' . $javascript . '",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '9' :  //Descuentos
				$montodesc = $this->getRequestParameter('montodesc');
				$cuenta = $this->getRequestParameter('cuenta');
				$cantidad = $this->getRequestParameter('cantidad');
				$valcant = $this->getRequestParameter('valcant');
				$descuento = $this->getRequestParameter('descuento');
				$tipo = $this->getRequestParameter('tipo');
				$tiporet = $this->getRequestParameter('tiporet');
				$eldescuento = $this->getRequestParameter('eldescuento');
				$valmontodesc = $this->getRequestParameter('valmontodesc');
				$msj = "";
				$dato = "";
				$dato1 = "";
				$dato2 = "";
				$dato3 = "";
				$dato4 = "";
				$dato5 = "";
				$dato6 = "";
				$dato7 = "";
				$javascript="";

				$c = new Criteria();
				$c->add(FadesctoPeer :: CODDESC, $codigo);
				$reg = FadesctoPeer :: doSelectOne($c);
				if ($reg) {
					if ($valcant!="")
					{
                                           if ($valcant==0)
                                           {
                                            $javascript="$('$cantidad').value='1'; ";
                                           }
					}

					if ($reg->getTipret() != 'S') {
						$dato = 'N';
					} else
						$dato = 'S';
					if ($reg->getTipdesc() == 'M') {
						$montota = (($this->getRequestParameter('monto14') * $this->getRequestParameter('porcentajedesc')) / 100);
						if (($reg->getMondesc() > $montota) && ($this->getRequestParameter('aplicaclades') == 'S')) {
							$javascript = $javascript."alert('El Porcentaje del Descuento sobrepasa el límite permitido para el Usuario'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
							$msj = 'z';
						}
					} else {
						if (($reg->getMondesc() > $this->getRequestParameter('porcentajedesc')) && ($this->getRequestParameter('aplicaclades') == 'S')) {
							$javascript = $javascript."alert('El Porcentaje del Descuento sobrepasa el límite permitido para el Usuario'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
							$msj = 'z';
						}
					}
					if ($msj == "") {
						$dato1 = $reg->getDesdesc();
						$dato2 = $reg->getCodcta();
						$dato3 = $reg->getMondesc();
						$dato4 = $reg->getTipdesc();
						$dato5 = $reg->getTipret();

						if ($reg->getTipdesc() == 'M') {
							if ($valmontodesc <= 0) {
								$cuent = $reg->getMondesc() * $valcant;
								$dato6 = number_format($cuent, 2, ',', '.');
							}
						} else {
							if ($reg->getTipdesc() == 'P') {

								if ($reg->getTipret() != 'S') {
									$descto = $this->getRequestParameter('monfac') - $this->getRequestParameter('totalrgo') + $this->getRequestParameter('totaldesc');
								} else {
									$descto = $this->getRequestParameter('totalrgo');
								}
								$cuent = ($descto * $reg->getMondesc() / 100);
								$dato6 = number_format($cuent, 2, ',', '.');
								//$dato6 = number_format($eldescuento, 2, ',', '.');
							} else {
								$dato6 = '0,00';
							}
						}

						if ($dato6 != "") {
							if ($this->getRequestParameter('totaltotarti') != "") {
								if (H::Formatonum($dato6) > $this->getRequestParameter('totaltotarti')) {
									$dato6 = '0,00';
									$dato7 = $this->getRequestParameter('totaldesc') - H :: tofloat($dato6);
								} else {
									//$javascript = $javascript."calcularTotalDescuento(); montoTotal(); actualizarRecargos(); recalcularRecargos(); montoTotal();";
                                                                    $javascript = $javascript."calcularTotalDescuento();";
								}
							}
						}
					}
				} else {
					$javascript = "alert('El Descuento no existe'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
				}
				$output = '[["fafactur_esretencion","' . $dato . '",""],["' . $cajtexmos . '","' . $dato1 . '",""],["' . $cuenta . '","' . $dato2 . '",""],["' . $descuento . '","' . $dato3 . '",""],["' . $tipo . '","' . $dato4 . '",""],["' . $tiporet . '","' . $dato5 . '",""],["' . $montodesc . '","' . $dato6 . '",""],["fafactur_totdesc","' . $dato7 . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '10' :
				$dateFormat = new sfDateFormat('es_VE');
				$fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

				$c = new Criteria();
				$c->add(FafacturPeer :: REFFAC, $this->getRequestParameter('reffac'));
				$data = FafacturPeer :: doSelectOne($c);
				if ($data) {
					if ($fecha < $data->getFecfac()) {
						$msj = "alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha de la Factura'); $('fafactur_fecanu').value=''";
					} else {
						$msj = "";
				        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
				        {
				          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('fafactur_fecanu').value=''; $('fafactur_fecanu').focus(); ";
				        }
				        else { $msj=""; }
					}
				} else {
					$msj = "";
				}
				$output = '[["javascript","' . $msj . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '11' :
				$this->param = "";
				$this->ajaxs = "";
				$p = "";
				$this->arreglo = array ();
				$ctaprove = $this->getRequestParameter('ctaprove');
				$blancodos = $this->getRequestParameter('blanco2');
				$unim = $this->getRequestParameter('unidad');
				$cant = $this->getRequestParameter('cantidad');
				$existenc = $this->getRequestParameter('existencia');
				$montrgo = $this->getRequestParameter('montrgo');
				$tota = $this->getRequestParameter('total');
				$blanc = $this->getRequestParameter('blanco');
				$this->filagrid = $this->getRequestParameter('filagrid');
				$ctaprovee = "";
				$blanco2 = "";
				$desart = "";
				$unimed = "";
				$cantidad = "";
				$existencia = "";
				$monrgo = "";
				$blanco = "";
				$total = "";
				$rgofijos="";
        $filalmcaj=H::getConfApp2('filalmcaj', 'facturacion', 'fafactur');   
        $codalmcaja = $this->getRequestParameter('codalmcaja');  
        $afeinvfac=H::getConfApp2('afeinvfac', 'facturacion', 'fafactur');
        $valexiart=H::getConfApp2('valexiart', 'compras', 'almreq');
    
				$c = new Criteria();
        $c->add(CaregartPeer :: CODART, $codigo);
        if ($filalmcaj=='S')
        {
          $c->add(CaartalmPeer :: CODALM, $codalmcaja);
          $c->addJoin(CaregartPeer::CODART,CaartalmPeer::CODART);
        }				
				$dato = CaregartPeer :: doSelectOne($c);
				if ($dato) {
					if ($dato->getCtavta() != "") {
						if (Factura :: articulosConsignacion($codigo)) {
							$sql = "Select distinct A.CodPro as codpro,B.NomPro as nompro,A.Comisi as comisi From FaArtPro A,CAProVee B Where CodArt = '" . $codigo . "' and A.CodPro=B.CodPro";
							if (Herramientas :: BuscarDatos($sql, $result)) {
								if (count($result) > 1) {
									$proveedores = array ();
									$j = 0;
									while ($j < count($result)) {
										$proveedores += array (
											$result[$j]["codpro"] . "/" . $result[$j]["nompro"] . "/" . $result[$j]["comisi"] => $result[$j]["codpro"] . "/" . $result[$j]["nompro"] . "/" . $result[$j]["comisi"]
										);
										$j++;
									}

									$this->arreglo = $proveedores;
									$this->param = '1';
									$ctaprovee = "";
									$blanco2 = "";
									$javascript = "$('label19').innerHTML = '" . $dato->getCodart() . "  " . $dato->getDesart() . "'; $('listArt').show();";
								} else {
									$ctaprovee = $result[0]["codpro"];
									$blanco2 = $result[0]["comisi"];
								}
							} else {
								$ctaprovee = "";
								$blanco2 = "";
							}
						} else {
							$ctaprovee = "";
							$blanco2 = "";
						}

						$desart = htmlspecialchars($dato->getDesart());
						$unimed = $dato->getUnimed();
						
            if ($afeinvfac=='S')
            {
              if ($valexiart=='S'){
                 $cant_entregada = H::toFloat($this->getRequestParameter('canent'));
                 $distot=H::toFloat(H::ObtenerExistenciaArticulo($codigo));
                 $exist = $distot - $cant_entregada;
                 $existencia = number_format($exist, 2, ',', '.');    
                 $cantidad = number_format($distot, 2, ',', '.'); 
               }else {
                 $w = new Criteria();
                 $w->add(CaartalmPeer::CODART,$codigo);
                 $w->add(CaartalmPeer::CODALM,$codalmcaja);
                 $reg = CaartalmPeer::doSelectOne($w);
                 if ($reg)
                 {
                   $cant_entregada = H::toFloat($this->getRequestParameter('canent'));
                   $exist = $reg->getExiact() - $cant_entregada;
                   $existencia = number_format($exist, 2, ',', '.');    
                   $cantidad = number_format($exist, 2, ',', '.'); 
                 }else {
                   $existencia = '0,00';
                 }   
               }            
            }else {
						  $cant_entregada = $this->getRequestParameter('canent');
              $distot=H::toFloat(H::ObtenerExistenciaArticulo($codigo));
						  $exist =  $distot - $cant_entregada; //$dato->getDistot() - $cant_entregada;
						  $existencia = number_format($exist, 2, ',', '.');
              $cantidad = number_format($distot, 2, ',', '.');
            }						
						$docrefiere = $this->getRequestParameter('docref');
						if ($docrefiere == 'V') {
							$precio = "0,00";
							$cantot = "0,00";
						}
						$monrgo = "0,00";
						$total = "0,00";
						$blanco = $dato->getTipo();
						$javascript = $javascript . " $('descuent').show(); $('recarg').show(); ";
						$rgofijos = 'S';

						if ($docrefiere == 'V') {
							$precio = "0,00";
							$cantot = "0,00";
						}
						$javascript=$javascript." datosRecargos(); ";
					} else {
						$javascript = "alert('El Artículo no posee Cuenta de Venta asociada'); $('$cajtexcom').value=''; ";
					}
				} else {
					$javascript = "alert('El Código del Artículo no Existe'); $('$cajtexcom').value='';";
				}

				$output = '[["' . $ctaprove . '","' . $ctaprovee . '",""],["' . $blancodos . '","' . $blanco2 . '",""],["' . $cajtexmos . '","' . $desart . '",""],["' . $unim . '","' . $unimed . '",""],["' . $cant . '","' . $cantidad . '",""],["' . $existenc . '","' . $existencia . '",""],["' . $montrgo . '","' . $monrgo . '",""],["' . $tota . '","' . $total . '",""],["' . $blanc . '","' . $blanco . '",""],["fafactur_rgofijos","' . $rgofijos . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				break;
			case '12' :
				$this->ajaxs = '5';
				$this->precios = array ();
				$javascript = "";
				$precioe=$this->getRequestParameter('precio2');
                                $fecemi=$this->getRequestParameter('fecemi');
                                $dateFormat = new sfDateFormat('es_VE');
                                $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));
				$this->precios = FaartpvpPeer :: getPrecios($codigo,$fec);
				if (count($this->precios)==0)
				{
				  $javascript=$javascript."$('$precioe').readOnly=false;";
				}
				$output = '[["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				break;
			case '13' :
				$this->ajaxs = '13';
				$this->fafactur = $this->getFafacturOrCreate();
        if ($this->getRequestParameter('fecdes')!="") {
        $dateFormat = new sfDateFormat('es_VE');
        $fec1 = $dateFormat->format($this->getRequestParameter('fecdes'), 'i', $dateFormat->getInputPattern('d'));
        }else {$fec1="";}
        if ($this->getRequestParameter('fechas')!="") {
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($this->getRequestParameter('fechas'), 'i', $dateFormat->getInputPattern('d'));
        }else {$fec2="";}
        if ($this->getRequestParameter('fechoy')!="") {
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($this->getRequestParameter('fechoy'), 'i', $dateFormat->getInputPattern('d'));
        }else { $fec="";}
                                
				$this->configGridPedDes($this->getRequestParameter('tipref'), $this->getRequestParameter('cedula'),$fec, $fec1,$fec2,$this->getRequestParameter('codalm'),$this->getRequestParameter('presupcon'),$this->getRequestParameter('moneda'));
				if ($this->fil1!=0)
				{
				$javascript = "$('listaPedidosDespachos').show(); ";
				if ($this->getRequestParameter('tipref') == 'P')
					$javascript = $javascript .
					"$('label2').innerHTML ='Pedidos Emitidos';";
        else if ($this->getRequestParameter('tipref') == 'E'){
          $cametifor=H::getConfApp2('cametifor', 'facturacion', 'fapresup');
          if ($cametifor=='S')
          $javascript = $javascript .
          "$('label2').innerHTML ='Cotizaciones Emitidas';";
          else
            $javascript = $javascript .
          "$('label2').innerHTML ='Presupuestos Emitidos';";
				}else
					$javascript = $javascript . "$('label2').innerHTML ='Despachos Emitidos';";
				}else
				{
					if ($this->getRequestParameter('tipref') == 'P')
					$javascript="alert('El Beneficiario no tiene Pedidos asociados')";
          else if ($this->getRequestParameter('tipref') == 'E') {
            $cametifor=H::getConfApp2('cametifor', 'facturacion', 'fapresup');
            if ($cametifor=='S')
              $javascript="alert('El Beneficiario no tiene Cotizaciones asociadas')";
            else
              $javascript="alert('El Beneficiario no tiene Presupuestos asociados')";
          }
					else $javascript="alert('El Beneficiario no tiene Despachos asociados')";
				}
				$output = '[["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				break;
			case '14' :
				$this->ajaxs = '14';
				$sin_cta_aso="S";
				if ($this->getRequestParameter('tipref') == 'P') {
					Factura :: arregloPedidos($this->getRequestParameter('codrefer'), $this->getRequestParameter('tipref'), $encontro, $msj, $arreglodet, $p,$sin_cta_aso,$tienerec);
					if ($msj == "") {
						if ($encontro == true) {
							$javascript = "alert('El Pedido ya fue Facturado en su Totalidad'); $('listaPedidosDespachos').hide(); ";
						} else {
							$javascript = "$('fafactur_tierecar').value='$tienerec'; colocarArticulos('$arreglodet'); if ($('fafactur_manporped').value=='S') $('divporped').show();";
							if ($p != "") {
                //$javascript = $javascript . "recalcularRecargos(); montoTotal();  $('listaPedidosDespachos').hide();   $('descuent').show(); $('recarg').show(); mostrarPromedio();";
                $javascript = $javascript . "montoTotal();  $('listaPedidosDespachos').hide(); mostrarPromedio();";
							} else {
								$javascript = $javascript . " $('listaPedidosDespachos').hide(); mostrarPromedio();";
							}
						}
					} else {
						$javascript = $msj;
					}

				} else if ($this->getRequestParameter('tipref') == 'E') {
          Factura :: arregloPresupuestos($this->getRequestParameter('codrefer'), $this->getRequestParameter('tipref'), $encontro, $msj, $arreglodet, $p,$sin_cta_aso,$tienerec);
          if ($msj == "") {
            if ($encontro == true) {
              $cametifor=H::getConfApp2('cametifor', 'facturacion', 'fapresup');
              if ($cametifor=='S')
                $javascript = "alert_('La Cotizaci&oacute;n ya fue Facturada en su Totalidad'); $('listaPedidosDespachos').hide(); ";
              else
                $javascript = "alert('El Presupuesto ya fue Facturado en su Totalidad'); $('listaPedidosDespachos').hide(); ";
            } else {
              $javascript = "$('fafactur_tierecar').value='$tienerec'; colocarArticulos('$arreglodet'); ";
              if ($p != "") {
                $javascript = $javascript . "montoTotal();  $('listaPedidosDespachos').hide(); mostrarPromedio();";
              } else {
                $javascript = $javascript . " montoTotal(); $('listaPedidosDespachos').hide(); mostrarPromedio();";
              }
            }
          } else {
            $javascript = $msj;
          }
        } else {
					if ($this->getRequestParameter('tipref') == 'D' || $this->getRequestParameter('tipref') == 'VC') {
						Factura :: arregloDespachos($this->getRequestParameter('codrefer'), $this->getRequestParameter('tipref'), $encontro, $msj, $arreglodet, $p,$sin_cta_aso);
					}
					if ($msj == "") {
						if ($encontro == true) {
							$javascript = "alert('El Despacho ya fue Facturado en su Totalidad'); $('listaPedidosDespachos').hide(); ";
						} else {
							$javascript = "colocarArticulos('$arreglodet'); ";
							if ($p != "") {
								//$javascript = $javascript . "recalcularRecargos(); $('recarg').show(); $('descuent').show(); $('listaPedidosDespachos').hide(); mostrarPromedio();";
                                                            $javascript = $javascript . "$('listaPedidosDespachos').hide(); mostrarPromedio();";
							} else {
								$javascript = $javascript . " $('listaPedidosDespachos').hide(); mostrarPromedio();";
							}
						}
					} else {
						$javascript = $msj;
					}
				}
				$output = '[["fafactur_ctasociada","' . $sin_cta_aso . '",""],["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
				break;
			case '15' :
                Factura::datosRecargos($this->getRequestParameter('rgofijos'),$this->getRequestParameter('reffac'),$arreglorec,$trajo);
                if ($trajo==false)
                {
                  $javascript="$('fafactur_totrec').value='0,00';";
                }
                else
                {
                  //$javascript = "colocarRecargos('$arreglorec'); calcularTotalRecargos();";
                }
				$output = '[["javascript","' . $javascript . '",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
			    break;
            case '16' :
                $this->ajaxs = '16';
				$this->fafactur = $this->getFafacturOrCreate();
                $this->configGridArtFac('', $this->getRequestParameter('tipref'));
                $output = '[["","",""],["","",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
			    break;
            case '17':
                if (Tesoreria::validarFechaPerContable($this->getRequestParameter('codigo')))
                {
                    $msj="alert('La Fecha debe estar dentro del Período Contable.'); $('fafactur_fecfac').value=''; $('fafactur_fecfac').focus();";
                }else {
                
                    if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
                    {
                      $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('fafactur_fecfac').value=''; $('fafactur_fecfac').focus();";
                    }else { $msj=""; }
                }
		        $output = '[["javascript","'.$msj.'",""],["","",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
				return sfView :: HEADER_ONLY;
             break;
            case '18':
		        $dato=TstipmovPeer::getDestip($codigo);
		        $output = '[["fafactur_destip","'.$dato.'",""]]';
		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		        return sfView::HEADER_ONLY;
             break;
            case '19':
                        $javascript="";
                        $com='';
                        $monfac=0;
		                    $c = new Criteria();
                        $sql = "fafacturpro.reffac='".$codigo."' and fafacturpro.reffac in  (select reffac from faartfacpro where estatus='N' or estatus='A') ";
                        $c->add(FafacturproPeer::REFFAC, $sql, Criteria :: CUSTOM);
                        $per = FafacturproPeer::doSelectOne($c);
                        if($per)
                        {
                            //$tipref=$per->getTipref();
                            $tipmon=$per->getTipmon();
                            $rifpro=$per->getRifpro();
                            $nompro=$per->getNompro();
                            $telpro=$per->getTelpro();
                            $dirpro=$per->getDirpro();
                            $dirent=$per->getDirent();
                            $tipper=$per->getTipper();
                            $codcli=H::getX_vacio('RIFPRO','Facliente','Codpro',$per->getRifpro());
                            $ctacli = H::getX_vacio('RIFPRO','Facliente','Codcta',$per->getRifpro());
                            $codconpag=$per->getCodconpag();
                            $desconpag=$per->getDesconpag();
                            $desfac=$per->getDesfac();
                            $iddesfac=$per->getFadescripfacId();
                            $codubi=$per->getCodubi();
                            $desubi = H::getX_vacio('CODUBI','Bnubica','Desubi',$codubi);
                            $mosotrdat=H::getConfApp2('mosotrdat', 'facturacion', 'fafactur');
                            if ($mosotrdat=='S')
                            {
                               $com=',["fafactur_muelle","'.$per->getMuelle().'",""],["fafactur_buque2","'.$per->getBuque().'",""],["fafactur_expedi","'.$per->getExpedi().'",""],["fafactur_bele","'.$per->getBele().'",""],["fafactur_factura","'.$per->getFactura().'",""],["fafactur_embarca","'.$per->getEmbarca().'",""],["fafactur_descarga","'.$per->getDescarga().'",""],["fafactur_canbul","'.H::FormatoMonto($per->getCanbul()).'",""],["fafactur_codprod","'.$per->getCodprod().'",""],["fafactur_desprod","'.H::getX_vacio('CODPROD','Fadefpro','Desprod',$per->getCodprod()).'",""],["fafactur_tmdesc","'.H::FormatoMonto($per->getTmdesc()).'",""],["fafactur_fecatra","'.date('d/m/Y',strtotime($per->getFecatra())).'",""],["fafactur_fecinidesc","'.date('d/m/Y',strtotime($per->getFecinidesc())).'",""],["fafactur_fecfindesc","'.date('d/m/Y',strtotime($per->getFecfindesc())).'",""],["fafactur_valcifs","'.H::FormatoMonto($per->getValcifs()).'",""]';
                            }
                            $c = new Criteria();
                            $c->add(FaartfacproPeer::REFFAC,$codigo);
                            $c->add(FaartfacproPeer::ESTATUS,'A');
                            $per2 = FaartfacproPeer::doSelect($c);
                            foreach($per2 as $r)
                                $monfac+=$r->getTotart();
                            $tipconpag=H::GetX('Id','Faconpag','Tipconpag',$codconpag);
                            if($tipper=='N')
                                $javascript.="$('fafactur_tipper_N').disabled=false;
                                              $('fafactur_tipper_J').disabled=false;
                                              $('fafactur_tipper_N').checked=true;
                                              $('fafactur_tipper_J').checked=false;
                                              $('fafactur_tipper_N').disabled=true;
                                              $('fafactur_tipper_J').disabled=true;";
                             else
                                 $javascript.="$('fafactur_tipper_N').disabled=false;
                                              $('fafactur_tipper_J').disabled=false;
                                              $('fafactur_tipper_N').checked=false;
                                              $('fafactur_tipper_J').checked=true;
                                              $('fafactur_tipper_N').disabled=true;
                                              $('fafactur_tipper_J').disabled=true;";

                        }else
                        {
                            $tipref="";
                            $tipmon="";
                            $rifpro="";
                            $nompro="";
                            $telpro="";
                            $dirpro="";
                            $dirent="";
                            $tipper="";
                            $ctacli="";
                            $codcli="";
                            $codconpag="";
                            $desconpag="";
                            $desfac="";
                            $iddesfac="";
                            $monfac="";
                            $tipconpag="";
                            $codubi="";
                            $desubi="";
                            $javascript="alert('La Proforma no esta registra o fue totalmente facturada');";
                            $codigo='';
                        }
                        $this->ajaxs = '16';
			                  $this->fafactur = $this->getFafacturOrCreate();
                        $this->configGridArtFac($codigo, 'V','PROFORMA');
                        //$javascript.=" CargarRecDesc(); montoTotal();";
                        $javascript.="montoTotal();";
                        //["fafactur_tipref","'.$tipref.'",""],

		        $output = '[["fafactur_tipmon","'.$tipmon.'",""],["fafactur_rifpro","'.$rifpro.'",""],["fafactur_nompro","'.$nompro.'",""],
                                    ["fafactur_telpro","'.$telpro.'",""],["fafactur_dirpro","'.$dirpro.'",""],["fafactur_dirent","'.$dirent.'",""],["fafactur_codconpag","'.$codconpag.'",""],["fafactur_desconpag","'.$desconpag.'",""],
                                    ["fafactur_desfac","'.$desfac.'",""],["fafactur_fadescripfac_id","'.$iddesfac.'",""],["fafactur_monto","'.H::FormatoMonto($monfac).'",""],["fafactur_monfac","'.H::FormatoMonto($monfac).'",""],["fafactur_tipconpag","'.$tipconpag.'",""],["fafactur_ctacli","'.$ctacli.'",""],["fafactur_codcli","'.$codcli.'",""],["fafactur_codubi","'.$codubi.'",""],["fafactur_desubi","'.$desubi.'",""],["javascript","'.$javascript.'",""]'.$com.']';
		        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		        #return sfView::HEADER_ONLY;
             break;
            case '20':
                $dato="";
                $t= new Criteria();
                $t->add(FaclientePeer::RIFPRO,$codigo);
                $reg= FaclientePeer::doSelectOne($t);
                if ($reg)
                {
                    $dato=$reg->getNompro();
                }
                else
                {
                    $javascript="alert('El Cliente no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                }
                $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                return sfView::HEADER_ONLY;
             break;
      case '21' :
        $dato1 = "";
        $dato2 = "";
        $dato3 = "";
        $dato4 = "";
        $cajtxtmos = $this->getRequestParameter('cajtxtmos');
        $rif = $this->getRequestParameter('rif');
        $nomrif = $this->getRequestParameter('nomrif');
        $placa = $this->getRequestParameter('placa');
        $cajtxtcom = $this->getRequestParameter('cajtxtcom');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FaregotsPeer :: CEDRIF, $codigo);
                $result = FaregotsPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = $result->getNomots();
                    $dato2 = $result->getRifpro();
                    $dato3 = H::getX('RIFPRO','Caprovee','Nompro',$result->getRifpro());
                    $dato4 = $result->getPlaca();
                }else{
                    $javascript="alert('El Operador de Transporte no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
                }
        }
        $output = '[["'.$cajtxtmos.'","' . $dato1 . '",""],["'.$rif.'","' . $dato2 . '",""],["'.$nomrif.'","' . $dato3 . '",""],["'.$placa.'","' . $dato4 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
      break;
      case '22' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(BnubicaPeer :: CODUBI, $codigo);
                $result = BnubicaPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = $result->getDesubi();
                }else{
                    $javascript="alert('La Unidad no existe'); $('fafactur_codubi').value=''; $('fafactur_codubi').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
      case '23' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtxtmos');
        $cajtexcom = $this->getRequestParameter('cajtxtcom');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FadefproPeer :: CODPROD, $codigo);
                $result = FadefproPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = $result->getDesprod();
                }else{
                    $javascript="alert('El Producto no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;
        case '24' :
            $this->ajaxs = '17';
            $this->fafactur = $this->getFafacturOrCreate();
            $this->configGridDescFac($codigo,'PROFORMA');
            $output = '[["","",""],["","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            break;
        case '25' :
            $this->ajaxs = '18';
            $this->fafactur = $this->getFafacturOrCreate();
            $this->configGridRgoArt($codigo,'PROFORMA');
            $output = '[["","",""],["","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            break;
        case '26' :
            $dato1  = H::getX('Codcenaco','Cadefcenaco','descenaco',$codigo);
            $output = '[["'.$cajtexmos.'","' . $dato1 . '",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            return sfView :: HEADER_ONLY;
            break;
        case '27' :
            $this->ajaxs = '18';
            $this->fafactur = $this->getFafacturOrCreate();
            $reffac=$this->getRequestParameter('reffac');
            $codart=$this->getRequestParameter('codart');
            $this->configGridRgoArt($reffac, '', $codart);
            $output = '[["","",""],["","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            break;        
        case '28' :
            $this->ajaxs = '17';
            $this->fafactur = $this->getFafacturOrCreate();
            $reffac=$this->getRequestParameter('reffac');
            $codart=$this->getRequestParameter('codart');
            $this->configGridDescFac($reffac,'',$codart);
            $output = '[["","",""],["","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            break;        
        case '29' :
            $tipcli = $this->getRequestParameter('tipcte','');
            $codart = $this->getRequestParameter('codart','');
            $fila = $this->getRequestParameter('fila','');
            $ida = $this->getRequestParameter('ida','');
            
            Factura::mostrarDescuentosArticulos($tipcli,$codart,$arreglodesc);
            if ($arreglodesc!="")
                $javascript = $javascript . "colocarDescuentogrid('$arreglodesc','$fila','$ida'); ";
            $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            return sfView :: HEADER_ONLY;
            break;           
      case '30' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FaconsignatarioPeer :: CODCON, $codigo);
                $result = FaconsignatarioPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = $result->getNomcon();
                }else{
                    $javascript="alert('El Consignatario no existe'); $('fafactur_codcon').value=''; $('$cajtexmos').value=''; $('fafactur_codcon').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;    
      case '31' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FatipbuqPeer :: CODBUQ, $codigo);
                $result = FatipbuqPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getNombuq());
                }else{
                    $javascript="alert('El Buque no existe'); $('fafactur_buque').value=''; $('$cajtexmos').value=''; $('fafactur_buque').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break; 
      case '32' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FatippuePeer :: CODPUE, $codigo);
                $result = FatippuePeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getNompue());
                }else{
                    $javascript="alert('El Puerto de Despacho no existe'); $('fafactur_puedph').value=''; $('$cajtexmos').value=''; $('fafactur_puedph').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;         
      case '33' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FatippuePeer :: CODPUE, $codigo);
                $result = FatippuePeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getNompue());
                }else{
                    $javascript="alert('El Puerto de Destino no existe'); $('fafactur_puedes').value=''; $('$cajtexmos').value=''; $('fafactur_puedes').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;       
        case '34' :
            $js="";
            $dato1  = H::getX_vacio('Codalm','Cadefalm','Nomalm',$codigo);
            if ($dato1=="")
                $js="alert('El Almacen no existe'); $('fafactur_codalm').value=''; $('fafactur_codalm').focus();";
            $output = '[["'.$cajtexmos.'","' . $dato1 . '",""], ["javascript","' . $js . '",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            return sfView :: HEADER_ONLY;
            break;  
        case '35' :
            $referencia = $this->getRequestParameter('referencia','');
            $codart = $this->getRequestParameter('codart','');
            $fila = $this->getRequestParameter('fila','');
            $ida = $this->getRequestParameter('ida','');
            $tipref = $this->getRequestParameter('tipref','');
            
            Factura::mostrarRecargosArticulos($referencia,$codart,$tipref,$arreglorecarg);
            if ($arreglorecarg!="")
                $javascript = $javascript . "colocarRecargosgrid('$arreglorecarg','$fila','$ida'); ";
            $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            return sfView :: HEADER_ONLY;
            break;   
        case '36' :
          $javascript="";
          $dato1 = "";
          $cajtexmos = $this->getRequestParameter('cajtxtmos');
          $cajtexcom = $this->getRequestParameter('cajtxtcom');
          if ($codigo != "") {
            $c = new Criteria();
            $c->add(FadefcanPeer :: CODCAN, $codigo);
            $result = FadefcanPeer :: doSelectOne($c);
            if ($result) {
                $dato1 = $result->getDescan();
            }else{
                $javascript="alert('El Canal no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
            }
          }
          $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
          return sfView :: HEADER_ONLY;
          break;        
      case '37' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FaproducPeer :: RIFPROD, $codigo);
                $result = FaproducPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getNomprod());
                }else{
                    $javascript="alert('El Productor no existe'); $('fafactur_rifprod').value=''; $('$cajtexmos').value=''; $('fafactur_rifprod').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;       
      case '38' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FapropatPeer :: CODPROPAT, $codigo);
                $result = FapropatPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getDespropat());
                }else{
                    $javascript="alert('El Producto Patrocinante no existe'); $('fafactur_codpropat').value=''; $('$cajtexmos').value=''; $('fafactur_codpropat').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break;    
      case '39' :
        $javascript="";
        $dato1 = "";
        $cajtexmos = $this->getRequestParameter('cajtexmos');
        if ($codigo != "") {
                $c = new Criteria();
                $c->add(FaproradPeer :: CODPRORAD, $codigo);
                $result = FaproradPeer :: doSelectOne($c);
                if ($result) {
                    $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getDesprorad());
                }else{
                    $javascript="alert('El Programa no existe'); $('fafactur_codprorad').value=''; $('$cajtexmos').value=''; $('fafactur_codprorad').focus();";
                }
        }
        $output = '[["'.$cajtexmos.'","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        return sfView :: HEADER_ONLY;
        break; 

        case '40' :
           $p= new Criteria();
           $p->add(CaproveePeer::CODPRO,$codigo);
           $p->add(CaproveePeer::ESTPRO,'A');
           $result = CaproveePeer::doSelectOne($p);
           if ($result)
              $dato=$result->getNompro();
           else
              $javascript="alert('EL Proveedor no existe o no esta Activo'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";

           $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","' . $javascript . '",""]]';
           $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
           return sfView :: HEADER_ONLY;            
            break;  
        case '41' :
            $c = new Criteria();
            $c->add(FadefproPeer :: CODPROD, $codigo);
            $result = FadefproPeer :: doSelectOne($c);
            if ($result) {
                $dato = $result->getDesprod();
            }else{
                $javascript="alert('El Rubro no existe'); $('fafactur_codprod').value=''; $('fafactur_codprod').focus();";
            }    
            $output = '[["'.$cajtexmos.'","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            return sfView :: HEADER_ONLY;
        break;    
        case '42' :
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
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
             $javascript="alert_('La Direcci&oacute;n no existe'); $('fafactur_coddirec').value=''; $('fafactur_desdirec').value=''; $('fafactur_coddirec').focus();";
          }
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
          return sfView :: HEADER_ONLY;
        break;                                                                                
        default :
         $js="";
         $this->fafactur = $this->getFafacturOrCreate();
         $this->updateFafacturFromRequest();
         $this->configGridPedDes();
         $this->ajaxs='16';
         $grid5 = Herramientas :: CargarDatosGridv2($this, $this->obj5,true); 

         Factura::Buscararticulos($this->fafactur,$grid5,$ref,$arrart);
          $this->configGridArtFac('',$this->fafactur->getTipref(),$this->fafactur->getTipref(),$arrart);
        if ($ref!="") {
          if ($this->fafactur->getTipref()=='P'){
            $js="alert('Los Siguientes Pedidos ya fueron facturados en su Totalidad $ref'); if ($('fafactur_manporped').value=='S') $('divporped').show();";
          }else if ($this->fafactur->getTipref()=='D') {
            $js="alert('Los Siguientes Despachos ya fueron facturados en su Totalidad $ref');";
          }else {
            $cametifor=H::getConfApp2('cametifor', 'facturacion', 'fapresup');
            if ($cametifor=='S')
              $js="alert('Las Siguientes Cotizaciones ya fueron facturadas en su Totalidad $ref');";
            else
              $js="alert('Los Siguientes Presupuestos ya fueron facturados en su Totalidad $ref');";
          }
        }else{
          $z=$grid5[0];
          $ref="";
          $j = 0;
          while ($j<count($z))
          {
            if ($z[$j]["check"]=="1")
            {
              $ref.=$z[$j]["nroped"]." - ";
            }
            $j++;
          }

          $codrefer = explode(" - ", $ref);
          $c = new Criteria();
          $c->add(FapedidoPeer::NROPED, $codrefer[0]);
          $pedido = FapedidoPeer::doSelectOne($c);
          if($pedido){
            $observ = htmlentities($pedido->getObsped());
          }else $observ = "";

        }

        $js.="montoTotal(); $('listaPedidosDespachos').hide(); mostrarPromedio();";


       $output = '[["javascript","'.$js.'",""],["fafactur_observ","'.$observ.'",""],["","",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        //return sfView :: HEADER_ONLY;
        break;
		}
	}




  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit() {
		$this->coderr = -1;

		if ($this->getRequest()->getMethod() == sfRequest :: POST) {
		$this->fafactur = $this->getFafacturOrCreate();
    try{ $this->updateFafacturFromRequest();}
    catch (Exception $ex){}
    $this->configGrid();

        $grid=Herramientas::CargarDatosGridv2($this,$this->obj1);
        
        $valpermes=H::getConfApp2('valpermes', 'facturacion', 'fafactur');
        $rancorcaj=H::getConfApp2('rancorcaj', 'facturacion', 'fafactur');
        if (!$this->fafactur->getId()) {
          if ($rancorcaj=='S')
          {
            $p= new Criteria();
            $p->add(FarancorcajPeer::CODCAJ,$this->getRequestParameter('fafactur[codcaj]'));
            $p->add(FarancorcajPeer::ACTIVO,true);
            $sql="(farancorcaj.coract=0 or farancorcaj.coract is null or farancorcaj.coract>=farancorcaj.cordes or farancorcaj.coract<=farancorcaj.cordes)";
            $p->add(FarancorcajPeer::CORACT,$sql,Criteria::CUSTOM);
            $trajo= FarancorcajPeer::doSelectOne($p);
            if (!$trajo)
            {
               $this->coderr=1190;
               return false;
            }
          }
            if ($valpermes=='S')
            {
                $dateFormat = new sfDateFormat('es_VE');
                $fec = $dateFormat->format($this->getRequestParameter('fafactur[fecfac]'), 'i', $dateFormat->getInputPattern('d'));

                $c= new Criteria();
                $c->add(FaciemesPeer::FECDES,$fec,Criteria::LESS_EQUAL);
                $c->add(FaciemesPeer::FECHAS,$fec,Criteria::GREATER_EQUAL);
                $c->add(FaciemesPeer::STATUS,'A');
                $conta1=FaciemesPeer::doSelectOne($c);
                if (!$conta1)
                {
                  $this->coderr=1163;
                  return false;
                }
            }
          if ($this->getRequestParameter('fafactur[tipref]')=='D')
          { 
            $x=$grid[0];
            $i=0;
            $encref=false;
            $desp="";
            while ($i<count($x))
            {
               $t= new Criteria();
               $t->add(FafacturPeer::STATUS,'N',Criteria::NOT_EQUAL);
               $t->add(FaartfacPeer::CODREF,$x[$i]->getCodref());
               $t->addJoin(FaartfacPeer::REFFAC,FafacturPeer::REFFAC);
               $trajo= FaartfacPeer::doSelectOne($t);
               if ($trajo) {
                 $encref=true;
                 break;
               }
              $i++;
            }

            if ($encref)
            {
               $this->coderr=1181;
               return false;
            }            
          }

        }

      $valunidad=H::getConfApp2('valunidad', 'facturacion', 'fafactur');
      if ($valunidad=='S')
      {
        if ($this->getRequestParameter('fafactur[codubi]')==''){
          $this->coderr=569;
          return false;
        }else {
            $p= new Criteria();
            $p->add(BnubicaPeer::CODUBI,$this->getRequestParameter('fafactur[codubi]'));
            $result= BnubicaPeer::doSelectOne($p);
            if (!$result){
                $this->coderr=570;
                return false;
            }
        }
      }
        
      if (Tesoreria::validarFechaPerContable($this->getRequestParameter('fafactur[fecfac]')))
      {
        $this->coderr=521;
        return false;
      }        

      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('fafactur[fecfac]'))==true)
      {
        $this->coderr=529;
        return false;
      }     
      

        if ($this->getRequestParameter('fafactur[ctasociada]')=='N')
        {
         $this->coderr=1137;
         return false;
        }
        $grid4=Herramientas::CargarDatosGridv2($this,$this->obj4);        
        if (count($grid[0])==0)
        {
            $this->coderr=4;
          return false;
        }
        if (Factura::PreciosRepetidos($grid))
        {
      	  $this->coderr=1136;
          return false;
        }        
        $grid2=Herramientas::CargarDatosGridv2($this,$this->obj3);
            
        if (Factura::Verificar_pago($grid2,H::tofloat($this->getRequestParameter('fafactur[monfac]')),$this->getRequestParameter('fafactur[tipconpag]'))==false)
        {
          $this->coderr=1146;
          return false;
        }

        $valrgoven = H::getConfApp('valrgoven', 'facturacion', 'fafactur');

        if($valrgoven=='S'){
          if($this->getRequestParameter('fafactur[tipref]')=='V'){
            $recargo = $grid4[0];
            if(count($recargo)==0){
              $this->coderr=1160;
              return false;
            }
            foreach($recargo as $index => $rgo){
              if($rgo->getCodrgo()){
                $c = new Criteria();
                $c->add(FargoartPeer::CODRGO,$rgo->getCodrgo());
                $rec = FargoartPeer::doSelectOne($c);
                if(!$rec){
                  $this->coderr=1161;
                  return false;
                }
              }else{
                $this->coderr=1161;
                return false;
              }
            }
          }
        }

          $x=$grid[0];
          $i=0;
        $valnumfil=H::getConfApp2('valnumfil', 'facturacion', 'fafactur');
         $numfil=$this->fafactur->getNumfilas();
         if ($valnumfil=='S')
         {
            $p=1;
            $pos=0;
            $arraux=array();
            if (count($x)>0)
            {
                $arraux[0]["codart"]=$x[0]->getCodart();
                while ($p<count($x))
                {
                    $pos=Factura::Buscar_Arreglo_Art($arraux,$x[$p]->getCodart());
                    if ($pos==0)
                    {
                     $q=count($arraux)+1;
                     $arraux[$q-1]["codart"]=$x[$p]->getCodart();
                    }
                    $p++;
                }
            }
            if (count($arraux)>$numfil)  
            {
                $this->coderr=1165;
	       	return false;
            }
         }
        $afeinvfac=H::getConfApp2('afeinvfac', 'facturacion', 'fafactur'); 
        $geningreso=H::getConfApp2('geningreso', 'facturacion', 'fafactur');
        $calmacen=H::getX_vacio('ID','Fadefcaj','CODALM',$this->getRequestParameter('fafactur[codcaj]'));          
        while ($i<count($x))
	      {
	       if ($this->getRequestParameter('fafactur[tipref]')=='P')
	       {
	       	 if ($x[$i]->getCodref()=="")
	         {
	       	  $this->coderr=1138;
	       	  return false;
	         }
	       }
	       if ($x[$i]->getCodart()=="")
	       {
	         $this->coderr=1139;
	         return false;
	       }

         $colx=Factura::determinarReferenciaDoc($this->getRequestParameter('fafactur[tipref]'));
         eval('$cantot = $x[$i]->get'.ucfirst(strtolower($colx)).'();');
         if ($cantot==0){
          $this->coderr=1204;
           return false;
         }

         if ($geningreso=='S'){
          $codigoing=H::getX_vacio('CODART','Caregart','Coding',$x[$i]->getCodart());
          if ($codigoing=='') {
            $this->coderr=1198;
            return false;
          }
         }

         if ($this->getRequestParameter('fafactur[tipref]')=='V')
	       {
	       	 if ($x[$i]->getCansol()=="0,00")
	         {
	       	  $this->coderr=1140;
	       	  return false;
	         }
           if ($afeinvfac=='S'){
             $q = new Criteria();
             $q->add(CaartalmubiPeer::CODART,$x[$i]->getCodart());
             $q->add(CaartalmubiPeer::CODALM,$calmacen);
             $alm = CaartalmubiPeer::doSelectOne($q);
             if ($alm)
             {
                if($alm->getExiact()<H::toFloat($x[$i]->getCansol()))
                {
                  $this->coderr=1191;
                  return false;
                }
             }
           }
	       }
	       if ($this->getRequestParameter('fafactur[tipref]')=='P' || $this->getRequestParameter('fafactur[tipref]')=='E')
	       {
	       	 /*if ($x[$i]->getCanent()=="0,00")
	         {
	       	  $this->coderr=1142;
	       	  return false;
	         }*/
           if ($afeinvfac=='S'){
             $q = new Criteria();
             $q->add(CaartalmubiPeer::CODART,$x[$i]->getCodart());
             $q->add(CaartalmubiPeer::CODALM,$calmacen);
             $alm = CaartalmubiPeer::doSelectOne($q);
             if ($alm)
             {
                if($alm->getExiact()<H::toFloat($x[$i]->getCanent()))
                {
                  $this->coderr=1191;
                  return false;
                }
             }
           }
	       }

	       if ($x[$i]->getPrecio()=="0,00" && $x[$i]->getPrecioe()=="0,00")
	       {
	       	  $this->coderr=1141;
	       	  return false;
	       }
               if ($x[$i]->getHorsal()!="")
	       {
                  if(!H::ValidarHora($x[$i]->getHorsal()))
                  {
                    $this->coderr='F002';
                    return false;
                  }

	       }
               if ($x[$i]->getHorlleg()!="")
	       {
                  if(!H::ValidarHora($x[$i]->getHorlleg()))
                  {
                    $this->coderr='F002';
                    return false;
                  }

	       }
               if ($x[$i]->getHorllca()!="")
	       {
                  if(!H::ValidarHora($x[$i]->getHorllca()))
                  {
                    $this->coderr='F002';
                    return false;
                  }
	       }
               if ($x[$i]->getHordesc()!="")
	       {
                  if(!H::ValidarHora($x[$i]->getHordesc()))
                  {
                    $this->coderr='F002';
                    return false;
                  }
	       }

	       $i++;
	      }

	      $y=$grid2[0];
          $l=0;
          $valblocueban=H::getConfAppGen('valblocueban');
	      while ($l<count($y))
	      {
            if ($y[$l]->getMonpag()=="0,00" && $this->getRequestParameter('fafactur[tipconpag]')=='C')
            {
	       	  $this->coderr=1143;
	       	  return false;
            }
            if ($y[$l]->getTippag()=="" && $this->getRequestParameter('fafactur[tipconpag]')=='C')
            {
	       	  $this->coderr=1144;
	       	  return false;
            }            
            if ($valblocueban=='S'){
              $a= new Criteria();
              $a->add(FatippagPeer::ID,$y[$l]->getTippag());
              $resul= FatippagPeer::doSelectOne($a);
              if ($resul)
              {
                if ($resul->getGenmov()=='S')
                {
                  if (Tesoreria::validaBancoBloqueado($this->getRequestParameter('fafactur[fecfac]'),$y[$l]->getNomban()))
                  {
                    $this->coderr=5007;
                    return false;
                  }
                  
                  if (Tesoreria::validaPeriodoCerradoBanco($this->getRequestParameter('fafactur[fecfac]'),$y[$l]->getNomban())==false)
                  {
                    $this->coderr=537;
                    return false;
                  }
                }
              }
            }

	      	$l++;
	      }
         /* if ($this->getRequestParameter('fafactur[tipconpag]')=='R')
          {
          	$sql="Select coalesce(Sum(MonDoc+RecDoc-DscDoc-AboDoc),0) as monto from CobDocume where CodCli='".$this->getRequestParameter('fafactur[codcli]')."' Group by CodCli";
            if (Herramientas::BuscarDatos($sql,&$result))
            {
            	if (count($result)>0)
            	{
            	$cal=H::tofloat($result[0]["monto"]) + H::tofloat($this->getRequestParameter('fafactur[monfac]')) - H::tofloat($this->getRequestParameter('fafactur[mondesc]'));
            	if ($cal>H::tofloat($this->getRequestParameter('fafactur[limitecredito]')))
            	{
	       	      $this->coderr=1145;
	       	      return false;
            	}
            	}else{
            	  $cal=H::tofloat($this->getRequestParameter('fafactur[monfac]')) - H::tofloat($this->getRequestParameter('fafactur[mondesc]'));
	            	if ($cal>H::tofloat($this->getRequestParameter('fafactur[limitecredito]')))
	            	{
	            	   $this->coderr=1145;
		       	       return false;
	            	}
            	}
            }
            else
            {
               $cal=H::tofloat($this->getRequestParameter('fafactur[monfac]')) - H::tofloat($this->getRequestParameter('fafactur[mondesc]'));
            	if ($cal>H::tofloat($this->getRequestParameter('fafactur[limitecredito]')))
            	{
            	   $this->coderr=1145;
	       	       return false;
            	}
            }
          }*/
        $gencomext=H::getConfApp2('gencomext', 'facturacion', 'fafactur');
        if ($gencomext=='S' && $this->fafactur->getId()=='') {
            if (self::validarGeneraComprobante())
            {
              $this->coderr=508;

            }
        }

		if ($this->coderr != -1) {
			return false;
		} else
			return true;

		} else
			return true;
	}

	public function executeCerrar() {
		$this->getUser()->getAttributeHolder()->remove('clavecaja', 'fafactur');
		return $this->redirect('fafactur/create');
	}

	protected function saving($fafactur) {    
		if ($fafactur->getId()) {
			$fafactur->save();

      $grid = Herramientas :: CargarDatosGridv2($this, $this->obj1);
      //H::PrintR($grid); exit();
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
          $y= new Criteria();
          $y->add(FaartfacPeer::REFFAC,$fafactur->getReffac());
          $y->add(FaartfacPeer::CODART,$x[$j]->getCodart());
          $y->add(FaartfacPeer::ID,$x[$j]->getId());
          $result= FaartfacPeer::doSelectOne($y);
          if ($result)
          {
              $result->setNronot($x[$j]->getNronot());
              $result->setNotentdig($x[$j]->getNotentdig());
              $result->setOrddespacho($x[$j]->getOrddespacho());
              $result->setGuia($x[$j]->getGuia());
              $result->setContenedores($x[$j]->getContenedores());
              $result->setBillleading($x[$j]->getBillleading());
              $result->setCedrif($x[$j]->getCedrif()); //Operador de Transporte
              $result->setPlaca($x[$j]->getPlaca());
              $result->setRifpro($x[$j]->getRifpro()); //Contratista
              $result->setTipov($x[$j]->getTipov());
              $result->setFecsal($x[$j]->getFecsal());
              $result->setHorsal($x[$j]->getHorsal());
              $result->setFecllca($x[$j]->getFecllca());
              $result->setHorllca($x[$j]->getHorllca());
              $result->setFecdesc($x[$j]->getFecdesc());
              $result->setHordesc($x[$j]->getHordesc());
              $result->setFeclleg($x[$j]->getFeclleg());
              $result->setHorlleg($x[$j]->getHorlleg());
              $result->setCodprod($x[$j]->getCodprod());
              $result->setKg($x[$j]->getKg());
              $result->setKgent($x[$j]->getKgent());
              $result->setDifkg($x[$j]->getDifkg());
              $result->setCajas($x[$j]->getCajas());
              $result->setCajasent($x[$j]->getCajasent());
              $result->setDifcaj($x[$j]->getDifcaj());
              $result->setTm($x[$j]->getTm());
              $result->setTment($x[$j]->getTment());
              $result->setDifton($x[$j]->getDifton());
              $result->setIer($x[$j]->getIer());
              $result->setObservaciones($x[$j]->getObservaciones());
              $result->setCodcan($x[$j]->getCodcan());
              $result->setFecrecfac($x[$j]->getFecrecfac());
              $result->setFacafi($x[$j]->getFacafi());
              $result->setFecdev($x[$j]->getFecdev());
              $result->setUnimed($x[$j]->getUnimed());
              $result->save();
          }
        $j++;
      }

      $usalib=H::getConfApp('gridfaclib', 'facturacion', 'fafactur');
      $grid6 = Herramientas :: CargarDatosGridv2($this, $this->obj6);
      if ($usalib=='S')
      {
          Factura::grabarFacturaLibro($fafactur,$grid6);
      }

	    return -1;
		} else {
			$tipocaja = $this->getUser()->getAttribute('clavecaja', null, 'fafactur');
			$grid = Herramientas :: CargarDatosGridv2($this, $this->obj1);
			//$grid2 = Herramientas :: CargarDatosGridv2($this, $this->obj2);
			$grid3 = Herramientas :: CargarDatosGridv2($this, $this->obj3);
			//$grid4 = Herramientas :: CargarDatosGridv2($this, $this->obj4);
      $grid6 = Herramientas :: CargarDatosGridv2($this, $this->obj6);
      $gencomext=H::getConfApp2('gencomext', 'facturacion', 'fafactur');
      if ($gencomext=='S')
         self::GrabarComprobanteExterno($fafactur, $grid);                        
			Factura :: salvarFactura($fafactur, $grid, $grid3, $tipocaja,$msj,$msj2,$msj3,$grid6);

			if ($msj!=-1) return $msj;
			if ($msj3!=-1) return $msj3;

		  return -1;
		}

	}
        
  public function GrabarComprobanteExterno($fafactur, $grid)
  {
      $tiptraart=H::getConfApp2('tiptraart', 'facturacion', 'fafactur'); 
      $concom=1;
      $form="sf_admin/fafactur/confincomgen";
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
          if ($tiptraart=='S')
            $codtiptra=Herramientas::getX_vacio('CODEMP','Cadefart','Codtiptra','001');
          else
            $codtiptra=H::getX_vacio('Modtiptra', 'Cotiptra', 'Codtiptra', true);

          $this->numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]),null,$codtiptra,$fafactur->getCoddirec());

          $fafactur->setNumcom($this->numero);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
  }        

	public function setVars() {
		$this->mascaraarticulo = Herramientas :: getMascaraArticulo();
		$this->lonart = strlen($this->mascaraarticulo);
		$this->despnotent="";
		$this->cambiolog="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('facturacion',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['facturacion'])){
		     if(array_key_exists('fadesp',$varemp['aplicacion']['facturacion']['modulos'])) {
		       if(array_key_exists('despnotent',$varemp['aplicacion']['facturacion']['modulos']['fadesp']))
		       {
		       	$this->despnotent=$varemp['aplicacion']['facturacion']['modulos']['fadesp']['despnotent'];
		       }
		     }
		     if(array_key_exists('fafactur',$varemp['aplicacion']['facturacion']['modulos'])) {
		       if(array_key_exists('cambiolog',$varemp['aplicacion']['facturacion']['modulos']['fafactur']))
		       {
		       	$this->cambiolog=$varemp['aplicacion']['facturacion']['modulos']['fafactur']['cambiolog'];
		       }
		     }
		   }
	}

	public function executeAnular() {
		$this->referencia = $this->getRequestParameter('referencia');
		$reffac = $this->getRequestParameter('reffac');
		$fecfac = $this->getRequestParameter('fecfac');

		$dateFormat = new sfDateFormat('es_VE');
		$fec = $dateFormat->format($fecfac, 'i', $dateFormat->getInputPattern('d'));

		$c = new Criteria();
		$c->add(FafacturPeer :: REFFAC, $reffac);
		$c->add(FafacturPeer :: FECFAC, $fec);
		$this->fafactur = FafacturPeer :: doSelectOne($c);
		sfView :: SUCCESS;
	}

	public function executeSalvaranu() {
		$reffac = $this->getRequestParameter('reffac');
		$motanu = $this->getRequestParameter('motanu');
		$fecanu = $this->getRequestParameter('fecanu');
		$fecha_aux = split("/", $fecanu);
		$dateFormat = new sfDateFormat('es_VE');
		$fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
		$this->msg = "";
		$this->mensaje2="";
    $valpermes=H::getConfApp2('valpermes', 'facturacion', 'fafactur');    
    if ($valpermes=='S')
    {
        $fecfac=date('d/m/Y',strtotime(H::getX_vacio('REFFAC','Fafactur','Fecfac',$reffac)));
        $c= new Criteria();
        $c->add(FaciemesPeer::FECDES,$fecfac,Criteria::LESS_EQUAL);
        $c->add(FaciemesPeer::FECHAS,$fecfac,Criteria::GREATER_EQUAL);
        $c->add(FaciemesPeer::STATUS,'A');
        $conta1=FaciemesPeer::doSelectOne($c);
        if (!$conta1)
        {
          $coderror=1163;
         $this->mensaje2 = Herramientas::obtenerMensajeError($coderror);
         return sfView::SUCCESS;
        }     

        if (Tesoreria::validaPeriodoCerrado($fecfac)==true)
       {
         $coderror=529;
         $this->mensaje2 = Herramientas::obtenerMensajeError($coderror);
         return sfView::SUCCESS;
       }
    }

	    if (Tesoreria::validaPeriodoCerrado($fecanu)==true && $valpermes!='S')
	   {
	     $coderror=529;
	     $this->mensaje2 = Herramientas::obtenerMensajeError($coderror);
	     return sfView::SUCCESS;
	   }else {
		$c = new Criteria();
		$c->add(FafacturPeer :: REFFAC, $reffac);
		$resul = FafacturPeer :: doSelectOne($c);
		if ($resul) {
                    if ($resul->getTipconpag()=='R') //Pago a Crédito
                    {
                      $refdocuco=H::getConfApp2('refdocuco', 'facturacion', 'fafactur');
                      if ($refdocuco=='S')
                        $refedoc='0'.substr($resul->getReffac(),0,4).'/'.substr($resul->getReffac(),4);
                      else
                        $refedoc=str_pad($resul->getReffac(),10,'0',STR_PAD_LEFT);
                        $c2= new Criteria();
                        $c2->add(CobdocumePeer::REFDOC,$refedoc);
                        $resul2= CobdocumePeer::doSelectOne($c2);
                        if ($resul2)
                        {
                          if ($resul2->getAbodoc()>0)
                          {
                              $this->msg = "La Factura no se puede eliminar debido a que el Documento por Cobrar asociado(".$resul2->getRefdoc().") ya ha sido abonado";
                              return sfView :: SUCCESS;
                          }
                        }
                    }
      $msj=Factura::anularMovLibroFac($reffac,$fec,$motanu,$resul->getNumcom()); 
      if ($msj != "") {
        $this->msg = $msj;
        return sfView :: SUCCESS;
      }
                    
			if (!is_null($resul->getNumcom())) {
				Factura :: anularComprobante("C", $resul->getNumcom(), $fec, $msj);
				if ($msj != "") {
					$this->msg = $msj;
					return sfView :: SUCCESS;
				}
				if ($resul->getNumcomord() != "") {
					Factura :: anularComprobante("O", $resul->getNumcomord(), $fec, $msj);
					if ($msj != "") {
						$this->msg = $msj;
						return sfView :: SUCCESS;
					}
				}
				if ($resul->getNumcominv() != "") {
					Factura :: anularComprobante("I", $resul->getNumcominv(), $fec, $msj);
					if ($msj != "") {
						$this->msg = $msj;
						return sfView :: SUCCESS;
					}
				}
			} else {
				$this->msg = "El Comprobante no será eliminado, ya que se perdió la asociación con Contabilidad";
				return sfView :: SUCCESS;
			}
   }    

			$resul->setFecanu($fec);
			$resul->setMotanu($motanu);
			$resul->setStatus('N');
			$resul->save();

      

			if ((date(('m'), strtotime($resul->getFecanu())) > date(('m'), strtotime($resul->getFecfac()))) || (date(('Y'), strtotime($resul->getFecanu())) > date(('Y'), strtotime($resul->getFecfac())))) {
				Factura :: generarNotaCredito($resul->getReffac(), $fec, $resul->getMonfac());
			}
			Factura :: anularCxC($reffac, $fec, $motanu);
			Factura :: devolverArticulosExist($resul->getReffac());
		}	   
		return sfView :: SUCCESS;
	}

	protected function deleting($fafactur) {
    $valpermes=H::getConfApp2('valpermes', 'facturacion', 'fafactur');
    if ($valpermes=='S')
    {
        $c= new Criteria();
        $c->add(FaciemesPeer::FECDES,$fafactur->getFecfac(),Criteria::LESS_EQUAL);
        $c->add(FaciemesPeer::FECHAS,$fafactur->getFecfac(),Criteria::GREATER_EQUAL);
        $c->add(FaciemesPeer::STATUS,'A');
        $conta1=FaciemesPeer::doSelectOne($c);
        if (!$conta1)
        {
          return 1163;
        }

      if (Tesoreria::validaPeriodoCerrado(date('d/m/Y',strtotime($fafactur->getFecfac())))==true)
      {        
        return 529;
      }        
    }

    $q= new Criteria();
    $q->add(CobdocumePeer::REFFAC,$fafactur->getReffac());
    $resuldoc= CobdocumePeer::doSelectOne($q);
    if ($resuldoc){
      if ($resuldoc->getSaldoc()==0){
         return 1196;
      }
    }

    $p= new Criteria();
    $p->add(ContabcPeer::NUMCOM,$fafactur->getNumcom());
    $datosp= ContabcPeer::doSelectOne($p);
    if ($datosp)    
      if ($datosp->getStacom()=='A')
        return 1201;

    $p= new Criteria();
    $p->add(FaforpagPeer::REFFAC,$fafactur->getReffac());
    $resultp= FaforpagPeer::doSelect($p);
    if ($resultp)
    {
        foreach ($resultp as $objp)
        {
          $a= new Criteria();
          $a->add(FatippagPeer::ID,$objp->getTippag());
          $resula= FatippagPeer::doSelectOne($a);
          if ($resula)
          {
            if ($resula->getGenmov()=='S')
            {
              $nroreflib=$objp->getNumero();
              $nrocue=$objp->getNomban();              

              $d= new Criteria();
              $d->add(TsmovlibPeer::NUMCUE,$nrocue);
              $d->add(TsmovlibPeer::REFLIB,$nroreflib);
              //$d->add(TsmovlibPeer::TIPMOV,$tipmov);
              $d->add(TsmovlibPeer::NUMCOM,$fafactur->getNumcom());
              $resuld=TsmovlibPeer::doSelectOne($d);              
              if ($resuld){
                if ($resuld->getStacon()=='C')
                  return 1202;
                else $resuld->delete();
              }
            }
          }
          $objp->delete();
        }
    }
      

		if ($fafactur->getProform()!='')
    {
        $t= new Criteria();
        $t->add(FaartfacPeer::REFFAC,$fafactur->getReffac());
        $resulta= FaartfacPeer::doSelect($t);
        if ($resulta)
        {
            foreach ($resulta as $objdet)
            {
                $c = new Criteria();
                $c->add(FaartfacproPeer::REFFAC,$fafactur->getProform());
                $c->add(FaartfacproPeer::CODART,$objdet->getCodart());
                $per = FaartfacproPeer::doSelectOne($c);
                if($per)
                {
                     $per->setEstatus('A');
                     $per->setNumfac(null);
                     $per->save();
                }        
            }
          Herramientas :: EliminarRegistro('Faartfac', 'Reffac', $fafactur->getReffac());
        }                    
    }else{
      //Herramientas :: EliminarRegistro('Faartfac', 'Reffac', $fafactur->getReffac());
        $manprecon=H::getConfApp2('manprecon', 'facturacion', 'fafactur');   
        $t= new Criteria();
        $t->add(FaartfacPeer::REFFAC,$fafactur->getReffac());
        $resulta= FaartfacPeer::doSelect($t);
        if ($resulta)
        {
            foreach ($resulta as $objdet)
            {
              if ($manprecon=='S')
              {   
                if ($fafactur->getFecper1()!='' && $fafactur->getFecper2()!='') {
                $sqla="update fadetcon set stacon=null
                  WHERE REFPRE='".$objdet->getCodref()."'  and codart='".$objdet->getCodart()."' and stacon='F'
                  AND FECINI>='".$fafactur->getFecper1()."' AND FECFIN<='".$fafactur->getFecper2()."'";
                  H::insertarRegistros($sqla);
                }
              }
              $objdet->delete();
            }
        }
    }
                
		Herramientas :: EliminarRegistro('Fargoart', 'Refdoc', $fafactur->getReffac());
		Herramientas :: EliminarRegistro('Fadescart', 'Refdoc', $fafactur->getReffac());
		//Herramientas :: EliminarRegistro('Faforpag', 'Reffac', $fafactur->getReffac());
    
    $usalib=H::getConfApp('gridfaclib', 'facturacion', 'fafactur');
    if ($usalib=='S') {
        Herramientas :: EliminarRegistro('Fafaclib', 'Reffac', $fafactur->getReffac());
    }
    $refdocuco=H::getConfApp2('refdocuco', 'facturacion', 'fafactur');
    if ($refdocuco=='S')
        $refedoc='0'.substr($fafactur->getReffac(),0,4).'/'.substr($fafactur->getReffac(),4);
      else
        $refedoc=str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT);
		Herramientas :: EliminarRegistro('Cobrecdoc', 'Refdoc', $refedoc);
		Herramientas :: EliminarRegistro('Cobdesdoc', 'Refdoc', $refedoc);
		Herramientas :: EliminarRegistro('Cobdocume', 'Refdoc', $refedoc);

		$c = new Criteria();
		$c->add(CiimpingPeer :: REFING, $fafactur->getReffac());
		$c->add(CiimpingPeer :: FECING, $fafactur->getFecfac());
		CiimpingPeer :: doDelete($c);

		$c = new Criteria();
		$c->add(CiregingPeer :: REFING, $fafactur->getReffac());
		$c->add(CiregingPeer :: FECING, $fafactur->getFecfac());
		CiregingPeer :: doDelete($c);

		Factura :: devolverArticulosExist($fafactur->getReffac());
		Factura :: eliminarComprob($fafactur->getNumcom());
		if ($fafactur->getNumcomord() != "") {
			Factura :: eliminarComprob($fafactur->getNumcomord());
		}

		if ($fafactur->getNumcominv() != "") {
			Factura :: eliminarComprob($fafactur->getNumcominv());
		}
                
    $fafactur->delete();
		return -1;
	}

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateError()
  {
    $this->grabo="";
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj1);
    //$grid3=Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid2=Herramientas::CargarDatosGridv2($this,$this->obj3);
    //$grid4=Herramientas::CargarDatosGridv2($this,$this->obj4);
    $grid6=Herramientas::CargarDatosGridv2($this,$this->obj6);
    return true;
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
    $tipref = $this->getRequestParameter('fafactur_tipref', '');
    $javascript="";  $jsonextra="";

    switch ($col) {
          case '25':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                $t= new Criteria();                
                $t->add(FaartfacPeer::NRONOT,$grid[$fila][$col-1]);
                $reg= FaartfacPeer::doSelectOne($t);
                if ($reg)
                {
                  $status=H::getX_vacio('REFFAC','Fafactur','Status',$reg->getReffac());
                  $p= new Criteria();
                  $p->add(FaajustePeer::CODREF,$reg->getReffac());
                  $resut= FaajustePeer::doSelectOne($p);
                  if ($status=='A' && (!$resut)) {
                     $grid[$fila][$col-1]="";
                     $javascript="alert('El Número de Entrega ya esta asociado a la factura ".$reg->getReffac()."');";                        
                  }
                }            

              }else {
                  $grid[$fila][$col-1]="";
                  $javascript="alert('El Número de Entrega esta Repetido');";
              }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;
          case '28':
              if (!Hacienda::Repetido($grid,$grid[$fila][$col-1],$fila,$col-1))
              {
                $t= new Criteria();
                $t->add(FaartfacPeer::GUIA,$grid[$fila][$col-1]);
                $reg= FaartfacPeer::doSelectOne($t);
                if ($reg)
                {
                  $status=H::getX_vacio('REFFAC','Fafactur','Status',$reg->getReffac());
                  $p= new Criteria();
                  $p->add(FaajustePeer::CODREF,$reg->getReffac());
                  $resut= FaajustePeer::doSelectOne($p);
                  if ($status=='A' && (!$resut)) {
                      $grid[$fila][$col-1]="";
                      $javascript="alert('El Número de Guía de Trasporte ya esta asociado a la factura ".$reg->getReffac()."');";
                  }
                }
              }else {
                  $grid[$fila][$col-1]="";
                  $javascript="alert('El Número de Guía de Trasporte esta Repetido');";
              }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;    
          case '30':
                $t= new Criteria();
                $t->add(FaartfacPeer::BL,$grid[$fila][$col-1]);
                $reg= FaartfacPeer::doSelectOne($t);
                if ($reg)
                {
                  $status=H::getX_vacio('REFFAC','Faartfac','Status',$reg->getReffac());
                  $p= new Criteria();
                  $p->add(FaajustePeer::CODREF,$reg->getReffac());
                  $resut= FaajustePeer::doSelectOne($p);
                  if ($status=='A' && (!$resut)) {
                      $grid[$fila][$col-1]="";
                      $javascript="alert('El Número BL ya esta asociado a la factura ".$reg->getReffac()."');";
                  }
                }
            $jsonextra = ',["javascript","' . $javascript . '",""]';
            break;  
          case '67':
                $t= new Criteria();
                $t->add(FaproducPeer::RIFPROD,$grid[$fila][$col-1]);
                $reg= FaproducPeer::doSelectOne($t);
                if ($reg)
                {
                   $grid[$fila][67]=$reg->getNomprod();
                   $col=Factura::determinarReferenciaDoc($tipref);
                   $cantidad=0;
                   if ($col=='cantot')
                    $cantidad=H::toFloat($grid[$fila][6]);
                   else if ($col=='canent')
                    $cantidad=H::toFloat($grid[$fila][7]);
                   else if ($col=='candesp')
                    $cantidad=H::toFloat($grid[$fila][8]);
                  if ($grid[$fila][10]>0)
                     $precio=H::toFloat($grid[$fila][10]);
                  else 
                     $precio=H::toFloat($grid[$fila][9]);

                   $comision=($cantidad*$precio)*($reg->getPorcom()/100);
                   $grid[$fila][68]=H::FormatoMonto($comision);
                  
                }else {
                    $grid[$fila][$col-1]="";
                    $grid[$fila][67]="";
                    $grid[$fila][68]="0,00";
                    $javascript="alert('El Productor no esta Registrado');";
                }
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
   * Función para manejar los filtros de búsqueda
   * de la lista
   *
   */
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['reffac_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['reffac']) && $this->filters['reffac'] !== '')
    {
      $c->add(FafacturPeer::REFFAC, strtr("%".$this->filters['reffac']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['fecfac_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::FECFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::FECFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecfac']))
    {
      if (isset($this->filters['fecfac']['from']) && $this->filters['fecfac']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(FafacturPeer::FECFAC, date('Y-m-d', $this->filters['fecfac']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecfac']['to']) && $this->filters['fecfac']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(FafacturPeer::FECFAC, date('Y-m-d', $this->filters['fecfac']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(FafacturPeer::FECFAC, date('Y-m-d', $this->filters['fecfac']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
    if (isset($this->filters['codcli_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::CODCLI, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::CODCLI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcli']) && $this->filters['codcli'] !== '')
    {
      $c->add(FafacturPeer::CODCLI, strtr("%".$this->filters['codcli']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['guia_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['guia']) && $this->filters['guia'] !== '')
    {
      $c->add(FaartfacPeer::GUIA, $this->filters['guia']);
      $c->addJoin(FafacturPeer::REFFAC,  FaartfacPeer::REFFAC);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nronot_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nronot']) && $this->filters['nronot'] !== '')
    {
      $c->add(FaartfacPeer::NRONOT, $this->filters['nronot']);
      $c->addJoin(FafacturPeer::REFFAC,  FaartfacPeer::REFFAC);
      $c->setIgnoreCase(true);
    }
     if (isset($this->filters['notentdig_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['notentdig']) && $this->filters['notentdig'] !== '')
    {
      $c->add(FaartfacPeer::NOTENTDIG, $this->filters['notentdig']);
      $c->addJoin(FafacturPeer::REFFAC,  FaartfacPeer::REFFAC);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['contenedores_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['contenedores']) && $this->filters['contenedores'] !== '')
    {
      $c->add(FaartfacPeer::CONTENEDORES, $this->filters['contenedores']);
      $c->addJoin(FafacturPeer::REFFAC,  FaartfacPeer::REFFAC);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['billleading_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['billleading']) && $this->filters['billleading'] !== '')
    {
      $c->add(FaartfacPeer::BILLLEADING, $this->filters['billleading']);
      $c->addJoin(FafacturPeer::REFFAC,  FaartfacPeer::REFFAC);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codref_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codref']) && $this->filters['codref'] !== '')
    {
      $c->add(FaartfacPeer::CODREF, strtr("%".$this->filters['codref']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FafacturPeer::REFFAC,  FaartfacPeer::REFFAC);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['numcontrol_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::NUMCONTROL, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::NUMCONTROL, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['numcontrol']) && $this->filters['numcontrol'] !== '')
    {
      $c->add(FafacturPeer::NUMCONTROL, strtr("%".$this->filters['numcontrol']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['rifpro_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::RIFPRO, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::RIFPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['rifpro']) && $this->filters['rifpro'] !== '')
    {
      $c->add(FaclientePeer::RIFPRO, strtr("%".$this->filters['rifpro']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FafacturPeer::CODCLI, FaclientePeer::CODPRO);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['nompro_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::NOMPRO, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::NOMPRO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nompro']) && $this->filters['nompro'] !== '')
    {
      $c->add(FaclientePeer::NOMPRO, strtr("%".$this->filters['nompro']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FafacturPeer::CODCLI, FaclientePeer::CODPRO);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::CODEDO, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::CODEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codedo']) && $this->filters['codedo'] !== '')
    {
      $c->add(FaclientePeer::CODEDO, strtr("%".$this->filters['codedo']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FafacturPeer::CODCLI,  FaclientePeer::CODPRO); 
    }
    if (isset($this->filters['nomedo_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::NOMEDO, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::NOMEDO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomedo']) && $this->filters['nomedo'] !== '')
    {
      $c->add(OcestadoPeer::NOMEDO, strtr("%".$this->filters['nomedo']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FafacturPeer::CODCLI,  FaclientePeer::CODPRO); 
      $c->addJoin(FaclientePeer::CODEDO,  OcestadoPeer::CODEDO); 
    }
    if (isset($this->filters['desfac_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::DESFAC, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::DESFAC, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desfac']) && $this->filters['desfac'] !== '')
    {
      $c->add(FafacturPeer::DESFAC, strtr("%".$this->filters['desfac']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
    if (isset($this->filters['desforpag_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::DESFORPAG, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::DESFORPAG, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['desforpag']) && $this->filters['desforpag'] !== '')
    {
      $c->add(FatippagPeer::DESTIPPAG, strtr("%".$this->filters['desforpag']."%", '*', '%'), Criteria::LIKE);
      $c->addJoin(FaforpagPeer::TIPPAG,  FatippagPeer::ID);
      $c->addJoin(FafacturPeer::REFFAC,  FaforpagPeer::REFFAC);
      $c->setIgnoreCase(true);
    }
    if (isset($this->filters['codubi_is_empty']))
    {
      $criterion = $c->getNewCriterion(FafacturPeer::CODUBI, '');
      $criterion->addOr($c->getNewCriterion(FafacturPeer::CODUBI, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codubi']) && $this->filters['codubi'] !== '')
    {
      $c->add(FafacturPeer::CODUBI, strtr("%".$this->filters['codubi']."%", '*', '%'), Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }
  
  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->fafactur = $this->getFafacturOrCreate();
     $this->updateFafacturFromRequest();
     $this->configGridArtFac($this->fafactur->getReffac(), $this->fafactur->getTipref());
     $this->configGridForPag($this->fafactur->getReffac());
     $detalle = Herramientas :: CargarDatosGridv2($this, $this->obj1);
     $grid3 = Herramientas :: CargarDatosGridv2($this, $this->obj3);

     $concom   = 0;
     $mensaje1 = "";
     $msj1     = "";
     $msj2     = "";
     $mensajeuno  = "";
     $msjuno      = "";
     $msjdos      = "";
     $msjtres     = "";
     $comprobante = "";
     $this->mensajeuno = "";
     $this->msj1     = "";
     $this->msj2     = "";
     $this->mensaje1 = "";
     $this->msjuno   = "";
     $this->msjdos   = "";
     $this->msjtres  = "";
     $this->i        = "";
     $this->formulario = array();

     if ($this->fafactur->getRifpro()=="" || $this->fafactur->getCodconpag()=="" || count($detalle[0])==0)
     {
       $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Cliente,  la Condición de Pago y el Detalle de Artículos, para luego generar el comprobante";

     }else{
       if ($this->fafactur->getRifpro()=="" || $this->fafactur->getCodconpag()=="")
       {
         $this->msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Cliente y la Condición de Pago, para luego generar el comprobante";
       }
     }

     if ($this->msjtres=="")
     {
      $x=Factura::generarComprobanteExterno($this->fafactur,$detalle,$grid3,$comprobante,$msjuno);
      if ($msjuno=="") {
      $concom = $concom + 1;

      $form = "sf_admin/fafactur/confincomgen";
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
  
  public function validarGeneraComprobante()
  {
    $form="sf_admin/fafactur/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');

    if ($grabo=='')
    { return true;}
    else { return false;}
}  


  protected function getLabels()
  {
    $labels = parent::getLabels();
    $nometiuni=H::getConfApp2('nometiuni', 'facturacion', 'fafactur');
    if ($nometiuni!='')
      $labels['fafactur{codubi}'] = $nometiuni.':';

    $cambiareti=H::getConfApp2('cameti', 'compras', 'almdefdirec');
    if ($cambiareti=='S')
      $labels['fafactur{coddirec}'] = 'Estado';

    return $labels;
  }

  public function executeEsperar()
  {
    $this->fafactur = $this->getFafacturOrCreate();
    // print $this->fafactur->getImpfissta();
    $this->fafactur->updateImpfissta();

  }

  public function executeFiscal()
  {
    $fafactur = $this->getFafacturOrCreate();
    $devolver = $this->getRequestParameter('devolver','');

    $a= new Criteria();
    $a->add(FadefcajPeer::ID,$this->getUser()->getAttribute('clavecaja', null, 'fafactur'));
    $caja=FadefcajPeer::doSelectOne($a);

//print("<pre>");
//print_r($)
    if($caja && $fafactur){
      $c = new Criteria();
      $c->add(FaartfacPeer :: REFFAC, $fafactur->getReffac());
      $artfac = FaartfacPeer :: doSelect($c);

      $c = new Criteria();
      $c->add(FaforpagPeer :: REFFAC, $fafactur->getReffac());
      $forpag = FaforpagPeer :: doSelect($c);

      $this->array_json = array();

      $this->array_json["maestro"] = array(
                      "factura" => $fafactur->getReffac(),
                      "control" => $fafactur->getNumcontrol(),
                      "rif" => $fafactur->getRifpro(),
                      "razon_social" => $fafactur->getNompro(),
                      "telefono" => $fafactur->getTelpro(),
                      "persona" => $fafactur->getTipper(),
                      "direccion" => $fafactur->getDirpro(),
                      "monto" => $fafactur->getMonfac(),
                      "observacion" => $fafactur->getObserv(),
                      "id" => $fafactur->getId(),
                      );

      if($devolver=='true'){
        $c = new Criteria();
        $c->add(LogsImpresorasPeer::FACTURA_ID, $fafactur->getId());
        $c->addDescendingOrderByColumn(LogsImpresorasPeer::CREATED_AT);
        $log = LogsImpresorasPeer::doSelectOne($c);

        // $log = $fafactur->getLastLogImp();
        if($log){
          $this->array_json["maestro"]['numero_factura'] = $log->getNumeroFactura();
          $this->array_json["maestro"]['fecha'] = $log->getFecha();
          $this->array_json["maestro"]['hora'] = $log->getHora();
          $this->array_json["maestro"]['serial_maquina'] = $log->getSerialImpresora();
        }
      }

      foreach ($artfac as $key => $value) {
        $this->array_json["detalle"][] = array(
                        "articulo" => $value->getCodart(),
                        "descripcion" => $value->getDesart(),
                        "unidad" => $value->getUnimed(),
                        "cantidad" => $value->getCantot(),
                        "precio" => $value->getPrecio(),
                        "recargo" => $value->getMonrgo(),
                        "iva" => $value->getPorrgo(), // % del iva aplicado
                        "descuento" => $value->getMondes(),
                        "total" => $value->getTotart(),
                        );
        
      }

      foreach ($forpag as $key => $value) {
        $this->array_json["pago"][] = array(
                        "tipo" => $value->getDestippag(),
                        "monto" => $value->getMonpag(),
                        );
        
      }

      require 'plugins/sidekiq-job-pusher/autoload.php';
      require 'lib/SidekiqJobPusher/Client.php';
      require 'lib/SidekiqJobPusher/KeyGenerator.php';
      require 'lib/SidekiqJobPusher/MessageSerialiser.php';

      $redis = new Predis\Client(array(
      'host' => $caja->getImpfishost(),
      'port' => '6379',
      ));

      $sidekiq = new SidekiqJobPusher\Client($redis, $caja->getImpfisname());

      if($devolver=='true'){
        $sidekiq->perform('ImprimirDevolucionWorker', array($this->array_json));
      }else{
        $sidekiq->perform('ImprimirFacturaWorker', array($this->array_json));  
      }
      

      # E = Enviada a Impresión
      # I = Impresa y Facturada. En este estatus debe existir un registro en LogsImpresoras
      # D = Factura Devuelta

      $fafactur->setImpfissta("E");
      $fafactur->save();

    }else{
      $this->array_json = array();
    }

    return $this->redirect('fafactur/edit?id='.$fafactur->getId().'&grabo=S');
  }
  
}

