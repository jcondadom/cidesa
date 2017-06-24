<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'facladto'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: FacladtoPeer.php 47350 2012-02-16 14:29:19Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FacladtoPeer extends BaseFacladtoPeer
{
  public static function getUsuarios()
  {
  	$resp = array();
    $c = new Criteria();
    $m = FacladtoPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getLoguse()] = $mon->getLoguse();
      }
    }
    return $resp;
  }
}
