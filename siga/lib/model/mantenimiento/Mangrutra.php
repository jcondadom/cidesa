<?php

/**
 * Subclase para representar una fila de la tabla 'mangrutra'.
 *
 * Contiene los Registros de los Grupos de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.mantenimiento
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Mangrutra extends BaseMangrutra
{
	protected $longitud="";
	
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
