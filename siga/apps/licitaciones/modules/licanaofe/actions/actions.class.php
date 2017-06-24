<?php

/**
 * licanaofe actions.
 *
 * @package    siga
 * @subpackage licanaofe
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */
class licanaofeActions extends autolicanaofeActions {

    public function listing() {
        $this->c = new Criteria();
        $sql = "(Lianaofe.tipconpub is null or Lianaofe.tipconpub='B')";
        $this->c->add(LianaofePeer::TIPCONPUB, $sql, Criteria::CUSTOM);
    }

    // Para incluir funcionalidades al executeEdit()
    public function editing() {
        $this->configGridLeg();
        $this->configGridTec();
        $this->configGridFin();
        $this->configGridFia();
        $this->configGridTipEmp();
    }

    public function configGridLeg($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LianaofelegPeer::NUMANAOFE, $this->lianaofe->getNumanaofe());
            $reg = LianaofelegPeer::doSelect($c);
        }
        $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licanaofe/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridleg');

        $this->obj = $this->obj[0]->getConfig($reg);
        $this->lianaofe->setGridleg($this->obj);
    }

    public function configGridTec($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LianaofetecPeer::NUMANAOFE, $this->lianaofe->getNumanaofe());
            $reg = LianaofetecPeer::doSelect($c);
        }
        $this->obj2 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licanaofe/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridtec');

        $this->obj2 = $this->obj2[0]->getConfig($reg);
        $this->lianaofe->setGridtec($this->obj2);
    }

    public function configGridFin($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LianaofefinPeer::NUMANAOFE, $this->lianaofe->getNumanaofe());
            $reg = LianaofefinPeer::doSelect($c);
        }
        $this->obj3 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licanaofe/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridfin');

        $this->obj3 = $this->obj3[0]->getConfig($reg);
        $this->lianaofe->setGridfin($this->obj3);
    }

    public function configGridFia($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LianaofefiaPeer::NUMANAOFE, $this->lianaofe->getNumanaofe());
            $reg = LianaofefiaPeer::doSelect($c);
        }
        $this->obj4 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licanaofe/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridfia');

        $this->obj4 = $this->obj4[0]->getConfig($reg);
        $this->lianaofe->setGridfia($this->obj4);
    }

    public function configGridTipEmp($reg = array(), $regelim = array()) {
        $this->regelim = $regelim;

        if (!(count($reg) > 0)) {
            // Aquí va el código para traernos los registros que contendrá el grid
            $c = new Criteria();
            $c->add(LianaofetipempPeer::NUMANAOFE, $this->lianaofe->getNumanaofe());
            $reg = LianaofetipempPeer::doSelect($c);
        }
        $this->obj5 = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir') . '/licanaofe/' . sfConfig::get('sf_app_module_config_dir_name') . '/gridtipemp');

        $this->obj5 = $this->obj5[0]->getConfig($reg);
        $this->lianaofe->setGridtipemp($this->obj5);
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
                $numplie = '';
                $nompro = '';
                $rif = '';
                $nomrepleg = '';
                $ofenro = '';
                $fecofe = '';
                $monofe = '';
                $monofelet = '';
                $c = new Criteria();
                $c->add(LiregofePeer::NUMOFE, $codigo);
                $sql = "(Liregofe.tipconpub is null or Liregofe.tipconpub='B')";
                $c->add(LiregofePeer::TIPCONPUB, $sql, Criteria::CUSTOM);
                $c->addJoin(LiregofePeer::NUMEXP, LiplieespPeer::NUMEXP);
                $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
                $per = LicomintPeer::doSelectOne($c);
                if ($per) {
                    $compra = $per->getTipcom() == 'N' ? 'NACIONAL' : ($per->getTipcom() == 'I' ? 'INTERNACIONAL' : '');
                    $modcon = H::GetX('Codtiplic', 'Litiplic', 'Destiplic', $per->getCodtiplic());
                    $desclacomp = H::GetX('Codclacomp', 'Occlacomp', 'Desclacomp', $per->getCodclacomp());
                    $bieser = $per->getTipcon() == 'B' ? 'BIENES' : ($per->getTipcon() == 'S' ? 'SERVICIO' : '');
                }
                $c = new Criteria();
                $c->add(LiregofePeer::NUMOFE, $codigo);
                $per = LiregofePeer::doSelectOne($c);
                if ($per) {
                    $numplie = $per->getNumplie();
                    $numexp = $per->getNumexp();
                    $c2 = new Criteria();
                    $c2->add(LiregofePeer::NUMOFE, $codigo);
                    $c2->addJoin(LiempparPeer::NUMEXP, LiregofePeer::NUMEXP);
                    $c2->add(LiempparPeer::CODPRO, $per->getCodpro());
                    $per2 = LiempparPeer::doSelectOne($c2);
                    if ($per2) {
                        $nompro = $per2->getNompro();
                        $rif = $per2->getRifpro();
                        $nomrepleg = $per2->getNomrepleg();
                    }
                    $ofenro = $per->getOfenro();
                    $fecofe = $per->getFecofe('d/m/Y');
                    $monofe = $per->getMonofe();
                    $monofelet = H::obtenermontoescrito($monofe);
                    $porvan = $per->getPorvan();
                    $declar = $per->getDeclar() == 'N' ? 'NO ENTREGADO' : 'ENTREGADO';
                }
                $c = new Criteria();
                $c->add(LiregofePeer::NUMOFE, $codigo);
                $c->addJoin(LiregofePeer::NUMEXP, LiplieespPeer::NUMEXP);
                $c->add(LiplieespPeer::NUMPLIE, $numplie);
                $per = LiplieespPeer::doSelectOne($c);
                if ($per) {
                    $porleg = $per->getPorleg();
                    $portec = $per->getPortec();
                    $porfin = $per->getPorfin();
                    $porfia = $per->getPorfia();
                    $portipemp = $per->getPortipemp();
                    $minleg = $per->getMinleg();
                    $mintec = $per->getMintec();
                    $minfin = $per->getMinfin();
                    $minfia = $per->getMinfia();
                    $mintipemp = $per->getMintipemp();
                } else {
                    $porleg = 0;
                    $portec = 0;
                    $porfin = 0;
                    $porfia = 0;
                    $portipemp = 0;
                    $minleg = 0;
                    $mintec = 0;
                    $minfin = 0;
                    $minfia = 0;
                    $mintipemp = 0;
                }
                $this->lianaofe = $this->getLianaofeOrCreate();
                $this->updateLianaofeFromRequest();
                $sql = "select b.codcri,a.descri,case when b.limita is null or b.limita<>'S'  then 'NO' else 'SI' end as limit,
                    FormatoNum(b.puntua) as puntua,
                    FormatoNum(b.porcen) as porcen,
                    FormatoNum(case when f.codcri is null or f.codcri='' then 0 else f.punemp end) as punemp, 
                    FormatoNum(case when f.codcri is null or f.codcri='' then 0 else f.poremp end) as poremp,
                    0 as check,'' as observ, '9' as id
                    from liasplegcrieva a, liregofeleg c, liregofe d, lipliecrileg b
                    left outer join lianaemp e on (b.numexp=e.numexp)
                    left outer join lianaempleg f on (e.numanaemp=f.numanaemp and b.codcri=f.codcri)
                    where
                    c.numofe='$codigo' and
                    b.numexp=d.numexp and
                    c.numofe=d.numofe and
                    a.codcri=b.codcri and
                    a.codcri=c.codcri";
                H::BuscarDatos($sql, $reg);
                $this->configGridLeg($reg);
                $js = "toAjaxUpdater('divgridtec','7',getUrlModuloAjax(),'$codigo','','');";
                $output = '[["lianaofe_tipcom","' . $compra . '",""],["lianaofe_destiplic","' . $modcon . '",""],["lianaofe_tipcon","' . $bieser . '",""],
                       ["lianaofe_desclacomp","' . $desclacomp . '",""],["lianaofe_numplie","' . $numplie . '",""],["javascript","' . $js . '",""],
                       ["lianaofe_numexp","' . $numexp . '",""],["lianaofe_nompro","' . $nompro . '",""],["lianaofe_rif","' . $rif . '",""],
                       ["lianaofe_nomrepleg","' . $nomrepleg . '",""],["lianaofe_ofenro","' . $ofenro . '",""],["lianaofe_fecofe","' . $fecofe . '",""],
                       ["lianaofe_monofe","' . H::FormatoMonto($monofe) . '",""],["lianaofe_monofelet","' . $monofelet . '",""],
                       ["lianaofe_porvan","' . H::FormatoMonto($porvan) . '",""],["lianaofe_declar","' . $declar . '",""],
                       ["lianaofe_porlegp","' . H::FormatoMonto($porleg) . '",""],["lianaofe_portecp","' . H::FormatoMonto($portec) . '",""],["lianaofe_porfinp","' . H::FormatoMonto($porfin) . '",""],
                       ["lianaofe_porfiap","' . H::FormatoMonto($porfia) . '",""],["lianaofe_portipempp","' . H::FormatoMonto($portipemp) . '",""],
                       ["lianaofe_minleg","' . H::FormatoMonto($minleg) . '",""],["lianaofe_mintec","' . H::FormatoMonto($mintec) . '",""],["lianaofe_minfin","' . H::FormatoMonto($minfin) . '",""],
                       ["lianaofe_minfia","' . H::FormatoMonto($minfia) . '",""],["lianaofe_mintipemp","' . H::FormatoMonto($mintipemp) . '",""]]';
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
                $output = '[["lianaofe_nomempadm","' . $nomemp . '",""],["lianaofe_nomcaradm","' . $nomcar . '",""],["lianaofe_coduniadm","' . $coduniadm . '",""],["lianaofe_desuniadm","' . $desuniadm . '",""]]';
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
                $output = '[["lianaofe_coduniadm","' . $coduniadm . '",""],["lianaofe_desuniadm","' . $desuniadm . '",""],["","",""]]';
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
                $output = '[["lianaofe_nomempeje","' . $nomemp . '",""],["lianaofe_nomcareje","' . $nomcar . '",""],["lianaofe_coduniste","' . $coduniste . '",""],["lianaofe_desuniste","' . $desuniste . '",""]]';
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
                $output = '[["lianaofe_coduniste","' . $coduniste . '",""],["lianaofe_desuniste","' . $desuniste . '",""],["","",""]]';
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
                $output = '[["lianaofe_fecven","' . $fecven . '",""],["","",""],["","",""]]';
                break;
            case '7':
                $sw = false;
                $this->ajax = '7';
                $this->lianaofe = $this->getLianaofeOrCreate();
                $this->updateLianaofeFromRequest();
                $sql = "select b.codcri,a.descri,case when b.limita is null or b.limita<>'S'  then 'NO' else 'SI' end as limit,
                    FormatoNum(b.puntua) as puntua,
                    FormatoNum(b.porcen) as porcen,
                    FormatoNum(case when f.codcri is null or f.codcri='' then 0 else f.punemp end) as punemp, 
                    FormatoNum(case when f.codcri is null or f.codcri='' then 0 else f.poremp end) as poremp,
                    0 as check,'' as observ, '9' as id
                    from liaspteccrieva a, liregofetec c, liregofe d, lipliecritec b
                    left outer join lianaemp e on (b.numexp=e.numexp)
                    left outer join lianaemptec f on (e.numanaemp=f.numanaemp and b.codcri=f.codcri)
                    where
                    c.numofe='$codigo' and
                    b.numexp=d.numexp and
                    c.numofe=d.numofe and
                    a.codcri=b.codcri and
                    a.codcri=c.codcri";
                H::BuscarDatos($sql, $reg);
                $this->configGridTec($reg);
                $js = "toAjaxUpdater('divgridfin','8',getUrlModuloAjax(),'$codigo','','');";
                $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
                break;
            case '8':
                $sw = false;
                $this->ajax = '8';
                $this->lianaofe = $this->getLianaofeOrCreate();
                $this->updateLianaofeFromRequest();
                $sql = "select b.codcri,a.descri,case when b.limita is null or b.limita<>'S'  then 'NO' else 'SI' end as limit,
                    FormatoNum(b.puntua) as puntua,
                    FormatoNum(b.porcen) as porcen,
                    FormatoNum(case when f.codcri is null or f.codcri='' then 0 else f.punemp end) as punemp, 
                    FormatoNum(case when f.codcri is null or f.codcri='' then 0 else f.poremp end) as poremp,
                    0 as check,'' as observ, '9' as id
                    from liaspfincrieva a, liregofefin c, liregofe d, lipliecrifin b
                    left outer join lianaemp e on (b.numexp=e.numexp)
                    left outer join lianaempfin f on (e.numanaemp=f.numanaemp and b.codcri=f.codcri)
                    where
                    c.numofe='$codigo' and
                    b.numexp=d.numexp and
                    c.numofe=d.numofe and
                    a.codcri=b.codcri and
                    a.codcri=c.codcri";
                H::BuscarDatos($sql, $reg);
                $this->configGridFin($reg);
                $c = new Criteria();
                $c->add(LiregofePeer::NUMOFE, $codigo);
                $c->addJoin(LianaempPeer::NUMEXP, LiregofePeer::NUMEXP);
                $per = LianaempPeer::doSelectOne($c);
                if ($per) {
                    $porleg = $per->getPorleg();
                    $portec = $per->getPortec();
                    $porfin = $per->getPorfin();
                    $portot = $per->getPortot();
                } else {
                    $porleg = "";
                    $portec = "";
                    $porfin = "";
                    $portot = "";
                }
                $js = "toAjaxUpdater('divgridfia','9',getUrlModuloAjax(),'$codigo','','');";
                $output = '[["lianaofe_porleg","' . H::FormatoMonto($porleg) . '",""],["lianaofe_portec","' . H::FormatoMonto($portec) . '",""],
                       ["lianaofe_porfin","' . H::FormatoMonto($porfin) . '",""],["lianaofe_portot","' . H::FormatoMonto($portot) . '",""],
                       ["javascript","' . $js . '",""]]';
                break;
            case '9':
                $sw = false;
                $this->ajax = '9';
                $this->lianaofe = $this->getLianaofeOrCreate();
                $this->updateLianaofeFromRequest();
                $sql = "select b.codcomres,a.descomres,case when b.limita is null or b.limita<>'S'  then 'NO' else 'SI' end as limit,
                    FormatoNum(b.puntua) as puntua,
                    FormatoNum(b.porcen) as porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, '9' as id
                    from liccomres a, lipliecrifian b, liregofefia c, liregofe d
                    where
                    c.numofe='$codigo' and
                    b.numexp=d.numexp and
                    c.numofe=d.numofe and
                    a.codcomres=b.codcomres and
                    a.codcomres=c.codcomres";
                H::BuscarDatos($sql, $reg);
                $this->configGridFia($reg);
                $js = "toAjaxUpdater('divgridtipemp','10',getUrlModuloAjax(),'$codigo','','');";
                $output = '[["javascript","' . $js . '",""],["","",""],["","",""]]';
                break;
            case '10':
                $sw = false;
                $this->ajax = '10';
                $this->lianaofe = $this->getLianaofeOrCreate();
                $this->updateLianaofeFromRequest();
                $sql = "select b.codtipemp as codtipemp,a.desemp as destipemp,case when b.limita is null or b.limita<>'S'  then 'NO' else 'SI' end as limit,
                    FormatoNum(b.puntua) as puntua,
                    FormatoNum(b.porcen) as porcen,0 as punemp, 0 as poremp,
                    0 as check,'' as observ, '9' as id
                    from litipemp a, liplietipemp b, liregofe c
                    where
                    c.numofe='$codigo' and
                    b.numexp=c.numexp and
                    a.codemp=b.codtipemp";
                H::BuscarDatos($sql, $reg);
                $this->configGridTipemp($reg);
                $output = '[["","",""],["","",""],["","",""]]';
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
                    $porfia = $per->getPorfia();
                    $portipemp = $per->getPortipemp();
                    if (strrpos($idporcri, 'leg'))
                        $porcen = ($tporemp * $porleg) / 100;
                    elseif (strrpos($idporcri, 'tec'))
                        $porcen = ($tporemp * $portec) / 100;
                    elseif (strrpos($idporcri, 'fin'))
                        $porcen = ($tporemp * $porfin) / 100;
                    elseif (strrpos($idporcri, 'fia'))
                        $porcen = ($tporemp * $porfia) / 100;
                    elseif (strrpos($idporcri, 'tipemp'))
                        $porcen = ($tporemp * $portipemp) / 100;
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
        $this->configGridFia();
        $this->configGridTipEmp();

        $gridleg = Herramientas::CargarDatosGridv2($this, $this->obj, true);
        $gridtec = Herramientas::CargarDatosGridv2($this, $this->obj2, true);
        $gridfin = Herramientas::CargarDatosGridv2($this, $this->obj3, true);
        $gridfia = Herramientas::CargarDatosGridv2($this, $this->obj4, true);
        $gridtipemp = Herramientas::CargarDatosGridv2($this, $this->obj5, true);

        //$this->configGrid($grid[0],$grid[1]);
    }

    public function saving($clasemodelo) {
        Licitacion::SalvarGeneral($clasemodelo, 'Lianaofe', 'Numanaofe', 'Anaofe');
        $gridleg = Herramientas::CargarDatosGridv2($this, $this->obj, true);
        $gridtec = Herramientas::CargarDatosGridv2($this, $this->obj2, true);
        $gridfin = Herramientas::CargarDatosGridv2($this, $this->obj3, true);
        $gridfia = Herramientas::CargarDatosGridv2($this, $this->obj4, true);
        $gridtipemp = Herramientas::CargarDatosGridv2($this, $this->obj5, true);
        Licitacion::SalvarGridAnalisisOferta($clasemodelo, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp);
        return parent::saving($clasemodelo);
    }

    public function deleting($clasemodelo) {
        Licitacion::EliminarGridAnalisisOferta($clasemodelo);
        return parent::deleting($clasemodelo);
    }

}
