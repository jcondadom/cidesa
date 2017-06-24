<?php

/**
 * Subclass for representing a row from the 'fadetpre'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadetpre.php 60386 2015-01-30 16:11:07Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fadetpre extends BaseFadetpre
{
	protected $obj = array();
    //protected $desart="";
	protected $canord="0,00";
	protected $candes="0,00";
	protected $canaju="0,00";
	protected $cantot="0,00";
	protected $preart="0,00";
	protected $precioe="0,00";
	protected $totart2="0,00";
	protected $porrgo="0,00";
  protected $btucon="0,00";
  protected $check="";
  protected $recargos="";
  protected $contratos="";
  protected $tipocon="";
  protected $anapreunimat="";
  protected $anapreuniequ="";
  protected $anapreuniman="";
  protected $anapreuniser="";

  /*public function getDesart()
  {
   return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }*/

   public function afterHydrate()
  {
    if (self::getPrecio()!=0)
    {
      $this->precioe=number_format(self::getPrecio(), 2, ',', '.');
    }
    $porcrgo=0;
    $c= new Criteria();
    $c->add(FarecargPeer::TIPRGO,'P');
    $this->sql = "codrgo in (select codrgo from farecart where codart = '".self::getCodart()."')";
	$c->add(FarecargPeer::CODRGO,$this->sql,Criteria :: CUSTOM);
    $reg=FarecargPeer::doSelect($c);
	if ($reg){
	 foreach ($reg as $sum)
	 {
	   $porcrgo += $sum->getMonrgo();
	 }
	}
    $this->porrgo=number_format($porcrgo,2,',','.');

    $this->canord=number_format(self::getCansol(), 2, ',', '.');
    $this->preart=number_format(self::getPrecio(), 2, ',', '.');
    $this->cantot=number_format(self::getCansol(), 2, ',', '.');
    $val=self::getPrecio() * self::getCansol() + self::getMonrgo();
    $this->totart2=number_format($val, 2, ',', '.');

    if (self::getMonrgo()>0 || self::getMondesc()>0)
     $this->check='1';

    $a= new Criteria();
    $a->add(FargoprePeer::REFDOC,self::getRefpre());
    $a->add(FargoprePeer::CODART,self::getCodart());
    $result=FargoprePeer::doSelect($a);
    if ($result)
    {   $this->recargos="";
        foreach ($result as $datos)
        {
           $monrgoq=H::FormatoMonto($datos->getMonrgo());
           $monrgoc=H::FormatoMonto($datos->getMonrgo2());
           $this->recargos=$this->recargos.$datos->getCodrgo().'_'.$datos->getNomrgo().'_'.$datos->getRecfij().'_' .$monrgoq.'_'.$datos->getCodcta().'_'.$datos->getTipo().'_'.$monrgoc.'!';
        }
    }

    $q= new Criteria();
    $q->add(FadetconPeer::REFPRE,self::getRefpre());
    $q->add(FadetconPeer::CODART,self::getCodart());
  //  $q->addJoin(FadetconPeer::PERCON,FapresupPeer::PERCON);
    $q->addJoin(FadetconPeer::REFPRE,FapresupPeer::REFPRE);
    $resultq=FadetconPeer::doSelect($q);
    if ($resultq)
    {
        foreach ($resultq as $datosq)
        {
           $this->contratos=$this->contratos.date('d/m/Y',strtotime($datosq->getFecini())).'_'.date('d/m/Y', strtotime($datosq->getFecfin())).'_'.$datosq->getCancon().'_'.self::getCansol().'!';
        }
    }

    $m= new Criteria(); //Materiales
    $m->add(FaprematartPeer::REFPRE,self::getRefpre());
    $m->add(FaprematartPeer::CODART,self::getCodart());
    $resultm=FaprematartPeer::doSelect($m);
    if ($resultm)
    {
        foreach ($resultm as $objmat)
        {
           $this->anapreunimat=$this->anapreunimat.$objmat->getCodmat().'_'.$objmat->getDesmat().'_'.$objmat->getUnimat().'_'.$objmat->getCanmat().'_' .H::FormatoMonto($objmat->getCosmat()).'_'.H::FormatoMonto($objmat->getTotmat()).'!';
        }
    }

    $e= new Criteria();  //Maquinaria y Equipos
    $e->add(FapreequartPeer::REFPRE,self::getRefpre());
    $e->add(FapreequartPeer::CODART,self::getCodart());
    $resulte=FapreequartPeer::doSelect($e);
    if ($resulte)
    {
        foreach ($resulte as $objequ)
        {
           $this->anapreuniequ=$this->anapreuniequ.$objequ->getCodequ().'_'.$objequ->getDesequ().'_'.$objequ->getUniequ().'_'.$objequ->getCanequ().'_' .H::FormatoMonto($objequ->getCosequ()).'_'.H::FormatoMonto($objequ->getTotequ()).'!';
        }
    }

    $o= new Criteria();  //Mano de Obra
    $o->add(FapremanartPeer::REFPRE,self::getRefpre());
    $o->add(FapremanartPeer::CODART,self::getCodart());
    $resulto=FapremanartPeer::doSelect($o);
    if ($resulto)
    {
        foreach ($resulto as $objman)
        {
           $this->anapreuniman=$this->anapreuniman.$objman->getCodman().'_'.$objman->getDesman().'_'.$objman->getUniman().'_'.$objman->getCanman().'_' .H::FormatoMonto($objman->getCosman()).'_'.H::FormatoMonto($objman->getTotman()).'!';
        }
    }

    $m= new Criteria(); //Servicios Externos
    $m->add(FapreserartPeer::REFPRE,self::getRefpre());
    $m->add(FapreserartPeer::CODART,self::getCodart());
    $resultse=FapreserartPeer::doSelect($m);
    if ($resultse)
    {
        foreach ($resultse as $objser)
        {
           $this->anapreuniser=$this->anapreuniser.$objser->getCodser().'_'.$objser->getDesser().'_'.$objser->getUniser().'_'.$objser->getCanser().'_' .H::FormatoMonto($objser->getCosser()).'_'.H::FormatoMonto($objser->getTotser()).'!';
        }
    }

    if (self::getId()){
      $this->tipocon=H::getX_vacio('REFPRE','Fapresup','Percon',self::getRefpre());
    }
  }

  public function getMondesc($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('REFPRE', 'Fapresup', 'Tipmon', self::getRefpre());
        $valor=H::getX_vacio('REFPRE', 'Fapresup', 'Valmon', self::getRefpre());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->mondesc/$valor;
        }else $calculo=$this->mondesc;
    }else $calculo=$this->mondesc;
    
    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getMonrgo($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('REFPRE', 'Fapresup', 'Tipmon', self::getRefpre());
        $valor=H::getX_vacio('REFPRE', 'Fapresup', 'Valmon', self::getRefpre());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->monrgo/$valor;
        }else $calculo=$this->monrgo;
    }else $calculo=$this->monrgo;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getTotart($val=false)
  {

    if (self::getId())
    {
        $moneda=H::getX_vacio('REFPRE', 'Fapresup', 'Tipmon', self::getRefpre());
        $valor=H::getX_vacio('REFPRE', 'Fapresup', 'Valmon', self::getRefpre());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->totart/$valor;
        }else $calculo=$this->totart;
    }else $calculo=$this->totart;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

  public function setMondesc($v)
  {

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetprePeer::MONDESC;
      }
  
  } 
  
  public function setMonrgo($v)
  {

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetprePeer::MONRGO;
      }
  
  } 
  
  public function setTotart($v)
  {

    if ($this->totart !== $v) {
        $this->totart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FadetprePeer::TOTART;
      }
  
  } 


}
