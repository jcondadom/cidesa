<?php

/**
 * Subclase para representar una fila de la tabla 'vianivpri'.
 *
 * Tabla que contiene información referente a la Asignación de Niveles a Primas
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Vianivpri extends BaseVianivpri
{
    public function getDesniv()
    {
        return Herramientas::getX('codniv','Viadefniv','desniv',self::getCodniv());
    }
}
