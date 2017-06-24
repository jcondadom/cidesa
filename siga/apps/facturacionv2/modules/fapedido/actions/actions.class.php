<?php
/**
 * fapedido actions.
 *
 * @package    Roraima
 * @subpackage fapedido
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 45339 2011-07-28 16:09:50Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

class fapedidoActions extends autofapedidoActions {
    private $coderror = - 1;
    private $coderror1 = - 1;
    private $coderror2 = - 1;
    private $coderror3 = - 1;
    private $coderror4 = - 1;
    private $coderror5 = - 1;
    private $coderror6 = - 1;
    private $coderror7 = - 1;
    private $coderror8 = - 1;
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
        /*if ($this->fapedido->getId()=="")
        {$c= new Criteria();
        $reg=FacorrelatPeer::doSelectOne($c);
        if ($reg)
        {
        $numero=str_pad($reg->getCorped(), 8, '0', STR_PAD_LEFT);
        }else { $numero="";}
        
        $this->fapedido->setNroped($numero);
        }*/
        $entrega = Facturacionv2::entregas($this->fapedido->getNroped());
        $this->fapedido->setEntrega($entrega);
        if ($this->fapedido->getId() != "") {
            if ($this->fapedido->getStatus() == 'N') {
                $fecha = date('d/m/Y', strtotime($this->fapedido->getFecanu()));
                $this->fapedido->setEstatus('Anulado el ' . $fecha);
            } else $this->fapedido->setEstatus('');
        } else $this->fapedido->setEstatus('');
        $this->fapedido->setReapor($this->getUser()->getAttribute('loguse'));
        $this->setVars();
        $this->configGrid();
    }
    /**
     * Esta función permite definir la configuración del grid de datos
     * que contiene el formulario. Esta función debe ser llamada
     * en las acciones, create, edit y handleError para recargar en todo momento
     * los datos del grid.
     *
     */
    public function configGrid() {
        $this->configGridArtPed($this->fapedido->getNroped() , $this->getRequestParameter('fapedido[refped]') , $this->getRequestParameter('fapedido[combo]'));
        $this->configGridFecPed($this->fapedido->getNroped());
    }
    /**
     * Esta función permite definir la configuración del grid de datos
     * que contiene el formulario. Esta función debe ser llamada
     * en las acciones, create, edit y handleError para recargar en todo momento
     * los datos del grid.
     *
     */
    public function configGridArtPed($nroped = '', $refpre = '', $combo = '') {
        if ($refpre != '') {
            $c = new Criteria();
            $c->add(FadetprePeer::REFPRE, $refpre);
            $artped = FadetprePeer::doSelect($c);
        } else if ($combo != "") {
            $c = new Criteria();
            $c->add(FaartcomPeer::CODCOM, $combo);
            $artped = FaartcomPeer::doSelect($c);
        } else {
            $c = new Criteria();
            $c->add(FaartpedPeer::NROPED, $nroped);
            $artped = FaartpedPeer::doSelect($c);
        }
        $this->fil1 = count($artped);
        $mascara = $this->mascaraarticulo;
        $lonarti = $this->lonart;
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/fapedido/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_faartped');
        if ($refpre != '') {
            $this->columnas[0]->setTabla('Fadetpre');
            $this->columnas[1][10]->setNombrecampo('totart2');
        } else if ($combo != '') $this->columnas[0]->setTabla('Faartcom');
        else $this->columnas[0]->setTabla('Faartped');
        $obj = array(
            'codart' => 1,
            'desart' => 2
        );
        $params = array(
            'param1' => $lonarti,
            'param2' => "'+$('fapedido_codprg').value+'",
            'param3' => "'+$('fapedido_tipcte').value+'",
            'param4' => "'+$('fapedido_conpag_id').value+'"
        );
        $this->columnas[0]->setFilas($this->fapedido->getNumfilas());
        $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="' . chr(39) . $lonarti . chr(39) . '" onKeyDown="javascript:return dFilter (event.keyCode, this,' . chr(39) . $mascara . chr(39) . ')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,8);" onBlur="javascript:event.keyCode=13; ajaxarticulos(event,this.id);"');
        $this->columnas[1][0]->setCatalogov2('falisprc', 'sf_admin_edit_form', $obj, 'Falisprc_Fafactur', $params);
        //$this->columnas[1][2]->setHTML(' size="10"');
        //$this->columnas[1][6]->setCombo(FaartpvpPeer::getPrecios());
        $this->columnas[1][6]->setHTML('onChange=Precio(this.id);');
        $this->columnas[1][7]->setHTML('size="10" readonly=true onBlur="ValidarMontoGridv2(this); Preciocaja(this.id);"');
        //$this->columnas[1][10]->setEsTotal(true,'fapedido_monped');
        $oculfildet = H::getConfApp2('oculfildet', 'facturacion', 'fapedido');
        if ($oculfildet == 'S') {
            $this->columnas[1][6]->setOculta(true);
            $this->columnas[1][7]->setHTML('size="10" onBlur="ValidarMontoGridv2(this); Preciocaja(this.id);"');
            $this->columnas[1][8]->setOculta(true);
            $this->columnas[1][9]->setOculta(true);
            $this->columnas[1][12]->setOculta(false);
        }
        $this->obj = $this->columnas[0]->getConfig($artped);
        $this->fapedido->setObj($this->obj);
    }
    /**
     * Esta función permite definir la configuración del grid de datos
     * que contiene el formulario. Esta función debe ser llamada
     * en las acciones, create, edit y handleError para recargar en todo momento
     * los datos del grid.
     *
     */
    public function configGridFecPed($nroped = '') {
        $c = new Criteria();
        $c->add(FafecpedPeer::NROPED, $nroped);
        $fecped = FafecpedPeer::doSelect($c);
        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/fapedido/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_fafecped');
        $this->objfecped = $this->columnas[0]->getConfig($fecped);
        $this->fapedido->setObjfecped($this->objfecped);
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
            case '2':
                $codcli = "";
                $rifcli = "";
                $nomcli = "";
                $nitcli = "";
                $dircli = "";
                $telcli = "";
                $javascript = "";
                if ($codigo != "") {
                    $javascript = "$('fapedido_incluircliente').value='N'; 
                        $('fapedido_conpag_id').disabled=false;
                        $('fapedido_concre_C').checked=false;
                        $('fapedido_concre_C').disabled=false;
                        $('fapedido_concre_R').disabled=false;";
                    $c = new Criteria();
                    $c->add(FaclientePeer::RIFPRO, $codigo);
                    $reg = FaclientePeer::doSelectOne($c);
                    if ($reg) {
                        $this->sql = "CODREC NOT IN (SELECT CODREC FROM FARECPRO WHERE CODPRO='" . $reg->getCodpro() . "')";
                        $a = new Criteria();
                        $a->add(CarecaudPeer::LIMREC, 'S');
                        $a->add(CarecaudPeer::CODTIPREC, $reg->getCodtiprec());
                        $a->add(CarecaudPeer::CODREC, $this->sql, Criteria::CUSTOM);
                        $regi = CarecaudPeer::doSelectOne($a);
                        if (!$regi) {
                            $codcli = $reg->getCodpro();
                            $rifcli = $reg->getRifpro();
                            $nomcli = $reg->getNompro();
                            $nitcli = $reg->getNitpro();
                            $dircli = $reg->getDirpro();
                            $telcli = $reg->getTelpro();
                            if ($reg->getCodcta() == "") {
                                $javascript = "alert('El Cliente no posee Cuenta Contable asociada');";
                            }
                        } else {
                            $javascript = "alert('El Cliente no ha consignado todos los recaudos limitantes');$('fapedido_rifpro').value='';";
                        }
                        $output = '[["fapedido_codcli","' . $codcli . '",""],["fapedido_rifpro","' . $rifcli . '",""],["fapedido_nompro","' . $nomcli . '",""],["fapedido_nitcli","' . $nitcli . '",""],["fapedido_dircli","' . $dircli . '",""],["fapedido_telcli","' . $telcli . '",""], ["fapedido_codtip","' . $reg->getFatipcteId() . '",""], ["fapedido_tipcte","' . $reg->getFatipcteId() . '",""],["javascript","' . $javascript . '",""]]';
                    } else {
                        $tsql = "TIPCONPAG = 'C'";
                        $m = new Criteria();
                        $m->add(FaconpagPeer::ID, $tsql, Criteria::CUSTOM);
                        $regis = FaconpagPeer::doSelectOne($m);
                        $javascript = $javascript . "if (confirm('El Cliente no Existe. Desea incluirlo en este momento?'))
                                            {
                                                $('fapedido_nompro').readOnly=false;
                                                $('fapedido_telcli').readOnly=false;
                                                $('fapedido_dircli').readOnly=false;
                                                $('fapedido_codcli').value=$('fapedido_rifpro').value;
                                                $('fapedido_incluircliente').value='S';
                                                $('fapedido_nompro').focus();
                                                $('fapedido_nompro').value='';
                                                $('fapedido_telcli').value='';
                                                $('fapedido_dircli').value='';
                                                $('fapedido_tipcte').disabled=false;
                                                $('fapedido_conpag_id').disabled=true;
                                                $('fapedido_concre_C').checked=true;
                                                $('fapedido_concre_C').disabled=true;
                                                $('fapedido_concre_R').disabled=true;
                                            }
                                            else
                                            {
                                                $('fapedido_nompro').readOnly=true;
                                                $('fapedido_telcli').readOnly=true;
                                                $('fapedido_dircli').readOnly=true;
                                                $('fapedido_nompro').value='';
                                                $('fapedido_telcli').value='';
                                                $('fapedido_dircli').value='';
                                                $('fapedido_incluircliente').value='N';
                                                $('fapedido_tipcte').disabled=true;
                                                $('fapedido_conpag_id').disabled=false;
                                                $('fapedido_concre_C').checked=false;
                                                $('fapedido_concre_C').disabled=false;
                                                $('fapedido_concre_R').disabled=false;
                                            }";
                        $output = '[["fapedido_conpag_id","' . $regis->getCodconpag() . '",""], ["javascript","' . $javascript . '",""]]';
                    }
                }
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '3':
                $r = new Criteria();
                $r->add(FalisprcPeer::CODART, $this->getRequestParameter('codigo'));
                $res = FalisprcPeer::doSelectOne($r);
                if ($res) {
                    $c = new Criteria();
                    $c->add(CaregartPeer::CODART, $res->getCodart());
                    $regart = CaregartPeer::doSelectOne($c);
                    if ($regart) {
                        $dato = $regart->getDesart();
                        $porcrgo = 0;
                        $c = new Criteria();
                        $c->add(FarecargPeer::TIPRGO, 'P');
                        $this->sql = "codrgo in (select codrgo from farecart where codart = '" . $regart->getCodart() . "')";
                        $c->add(FarecargPeer::CODRGO, $this->sql, Criteria::CUSTOM);
                        $reg = FarecargPeer::doSelect($c);
                        if ($reg) {
                            
                            foreach ($reg as $sum) {
                                $porcrgo+= $sum->getMonrgo();
                            }
                        }
                        $porrgo = number_format($porcrgo, 2, ',', '.');
                        $codunimed = $regart->getCodunimed();
                        $desunimed = $regart->getDesunimed();
                        $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $this->getRequestParameter('porrgo') . '","' . $porrgo . '",""],["' . $this->getRequestParameter('codunimed') . '","' . $codunimed . '",""],["' . $this->getRequestParameter('desunimed') . '","' . $desunimed . '",""]]';
                    } else {
                        $javascript = "alert('Articulo no existe');$('" . $cajtexmos . "').value='';$('" . $cajtexcom . "').value='';";
                        $output = '[["javascript","' . $javascript . '",""]]';
                    }
                    //$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
                    //return sfView::HEADER_ONLY;
                    
                } else {
                    $javascript = "alert('Articulo no existe en la lista de precios');$('" . $cajtexmos . "').value='';$('" . $cajtexcom . "').value='';";
                    $output = '[["javascript","' . $javascript . '",""]]';
                }
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '4':
                $this->ajaxs = '';
                $this->combo = '';
                $this->fapedido = $this->getFapedidoOrCreate();
                $c = new Criteria();
                $c->add(FapedidoPeer::REFPED, $this->getRequestParameter('codigo'));
                $data = FapedidoPeer::doSelectOne($c);
                if (!$data) {
                    if ($this->getRequestParameter('docref') == 'PR') {
                        $a = new Criteria();
                        $a->add(FapresupPeer::REFPRE, $this->getRequestParameter('codigo'));
                        $reg = FapresupPeer::doSelectOne($a);
                        if ($reg) {
                            $codcli = $reg->getCodcli();
                            $desped = $reg->getDespre();
                            $codprg = $reg->getCodprg();
                            $conpagid = $reg->getFaconpagId();
                            $d = new Criteria();
                            $d->add(FaclientePeer::CODPRO, $codcli);
                            $regi = FaclientePeer::doSelectOne($d);
                            if ($regi) {
                                $rifcli = $regi->getRifpro();
                                $nomcli = $regi->getNompro();
                                $nitcli = $regi->getNitpro();
                                $dircli = $regi->getDirpro();
                                $telcli = $regi->getTelpro();
                                $cuenta_contable = $regi->getCodcta();
                                $tipcte = $regi->getFatipcte()->getNomtipcte();
                                $javascript = "$('fapedido_rifpro').readonly=true; $$('.botoncat')[1].disabled=true;";
                                if ($cuenta_contable == "") {
                                    $javascript = $javascript . "alert('El Cliente no posee Cuenta Contable asociada');";
                                }
                                $this->configGridArtPed('', $reg->getRefpre() , '');
                            } else {
                                $rifcli = "";
                                $nomcli = "";
                                $nitcli = "";
                                $dircli = "";
                                $telcli = "";
                                $cuenta_contable = "";
                                $javascript = "";
                            }
                        } else {
                            $codcli = "";
                            $desped = "";
                            $rifcli = "";
                            $nomcli = "";
                            $nitcli = "";
                            $dircli = "";
                            $telcli = "";
                            $cuenta_contable = "";
                            $this->configGridArtPed();
                            $javascript = "alert('El Presupuesto no se encuentra Registrado'); $('fapedido_refped').value=''";
                        }
                    }
                } else {
                    $codcli = "";
                    $desped = "";
                    $rifcli = "";
                    $nomcli = "";
                    $nitcli = "";
                    $dircli = "";
                    $telcli = "";
                    $cuenta_contable = "";
                    $this->configGridArtPed();
                    $javascript = "alert('El Presupuesto ya posee un Pedido'); $('fapedido_refped').value=''";
                }
                $output = '[["fapedido_codcli","' . $codcli . '",""],["fapedido_rifpro","' . $rifcli . '",""],["fapedido_nompro","' . $nomcli . '",""],["fapedido_nitcli","' . $nitcli . '",""],["fapedido_dircli","' . $dircli . '",""],["fapedido_telcli","' . $telcli . '",""],["fapedido_desped","' . $desped . '",""],["fapedido_com","' . $this->combo . '",""],["fapedido_fil","' . $this->fil1 . '",""],["fapedido_codprg","' . $codprg . '",""], ["fapedido_conpag_id","' . $conpagid . '",""],["fapedido_tipcte","' . $tipcte . '",""],["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '5':
                $this->ajaxs = '5';
                $this->precios;
                $javascript = "";
                $codprg=$this->getRequestParameter('codprg');
                $tipcte=$this->getRequestParameter('tipcte');
                $conpag_id=$this->getRequestParameter('conpag_id');
                $fecemi = $this->getRequestParameter('fecemi');
                $dateFormat = new sfDateFormat('es_VE');
                $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));
                $this->precios = FalisprcPeer::getPreciosv2($codigo, $codprg, $tipcte, $conpag_id);
                $output = '[["javascript","' . $javascript . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '6':
                $dateFormat = new sfDateFormat('es_VE');
                $fecha = $dateFormat->format($this->getRequestParameter('codigo') , 'i', $dateFormat->getInputPattern('d'));
                $c = new Criteria();
                $c->add(FapedidoPeer::NROPED, $this->getRequestParameter('nroped'));
                $data = FapedidoPeer::doSelectOne($c);
                if ($data) {
                    if ($fecha < $data->getFecped()) {
                        $msj = "alert_('La Fecha de Anulaci&oacute;n no puede ser menor a la fecha del Pedido'); $('fapedido_fecanu').value=''";
                    } else {
                        $msj = "";
                    }
                } else {
                    $msj = "";
                }
                $output = '[["javascript","' . $msj . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                
                return sfView::HEADER_ONLY;
                break;

            case '7':
                $this->ajaxs = '';
                $this->combo = '1';
                $msj = "";
                $this->fapedido = $this->getFapedidoOrCreate();
                $this->configGridArtPed('', '', $this->getRequestParameter('codcom'));
                $output = '[["fapedido_com","' . $this->combo . '",""],["fapedido_fil","' . $this->fil1 . '",""],["javascript","' . $msj . '",""]]';
                $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
                break;

            case '8':
                $c = new Criteria();
                $c->add(FaclientePeer::FATIPCTE_ID, $codigo);
                $reg = FaclientePeer::doSelectOne($c);
                if (!$reg) {
                    $tipcte = $reg->getFatipcteId();
                }
                break;

            case '9':
                if ($this->getRequestParameter('codigo', '') == 'R') {
                    $c = new Criteria();
                    $c->add(FaclientePeer::RIFPRO, $this->getRequestParameter('cliente', ''));
                    $reg = FaclientePeer::doSelectOne($c);
                    if ($reg) {
                        $limcre = $reg->getLimcre();
                        if ($limcre > 0) {
                            $this->ajaxs = '9';
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
                    $this->ajaxs = '9';
                    $this->codprg = $this->getRequestParameter('codprg', '');
                    $tipcteid = H::getX_vacio('RIFPRO', 'Facliente', 'Fatipcte_id', $this->getRequestParameter('cliente', ''));
                    $this->cliente = $tipcteid; //$this->getRequestParameter('cliente','');
                    $this->cod = $codigo;
                }
                break;

            case '10':
                $this->configGridArtPed();
                break;
        }
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
            case '3':
                $codalmusu = $this->getRequestParameter('fapedido_codalmusu', '');
                $exiact = CaregartPeer::getExistencia($grid[$fila][0], $codalmusu);
                if (H::tofloat($grid[$fila][2]) > $exiact) {
                    $jsonextra = ',["javascript","alert(\'No hay Existencia en el Almacen  ' . $codalmusu . ' para el artículo ' . $grid[$fila][0] . ' (actual=' . $exiact . ')\');",""]';
                    $grid_result = array(
                        $fila => array(
                            2 => '0,0',
                            5 => '0,0',
                            10 => '0,0'
                        )
                    );
                }
                break;

            default:
                break;
        }
        $output = Herramientas::grid_to_json($grid_result, $name, $jsonextra);
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        
        return sfView::HEADER_ONLY;
    }
    public function executeAutocomplete() {
        if ($this->getRequestParameter('ajax') == '1') {
            $this->tags = Herramientas::autocompleteAjax('CODCOM', 'Fadefcom', 'codcom', $this->getRequestParameter('fapedido[combo]'));
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
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            $this->fapedido = $this->getFapedidoOrCreate();
            try {
                $this->updateFapedidoFromRequest();
            }
            catch(Exception $ex) {
            }
            $this->configGrid();
            //      if ($this->getRequestParameter('fapedido[tipref]')=='PR')
            //      {
            //        if ($this->getRequestParameter('fapedido[refped]')=='')
            //        {
            //         $this->coderror=1104;
            //         return false;
            //        }
            //      }
            if (Tesoreria::validarFechaPerContable($this->getRequestParameter('fapedido[fecped]'))) {
                $this->coderror6 = 521;
                
                return false;
            }
            if ($this->getRequestParameter('fapedido[codcli]') == '') {
                $this->coderror7 = 1111;
                
                return false;
            }
            if (H::toFloat($this->getRequestParameter('fapedido[monped]')) == 0) {
                $this->coderror8 = 1155;
                
                return false;
            }
            $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
            $x = $grid[0];
            $i = 0;
            if (count($x) > 0) {
                $valnumfil = H::getConfApp2('valnumfil', 'facturacion', 'fafactur');
                $numfil = $this->fapedido->getNumfilas();
                if ($valnumfil == 'S') {
                    if (count($x) > $numfil) {
                        $this->coderror1 = 1165;
                        
                        return false;
                    }
                }
                
                while ($i < count($x)) {
                    if ($x[$i]->getCodart() == "") {
                        $this->coderror1 = 1105;
                        
                        return false;
                    }
                    if ($x[$i]->getCanord() == 0) {
                        $this->coderror2 = 1106;
                        
                        return false;
                    }
                    if(H::getConfApp2('usualms','autenticacion','login')=='S'){
                      $existencia = CaregartPeer::getExistencia($x[$i]->getCodart(), $this->fapedido->getCodalmusu());
                      if($existencia<$x[$i]->getCanord()) {
                          $this->coderror2 = 1119;  
                          return false;
                      }
                    }
                    
                    if ($x[$i]->getPreart() == 0) {
                        if ($x[$i]->getPrecioe() == 0) {
                            $this->coderror3 = 1107;
                            
                            return false;
                        }
                    }
                    if ($x[$i]->getTotart() == 0) {
                        $this->coderror2 = 1106;
                        
                        return false;
                    }
                    $i++;
                }
            } else {
                $this->coderror4 = 1108;
                
                return false;
            }
            $grid2 = Herramientas::CargarDatosGridv2($this, $this->objfecped);
            $y = $grid2[0];
            $l = 0;
            if (count($y) > 0) {
                
                while ($l < count($y)) {
                    if ($y[$l]->getFecent() == "") {
                        $this->coderror6 = 1110;
                        
                        return false;
                    }
                    $l++;
                }
            } else {
                $this->coderror5 = 1109;
                
                return false;
            }
            
            return true;
        } else 
        return true;
    }
    protected function saving($fapedido) {
        if ($fapedido->getId()) {
            $fapedido->save();
        } else {
            if ($this->getRequestParameter('fapedido[incluircliente]') == 'S') {
                $facliente = new Facliente();
                $facliente->setCodpro($this->getRequestParameter('fapedido[rifpro]'));
                $facliente->setRifpro($this->getRequestParameter('fapedido[rifpro]'));
                $facliente->setNompro($this->getRequestParameter('fapedido[nompro]'));
                $facliente->setFatipcteId($this->getRequestParameter('fapedido[tipcte]'));
                if ($this->getRequestParameter('fapedido[telcli]') != "") $facliente->setTelpro($this->getRequestParameter('fapedido[telcli]'));
                if ($this->getRequestParameter('fapedido[dircli]') != "") $facliente->setDirpro($this->getRequestParameter('fapedido[dircli]'));
                $facliente->save();
            }
            $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
            $grid2 = Herramientas::CargarDatosGridv2($this, $this->objfecped);
            Facturacionv2::salvarPedidos($fapedido, $grid, $grid2);
        }
        
        return -1;
    }
    protected function deleting($fapedido) {
        if ($fapedido->getStatus() != 'N') {
            $c = new Criteria();;
            $c->add(FaartfacPeer::CODREF, $fapedido->getNroped());
            $faartfac = FaartfacPeer::doSelectOne($c);
            if (!$faartfac) {
                $c = new Criteria();
                $c->add(FaartpedPeer::NROPED, $fapedido->getNroped());
                FaartpedPeer::doDelete($c);
                $c = new Criteria();
                $c->add(FafecpedPeer::NROPED, $fapedido->getNroped());
                FafecpedPeer::doDelete($c);
                $fapedido->delete();
                
                return -1;
            } else 
            return 1178;
        } else 
        return 1112;
    }
    public function setVars() {
        $this->mascaraarticulo = Herramientas::getMascaraArticulo();
        $this->lonart = strlen($this->mascaraarticulo);
    }
    public function executeAnular() {
        $this->referencia = $this->getRequestParameter('referencia');
        $nroped = $this->getRequestParameter('nroped');
        $fecped = $this->getRequestParameter('fecped');
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($fecped, 'i', $dateFormat->getInputPattern('d'));
        $c = new Criteria();
        $c->add(FapedidoPeer::NROPED, $nroped);
        $c->add(FapedidoPeer::FECPED, $fec);
        $this->fapedido = FapedidoPeer::doSelectOne($c);
        sfView::SUCCESS;
    }
    public function executeSalvaranu() {
        $nroped = $this->getRequestParameter('nroped');
        $fecanu = $this->getRequestParameter('fecanu');
        $fecha_aux = split("/", $fecanu);
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
        $this->msg = "";
        $c = new Criteria();
        $c->add(FapedidoPeer::NROPED, $nroped);
        $resul = FapedidoPeer::doSelectOne($c);
        if ($resul) {
            if(!$resul->Faturado()){
                $resul->setFecanu($fec);
                $resul->setStatus('N');
                $resul->save();                
            }else{
                $this->msg = "No se puede anular el pedido ya que está facturado";
                $this->getRequest()->setError('error', 'No se puede anular el pedido ya que está facturado');
            }

        }
        
        return sfView::SUCCESS;
    }
    /**
     * Función para manejar la captura de errores del negocio, tanto que se
     * produzcan por algún validator y por un valor false retornado por el validateEdit
     * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
     *
     */
    public function handleErrorEdit() {
        $this->preExecute();
        $this->params = array();
        $this->fapedido = $this->getFapedidoOrCreate();
        try {
            $this->updateFapedidoFromRequest();
        }
        catch(Exception $ex) {
        }
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
        $grid2 = Herramientas::CargarDatosGridv2($this, $this->objfecped);
        $this->labels = $this->getLabels();
        if ($this->getRequest()->getMethod() == sfRequest::POST) {
            if ($this->coderror != - 1) {
                $err1 = Herramientas::obtenerMensajeError($this->coderror);
                $this->getRequest()->setError('fapedido{refped}', $err1);
            }
            if ($this->coderror1 != - 1) {
                $err = Herramientas::obtenerMensajeError($this->coderror1);
                $this->getRequest()->setError('', $err);
            }
            if ($this->coderror2 != - 1) {
                $err1 = Herramientas::obtenerMensajeError($this->coderror2);
                $this->getRequest()->setError('', $err1);
            }
            if ($this->coderror3 != - 1) {
                $err1 = Herramientas::obtenerMensajeError($this->coderror3);
                $this->getRequest()->setError('', $err1);
            }
            if ($this->coderror4 != - 1) {
                $err1 = Herramientas::obtenerMensajeError($this->coderror4);
                $this->getRequest()->setError('', $err1);
            }
            if ($this->coderror5 != - 1) {
                $err1 = Herramientas::obtenerMensajeError($this->coderror5);
                $this->getRequest()->setError('', $err1);
            }
            if ($this->coderror6 != - 1) {
                $err1 = Herramientas::obtenerMensajeError($this->coderror6);
                $this->getRequest()->setError('', $err1);
            }
            if ($this->coderror7 != - 1) {
                $err1 = Herramientas::obtenerMensajeError($this->coderror7);
                $this->getRequest()->setError('fapedido{rifpro}', $err1);
            }
            if ($this->coderror8 != - 1) {
                $err1 = Herramientas::obtenerMensajeError($this->coderror8);
                $this->getRequest()->setError('fapedido{monped}', $err1);
            }
        }
        
        return sfView::SUCCESS;
    }
    protected function listing() {
        $this->c = new Criteria();
        $almacenes = $this->getUser()->getAttribute('usualms', array());
        if (count($almacenes) > 0) {
            $arr_or = array();
            
            foreach ($almacenes as $cod => $alm) {
                $arr_or[] = FapedidoPeer::CODALMUSU . "='$cod'";
            }
            $this->c->addOr(FapedidoPeer::CODALMUSU, '('.implode(' OR ', $arr_or).')' , Criteria::CUSTOM);
        } else {
            $this->c->add(FapedidoPeer::CODALMUSU, null);
            $this->getRequest()->setError('error', 'El usuario no tiene almacenes asociados');
        }
    }
}
