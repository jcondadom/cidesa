<?php

/**
 * Subclase para representar una fila de la tabla 'caparfabart'.
 *
 * Tabla para guardar el Número de partes y Fabricante de un Artículo
 *
 * @package    Roraima
 * @subpackage lib.model.compras
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Caparfabart extends BaseCaparfabart
{
	protected $desart="";
	protected $desfab="";
	public function getDesfab()
	{
	  return H::getX_vacio('codfab','mandeffab','Desfab',self::getCodfab());
	}

	public function getDesart()
	{
	  return H::getX_vacio('codart','Caregart','Desart',self::getCodart());
	}
}
