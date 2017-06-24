<?php

/**
 * Subclase para representar una fila de la tabla 'npnucemphor'.
 *
 * Tabla que graba el Maestro de núcleo-concepto por empleado
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npnucemphor extends BaseNpnucemphor
{
	protected $obj=array();
	protected $longitud="";
	protected $archixls='';

	public function getLongitud()
	{
		$mascara = H::ObtenerFormato('Npdefgen', 'Fororg');
         $lonniv = strlen($mascara);
		return $lonniv;
	}

	public function getDesniv()
	{
		return H::getX_vacio('CODNIV', 'Npestorg', 'Desniv',self::getCodniv());

	}

	public function getNomcon()
	{
		return H::getX_vacio('CODCON', 'Npdefcpt', 'Nomcon',self::getCodcon());

	}


}
