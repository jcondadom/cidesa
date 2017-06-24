<?php

/**
 * Subclase para representar una fila de la tabla 'licroent'.
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
class Licroent extends BaseLicroent
{
  protected $numval = null;
    public function getTipconpub()
    {
        $numexp = H::GetX('Numofe','Liregofe','Numexp',$this->numofe);
        $numsol = H::GetX('Numexp','Liplieesp','Numcomint',$numexp);
        return H::GetX('Numsol','Lisolegr','Tipconpub',$numsol);
    }
    
    public function getDesart()
    {
        if(self::getTipconpub()=='O')
            return H::GetX('Codpar','Ocdefpar','Despar',$this->codart);    
        else
            return H::GetX('Codart','Caregart','Desart',$this->codart);
    }

    public function getDesuniste()
    {
        return H::GetX('Coduniste','Lidatste','Desuniste',$this->coduniadm);
    }

    public function getDir()
  {
      return H::GetX('Coduniste','Lidatste','Dirste',$this->coduniadm);
  }

  public function getNumval()
  {
    if($this->numval) return $this->numval;
    if(!$this->liforpag_id) $this->getLiforpagId();
    if($this->liforpag_id) return $this->getLiforpag()->getNumval();
    else return $this->numval;
  }
  public function setNumval($numval)
  {
    $this->numval = $numval;
  }
}
