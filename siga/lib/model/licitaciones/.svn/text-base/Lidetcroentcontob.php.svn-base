<?php

/**
 * Subclase para representar una fila de la tabla 'lidetcroentcontob'.
 *
 * Detalle de cronogramas de entregas de contratos de obras
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Lidetcroentcontob extends BaseLidetcroentcontob
{
    public function getDesart()
    {
      return H::GetX('Codpar','Ocdefpar','Despar',$this->codart);
    }

    public function getDesuniste()
    {
        return H::GetX('Coduniste','Lidatste','Desuniste',$this->coduniadm);
    }
}
