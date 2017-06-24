<?php

/**
 * licordcom actions.
 *
 * @package    siga
 * @subpackage licordcom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class licordcomActions extends autolicordcomActions {

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $arrpag = array('' => 'Seleccione...');
        $per = CaconpagPeer::doSelect(new Criteria());
        foreach ($per as $r) {
            $arrpag[$r->getCodconpag()] = $r->getDesconpag();
        }
        $this->params = array('arrpag' => $arrpag);
        $this->configGridPro();
        $this->configGridArt();
        $this->configGridRgo();
        $this->configGridForPag();
        $this->configGridCroEnt();
        $this->configGridFia();
    }

    public function configGridPro($codmon = '', $reg = array(), $a = '') {

        if (!count($reg) > 0 && $a == '') {
            // Aquí va el código para traernos los registros que contendrá el grid
            $reg = array();
            // Aquí va el código para generar arreglo de configuración del grid
            $c = new Criteria();
            $c->add(LiordcomsolegrPeer::NUMORD, $this->liordcom->getNumord());
            $reg = LiordcomsolegrPeer::doSelect($c);
        }
        $this->obj5 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licordcom/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridpro');

        if ($codmon == '' || $codmon == '001') {
            $this->obj5[1][5]->setOculta(true);
            $this->obj5[1][6]->setOculta(true);
        } else {
            $this->obj5[1][5]->setOculta(false);
            $this->obj5[1][6]->setOculta(false);
        }

        $this->obj5 = $this->obj5[0]->getConfig($reg);
        $this->liordcom->setGridpro($this->obj5);
    }

    public function configGridArt($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;
        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiordcomdetPeer::NUMORD, $this->liordcom->getNumord());
            $reg = LiordcomdetPeer::doSelect($c);
        }
        $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licordcom/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridart');

        $this->obj = $this->obj[0]->getConfig($reg);
        $this->liordcom->setGridart($this->obj);
    }

    public function configGridRgo($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiordcomrgoPeer::NUMORD, $this->liordcom->getNumord());
            $reg = LiordcomrgoPeer::doSelect($c);
        }
        $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licordcom/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridrgo');

        $this->obj2 = $this->obj2[0]->getConfig($reg);
        $this->liordcom->setGridrgo($this->obj2);
    }

    public function configGridForPag($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiordcomforpagPeer::NUMORD, $this->liordcom->getNumord());
            $reg = LiordcomforpagPeer::doSelect($c);
        }
        $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licordcom/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridforpag');

        $this->obj3 = $this->obj3[0]->getConfig($reg);
        $this->liordcom->setGridforpag($this->obj3);
    }

    public function configGridCroEnt($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiordcomcroentPeer::NUMORD, $this->liordcom->getNumord());
            $reg = LiordcomcroentPeer::doSelect($c);
        }
        $this->obj4 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licordcom/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridcroent');

        $this->obj4 = $this->obj4[0]->getConfig($reg);
        $this->liordcom->setGridcroent($this->obj4);
    }

    public function configGridFia($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiordcomfiaPeer::NUMORD, $this->liordcom->getNumord());
            $reg = LiordcomfiaPeer::doSelect($c);
        }
        $this->obj8 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licordcom/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridfia');

        $this->obj8 = $this->obj8[0]->getConfig($reg);
        $this->liordcom->setGridfia($this->obj8);
    }

    public function executeAjax() {

        $codigo = $this->getRequestParameter('codigo', '');
        // Esta variable ajax debe ser usada en cada llamado para identificar
        // que objeto hace el llamado y por consiguiente ejecutar el código necesario
        $ajax = $this->getRequestParameter('ajax', '');
        $sw = true;

        // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
        // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
        // los datos de los objetos de la vista como pasa en un submit normal.

        switch ($ajax) {
            case '1':
                // La variable $output es usada para retornar datos en formato de arreglo para actualizar
                // objetos en la vista. mas informacion en
                // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
                $sw = false;
                $this->ajax = '1';
                $bieser = '';
                $compra = '';
                $modcon = '';
                $desclacomp = '';
                $numexp = '';
                $codpro = '';
                $numofe = '';
                $fecofe = '';
                $monofe = '';
                $nompro = '';
                $rifpro = '';
                $nomrepleg = '';
                $direccion = '';
                $monsubofe = '';
                $monrecofe = '';
                $numcomint = '';
                $destipemp = '';
                $moneda = '';
                $c = new Criteria();
                $c->add(LiptocueconPeer::NUMPTOCUECON, $codigo);
                $c->addJoin(LiplieespPeer::NUMEXP, LiptocueconPeer::NUMEXP);
                $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
                $per = LicomintPeer::doSelectOne($c);
                if ($per) {
                    $compra = $per->getTipcom() == 'N' ? 'NACIONAL' : ($per->getTipcom() == 'I' ? 'INTERNACIONAL' : '');
                    $modcon = H::GetX('Codtiplic', 'Litiplic', 'Destiplic', $per->getCodtiplic());
                    $desclacomp = H::GetX('Codclacomp', 'Occlacomp', 'Desclacomp', $per->getCodclacomp());
                    $bieser = $per->getTipcon() == 'B' ? 'BIENES' : ($per->getTipcon() == 'S' ? 'SERVICIO' : '');
                    $numplie = H::GetX('Numexp', 'Liplieesp', 'Numplie', $codigo);
                    $numcomint = $per->getNumcomint();
                    $codmon = $per->getCodmon();
                    $moneda = "$codmon-" . H::GetX('Codmon', 'Tsdesmon', 'Nommon', $codmon);
                }
                $numrecofe = H::GetX('Numptocuecon', 'Liptocuecon', 'Numrecofe', $codigo);
                $c = new Criteria();
                $c->add(LirecomenPeer::NUMRECOFE, $numrecofe);
                $c->addJoin(LiregofePeer::NUMEXP, LirecomenPeer::NUMEXP);
                $c->addJoin(LirecomenPeer::NUMRECOFE, LirecomendetPeer::NUMRECOFE);
                $c->addJoin(LiregofePeer::CODPRO, LirecomendetPeer::CODPRO);
                $c->addDescendingOrderByColumn(LirecomendetPeer::PUNTOT);
                $per = LiregofePeer::doSelectOne($c);
                if ($per) {
                    $numexp = $per->getNumexp();
                    $codpro = $per->getCodpro();
                    $numofe = $per->getNumofe();
                    $fecofe = $per->getFecofe('d/m/Y');
                    $monsubofe = $per->getMonofe();
                    $monrecofe = $per->getMonrecofe();
                    $monofe = $per->getMonofetot();
                    $destipemp = H::GetX('Codemp', 'Litipemp', 'Desemp', $per->getCodtipemp());
                }
                $c = new Criteria();
                $c->add(LiregofePeer::NUMOFE, $numofe);
                $c->addJoin(LiempparPeer::NUMEXP, LiregofePeer::NUMEXP);
                $c->addJoin(LiregofePeer::CODPRO, LiempparPeer::CODPRO);
                $per = LiempparPeer::doSelectOne($c);
                if ($per) {
                    $nompro = $per->getNompro();
                    $rifpro = $per->getrifpro();
                    $nomrepleg = $per->getNomrepleg();
                    $direccion = H::GetX('Codpro', 'Caprovee', 'Dirpro', $per->getCodpro());
                }
                $this->liordcom = $this->getLiordcomOrCreate();
                $this->updateLiordcomFromRequest();
                $c = new Criteria();
                $c->add(LiregofedetPeer::NUMOFE, $numofe);
                $reg = LiregofedetPeer::doSelect($c);
                $this->configGridArt($reg);
                $js = "toAjaxUpdater('divgridcroent','7',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
                $output = '[["liordcom_tipcom","' . $compra . '",""],["liordcom_destiplic","' . $modcon . '",""],["liordcom_tipcon","' . $bieser . '",""],
                       ["liordcom_desclacomp","' . $desclacomp . '",""],["liordcom_numcomint","' . $numcomint . '",""],["liordcom_numexp","' . $numexp . '",""],
                       ["liordcom_codpro","' . $codpro . '",""],["liordcom_nompro","' . $nompro . '",""],["liordcom_rifpro","' . $rifpro . '",""],["liordcom_nomrepleg","' . $nomrepleg . '",""],
                       ["liordcom_dirpro","' . $direccion . '",""],["liordcom_destipemp","' . $destipemp . '",""],["liordcom_numofe","' . $numofe . '",""],["liordcom_fecofe","' . $fecofe . '",""],
                       ["liordcom_monofe","' . H::FormatoMonto($monofe) . '",""],["liordcom_monofelet","' . H::obtenermontoescrito($monofe) . '",""],    
                       ["liordcom_monart","' . H::FormatoMonto($monsubofe) . '",""],["liordcom_monrec","' . H::FormatoMonto($monrecofe) . '",""],    
                       ["javascript","' . $js . '",""],["liordcom_moneda","' . $moneda . '",""]]';
                break;
            case '2':
                $nomemp = '';
                $nomcar = '';
                $coduniadm = '';
                $desuniadm = '';
                $c = new Criteria();
                $c->add(LidatstedetPeer::CODEMP, $codigo);
                $per = LidatstedetPeer::doSelectOne($c);
                if ($per) {
                    $nomemp = $per->getNomemp();
                    $nomcar = $per->getNomcar();
                    $coduniadm = $per->getCoduniste();
                    $desuniadm = $per->getDesuniste();
                }
                $output = '[["liordcom_nomempadm","' . $nomemp . '",""],["liordcom_nomcaradm","' . $nomcar . '",""],["liordcom_coduniadm","' . $coduniadm . '",""],["liordcom_desuniadm","' . $desuniadm . '",""]]';
                break;
            case '3':
                $coduniadm = '';
                $desuniadm = '';
                $c = new Criteria();
                $c->add(LidatstePeer::CODUNISTE, $codigo);
                $per = LidatstePeer::doSelectOne($c);
                if ($per) {
                    $coduniadm = $per->getCoduniste();
                    $desuniadm = $per->getDesuniste();
                }
                $output = '[["liordcom_coduniadm","' . $coduniadm . '",""],["liordcom_desuniadm","' . $desuniadm . '",""],["","",""]]';
                break;
            case '4':
                $nomemp = '';
                $nomcar = '';
                $coduniste = '';
                $desuniste = '';
                $c = new Criteria();
                $c->add(LidatstedetPeer::CODEMP, $codigo);
                $per = LidatstedetPeer::doSelectOne($c);
                if ($per) {
                    $nomemp = $per->getNomemp();
                    $nomcar = $per->getNomcar();
                    $coduniste = $per->getCoduniste();
                    $desuniste = $per->getDesuniste();
                }
                $output = '[["liordcom_nomempeje","' . $nomemp . '",""],["liordcom_nomcareje","' . $nomcar . '",""],["liordcom_coduniste","' . $coduniste . '",""],["liordcom_desuniste","' . $desuniste . '",""]]';
                break;
            case '5':
                $coduniste = '';
                $desuniste = '';
                $c = new Criteria();
                $c->add(LidatstePeer::CODUNISTE, $codigo);
                $per = LidatstePeer::doSelectOne($c);
                if ($per) {
                    $coduniste = $per->getCoduniste();
                    $desuniste = $per->getDesuniste();
                }
                $output = '[["liordcom_coduniste","' . $coduniste . '",""],["liordcom_desuniste","' . $desuniste . '",""],["","",""]]';
                break;
            case '6':
                $fecha = $this->getRequestParameter('fecha', '');
                $dias = $this->getRequestParameter('dias', '');
                if ($fecha && $dias) {
                    $sql = "select to_char(to_date('$fecha','dd/mm/yyyy')+$dias,'dd/mm/yyyy') as fecven";
                    if (H::BuscarDatos($sql, $rs))
                        $fecven = $rs[0]['fecven'];
                }
                else
                    $fecven = null;
                $output = '[["liordcom_fecven","' . $fecven . '",""],["","",""],["","",""]]';
                break;
            case '7':
                // La variable $output es usada para retornar datos en formato de arreglo para actualizar
                // objetos en la vista. mas informacion en
                // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
                $sw = false;
                $this->ajax = '7';
                $numofe = $this->getRequestParameter('numofe', '');
                $this->liordcom = $this->getLiordcomOrCreate();
                $c = new Criteria();
                $c->add(LicroentPeer::NUMOFE, $numofe);
                $reg = LicroentPeer::doSelect($c);
                $this->configGridCroEnt($reg);
                $js = "toAjaxUpdater('divgridforpag','8',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
                $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
                break;
            case '8':
                // La variable $output es usada para retornar datos en formato de arreglo para actualizar
                // objetos en la vista. mas informacion en
                // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
                $sw = false;
                $this->ajax = '8';
                $numofe = $this->getRequestParameter('numofe', '');
                $this->liordcom = $this->getLiordcomOrCreate();
                $c = new Criteria();
                $c->add(LiforpagPeer::NUMOFE, $numofe);
                $reg = LiforpagPeer::doSelect($c);
                $this->configGridForpag($reg);
                $js = "toAjaxUpdater('divgridrgo','9',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
                $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
                break;
            case '9':
                // La variable $output es usada para retornar datos en formato de arreglo para actualizar
                // objetos en la vista. mas informacion en
                // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
                $sw = false;
                $this->ajax = '9';
                $numofe = $this->getRequestParameter('numofe', '');
                $this->liordcom = $this->getLiordcomOrCreate();
                $c = new Criteria();
                $c->add(LiregofergoPeer::NUMOFE, $numofe);
                $reg = LiregofergoPeer::doSelect($c);
                $this->configGridRgo($reg);
                $js = "toAjaxUpdater('divgridfia','10',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
                $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
                break;
            case '10':
                // La variable $output es usada para retornar datos en formato de arreglo para actualizar
                // objetos en la vista. mas informacion en
                // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
                $sw = false;
                $this->ajax = '10';
                $numofe = $this->getRequestParameter('numofe', '');
                $this->liordcom = $this->getLiordcomOrCreate();
                $c = new Criteria();
                $c->add(LiregofefiaPeer::NUMOFE, $numofe);
                $reg = LiregofefiaPeer::doSelect($c);
                $this->configGridFia($reg);
                $js = "toAjaxUpdater('divgridpro','11',getUrlModuloAjax(),'$codigo','','&numcomint='+$(liordcom_numcomint).value+'&modena='+$(liordcom_moneda).value);";
                $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
                break;
            case '11':
                // La variable $output es usada para retornar datos en formato de arreglo para actualizar
                // objetos en la vista. mas informacion en
                // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
                $sw = false;
                $codmon = '';
                $this->ajax = '11';
                $numcomint = $this->getRequestParameter('numcomint', '');
                $moneda = $this->getRequestParameter('moneda', '');
                $this->liordcom = $this->getLiordcomOrCreate();
                $c = new Criteria();
                $c->add(LidetcomintPeer::NUMCOMINT, $numcomint);
                $reg = LidetcomintPeer::doSelect($c);
                $aux = explode('-', $moneda);
                $codmon = $aux[0];
                $monpro = 0;
                foreach ($reg as $r)
                    $monpro+=$r->getMontot();
                $this->configGridPro($codmon, $reg);
                $js = "";
                $output = '[["javascript","' . $js . '",""],["liordcom_monpro","' . H::FormatoMonto($monpro) . '",""],["","",""]]';
                break;
            default:
                $output = '[["","",""],["","",""],["","",""]]';
        }

        // Instruccion para escribir en la cabecera los datos a enviar a la vista
        $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');

        // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
        // mantener habilitar esta instrucción
        if ($sw)
            return sfView::HEADER_ONLY;

        // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
        // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.
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
            }
            else
                return true;
        }
        else
            return true;
    }

    /**
     * Función para actualziar el grid en el post si ocurre un error
     * Se pueden colocar aqui los grids adicionales
     *
     */
    public function updateError() {
        $arrpag = array('' => 'Seleccione...');
        $per = CaconpagPeer::doSelect(new Criteria());
        foreach ($per as $r) {
            $arrpag[$r->getCodconpag()] = $r->getDesconpag();
        }
        $this->params = array('arrpag' => $arrpag);
        $this->configGridPro();
        $this->configGridArt();
        $this->configGridRgo();
        $this->configGridForPag();
        $this->configGridCroEnt();
        $this->configGridFia();

        $gridpro = Herramientas::CargarDatosGridv2($this, $this->obj5, true);
        $gridart = Herramientas::CargarDatosGridv2($this, $this->obj, true);
        $gridrgo = Herramientas::CargarDatosGridv2($this, $this->obj2, true);
        $gridforpag = Herramientas::CargarDatosGridv2($this, $this->obj3, true);
        $gridcroent = Herramientas::CargarDatosGridv2($this, $this->obj4, true);
        $gridfia = Herramientas::CargarDatosGridv2($this, $this->obj8, true);

        //$this->configGrid($grid[0],$grid[1]);
    }

    public function saving($clasemodelo) {
        $gridpro = Herramientas::CargarDatosGridv2($this, $this->obj5, true);
        $gridart = Herramientas::CargarDatosGridv2($this, $this->obj, true);
        $gridrgo = Herramientas::CargarDatosGridv2($this, $this->obj2, true);
        $gridforpag = Herramientas::CargarDatosGridv2($this, $this->obj3, true);
        $gridcroent = Herramientas::CargarDatosGridv2($this, $this->obj4, true);
        $gridfia = Herramientas::CargarDatosGridv2($this, $this->obj8, true);
        Licitacion::SalvarOrdenCompra($clasemodelo, $gridpro, $gridart, $gridrgo, $gridforpag, $gridcroent, $gridfia);
        return parent::saving($clasemodelo);
    }

    public function deleting($clasemodelo) {
        return parent::deleting($clasemodelo);
    }

}
