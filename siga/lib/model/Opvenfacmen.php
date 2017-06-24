<?php

/**
 * Subclase para representar una fila de la tabla 'opvenfacmen'.
 *
 * Tabla que contiene información referente al Registro de Ventas por Facturación Mensual
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Opvenfacmen extends BaseOpvenfacmen
{
	protected $obj=array();

	public function getNommes(){
		return H::ObtenerMesenLetras(self::getMes());
	}
}
