<?php

/**
 * Subclase para representar una fila de la tabla 'mangenpla'.
 *
 * Contiene los Registros de la Generación de Planificación
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mangenpla extends BaseMangenpla
{
	protected $obj=array();
	
	public function getDesgru()
	{
	  return H::getX_vacio('codgru','Mangrutra','Desgru',self::getCodgru());
	}
}
