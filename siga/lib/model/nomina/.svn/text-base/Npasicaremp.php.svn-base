<?php

/**
 * Subclase para representar una fila de la tabla 'npasicaremp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npasicaremp.php 40791 2010-09-28 17:14:22Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npasicaremp extends BaseNpasicaremp
{
	private $codcon = '';
    private $nivel = '';
	protected $codnomnew="";
	protected $codcarnew="";
	protected $codcatnew="";
    protected $nomnomnew="";
	protected $nomcarnew="";
	protected $nomcatnew="";
	protected $fecing=null;
    protected $codtipcar="";
    protected $mancencos="";
    protected $check = 0;
    protected $codmot = '';
    protected $frecal="";
    protected $suedo="";
    protected $filvac="";
    protected $explab="";
    protected $varforma="";
    protected $vartiempo="";
    protected $varcodcar="";
    protected $tiene_dedicacion="";
    protected $obj=array();
    protected $codniv2="";
    protected $tiptel="";
    protected $pan="";
    protected $motbaj="";
    protected $tipreg="";
    protected $montra="0,00";
    protected $codniv2new="";
    protected $codtipempnew="";
    protected $numpta="";



	public function getCodcon()
	{
		$c = new Criteria();
		$c->add(NpasiconempPeer::CODEMP,self::getCodemp());
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$codigo = NpasiconempPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getCodcon();
		}else{
			return ' ';
		}
	}

  public function getNomemp()
  {
    $c = new Criteria();
    $c->add(NphojintPeer::CODEMP,self::getCodemp());
    $nomemp = NphojintPeer::doSelectone($c);
    if ($nomemp)
    return $nomemp->getNomemp();
    else
    return ' ';
  }

	public function getNomcon()
	{
		$c = new Criteria();
		$c->add(NpasiconempPeer::CODEMP,self::getCodemp());
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$codigo = NpasiconempPeer::doSelectone($c);
		if ($codigo){
			return $codigo->getNomcon();
		}else{
			return ' ';
		}
	}


	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,self::getCodnom());
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomnom();
		}else{
			return ' ';
		}
	}
	public function getDestipgas()
	{
		$c = new Criteria();
		$c->add(NptipgasPeer::CODTIPGAS,self::getCodtipgas());
		$destipgas = NptipgasPeer::doSelectone($c);
		if ($destipgas){
			return $destipgas->getDestipgas();
		}else{
			return ' ';
		}
	}
	public function getDespaso()
	{
		$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,self::getCodcar());
		$c->add(NpcomocpPeer::CODTIPCAR,NpcargosPeer::CODTIP);
		$c->add(NpcomocpPeer::GRACAR,NpcargosPeer::GRAOCP);
		$suecar = NpcomOcpPeer::doSelectone($c);
		if ($suecar){
			return $suecar->getSuecar();
		}else{
			return ' ';
		}
	}

  public function getCedemp()
    {
       $c = new Criteria();
       $c->add(NphojintPeer::CODEMP,self::getCodemp());
       $cedu = NphojintPeer::doSelectone($c);
    	if ($cedu)
    	      	  return $cedu->getCedemp();
     }

 public function getModces()
    {
       $c = new Criteria();
       $c->add(NphojintPeer::CODEMP,self::getCodemp());
       $coden = NphojintPeer::doSelectone($c);
         	if ($coden)
    	  	   {
                  return $coden->getModpagcestic();
    	       }

    }

  public function getNomnomnew()
 {
        $c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,$this->getCodnomnew());
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomnom();
		}else{
			return ' ';
		}
 }

  public function getNomcarnew()
  {
        $c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,$this->getCodcarnew());
		$nomnom = NpcargosPeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomcar();
		}else{
			return ' ';
		}
  }

  public function getNomcatnew()
  {
        $c = new Criteria();
		$c->add(NpcatprePeer::CODCAT,$this->getCodcatnew());
		$nomnom = NpcatprePeer::doSelectone($c);
		if ($nomnom){
			return $nomnom->getNomcat();
		}else{
			return ' ';
		}
  }
  public function getFecing()
  {
  	return date('d/m/Y',strtotime(H::Getx('Codemp','Nphojint','Fecing',self::getCodemp())));
  }

  public function getCodtipcar()
    {
    	$codtipcar=H::getX_vacio('Codcar','Npcargos','codtip',self::getCodcar());
        return $codtipcar;
    }

    public function getEsdocente()
    {
      
        return H::getX_vacio('Codtipcar','Nptipcar','docsn',self::getCodtipcar());
    }

  public function getSueldocar()
    {
    	if (self::getCodtipded()!='' && self::getCodtipcat()!='')
    	{
          $q= new Criteria();
	        $q->add(NpcomocpPeer::CODTIPCAR,self::getCodtipcar());
	        $q->add(NpcomocpPeer::PASCAR,self::getCodtipded());
	        $q->add(NpcomocpPeer::GRACAR,self::getCodtipcat());
	        $q->addDescendingOrderByColumn(NpcomocpPeer::FECDES);
	        $reg= NpcomocpPeer::doSelectOne($q);
	        if ($reg)
	        {
	           return H::FormatoMonto($reg->getSuecar());
	        }else return '0,00';
    	}else {
          $q= new Criteria();
          $q->add(NpcomocpPeer::CODTIPCAR,self::getCodtipcar());
          $q->add(NpcomocpPeer::PASCAR,self::getPaso());
          $q->add(NpcomocpPeer::GRACAR,self::getGrado());
          $q->addDescendingOrderByColumn(NpcomocpPeer::FECDES);
          $reg= NpcomocpPeer::doSelectOne($q);
          if ($reg)
          {
             return H::FormatoMonto($reg->getSuecar());
          }else {
            return H::FormatoMonto(H::getX_vacio('Codcar','Npcargos','Suecar',self::getCodcar()));
        }
      }
    }    

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

  public function getMancencos()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('nomina',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
	     if(array_key_exists('nomasicarconnom',$varemp['aplicacion']['nomina']['modulos'])){
	       if(array_key_exists('mancencos',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
	       {
	       	$dato=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['mancencos'];
	       }
         }
     return $dato;
  }

  public function setMancencos()
  {
  	return $this->mancencos;
  }
  public function getNivel()
  {
         $codniv = H::GetX('Codemp','Nphojint','Codniv',$this->codemp);
         $nomniv = H::GetX('Codniv','Npestorg','Desniv',$codniv);
         return $codniv.'  '.$nomniv;
  }
    
  public function getTieneDedicacion()
  {
	return Herramientas::getConfApp2('tieded', 'nomina', 'nomasicarconnom');
  }

  public function getFilvac()
  {
	return Herramientas::getConfApp2('filvac', 'nomina', 'nomasicarconnom');
  }

  public function getVarforma()
  {
	return Herramientas::getConfApp2('varforma', 'nomina', 'nomasicarconnom');
  }

  public function getVartiempo()
  {
	return Herramientas::getConfApp2('vartiempo', 'nomina', 'nomasicarconnom');
  }

  public function getVarcodcar()
  {
	return Herramientas::getConfApp2('codcar', 'nomina', 'nomasicarconnom');
  }

  public function getDesttrab()
  {
	return Herramientas::getX_vacio('CODTTRAB','Npdefttrab','Desttrab',self::getCodttrab());
  }

  public function getFrecal()
  {
	return Herramientas::getX_vacio('CODNOM','Npnomina','Frecal',self::getCodnom());
  }

  public function getCodniv2()
  {
	return Herramientas::getX_vacio('CODEMP','Nphojint','Codniv',self::getCodemp());
  }

  public function getDesniv()
  {
	return Herramientas::getX_vacio('CODNIV','Npestorg','Desniv',self::getCodniv2());
  } 

    public function getDestipcar()
    {    	
    	$destipcar=H::getX_vacio('Codtipcar','Nptipcar','destipcar',self::getCodtipcar());
        return $destipcar;
    }

       public function getDeseve()
  {
    return H::getX_vacio('CODEVE','Cpevepre','Deseve',self::getCodeve());
  } 

    public function getDestipemp()
  {
  return Herramientas::getX_vacio('CODTIPEMP','Nptipemp','Destipemp',self::getCodtipemp());
  }
}
