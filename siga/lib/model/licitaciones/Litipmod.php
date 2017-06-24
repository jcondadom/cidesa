<?php

/**
 * Subclase para representar una fila de la tabla 'litipmod'.
 *
 * Tipos de modificaciones a contratos
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Litipmod extends BaseLitipmod
{
  public function __toString() {
    return $this->codtipmod.' - '.$this->nomtipmod;
  }
}
