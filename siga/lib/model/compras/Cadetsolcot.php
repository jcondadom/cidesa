<?php

/**
 * Subclase para representar una fila de la tabla 'cadetsolcot'.
 *
 * Tabla para registrar los provedores que cotizaran para una SC
 *
 * @package    Roraima
 * @subpackage lib.model.compras
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cadetsolcot extends BaseCadetsolcot
{
	protected $rifpro="";
	protected $nompro="";

	
	public function afterHydrate()
	{
        $w= new Criteria();
        $w->add(CaproveePeer::CODPRO,self::getCodpro());
        $result= CaproveePeer::doSelectOne($w);
        if ($result)
        {
        	$this->rifpro=$result->getRifpro();
        	$this->nompro=$result->getNompro();
        }
	}	
	
}
