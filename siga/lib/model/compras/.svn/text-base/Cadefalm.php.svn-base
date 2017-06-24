<?php

/**
 * Subclass for representing a row from the 'cadefalm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Cadefalm.php 45820 2011-09-02 19:07:50Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cadefalm extends BaseCadefalm {


    public function __toString()
    {
        return $this->codalm.' - '.$this->nomalm;
    }

    public function getNomcat() {
        return Herramientas::getX('codubi', 'Bnubibie', 'Desubi', self::getCodcat());
    }

    public function setCodalm($v) {

        parent::setCodalm(str_pad($v, 6, "0", STR_PAD_LEFT));
    }

    protected $check = 0;

    public function getNomtip() {
        return Herramientas::getX('id', 'Catipalm', 'Nomtip', self::getCodtip());
    }

    public function getCodlongveinte() {
        return H::getConfApp('codlongveinte', 'compras', 'almdefalm');
    }

    public function getDescta() {
        return Herramientas::getX('codcta', 'Contabb', 'Descta', self::getCodcta());
    }

    public function getNomemp() {
        return Herramientas::getX('codemp', 'nphojint', 'nomemp', self::getCodemp());
    }

    public function getNomedo() {
        return Herramientas::getX('codedo', 'ocestado', 'nomedo', self::getCodedo());
    }

    public function getDeszon() {
        return Herramientas::getX('codzon', 'fadefzon', 'deszon', self::getCodzon());
    }

    public function getCorfacseq() {
        return H::getvalSecuencia('alm' . $this->codalm . 'fac_seq');
    }

    public function getCornumctrseq() {
        return H::getvalSecuencia('alm' .$this->codalm. 'ctr_seq');
    }

}
