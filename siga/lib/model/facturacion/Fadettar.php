<?php

/**
 * Subclase para representar una fila de la tabla 'fadettar'.
 *
 * Tabla para registrar la Descripción de las actividades de la Orden de Trabajo
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fadettar extends BaseFadettar
{
	protected $datmat="";
	protected $datper="";

	public function afterHydrate()
    {
	    $m= new Criteria(); //Materiales
	    $m->add(FamattartraPeer::REFTAR,self::getReftar());
	    $m->add(FamattartraPeer::CODART,self::getCodart());
	    $resultm=FamattartraPeer::doSelect($m);
	    if ($resultm)
	    {
	        foreach ($resultm as $objmat)
	        {
	           $this->datmat=$this->datmat.$objmat->getCodmat().'_'.$objmat->getDesmat().'_'.$objmat->getNumpla().'_'.$objmat->getDocref().'!';
	        }
	    }

	    $o= new Criteria();  //Personal
	    $o->add(FamantartraPeer::REFTAR,self::getReftar());
	    $o->add(FamantartraPeer::CODART,self::getCodart());
	    $resulto=FamantartraPeer::doSelect($o);
	    if ($resulto)
	    {
	        foreach ($resulto as $objman)
	        {
	           $this->datper=$this->datper.$objman->getCodman().'_'.$objman->getDesman().'_'.$objman->getCodemp().'_'.$objman->getNomemp().'_' .$objman->getHorpla().'_'.$objman->getHoreje().'!';
	        }
	    }
    }
}
