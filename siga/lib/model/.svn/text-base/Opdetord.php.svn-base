<?php

/**
 * Subclass for representing a row from the 'opdetord'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Opdetord.php 44233 2011-05-05 14:06:06Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Opdetord extends BaseOpdetord
{
  private $check = ''; 
  private $retiva = '';
  protected $refe="";
  protected $refsal = '';

  public function setCheck($val)
  {
	$this->check = $val;		
  }
	
  public function getCheck()
  {
	return $this->check;		
  }

  public function setRetiva($val)
  {
	$this->retiva = $val;		
  }
	
  public function getRetiva()
  {
  	$c= new Criteria();
  	$reg= CadefartPeer::doSelectOne($c);
  	if ($reg)
  	{ $afectarecargo=$reg->getAsiparrec();
  	}else {$afectarecargo='C';}

  	if ($afectarecargo=='R' || $afectarecargo=='S')
  	{
  	  Herramientas::obtenerFormatoCategoria($formatopar,$iniciopartida);
  	  $par=substr(self::getCodpre(),$iniciopartida,strlen($formatopar));
  	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,$par);
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		return 'S';
  	  }else return 'N';
   }else if ($afectarecargo=='P')
   {
   	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,self::getCodpre());
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		return 'S';
  	  }else return 'N';

  }
}

public function getMoncau($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('NUMORD', 'Opordpag', 'Codmon', self::getNumord());
        $valor=H::getX_vacio('NUMORD', 'Opordpag', 'Valmon', self::getNumord());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->moncau/$valor;
        }else $calculo=$this->moncau;
    }else $calculo=$this->moncau;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

}

  public function getMondes($val=false)
  {
     if (self::getId())
    {
        $moneda=H::getX_vacio('NUMORD', 'Opordpag', 'Codmon', self::getNumord());
        $valor=H::getX_vacio('NUMORD', 'Opordpag', 'Valmon', self::getNumord());
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $calculo=$this->mondes/$valor;
        }else $calculo=$this->mondes;
    }else $calculo=$this->mondes;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

      public function setMoncau($v)
	{

        if ($this->moncau !== $v) {
            $this->moncau = Herramientas::toFloat($v);
            $this->modifiedColumns[] = OpdetordPeer::MONCAU;
          }

	}

	public function setMondes($v)
	{

        if ($this->mondes !== $v) {
            $this->mondes = Herramientas::toFloat($v);
            $this->modifiedColumns[] = OpdetordPeer::MONDES;
          }

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
            $this->modifiedColumns[] = OpdetordPeer::MONRET;
          }
    }

public function getNompre()
  {
    return H::getX_vacio('CODPRE','Cpdeftit','Nompre',self::getCodpre());
  }            
}
