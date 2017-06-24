<?php

/**
 * Subclase para representar una fila de la tabla 'npasonucemp'.
 *
 * Tabla que graba los núcleos asociados a los empleados
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npasonucemp extends BaseNpasonucemp
{
    public function getDesniv()
	{
		return H::getX_vacio('CODNIV', 'Npestorg', 'Desniv',self::getCodniv());

	}
}
