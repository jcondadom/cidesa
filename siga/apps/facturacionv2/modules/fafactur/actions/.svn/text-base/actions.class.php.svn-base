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
        $caja = $this->getUser()->getAttribute('clavecaja', null, 'fafactur');
        if ($caja != "") {
            $alms = $this->getUser()->getAttribute('usualms', array());
            if (count($alms) > 0) {
                $keys = array_keys($alms);
                $fadefcaj = FadefcajPeer::retrieveByPK($caja);
                if ($fadefcaj) {
                    if (in_array($fadefcaj->getCodalm() , $keys)) {
                        $this->fafactur->setCodalmusu($fadefcaj->getCodalm());
                    } else {
                    }
                }
            }
            if ($this->fafactur->getId() == '') {
                $this->fafactur->setReffac('########');
            }
        }
        if ($this->fafactur->getId()) {
            if ($this->fafactur->getStatus() == 'N') {
                if ($this->fafactur->getFecanu() != '') $eti = "ANULADA EL " . date('d/m/Y', strtotime($this->fafactur->getFecanu()));
                else $eti = "ANULADA ";
                $this->fafactur->setEstatus($eti);
            }
            $t = new Criteria();
            $t->add(FaajustePeer::CODREF, $this->fafactur->getReffac());
            $resultado = FaajustePeer::doSelectOne($t);
            if ($resultado) {
                $etinc = "N° N/C: " . $resultado->getRefaju() . ", Fecha: " . date('d/m/Y', strtotime($resultado->getFecaju()));
                $this->fafactur->setNotacredito($etinc);
            }
        }
        $c = new Criteria();
        $dato = CadefartPeer::doSelectOne($c);
        if ($dato) {
            if ($dato->getApliclades() == 'S') {
                $this->fafactur->setApliclades('S');
            } else $this->fafactur->setApliclades('N');
        } else $this->fafactur->setApliclades('N');
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
    public function executeEdit() {
        $this->params = array();
        $this->fafactur = $this->getFafacturOrCreate();
        $this->editing();
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->updateFafacturFromRequest();
            if ($this->saveFafactur($this->fafactur) == - 1) { {
                    if ($this->fafactur->getTipconpag() == 'R') {
                        $sql = "Select coalesce(Sum(MonDoc+RecDoc-DscDoc-AboDoc),0) as monto from CobDocume where CodCli='" . $this->fafactur->getCodcli() . "' Group by CodCli";
                        if (Herramientas::BuscarDatos($sql, &$result)) {
                            if (count($result) > 0) {
                                $cal = H::tofloat($result[0]["monto"]) + $this->fafactur->getMonfac() - $this->fafactur->getMondesc();
                                if ($cal > H::tofloat($this->fafactur->getLimitecredito())) {
                                    $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
                                } else $this->setFlash('notice', 'Your modifications have been saved');
                            } else {
                                $cal = $this->fafactur->getMonfac() - $this->fafactur->getMondesc();
                                if ($cal > H::tofloat($this->fafactur->getLimitecredito())) {
                                    $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
                                } else $this->setFlash('notice', 'Your modifications have been saved');
                            }
                        } else {
                            $cal = $this->fafactur->getMonfac() - $this->fafactur->getMondesc();
                            if ($cal > H::tofloat($this->fafactur->getLimitecredito())) {
                                $this->setFlash('notice', 'Tus Modificaciones han sido Salvadas. El Cliente Sobrepaso el Límite de Credito');
                            } else $this->setFlash('notice', 'Your modifications have been saved');
                        }
                    } else $this->setFlash('notice', 'Your modifications have been saved');
                    $id = $this->fafactur->getId();
                    $this->SalvarBitacora($id, 'Guardo');
                }
                if ($this->getRequestParameter('save_and_add')) {
                    
                    return $this->redirect('fafactur/create');
                } else if ($this->getRequestParameter('save_and_list')) {
                    
                    return $this->redirect('fafactur/list');
                } else {
                    
                    return $this->redirect('fafactur/edit?id=' . $this->fafactur->getId());
                }
            } else {
                $this->labels = $this->getLabels();
            }
        } else {
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
        $this->configGridArtFac($this->fafactur->getReffac() , $this->fafactur->getTipref());
        $this->configGridDescFac($this->fafactur->getReffac());
        $this->configGridForPag($this->fafactur->getReffac());
        $this->configGridRgoArt($this->fafactur->getReffac());
        $this->configGridPedDes($this->fafactur->getTipref(), $this->fafactur->getCodcli());
        $this->configGridFaclib($this->fafactur->getReffac());
    }
    /**
     * Esta función permite definir la configuración del grid de datos
     * que contiene el formulario. Esta función debe ser llamada
     * en las acciones, create, edit y handleError para recargar en todo momento
     * los datos del grid.
     *
     */
    public function configGridArtFac($reffac = '', $tipref = '', $tipo = '') {
        $c = new Criteria();
        if ($tipo == 'PROFORMA') {
            $c->add(FaartfacproPeer::REFFAC, $reffac);
            $c->add(FaartfacproPeer::ESTATUS, 'A');
            $artfac = FaartfacproPeer::doSelect($c);
        } else {
            $c->add(FaartfacPeer::REFFAC, $reffac);
            $artfac = FaartfacPeer::doSelect($c);
        }
        $mascara = $this->mascaraarticulo;
        $lonarti = $this->lonart;
        $obj = array(
            'codart' => 3,
            'desart' => 4
        );
        $params = array(
            'param1' => $lonarti,
            'param2' => "'+$('fafactur_codprg').value+'",
            'param3' => "'+$('fafactur_tipocliente').value+'",
            'param4' => "'+$('fafactur_codconpag').value+'"
        );
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/fafactur/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_faartfacv2');
        $this->columnas[0]->setFilas($this->fafactur->getNumfilas());
        if ($tipref != "" && ($tipref == 'P')) {
            //$this->columnas[0]->setAncho(1400);
            $this->columnas[1][2]->setHTML('type="text" size="17" readonly=true');
            $this->columnas[1][6]->setHTML('readonly=true onKeyPress=cansol(event,this.id);');
            $this->columnas[1][6]->setOculta(false);
            $this->columnas[1][7]->setOculta(false);
            $this->columnas[1][8]->setOculta(true);
            $this->columnas[1][7]->setHTML('size="10" ');
            $oculaplrec = H::getConfApp2('oculaplrec', 'facturacion', 'fafactur');
            if ($oculaplrec == 'S') {
                $this->columnas[1][61]->setOculta(false);
                $this->columnas[1][62]->setOculta(false);
            }
        } else if ($tipref != "" && ($tipref == 'D' || $tipref == 'VC')) {
            $this->columnas[1][2]->setHTML('type="text" size="17" readonly=true');
            $this->columnas[1][6]->setOculta(true);
            $this->columnas[1][7]->setOculta(true);
            $this->columnas[1][8]->setOculta(false);
            $this->columnas[1][8]->setHTML(' size="10" onKeyPress=candespachar(event,this.id);');
        } else {
            $this->columnas[1][2]->setHTML('type="text" size="17" maxlength="' . chr(39) . $lonarti . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,21);" onBlur="javascript:event.keyCode=13; ajaxarticulosfactura(event,this.id);"');
            $this->columnas[1][2]->setCatalogov2('falisprc', 'sf_admin_edit_form', $obj, 'Falisprc_Fafactur', $params);
            //$this->columnas[1][2]->setCatalogo('falisprc', 'sf_admin_edit_form', $obj, 'Falisprc_Fafactur', $params);
            $this->columnas[1][6]->setHTML('size="10" onKeyPress=cansol(event,this.id);');
        }
        $this->columnas[0]->setEliminar(true, 'montoTotal()');
        $this->columnas[1][0]->setHTML('onClick="marcardesc(this.id)"');
        //$this->columnas[1][9]->setHTML(FalisprcPeer :: getPrecios($codigo));
        $this->columnas[1][9]->setCombo(FaartpvpPeer::getPrecios());
        $this->columnas[1][9]->setHTML('onChange=Precio3(this.id);');
        $this->columnas[1][10]->setHTML('size="10" onKeyPress=Precio2(event,this.id);');
        $this->columnas[1][11]->setHTML(' size="10" onKeyPress=montorecargo(event,this.id);');
        //$this->columnas[1][11]->setEsTotal(true, 'fafactur_totmonrgo');
        //$this->columnas[1][12]->setEsTotal(true, 'fafactur_tottotart');
        $this->columnas[1][19]->setHTML('onClick="aplicardescuentos(this.id)"');
        if ($this->cambiolog != "S") {
            /*$this->columnas[1][25]->setOculta(true);
                        $this->columnas[1][26]->setOculta(true);
                        $this->columnas[1][26]->setOculta(true);
                        $this->columnas[1][27]->setOculta(true);*/
        } //else $this->columnas[0]->setAncho(1800);
        $this->columnas[1][35]->setCombo(array(
            'L' => 'Largo',
            'C' => 'Corto'
        ));
        $this->columnas[1][22]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=mostrargridrecargos(this.id);'); //Aplicarecargos
        $this->columnas[1][23]->setHTML('type="text" size="1" style="border:none" class="imagenalmacen" onClick=mostrargriddescuentos(this.id);'); //Aplicardescuentos
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
    public function configGridDescFac($reffac = '', $tipo = '', $tipcliente = '', $arreglo = array() , $codart = '') {
        if ($tipcliente != '') {
            $descart = $arreglo;
        } else {
            $c = new Criteria();
            if ($tipo == 'PROFORMA') {
                $c->add(FadescartproPeer::REFDOC, $reffac);
                $dreg = FadescartproPeer::doSelect($c);
                
                foreach ($dreg as $obj) {
                    $fadescart2 = new Fadescart();
                    $fadescart2->setCoddesc($obj->getCoddesc());
                    $fadescart2->setDesdesc($obj->getDesdesc());
                    $fadescart2->setMondesc($obj->getMondesc());
                    $fadescart2->setCodcta($obj->getCodcta());
                    $fadescart2->setCantidad(0);
                    $fadescart2->setMontdesc($obj->getMontdesc());
                    $fadescart2->setTipdesc($obj->getTipdesc());
                    $fadescart2->setTipret($obj->getTipret());
                    $descart[] = $fadescart2;
                }
            } else {
                $c->add(FadescartPeer::REFDOC, $reffac);
                $c->add(FadescartPeer::CODART, $codart);
                $descart = FadescartPeer::doSelect($c);
            }
        }
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/fafactur/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_fadescart');
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
        $c->add(FaforpagPeer::REFFAC, $reffac);
        $forpag = FaforpagPeer::doSelect($c);
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/fafactur/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_faforpag');
        //$this->columnas[1][5]->setHTML('size=10 onKeyPress=calcularmontopago(event,this.id);');
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
        $c->add(FafaclibPeer::REFFAC, $reffac);
        $faclib = FafaclibPeer::doSelect($c);
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/fafactur/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_fafaclib');
        //    $this->columnas[1][5]->setHTML('size=10 onKeyPress=calcularmontopago(event,this.id);');
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
    public function configGridRgoArt($reffac = '', $tipo = '', $codart = '') {
        $c = new Criteria();
        if ($tipo == 'PROFORMA') {
            $c->add(FargoartproPeer::REFDOC, $reffac);
            $c->add(FargoartproPeer::CODART, $codart);
            $rreg = FargoartproPeer::doSelect($c);
            
            foreach ($rreg as $obj) {
                $fargoart2 = new Fargoart();
                $fargoart2->setCodrgo($obj->getCodrgo());
                $fargoart2->setNomrgo($obj->getNomrgo());
                $fargoart2->setRecfij($obj->getRecfij());
                $fargoart2->setMonrgo($obj->getMonrgo());
                $fargoart2->setCodcta($obj->getCodcta());
                $fargoart2->setTipo($obj->getTipo());
                $fargoart2->setMonrgo2($obj->getMonrgo2());
                $rgoart[] = $fargoart2;
            }
        } else {
            $c->add(FargoartPeer::REFDOC, $reffac);
            $c->add(FargoartPeer::CODART, $codart);
            $rgoart = FargoartPeer::doSelect($c);
        }
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/fafactur/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_fargoart');
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
    public function configGridPedDes($referencia = '', $codcli = '', $fechoy = '', $fecdes = '', $fechas = '', $codalm = '') {
        if ($referencia == 'P') {
            //$sql = "Select '' as check, NROPED as nroped,DESPED as desped,FECPED as fecped, 9 as id, CODPRG as codprg from FAPEDIDO WHERE CodCli='" . $codcli . "' and STATUS='A' and NroPed not in (Select CodRef from Fanotent where CodRef=FaPedido.NroPed and TipRef='P') order by NroPed";
            $sql = "Select '' as check, NROPED as nroped,DESPED as desped,FECPED as fecped, 9 as id, CODPRG as codprg 
          from FAPEDIDO 
          WHERE CodCli='$codcli' 
          and STATUS='A'
          --and codalmusu = '$codalm'
          and fecped >= '$fecdes'
          and fecped <= '$fechas' 
          and NroPed not in (Select DISTINCT(CodRef) from FAARTFAC where CodRef=FaPedido.NroPed and FaPedido.TipRef like 'P%') 
          order by NroPed";
            Herramientas::BuscarDatos($sql, &$reg);
        } else {
            Facturav2::buscarDespachos($codcli, $fechoy, $fecdes, $fechas, &$reg);
            //$sql = "Select '' as check, DPHART as dphart,DESDPH as desdph,FECDPH as fecdph, 9 as id from CADPHART WHERE CodCli='" . $codcli . "' and STADPH='A' and TIPDPH<>'D' and REQART not in (Select NroNot From FaNotEnt where (TipNot='D') or (NroNot=CADPHART.REQART and TipRef='F')) order by DPHART";
            //Herramientas :: BuscarDatos($sql, & $reg);
            
        }
        $this->fil1 = count($reg);
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/fafactur/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_fapeddes');
        if ($referencia != 'P') {
            $this->columnas[0]->setTabla('Cadphart');
            $this->columnas[1][1]->setNombrecampo('dphart');
            $this->columnas[1][2]->setNombrecampo('desdph');
            $this->columnas[1][3]->setNombrecampo('fecdph');
        } else {
            $this->columnas[1][0]->setHTML('onClick=" if (!pedidosmarcados(this.id)) { buscarDatosPedido(this.id) }else { mensajepedido()}"');
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
            case '1':
                $output = '[["","",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '2':
                if ($codigo != "") {
                    $tipref = $this->getRequestParameter('tipref', 'V');
                    $c = new Criteria();
                    $c->add(FaclientePeer::RIFPRO, $codigo);
                    $reg = FaclientePeer::doSelectOne($c);
                    if ($reg) {
                        $javascript = "$('fafactur_incluircliente').value='N'; ";
                        $this->sql = "carecaud.codrec not in (select Farecpro.codrec from Farecpro where Farecpro.codpro='" . $reg->getCodpro() . "')";
                        $c = new Criteria();
                        $c->add(CarecaudPeer::LIMREC, 'S');
                        $c->add(CarecaudPeer::CODTIPREC, $reg->getCodtiprec());
                        $c->add(CarecaudPeer::CODREC, $this->sql, Criteria::CUSTOM);
                        $reg2 = CarecaudPeer::doSelectOne($c);
                        if (!$reg2) {
                            $dato1 = $reg->getNompro();
                            $dato2 = $reg->getTelpro();
                            $dato3 = $reg->getDirpro();
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
                            Facturav2::mostrarDescuentos($dato7, &$arreglodesc);
                            $codprg = '';
                            $codconpag = '';
                            $concre = '';
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
                            $codprg = '';
                            $codconpag = '';
                            $concre = '';
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
                            $codprg = '';
                            $codconpag = '';
                            $concre = '';
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
                            $codprg = '';
                            $codconpag = '';
                            $concre = '';
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
                    $codprg = '';
                    $codconpag = '';
                    $concre = '';
                }
                $output = '[["fafactur_nompro","' . $dato1 . '",""],["fafactur_telpro","' . $dato2 . '",""],["fafactur_dirpro","' . $dato3 . '",""],["fafactur_codcli","' . $dato5 . '",""],["fafactur_ctacli","' . $dato6 . '",""],["fafactur_tipocliente","' . $dato7 . '",""],["fafactur_limitecredito","' . $dato8 . '",""], ["fafactur_tipcte","' . ($reg ? $reg->getFatipcteId() : '') . '",""], ["fafactur_codprg","' . $codprg . '",""], ["fafactur_codconpag","' . $codconpag . '",""], ["fafactur_codprg","' . $concre . '",""], ["javascript","' . $javascript . '",""], ["bx_0_5","1",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '3':
                $c = new Criteria();
                $c->add(TsdesmonPeer::CODMON, $codigo);
                $c->add(TsdesmonPeer::FECMON, $this->getRequestParameter('fecha'));
                $result = TsdesmonPeer::doSelectOne($c);
                if ($result) {
                    $moneda = $result->getValmon();
                    $posneg = $result->getAumdis();
                    $codigomoneda = $result->getCodmon();
                } else {
                    $sql = "Select MAX(VALMON) as VALMON,MAX(AUMDIS) as AUMDIS,MAX(CODMON) as CODMON from TSDesMon where codmon='" . $codigo . "'";
                    if (Herramientas::BuscarDatos($sql, &$result)) {
                        if (!is_null($result[0]["codmon"])) {
                            $moneda = $result[0]["valmon"];
                            $posneg = $result[0]["aumdis"];
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
                $output = '[["fafactur_valmon","' . $moneda . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '4':
                if ($codigo != "") {
                    $c = new Criteria();
                    $c->add(FaconpagPeer::ID, $codigo);
                    $result = FaconpagPeer::doSelectOne($c);
                    if ($result) {
                        $dato1 = $result->getTipconpag();
                        if ($this->getRequestParameter('incluir') == 'N' || ($this->getRequestParameter('incluir') == 'S' && $result->getTipconpag() != 'R')) {
                            $dato2 = $result->getDesconpag();
                            if ($this->getRequestParameter('ctacli') == "" && $result->getTipconpag() == 'R') {
                                $javascript = "alert('No se puede Facturar debido a que el Cliente no posee Cuenta Contable asociada'); $('despach').hide(); $('pedid').hide(); $('fafactur_codconpag').value='';";
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
                
                return sfView::HEADER_ONLY;
                break;

            case '5':
                $javascript = "$('CajaPrinc').hide();";
                $correl = "########";
                $caja = $this->getRequestParameter('codigocaja');
                $alms = $this->getUser()->getAttribute('usualms', array());
                if (count($alms) > 0) {
                    $keys = array_keys($alms);
                    $fadefcaj = FadefcajPeer::retrieveByPK($caja);
                    if ($fadefcaj) {
                        if (in_array($fadefcaj->getCodalm() , $keys)) {
                            $this->getUser()->setAttribute('clavecaja', $caja, 'fafactur');
                            $javascript = $javascript . "$('FormaPrinc').show(); $$('.sf_admin_action_list')[0].show(); $$('.sf_admin_action_save')[4].show(); $$('.sf_admin_action_create')[0].show();";
                            $output = '[["javascript","' . $javascript . '",""],["fafactur_reffac","' . $correl . '",""],["fafactur_codalmusu","' . $fadefcaj->getCodalm() . '",""]]';
                        } else {
                            $javascript = $javascript . " alert('El almacen de la caja seleccionada no está autorizado al usuario actual');";
                            $output = '[["javascript","' . $javascript . '",""]]';
                        }
                    }
                } else {
                    $this->getUser()->setAttribute('clavecaja', $caja, 'fafactur');
                    $javascript = $javascript . "$('FormaPrinc').show(); $$('.sf_admin_action_list')[0].show(); $$('.sf_admin_action_save')[4].show(); $$('.sf_admin_action_create')[0].show();";
                    $output = '[["javascript","' . $javascript . '",""],["fafactur_reffac","' . $correl . '",""]]';
                }
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '6':
                $c = new Criteria();
                $c->add(FasinrgoPeer::CODART, $this->getRequestParameter('articulo'));
                $c->add(FasinrgoPeer::CODRGO, $this->getRequestParameter('recargo'));
                $resul = FasinrgoPeer::doSelectOne($c);
                if ($resul) {
                    $javascript = "$('fafactur_trajo').value='S'";
                } else $javascript = "$('fafactur_trajo').value='N'";
                $output = '[["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '7':
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
                $c->add(FarecargPeer::CODRGO, $codigo);
                $resul = FarecargPeer::doSelectOne($c);
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
                            $dato3 = number_format($resul->getMonrgo() , 2, ',', '.');
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
                
                return sfView::HEADER_ONLY;
                break;

            case '8':
                $c = new Criteria();
                $c->add(FacladtoPeer::LOGUSE, $this->getRequestParameter('login'));
                $resul = FacladtoPeer::doSelectOne($c);
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
                
                return sfView::HEADER_ONLY;
                break;

            case '9':
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
                $javascript = "";
                $c = new Criteria();
                $c->add(FadesctoPeer::CODDESC, $codigo);
                $reg = FadesctoPeer::doSelectOne($c);
                if ($reg) {
                    if ($valcant != "") {
                        if ($valcant == 0) {
                            $javascript = "$('$cantidad').value='1'; ";
                        }
                    }
                    if ($reg->getTipret() != 'S') {
                        $dato = 'N';
                    } else $dato = 'S';
                    if ($reg->getTipdesc() == 'M') {
                        $montota = (($this->getRequestParameter('monto14') * $this->getRequestParameter('porcentajedesc')) / 100);
                        if (($reg->getMondesc() > $montota) && ($this->getRequestParameter('aplicaclades') == 'S')) {
                            $javascript = $javascript . "alert('El Porcentaje del Descuento sobrepasa el límite permitido para el Usuario'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
                            $msj = 'z';
                        }
                    } else {
                        if (($reg->getMondesc() > $this->getRequestParameter('porcentajedesc')) && ($this->getRequestParameter('aplicaclades') == 'S')) {
                            $javascript = $javascript . "alert('El Porcentaje del Descuento sobrepasa el límite permitido para el Usuario'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
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
                                    $dato7 = $this->getRequestParameter('totaldesc') - H::tofloat($dato6);
                                } else {
                                    //$javascript = $javascript."calcularTotalDescuento(); montoTotal(); actualizarRecargos(); recalcularRecargos(); montoTotal();";
                                    $javascript = $javascript . "calcularTotalDescuento();";
                                }
                            }
                        }
                    }
                } else {
                    $javascript = "alert('El Descuento no existe'); $('$codigo').value=''; $('$cajtexmos').value=''; $('$montodesc').value=''; $('$cuenta').value=''; $('$cantidad').value='1'; $('$tipo').value=''; $('$tiporet').value='';";
                }
                $output = '[["fafactur_esretencion","' . $dato . '",""],["' . $cajtexmos . '","' . $dato1 . '",""],["' . $cuenta . '","' . $dato2 . '",""],["' . $descuento . '","' . $dato3 . '",""],["' . $tipo . '","' . $dato4 . '",""],["' . $tiporet . '","' . $dato5 . '",""],["' . $montodesc . '","' . $dato6 . '",""],["fafactur_totdesc","' . $dato7 . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '10':
                $dateFormat = new sfDateFormat('es_VE');
                $fecha = $dateFormat->format($this->getRequestParameter('codigo') , 'i', $dateFormat->getInputPattern('d'));
                $c = new Criteria();
                $c->add(FafacturPeer::REFFAC, $this->getRequestParameter('reffac'));
                $data = FafacturPeer::doSelectOne($c);
                if ($data) {
                    if ($fecha < $data->getFecfac()) {
                        $msj = "alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha de la Factura'); $('fafactur_fecanu').value=''";
                    } else {
                        $msj = "";
                        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo')) == true) {
                            $msj = "alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('fafactur_fecanu').value=''; $('fafactur_fecanu').focus(); ";
                        } else {
                            $msj = "";
                        }
                    }
                } else {
                    $msj = "";
                }
                $output = '[["javascript","' . $msj . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '11':
                $this->param = "";
                $this->ajaxs = "";
                $p = "";
                $this->arreglo = array();
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
                $rgofijos = "";
                $c = new Criteria();
                $c->add(CaregartPeer::CODART, $codigo);
                $dato = CaregartPeer::doSelectOne($c);
                if ($dato) {
                    if ($dato->getCtavta() != "") {
                        if (Facturav2::articulosConsignacion($codigo)) {
                            $sql = "Select distinct A.CodPro as codpro,B.NomPro as nompro,A.Comisi as comisi From FaArtPro A,CAProVee B Where CodArt = '" . $codigo . "' and A.CodPro=B.CodPro";
                            if (Herramientas::BuscarDatos($sql, &$result)) {
                                if (count($result) > 1) {
                                    $proveedores = array();
                                    $j = 0;
                                    
                                    while ($j < count($result)) {
                                        $proveedores+= array(
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
                        $cantidad = number_format($dato->getDistot() , 2, ',', '.');
                        $cant_entregada = $this->getRequestParameter('canent');
                        $exist = $dato->getDistot() - $cant_entregada;
                        $existencia = number_format($exist, 2, ',', '.');
                        $cantidad = number_format($dato->getDistot() , 2, ',', '.');
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
                        $javascript = $javascript . " datosRecargos(); ";
                    } else {
                        $javascript = "alert('El Artículo no posee Cuenta de Venta asociada'); $('$cajtexcom').value=''; ";
                    }
                } else {
                    $javascript = "alert('El Código del Artículo no Existe'); $('$cajtexcom').value='';";
                }
                $output = '[["' . $ctaprove . '","' . $ctaprovee . '",""],["' . $blancodos . '","' . $blanco2 . '",""],["' . $cajtexmos . '","' . $desart . '",""],["' . $unim . '","' . $unimed . '",""],["' . $cant . '","' . $cantidad . '",""],["' . $existenc . '","' . $existencia . '",""],["' . $montrgo . '","' . $monrgo . '",""],["' . $tota . '","' . $total . '",""],["' . $blanc . '","' . $blanco . '",""],["fafactur_rgofijos","' . $rgofijos . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '12':
                $this->ajaxs = '5';
                $this->precios = array();
                $javascript = "";
                $precioe = $this->getRequestParameter('precio2');
                $fecemi = $this->getRequestParameter('fecemi');
                $dateFormat = new sfDateFormat('es_VE');
                $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));
                $codprg = $this->getRequestParameter('codprg');
                $codtipcli = $this->getRequestParameter('codtipcli');
                $conpag = $this->getRequestParameter('conpag');
                $this->precios = FalisprcPeer::getPreciosv2($codigo, $codprg, $codtipcli, $conpag);
                //FaartpvpPeer :: getPrecios($codigo,$fec);
                if (count($this->precios) == 0) {
                    $javascript = $javascript . "$('$precioe').readOnly=false;";
                }
                $output = '[["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '13':
                $this->ajaxs = '13';
                $this->fafactur = $this->getFafacturOrCreate();
                $dateFormat = new sfDateFormat('es_VE');
                $fec1 = $dateFormat->format($this->getRequestParameter('fecdes') , 'i', $dateFormat->getInputPattern('d'));
                $dateFormat = new sfDateFormat('es_VE');
                $fec2 = $dateFormat->format($this->getRequestParameter('fechas') , 'i', $dateFormat->getInputPattern('d'));
                $dateFormat = new sfDateFormat('es_VE');
                $fec = $dateFormat->format($this->getRequestParameter('fechoy') , 'i', $dateFormat->getInputPattern('d'));
                $codalm = $this->getRequestParameter('codalm', '');
                $this->configGridPedDes($this->getRequestParameter('tipref') , $this->getRequestParameter('cedula') , $fec, $fec1, $fec2, $codalm);
                if ($this->fil1 != 0) {
                    $javascript = "$('listaPedidosDespachos').show(); ";
                    if ($this->getRequestParameter('tipref') == 'P') {
                        $javascript = $javascript . "$('label2').innerHTML ='Pedidos Emitidos';";
                    } else $javascript = $javascript . "$('label2').innerHTML ='Despachos Emitidos';";
                } else {
                    if ($this->getRequestParameter('tipref') == 'P') $javascript = "alert('El Beneficiario no tiene Pedidos asociados')";
                    else $javascript = "alert('El Beneficiario no tiene Despachos asociados')";
                }
                $output = '[["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '14':
                $this->ajaxs = '14';
                $sin_cta_aso = "S";
                if ($this->getRequestParameter('tipref') == 'P') {
                    Facturav2::arregloPedidos($this->getRequestParameter('codrefer') , $this->getRequestParameter('tipref') , &$encontro, &$msj, &$arreglodet, &$p, &$sin_cta_aso);
                    if ($msj == "") {
                        if ($encontro == true) {
                            $javascript = "alert('El Pedido ya fue Facturado en su Totalidad'); $('listaPedidosDespachos').hide(); ";
                        } else {
                            $javascript = "colocarArticulos2('$arreglodet'); ";
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
                } else {
                    if ($this->getRequestParameter('tipref') == 'D' || $this->getRequestParameter('tipref') == 'VC') {
                        Facturav2::arregloDespachos($this->getRequestParameter('codrefer') , $this->getRequestParameter('tipref') , &$encontro, &$msj, &$arreglodet, &$p, &$sin_cta_aso);
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
                
                return sfView::HEADER_ONLY;
                break;

            case '15':
                Facturav2::datosRecargos($this->getRequestParameter('rgofijos') , $this->getRequestParameter('reffac') , &$arreglorec, &$trajo);
                if ($trajo == false) {
                    $javascript = "$('fafactur_totrec').value='0,00';";
                } else {
                    //$javascript = "colocarRecargos('$arreglorec'); calcularTotalRecargos();";
                    
                }
                $output = '[["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '16':
                $this->ajaxs = '16';
                $this->fafactur = $this->getFafacturOrCreate();
                $this->configGridArtFac('', $this->getRequestParameter('tipref'));
                $output = '[["","",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '17':
                if (Tesoreria::validarFechaPerContable($this->getRequestParameter('codigo'))) {
                    $msj = "alert('La Fecha debe estar dentro del Período Contable.'); $('fafactur_fecfac').value=''; $('fafactur_fecfac').focus();";
                } else {
                    if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo')) == true) {
                        $msj = "alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('fafactur_fecfac').value=''; $('fafactur_fecfac').focus();";
                    } else {
                        $msj = "";
                    }
                }
                $output = '[["javascript","' . $msj . '",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '18':
                $dato = TstipmovPeer::getDestip($codigo);
                $output = '[["fafactur_destip","' . $dato . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '19':
                $javascript = "";
                $monfac = 0;
                $c = new Criteria();
                $c->add(FafacturproPeer::REFFAC, $codigo);
                $per = FafacturproPeer::doSelectOne($c);
                if ($per) {
                    $tipref = $per->getTipref();
                    $tipmon = $per->getTipmon();
                    $rifpro = $per->getRifpro();
                    $nompro = $per->getNompro();
                    $telpro = $per->getTelpro();
                    $dirpro = $per->getDirpro();
                    $tipper = $per->getTipper();
                    $codcli = H::getX('RIFPRO', 'Facliente', 'Codpro', $per->getRifpro());
                    $ctacli = H::getX('RIFPRO', 'Facliente', 'Codcta', $per->getRifpro());
                    $codconpag = $per->getCodconpag();
                    $desconpag = $per->getDesconpag();
                    $desfac = $per->getDesfac();
                    $c = new Criteria();
                    $c->add(FaartfacproPeer::REFFAC, $codigo);
                    $c->add(FaartfacproPeer::ESTATUS, 'A');
                    $per2 = FaartfacproPeer::doSelect($c);
                    
                    foreach ($per2 as $r) $monfac+= $r->getTotart();
                    $tipconpag = H::GetX('Id', 'Faconpag', 'Tipconpag', $codconpag);
                    if ($tipper == 'N') $javascript.= "$('fafactur_tipper_N').disabled=false;
                                              $('fafactur_tipper_J').disabled=false;
                                              $('fafactur_tipper_N').checked=true;
                                              $('fafactur_tipper_J').checked=false;
                                              $('fafactur_tipper_N').disabled=true;
                                              $('fafactur_tipper_J').disabled=true;";
                    else $javascript.= "$('fafactur_tipper_N').disabled=false;
                                              $('fafactur_tipper_J').disabled=false;
                                              $('fafactur_tipper_N').checked=false;
                                              $('fafactur_tipper_J').checked=true;
                                              $('fafactur_tipper_N').disabled=true;
                                              $('fafactur_tipper_J').disabled=true;";
                } else {
                    $tipref = "";
                    $tipmon = "";
                    $rifpro = "";
                    $nompro = "";
                    $telpro = "";
                    $dirpro = "";
                    $tipper = "";
                    $ctacli = "";
                    $codcli = "";
                    $codconpag = "";
                    $desconpag = "";
                    $desfac = "";
                    $monfac = "";
                    $tipconpag = "";
                }
                $this->ajaxs = '16';
                $this->fafactur = $this->getFafacturOrCreate();
                $this->configGridArtFac($codigo, 'V', 'PROFORMA');
                //$javascript.=" CargarRecDesc(); montoTotal();";
                $javascript.= "montoTotal();";
                $output = '[["fafactur_tipref","' . $tipref . '",""],["fafactur_tipmon","' . $tipmon . '",""],["fafactur_rifpro","' . $rifpro . '",""],["fafactur_nompro","' . $nompro . '",""],
                                    ["fafactur_telpro","' . $telpro . '",""],["fafactur_dirpro","' . $dirpro . '",""],["fafactur_codconpag","' . $codconpag . '",""],["fafactur_desconpag","' . $desconpag . '",""],
                                    ["fafactur_desfac","' . $desfac . '",""],["fafactur_monto","' . H::FormatoMonto($monfac) . '",""],["fafactur_monfac","' . H::FormatoMonto($monfac) . '",""],["fafactur_tipconpag","' . $tipconpag . '",""],["fafactur_ctacli","' . $ctacli . '",""],["fafactur_codcli","' . $codcli . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                //return sfView::HEADER_ONLY;
                break;

            case '20':
                $dato = "";
                $t = new Criteria();
                $t->add(FaclientePeer::RIFPRO, $codigo);
                $reg = FaclientePeer::doSelectOne($t);
                if ($reg) {
                    $dato = $reg->getNompro();
                } else {
                    $javascript = "alert('El Cliente no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                }
                $output = '[["' . $cajtexmos . '","' . $dato . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '21':
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
                    $c->add(FaregotsPeer::CEDRIF, $codigo);
                    $result = FaregotsPeer::doSelectOne($c);
                    if ($result) {
                        $dato1 = $result->getNomots();
                        $dato2 = $result->getRifpro();
                        $dato3 = H::getX('RIFPRO', 'Caprovee', 'Nompro', $result->getRifpro());
                        $dato4 = $result->getPlaca();
                    } else {
                        $javascript = "alert('El Operador de Transporte no existe'); $('$cajtxtcom').value=''; $('$cajtxtcom').focus();";
                    }
                }
                $output = '[["' . $cajtxtmos . '","' . $dato1 . '",""],["' . $rif . '","' . $dato2 . '",""],["' . $nomrif . '","' . $dato3 . '",""],["' . $placa . '","' . $dato4 . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '22':
                $javascript = "";
                $dato1 = "";
                $cajtexmos = $this->getRequestParameter('cajtexmos');
                if ($codigo != "") {
                    $c = new Criteria();
                    $c->add(BnubicaPeer::CODUBI, $codigo);
                    $result = BnubicaPeer::doSelectOne($c);
                    if ($result) {
                        $dato1 = $result->getDesubi();
                    } else {
                        $javascript = "alert('La Unidad no existe'); $('fafactur_codubi').value=''; $('fafactur_codubi').focus();";
                    }
                }
                $output = '[["' . $cajtexmos . '","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '23':
                $javascript = "";
                $dato1 = "";
                $cajtexmos = $this->getRequestParameter('cajtxtmos');
                $cajtexcom = $this->getRequestParameter('cajtxtcom');
                if ($codigo != "") {
                    $c = new Criteria();
                    $c->add(FadefproPeer::CODPROD, $codigo);
                    $result = FadefproPeer::doSelectOne($c);
                    if ($result) {
                        $dato1 = $result->getDesprod();
                    } else {
                        $javascript = "alert('El Producto no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                    }
                }
                $output = '[["' . $cajtexmos . '","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '24':
                $this->ajaxs = '17';
                $this->fafactur = $this->getFafacturOrCreate();
                $this->configGridDescFac($codigo, 'PROFORMA');
                $output = '[["","",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '25':
                $this->ajaxs = '18';
                $this->fafactur = $this->getFafacturOrCreate();
                $this->configGridRgoArt($codigo, 'PROFORMA');
                $output = '[["","",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '26':
                $dato1 = H::getX('Codcenaco', 'Cadefcenaco', 'descenaco', $codigo);
                $output = '[["' . $cajtexmos . '","' . $dato1 . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '27':
                $this->ajaxs = '18';
                $this->fafactur = $this->getFafacturOrCreate();
                $reffac = $this->getRequestParameter('reffac');
                $codart = $this->getRequestParameter('codart');
                $this->configGridRgoArt($reffac, '', $codart);
                $output = '[["","",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '28':
                $this->ajaxs = '17';
                $this->fafactur = $this->getFafacturOrCreate();
                $reffac = $this->getRequestParameter('reffac');
                $codart = $this->getRequestParameter('codart');
                $this->configGridDescFac($reffac, '', $codart);
                $output = '[["","",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '29':
                $tipcli = $this->getRequestParameter('tipcte', '');
                $codart = $this->getRequestParameter('codart', '');
                $fila = $this->getRequestParameter('fila', '');
                $ida = $this->getRequestParameter('ida', '');
                Facturav2::mostrarDescuentosArticulos($tipcli, $codart, &$arreglodesc);
                if ($arreglodesc != "") $javascript = $javascript . "colocarDescuentogrid('$arreglodesc','$fila','$ida'); ";
                $output = '[["javascript","' . $javascript . '",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '30':
                $javascript = "";
                $dato1 = "";
                $cajtexmos = $this->getRequestParameter('cajtexmos');
                if ($codigo != "") {
                    $c = new Criteria();
                    $c->add(FaconsignatarioPeer::CODCON, $codigo);
                    $result = FaconsignatarioPeer::doSelectOne($c);
                    if ($result) {
                        $dato1 = $result->getNomcon();
                    } else {
                        $javascript = "alert('El Consignatario no existe'); $('fafactur_codcon').value=''; $('$cajtexmos').value=''; $('fafactur_codcon').focus();";
                    }
                }
                $output = '[["' . $cajtexmos . '","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '31':
                $javascript = "";
                $dato1 = "";
                $cajtexmos = $this->getRequestParameter('cajtexmos');
                if ($codigo != "") {
                    $c = new Criteria();
                    $c->add(FatipbuqPeer::CODBUQ, $codigo);
                    $result = FatipbuqPeer::doSelectOne($c);
                    if ($result) {
                        $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getNombuq());
                    } else {
                        $javascript = "alert('El Buque no existe'); $('fafactur_buque').value=''; $('$cajtexmos').value=''; $('fafactur_buque').focus();";
                    }
                }
                $output = '[["' . $cajtexmos . '","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '32':
                $javascript = "";
                $dato1 = "";
                $cajtexmos = $this->getRequestParameter('cajtexmos');
                if ($codigo != "") {
                    $c = new Criteria();
                    $c->add(FatippuePeer::CODPUE, $codigo);
                    $result = FatippuePeer::doSelectOne($c);
                    if ($result) {
                        $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getNompue());
                    } else {
                        $javascript = "alert('El Puerto de Despacho no existe'); $('fafactur_puedph').value=''; $('$cajtexmos').value=''; $('fafactur_puedph').focus();";
                    }
                }
                $output = '[["' . $cajtexmos . '","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '33':
                $javascript = "";
                $dato1 = "";
                $cajtexmos = $this->getRequestParameter('cajtexmos');
                if ($codigo != "") {
                    $c = new Criteria();
                    $c->add(FatippuePeer::CODPUE, $codigo);
                    $result = FatippuePeer::doSelectOne($c);
                    if ($result) {
                        $dato1 = eregi_replace("[\n|\r|\n\r]", "", $result->getNompue());
                    } else {
                        $javascript = "alert('El Puerto de Destino no existe'); $('fafactur_puedes').value=''; $('$cajtexmos').value=''; $('fafactur_puedes').focus();";
                    }
                }
                $output = '[["' . $cajtexmos . '","' . $dato1 . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            default:
                $output = '[["","",""],["","",""],["","",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '34':
                if ($this->getRequestParameter('codigo', '') == 'R') {
                    $c = new Criteria();
                    $c->add(FaclientePeer::RIFPRO, $this->getRequestParameter('cliente', ''));
                    $reg = FaclientePeer::doSelectOne($c);
                    if ($reg) {
                        $limcre = $reg->getLimcre();
                        if ($limcre > 0) {
                            $this->ajaxs = '34';
                            $this->codprg = $this->getRequestParameter('codprg', '');
                            $tipcte = H::getX_vacio('Rifpro', 'Facliente', 'fatipcte_id', $this->getRequestParameter('cliente', ''));
                            $this->cliente = $tipcte;
                            $this->cod = $codigo;
                        } else {
                            $javascript = "alert('El cliente no posee limite de crédito');$('" . $cajtexmos . "').value='';$('" . $cajtexcom . "').value='';";
                            $output = '[["javascript","' . $javascript . '",""]]';
                            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                            
                            return sfView::HEADER_ONLY;
                        }
                    } else {
                        
                        return sfView::HEADER_ONLY;
                    }
                } else {
                    $this->ajaxs = '34';
                    $this->codprg = $this->getRequestParameter('codprg', '');
                    $tipcteid = H::getX_vacio('RIFPRO', 'Facliente', 'Fatipcte_id', $this->getRequestParameter('cliente', ''));
                    $this->cliente = $tipcteid; //$this->getRequestParameter('cliente','');
                    $this->cod = $codigo;
                }
                break;

            case '35':
                $javascript = "";
                $dato01 = "";
                $dato02 = "";
                $dato0 = "";
                $c = new Criteria();
                $c->add(FapedidoPeer::NROPED, $codigo);
                $result = FapedidoPeer::doSelectOne($c);
                if ($result) {
                    $dato0 = $result->getCodprg();
                    $dato01 = $result->getConpagId();
                    $dato02 = $result->getTipref();
                    $tipconpag = H::getX_vacio('ID', 'Faconpag', 'tipconpag', $dato01);
                    if ($tipconpag == 'C') $javascript = $javascript . "$('fafactur_concre_C').checked=true; ";
                    else $javascript = $javascript . "$('fafactur_concre_R').checked=true; ";
                }
                $output = '[["fafactur_codprg","' . $dato0 . '",""],["fafactur_codconpag","' . $dato01 . '",""],["fafactur_tipoped","' . $dato02 . '",""], ["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
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
            $this->coderr = - 1;
            if ($this->getRequest()->getMethod() == sfRequest::POST) {
                $this->fafactur = $this->getFafacturOrCreate();
                try {
                    $this->updateFafacturFromRequest();
                }
                catch(Exception $ex) {
                }
                $this->configGrid();
                $valpermes = H::getConfApp2('valpermes', 'facturacion', 'fafactur');
                if (!$this->fafactur->getId()) {
                    if ($valpermes == 'S') {
                        $dateFormat = new sfDateFormat('es_VE');
                        $fec = $dateFormat->format($this->getRequestParameter('fafactur[fecfac]') , 'i', $dateFormat->getInputPattern('d'));
                        $c = new Criteria();
                        $c->add(FaciemesPeer::FECDES, $fec, Criteria::LESS_EQUAL);
                        $c->add(FaciemesPeer::FECHAS, $fec, Criteria::GREATER_EQUAL);
                        $c->add(FaciemesPeer::STATUS, 'A');
                        $conta1 = FaciemesPeer::doSelectOne($c);
                        if (!$conta1) {
                            $this->coderr = 1163;
                            
                            return false;
                        }
                    }
                }
                if (Tesoreria::validarFechaPerContable($this->getRequestParameter('fafactur[fecfac]'))) {
                    $this->coderr = 521;
                    
                    return false;
                }
                if ($this->getRequestParameter('fafactur[ctasociada]') == 'N') {
                    $this->coderr = 1137;
                    
                    return false;
                }
                $grid4 = Herramientas::CargarDatosGridv2($this, $this->obj4);
                $grid = Herramientas::CargarDatosGridv2($this, $this->obj1);
                if (count($grid[0]) == 0) {
                    $this->coderr = 4;
                    
                    return false;
                }
                if ($this->getRequestParameter('fafactur[tipoped]') != 'PD') {
                    if (Facturav2::PreciosRepetidos($grid)) {
                        $this->coderr = 1136;
                        
                        return false;
                    }
                }
                $grid2 = Herramientas::CargarDatosGridv2($this, $this->obj3);
                if (Facturav2::Verificar_pago($grid2, H::tofloat($this->getRequestParameter('fafactur[monfac]')) , $this->getRequestParameter('fafactur[concre]')) == false) {
                    $this->coderr = 1146;
                    
                    return false;
                }
                $valrgoven = H::getConfApp('valrgoven', 'facturacion', 'fafactur');
                if ($valrgoven == 'S') {
                    if ($this->getRequestParameter('fafactur[tipref]') == 'V') {
                        $recargo = $grid4[0];
                        if (count($recargo) == 0) {
                            $this->coderr = 1160;
                            
                            return false;
                        }
                        
                        foreach ($recargo as $index => $rgo) {
                            if ($rgo->getCodrgo()) {
                                $c = new Criteria();
                                $c->add(FargoartPeer::CODRGO, $rgo->getCodrgo());
                                $rec = FargoartPeer::doSelectOne($c);
                                if (!$rec) {
                                    $this->coderr = 1161;
                                    
                                    return false;
                                }
                            } else {
                                $this->coderr = 1161;
                                
                                return false;
                            }
                        }
                    }
                }
                $x = $grid[0];
                $i = 0;
                $valnumfil = H::getConfApp2('valnumfil', 'facturacion', 'fafactur');
                $numfil = $this->fafactur->getNumfilas();
                if ($valnumfil == 'S') {
                    $p = 1;
                    $pos = 0;
                    $arraux = array();
                    if (count($x) > 0) {
                        $arraux[0]["codart"] = $x[0]->getCodart();
                        
                        while ($p < count($x)) {
                            $pos = Facturav2::Buscar_Arreglo_Art($arraux, $x[$p]->getCodart());
                            if ($pos == 0) {
                                $q = count($arraux) + 1;
                                $arraux[$q - 1]["codart"] = $x[$p]->getCodart();
                            }
                            $p++;
                        }
                    }
                    if (count($arraux) > $numfil) {
                        $this->coderr = 1165;
                        
                        return false;
                    }
                }
                
                while ($i < count($x)) {
                    if ($this->getRequestParameter('fafactur[tipref]') == 'P') {
                        if ($x[$i]->getCodref() == "") {
                            $this->coderr = 1138;
                            
                            return false;
                        }
                    }
                    if ($x[$i]->getCodart() == "") {
                        $this->coderr = 1139;
                        
                        return false;
                    }
                    if ($this->getRequestParameter('fafactur[tipref]') == 'V') {
                        if ($x[$i]->getCansol() == "0,00") {
                            $this->coderr = 1140;
                            
                            return false;
                        }
                    }
                    if ($this->getRequestParameter('fafactur[tipref]') == 'P') {
                        if ($x[$i]->getCanent() == "0,00") {
                            $this->coderr = 1142;
                            
                            return false;
                        }
                    }
                    if ($this->getRequestParameter('fafactur[tipoped]') != 'PD') {
                        if ($x[$i]->getPrecio() == "0,00" && $x[$i]->getPrecioe() == "0,00") {
                            $this->coderr = 1141;
                            
                            return false;
                        }
                    }
                    if ($x[$i]->getHorsal() != "") {
                        if (!H::ValidarHora($x[$i]->getHorsal())) {
                            $this->coderr = 'F002';
                            
                            return false;
                        }
                    }
                    if ($x[$i]->getHorlleg() != "") {
                        if (!H::ValidarHora($x[$i]->getHorlleg())) {
                            $this->coderr = 'F002';
                            
                            return false;
                        }
                    }
                    if ($x[$i]->getHorllca() != "") {
                        if (!H::ValidarHora($x[$i]->getHorllca())) {
                            $this->coderr = 'F002';
                            
                            return false;
                        }
                    }
                    if ($x[$i]->getHordesc() != "") {
                        if (!H::ValidarHora($x[$i]->getHordesc())) {
                            $this->coderr = 'F002';
                            
                            return false;
                        }
                    }
                    $i++;
                }
                $y = $grid2[0];
                $l = 0;
                
                while ($l < count($y)) {
                    if ($this->getRequestParameter('fafactur[tipoped]') != 'PD') {
                        if ($y[$l]->getMonpag() == "0,00" && $this->getRequestParameter('fafactur[tipconpag]') == 'C') {
                            $this->coderr = 1143;
                            
                            return false;
                        }
                        if ($y[$l]->getTippag() == "" && $this->getRequestParameter('fafactur[tipconpag]') == 'C') {
                            $this->coderr = 1144;
                            
                            return false;
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
                $gencomext = H::getConfApp2('gencomext', 'facturacion', 'fafactur');
                if ($gencomext == 'S' && $this->getRequestParameter('fafactur[tipoped]') != 'PD') {
                    if (self::validarGeneraComprobante()) {
                        $this->coderr = 508;
                    }
                }
                if ($this->coderr != - 1) {
                    
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
            $con = Propel::getConnection(FafacturPeer::DATABASE_NAME);
            try {
                $con->begin();
                if ($fafactur->getId()) {
                    $fafactur->save();
                    $grid = Herramientas::CargarDatosGridv2($this, $this->obj1);
                    $x = $grid[0];
                    $j = 0;
                    
                    while ($j < count($x)) {
                        $y = new Criteria();
                        $y->add(FaartfacPeer::REFFAC, $fafactur->getReffac());
                        $y->add(FaartfacPeer::CODART, $x[$j]->getCodart());
                        $result = FaartfacPeer::doSelectOne($y);
                        if ($result) {
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
                            $result->save();
                        }
                        $j++;
                    }
                    $usalib = H::getConfApp('gridfaclib', 'facturacion', 'fafactur');
                    $grid6 = Herramientas::CargarDatosGridv2($this, $this->obj6);
                    if ($usalib == 'S') {
                        Facturav2::grabarFacturaLibro($fafactur, $grid6);
                    }
                    $con->commit();
                    
                    return -1;
                } else {
                    $tipocaja = $this->getUser()->getAttribute('clavecaja', null, 'fafactur');
                    $grid = Herramientas::CargarDatosGridv2($this, $this->obj1);
                    $grid2 = Herramientas::CargarDatosGridv2($this, $this->obj2);
                    $grid3 = Herramientas::CargarDatosGridv2($this, $this->obj3);
                    $grid4 = Herramientas::CargarDatosGridv2($this, $this->obj4);
                    $grid6 = Herramientas::CargarDatosGridv2($this, $this->obj6);
                    $gencomext = H::getConfApp2('gencomext', 'facturacion', 'fafactur');
                    if ($gencomext == 'S') self::GrabarComprobanteExterno(&$fafactur, $grid);
                    Facturav2::salvarFactura($fafactur, $grid, $grid2, $grid3, $grid4, $tipocaja, &$msj, &$msj2, &$msj3, $grid6);
                    if ($msj != - 1) 
                    return $msj;
                    if ($msj3 != - 1) 
                    return $msj3;
                    $con->commit();
                    
                    return -1;
                }
            }
            catch(PropelException $e) {
                $con->rollback();
                throw $e;
            }
        }
        public function GrabarComprobanteExterno($fafactur, $grid) {
            $concom = 1;
            $form = "sf_admin/fafactur/confincomgen";
            $grabo = $this->getUser()->getAttribute('grabo', null, $form . '0');
            $numerocomp = $this->getUser()->getAttribute('contabc[numcom]', null, $form . '0');
            if ($grabo == 'S') {
                $i = 0;
                
                while ($i < $concom) {
                    $formulario[$i] = $form . $i;
                    if ($this->getUser()->getAttribute('grabo', null, $formulario[$i]) == 'S') {
                        $numcom = $this->getUser()->getAttribute('contabc[numcom]', null, $formulario[$i]);
                        $reftra = $this->getUser()->getAttribute('contabc[reftra]', null, $formulario[$i]);
                        $feccom = $this->getUser()->getAttribute('contabc[feccom]', null, $formulario[$i]);
                        $descom = $this->getUser()->getAttribute('contabc[descom]', null, $formulario[$i]);
                        $debito = $this->getUser()->getAttribute('debito', null, $formulario[$i]);
                        $credito = $this->getUser()->getAttribute('credito', null, $formulario[$i]);
                        $grid = $this->getUser()->getAttribute('grid', null, $formulario[$i]);
                        $this->getUser()->getAttributeHolder()->remove('contabc[numcom]', $formulario[$i]);
                        $this->getUser()->getAttributeHolder()->remove('contabc[reftra]', $formulario[$i]);
                        $this->getUser()->getAttributeHolder()->remove('contabc[feccom]', $formulario[$i]);
                        $this->getUser()->getAttributeHolder()->remove('contabc[descom]', $formulario[$i]);
                        $this->getUser()->getAttributeHolder()->remove('debito', $formulario[$i]);
                        $this->getUser()->getAttributeHolder()->remove('credito', $formulario[$i]);
                        $this->getUser()->getAttributeHolder()->remove('grid', $formulario[$i]);
                        $this->numero = Comprobante::SalvarComprobante($numcom, $reftra, $feccom, $descom, $debito, $credito, $grid, $this->getUser()->getAttribute('grabar', null, $formulario[$i]));
                        $fafactur->setNumcom($this->numero);
                    }
                    $i++;
                }
            }
            $this->getUser()->getAttributeHolder()->remove('grabo', $form . '0');
        }
        public function setVars() {
            $this->mascaraarticulo = Herramientas::getMascaraArticulo();
            $this->lonart = strlen($this->mascaraarticulo);
            $this->despnotent = "";
            $this->cambiolog = "";
            $varemp = $this->getUser()->getAttribute('configemp');
            if ($varemp) if (array_key_exists('aplicacion', $varemp)) if (array_key_exists('facturacion', $varemp['aplicacion'])) if (array_key_exists('modulos', $varemp['aplicacion']['facturacion'])) {
                if (array_key_exists('fadesp', $varemp['aplicacion']['facturacion']['modulos'])) {
                    if (array_key_exists('despnotent', $varemp['aplicacion']['facturacion']['modulos']['fadesp'])) {
                        $this->despnotent = $varemp['aplicacion']['facturacion']['modulos']['fadesp']['despnotent'];
                    }
                }
                if (array_key_exists('fafactur', $varemp['aplicacion']['facturacion']['modulos'])) {
                    if (array_key_exists('cambiolog', $varemp['aplicacion']['facturacion']['modulos']['fafactur'])) {
                        $this->cambiolog = $varemp['aplicacion']['facturacion']['modulos']['fafactur']['cambiolog'];
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
            $c->add(FafacturPeer::REFFAC, $reffac);
            $c->add(FafacturPeer::FECFAC, $fec);
            $this->fafactur = FafacturPeer::doSelectOne($c);
            sfView::SUCCESS;
        }
        public function executeSalvaranu() {
            $reffac = $this->getRequestParameter('reffac');
            $motanu = $this->getRequestParameter('motanu');
            $fecanu = $this->getRequestParameter('fecanu');
            $fecha_aux = split("/", $fecanu);
            $dateFormat = new sfDateFormat('es_VE');
            $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
            $this->msg = "";
            $this->mensaje2 = "";
            if (Tesoreria::validaPeriodoCerrado($fecanu) == true) {
                $coderror = 529;
                $this->mensaje2 = Herramientas::obtenerMensajeError($coderror);
                
                return sfView::SUCCESS;
            } else {
                $c = new Criteria();
                $c->add(FafacturPeer::REFFAC, $reffac);
                $resul = FafacturPeer::doSelectOne($c);
                if ($resul) {
                    if ($resul->getTipconpag() == 'R') //Pago a Crédito
                    {
                        $c2 = new Criteria();
                        $c2->add(CobdocumePeer::REFDOC, str_pad($resul->getReffac() , 10, '0', STR_PAD_LEFT));
                        $resul2 = CobdocumePeer::doSelectOne($c2);
                        if ($resul2) {
                            if ($resul2->getAbodoc() > 0) {
                                $this->msg = "La Factura no se puede eliminar debido a que el Documento por Cobrar asociado('" . $resul2->getRefdoc() . "') ya ha sido abonado";
                                
                                return sfView::SUCCESS;
                            }
                        }
                    }
                    if (!is_null($resul->getNumcom())) {
                        Facturav2::anularComprobante("C", $resul->getNumcom() , $fec, &$msj);
                        if ($msj != "") {
                            $this->msg = $msj;
                            
                            return sfView::SUCCESS;
                        }
                        if ($resul->getNumcomord() != "") {
                            Facturav2::anularComprobante("O", $resul->getNumcomord() , $fec, &$msj);
                            if ($msj != "") {
                                $this->msg = $msj;
                                
                                return sfView::SUCCESS;
                            }
                        }
                        if ($resul->getNumcominv() != "") {
                            Facturav2::anularComprobante("I", $resul->getNumcominv() , $fec, &$msj);
                            if ($msj != "") {
                                $this->msg = $msj;
                                
                                return sfView::SUCCESS;
                            }
                        }
                    } else {
                        $this->msg = "El Comprobante no será eliminado, ya que se perdió la asociación con Contabilidad";
                        
                        return sfView::SUCCESS;
                    }
                }
                $resul->setFecanu($fec);
                $resul->setMotanu($motanu);
                $resul->setStatus('N');
                $resul->save();
                if ((date(('m') , strtotime($resul->getFecanu())) > date(('m') , strtotime($resul->getFecfac()))) || (date(('Y') , strtotime($resul->getFecanu())) > date(('Y') , strtotime($resul->getFecfac())))) {
                    Facturav2::generarNotaCredito($resul->getReffac() , $fec, $resul->getMonfac());
                }
                Facturav2::anularCxC(str_pad($resul->getReffac() , 10, '0', STR_PAD_LEFT) , $fec, $motanu);
                Facturav2::devolverArticulosExist($resul->getReffac());
            }
            
            return sfView::SUCCESS;
        }

        

        protected function deleting($fafactur) {
            if($fafactur->getStatus()=='A'){

                if(!$fafactur->Despachada()){

                    if(!$fafactur->Ajustada()){
                        
                        Facturav2::EliminarFactura($fafactur);
                        return -1;
                    }else return 1183;
                }else return 1182;
            }else{
                return 1184;
            }
        }

        
        /**
         * Actualiza la informacion que viene de la vista
         * luego de un get/post en el objeto principal del modelo base del formulario.
         *
         */
        protected function updateError() {
            $this->configGrid();
            $grid = Herramientas::CargarDatosGridv2($this, $this->obj1);
            $grid3 = Herramientas::CargarDatosGridv2($this, $this->obj2);
            $grid2 = Herramientas::CargarDatosGridv2($this, $this->obj3);
            $grid4 = Herramientas::CargarDatosGridv2($this, $this->obj4);
            $grid6 = Herramientas::CargarDatosGridv2($this, $this->obj6);
            
            return true;
        }
        public function executeAjaxfila() {
            $name = $this->getRequestParameter('grid', 'a');
            $grid = $this->getRequestParameter('grid' . $name, '');
            $fila = $this->getRequestParameter('fila', '');
            $col = $this->getRequestParameter('columna', '');
            $javascript = "";
            $jsonextra = "";
            $grid_result = array();
            
            switch ($col) {
                case '7':
                    $codalmusu = $this->getRequestParameter('fafactur_codalmusu', '');
                    $exiact = CaregartPeer::getExistencia($grid[$fila][2], $codalmusu);
                    if (H::tofloat($grid[$fila][6]) > $exiact) {
                        $jsonextra = ',["javascript","alert(\'No hay Existencia en el Almacen  ' . $codalmusu . ' para el artículo ' . $grid[$fila][2] . ' (actual=' . $exiact . ')\');",""]';
                        $grid_result = array(
                            $fila => array(
                                6 => '0,0',
                                12 => '0,0'
                            )
                        );
                        $grid[$fila][6] = '0,0';
                        $grid[$fila][12] = '0,0';
                    }
                    break;

                default:
                    break;
            }
            $output = Herramientas::grid_to_json($grid_result, $name, $jsonextra);
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            
            return sfView::HEADER_ONLY;
        }
        /**
         * Función para procesar _todas_ las funciones Ajax del formulario
         * Cada función esta identificada con el valor de la vista "ajax"
         * el cual traerá el indice de lo que se quiere procesar.
         *
         */
        public function executeAjaxgrid() {
            $name = $this->getRequestParameter('grid', 'a');
            $grid = $this->getRequestParameter('grid' . $name, '');
            $fila = $this->getRequestParameter('fila', '');
            $col = $this->getRequestParameter('columna', '');
            $javascript = "";
            $jsonextra = "";
            
            switch ($col) {
                case '25':
                    if (!Hacienda::Repetido($grid, $grid[$fila][$col - 1], $fila, $col - 1)) {
                        $t = new Criteria();
                        $t->add(FaartfacPeer::NRONOT, $grid[$fila][$col - 1]);
                        $reg = FaartfacPeer::doSelectOne($t);
                        if ($reg) {
                            $status = H::getX_vacio('REFFAC', 'Fafactur', 'Status', $reg->getReffac());
                            $p = new Criteria();
                            $p->add(FaajustePeer::CODREF, $reg->getReffac());
                            $resut = FaajustePeer::doSelectOne($p);
                            if ($status == 'A' && (!$resut)) {
                                $grid[$fila][$col - 1] = "";
                                $javascript = "alert('El Número de Entrega ya esta asociado a la factura " . $reg->getReffac() . "');";
                            }
                        }
                    } else {
                        $grid[$fila][$col - 1] = "";
                        $javascript = "alert('El Número de Entrega esta Repetido');";
                    }
                    $jsonextra = ',["javascript","' . $javascript . '",""]';
                    break;

                case '28':
                    if (!Hacienda::Repetido($grid, $grid[$fila][$col - 1], $fila, $col - 1)) {
                        $t = new Criteria();
                        $t->add(FaartfacPeer::GUIA, $grid[$fila][$col - 1]);
                        $reg = FaartfacPeer::doSelectOne($t);
                        if ($reg) {
                            $status = H::getX_vacio('REFFAC', 'Fafactur', 'Status', $reg->getReffac());
                            $p = new Criteria();
                            $p->add(FaajustePeer::CODREF, $reg->getReffac());
                            $resut = FaajustePeer::doSelectOne($p);
                            if ($status == 'A' && (!$resut)) {
                                $grid[$fila][$col - 1] = "";
                                $javascript = "alert('El Número de Guía de Trasporte ya esta asociado a la factura " . $reg->getReffac() . "');";
                            }
                        }
                    } else {
                        $grid[$fila][$col - 1] = "";
                        $javascript = "alert('El Número de Guía de Trasporte esta Repetido');";
                    }
                    $jsonextra = ',["javascript","' . $javascript . '",""]';
                    break;

                case '30':
                    $t = new Criteria();
                    $t->add(FaartfacPeer::BL, $grid[$fila][$col - 1]);
                    $reg = FaartfacPeer::doSelectOne($t);
                    if ($reg) {
                        $status = H::getX_vacio('REFFAC', 'Faartfac', 'Status', $reg->getReffac());
                        $p = new Criteria();
                        $p->add(FaajustePeer::CODREF, $reg->getReffac());
                        $resut = FaajustePeer::doSelectOne($p);
                        if ($status == 'A' && (!$resut)) {
                            $grid[$fila][$col - 1] = "";
                            $javascript = "alert('El Número BL ya esta asociado a la factura " . $reg->getReffac() . "');";
                        }
                    }
                    $jsonextra = ',["javascript","' . $javascript . '",""]';
                    break;

                default:
                    break;
            }
            $output = Herramientas::grid_to_json($grid, $name, $jsonextra);
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
            
            return sfView::HEADER_ONLY;
        }
        /**
         * Función para manejar los filtros de búsqueda
         * de la lista
         *
         */
        protected function addFiltersCriteria($c) {
            if (isset($this->filters['reffac_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['reffac']) && $this->filters['reffac'] !== '') {
                $c->add(FafacturPeer::REFFAC, strtr("%" . $this->filters['reffac'] . "%", '*', '%') , Criteria::LIKE);
                $c->setIgnoreCase(true);
            }
            if (isset($this->filters['fecfac_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::FECFAC, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::FECFAC, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['fecfac'])) {
                if (isset($this->filters['fecfac']['from']) && $this->filters['fecfac']['from'] !== '') {
                    $criterion = $c->getNewCriterion(FafacturPeer::FECFAC, date('Y-m-d', $this->filters['fecfac']['from']) , Criteria::GREATER_EQUAL);
                }
                if (isset($this->filters['fecfac']['to']) && $this->filters['fecfac']['to'] !== '') {
                    if (isset($criterion)) {
                        $criterion->addAnd($c->getNewCriterion(FafacturPeer::FECFAC, date('Y-m-d', $this->filters['fecfac']['to']) , Criteria::LESS_EQUAL));
                    } else {
                        $criterion = $c->getNewCriterion(FafacturPeer::FECFAC, date('Y-m-d', $this->filters['fecfac']['to']) , Criteria::LESS_EQUAL);
                    }
                }
                if (isset($criterion)) {
                    $c->add($criterion);
                }
            }
            if (isset($this->filters['codcli_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::CODCLI, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::CODCLI, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['codcli']) && $this->filters['codcli'] !== '') {
                $c->add(FafacturPeer::CODCLI, strtr("%" . $this->filters['codcli'] . "%", '*', '%') , Criteria::LIKE);
                $c->setIgnoreCase(true);
            }
            if (isset($this->filters['guia_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['guia']) && $this->filters['guia'] !== '') {
                $c->add(FaartfacPeer::GUIA, $this->filters['guia']);
                $c->addJoin(FafacturPeer::REFFAC, FaartfacPeer::REFFAC);
                $c->setIgnoreCase(true);
            }
            if (isset($this->filters['nronot_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['nronot']) && $this->filters['nronot'] !== '') {
                $c->add(FaartfacPeer::NRONOT, $this->filters['nronot']);
                $c->addJoin(FafacturPeer::REFFAC, FaartfacPeer::REFFAC);
                $c->setIgnoreCase(true);
            }
            if (isset($this->filters['notentdig_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['notentdig']) && $this->filters['notentdig'] !== '') {
                $c->add(FaartfacPeer::NOTENTDIG, $this->filters['notentdig']);
                $c->addJoin(FafacturPeer::REFFAC, FaartfacPeer::REFFAC);
                $c->setIgnoreCase(true);
            }
            if (isset($this->filters['contenedores_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['contenedores']) && $this->filters['contenedores'] !== '') {
                $c->add(FaartfacPeer::CONTENEDORES, $this->filters['contenedores']);
                $c->addJoin(FafacturPeer::REFFAC, FaartfacPeer::REFFAC);
                $c->setIgnoreCase(true);
            }
            if (isset($this->filters['billleading_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['billleading']) && $this->filters['billleading'] !== '') {
                $c->add(FaartfacPeer::BILLLEADING, $this->filters['billleading']);
                $c->addJoin(FafacturPeer::REFFAC, FaartfacPeer::REFFAC);
                $c->setIgnoreCase(true);
            }
            if (isset($this->filters['codref_is_empty'])) {
                $criterion = $c->getNewCriterion(FafacturPeer::REFFAC, '');
                $criterion->addOr($c->getNewCriterion(FafacturPeer::REFFAC, null, Criteria::ISNULL));
                $c->add($criterion);
            } else if (isset($this->filters['codref']) && $this->filters['codref'] !== '') {
                $c->add(FaartfacPeer::CODREF, strtr("%" . $this->filters['codref'] . "%", '*', '%') , Criteria::LIKE);
                $c->addJoin(FafacturPeer::REFFAC, FaartfacPeer::REFFAC);
                $c->setIgnoreCase(true);
            }
        }
        /**
         * Función para procesar _todas_ las funciones Ajax del formulario
         * Cada función esta identificada con el valor de la vista "ajax"
         * el cual traerá el indice de lo que se quiere procesar.
         *
         */
        public function executeAjaxcomprobante() {
            $this->fafactur = $this->getFafacturOrCreate();
            $this->updateFafacturFromRequest();
            $this->editing();
            $detalle = Herramientas::CargarDatosGridv2($this, $this->obj1);
            $grid2 = Herramientas::CargarDatosGridv2($this, $this->obj2);
            $grid3 = Herramientas::CargarDatosGridv2($this, $this->obj3);
            $grid4 = Herramientas::CargarDatosGridv2($this, $this->obj4);
            $concom = 0;
            $mensaje1 = "";
            $msj1 = "";
            $msj2 = "";
            $mensajeuno = "";
            $msjuno = "";
            $msjdos = "";
            $msjtres = "";
            $comprobante = "";
            $this->mensajeuno = "";
            $this->msj1 = "";
            $this->msj2 = "";
            $this->mensaje1 = "";
            $this->msjuno = "";
            $this->msjdos = "";
            $this->msjtres = "";
            $this->i = "";
            $this->formulario = array();
            if ($this->fafactur->getRifpro() == "" || $this->fafactur->getCodconpag() == "" || count($detalle[0]) == 0) {
                $this->msjtres = "No se puede Generar el Comprobante, Verique si introdujo los Datos del Cliente,  la Condición de Pago y el Detalle de Artículos, para luego generar el comprobante";
            } else {
                if ($this->fafactur->getRifpro() == "" || $this->fafactur->getCodconpag() == "") {
                    $this->msjtres = "No se puede Generar el Comprobante, Verique si introdujo los Datos del Cliente y la Condición de Pago, para luego generar el comprobante";
                }
            }
            if ($this->msjtres == "") {
                $x = Facturav2::generarComprobanteExterno($this->fafactur, $detalle, $grid2, $grid3, $grid4, &$comprobante, &$msjuno);
                if ($msjuno == "") {
                    $concom = $concom + 1;
                    $form = "sf_admin/fafactur/confincomgen";
                    $i = 0;
                    
                    while ($i < $concom) {
                        $f[$i] = $form . $i;
                        $this->getUser()->setAttribute('grabar', $comprobante[$i]->getGrabar() , $f[$i]);
                        $this->getUser()->setAttribute('reftra', $comprobante[$i]->getReftra() , $f[$i]);
                        $this->getUser()->setAttribute('numcomp', $comprobante[$i]->getNumcom() , $f[$i]);
                        $this->getUser()->setAttribute('fectra', $comprobante[$i]->getFectra() , $f[$i]);
                        $this->getUser()->setAttribute('destra', $comprobante[$i]->getDestra() , $f[$i]);
                        $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas() , $f[$i]);
                        $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc() , $f[$i]);
                        $this->getUser()->setAttribute('tipmov', '');
                        $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov() , $f[$i]);
                        $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos() , $f[$i]);
                        $i++;
                    }
                    $this->i = $concom - 1;
                    $this->formulario = $f;
                } else {
                    $this->msjtres = $msjuno;
                }
            }
            $output = '[["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        }
        public function validarGeneraComprobante() {
            $form = "sf_admin/fafactur/confincomgen";
            $grabo = $this->getUser()->getAttribute('grabo', null, $form . '0');
            if ($grabo == '') {
                
                return true;
            } else {
                
                return false;
            }
        }
        /**
         * Función para incluir funcionalidades adicionales en el executeList.
         * Esta funcion debe ser reescrita en la clase que hereda.
         *
         */
        protected function listing() {
            $this->c = new Criteria();
            $almacenes = $this->getUser()->getAttribute('usualms', array());
            $arr_or = array();
            if (count($almacenes) > 0) {
                
                foreach ($almacenes as $cod => $alm) {
                    $arr_or[] = FafacturPeer::CODALMUSU . "='$cod'";
                }
                $this->c->addOr(FafacturPeer::CODALMUSU, '(' . implode(' OR ', $arr_or) . ')', Criteria::CUSTOM);
            } else {
                $this->c->add(FafacturPeer::CODALMUSU, null);
                $this->getRequest()->setError('error', 'El usuario no tiene almacenes asociados');
            }
        }
    }
    