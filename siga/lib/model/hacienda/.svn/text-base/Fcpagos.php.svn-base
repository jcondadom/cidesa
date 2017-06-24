<?php

/**
 * Subclass for representing a row from the 'fcpagos'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcpagos.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcpagos extends BaseFcpagos
{

	public $nomcon='';
	public $dircon='';
	public $naccon='';
	public $tipcon='';
	public $criterio='';
	protected $feccor = '';
	protected $griddetalles=array();
	protected $gridformpag=array();
	protected $gridrecargdescto=array();
	protected $montopag=0;
	protected $saldo='0,00';
	protected $totalmon=0;
	protected $montopagcon=0;
	protected $pagcon='0,00';

	protected $montodeuda='0,00';
	protected $montomora='0,00';
	protected $montodscprntopago='0,00';
        protected $montotdscprntopago='0,00';
	protected $saldo1='0,00';
	protected $montodeuda2='0,00';
        protected $montotmora='0,00';
	protected $montoautliq='0,00';
        protected $montodautliq='0,00';
	protected $saldo2='0,00';
	protected $saldo3='0,00';
	protected $saldo4='0,00';
        protected $saldo5=0;
	protected $recargo='0,00';
        protected $montototalpagar='0,00';
        protected $montotdeuda='0,00';
        protected $totalpag='0,00';
        protected $seleccion='';
        protected $vienededeclaracion=false;
        protected $codfact="";
        protected $porcentaje="";
        protected $descuento= '0,00';
        protected $pagconrec= '0,00';
        protected $saldogen= '0,00';
        protected $fecrec='';
        protected $deudafrac='N';
        protected $totalrecargo='';
        protected $totalformpag='';
        protected $validar='';
        protected $anular='';
        protected $actualizar='';
        protected $opciones='';
        protected $mensaje='';
        protected $nuevonumpag='';
        protected $hab=false;
        protected $fechahora='';
        protected $password='';
        protected $refing='';
        protected $numcom='';
        protected $nrodep='';
        protected $recaudo='N';


	public function hydrate(ResultSet $rs, $startcol = 1) {
		parent :: hydrate($rs, $startcol);

		$this->dircon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'dircon', self :: getRifcon());
		$this->naccon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'naccon', self :: getRifcon());
		$this->nomcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'nomcon', self :: getRifcon());
		$this->tipcon = Herramientas :: getX_vacio('rifcon', 'fcconrep', 'tipcon', self :: getRifcon());
		//$this->fuenteing = Herramientas :: getX_vacio('codfue', 'fcfuepre', 'nomabr', self :: getFueing());
	}

  public function getNomcon()
  {
      if ($this->datosContribuyenteRepresentante("C"))
      {
	    return $this->nomcon;
	  }
  }

	public function getDircon()
	  {
	    if ($this->datosContribuyenteRepresentante("C"))
		  {
		    return $this->dircon;
		  }
	  }

	public function getNaccon()
	  {
	    if ($this->datosContribuyenteRepresentante("C"))
		  {
		    return $this->naccon;
		  }
	  }

	public function getTipcon()
	  {
		if ($this->datosContribuyenteRepresentante("C"))
		  {
		    return $this->tipcon;
		  }
      }


	public function datosContribuyenteRepresentante($tipo)
	  {
	  	  $c = new Criteria;
	  	  $c->add(FcconrepPeer::REPCON,$tipo);
	  	  $c->add(FcconrepPeer::RIFCON,self::getRifcon());
	  	  $this->contribuyente = FcconrepPeer::doSelect($c);
	  	  if ($this->contribuyente)
		  	{
		  		$this->nomcon = $this->contribuyente[0]->getNomcon();
		  		$this->dircon = $this->contribuyente[0]->getDircon();
		  		$this->naccon = $this->contribuyente[0]->getNaccon();
		  	    $this->tipcon = $this->contribuyente[0]->getTipcon();
		  	    return true;
		  	}
		  	else
		  	{
		  		$this->nomcon = 'No encontrado';
		  		$this->dircon = 'No encontrado';
		  		$this->naccon = 'No encontrado';
		  	    $this->tipcon = 'No encontrado';
		  	    return false;
		  	}
	  }

   public function getSaldo1(){
       return H::FormatoMonto(self::getMontodeuda()+self::getMontomora()-self::getMontodscprntopago()) ;
   }
   public function getSaldo2(){
       return H::FormatoMonto(self::getMontodeuda2()-self::getMontoautliq()) ;
   }

   public function getMensaje(){
       $men='';
       if(self::getEdopag()=='V'){
           $men="VALIDADO";
           }else if(self::getEdopag()=='A'){
           $men="ANULADO";
           }else if(self::getEdopag()=='L'){
           $men="LIQUIDADO";
           }
       return $men ;
   }

    public function getFechahora(){
         if(self::getId()==''||self::getEdopag()==''){
             return date('d/m/Y H:i:s');
         }else{
             return date('Y-m-d H:i:s',strtotime(self::getFechorval()));

             }
   }
   public function getFeccor(){
       $fecha='';
       if(self::getId()==''){
           $fecha=date("Y-m-d");
       }else{
           $fecha= self::getFecpag();
       }
       return $fecha ;
   }
   public function getFecpago(){
       $fecha='';
       if(self::getId()==''){
           $fecha=date("Y-m-d");
       }else{
           $fecha= self::getFecpag();
       }
       return $fecha ;
   }
   public function getFecrec(){
       $fecha='';
       if(self::getId()==''||self::getEdopag()==''){
           $fecha=Herramientas::FormatoFecha(date("Y-m-d"));
       }else{
           if(self::getEdopag()=='V'){
           $fecha=Herramientas::FormatoFecha(date("Y-m-d",strtotime(self::getFechorval())));

           }
       }
       return $fecha ;
   }


}
