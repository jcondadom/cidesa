<?php

/**
 * Subclase para representar una fila de la tabla 'caprelevades'.
 *
 * Tabla para guardar las Preguntas Cualitativa de la Evaluación y desempeño del Proveedor
 *
 * @package    Roraima
 * @subpackage lib.model.compras
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caprelevades extends BaseCaprelevades
{
	public function getDesprg() {
        return Herramientas::getX('codprg', 'Cadepreg', 'Desprg', self::getCodprg());
    }
}
