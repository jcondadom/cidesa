<?php

/**
 * Subclase para representar una fila de la tabla 'rhplacur'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Rhplacur extends BaseRhplacur
{
	protected $obj=array();
	protected $obj2=array();
	protected $pergru="";

	public function getDescur()
	{
		return H::getX('Codcur','Rhdefcur','Descur',$this->codcur);
	}

	public function getFecini()
	{
		$fecha = H::getX('Codcur','Rhdefcur','Fecini',$this->codcur);
		if($fecha)
			return date("d/m/Y",strtotime($fecha));
		else	
			return '';	
	}
	public function getFecfin()
	{
		$fecha = H::getX('Codcur','Rhdefcur','Fecini',$this->codcur);
		if($fecha)
			return date("d/m/Y",strtotime($fecha));
		else
			return '';	
	}
	public function getDurcur()
	{
		return H::FormatoMonto(H::getX('Codcur','Rhdefcur','Durcur',$this->codcur));
	}
	public function getTurcur()
	{
		$turno = H::getX('Codcur','Rhdefcur','Turcur',$this->codcur);
		if($turno)
			return $turno=='D' ? 'Diurno' : 'Nocturno' ;
		else	
			return '';	
	}
}
