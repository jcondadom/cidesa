<?php

/**
 * liccontrat actions.
 *
 * @package    siga
 * @subpackage liccontrat
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class liccontratActions extends autoliccontratActions {

    public function listing() {
        $this->c = new Criteria();
        $sql = "(Licontrat.tipconpub is null or Licontrat.tipconpub='B')";
        $this->c->add(LicontratPeer::TIPCONPUB, $sql, Criteria::CUSTOM);
    }

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $this->configGridArt();
        $this->configGridRgo();
        $this->configGridForPag();
        $this->configGridCroEnt();
        $this->configGridFia();
    }

    public function configGridArt($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;
        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiregofedetPeer::NUMOFE, $this->licontrat->getNumofe());
            $reg = LiregofedetPeer::doSelect($c);
        }
        $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/liccontrat/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridart');

        $this->obj = $this->obj[0]->getConfig($reg);
        $this->licontrat->setGridart($this->obj);
    }

    public function configGridRgo($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiregofergoPeer::NUMOFE, $this->licontrat->getNumofe());
            $reg = LiregofergoPeer::doSelect($c);
        }
        $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/liccontrat/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridrgo');

        $this->obj2 = $this->obj2[0]->getConfig($reg);
        $this->licontrat->setGridrgo($this->obj2);
    }

    public function configGridForPag($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiforpagPeer::NUMOFE, $this->licontrat->getNumofe());
            $reg = LiforpagPeer::doSelect($c);
        }
        $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/liccontrat/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridforpag');

        $this->obj3 = $this->obj3[0]->getConfig($reg);
        $this->licontrat->setGridforpag($this->obj3);
    }

    public function configGridCroEnt($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LicroentPeer::NUMOFE, $this->licontrat->getNumofe());
            $reg = LicroentPeer::doSelect($c);
        }
        $this->obj4 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/liccontrat/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridcroent');

        $this->obj4 = $this->obj4[0]->getConfig($reg);
        $this->licontrat->setGridcroent($this->obj4);
    }

    public function configGridFia($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LiregofefiaPeer::NUMOFE, $this->licontrat->getNumofe());
            $reg = LiregofefiaPeer::doSelect($c);
        }
        $this->obj8 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/liccontrat/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridfia');

        $this->obj8 = $this->obj8[0]->getConfig($reg);
        $this->licontrat->setGridfia($this->obj8);
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
                $numrecofe = '';
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
                $c = new Criteria();
                $c->add(LiptocueconPeer::NUMPTOCUECON, $codigo);
                $sql = "(Liptocuecon.tipconpub is null or Liptocuecon.tipconpub='B')";
                $c->add(LiptocueconPeer::TIPCONPUB, $sql, Criteria::CUSTOM);
                $c->addJoin(LiplieespPeer::NUMEXP, LiptocueconPeer::NUMEXP);
                $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
                $per = LicomintPeer::doSelectOne($c);
                if ($per) {
                    $compra = $per->getTipcom() == 'N' ? 'NACIONAL' : ($per->getTipcom() == 'I' ? 'INTERNACIONAL' : '');
                    $modcon = H::GetX('Codtiplic', 'Litiplic', 'Destiplic', $per->getCodtiplic());
                    $desclacomp = H::GetX('Codclacomp', 'Occlacomp', 'Desclacomp', $per->getCodclacomp());
                    $bieser = $per->getTipcon() == 'B' ? 'BIENES' : ($per->getTipcon() == 'S' ? 'SERVICIO' : '');
                    $numplie = H::GetX('Numexp', 'Liplieesp', 'Numplie', $codigo);
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
                $this->licontrat = $this->getLicontratOrCreate();
                $this->updateLicontratFromRequest();
                $this->licontrat->setNumofe($numofe);
                $this->configGridArt();
                $js = "toAjaxUpdater('divgridcroent','7',getUrlModuloAjax(),'$codigo','','&numofe=$numofe');";
                $output = '[["licontrat_tipcom","' . $compra . '",""],["licontrat_destiplic","' . $modcon . '",""],["licontrat_tipcon","' . $bieser . '",""],
                       ["licontrat_desclacomp","' . $desclacomp . '",""],["licontrat_numrecofe","' . $numrecofe . '",""],["licontrat_numexp","' . $numexp . '",""],
                       ["licontrat_codpro","' . $codpro . '",""],["licontrat_nompro","' . $nompro . '",""],["licontrat_rifpro","' . $rifpro . '",""],["licontrat_nomrepleg","' . $nomrepleg . '",""],
                       ["licontrat_dirpro","' . $direccion . '",""],["licontrat_numofe","' . $numofe . '",""],["licontrat_fecofe","' . $fecofe . '",""],
                       ["licontrat_monofe","' . H::FormatoMonto($monofe) . '",""],["licontrat_monofelet","' . H::obtenermontoescrito($monofe) . '",""],    
                       ["licontrat_monart","' . H::FormatoMonto($monsubofe) . '",""],["licontrat_monrec","' . H::FormatoMonto($monrecofe) . '",""],    
                       ["javascript","' . $js . '",""]]';
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
                $output = '[["licontrat_nomempadm","' . $nomemp . '",""],["licontrat_nomcaradm","' . $nomcar . '",""],["licontrat_coduniadm","' . $coduniadm . '",""],["licontrat_desuniadm","' . $desuniadm . '",""]]';
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
                $output = '[["licontrat_coduniadm","' . $coduniadm . '",""],["licontrat_desuniadm","' . $desuniadm . '",""],["","",""]]';
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
                $output = '[["licontrat_nomempeje","' . $nomemp . '",""],["licontrat_nomcareje","' . $nomcar . '",""],["licontrat_coduniste","' . $coduniste . '",""],["licontrat_desuniste","' . $desuniste . '",""]]';
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
                $output = '[["licontrat_coduniste","' . $coduniste . '",""],["licontrat_desuniste","' . $desuniste . '",""],["","",""]]';
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
                $output = '[["licontrat_fecven","' . $fecven . '",""],["","",""],["","",""]]';
                break;
            case '7':
                // La variable $output es usada para retornar datos en formato de arreglo para actualizar
                // objetos en la vista. mas informacion en
                // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
                $sw = false;
                $this->ajax = '7';
                $numofe = $this->getRequestParameter('numofe', '');
                $this->licontrat = $this->getLicontratOrCreate();
                $this->licontrat->setNumofe($numofe);
                $this->configGridCroEnt();
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
                $this->licontrat = $this->getLicontratOrCreate();
                $this->licontrat->setNumofe($numofe);
                $this->configGridForpag();
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
                $this->licontrat = $this->getLicontratOrCreate();
                $this->licontrat->setNumofe($numofe);
                $this->configGridRgo();
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
                $this->licontrat = $this->getLicontratOrCreate();
                $this->licontrat->setNumofe($numofe);
                $this->configGridFia();
                $js = "";
                $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
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
        $this->configGridArt();
        $this->configGridRgo();
        $this->configGridForPag();
        $this->configGridCroEnt();
        $this->configGridFia();

        $gridart = Herramientas::CargarDatosGridv2($this, $this->obj);
        $gridrgo = Herramientas::CargarDatosGridv2($this, $this->obj2);
        $gridforpag = Herramientas::CargarDatosGridv2($this, $this->obj3);
        $gridcroent = Herramientas::CargarDatosGridv2($this, $this->obj4);
        $gridfia = Herramientas::CargarDatosGridv2($this, $this->obj8);

        //$this->configGrid($grid[0],$grid[1]);
    }

    public function saving($clasemodelo) {
        Licitacion::SalvarGeneral($clasemodelo, 'Licontrat', 'Numcont', 'Contrat');
        return parent::saving($clasemodelo);
    }

    public function deleting($clasemodelo) {
        return parent::deleting($clasemodelo);
    }

}
