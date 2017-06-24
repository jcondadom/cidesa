<?php

/**
 * Subclase para representar una fila de la tabla 'bnsolpolcer'.
 *
 * Tabla que almacena las Solicitudes de Póliza/Certificados
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Bnsolpolcer extends BaseBnsolpolcer
{
	protected $obj=array();
	protected $totmue="0,00";
	protected $totpri="0,00";
	protected $totdep="0,00";

	public function getDesubi()
	{
		return H::getX_vacio('codubi','Bnubibie','Desubi',self::getCodubi());
	}

	public function getNomcom()
	{
		return H::getX_vacio('codcom','Bncatcomseg','nomcom',self::getCodcom());
	}	

	public function getTipsol2()
	{
		if (self::getTipsol()=='C')
			return 'Certificado';
		else if (self::getTipsol()=='P')
			return 'Póliza';
		else return '';
	}

	public function getDescob()
	{
		return H::getX_vacio('CODCOB','Bntipcob','Descob',self::getCodcob());
	}	
}
