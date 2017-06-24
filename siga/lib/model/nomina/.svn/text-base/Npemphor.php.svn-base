<?php

/**
 * Subclase para representar una fila de la tabla 'npemphor'.
 *
 * Tabla que graba el Maestro de las horas de Profesores por nucleo
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npemphor extends BaseNpemphor
{
	protected $obj=array();

	public function getNomemp()
	{
		return H::getX_vacio('CODEMP', 'Nphojint', 'Nomemp',self::getCodemp());
	}

	public function getNomcar()
	{
		return H::getX_vacio('CODCAR', 'Npcargos', 'Nomcar',self::getCodcar());
	}

	public function getNomcon()
	{
		return H::getX_vacio('CODCON', 'Npdefcpt', 'Nomcon',self::getCodcon());
	}
}
