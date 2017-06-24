<?php

/**
 * Subclase para representar una fila de la tabla 'farecmanart'.
 *
 * Tabla para registrar la receta de Mano de Obra de un articulo
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Farecmanart extends BaseFarecmanart
{
	public function getDesman()
    {
        return H::getX_vacio('CODCAR','Npcargos','Nomcar',self::getCodman());
    }
}
