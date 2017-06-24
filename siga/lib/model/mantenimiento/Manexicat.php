<?php

/**
 * Subclase para representar una fila de la tabla 'manexicat'.
 *
 * Tabla para guardar el Inventario de Almacén de cada Catalogación
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manexicat extends BaseManexicat
{
	public function getNomalm()
	{
	  return Herramientas::getX('CODALM', 'Cadefalm', 'Nomalm',self::getCodalm());
	}
}
