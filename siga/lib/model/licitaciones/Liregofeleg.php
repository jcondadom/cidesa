<?php

/**
 * Subclase para representar una fila de la tabla 'liregofeleg'.
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
class Liregofeleg extends BaseLiregofeleg
{
    public function getDescri()
    {
        return H::GetX('Codcri','Liasplegcrieva','Descri',$this->codcri);
    }
    public function getLimit()
    {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE,$this->numofe);
        $c->addJoin(LipliecrilegPeer::NUMEXP,  LiregofePeer::NUMEXP);
        $c->add(LipliecrilegPeer::CODCRI,$this->codcri);
        $per = LipliecrilegPeer::doSelectOne($c);
        if($per)
            return $per->getLimita()!='S' ? 'NO' : 'SI';
        else
            return '';
    }

}
