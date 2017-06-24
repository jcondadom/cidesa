<?php

/**
 * Subclase para representar una fila de la tabla 'manactest'.
 *
 * Contiene los Registros de las Actividades por Estándar de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Manactest extends BaseManactest
{
	protected $obj=array();
	protected $obj1=array();

	public function getNomemp()
	{
	  return H::getX_vacio('cedemp','Nphojint','Nomemp',self::getCedemp());
	}

	public function getNomempp()
	{
	  return H::getX_vacio('cedemp','Nphojint','Nomemp',self::getCedres());
	}

	public function getDesgru()
	{
	  return H::getX_vacio('codgru','Mangrutra','Desgru',self::getCodgru());
	}

	public function getDestma()
	{
	  return H::getX_vacio('codtma','Mantipman','Destma',self::getCodtma());
	}

	public function getDesgrr()
	{
	  return H::getX_vacio('codgrr','Mangrutre','Desgrr',self::getCodgrr());
	}
}
