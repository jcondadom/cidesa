<?php

/**
 * Subclass for representing a row from the 'fcactcom'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcactcom.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcactcom extends BaseFcactcom
{
	protected $mascara="";
        
  public function getAfoact($val=false)
  {

    if($val) return number_format($this->afoact,4,',','.');
    else return $this->afoact;

  }
  
    public function setAfoact($v)
    {

        if ($this->afoact !== $v) {
            $this->afoact = Herramientas::toFloat($v,4);
            $this->modifiedColumns[] = FcactcomPeer::AFOACT;
          }  
    }  
}
