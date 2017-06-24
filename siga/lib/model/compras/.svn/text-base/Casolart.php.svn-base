<?php

/**
 * Subclass for representing a row from the 'casolart'.
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
class Casolart extends BaseCasolart
{
  private $tipo = '';
  protected $actsolegr = '';
  protected $articulo = '';
  protected $modifico= '';
  protected $check= '';
  protected $obj = array();
  protected $etiqueta="";
  protected $porcostart='';
  protected $pormoncot='';
  protected $precom="";
  protected $cambiareti="";
  protected $nometifor="";
  protected $portimeent='';
  protected $porprovee="";
  protected $observaciones="";
  protected $claartdes="";
  protected $aprobpresu="";
  protected $indetiqueta="";
  protected $tipof="";
  protected $aprobar=false;
  protected $rechazar=false;
  protected $reqartdes="";
  protected $reqarthas="";
  protected $grid = array();
  protected $grid2 = array();
  protected $grid3 = array();
  protected $datossol="";
  protected $actualfila="";
  protected $filtotdet="";
  protected $fecdes="";
  protected $fechas="";
  protected $nompro = '';
  protected $finpre="";
  protected $aprobar1=false;
  protected $rechazar1=false;
  protected $aprobar2=false;
  protected $rechazar2=false;
  

  public function getMonreq($val=false)
  {
	return parent::getMonreq(true);
  }

  public function getNomcat()
  {
    $catbnubica="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('catbnubica',$varemp['aplicacion']['compras']['modulos']['almsolegr']))
	       {
	       	$catbnubica=$varemp['aplicacion']['compras']['modulos']['almsolegr']['catbnubica'];
	       }
         }

  	if ($catbnubica=='S')
  	 return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getUnires());
  	else
	return Herramientas::getX('CODCAT','Npcatpre','Nomcat',self::getUnires());
  }

  public function getNomext()
  {
	return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getTipfin());
  }

  public function setTipo($val)
  {
	$this->tipo = $val;
  }

  public function getTipo()
  {
	return $this->tipo;
  }

  public function getMondes($val=false)
  {
	return parent::getMondes(true);
  }

  public function getEtiqueta()
  {
    $etisuv=H::getConfApp2('etisuv', 'compras', 'almsolegr');
    $eticonffunmus=H::getConfApp2('eticonffunmus', 'compras', 'almsolegr');
  	if (self::getStareq()=='A')
  	{
      if ($eticonffunmus=='S')
      {
         if (self::getAprreq()=='S')
           $eti="APROBADA";
         else if (is_null(self::getAprreq()))
           $eti="RECHAZADA";
        else
           $eti="PENDIENTE POR APROBAR";
      }else {
        $reqapr=H::getX_vacio('Codemp','Cadefart','Prcreqapr','001');
    	  $d= new Criteria();
    	  $d->add(CpprecomPeer::REFPRC,self::getReqart());
    	  $resul= CpprecomPeer::doSelectOne($d);
    	  if ($resul)
    	  {
          if ($reqapr=='S') $eti="SOLICITUD APROBADA";
          else $eti="";
    	  	  $z= new Criteria();
  	  	  $z->add(CaordcomPeer::REFSOL,self::getReqart());
  	  	  $z->add(CaordcomPeer::STAORD,'N',Criteria::NOT_EQUAL);
  	  	  $resul2= CaordcomPeer::doSelectOne($z);
  	  	  if ($resul2)
  	  	  {
             if ($resul2->getTipord()=='S')
              $eti="LA SOLICITUD TIENE ASOCIADA UNA ORDEN DE SERVICIO N° ".$resul2->getOrdcom()." DE FECHA ".date('d/m/Y',strtotime($resul2->getFecord()));
             else
              $eti="LA SOLICITUD TIENE ASOCIADA UNA ORDEN DE COMPRA N° ".$resul2->getOrdcom()." DE FECHA ".date('d/m/Y',strtotime($resul2->getFecord()));
  	  	  }
    	  }else
    	  {
    	  	if ($reqapr=='S') 
          {             
            if ($etisuv=='S')
                $eti="SOLICITUD APROBADA SIN PRECOMPROMISO";
            else
                $eti="SOLICITUD PENDIENTE POR APROBAR";
          }
    	  	else $eti="";

          $z= new Criteria();
  	  	  $z->add(CaordcomPeer::REFSOL,self::getReqart());
  	  	  $z->add(CaordcomPeer::STAORD,'N',Criteria::NOT_EQUAL);
  	  	  $resul2= CaordcomPeer::doSelectOne($z);
  	  	  if ($resul2)
  	  	  {
            if ($resul2->getTipord()=='S')
              $eti="LA SOLICITUD TIENE ASOCIADA UNA ORDEN DE SERVICIO N° ".$resul2->getOrdcom()." DE FECHA ".date('d/m/Y',strtotime($resul2->getFecord()));
            else
              $eti="LA SOLICITUD TIENE ASOCIADA UNA ORDEN DE COMPRA N° ".$resul2->getOrdcom()." DE FECHA ".date('d/m/Y',strtotime($resul2->getFecord()));
    	    }
    	  }
      }
  	}
  	else if (self::getStareq()=='N')
  	{
  	  $eti="ANULADA";
  	}
  	else
  	{
  	 $eti="";
  	}
  	return $eti;
  }

  public function getPrecom()
  {
      $asoapr=H::getX_vacio('Codemp','Cadefart','Prcasopre','001');
      $reqapr=H::getX_vacio('Codemp','Cadefart','Prcreqapr','001');
      if ($asoapr=="" && $reqapr=="") {
        if (self::getId()){
          if (self::getAprreq()=='S')
            return 'S';
          else
            return 'N';
        }
        else
            return 'N';
      } else {
  	  $d= new Criteria();
  	  $d->add(CpprecomPeer::REFPRC,self::getReqart());
  	  $resul= CpprecomPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	return 'S';
  	  }else return 'N';
      }
  }

  public function setPrecom()
  {
  	return $this->precom;
  }

    public function getCambiareti()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almaprsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['compras']['modulos']['almaprsolegr']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almaprsolegr']['cambiareti'];
	       }
         }
     return $dato;
  }

  public function setCambiareti()
  {
  	return $this->cambiareti;
  }

  public function getNometifor()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almaprsolegr',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('nometifor',$varemp['aplicacion']['compras']['modulos']['almaprsolegr']))
	       {
	       	$dato=$varemp['aplicacion']['compras']['modulos']['almaprsolegr']['nometifor'];
	       }
         }
     return $dato;
  }

  public function setNometifor()
  {
  	return $this->nometifor;
  }

  public function getDescen()
  {
	return Herramientas::getX('CODCEN','Cadefcen','Descen',self::getCodcen());
  }

  public function getClaartdes()
  {
      return H::getConfApp2('claartdes', 'compras', 'almsolegr');
  }
  public function getAprobpresu()
  {
      return H::getConfApp2('aprobpresu', 'compras', 'almaprsolegr');
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
            $this->modifiedColumns[] = CasolartPeer::VALMON;
          }  
    } 

  public function getDeseve()
  {
    return Herramientas::getX('CODEVE','Cpevepre','Deseve',self::getCodeve());
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

    public function afterHydrate()
    {
      if (self::getId())
      {
        $tiene=H::getX_vacio('REFPRC','Cpprecom','Refprc',self::getReqart());
        $aprob=H::getX('CODEMP','Cadefart','Solreqapr','001');
        $aprobpresu=H::getConfApp2('aprobpresu','compras','almaprsolegr');
        $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
        $aprcompre=H::getConfApp2('aprcompre', 'compras', 'almaprsolegr');
        if ($aprcompre=='S'){
          if ($aprob=='S' && $aprobpresu=='S'){
            if ($modulo=='presupuesto'){
              if (self::getAprreq()=='S' && $tiene!='')
                $this->aprobar=true;
            }else {
              if (self::getAprreq()=='S')
                $this->aprobar=true;
            }

          }else{
             if (self::getAprreq()=='S' && $aprob=='S' && $tiene!='' && $aprobpresu=='S')
            $this->aprobar=true;
          else  if ($tiene!='' && $aprobpresu=='S')
            $this->aprobar=true;
          else  if (self::getAprreq()=='S' && $aprob=='S')
            $this->aprobar=true;
          }
        }else {
          if (self::getAprreq()=='S' && $aprob=='S' && $tiene!='' && $aprobpresu=='S')
            $this->aprobar=true;
          else  if ($tiene!='' && $aprobpresu=='S')
            $this->aprobar=true;
          else  if (self::getAprreq()=='S' && $aprob=='S')
            $this->aprobar=true;
        }

        if (self::getAprgesadm()=='S')
            $this->aprobar1=true;          
        
        if (self::getAprdiradq()=='S')
            $this->aprobar2=true;      
     }    
        
    }

  public function getNomreporte()
  {
      $reppreimpsc=H::getX_vacio('Codemp','Cadefart','Reppreimpsc','001');
      return $reppreimpsc;
  }

  public function getDesubi()
  {
    return Herramientas::getX_vacio('CODUBI','Bnubica','Desubi',self::getCodubi());
  }

  public function getNomreg()
  {
    return H::getX_vacio('CODREG','Caregiones','Nomreg',self::getCodreg());
  } 

  public function getNomemp()
  {
    return H::getX_vacio('CODEMP','Nphojint','Nomemp',self::getCodemp());
  }  

  public function getCampest()
  {
    return H::getConfApp2('campest', 'compras', 'almsolegr');
  }   

  public function getMonreq2()
  {
  return H::FormatoMonto(H::toFloat($this->monreq)*H::toFloat($this->valmon,6));
  }

  public function getLoncat(){

       return strlen(H::getObtener_FormatoCategoria());
  }

  public function getRefpre()
  {
    if($this->prebas!='') return true;
    else return false;
  }

  public function getTipreqletra()
  {
    switch (self::getTipreq()){
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

  public function getManunialt()
  {
    return H::getConfApp2('manunialt', 'compras', 'almregart');
  }

}
