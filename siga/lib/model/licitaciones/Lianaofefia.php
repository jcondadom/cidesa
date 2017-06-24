<?php

/**
 * Subclase para representar una fila de la tabla 'lianaofefia'.
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
class Lianaofefia extends BaseLianaofefia
{
    public function getDescomres()
    {
        return H::GetX('Codcomres','Liccomres','Descomres',$this->codcomres);
    }
    
    public function getNumexp()
    {
        return H::GetX('Numanaofe','Lianaofe','Numexp',$this->numanaofe);
    }
    
    public function getLimit()
    {
        $c = new Criteria();
        $c->add(LipliecrifianPeer::NUMEXP,self::getNumexp());
        $c->add(LipliecrifianPeer::CODCOMRES,$this->codcomres);
        $per = LipliecrifianPeer::doSelectOne($c);
        if($per)
            $val = $per->getLimita();
        else
            $val='';
        return $val!='S' ? 'NO' : 'SI';
    }
    public function getPuntua()
    {
        $c = new Criteria();
        $c->add(LipliecrifianPeer::NUMEXP,self::getNumexp());
        $c->add(LipliecrifianPeer::CODCOMRES,$this->codcomres);
        $per = LipliecrifinPeer::doSelectOne($c);
        if($per)
            return  H::FormatoMonto($per->getPuntua());
        else
            return  H::FormatoMonto(0);
    }

    public function getPorcen()
    {
        $c = new Criteria();
        $c->add(LipliecrifianPeer::NUMEXP,self::getNumexp());
        $c->add(LipliecrifianPeer::CODCOMRES,$this->codcomres);
        $per = LipliecrifinPeer::doSelectOne($c);
        if($per)
            return  H::FormatoMonto($per->getPorcen());
        else
            return  H::FormatoMonto(0);
    }
}
