<?php

/**
 * Subclase para representar una fila de la tabla 'manparfabcat'.
 *
 * Tabla para guardar el Número de partes y Fabricante de una Catalogación
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manparfabcat extends BaseManparfabcat
{
	public function getDesfab()
	{
	  return H::getX_vacio('codfab','mandeffab','Desfab',self::getCodfab());
	}
}
