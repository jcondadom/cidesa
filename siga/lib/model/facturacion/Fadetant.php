<?php

/**
 * Subclase para representar una fila de la tabla 'fadetant'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Fadetant extends BaseFadetant
{
    protected $monret=0;
    protected $monpag=0;
    protected $fecped="";
    protected $desped="";
    protected $monped=0;
    
    public function afterHydrate()
  {

    if (self::getId())
    {
      $tipo=H::getX_vacio('Nroant','Faantcli','Tipant',self::getNroant());
      if ($tipo=='P') {
        $o= new Criteria();
        $o->add(FapedidoPeer::NROPED,self::getNroped());
        $result= FapedidoPeer::doSelectOne($o);
        if ($result)
        {
            $this->fecped=date('d/m/Y',  strtotime($result->getFecped()));
            $this->desped=$result->getDesped();
            $this->monped=number_format($result->getMonped(), 2, ',', '.');
        }
      }elseif ($tipo=='E') {
        $o= new Criteria();
        $o->add(FapresupPeer::REFPRE,self::getNroped());
        $result= FapresupPeer::doSelectOne($o);
        if ($result)
        {
            $this->fecped=date('d/m/Y',  strtotime($result->getFecpre()));
            $this->desped=$result->getDespre();
            $this->monped=number_format($result->getMonpre(), 2, ',', '.');
        }
      }
    }

   

  }
    
}
