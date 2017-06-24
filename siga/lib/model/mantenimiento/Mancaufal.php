<?php

/**
 * Subclase para representar una fila de la tabla 'mancaufal'.
 *
 * Contiene los Registros de las Causas de las Fallas
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mancaufal extends BaseMancaufal
{
	public function getDesdfa()
	{
	  return H::getX_vacio('coddfa','Mandeffal','Desdfa',self::getCoddfa());
	}

	public function getDescfc()
	{
		return self::getDescfa();
	}

	public function getCodcfc()
	{
		return self::getCodcfa();
	}
}
