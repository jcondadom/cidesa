<?php

/**
 * Subclase para representar una fila de la tabla 'lidetparval'.
 *
 * Detalle de partidas por contrato
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Lidetparval extends BaseLidetparval
{
    protected $numval = 0;
  public function getDesart(){
    return H::getX('codpar', 'ocdefpar', 'despar', $this->codart);
  }
  
  public function getCantidporvalu($val){
      if($this->numval<>0){
          $c = new Criteria();
          
          $c->add(LicroentPeer::CODART, $this->codart);
          $c->addJoin(LicroentPeer::LIFORPAG_ID, LiforpagPeer::ID);
          $c->add(LiforpagPeer::NUMVAL,$this->numval);
          $reg_croent = LicroentPeer::doSelectOne($c);
          if($reg_croent) return $reg_croent->getCantident($val);
          else return '0,00';
      }else return '0,00';
  }
  
}
