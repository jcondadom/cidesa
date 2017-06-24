<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'optipdes'.
 *
 * Tabla que contiene información referente a tipos de descuentos
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class OptipdesPeer extends BaseOptipdesPeer
{
	public static function ListaDescuento()
	  {
	    $resp = array();
	    $c = new Criteria();
	    $m = OptipdesPeer::doSelect($c);
	    if($m){
	      foreach($m as $mon){
	          $resp[$mon->getCodtde()] = $mon->getCodtde().' - '.$mon->getDestde();
	      }
	    }
	    return $resp;
	  }
}
