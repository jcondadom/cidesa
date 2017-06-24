<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'ocparroq'.
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
class OcparroqPeer extends BaseOcparroqPeer
{
	public static function ObtenerParroquias($codmun="", $codedo="", $codpai="")
  {
  	$resp = array();

  	$c= new Criteria();
  	if ($codpai!="") $c->add(OcparroqPeer::CODPAI,$codpai);
  	if ($codedo!="") $c->add(OcparroqPeer::CODEDO,$codedo);
  	if ($codmun!="") $c->add(OcparroqPeer::CODMUN,$codmun);
    $e = OcparroqPeer::doSelect($c);
    if($e){      
      foreach($e as $esta){
        $resp[$esta->getCodpar()] = $esta->getNompar();
      }     
    }

    return $resp;
  }
}
