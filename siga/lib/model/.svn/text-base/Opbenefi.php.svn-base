<?php

/**
 * Subclass for representing a row from the 'opbenefi'.
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
class Opbenefi extends BaseOpbenefi
{
	protected $tiedatrel="";
	protected $oculsave="";
	protected $obj=array();

   public function __toString()
  {
    return $this->cedrif;
  }

	public function getNomcuentacont()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodcta()));
	}
	public function getNomcuentaord()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodord()));
	}
	public function getNomcuentapercon()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodpercon()));
	}
	public function getTipobene()
	{
		return Herramientas::getX('CodTipBen','OpTipBen','DesTipBen',trim(self::getCodtipben()));
	}
	public function getNomcuentacontsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodctasec()));
	}
	public function getNomcuentaordsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodordadi()));
	}
	public function getNomcuentaperconsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodperconadi()));
	}
	public function getNomctacajchi()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodctacajchi()));
	}

  public function getTiedatrel()
  {
  	  $valor="N";
  	  $d= new Criteria();
  	  $d->add(OpordpagPeer::CEDRIF,self::getCedrif());
  	  $resul= OpordpagPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  } else $valor= 'N';
  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

  public function getOculsave()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagbenfic',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('oculsave',$varemp['aplicacion']['tesoreria']['modulos']['pagbenfic']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagbenfic']['oculsave'];
	       }
         }
     return $dato;
  }

  public function setOculsave()
  {
  	return $this->oculsave;
  }
  
  public function getCodresuso()
    {
    	return self::getCedrif();
    }

    public function getNomresuso()
    {
    	return self::getNomben();
    }

    public function getBenvarcta()
    {
        return H::getConfApp2('benvarcta', 'tesoreria', 'pagbenfic');
    }

    public function getNomemp()
    {
    	return self::getNomben();
    }

    public function getCodemp()
    {
    	return self::getCedrif();
    }
    
    public function getNomempaco()
    {
    	return self::getNomben();
    }

    public function getCodempaco()
    {
    	return self::getCedrif();
    }

  public function getNomcue()
  {
    return Herramientas::getX_vacio('Numcue','Tsdefban','Nomcue',self::getNumcue());
  }    

  public function getNomctafonant()
  {
    return Herramientas::getX('Codcta','contabb','descta',self::getCodctaant());
  }

  public function getDesban()
  {
    return Herramientas::getX_vacio('CODBAN','Cabanco','Desban',self::getCodban());
  }   

  public function getTieCuePer(){
     $c= new Criteria();
     $c->add(NphojintPeer::RIFEMP, self::getCedrif());
     $per= NphojintPeer::doSelectOne($c);
     if ($per){
       if ($per->getNumcue()!='' && $per->getNumcue()==self::getNumcueb())
        return 'S';
       else
        return '';
     }else {
       $q= new Criteria();
       $q->add(NphojintPeer::CEDEMP, self::getCedrif());
       $perq= NphojintPeer::doSelectOne($q);
       if ($perq){
         if ($perq->getNumcue()!='' && $perq->getNumcue()==self::getNumcueb())
          return 'S';
         else
          return '';
       }else return '';
     }
  }

  public function getNomctaopant()
  {
    return Herramientas::getX('Codcta','contabb','descta',self::getCodcopant());
  }

  public function getRifcon()
  {
    return self::getCedrif();
  }

  public function getNomcon()
  {
    return self::getNomben();
  }
}
