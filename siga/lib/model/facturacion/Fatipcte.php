<?php

/**
 * Subclass for representing a row from the 'fatipcte'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fatipcte.php 47350 2012-02-16 14:29:19Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fatipcte extends BaseFatipcte
{
  public function __toString()
  {
    return $this->nomtipcte;
  }
}
