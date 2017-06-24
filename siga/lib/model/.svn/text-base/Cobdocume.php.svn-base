<?php

/**
 * Subclass for representing a row from the 'cobdocume'.
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
class Cobdocume extends BaseCobdocume
{
	protected $rifpro="";
	protected $nompro="";
	protected $objrecargos=array();
	protected $objdescuentos=array();
	protected $montotal="0,00";
	protected $montotalformato="0,00";
	protected $monpagado="0,00";
	protected $monpag=0;
	protected $monrec=0;
	protected $mondsc=0;
	protected $recargos="";
	protected $descuentos="";
	protected $marca="";
	protected $codctacli="";
	protected $totalcomprobantes=0;
  protected $refcomcon="";
  protected $antdeu="";
  protected $monant="0,00";
  protected $monret="0,00";
  protected $nroant="";
  protected $fecant2="";
  protected $desant="";
  protected $totant="0,00";
  protected $resant="0,00";
  protected $monamo="0,00";
  protected $salabo="0,00";
  protected $check=false;

  protected $recargos2="";
  protected $descuentos2="";
  protected $saldocnc=0;
  protected $basimp="0,00";
  protected $saldocnd=0;

  public function afterHydrate()
  {
    $c=new Criteria();
	$c->add(FaclientePeer::CODPRO,self::getCodcli());
	$cliente = FaclientePeer::doSelectOne($c);
    if($cliente)
    {
    	$this->rifpro=$cliente->getRifpro();
    	$this->nompro=$cliente->getNompro();
    }
    if (self::getReffac())
    {
        $sql="select codref as nroped from faartfac where reffac='".self::getReffac()."' group by codref";
        if (Herramientas::BuscarDatos($sql,$result))
        {
            $l=0;
            $acummonant=0;
            while ($l<count($result))
            {
                $c= new Criteria();
                $c->add(FadetantPeer::NROPED,$result[$l]["nroped"]);
                $regis= FadetantPeer::doSelectOne($c);
                if ($regis)
                {
                    $acummonant= $acummonant+ $regis->getMonant();
                }
                $l++;
            }
            
            $this->monant=$acummonant;
        }            
    }
    
    
    $this->montotal= self::getMondoc() + self::getRecdoc() - self::getDscdoc();
    $this->monpagado=self::getAbodoc();//number_format(self::getAbodoc(),2,',','.');
    $this->montotalformato=$this->montotal;//number_format($this->montotal,2,',','.');
    $this->basimp= H::FormatoMonto(self::getMondoc() - self::getMonexo());
    

  }

	public function getFatipmovdeb()
	{
		$resp=array();
		$c=new Criteria();
		$c->add(FatipmovPeer::DEBCRE,"D");
        $datos= FatipmovPeer::doSelect($c);
		 if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getId()] = $reg->getDesmov();
	        }
       }

       $regp=FacorrelatPeer::doSelectOne(new  Criteria());
       if ($regp){
        if ($regp->getFatipmovId()!='')
          $resp[$regp->getFatipmovId()] = H::getX_vacio('ID','Fatipmov','Desmov',$regp->getFatipmovId());
       }
		return $resp;
	}

	public function getRecargos()
	{
		$resp=array();
		$c=new Criteria();
        $datos= CarecargPeer::doSelect($c);
        if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getCodRgo()] = $reg->getCodRgo()." - ".$reg->getNomrgo();
	        }
       }
		return $resp;
	}

	public function getDescuentos()
	{
		$resp=array();
		$c=new Criteria();
        $datos= FadesctoPeer::doSelect($c);
        if($datos){
	      	foreach($datos as $reg)
	      	{
	        	$resp[$reg->getCoddesc()] = $reg->getCoddesc()." - ".$reg->getDesdesc();
	        }
       }
	  return $resp;
	}

   public function getRefcomcon()
   {
     return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
    }
	
  public function getMonpag($val=false)
  {
    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
   public function setMonpag($val)
   {
     $this->monpag = $val;
   }	
   
  public function getMondsc($val=false)
  {
    if($val) return number_format($this->mondsc,2,',','.');
    else return $this->mondsc;

  }
  
   public function setMondsc($val)
   {
     $this->mondsc = $val;
   }
   
  public function getMonrec($val=false)
  {
    if($val) return number_format($this->monrec,2,',','.');
    else return $this->monrec;

  }
  
   public function setMonrec($val)
   {
     $this->monrec = $val;
   }   	   
   
  public function getMontotal($val=false)
  {
    if($val) return number_format($this->montotal,2,',','.');
    //else return $this->montotal;

  }
  
   public function setMontotal($val)
   {
     $this->montotal = $val;
   }     
   
  public function getMonpagado($val=false)
  {
    if($val) return number_format($this->monpagado,2,',','.');
    //else return $this->monpagado;

  }
  
   public function setMonpagado($val)
   {
     $this->monpagado = $val;
   }   
   
  public function getMontotalformato($val=false)
  {
    if($val) return number_format($this->montotalformato,2,',','.');
   // else return $this->montotalformato;

  }
  
   public function setMontotalformato($val)
   {
     $this->montotalformato = $val;
   }

   public function getAntdeu()
    {
       if (self::getId()) {
           $fecha=date('d/m/Y',strtotime(self::getFecven()));
           $cad=Nomina::obtenerAntiguedad($fecha);
       }
       else
           $cad="0 AÃ±os, 0 Meses, 0 DÃ­as";
    return $cad;
    }

  public function setAntdeu()
  {
  	return $this->antdeu;
  }

  public function getDesdirec()
  {
      return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }  

}
