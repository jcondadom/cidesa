<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npcosnivf'.
 *
 * Registro de Costo por nivel y fecha de vigencia
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class NpcosnivfPeer extends BaseNpcosnivfPeer
{
	 public static function getNiveles()
  {
    $resp = array();

    $c = new Criteria();
    $m = NpcosnivfPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodnivc()] = $mon->getCodnivc();
      }
    }
    return $resp;
  }
}
