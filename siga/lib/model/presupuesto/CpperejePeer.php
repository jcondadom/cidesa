<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'cppereje'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: CpperejePeer.php 54674 2013-12-04 14:58:10Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class CpperejePeer extends BaseCpperejePeer
{
  public static function getPeriodos()
  {
  	$arr = array();
    $c = new Criteria();
    $c->addAscendingOrderByColumn(CpperejePeer::PEREJE);
    $reg = CpperejePeer::doSelect($c);
    if($reg){
      foreach($reg as $registros){
        $arr[$registros->getPereje()] = $registros->getPereje();
      }
    }
    return $arr;
  }
}
