<?php

/**
 * Licitacion: Clase estática para el control de licitaciones
 *
 * @package    Roraima
 * @subpackage licitacion
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Licitacion.class.php 44443 2011-05-19 05:43:45Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Licitacion {

    public static function SalvarPliegoMod($clase, $gridart, $griddep, $gridmec, $gridact, $gridpub, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp, $tip = 'B') {
        $sql = "insert into liplieesphis (numplie,numcomint,numexp,codempadm,coduniadm,codempeje,coduniste,fecreg,dias,fecven,idioma,cosplie,resolu,fecrel,decret,fecdec,descrip,docane1,docane2,docane3,prepor,preporcar,lisicact_id,detdecmod,anapor,anaporcar,status,fecdecla,porleg,portec,porfin,porfia,portipemp,minleg,mintec,minfin,minfia,mintipemp,tipconpub)(select numplie,numcomint,numexp,codempadm,coduniadm,codempeje,coduniste,fecreg,dias,fecven,idioma,cosplie,resolu,fecrel,decret,fecdec,descrip,docane1,docane2,docane3,prepor,preporcar,lisicact_id,detdecmod,anapor,anaporcar,status,fecdecla,porleg,portec,porfin,porfia,portipemp,minleg,mintec,minfin,minfia,mintipemp,tipconpub from liplieesp where numplie='" . $clase->getNumplie() . "' and numexp='" . $clase->getNumexp() . "')";
        H::insertarRegistros($sql);
        self::SalvarGridPliego($clase, $gridart, $griddep, $gridmec, $gridact, $gridpub, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp, $tip);
    }

    public static function SalvarGridPliego($clase, $gridart, $griddep, $gridmec, $gridact, $gridpub, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp, $tip = 'B') {
        if ($tip == 'O') {
            self::SalvarGeneral($clase, 'Liplieesp', 'Numplie', 'Obpliego', 'O');
            self::SalvarGeneral($clase, 'Liplieesp', 'Numexp', 'Obexpdie', 'O');
        } else {
            self::SalvarGeneral($clase, 'Liplieesp', 'Numplie', 'Pliego');
            self::SalvarGeneral($clase, 'Liplieesp', 'Numexp', 'Expdie');
        }

        self::EliminarGridPLiegoArt($clase);
        H::EliminarGrid($clase, 'Lipliecrileg', 'NUMPLIE');
        H::EliminarGrid($clase, 'Lipliecritec', 'NUMPLIE');
        H::EliminarGrid($clase, 'Lipliecrifin', 'NUMPLIE');
        H::EliminarGrid($clase, 'Lipliecrifian', 'NUMPLIE');
        H::EliminarGrid($clase, 'Liplietipemp', 'NUMPLIE');
        self::SalvarGridPLiegoArt($clase, $gridart);
        $arrget = array('Numplie', 'Numexp');
        H::Guardar_Grid($griddep, $arrget, $clase);
        H::Guardar_Grid($gridmec, $arrget, $clase);
        H::Guardar_Grid($gridact, $arrget, $clase);
        H::Guardar_Grid($gridpub, $arrget, $clase);
        self::SalvarGridLegPlie($clase, $gridleg);
        self::SalvarGridTecPlie($clase, $gridtec);
        self::SalvarGridFinPlie($clase, $gridfin);
        self::SalvarGridFiaPlie($clase, $gridfia);
        self::SalvarGridTipEmpPlie($clase, $gridtipemp);
    }

    public static function EliminarGridPliego($clase) {
        self::EliminarGridPLiegoArt($clase);
    }

    public static function EliminarGridPLiegoArt($clase) {
        $c = new Criteria();
        $c->add(LiplieartPeer::NUMPLIE, $clase->getNumplie());
        $c->add(LiplieartPeer::NUMEXP, $clase->getNumexp());
        $per = LiplieartPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function SalvarGridPLiegoArt($clase, $gridart) {
        foreach ($gridart[0] as $reg) {
            $obj = new Liplieart();
            $obj->setNumplie($clase->getNumplie());
            $obj->setNumexp($clase->getNumexp());
            $obj->setCodart($reg['codart']);
            $obj->setCantid($reg['cantid']);
            $obj->setTipconpub($reg['tipconpub']);
            $obj->save();
        }
    }

    public static function SalvarGridOferta($clase, $gridart, $gridrgo, $gridforpag, $gridcroent, $gridleg, $gridtec, $gridfin, $gridfia) {
        self::EliminarGridOferta($clase);
        self::SalvarGridOfertaArt($clase, $gridart);
        $arrget = array('Numofe');
        H::Guardar_Grid($gridrgo, $arrget, $clase);
        H::Guardar_Grid($gridforpag, $arrget, $clase);
        // Enlazamos las formas de pago recien guardadas con los entregas/licitaciones
        foreach ($gridcroent[0] as $croent) {
            $numval = $croent['numval'];
            foreach ($gridforpag[0] as $forpag) {
                if ($forpag->getNumval() == $numval)
                    $croent['liforpagid'] = $forpag->getId();
            }
        }
        self::SalvarGridOfertaCroEnt($clase, $gridcroent);
        self::SalvarGridOfertaCriLeg($clase, $gridleg);
        self::SalvarGridOfertaCriTec($clase, $gridtec);
        self::SalvarGridOfertaCriFin($clase, $gridfin);
        self::SalvarGridOfertaCriFia($clase, $gridfia);
    }

    public static function SalvarGridOfertaArt($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Liregofedet();
            $obj->setNumofe($clase->getNumofe());
            $obj->setCodart($reg['codart']);
            $obj->setUnimed($reg['unimed']);
            $obj->setCantid($reg['cantid']);
            $obj->setPreuni($reg['preuni']);
            $obj->setMonrec($reg['monrec']);
            $obj->setSubtot($reg['subtot']);
            $obj->setTipconpub($reg['tipconpub']);
            $obj->save();
        }
    }

    public static function EliminarGridOferta($clase) {
        self::EliminarGridOfertaArt($clase);
        #self::EliminarGridOfertaRgo($clase);
        #self::EliminarGridOfertaForPag($clase);
        self::EliminarGridOfertaCroEnt($clase);
        self::EliminarGridOfertaCriLeg($clase);
        self::EliminarGridOfertaCriTec($clase);
        self::EliminarGridOfertaCriFin($clase);
        self::EliminarGridOfertaCriFia($clase);
    }

    public static function EliminarGridOfertaArt($clase) {
        $c = new Criteria();
        $c->add(LiregofedetPeer::NUMOFE, $clase->getNumofe());
        $per = LiregofedetPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridOfertaRgo($clase) {
        $c = new Criteria();
        $c->add(LiregofergoPeer::NUMOFE, $clase->getNumofe());
        $per = LiregofergoPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridOfertaForPag($clase) {
        $c = new Criteria();
        $c->add(LiforpagPeer::NUMOFE, $clase->getNumofe());
        $per = LiforpagPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridOfertaCroEnt($clase) {
        $c = new Criteria();
        $c->add(LicroentPeer::NUMOFE, $clase->getNumofe());
        $per = LicroentPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridOfertaCriLeg($clase) {
        $c = new Criteria();
        $c->add(LiregofelegPeer::NUMOFE, $clase->getNumofe());
        $per = LiregofelegPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridOfertaCriTec($clase) {
        $c = new Criteria();
        $c->add(LiregofetecPeer::NUMOFE, $clase->getNumofe());
        $per = LiregofetecPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridOfertaCriFin($clase) {
        $c = new Criteria();
        $c->add(LiregofefinPeer::NUMOFE, $clase->getNumofe());
        $per = LiregofefinPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridOfertaCrifia($clase) {
        $c = new Criteria();
        $c->add(LiregofefiaPeer::NUMOFE, $clase->getNumofe());
        $per = LiregofefiaPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function SalvarGridOfertaCroEnt($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $c = new Criteria();
            $c->add(LiforpagPeer::NUMOFE, $clase->getNumofe());
            $c->add(LiforpagPeer::NUMVAL, $reg['numval']);
            $liforpag = LiforpagPeer::doSelectOne($c);
            $obj = new Licroent();
            $obj->setNumofe($clase->getNumofe());
            $obj->setCodart($reg['codart']);
            $obj->setCantid($reg['cantid']);
            $obj->setCoduniadm($reg['coduniadm']);
            $obj->setFecent($reg['fecent']);
            $obj->setCondic($reg['condic']);
            $obj->setCantident($reg['cantident']);
            if ($liforpag)
                $obj->setLiforpagId($liforpag->getId());
            $obj->save();
        }
    }

    public static function SalvarGridOfertaCriLeg($clase, $grid) {
        foreach ($grid[0] as $reg) {
            if ($reg['check'] == '1') {
                $obj = new Liregofeleg();
                $obj->setNumofe($clase->getNumofe());
                $obj->setCodcri($reg['codcri']);
                $obj->setObserv($reg['observ']);
                $obj->save();
            }
        }
    }

    public static function SalvarGridOfertaCriTec($clase, $grid) {
        foreach ($grid[0] as $reg) {
            if ($reg['check'] == '1') {
                $obj = new Liregofetec();
                $obj->setNumofe($clase->getNumofe());
                $obj->setCodcri($reg['codcri']);
                $obj->setObserv($reg['observ']);
                $obj->save();
            }
        }
    }

    public static function SalvarGridOfertaCriFin($clase, $grid) {
        foreach ($grid[0] as $reg) {
            if ($reg['check'] == '1') {
                $obj = new Liregofefin();
                $obj->setNumofe($clase->getNumofe());
                $obj->setCodcri($reg['codcri']);
                $obj->setObserv($reg['observ']);
                $obj->save();
            }
        }
    }

    public static function SalvarGridOfertaCriFia($clase, $grid) {
        foreach ($grid[0] as $reg) {
            if ($reg['check'] == '1') {
                $obj = new Liregofefia();
                $obj->setNumofe($clase->getNumofe());
                $obj->setCodcomres($reg['codcomres']);
                $obj->setObserv($reg['observ']);
                $obj->save();
            }
        }
    }

    public static function SalvarGridAnalisisOferta($clase, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp) {
        self::EliminarGridAnalisisOferta($clase);
        self::SalvarGridAnaOfeLeg($clase, $gridleg);
        self::SalvarGridAnaOfeTec($clase, $gridtec);
        self::SalvarGridAnaOfeFin($clase, $gridfin);
        self::SalvarGridAnaOfeFia($clase, $gridfia);
        self::SalvarGridAnaOfeTipEmp($clase, $gridtipemp);
    }

    public static function EliminarGridAnalisisOferta($clase) {
        self::EliminarGridanaOfeLeg($clase);
        self::EliminarGridanaOfeTec($clase);
        self::EliminarGridanaOfeFin($clase);
        self::EliminarGridanaOfeFia($clase);
        self::EliminarGridanaOfeTipEmp($clase);
    }

    public static function EliminarGridanaOfeLeg($clase) {
        $c = new Criteria();
        $c->add(LianaofelegPeer::NUMANAOFE, $clase->getNumanaofe());
        $per = LianaofelegPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridanaOfeTec($clase) {
        $c = new Criteria();
        $c->add(LianaofetecPeer::NUMANAOFE, $clase->getNumanaofe());
        $per = LianaofetecPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridanaOfeFin($clase) {
        $c = new Criteria();
        $c->add(LianaofefinPeer::NUMANAOFE, $clase->getNumanaofe());
        $per = LianaofefinPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridanaOfeFia($clase) {
        $c = new Criteria();
        $c->add(LianaofefiaPeer::NUMANAOFE, $clase->getNumanaofe());
        $per = LianaofefiaPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridanaOfeTipEmp($clase) {
        $c = new Criteria();
        $c->add(LianaofetipempPeer::NUMANAOFE, $clase->getNumanaofe());
        $per = LianaofetipempPeer::doselect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function SalvarGridAnaOfeLeg($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lianaofeleg();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaOfeTec($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lianaofetec();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaOfeFin($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lianaofefin();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaOfeFia($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lianaofefia();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodcomres($reg['codcomres']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaOfeTipEmp($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lianaofetipemp();
            $obj->setNumanaofe($clase->getNumanaofe());
            $obj->setCodtipemp($reg['codtipemp']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridRecomen($clase, $grid) {
        self::EliminarGridRecomen($clase);
        foreach ($grid[0] as $reg) {
            $obj = new Lirecomendet();
            $obj->setNumrecofe($clase->getNumrecofe());
            $obj->setCodpro($reg['codpro']);
            $obj->setPunleg($reg['punleg']);
            $obj->setPuntec($reg['puntec']);
            $obj->setPunfin($reg['punfin']);
            $obj->setPunfia($reg['punfia']);
            $obj->setPuntipemp($reg['puntipemp']);
            $obj->setPunvan($reg['punvan']);
            $obj->setPunmin($reg['punmin']);
            $obj->setPuntot($reg['puntot']);
            $obj->save();
        }
    }

    public static function EliminarGridRecomen($clase) {
        $c = new Criteria();
        $c->add(LirecomendetPeer::NUMRECOFE, $clase->getNumrecofe());
        $per = LirecomendetPeer::doSelect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function ValidarPrebas($clase, $grid, $gridrgo, $tip = 'B') {
        if ($clase->getMonpre() <= 0)
            return $coderr = 'LI002';
        $coderr = self::ValidarGridPrebas($grid, $tip);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridRgoPrebas($clase, $gridrgo);
        return $coderr;
    }

    public static function ValidarGridPrebas($grid, $tip) {
        $coderr = '-1';

        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r->getCodart() == '')
                    return $coderr = 'LI004';
                if ($tip == 'B') {
                    if ($r->getCodCat() == '')
                        return $coderr = 'LI004';
                }
            }
        }else {
            return $coderr = 'LI003';
        }
        return $coderr;
    }

    public static function ValidarGridRgoPrebas($clase, $grid) {
        $coderr = '-1';

        if (count($grid[0]) > 0) {
            if ($clase->getMonrgo() <= 0)
                return $coderr = 'LI006';
            foreach ($grid[0] as $r) {
                if ($r->getMonrgo() <= 0)
                    return $coderr = 'LI005';
            }
        }
        return $coderr;
    }

    public static function BuscarCorrelativo($tabla, $campot, $campob, $tip = 'B') {
        $c = new Criteria();
        $per = LidefempPeer::doSelectOne($c);
        if ($tip == 'B')
            $valcod = $per->getCodifili();
        else
            $valcod = $per->getCodifiob();
        $tvalcod = strlen($valcod);
        $t = abs(8 - $tvalcod);
        eval('$num = str_pad($per->get' . ucfirst($campob) . '(),' . $t . ',"0",STR_PAD_LEFT);');
        $num = $valcod . $num;
        $val = H::GetX(ucfirst($campot), ucfirst($tabla), ucfirst($campot), $num);
        if ($val == $num)
            $valor = false;
        else
            $valor = $num;
        if ($valor) {
            eval('$per->set' . ucfirst($campob) . '($per->get' . ucfirst($campob) . '()+1);');
            $per->save();
        }
        return $valor;
    }

    public static function SalvarPrebas($clasemodelo, $grid, $gridrgo, $tip = 'B') {

        $tip == 'B' ? $cor = 'Prebas' : $cor = 'Obprebas';
        if ($clasemodelo->getNumpre() == '########') {
            $valor = Licitacion::BuscarCorrelativo('Liprebas', 'Numpre', $cor, $tip);
            if ($valor)
                $clasemodelo->setNumpre($valor);
            else
                return 'V008';
        }
        if ($clasemodelo->getStatus() == '')
            $clasemodelo->setStatus('P');
        if ($clasemodelo->getHorreg() == '')
            $clasemodelo->setHorreg(date('H:i:s'));
        if ($clasemodelo->getCodmon() == '001') {
            $clasemodelo->setValcam(0);
            $clasemodelo->setFeccam(null);
        }
        else
            $clasemodelo->setMonrec(0);

        self::EliminarGridRecPrebas($clasemodelo);
        self::SalvarGridPrebas($clasemodelo, $grid);
        $arrget = array('Numpre');
        H::Guardar_Grid($gridrgo, $arrget, $clasemodelo);
        $clasemodelo->setTipconpub($tip);
    }

    public static function EliminarPrebas($clasemodelo) {
        self::EliminarGridRecPrebas($clasemodelo);
        self::EliminarGridPrebas($clasemodelo);
        self::EliminarGridRgoPrebas($clasemodelo);
    }

    public static function EliminarGridPrebas($clasemodelo) {
        $c = new Criteria();
        $c->add(LiprebasdetPeer::NUMPRE, $clasemodelo->getNumpre());
        $per = LiprebasdetPeer::doSelect($c);
        foreach ($per as $d)
            $d->delete();
    }

    public static function EliminarGridRecPrebas($clasemodelo) {
        $c = new Criteria();
        $c->add(LiprergoPeer::NUMPRE, $clasemodelo->getNumpre());
        $per2 = LiprergoPeer::doSelect($c);
        foreach ($per2 as $f)
            $f->delete();
    }

    public static function EliminarGridRgoPrebas($clasemodelo) {
        $c = new Criteria();
        $c->add(LiprergofacPeer::NUMPRE, $clasemodelo->getNumpre());
        $per2 = LiprergofacPeer::doSelect($c);
        foreach ($per2 as $f)
            $f->delete();
    }

    public static function SalvarGridPrebas($clasemodelo, $grid) {
        foreach ($grid[0] as $reg) {
            $reg->setNumpre($clasemodelo->getNumpre());
            $reg->setStatus($clasemodelo->getStatus());
            $reg->setCodmon($clasemodelo->getCodmon());
            $reg->setValcam($clasemodelo->getValcam());
            $reg->save();
            $auxcad = explode('!', $reg->getCadena());
            foreach ($auxcad as $r) {
                $auxr = explode('_', $r);
                if (count($auxr) >= 4) {
                    $obj = new Liprergo();
                    $obj->setNumpre($clasemodelo->getNumpre());
                    $obj->setCodart($auxr[0]);
                    $obj->setCodcat($auxr[1]);
                    $obj->setMonrgo($auxr[2]);
                    $obj->setCodrgo($auxr[3]);
                    $codpar = H::GetX('Codart', 'Caregart', 'Codpar', $auxr[0]);
                    $obj->setCodpre($auxr[1] . '-' . $codpar);
                    $obj->save();
                }
            }
        }
        foreach ($grid[1] as $r)
            $r->delete();
    }

    public static function SalvarGeneral(&$clasemodelo, $tabla, $campot, $campob, $tip = 'B') {
        eval('$val2 = $clasemodelo->get' . ucfirst($campot) . '();');
        if ($val2 == "########") {
            $valor = Licitacion::BuscarCorrelativo($tabla, $campot, $campob, $tip);
            if ($valor)
                eval('$clasemodelo->set' . ucfirst($campot) . '($valor);');
            else
                return 'V008';
        }
        if ($clasemodelo->getStatus() == '')
            $clasemodelo->setStatus('P');
        if ($clasemodelo->getTipconpub() == '')
            $clasemodelo->setTipconpub($tip);
    }

    public static function SalvarSolEgr($clasemodelo, $grid, $gridrec, $griduni, $gridrgo, $tip = 'B') {
        if ($tip == 'O') {
            self::SalvarGeneral($clasemodelo, 'Lisolegr', 'Numsol', 'Obsolegr', 'O');
            $per = LidefempPeer::doSelectOne(new Criteria());
            $canuni = 0;
            if ($per->getUnitri() > 0)
                $canuni = $clasemodelo->getMonsol() / $per->getUnitri();
            $codtiplic = '';
            $sql = "select codtiplic from litiplic where canunitriobr>=$canuni order by canunitriobr limit 1";
            if (H::BuscarDatos($sql, $rs))
                $codtiplic = $rs[0]['codtiplic'];
            else {
                $sql = "select codtiplic from litiplic order by canunitribie desc limit 1";
                if (H::BuscarDatos($sql, $rs))
                    $codtiplic = $rs[0]['codtiplic'];
            }
            $clasemodelo->setCodtiplic($codtiplic);
        }
        else
            self::SalvarGeneral($clasemodelo, 'Lisolegr', 'Numsol', 'Solegr');
        $aux = explode('-', $clasemodelo->getCodmon());
        $codmon = $aux[0];
        $clasemodelo->setCodmon($codmon);
        self::EliminarSolEgr($clasemodelo);
        self::SalvarGridSolEgr($clasemodelo, $grid);
        self::SalvarGridRgoSolEgr($clasemodelo, $gridrec);
        self::SalvarGridUniSolEgr($clasemodelo, $griduni);
        self::SalvarGridRgoFacSolEgr($clasemodelo, $gridrgo);
    }

    public static function EliminarSolEgr($clasemodelo) {
        self::EliminarGridSolEgr($clasemodelo);
        self::EliminarGridRgoSolEgr($clasemodelo);
        self::EliminarGridUniSolEgr($clasemodelo);
        self::EliminarGridRgoFacSolEgr($clasemodelo);
    }

    public static function EliminarGridSolegr($clasemodelo) {
        $c = new Criteria();
        $c->add(LisolegrdetPeer::NUMSOL, $clasemodelo->getNumsol());
        $per = LisolegrdetPeer::doSelect($c);
        foreach ($per as $reg)
            $reg->delete();
    }

    public static function EliminarGridRgoSolEgr($clasemodelo) {
        $c = new Criteria();
        $c->add(LisolegrrgoPeer::NUMSOL, $clasemodelo->getNumsol());
        $per = LisolegrrgoPeer::doSelect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridUniSolEgr($clasemodelo) {
        $c = new Criteria();
        $c->add(LisolegrdirPeer::NUMSOL, $clasemodelo->getNumsol());
        $per = LisolegrdirPeer::doSelect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function EliminarGridRgoFacSolEgr($clasemodelo) {
        $c = new Criteria();
        $c->add(LisolegrrgofacPeer::NUMSOL, $clasemodelo->getNumsol());
        $per = LisolegrrgofacPeer::doSelect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function SalvarGridSolEgr($clasemodelo, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lisolegrdet();
            $obj->setNumsol($clasemodelo->getNumsol());
            $obj->setStatus($clasemodelo->getStatus());
            $obj->setCodmon($clasemodelo->getCodmon());
            $obj->setValcam($clasemodelo->getValcam());
            $obj->setCodart($reg['codart']);
            $obj->setUnimed($reg['unimed']);
            $obj->setCodcat($reg['codcat']);
            $obj->setCodpre($reg['codpre']);
            $obj->setCansol($reg['cansol']);
            $obj->setCosto($reg['costo']);
            $obj->setSubtot($reg['subtot']);
            $obj->setMonrec($reg['monrec']);
            $obj->setMontot($reg['montot']);
            $obj->setCodfin($reg['codfin']);
            $obj->setTipconpub($reg['tipconpub']);
            $obj->save();
        }
    }

    public static function SalvarGridRgoSolEgr($clasemodelo, $gridrec) {
        foreach ($gridrec[0] as $r) {
            $obj = new Lisolegrrgo();
            $obj->setNumsol($clasemodelo->getNumsol());
            $obj->setCodart($r['codart']);
            $obj->setCodcat($r['codcat']);
            $obj->setCodpre($r['codpre']);
            $obj->setCodrgo($r['codrgo']);
            $obj->setMonrgo($r['monrgo']);
            $obj->save();
        }
    }

    public static function SalvarGridUniSolEgr($clasemodelo, $griduni) {
        foreach ($griduni[0] as $r) {
            $obj = new Lisolegrdir();
            $obj->setNumsol($clasemodelo->getNumsol());
            $obj->setCodart($r['codart']);
            $obj->setCantid($r['cantid']);
            $obj->setCoduniste($r['coduniste']);
            $obj->save();
        }
    }

    public static function SalvarGridRgoFacSolEgr($clasemodelo, $grid) {
        foreach ($grid[0] as $r) {
            $obj = new Lisolegrrgofac();
            $obj->setNumsol($clasemodelo->getNumsol());
            $obj->setCodrgo($r['codrgo']);
            $obj->setMonrgo($r['monrgo']);
            $obj->save();
        }
    }

    public static function ValidarSolEgr($clase, $grid, $griduni) {
        $coderr = self::ValidarGridSolEgr($grid);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridUniSolEgr($clase, $griduni);
        return $coderr;
    }

    public static function ValidarGridSolEgr($grid) {
        $coderr = '-1';

        if (!count($grid[0]) > 0) {
            return $coderr = 'LI007';
        }
        return $coderr;
    }

    public static function ValidarGridUniSolEgr($clase, $grid) {
        $coderr = '-1';

        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r['coduniste'] == '')
                    return $coderr = 'LI009';
            }
        }else {
            return $coderr = 'LI008';
        }
        return $coderr;
    }

    public static function SalvarComInt($clasemodelo, $grid) {
        self::SalvarGeneral($clasemodelo, 'Licomint', 'Numcomint', 'Comint');
        $per = LidefempPeer::doSelectOne(new Criteria());
        $canuni = 0;
        if ($per->getUnitri() > 0)
            $canuni = $clasemodelo->getMoncom() / $per->getUnitri();
        $codtiplic = '';
        $sql = "select codtiplic from litiplic where canunitribie>=$canuni order by canunitribie limit 1";
        if (H::BuscarDatos($sql, $rs))
            $codtiplic = $rs[0]['codtiplic'];
        else {
            $sql = "select codtiplic from litiplic order by canunitribie desc limit 1";
            if (H::BuscarDatos($sql, $rs))
                $codtiplic = $rs[0]['codtiplic'];
        }
        $clasemodelo->setCodtiplic($codtiplic);
        self::EliminarGridComInt($clasemodelo);
        self::SalvarGridComInt($clasemodelo, $grid);
    }

    public static function EliminarGridComInt($clasemodelo) {
        $c = new Criteria();
        $c->add(LidetcomintPeer::NUMCOMINT, $clasemodelo->getNumcomint());
        $per = LidetcomintPeer::doSelect($c);
        foreach ($per as $r)
            $r->delete();
    }

    public static function SalvarGridComInt($clasemodelo, $grid) {
        foreach ($grid[0] as $reg) {
            if ($reg['check'] == 1) {
                $obj = new Lidetcomint();
                $obj->setNumcomint($clasemodelo->getNumcomint());
                $obj->setNumsol($reg['numsol']);
                $obj->setMontot($reg['montot']);
                $obj->setValcam($reg['valcam']);
                $obj->save();
            }
        }
    }

    public static function ValidarComInt($clase, $grid) {
        $coderr = '-1';

        if (count($grid[0]) > 0) {
            $enc = false;
            foreach ($grid[0] as $r) {
                if ($r['check'] == 1) {
                    $enc = true;
                }
            }
            if (!$enc)
                return $coderr = 'LI011';
        }else {
            return $coderr = 'LI010';
        }
        return $coderr;
    }

    public static function ValidarPliego($clase, $gridart, $griddep, $gridmec, $gridact, $gridpub, $gridleg, $gridtec, $gridfin, $gridfia, $gridtipemp) {
        $coderr = '-1';

        $valor = floatval($clase->getPorleg()) + floatval($clase->getPortec()) + floatval($clase->getPorfin()) + floatval($clase->getPorfia()) + floatval($clase->getPortipemp());

        if ($valor <> 100)
            return $coderr = 'LI017';

        $coderr = self::ValidarGridPliego($gridart);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridDepPliego($griddep);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridMecPliego($gridmec);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridActPliego($gridact);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridPubPliego($gridpub);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridLegPlie($gridleg);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridTecPlie($gridtec);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridFinPlie($gridfin);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridFiaPlie($gridfia);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridTipEmpPlie($gridtipemp);
        return $coderr;
    }

    public static function ValidarGridPliego($grid) {
        $coderr = '-1';

        if (!count($grid[0]) > 0) {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function ValidarGridDepPliego($grid) {
        $coderr = '-1';

        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r->getNumcue() == '')
                    return $coderr = 'LI013';
            }
        }else {
            #$coderr = 'LI012'; Se quito validacion para el caso de modalidad consulta de precio
        }
        return $coderr;
    }

    public static function ValidarGridMecPliego($grid) {
        $coderr = '-1';

        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r->getCodmec() == '')
                    return $coderr = 'LI014';
                if ($r->getFecsob1() == '')
                    return $coderr = 'LI014';
                if ($r->getFecsob2() == '')
                    return $coderr = 'LI014';
            }
        }else {
            # $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function ValidarGridActPliego($grid) {
        $coderr = '-1';

        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r->getDesact() == '')
                    return $coderr = 'LI015';
                if ($r->getFecdes() == '')
                    return $coderr = 'LI015';
                if ($r->getFechas() == '')
                    return $coderr = 'LI015';
            }
        }else {
            #$coderr = 'LI012';
        }
        return $coderr;
    }

    public static function ValidarGridPubPliego($grid) {
        $coderr = '-1';

        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r->getMedio() == '')
                    return $coderr = 'LI016';
                if ($r->getFecini() == '')
                    return $coderr = 'LI016';
                if ($r->getFecfin() == '')
                    return $coderr = 'LI016';
                if ($r->getDias() == '')
                    return $coderr = 'LI016';
            }
        }else {
            #$coderr = 'LI012';
        }
        return $coderr;
    }

    public static function ValidarGridLegPlie($grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            $tporcen = 0;
            $tpuntua = 0;
            foreach ($grid[0] as $r) {
                if ($r['porcen'] == '')
                    return $coderr = 'LI018';
                if ($r['puntua'] == '')
                    return $coderr = 'LI018';
                $tporcen+=$r['porcen'];
                $tpuntua+=$r['puntua'];
            }
            if ($tporcen <> 100 || $tpuntua <> 100)
                return $coderr = 'LI019';
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function SalvarGridLegPlie($clasemodelo, $grid) {
        foreach ($grid[0] as $r) {
            $obj = new LiplieCriLeg();
            $obj->setNumplie($clasemodelo->getNumplie());
            $obj->setNumexp($clasemodelo->getNumexp());
            $obj->setCodcri($r['codcri']);
            $obj->setPuntua($r['puntua']);
            $obj->setPorcen($r['porcen']);
            if ($r['limit'] == 1)
                $obj->setLimita('S');
            else
                $obj->setLimita('N');
            $obj->save();
        }
    }

    public static function ValidarGridTecPlie($grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            $tporcen = 0;
            $tpuntua = 0;
            foreach ($grid[0] as $r) {
                if ($r['porcen'] == '')
                    return $coderr = 'LI018';
                if ($r['puntua'] == '')
                    return $coderr = 'LI018';
                $tporcen+=$r['porcen'];
                $tpuntua+=$r['puntua'];
            }
            if ($tporcen <> 100 || $tpuntua <> 100)
                return $coderr = 'LI019';
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function SalvarGridTecPlie($clasemodelo, $grid) {
        foreach ($grid[0] as $r) {
            $obj = new LiplieCriTec();
            $obj->setNumplie($clasemodelo->getNumplie());
            $obj->setNumexp($clasemodelo->getNumexp());
            $obj->setCodcri($r['codcri']);
            $obj->setPuntua($r['puntua']);
            $obj->setPorcen($r['porcen']);
            if ($r['limit'] == 1)
                $obj->setLimita('S');
            else
                $obj->setLimita('N');
            $obj->save();
        }
    }

    public static function ValidarGridFinPlie($grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            $tporcen = 0;
            $tpuntua = 0;
            foreach ($grid[0] as $r) {
                if ($r['porcen'] == '')
                    return $coderr = 'LI018';
                if ($r['puntua'] == '')
                    return $coderr = 'LI018';
                $tporcen+=$r['porcen'];
                $tpuntua+=$r['puntua'];
            }
            if ($tporcen <> 100 || $tpuntua <> 100)
                return $coderr = 'LI019';
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function SalvarGridFinPlie($clasemodelo, $grid) {
        foreach ($grid[0] as $r) {
            $obj = new LiplieCriFin();
            $obj->setNumplie($clasemodelo->getNumplie());
            $obj->setNumexp($clasemodelo->getNumexp());
            $obj->setCodcri($r['codcri']);
            $obj->setPuntua($r['puntua']);
            $obj->setPorcen($r['porcen']);
            if ($r['limit'] == 1)
                $obj->setLimita('S');
            else
                $obj->setLimita('N');
            $obj->save();
        }
    }

    public static function ValidarGridFiaPlie($grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            $tporcen = 0;
            $tpuntua = 0;
            foreach ($grid[0] as $r) {
                if ($r['porcen'] == '')
                    return $coderr = 'LI018';
                if ($r['puntua'] == '')
                    return $coderr = 'LI018';
                if ($r['empresa'] == '')
                    return $coderr = 'LI018';
                if ($r['fecemi'] == '')
                    return $coderr = 'LI018';
                if ($r['fecven'] == '')
                    return $coderr = 'LI018';
                $tporcen+=$r['porcen'];
                $tpuntua+=$r['puntua'];
            }
            if ($tporcen <> 100 || $tpuntua <> 100)
                return $coderr = 'LI019';
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function SalvarGridFiaPlie($clasemodelo, $grid) {
        foreach ($grid[0] as $r) {
            $obj = new LiplieCriFian();
            $obj->setNumplie($clasemodelo->getNumplie());
            $obj->setNumexp($clasemodelo->getNumexp());
            $obj->setCodcomres($r['codcomres']);
            $obj->setPuntua($r['puntua']);
            $obj->setPorcen($r['porcen']);
            $obj->setEmpresa($r['empresa']);
            $obj->setFecemi($r['fecemi']);
            $obj->setFecven($r['fecven']);
            if ($r['limit'] == 1)
                $obj->setLimita('S');
            else
                $obj->setLimita('N');
            $obj->save();
        }
    }

    public static function ValidarGridTipEmpPlie($grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            $tporcen = 0;
            $tpuntua = 0;
            foreach ($grid[0] as $r) {
                if ($r['porcen'] == '')
                    return $coderr = 'LI018';
                if ($r['puntua'] == '')
                    return $coderr = 'LI018';
                if ($r['fecemi'] == '')
                    return $coderr = 'LI018';
                if ($r['fecven'] == '')
                    return $coderr = 'LI018';
                $tporcen+=$r['porcen'];
                $tpuntua+=$r['puntua'];
            }
            if ($tporcen <> 100 || $tpuntua <> 100)
                return $coderr = 'LI019';
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function SalvarGridTipEmpPlie($clasemodelo, $grid) {
        foreach ($grid[0] as $r) {
            $obj = new LiplieTipEmp();
            $obj->setNumplie($clasemodelo->getNumplie());
            $obj->setNumexp($clasemodelo->getNumexp());
            $obj->setCodtipemp($r['codtipemp']);
            $obj->setPuntua($r['puntua']);
            $obj->setPorcen($r['porcen']);
            $obj->setFecemi($r['fecemi']);
            $obj->setFecven($r['fecven']);
            if ($r['limit'] == 1)
                $obj->setLimita('S');
            else
                $obj->setLimita('N');
            $obj->save();
        }
    }

    public static function ValidarRegEmp($clase, $grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r->getCodpro() == '')
                    return $coderr = 'LI020';
                if ($r->getNomrepleg() == '')
                    return $coderr = 'LI020';
                if ($r->getFecret() == '')
                    return $coderr = 'LI020';
            }
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function ValidarRegEmpOfe($clase, $grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            $enc = false;
            foreach ($grid[0] as $r) {
                if ($r['fecofe'] == '')
                    return $coderr = 'LI020';
                if ($r['montot'] == '')
                    return $coderr = 'LI020';
                if ($r['precal'] == 1) {
                    $enc = true;
                }
            }
            if (!$enc)
                return $coderr = 'LI021';
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function ValidarOferta($clase, $gridart, $gridforpag) {
        $coderr = '-1';

        $coderr = self::ValidarGridArtOfer($gridart);
        if ($coderr <> '-1')
            return $coderr;
        $coderr = self::ValidarGridForPagOfer($gridforpag);
        return $coderr;
    }

    public static function ValidarGridArtOfer($grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r['preuni'] == '')
                    return $coderr = 'LI020';
                if ($r['monrec'] == '' && $r['monrec'] <> 0 && $r['monrec'] <> '0,00')
                    return $coderr = 'LI020';
            }
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function ValidarGridForPagOfer($grid) {
        $coderr = '-1';
        if (count($grid[0]) > 0) {
            foreach ($grid[0] as $r) {
                if ($r->getDesant() == '')
                    return $coderr = 'LI020';
                if ($r->getMontot() == '')
                    return $coderr = 'LI020';
                if ($r->getSubtot() == '')
                    return $coderr = 'LI020';
            }
        }else {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function ValidarGridRecOfe($clase, $grid) {
        $coderr = '-1';
        if (!count($grid[0]) > 0) {
            $coderr = 'LI012';
        }
        return $coderr;
    }

    public static function SalvarDeclar($clase, $grid) {
        $coderr = '-1';
        foreach ($grid[0] as $r) {
            if ($r['check'] == 1) {
                $clase->setNumdoc($r['numdoc']);
                break;
            }
        }
        if ($clase->getNumdoc() == '')
            return $coderr = 'LI022';
        $sql = "insert into liasigdechis (select lisicact_id,fecdecla,detdecmod,anapor,anaporcar,status,numdoc,tabla,numdec 
               from liasigdec where tabla='" . $clase->getTabla() . "' and numdoc='" . $clase->getNumdoc() . "')";
        H::insertarRegistros($sql);
        H::EliminarGrid($clase, 'Liasigdec', 'NUMDEC');
        self::SalvarGeneral($clase, 'Liasigdec', 'Numdec', 'Numdec');
        $clase->setStatus('A');
        $clase->save();
        $tabla = $clase->getTabla();
        $numdoc = $clase->getNumdoc();
        if ($tabla == 'liprebas')
            $campo = array('aprpor', 'cargoapr', 'numpre');
        elseif ($tabla == 'limemoran')
            $campo = array('anapor', 'anaporcar', 'numemo');
        elseif ($tabla == 'liptocue')
            $campo = array('anapor', 'anaporcar', 'numptocue');
        elseif ($tabla == 'lisolegr')
            $campo = array('aprpor', 'cargoapr', 'numsol');
        elseif ($tabla == 'licomint')
            $campo = array('aprpor', 'cargoapr', 'numcomint');
        elseif ($tabla == 'liplieesp')
            $campo = array('anapor', 'anaporcar', 'numplie');
        elseif ($tabla == 'liregofe')
            $campo = array('anapor', 'cargoana', 'numofe');
        elseif ($tabla == 'lianaofe')
            $campo = array('anapor', 'cargoana', 'numanaofe');
        elseif ($tabla == 'lirecomen')
            $campo = array('anapor', 'cargoana', 'numrecofe');
        elseif ($tabla == 'liptocuecon')
            $campo = array('anapor', 'cargoana', 'numptocuecon');
        elseif ($tabla == 'linotific')
            $campo = array('anapor', 'cargoana', 'numnotif');
        elseif ($tabla == 'licontrat')
            $campo = array('anapor', 'anaporcar', 'numcont');
        elseif ($tabla == 'liordcom')
            $campo = array('anapor', 'anaporcar', 'numord');
        $sql = "update $tabla set lisicact_id=coalesce(" . $clase->getLisicactId() . ",null),fecdecla='" . $clase->getFecdecla() . "',detdecmod='" . $clase->getDetdecmod() . "',
                                    $campo[0]='" . $clase->getAnapor() . "',$campo[1]='" . $clase->getAnaporcar() . "'
                                    where $campo[2]='$numdoc'";
        H::insertarRegistros($sql);
        return $coderr;
    }

    public static function SalvarOrdenCompra($clase, $gridpro, $gridart, $gridrgo, $gridforpag, $gridcroent, $gridfia) {
        self::SalvarGeneral($clase, 'Liordcom', 'Numord', 'ordcom');
        H::EliminarGrid($clase, 'Liordcomsolegr', 'NUMORD');
        H::EliminarGrid($clase, 'Liordcomdet', 'NUMORD');
        H::EliminarGrid($clase, 'Liordcomrgo', 'NUMORD');
        H::EliminarGrid($clase, 'Liordcomforpag', 'NUMORD');
        H::EliminarGrid($clase, 'Liordcomcroent', 'NUMORD');
        H::EliminarGrid($clase, 'Liordcomfia', 'NUMORD');
        self::SalvarGridOrdenPro($clase, $gridpro);
        self::SalvarGridOrdenArt($clase, $gridart);
        self::SalvarGridOrdenRgo($clase, $gridrgo);
        self::SalvarGridOrdenForPag($clase, $gridforpag);
        self::SalvarGridOrdenCroEnt($clase, $gridcroent);
        self::SalvarGridOrdenCriFia($clase, $gridfia);
    }

    public static function SalvarGridOrdenArt($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Liordcomdet();
            $obj->setNumord($clase->getNumord());
            $obj->setCodart($reg['codart']);
            $obj->setUnimed($reg['unimed']);
            $obj->setCantid($reg['cantid']);
            $obj->setPreuni($reg['preuni']);
            $obj->setMonrec($reg['monrec']);
            $obj->setSubtot($reg['subtot']);
            $obj->save();
        }
    }

    public static function SalvarGridOrdenPro($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Liordcomsolegr();
            $obj->setNumord($clase->getNumord());
            $obj->setNumcomint($clase->getNumcomint());
            $obj->setNumsol($reg['numsol']);
            $obj->setCodpre($reg['codpre']);
            $obj->save();
        }
    }

    public static function SalvarGridOrdenRgo($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Liordcomrgo();
            $obj->setNumord($clase->getNumord());
            $obj->setCodrgo($reg['codrgo']);
            $obj->setMonrgo($reg['monrgo']);
            $obj->save();
        }
    }

    public static function SalvarGridOrdenForPag($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Liordcomforpag();
            $obj->setNumord($clase->getNumord());
            $obj->setDesant($reg['desant']);
            $obj->setPorant($reg['porant']);
            $obj->setMontot($reg['montot']);
            $obj->setMonrec($reg['monrec']);
            $obj->setSubtot($reg['subtot']);
            $obj->setPoramoant($reg['poramoant']);
            $obj->setNetpag($reg['netpag']);
            $obj->setFecant($reg['fecant']);
            $obj->setCondic($reg['condic']);
            $obj->save();
        }
    }

    public static function SalvarGridOrdenCroEnt($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Liordcomcroent();
            $obj->setNumord($clase->getNumord());
            $obj->setCodart($reg['codart']);
            $obj->setCantid($reg['cantid']);
            $obj->setCoduniadm($reg['coduniadm']);
            $obj->setFecent($reg['fecent']);
            $obj->setCondic($reg['condic']);
            $obj->save();
        }
    }

    public static function SalvarGridOrdenCriFia($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Liordcomfia();
            $obj->setNumord($clase->getNumord());
            $obj->setCodcomres($reg['codcomres']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function ValidarGridRegFiaCont($clase, $grid) {
        if (count($grid[0]) == 0)
            return 'LI081';

        $c = new Criteria();
        $c->add(LiregofefiaPeer::NUMOFE, $clase->getNumofe());
        $reg_liregofefia = LiregofefiaPeer::doSelect($c);

        $count_regfiacont = 0;

        foreach ($grid[0] as $reg) {
            $liregofefia = $reg->getLiregofefia();
            if ($liregofefia) {
                $count_regfiacont++;
            }
        }
        if ($count_regfiacont != count($reg_liregofefia))
            return 'LI080';

//      foreach($grid[0] as $reg){
//        $codcomres = $reg->getLiccomres();
//        if(!($codcomres && $reg->getCodcomres() && $reg->getEmpresa() && $reg->getFecemi() && $reg->getFecven())) return 'LI081';
//      }

        return -1;
    }

    public static function SalvarGridRegFiaCont($clase, $grid) {

        foreach ($grid[0] as $reg) {
            $codcomres = $reg->getLiccomres();
            if (($codcomres && $reg->getCodcomres() && $reg->getEmpresa() && $reg->getFecemi() && $reg->getFecven())) {
                $reg->setNumcont($clase->getNumcont());
                $liregofefia = $reg->getLiregofefia();
                if ($liregofefia) {
                    $reg->setCodcomres($liregofefia->getCodcomres());
                    $reg->setPorcen($liregofefia->getPorcentaje());
                    $reg->setEmpresa($liregofefia->getEmpresa());
                    $reg->setFecemi($liregofefia->getFecemi());
                    $reg->setFecven($liregofefia->getFecven());
                    $reg->save();
                } else {
                    $reg->save();
                }
            }
        }

        return -1;
    }

    public static function ValidarGridRegValCont($clase, $grid) {
        $grid = $grid[0];
        foreach ($grid as $reg) {

            if (!$reg->getLiregofedet())
                return 'LI082';

            if (!($reg->getCantidvalu() > 0 && $reg->getCantidvalu() <= $reg->getCantid()))
                return 'LI082';
        }

        return -1;
    }

    public static function SalvarGridRegValCont($clase, $grid) {
        $grid = $grid[0];
        foreach ($grid as $reg) {

            if (!$reg->getId()) {

                $liregofedet = $reg->getLiregofedet();
                $reg->setNumval($clase->getNumval());
                $reg->setCodart($liregofedet->getCodart());
                $reg->setUnimed($liregofedet->getUnimed());
                $reg->setCantid($liregofedet->getCantid());
                $reg->setPreuni($liregofedet->getPreuni());
                $reg->setMonrec($liregofedet->getMonrec());
                $reg->setSubtot($liregofedet->getSubtot());
                $reg->setSubtotvalu($reg->getCantidvalu() * $liregofedet->getPreuni());

                $reg->save();
            }
        }

        return -1;
    }

    public static function ValidarGridRegInsVal($clase, $grid) {
        $grid = $grid[0];
        foreach ($grid as $reg) {

            if (!$reg->getLidetparval())
                return 'LI082';

            if (!($reg->getCantidins() > 0 && $reg->getCantidins() <= $reg->getCantid()))
                return 'LI082';
        }

        return -1;
    }

    public static function SalvarGridRegInsVal($clase, $grid) {
        $grid = $grid[0];
        foreach ($grid as $reg) {

            if (!$reg->getId()) {

                $lidetparval = $reg->getLidetparval();
                $reg->setNumins($clase->getNumins());
                $reg->setSubtotins($reg->getCantidvalu() * $lidetparval->getPreuni());

                $reg->save();
            }
        }

        return -1;
    }

    public static function ValidarGridRegCroEntCont($clase, $grid) {
        $grid = $grid[0];
        foreach ($grid as $reg) {

            if (!$reg->getLicroent())
                return 'LI082';

            if (!($reg->getCantidrec() > 0 && $reg->getCantidrec() <= $reg->getCantid()))
                return 'LI082';
        }

        return -1;
    }

    public static function SalvarGridRegCroEntCont($clase, $grid) {
        $grid = $grid[0];
        foreach ($grid as $reg) {

            if (!$reg->getId()) {

                $licroent = $reg->getLicroent();

                $reg->setNument($clase->getNument());
                $reg->setCodart($licroent->getCodart());
                $reg->setCantid($licroent->getCantid());
                $reg->setCoduniadm($licroent->getCoduniadm());
                $reg->setFecent($licroent->getFecent());
                $reg->setCondic($licroent->getCondic());

                $reg->save();
            }
        }

        return -1;
    }

    public static function SalvarGridAnalisisEmpresa($clase, $gridleg, $gridtec, $gridfin) {
        self::EliminarGridAnalisisEmpresa($clase);
        self::SalvarGridAnaEmpLeg($clase, $gridleg);
        self::SalvarGridAnaEmpTec($clase, $gridtec);
        self::SalvarGridAnaEmpFin($clase, $gridfin);
    }

    public static function EliminarGridAnalisisEmpresa($clase) {
        H::EliminarGrid($clase, 'Lianaempleg', 'NUMANAEMP');
        H::EliminarGrid($clase, 'Lianaemptec', 'NUMANAEMP');
        H::EliminarGrid($clase, 'Lianaempfin', 'NUMANAEMP');
    }

    public static function SalvarGridAnaEmpLeg($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lianaempleg();
            $obj->setNumanaemp($clase->getNumanaemp());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaEmpTec($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lianaemptec();
            $obj->setNumanaemp($clase->getNumanaemp());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridAnaEmpFin($clase, $grid) {
        foreach ($grid[0] as $reg) {
            $obj = new Lianaempfin();
            $obj->setNumanaemp($clase->getNumanaemp());
            $obj->setCodcri($reg['codcri']);
            $obj->setPunemp($reg['punemp']);
            $obj->setPoremp($reg['poremp']);
            $obj->setObserv($reg['observ']);
            $obj->save();
        }
    }

    public static function SalvarGridRegActasFianzas($clase, $gridactas) {
        $grid = $gridactas[0];

        foreach ($grid as $reg) {

            if ($reg->getNumact()) {

                $reg->setNumcont($clase->getNumcont());

                $reg->save();
            }
        }

        return -1;
    }

    public static function SalvarGridRegForPag($clase, $grid) {

        foreach ($grid[0] as $reg) {
            $forpag = $reg->getLiforpag();
            if ($forpag && !$reg->getId()) {
                $reg->setNumcont($clase->getNumcont());

                $reg->setLiforpagId($forpag->getId());
                $reg->setDesant($forpag->getDesant());
                $reg->setFecant($forpag->getSubtot());
                $reg->setPorant($forpag->getPorant());
                $reg->setMontot($forpag->getMontot());
                $reg->setMonrec($forpag->getMonrec());
                $reg->setPoramoant($forpag->getPoramoant());
                $reg->setNetpag($forpag->getNetpag());
                $reg->setSubtot($forpag->getSubtot());
                $reg->setFecant($forpag->getFecant());
                $reg->setCondic($forpag->getCondic());
                $reg->setTipconpub($forpag->getTipconpub());

                $reg->save();
            } else {
                $reg->save();
            }
        }

        return -1;
    }

    public static function SalvarGridRegActasForPag($clase, $gridactas) {
        $grid = $gridactas[0];

        foreach ($grid as $reg) {

            if ($reg->getNumact()) {

                $reg->setNumcont($clase->getNumcont());

                $reg->save();
            }
        }

        return -1;
    }

    public static function SalvarGridRegActasCroEnt($clase, $gridactas) {
        $grid = $gridactas[0];

        foreach ($grid as $reg) {

            if ($reg->getNumact()) {

                $reg->setNument($clase->getNument());

                $reg->save();
            }
        }

        return -1;
    }

    public static function SalvarGridRegActas($clase, $gridactas, $campo) {
        $grid = $gridactas[0];

        foreach ($grid as $reg) {

            if ($reg->getNumact()) {

                $getcampo = 'get' . $campo;
                $setcampo = 'set' . $campo;

                $reg->$setcampo($clase->$getcampo());

                $reg->save();
            }
        }

        return -1;
    }

    public static function SalvarContrato($clasemodelo, $gridart, $gridrgo, $gridforpag, $gridcroent, $gridfia) {
        $arts = $gridart[0];

        foreach ($arts as $art) {
            $liregcondet = new Liregcondet();
            $liregcondet->setNumcont($clasemodelo->getNumcont());
            $liregcondet->setLiregofedetId($art->getId());
            foreach ($campos = array('codart', 'unimed', 'cantid', 'preuni', 'monrec', 'subtot', 'tipconpub') as $campo) {
                $setcampo = 'set' . ucfirst($campo);
                $getcampo = 'get' . ucfirst($campo);
                $liregcondet->$setcampo($art->$getcampo());
            }
            $liregcondet->save();
        }

        $rgos = $gridrgo[0];

        foreach ($rgos as $rgo) {
            $liregconrgo = new Liregconrgo();
            $liregconrgo->setNumcont($clasemodelo->getNumcont());
            foreach ($campos = array('Codrgo', 'Monrgo', 'Tipconpub') as $campo) {
                $setcampo = 'set' . ucfirst($campo);
                $getcampo = 'get' . ucfirst($campo);
                $liregcondet->$setcampo($rgo->$getcampo());
            }
            $liregcondet->save();
        }


        $forpags = $gridforpag[0];

        foreach ($forpags as $forpag) {
            $liregforpagcont = new Liregforpagcont();
            $liregforpagcont->setNumcont($clasemodelo->getNumcont());
            $liregforpagcont->setLiforpagId($forpag->getId());
            foreach ($campos = array('desant', 'porant', 'montot', 'monrec', 'subtot', 'poramoant', 'netpag', 'fecant', 'condic', 'tipconpub', 'numval') as $campo) {
                $setcampo = 'set' . ucfirst($campo);
                $getcampo = 'get' . ucfirst($campo);
                $liregforpagcont->$setcampo($forpag->$getcampo());
            }
            $liregforpagcont->save();
        }


        $croents = $gridcroent[0];

        foreach ($croents as $croent) {
            $lidetcroentcontob = new Lidetcroentcontob();
            $lidetcroentcontob->setNumcont($clasemodelo->getNumcont());
            $lidetcroentcontob->setLicroentId($croent->getId());
            foreach ($campos = array('codart', 'cantid', 'coduniadm', 'fecentcont', 'fecent', 'condic', 'cantidrec', 'fecrec', 'observacion', 'tipconpub', 'numval') as $campo) {
                $setcampo = 'set' . ucfirst($campo);
                $getcampo = 'get' . ucfirst($campo);
                $lidetcroentcontob->$setcampo($croent->$getcampo());
            }
            $lidetcroentcontob->save();
        }

        $fianzas = $gridfia[0];

        foreach ($fianzas as $fianza) {
            $liregfiacont = new Liregfiacont();
            $liregfiacont->setNumcont($clasemodelo->getNumcont());
            $liregfiacont->setLiregofefiaId($fianza->getId());
            foreach ($campos = array('codcomres', 'porcen', 'empresa', 'fecemi', 'fecven', 'observ') as $campo) {
                $setcampo = 'set' . ucfirst($campo);
                $getcampo = 'get' . ucfirst($campo);
                $liregfiacont->$setcampo($croent->$getcampo());
            }
            $liregfiacont->save();
        }
    }

    public static function SalvarModificacionContrato($clasemodelo, $gridart, $gridforpag, $gridcroent) {
        // Partidas
        $gridart_del = $gridart[1];
        $gridart = $gridart[0];
        foreach ($gridart as $art) {
            if ($art->getCantidaum() > 0 || $art->getCantiddis() > 0 || $art->getPreunirec() > 0) {
                $art->setNummod($clasemodelo->getNummod());
                $art->save();
                $liregcondet = $art->getLiregcondet();
                if ($liregcondet) {
                    $liregcondet->setCantidaum($liregcondet->getCantidaum() + $art->getCantidaum());
                    $liregcondet->setCantiddis($liregcondet->getCantiddis() + $art->getCantiddis());
                    $liregcondet->setPreunirec($art->getPreunirec());
                    $liregcondet->setCantidtot($liregcondet->getCantid() + $liregcondet->getCantidaum() - $liregcondet->getCantiddis());
                    $liregcondet->setSubtot($liregcondet->getCantidtot() * ($liregcondet->getPreunirec() > 0 ? $liregcondet->getPreunirec() : $liregcondet->getPreuni()));
                    $liregcondet->save();
                } else {
                    $liregcondet = new Liregcondet();
                    $liregcondet->setNumcont($clasemodelo->getNumcont());
                    foreach ($campos = array('codart', 'unimed', 'cantid', 'preuni', 'monrec', 'cantidaum', 'cantiddis', 'preunirec', 'monrecrec', 'cantidadd', 'preuniadd', 'monrecadd', 'cantidtot', 'subtot', 'tipconpub') as $campo) {
                        $setcampo = 'set' . ucfirst($campo);
                        $getcampo = 'get' . ucfirst($campo);
                        $liregcondet->$setcampo($art->$getcampo());
                    }
                    $liregcondet->save();
                }
            }
        }
        foreach ($gridart_del as $art_del) {
            $liregcondet = $art_del->getLiregcondet();
            if ($liregcondet)
                $liregcondet->delete();
        }

        // Formas de Pago
        $gridforpag_del = $gridforpag[1];
        $gridforpag = $gridforpag[0];
        foreach ($gridforpag as $forpag) {
            if (true) {
                $forpag->setNummod($clasemodelo->getNummod());
                $forpag->save();
                $liregforpagcont = $forpag->getLiregforpagcont();
                if (!$liregforpagcont)
                    $liregforpagcont = new Liregforpagcont();
                $liregforpagcont->setNumcont($clasemodelo->getNumcont());
                foreach ($campos = array('desant', 'porant', 'montot', 'monrec', 'subtot', 'poramoant', 'netpag', 'fecant', 'condic', 'tipconpub', 'numval') as $campo) {
                    $setcampo = 'set' . ucfirst($campo);
                    $getcampo = 'get' . ucfirst($campo);
                    $liregforpagcont->$setcampo($forpag->$getcampo());
                }
                $liregforpagcont->save();
            }
        }
        foreach ($gridforpag_del as $forpag_del) {
            $liregforpagcont = $forpag_del->getLiregforpagcont();
            if ($liregforpagcont)
                $liregforpagcont->delete();
        }

        // Cronograma Entregas
        $gridcroent_del = $gridcroent[1];
        $gridcroent = $gridcroent[0];
        foreach ($gridcroent as $croent) {
            if (true) {
                $croent->setNummod($clasemodelo->getNummod());
                $croent->save();
                $lidetcroentcontob = $croent->getLidetcroentcontob();
                if (!$lidetcroentcontob)
                    $lidetcroentcontob = new Lidetcroentcontob();
                $lidetcroentcontob->setNumcont($clasemodelo->getNumcont());
                foreach ($campos = array('codart', 'cantid', 'coduniadm', 'fecentcont', 'fecent', 'condic', 'cantidrec', 'fecrec', 'observacion', 'tipconpub', 'numval') as $campo) {
                    $setcampo = 'set' . ucfirst($campo);
                    $getcampo = 'get' . ucfirst($campo);
                    $lidetcroentcontob->$setcampo($croent->$getcampo());
                }
                $lidetcroentcontob->save();
            }
        }
        foreach ($gridcroent_del as $croent_del) {
            $lidetcroentcontob = $croent_del->getLidetcroentcontob();
            if ($lidetcroentcontob)
                $lidetcroentcontob->delete();
        }
    }

    public static function salvarComisionLicitacion($licomlic, $grid) {
        $grid_mod = $grid[0];
        $grid_del = $grid[1];
        $licomlic->save();
        foreach ($grid_mod as $mod) {
            $mod->setLicomlicId($licomlic->getId());
            $mod->save();
        }

        foreach ($grid_del as $del) {
            $del->delete();
        }
    }

    public static function grabarResponsablesUnidad($lidatste, $grid) {
        $grid_grab = $grid[0];
        $grid_elim = $grid[1];

        foreach ($grid_grab as $g) {
            if (!$g->getId()) {
                $lidatstedet = new Lidatstedet();
                $lidatstedet->setId($g->getId());
                $lidatstedet->setCoduniste($lidatste->getCoduniste());
                $lidatstedet->setCodemp($g->getCodemp());
                $lidatstedet->setNomemp($g->getNomemp());
                $lidatstedet->setNomcar($g->getNomcar());
                $lidatstedet->setResolu($g->getResolu());
                $lidatstedet->setFecres($g->getFecres());
                $lidatstedet->save();
            }
        }

        foreach ($grid_elim as $g) {
            $g->delete();
        }
    }

}

?>
