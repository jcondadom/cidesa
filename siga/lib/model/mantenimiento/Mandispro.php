<?php

/**
 * Subclase para representar una fila de la tabla 'mandispro'.
 *
 * Contiene los Registros de la Distribución de la Programación Estimada
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mandispro extends BaseMandispro
{
	protected $status2=0;

	function afterHydrate(){
		if (self::getStatus()=='S')
	      $this->status2=1;
	}
}
