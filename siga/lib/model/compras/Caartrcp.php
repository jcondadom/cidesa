<?php

/**
 * Subclass for representing a row from the 'caartrcp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Caartrcp extends BaseCaartrcp {
   public function getDesart(){
      return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
   } 

    public function getDesfal() {
        if (self::getCodfal() != null) {
            $c = new Criteria();
            $c->add(CamotfalPeer::CODFAL, self::getCodfal());
            $des = CamotfalPeer::doSelectone($c);
            if ($des) {
                return $des->getDesfal();
            }
        }
        return "";
    }

    public function getCanord() {
        $c = new Criteria();
        $c->add(CaartordPeer::ORDCOM, self::getOrdcom());
        $c->add(CaartordPeer::CODART, self::getCodart());
        if (self::getCodcat() != null)
            $c->add(CaartordPeer::CODCAT, self::getCodcat());
        $des = CaartordPeer::doSelectOne($c);
        if ($des) {
            $canord = $des->getCanord();
            $canaju = $des->getCanaju();
            $canrec = $des->getCanrec();
            $valor = $canord - $canaju - $canrec;
            return $valor;
        } else {
            return '0.00';
        }
    }

    public function getCanfal() {
        $canfal = self::getCanord() - self::getCanrec() - self::getCandev();
        return $canfal;
    }

    public function getCostos() {
        $costo = 0;
        if (self::getCanrec() != 0 and self::getMontot() != 0) {
            $costo = (self::getMontot() + self::getMondes() - self::getMonrgo()) / self::getCanrec();
        }
        return $costo;
    }

    public function getNomalm() {
        return Herramientas::getX('CODALM', 'Cadefalm', 'Nomalm', self::getCodalm());
    }

    public function getNomubi() {
        return Herramientas::getX('CODUBI', 'Cadefubi', 'Nomubi', self::getCodubi());
    }

    public function getDesunimed() {
        if (self::getCodunimed() != null)
            return Herramientas::getX_vacio('CODUNIMED', 'Cadefunimed', 'Desunimed', self::getCodunimed());
        return "";
    }
    
}
