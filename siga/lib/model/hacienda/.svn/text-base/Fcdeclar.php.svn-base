<?php

/**
 * Subclass for representing a row from the 'fcdeclar'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdeclar.php 32925 2009-09-10 13:11:09Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcdeclar extends BaseFcdeclar {

  protected $gridactcom = array();
  protected $griddisdeu = array();
  protected $edodecstatus = "";
  protected $edodecgrid = "";
  protected $edodescripcion = "";
  protected $rifrep = "";
  protected $rifrepcon = "";
  protected $check = "0";
  protected $montopag = 0;
  protected $monpag = 0;
  protected $montopagcon = 0;
  protected $saldo = 0;
  protected $totalmon = 0;
  protected $nomcon = "";
  protected $dircon = "";
  protected $naccon = "";
  protected $tipcon = "";
  protected $nomconrep = "";
  protected $dirconrep = "";
  protected $nacconrep = "";
  protected $tipconrep = "";
  protected $fecfin = "";
  protected $edodeu = "";
  protected $coduso = "";
  protected $griddeuda = array();
  protected $grid = array();
  protected $gridmulta = array();
  protected $fportion = "";
  protected $tippro = "";
  protected $fechainicio = "";
  protected $fechafin = "";
  protected $fuente = "";
  protected $fuentef = "";
  protected $tipesp = "";
  protected $serapui = "";
  protected $serapuf = "";
  protected $tipapu = "";
  protected $anohasta = "";
  protected $anodesde = "";
  protected $zonadesde = "";
  protected $zonahasta = "";
  protected $deszon = "";
  protected $deszonh = "";
  protected $totalcon = "0,00";
  protected $totalter = "0,00";
  protected $usodesde = "";
  protected $usohasta = "";
  protected $desuso = "";
  protected $desusoh = "";
  protected $mtoaforo = "0,00";
  protected $fingreso = "";
  protected $vpago = "";
  protected $nroreg = 0;
  protected $mondif = "";
  protected $montotpag = "";
  protected $montocont = "";
  protected $saldototal = "";
  protected $planilla = "";
  protected $conpag = "";
  protected $regpag = "";
  protected $descuento = "";
  protected $prontopago = "";
  protected $estatus = "";
  protected $fecv = "";
  protected $fecu = "";
  protected $edad = "";
  protected $mensaje = "";
  protected $montoimp = "0,00";
  protected $montoreb = "0,00";
  protected $montoexo = "0,00";
  protected $montodcl = "0,00";
  protected $totmondec = "0,00";
  protected $observacion = "";
  protected $capitalsoc = "";
  protected $estacion = "";
  protected $lafuente = "";
  protected $primeravez = "";
  protected $botones = "";
  protected $numreg = "";
  protected $ut = "";
  protected $destip = "";
  protected $semdia = "";
  protected $stsdec = "";
  protected $totdeu = "0,00";
  protected $tottot="0,00";
  protected $totmon="0,00";
  protected $totmor="0,00";
  protected $sumfue="";
  protected $estapag="";
  protected $fechapag="";
  protected $funcipag="";

  public function afterHydrate() {
    $c = new Criteria();
    $c->add(FcsollicPeer::STALIC, 'V');
    $c->add(FcsollicPeer::NUMLIC, self::getNumsol());
    $fcsollic = FcsollicPeer::doSelectOne($c);

    if ($fcsollic) {
      $this->destiplic = Herramientas::getX_vacio('codtiplic', 'fctiplic', 'destiplic', $fcsollic->getCodtiplic());
      $this->rifrep = $fcsollic->getRifrep();
      $this->nomneg = $fcsollic->getNomneg();
    }
    
    if (self::getEdodec() == 'P') {
      $this->edodecstatus = "PAGADA";
    } else {
      if (H::dateDiff('d', self::getFecven(), date('Y-m-d')) <= 0) {
        $this->edodecstatus = "VIGENTE";
      } else {
        $this->edodecstatus = "VENCIDA";
      }
    }
    
     $c = new Criteria();
    $c->add(FcfueprePeer::CODFUE, self::getFueing());
    $fcfuepr = FcfueprePeer::doSelectOne($c);
    if ($fcfuepr)
     $this->sumfue=$fcfuepr->getSumfue();
    
  }

  public function getRifrepcon() {
    $numdec = substr(self::getNumdec(), 0, 2);
    $cv = new Criteria();
    if ($numdec == 'VH') {
      $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
      $reg = FcregvehPeer::doSelectOne($cv);
    } else if ($numdec != 'VH') {
      $cv->add(FcreginmPeer::NROINM, trim(self::getNumref()));
      $reg = FcreginmPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getRifrep());
    } else {
      return "";
    }
  }

  public function getFecreg() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getFecreg());
    }
  }

  public function getFeccal() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getFeccal());
    }
  }

  public function getMtrcon() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getMtrcon());
    }
  }

  public function getBster() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getBster());
    }
  }

  public function getMtrter() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getMtrter());
    }
  }

  public function getCodcarinm() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getCodcarinm());
    }
  }

  public function getCodsitinm() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getCodsitinm());
    }
  }

  public function getBscon() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getBscon());
    }
  }

  public function getCodcatinm() {
    $cr = new Criteria();
    $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
    $fcreginm = FcreginmPeer::doSelectOne($cr);
    if ($fcreginm) {
      return ($fcreginm->getCodcatinm());
    }
  }

  public function getSercar() {
    $cv = new Criteria();
    $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
    $fcregveh = FcregvehPeer::doSelectOne($cv);
    if ($fcregveh) {
      return ($fcregveh->getSercar());
    }
  }

  public function getSermot() {
    $cv = new Criteria();
    $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
    $fcregveh = FcregvehPeer::doSelectOne($cv);
    if ($fcregveh) {
      return ($fcregveh->getSermot());
    }
  }

  public function getAnoveh() {
    $cv = new Criteria();
    $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
    $fcregveh = FcregvehPeer::doSelectOne($cv);
    if ($fcregveh) {
      return ($fcregveh->getAnoveh());
    }
  }

  public function getValori() {
    $cv = new Criteria();
    $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
    $fcregveh = FcregvehPeer::doSelectOne($cv);
    if ($fcregveh) {
      return ($fcregveh->getValori());
    }
  }

  public function getColveh() {
    $cv = new Criteria();
    $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
    $fcregveh = FcregvehPeer::doSelectOne($cv);
    if ($fcregveh) {
      return ($fcregveh->getColveh());
    }
  }

  public function getModveh() {
    $cv = new Criteria();
    $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
    $fcregveh = FcregvehPeer::doSelectOne($cv);
    if ($fcregveh) {
      return ($fcregveh->getModveh());
    }
  }

  public function getMarveh() {
    $cv = new Criteria();
    $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
    $fcregveh = FcregvehPeer::doSelectOne($cv);
    if ($fcregveh) {
      return ($fcregveh->getMarveh());
    }
  }

  public function getDesuso() {
    return (Herramientas::getX_vacio('coduso', 'fcusoveh', 'desuso', self::getCoduso()));
  }

  public function getCoduso() {
    if (self::getNumdec()) {
      $numdec = substr(self::getNumdec(), 0, 2);

      if ($numdec != 'VH') {
        $cr = new Criteria();
        $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
        $fcreginm = FcreginmPeer::doSelectOne($cr);
        if ($fcreginm) {
          return($fcreginm->getCoduso());
        }
      } else {
        $cv = new Criteria();
        $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
        $fcregveh = FcregvehPeer::doSelectOne($cv);
        if ($fcregveh) {
          return($fcregveh->getCoduso());
        }
      }
    } else {
      return "";
    }
  }

  public function getMensaje() {
    $me = "";
    if (self::getNumdec()) {
      $numdec = substr(self::getNumdec(), 0, 2);

      if ($numdec != 'VH') {
        $cr = new Criteria();
        $cr->add(FcreginmPeer::NROINM, trim(self::getNumref()));
        $fcreginm = FcreginmPeer::doSelectOne($cr);
        if ($fcreginm) {
          if ($fcregveh->getEstinm() == 'A')
            $me = "REGISTRADO";
          else
            $me = "DESINCORPORADO";
        }
      }else if ($numdec == 'VH') {

        $cv = new Criteria();
        $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
        $fcregveh = FcregvehPeer::doSelectOne($cv);
        if ($fcregveh) {
          if ($fcregveh->getEstveh() == 'A')
            $me = "REGISTRADO";
          else if ($fcregveh->getEstveh() == 'D')
            $me = "DESINCORPORADO";
          else $me="REGISTRADO";
        }
      }

      return $me;
    }else {
      return "";
    }
  }

  public function getObservacion() {

    $cm = new Criteria();
    $cm->add(FcdeclarPeer::RIFCON, self::getRifcon());
    $cm->add(FcdeclarPeer::NUMREF, self::getNumref());
    $cm->add(FcdeclarPeer::FUEING, array("20", "10", "52"), Criteria::IN);
    $cm->add(FcdeclarPeer::EDODEC, array("P", "X"), Criteria:: NOT_IN);
    //     $cm->add(FcdeclarPeer::NOMBRE, "%VEHICULO%",Criteria::LIKE);
    //     $cm->add(FcdeclarPeer::NOMBRE, "%".$codigo."%",Criteria::LIKE);
    $reg = FcdeclarPeer::doSelect($cm);
    if ($reg) {
      return("No se puede realizar una declaración sobre un Vehículo que tenga  multas por infracción de Transito sin cancelar");
    } else {
      return "";
    }
  }

  /*public function getEdodecstatus() {
    if (self::getEdodec() == 'P') {
      $this->edodecstatus = "PAGADA";
    } else {
      if (H::dateDiff('d', self::getFecven(), date('Y-m-d')) <= 0) {
        $this->edodecstatus = "VIGENTE";
      } else {
        $this->edodecstatus = "VENCIDA";
      }
    }

    return $this->edodecstatus;
  }*/

  public function getNomconrep() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $cv = new Criteria();
    if ($numdec == 'V') {
      $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
      $reg = FcregvehPeer::doSelectOne($cv);
    } else if ($numdec == 'P') {
      $cv->add(FcprolicPeer::NROCON, trim(self::getNumref()));
      $reg = FcprolicPeer::doSelectOne($cv);
    } else if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    } else if ($numdec == 'A') {

      $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
      $reg = FcapulicPeer::doSelectOne($cv);
    } else {
      $cv->add(FcreginmPeer::NROINM, trim(self::getNumref()));
      $reg = FcreginmPeer::doSelectOne($cv);
    }
    if ($reg) {
      return H::getX_vacio('RIFCON', 'Fcconrep', 'Nomcon', $reg->getRifrep());
    }
  }

  public function getDirconrep() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $cv = new Criteria();
    if ($numdec == 'V') {
      $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
      $reg = FcregvehPeer::doSelectOne($cv);
    } else if ($numdec == 'P') {
      $cv->add(FcprolicPeer::NROCON, trim(self::getNumref()));
      $reg = FcprolicPeer::doSelectOne($cv);
    } else if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    } else if ($numdec == 'A') {

      $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
      $reg = FcapulicPeer::doSelectOne($cv);
    } else {
      $cv->add(FcreginmPeer::NROINM, trim(self::getNumref()));
      $reg = FcreginmPeer::doSelectOne($cv);
    }
    if ($reg) {
      return H::getX_vacio('RIFCON', 'Fcconrep', 'dircon', $reg->getRifrep());
    }
  }

  public function getNacconrep() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $cv = new Criteria();
    if ($numdec == 'V') {
      $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
      $reg = FcregvehPeer::doSelectOne($cv);
    } elseif ($numdec == 'P') {
      $cv->add(FcprolicPeer::NROCON, trim(self::getNumref()));
      $reg = FcprolicPeer::doSelectOne($cv);
    } else if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    } else if ($numdec == 'A') {

      $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
      $reg = FcapulicPeer::doSelectOne($cv);
    } else {
      $cv->add(FcreginmPeer::NROINM, trim(self::getNumref()));
      $reg = FcreginmPeer::doSelectOne($cv);
    }
    if ($reg) {
      return H::getX_vacio('RIFCON', 'Fcconrep', 'Naccon', $reg->getRifrep());
    }
  }

  public function getTipconrep() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $cv = new Criteria();
    if ($numdec == 'V') {
      $cv->add(FcregvehPeer::PLAVEH, trim(self::getNumref()));
      $reg = FcregvehPeer::doSelectOne($cv);
    } else {
      if ($numdec == 'P') {
        $cv->add(FcprolicPeer::NROCON, trim(self::getNumref()));
        $reg = FcprolicPeer::doSelectOne($cv);
      } else if ($numdec == 'S') {
        $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
        $reg = FcesplicPeer::doSelectOne($cv);
      } else if ($numdec == 'A') {

        $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
        $reg = FcapulicPeer::doSelectOne($cv);
      } else {
        $cv->add(FcreginmPeer::NROINM, trim(self::getNumref()));
        $reg = FcreginmPeer::doSelectOne($cv);
      }
    }
    if ($reg) {
      return H::getX_vacio('RIFCON', 'Fcconrep', 'Tipcon', $reg->getRifrep());
    }
  }

  public function getNumsol() {
    return self::getNumref();
  }

  public function getEdodecgrid() {
    if (self::getEdodec() == 'P') {
      $edodecstatus = "PAGADA";
    } else if (self::getEdodec() == 'V') {
      $edodecstatus = "VIGENTE";
    } else if (self::getEdodec() == 'E') {
      $edodecstatus = "VENCIDA";
    } else if (self::getEdodec() == 'D') {
      $edodecstatus = "PENDIENTE";
    }

    return $edodecstatus;
  }

  public function setEdodecgrid($edodecstatus) {
    $this->edodecstatus = $edodecstatus;
  }

  public function getConpagstatus() {
    $edodecstatus = "SI";
    return $edodecstatus;
  }

  public function getNomcon() {
    return H::getX_vacio('RIFCON', 'Fcconrep', 'Nomcon', self::getRifcon());
  }

  public function getDircon() {
    return H::getX_vacio('RIFCON', 'Fcconrep', 'dircon', self::getRifcon());
  }

  public function getNaccon() {
    return H::getX_vacio('RIFCON', 'Fcconrep', 'Naccon', self::getRifcon());
  }

  public function getTipcon() {
    return H::getX_vacio('RIFCON', 'Fcconrep', 'Tipcon', self::getRifcon());
  }

  public function getNomconsol() {
    return H::getX_vacio('RIFCON', 'Fcconrep', 'Nomcon', $this->rifrep);
  }

  public function getDirconsol() {
    return H::getX_vacio('RIFCON', 'Fcconrep', 'dircon', $this->rifrep);
  }

  public function getNacconsol() {
    return H::getX_vacio('RIFCON', 'Fcconrep', 'Naccon', $this->rifrep);
  }

  public function getTipconsol() {
    return H::getX_vacio('RIFCON', 'Fcconrep', 'Tipcon', $this->rifrep);
  }

  public function getNroreg() {

    return trim($this->nroreg);
  }

  public function setNroreg($nroreg) {
    $this->nroreg = $nroreg;
  }

  //Fuente de Ingreso
  public function getFingreso() {

    $c = new Criteria();
    $c->add(FcfueprePeer::CODFUE, self::getFueing());
    $fcfuepr = FcfueprePeer::doSelectOne($c);

    if ($fcfuepr) {
      return($fcfuepr->getNomabr());
    }
    else
      return '';
  }

  //Pago
  public function getVpago() {
    if ((self::getConPag() === "S"))
      return('CVN');
    elseif (self::getEdoDec() === "P")
      return ("X");    
    else
      return ("");
  }

  //Diferencia
  public function getMondif() {
    if (self::getEdoDec() === "P")
      return H::FormatoMonto(self::getMonDec() - self::getAutliq());
    else
      return H::FormatoMonto(0);
  }

  // Pronto pago
  public function getProntopago() {
    if ((self::getEdoDec() === "P") && (self::getRegpag()))
      return H::FormatoMonto(self::getDescuento());
    else
      return H::FormatoMonto($this->prontopg);
  }

  // Monto a pagar
  public function getMontotpag() {
    return H::FormatoMonto(self::getMondec() + self::getMora() - H::toFloat(self::getProntopago()));
  }

  // Monto al contribuyente
  public function getMontocont() {
    if ((self::getEdoDec() === "P") && (self::getRegpag()))
      return H::FormatoMonto(self::getMondec());
    else
      return H::FormatoMonto(0);
  }

  // Saldo
  public function getSaldototal() {
    if ((self::getEdoDec() === "P") && (self::getRegpag()))
      return H::FormatoMonto(0);
    else
      return H::FormatoMonto(H::toFloat(self::getMontotpag()) + H::toFloat(self::getMondif()) - H::toFloat(self::getMontocont()));
  }

  // Planilla
  public function getPlanilla() {
    if ((self::getEdoDec() === "P") && (self::getRegpag()))
      return self::getNumpag();
    else
      return '';
  }

  //Búsqueda de Descuento
  public function getDescuento() {
    $sql = "Select Monto  From FCRecDesPag Where NumPag ='" . self::getNumpag() . "' and CodReDe ='" . self::getFueing() . "'";
    if (H::BuscarDatos($sql, $rs))
      if ($rs[0]['cantidad'] > 0) {
        return(true);
      }else
        return(false);
  }

  public function getRegpag() {
    $sql = "Select Count(*) as cantidad From FCPAGOS Where NumPag ='" . self::getNumpag() . "'";
    if (H::BuscarDatos($sql, $rs))
      if ($rs[0]['cantidad'] > 0) {
        return true;
      }else
        return false;
  }
  
    public function getNumpag() {
    $sql = "Select A.NumPag as numpag from FCDecPag A,FCPAGOS B where A.NUMPAG=B.NUMPAG  AND numdec='".$this->numdec."' and rifcon='".$this->rifcon."'
                   and FecVen='" . self::getFecven() . "'";
    if (H::BuscarDatos($sql, $rs))
        return $rs[0]['numpag'];
    else
        return "";
  }

  //Ramo
  public function getNomfue() {

    $c = new Criteria();
    $c->add(FcfueprePeer::CODFUE, self::getFueing());
    $fcfuepr = FcfueprePeer::doSelectOne($c);

    if ($fcfuepr) {
      return($fcfuepr->getNomfue());
    }
    else
      return '';
  }

  public function getFecv() {
    if (( self::getEdoDec() === "P")) {
      return(self::getFecVen());
    } else if (( self::getEdoDec() === "P") && (self::getFecven() < date("'d/m/Y", time()))) {
      return(self::getFecVen());
    } else if (( self::getEdoDec() != "P") && ( self::getFecven() < date("'d/m/Y", time()))) {
      return(self::getFecVen());
    }
    else
      return '';
  }

  public function getFecu() {
    if (self::getEdoDec() === "P") {
      return(self::getFecUltPag());
    } else if (( self::getEdoDec() === "P") && (self::getFecven()) < date("'d/m/Y", time())) {
      return(self::getFecUltPag());
    }
    else
      return '';
  }

  public function getEdad() {
    return( date("Y") - (int) substr(self::getAnoveh(), 0, 4));
  }

  public function getFecfin() {
    return(self::getFeccie());
  }

  public function getTippro() {
    $c = new Criteria();
    $c->add(FcprolicPeer::NROCON, self::getNumref());
    $reg = FcprolicPeer::doSelectOne($c);
    if ($reg) {
      return($reg->getTippro());
    } else {
      return("");
    };
  }

  public function getDestip() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $des = '';

    if ($numdec == 'S') {
      $cv = new Criteria();
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
      $des = $reg->getDestip();
    } else {
      $c = new Criteria();
      $c->add(FcprolicPeer::NROCON, self::getNumref());
      $reg = FcprolicPeer::doSelectOne($c);
      if ($reg) {
        $cr = new Criteria();
        $cr->add(FctipproPeer::TIPPRO, $reg->getTippro());
        $reg = FctipproPeer::doSelectOne($cr);
        $des = $reg->getDestip();
      }
    }
    return($des);
  }

  public function getDirpro() {
    $c = new Criteria();
    $c->add(FcprolicPeer::NROCON, self::getNumref());
    $reg = FcprolicPeer::doSelectOne($c);
    if ($reg) {
      return($reg->getDirpro());
    } else {
      return("");
    };
  }

  public function getTexpub() {
    $c = new Criteria();
    $c->add(FcprolicPeer::NROCON, self::getNumref());
    $reg = FcprolicPeer::doSelectOne($c);
    if ($reg) {
      return($reg->getTexpub());
    } else {
      return("");
    };
  }

  public function getDespro() {
    $c = new Criteria();
    $c->add(FcprolicPeer::NROCON, self::getNumref());
    $reg = FcprolicPeer::doSelectOne($c);
    if ($reg) {
      return($reg->getDestip());
    } else {
      return("");
    };
  }

  public function getRifrep() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'P') {
      $cv->add(FcprolicPeer::NROCON, trim(self::getNumref()));
      $reg = FcprolicPeer::doSelectOne($cv);
    } else if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    } else if ($numdec == 'E' || $numdec == 'D' || $numdec == 'C') {
      $cv->add(FcsollicPeer::NUMLIC, self::getNumref());
      $reg = FcsollicPeer::doSelectOne($cv);
    } else if ($numdec == 'A') {

      $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
      $reg = FcapulicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getRifrep());
    } else {
      return "";
    }
  }

  public function getTipesp() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getTipesp());
    } else {
      return "";
    }
  }

  public function getDesesp() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getDesesp());
    } else {
      return "";
    }
  }

  public function getDiresp() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getDiresp());
    } else {
      return "";
    }
  }

  public function getFecesp() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return (date('d/m/Y', strtotime($reg->getFecesp())));
    } else {
      return "";
    }
  }

  public function getHorespi() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getHorespi());
    } else {
      return "";
    }
  }

  public function getHorespf() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getHorespf());
    } else {
      return "";
    }
  }

  public function getNroent() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getNroent());
    } else {
      return "";
    }
  }

  public function getMonent() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getMonent());
    } else {
      return "";
    }
  }

  public function getExoesp() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getExoesp());
    } else {
      return "";
    }
  }

  public function getTexexo() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    } else if ($numdec == 'A') {
      $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
      $reg = FcapulicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getTexexo());
    } else {
      return "";
    }
  }

  public function getSemdia() {
    $numdec = substr(self::getNumdec(), 0, 1);
    $reg = '';
    $cv = new Criteria();
    if ($numdec == 'S') {
      $cv->add(FcesplicPeer::NROCON, trim(self::getNumref()));
      $reg = FcesplicPeer::doSelectOne($cv);
    } else if ($numdec == 'A') {
      $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
      $reg = FcapulicPeer::doSelectOne($cv);
    }
    if ($reg) {
      return ($reg->getSemdia());
    } else {
      return "";
    }
  }

  public function getFechafin() {
    return(self::getFeccie());
  }

  public function getTipapu() {
    $cv = new Criteria();
    $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
    $reg = FcapulicPeer::doSelectOne($cv);
    if ($reg) {
      return ($reg->getTipapu());
    } else {
      return "";
    }
  }

  public function getDesapu() {
    $cv = new Criteria();
    $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
    $reg = FcapulicPeer::doSelectOne($cv);
    if ($reg) {
      return ($reg->getDesapu());
    } else {
      return "";
    }
  }

  public function getDirapu() {
    $cv = new Criteria();
    $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
    $reg = FcapulicPeer::doSelectOne($cv);
    if ($reg) {
      return ($reg->getDirapu());
    } else {
      return "";
    }
  }

  public function getFecapu() {
    $cv = new Criteria();
    $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
    $reg = FcapulicPeer::doSelectOne($cv);
    if ($reg) {
      return (date('d/m/Y', strtotime($reg->getFecapu())));
    } else {
      return "";
    }
  }

  public function getHorapu() {
    $cv = new Criteria();
    $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
    $reg = FcapulicPeer::doSelectOne($cv);
    if ($reg) {
      return($reg->getHoraapu());
    } else {
      return '';
    }
  }

  public function getSerapui() {
    $cv = new Criteria();
    $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
    $reg = FcapulicPeer::doSelectOne($cv);
    if ($reg) {
      return ($reg->getSerapui());
    } else {
      return "";
    }
  }

  public function getSerapuf() {
    $cv = new Criteria();
    $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
    $reg = FcapulicPeer::doSelectOne($cv);
    if ($reg) {
      return ($reg->getSerapuf());
    } else {
      return "";
    }
  }

  public function getExoapu() {
    $cv = new Criteria();
    $cv->add(FcapulicPeer::NROCON, trim(self::getNumref()));
    $reg = FcapulicPeer::doSelectOne($cv);
    if ($reg) {
      return ($reg->getExoapu());
    } else {
      return "";
    }
  }
  //Fuente de Ingreso
  /*public function getSumfue() {

    $c = new Criteria();
    $c->add(FcfueprePeer::CODFUE, self::getFueing());
    $fcfuepr = FcfueprePeer::doSelectOne($c);

    if ($fcfuepr) {
      return($fcfuepr->getSumfue());
    }
    else
      return '';
  }*/

    public function getFecpag() {
    $sql = "Select B.FecPag as fecpag from FCDecPag A,FCPAGOS B where A.NUMPAG=B.NUMPAG  AND numdec='".$this->numdec."' and rifcon='".$this->rifcon."'
                   and FecVen='" . self::getFecven() . "'";
    if (H::BuscarDatos($sql, $rs))
        return date('d/m/Y',strtotime($rs[0]['fecpag']));
    else
        return "";
  }  
  
    public function getFunpag() {
    $sql = "Select B.FunPag as funpag from FCDecPag A,FCPAGOS B where A.NUMPAG=B.NUMPAG  AND numdec='".$this->numdec."' and rifcon='".$this->rifcon."'
                   and FecVen='" . self::getFecven() . "'";
    if (H::BuscarDatos($sql, $rs))
        return $rs[0]['funpag'];
    else
        return "";
  }    
  
  
    public function getEdopag() {
    $sql = "Select B.EdoPag as edopag from FCDecPag A,FCPAGOS B where A.NUMPAG=B.NUMPAG  AND numdec='".$this->numdec."' and rifcon='".$this->rifcon."'
                   and FecVen='" . self::getFecven() . "'";
    if (H::BuscarDatos($sql, $rs)) {
        if ($rs[0]['edopag']=='V')
            return 'VALIDADO';
        else
            return 'LIQUIDADO';
    }else
        return "";
  }  
  
    // Estatus Pagado
  public function getEstapag() {
    if ((self::getEdoDec() === "P") && (self::getRegpag()))
      return self::getEdopag();
    else
      return '';
  }
  
    // Fecha Pagado
  public function getFechapag() {
    if ((self::getEdoDec() === "P") && (self::getRegpag()))
      return self::getFecpag();
    else
      return '';
  }  
  
    // Funcionario Pagado
  public function getFuncipag() {
    if ((self::getEdoDec() === "P") && (self::getRegpag()))
      return self::getFunpag();
    else
      return '';
  }    
}

