<?php

/**
 * Subclase para representar una fila de la tabla 'fatartra'.
 *
 * Tabla para registrar la Tarjeta de Especificaciones de las Ordenes de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fatartra extends BaseFatartra
{
	protected $objdet=array();
	protected $objmat=array();
	protected $objman=array();
	protected $objmed=array();
	protected $refpre="";
	protected $filactapu="";
	protected $embarca="";

	protected function afterHydrate()
	  {
	    $t= new Criteria();
	    $t->add(FaordtraPeer::REFORD, $this->reford);
	    $result= FaordtraPeer::doSelectOne($t);
	    if ($result)
	    {
	        $this->desord=$result->getDesord();
	        $this->refpre=$result->getRefpre();
	        $this->embarca=$result->getCodemb().' - '.$result->getNomemb();
	    }	    
	  }

	public function getNomemp()
	{
	    return H::getX_vacio('CODEMP','Nphojint','Nomemp',self::getCodemp());
	}
}
