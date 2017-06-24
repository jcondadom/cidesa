<?php

/**
 * Subclase para representar una fila de la tabla 'cidetliq'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.ingresos
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Cidetliq extends BaseCidetliq
{
    protected $check="0";
    protected $refing="";
    protected $fecing="";
    protected $destip="";
    protected $nomcon="";
    protected $desing="";
    protected $moning="0,00";
    
  public function afterHydrate()
  {
     if (self::getId())
     {
       $t= new Criteria();
       $t->add(CiregingPeer::REFING,self::getRefing());
       $result= CiregingPeer::doSelectOne($t);
       if ($result)
       {
         $this->fecing=date('d/m/Y',strtotime($result->getFecing()));
         $this->destip=$result->getDestip();
         $this->nomcon=$result->getNomcon();
         $this->desing=$result->getDesing();
         $this->moning=number_format($result->getMoning(),2,',','.');
       }
     }
  }
}
