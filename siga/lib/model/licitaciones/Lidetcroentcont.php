<?php

/**
 * Subclase para representar una fila de la tabla 'lidetcroentcont'.
 *
 * Detalle de cronogramas de entregas de contratos
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Lidetcroentcont extends BaseLidetcroentcont
{
//    public function getTipconpub()
//    {
//        $numexp = H::GetX('Numofe','Liregofe','Numexp',$this->numofe);
//        $numsol = H::GetX('Numexp','Liplieesp','Numcomint',$numexp);
//        return H::GetX('Numsol','Lisolegr','Tipconpub',$numsol);
//    }

    public function getDesart()
    {
      return H::GetX('Codpar','Ocdefpar','Despar',$this->codart);
    }

    public function getDesuniste()
    {
        return H::GetX('Coduniste','Lidatste','Desuniste',$this->coduniadm);
    }
}
