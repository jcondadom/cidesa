<?php
/**
 * Subclass for representing a row from the 'faartped'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Faartped.php 33699 2009-10-01 22:15:36Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

class Faartped extends BaseFaartped {
    protected $obj = array();
    protected $desart = "";
    //  protected $canord="0,00";
    protected $canent = "0,00";
    protected $canentregar = "0,00";
    ///protected $canaju="0,00";
    protected $canajustada = "0,00";
    protected $candes = "0,00";
    protected $candesp = "0,00";
    protected $cantot = "0,00";
    protected $candev = "0,00";
    protected $preart = "0,00";
    protected $totart = "0,00";
    protected $montot = "0,00";
    protected $precioe = "0,00";
    protected $porrgo = "0,00";
    protected $mondes = "0,00";
    protected $monaju = "0,00";
    protected $canlotreal = "0,00";
    protected $canpuedaju = "0,00";
    protected $canrealped = "0,00";
    protected $canrealdes = "0,00";
    protected $candistrib = "0,00";
    protected $tipo = "";
    protected $preaju = "0,00";
    protected $ajupre = "0,00";
    protected $recaju = "0,00";
    protected $fecven = "";
    protected $exist = "0,00";
    public $codfal = '';
    public $costo = 0.0;
    public $cannodes = 0.0;
    public $cannodesaux = 0.0;
    public $montotdes = 0.0;
    protected $codalm = "";
    protected $codubi = "";
    protected $nomubi = "";
    protected $nomalm = "";
    protected $numlot = "";
    protected $numlotxart = array();
    protected $existencia = "";
    protected $exento = "";
    protected $codunimed = '';
    protected $desunimed = '';
    protected $check="";
    protected $recargos="";
    protected $anadirrec="";
    protected $recargos2="";


    public function hydrate(ResultSet $rs, $startcol = 1) {
        parent::hydrate($rs, $startcol);
        //Se suma la cantidad entregada por notas de entrega para el pedido
        $sql = "select sum(canent) as canent, sum(totart/canent) as montotent, sum(canent * preart) as costoent from faartnot where codart = '" . self::getCodart() . "' and nronot in (select nronot from fanotent where tipref='P' and codref = '" . self::getNroped() . "' and status = 'A')";
        if (Herramientas::BuscarDatos($sql, $resul)) {
            $canent = $resul[0]["canent"];
            $montotent = $resul[0]["montotent"];
            $costoent = $resul[0]["costoent"];
        } else {
            $canent = 0;
            $montotent = 0;
            $costoent = 0;
        }
        $sql = "select sum(candph) as candph, sum(montot) as montotdph, sum(montot/candph) as costodph from caartdph where codart = '" . self::getCodart() . "' and dphart in (select dphart from cadphart where tipref = 'P' and reqart = '" . self::getNroped() . "' and stadph = 'A')";
        if (Herramientas::BuscarDatos($sql, $resul)) {
            $candes = $resul[0]["candph"];
            $montotdes = $resul[0]["montotdph"];
            $costodes = $resul[0]["costodph"];
        } else {
            $candes = 0;
            $montotent = 0;
            $costodes = 0;
        }
        //$this->candes= 0.0;
        $this->cannodes = self::getCanord() - ($candes + $canent);
        $this->cannodesaux = self::getCanord() - ($candes + $canent);
        $valor = self::getPreart() * self::getCanord();
        $this->montot = number_format($valor, 2, ',', '.');
        $this->preaju = number_format(self::getPreart() , 2, ',', '.');
        //$this->costo=$costodes + $costoent;
        if (self::getPreart() != 0) {
            $this->precioe = number_format(self::getPreart() , 2, ',', '.');
        }
        if (self::getMondesc() != 0) {
            $this->mondes = number_format(self::getMondesc() , 2, ',', '.');
        }
        $porcrgo = 0;
        $c = new Criteria();
        $c->add(FarecargPeer::TIPRGO, 'P');
        $this->sql = "codrgo in (select codrgo from farecart where codart = '" . self::getCodart() . "')";
        $c->add(FarecargPeer::CODRGO, $this->sql, Criteria::CUSTOM);
        $reg = FarecargPeer::doSelect($c);
        if ($reg) {
            
            foreach ($reg as $sum) {
                $porcrgo+= $sum->getMonrgo();
            }
        }
        $this->porrgo = number_format($porcrgo, 2, ',', '.');
        $indicalm = H::getConfApp2('indicalm', 'facturacion', 'fadesp');
        if ($indicalm != 'S') {
            $this->codalm = Herramientas::getX('CODART', 'Caartalm', 'Codalm', $this->getCodart());
            $this->codubi = Herramientas::getX('CODALM', 'Caalmubi', 'Codubi', $this->getCodalm());
        }

        if (self::getMonrgo()>0)
           $this->check='1';

        $a= new Criteria();
        $a->add(FargopedPeer::REFDOC,self::getNroped());
        $a->add(FargopedPeer::CODART,self::getCodart());
        $result=FargopedPeer::doSelect($a);
        if ($result)
        {
            foreach ($result as $datos)
            {
               $monrgo=H::FormatoMonto($datos->getMonrgo());
               $monrgoc=H::FormatoMonto($datos->getMonrgo2());
               $this->recargos=$this->recargos.$datos->getCodrgo().'_'.$datos->getNomrgo().'_'.$datos->getRecfij().'_' .$monrgo.'_'.$datos->getCodcta().'_'.$datos->getTipo().'_'.$monrgoc.'!';
            }
        }


    }
    public function getPrecio() {
        
        return self::getPreart();
    }
    public function getDesart() {
        
        return Herramientas::getX('CODART', 'Caregart', 'Desart', self::getCodart());
    }
    public function getCansol() {
        $val = self::getCanord();
        
        return $val;
    }
    /*  public function getCodalm()
    {
    return Herramientas::getX('CODART','Caartalm','Codalm',$this->getCodart());
    }
    
    public function getCodubi()
    {
          return Herramientas::getX('CODALM','Caalmubi','Codubi',$this->getCodalm());
    }*/
    public function getNomalm() {
        
        return Herramientas::getX('CODALM', 'Cadefalm', 'Nomalm', $this->getCodalm());
    }
    public function getNomubi() {
        
        return Herramientas::getX('CODUBI', 'Cadefubi', 'Nomubi', $this->getCodubi());
    }
    public function getTipo() {
        
        return Herramientas::getX('CODART', 'Caregart', 'Tipo', self::getCodart());
    }
    public function getNumlotxart() {
        $c = new Criteria();
        $c->add(CaartalmubiPeer::CODALM, $this->getCodalm());
        $c->add(CaartalmubiPeer::CODUBI, $this->getCodubi());
        $c->add(CaartalmubiPeer::CODART, self::getCodart());
        $c->add(CaartalmubiPeer::EXIACT, 0, Criteria::GREATER_THAN);
        $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);
        $datos = CaartalmubiPeer::doSelect($c);
        $lotes = array();
        
        foreach ($datos as $obj_datos) {
            if ($obj_datos->getFecven() != "") {
                $fecven = date("d/m/Y", strtotime($obj_datos->getFecven()));
                $lotes+= array(
                    $obj_datos->getNumlot() => $obj_datos->getNumlot() . " - " . $fecven
                );
            } else $lotes+= array(
                $obj_datos->getNumlot() => $obj_datos->getNumlot()
            );
        }
        
        return $lotes;
    }
    public function getDesunimed() {
        if ($this->codunimed == '') {
            $this->getCodunimed();
        }
        
        return $this->desunimed;
    }
    public function getCodunimed() {
        if ($this->codunimed == '') {
            $c = new Criteria();
            $c->add(CaregartPeer::CODART, $this->codart);
            $caregart = CaregartPeer::doSelectOne($c);
            if ($caregart) {
                $c = new Criteria();
                $c->add(CadefunimedPeer::CODUNIMED, $caregart->getCodunimed());
                $cadefunimed = CadefunimedPeer::doSelectOne($c);
                if ($cadefunimed) {
                    $this->codunimed = $cadefunimed->getCodunimed();
                    $this->desunimed = $cadefunimed->getDesunimed();
                    
                    return $this->codunimed;
                }
                
                return '';
            } else 
            return '';
        } else $this->codunimed;
    }

 /* public function getCandesp($val=false)
  {
    if (self::getId())
    {
        $this->candesp=$this->cantot;
    }
    if($val) return number_format($this->candesp,2,',','.');
    else return $this->candesp;

  }
  
    public function setCandesp($v)
    {

    if ($this->candesp !== $v) {
        $this->candesp = Herramientas::toFloat($v);
      }

    }    */    

}
