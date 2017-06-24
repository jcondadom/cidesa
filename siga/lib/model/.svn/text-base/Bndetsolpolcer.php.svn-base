<?php

/**
 * Subclase para representar una fila de la tabla 'bndetsolpolcer'.
 *
 * Tabla que almacena el detalle de las Solicitudes de Póliza/Certificados
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Bndetsolpolcer extends BaseBndetsolpolcer
{
  protected $desmue="";
  protected $marmue="";
  protected $modmue="";
  protected $sermue="";
  protected $nomapeest="";
  protected $nomaperep="";
  protected $codubi="";
  protected $desubi="";  
  protected $valini="0,00";

  
  public function afterHydrate()
  {
      $r= new Criteria();
      $r->add(BnregmuePeer::CODACT,self::getCodact());
      $r->add(BnregmuePeer::CODMUE,self::getCodmue());
      $result= BnregmuePeer::doSelectOne($r);
      if ($result){
      	$this->desmue=$result->getDesmue();
      	$this->marmue=$result->getMarmue();
      	$this->modmue=$result->getModmue();
      	$this->sermue=$result->getSermue();
      	$this->nomapeest=$result->getNomapeest();
      	$this->nomaperep=$result->getNomaperep();
        $this->codubi=$result->getCodubi();
        $this->desubi=$result->getNomubicac();
      	$this->valini=H::FormatoMonto($result->getValini());
      }
  } 



}
