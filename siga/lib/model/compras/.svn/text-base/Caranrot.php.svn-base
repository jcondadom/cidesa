<?php

/**
 * Subclase para representar una fila de la tabla 'caranrot'.
 *
 * Tabla para guardar rango de rotación
 *
 * @package    Roraima
 * @subpackage lib.model.compras
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caranrot extends BaseCaranrot
{
	protected $grid=array();
	
	public function Tipo(){
		if (self::getTiprot()=='A')
			return "ALTA";
		else if (self::getTiprot()=='M')
			return "MEDIA";
		else if (self::getTiprot()=='B')
			return "BAJA";
		else
			return "NULA";


	}
}
