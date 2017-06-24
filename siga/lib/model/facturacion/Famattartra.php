<?php

/**
 * Subclase para representar una fila de la tabla 'famattartra'.
 *
 * Tabla para registrar los Materiales Requeridos en el Tarjeta de Especificacion de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Famattartra extends BaseFamattartra
{
	public function getDesmat()
    {
        return H::getX_vacio('CODART','Caregart','Desart',self::getCodmat());
    }
}
