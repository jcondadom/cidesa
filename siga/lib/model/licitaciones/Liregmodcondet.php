<?php

/**
 * Subclase para representar una fila de la tabla 'liregmodcondet'.
 *
 * Detalle de modificación de contratos
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Liregmodcondet extends BaseLiregmodcondet
{
    public function getDesart()
    {
        if(self::getTipconpub()=='O')
            return H::GetX('Codpar','Ocdefpar','Despar',$this->codart);
        else
            return H::GetX('Codart','Caregart','Desart',$this->codart);
    }
}
