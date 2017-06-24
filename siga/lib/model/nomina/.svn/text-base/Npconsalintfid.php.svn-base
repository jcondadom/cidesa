<?php

/**
 * Subclase para representar una fila de la tabla 'npconsalintfid'.
 *
 * Tabla que graba los Conceptos para el salario Integral de Fideicomiso
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npconsalintfid extends BaseNpconsalintfid
{

	public function getNomnom()
	{
		//$c = new Criteria();
		//$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		$reg = $this->getNpnomina();    //NpnominaPeer::doSelectOne($c);
		
		if($reg) return $reg->getNomnom();
		else return '';
		
	}

	public function getNomcon()
	{
		//$c = new Criteria();
		//$c->add(NpdefcptPeer::CODCON,self::getCodcon());
		$reg = $this->getNpdefcpt(); //NpdefcptPeer::doSelectOne($c);
		
		if($reg) return $reg->getNomcon();
		else return '';
		
	}
}
