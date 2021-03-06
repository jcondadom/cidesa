<?php

/**
 * Subclass for representing a row from the 'tscheemi'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Tscheemi.php 61955 2015-05-08 14:28:56Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Tscheemi extends BaseTscheemi
{
	protected $tippagordpag="";
	protected $descriordpag="";
	protected $montotordpag="0,00";

	protected $montotcompro="0,00";

	protected $montotprecom="0,00";

	protected $conceppagnap="";
	protected $montotpagnap="0,00";
	protected $mondtopagnap="0,00";
	protected $condtopagnap="";
	protected $totnetpagnap="0,00";

	protected $conceppagdir="";
	protected $totnetpagdir="0,00";
	protected $mondtopagdir="0,00";
	protected $condtopagdir="";

	protected $operacion="";
	protected $caducado="";
	protected $faldat="";
	protected $bloqueado="";
	protected $filasord="";
	protected $firmado="";
	protected $objeto=array();
	protected $grid=array();
	protected $check="";
	protected $numeroord="";
	protected $fecord="";
	protected $filnumordfec="";
  protected $aprmonche="";
  protected $nomrep="";
  protected $numord="";
  protected $codadiban="";
  protected $compret="";
  protected $feceminew="";
  protected $chequegen="";


    public function getNomben()
	{
		return Herramientas::getX('CEDRIF','Opbenefi','Nomben',$this->getCedrif());
	}


	public function getOrden()
	{
		$sql="SELECT A.NUMORD as numord
				FROM OPORDCHE A,OPORDPAG B
				WHERE A.NUMCHE='".self::getNumche()."' AND A.CODCTA='".self::getNumcue()."' AND A.TIPMOV='".self::getTipdoc()."' AND A.NUMORD=B.NUMORD ORDER BY A.NUMORD";
		if (Herramientas::BuscarDatos($sql,$result))
		{
			$numord='';
			$first=true;
			foreach ($result as $arre)
			{
				if ($first)
				{
					$numord=$arre["numord"];
					$first=false;
				}
				else
				{
					$numord=$numord.', '.$arre["numord"];
				}
			}
		}
		else
		{
			$numord='';
		}

	return $numord;
	}

	public function getNumcom()
	{
		$sql="SELECT B.NUMCOM as numcom
				FROM OPORDCHE A,OPORDPAG B
				WHERE A.NUMCHE='".self::getNumche()."' AND A.CODCTA='".self::getNumcue()."' AND A.TIPMOV='".self::getTipdoc()."' AND A.NUMORD=B.NUMORD ORDER BY A.NUMORD";
		if (Herramientas::BuscarDatos($sql,$result))
		{
			$numcom='';
			$first=true;
			foreach ($result as $arre)
			{
				if ($first)
				{
					$numcom=$arre["numcom"];
					$first=false;
				}
				else
				{
					$numcom=$numcom.', '.$arre["numcom"];
				}
			}
		}
		else
		{
			$numcom='';
		}

	return $numcom;
	}

  public function getBenefi()
  {
	  return Herramientas::getX('CEDRIF','Opbenefi','Nomben',$this->getCedrif());
  }


	public function getDestip()
	{
		return Herramientas::getX('CODTIP','Tstipmov','Destip',$this->getTipdoc());
	}

	public function getNomcue()
  {
  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',$this->getNumcue());
  }

  public function getEscheque()
  {
    return Herramientas::getX('CODTIP','Tstipmov','escheque',$this->getTipdoc());
  }

  public function getEstatus()
  {
  	$estatus="";

  	if (self::getStatus()=='C')
  	{
  		$estatus='CAJA';
  	}
  	else if (self::getStatus()=='E')
  	{
  		$estatus='ENTREGADO';
  	}
  	else if (self::getStatus()=='A')
  	{
  		$estatus='ANULADO';
  	}
        else if (self::getStatus()=='D')
  	{
  		$estatus='DEVUELTO';
  	}
  	return $estatus;
  }

  public function getFecha()
  {
  	$fecha=null;

  	if (self::getStatus()=='E')
  	{
            if (self::getFecent())
  		$fecha=date('d/m/Y',strtotime(self::getFecent()));
  	}
  	else if (self::getStatus()=='A')
  	{
            if (self::getFecanu())
  		$fecha=date('d/m/Y',strtotime(self::getFecanu()));
  	}
  	return $fecha;
  }

  public function getFilnumordfec()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('filnumordfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['filnumordfec'];
}
         }
     return $dato;
  }

  public function setFilnumordfec()
  {
  	return $this->filnumordfec;
  }

  public function getAprmonche()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('aprmonche',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['aprmonche'];
}
         }
     return $dato;
  }

  public function setAprmonche()
  {
  	return $this->aprmonche;
  }

    public function getMontominche()
    {
        $t= new Criteria();
        $reg= OpdefempPeer::doSelectOne($t);
        if ($reg)
        {
            $montoche=$reg->getMonche();
        }else $montoche=0;

        return $montoche;
    }

        public function getNomrep()
	{
		return Herramientas::getX_vacio('NUMCUE','Tsdefban','Nomrep',self::getNumcue());
	}

  public function setNomrep()
  {
  	return $this->nomrep;
  }

    public function getNomext()
    {
            return Herramientas::getX('TIPPAG','Cpdocpag','Nomext',self::getTipdoc());
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
            $this->modifiedColumns[] = TscheemiPeer::VALMON;
          }  
    }

   public function getNomconcepto()
  {
  return Herramientas::getX('CODCONCEPTO','Opconpag','Nomconcepto',self::getCodconcepto());
  } 

  public function getTipdoccom()
  {
      $c = new Criteria();
      $c->addJoin(CpcomproPeer::REFCOM, CpimpcauPeer::REFCAU);
      $c->addJoin(CpimpcauPeer::REFCAU, OpordchePeer::NUMORD);
      $c->add(OpordchePeer::NUMCHE, $this->getNumche());
      $c->add(OpordchePeer::CODCTA, $this->getNumcue());
      $c->add(OpordchePeer::TIPMOV, $this->getTipdoc());
      $compro = CpcomproPeer::doSelectOne($c);
      if($compro){
        return $compro->getTipcom();
      }else
      {
        return 'Sin Compromiso';
      }
  }

  public function getDesdirec()
  {
      return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }  

  public function seraCheque(){
    return H::getX('CODTIP','Tstipmov','Escheque',self::getTipdoc());
  }

  public function getDespro()
  {
    $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
      if ($catprofor=='S')
        return Herramientas::getX('CODPRO','Fordefpry','Nompro',self::getCodpro());
      else
        return H::getX_vacio('CODPRO','Catippro','Despro',self::getCodpro());
  } 

}
