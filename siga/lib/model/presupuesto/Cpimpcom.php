<?php

/**
 * Subclass for representing a row from the 'cpimpcom'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpimpcom.php 59483 2014-11-17 20:35:11Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpimpcom extends BaseCpimpcom
{
  protected $comprometido = '';
  protected $acausar = '';
  protected $check = '';
  protected $retiva = '';
  protected $monporpag = 0.00;
  protected $mondis = 0.00;
  protected $mondescre = 0.00;
  protected $monret="0,00";
  protected $monporcom="0,00";
  protected $nompre="";
  
  
  public function afterHydrate()
  {
    if (self::getId())
    {
        //Comprometido
       $this->comprometido= self::getMonimp() - self::getMonaju();
        $moneda=H::getX_vacio('ORDCOM', 'Caordcom', 'Tipmon', self::getRefcom());
        if ($moneda!='')
        {
            $valor=H::getX_vacio('ORDCOM', 'Caordcom', 'Valmon', self::getRefcom());
            $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2!=$moneda)
            {
                $this->comprometido=$this->comprometido/$valor;
            }
        }else {
            $moneda2=H::getX_vacio('REFCOM', 'Cpcomext', 'Codmon', self::getRefcom());
            if ($moneda2!='')
            {
                $valor=H::getX_vacio('REFCOM', 'Cpcomext', 'Valmon', self::getRefcom());
                $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
                if ($moneda2!=$moneda)
                {
                   $this->comprometido=$this->comprometido/$valor;
                }
            }
        }

        $this->mondis=H::FormatoMonto(H::Monto_disponible(H::getCodPreDis(self::getCodpre()),'2013-12-01'));
        $this->nompre=H::getX_vacio('CODPRE','Cpdeftit','Nompre',self::getCodpre());
        
        //Acausar
        if($this->mondescre>0) $this->acausar= $this->mondescre;
        else $this->acausar= self::getMonimp() - $this->moncau - self::getMonaju();//self::getMonimp() - self::getMoncau() - self::getMonaju();
        $moneda=H::getX_vacio('ORDCOM', 'Caordcom', 'Tipmon', self::getRefcom());
        if ($moneda!='')
        {
            $valor=H::getX_vacio('ORDCOM', 'Caordcom', 'Valmon', self::getRefcom());
            $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2!=$moneda)
            {
                $this->acausar=$this->acausar/$valor;
            }
        }else {
            $moneda2=H::getX_vacio('REFCOM', 'Cpcomext', 'Codmon', self::getRefcom());
            if ($moneda2!='')
            {
                $valor=H::getX_vacio('REFCOM', 'Cpcomext', 'Valmon', self::getRefcom());
                $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
                if ($moneda2!=$moneda)
                {
                   $this->acausar=$this->acausar/$valor;
                }
            }
        }
                
        ///Retiva
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
                    $this->retiva='N';
                  else
                    $this->retiva='S';
              }else $this->retiva='N';
           }else if ($afectarecargo=='P')
           {
                  $c= new Criteria();
                  $c->add(TsretivaPeer::CODPAR,self::getCodpre());
                  $datos= TsretivaPeer::doSelectOne($c);
                  if ($datos)
                  {
                        if ($datos->getAnoant()=='S')
                        $this->retiva='N';
                      else
                        $this->retiva='S';
                  }else $this->retiva='N';
           }
    }
    
  }

  /*public function getMondis(){
        $c = new Criteria();
        //$c->add(CpsolmovadiPeer::REFADI, $this->getRefadi());
        $c->add(CpasiiniPeer::CODPRE, $this->getCodpre());
        $c->add(CpasiiniPeer::PERPRE, '00');
        $reg = CpasiiniPeer::doSelectOne($c);

        if ($reg){
            return H::FormatoMonto($reg->getMondis());
        }
    }*/

  public function setComprometido($v)
  {
	if ($this->comprometido !== $v) {
        $this->comprometido = Herramientas::toFloat($v);
        }
  }

  public function getComprometido($val=false)
  {
  	if($val) return number_format($this->comprometido,2,',','.');
       else return $this->comprometido;
  }

  public function setAcausar($v)
  {
	  if ($this->acausar !== $v) {
            $this->acausar = Herramientas::toFloat($v);
        }
  }

  public function getAcausar($val=false)
  {
    if($val) return number_format($this->acausar,2,',','.');
       else return $this->acausar;
  }

  /*public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }*/

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

  public function setMondescre($val)
  {
    $this->mondescre = $val;
  }
  
   public function getMoncau($val=false)
  {
   if (self::getId())
    {
       $context = sfContext::getInstance();
       $modulo = $context->getModuleName();
       if ($modulo=='pagemiord')
       {
        $moneda=H::getX_vacio('ORDCOM', 'Caordcom', 'Tipmon', self::getRefcom());
        if ($moneda!='')
        {
            $valor=H::getX_vacio('ORDCOM', 'Caordcom', 'Valmon', self::getRefcom());
            $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2!=$moneda)
            {
                $calculo=$this->moncau/$valor;
            }else $calculo=$this->moncau;
        }else {
            $moneda2=H::getX_vacio('REFCOM', 'Cpcomext', 'Codmon', self::getRefcom());
            if ($moneda2!='')
            {
                $valor=H::getX_vacio('REFCOM', 'Cpcomext', 'Valmon', self::getRefcom());
                $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
                if ($moneda2!=$moneda)
                {
                    $calculo=$this->moncau/$valor;
                }else $calculo=$this->moncau;
            }else $calculo=$this->moncau;
        }
       }else $calculo=$this->moncau;
    }else $calculo=$this->moncau;
    
    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function setMoncau($v)
    {
        if ($this->moncau !== $v) {
            $this->moncau = Herramientas::toFloat($v);
            $this->modifiedColumns[] = CpimpcomPeer::MONCAU;
          }

    }

    public function getCodpredis()
    {
      return H::GetCodPreDis($this->getCodpre());
    }  
   

}
