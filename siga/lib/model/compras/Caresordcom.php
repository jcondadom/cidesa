<?php

/**
 * Subclass for representing a row from the 'caresordcom'.
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
class Caresordcom extends BaseCaresordcom
{
  public function getCanord($val=false)
  {

    if($val) return number_format($this->canord,3,',','.');
    else return $this->canord;

  }
 
	public function setCanord($v)
	{

    if ($this->canord !== $v) {
        $this->canord = Herramientas::toFloat($v,3);
        $this->modifiedColumns[] = CaresordcomPeer::CANORD;
      }
  
	} 


          public function getCosto($val=false)
          {

            if($val) return number_format($this->costo,6,',','.');
            else return $this->costo;

}

  	public function setCosto($v)
	{

            if ($this->costo !== $v) {
                $this->costo = Herramientas::toFloat($v,6);
                $this->modifiedColumns[] = CaresordcomPeer::COSTO;
              }

	}

  public function getRgoart($val=false)
  {

    if($val) return number_format($this->rgoart,4,',','.');
    else return $this->rgoart;

  }

public function setRgoart($v)
  {

    if ($this->rgoart !== $v) {
        $this->rgoart = Herramientas::toFloat($v,4);
        $this->modifiedColumns[] = CaresordcomPeer::RGOART;
      }
  
  }   

  public function getTotart($val=false)
  {

    if($val) return number_format($this->totart,6,',','.');
    else return $this->totart;

  }

public function setTotart($v)
  {

    if ($this->totart !== $v) {
        $this->totart = Herramientas::toFloat($v,6);
        $this->modifiedColumns[] = CaresordcomPeer::TOTART;
      }
  
  }  

}
