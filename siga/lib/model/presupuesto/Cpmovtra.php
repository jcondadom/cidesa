<?php

/**
 * Subclass for representing a row from the 'cpmovtra'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpmovtra.php 58940 2014-10-08 21:13:22Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Cpmovtra extends BaseCpmovtra
{
	protected $datosperiodos="";
	protected $datosperiodos2="";

	public function afterHydrate()
  {    
    $q= new Criteria();
    $q->add(CpmovtraperoriPeer::REFTRA,self::getReftra());
    $q->add(CpmovtraperoriPeer::CODORI,self::getCodori());
    $q->addJoin(CpmovtraperoriPeer::REFTRA,CptraslaPeer::REFTRA);
    $resultq=CpmovtraperoriPeer::doSelect($q);
    if ($resultq)
    {
        foreach ($resultq as $datosq)
        {
           $this->datosperiodos=$this->datosperiodos.$datosq->getPerpre().'_'.H::FormatoMonto($datosq->getMonmov()).'_'.self::getMonmov().'!';
        }
    }

    $q1= new Criteria();
    $q1->add(CpmovtraperdesPeer::REFTRA,self::getReftra());
    $q1->add(CpmovtraperdesPeer::CODDES,self::getCoddes());
    $q1->addJoin(CpmovtraperdesPeer::REFTRA,CptraslaPeer::REFTRA);
    $resultq1=CpmovtraperdesPeer::doSelect($q1);
    if ($resultq1)
    {
        foreach ($resultq1 as $datosq)
        {
           $this->datosperiodos2=$this->datosperiodos2.$datosq->getPerpre().'_'.H::FormatoMonto($datosq->getMonmov()).'_'.self::getMonmov().'!';
        }
    }
  }
}
