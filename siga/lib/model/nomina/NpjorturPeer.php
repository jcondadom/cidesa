<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npjortur'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class NpjorturPeer extends BaseNpjorturPeer
{
  public static function getJornadas()
  {
    $resp = array();
    $c = new Criteria();
    $m = NpjorturPeer::doSelect($c);
    if($m){
      foreach($m as $jor){
        $resp[$jor->getCodjor()] = $jor->getDesjor();
      }
    }
    return $resp;
  }
}
