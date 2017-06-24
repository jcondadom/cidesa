<?php

/**
 * Subclass for representing a row from the 'opdefemp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Opdefemp.php 58715 2014-09-16 21:12:03Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Opdefemp extends BaseOpdefemp
{
	protected $aprmonche="";
	protected $obj1=array();
	protected $obj2=array();
	protected $obj3=array();
	protected $obj4=array();
	protected $obj5=array();
	protected $obj6=array();
	protected $obj7=array();
	protected $tiptra="";

	public function getNomemp()
	{
		return Herramientas::getX_vacio('codemp','empresa','nomemp',self::getCodemp());
	}
	public function getDiremp()
	{
		return Herramientas::getX_vacio('codemp','empresa','diremp',self::getCodemp());
	}
	public function getNomctapag()
	{
		return Herramientas::getX_vacio('codcta','contabb','descta',self::getCtapag());
	}
	public function getNomctades()
	{
		return Herramientas::getX('codcta','contabb','descta',self::getCtades());
	}
	public function getNomtipnom()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdnom());
	}
	public function getNomttipobr()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdobr());
	}
	public function getNomtipeje()
	{
		return Herramientas::getX_vacio('codtip','tstipmov','destip',self::getTipeje());
	}
	public function getNomtipliq()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdliq());
	}

	public function getNomtipfid()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdfid());
	}

	public function getNomtipobr()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdval());
	}

	public function getNomcuecajchi()
	{
		return Herramientas::getX_vacio('numcue','Tsdefban','nomcue',self::getCuecajchi());
	}

    public function getNomtipcajchi()
	{
		return Herramientas::getX_vacio('codtip','Tstipmov','destip',self::getTipcajchi());
	}

    public function getNomtiprencajchi()
	{
		return Herramientas::getX_vacio('tipcau','Cpdoccau','nomext',self::getTiprencajchi());
	}

	 public function getNomben()
	{
		return Herramientas::getX_vacio('cedrif','Opbenefi','nomben',self::getCedrifcajchi());
	}

    public function getNomcat()
	{
		return Herramientas::getX_vacio('codcat','Npcatpre','nomcat',self::getCodcatcajchi());
	}

	public function getNomtipret()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdret());
	}

	public function getNomtiptna()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdtna());
	}

	public function getNomtiptba()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdtba());
	}

	public function getNomtipcre()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdcre());
	}

  public function getNomsolpag()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdsolpag());
	}

  public function getAprmonche()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('aprmonche',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['aprmonche'];
	       }
         }
     return $dato;
  }

  public function setAprmonche()
  {
  	return $this->aprmonche;
  }
  
	public function getNomext()
	{
		return Herramientas::getX_vacio('tippag','Cpdocpag','nomext',self::getTippag());
	}  

	public function getNomtipamo()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdamo());
	}	

	public function getNomant()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdant());
	}

	public function getNomantcom()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdantcom());
	}

	public function getNomtiphcm()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdhcm());
	}

	public function getNomtipcarava()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdcarava());
	}

	public function getNomtipciecaj()
	{
		return Herramientas::getX_vacio('tipcau','cpdoccau','nomext',self::getOrdciecaj());
	}

	
}
