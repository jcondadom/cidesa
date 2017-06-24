<?php

/**
 * Subclass for representing a row from the 'bnreginm'.
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
class Bnreginm extends BaseBnreginm
{
	protected $codcla='';
	protected $descla='';
	protected $etifeccal="";
        protected $savenumord="";
	
	public function hydrate(ResultSet $rs, $startcol = 1)
    {
      parent::hydrate($rs, $startcol);
      $this->codcla=self::getClafun();
    }
	
	public function getDescla()
	{
		 return Herramientas::getX_vacio('codcla','bnclafun','descla',trim(self::getClafun()));
	}

	public function getNomprovee()
	{
		 return Herramientas::getX_vacio('codpro','caprovee','nompro',trim(self::getCodpro()));
	}

	public function getDesubi()
	{
   	   return Herramientas::getX_vacio('codubi','bnubibie','desubi',trim(self::getCodubi()));
	}

	public function getNomdispos()
	{
   	   return Herramientas::getX_vacio('coddis','bndisbie','desdis',trim(self::getCoddis()));
	}

    public function getValactual()
	  {
	    $des = 0;
	    $des = $this->getValini()+ $this->getValadis();
	    return $des;
	  }

  public function getEtifeccal()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactinmd',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('etifeccal',$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']['etifeccal'];
}
         }
     return $dato;
  }

  public function setEtifeccal()
  {
  	return $this->etifeccal;
  }

    public function getSavenumord()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactinmd',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('savenumord',$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']['savenumord'];
	       }
         }
     return $dato;
  }

  public function setSavenumord()
  {
  	return $this->savenumord;
  }

    public function getMansolcor()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('bienes',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['bienes']))
	     if(array_key_exists('bieregactinmd',$varemp['aplicacion']['bienes']['modulos'])){
	       if(array_key_exists('mansolcor',$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']))
	       {
	       	$dato=$varemp['aplicacion']['bienes']['modulos']['bieregactinmd']['mansolcor'];
	       }
         }
     return $dato;
  }

  public function setMansolcor()
  {
  	return $this->mansolcor;
  }

    public function getDesest()
    {
        return Herramientas::getX_vacio('codest','Bnestcon','Desest',self::getCodest());
    }

    public function getDescl2()
    {
        return Herramientas::getX_vacio('CODCLA','Bnclabie','Descla',self::getCodcl2());
    }    

    public function getDesuso()
    {
        return Herramientas::getX_vacio('CODUSO','Bndefuso','Desuso',self::getCoduso());
    }  

    public function getDesunimed()
    {
        return Herramientas::getX_vacio('CODUNIMED','Cadefunimed','Desunimed',self::getCodunimed());
    }        

    public function getDestlu()
    {
        return Herramientas::getX_vacio('CODTLU','Bntiplug','Destlu',self::getCodtlu());
    }      

  public function getNompai()
  {
      return H::getX_vacio('codpai','Bnpais','Nompai',self::getCodpai());
  } 

  public function getNomest()
  {
      return H::getX_vacio('codest','Bnestado','Nomest',self::getCodes2());
  }  

  public function getNommun()
  {
      return H::getXx('Bnmunicip',array('CODMUN','BNESTADO_CODEST'),array(self::getCodmun(),self::getCodes2()),'nommun');
  }  

    public function getNompar()
  {
      return H::getXx('Bnparroq',array('CODPAR','BNMUNICIP_CODMUN'),array(self::getCodpar(),self::getCodmun()),'nompar');
  } 

    public function getNomciu()
  {
      return H::getXx('Bnciudad',array('CODCIU','BNMUNICIP_CODMUN'),array(self::getCodciu(),self::getCodmun()),'nomciu');
  }       

  public function getDesudebip()
  {
      return H::getX_vacio('sudebip','Bncatsudebip','Desudebip',self::getSudebip());
  }
}
