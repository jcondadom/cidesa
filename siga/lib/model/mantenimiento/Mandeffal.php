<?php

/**
 * Subclase para representar una fila de la tabla 'mandeffal'.
 *
 * Contiene los Registros de los Defectos de Fallas
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mandeffal extends BaseMandeffal
{
	public function getDessfa()
	{
	  return H::getX_vacio('codsfa','Mansinfal','Dessfa',self::getCodsfa());
	}
}
