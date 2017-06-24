<?php

/**
 * Subclass for representing a row from the 'fcrepfis'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcrepfis.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcrepfis extends BaseFcrepfis
{
	protected $rifcon='';
	protected $nomcon='';
	protected $dircon='';
	protected $naccon='';
	protected $tipcon='';
	protected $grid= array();
	protected $griddistribucion= array();
	protected $totdec='';
        protected $incmod='';
        protected $mododec='';
        protected $fecini='';
        protected $feccie='';
        protected $annioini='';
        protected $anniofin='';
        protected $params=array();
        protected $monadi=0.00;


  public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->codestinm = Herramientas::getX_vacio('nroinm','fcdetinm','codestinm',self::getNumlic());
      $this->desestinm = Herramientas::getX_vacio('nroinm','fcdetinm','desestinm',self::getNumlic());
      $this->anoava    = Herramientas::getX_vacio('nroinm','fcdetinm','anoava',self::getNumlic());
      $this->codzon    = Herramientas::getX_vacio('nroinm','fcdetinm','codzon',self::getNumlic());
      $this->mensaje = self::getEstinm()=='D' ? 'DESINCORPORADO' : '' ;

/*
       $c = new Criteria();
       $c->add(FcsollicPeer::NUMSOL,$reg->getNumsol());
       $regi = FcsollicPeer::doSelectOne($c);
       if ($regi)
       {
         $this->dircon=$regi->getDircon();
         $this->nomcon=$regi->getNomcon();
 		 $this->naccon = $regi->getNaccon();
		 $this->tipcon = $regi->getTipcon();


       }*/


   }

	public static function Fuentedeingresor()
    {
    	$tira=array();
 		$c = new Criteria();
 		$c->addAscendingOrderByColumn(FcfueprePeer :: CODFUE);
 		$reg = FcfueprePeer::doSelect($c);
 		foreach($reg as $valor)
 		{
 			$tira += array($valor->getCodfue() => $valor->getCodfue()." - ".$valor->getNomfue());
 		}
 		return $tira;

    }

	public static function Fuentedeingresos()
    {
    	$tira=array();
 		$c = new Criteria();
 		$c->addAscendingOrderByColumn(FcfueprePeer :: CODFUE);
 		$reg = FcfueprePeer::doSelect($c);
 		foreach($reg as $valor)
 		{
 			$tira += array($valor->getCodfue() => $valor->getCodfue()." - ".$valor->getNomfue());
 		}
 		return $tira;

    }
 public function getNomneg(){
         return H::getX_vacio('numlic', 'Fcsollic', 'Nomneg', self::getNumlic());

      }
      public function getRifrep(){
         return H::getX_vacio('NUMLIC', 'Fcsollic', 'rifrep', self::getNumlic());
      }
       public function getRifcon(){
         return H::getX_vacio('NUMLIC', 'Fcsollic', 'rifcon', self::getNumlic());
      }

       public function getNomcon(){
          $rifcon =H::getX_vacio('NUMLIC', 'Fcsollic', 'rifcon', self::getNumlic());
          if($rifcon){
                return H::getX_vacio('RIFCON', 'Fcconrep', 'Nomcon', $rifcon);
          }else{

          return '';}
      }
       public function getDircon(){
          $rifcon =H::getX_vacio('NUMLIC', 'Fcsollic', 'rifcon', self::getNumlic());
          if($rifcon){
                return H::getX_vacio('RIFCON', 'Fcconrep', 'dircon', $rifcon);
          }else{

          return '';

          }

      }
       public function getNaccon(){
          $rifcon =H::getX_vacio('NUMLIC', 'Fcsollic', 'rifcon', self::getNumlic());
          if($rifcon){
                return H::getX_vacio('RIFCON', 'Fcconrep', 'naccon', $rifcon);
          }else{

          return '';

          }

      }
       public function getTipcon(){
          $rifcon =H::getX_vacio('NUMLIC', 'Fcsollic', 'rifcon', self::getNumlic());
          if($rifcon){
                return H::getX_vacio('RIFCON', 'Fcconrep', 'tipcon', $rifcon);
          }else{

          return '';

          }

      }

       public function getNomconrep(){
          $rifrep =H::getX_vacio('NUMLIC', 'Fcsollic', 'rifrep', self::getNumlic());
          if($rifrep){
                return H::getX_vacio('RIFCON', 'Fcconrep', 'Nomcon', $rifrep);
          }else{

          return '';}
      }
       public function getDirconrep(){
          $rifrep =H::getX_vacio('NUMLIC', 'Fcsollic', 'rifrep', self::getNumlic());
          if($rifrep){
                return H::getX_vacio('RIFCON', 'Fcconrep', 'dircon', $rifrep);
          }else{

          return '';

          }

      }
       public function getNacconrep(){
          $rifrep =H::getX_vacio('NUMLIC', 'Fcsollic', 'rifrep', self::getNumlic());
          if($rifrep){
                return H::getX_vacio('RIFCON', 'Fcconrep', 'naccon', $rifrep);
          }else{

          return '';

          }

      }
       public function getTipconrep(){
          $rifrep =H::getX_vacio('NUMLIC', 'Fcsollic', 'rifrep', self::getNumlic());
          if($rifrep){
                return H::getX_vacio('RIFCON', 'Fcconrep', 'tipcon', $rifrep);
          }else{

          return '';

          }

      }
}

