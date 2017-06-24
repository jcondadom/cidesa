<?php

/**
 * Subclase para representar una fila de la tabla 'npregconvar'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npregconvar extends BaseNpregconvar
{
  protected $obj=array();

  public function getNomcar()
  {
    $c = new Criteria();
    $c->addJoin(NpasicarempPeer::CODCAR,NpcargosPeer::CODCAR);
    $c->add(NpasicarempPeer::CODEMP,self::getCodemp());
    $c->add(NpasicarempPeer::STATUS,'V');
    $registro = NpcargosPeer::doSelectOne($c);
    if($registro) return $registro->getNomcar();
    else return '';

  }
	public function getNomcon()
	{
		return H::getX_vacio('Codcon','Npdefcpt','Nomcon',self::getCodcon());	    
	}

	public function getNomnom()
	{
		return H::getX_vacio('Codnom','Npnomina','Nomnom',self::getCodnom());	    
	}	

	public function getNomemp()
	{
		return H::getX_vacio('Codemp','Nphojint','Nomemp',self::getCodemp());	    
	}	

}
