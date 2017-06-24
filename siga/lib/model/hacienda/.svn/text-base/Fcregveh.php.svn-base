<?php

/**
 * Subclass for representing a row from the 'fcregveh'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcregveh.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcregveh extends BaseFcregveh
{
    protected $dircon = "";
    protected $nacconcon = "";
    protected $nomcon = "";
    protected $tipconcon = "";

    protected $dirconrep = "";
    protected $nacconrep = "";
    protected $nomconrep = "";
    protected $tipconrep = "";

    protected $grid = "";
    protected $traspaso = "";
    protected $numtra= "";
    protected $fectra= "";
    protected $funrectra= "";
    protected $rifconant="";
    protected $rifrepant="";
    protected $nomconant= "";
    protected $nomrepant= "";
    protected $mensaje= "";
    protected $refmod="";
    protected $funrecmod="";
    protected $fec="";

    //Datos de la desincorpacion

    protected $desincorporar= "";
    protected $numdes= "";
    protected $fundes= "";
    protected $motdes= "";
    protected $modificar="";

    protected $check= "0";
    protected $monafo="";
    protected $porali="";
    protected $anolim="";
    protected $plavehnew="";
    protected $nomdueant="";



    public function hydrate(ResultSet $rs, $startcol = 1) {
		parent :: hydrate($rs, $startcol);

                //Representante
		$this->dirconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'dircon', self::getRifrep());
		$this->nacconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'naccon', self::getRifrep());
		$this->nomconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self::getRifrep());
		$this->tipconrep = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'tipcon', self::getRifrep());
                //Contribuyente
		$this->dircon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'dircon', self::getRifcon());
		$this->nomcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self::getRifcon());
		$this->nacconcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'naccon', self::getRifcon());
		$this->tipconcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'tipcon', self::getRifcon());

    $this->nomdueant = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self::getDueant());

                  //Uso

                $c = new Criteria();
                $c->add(FcusovehPeer::CODUSO,self::getCoduso());
                $Fcusoveh = FcusovehPeer::doSelectOne($c);

                if($Fcusoveh){
                  $this->desuso = $Fcusoveh->getDesuso();
                  $this->monafo = $Fcusoveh->getMonafo();
                  $this->porali = $Fcusoveh->getPorali();
                  $this->anolim = $Fcusoveh->getAnolim();
                }

		


		$this->edad =  date('Y')-self :: getAnoveh();

		$c = new Criteria();
		$c->add(FcdeclarPeer::NUMREF, self::getPlaveh());
		$c->add(FcdeclarPeer::FECDEC, '01/01/'.date('Y'), Criteria::GREATER_EQUAL);
		$reg = FcdeclarPeer::doselectone($c);

		$this->mensaje= 'SIN DECLARACION';
		if ($reg)
		{
			$this->mensaje= 'CON DECLARACION';
		}

		if (self::getEstveh() == 'A')
		{
			$this->mensaje= $this->mensaje.'  --  REGISTRADO';
		}elseif (self::getEstveh() == 'D')
		{
			$this->mensaje= $this->mensaje.'  --  DESINCORPORADO';
		}
                //Traspaso del Vehiculo
		$c = new Criteria();
		$c->add(FctravehPeer::PLAVEH, self::getPlaveh());
		$reg = FctravehPeer::doselectone($c);

		if ($reg)
		{
                     $this->numtra   = $reg->getNumtra();
                     $this->fectra    = $reg->getFectra();
                     $this->funrectra = $reg->getFunrec();
                     $this->rifconant = $reg->getRifconant();
                     $this->nomconant = Herramientas::getX('rifcon','fcconrep','nomcon',$reg->getRifconant());
                     $this->rifrepant = $reg->getRifrepant();
                     $this->nomrepant = Herramientas::getX('rifcon','fcconrep','nomcon',$reg->getRifrepant());
                     //$this->traspaso='S';

		}else{
			if (Herramientas::getVerCorrelativo('numtra','fctraveh',$r)){	$this->numtras = str_pad($r, 10, '0', STR_PAD_LEFT); }

		}
                //Desincorporación del vehiculo

		$c = new Criteria();
		$c->add(FcdesvehPeer::PLAVEH, self::getPlaveh());
		$reg = FcdesvehPeer::doSelectOne($c);

		if ($reg)
		{
			$this->numdes= $reg->getNumdes();
			$this->fundes= $reg->getFunrec();
			$this->motdes= $reg->getMotdes();
                        //$this->desincorporar='S';
		}

	}

}
