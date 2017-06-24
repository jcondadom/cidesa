<?php

/**
 * Subclase para representar una fila de la tabla 'mandefemp'.
 *
 * Tabla que contiene información referente a la definición de empresa
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mandefemp extends BaseMandefemp
{
	public function getNomemp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Nomemp','001');
	}

	public function getDiremp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Diremp','001');
	}

	public function getTlfemp()
	{
	  return Herramientas::getX('CODEMP','Empresa','Tlfemp','001');
	}
}
