<?php

/**
 * Subclase para representar una fila de la tabla 'mantiplub'.
 *
 * Contiene los Registros de los Tipos de Lubricante o Combustible
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mantiplub extends BaseMantiplub
{
	public function getDesume()
	{
	  return H::getX_vacio('codume','Manunimed','Desume',self::getCodume());
	}

	public function getTipo(){
		if ($this->lubric=='C')
	      return 'Combustible';
	    else if ($this->lubric=='L')
	      return 'Lubricante';
	    else if ($this->lubric=='G')
	      return 'Grasa';
	    else if ($this->lubric=='R')
	      return 'Refrigerante';
	    else return '';
	}
}
