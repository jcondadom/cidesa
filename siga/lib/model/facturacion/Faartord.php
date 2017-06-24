<?php

/**
 * Subclase para representar una fila de la tabla 'faartord'.
 *
 * Detalles de orden de compra
 *
 * @package    Roraima
 * @subpackage lib.model.facturacion
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */
class Faartord extends BaseFaartord {

    private $canordaju = 0.0;
    private $cosart = 0.0;
    private $monordaju = 0.0;
    private $monrecaju = 0.0;
    private $montotaju = 0.0;
    
    protected $desart = '';
    protected $canrecgri = 0.0;
    protected $canfal = 0.0;
    protected $candev = '';
    protected $montot = 0.0;
    protected $codcat = '';
    protected $codfal = '';
    protected $desfal = '';
    protected $fecest = '';
    protected $canrecgrireal = 0.0;
    protected $dtoart = 0.0;
    protected $rgoart = 0.0;
    protected $codalm = "";
    protected $nomalm = "";
    protected $codubi = "";
    protected $numlot = "";
    protected $serial = "";
    protected $marca = "";
    protected $modelo = "";
    protected $desunimed = "";

    protected $datosrecargo = "";
    protected $nomubi = "";
    protected $codigopre = "";
    protected $cancost = "0,00";
    protected $anadir = "";
    protected $descuentos = "0,00";
    protected $monajus = "0,00";
    protected $monrecaj = "0,00";
    protected $montotaj = "0,00";
    protected $codparaj = "";
    protected $mondif = "0,00";
    protected $preaju = "0,00";
    protected $canaju2 = "0,00";
    protected $signocan = "";
    protected $signopre = "";

    protected $totart = 0.0;
    protected $cantot = 0.0;
    protected $codpar = "";

    public function hydrate(ResultSet $rs, $startcol = 1) {
        parent::hydrate($rs, $startcol);
        $this->canrecgri = $this->canord - self::getCanrec();
        $this->canrecgrireal = $this->canord - self::getCanrec();
        $this->canfal = 0.0;
        $this->montot = ($this->canrecgri * $this->preart) + self::getMonart();
        $calculo = self::getTotart() - self::getMonart();

        $this->cancost = number_format($calculo, 2, ',', '.');
        $this->datosrecargo = "";
        $claartdes = H::getConfApp2('claartdes', 'compras', 'almsolegr');
        $c = new Criteria();
        $c->add(CadisrgoPeer::REQART, self::getOrdcom());
        $c->add(CadisrgoPeer::CODART, self::getCodart());
        if ($claartdes == 'S')
            $c->add(CadisrgoPeer::DESART, trim(self::getDesart()));
        $c->add(CadisrgoPeer::CODCAT, self::getCodcat());
        $result = CadisrgoPeer::doSelect($c);
        if ($result) {
            foreach ($result as $datos) {
                $this->datosrecargo = $this->datosrecargo . $datos->getCodrgo() . '_' . $datos->getNomrgo() . '_' . $datos->getMonrgoc() . '_' . $datos->getTiprgo() . '_' . $datos->getMonrgo() . '_' . $datos->getCodpar() . '!';
            }
        }

        if (($this->cantot) > 0 && ($this->preart) > 0) {
            $this->monajus = number_format(($this->mondif * $this->preart), 2, ',', '.');
        }
        if ($this->mondif > 0)
            $calrec = abs($this->mondif) * ($this->rgoart / $this->canord);
        else
            $calrec=0;
        $this->monrecaj = number_format($calrec, 2, ',', '.');
        $this->preaju = number_format($this->preart, 2, ',', '.');
        $this->canord2 = number_format(($this->canord - $this->canrec), 2, ',', '.');
        $this->canaju2 = number_format(($this->canord - $this->canrec), 2, ',', '.');
        $this->montotaj = number_format(($this->monajus + $this->monrecaj), 2, ',', '.');
        if ($this->codpar != "") {
            $this->codparaj = $this->codcat . "-" . $this->codpar;
        } else {
            $this->codparaj = $this->codcat . "-" . H::getX_vacio('CODPAR', 'Caregart', 'Codpar', $this->codart);
        }
    }

    public function getMontot() {

        return $this->montot;
    }

    public function getCanordaju() {

        $val = self::getCanord() - self::getCanaju() - self::getCanrec();
        return $val;
    }

    /**
     * Función para manejar la cantidad de artículos.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Cantidad de artículos introducida en el Grid.
     */
    public function getCanordaju_() {

        return $this->canordaju;
    }

    /**
     * Función para manejar el costo de artículo en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @param decimal $v Cantidad Ajustada
     * @return void
     */
    public function setCanordaju($v) {
        $this->canordaju = $v;
    }

    /**
     * Función para manejar el costo de artículo en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Cálculo del Costo del artículo.
     */
    public function getCosart() {

        // CAArtOrd!PreArt - Round( (CAArtOrd!DtoArt / CantOrd) , 2)
        if (self::getCanord() <> 0)
            $val = $this->preart - round(self::getDtoart() / (self::getCanord()), 2);
        else
            $val = 0;
        //$val = self::getDtoart();
        //$val = self::getPreart();
        return number_format($val, 2, ',', '.');
    }

    /**
     * Función para manejar el costo de artículo en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Costo del artículo introducido en el grid.
     */
    public function getCosart_() {

        return $this->cosart;
    }

    /**
     * Función para manejar el costo de artículo en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @param decimal $v Costo del ajuste
     * @return void
     */
    public function setCosart($v) {

        $this->cosart = $v;
    }

    /**
     * Función para manejar el monto del ajuste en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Valor calculado del Ajuste.
     */
    public function getMonaju() {

        $val = self::getCanaju() * self::getCosart();
        return $val;
    }

    /**
     * Función para manejar el monto del ajuste en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Valor del Ajuste Introducido en el Grid.
     */
    public function getMondaju_() {

        return $this->monordaju;
    }

    /**
     * Función para manejar el monto del ajuste en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @param decimal $v Monto del ajuste
     * @return decimal Valor del Ajuste Introducido en el Grid.
     */
    public function setMonaju($v) {

        $this->monordaju = $v;
    }

    /**
     * Función para manejar el monto del recargo en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Valor calculado del recargo.
     */
    public function getMonrecaju() {

        if (self::getCanord() <> 0)
            $val = ((self::getCanaju() * self::getRgoart()) / self::getCanord());
        else
            $val = 0;
        return $val;
    }

    /**
     * Función para manejar el monto del ajuste en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Valor del recargo Introducido en el Grid.
     */
    public function getMonrecaju_() {

        return $this->monrecaju;
    }

    /**
     * Función para manejar el monto del recargo en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @param decimal $v Monto del recargo
     * @return decimal Valor del Ajuste Introducido en el Grid.
     */
    public function setMonrecaju($v) {

        $this->monrecaju = $v;
    }

    /**
     * Función para calcular el monto del total del ajuste en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Valor calculado del total del ajuste.
     */
    public function getMontotaju() {

        $val = self::getMonaju() + self::getMonrecaju();
        return $val;
    }

    /**
     * Función para manejar el monto del total del ajuste en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Valor del total Introducido en el Grid.
     */
    public function getMontotaju_() {

        return $this->montotaju;
    }

    /**
     * Función para manejar el monto del total del ajuste en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @param decimal $v Monto del total del ajuste
     * @return void
     */
    public function setMontotaju($v) {

        $this->montotaju = $v;
    }

    public function getCodPre() {
        $var = parent::getCodcat() . '-' . parent::getCodpar();
        return $var;
    }

    public function getCodPre_() {
        return $this->codpre;
    }

    public function setCodPre($val) {
        $this->codpre = $val;
    }

    public function setCheck($val) {
        $this->check = $val;
    }

    public function getCheck() {
        if (self::getRgoart() != 0 && self::getId() != "") {
            $this->check = 1;
        } else {
            $this->check;
        }
        return $this->check;
    }

    public function setRetiva($val) {
        $this->retiva = $val;
    }

    /**
     * Función para manejar el costo de artículo en el Grid.
     * Esta función es solo para trabajar con el grid del formulario almajuoc
     *
     * @return decimal Cálculo del Costo del artículo.
     */
    public function getPreciounitario() {

        // CAArtOrd!PreArt - Round( (CAArtOrd!DtoArt / CantOrd) , 2)
        if (self::getCanord() <> 0)
            $val = $this->preart - round(self::getDtoart() / (self::getCanord()), 2);
        else
            $val = 0;
        //$val = self::getDtoart();
        //$val = self::getPreart();
        return $val;
    }

    public function getCanord($val=false) {

        if ($val)
            return number_format($this->canord, 3, ',', '.');
        else
            return $this->canord;
    }

    public function setCanord($v) {

        if ($this->canord !== $v) {
            $this->canord = Herramientas::toFloat($v, 3);
            $this->modifiedColumns[] = CaartordPeer::CANORD;
        }
    }

    public function getPreart($val=false) {

        if (self::getId()) {
            $moneda = H::getX_vacio('ORDCOM', 'Caordcom', 'Tipmon', self::getOrdcom());
            $valor = H::getX_vacio('ORDCOM', 'Caordcom', 'Valmon', self::getOrdcom());
            $moneda2 = H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2 != $moneda) {
                if ($valor != 0) {
                    $calculo = $this->preart / $valor;
                } else {
                    $calculo = 0;
                }
            }else
                $calculo=$this->preart;
        }else
            $calculo=$this->preart;

        if ($val)
            return number_format($calculo, 3, ',', '.');
        else
            return $calculo;
    }

    public function setPreart($v) {

        if ($this->preart !== $v) {
            $this->preart = Herramientas::toFloat($v, 3);
            $this->modifiedColumns[] = CaartordPeer::PREART;
        }
    }

    public function getDescen() {
        return Herramientas::getX_vacio('CODCEN', 'Cadefcen', 'Descen', self::getCodcen());
    }

    public function getTotart($val=false) {
        if (self::getId()) {
            $moneda = H::getX_vacio('ORDCOM', 'Caordcom', 'Tipmon', self::getOrdcom());
            $valor = H::getX_vacio('ORDCOM', 'Caordcom', 'Valmon', self::getOrdcom());
            $moneda2 = H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2 != $moneda) {
                if ($valor > 0) {
                    $calculo = $this->totart / $valor;
                } else {
                    $calculo = 0;
                }
            }else
                $calculo=$this->totart;
        }else
            $calculo=$this->totart;


        if ($val)
            return number_format($calculo, 2, ',', '.');
        else
            return $calculo;
    }

    public function setTotart($v) {

        if ($this->totart !== $v) {
            $this->totart = Herramientas::toFloat($v);
            $this->modifiedColumns[] = CaartordPeer::TOTART;
        }
    }

    public function getRgoart($val=false) {
        if (self::getId()) {
            $moneda = H::getX_vacio('ORDCOM', 'Caordcom', 'Tipmon', self::getOrdcom());
            $valor = H::getX_vacio('ORDCOM', 'Caordcom', 'Valmon', self::getOrdcom());
            $moneda2 = H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2 != $moneda) {
                if ($valor > 0) {
                    $calculo = $this->rgoart / $valor;
                } else {
                    $calculo = 0;
                }
            }else
                $calculo=$this->rgoart;
        }else
            $calculo=$this->rgoart;


        if ($val)
            return number_format($calculo, 2, ',', '.');
        else
            return $calculo;
    }

    public function setRgoart($v) {

        if ($this->rgoart !== $v) {
            $this->rgoart = Herramientas::toFloat($v);
            $this->modifiedColumns[] = CaartordPeer::RGOART;
        }
    }

    public function getDesunimed() {
        return Herramientas::getX_vacio('CODUNIMED', 'Cadefunimed', 'Desunimed', self::getCodunimed());
    }

    public function getDesart(){
      return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
   }

}