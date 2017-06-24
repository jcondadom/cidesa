<?php

/**
 * Subclase para representar una fila de la tabla 'manrehord'.
 *
 * Contiene los Registros de las Recursos Humanos de la Orden de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manrehord extends BaseManrehord
{
	public function getNomcar()
	{
	  return H::getX_vacio('codcar','Npcargos','Nomcar',self::getCodcar());
	}
}
