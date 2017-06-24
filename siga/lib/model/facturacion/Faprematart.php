<?php

/**
 * Subclase para representar una fila de la tabla 'faprematart'.
 *
 * Tabla para registrar la APU de Materiales de un articulo en un Presupuesto
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Faprematart extends BaseFaprematart
{
	public function getDesmat()
    {
        return H::getX_vacio('CODART','Caregart','Desart',self::getCodmat());
    }
}
