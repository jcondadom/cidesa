<?php

/**
 * Subclase para representar una fila de la tabla 'manprogru'.
 *
 * Contiene los Registros de las Programación por Grupo de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manprogru extends BaseManprogru
{
	protected $obj=array();
	
	public function getDesgru()
	{
	  return H::getX_vacio('codgru','Mangrutra','Desgru',self::getCodgru());
	}
}
