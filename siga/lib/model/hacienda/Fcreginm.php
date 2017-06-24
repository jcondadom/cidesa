<?php
/**
 * Subclass for representing a row from the 'fcreginm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcreginm.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcreginm extends BaseFcreginm
{
    protected $nacconcon="";
    protected $tipconcon="";
    protected $nacconrep="";
    protected $tipconrep="";
    protected $codusoinm="";
    protected $dirconcon="";
    protected $dirconrep="";
    protected $nomconrep="";
    /*Dueño anterior*/
    protected $rifpre="";
    protected $fcconreprifcon="";
    protected $fcconrepdircon="";
    protected $fcconrepnomcon="";
    /* otros */
    protected $mascara= "";
    protected $grid= array();
    protected $gridcomplemento= array();
    protected $codestinm="";
    protected $desestinm="";
    protected $anoava="";
    protected $deszon="";
    protected $totalavaluo="";
    protected $valntr="";
    protected $rifconant="";
    protected $rifrepant="";
    protected $nomconant="";
    protected $nomrepant="";
    protected $traspaso="";
    protected $numtra="";
    protected $funrectra="";
    protected $idtra="";
    protected $codzon="";
    protected $antiguedad="";
    protected $nomcon="";
    protected $stacarinm="";
    protected $check= "0";
    protected $codtip="";
    protected $formatostring= "";
    protected $nroinmnew="";



    public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $cr = new Criteria();
      $cr->add(FcdetinmPeer::NROINM,self::getNroinm());
      $cr->setLimit(1);
      $regis = FcdetinmPeer::doSelectOne($cr);
      if (count($regis)>0)
      {
         $this->codestinm=$regis->getCodest();
         $this->desestinm = Herramientas::getX_vacio('codestinm','fcestinm','desestinm',$regis->getCodest());
         $this->anoava    = $regis->getAnoava();
         $this->codzon    =  $regis->getCodzon();

      }

      $this->mensaje = self::getEstinm()=='D' ? 'DESINCORPORADO' : '' ;

      $c = new Criteria();
      $c->add(FctrainmPeer::NROINM,self::getNroinm());
      $reg = FctrainmPeer::doSelectOne($c);
      if ($reg)
      {

         $this->rifpre=$reg->getRifcon();
         $this->fcconreprifcon=$reg->getRifcon();
         $this->fcconrepnomcon= Herramientas::getX_vacio('rifcon','fcconrep','nomcon',$reg->getRifconant());
         $this->fcconrepdircon=Herramientas::getX_vacio('rifcon','fcconrep','dircon',$reg->getRifconant());
         $this->idtra =$reg->getId();
         $this->numtra   = $reg->getNumtra();
         $this->fectra    = $reg->getFectra();
         $this->funrectra = $reg->getFunrec();
         $this->rifconant = $reg->getRifconant();
         $this->nomconant = Herramientas::getX_vacio('rifcon','fcconrep','nomcon',$reg->getRifconant());
         $this->rifrepant = $reg->getRifrepant();
         $this->nomrepant = Herramientas::getX_vacio('rifcon','fcconrep','nomcon',$reg->getRifrepant());
         $this->traspaso ='S';

      }

   }


    public function getCatcon()
    {
      return self::getCodcatinm();
    }

    public function getNomcatrasto()
    {
  	  return self::getNomcon();
    }

	/*public function getNacconcon()
	{
		return Herramientas::getX_vacio('rifcon','Fcconrep','naccon',self::getRifcon());
	}

	public function getTipconcon()
	{
		return Herramientas::getX_vacio('rifcon','Fcconrep','tipcon',self::getRifcon());
	}
       public function getDirconcon()
	{
		return Herramientas::getX_vacio('rifcon','Fcconrep','dircon',self::getRifcon());
	}

	public function getNacconrep()
	{
		return Herramientas::getX_vacio('rifcon','Fcconrep','naccon',self::getRifrep());
	}

	public function getTipconrep()
	{
		return Herramientas::getX_vacio('rifcon','Fcconrep','tipcon',self::getRifrep());
	}

        public function getDirconrep()
	{
		return Herramientas::getX_vacio('rifcon','Fcconrep','dircon',self::getRifrep());
	}*/

	public function getDesubicat()
	{
		return Herramientas::getX_vacio('codcatinm','fcreginm','nomcon',self::getCodcatinm());
	}

	public function getNomcatfis()
	{
		return Herramientas::getX_vacio('codcatfis','fccatfis','nomcatfis',self::getCodcatfis());
	}

	public function getNomcarinm()
	{
		return Herramientas::getX_vacio('Codcarinm','fccarinm','nomcarinm',self::getCodcarinm());
	}

	public function getDeszon()
	{
		return Herramientas::getX_vacio('Codzon','fcvalinm','deszon',Herramientas::getX_vacio('Nroinm','fcdetinm','codzon',self::getNroinm()));
	}


	public function getNomusoinm()
	{
		return Herramientas::getX_vacio('codusoinm','Fcusoinm','nomusoinm',self::getCoduso());
	}

	public function getNomsitinm()
	{
		return Herramientas::getX_vacio('codsitinm','fcsitjurinm','nomsitinm',self::getCodsitinm());
	}

	/*public function getNomconrep()
	{
		return Herramientas::getX_vacio('rifcon','fcconrep','nomcon',self::getRifrep());
	}*/
          public function getTotalavaluo()
	{
                 return H::FormatoMonto(self::getBscon()+self::getBster());

	}
        /*public function getNomcon()
	{
		return Herramientas::getX_vacio('rifcon','Fcconrep','nomcon',self::getRifcon());
	}*/

        public function getCodtip()
        {
          if($this->codtip=='') return Herramientas::getX_vacio('nroinm','Fcdetinm','codtip',self::getNroinm());
          else return $this->codtip;
        }
        
        public function afterHydrate() {
            $p= new Criteria();
            $p->add(FcconrepPeer::RIFCON,  $this->rifcon);
            $resultado= FcconrepPeer::doSelectOne($p);
            if ($resultado)
            {
                $this->nomcon=$resultado->getNomcon();
                $this->dirconcon=$resultado->getDircon();
                $this->nacconcon=$resultado->getNaccon();
                $this->tipconcon=$resultado->getTipcon();
            }
            
            $l= new Criteria();
            $l->add(FcconrepPeer::RIFCON,  $this->rifrep);
            $resultado2= FcconrepPeer::doSelectOne($l);
            if ($resultado2)
            {
                $this->nomconrep=$resultado2->getNomcon();
                $this->dirconrep=$resultado2->getDircon();
                $this->nacconrep=$resultado2->getNaccon();
                $this->tipconrep=$resultado2->getTipcon();
            }
        }

}

