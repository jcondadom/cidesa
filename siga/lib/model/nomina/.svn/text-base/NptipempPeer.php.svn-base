<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'nptipemp'.
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
class NptipempPeer extends BaseNptipempPeer
{
	public static function CargarTipEmp() {
    $c = new Criteria();
    $lista_tipemp = NptipempPeer::doSelect($c);

    $tipemp = array();

    foreach ($lista_tipemp as $obj_tipemp) {
      $tipemp += array($obj_tipemp->getCodtipemp() => $obj_tipemp->getDestipemp());
    }
    return $tipemp;
  }
}
