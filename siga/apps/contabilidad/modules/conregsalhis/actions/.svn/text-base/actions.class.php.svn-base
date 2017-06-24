<?php

/**
 * conregsalhis actions.
 *
 * @package    siga
 * @subpackage conregsalhis
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class conregsalhisActions extends autoconregsalhisActions {

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $this->configGrid($this->contabbhis->getCodcta(), $this->contabbhis->getId());
    }

    public function configGrid($codcta = " ", $nuevo = " ") {
        $res = array();
        $periodos = array();

        if ($nuevo == " ") {
            if ($codcta != " ") {
                $c = new Criteria();
                $c->add(Contabb1Peer::CODCTA, $codcta);
                $c->addAscendingOrderByColumn(Contabb1Peer::PEREJE);
                $res = Contabb1Peer::doSelect($c);

                if ($res) {
                    foreach ($res as $a) {
                        $contabb1his = new Contabb1his();
                        $contabb1his->setPereje($a->getPereje());
                        $contabb1his->setTotdeb(0);
                        $contabb1his->setTotcre(0);
                        $contabb1his->setSalact(0);
                        $contabb1his->setSalprgper(0);
                        $contabb1his->setSalprgperfor(0);
                        $periodos[] = $contabb1his;
                    }
                }
            }
        } else {
            $c = new Criteria();
            $c->add(Contabb1hisPeer::CODCTA, $codcta);
            $c->addAscendingOrderByColumn(Contabb1hisPeer::PEREJE);
            $periodos = Contabb1hisPeer::doSelect($c);
        }

        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/conregsalhis/' . sfConfig::get('sf_app_module_config_dir_name') . '/grid_periodos');
        $this->obj = $this->columnas[0]->getConfig($periodos);
        $params['grid_periodos'] = $this->obj;
        $this->params = $params;
    }

    public function executeAjax() {

        $codigo = $this->getRequestParameter('codigo', '');
        $ajax = $this->getRequestParameter('ajax', '');
        $cajtexmos = $this->getRequestParameter('cajtexmos', '');
        $sw = true;
        $js = "";
        switch ($ajax) {
            case '1':
                $sw = false;
                $descta = "";
                $salant = "";
                $cargab = "";
                $debcre = "";
                $c = new Criteria();
                $c->add(ContabbPeer::CODCTA, $codigo);
                $reg = ContabbPeer::doSelectOne($c);
                if ($reg) {
                    $descta = $reg->getDescta();
                    $salant = $reg->getSalant();
                    $cargab = $reg->getCargab();
                    $debcre = $reg->getDebcre();
                    if ($cargab == 'C') {
                        $js = $js . "$('contabbhis_cargab_C').checked=true;
                                    $('contabbhis_cargab_N').checked=false; 
                                    $('contabbhis_cargab_N').disabled=true;";
                    } else {
                        $js = $js . "$('contabbhis_cargab_N').checked=true;
                                    $('contabbhis_cargab_C').checked=false; 
                                    $('contabbhis_cargab_C').disabled=true;";
                    }

                    if ($debcre == 'D') {
                        $js = $js . "$('contabbhis_debcre_D').checked=true;
                                     $('contabbhis_debcre_C').checked=false;
                                     $('contabbhis_debcre_C').disabled=true;";
                    } else {
                        $js = $js . "$('contabbhis_debcre_C').checked=true;
                                     $('contabbhis_debcre_D').checked=false;
                                     $('contabbhis_debcre_D').disabled=true;";
                    }

                    $js = $js . "$('contabbhis_salant').readOnly=true;";

                    $this->configGrid($codigo);
                } else {
                    $this->configGrid();
                    $js = "alert('El Código de la Cuenta no Existe');
                            $('contabbhis_codcta').value='';
                            $('contabbhis_descta').value='';
                            $('contabbhis_cargab_C').disabled=false;
                            $('contabbhis_cargab_N').disabled=false;
                            $('contabbhis_debcre_D').disabled=false;
                            $('contabbhis_debcre_C').disabled=false;
                            $('contabbhis_salant').readOnly=false;
                            $('contabbhis_codcta').focus();";
                }

                $output = '[["' . $cajtexmos . '","' . $descta . '",""],["contabbhis_salant","' . H::FormatoMonto($salant) . '",""],["javascript","' . $js . '",""],["","",""]]';
                break;
            default:
                $output = '[["","",""],["","",""],["","",""]]';
        }

        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
        if ($sw)
            return sfView::HEADER_ONLY;
    }

    public function executeAjaxgrid() {
        $name = $this->getRequestParameter('grid', 'a');
        $grid = $this->getRequestParameter('grid' . $name, '');
        $fila = $this->getRequestParameter('fila', '');
        $col = $this->getRequestParameter('columna', '');
        $javascript = "";
        $jsonextra = "";
        $grid_result = array();
        $salact = H::toFloat($this->getRequestParameter('contabbhis_salant', ''));
        $codcta = $this->getRequestParameter('contabbhis_codcta', '');
        $debcre=H::getX_vacio('CODCTA','Contabb','Debcre',$codcta);
        $salper = 0.0;

        switch ($col) {
            case '2':
                $debito = H::toFloat($grid[$fila][1]);
                $credito = H::toFloat($grid[$fila][2]);                
                if ($debcre=='D'){
                  $saldo= $debito-$credito;
                }else {
                  $saldo= $credito-$debito;
                }
                if ($fila == '0') {
                    $salact += $saldo;
                    $salper = $saldo;
                } else {
                    $salact = H::toFloat($grid[$fila - 1][4]);
                    $salper = $saldo;
                    $salact += $salper;
                }

                H::toFloat($salper);
                H::toFloat($salact);
                $grid_result = array(
                    $fila => array(
                        3 => H::FormatoMonto($salper),
                        4 => H::FormatoMonto($salact)
                    )
                );
                break;
            case '3':
                $debito = H::toFloat($grid[$fila][1]);
                $credito = H::toFloat($grid[$fila][2]);
                $credito = H::toFloat($grid[$fila][2]);                
                if ($debcre=='D'){
                  $saldo= $debito-$credito;
                }else {
                  $saldo= $credito-$debito;
                }
                if ($fila == '0') {
                    $salact += $saldo;
                    $salper = $saldo;
                } else {
                    $salact = H::toFloat($grid[$fila - 1][4]);
                    $salper = $saldo;
                    $salact += $salper;
                }

                H::toFloat($salper);
                H::toFloat($salact);
                $grid_result = array(
                    $fila => array(
                        3 => H::FormatoMonto($salper),
                        4 => H::FormatoMonto($salact)
                    )
                );
                break;
            default:
                $output = '[["","",""],["","",""],["","",""]]';
                break;
        }
        $output = Herramientas::grid_to_json($grid_result, $name, $jsonextra);
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

        return sfView::HEADER_ONLY;
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

        // Se deben llamar a las funciones necesarias para cargar los
        // datos de la vista que serán usados en las funciones de validación.
        // Por ejemplo:

        if ($this->getRequest()->getMethod() == sfRequest::POST) {

            // $this->configGrid();
            // $grid = Herramientas::CargarDatosGrid($this,$this->obj);
            // Aqui van los llamados a los métodos de las clases del
            // negocio para validar los datos.
            // Los resultados de cada llamado deben ser analizados por ejemplo:
            // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);
            //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);
            // al final $resp es analizada en base al código que retorna
            // Todas las funciones de validación y procesos del negocio
            // deben retornar códigos >= -1. Estos código serám buscados en
            // el archivo errors.yml en la función handleErrorEdit()

            if ($this->coderr != -1) {
                return false;
            } else
                return true;
        }else
            return true;
    }

    /**
     * Función para actualziar el grid en el post si ocurre un error
     * Se pueden colocar aqui los grids adicionales
     *
     */
    public function updateError() {
        $this->configGrid();
        $grid = Herramientas::CargarDatosGridv2($this, $this->obj);
        //$this->configGrid($grid[0],$grid[1]);
    }

    public function saving($clasemodelo) {
        $grid = Herramientas::CargarDatosGridv2($this, $this->params['grid_periodos']);
        Contabilidad::salvarConregsalhis($clasemodelo, $grid);

        return -1;
    }

    public function deleting($clasemodelo) {
        return parent::deleting($clasemodelo);
    }

}
