<?php

/**
 * Subclass for representing a row from the 'faartfac'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faartfac.php 59028 2014-10-14 19:39:08Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartfac extends BaseFaartfac
{
  protected $check="";
  protected $desart="";
  //protected $unimed="";
  protected $exiart="0,00";
  protected $canent=0.00;
  protected $candesp=0.00;
  protected $distot="0,00";
  protected $preant="0,00";
  protected $canpreart="0,00";
  protected $codctapro="";
  protected $mondesc="0,00";
  protected $blanco1="";
  protected $blanco2="0,00";
  protected $recarg="";
  protected $desc="";
  protected $precioe=0.00;
  protected $canentregar="0,00";
  protected $canajustada="0,00";
  protected $montot="0,00";
  protected $numlotxart=array();

  public $codfal = '';
  public $costo=0.0;
  public $cannodes=0.0;
  public $cannodesaux=0.0;
  public $montotdes=0.0;

  protected $codalm="";
  protected $codubi="";
  protected $nomubi="";
  protected $nomalm="";
  protected $canord="0,00";
  protected $preart="0,00";
  protected $numlot="";
    protected $preaju="0,00";
    protected $monaju="0,00";
    protected $canlotreal="0,00";
    protected $canpuedaju="0,00";
    protected $canrealped="0,00";
    protected $canrealdes="0,00";
    protected $candistrib="0,00";
    protected $tipo="0,00";
    protected $ajupre="0,00";
    protected $recaju="0,00";
    protected $fecven="";
    protected $exist="0,00";
    protected $recargos="";
    protected $descuentos="";
    protected $anadirrec="";
    protected $anadirdes="";
    protected $existencia="";

    public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);

	   //Se suma la cantidad entregada por notas de entrega para la factura
	   $sql = "select sum(canent) as canent from faartnot where codart = '" . self::getCodart() . "' and nronot in (select nronot from fanotent where tipref='F' and codref = '" . self::getReffac() . "' and status = 'A')";
		if (Herramientas :: BuscarDatos($sql, $resul)) {
			$canent = $resul[0]["canent"];
		} else {
			$canent = 0;
		}

		$sql = "select sum(candph) as candph from caartdph where codart = '" . self::getCodart() . "' and dphart in (select dphart from cadphart where tipref = 'F' and reqart = '" . self::getReffac() . "' and stadph = 'A')";
		if (Herramientas :: BuscarDatos($sql, $resul)) {
			$candes = $resul[0]["candph"];
		} else {
			$candes = 0;
		}

      $this->cannodes=self::getCantot() - ($candes + $canent);
      $this->cannodesaux=self::getCantot() - ($candes + $canent);
      
      if (self::getMonrgo()>0 || self::getMondes()>0)
         $this->check='1';
         
         $a= new Criteria();
	 $a->add(FargoartPeer::REFDOC,self::getReffac());
	 $a->add(FargoartPeer::CODART,self::getCodart());
	 $result=FargoartPeer::doSelect($a);
	 if ($result)
	 {
            foreach ($result as $datos)
            {
               $monrgo=H::FormatoMonto($datos->getMonrgo());
               $monrgoc=H::FormatoMonto($datos->getMonrgo2());
               $this->recargos=$this->recargos.$datos->getCodrgo().'_'.$datos->getNomrgo().'_'.$datos->getRecfij().'_' .$monrgo.'_'.$datos->getCodcta().'_'.$datos->getTipo().'_'.$monrgoc.'!';

            }
	 }
         
         $b= new Criteria();
	 $b->add(FadescartPeer::REFDOC,self::getReffac());
	 $b->add(FadescartPeer::CODART,self::getCodart());
	 $result2=FadescartPeer::doSelect($b);
	 if ($result2)
	 {
            foreach ($result2 as $datos2)
            {
               $mondesc=number_format($datos2->getMondesc(),2,',','.');
               $montdesc=number_format($datos2->getMontdesc(),2,',','.');
               $this->descuentos=$this->descuentos.$datos2->getCoddesc().'_'.$datos2->getDesdesc().'_'.$mondesc.'_'.$datos2->getCodcta().'_'.$datos2->getCantidad().'_'.$montdesc.'_'.$datos2->getTipdesc().'_'.$datos2->getTipret().'!';
            }
	 }         
   }

/*  public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getUnimed()
  {
   return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
  }

  public function getExiart()
  {
   return Herramientas::getX('CODART','Caregart','Distot',self::getCodart());
  }

  public function getDistot()
  {
   return Herramientas::getX('CODART','Caregart','Distot',self::getCodart());
  }

  public function getBlanco1()
  {
   return Herramientas::getX('CODART','Caregart','Tipo',self::getCodart());
  }*/

  public function getCansol()
  {
   return self::getCantot();
  }

 /* public function getPreart()
  {
   return self::getPrecio();
  }*/

  public function afterHydrate()
  {
    if (self::getPrecio()!=0)
    {
      $this->precioe=number_format(self::getPrecio(), 2, ',', '.');
    }else {
        $this->precioe=number_format($this->precioe, 2, ',', '.');
    }
    if (self::getId())
    {
      //$this->canent=number_format(self::getCantot(), 2, ',', '.');
      //$this->candesp=number_format(self::getCantot(), 2, ',', '.');
    }

    $this->canord=number_format((self::getCantot() - self::getCanaju()), 2, ',', '.');
    $this->preart=number_format(self::getPrecio() - self::getPreaju(), 2, ',', '.');
    $val=self::getPrecio() * self::getCantot();
    $this->montot=number_format($val, 2, ',', '.');
    $this->preaju=$this->precio;
    $indicalm=H::getConfApp2('indicalm', 'facturacion', 'fadesp');
    if ($indicalm!='S')
    {
        $this->codalm=Herramientas::getX('CODART','Caartalm','Codalm',$this->getCodart());
        $this->codubi=Herramientas::getX('CODALM','Caalmubi','Codubi',$this->getCodalm());
    }

    $w= new Criteria();
    $w->add(CaregartPeer::CODART,self::getCodart());
    $resultado= CaregartPeer::doSelectOne($w);
    if ($resultado)
    {
      //$this->unimed=$resultado->getUnimed();
      $this->exiart=$resultado->getDistot();
      $this->distot=$resultado->getDistot();
      $this->blanco1=$resultado->getTipo();
      $this->tipo=$resultado->getTipo();
    }

  }
/*    public function getCodalm()
    {
	  return Herramientas::getX('CODART','Caartalm','Codalm',$this->getCodart());
    }

    public function getCodubi()
    {
          return Herramientas::getX('CODALM','Caalmubi','Codubi',$this->getCodalm());
    }*/

    public function getNomalm()
    {
	  return Herramientas::getX('CODALM','Cadefalm','Nomalm',$this->getCodalm());
    }

    public function getNomubi()
    {
            return Herramientas::getX('CODUBI','Cadefubi','Nomubi',$this->getCodubi());
    }

  /*public function getTipo()
  {
   return Herramientas::getX('CODART','Caregart','Tipo',self::getCodart());
  }*/

    public function getNomots()
    {
      return Herramientas::getX('CEDRIF','Faregots','Nomots',self::getCedrif());
    }

    public function getNompro()
    {
      return Herramientas::getX('RIFPRO','Caprovee','Nompro',self::getRifpro());
    }

    public function getDesprod()
    {
      return Herramientas::getX('CODPROD','Fadefpro','Desprod',self::getCodprod());
    }

   public function getPrecioe($va=false)
  {
    if (self::getId()!="")
    {
     $var = parent::getPrecio($va);
    }
    else
    {
      if($va) $var = number_format($this->precioe,2,',','.');
    else $var = $this->precioe;
    }
    return $var;
  }

  public function setPrecioe($val)
    {
       //$this->precioe = $val;
       $this->precioe = Herramientas::toFloat($val);
    }

  public function getNumlotxart()
  {
    $c = new Criteria();
    $c->add(CaartalmubiPeer::CODALM,$this->getCodalm());
    $c->add(CaartalmubiPeer::CODUBI,$this->getCodubi());
    $c->add(CaartalmubiPeer::CODART,self::getCodart());
    $c->add(CaartalmubiPeer::EXIACT,0,Criteria::GREATER_THAN);
    $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);

    $datos = CaartalmubiPeer::doSelect($c);

    $lotes = array();

    foreach($datos as $obj_datos)
    {
     if ($obj_datos->getFecven()!="")
     {
        $fecven=date("d/m/Y",strtotime($obj_datos->getFecven()));
      	$lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot()." - ".$fecven);
     }
      else
      	$lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot());
    }
    return $lotes;
  }
  
  public function getCanent($val=false)
  {
    if (self::getId())
    {
        $this->canent=$this->cantot;
    }
    if($val) return number_format($this->canent,2,',','.');
    else return $this->canent;

  }
  
    public function setCanent($v)
    {

    if ($this->canent !== $v) {
        $this->canent = Herramientas::toFloat($v);
      }

    }
    
  public function getCandesp($val=false)
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

    }        
    
    
       public function getCanaju($val=false)
  {

    if($val) return number_format($this->canaju,6,',','.');
    else return $this->canaju;

  }

	public function setCanaju($v)
	{

    if ($this->canaju !== $v) {
        $this->canaju = Herramientas::toFloat($v,6);
        $this->modifiedColumns[] = FaartfacPeer::CANAJU;
      }

	}

  public function getDescan()
    {
      return Herramientas::getX('CODCAN','Fadefcan','Descan',self::getCodcan());
    }

    public function getNomprod() {        
        return Herramientas::getX_vacio('RIFPROD', 'Faproduc', 'Nomprod', $this->rifprod);
    } 

   public function getMonrgo($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('REFFAC', 'Fafactur', 'Tipmon', self::getReffac());
        $valor=H::getX_vacio('REFFAC', 'Fafactur', 'Valmon', self::getReffac());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->monrgo/$valor;
        }else $calculo=$this->monrgo;
    }else $calculo=$this->monrgo;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getMondes($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('REFFAC', 'Fafactur', 'Tipmon', self::getReffac());
        $valor=H::getX_vacio('REFFAC', 'Fafactur', 'Valmon', self::getReffac());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->mondes/$valor;
        }else $calculo=$this->mondes;
    }else $calculo=$this->mondes;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getTotart($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('REFFAC', 'Fafactur', 'Tipmon', self::getReffac());
        $valor=H::getX_vacio('REFFAC', 'Fafactur', 'Valmon', self::getReffac());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->totart/$valor;
        }else $calculo=$this->totart;
    }else $calculo=$this->totart;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function getPorrgo()
    {
      $c = new Criteria();
      $c->add(FargoartPeer::REFDOC,self::getReffac());
      $c->add(FargoartPeer::CODART,self::getCodart());
      $result=FargoartPeer::doSelectOne($c);
      if($result){
        $p= new Criteria();
        $p->add(FarecargPeer::CODRGO,$result->getCodrgo());
        $recarg=FarecargPeer::doSelectOne($p);
        if($recarg) return $recarg->getMonrgo();
        else return 0;
      }else{
        return 0;
      }

    }
}
