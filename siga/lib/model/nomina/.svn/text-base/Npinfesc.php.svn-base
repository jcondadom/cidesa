<?php

/**
 * Subclase para representar una fila de la tabla 'npinfesc'.
 *
 * Tabla que almacena la información de Desarrollo Laboral-Escalafon Universitario
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npinfesc extends BaseNpinfesc
{
   public function getNomcar()
  {
    return Herramientas::getX('CODCAR','Npcargos','Nomcar',self::getCodcar());
  }
}
