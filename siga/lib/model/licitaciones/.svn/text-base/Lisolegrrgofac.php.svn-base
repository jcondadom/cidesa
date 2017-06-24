<?php

/**
 * Subclase para representar una fila de la tabla 'lisolegrrgofac'.
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
class Lisolegrrgofac extends BaseLisolegrrgofac
{
    public function getNomrgo()
    {
        return H::GetX('Codrgo','Carecarg','Nomrgo',$this->codrgo);
    }

    public function getMonrgoe()
    {
        $val = H::GetX('Numsol','Lisolegr','Valcam',$this->numsol);
        if($val>0)
            return H::FormatoMonto(self::getMonrgo()/$val);
        else
            return '';
    }
}
