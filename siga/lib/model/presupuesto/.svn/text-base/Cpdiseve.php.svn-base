<?php

/**
 * Subclase para representar una fila de la tabla 'cpdiseve'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.presupuesto
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cpdiseve extends BaseCpdiseve
{
	protected $monimp="0,00";

	public function getDeseve()
    {
        return Herramientas::getX_vacio('codeve','Cpevepre','deseve',self::getCodeve());
    }

    public function afterHydrate()
   {
      if ($this->tipmov=='PRC') {
      $r= new Criteria();
      $r->add(CpimpprcPeer::REFPRC,$this->refdoc);
      $r->add(CpimpprcPeer::CODPRE,$this->codpre);
      $r->add(CpimpprcPeer::MONIMP,$this->moneve);
      $resul= CpimpprcPeer::doSelectOne($r);
      if ($resul)
      {
      	$this->monimp=H::FormatoMonto($resul->getMonimp());
      }
    }elseif ($this->tipmov=='COM'){
      $r= new Criteria();
      $r->add(CpimpcomPeer::REFCOM,$this->refdoc);
      $r->add(CpimpcomPeer::CODPRE,$this->codpre);
      $r->add(CpimpcomPeer::MONIMP,$this->moneve);
      $resul= CpimpcomPeer::doSelectOne($r);
      if ($resul)
      {
        $this->monimp=H::FormatoMonto($resul->getMonimp());
      }
    }elseif ($this->tipmov=='CAU'){
      $r= new Criteria();
      $r->add(CpimpcauPeer::REFCAU,$this->refdoc);
      $r->add(CpimpcauPeer::CODPRE,$this->codpre);
      $r->add(CpimpcauPeer::MONIMP,$this->moneve);
      $resul= CpimpcauPeer::doSelectOne($r);
      if ($resul)
      {
        $this->monimp=H::FormatoMonto($resul->getMonimp());
      }
    }elseif ($this->tipmov=='PAG'){
      $r= new Criteria();
      $r->add(CpimppagPeer::REFPAG,$this->refdoc);
      $r->add(CpimppagPeer::CODPRE,$this->codpre);
      $r->add(CpimppagPeer::MONIMP,$this->moneve);
      $resul= CpimppagPeer::doSelectOne($r);
      if ($resul)
      {
        $this->monimp=H::FormatoMonto($resul->getMonimp());
      }
    }elseif ($this->tipmov=='ADI' || $this->tipmov=='DIS'){
      $r= new Criteria();
      $r->add(CpsolmovadiPeer::REFADI,$this->refdoc);
      $r->add(CpsolmovadiPeer::CODPRE,$this->codpre);
      $r->add(CpsolmovadiPeer::MONMOV,$this->moneve);
      $resul= CpsolmovadiPeer::doSelectOne($r);
      if ($resul)
      {
        $this->monimp=H::FormatoMonto($resul->getMonmov());
      }
    }elseif ($this->tipmov=='TRA'){
      $r= new Criteria();
      $r->add(CpsolmovtraPeer::REFTRA,$this->refdoc);
      $r->add(CpsolmovtraPeer::CODDES,$this->codpre);
      $r->add(CpsolmovtraPeer::MONMOV,$this->moneve);
      $resul= CpsolmovtraPeer::doSelectOne($r);
      if ($resul)
      {
        $this->monimp=H::FormatoMonto($resul->getMonmov());
      }
    }   
  }
}
