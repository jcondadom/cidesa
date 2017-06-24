<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'tstipcue'.
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
class TstipcuePeer extends BaseTstipcuePeer
{

	public static function getDestip($codigo)
	{
    	return Herramientas::getX('CODTIP','Tstipcue','Destip',$codigo);
	}

 public static function ListaTipoCuenta()
  {
    $resp = array();
    $c = new Criteria();
    $m = TstipcuePeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodtip()] = $mon->getDestip();
      }
    }
    return $resp;
  }
}