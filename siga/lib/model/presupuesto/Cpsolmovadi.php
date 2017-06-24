<?php

/**
 * Subclass for representing a row from the 'cpsolmovadi'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpsolmovadi.php 58914 2014-10-08 15:30:12Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Cpsolmovadi extends BaseCpsolmovadi
{
    protected $mondis=0;
    protected $datosperiodos="";
    protected $monmov2="0,00";

    public function getMondis(){

         $mondis=0;
         $p= new Criteria();
              $p->add(CpdefnivPeer::CODEMP,'001');
              $def = CpdefnivPeer::doSelectOne($p);
              if($def){
                    $annio = (int)substr($def->getFecini(), 0, 4);
                    $mes = (int)substr($def->getFecini(), 5, 2);
                     H::Monto_disponible_ejecucion($annio,$this->getCodpre(),$mes,$mondis);
}
          return H::FormatoMonto($mondis);

    }

  public function afterHydrate()
  {    
    $q= new Criteria();
    $q->add(CpsolmovadiperPeer::REFADI,self::getRefadi());
    $q->add(CpsolmovadiperPeer::CODPRE,self::getCodpre());
    $q->addJoin(CpsolmovadiperPeer::REFADI,CpsoladidisPeer::REFADI);
    $resultq=CpsolmovadiperPeer::doSelect($q);
    if ($resultq)
    {
        foreach ($resultq as $datosq)
        {
           $this->datosperiodos=$this->datosperiodos.$datosq->getPerpre().'_'.H::FormatoMonto($datosq->getMonmov()).'_'.self::getMonmov().'!';
        }
    }
  }
}
