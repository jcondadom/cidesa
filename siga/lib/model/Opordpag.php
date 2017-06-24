<?php

/**
 * Subclass for representing a row from the 'opordpag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Opordpag.php 37987 2010-05-06 14:06:56Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Opordpag extends BaseOpordpag
{
  private $codtip = '';
  protected $check = '';
  protected $referencias = '';
  protected $documento = '';
  protected $afectapre = '';
  protected $totalcomprobantes = '';
  protected $cuentarendicion = '';
  protected $vacio = '';
  protected $presiono = 'N';
  protected $neto = '0,00';
  protected $totfonter = '0,00';
  protected $montotal=0;
  protected $fecdes = '';
  protected $fechas = '';
  protected $objeto=array();
  protected $mascaraubi = "";
  protected $lonubi = 0;
  protected $idrefer="";
  protected $codcat="";
  protected $genctaord="";
  protected $filasord=0;
  protected $estatus="";
  protected $objret=array();
  protected $objfac=array();
  protected $objmov=array();
  protected $objoculret=array();
  protected $codigoprovee="";
  protected $afectapresup = '';
  protected $afectarecargo="";
  protected $iniciopar="";
  protected $formatopar="";
  protected $partidas="";
  protected $totmarcadas="0,00";
  protected $datosret="";
  protected $modmonret="true";
  protected $totmoncau="0,00";
  protected $totmonret="0,00";
  protected $totmondes="0,00";
  protected $objconsulret=array();
  protected $filasconsret=0;
  protected $totfac="0,00";
  protected $totbas="0,00";
  protected $totiva="0,00";
  protected $totimp="0,00";
  protected $incmod="";
  protected $elislr="0,00";
  protected $eltimbre="0,00";
  protected $eliva="0,00";
  protected $totbasmil="0,00";
  protected $totmontmil="0,00";
  protected $totbasislr="0,00";
  protected $totmontislr="0,00";
  protected $datosnomina="";
  protected $datosaporte="";
  protected $observe="";
  protected $referencias2 = '';
  protected $nombeneficiario="";
  protected $modbasimpiva="";
  protected $objeto1=array();
  protected $cadesel='';
  protected $filassal=0;
  protected $filordcbtp="";
  protected $limbaseret="";
  protected $numfilas=0;
  protected $numfilret=30;
  protected $refcre='';
  protected $refsolpag='';
  protected  $sincalret="";
  protected $numfilfac=150;
  protected  $cadfec="";
  protected  $monori=0.00;
  protected  $monche=0.00;
  protected  $moneda="";
  protected  $fecaju="";
  protected  $monaju=0.00;
  protected  $majust=0.00;
  protected  $nuemon=0.00;
  protected  $refpag="";
  protected  $codtip2="";
  protected $gencomnom="";
  protected $signo="";
  protected $tipmovi="";
  protected $notieamo="";
  protected $montoamo="0,00";
  protected $restoamo="0,00";
  protected $monorddisrgo="0,00";
  protected $comnoiva="";
  protected $tiepar411 = '';
  protected $codprehcm="";
  protected $referenciashcm="";
  protected $porcenrep=0;
  protected $monmaxrep=0;
  protected $coddirechas="";
  protected $numord1="";
  protected $numord2="";
  protected $monpariva="0,00";
  protected $monparsin="0,00";
  protected $valdatben="";
  protected $retenapli="";
  protected $comaso="";
  protected $totexe="0,00";
  protected $totmontirs="0,00";
  protected $totmontimn="0,00";
  protected $check2 = '0';
  protected $check3 = '0';
  protected $tipmov="";

  public function afterHydrate()
  {
      $this->nombeneficiario=str_replace("'", "", self::getNomben());
      if (self::getId())
      {
        $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
        $acumdisrgo=0;
        if ($comnoiva=='S')
        {
          $refecom=self::getReferencias2();
          if ($refecom=='')
            $refecom='_';
          $refere=split('_',$refecom);
          $ordcom=H::getX_vacio('ORDCOM','Caordcom','ORDCOM',$refere[1]);
          if ($ordcom!='')
          {
            $w= new Criteria();
            $w->add(CadisrgoPeer::REQART,$ordcom);
            $resulord=CadisrgoPeer::doSelect($w);
            if ($resulord)
            {
              foreach ($resulord as $objrec) {
                $acumdisrgo+=$objrec->getMonrgo();
              }
            }
          } 
          $this->monorddisrgo=H::FormatoMonto($acumdisrgo);
        } 
        if (self::getStaele()=='S')
            $this->check3=true;
        else $this->check3=false;       
      }
  }

  public function getMontotal()
  {
    if($this->montotal==0){
      $this->montotal=number_format((self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord())),2,',','.');
    }
    return $this->montotal;
  }

  public function getUnidad()
  {
    return Herramientas::getX('CODEMP','Opdefemp','Unitri','001');
  }

  public function getPartidas()
  {
      OrdendePago::partida($partid);
      return $partid;
  }

  public function getIniciopar()
  {
    if($this->iniciopar==""){
      Herramientas::obtenerFormatoCategoria($formatopar,$iniciopartida);
      $this->iniciopar = $iniciopartida;
    }

    return $this->iniciopar;
  }

  public function getFormatopar()
  {
    if($this->formatopar==""){
      Herramientas::obtenerFormatoCategoria($formatopar,$iniciopartida);
      $this->formatopar = $formatopar;
    }
    
    return $this->formatopar;
  }


  public function getNomext()
  {
  return Herramientas::getX('TIPCAU','Cpdoccau','Nomext',self::getTipcau());
  }

  public function getDescta()
  {
  return Herramientas::getX('CODCTA','Contabb','Descta',self::getCtapag());
  }

 public function getCodctasec()
  {
  return Herramientas::getX('CEDRIF','Opbenefi','Codctasec',self::getCedrif());
  }

  public function getNomext2()
  {
  return Herramientas::getX('CODFIN','Fortipfin','Nomext',self::getTipfin());
  }

  public function setCodtip($val)
  {
  $this->codtip = $val;
  }

  public function getCodtip()
  {
  return $this->codtip;
  }

  public function getDestip()
  {
  return Herramientas::getX('CODTIP','Optipret','Destip',self::getCodtip());
  }

  public function getDesubi()
  {
  return Herramientas::getX('CODUBI','Bnubica','Desubi',self::getCoduni());
  }

  public function getIdrefer()
  {
    return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
  }

  public function setCheck($val)
  {
  $this->check = $val;
  }

  public function getCheck()
  {
  return $this->check;
  }


/*  public function getMontotal()
  {
  $montot= (self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord()) );
  return $montot;
  }*/

  public function getMontotaltotal()
  {
  $montot= (self::getMonord()-self::getMondes()-self::getMonpag()-self::getMonret()- Cheques::ObtenerAjuste(self::getNumord()) );
  return $montot;
  }

  public function setMontotal($val)
  {
  $this->montotal = $val;
  }

  public function getMontotalGrid()
  {
    return $this->montotal;
  }

  public function setFecdes($val)
  {
  $this->fecdes = $val;
  }

  public function getFecdes()
  {
    return $this->fecdes;
  }

  public function setFechas($val)
  {
  $this->fechas = $val;
  }

  public function getFechas()
  {
    return $this->fechas;
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

  public function getDesmotanu()
  {
  return Herramientas::getX('CODMOTANU','Tsmotanu','Desmotanu',self::getCodmotanu());
  }

  public function getDesorden()
  {
    $desord= str_replace("'", "", self::getDesord());
    return str_replace("?", "", $desord);
  }

  public function getReqaprord()
    {
      $d= new Criteria();
      $data=OpdefempPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getReqaprord();
      }else $si=null;
      return $si;
    }

  public function getNomcue()
  {
  return Herramientas::getX('Numcue','Tsdefban','Nomcue',self::getNumcue());
  }

  public function getCodigoprovee()
  {
	$d= new Criteria();
	$d->add(CaproveePeer::RIFPRO,self::getCedrif());
	$data=CaproveePeer::doSelectOne($d);
	if ($data)
	{
	  $si=$data->getRifpro();
	}else $si="";

	return $si;
  }

  public function getAfectapresup()
  {
	$d= new Criteria();
	$d->add(CpdoccauPeer::TIPCAU,self::getTipcau());
	$data=CpdoccauPeer::doSelectOne($d);
	if ($data)
	{
	  if ($data->getAfeprc()=='N' && $data->getAfecom()=='N' && $data->getAfecau()=='N')
	  {
	  	$si='N';
	  }else
	  {
	  	$si='S';
	  }
	}else $si="";

	return $si;
  }

  public function getEtiqueta()
  {
    $etique="";
    $sql="Select MIN(FECPAG) AS fecpag,SUM(MONPAG) AS monpag FROM OPDETPER WHERE REFOPP = '".self::getNumord()."' HAVING SUM(MONPAG)>0";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $etique="PAGADA APARTIR DEL ".$result[0]["fecpag"];
    }else {
       switch (self::getStatus())
       {
       	 case 'A':
       	   if (self::getFecanu()!="")
	         { 
              $etique="ANULADA EL ".date('d/m/Y',strtotime(self::getFecanu()))." Con Motivo: ".self::getDesanu()."por el usuario ".self::getUsuanu();
           }
	       else { $etique="ANULADA";}
       	  break;
       	 case 'E':
       	   $etique="ELABORADA";
       	  break;
       	 case 'C':
       	   $etique="EN CONTRALORIA";
       	  break;
       	 case ('I' || 'N'):
           $sql="select a.numche as numche,b.feclib as fecemi,b.tipmov as tipo,d.destip as destip,c.nomcue as nomcue, a.tipmov as tipmovche
                 from opordche a, tsmovlib b, tsdefban c,tstipmov d where a.numche=b.reflib and a.codcta=b.numcue and b.numcue=c.numcue and
                 b.tipmov=d.codtip and d.debcre='C' and a.numord='".self::getNumord()."'";
           $result=array();
           if (Herramientas::BuscarDatos($sql,$result))
           {
             if (self::getStatus()=='N')
             {
               $etique="PAGADA PARCIALMENTE CON ";
             }
             else
             {
              $etique="PAGADA CON ";
             }

             if ($result[0]["tipmovche"]!="")
             {
              ///////////////////////////////////////
               $sql="select a.numche as numche,b.feclib as fecemi,b.tipmov as tipo,d.destip as destip,c.nomcue as nomcue, a.tipmov as tipmovche
                 from opordche a, tsmovlib b, tsdefban c,tstipmov d where a.numche=b.reflib and a.codcta=b.numcue and a.tipmov=b.tipmov and b.numcue=c.numcue and
                 b.tipmov=d.codtip and d.debcre='C' and a.numord='".self::getNumord()."'";
           		$resultad=array();
          		if (Herramientas::BuscarDatos($sql,$resultad))
           		{
           		     foreach ($resultad as $datos)
		             {
		               $etique=$etique.$datos["destip"]." N° ".$datos["numche"]." EL ".date('d/m/Y',strtotime($datos["fecemi"]))." - ".$datos["nomcue"].", ";
		             }
           		}
           		else $etique="";
              ///////////////////////////////////////
             }
      			 else
      			 {
               foreach ($result as $datos)
               {
                 $etique=$etique.$datos["destip"]." N° ".$datos["numche"]." EL ".date('d/m/Y',strtotime($datos["fecemi"]))." - ".$datos["nomcue"].", ";
               }
      			 }

             $etique=substr($etique,0,strlen($etique)-2);
           }
           else
           {
              if (self::getStatus()=='I')
              {
                $sql1="select a.tipmov as tipmov,a.reflib as reflib,a.feclib as feclib,a.numcue as numcue,b.nomcue as nomcue,c.destip as destip
                from  tsmovlib a, tsdefban b,tstipmov c where a.numcue=b.numcue and a.tipmov=c.codtip and a.numcue='".self::getCtaban()."' and a.reflib='".self::getNumche()."'";
                $result2=array();
                if(Herramientas::BuscarDatos($sql1,$result2))
                {
                  $etique="PAGADA CON ".$result2[0]["destip"]." N° ".$result2[0]["reflib"]." EL ".date('d/m/Y',strtotime($result2[0]["feclib"]))." - ".$result2[0]["nomcue"];
                  $q=new Criteria();
                  $q->add(TsdetpagelePeer::NUMORD,self::getNumord());
                  $regq= TsdetpagelePeer::doSelectOne($q);
                  if ($regq){
                    $etique.=". Con Pago Electrónico N° ".$regq->getRefpag();
                  }
                }
                else
                {
                  $etique="PAGADA SIN CHEQUE ASOCIADO";
                }
              }
              else
              {
                $etique="PENDIENTE POR PAGAR";
              }
          }
       	  break;
       }
    }

    return $etique;
  }

	public function getAfectarecargo()
	{
	  $d= new Criteria();
	  $data=CadefartPeer::doSelectOne($d);
	  if ($data)
	  {
	  	$si=$data->getAsiparrec();
	  }else $si="C";
	  return $si;
	}

  public function getDocumento()
  {
  	$docrefiere=CpdoccauPeer::getDato(self::getTipcau(),'Refier');
  	return $docrefiere;
  }

  	public function getIncmod()
	{
	  $d= new Criteria();
	  $d->add(OpretordPeer::NUMORD,self::getNumord());
	  $data=OpretordPeer::doSelectOne($d);
	  if ($data)
	  {
	  	$si="M";
	  }else $si="I";
	  return $si;
	}

	public function getReferencias2()
	{
	  $referencias="";
	  $sql="select refere as refere from cpimpcau where refcau='".self::getNumord()."'";
	  if (Herramientas::BuscarDatos($sql,$result))
	  {
        foreach ($result as $ref)
        {
         $referencias=$referencias.'_'.$ref["refere"];
        }
	  }
      return $referencias;
	}

  public function getNomconcepto()
  {
  return Herramientas::getX('CODCONCEPTO','Opconpag','Nomconcepto',self::getCodconcepto());
  }

  public function getFilordcbtp()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('filordcbtp',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['filordcbtp'];
	       }
         }
     return $dato;
  }

  public function setFilordcbtp()
  {
  	return $this->filordcbtp;
  }

  public function getNomcue2()
  {
  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcta());
  }

    public function getDestip2()
    {
            return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipdoc());
    }

  public function getLimbaseret()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagtipret',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('limbaseret',$varemp['aplicacion']['tesoreria']['modulos']['pagtipret']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagtipret']['limbaseret'];
	       }
         }
     return $dato;
  }

  public function setLimbaseret()
  {
  	return $this->limbaseret;
  }

        public function getComaso()
	{
	  $referencias="";
	  $sql="select distinct(refere) as refere from cpimpcau where refcau='".self::getNumord()."'";
	  if (Herramientas::BuscarDatos($sql,$result))
	  {
            $i=0;
            foreach ($result as $ref)
            {
             if ($i==0)
                 $referencias=$ref["refere"];
             else
                 $referencias=$referencias.'_'.$ref["refere"];
             $i++;
            }
	  }
      return $referencias;
	}

  public function getNumfilas()
  {
    $dato=150;
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numfilas',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['numfilas'];
	       }
         }
     return $dato;
  }

  public function setNumfilas()
  {
  	return $this->numfilas;
  }
  public function getNumfilret()
  {
    $dato=30;
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numfilret',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['numfilret'];
	       }
         }
     return $dato;
  }

  public function setNumfilret()
  {
  	return $this->numfilret;
  }

  public function getSincalret()
  {
    $dato="";;
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('sincalret',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['sincalret'];
}
         }
     return $dato;
  }

  public function setSincalret()
  {
  	return $this->sincalret;
  }

  public function getCuendesh()
  {
  	return H::getConfApp2('cuentadesh', 'tesoreria', 'pagemiord');
}
  
  public function getCalcuFac()
  {
  	return H::getConfApp2('calculafac', 'tesoreria', 'pagemiord');
  }
  
  public function getNumfilfac()
  {
    $dato=150;
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiord',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numfilfac',$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['pagemiord']['numfilfac'];
	       }
         }
     return $dato;
  }

  public function setNumfilfac()
  {
  	return $this->numfilfac;
  }  
  
  
  public function getMajust($val=false)
  {
    if($val) return number_format($this->majust,2,',','.');
    else return $this->majust;

}
  
    public function setMajust($v)
    {
        if ($this->majust !== $v) {
            $this->majust = (double)$v; //Herramientas::toFloat($v);                
          }  
    } 
    
  public function getMonaju($val=false)
  {

    if($val) return number_format($this->monaju,2,',','.');
    else return $this->monaju;

  }
  
    public function setMonaju($v)
    {
        if ($this->monaju !== $v) {
            $this->monaju = Herramientas::toFloat($v);                
          }  
    }  
    
  public function getMonori($val=false)
  {

    if($val) return number_format($this->monori,2,',','.');
    else return $this->monori;

  }
  
    public function setMonori($v)
    {
        if ($this->monori !== $v) {
            $this->monori = Herramientas::toFloat($v);                
          }  
    }  
    
  public function getMonche($val=false)
  {

    if($val) return number_format($this->monche,2,',','.');
    else return $this->monche;

  }
  
    public function setMonche($v)
    {
        if ($this->monche !== $v) {
            $this->monche = Herramientas::toFloat($v);                
          }  
    }  
    
  public function getNuemon($val=false)
  {

    if($val) return number_format($this->nuemon,2,',','.');
    else return $this->nuemon;

  }
  
    public function setNuemon($v)
    {
        if ($this->nuemon !== $v) {
            $this->nuemon = Herramientas::toFloat($v);                
          }  
    }   
    
  public function getDestip3()
  {
  return Herramientas::getX('CODTIP','Optipret','Destip',  $this->codtip2);
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
            $this->modifiedColumns[] = OpordpagPeer::VALMON;
          }  
    }   
    
  public function getMonord($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getCodmon();
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
            $this->modifiedColumns[] = OpordpagPeer::MONORD;
          }
    }     
    
  public function getMonret($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getCodmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monret/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monret;
    }else $calculo=$this->monret;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function setMonret($v)
    {
        if ($this->monret !== $v) {
            $this->monret = Herramientas::toFloat($v);
            $this->modifiedColumns[] = OpordpagPeer::MONRET;
          }
    }
    
public function getMondes($val=false)
  {
    if (self::getId())
    {
        $moneda=self::getCodmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->mondes/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->mondes;
    }else $calculo=$this->mondes;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }

    public function setMondes($v)
    {
        if ($this->mondes !== $v) {
            $this->mondes = Herramientas::toFloat($v);
            $this->modifiedColumns[] = OpordpagPeer::MONDES;
          }
    }    

  public function getMonpag($val=false)
  {

    if (self::getId())
    {
        $moneda=self::getCodmon();
        $valor=self::getValmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            if($valor >0){
            $calculo=$this->monpag/$valor;
            }else{
                $calculo=0;
            }
        }else $calculo=$this->monpag;
    }else $calculo=$this->monpag;

    if($val) return number_format($calculo,2,',','.');
    else return $calculo;

  }
  
	public function setMonpag($v)
	{

    if ($this->monpag !== $v) {
        $this->monpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpordpagPeer::MONPAG;
      }
  
	}

public function getTiecodadi()
    {
        return H::getConfApp2('tiecodadi', 'tesoreria', 'tesdefcueban');
    }    

public function getTietipodes()
    {
        return H::getConfApp2('tietipodes', 'tesoreria', 'pagemiord');
    }   

     public function getNomreporte()
  {
      $reppreimpsc=H::getX_vacio('Codemp','Opdefemp','Reppreimpop','001');
      return $reppreimpsc;
  }   

  public function getComnoiva() 
  {
      return H::getConfApp2('comnoiva', 'compras', 'almordcom');
  }    

  public function getNomrgo()
  {
    return H::getX_vacio('CODRGO','Carecarg','Nomrgo',self::getCodrgo());
  }

  public function getAplrecop() 
  {
      return H::getConfApp2('aplrecop', 'tesoreria', 'pagemiord');
  }  

  public function getDespro()
  {
    $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
      if ($catprofor=='S')
        return Herramientas::getX('CODPRO','Fordefpry','Nompro',self::getCodpro());
      else
        return H::getX_vacio('CODPRO','Catippro','Despro',self::getCodpro());
  }  

  public function getDesdirec()
  {
      return H::getX('CODDIREC','cadefdirec','Desdirec',self::getCoddirec());
  }  

  public function getDescaj()
  {
    return H::getX_vacio('CODCAJ','Tsdefcajchi','Descaj',self::getCodcajchi());
  } 

  public function getDesdirechas()
  {
      return H::getX_vacio('CODDIREC','cadefdirec','Desdirec',$this->coddirechas);
  }

    public function getAgropnomesp()
  {
    return Herramientas::getX_vacio('CODEMP','Opdefemp','Agropnomesp','001');
  }


  public function getTienumval()
  {
      return H::getConfApp2('tienumval', 'tesoreria', 'pagemiord');
  }  

  public function getMoneda()
  {
      return H::getX_vacio('CODMON','Tsdesmon','Nommon',self::getCodmon()).'  -  '.H::FormatoMonto(self::getValmon());
  }  

  public function getTipoord()
  {
      return self::getTipcau().'  -  '.self::getNomext();
  } 

  public function getBenefi()
  {
      return self::getCedrif().'  -  '.self::getNomben();
  }

  public function getCuenta()
  {
      return self::getCtapag().'  -  '.self::getDescta();
  }

  public function getUnidado()
  {
      return self::getCoduni().'  -  '.self::getDesubi();
  }

  public function getFinan()
  {
      return self::getTipfin().'  -  '.self::getNomext2();
  }

  public function getDirecc()
  {
      return self::getCoddirec().'  -  '.self::getDesdirec();
  }

  public function getConcept()
  {
      return self::getCodconcepto().'  -  '.self::getNomconcepto();
  }

  public function getMonord2(){
    return H::FormatoMonto(self::getMonord());
  }

  public function getValdatben()
  {
      return H::getConfApp2('valdatben', 'tesoreria', 'tesmovemipagele');
  }

  public function getReflibmay8()
  {
     return H::getConfApp2('reflibmay8', 'tesoreria', 'tesmovseglib');
  }

  public function getDestip4()
  {
          return Herramientas::getX('CODTIP','Tstipmov','Destip',$this->tipmov);
  }

  public function getNomcue3()
  {
  return Herramientas::getX('Numcue','Tsdefban','Nomcue',self::getCtaban());
  }

}
