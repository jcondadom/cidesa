<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'ocmunici'.
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
class OcmuniciPeer extends BaseOcmuniciPeer
{
	public static function ObtenerMunicipios($codciu="", $codedo="", $codpai="")
  {
  	$resp = array();

  	$c= new Criteria();
  	if ($codpai!="") $c->add(OcmuniciPeer::CODPAI,$codpai);
  	if ($codedo!="") $c->add(OcmuniciPeer::CODEDO,$codedo);
  	if ($codciu!="") $c->add(OcmuniciPeer::CODCIU,$codciu);
    $e = OcmuniciPeer::doSelect($c);
    if($e){      
      foreach($e as $esta){
        $resp[$esta->getCodmun()] = $esta->getNommun();
      }     
    }

    return $resp;
  }
}
