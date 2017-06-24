<?php

/**
 * Subclase para representar una fila de la tabla 'npasiconparcar'.
 *
 * Tabla que graba la asignación de Conceptos y Partida x Cargo
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npasiconparcar extends BaseNpasiconparcar
{
	 protected $grid=array();

	 public function getNomcar()
	 {
		return H::getX_vacio('CODCAR','Npcargos','Nomcar',self::getCodcar());
	 }

	 public function getNomcon()
	 {
		return H::getX_vacio('CODCON','Npdefcpt','Nomcon',self::getCodcon());
	 }

	 public function getNompar()
	 {
		return H::getX_vacio('CODPAR','Nppartidas','Nompar',self::getCodpar());
	 }
}
