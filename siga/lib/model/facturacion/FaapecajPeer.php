<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'faapecaj'.
 *
 * null
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class FaapecajPeer extends BaseFaapecajPeer
{
    public static function seleccionCaja($almacen=""){

        $resp = array();
        $c = new Criteria();
        $c->add(FaapecajPeer::CODALM,$almacen);
        $c->add(FaapecajPeer::STACAJ,'A');
        $m = FaapecajPeer::doSelect($c);

       if($m){
          foreach($m as $caj){
            $resp[$caj->getCodcaj()] = $caj->getCodcaj();
          }
       }

        return $resp;
  }
}
