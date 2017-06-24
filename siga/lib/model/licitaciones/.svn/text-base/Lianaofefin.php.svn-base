<?php

/**
 * Subclase para representar una fila de la tabla 'lianaofefin'.
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
class Lianaofefin extends BaseLianaofefin
{
   public function getDescri()
    {
        return H::GetX('Codcri','Liaspfincrieva','Descri',$this->codcri);
    }
    
    public function getNumexp()
    {
        return H::GetX('Numanaofe','Lianaofe','Numexp',$this->numanaofe);
    }
    
    public function getLimit()
    {
        $c = new Criteria();
        $c->add(LipliecrifinPeer::NUMEXP,self::getNumexp());
        $c->add(LipliecrifinPeer::CODCRI,$this->codcri);
        $per = LipliecrifinPeer::doSelectOne($c);
        if($per)
            $val = $per->getLimita();
        else
            $val='';
        return $val!='S' ? 'NO' : 'SI';
    }
    public function getPuntua()
    {
        $c = new Criteria();
        $c->add(LipliecrifinPeer::NUMEXP,self::getNumexp());
        $c->add(LipliecrifinPeer::CODCRI,$this->codcri);
        $per = LipliecrifinPeer::doSelectOne($c);
        if($per)
            return  H::FormatoMonto($per->getPuntua());
        else
            return  H::FormatoMonto(0);
        
    }

    public function getPorcen()
    {
        $c = new Criteria();
        $c->add(LipliecrifinPeer::NUMEXP,self::getNumexp());
        $c->add(LipliecrifinPeer::CODCRI,$this->codcri);
        $per = LipliecrifinPeer::doSelectOne($c);
        if($per)
            return  H::FormatoMonto($per->getPorcen());
        else
            return  H::FormatoMonto(0);
    }   
}
