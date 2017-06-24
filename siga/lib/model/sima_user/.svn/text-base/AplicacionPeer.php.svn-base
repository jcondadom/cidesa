<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'aplicacion'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class AplicacionPeer extends BaseAplicacionPeer
{
  public static function getAplicaciones()
  {
  	$resp = array();
    $c = new Criteria();
    $m = AplicacionPeer::doSelect($c);
    if($m){
      foreach($m as $apl){
        $resp[$apl->getCodapl()] = $apl->getNomapl();
}
    }
    return $resp;
  }

  public static function CargarModulos()
  {
    $c = new Criteria();
    $lista_mod = AplicacionPeer::doSelect($c);

    $modulos = array();

    foreach($lista_mod as $obj_mod)
    {
      $modulos += array($obj_mod->getNomyml().'_'.$obj_mod->getCodapl() => $obj_mod->getNomapl());
    }
    return $modulos;
  }
}
