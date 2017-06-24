<?php

/**
 * Subclase para representar una fila de la tabla 'famantartra'.
 *
 * Tabla para registrar el Personal para la ejecución de actividades en la Tarjeta de Especificacion de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Famantartra extends BaseFamantartra
{
	public function getDesman()
    {
        return H::getX_vacio('CODCAR','Npcargos','Nomcar',self::getCodman());
    }

    public function getNomemp()
    {
        return H::getX_vacio('CODEMP','Nphojint','Nomemp',self::getCodemp());
    }
}
