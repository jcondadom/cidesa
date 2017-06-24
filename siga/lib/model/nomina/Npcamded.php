<?php

/**
 * Subclase para representar una fila de la tabla 'npcamded'.
 *
 * Tabla que almacena la información de Cambios de Dedicación
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npcamded extends BaseNpcamded
{
  public function getDestip()
  {
    return Herramientas::getX('CODTIP','Nptipded','Destip',self::getCodtip());
  }
}
