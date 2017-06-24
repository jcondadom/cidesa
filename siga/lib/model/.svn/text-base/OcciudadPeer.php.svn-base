<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'occiudad'.
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
class OcciudadPeer extends BaseOcciudadPeer
{
	public static function ObtenerCiudades($codedo="", $codpai="")
  {
  	$resp = array();

  	$c= new Criteria();
  	if ($codpai!="") $c->add(OcciudadPeer::CODPAI,$codpai);
  	if ($codedo!="") $c->add(OcciudadPeer::CODEDO,$codedo);
    $e = OcciudadPeer::doSelect($c);
    if($e){      
      foreach($e as $esta){
        $resp[$esta->getCodciu()] = $esta->getNomciu();
      }     
    }

    return $resp;
  }
}
