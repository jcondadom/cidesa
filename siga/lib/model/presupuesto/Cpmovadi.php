<?php

/**
 * Subclass for representing a row from the 'cpmovadi'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cpmovadi.php 58949 2014-10-09 15:02:45Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Cpmovadi extends BaseCpmovadi
{

    protected $mondis=0;
    protected $des='';
     protected $datosperiodos="";

    public function getMondis(){
        /*$c = new Criteria();
        //$c->add(CpsolmovadiPeer::REFADI, $this->getRefadi());
        $c->add(CpasiiniPeer::CODPRE, $this->getCodpre());
        $reg = CpasiiniPeer::doSelectOne($c);

        if ($reg){
            return H::FormatoMonto($reg->getMondis());
        }*/
       /* $anoadi='';
        $c = new Criteria();
        $c->add(CpadidisPeer::REFADI, $this->getRefadi());
        $regs = CpadidisPeer::doSelectOne($c);

        $codpre = $this->getCodpre();
        $perhas = $this->getPerpre();
        if($regs){
            $anoadi = $regs->getAnoadi();

}

        $sql = "select obtener_ejecucion('$codpre', '01', '$perhas', '$anoadi','PRC') as mondis from cpasiini where codpre = '$codpre' and perpre = '00';";


        if (H::BuscarDatos($sql, $reg)){
            return H::FormatoMonto($reg[0]['mondis']);
        }else{
            return H::FormatoMonto($this->mondis);

        }*/
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
    $q->add(CpmovadiperPeer::REFADI,self::getRefadi());
    $q->add(CpmovadiperPeer::CODPRE,self::getCodpre());
    $q->addJoin(CpmovadiperPeer::REFADI,CpadidisPeer::REFADI);
    $resultq=CpmovadiperPeer::doSelect($q);
    if ($resultq)
    {
        foreach ($resultq as $datosq)
        {
           $this->datosperiodos=$this->datosperiodos.$datosq->getPerpre().'_'.H::FormatoMonto($datosq->getMonmov()).'_'.self::getMonmov().'!';
        }
    }
  }
}
