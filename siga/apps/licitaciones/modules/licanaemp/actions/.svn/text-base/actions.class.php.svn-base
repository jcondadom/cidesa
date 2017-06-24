<?php

/**
 * licanaemp actions.
 *
 * @package    siga
 * @subpackage licanaemp
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class licanaempActions extends autolicanaempActions {

    // Para incluir funcionalidades al executeEdit()
    public function listing() {
        $this->c = new Criteria();
        $sql = "(Lianaemp.tipconpub is null or Lianaemp.tipconpub='B')";
        $this->c->add(LianaempPeer::TIPCONPUB, $sql, Criteria::CUSTOM);
    }

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $this->configGridLeg();
        $this->configGridTec();
        $this->configGridFin();
    }

    public function configGridLeg($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LianaemplegPeer::NUMANAEMP, $this->lianaemp->getNumanaemp());
            $reg = LianaemplegPeer::doSelect($c);
        }
        $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licanaemp/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridleg');

        $this->obj = $this->obj[0]->getConfig($reg);
        $this->lianaemp->setGridleg($this->obj);
    }

    public function configGridTec($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LianaemptecPeer::NUMANAEMP, $this->lianaemp->getNumanaemp());
            $reg = LianaemptecPeer::doSelect($c);
        }
        $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licanaemp/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridtec');

        $this->obj2 = $this->obj2[0]->getConfig($reg);
        $this->lianaemp->setGridtec($this->obj2);
    }

    public function configGridFin($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LianaempfinPeer::NUMANAEMP, $this->lianaemp->getNumanaemp());
            $reg = LianaempfinPeer::doSelect($c);
        }
        $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licanaemp/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridfin');

        $this->obj3 = $this->obj3[0]->getConfig($reg);
        $this->lianaemp->setGridfin($this->obj3);
    }

    public function executeAjax() {

        $codigo = $this->getRequestParameter('codigo', '');
        // Esta variable ajax debe ser usada en cada llamado para identificar
        // que objeto hace el llamado y por consiguiente ejecutar el código necesario
        $ajax = $this->getRequestParameter('ajax', '');

        // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
        // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
        // los datos de los objetos de la vista como pasa en un submit normal.
        $sw = true;
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
                $numplie = '';
                $c = new Criteria();
                $c->add(LiplieespPeer::NUMEXP, $codigo);
                $sql = "(Liplieesp.tipconpub is null or Liplieesp.tipconpub='B')";
                $c->add(LiplieespPeer::TIPCONPUB, $sql, Criteria::CUSTOM);
                $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
                $per = LicomintPeer::doSelectOne($c);
                if ($per) {
                    $compra = $per->getTipcom() == 'N' ? 'NACIONAL' : ($per->getTipcom() == 'I' ? 'INTERNACIONAL' : '');
                    $modcon = H::GetX('Codtiplic', 'Litiplic', 'Destiplic', $per->getCodtiplic());
                    $desclacomp = H::GetX('Codclacomp', 'Occlacomp', 'Desclacomp', $per->getCodclacomp());
                    $bieser = $per->getTipcon() == 'B' ? 'BIENES' : ($per->getTipcon() == 'S' ? 'SERVICIO' : '');
                    $numplie = H::GetX('Numexp', 'Liplieesp', 'Numplie', $codigo);
                }
                $this->lianaemp = $this->getLianaempOrCreate();
                $this->updateLianaempFromRequest();
                $sql = "select b.codcri,a.descri,case when b.limita is null or b.limita<>'S'  then 'NO' else 'SI' end as limit,
                    FormatoNum(b.puntua) as puntua,
                    FormatoNum(b.porcen) as porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, '9' as id
                    from liasplegcrieva a, lipliecrileg b, liplieesp c
                    where
                    c.numexp='$codigo' and
                    c.numplie=b.numplie and                    
                    c.numexp=b.numexp and
                    a.codcri=b.codcri";
                H::BuscarDatos($sql, $reg);
                $this->configGridLeg($reg);
                $js = "toAjaxUpdater('divgridtec','8',getUrlModuloAjax(),'$codigo','','');";
                $output = '[["lianaemp_tipcom","' . $compra . '",""],["lianaemp_destiplic","' . $modcon . '",""],["lianaemp_tipcon","' . $bieser . '",""],
                       ["lianaemp_desclacomp","' . $desclacomp . '",""],["lianaemp_numplie","' . $numplie . '",""],["javascript","' . $js . '",""]]';
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
                $output = '[["lianaemp_nomempadm","' . $nomemp . '",""],["lianaemp_nomcaradm","' . $nomcar . '",""],["lianaemp_coduniadm","' . $coduniadm . '",""],["lianaemp_desuniadm","' . $desuniadm . '",""]]';
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
                $output = '[["lianaemp_coduniadm","' . $coduniadm . '",""],["lianaemp_desuniadm","' . $desuniadm . '",""],["","",""]]';
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
                $output = '[["lianaemp_nomempeje","' . $nomemp . '",""],["lianaemp_nomcareje","' . $nomcar . '",""],["lianaemp_coduniste","' . $coduniste . '",""],["lianaemp_desuniste","' . $desuniste . '",""]]';
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
                $output = '[["lianaemp_coduniste","' . $coduniste . '",""],["lianaemp_desuniste","' . $desuniste . '",""],["","",""]]';
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
                $output = '[["lianaemp_fecven","' . $fecven . '",""],["","",""],["","",""]]';
                break;
            case '7':
                // La variable $output es usada para retornar datos en formato de arreglo para actualizar
                // objetos en la vista. mas informacion en
                // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
                $numexp = $this->getRequestParameter('numexp', '');
                $nompro = '';
                $nomrepleg = '';
                $rif = '';
                $c = new Criteria();
                $c->add(LiempparPeer::NUMEXP, $numexp);
                $c->add(LiempparPeer::CODPRO, $codigo);
                $per = LiempparPeer::doSelectOne($c);
                if ($per) {
                    $nompro = $per->getNompro();
                    $nomrepleg = $per->getNomrepleg();
                    $rif = $per->getRifpro();
                }
                $output = '[["lianaemp_nompro","' . $nompro . '",""],["lianaemp_nomrepleg","' . $nomrepleg . '",""],["lianaemp_rif","' . $rif . '",""]]';
                break;
            case '8':
                $sw = false;
                $this->ajax = '8';
                $this->lianaemp = $this->getLianaempOrCreate();
                $this->updateLianaempFromRequest();
                $sql = "select b.codcri,a.descri,case when b.limita is null or b.limita<>'S'  then 'NO' else 'SI' end as limit,
                    FormatoNum(b.puntua) as puntua,
                    FormatoNum(b.porcen) as porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, '9' as id
                    from liaspteccrieva a, lipliecritec b, liplieesp c
                    where
                    c.numexp='$codigo' and
                    c.numplie=b.numplie and                    
                    c.numexp=b.numexp and
                    a.codcri=b.codcri";
                H::BuscarDatos($sql, $reg);
                $this->configGridtec($reg);
                $js = "toAjaxUpdater('divgridfin','9',getUrlModuloAjax(),'$codigo','','');";
                $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
                break;
            case '9':
                $sw = false;
                $this->ajax = '9';
                $this->lianaemp = $this->getLianaempOrCreate();
                $this->updateLianaempFromRequest();
                $sql = "select b.codcri,a.descri,case when b.limita is null or b.limita<>'S'  then 'NO' else 'SI' end as limit,
                    FormatoNum(b.puntua) as puntua,
                    FormatoNum(b.porcen) as porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, '9' as id
                    from liaspfincrieva a, lipliecrifin b, liplieesp c
                    where
                    c.numexp='$codigo' and
                    c.numplie=b.numplie and                    
                    c.numexp=b.numexp and
                    a.codcri=b.codcri";
                H::BuscarDatos($sql, $reg);
                $this->configGridfin($reg);
                $c = new Criteria();
                $c->add(LiplieespPeer::NUMEXP, $codigo);
                $per = LiplieespPeer::doSelectOne($c);
                if ($per) {
                    $porleg = $per->getPorleg();
                    $portec = $per->getPortec();
                    $porfin = $per->getPorfin();
                    $porminleg = $per->getMinleg();
                    $pormintec = $per->getMintec();
                    $porminfin = $per->getMinfin();
                } else {
                    $porleg = "";
                    $portec = "";
                    $porfin = "";
                    $porminleg = "";
                    $pormintec = "";
                    $porminfin = "";
                }
                $output = '[["lianaemp_porlegp","' . H::FormatoMonto($porleg) . '",""],["lianaemp_portecp","' . H::FormatoMonto($portec) . '",""],["lianaemp_porfinp","' . H::FormatoMonto($porfin) . '",""],
                      ["lianaemp_minleg","' . H::FormatoMonto($porminleg) . '",""],["lianaemp_mintec","' . H::FormatoMonto($pormintec) . '",""],["lianaemp_minfin","' . H::FormatoMonto($porminfin) . '",""]]';
                break;
            case '11':
                $idporcri = $this->getRequestParameter('idporcri', '');
                $punemp = $this->getRequestParameter('punemp', '');
                $idpunemp = $this->getRequestParameter('idpunemp', '');
                $idporemp = $this->getRequestParameter('idporemp', '');
                $punplie = $this->getRequestParameter('punplie', '');
                $porplie = $this->getRequestParameter('porplie', '');
                $js = '';
                if ($punemp > $punplie) {
                    $poremp = 0;
                    $punemp = 0;
                    $js = "alert('El Puntaje no puede ser mayor al del Pliego');";
                } else {
                    $poremp = ($punemp * $porplie) / $punplie;
                }
                $js.="CalculaTotal('$idporemp','$idporcri');";
                $output = '[["' . $idporemp . '","' . H::FormatoMonto($poremp) . '",""],["' . $idpunemp . '","' . H::FormatoMonto($punemp) . '",""],
                      ["javascript","' . $js . '",""]]';
                break;
            case '12':
                $idporcri = $this->getRequestParameter('idporcri', '');
                $tporemp = $this->getRequestParameter('tporemp', '');
                $numplie = $this->getRequestParameter('numplie', '');
                $c = new Criteria();
                $c->add(LiplieespPeer::NUMPLIE, $numplie);
                $per = LiplieespPeer::doSelectOne($c);
                if ($per) {
                    $porleg = $per->getPorleg();
                    $portec = $per->getPortec();
                    $porfin = $per->getPorfin();
                    if (strrpos($idporcri, 'leg'))
                        $porcen = ($tporemp * $porleg) / 100;
                    elseif (strrpos($idporcri, 'tec'))
                        $porcen = ($tporemp * $portec) / 100;
                    elseif (strrpos($idporcri, 'fin'))
                        $porcen = ($tporemp * $porfin) / 100;
                    else
                        $porcen = 0;
                }
                $js = "SumarPortot();";
                $output = '[["' . $idporcri . '","' . H::FormatoMonto($porcen) . '",""],["javascript","' . $js . '",""],["","",""]]';
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
        $this->configGridLeg();
        $this->configGridTec();
        $this->configGridFin();

        $gridleg = Herramientas::CargarDatosGridv2($this, $this->obj, true);
        $gridtec = Herramientas::CargarDatosGridv2($this, $this->obj2, true);
        $gridfin = Herramientas::CargarDatosGridv2($this, $this->obj3, true);
    }

    public function saving($clasemodelo) {
        Licitacion::SalvarGeneral($clasemodelo, 'Lianaemp', 'Numanaemp', 'Anaemp');
        $gridleg = Herramientas::CargarDatosGridv2($this, $this->obj, true);
        $gridtec = Herramientas::CargarDatosGridv2($this, $this->obj2, true);
        $gridfin = Herramientas::CargarDatosGridv2($this, $this->obj3, true);
        Licitacion::SalvarGridAnalisisEmpresa($clasemodelo, $gridleg, $gridtec, $gridfin);
        return parent::saving($clasemodelo);
    }

    public function deleting($clasemodelo) {
        Licitacion::EliminarGridAnalisisEmpresa($clasemodelo);
        return parent::deleting($clasemodelo);
    }

}
