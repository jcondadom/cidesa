<?php

/**
 * Subclass for representing a row from the 'fapresup'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fapresup.php 61259 2015-03-25 18:11:49Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fapresup extends BaseFapresup
{
	public $obj = array();
  protected $concre = "";
  protected $obj2=array();
  protected $filactrec="";
  protected $totrec="0,00";
  protected $trajo = "";
  protected $obj3=array();
  protected $filactcon="";
  protected $obj4=array();
  protected $fecdes="";
  protected $fechas="";
  protected $grid=array();
  protected $check="0";
  public $objmat=array();
  protected $totmat="0,00";
  public $objequ=array();
  protected $totequ="0,00";
  public $objman=array();
  protected $totman="0,00";
  protected $totapu="0,00";
  protected $totgasadmin="0,00";
  protected $totuti="0,00";
  protected $totpreuni="0,00";
  protected $filactapu="";
  protected $totcarfab="0,00";
  protected $totser="0,00";
  public $objser=array();

    public function getRifpro()
    {
        return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodcli());
    }

    public function getNompro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodcli());
    }

    public function getDirpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodcli());
    }

    public function getTelpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodcli());
    }

    public function getTipcte()
    {
  	    $fatipcte_id = Herramientas::getX('CODPRO','Facliente','Fatipcte_id',self::getCodcli());
            return H::getX('id', 'Fatipcte', 'nomtipcte', $fatipcte_id);
    }

    public function getCodtipcli()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Fatipcte_id',self::getCodcli());
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
            $this->modifiedColumns[] = FapresupPeer::VALMON;
          }  
    } 

    public function getDesdirec()
    {
        return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
    } 

    public function TienePedFac(){
      $tiene='N';
      
      $q= new Criteria();
      $q->add(FapedidoPeer::REFPED,self::getRefpre());
      $q->add(FapedidoPeer::TIPREF,'PR');
      $resulq= FapedidoPeer::doSelectOne($q);
      if ($resulq)
        $tiene='S';
      else{
        $a= new Criteria();
        $a->add(FafacturPeer::TIPREF,'E');
        $a->add(FaartfacPeer::CODREF,self::getRefpre());
        $a->addJoin(FaartfacPeer::REFFAC,FafacturPeer::REFFAC);
        $resula= FaartfacPeer::doSelectOne($a);
        if ($resula)
          $tiene='S';
      }
      return $tiene;
    }

    public function getManunialt()
    {
      return H::getConfApp2('manunialt', 'compras', 'almregart');
    }

  public function getMonpre($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getTipmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monpre/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monpre;
    }else $calculo=$this->monpre;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

  public function getMondesc($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getTipmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->mondesc/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->mondesc;
    }else $calculo=$this->mondesc;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
  public function getMonrgo($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getTipmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monrgo/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monrgo;
    }else $calculo=$this->monrgo;
    
    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }    

  public function setMonpre($v)
  {

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONPRE;
      }
  
  } 
  
  public function setMondesc($v)
  {

    if ($this->mondesc !== $v) {
        $this->mondesc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONDESC;
      }
  
  } 
  
  public function setMonrgo($v)
  {

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FapresupPeer::MONRGO;
      }
  
  } 

  public function getNomemb()
  {
      return H::getX_vacio('CODEMB','Faembarca','Nomemb',self::getCodemb());
  }

  public function getTipemb()
  {
      $tipo=H::getX_vacio('CODEMB','Faembarca','Tipemb',self::getCodemb());
      if ($tipo=='U')
        return "Pública";
      elseif ($tipo=='V')
        return "Privada";
      else
        return "";
  }

  public function getProemb()
  {
      return H::getX_vacio('CODEMB','Faembarca','Proemb',self::getCodemb());
  }

  public function getEslora()
  {
      return H::getX_vacio('CODEMB','Faembarca','Eslora',self::getCodemb());
  }

  public function getManga()
  {
      return H::getX_vacio('CODEMB','Faembarca','Manga',self::getCodemb());
  }

  public function getPuntal()
  {
      return H::getX_vacio('CODEMB','Faembarca','Puntal',self::getCodemb());
  }

  public function getCalado()
  {
      return H::getX_vacio('CODEMB','Faembarca','Calado',self::getCodemb());
  }

  public function getSigimo()
  {
      return H::getX_vacio('CODEMB','Faembarca','Sigimo',self::getCodemb());
  }

  public function getPeso()
  {
      return H::FormatoMonto(H::getX_vacio('CODEMB','Faembarca','Peso',self::getCodemb())).' TN';
  }

  public function getDesgru()
    {
        return H::getX_vacio('CODGRU','Fadefgru','Desgru',self::getCodgru());
    }

  public function getManapu()
  {
    return H::getConfApp2('anaprecio', 'facturacion', 'fapresup');
  }    

  public function getNomreppre(){
    $nomrep="";
    $faco=FacorrelatPeer::doSelectOne(new Criteria());
    if ($faco)
      $nomrep=$faco->getNomreppre();
    return $nomrep;
  }

      public function getNomper()
    {
        return H::getX_vacio('ID','Facliper','Nomper',self::getFacliperId());
    }

    public function getDirper()
    {
        return H::getX_vacio('ID','Facliper','Dirper',self::getFacliperId());
    }

    public function getTelper()
    {
        return H::getX_vacio('ID','Facliper','Telper',self::getFacliperId());
    }

    public function getDessed()
    {
        return H::getX_vacio('CODSED','Fadefsed','Dessed',self::getCodsed());
    }

  public function getPorgasadm(){
    $faco=FacorrelatPeer::doSelectOne(new Criteria());
    if ($faco)
      return $faco->getPorgasadm();
    return 0;
  }

  public function getPorutilid(){
    $faco=FacorrelatPeer::doSelectOne(new Criteria());
    if ($faco)
      return $faco->getPorutilid();
    return 0;
  }

  public function getPorcarfab(){
    $faco=FacorrelatPeer::doSelectOne(new Criteria());
    if ($faco)
      return $faco->getPorcarfab();
    return 0;
  }

  public function getNomcue()
  {
    return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',$this->getNumcue());
  }

}
