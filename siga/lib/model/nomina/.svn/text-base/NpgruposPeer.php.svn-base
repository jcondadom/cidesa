<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npgrupos'.
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
class NpgruposPeer extends BaseNpgruposPeer
{
  public static function getGrupos()
  {
    $resp = array();
    $c = new Criteria();
    $m = NpgruposPeer::doSelect($c);
    if($m){
      foreach($m as $gru){
        $resp[$gru->getCodgru()] = $gru->getDesgru();
      }
    }
    return $resp;
  }
}
