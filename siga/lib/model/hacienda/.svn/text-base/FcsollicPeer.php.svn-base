<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fcsollic'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: FcsollicPeer.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class FcsollicPeer extends BaseFcsollicPeer
{
 public static function getReferencias($rifcon='', $tipo='')
  {
    $resp = array();
    $c = new Criteria();
    if($tipo =='L'){
      $c->add(FcsollicPeer::RIFCON, $rifcon);
      $c->addAscendingOrderByColumn(FcsollicPeer::NUMLIC);
      $r = FcsollicPeer::doSelect($c);
         if(count($r)>0){
            foreach($r as $ref){
                $resp[$ref->getNumlic()."-".$ref->getCatcon()] = $ref->getNumlic()."-".$ref->getCatcon() ;
             }
    }
    }else if ($tipo == 'I'){
      $c->add(FcreginmPeer::RIFCON, $rifcon);
      $c->addAscendingOrderByColumn(FcreginmPeer::NROINM);
      $r = FcreginmPeer::doSelect($c);
         if(count($r)>0){
            foreach($r as $ref){
                $resp[$ref->getNroinm()."-".$ref->getCodcatinm()] = $ref->getNroinm()."-".$ref->getCodcatinm() ;
             }
    }
    
  }
   return $resp;
}

}
