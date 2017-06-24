<?php

/**
 * Subclase para representar una fila de la tabla 'tsdefcajchi'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Tsdefcajchi extends BaseTsdefcajchi
{

   protected $longitud="";
   protected $tiedatrel="";
   protected $oculsave="";

   public function getLongitud()
   {
     return strlen(Herramientas::getObtener_FormatoCategoria());
   }

   public function setLongitud()
   {
     return $this->longitud;
   }


    public function getNomcat()
    {
        return Herramientas::getX_vacio('codcat','Npcatpre','nomcat',self::getCodcat());
    }

    public function getNomben()
    {
        return Herramientas::getX_vacio('cedrif','Opbenefi','nomben',self::getCedrif());
    }

    public function getNomcue()
    {
        return Herramientas::getX_vacio('numcue','Tsdefban','nomcue',self::getNumcue());
    }

    public function getDestip()
    {
        return Herramientas::getX_vacio('codtip','Tstipmov','destip',self::getCodtip());
    }

    public function getNomext()
    {
        return Herramientas::getX_vacio('tipcau','Cpdoccau','nomext',self::getTipcau());
    }

  public function getTiedatrel()
  {
  	  $valor="N";
          if (self::getCodcaj()!="") {
              $d= new Criteria();
              $d->add(OpordpagPeer::CODCAJCHI,self::getCodcaj());
              $resul= OpordpagPeer::doSelectOne($d);
              if ($resul)
              {
                    $valor= 'S';
              }
          }
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
	     if(array_key_exists('tesdefcajachi',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('oculsave',$varemp['aplicacion']['tesoreria']['modulos']['tesdefcajachi']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesdefcajachi']['oculsave'];
	       }
         }
     return $dato;
  }

  public function setOculsave()
  {
  	return $this->oculsave;
  }

    public function getNomdoc()
    {
        return Herramientas::getX_vacio('tipcom','Cpdoccom','nomext',self::getTipcom());
    }  


    public function getDescta()
    {
        return Herramientas::getX_vacio('CODCTA','Contabb','Descta',self::getCtapag());
    }  

    public function getCodcajchi(){
      return self::getCodcaj();
    }  

    public function getNompag()
    {
        return Herramientas::getX_vacio('tippag','Cpdocpag','nomext',self::getTippag());
    } 
}
