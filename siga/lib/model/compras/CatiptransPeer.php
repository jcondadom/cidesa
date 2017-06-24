<?php

/**
 * Subclase para crear funcionalidades especÃ­ficas de busqueda y actualizaciÃ³n en la tabla 'catiptrans'.
 *
 * Tabla que contiene la informaciÃ³n de los Tipos de Transporte
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class CatiptransPeer extends BaseCatiptransPeer
{
  public static function getTipTrans()
  {
    $resp = array();
    $c = new Criteria();
    $m = CatiptransPeer::doSelect($c);
    if($m){
      foreach($m as $mon){
        $resp[$mon->getCodtrans()] = $mon->getDestrans();
      }
    }
    return $resp;
  }
}
