<?php

/**
 * Subclase para representar una fila de la tabla 'licontrat'.
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
class Licontrat extends BaseLicontrat {

    protected $gridart = array();
    protected $gridrgo = array();
    protected $gridforpag = array();
    protected $gridcroent = array();
    protected $gridfia = array();

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

    public function getTipcon() {
        $c = new Criteria();
        $c->addJoin(LiplieespPeer::NUMCOMINT, LicomintPeer::NUMCOMINT);
        $c->add(LiplieespPeer::NUMEXP, $this->numexp);
        $per = LicomintPeer::doSelectOne($c);
        if ($per)
            return $per->getTipcon() == 'B' ? 'BIENES' : ($per->getTipcom() == 'S' ? 'SERVICIO' : '');
        else
            return '';
    }

    public function getNompro() {
        $c = new Criteria();
        $c->addJoin(CaproveePeer::CODPRO, LiregofePeer::CODPRO);
        $c->add(LiregofePeer::NUMEXP, $this->numexp);
        $per = CaproveePeer::doSelectOne($c);
        if ($per)
            return $per->getNompro();
        else
            return '';
    }

    public function getRifpro() {
        $c = new Criteria();
        $c->add(LiempparPeer::NUMEXP, $this->numexp);
        $c->add(LiregofePeer::NUMOFE, $this->numofe);
        $c->addJoin(LiregofePeer::CODPRO, LiempparPeer::CODPRO);
        $per = LiempparPeer::doSelectOne($c);
        if ($per)
            return $per->getRifpro();
        else
            return '';
    }

    public function getNomrepleg() {
        $c = new Criteria();
        $c->add(LiempparPeer::NUMEXP, $this->numexp);
        $c->add(LiregofePeer::NUMOFE, $this->numofe);
        $c->addJoin(LiregofePeer::CODPRO, LiempparPeer::CODPRO);
        $per = LiempparPeer::doSelectOne($c);
        if ($per)
            return $per->getNomrepleg();
        else
            return '';
    }

    public function getFecofe() {
        $c = new Criteria();
        $c->add(LiregofePeer::NUMOFE, $this->numofe);
        $per = LiregofePeer::doSelectOne($c);
        if ($per)
            return $per->getFecofe('d/m/Y');
        else
            return '';
    }

    public function getMonofe() {
        return H::FormatoMonto(H::GetX('Numofe', 'Liregofe', 'Monofetot', $this->numofe));
    }

    public function getMonofelet() {
        return H::obtenermontoescrito(H::FormatoNum(self::getMonofe()));
    }

    public function getNumrecofe() {
        return H::GetX('Numexp', 'Lirecomen', 'Numrecofe', $this->numexp);
    }

    public function getDirpro() {
        return H::GetX('Codpro', 'Caprovee', 'Dirpro', $this->codpro);
    }

    public function getTotcont() {
        $sql = "select sum(subtot) as total from liforpag where numofe='" . $this->getNumofe() . "'";
        H::BuscarDatos($sql, $output);
        $total = isset($output[0]['total']) ? $output[0]['total'] : 0;
        return $total;
    }

    public function getTotpag() {
        $sql = "select case when sum(a.subtot)>0 then sum(a.subtot) else 0 end as total from lidetparval a inner join livaluaciones b on a.numval=b.numval where b.numcont='" . $this->numcont . "'";
        H::BuscarDatos($sql, $output);

        $total = isset($output[0]['total']) ? $output[0]['total'] : 0;
        return $total;
    }

    public function getTotporpag() {
        $totpag = $this->getTotpag();
        $totcont = H::toFloat($this->getMonofe());
        $total = $totcont - $totpag;
        return number_format($total, 2, ',', '.');
    }

}
