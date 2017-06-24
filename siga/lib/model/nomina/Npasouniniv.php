<?php

/**
 * Subclase para representar una fila de la tabla 'npasouniniv'.
 *
 * Tabla que graba las Unidades de Adscripción que estan asociadas a la Gerencia(npestrorg)
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npasouniniv extends BaseNpasouniniv
{
	protected $obj=array();
	protected $check="";
	protected $longitud="";
	protected $desuniads="";

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
}
