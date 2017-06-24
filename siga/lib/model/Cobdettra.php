<?php

/**
 * Subclass for representing a row from the 'cobdettra'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cobdettra extends BaseCobdettra
{
  protected $fecemi="";
  protected $fecven="";
  protected $recargos="";
  protected $descuentos="";
  protected $montotalformato="0,00";
  protected $saldoc="0,00";
  protected $monpagado="0,00";
  protected $marca="";
  protected $btnrec="";
  protected $btndes="";
  protected $check="";
  protected $fecant2="";
  protected $desant="";
  protected $totant="0,00";
  protected $resant="0,00";
  protected $recdoc="0,00";


    public function afterHydrate()
  {
    $c=new Criteria();
	$c->add(CobdocumePeer::REFDOC,self::getRefdoc());
	$documentos = CobdocumePeer::doSelectOne($c);
    if($documentos)
    {
    $this->saldoc=number_format($documentos->getSaldoc(),2,',','.');
    $this->montotal= $documentos->getMondoc() + $documentos->getRecdoc() - $documentos->getDscdoc();
    $this->monpagado=number_format($documentos->getAbodoc(),2,',','.');
    $this->montotalformato=number_format($this->montotal,2,',','.');
    }

     $q= new Criteria();
     $q->add(FaantcliPeer::NROANT,self::getNroant());
     $q->add(FaantcliPeer::CODCLI,self::getCodcli());
     $resulg= FaantcliPeer::doSelectOne($q);
     if ($resulg)
     {
        $this->fecant2=date('d/m/Y', strtotime($resulg->getFecant()));
        $this->desant=eregi_replace("[\n|\r|\n\r]","",htmlspecialchars($resulg->getDesant()));
        $this->totant=H::FormatoMonto($resulg->getTotant());
        $this->resant=$resulg->getResant();
     }

  }

  public function getFecemi(){

    $fec=date('d/m/Y',strtotime(Herramientas::getX('REFDOC','Cobdocume','Fecemi',self::getRefdoc())));
     return $fec;
  }

  public function getFecven(){
     $fec=date('d/m/Y',strtotime(Herramientas::getX('REFDOC','Cobdocume','Fecven',self::getRefdoc())));
     return $fec;
  }


}
