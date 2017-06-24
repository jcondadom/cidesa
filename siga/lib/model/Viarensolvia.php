<?php

/**
 * Subclase para representar una fila de la tabla 'viarensolvia'.
 *
 * Tabla que contiene información referente a la Rendición de Solicitud de Viáticos
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Viarensolvia extends BaseViarensolvia
{
    protected $fecsol="";
    protected $empleado="";
    protected $cargo="";
    protected $dependencia="";
    protected $fecdes="";
    protected $fechas="";
    protected $dessol="";
    

    public function afterHydrate(){
        $q= new Criteria();
        $q->add(ViasolviatraPeer::NUMSOL,self::getNumsol());
        $regq= ViasolviatraPeer::doSelectOne($q);
        if ($regq){
            $this->fecsol=date('d/m/Y',strtotime($regq->getFecsol()));
            $this->fecdes=date('d/m/Y',strtotime($regq->getFecdes()));
            $this->fechas=date('d/m/Y',strtotime($regq->getFechas()));
            $this->dessol=$regq->getDessol();
            if (!$regq->getEsnoemp()){
              $l= new Criteria();
              $l->add(NphojintPeer::CODEMP,$regq->getCodemp());
              $regl= NphojintPeer::doSelectOne($l);
              if ($regl){
                $this->empleado=$regl->getCedemp().' - '.$regl->getNomemp();
                $this->cargo=$regl->getCodcar().' - '.$regl->getNomcar();
                $this->dependencia=$regl->getCodniv().' - '.$regl->getDesniv();
              }
            }else {
              $l= new Criteria();
              $l->add(VianoempPeer::RIFNEMP,$regq->getCodemp());
              $regl= VianoempPeer::doSelectOne($l);
              if ($regl){
                $this->empleado=$regl->getRifnemp().' - '.$regl->getNomnemp();
              }
            }

        }
    }
}
