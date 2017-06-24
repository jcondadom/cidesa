<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'catipalm'.
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
class CatipalmPeer extends BaseCatipalmPeer
{
  public static function getTipos()
  {
    $resp = array();
    $c = new Criteria();
    $m = CatipalmPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getId()] = $mon->getNomtip();
      }
    }
    return $resp;
  }
}
