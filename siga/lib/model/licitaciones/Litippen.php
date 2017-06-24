<?php

/**
 * Subclase para representar una fila de la tabla 'litippen'.
 *
 * Tipos de penalizaciones manejables por el sistema
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Litippen extends BaseLitippen
{
  public function __toString() {
    return $this->codtippen.' - '.$this->nomtippen;
  }
}
