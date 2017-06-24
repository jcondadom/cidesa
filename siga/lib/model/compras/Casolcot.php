<?php

/**
 * Subclase para representar una fila de la tabla 'casolcot'.
 *
 * Tabla para registrar los datos de la Solicitud de cotización
 *
 * @package    Roraima
 * @subpackage lib.model.compras
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Casolcot extends BaseCasolcot
{
	protected $grid=array();
	protected $grid2=array();

	public function getDesreq()
	{
	  return H::getX_vacio('REQART','Casolart','Desreq',self::getReqart());
	}
}
