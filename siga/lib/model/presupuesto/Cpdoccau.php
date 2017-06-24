<?php

/**
 * Subclass for representing a row from the 'cpdoccau'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpdoccau.php 51141 2013-03-07 16:02:05Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpdoccau extends BaseCpdoccau
{
  protected $etadef="";

  public function getEtadef() {
    $cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
	if ($cpdefniv){
	   return $cpdefniv->getEtadef();
	 } else return 1;
    }

    public function setEtadef()
    {
        return $this->etadef;
    }

  public function getTipmovren()
  {
  	return self::getTipcau();
  }

  public function getNommovren()
  {
  	return self::getNomext();
  }
  
      public function getMascaraConta()
      {
      return Herramientas::getX('Codemp','Contaba','Forcta','001');

      }

    public function getLoncta()
      {
      return strlen(self::getMascaraConta());

      }
      
  public function getDescta()
    {
      return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
    }  

     public function getDestiptra()
      {
      return Herramientas::getX_vacio('Codtiptra','Cotiptra','Destiptra',self::getCodtiptra());

      }    
}
