<?php

/**
 * Subclass for representing a row from the 'faconpag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faconpag.php 51034 2013-02-26 13:48:48Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faconpag extends BaseFaconpag
{
  public function __toString()
  {
    return $this->desconpag;
  }

  public function getCodconpag()
  {
  	$valor=self::getId();
   return $valor;
  }

  public function getConpag()
  {
   return self::getId();
  }
}
