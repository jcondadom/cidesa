<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'causualm'.
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
class CausualmPeer extends BaseCausualmPeer
{
  public static function getAlmsByUsu($usu){

    $c = new Criteria();
    $c->add(CausualmPeer::CEDEMP,$usu);
    $alms = CausualmPeer::doSelectJoinCadefalm($c);
    $result = array();

    foreach($alms as $alm){
      $result[$alm->getCodalm()] = $alm->getNomalm();
    }

    return $result;
  }
}
