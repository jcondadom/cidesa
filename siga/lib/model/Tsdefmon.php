<?php

/**
 * Subclase para representar una fila de la tabla 'tsdefmon'.
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
class Tsdefmon extends BaseTsdefmon
{
    protected $tiedatrel="";
    protected $obj=array();

    public function getTiedatrel()
  {
  	  $tiene = H::getX_vacio('Codmon','Tsdefban','Codmon',self::getCodmon());
      if ($tiene!='')
        $valor= 'S';
      else {
    	  $d= new Criteria();
    	  $d->add(CasolartPeer::TIPMON,self::getCodmon());
    	  $resul= CasolartPeer::doSelectOne($d);
    	  if ($resul)
    	  {
    	  	$valor= 'S';
    	  }
    	  else {
    	  	  $da= new Criteria();
  	  	  $da->add(CaordcomPeer::TIPMON,self::getCodmon());
  	  	  $resula= CaordcomPeer::doSelectOne($da);
  	  	  if ($resula) $valor= 'S';
  	  	  else $valor= 'N';
    	  }
    }
  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }
}
