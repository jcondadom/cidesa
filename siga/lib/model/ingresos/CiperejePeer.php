<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cipereje'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: CiperejePeer.php 32416 2009-09-02 02:21:12Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class CiperejePeer extends BaseCiperejePeer
{
  public static function Periodos()
  {
    $resp = array();
    $c = new Criteria();
    $c->addAscendingOrderByColumn(CiperejePeer::PEREJE);
    $p = CiperejePeer::doSelect($c);
    if($p){
      foreach($p as $per){
        $resp[$per->getPereje()] = $per->getPereje();
      }
    }
    return $resp;
  }
}
