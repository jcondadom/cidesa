<?php

/**
 * Subclass for representing a row from the 'opretord'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Opretord extends BaseOpretord
{
  private $check = '';
  private $fecemi = '';
  private $estaislr = '';
  private $esta1xmil = '';
  private $estairs = '';
  private $esta = '';
  private $estaimn = '';
  protected $nommon="";
  protected $codmon="";
  protected $valmon=0.00;

  public function setCheck($val)
  {
  $this->check = $val;
  }

  public function getCheck()
  {
  return $this->check;
  }

  public function setFecemi($val)
  {
  $this->fecemi = $val;
  }

  public function getFecemi()
  {
    return Herramientas::getX('NUMORD','Opordpag','Fecemi', self::getNumord());
  }

  public function getDestip()
  {
    return Herramientas::getX('CODTIP','Optipret','Destip',self::getCodtip());
  }

    public function getNompre()
  {
    return Herramientas::getX('CODPRE','Cpdeftit','Nompre',self::getCodpre());
  }

  public function setDestip($val)
  {
    $this->destip = $val;
  }

  public function getPorret()
  {
    return Herramientas::getX('CODTIP','Optipret','Porret',self::getCodtip());
  }

  public function setPorret($val)
  {
  $this->porret = $val;
  }

  public function getBasimp()
  {
    return Herramientas::getX('CODTIP','Optipret','Basimp',self::getCodtip());
  }

  public function setBasimp($val)
  {
    $this->basimp = $val;
  }

  public function getFactor()
  {
  	$valor=number_format(Herramientas::getX('CODTIP','Optipret','Factor',self::getCodtip()),4,',','.');
    return $valor;
  }

  public function setFactor($val)
  {
    $this->factor = $val;
  }

  public function getPorsus()
  {
    return Herramientas::getX('CODTIP','Optipret','Porsus',self::getCodtip());
  }

  public function setPorsus($val)
  {
  $this->porsus = $val;
  }

  public function getUnitri()
  {
    return Herramientas::getX('CODTIP','Optipret','Unitri',self::getCodtip());
  }

  public function setUnitri($val)
  {
  $this->unitri = $val;
  }

  /*public function getEstaislr()
  {
  return $this->estaislr;
  }*/
  public function getEstaislr()
  {
    $c = new Criteria();
    $c->add(TsrepretPeer::CODREP,'002');
    $c->add(TsrepretPeer::CODRET,self::getCodtip());
    $datos = TsrepretPeer::doSelect($c);
    if ($datos)
    { return 'S';} else { return 'N';}
  }

  public function setEstaislr($val)
  {
  $this->estaislr = $val;
  }

  public function setEsta1xmil($val)
  {
  $this->esta1xmil = $val;
  }

  /*public function getEsta1xmil()
  {
  return $this->esta1xmil;
  }*/
  public function getEsta1xmil()
   {
    $c = new Criteria();
    $c->add(TsrepretPeer::CODREP,'003');
    $c->add(TsrepretPeer::CODRET,self::getCodtip());
    $datos = TsrepretPeer::doSelect($c);
    if ($datos)
    { return 'S';} else { return 'N';}
   }

  public function setEsta($val)
  {
  $this->esta = $val;
  }

  /*public function getEsta()
  {
  return $this->esta;
  }*/
  public function getEsta()
  {
    $codigo="";
    $c = new Criteria();
    $c->add(TsretivaPeer::CODRET,self::getCodtip());
    $datos = TsretivaPeer::doSelect($c);
    if ($datos)
    {
      foreach ($datos as $codigos)
      {
        $codigo=$codigo."_".$codigos->getCodpar();
      }

      return $codigo;
    }else return 'N';
  }

  public function setMontoret($val)
  {
  $this->montoret = $val;
  }

  public function getMontoret()
  {
  return $this->montoret;
  }

  /*public function getEstairs()
  {
  return $this->estairs;
  }*/
  public function getEstairs()
  {
    $c = new Criteria();
    $c->add(TsrepretPeer::CODREP,'005');
    $c->add(TsrepretPeer::CODRET,self::getCodtip());
    $datos = TsrepretPeer::doSelect($c);
    if ($datos)
    { return 'S';} else { return 'N';}
  }

  public function setEstairs($val)
  {
  $this->estairs = $val;
  }
  
/*public function getEstaimn()
  {
  return $this->estaimn;
  }*/

  public function getEstaimn()
  {
    $c = new Criteria();
    $c->add(TsrepretPeer::CODREP,'004');
    $c->add(TsrepretPeer::CODRET,self::getCodtip());
    $datos = TsrepretPeer::doSelect($c);
    if ($datos)
    { return 'S';} else { return 'N';}
  }  

  public function setEstaimn($val)
  {
  $this->estaimn = $val;
  }  
  
  public function getMonret($val=false)
  {
    if (self::getId())
    {
       $moneda=H::getX_vacio('NUMORD', 'Opordpag', 'Codmon', self::getNumord());
        $valor=H::getX_vacio('NUMORD', 'Opordpag', 'Valmon', self::getNumord());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->monret/$valor;
        }else $calculo=$this->monret;
    }else $calculo=$this->monret;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function setMonret($v)
    {
        if ($this->monret !== $v) {
            $this->monret = Herramientas::toFloat($v);
            $this->modifiedColumns[] = OpretordPeer::MONRET;
          }
    }     
}
