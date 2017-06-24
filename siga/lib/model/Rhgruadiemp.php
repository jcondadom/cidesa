<?php

/**
 * Subclase para representar una fila de la tabla 'rhgruadiemp'.
 *
 * Tabla que graba los Empleados asociados Grupos de Adiestramiento
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Rhgruadiemp extends BaseRhgruadiemp
{
	public function getNomemp()
	{
		return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codemp);
	}
}
