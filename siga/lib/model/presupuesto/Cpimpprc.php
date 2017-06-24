<?php

/**
 * Subclass for representing a row from the 'cpimpprc'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpimpprc.php 59483 2014-11-17 20:35:11Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpimpprc extends BaseCpimpprc
{
  protected $mondis='';
  private $montrue = '';
  private $check = '';
  private $monimpaju="";
  protected $monret="0,00";
  //protected $nompre="";

  private $monporpag = 0.00;

  private $retiva = '';


    public function getMondis(){
        $c = new Criteria();
        //$c->add(CpsolmovadiPeer::REFADI, $this->getRefadi());
        $c->add(CpasiiniPeer::CODPRE, $this->getCodpre());
        $reg = CpasiiniPeer::doSelectOne($c);

        if ($reg){
            return H::FormatoMonto($reg->getMondis());
        }
    }

  public function setMontrue($val)
  {
	$this->montrue = $val;
  }

  public function getMontrue()
  {
  	$montrue= self::getMonimp() - self::getMoncau() - self::getMonaju();
        if (self::getId())
        {
            $moneda=H::getX_vacio('REQART', 'Casolart', 'Tipmon', self::getRefprc());
            if ($moneda!='')
            {
                $valor=H::getX_vacio('REQART', 'Casolart', 'Valmon', self::getRefprc());
                $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
                if ($moneda2!=$moneda)
                {
                    $calculo=$montrue/$valor;
                }else $calculo=$montrue;
            }else $calculo=$montrue;
        }else $calculo=$montrue;

	return $calculo;
  }

  public function setMonimpaju($val)
  {
	$this->monimpaju = $val;
  }

  public function getMonimpaju()
  {
  	$monimpaju= self::getMonimp() - self::getMonaju();
        if (self::getId())
        {
            $moneda=H::getX_vacio('REQART', 'Casolart', 'Tipmon', self::getRefprc());
            if ($moneda!='')
            {
                $valor=H::getX_vacio('REQART', 'Casolart', 'Valmon', self::getRefprc());
                $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
                if ($moneda2!=$moneda)
                {
                    $calculo=$monimpaju/$valor;
                }else $calculo=$monimpaju;
            }else $calculo=$monimpaju;
        }else $calculo=$monimpaju;
        
	return $calculo;
  }

  public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }

  public function getMonporpag()
  {
	$montot= (self::getMonimp()-self::getMonpag()-self::getMonaju());
	return $montot;
  }

   public function setMonporpag($val)
  {
	$this->monporpag = $val;
  }

    public function getMonporpagGrid()
  {
	return $this->monporpag;
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
  		if ($datos->getAnoant()=='S')
  		return 'N';
              else
  		return 'S';
  	  }else return 'N';
   }else if ($afectarecargo=='P')
   {
   	  $c= new Criteria();
  	  $c->add(TsretivaPeer::CODPAR,self::getCodpre());
  	  $datos= TsretivaPeer::doSelectOne($c);
  	  if ($datos)
  	  {
  		if ($datos->getAnoant()=='S')
  		return 'N';
              else
  		return 'S';
  	  }else return 'N';

   }
  }

  public function setRetiva($val)
  {
	$this->retiva = $val;
  }

  public function getMoncau($val=false)
  {
    if (self::getId())
    {
        $moneda=H::getX_vacio('REQART', 'Casolart', 'Tipmon', self::getRefprc());
        if ($moneda!='')
        {
            $valor=H::getX_vacio('REQART', 'Casolart', 'Valmon', self::getRefprc());
            $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2!=$moneda)
            {
                $calculo=$this->moncau/$valor;
            }else $calculo=$this->moncau;
        }else $calculo=$this->moncau;
    }else $calculo=$this->moncau;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

}

    public function setMoncau($v)
    {

    if ($this->moncau !== $v) {
        $this->moncau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpimpprcPeer::MONCAU;
      }

    } 

      public function getNompre()
  {
    return H::getX_vacio('CODPRE','Cpdeftit','Nompre',self::getCodpre());
  }  

}
