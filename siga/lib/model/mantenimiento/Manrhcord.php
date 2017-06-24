<?php

/**
 * Subclase para representar una fila de la tabla 'manrhcord'.
 *
 * Contiene los Registros de las Recursos Humanos del Cierre Orden de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manrhcord extends BaseManrhcord
{
	public function getNomempc()
	{
	  return H::getX_vacio('cedemp','Nphojint','Nomemp',self::getCedrec());
	}
}
