<?php

/**
 * Subclass for representing a row from the 'caramart'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: amelendez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Caramart.php 45953 2011-09-20 13:51:09Z amelendez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Caramart extends BaseCaramart
{
  protected $tiedatrel="";
  protected $indicador="";

   public function getTiedatrel()
  {
   	$valor="N";
   	if (self::getId()){
  	$d= new Criteria();
  	$d->add(CaregartPeer::RAMART,self::getRamart());
  	$resul= CaregartPeer::doSelectOne($d);
  	if ($resul)
  	{
  		$valor= 'S';
  	}
  	else $valor= 'N';
   	}

  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

  public function getCodramhcm()
  {
    return self::getRamart();
  }

  public function getCodramgasfun()
  {
    return self::getRamart();
  }

  public function getNomram2()
  {
    return self::getNomram();
  }
}
