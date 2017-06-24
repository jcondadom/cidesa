<?php

/**
 * Subclass for representing a row from the 'caordcom'.
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
class Caordcom extends BaseCaordcom
{
    private $rifpro ='';
    private $codconpag ='';
    private $codforent ='';
    protected $codigoproveedor='';
    protected $reptipcom='';
    protected $genctaord=null;
    protected $totrecargo="0,0000";
    protected $totorden="0,000000";
    protected $genctaalc="";
    private $eti="";
    protected $tipopro="";
    protected $compro="";
    protected $oculsave="";
    protected $manorddon="";
    protected $traemot="";
    protected $objsc=array();
    protected $obj=array();
    protected $obj2=array();
    protected $obj3=array();
    protected $obj4=array();
    protected $obj5=array();
    protected $obj6=array();
    protected $obj7=array();
    protected $tipdes="";
    protected $lotori="";
    protected $desconpag="";
    protected $totrecar="0,00";
    protected $oculeli="";
    protected  $fechaanuserv="";
    protected  $marque="";
    protected  $check="";
    protected $ordcomdes="";
    protected $ordcomhas="";
    protected $fecdes="";
    protected $fechas="";
    protected $aprobar=false;
    protected $rechazar=false;
    protected $ordcomvie="";
    protected $finpre="";


    public function getReptipcom()
    {
      $rep = Constantes::ListaReportesOrdenCompras();
      //print $this->tipord;
      if(array_key_exists($this->tipord,$rep)) return $rep[$this->tipord];
      else return 'carordpre.php';
    }
    protected $partrec="";

      public function getNompro()
    {
      return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
    }

public function getMonord($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getTipmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monord/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monord;
    }else $calculo=$this->monord;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function setMonord($v)
    {
        if ($this->monord !== $v) {
            $this->monord = Herramientas::toFloat($v);
            $this->modifiedColumns[] = CaordcomPeer::MONORD;
          }
    } 

   public function getCodconpag()//Condición de pago
    {
      /*if (self::getId() && $this->codconpag=='')
        return Herramientas::getX_vacio('ordcom','Caordconpag','codconpag',self::getOrdcom());
      else
        return $this->codconpag;*/

      if (self::getConpag()!='')
        return $this->codconpag=self::getConpag();
      else
        return $this->codconpag;

    }


      public function getDesconpag()//Condición de pago
    {
     /* if (self::getId())
      {
        $c = new Criteria();
      $c->add(CaordconpagPeer::ORDCOM,self::getOrdcom());
      $c->addJoin(CaconpagPeer::CODCONPAG,CaordconpagPeer::CODCONPAG);
      $des = CaconpagPeer::doSelectone($c);
      if ($des){
        return $des->getDesconpag();
      }else{
        return ' ';
      }
      }
      else
      {*/
        $c = new Criteria();
      if ($this->codconpag!='') 
        $c->add(CaconpagPeer::CODCONPAG,$this->codconpag);
      else
        $c->add(CaconpagPeer::CODCONPAG,$this->conpag);
      $des = CaconpagPeer::doSelectone($c);
      if ($des){
        return $des->getDesconpag();
      }else{
        return ' ';
      }
      //}
    }


    public function getNomext()
    {
      return Herramientas::getX('tipcom','CpDocCom','nomext',self::getDoccom());
    }



    public function getDespro()
    {
      $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
      if ($catprofor=='S')
        return Herramientas::getX('CODPRO','Fordefpry','Nompro',self::getTippro());
      else
        return Herramientas::getX('CODPRO','Catippro','Despro',self::getTippro());
    }

    public function getCodforent()
    {
      /*if (self::getId() && $this->codforent=='')
        return Herramientas::getX_vacio('ORDCOM','caordforent','Codforent',self::getOrdcom());
      else
        return $this->codforent;*/
      if (self::getForent()!='')
        return $this->codforent=self::getForent();
      else
        return $this->codforent;
    }

    public function getDesforent()
    {
      /*if (self::getId())
        return Herramientas::getX('codforent','caforent','Desforent',Herramientas::getX_vacio('ORDCOM','caordforent','Codforent',self::getOrdcom()));
      else {*/
        if ($this->codforent!='')
          return Herramientas::getX('codforent','caforent','Desforent',$this->codforent);
        else
          return Herramientas::getX('codforent','caforent','Desforent',$this->forent);
      //}
        
    }

    public function getNomfin()
    {
      return Herramientas::getX('codfin','ForTipFin','Nomext',self::getTipfin());
    }
    public function getDesubi()
    {
      return Herramientas::getX('codubi','bnubica','desubi',self::getCoduni());
    }
    public function getNomemp()
    {
      return Herramientas::getX('codemp','nphojint','nomemp',self::getCodemp());
    }
    public function getRefer()
    {
      return Herramientas::getX('refcom','CPCompro','RefPrc',self::getOrdcom());
    }

    public function getRifpro()
    {
    return Herramientas::getX_vacio('codpro','caprovee','rifpro',self::getCodpro());
    }

    public function getRifpro_()
    {
    return $this->rifpro;
    }

    public function setRifpro($val)
    {
      $this->rifpro = $val;
    }

    public function setCodconpag($val)
    {
      $this->codconpag = $val;
    }

   public function setCodforent($val)
    {
      $this->codforent = $val;
    }

    public function AfectaDisponibilidad()
    {
      $refiere = Herramientas::getX('tipcom','CPdoccom','afedis',self::getDoccom());
      if($refiere=='R') return true;
      else return false;
    }


    public function getGenctaord()
    {
      $d= new Criteria();
      $data=OpdefempPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getGenctaord();
      }else $si=null;
      return $si;
    }

    public function getGencomalc()
    {
      $d= new Criteria();
      $data=OpdefempPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getGencomalc();
      }else $si=null;
      return $si;
    }

    public function getEti()
    {
     if (self::getId())
     {
     if (self::getOrdcom()!="")
     {
      if (self::getStaord()=='N')
      {
      	$si="Anulada el ".date('d/m/Y',strtotime(self::getFecanu()));
      }else{
        $c= new Criteria();
        $c->add(CpimpcauPeer::REFERE,self::getOrdcom());
        $c->add(CpimpcauPeer::STAIMP,'N',Criteria::NOT_EQUAL);
        $data= CpimpcauPeer::doSelectOne($c);
        if ($data)
        {
          $d= new Criteria();
          $d->add(OpordchePeer::NUMORD,$data->getNumord());
          $reg= OpordchePeer::doSelectOne($d);
          if ($reg)
          {
          	$fecha=H::getX('NUMCHE','Tscheemi','fecemi',$reg->getNumche());
          	$si="Pagada con el N° de Cheque: ".$reg->getNumche()." el ".date('d/m/Y',strtotime($fecha));
          }else{
          	$fecha=H::getX('refcau','cpcausad','feccau',$data->getRefcau());
          	$si="Causada con N° de Orden ".$data->getRefcau()." el ".date('d/m/Y',strtotime($fecha));
          }
        }else {
          $cq= new Criteria();
          $cq->add(CpcomproPeer::REFCOM,self::getOrdcom());
          $cq->add(CpcomproPeer::STACOM,'A');
          $dataq= CpcomproPeer::doSelectOne($cq);
          if ($dataq)
            $si="Pendiente por Causar";
          else
            $si="Pendiente por Comprometer";
        }
      }
     }else { $si="";}
     }else { $si="";}

   return $si;
    }


  public function getCompro()
  {
  	  $d= new Criteria();
  	  $d->add(CpcomproPeer::REFCOM,self::getOrdcom());
  	  $resul= CpcomproPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	return 'S';
  	  }else return 'N';
  }

  public function setCompro()
  {
  	return $this->compro;
  }

  public function getOculsave()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almordcom',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('oculsave',$varemp['aplicacion']['compras']['modulos']['almordcom']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almordcom']['oculsave'];
	       }
         }
     return $dato;
  }

  public function setOculsave()
  {
  	return $this->oculsave;
  }

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

  public function getDescenaco()
  {
	return Herramientas::getX('CODCENACO','Cadefcenaco','Descenaco',self::getCodcenaco());
  }

    public function getEdaact()
  {
  	if (self::getFecdon())
  	{
		$sql = "select  Extract(year from age(now(),'" . self::getFecdon() . "')) as edad";
		if (Herramientas :: BuscarDatos($sql, $result))
			return $result[0]['edad'];
		else
		    return self::getEdadon();
  	}
  	else
  	    return 0;
  }

  public function getManorddon()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almdefart',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('manorddon',$varemp['aplicacion']['compras']['modulos']['almdefart']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almdefart']['manorddon'];
	       }
         }
     return $dato;
  }

  public function setManorddon()
  {
  	return $this->manorddon;
  }

  public function getTraemot()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almordcom',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('traemot',$varemp['aplicacion']['compras']['modulos']['almordcom']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almordcom']['traemot'];
	       }
         }
     return $dato;
  }

  public function setTraemot()
  {
  	return $this->traemot;
  }

  public function getManunialt()
  {
    return H::getConfApp2('manunialt', 'compras', 'almregart');
  }
  public function getClaartdes()
  {
    return H::getConfApp2('claartdes', 'compras', 'almsolegr');
  }
  
    public function getCadenafec() {
  $format = 'd/m/Y';
        return parent::getFecord($format);
}

  public function getManpda()
  {
    return H::getConfApp2('manpda', 'compras', 'almordcom');
  }
  
   public function getValmon($val=false)
  {

    if($val) return number_format($this->valmon,6,',','.');
    else return $this->valmon;

  }
  
    public function setValmon($v)
    {

        if ($this->valmon !== $v) {
            $this->valmon = Herramientas::toFloat($v,6);
            $this->modifiedColumns[] = CaordcomPeer::VALMON;
          }  
    } 
  public function getTienedirdiv()
  {
    return H::getConfApp2('tiedirdiv', 'compras', 'almsolegr');
  }

   public function getDesdirec()
  {
      return Herramientas::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }

    public function getDesdivi()
  {
      return Herramientas::getX('CODDIVI','cadefdivi','Desdivi',self::getCoddivi());
  }

    public function getNomreporte()
  {
      $reppreimpsc=H::getX_vacio('Codemp','Cadefart','Reppreimpoc','001');
      return $reppreimpsc;
  }

  public function getDeseve()
  {
    return Herramientas::getX('CODEVE','Cpevepre','Deseve',self::getCodeve());
  }

      public function getNomdoc()
    {
      return Herramientas::getX('tipcom','CpDocCom','nomext',self::getDoccom());
    }

  public function getComproaprob()
  {
      $d= new Criteria();
      $d->add(CpcomproPeer::REFCOM,self::getOrdcom());
      $resul= CpcomproPeer::doSelectOne($d);
      if ($resul)
      {
        if ($resul->getAprcom()=='S')
          return 'S';
        else
          return 'N';
      }else return 'N';
  }

  public function getAprobacion(){
    $aprobacion = 'N';
    $c = new Criteria();
    $cadefart_search = CadefartPeer::doSelectOne($c);
    if ($cadefart_search) {
      if (($cadefart_search->getComasopre() == 'S') and ($cadefart_search->getComreqapr() == 'S'))
        $aprobacion = 'S';
      else
        $aprobacion = 'N';
    }

    return $aprobacion;
  }  

  public function getNomprovee(){
    return self::getRifpro().' - '.self::getNompro();
  } 

  public function getGencompre()
  {
    return H::getConfApp2('gencompre', 'compras', 'almordcom');
  }   

  public function getMonord2()
  {
    $calculo=$this->monord;
     return number_format($calculo,2,',','.');
  }

  public function getNumfilas(){
    if (self::getId()){
      $q= new Criteria();
      $q->add(CaartordPeer::ORDCOM,self::getOrdcom());
      $req= CaartordPeer::doSelect($q);
      return count($req);
    }else return 150;
  }

  public function getDesgar()
  {
    return Herramientas::getX('CODGAR','Cadefgar','Desgar',self::getCodgar());
  }

    public function getTipordletra()
  {
    switch (self::getTipord()){
      case 'C':
      return 'Compra';
      case 'S':
       return 'Servicio';
      case 'M':
       return 'Mixto';
      case 'T':
        return 'Contratación';
      case 'G':
        return 'Servicios Generales';
      case 'A':
        return 'Mantenimiento';
    }
  }

  public function getFinpre()
  {
    return H::getConfApp2('finpre', 'compras', 'almsolegr');
  }   

}
