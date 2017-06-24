<?php

/**
 * Subclase para representar una fila de la tabla 'liregofefia'.
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
class Liregofefia extends BaseLiregofefia
{
    public function getDescomres()
    {
        return H::GetX('Codcomres','Liccomres','Descomres',$this->codcomres);
    }

    public function getLimit()
    {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE,$this->numofe);
        $c->addJoin(LipliecrifianPeer::NUMEXP,  LiregofePeer::NUMEXP);
        $c->add(LipliecrifianPeer::CODCOMRES,$this->codcomres);
        $per = LipliecrifianPeer::doSelectOne($c);
        if($per)
            return $per->getLimita()!='S' ? 'NO' : 'SI';
        else
            return '';
    }

    public function getPorcentaje()
    {
        return H::FormatoMonto(H::GetX('Codcomres','Liccomres','Porcentaje',$this->codcomres));
    }

    public function getFecemi()
    {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE,$this->numofe);
        $c->addJoin(LipliecrifianPeer::NUMEXP,  LiregofePeer::NUMEXP);
        $c->add(LipliecrifianPeer::CODCOMRES,$this->codcomres);
        $per = LipliecrifianPeer::doSelectOne($c);
        if($per)
            return $per->getFecemi();
        else
            return '';
    }

    public function getFecven()
    {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE,$this->numofe);
        $c->addJoin(LipliecrifianPeer::NUMEXP,  LiregofePeer::NUMEXP);
        $c->add(LipliecrifianPeer::CODCOMRES,$this->codcomres);
        $per = LipliecrifianPeer::doSelectOne($c);
        if($per)
            return $per->getFecemi();
        else
            return '';
    }

    public function getEmpresa()
    {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE,$this->numofe);
        $c->addJoin(LipliecrifianPeer::NUMEXP,  LiregofePeer::NUMEXP);
        $c->add(LipliecrifianPeer::CODCOMRES,$this->codcomres);
        $per = LipliecrifianPeer::doSelectOne($c);
        if($per)
            return $per->getEmpresa();
        else
            return '';
    }
}
