<?php

/**
 * Subclase para representar una fila de la tabla 'liregofetec'.
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
class Liregofetec extends BaseLiregofetec
{
    public function getDescri()
    {
        return H::GetX('Codcri','Liaspteccrieva','Descri',$this->codcri);
    }
    public function getLimit()
    {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE,$this->numofe);
        $c->addJoin(LipliecritecPeer::NUMEXP,  LiregofePeer::NUMEXP);
        $c->add(LipliecritecPeer::CODCRI,$this->codcri);
        $per = LipliecritecPeer::doSelectOne($c);
        if($per)
            return $per->getLimita()!='S' ? 'NO' : 'SI';
        else
            return '';
    }
}
