<?php

/**
 * Subclass for representing a row from the 'fatipdev'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fatipdev.php 47350 2012-02-16 14:29:19Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fatipdev extends BaseFatipdev
{
  public function __toString()
  {
    return $this->nomtidev;
  }

}
