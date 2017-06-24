<?php
/**
 * Subclase para representar una fila de la tabla 'liaclara'.
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */
class Liaclara extends BaseLiaclara {

    public function getEjepre() {
        $sql = "select to_char(fecini,'yyyy') as anofis from contaba";
        if (H::BuscarDatos($sql, $rs))
            return $rs[0]['anofis'];
        else
            return '';
    }

    public function getEnte() {
        $sql = "select nomemp from Lidefemp";
        if (H::BuscarDatos($sql, $rs))
            return $rs[0]['nomemp'];
        else
            return '';
    }

    public function getNomempeje() {
        return H::getX('Codemp', 'Lidatstedet', 'Nomemp', $this->codempeje);
    }

    public function getNomcareje() {
        return H::getX('Codemp', 'Lidatstedet', 'Nomcar', $this->codempeje);
    }

    public function getDesuniste() {
        return H::getX('Coduniste', 'Lidatste', 'Desuniste', $this->coduniste);
    }

    public function getNomempadm() {
        return H::getX('Codemp', 'lidatstedet', 'Nomemp', $this->codempadm);
    }

    public function getNomcaradm() {
        return H::getX('Codemp', 'lidatstedet', 'Nomcar', $this->codempadm);
    }

    public function getDesuniadm() {
        return H::getX('Coduniste', 'lidatste', 'Desuniste', $this->coduniadm);
    }

    public function getDesclacomp() {
        return H::GetX('Numexp', 'Liplieesp', 'Desclacomp', $this->numexp);
    }

    public function getDestiplic() {
        return H::GetX('Numexp', 'Liplieesp', 'Destiplic', $this->numexp);
    }

    public function getTipcom() {
        return H::GetX('Numexp', 'Liplieesp', 'Tipcom', $this->numexp);
    }

    public function getNompro() {
        return H::GetX('Codpro', 'Caprovee', 'Nompro', $this->codpro);
    }

    public function getRif() {
        $c = new Criteria();
        $c->add(LiempparPeer::NUMEXP, $this->numexp);
        $c->add(LiempparPeer::CODPRO, $this->codpro);
        $per = LiempparPeer::doSelectOne($c);
        if ($per)
            return $per->getRifpro();
        else
            return '';
    }

    public function getNomrepleg() {
        $c = new Criteria();
        $c->add(LiempparPeer::NUMEXP, $this->numexp);
        $c->add(LiempparPeer::CODPRO, $this->codpro);
        $per = LiempparPeer::doSelectOne($c);
        if ($per)
            return $per->getNomrepleg();
        else
            return '';
    }

}
