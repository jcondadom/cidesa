<?php

/**
 * Subclass for representing a row from the 'liempofe'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Liempofe.php 44640 2011-06-03 13:03:21Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Liempofe extends BaseLiempofe
{
    protected $grid=array();
    protected $check='';

    public function getDescrip()
    {
        return H::GetX('Numexp','Liplieesp','Descrip',$this->numexp);
    }

    public function getNumplie()
    {
        return H::GetX('Numexp','Liplieesp','Numplie',$this->numexp);
    }

    public function getNompro()
    {
        return H::GetX('Codpro','Caprovee','Nompro',$this->codpro);
    }
    public function getRifpro()
    {
        $c = new Criteria();
        $c->add(LiempparPeer::NUMEXP,$this->numexp);
        $c->add(LiempparPeer::CODPRO,$this->codpro);
        $per = LiempparPeer::doSelectOne($c);
        if($per)
            return $per->getRifpro();
        else
            return $this->codpro;
    }

    public function getNomrepleg()
    {
        $c = new Criteria();
        $c->add(LiempparPeer::NUMEXP,$this->numexp);
        $c->add(LiempparPeer::CODPRO,$this->codpro);
        $per = LiempparPeer::doSelectOne($c);
        if($per)
            return $per->getNomrepleg();
        else
            return '';
    }
}
