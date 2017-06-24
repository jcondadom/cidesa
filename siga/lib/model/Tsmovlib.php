<?php

/**
 * Subclass for representing a row from the 'tsmovlib'.
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
class Tsmovlib extends BaseTsmovlib
{
  protected $ctacon = '';
  protected $debcre = '';
  protected $check = '';
  protected $codcon="";
  protected $savecedrif="";
  protected $ctaeje="";
  protected $savemovcero="";
  protected $codtip="";
  protected $grid= array();
  protected $grid2= array();
  protected $esrein="";


  public function getCtaeje()
  {
    if($this->ctaeje==""){
      $c=new Criteria();
      $contaba = ContabaPeer::doSelectOne($c);
      if($contaba)
      {
        $this->ctaeje=$contaba->getCodctapageje();
      }
    }
    return $this->ctaeje;
  }

	public function getNomcue()
    {
		return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
    }

	public function getDestip()
    {
	if ($this->codtip!='')
            return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getCodtip());
        else
            return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmov());
    }

	public function getIdrefer()
	{
		return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
	}

	public function getDescom()
	{
		return Herramientas::getX_vacio('numcom','contabc','descom',self::getNumcom());
	}

	public function __toString()
    {
		return $this->getReflib();
    }

  public function getSavecedrif()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovseglib',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('savecedrif',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['savecedrif'];
	       }
         }
     return $dato;
  }

  public function setSavecedrif()
  {
  	return $this->savecedrif;
  }

    public function getNomben()
    {
       return Herramientas::getX('CEDRIF','Opbenefi','Nomben',self::getCedrif());
    }

  public function getSavemovcero()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovseglib',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('savemovcero',$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovseglib']['savemovcero'];
	       }
         }
     return $dato;
  }

  public function setSavemovcero()
  {
  	return $this->savemovcero;
  }


  public function getInf()
  {
    return "Hola Mundo";
  }

      public function getReflibmay8()
    {
            return H::getConfApp2('reflibmay8', 'tesoreria', 'tesmovseglib');
    }
    
     public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,6,',','.');
    else return $this->valmon;

  }
  
    public function setValmon($v)
    {

        if ($this->valmon !== $v) {
            $this->valmon = Herramientas::toFloat($v,6);
            $this->modifiedColumns[] = TsmovlibPeer::VALMON;
          }  
    } 
public function getMonmov($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getCodmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monmov/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monmov;
    }else $calculo=$this->monmov;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function setMonmov($v)
    {
        if ($this->monmov !== $v) {
            $this->monmov = Herramientas::toFloat($v);
            $this->modifiedColumns[] = TsmovlibPeer::MONMOV;
          }
    }

  public function getDespro()
  {
    $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
      if ($catprofor=='S')
        return Herramientas::getX('CODPRO','Fordefpry','Nompro',self::getCodpro());
      else
        return H::getX_vacio('CODPRO','Catippro','Despro',self::getCodpro());
  } 

  public function getDesdirec()
  {
      return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }   

  public function getNomcon(){
    return H::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getRifcon());
  }

   public function getDestipgas(){
    return H::getX_vacio('CODTIPGAS','Nptipgas','Destipgas',self::getCodtipgas());
  }

    public function getEsrein()
  {
    return H::getX_vacio('CODTIP','Tstipmov','Esrein',self::getTipmov());
  }

  public function setEsrein()
  {
    return $this->esrein;
  }

}
