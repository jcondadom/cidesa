<?php

/**
 * Subclass for representing a row from the 'fatipmov'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fatipmov.php 52030 2013-05-29 16:10:47Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fatipmov extends BaseFatipmov
{
   public function __toString()
  {
    return $this->desmov;
  }
  
  public static function getFirst()
  {
    $c= new Criteria();
    $c->addAscendingOrderByColumn(FatipmovPeer::ID);
    return FatipmovPeer::doSelectOne($c);
  }

  public function getDestiptra()
  {
    return Herramientas::getX_vacio('CODTIPTRA','Cotiptra','Destiptra',self::getCodtiptra());
  } 

    public function getDescta()
  {
    return Herramientas::getX_vacio('CODCTA','Contabb','Descta',self::getCodcta());
  } 
}
