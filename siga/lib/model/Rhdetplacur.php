<?php

/**
 * Subclase para representar una fila de la tabla 'rhdetplacur'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Rhdetplacur extends BaseRhdetplacur
{
	public function getNomemp()
	{
		return H::getX_vacio('Codemp','Nphojint','Nomemp',$this->codemp);
	}
	public function getNomcar()
	{
		return H::getX_vacio('Codcar','Npcargos','Nomcar',$this->codcar);
	}
}
