<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'falisprc'.
 *
 * Lista de Precios
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */
class FalisprcPeer extends BaseFalisprcPeer {

    public static function getInfofec($Codprg, $ConpagId, $Codtipcli){
      $c = new Criteria();
      $c->add(FalisprcPeer::FECVIG,FalisprcPeer::FECVIG."=(select max(".FalisprcPeer::FECVIG.") from ".FalisprcPeer::TABLE_NAME." WHERE ".FalisprcPeer::CODPRG."='$Codprg' AND ".FalisprcPeer::CODTIPCLI."='$Codtipcli' AND ".FalisprcPeer::CONPAG_ID."=$ConpagId )",Criteria::CUSTOM);
      $c->add(FalisprcPeer::CODPRG, $Codprg);
      $c->add(FalisprcPeer::CONPAG_ID, $ConpagId);
      $c->add(FalisprcPeer::CODTIPCLI, $Codtipcli);
      $falisprc = FalisprcPeer::doSelectOne($c);
           if($falisprc) return $falisprc->getFecvig('d/m/Y');
           else return null;
   
    }

    public static function getPrecios($codart='')
  {
    $resp = array();
    $filprevig=H::getConfAppGen('filprevig');
    if ($codart!='')
    {
      $c = new Criteria();
      $c->add(FalisprcPeer::CODART,$codart);
      $m = FalisprcPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPrecio()] = number_format($pvp->getPrecio(), 2, ',', '.');
       }
      }
    }
    else
    {
      $c = new Criteria();
      $m = FalisprcPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPrecio()] = number_format($pvp->getPrecio(), 2, ',', '.');
       }
      }
    }
   return $resp;
  }

  public static function getPreciosv2($codart='',$codprg='', $codtipcli='', $conpagid='')
  {
    $resp = array();
    $filprevig=H::getConfAppGen('filprevig');
    if ($codart!='')
    {
      $c = new Criteria();
      $c->setLimit(1);
      $c->addDescendingOrderByColumn(FalisprcPeer::FECVIG);
      $c->add(FalisprcPeer::CODART,$codart);
      if($codprg!='') $c->add(FalisprcPeer::CODPRG,$codprg);
      if($codtipcli!='') $c->add(FalisprcPeer::CODTIPCLI,$codtipcli);
      if($conpagid!='') $c->add(FalisprcPeer::CONPAG_ID,$conpagid);
      $m = FalisprcPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPrecio()] = number_format($pvp->getPrecio(), 2, ',', '.');
       }
      }
    }
    else
    {
      $c = new Criteria();
      $m = FalisprcPeer::doSelect($c);
      if($m){
      foreach($m as $pvp){
        $resp[(string)$pvp->getPrecio()] = number_format($pvp->getPrecio(), 2, ',', '.');
       }
      }
    }
   return $resp;
  }

}
