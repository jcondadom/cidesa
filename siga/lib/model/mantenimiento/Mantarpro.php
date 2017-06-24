<?php

/**
 * Subclase para representar una fila de la tabla 'mantarpro'.
 *
 * Contiene los Registros de las Tareas Programadas
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mantarpro extends BaseMantarpro
{
	public function getNomequ()
	{
	  return H::getX_vacio('numequ','Manregequ','Nomequ',self::getNumequ());
	}

	public function getDesact()
	{
	  return H::getX_vacio('codact','Manactest','Desact',self::getCodact());
	}

	public function getDesgru()
	{
	  return H::getX_vacio('codgru','Mangrutra','Desgru',self::getCodgru());
	}

	public function getNomcar()
	{
	  return H::getX_vacio('codcar','Npcargos','Nomcar',self::getCodcar());
	}

	public function getDestma()
	{
	  return H::getX_vacio('codtma','Mantipman','Destma',self::getCodtma());
	}
}
