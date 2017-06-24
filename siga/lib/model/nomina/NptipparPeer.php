<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'nptippar'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class NptipparPeer extends BaseNptipparPeer
{
   public static function cargarParentesco() {
     $c = new Criteria();
     $lista_parent = NptipparPeer::doSelect($c);

     $parentesco = array();

     foreach ($lista_parent as $obj_parent) {
       $parentesco += array($obj_parent->getTippar() => $obj_parent->getDespar());
     }
    return $parentesco;
  }
}
