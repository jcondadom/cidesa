<?php

/**
 * Subclase para representar una fila de la tabla 'liordcomsolegr'.
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
class Liordcomsolegr extends BaseLiordcomsolegr
{
    public function getNompre()
    {
        return H::getX('Codpre','Cpdeftit','Nompre',$this->codpre);
    }
    
    public function getFecsol()
    {
        return date('d/m/Y',strtotime(H::getX('Numsol','Lisolegr','Fecreg',$this->numsol)));
    }
    
    public function getMontot()
    {
        return H::FormatoMonto(H::getX('Numcomint','Lidetcomint','Montot',$this->numcomint));
    }
    
    public function getMontote()
    {      
      $val = H::GetX('Numsol','Lisolegr','Valcam',$this->numsol);      
      if($val>0)
        return H::FormatoMonto(self::getMontot()/$val);
      else
        return '';
    }
    
    public function getValcam()
    {      
      return H::GetX('Numsol','Lisolegr','Valcam',$this->numsol);
    }
}
