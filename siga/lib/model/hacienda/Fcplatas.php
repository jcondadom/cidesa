<?php

/**
 * Subclase para representar una fila de la tabla 'fcplatas'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.hacienda
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fcplatas extends BaseFcplatas
{
  public function getDestas(){
      return H::getX_vacio('CODTAS', 'Fcdeftasas', 'Destas', self::getCodtas());
  }
}
