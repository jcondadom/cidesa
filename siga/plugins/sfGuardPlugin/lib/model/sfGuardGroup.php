<?php

/**
 * Subclase para representar una fila de la tabla 'sf_guard_group'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage plugins.sfGuardPlugin.lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class sfGuardGroup extends BasesfGuardGroup
{
    public function __toString()
    {
      return $this->getName();
    }
}