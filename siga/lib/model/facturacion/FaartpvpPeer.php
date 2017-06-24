<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'faartpvp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: FaartpvpPeer.php 48812 2012-07-07 00:02:01Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FaartpvpPeer extends BaseFaartpvpPeer
{
  public static function getPrecios($codart='',$fecha='')
  {
    $resp = array();
    $filprevig=H::getConfAppGen('filprevig');
    if ($codart!='')
    {
      $c = new Criteria();
      $c->add(FaartpvpPeer::CODART,$codart);
      if ($fecha!='' && $filprevig=='S')
      {
         $c->add(FaartpvpPeer::FECDES,$fecha,Criteria::LESS_EQUAL);
         $c->add(FaartpvpPeer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
      }
      $c->addDescendingOrderByColumn(FaartpvpPeer::FECDES);
      $m = FaartpvpPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPvpart()] = number_format($pvp->getPvpart(), 2, ',', '.');
       }
      }
    }
    else
    {
      $c = new Criteria();
      $m = FaartpvpPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPvpart()] = number_format($pvp->getPvpart(), 2, ',', '.');
       }
      }
    }
   return $resp;
  }
}
