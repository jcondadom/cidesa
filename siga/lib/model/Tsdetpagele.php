<?php

/**
 * Subclase para representar una fila de la tabla 'tsdetpagele'.
 *
 * Tabla que contiene informaciÃ³n referente al detalle de los Pagos Electronicos.
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Tsdetpagele extends BaseTsdetpagele
{
    protected $fecemi="";
    protected $nomben="";
    protected $cedrif="";
    //protected $monord=0.00;
    protected $check="";
    protected $monorden=0;
    protected $tipcau="";
    
   public function afterHydrate()
  {
       $t= new Criteria();
       $t->add(OpordpagPeer::NUMORD,  $this->numord);
       $reg= OpordpagPeer::doSelectOne($t);
       if ($reg)
       {
           $this->fecemi=(string)date('d/m/Y',  strtotime($reg->getFecemi()));
           $this->nomben=$reg->getNomben();
           $this->cedrif=$reg->getCedrif();
           $this->tipcau=$reg->getTipcau();
           $this->monorden=$reg->getMonord()-$reg->getMonpag()-$reg->getMonret()-$reg->getMondes()-(Tesoreria::obtenerMontoAjuste($this->numord)/$reg->getValmon()); //$result[$i]["monpag"] - $result[$i]["monret"] - $result[$i]["mondes"] - self::obtenerMontoAjuste($result[$i]["numord"]))/$result[$i]["valmon"]
          /* if (self::getId())
             $this->monord=H::FormatoMonto($reg->getMonord());
           else
            $this->monord=H::FormatoMonto($reg->getMonord() - $reg->getMonpag() - $reg->getMonret() - $reg->getMondes() - Tesoreria::obtenerMontoAjuste($reg->getNumord()));*/
       }
       if (self::getId()) $this->check='1';
  }
    
}
