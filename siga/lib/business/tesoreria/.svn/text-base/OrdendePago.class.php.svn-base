<?php
/**
 * Orden de Pago: Clase estática para procesar las ordenes de pago
 *
 * @package    Roraima
 * @subpackage tesoreria
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class OrdendePago
{
/**********************************Fondos a Terceros*****************************************************/
  public static function salvarPagemiret($fondos,$grid)
  {
    self::grabarFondos($fondos,$grid,$msj);
    if (self::agregaBenefi($fondos)==true)
    {
      self::grabarBenefi($fondos);
    }
    self::grabarRetenciones($fondos,$grid);
    self::actualizarRetenciones($fondos,$grid);
  }

  public static function grabarFondos($fondos,$grid,$msj)
  {
    if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
    {
     $tienecorrelativo=false;
      if ($fondos->getNumord()=='########')
      {
      	  $valido=false;
      	  $longitud='8';
      	  $nroorden=0;
      	  $formato='';
          $formatcont="";
          $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
          if ($varemp)
          if(array_key_exists('generales',$varemp)) {
             if(array_key_exists('formatcont',$varemp['generales']))
             {
              $formatcont=$varemp['generales']['formatcont'];
             }
          }
          if ($formatcont!='S')
          {
	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }

	        $fondos->setNumord(str_pad($r, 8, '0', STR_PAD_LEFT));
          }
          else {
	      $c = new Criteria();
	      $c->add(ContabaPeer::CODEMP,'001');
	      $per = ContabaPeer::doSelectOne($c);

	      if ($per->getCorcomp()=='AAMM####'){
	      	$formato = date('ym');
	      	$mes=date('m');
	      	$longitud='4';
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,3,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	 $fondos->setNumord($nroorden);

	      }elseif ($per->getCorcomp()=='MMAA####'){
	      	$formato = date('my');
			$longitud='4';
			$mes=date('m');
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,1,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	 $fondos->setNumord($nroorden);

	      }else{
	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }

	        $fondos->setNumord(str_pad($r, 8, '0', STR_PAD_LEFT));
         }
       }
      }
      else
      {
        $fondos->setNumord(str_replace('#','0',$fondos->getNumord()));
      }

     }

     if ($tienecorrelativo==true)
     {
       Herramientas::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,$msg);
     }
      $fondos->setStatus('N');
	  $fondos->setAproba('N');
	  $fondos->setMondes(0.00);
	  $fondos->setMonret(0.00);
	  $fondos->setFecven($fondos->getFecemi());
	  $e= new Criteria();
      $ooo= OpdefempPeer::doSelectOne($e);
      if ($ooo)
      {
        if ($ooo->getReqaprord()=='S')
        {
          $fondos->setAprobadoord('A');
          $fondos->setAprobadotes('A');
        }
      }

	  $x=$grid[0];
	  $valor="";
	  $j=0;
	  while ($j<count($x))
	  {
	    if ($x[$j]['check']=="1")
	    {
	      $c= new Criteria();
	      $c->add(OpordpagPeer::NUMORD,$x[$j]['numord']);
	      $consulta = OpordpagPeer::doSelectOne($c);
	      if ($consulta)
	      {
	        $valor= $consulta->getCoduni();
	      }
	    }
	    $j++;
	  }
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $fondos->setLoguse($loguse);
	  $fondos->setCoduni($valor);
      $fondos->save();
  }

  public static function afectaPresupuesto($fondos,&$refiere)
  {
    $c= new Criteria();
    $c->add(CpdoccauPeer::TIPCAU, $fondos->getTipcau());
    $uno= CpdoccauPeer::doSelectOne($c);
    if ($uno)
    {
      if($uno->getAfeprc()=='N' and $uno->getAfecom()=='N' and $uno->getAfecau()=='N')
      { $refiere=$uno->getRefier();
        return false;
      }
      else
      {
        $refiere=$uno->getRefier();
        return true;
      }
     }
  }

  public static function grabarRetenciones($fondos,$grid)
  {
    if (self::afectaPresupuesto($fondos,$refiere)==true)
    {
      $referencia=$fondos->getNumord();
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]['check']=="1")
        {
          $detalle = new Opdetord();
          $detalle->setNumord($referencia);
          if ($refiere=='N')
          {
            $detalle->setRefcom('NULO');
          }
          $detalle->setCodpre($x[$j]['codpre']);
          $detalle->setMoncau($x[$j]['monret']*$x[$j]['valmon']);
          $detalle->setMonret(0);
          $detalle->setMondes(0);
          $detalle->save();
        }
        $j++;
      }
    }
  }

  public static function actualizarRetenciones($fondos,$grid)
  {
    $referencia=$fondos->getNumord();
    $traeallord=H::getConfApp('traeallord', 'pagemiret', 'tesoreria');
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['check']=="1")
      {
        if (self::afectaPresupuesto($fondos,$refiere))
        {
          $c = new Criteria();
          $c->add(OpretordPeer::NUMORD,$x[$j]['numord']);
          $c->add(OpretordPeer::CODPRE,$x[$j]['codpre']);
          /*if ($traeallord!="S")
          $c->add(OpretordPeer::CODTIP,$fondos->getCodtip());
          else */
              $c->add(OpretordPeer::CODTIP,$x[$j]['codtip']);
          $numero= OpretordPeer::doSelectOne($c);
          if ($numero)
          {
            $numero->setNumret($referencia);
          }
        }
        else
        {
          $c = new Criteria();
          $c->add(OpretordPeer::NUMORD,$x[$j]['numord']);
          $c->add(OpretordPeer::CODPRE,$x[$j]['codpre']);
          /*if ($traeallord!="S")
          $c->add(OpretordPeer::CODTIP,$fondos->getCodtip());
          else*/ $c->add(OpretordPeer::CODTIP,$x[$j]['codtip']);          
          $numero= OpretordPeer::doSelectOne($c);
          if ($numero)
          {
            $numero->setNumret($referencia);
          }
        }
        $numero->save();
      }
      $j++;
    }
  }

  public static function agregaBenefi($fondos)
  {
    $c= new Criteria();
    $c->add(OpbenefiPeer::CEDRIF, $fondos->getCedrif());
    $ben= OpbenefiPeer::doSelectOne($c);
    if ($ben)
    {return false;}
    else {return true;}
  }

  public static function grabarBenefi($fondos)
  {
    $benefi= new Opbenefi();
    $benefi->setCedrif($fondos->getCedrif());
    $benefi->setNomben($fondos->getNomben());
    $benefi->setCodcta($fondos->getCtapag());
    $benefi->save();
  }
/********************************************************************************************************/

/**************************************Ordenes de Pago***************************************************/
  public static function obtenerCorrelativo($orden,&$msj,&$correlativo)
  {
    $msj=-1;
    if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
    {
      if ($orden->getNumord()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

          $sql="select numord from opordpag where numord='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $correlativo=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
    }
  }

  public static function salvarPagemiord($orden,$grid,$grid2,$grid3,$referencias,$cuentaporpagarrendicion,$numerocomp,$comprobaut,$grid4,&$msj)
  {
    $msj=-1;
    $nroregimp=count($grid[0]);
    self::formload($afectarecargo,$ordpagnom,$ordpagapo,$ordpagliq,$ordpagfid,$ordpagval,$compadic,$genctaord,$ordpagcre,$ordpagsolpag,$ordpaghcm,$ordpagamo);
    if (self::afectaPresupuesto($orden,$refiere)==true)
    {
     if ($comprobaut=='S')
     {
     	if ($orden->getDocumento()=='C' || $orden->getDocumento()=='P')
     	{
     	  $t= new Criteria();
     	  $resul=OpdefempPeer::doSelectOne($t);
     	  if ($resul)
     	  {
     	  	if ($resul->getGenctaord()=='S')
     	  	{
              self::grabarComprobanteOrdenAutomatico($orden);
     	  	}
     	  }
     	}
     	if (!self::grabarComprobanteAutomatico($orden,$grid,$correl3))
          return false;
            
     	$orden->setNumcom($correl3);
        $numerocomp=$correl3;
     	//$orden->save();
     }
     self::grabarOrden($orden,$cuentaporpagarrendicion,$numerocomp,$nroregimp,$msj);
     if ($msj!=-1)
       return false;
     if (self::agregaBenefi($orden)==true)
     {
      self::grabarBenefi($orden);
     }
     self::grabarImputaciones($orden,$grid,$refiere,$referencias);
     self::grabarCausado($orden,$grid,$refiere,$referencias);
     if (count($grid2[0])>0)
     {
     self::grabarFacturas($orden,$grid2);}
     self::grabarRetencion($orden,$grid3,$grid,$refiere,$referencias);
     self::actualizarOrdenPag($orden,$grid3);
     self::grabarEmpresas($orden,$grid4);
    }
    else
    {
     
     if ($comprobaut=='S')
     {
       if ($orden->getDocumento()=='C' || $orden->getDocumento()=='P')
     	{
     	  $t= new Criteria();
     	  $resul=OpdefempPeer::doSelectOne($t);
     	  if ($resul)
     	  {
     	  	if ($resul->getGenctaord()=='S')
     	  	{
              self::grabarComprobanteOrdenAutomatico($orden);
     	  	}
     	  }
     	}
     	if (!self::grabarComprobanteAutomatico($orden,$grid,$correl3))
           return false;
     	$orden->setNumcom($correl3);
        $numerocomp=$correl3;
     	//$orden->save();
     }
     self::grabarOrden($orden,$cuentaporpagarrendicion,$numerocomp,$nroregimp,$msj);
     if ($msj!=-1)
       return false;
     if (self::agregaBenefi($orden)==true)
     {
       self::grabarBenefi($orden);
     }
     self::grabarImputaciones($orden,$grid,$refiere,$referencias);
      if (count($grid2[0])>0)
     {
     self::grabarFacturas($orden,$grid2);}
     self::grabarRetencion($orden,$grid3,$grid,$refiere,$referencias);
     self::actualizarOrdenPag($orden,$grid3);
     self::grabarEmpresas($orden,$grid4);
   }
   
   return true;
 }

  public static function grabarOrden($orden,$cuentaporpagarrendicion,$numerocomp,$nroregimp,&$msj=-1)
  {
    $tienecorrelativo=false;
    if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
    {
      if ($orden->getNumord()=='########')
      {
      	  $valido=false;
      	  $longitud='8';
      	  $nroorden=0;
      	  $formato='';
          $formatcont="";
            $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
            if ($varemp)
            if(array_key_exists('generales',$varemp)) {
               if(array_key_exists('formatcont',$varemp['generales']))
               {
                $formatcont=$varemp['generales']['formatcont'];
               }
         }
          if ($formatcont!='S')
          {
	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $orden->setNumord(str_pad($r, 8, '0', STR_PAD_LEFT));
          }else {
              $fecc=$orden->getFecemi();
	      $c = new Criteria();
	      $c->add(ContabaPeer::CODEMP,'001');
	      $per = ContabaPeer::doSelectOne($c);

	      if ($per->getCorcomp()=='AAMM####'){
	      	$formato = substr($fecc,2,2).substr($fecc,5,2); //date('ym');
	      	$mes=substr($fecc,5,2); //date('m');
	      	$longitud='4';
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,3,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	 $orden->setNumord($nroorden);

	      }elseif ($per->getCorcomp()=='MMAA####'){
	      	$formato = substr($fecc,5,2).substr($fecc,2,2); //date('my',$fecha);
			$longitud='4';
                $mes=substr($fecc,5,2);//date('m');
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,1,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	 $orden->setNumord($nroorden);

	      }else{
	      	$tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $orden->setNumord(str_pad($r, 8, '0', STR_PAD_LEFT));
        }
      }
      }
      else
      {
        $orden->setNumord(str_replace('#','0',$orden->getNumord()));
      }
    }
    
     $e = new Criteria();
     $e->add(CpcausadPeer::REFCAU,$orden->getNumord());
     $causae = CpcausadPeer::doSelectOne($e);
     if ($causae){
      $msj=1381;
      return false;
     }


   if ($tienecorrelativo)
   {
     Herramientas::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,$msg);
   }

   if ($nroregimp==0)
   {
    $orden->setMonord($orden->getNeto());
   }
   
    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    
     $orden->setMonord($orden->getMonord()*$valor);
     $orden->setMonret($orden->getMonret()*$valor);
     $orden->setMondes($orden->getMondes()*$valor);

   $c= new Criteria();
   $c->add(OpbenefiPeer::CEDRIF, $orden->getCedrif());
   $ben= OpbenefiPeer::doSelectOne($c);
   if ($ben) $orden->setNomben($ben->getNomben());

   $orden->setDesord(strtoupper($orden->getDesord()));
   $orden->setStatus('N');
   $orden->setNumche(null);
   $orden->setCtaban(null);
   $orden->setNumcom($numerocomp);
   $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
   $orden->setLoguse($loguse);
   if ($orden->getCoddirec()!='0000') //Sede Central
     $orden->setAprproord('A');

   if ($cuentaporpagarrendicion!="")
   {
     $orden->setCtapag($cuentaporpagarrendicion);
   }

   $e= new Criteria();
   $ooo= OpdefempPeer::doSelectOne($e);
   if ($ooo)
   {
      if ($ooo->getReqaprord()=='S')
      {
      	if ($orden->getTipcau()==$ooo->getOrdtna() || $orden->getTipcau()==$ooo->getOrdtba())
      	{
          $orden->setAprobadoord('A');
      	}
      }
   }//////////////////////

   $orden->save();
   Comprobante::ActualizarReferenciaComprobante($numerocomp,$orden->getNumord(),'OP');
   $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    $forconuney='N';
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('generales',$varemp)) {
       if(array_key_exists('forconuney',$varemp['generales']))
       {
        $forconuney=$varemp['generales']['forconuney'];
       }
   }    
   $y = new Criteria();
   $y->add(OpordpagPeer::NUMORD,$orden->getNumord());
   $onedato=OpordpagPeer::doSelectOne($y);
   if ($onedato)
   {
     if ($confcorcom=='N' && $forconuney=='N') {
        $onedato->setNumcom("OP".substr($orden->getNumord(),2,6));
        $onedato->save();
     }


   }
  }

  public static function grabarImputaciones($orden,$grid,$refiere,$referencias)
  {
    $referencia=$orden->getNumord();

    //Cambio de Moneda
    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    $x=$grid[0];
    if ($referencias=='')
    { $referencias='_';}
    $refere=split('_',$referencias);
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodpre()!='')
      {
        $x[$j]->setNumord($referencia);
        if ($refiere=='N')
        {
          $x[$j]->setRefcom('NULO');
        }
        else
        {
          $x[$j]->setRefcom($refere[$j+1]);
        }
        if ($moneda2!=$moneda)
        {
            $x[$j]->setMoncau($x[$j]->getMoncau()*$valor);
            $x[$j]->setMondes($x[$j]->getMondes()*$valor);
        }
        $x[$j]->setMonret(0);
        $x[$j]->save();
      }
      $j++;
    }

    $z=$grid[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

    $t= new Criteria();
    $t->add(OpdetordPeer::NUMORD,$referencia);
    $t->addDescendingOrderByColumn(OpdetordPeer::MONCAU);
    $regi=  OpdetordPeer::doSelectOne($t);
    if ($regi)
    {
        $regi->setMonret($orden->getMonret()*$valor);
        $regi->save();
    }
  }

  public static function formload(&$afectarecargo,&$ordpagnom,&$ordpagapo,&$ordpagliq,&$ordpagfid,&$ordpagval,&$compadic,&$genctaord,&$ordpagcre = '', &$ordpagsolpag = '',&$ordpaghcm='',&$ordpagamo='')
  {
    $c = new Criteria();
    $reg= CadefartPeer::doSelectOne($c);
    if ($reg)
    {
      $afectarecargo=$reg->getAsiparrec();
    }else {$afectarecargo='C';}

    $c = new Criteria();
    $c->add(OpdefempPeer::CODEMP,'001');
    $reg2= OpdefempPeer::doSelectOne($c);
    if ($reg2)
    {
      $ordpagnom=$reg2->getOrdnom();
      $ordpagapo=$reg2->getOrdobr();
      $ordpagliq=$reg2->getOrdliq();
      $ordpagfid=$reg2->getOrdfid();
      $ordpagval=$reg2->getOrdval();
      $compadic=$reg2->getGencomadi();
      $genctaord=$reg2->getGenctaord();
      $ordpagcre = $reg2->getOrdcre();
      $ordpagsolpag = $reg2->getOrdsolpag();
      $ordpaghcm = $reg2->getOrdhcm();
      $ordpagamo= $reg2->getOrdamo();
    }
    else
    {
      $ordpagnom='####';
      $ordpagapo='####';
      $ordpagliq='####';
      $ordpagfid='####';
      $ordpagval='####';
      $ordpagcre = '####';
      $compadic="";
      $genctaord="";
      $ordpaghcm='####';
      $ordpagamo='####';
    }

  }

  public static function partida(&$partidas)
  {
    $sql="Select DISTINCT(CODPAR) as CODPAR from TSRetIva";

    if (Herramientas::BuscarDatos($sql,$result))
    {
      foreach ($result as $par)
      {
        $partidas=$partidas.'_'.$par["codpar"];
      }
    }else { $partidas='';}
  }

  public static function Buscar_Correlativo()
  {
    return Comprobante::Buscar_Correlativo();
  }

  public static function grabarComprobante($orden,$grid,&$cuentaporpagarrendicion,&$mensaje,&$msjuno,&$msjdos,&$arrcompro,$grid3)
  {
    $mensaje="";
    $numeroorden="";
    $formatcont="";
    $forconuney="";
      $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
      if ($varemp)
      if(array_key_exists('generales',$varemp)) {
         if(array_key_exists('formatcont',$varemp['generales']))
         {
          $formatcont=$varemp['generales']['formatcont'];
         }
         if(array_key_exists('forconuney',$varemp['generales']))
         {
          $forconuney=$varemp['generales']['forconuney'];
         }
     }
    self::formload($afectarecargo,$ordpagnom,$ordpagapo,$ordpagliq,$ordpagfid,$ordpagval,$compadic,$genctaord,$ordpagcre,$ordpagsolpag,$ordpaghcm,$ordpagamo);
    if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
    {
      if ($orden->getNumord()=='########')
      {
          $valido=false;
      	  $longitud='8';
      	  $nroorden=0;
        
           $fecc=$orden->getFecemi();
                  			   
          if ($formatcont!='S')
          {
             	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);  
          }else {          
      	  $formato='';
	      $c = new Criteria();
	      $c->add(ContabaPeer::CODEMP,'001');
	      $per = ContabaPeer::doSelectOne($c);

	      if ($per->getCorcomp()=='AAMM####'){
	      	$formato = substr($fecc,2,2).substr($fecc,5,2); //date('ym');
	      	$mes=substr($fecc,5,2); //date('m');
	      	$longitud='4';
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,3,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	$numeroorden=$nroorden;

	      }elseif ($per->getCorcomp()=='MMAA####'){
	      	$formato = substr($fecc,5,2).substr($fecc,2,2); //date('my',$fecha);
			$longitud='4';
			$mes=substr($fecc,5,2);//date('m');
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,1,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	$numeroorden=$nroorden;

	      }else{
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      }
      }
      else
      {
        $numeroorden=str_replace('#','0',$orden->getNumord());
      }
    }
    $numeroorden2="OP".substr($numeroorden,2,6);
    if ($forconuney=='S')
    {
        $formato = substr($fecc,5,2).'-2-'; //date('my',$fecha);
        $longitud='3';
        $tipo='2';
        $mes=substr($fecc,5,2);//date('m');
        $sql="Select Max(Numcom) as correl from Contabc where Numcom Like '".$mes."-".$tipo."-%'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $cor=substr($result[0]["correl"],5,3)+1;
        }else $cor=1;

        while(!$valido){
             $nroorden7 = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

              $c = new Criteria();
              $c->add(ContabcPeer::NUMCOM,$nroorden7);
              $clase = ContabcPeer::doSelectOne($c);
              if(!$clase){
                $valido = true;
              }else { $cor=$cor +1;}
        }
        $numerocomprob=$nroorden7;
    }
    else { 

        $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $numerocomprob= $numeroorden2;
        }else $numerocomprob= '########';
    }

    $reftra = $numeroorden2;
    $cuentaporpagarrendicion="";
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";
    $msjdos="";
    $mancuecon=H::getConfApp2('mancuecon', 'presupuesto', 'predoccau');
    $mosivacom=H::getConfApp2('mosivacom', 'tesoreria', 'pagemiord');
    $mosretcomop=H::getConfApp2('mosretcomop', 'tesoreria', 'pagemiord');
    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    
    $c = new Criteria();
    $resul= TsdefrengasPeer::doSelectOne($c);
    if ($resul)
    {
      if (($orden->getTipcau()==$resul->getPagrepcaj()) && ($resul->getCtarepcaj()!=''))
      {
        $sql="Select A.CodCtaCajChi as codctacajchi,B.DesCta as descta from OPBenefi A,Contabb B where A.CedRif='".$orden->getCedrif()."' and A.CodCtaCajChi=B.CodCta";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          if ($result[0]["codctacajchi"]!='')
          {
            $cuenta=$result[0]["codctacajchi"];
          }else { $cuenta='';}
          $monord=$orden->getMonord();
          if ($monord>0)
          {
            $codigocuenta=$cuenta;
            $tipo='D';
            $des="";
            $mon=$orden->getMonord();
            $monto=$mon;
          }else{
          	$codigocuenta=$cuenta;
            $tipo='D';
            $des="";
            $mon=$orden->getNeto();
            $monto=$mon;
          }
          if ($moneda2!=$moneda) $monto=H::toFloat($monto)*H::toFloat($valor,6);
        }else { $msjuno='El Código Contable de la Caja Chica asociado al Beneficiario no es válido'; return true;}
        $codigocuentapagar=$resul->getCtarepcaj();
        $cuentaporpagarrendicion=$codigocuentapagar;
        $sql2="SELECT CodCta,DesCta FROM CONTABB WHERE CODCTA = '".$codigocuentapagar."'";
        if (Herramientas::BuscarDatos($sql2,$result2))
        {
          $codigocuenta2=$codigocuentapagar;
          $tipo2='C';
          $des2="";
          $mont=$orden->getMonord();
          $monto2=$mont;
          if ($moneda2!=$moneda) $monto2=H::toFloat($monto2)*H::toFloat($valor,6);
        }else { $msjdos='El Código Contable asociado a la Cuenta Transitoria por Pagar no es válido';  return true;}

        $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;
      }
      else
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x) && $orden->getAfectapre()==1)
        {
          $c= new Criteria();
          $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
          $regis = CpdeftitPeer::doSelectOne($c);
          if ($regis)
          {
            if($regis->getCodcta()!='')
            {
              $cuenta=$regis->getCodcta();
            }else {$cuenta='';}

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
              $moncau=$x[$j]->getMoncau();
              if ($moncau>0)
              {
                if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
                {
                  $codigocuenta=$regis2->getCodcta();
                  $tipo='D';
                  $des="";
                  $mont1=$x[$j]->getMoncau();
                  $mont2=$x[$j]->getMonret();
                  #$monto=$mont1 - $mont2;
                  #Cambios hecho por leobardo
                  $monto=$mont1;
                }else {
                  $codigocuenta=$regis2->getCodcta();
                  $tipo='D';
                  $des="";
                  $mon=$x[$j]->getMoncau();
                  $monto=$mon;
                }
                if ($moneda2!=$moneda) $monto=H::toFloat($monto)*H::toFloat($valor,6);
              }
            }else { $msjuno='El Código Presupuestario no tiene asociado Codigo Contable válido'; return true;}
          
          if ($moncau>0)
          {
          if ($j==0)
          {
            $codigocuentas=$codigocuenta;
            $desc=$des;
            $tipo1=$tipo;
            $monto1=$monto;
          }
          else
          {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }
          }
          }else { $msjuno='El Código Presupuestario no esta registrado '.$x[$j]->getCodpre() ; return true;}
          $j++;
        }
        
        if ($orden->getTipcau()==$ordpagamo && $orden->getAfectapre()!=1)
        {         
          $codigocuentas=H::getX_vacio('CEDRIF', 'Opbenefi', 'Codcopant', $orden->getCedrif());
          $tipo1='D';
          $desc=H::getX_vacio('CODCTA', 'Contabb', 'Codcta',$codigocuentas);
          if ($moneda2!=$moneda) $monto1=H::toFloat($orden->getNeto())*H::toFloat($valor,6);
          else $monto1=H::toFloat($orden->getNeto());          
        }

        if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
        {
          $codigocuenta2=$orden->getCtapag();
          $tipo2='C';
          $des2="";
          $a=$orden->getMonord();
          $monto2=$a;
        }else {
          $codigocuenta2=$orden->getCtapag();
          $tipo2='C';
          $des2="";
           if ($orden->getAfectapre()==1) $a=$orden->getMonord();
           else $a=$orden->getNeto();
          $monto2=$a;
        }
        if ($moneda2!=$moneda) $monto2=H::toFloat($monto2)*H::toFloat($valor,6);
        $cuentas=$codigocuenta2.'_'.$codigocuentas;
        $descr=$des2.'_'.$desc;
        $tipos=$tipo2.'_'.$tipo1;
        $montos=$monto2.'_'.$monto1;
      }
    }else  //si no esta en Tsdefrengas
    {
      $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
      $aplrecop=H::getConfApp2('aplrecop', 'tesoreria', 'pagemiord');
      $acum=0;
      if ($comnoiva=='S' && $orden->getDocumento()!='N')
      {
        $refecom=$orden->getReferencias();
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
            $q=0;
            foreach ($resulord as $objrec) {
              $codigocuenta=H::getX_vacio('CODRGO','Carecarg','Codcta',$objrec->getCodrgo());
              $tipo='D';
              $des="";
              $monto=$objrec->getMonrgo();
              $acum+=$objrec->getMonrgo();

             $codigocuentas=$codigocuenta;
             $desc=$des;
             $tipo1=$tipo;
             $monto1=$monto;
           
             $q++;
            }
          }else {
            $codigocuenta=H::getX_vacio('CODRGO','Carecarg','Codcta',$orden->getCodrgo());
            $tipo='D';
            $des="";
            $monto=$orden->getMonrgo();
            $acum=$orden->getMonrgo();

            $codigocuentas=$codigocuenta;
            $desc=$des;
            $tipo1=$tipo;
            $monto1=$monto;   
          }
        }
      }

      if ($aplrecop=='S' && $orden->getDocumento()=='N')
      {
        if ($orden->getCodrgo()!='') {
            $codigocuenta=H::getX_vacio('CODRGO','Carecarg','Codcta',$orden->getCodrgo());
            $tipo='D';
            $des="";
            $monto=$orden->getMonrgo();
            $acum=$orden->getMonrgo();

            $codigocuentas=$codigocuenta;
            $desc=$des;
            $tipo1=$tipo;
            $monto1=$monto;       
        }
      }

      /*if ($mosivacom=='S')
      {
          $x=$grid3[0];
          $j=0;
          while ($j<count($x))
          {
            if ($x[$j]['codtip']!='')
            {
              $p= new Criteria();
              $p->add(TsretivaPeer::CODRET,$x[$j]['codtip']);
              $resuliva= TsretivaPeer::doSelectOne($p);
              if ($resuliva) {
                $b=H::toFloat($orden->getMonord())-H::toFloat($x[$j]['montorete']);
                $monto2=$b;

                $codigocuenta=H::getX_vacio('CODTIP','Optipret','Codcon',$x[$j]['codtip']);
                $tipo='D';
                $des="";
                $b=$x[$j]['montorete'];
                $monto=$b;
              }
            }
           $j++;
          }
        }*/
      
      if ($mancuecon=='S')
      {
          if ($codigocuentas=="")
          {
              $codigocuentas=H::getX_vacio('Tipcau', 'Cpdoccau', 'Codcta', $orden->getTipcau());
              $tipo1='D';
              $desc=H::getX_vacio('CODCTA', 'Contabb', 'Codcta',$codigocuentas);
              if ($moneda2!=$moneda) $monto1=H::toFloat($orden->getNeto())*H::toFloat($valor,6);
              else $monto1=H::toFloat($orden->getNeto());
          }
      }

      $x=$grid[0];
      $j=0;
      while ($j<count($x) && $orden->getAfectapre()==1)
      {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if($regis->getCodcta()!='')
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=H::tofloat($x[$j]->getMoncau());
            if ($moncau>0)
            {
              if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
              {
                $codigocuenta=$regis2->getCodcta();
                $tipo='D';
                $des="";
                $moncau=$x[$j]->getMoncau();
                $monto=$moncau;
              }else {
                $codigocuenta=$regis2->getCodcta();
                $tipo='D';
                $des="";
                $moncau=$x[$j]->getMoncau();
                $monto=$moncau;
              }
              if ($moneda2!=$moneda) $monto=H::toFloat($monto)*H::toFloat($valor,6);
            }
            

          }else { $msjuno='El Código Presupuestario no tiene asociado Codigo Contable válido'; return true;}
        if ($moncau>0)
        {
         if ($j==0 && $codigocuentas=='')
         {
           $codigocuentas=$codigocuenta;
           $desc=$des;
           $tipo1=$tipo;
           $monto1=$monto;
         }
         else
         {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }
        }

        }else { $msjuno='El Código Presupuestario no esta registrado '.$x[$j]->getCodpre() ; return true;}

        $j++;
      }

      if ($orden->getTipcau()==$ordpagamo && $orden->getAfectapre()!=1)
      {         
        $codigocuentas=H::getX_vacio('CEDRIF', 'Opbenefi', 'Codcopant', $orden->getCedrif());
        $tipo1='D';
        $desc=H::getX_vacio('CODCTA', 'Contabb', 'Codcta',$codigocuentas);
        if ($moneda2!=$moneda) $monto1=H::toFloat($orden->getNeto())*H::toFloat($valor,6);
        else $monto1=H::toFloat($orden->getNeto());          
      }
      
      if(($orden->getTipcau()==$ordpagnom) or ($orden->getTipcau()==$ordpagapo) or ($orden->getTipcau()==$ordpagliq))
      {
        $codigocuenta2=$orden->getCtapag();
        $tipo2='C';
        $des2="";
         if ($mosretcomop=='S' && $orden->getTipcau()==$ordpagnom)
           $b=$orden->getMonord()-$orden->getMonret();
         else $b=$orden->getMonord();
        $monto2=$b;
      }else {
        $codigocuenta2=$orden->getCtapag();
        $tipo2='C';
        $des2="";
        if ($mancuecon=='S')
        {  
            if ($orden->getAfectapre()==1) $b=$orden->getMonord();
           else $b=$orden->getNeto();
        }else {
            //$b=$orden->getMonord();
            if ($orden->getAfectapre()==1) $b=$orden->getMonord();
           else $b=$orden->getNeto();
        }
        $monto2=H::toFloat($b);



        if (($comnoiva=='S' && $orden->getDocumento()!='N') || ($aplrecop=='S' && $orden->getDocumento()=='N'))
        {
          if ($orden->getCodrgo()!='') {
            $x=$grid3[0];
            $j=0;
            while ($j<count($x))
            {
              if ($x[$j]['codtip']!='')
              {
                $p= new Criteria();
                $p->add(TsretivaPeer::CODRET,$x[$j]['codtip']);
                $p->add(TsretivaPeer::CODREC,$orden->getCodrgo());
                $resuliva= TsretivaPeer::doSelectOne($p);
                if ($resuliva) {
                  $b=H::toFloat($orden->getMonord())-H::toFloat($x[$j]['montorete']);
                  $monto2=$b;

                  $codigocuenta2=$codigocuenta2.'_'.H::getX_vacio('CODTIP','Optipret','Codcon',$x[$j]['codtip']);
                  $tipo2=$tipo2.'_'.'C';
                  $des2=$des2.'_'."";
                  $b=$x[$j]['montorete'];
                  $monto2=$monto2.'_'.$b;
                }
              }
             $j++;
            }
         }
        }
      }
      if ($mosretcomop=='S' && $orden->getTipcau()==$ordpagnom)
        {
          $x=$grid3[0];
          $j=0;
          while ($j<count($x))
          {
            if ($x[$j]['codtip']!='')
            {
              $p= new Criteria();
              $p->add(OptipretPeer::CODTIP,$x[$j]['codtip']);
              $rego= OptipretPeer::doSelectOne($p);
              if ($rego) {
                $codigocuenta2=$codigocuenta2.'_'.$rego->getCodcon();
                $tipo2=$tipo2.'_'.'C';
                $des2=$des2.'_'."";
                $b=$x[$j]['montorete'];
                $monto2=$monto2.'_'.$b;
              }
            }
           $j++;
          }
        }
      if ($moneda2!=$moneda) $monto2=H::toFloat($monto2)*H::toFloat($valor,6);
      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;
    }

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($orden->getFecemi())));
      $clscommpro->setDestra($orden->getDesord()." - ".$orden->getNomben());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }

  public static function obtenerTags($command,&$tag1,&$tag2)
  {
    if ($command=="")
    {
     $tag1="";
     $tag2="";
    }
    if ($command=='P')
    {
      $tag1="SI";
    }else { $tag1="";}

    if ($command=='C')
    {
      $tag2="SI";
    }else { $tag2="";}
  }

  public static function grabarComprobanteOrden($orden,$command,&$mensaje,&$msj1,&$msj2,&$arrcompro)
  {
    $msj1="";
    $msj2="";
    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    self::obtenerTags($command,$tag1,$tag2);
    $c = new Criteria();
    $c->add(CaproveePeer::RIFPRO,$orden->getCedrif());
    $reg = CaproveePeer::doSelectOne($c);
    if ($reg)
    { $tipoben=$reg->getTipo();}
      $mensaje="";
    if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
    {
      if ($orden->getNumord()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

          $sql="select numord from opordpag where numord='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      else
      {
        $numeroorden=str_replace('#','0',$orden->getNumord());
      }
    }
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob="PR".substr($numeroorden,2,6);
    }else $numerocomprob= '########';

    $reftra="PR".substr($numeroorden,2,6);

    $b = new Criteria();
    $b->add(OpbenefiPeer::CEDRIF,$orden->getCedrif());
    $reg2 = OpbenefiPeer::doSelectOne($b);
    if ($reg2)
    {
        if ($reg2->getCodordadi()!='')
        {
          if (($tag1!='') || ($tag2!=''))
          {
            if (($tag1=="SI" && $tipoben!='C') || ($tag2=="SI" && $tipoben=='C'))
            {
              $cuenta=$reg2->getCodord();
            }else if (($tag1=="SI" && $tipoben=='C') || ($tag2=="SI" && $tipoben!='C'))
            {
              $cuenta=$reg2->getCodordadi();
            }
          }else { $cuenta=$reg2->getCodord();}
        }else { $cuenta=$reg2->getCodord();}

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$cuenta);
        $reg3 = ContabbPeer::doSelectOne($c);
        if ($reg3)
        {
         $codigocuenta=$reg3->getCodcta();
         $tipo='C';
         $des="";
         $mon2=$orden->getMonord();
         $monto=$mon2;
         if ($moneda2!=$moneda) $monto=$monto*$valor;
        }else { $msj1='El Beneficiario no tiene una Cuenta de Orden válida asociada'; return true;}

       if ($reg2->getCodordadi()!='')
        {
          if (($tag1!='') || ($tag2!=''))
          {
            if (($tag1=="SI" && $tipoben!='C') || ($tag2=="SI" && $tipoben=='C'))
            {
              $cuenta2=$reg2->getCodpercon();
            }else if (($tag1=="SI" && $tipoben=='C') || ($tag2=="SI" && $tipoben!='C'))
            {
              $cuenta2=$reg2->getCodperconadi();
            }
          }else { $cuenta2=$reg2->getCodpercon();}
        }else { $cuenta2=$reg2->getCodpercon();}

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$cuenta2);
        $reg4 = ContabbPeer::doSelectOne($c);
        if ($reg4)
        {
         $codigocuenta2=$reg4->getCodcta();
         $tipo2='D';
         $des2="";
         $mon=$orden->getMonord();
         $monto2=$mon;
         if ($moneda2!=$moneda) $monto2=$monto2*$valor;
        }else { $msj2='El Beneficiario no tiene una Cuenta de Percontra válida asociada'; return true;}
    }

    $cuentas=$codigocuenta.'_'.$codigocuenta2;
    $tipos=$tipo.'_'.$tipo2;
    $descr=$des.'_'.$des2;
    $montos=$monto.'_'.$monto2;

     $clscommpro=new Comprobante();
     $clscommpro->setGrabar("N");
     $clscommpro->setNumcom($numerocomprob);
     $clscommpro->setReftra($reftra);
     $clscommpro->setFectra(date("d/m/Y",strtotime($orden->getFecemi())));
     $clscommpro->setDestra($orden->getDesord());
     $clscommpro->setCtas($cuentas);
     $clscommpro->setDesc($descr);
     $clscommpro->setMov($tipos);
     $clscommpro->setMontos($montos);
     $arrcompro[]=$clscommpro;

   return true;
  }

  public static function grabarFacturas($orden,$grid2)
  {
    $referencia=$orden->getNumord();
    //primero elimino todas las facturas, para luego guardar las que el usuario haya dejado en el grid
    Herramientas::EliminarRegistro('Opfactur','Numord',$orden->getNumord());
    $x=$grid2[0];
    if (count($x)!=0)
    {
    $j=0;
    while ($j<count($x))
    {
      if (($x[$j]['fecfac']!='') and (($x[$j]['numfac']!='') or ($x[$j]['notdeb']!='') or ($x[$j]['notcrd']!='')))
      {
        $factura= new Opfactur();
        $factura->setNumord($referencia);
        if ($x[$j]['tiptra']=='01')
        {
          $factura->setNumfac($x[$j]['numfac']);
        }
        else if ($x[$j]['tiptra']=='02')
        {
          $factura->setNumfac($x[$j]['notdeb']);
        }
        else
        {
          $factura->setNumfac($x[$j]['notcrd']);
        }

        //if ($x[$j]['tiptra']=='01')
        //{
          $factura->setFacafe($x[$j]['facafe']);
        //}
        $factura->setFecfac($x[$j]['fecfac']);
        $factura->setNumctr($x[$j]['numctr']);
        $factura->setTiptra($x[$j]['tiptra']);
        $factura->setPoriva($x[$j]['poriva']);
        if ($x[$j]['tiptra']=='03')
            $factura->setTotfac($x[$j]['totfac']*(-1));
        else
            $factura->setTotfac($x[$j]['totfac']);
        $factura->setExeiva($x[$j]['exeiva']);
        $factura->setBasimp($x[$j]['basimp']);
        $factura->setMonret($x[$j]['monret']);
        $factura->setMoniva($x[$j]['moniva']);
        $factura->setBasltf($x[$j]['basltf']);
        $factura->setPorltf($x[$j]['porltf']);
        $factura->setMonltf($x[$j]['monltf']);
        $factura->setBasislr($x[$j]['basislr']);
        if ($x[$j]['porislr']!="") {
          $porcenisrl=explode('_', $x[$j]['porislr']);
          $factura->setPorislr($porcenisrl[0]);
        }else {
          $factura->setPorislr(0);
        }

        $factura->setMonislr($x[$j]['monislr']);
        if ($factura->getMonislr()>0)
          $factura->setCodislr($x[$j]['codislr']);
        else
          $factura->setCodislr('');
        if ($x[$j]['rifalt']=='')
        $factura->setRifalt($orden->getCedrif());
        else
        $factura->setRifalt($x[$j]['rifalt']);
        $factura->setBasirs($x[$j]['basirs']);
        $factura->setPorirs($x[$j]['porirs']);
        $factura->setMonirs($x[$j]['monirs']);
        $factura->setCodirs($x[$j]['codirs']);
        $factura->setBasimn($x[$j]['basimn']);
        $factura->setPorimn($x[$j]['porimn']);
        $factura->setMonimn($x[$j]['monimn']);
        $factura->setCodimn($x[$j]['codimn']);
        $factura->setFecrecfac($x[$j]['fecrecfac']);
        $factura->setMnosuj($x[$j]['mnosuj']);
        $factura->setMdecre($x[$j]['mdecre']);
        $factura->setMonexo($x[$j]['monexo']);
        $factura->save();
      }
      $j++;
    }
   }

  }

  public static function grabarRetencion($orden,$grid3,$grid,$refiere,$referencias)
  {
    $referencia=$orden->getNumord();
    
     //Cambio de Moneda
    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    $codigopre="";
    $z=$grid[0];
    if ($referencias=='')
    { $referencias='_';}
    $refere=split('_',$referencias);
    $l=0;
    while ($l<count($z))
    {
      if ($z[$l]->getCodpre()!='')
      {
        $codigopre=$z[$l]->getCodpre();
        if ($refiere=='N')
        {
          $refer='NULO';
        }
        else
        {
          $refer=$refere[$l+1];
        }

        break;
      }
      $l++;
    }




    $x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['codtip']!='')
      {
        $opretord= new Opretord();
        $opretord->setNumord($referencia);
        $opretord->setCodtip($x[$j]['codtip']);
        $opretord->setMonret($x[$j]['montorete']*$valor);
        $opretord->setCodpre($codigopre);
        $opretord->setNumret('NOASIGNA');
        $opretord->setRefere($refer);
        $opretord->setCorrel(str_pad($j+1,3,'0',STR_PAD_LEFT));
        $opretord->setMonbas($x[$j]['base']*$valor);
        $opretord->save();
      }
     $j++;
    }
  }

  public static function grabarCausado($orden,$grid,$refiere,$referencias)
  {
    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   

     $c = new Criteria();
     $c->add(CpcausadPeer::REFCAU,$orden->getNumord());
     $causa = CpcausadPeer::doSelectOne($c);
     if (!$causa)
     {
       $causado = new Cpcausad();
       $causado->setRefcau($orden->getNumord());
       $causado->setTipcau($orden->getTipcau());
       $causado->setFeccau($orden->getFecemi());
       $causado->setAnocau(substr($orden->getFecemi(),0,4));
       $causado->setRefcom(null);
       $causado->setTipcom(null);
       $causado->setDescau($orden->getDesord());
       $causado->setDesanu(null);
       $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
       $aplrecop=H::getConfApp2('aplrecop', 'tesoreria', 'pagemiord');
       $acum=0;
       if ($comnoiva=='S' && $orden->getDocumento()!='N')
       {
        if (H::toFloat($orden->getMonorddisrgo())>0)
          $causado->setMoncau((H::toFloat($orden->getMonord())-H::toFloat($orden->getMonorddisrgo()))*$valor);
        else
          $causado->setMoncau((H::toFloat($orden->getMonord())-H::toFloat($orden->getMonrgo()))*$valor);
       }else if ($aplrecop=='S' && $orden->getDocumento()=='N'){
          $causado->setMoncau((H::toFloat($orden->getMonord())-H::toFloat($orden->getMonrgo()))*$valor);
       }else {
        if ($moneda2!=$moneda) $causado->setMoncau($orden->getMonord()*$valor);
        else $causado->setMoncau($orden->getMonord());       
       }
       $causado->setSalpag(0);
       $causado->setSalaju(0);
       $causado->setStacau('A');
       $causado->setCedrif($orden->getCedrif());
       if ($filsoldir=='S'){
         $causado->setCoddirec($orden->getCoddirec());
       }
       $causado->save();

       if ($referencias=='')
       { $referencias='_';}
       $refere=split('_',$referencias);
       $x=$grid[0];
       $j=0;
       while ($j<count($x))
       {
         $detalle = new Cpimpcau();
         $detalle->setRefcau($orden->getNumord());
         $detalle->setCodpre($x[$j]->getCodpre());
         $detalle->setMonimp($x[$j]->getMoncau()*$valor);
         $detalle->setMonpag(0);
         $detalle->setMonaju(0);
         $detalle->setStaimp('A');
         if ($refiere=='N')
         {
           $detalle->setRefere('NULO');
           $detalle->setRefprc('NULO');
         }
         else
         {
           if ($refiere=='C')
           {
             $detalle->setRefere($refere[$j+1]);
             $c = new Criteria();
             $c->add(CpimpcomPeer::CODPRE,$x[$j]->getCodpre());
             $c->add(CpimpcomPeer::REFCOM,$refere[$j+1]);
             $ref= CpimpcomPeer::doselectOne($c);
             if ($ref)
             {
              if ($ref->getRefere()!='')
              {
                $detalle->setRefprc($ref->getRefere());
              }
              else
              {
                $detalle->setRefprc('NULO');
              }

              if ($manevento=='S')
              {
                 $tipdoc=$causado->getTipcau();
                 $q= new Criteria();
                 $q->add(CpdisevePeer::REFDOC,$refere[$j+1]);
                 $q->add(CpdisevePeer::CODPRE,$x[$j]->getCodpre());
                 $q->add(CpdisevePeer::TIPMOV,'COM');
                 $tradis=CpdisevePeer::doSelectOne($q);
                 if ($tradis) {
                    $codeve=$tradis->getCodeve();
                    $cpdiseve= new Cpdiseve();
                    $cpdiseve->setRefdoc($orden->getNumord());
                    $cpdiseve->setCodpre($x[$j]->getCodpre());
                    $cpdiseve->setCodeve($codeve);
                    $cpdiseve->setMoneve($detalle->getMonimp());
                    $cpdiseve->setTipdoc($tipdoc);
                    $cpdiseve->setTipmov('CAU');
                    $cpdiseve->save();
                }
              }

             }
             else{$detalle->setRefprc('NULO');}
           }
           else
           {
             $detalle->setRefere('NULO');
             $detalle->setRefprc($refere[$j+1]);
           }
         }
         $detalle->save();
         $j++;
       }
    }
  }

  public static function datosRefere($codigo,$fec,&$fecha,&$tipomon,&$descripcion,&$tipo,&$destipo,&$elrif,&$descripcion2,&$msj,&$valmon,&$coddirec)
  {
    $valmon=0;
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');
    $c= new Criteria();
    $c->add(CpprecomPeer::REFPRC,$codigo);
    if ($filsoldir=='S'){
      $sql='cpprecom.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpprecomPeer::CODDIREC,$sql,Criteria::CUSTOM); 
    }
    $datos= CpprecomPeer::doselectOne($c);
    if ($datos)
    {
      if ($datos->getStaprc()=='A')
      {
      	  $SQL = "Select Sum(MonCau) as moncau from cpimpprc where refprc='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL,$reg))
          {
            $montocausado= $reg[0]['moncau'];
          }

          $SQL1 = "Select Sum(monimp - monaju) as monprc from cpimpprc where refprc='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL1,$reg2))
          {
            $montoprc= $reg2[0]['monprc'];
          }


        if ($montoprc > $montocausado)
        {
          $dateFormat = new sfDateFormat('es_VE');
          $fec1 = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));
          if ($datos->getFecprc()<= $fec1)
          {
            $descripcion=$datos->getDesprc();
            $fecha=date("d/m/Y",strtotime($datos->getFecprc()));
            $tipo=$datos->getTipprc();
            $elrif=$datos->getCedrif();
            $descripcion2=$datos->getDesprc();

            $c= new Criteria();
            $c->add(CpdocprcPeer::TIPPRC,$tipo);
            $datos2= CpdocprcPeer::doSelectOne($c);
            if ($datos2)
            {
              $destipo=$datos2->getNomext();
            }else {$destipo='';}
          }else { $msj='La Fecha del Precompromiso es Mayor a la Orden de Pago';}
        }else { $msj='El Precompromiso se encuentra totalmente Causado';}
      }else { $msj='El Precompromiso se encuentra anulado';}
    }else { 
      if ($filsoldir=='S')
        $msj='La Referencia No existe o no esta asociada al usuario';
      else
        $msj='La Referencia No existe';
    }
  }

  public static function encontroReferencia($arreglo,$referencia)
  {
    $posicion=1;
    $encontro=false;
    if ($arreglo=='')
    { $arreglo='_';}
    $arre=split('_',$arreglo);
    $indice=count($arre)-1;
    while (($posicion<=$indice) and (!$encontro))
    {
      if ($arre[$posicion]==$referencia)
      {
        $encontro=true;
      }else {$encontro=false;}
      $posicion++;
    }
    return $encontro;
  }

  public static function datosRefere2($codigo,$fec,$referencias,&$tipomon,&$fecha,&$descripcion,&$tipo,&$elrif,&$descripcion2,&$destipo,&$financiamiento,&$oppermanente,&$montocuo,&$msj,&$valmon,&$coddirec)
  {
    $montocausado=0;
    $msj="";
    $montoajustado=0;
    $valmon=0;
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr');

    $c= new Criteria();
    $c->add(CpcomproPeer::REFCOM,$codigo);
    if ($filsoldir=='S'){
      $sql='cpcompro.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
      $c->add(CpcomproPeer::CODDIREC,$sql,Criteria::CUSTOM); 
    }
    $datos= CpcomproPeer::doselectOne($c);
    if ($datos)
    {
      if (!self::encontroReferencia($referencias,$codigo))
      {
        if ($datos->getStacom()=='A')
        {
          $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$datos->getTipcom());
          $t= new Criteria();
          $trajo=CadefartPeer::doSelectOne($t);
          if ($trajo)
          {
          	if ($trajo->getComreqapr()=='S' || $reqaut=='S')
          	{
          		if ($datos->getAprcom()=='S')
          		{

          $SQL = "Select Sum(MonCau) as moncau from cpimpcom where refcom='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL,$reg))
          {
            $montocausado= $reg[0]['moncau'];
          }

          $SQL1 = "Select Sum(monimp-monaju) as moncom from cpimpcom where refcom='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL1,$reg2))
          {
            $montocom= $reg2[0]['moncom'];
          }

          if ($montocom > $montocausado)
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fec2 = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));

            if ($datos->getFeccom()<= $fec2)
            {
              $descripcion=$datos->getDescom();
              $fecha=date("d/m/Y",strtotime($datos->getFeccom()));
              $tipo=$datos->getTipcom();
              $elrif=$datos->getCedrif();
              $descripcion2=$datos->getDescom();
              $coddirec=$datos->getCoddirec();

              $c= new Criteria();
              $c->add(CpdoccomPeer::TIPCOM,$tipo);
              $datos3= CpdoccomPeer::doSelectOne($c);
              if ($datos3)
              {
                $destipo=$datos3->getNomext();
              }else {$destipo='';}
              $monedacom=0;
              $monedaord=0;
              $c= new Criteria();
              $c->add(CaordcomPeer::ORDCOM,$codigo);
              $datos2= CaordcomPeer::doSelectOne($c);
              if ($datos2)
              {

                if ($tipomon!=$datos2->getTipmon())
                {
                    $msj='La Moneda asociada al Compromiso no es la misma de la Orden';
                }else {
                    $tipomon=$datos2->getTipmon();
                    $valmon=number_format($datos2->getValmon(),6,',','.');
                }
                $financiamiento=$datos2->getTipfin();

               /* $sql="Select valmon from Tsdesmon where codmon='".$datos2->getTipmon()."' and fecmon=To_Date('".$fec."','DD/MM/YYYY') ";
                if (!Herramientas::BuscarDatos($sql,&$result))
                {
                  $c = new Criteria();
                  $c->add(TsdesmonPeer::CODMON,$datos2->getTipmon());
                  $c->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
                  $reg = TsdesmonPeer::doSelectOne($c);
                  if ($reg)
                  {
                    $monedaord=$reg->getValmon();
                  }else {$monedaord=0;}
                }else {$monedaord=$result[0]['valmon'];}
                $monedacom=$datos2->getValmon();*/

              } else {                  
                  $c1= new Criteria();
                  $c1->add(CpcomextPeer::REFCOM,$codigo);
                  $dat= CpcomextPeer::doSelectOne($c1);
                  if ($dat)
                  {
                    if ($tipomon!=$dat->getCodmon())
                    {
                        $msj='La Moneda asociada al Compromiso no es la misma de la Compromiso en Moneda Extranjera';
                    }else {
                        $tipomon=$dat->getCodmon();
                        $valmon=number_format($dat->getValmon(),6,',','.');
                    }
                  }else {
                      $tipomon=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
                      $valmon=number_format(H::getX_vacio('CODMON','Tsdesmon','Valmon',$tipomon),6,',','.');
                  }
                    
              }
              /*if ($monedacom!=$monedaord)
              {
                $monedaord='aqui se llama a la cajita para introducir la nueva tasa cambiaria';
              }*/


              /*$c= new Criteria();
               $c->add(OpdetperPeer::REFOPP,$codigo);
               $c->add(OpdetperPeer::FECPAG,null,CRITERIA::ISNULL);
               $c->addAscendingOrderByColumn(OpdetperPeer::FECINICUO);
               $registro= OpdetperPeer::doSelectOne($c);
               if ($registro)
               {
               $oppermanente=$codigo;
               $montocuo=$registro->getMoncuo();

               }else {$oppermanente=''; $montocuo='';}*/

              $oppermanente='';
              $montocuo='';

            }else { $msj='La Fecha de la Orden de Pago es menor a la del Compromiso';}
          }else { $msj='El Compromiso se encuentra totalmente Causado';}
        }else { $msj='El Compromiso no se encuentra Aprobado';}
        }
        else
        {
        	$SQL = "Select Sum(MonCau) as moncau from cpimpcom where refcom='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL,$reg))
          {
            $montocausado= $reg[0]['moncau'];
          }

          $SQL1 = "Select Sum(monimp-monaju) as moncom from cpimpcom where refcom='".$codigo."'";
          if (Herramientas::BuscarDatos($SQL1,$reg2))
          {
            $montocom= $reg2[0]['moncom'];
          }

          if (($montocom) > ($montocausado))
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fec2 = $dateFormat->format($fec, 'i', $dateFormat->getInputPattern('d'));

            if ($datos->getFeccom()<= $fec2)
            {
              $descripcion=$datos->getDescom();
              $fecha=date("d/m/Y",strtotime($datos->getFeccom()));
              $tipo=$datos->getTipcom();
              $elrif=$datos->getCedrif();
              $descripcion2=$datos->getDescom();
              $coddirec=$datos->getCoddirec();

              $c= new Criteria();
              $c->add(CpdoccomPeer::TIPCOM,$tipo);
              $datos3= CpdoccomPeer::doSelectOne($c);
              if ($datos3)
              {
                $destipo=$datos3->getNomext();
              }else {$destipo='';}
              $monedacom=0;
              $monedaord=0;
              $c= new Criteria();
              $c->add(CaordcomPeer::ORDCOM,$codigo);
              $datos2= CaordcomPeer::doSelectOne($c);
              if ($datos2)
              {
                $financiamiento=$datos2->getTipfin();

                if ($tipomon!=$datos2->getTipmon())
                {
                    $msj='La Moneda asociada al Compromiso no es la misma de la Orden';
                }else {
                    $tipomon=$datos2->getTipmon();
                    $valmon=number_format($datos2->getValmon(),6,',','.');
                }

                /*$sql="Select valmon from Tsdesmon where codmon='".$datos2->getTipmon()."' and fecmon=To_Date('".$fec."','DD/MM/YYYY') ";
                if (!Herramientas::BuscarDatos($sql,&$result))
                {
                  $c = new Criteria();
                  $c->add(TsdesmonPeer::CODMON,$datos2->getTipmon());
                  $c->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
                  $reg = TsdesmonPeer::doSelectOne($c);
                  if ($reg)
                  {
                    $monedaord=$reg->getValmon();
                  }else {$monedaord=0;}
                }else {$monedaord=$result[0]['valmon'];}
                $monedacom=$datos2->getValmon();*/
              }else {
                  $c1= new Criteria();
                  $c1->add(CpcomextPeer::REFCOM,$codigo);
                  $dat= CpcomextPeer::doSelectOne($c1);
                  if ($dat)
                  {
                    if ($tipomon!=$dat->getCodmon())
                    {
                        $msj='La Moneda asociada al Compromiso no es la misma de la Compromiso en Moneda Extranjera';
                    }else {
                        $tipomon=$dat->getCodmon();
                        $valmon=number_format($dat->getValmon(),6,',','.');
                    }
                  }else {
                      $tipomon=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
                      $valmon=number_format(H::getX_vacio('CODMON','Tsdesmon','Valmon',$tipomon),6,',','.');
                  }   
           }
              
              /*else {$monedacom=0;}
              if ($monedacom!=$monedaord)
              {
                $monedaord='aqui se llama a la cajita para introducir la nueva tasa cambiaria';
              }*/


              /*$c= new Criteria();
               $c->add(OpdetperPeer::REFOPP,$codigo);
               $c->add(OpdetperPeer::FECPAG,null,CRITERIA::ISNULL);
               $c->addAscendingOrderByColumn(OpdetperPeer::FECINICUO);
               $registro= OpdetperPeer::doSelectOne($c);
               if ($registro)
               {
               $oppermanente=$codigo;
               $montocuo=$registro->getMoncuo();

               }else {$oppermanente=''; $montocuo='';}*/

              $oppermanente='';
              $montocuo='';

            }else { $msj='La Fecha de la Orden de Pago es menor a la del Compromiso';}
          }else { $msj='El Compromiso se encuentra totalmente Causado';}
        }
        }else { $msj='El Tipo de Compromiso no existe';}
        }else { $msj='El Compromiso se encuentra anulado';}
      }else { $msj='La Referencia ya fue Causada';}
    }else { 
      if ($filsoldir=='S')
        $msj='La Referencia No existe o esta asociada al usuario';
      else
        $msj='La Referencia No existe';
    }
  }

  public static function actualizarPagemiord($orden,$grid2,$grid3)
  {
     $valor=$orden->getValmon();    
     $orden->setMonord($orden->getMonord()*$valor);
     $orden->setMonret($orden->getMonret()*$valor);
     $orden->setMondes($orden->getMondes()*$valor);
     $orden->save();
     self::grabarFacturas($orden,$grid2);
     self::grabarEmpresas($orden,$grid3);
  }

  public static function validarPagemiord($grid,$afecta,&$cod,&$msj,&$monto,$mone,$valm,$fecdoc)
  {
    $msj=-1;
    $cod="";
    $monto="";

    if (!self::UltimoChequeo($grid,$afecta,$codigo,$msj,$mondis,$mone,$valm,$fecdoc))
    {
        $msj=$msj;  $cod=$codigo; $monto=$mondis;
    }else { $msj=-1; $cod=""; $monto="";}
  }

  public static function UltimoChequeo($grid,$afecta,&$codigo,&$msj,&$mondis,$mone,$valm,$fecdoc)
  {
   $ultimochequeo=true;
   $msj="";
   $mondis=0;
   $codigo="";
   $datosGrid = array();
   $moneda=$mone;
   $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
   if ($moneda2!=$moneda)
      $valor=H::toFloat($valm,6);
   else
     $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
   
   if ($afecta==1)
   {
       $x=$grid[0];
       $j=0;
       while ($j<count($x))
       {
          $codigo=$x[$j]->getCodpre();
          $a= new Criteria();
            $a->add(CpasiiniPeer::PERPRE,'00');
            $a->add(CpasiiniPeer::CODPRE,$codigo);
            $data2= CpasiiniPeer::doSelectOne($a);
            if (!$data2)
            {
                $ultimochequeo=false;
                $msj='512';
                break;
            }

            $codpre=H::getCodPreDis($codigo);       
            $monto=$x[$j]->getMoncau()*$valor;
            $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
            if ($pos==0)
            {
             $i=count($datosGrid)+1;
             $datosGrid[$i-1]["codpre"]=$codpre;
             $datosGrid[$i-1]["monimp"]=$monto;
            }
            else
            {
             $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$monto;
            }
        $j++;
       }
        if ($ultimochequeo)
        {
            $p=0;
            $codigo="";
            while ($p<count($datosGrid))
            {              
              $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$fecdoc);
              if($datosGrid[$p]["monimp"] > $disponible){
                if ($codigo!='')
                  $codigo.=', '.$datosGrid[$p]["codpre"];
                else
                  $codigo=$datosGrid[$p]["codpre"];
                $ultimochequeo=false;
                $mondis=$disponible;
                $msj='513';
                //break;
              }
              $p++;
            }
        } 
       
   }
   return $ultimochequeo;
  }


  public static function encontrarIva($grid,$col,$id,&$codiva)
  {
    $x=$grid[0];
    $encontrariva=0;
    $codiva='';
    $j=0;
    $r="";
    while ($j<count($x))
    {
      $r=$x[$j][$col];

      $c= new Criteria();
      $c->add(TsretivaPeer::CODRET,$r);
      $reg= TsretivaPeer::doSelectOne($c);
      if ($reg)
      {
        $b= new Criteria();
        $b->add(CarecargPeer::CODRGO,$reg->getCodrec());
        $reg2=CarecargPeer::doSelectOne($b);
        if ($reg2)
        {
          $encontrariva=$reg2->getMonrgo();
          $codiva=$r;
          break;
        }
      }
      $j++;
    }

    return $encontrariva;
  }

  public static function encontrarIslr($grid,$columna,$colmonto,$tipo,$id,&$codislr)
  {
    $x=$grid[0];
    $encontrarislr=0;
    $j=0;
    $col1="";
    $col2="";
    $codislr="";
    while ($j<count($x))
    {
     $col1=$x[$j][$columna];
     $col2=$x[$j][$colmonto];

      switch($tipo)
      {
        case "ISLR":
          $c= new Criteria();
          $c->add(TsrepretPeer::CODREP,'002');
          $c->add(TsrepretPeer::CODRET,$col1);
          $reg= TsrepretPeer::doSelectOne($c);
          break;
       case "1*MIL":
         $c= new Criteria();
         $c->add(TsrepretPeer::CODREP,'003');
         $c->add(TsrepretPeer::CODRET,$col1);
         $reg= TsrepretPeer::doSelectOne($c);
         break;
       case "IRS":
         $c= new Criteria();
         $c->add(TsrepretPeer::CODREP,'005');
         $c->add(TsrepretPeer::CODRET,$col1);
         $reg= TsrepretPeer::doSelectOne($c);
         break;
       case "IMN":
         $c= new Criteria();
         $c->add(TsrepretPeer::CODREP,'004');
         $c->add(TsrepretPeer::CODRET,$col1);
         $reg= TsrepretPeer::doSelectOne($c);
         break;     
      }
      if ($reg)
      {
        $encontrarislr=$col2;
        $codislr=$col1;
        break;
      }
      $j++;
    }
    return $encontrarislr;
  }

  public static function llenarComboIva($gridret,$colcod,$numord,$id,$arreglo)
  {
    $comboboxiva=array();
    $x=$gridret[0];
    $j=0;
    if (count($x)>0)
    {
    if ($id=="" && $arreglo!="")
    {
      $arre=split('_',$arreglo);
      $col1="";
      while ($j<count($x))
      {
      $col1=$x[$j][$colcod];

      $c= new Criteria();
      $c->add(TsretivaPeer::CODRET,$col1);
      $resul= TsretivaPeer::doSelect($c);
      if ($resul)
      {
        foreach ($resul as $codigo)
        {
          $z=0;
          while ($z<(count($arre)-1))
          {
            $b= new Criteria();
            $b->add(CargosolPeer::REQART,$arre[$z+1]);
            $b->add(CargosolPeer::CODRGO,$codigo->getCodrec());
            $result2= CargosolPeer::doSelectOne($b);
            if ($result2)
            {
              $a= new Criteria();
              $a->add(CarecargPeer::CODRGO,$result2->getCodrgo());
              $result3= CarecargPeer::doSelectOne($a);
              if ($result3)
              {
              //$comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
                $comboboxiva[] = $col1.'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
              }
            }
            else
            {
            $a= new Criteria();
            $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
            $result3= CarecargPeer::doSelectOne($a);
            if ($result3)
            {
              //$comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
              $comboboxiva[] = $col1.'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
            }
          }
            $z++;
          }
        }
      }
      $j++;
    }
  }
  else if ($id=="" && $arreglo=="")
  {
     $col1="";
      while ($j<count($x))
      {
       $col1=$x[$j][$colcod];

       $c= new Criteria();
       $c->add(TsretivaPeer::CODRET,$col1);
       $resul= TsretivaPeer::doSelect($c);
       if ($resul)
       {
        foreach ($resul as $codigo)
        {
         $a= new Criteria();
         $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
         $result3= CarecargPeer::doSelectOne($a);
         if ($result3)
         {
          //$comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
          $comboboxiva[] = $col1.'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
         }
        }
      }
     $j++;
    }
  }else if ($id!="")
  {
    $referencias="";
    $sql="select distinct (refere) as refere from cpimpcau where refcau='".$numord."'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $c= new Criteria();
      $c->add(OpordpagPeer::NUMORD,$numord);
      $dat=OpordpagPeer::doSelectOne($c);
      if ($dat)
      {
        $a= new Criteria();
        $a->add(CpdoccauPeer::TIPCAU,$dat->getTipcau());
        $dat2=CpdoccauPeer::doSelectOne($a);
        if ($dat2)
        {
          if ($dat2->getRefier()=='C')
          {
            foreach ($result as $ref)
            {
             $referencias=$referencias.'_'.$ref["refere"];
            }

            $arreglo=$referencias;
            $arre=split('_',$arreglo);
            $col1="";
            while ($j<count($x))
            {
              $col1=$x[$j][$colcod];

              $c= new Criteria();
              $c->add(TsretivaPeer::CODRET,$col1);
              $resul= TsretivaPeer::doSelect($c);
              if ($resul)
              {
               foreach ($resul as $codigo)
               {
                $z=0;
                while ($z<(count($arre)-1))
                {
                 $b= new Criteria();
                 $b->add(CargosolPeer::REQART,$arre[$z+1]);
                 $b->add(CargosolPeer::CODRGO,$codigo->getCodrec());
                 $result2= CargosolPeer::doSelectOne($b);
                 if ($result2)
                 {
                  $a= new Criteria();
                  $a->add(CarecargPeer::CODRGO,$result2->getCodrgo());
                  $result3= CarecargPeer::doSelectOne($a);
                  if ($result3)
                  {
                   //$comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
                   $comboboxiva[] = $col1.'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
                  }
                 }
                 else
                 {
                   $a= new Criteria();
                $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
                $result3= CarecargPeer::doSelectOne($a);
                if ($result3)
                {
                  //$comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
                    $comboboxiva[] = $col1.'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
                }
                 }
                $z++;
                }
               }
              }
            $j++;
           }
          }
          else
          {
            $col1="";
            while ($j<count($x))
            {
             $col1=$x[$j][$colcod];

             $c= new Criteria();
             $c->add(TsretivaPeer::CODRET,$col1);
             $resul= TsretivaPeer::doSelect($c);
             if ($resul)
             {
              foreach ($resul as $codigo)
              {
               $a= new Criteria();
               $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
               $result3= CarecargPeer::doSelectOne($a);
               if ($result3)
               {
                //$comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
                 $comboboxiva[] = $col1.'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
               }
              }
             }
             $j++;
             }
           }
        }
      }
    }
    else
    {
      $col1="";
      while ($j<count($x))
      {
       $col1=$x[$j][$colcod];

       $c= new Criteria();
       $c->add(TsretivaPeer::CODRET,$col1);
       $resul= TsretivaPeer::doSelect($c);
       if ($resul)
       {
        foreach ($resul as $codigo)
        {
         $a= new Criteria();
         $a->add(CarecargPeer::CODRGO,$codigo->getCodrec());
         $result3= CarecargPeer::doSelectOne($a);
         if ($result3)
         {
          //$comboboxiva[$result3->getMonrgo()] = $col1.'_'.$result3->getNomrgo();
          $comboboxiva[] = $col1.'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
         }
        }
       }
      $j++;
     }
    }
  }
  }
  else
  {
    $a= new Criteria();
     $result3= CarecargPeer::doSelect($a);
     if ($result3)
     {
       foreach ($result3 as $obj)
       {
         //$comboboxiva[$obj->getMonrgo()] = $obj->getCodrgo().'_'.$obj->getNomrgo();
         $comboboxiva[] = $obj->getCodrgo().'_'.$obj->getNomrgo().'_'.$obj->getMonrgo();
       }
     }
  }
      return $comboboxiva;
 }

  public static function llenarComboIslr($gridret,$colcod,$id)
  {
    $x=$gridret[0];
    $comboboxislr=array();
    $col1="";
    $j=0;
   if (count($x)>0)
   {
    while ($j<count($x))
    {
      $col1=$x[$j][$colcod];

      $c= new Criteria();
      $c->add(TsrepretPeer::CODREP,'002');
      $c->add(TsrepretPeer::CODRET,$col1);
      $resul= TsrepretPeer::doSelectOne($c);
      if ($resul)
      {
        $b= new Criteria();
        $b->add(OptipretPeer::CODTIP,$col1);
        $result2= OptipretPeer::doSelectOne($b);
        if ($result2)
        {
         if ($result2->getPorret()>0)
         {
           $comboboxislr[$result2->getPorret().'_'.$col1] = $col1.'_'.$result2->getDestip();
         }else{
         	$comboboxislr[$result2->getPorsus().'_'.$col1] = $col1.'_'.$result2->getDestip();
         }
        }
      }
     $j++;
    }
   }
   else
   {
    $b= new Criteria();
    $result2= OptipretPeer::doSelect($b);
    if ($result2)
    {
      foreach ($result2 as $obj2)
      {
        $comboboxislr[$obj2->getPorret().'_'.$obj2->getCodtip()] = $obj2->getCodtip().'_'.$obj2->getDestip();
      }
    }
   }
    return $comboboxislr;
  }

  public static function llenarComboIrs($gridret,$colcod,$id)
  {
    $x=$gridret[0];
    $comboboxirs=array();
    $col1="";
    $j=0;
   if (count($x)>0)
   {
    while ($j<count($x))
    {
      $col1=$x[$j][$colcod];

      $c= new Criteria();
      $c->add(TsrepretPeer::CODREP,'005');
      $c->add(TsrepretPeer::CODRET,$col1);
      $resul= TsrepretPeer::doSelectOne($c);
      if ($resul)
      {
        $b= new Criteria();
        $b->add(OptipretPeer::CODTIP,$col1);
        $result2= OptipretPeer::doSelectOne($b);
        if ($result2)
        {
         if ($result2->getPorret()>0)
         {
           $comboboxirs[$result2->getPorret()] = $col1.'_'.$result2->getDestip();
         }else{
         	$comboboxirs[$result2->getPorsus()] = $col1.'_'.$result2->getDestip();
         }
        }
      }
     $j++;
    }
   }
   else
   {
    $b= new Criteria();
    $result2= OptipretPeer::doSelect($b);
    if ($result2)
    {
      foreach ($result2 as $obj2)
      {
        $comboboxirs[$obj2->getPorret()] = $obj2->getCodtip().'_'.$obj2->getDestip();
      }
    }
   }
    return $comboboxirs;
  }
  
  public static function llenarComboImn($gridret,$colcod,$id)
  {
    $x=$gridret[0];
    $comboboximn=array();
    $col1="";
    $j=0;
   if (count($x)>0)
   {
    while ($j<count($x))
    {
      $col1=$x[$j][$colcod];

      $c= new Criteria();
      $c->add(TsrepretPeer::CODREP,'004');
      $c->add(TsrepretPeer::CODRET,$col1);
      $resul= TsrepretPeer::doSelectOne($c);
      if ($resul)
      {
        $b= new Criteria();
        $b->add(OptipretPeer::CODTIP,$col1);
        $result2= OptipretPeer::doSelectOne($b);
        if ($result2)
        {
         if ($result2->getPorret()>0)
         {
           $comboboximn[$result2->getPorret()] = $col1.'_'.$result2->getDestip();
         }else{
         	$comboboximn[$result2->getPorsus()] = $col1.'_'.$result2->getDestip();
         }
        }
      }
     $j++;
    }
   }
   else
   {
    $b= new Criteria();
    $result2= OptipretPeer::doSelect($b);
    if ($result2)
    {
      foreach ($result2 as $obj2)
      {
        $comboboximn[$obj2->getPorret()] = $obj2->getCodtip().'_'.$obj2->getDestip();
      }
    }
   }
    return $comboboximn;
  }  

  public static function facturar($numord,$id,$gridret,$arreglo,&$eliva,&$elislr,&$elirs,&$eltimbre,&$msj,&$comboiva,&$comboislr,&$comboirs,&$comboimn,&$elimn,&$codiva,&$codislr,&$codirs,&$codimn,&$codaxmil)
  {
    $eliva=0;
    $elislr=0;
    $eltimbre=0;
    $elirs=0;
    $elimn=0;
    $comboiva=array();
    $comboislr=array();
    $comboirs=array();
    $comboimn=array();
    if ($numord!="")
    {
      if ($id=="")
      {
        $eliva=self::encontrarIva($gridret,'codtip',$id,$codiva);
        $elislr=self::encontrarIslr($gridret,'codtip','montorete','ISLR',$id,$codislr);
        $elirs=self::encontrarIslr($gridret,'codtip','montorete','IRS',$id,$codirs);
        $elimn=self::encontrarIslr($gridret,'codtip','montorete','IMN',$id,$codimn);
        $eltimbre=self::encontrarIslr($gridret,'codtip','montorete','1*MIL',$id,$codaxmil);
        $comboiva=self::llenarComboIva($gridret,'codtip',$numord,$id,$arreglo);
        $comboislr=self::llenarComboIslr($gridret,'codtip','destip','porret',$id);
        $comboirs=self::llenarComboIrs($gridret,'codtip','destip','porret',$id);
        $comboimn=self::llenarComboImn($gridret,'codtip','destip','porret',$id);
      }
      else
      {
        $eliva=self::encontrarIva($gridret,'codtip',$id,$codiva);
        $elislr=self::encontrarIslr($gridret,'codtip','montoret','ISLR',$id,$codislr);
        $eltimbre=self::encontrarIslr($gridret,'codtip','montoret','1*MIL',$id,$codaxmil);
        $elirs=self::encontrarIslr($gridret,'codtip','montoret','IRS',$id,$codirs);
        $elimn=self::encontrarIslr($gridret,'codtip','montoret','IMN',$id,$codimn);
        $comboiva=self::llenarComboIva($gridret,'codtip',$numord,$id,$arreglo);
        $comboislr=self::llenarComboIslr($gridret,'codtip','destip','porret',$id);
        $comboirs=self::llenarComboIrs($gridret,'codtip','destip','porret',$id);
        $comboimn=self::llenarComboImn($gridret,'codtip','destip','porret',$id);
      }

      /*if (($eliva!=0) or ($elislr!=0) or ($eltimbre)!=0)
      {
        $msj="";
      }
      else
      {
         $msj='Aun no se han aplicado Retenciones';
      }*/
    }
  }

  public static function verificarStatusComprobante($numero)
  {
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numero);
    $datos= ContabcPeer::doSelectOne($c);
    if ($datos)
    {
      if ($datos->getStacom()!='A')
      {
        $verificarstatuscomprobante=true;
      }
      else { $verificarstatuscomprobante=false;}
    }
    else { $verificarstatuscomprobante=false;}

   return $verificarstatuscomprobante;
  }

  public static function eliminarCausado($numord)
  {
    $tipcau=H::getX_vacio('NUMORD','Opordpag','Tipcau',$numord);
    $afecau=H::getX_vacio('TIPCAU','Cpdoccau','Afecau',$tipcau);
    if ($afecau=='S') {
      Herramientas::EliminarRegistro('Cpimpcau','Refcau',$numord);
      
     $w= new Criteria();
     $w->add(CpmovfuefinPeer::REFMOV,$numord);
     $w->add(CpmovfuefinPeer::TIPMOV,'CAUSADO');
     $cpmovfuefins = CpmovfuefinPeer::doSelect($w);
     if ($cpmovfuefins) {
      foreach ($cpmovfuefins as $cpmovfuefin) {
        $cpmovfuefin->delete();
      }
     }

      $c= new Criteria();
      $c->add(CpcausadPeer::REFCAU,$numord);
      $dato= CpcausadPeer::doSelectOne($c);
      if ($dato)
      {
      $dato->delete();
      }
    }
  }

  public static function eliminarRetenciones($numord,&$puedeeliminar,&$msj)
  {
    $haypagosret=false;
    $msj="";
    $sql="Select numord as numord, codtip as codtip, numret as numret from opretord where numord='".$numord."' and numret<>'NOASIGNA' group by numord,codtip,numret";
    $result=array();
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $j=0;
      while ($j<count($result))
      {
        $ordenret=$result[$j]['numret'];
        $c= new Criteria();
        $c->add(OpordpagPeer::STATUS,'N',Criteria::NOT_EQUAL);
        $c->add(OpordpagPeer::NUMORD,$ordenret);
        $dato= OpordpagPeer::doSelectOne($c);
        if ($dato)
        {
          $msj="Una de las Ordenes de Pago ya fue Pagada";
          $haypagosret=true;
          $puedeeliminar=false;
          break;
        }
       $j++;
      }

      if (!$haypagosret)
      {
        $tempnumord=$numord;
        $puedeeliminar=true;
        $z=0;
        while ($z<count($result))
        {
          $numord=$result[$z]['numret'];
          $b= new Criteria();
          $b->add(OpordpagPeer::NUMORD,$result[$z]['numret']);
          $datos= OpordpagPeer::doSelectOne($b);
          if ($datos)
          {
          if ($datos->getStatus()=='A')
          {
            $msj="La Orden de Pago ha sido Anulada";
            break;
          }

          if (($datos->getNumche()=='') || (strlen($datos->getNumche())==0))
          {
            Herramientas::EliminarRegistro('Opdetord','Numord',$numord);
            self::EliminarCausado($numord);
            self::eliminarOPP($numord);
            $datos->delete();
          }
          else { $msj="La Orden ya fue Pagada en el Módulo de Bancos"; break;}
          }
         $z++;
        }

        $numord=$tempnumord;
        $f= new Criteria();
        $f->add(OpretordPeer::NUMORD,$numord);
        $reg= OpretordPeer::doSelect($f);
        if ($reg)
        {
          foreach ($reg as $opretord)
          {
          $opretord->delete();
          }
        }
      }
    }
    else
    {
      $puedeeliminar=true;
      $f= new Criteria();
      $f->add(OpretordPeer::NUMORD,$numord);
      $reg= OpretordPeer::doSelect($f);
      if ($reg)
      {
       foreach ($reg as $opretord)
       {
        $opretord->delete();
       }
      }
    }
  }

  public static function eliminarComprob($fecha,$numcomprob)
  {
   $b= new Criteria();
   //$b->add(Contabc1Peer::FECCOM,$fecha);
   $b->add(Contabc1Peer::NUMCOM,$numcomprob);
   Contabc1Peer::doDelete($b);

   $c = new Criteria();
   //$c->add(ContabcPeer::FECCOM,$fecha);
   $c->add(ContabcPeer::NUMCOM,$numcomprob);
   ContabcPeer::doDelete($c);
  }

  public static function eliminarOrdenRetencion($orden)
  {
    $c= new Criteria();
    $c->add(OpretordPeer::NUMRET,$orden);
    $regis= OpretordPeer::doSelect($c);
    if ($regis)
    {
      foreach ($regis as $opretord)
      {
        $opretord->setNumret('NOASIGNA');
        $opretord->save();
      }
    }
  }

  public static function anularComprobOrden($numero,$fecha,$desanu,&$msj)
  {
    $msj="";
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numero);
    $resul= ContabcPeer::doSelectOne($c);
    if ($resul)
    {
      $numcom= 'AR'.substr($resul->getNumcom(),2,6);
      $fecha_aux=split("/",$fecha);
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

      $contabc= new Contabc();
      $contabc->setNumcom($numcom);
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $contabc->setFeccom($fec);}
      else { $contabc->setFeccom(date('Y-m-d'));}
      $desanucom=H::getConfAppGen('desanucom');
      if ($desanucom=='S')
        $contabc->setDescom($desanu);
      else
        $contabc->setDescom($resul->getDescom());      
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setMoncom($resul->getMoncom());
      $contabc->save();

      $a= new Criteria();
      $a->add(Contabc1Peer::NUMCOM,$numero);
      $a->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
      $resul2= Contabc1Peer::doSelect($a);
      if ($resul2)
      {
        $asiento=0;
        foreach ($resul2 as $datos)
        {
           $numcom1= 'AR'.substr($datos->getNumcom(),2,6);
          $contabc1= new Contabc1();
          $contabc1->setNumcom($numcom1);
          if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
          { $contabc1->setFeccom($fec);}
          $contabc1->setCodcta($datos->getCodcta());
          $asiento= $asiento + 1;
          $contabc1->setNumasi($asiento);
          $contabc1->setRefasi($datos->getRefasi());
          $contabc1->setDesasi($datos->getDesasi());
          if ($datos->getDebcre()=='D')
          {  $contabc1->setDebcre('C');}
          else { $contabc1->setDebcre('D');}
          $contabc1->setMonasi($datos->getMonasi());
          $contabc1->save();
        }
      }
    }
    else
    {
      $msj="El Comprobante Nro. ".$numero."no fue Anulado";
    }
  }

  public static function anularRetenciones($numero,&$msJ,&$puede_eliminar)
  {
    $msJ="";
    $puede_eliminar=true;
    $tipcau=H::getX_vacio('NUMORD', 'Opordpag', 'Tipcau', $numero);
     $ordret=H::getX('codemp','Opdefemp','Ordret','001');
    if ($tipcau==$ordret){
        $h= new Criteria();
         $h->add(OpretordPeer::NUMRET,$numero);
         $result3= OpretordPeer::doSelect($h);
         if ($result3)
         {
           foreach ($result3 as $opretord)
           {
             $opretord->setNumret('NOASIGNA');
             $opretord->save();
         }
       }
    }else {
    $c= new Criteria();
    $c->add(OpretordPeer::NUMRET,'NOASIGNA',Criteria::NOT_EQUAL);
    $c->add(OpretordPeer::NUMORD,$numero);
    $result= OpretordPeer::doSelect($c);
    if ($result)
    {
      foreach ($result as $opretord)
      {
        $b= new Criteria();
        $b->add(OpordpagPeer::NUMORD,$opretord->getNumret());
        $result2= OpordpagPeer::doSelectOne($b);
        if ($result2)
        {
          if ($result2->getStatus()!='A')
          {
            $msJ="Una de las Retenciones no se encuentra Anulada";
            $puede_eliminar=false;
            return true;
          }          
        }
      }
    }
  }
    /*else
    {
     $puede_eliminar=true;
     $h= new Criteria();
     $h->add(OpretordPeer::NUMORD,$numero);
     $result3= OpretordPeer::doSelect($h);
     if ($result3)
     {
       foreach ($result3 as $opretord)
       {
         $opretord->setNumret($opretord->getNumord());
         $opretord->save();
       }
     }else {
         $h= new Criteria();
         $h->add(OpretordPeer::NUMRET,$numero);
         $result3= OpretordPeer::doSelect($h);
         if ($result3)
         {
           foreach ($result3 as $opretord)
           {
             $opretord->setNumret('NOASIGNA');
             $opretord->save();
         }
     }
    }
    }*/
    return true;
  }

  public static function anularCausado($numero,$fecha,$desc)
  {
    $tipcau=H::getX_vacio('NUMORD','Opordpag','Tipcau',$numero);
    $afecau=H::getX_vacio('TIPCAU','Cpdoccau','Afecau',$tipcau);
    if ($afecau=='S') {      
      $fecha_aux=split("/",$fecha);
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

      $r= new Criteria();
      $r->add(CpcausadPeer::REFCAU,$numero);
      $resul= CpcausadPeer::doSelectOne($r);
      if ($resul)
      {
        $resul->setStacau('N');
        if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
        { $resul->setFecanu($fec);}
        $resul->setDesanu($desc);
        $resul->save();
      }

      $sql="update cpimpcau set staimp='N' where refcau='".$numero."'";
      Herramientas::insertarRegistros($sql);

      $c= new Criteria();
      $c->add(CpmovfuefinPeer::REFMOV,$numero);
      $c->add(CpmovfuefinPeer::TIPMOV,'CAUSADO');
      $resc= CpmovfuefinPeer::doSelect($c);
      if ($resc){
        foreach ($resc as $rs){
            $rs->setStamov('N');
            $rs->save();
          }
      }
    }
  }

  public static function anularComprob($numero,$fecha,$desc,$compadicional,$generaotro,&$msj,$desanu)
  {
    $msj="";
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numero);
    $resul= ContabcPeer::doSelectOne($c);
    if ($resul)
    {
      $fecha_aux=split("/",$fecha);
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
      
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $fecc=$fec;}
      else { $fecc=date('Y-m-d');}
      $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
      if ($confcorcom=='N')
      $numcom= 'RE'.substr($resul->getNumcom(),2,6);
      else {
      $numcom= Comprobante::Buscar_Correlativo($fecc);
        $antponera="";
        $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
        if ($varemp) {
        if(array_key_exists('generales',$varemp)) {
           if(array_key_exists('antponera',$varemp['generales']))
           {
            $antponera=$varemp['generales']['antponera'];
           }
          }
        }
        if ($antponera=='S')
        {
            $numcom= 'A'.substr($numcom,1,7);
        }        
      }


      $contabc= new Contabc();
      $contabc->setNumcom($numcom);
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $contabc->setFeccom($fec);}
      else { $contabc->setFeccom(date('Y-m-d'));}
      $desanucom=H::getConfAppGen('desanucom');
      if ($desanucom=='S')
        $contabc->setDescom($desanu);
      else
        $contabc->setDescom($resul->getDescom().' - '.H::getX_vacio('NUMCOM','Opordpag', 'Numord',$numero)); 
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setReftra($resul->getReftra());
      $contabc->setMoncom($resul->getMoncom());
      $contabc->save();

      $a= new Criteria();
      $a->add(Contabc1Peer::NUMCOM,$numero);
      $a->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
      $resul2= Contabc1Peer::doSelect($a);
      if ($resul2)
      {
        foreach ($resul2 as $datos)
        {
          $numcom1= $numcom;
          $contabc1= new Contabc1();
          $contabc1->setNumcom($numcom1);
          if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
          { $contabc1->setFeccom($fec);}
          $contabc1->setCodcta($datos->getCodcta());
          $contabc1->setNumasi($datos->getNumasi());
          $contabc1->setRefasi($datos->getRefasi());
          $contabc1->setDesasi($datos->getDesasi());
          if ($datos->getDebcre()=='D')
          {  $contabc1->setDebcre('C');}
          else { $contabc1->setDebcre('D');}
          $contabc1->setMonasi($datos->getMonasi());
          $contabc1->save();
        }
      }
    }
    else
    {
      $msj="El Comprobante Nro. ".$numero."no fue Anulado";
      return true;
    }

  /*if ($compadicional=='S')
  {
    if ($generaotro==true)
    {
      $generaotro=false;
      $p= new Criteria();
      $p->add(ContabcPeer::NUMCOM,$numero);
      $resul5= ContabcPeer::doSelectOne($p);
      if ($resul5)
     {
      $numcom= 'RE'.substr($resul5->getNumcom(),2,6);
      $fecha_aux=split("/",$fecha);
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

      $contabcotro= new Contabc();
      $contabcotro->setNumcom($numcom);
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $contabcotro->setFeccom($fec);}
      else { $contabcotro->setFeccom(date('Y-m-d'));}
      $contabcotro->setDescom($desc);
      $contabcotro->setStacom('D');
      $contabcotro->setTipcom(null);
      $contabcotro->setMoncom($resul5->getMoncom());
      $contabcotro->save();

      if ($compadicional=='S')
      {
        $l= new Criteria();
        $l->add(Contabc1Peer::NUMCOM,$numero);
        $l->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
        $resul6= Contabc1Peer::doSelect($l);
        if ($resul6)
       {
        foreach ($resul6 as $datos1)
        {
          $numcom1= 'RE'.substr($datos1->getNumcom(),2,6);
          $contabc1otro= new Contabc1();
          $contabc1otro->setNumcom($numcom1);
          if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
          { $contabc1otro->setFeccom($fec);}
          $contabc1otro->setCodcta($datos1->getCodcta());
          $contabc1otro->setNumasi($datos1->getNumasi());
          $contabc1otro->setRefasi($datos1->getRefasi());
          $contabc1otro->setDesasi($datos1->getDesasi());
          if ($datos1->getDebcre()=='D')
          {  $contabc1otro->setDebcre('C');}
          else { $contabc1otro->setDebcre('D');}
          $contabc1otro->setMonasi($datos1->getMonasi());
          $contabc1otro->save();
        }
       }
      }
     }
     else
     {
        $msj="El Comprobante Nro. ".$numero."no fue Anulado";
        return true;
     }
    }
  }*/
  return true;
  }

  public static function eliminarOPP($numero)
  {
    $c= new Criteria();
    $c->add(OpdetperPeer::NUMORD,$numero);
    $resultado= OpdetperPeer::doSelectOne($c);
    if ($resultado)
    {
      $resultado->setNumord(null);
      $resultado->setFecpag(null);
      $resultado->save();
    }
  }

  public static function validarGrid($codigo,$longitud,$tipcau,&$error1,&$error2,&$error3,&$error4)
  {
    $error1="";
    $error2="";
    $error3="";
    $error4="";
    $filcatpre=H::getConfApp2('filcatpre', 'tesoreria', 'pagemiord');  
    $lonmas=strlen(H::getObtener_FormatoCategoria())+1;   
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');

    $c= new Criteria();
    if ($filcatpre=='S'){
      $sql='cpdeftit.codpre=\''.$codigo.'\' and substr(cpdeftit.codpre,0,'.$lonmas.')  in (select codcat from "SIMA_USER".segcatusu where loguse=\''.$loguse.'\')';
      $c->add(CpdeftitPeer::CODPRE,$sql,Criteria::CUSTOM);
    }else $c->add(CpdeftitPeer::CODPRE,$codigo);
    $data=CpdeftitPeer::doSelectOne($c);
    if (!$data)
    {
    $error1='N';
    }

    if (strlen($codigo)!=$longitud)
    {
      $error2='N';
    }

    $c= new Criteria();
    $c->add(CpasiiniPeer::PERPRE,'00');
    $c->add(CpasiiniPeer::CODPRE,$codigo);
    $data2=CpasiiniPeer::doSelectOne($c);
    if (!$data2)
    {
    $error3='N';
    }

    $orddea=H::getX_vacio('CODEMP','Opdefemp','Ordant','001');
    $orddeacom=H::getX_vacio('CODEMP','Opdefemp','Ordantcom','001');
    if (($orddea!='' && $orddea==$tipcau) || ($orddeacom!='' && $orddeacom==$tipcau))
    {
      $maspar=H::getMascaraPartida();
      $lengcat=strlen(H::getMascaraCategoria());
      $auxpar=split('-', $maspar);
      if (strlen($auxpar[0])==1)
      {
        $lengpar=strlen($auxpar[0].'-'.$auxpar[1]);
      }else $lengpar=strlen($auxpar[0]);

    if (substr($codigo, $lengcat+1,$lengpar)!='411' && substr($codigo, $lengcat+1,$lengpar)!='4-11')
    {
       $error4='S';
    } 
    }    
  }

  public static function montoValido($fila,$monto, $letra, $codigo,$afecta,&$msj,&$mondis,&$sobregiro,$perhas='12')
  {
    $anocie=substr(Herramientas::getX('CODEMP','Cpdefniv','feccie','001'),0,4);
    $msj="";
    $montovalido=true;
    $sobregiro=false;
    $monto2=$monto;
    $mondis=0;
    if ($afecta==1)
    {
      if ($letra=='N')
      {
        $c= new Criteria();
        $c->add(CpasiiniPeer::CODPRE,$codigo);
        $c->add(CpasiiniPeer::PERPRE,'00');
        $c->add(CpasiiniPeer::ANOPRE,$anocie);
        $data=CpasiiniPeer::doSelectOne($c);
        if ($data)
        {
          $codpre=H::getCodPreDis($codigo);       
          $mondis=SolicituddeEgresos::montoDisponible($codpre,$perhas);
          if ($monto2 > $mondis)
          {
            $montovalido=false;
            $sobregiro=true;
            $msj='511';
          }
          else
          {
            $montovalido=true;
            $sobregiro=false;
          }
        }
        else
        {
          $montovalido=false;
          $sobregiro=true;
          $msj='512';
        }
      }
    }
    return $montovalido;
  }

  public static function posicion_en_el_grid($arreglo,$codigo,$referencias,$referencia)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($referencias=='')
      { $referencias='_';}
      $refere=split('_',$referencias);
      if ($referencia=="")
      {
        if ($arreglo[$ind]["codpre"]==$codigo)
        { $enc=true; }
      }
      else
      {
        if ($arreglo[$ind]["codpre"]==$codigo  && $refere[$ind+1]==$referencia)
        { $enc=true;}
      }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function posiciondelaretencion($arreglo,$codret,$codpre,$fila,$referencia)
  {
    $enc=false;
    $ind=0;

    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($referencia!="")
      {
        if ($ind<count($arreglo))
        { $i=$ind;}else{ $i=1;}

        if ($arreglo[$ind]["codpre"]==$codpre && $arreglo[$ind]["codtip"]==$codret && $arreglo[$ind]["refere"]==$referencia && $fila!=$ind)
        { $enc=true;}
      }
      else
      {
        if ($arreglo[$ind]["codpre"]==$codpre && $arreglo[$ind]["codtip"]==$codret && $fila!=$ind)
        { $enc=true;}
      }
      $ind++;
    }

    if ($enc)
    {$posiciondelaretencion=$ind;}else{ $posiciondelaretencion=0;}

   return $posiciondelaretencion;
  }

  public static function Retencioniva($codigo)
  {
    $c= new Criteria();
    $reg= CadefartPeer::doSelectOne($c);
    if ($reg)
    { $afectarecargo=$reg->getAsiparrec();
    }else {$afectarecargo='C';}

    if ($afectarecargo=='R' || $afectarecargo=='S')
    {
      Herramientas::obtenerFormatoCategoria($formatopar,$iniciopartida);
      $par=substr($codigo,$iniciopartida,strlen($formatopar));
      $c= new Criteria();
      $c->add(TsretivaPeer::CODPAR,$par);
      $datos= TsretivaPeer::doSelectOne($c);
      if ($datos)
      {
      return 'S';
      }else return 'N';
   }else if ($afectarecargo=='P')
   {
      $c= new Criteria();
      $c->add(TsretivaPeer::CODPAR,$codigo);
      $datos= TsretivaPeer::doSelectOne($c);
      if ($datos)
      {
      return 'S';
      }else return 'N';

   }
  }

  public static function ArregloNomina($tipnom,$banco,$gasto,$fecha, $referencias,&$arreglodet,&$arregloret,&$dato,$impcpt='',$nomespecial='',$codnomesp='',&$arregloret2)
  {
    $dato="";
    $result=array();
    $agropnomesp=H::getX_vacio('CODEMP','Opdefemp','Agropnomesp','001');
	  $impcpt=='X' ? $sqlimpcpt='' : $sqlimpcpt="AND  b.impcpt='S'";
    if ($agropnomesp=='N')
      $sql="SELECT a.codpre as codpre, a.monto as monto, a.asided as asided, a.codcon as codcon, b.afepre as afepre FROM NPCIENOM a,NPDEFCPT b WHERE  a.CODNOM like '%%%' AND a.CodTipGas='".$gasto."' AND a.CODBAN like '%%%' AND  (a.ASIDED='A' OR a.ASIDED='D') ".($nomespecial=='S' ? "AND a.especial='S' AND a.codnomesp='".$codnomesp."'" : "AND a.especial='N'")." AND a.FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') $sqlimpcpt  AND a.codcon=b.codcon Order By CodCon";
    else
      $sql="SELECT a.codpre as codpre, a.monto as monto, a.asided as asided, a.codcon as codcon, b.afepre as afepre FROM NPCIENOM a,NPDEFCPT b WHERE  a.CODNOM = '".$tipnom."' AND a.CodTipGas='".$gasto."' AND a.CODBAN='".$banco."' AND  (a.ASIDED='A' OR a.ASIDED='D') ".($nomespecial=='S' ? "AND a.especial='S' AND a.codnomesp='".$codnomesp."'" : "AND a.especial='N'")." AND a.FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') $sqlimpcpt  AND a.codcon=b.codcon Order By CodCon";
    //print $sql;
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$banco);
      $data=OpbenefiPeer::doSelectOne($c);
      if ($data)
      {
        $dato=$data->getCedrif();
      }
      $arreglodet=array();
      $arregloret=array();
      $arregloret2=array();
      $i=0;
      while ($i<count($result))
      {
       if ($result[$i]["asided"]=='A' && $result[$i]["monto"]>0)
       {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       }

       if ($result[$i]["asided"]=='D' && $result[$i]["monto"]>0)
       {
         $c= new Criteria();
         $c->add(OpretconPeer::CODCON,$result[$i]["codcon"]);
         $c->add(OpretconPeer::CODNOM,$tipnom);
         $resultado=OpretconPeer::doSelectOne($c);
         if ($resultado)
         {
          $pos2=OrdendePago::posiciondelaretencion($arregloret,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
          if ($pos2==0)
          {
            $e=count($arregloret)+1;
            $arregloret[$e-1]["codpre"]=$result[$i]["codpre"];
            $arregloret[$e-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
            $arregloret[$e-1]["codtip"]=$resultado->getCodtip();
            $arregloret[$e-1]["monret"]=number_format($result[$i]["monto"],2,',','.');
            $arregloret[$e-1]["refere"]=null;
            $arregloret[$e-1]["id"]="9";

          }
          else
          {
            $valor=H::convnume($arregloret[$pos2-1]["monret"]);
            $arregloret[$pos2-1]["monret"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
          }

          $posY=OrdendePago::posiciondelaretencion2($arregloret2,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
          if ($posY==0)
          {
            $p=count($arregloret2)+1;
            $arregloret2[$p-1]["codtip"]=$resultado->getCodtip();
            $arregloret2[$p-1]["destip"]="";
            $arregloret2[$p-1]["codcon"]="";
            $arregloret2[$p-1]["basimp"]="0,00";
            $arregloret2[$p-1]["porret"]="0,00";
            $arregloret2[$p-1]["factor"]="0,00";
            $arregloret2[$p-1]["porsus"]="0,00";
            $arregloret2[$p-1]["unitri"]="0,00";
            $arregloret2[$p-1]["esta"]="";
            $arregloret2[$p-1]["base"]="0,00";
            $arregloret2[$p-1]["montorete"]=number_format($result[$i]["monto"],2,',','.');
            $arregloret2[$p-1]["estaislr"]="";
            $arregloret2[$p-1]["esta1xmil"]="";
            $arregloret2[$p-1]["montoiva"]="0,00";
            $arregloret2[$p-1]["estairs"]="";
            $arregloret2[$p-1]["monbasmin"]="0,00";
            $arregloret2[$p-1]["id"]="9";

         }
         else
         {
            $valor=H::convnume($arregloret2[$posY-1]["montorete"]);
            $arregloret2[$posY-1]["montorete"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
          }

         }
         else
         {
           $pos3=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
           if ($pos3==0)
           {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["check"]='0';
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
             $arreglodet[$j-1]["moncau"]=number_format(($result[$i]["monto"]*-1),2,',','.');
             $arreglodet[$j-1]["monret"]="0,00";
             $arreglodet[$j-1]["mondes"]="0,00";           
             $arreglodet[$j-1]["id"]="9";
           }
           else
           {
             if ($result[$i]["afepre"]=='N'){
                $valordes=H::toFloat($arreglodet[$pos3-1]["mondes"]);
                $arreglodet[$pos3-1]["mondes"]=number_format(($valordes+$result[$i]["monto"]),2,',','.');
             }else {
             $valor=H::convnume($arreglodet[$pos3-1]["moncau"]);
             $arreglodet[$pos3-1]["moncau"]=number_format(($valor-$result[$i]["monto"]),2,',','.');
            }
           }
         }
       }
        $i++;
      }
      $p=0;
      while ($p<count($arreglodet))
      {
        $arreglodet[$p]["monret"]="0,00";        
        $p++;
      }

      $inc=0;
      $y=0;
      while ($y<count($arregloret))
      {
        if ($referencias=='')
        { $referencias='_';}
        $refere=split('_',$referencias);
        if ($refere[1]!="")
        {
          if ($y<count($arregloret))
          {
            $I=$y;
          }
          else
          {
            $I=$inc;
            $inc=$inc+1;
            if ($inc>=count($arregloret))
            {
              $inc=0;
            }
          }
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,$arregloret[$y]["refere"]);
        }
        else
        {
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,"");
        }

        if ($fil!=0)
        {
         $valor=H::convnume($arreglodet[$fil-1]["monret"]);
         $valor1=H::convnume($arregloret[$y]["monret"]);
         $arreglodet[$fil-1]["monret"]=number_format(($valor+$valor1),2,',','.');
        }else {
          $valor=H::convnume($arreglodet[$fil]["monret"]);
          $valor1=H::convnume($arregloret[$y]["monret"]);
          $arreglodet[$fil]["monret"]=number_format(($valor+$valor1),2,',','.');
        }
        $y++;
      }
       return true;
    }
  }

  public static function ArregloAporte($codcon,$fecha,$gasto,$referencias,$codnom,$especial,$codnomesp,&$arreglodet)
  {
    $result=array();
    if ($especial=='S')
      $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon FROM NPCIENOM WHERE CODCON = '".$codcon."' AND CodTipGas='".$gasto."'  AND ASIDED='P' AND FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') and codnom='".$codnom."' and especial='".$especial."' and codnomesp='".$codnomesp."' Order By CodCon";
    else
      $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon FROM NPCIENOM WHERE CODCON = '".$codcon."' AND CodTipGas='".$gasto."'  AND ASIDED='P' AND FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') and codnom='".$codnom."' and especial='".$especial."' Order By CodCon";
    
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $arreglodet=array();
      $i=0;
      while ($i<count($result))
      {
       if ($result[$i]["asided"]=='P' && $result[$i]["monto"]>0)
       {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       }
       $i++;
      }
    }
    return true;
  }

  public static function ArregloLiquidacion($codemp,$nomemp,$cedemp,$referencias,&$arreglodet,&$arregloret,&$dato,&$arregloret2)
  {
    $dato="";
    $result=array();
    $sql="SELECT asided as asided,codpre as codpre, (CASE when codcon='' THEN 'AUT'
          else codcon END) as codcon, SUM(MONTO) as monto FROM NPLIQUIDACION_DET WHERE CODEMP = '".$codemp."' GROUP BY asided,codpre,codcon";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$cedemp);
      $data=OpbenefiPeer::doSelectOne($c);
      if ($data)
      {
        $dato=$data->getCedrif();
      }
      $arreglodet=array();
      $arregloret=array();
      $arregloret2=array();
      $i=0;
      while ($i<count($result))
      {
       if ($result[$i]["asided"]=='A' && $result[$i]["monto"]>0)
       {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       }

       if ($result[$i]["asided"]=='D' && $result[$i]["monto"]>0)
       {
         $c= new Criteria();
         $c->add(OpretconPeer::CODCON,$result[$i]["codcon"]);
         $resultado=OpretconPeer::doSelectOne($c);
         if ($resultado)
         {
          $pos2=OrdendePago::posiciondelaretencion($arregloret,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
          if ($pos2==0)
          {
            $e=count($arregloret)+1;
            $arregloret[$e-1]["codpre"]=$result[$i]["codpre"];
            $arregloret[$e-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
            $arregloret[$e-1]["codtip"]=$resultado->getCodtip();
            $arregloret[$e-1]["monret"]=number_format($result[$i]["monto"],2,',','.');
            $arregloret[$e-1]["refere"]=null;
            $arregloret[$e-1]["id"]="8";

          }
          else
          {
            $valor=H::convnume($arregloret[$pos2-1]["monret"]);
            $arregloret[$pos2-1]["monret"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
          }

          $posY=OrdendePago::posiciondelaretencion2($arregloret2,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
          if ($posY==0)
          {
            $p=count($arregloret2)+1;
            $arregloret2[$p-1]["codtip"]=$resultado->getCodtip();
            $arregloret2[$p-1]["destip"]="";
            $arregloret2[$p-1]["codcon"]="";
            $arregloret2[$p-1]["basimp"]="0,00";
            $arregloret2[$p-1]["porret"]="0,00";
            $arregloret2[$p-1]["factor"]="0,00";
            $arregloret2[$p-1]["porsus"]="0,00";
            $arregloret2[$p-1]["unitri"]="0,00";
            $arregloret2[$p-1]["esta"]="";
            $arregloret2[$p-1]["base"]="0,00";
            $arregloret2[$p-1]["montorete"]=number_format($result[$i]["monto"],2,',','.');
            $arregloret2[$p-1]["estaislr"]="";
            $arregloret2[$p-1]["esta1xmil"]="";
            $arregloret2[$p-1]["montoiva"]="0,00";
            $arregloret2[$p-1]["estairs"]="";
            $arregloret2[$p-1]["monbasmin"]="0,00";
            $arregloret2[$p-1]["id"]="9";

         }
         else
         {
            $valor=H::convnume($arregloret2[$posY-1]["montorete"]);
            $arregloret2[$posY-1]["montorete"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
          }
         }
         else
         {
           $pos3=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
           if ($pos3==0)
           {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["check"]='0';
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
             $arreglodet[$j-1]["moncau"]=number_format(($result[$i]["monto"]*-1),2,',','.');
             $arreglodet[$j-1]["monret"]="0,00";
             $arreglodet[$j-1]["mondes"]="0,00";
             $arreglodet[$j-1]["id"]="9";
           }
           else
           {
              $valor=H::convnume($arreglodet[$pos3-1]["moncau"]);
             $arreglodet[$pos3-1]["moncau"]=number_format(($valor-$result[$i]["monto"]),2,',','.');
           }
         }
       }
        $i++;
      }
    }
    $p=0;
      while ($p<count($arreglodet))
      {
        $arreglodet[$p]["monret"]="0,00";
        $p++;
      }

      $inc=0;
      $y=0;
      while ($y<count($arregloret))
      {
        if ($referencias=='')
        { $referencias='_';}
        $refere=split('_',$referencias);
        if ($refere[1]!="")
        {
          if ($y<count($arregloret))
          {
            $I=$y;
          }
          else
          {
            $I=$inc;
            $inc=$inc+1;
            if ($inc>=count($arregloret))
            {
              $inc=0;
            }
          }
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,$arregloret[$y]["refere"]);
        }
        else
        {
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,"");
        }

        if ($fil!=0)
        {
         $valor=H::convnume($arreglodet[$fil-1]["monret"]);
         $valor1=H::convnume($arregloret[$y]["monret"]);
         $arreglodet[$fil-1]["monret"]=number_format(($valor+$valor1),2,',','.');
        }
        $y++;
      }


    return true;
  }

  public static function ArregloFideicomiso($codnom,$nomnom,$fecha,$referencias,&$arreglodet)
  {
    $result=array();
    $sql="SELECT codpre as codpre,SUM(MONFID) as monto FROM NPOrdFid WHERE CODNom = '".$codnom."' and Fecha=TO_DATE('".$fecha."','YYYY-MM-DD') GROUP BY codpre";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $arreglodet=array();
      $i=0;
      while ($i<count($result))
      {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       $i++;
      }
    }
    return true;
  }

  public static function validarDisponibilidadPresu($grid,$afecta,&$codigo,$mone,$valm,$fecdoc)
  {
    $validardisponibilidad=true;
    $x=$grid[0];
    $datosGrid = array();
    $moneda=$mone;
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
       $valor=H::toFloat($valm,6);
    else
      $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    if ($afecta==1)
    {
        $i=0;
        while ($i<count($x))
        {
            $codigo=$x[$i]->getCodpre();
            $a= new Criteria();
            $a->add(CpasiiniPeer::PERPRE,'00');
            $a->add(CpasiiniPeer::CODPRE,$codigo);
            $data2= CpasiiniPeer::doSelectOne($a);
            if (!$data2)
            {
                $validardisponibilidad=false;
                break;
            }

            $codpre=H::getCodPreDis($codigo);       
            $monto=$x[$i]->getMoncau()*$valor;
            $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
            if ($pos==0)
            {
             $j=count($datosGrid)+1;
             $datosGrid[$j-1]["codpre"]=$codpre;
             $datosGrid[$j-1]["monimp"]=$monto;
            }
            else
            {
             $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$monto;
            }        

         $i++;
        }
        if ($validardisponibilidad)
        {
            $codigo="";
            $p=0;
            while ($p<count($datosGrid))
            {              
              $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$fecdoc);
              if($datosGrid[$p]["monimp"] > $disponible){
                if ($codigo!='')
                  $codigo.=', '.$datosGrid[$p]["codpre"];  
                else
                  $codigo=$datosGrid[$p]["codpre"];  
                $validardisponibilidad=false;
                //break;
              }
              $p++;
            }
        }        
    }
    return $validardisponibilidad;
  }

  public static function salvarPagmodret($orden,$grid,$totalret)
  {
    self::grabarGrid($orden,$grid);
    self::actualizarOrden($orden,$grid,$totalret);
    //self::actualizarImpcau($orden,$grid);
    //self::actualizarComprobante($orden,$grid);
  }

  public static function grabarGrid($orden,$grid)
  {
    $referencia=$orden->getNumord();
    $c = new Criteria();
    $c->add(OpretordPeer::NUMORD,$referencia);
    $c->add(OpretordPeer::NUMRET,'NOASIGNA');
    OpretordPeer::doDelete($c);

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpre()!="")
     {
       $tabla= new Opretord();
       $tabla->setNumord($referencia);
       $tabla->setNumret('NOASIGNA');
       $tabla->setCodpre($x[$j]->getCodpre());
       $tabla->setCodtip($x[$j]->getCodtip());
       $tabla->setMonret($x[$j]->getMonret());
       $tabla->setRefere($x[$j]->getRefere());
       $tabla->setCorrel(str_pad($j+1,3,'0',STR_PAD_LEFT));
       $tabla->save();
     }
      $j++;
    }
  }

  public static function actualizarOrden($orden,$grid,$totalret)
  {
    $referencia=$orden->getNumord();
    $c= new Criteria();
    $c->add(OpdetordPeer::NUMORD,$referencia);
    $resul= OpdetordPeer::doSelect($c);
    if ($resul)
    {
      foreach ($resul as $opdetord)
      {
        $opdetord->setMonret(0);
        $opdetord->save();
      }
    }

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCodpre()!="" && $x[$j]->getMonret()>0)
     {
      if ($x[$j]->getRefere()=="")
      {
        $dato='NULO';
      }else {$dato=$x[$j]->getRefere();}
       $c= new Criteria();
       $c->add(OpdetordPeer::NUMORD,$referencia);
       $c->add(OpdetordPeer::CODPRE,$x[$j]->getCodpre());
       $c->add(OpdetordPeer::REFCOM,$dato);
       $result= OpdetordPeer::doSelectOne($c);
       if ($result)
       {
         $result->setMonret($result->getMonret()+$x[$j]->getMonret());
        $result->save();
       }
     }
      $j++;
    }

    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$referencia);
    $result2= OpordpagPeer::doSelectOne($c);
    if ($result2)
    {
      $result2->setMonret($totalret);
      $result2->save();
    }
  }

  public static function actualizarImpcau($orden,$grid)
  {
    $referencia=$orden->getNumord();
    $c = new Criteria();
    $c->add(CpimpcauPeer::REFCAU,$referencia);
    CpimpcauPeer::doDelete($c);

    $totalcausado=0;

    $sql="select numord as numord, refcom as refcom , codpre as codpre, sum(moncau) as moncau, sum(monret) as monret
    from opdetord where numord='".$referencia."' group by numord,refcom,codpre";

    if (Herramientas::BuscarDatos($sql,$result))
    {
      foreach ($result as $opdet)
      {
        $tabla2= new Cpimpcau();
        $tabla2->setRefcau($opdet['numord']);
        $tabla2->setCodpre($opdet['codpre']);
        $total=$opdet['moncau']-$opdet['monret'];
        $tabla2->setMonimp($total);
        $tabla2->setMonpag(0);
        $tabla2->setMonaju(0);
        $tabla2->setStaimp('A');
        $tabla2->setRefere($opdet['refcom']);
        $tabla2->setRefprc('NULO');
        $totalcausado= $totalcausado+$total;
        $tabla2->save();
      }
    }

    $c = new Criteria();
    $c->add(CpcausadPeer::REFCAU,$referencia);
    $resul3= CpcausadPeer::doSelectOne($c);
    if ($resul3)
    {
      $resul3->setMoncau($totalcausado);
      $resul3->save();
    }
  }

  public static function actualizarComprobante($orden,$grid)
  {
    $referencia=$orden->getNumord();
    $montocomprobante=0;
    $sql="select b.codcta as codcta, sum(a.moncau-a.monret) as monret from opdetord a, cpdeftit b where a.numord='".$referencia."' and a.codpre=b.codpre group by codcta";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      foreach ($result as $datos)
      {
        $c=new Criteria();
        $c->add(Contabc1Peer::NUMCOM,$orden->getNumcom());
        $c->add(Contabc1Peer::FECCOM,$orden->getFecemi());
        $c->add(Contabc1Peer::CODCTA,$datos['codpre']);
        $c->add(Contabc1Peer::DEBCRE,'D');
        $data= Contabc1Peer::doSelectOne($c);
        if ($data)
        {
          $data->setMonasi($datos['monret']);
          $montocomprobante= $montocomprobante + $datos['monret'];
          $data->save();
        }
      }
    }

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$orden->getNumcom());
    $c->add(ContabcPeer::FECCOM,$orden->getFecemi());
    $data2= ContabcPeer::doSelectOne($c);
    if ($data2)
    {
       $data2->setMoncom($montocomprobante);
       $data2->save();
    }
  }

  public static function ArregloValuacion($refcom,$montoval,$referencias,&$arreglodet)
  {
    $result=array();
    $sql="SELECT A.codpre as codpre FROM cpimpcom A WHERE A.refcom='".$refcom."'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $arreglodet=array();
      $i=0;
      while ($i<count($result))
      {
       $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
         $arreglodet[$j-1]["moncau"]=number_format($montoval,2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$montoval),2,',','.');
        }
       $i++;
      }
    }
    return true;
  }

  public static function grabarComprobanteAlc($numord,&$msjuno,&$arrcompro,$bene)
  {
    $numeroorden="";    
    $numeroorden3="OA".substr($numord,2,6);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $numeroorden3;
    }else $numerocomprob= '########';

    $t= new Criteria();
    $t->add(OpordpagPeer::NUMORD,$numord);
    $data= OpordpagPeer::doSelectOne($t);
    if ($data)
    {
      $ctapago=$data->getCtapag();
      $monorden=$data->getMonord();
      $desord= $data->getDesord();
      $fecha=$data->getFecemi();
      $moneda=$data->getCodmon();
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      if ($moneda2!=$moneda)
            $valor=$data->getValmon();
      else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    }

    $reftra = $numeroorden3;
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";

    $cuenta=$ctapago;
    $monord=$monorden;
    if ($monord>0)
    {
      $codigocuenta=$cuenta;
      $tipo='D';
      $des="";
      $mon=$monorden;
      $monto=$mon;
      if ($moneda2!=$moneda) $monto=$monto*$valor;
    }

    $c= new Criteria();
    $c->add(TsrelasiordPeer::CTAGASXPAG,$ctapago);
    $reg= TsrelasiordPeer::doSelectOne($c);
    if ($reg)
    {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$reg->getCtaordxpag());
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta2=$dato->getCodcta();
        $tipo2='C';
        $des2="";
        $mont=$monorden;
        $monto2=$mont;
        if ($moneda2!=$moneda) $monto2=$monto2*$valor;
      }else { $msjuno='El Código Contable asociado a Cuenta de Gastos por Pagar no es válido';  return true;}
    }else { $msjuno='El Código Contable asociado al Beneficiario en la Orden de Pago no posee Relacion para Asientos de Ordenes'; return true;}

    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($fecha)));
    $clscommpro->setDestra($desord." - ".$bene);
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $arrcompro[]=$clscommpro;

    return true;
  }

  public static function aprobarOrdenes($opordpag,$grid)
  {
    $x=$grid[0];
    $j=0;
    $aprordtes=H::getConfApp2('aprordtes', 'tesoreria', 'tesaprord');
    $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
    $fecapr=date('Y-m-d');
    while ($j<count($x))
    {
      if ($x[$j]->getAprobadoord()=="1")
      {
        //$x[$j]->setAprobadoord('A');     
        $sql1="update opordpag set aprobadoord='A', usuaprord='".$loguse."', fecaprord='".$fecapr."'  where numord='".$x[$j]->getNumord()."'";
        if ($aprordtes=='S')
        {
            //$x[$j]->setAprobadotes('A');
          $sql1="update opordpag set aprobadoord='A', aprobadotes='A', usuaprord='".$loguse."', fecaprord='".$fecapr."', usuaprtes='".$loguse."', fecaprtes='".$fecapr."' where numord='".$x[$j]->getNumord()."'";
        }
        //$x[$j]->save();
        
      }
      else
      {
      	//$x[$j]->setAprobadoord(null);
        $sql1="update opordpag set aprobadoord=null, usuaprord=null, fecaprord=null where numord='".$x[$j]->getNumord()."'";
      	//$x[$j]->save();
      }
      if ($x[$j]->getCheck()=="1")
      {
        //$x[$j]->setAprobadoord('R');
        $sql1="update opordpag set aprobadoord='R', usuaprord='".$loguse."', fecaprord='".$fecapr."' where numord='".$x[$j]->getNumord()."'";
        //$x[$j]->save();
      }
      Herramientas::insertarRegistros($sql1);
      $j++;
    }
  }

  public static function aprobarOrdenesTes($opordpag,$grid,$numcomprob,$numorden,$comprobaut)
  {
    $x=$grid[0];
    $j=0;
    $l=0;
    $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
     $e= new Criteria();
     $reg= OpdefempPeer::doSelectOne($e);
     if ($reg)
      $genconalc=$reg->getGencomalc();
    else
      $genconalc="";
    $numcom=split('/',$numcomprob);
    $numord=split('/',$numorden);
    while ($j<count($x))
    {
      if ($x[$j]->getAprobadotes()=="1")
      {
        $x[$j]->setAprobadotes('A');
        if ($genconalc=="S"){
          if ($comprobaut=='S')
		    {
		      self::grabarComprobanteAlcAutomatico($x[$j]->getNumord(),$numcom,$reftra);
		      $orden1="OA".substr($x[$j]->getNumord(),2,6);
		        if ($orden1==$reftra)
		        {
			      $x[$j]->setNumcomapr($numcom);
		        }
		    }else{
           $orden1="OA".substr($x[$j]->getNumord(),2,6);
	        if ($orden1==$numord[$l+1])
	        {
	          $x[$j]->setNumcomapr($numcom[$l+1]);
	          $l++;
	        }
	        }
        }
         $x[$j]->setUsuaprtes($loguse);
         $x[$j]->setFecaprtes(date('Y-m-d'));
         $x[$j]->save();
      }
      else
      {
      	$x[$j]->setAprobadotes(null);
        $x[$j]->setUsuaprtes(null);
        $x[$j]->setFecaprtes(null);
      	$x[$j]->save();
      }
      if ($x[$j]->getCheck()=="1")
      {
        $x[$j]->setAprobadotes('R');
        $x[$j]->setUsuaprtes($loguse);
        $x[$j]->setFecaprtes(date('Y-m-d'));
        $x[$j]->save();
      }

      $j++;
    }
  }

  public static function salvarPagodeRetenciones($opordpag,$gridoculret,$gridfac,$usuario)
  {
    if ($opordpag->getIncmod()=='I')
    {
      //self::grabarFacturasPagret($opordpag,$gridfac);
      self::grabarRetencionesPagret($opordpag,$gridoculret);
      self::actualizarOrdenPag($opordpag,$gridoculret);
      $opordpag->setUsuret($usuario);
      $opordpag->save();
    }
    else
    {
      //self::grabarFacturasPagret($opordpag,$gridfac);
      $opordpag->save();
    }
  }

  public static function grabarFacturasPagret($orden,$grid2)
  {
    $referencia=$orden->getNumord();
    //primero elimino todas las facturas, para luego guardar las que el usuario haya dejado en el grid
    Herramientas::EliminarRegistro('Opfactur','Numord',$orden->getNumord());
    $x=$grid2[0];
    if (count($x)!=0)
    {
    $j=0;
    while ($j<count($x))
    {
      if (($x[$j]['fecfac']!='') and (($x[$j]['numfac']!='') or ($x[$j]['notdeb']!='') or ($x[$j]['notcrd']!='')))
      {
        $factura= new Opfactur();
        $factura->setNumord($referencia);
        if ($x[$j]['tiptra']=='01')
        {
          $factura->setNumfac($x[$j]['numfac']);
        }
        else if ($x[$j]['tiptra']=='02')
        {
          $factura->setNumfac($x[$j]['notdeb']);
        }
        else
        {
          $factura->setNumfac($x[$j]['notcrd']);
        }

        if ($x[$j]['tiptra']=='01')
        {
          $factura->setFacafe($x[$j]['facafe']);
        }
        $factura->setFecfac($x[$j]['fecfac']);
        $factura->setNumctr($x[$j]['numctr']);
        $factura->setTiptra($x[$j]['tiptra']);
        $factura->setPoriva($x[$j]['poriva']);
        $factura->setTotfac($x[$j]['totfac']);
        $factura->setExeiva($x[$j]['exeiva']);
        $factura->setBasimp($x[$j]['basimp']);
        $factura->setMonret($x[$j]['monret']);
        $factura->setMoniva($x[$j]['moniva']);
        $factura->setBasltf($x[$j]['basltf']);
        $factura->setPorltf($x[$j]['porltf']);
        $factura->setMonltf($x[$j]['monltf']);
        $factura->setBasislr($x[$j]['basislr']);
        $factura->setPorislr($x[$j]['porislr']);
        $factura->setMonislr($x[$j]['monislr']);
        $factura->setCodislr($x[$j]['codislr']);
        $factura->setAliadi($x[$j]['aliadi']);
        $factura->setRifalt($x[$j]['rifalt']);
        $factura->setObservacion($x[$j]['observacion']);
        $factura->save();
      }
      $j++;
    }
   }
  }

  public static function grabarRetencionesPagret($orden,$grid3)
  {
    $referencia=$orden->getNumord();
    $x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]['codtip']!='')
      {
        $opretord= new Opretord();
        $opretord->setNumord($referencia);
        $opretord->setCodtip($x[$j]['codtip']);
        $opretord->setMonret($x[$j]['monret']);
        $opretord->setCodpre($x[$j]['codpre']);
        $opretord->setNumret('NOASIGNA');
        $opretord->setRefere($x[$j]['refere']);
        $opretord->setCorrel(str_pad($j+1,3,'0',STR_PAD_LEFT));
        $opretord->setMonbas(0);
        $opretord->save();

       /* $c= new Criteria();
        $c->add(OpdetordPeer::NUMORD,$referencia);
        $c->add(OpdetordPeer::CODPRE,$x[$j]['codpre']);
        $resultado= OpdetordPeer::doSelectOne($c);
        if ($resultado)
        {
        	$resultado->setMonret($x[$j]['monret']);
        	$resultado->save();
        }*/
        }
     $j++;
    }
  }

   public static function actualizarOrdenPag($orden,$grid3)
  {
    $referencia=$orden->getNumord();
     //Cambio de Moneda
    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    
    $totalret=0;
    $t= new Criteria();
    $t->add(OpretordPeer::NUMORD,$referencia);
    $result= OpretordPeer::doSelect($t);
    if ($result)
    {
        foreach($result as $obj)
        {
            $totalret= $totalret + ($obj->getMonret()*$valor);
        }
    }

    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$referencia);
    $result2= OpordpagPeer::doSelectOne($c);
    if ($result2)
    {
      $result2->setMonret($totalret);
      $result2->save();
    }
    
    $t= new Criteria();
    $t->add(OpdetordPeer::NUMORD,$referencia);
    $t->addDescendingOrderByColumn(OpdetordPeer::MONCAU);
    $regi=  OpdetordPeer::doSelectOne($t);
    if ($regi)
    {
        $regi->setMonret($totalret);
        $regi->save();
    }

    if ($orden->getReferenciashcm()!='')
    {
       $cadrefhcm=explode('_',$orden->getReferenciashcm());
        $r=0;
        while ($r < count($cadrefhcm))
        {
          $h= new Criteria();
          $h->add(HcregconhcmPeer::ID,$cadrefhcm[$r+1]);
          $regh= HcregconhcmPeer::doSelectOne($h);
          if ($regh)
          {
            $regh->setStatop('S');
            $regh->setNumord($referencia);
            $regh->save();
          }
          $r++;
        }
       
    }
  }

  public static function grabarComprobanteAutomatico($orden,$grid,&$correl3)
  {
    self::formload($afectarecargo,$ordpagnom,$ordpagapo,$ordpagliq,$ordpagfid,$ordpagval,$compadic,$genctaord,$ordpagcre,$ordpagsolpag,$ordpaghcm,$ordpagamo);
        if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
    {
      if ($orden->getNumord()=='########')
      {
          $valido=false;
      	  $longitud='8';
      	  $nroorden=0;
          $formatcont="";
            $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
            if ($varemp)
            if(array_key_exists('generales',$varemp)) {
               if(array_key_exists('formatcont',$varemp['generales']))
               {
                $formatcont=$varemp['generales']['formatcont'];
               }
           }
          if ($formatcont!='S')
          {
             	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);  
          }else {

          $fecc=$orden->getFecemi();
      	  $formato='';
	      $c = new Criteria();
	      $c->add(ContabaPeer::CODEMP,'001');
	      $per = ContabaPeer::doSelectOne($c);

	      if ($per->getCorcomp()=='AAMM####'){
	      	$formato = substr($fecc,2,2).substr($fecc,5,2); //date('ym');
	      	$mes=substr($fecc,5,2); //date('m');
	      	$longitud='4';
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,3,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	$numeroorden=$nroorden;

	      }elseif ($per->getCorcomp()=='MMAA####'){
	      	$formato = substr($fecc,5,2).substr($fecc,2,2); //date('my',$fecha);
			$longitud='4';
			$mes=substr($fecc,5,2);//date('m');
	      	$sql="select substring(numord,5,4) as num from opordpag where substring(numord,1,2)='".$mes."' order by fecemi desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(OpordpagPeer::NUMORD,$nroorden);
		      $clase = OpordpagPeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	$numeroorden=$nroorden;

	      }else{
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

	          $sql="select numord from opordpag where numord='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      }
      }
      else
      {
        $numeroorden=str_replace('#','0',$orden->getNumord());
      }
    }
   
    $reftra="OP".substr($numeroorden,2,6);
    $cuentaporpagarrendicion=""; $codigocuenta="";  $tipo="";  $des="";  $monto=""; $codigocuentas="";  $tipo1="";  $desc="";
    $monto1="";  $codigocuenta2="";  $tipo2=""; $des2=""; $monto2="";  $cuentas="";   $tipos="";   $montos="";    $descr="";

    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    $mosretcomop=H::getConfApp2('mosretcomop', 'tesoreria', 'pagemiord');

    $c = new Criteria();
    $resul= TsdefrengasPeer::doSelectOne($c);
    if ($resul)
    {
      if (($orden->getTipcau()==$resul->getPagrepcaj()) && ($resul->getCtarepcaj()!=''))
      {
        $sql="Select A.CodCtaCajChi as codctacajchi,B.DesCta as descta from OPBenefi A,Contabb B where A.CedRif='".$orden->getCedrif()."' and A.CodCtaCajChi=B.CodCta";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          if ($result[0]["codctacajchi"]!='')
          {
            $cuenta=$result[0]["codctacajchi"];
          }else { $cuenta='';}
          $monord=$orden->getMonord();
          if ($monord>0)
          {
            $codigocuenta=$cuenta;
            $tipo='D';
            $des="";
            $mon=$orden->getMonord();
            $monto=$mon;
          }else{
          	$codigocuenta=$cuenta;
            $tipo='D';
            $des="";
            $mon=$orden->getNeto();
            $monto=$mon;
          }
          if ($moneda2!=$moneda) $monto=$monto*$valor;
        }

        $codigocuentapagar=$resul->getCtarepcaj();
        $cuentaporpagarrendicion=$codigocuentapagar;
        $sql2="SELECT CodCta,DesCta FROM CONTABB WHERE CODCTA = '".$codigocuentapagar."'";
        if (Herramientas::BuscarDatos($sql2,$result2))
        {
          $codigocuenta2=$codigocuentapagar;
          $tipo2='C';
          $des2="";
          $mont=$orden->getMonord();
          $monto2=$mont;
          if ($moneda2!=$moneda) $monto2=$monto2*$valor;
        }

        $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;
      }
      else
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          $c= new Criteria();
          $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
          $regis = CpdeftitPeer::doSelectOne($c);
          if ($regis)
          {
            if($regis->getCodcta()!='')
            {
              $cuenta=$regis->getCodcta();
            }else {$cuenta='';}

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
              $moncau=$x[$j]->getMoncau();
              if ($moncau>0)
              {
                if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
                {
                  $codigocuenta=$regis2->getCodcta();
                  $tipo='D';
                  $des="";
                  $mont1=$x[$j]->getMoncau();
                  $mont2=$x[$j]->getMonret();
                  $monto=$mont1 - $mont2;
                }else {
                  $codigocuenta=$regis2->getCodcta();
                  $tipo='D';
                  $des="";
                  $mon=$x[$j]->getMoncau();
                  $monto=$mon;
                }
                if ($moneda2!=$moneda) $monto=$monto*$valor;
              }
            }else { return false;}
            }
          if ($moncau>0)
          {
          if ($j==0)
          {
            $codigocuentas=$codigocuenta;
            $desc=$des;
            $tipo1=$tipo;
            $monto1=$monto;
          }
          else
          {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }
          }
          $j++;
        }
        if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
        {
          $codigocuenta2=$orden->getCtapag();
          $tipo2='C';
          $des2="";
          $a=$orden->getMonord();
          $monto2=$a;
        }else {
          $codigocuenta2=$orden->getCtapag();
          $tipo2='C';
          $des2="";
           if ($orden->getAfectapre()==1) $a=$orden->getMonord();
           else $a=$orden->getNeto();
          $monto2=$a;
        }
        if ($moneda2!=$moneda) $monto2=$monto2*$valor;
        $cuentas=$codigocuenta2.'_'.$codigocuentas;
        $descr=$des2.'_'.$desc;
        $tipos=$tipo2.'_'.$tipo1;
        $montos=$monto2.'_'.$monto1;
      }
    }else
    {
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]->getCodpre());
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if($regis->getCodcta()!='')
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=H::tofloat($x[$j]->getMoncau());
            if ($moncau>0)
            {
              if(($orden->getTipcau()==$ordpagnom) || ($orden->getTipcau()==$ordpagapo) || ($orden->getTipcau()==$ordpagliq))
              {
                $codigocuenta=$regis2->getCodcta();
                $tipo='D';
                $des="";
                $moncau=$x[$j]->getMoncau();                
                $monto=$moncau;
              }else {
                $codigocuenta=$regis2->getCodcta();
                $tipo='D';
                $des="";
                $moncau=$x[$j]->getMoncau();
                $monto=$moncau;
              }
              if ($moneda2!=$moneda) $monto=$monto*$valor;
            }
          }else { return false;}
          }
        if ($moncau>0)
        {
         if ($j==0)
         {
           $codigocuentas=$codigocuenta;
           $desc=$des;
           $tipo1=$tipo;
           $monto1=$monto;
         }
         else
         {
          $codigocuentas=$codigocuentas.'_'.$codigocuenta;
          $desc=$desc.'_'.$des;
          $tipo1=$tipo1.'_'.$tipo;
          $monto1=$monto1.'_'.$monto;
          }
        }

        $j++;
      }

      if(($orden->getTipcau()==$ordpagnom) or ($orden->getTipcau()==$ordpagapo) or ($orden->getTipcau()==$ordpagliq))
      {
        $codigocuenta2=$orden->getCtapag();
        $tipo2='C';
        $des2="";
        if ($mosretcomop=='S' && $orden->getTipcau()==$ordpagnom)
         $b=$orden->getMonord()-$orden->getMonret();
        else
          $b=$orden->getMonord();
        $monto2=$b;
      }else {
        $codigocuenta2=$orden->getCtapag();
        $tipo2='C';
        $des2="";
        $b=$orden->getMonord();
        $monto2=$b;
      }

      if ($mosretcomop=='S' && $orden->getTipcau()==$ordpagnom)
      {
        $x=$grid3[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]['codtip']!='')
          {
            $p= new Criteria();
            $p->add(OptipretPeer::CODTIP,$x[$j]['codtip']);
            $rego= OptipretPeer::doSelectOne($p);
            if ($rego) {
              $codigocuenta2=$codigocuenta2.'_'.$rego->getCodcon();
              $tipo2=$tipo2.'_'.'C';
              $des2=$des2.'_'."";
              $b=$x[$j]['montorete'];
              $monto2=$monto2.'_'.$b;
            }
          }
         $j++;
        }
      }


      if ($moneda2!=$moneda) $monto2=$monto2*$valor;
      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;
    }

    $arrecuentas=split("_",$cuentas);
    $arretipos=split("_",$tipos);
    $arremontos=split("_",$montos);
    $yapaso=array();
    $dondesta=array();
     $t=1;
     foreach ($arrecuentas as $cta)
     {
       $dondesta=array_keys($yapaso,$cta);

       if (count($dondesta)==0)
       {
	    $yapaso[]=$cta;
	    // buscamos todas las posiciones de esa cta.
	    $posiciones=array();
        $posiciones=array_keys($arrecuentas,$cta); //arreglo con las posiciones

         $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;
         $sumdeb=0;
         $sumcre=0;

         foreach ($posiciones as $pos)
         {
           if ($arretipos[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($arremontos[$pos]);
             $contd=$contd+1;
           }
           else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($arremontos[$pos]);
             $contc=$contc+1;
           }

         } // foreach 2

	      if ($contd>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='D';
           $new_montos[]=$acumd;

	      }
	      if ($contc>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='C';
           $new_montos[]=$acumc;

	      }

	  } // if dondesta

    } // foreach 1

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          if ($new_movs[$i]=='D')
          {
          	$sumdeb= $sumdeb +$new_montos[$i];
          }
          else
          {
          	$sumcre= $sumcre + $new_montos[$i];
          }
	  	}
	  	$i++;
	  }

          if (H::toFloat($sumdeb)!=H::toFloat($sumcre))
          {
              return false;
          }

        $correl3=Comprobante::Buscar_Correlativo($orden->getFecemi());
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl3);
	    $contabc->setReftra($reftra);
	    $contabc->setFeccom($orden->getFecemi());
	    $contabc->setDescom($orden->getDesord()." - ".$orden->getNomben());
	    if ($sumdeb==$sumcre)
	    $contabc->setStacom('D');
	    else
	    $contabc->setStacom('E');
	    $contabc->setTipcom('TES');
	    $contabc->setMoncom($sumdeb);
            $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
            $contabc->setLoguse($loguse);
            $contabc->setCodtiptra(H::getX_vacio('Modtiptra', 'Cotiptra', 'Codtiptra', true));
	    $contabc->save();

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl3);
          $contabc1->setFeccom($orden->getFecemi());
          $contabc1->setCodcta($new_ctas[$i]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($reftra);
          $contabc1->setDesasi($new_descs[$i]);
          if ($new_movs[$i]=='D')
          {
          	$contabc1->setDebcre('D');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          else
          {
          	$contabc1->setDebcre('C');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          $contabc1->save();
	  	}
	  	$i++;
	  }


  return true;
  }

  public static function grabarComprobanteOrdenAutomatico($orden)
  { $command="";
     $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$orden->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    self::obtenerTags($command,$tag1,$tag2);
    $c = new Criteria();
    $c->add(CaproveePeer::RIFPRO,$orden->getCedrif());
    $reg = CaproveePeer::doSelectOne($c);
    if ($reg)
    { $tipoben=$reg->getTipo();}

    $reftra="PR".substr($orden->getNumord(),2,6);

    $b = new Criteria();
    $b->add(OpbenefiPeer::CEDRIF,$orden->getCedrif());
    $reg2 = OpbenefiPeer::doSelectOne($b);
    if ($reg2)
    {
        if ($reg2->getCodordadi()!='')
        {
          if (($tag1!='') || ($tag2!=''))
          {
            if (($tag1=="SI" && $tipoben!='C') || ($tag2=="SI" && $tipoben=='C'))
            {
              $cuenta=$reg2->getCodord();
            }else if (($tag1=="SI" && $tipoben=='C') || ($tag2=="SI" && $tipoben!='C'))
            {
              $cuenta=$reg2->getCodordadi();
            }
          }else { $cuenta=$reg2->getCodord();}
        }else { $cuenta=$reg2->getCodord();}

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$cuenta);
        $reg3 = ContabbPeer::doSelectOne($c);
        if ($reg3)
        {
         $codigocuenta=$reg3->getCodcta();
         $tipo='C';
         $des="";
         $mon2=$orden->getMonord();
         $monto=$mon2;
         if ($moneda2!=$moneda) $monto=$monto*$valor;
        }

       if ($reg2->getCodordadi()!='')
        {
          if (($tag1!='') || ($tag2!=''))
          {
            if (($tag1=="SI" && $tipoben!='C') || ($tag2=="SI" && $tipoben=='C'))
            {
              $cuenta2=$reg2->getCodpercon();
            }else if (($tag1=="SI" && $tipoben=='C') || ($tag2=="SI" && $tipoben!='C'))
            {
              $cuenta2=$reg2->getCodperconadi();
            }
          }else { $cuenta2=$reg2->getCodpercon();}
        }else { $cuenta2=$reg2->getCodpercon();}

        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$cuenta2);
        $reg4 = ContabbPeer::doSelectOne($c);
        if ($reg4)
        {
         $codigocuenta2=$reg4->getCodcta();
         $tipo2='D';
         $des2="";
         $mon=$orden->getMonord();
         $monto2=$mon;
         if ($moneda2!=$moneda) $monto2=$monto2*$valor;
        }
    }

    $cuentas=$codigocuenta.'_'.$codigocuenta2;
    $tipos=$tipo.'_'.$tipo2;
    $descr=$des.'_'.$des2;
    $montos=$monto.'_'.$monto2;

    $arrecuentas=split("_",$cuentas);
    $arretipos=split("_",$tipos);
    $arremontos=split("_",$montos);
    $yapaso=array();
    $dondesta=array();

     foreach ($arrecuentas as $cta)
     {
       $dondesta=array_keys($yapaso,$cta);

       if (count($dondesta)==0)
       {
	    $yapaso[]=$cta;
	    // buscamos todas las posiciones de esa cta.
	    $posiciones=array();
        $posiciones=array_keys($arrecuentas,$cta); //arreglo con las posiciones

         $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;

         foreach ($posiciones as $pos)
         {
           if ($arretipos[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($arremontos[$pos]);
             $contd=$contd+1;
           }
           else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($arremontos[$pos]);
             $contc=$contc+1;
           }

         } // foreach 2

	      if ($contd>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='D';
           $new_montos[]=$acumd;
	      }
	      if ($contc>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='C';
           $new_montos[]=$acumc;
	      }

	  } // if dondesta
    } // foreach 1

    $sumdeb=0;
    $sumcre=0;

    $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          if ($new_movs[$i]=='D')
          {
          	$sumdeb= $sumdeb +$new_montos[$i];
          }
          else
          {
          	$sumcre= $sumcre + $new_montos[$i];
          }
	  	}
	  	$i++;
	  }

        $correl2=Comprobante::Buscar_Correlativo($orden->getFecemi());
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl2);
	    $contabc->setReftra($reftra);
	    $contabc->setFeccom($orden->getFecemi());
	    $contabc->setDescom($orden->getDesord());
	    if ($sumdeb==$sumcre)
	    $contabc->setStacom('D');
	    else
	    $contabc->setStacom('E');
	    $contabc->setTipcom(null);
	    $contabc->setMoncom($sumdeb);
            $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
            $contabc->setLoguse($loguse);
            $contabc->setCodtiptra(H::getX_vacio('Modtiptra', 'Cotiptra', 'Codtiptra', true));
	    $contabc->save();

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl2);
          $contabc1->setFeccom($orden->getFecemi());
          $contabc1->setCodcta($new_ctas[$i]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($reftra);
          $contabc1->setDesasi($new_descs[$i]);
          if ($new_movs[$i]=='D')
          {
          	$contabc1->setDebcre('D');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          else
          {
          	$contabc1->setDebcre('C');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          $contabc1->save();
	  	}
	  	$i++;
	  }

   return true;
  }

  public static function grabarComprobanteAlcAutomatico($numord,&$correl2,&$reftra)
  {
    $numeroorden3="OA".substr($numord,2,6);    
    
    $t= new Criteria();
    $t->add(OpordpagPeer::NUMORD,$numord);
    $data= OpordpagPeer::doSelectOne($t);
    if ($data)
    {
      $ctapago=$data->getCtapag();
      $monorden=$data->getMonord();
      $desord= $data->getDesord();
      $fecha=$data->getFecemi();
      $bene=$data->getNomben();
      $moneda=$data->getCodmon();
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      if ($moneda2!=$moneda)
            $valor=$data->getValmon();
      else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
      }
    
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $numeroorden3;
    }else $numerocomprob= Comprobante::Buscar_Correlativo($fecha);

    $reftra = $numeroorden3;
    $codigocuenta="";
    $tipo="";
    $des="";
    $monto="";
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";

    $cuenta=$ctapago;
    $monord=$monorden;
    if ($monord>0)
    {
      $codigocuenta=$cuenta;
      $tipo='D';
      $des="";
      $mon=$monorden;
      $monto=$mon;
      if ($moneda2!=$moneda) $monto=$monto*$valor;
    }

    $c= new Criteria();
    $c->add(TsrelasiordPeer::CTAGASXPAG,$ctapago);
    $reg= TsrelasiordPeer::doSelectOne($c);
    if ($reg)
    {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$reg->getCtaordxpag());
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta2=$dato->getCodcta();
        $tipo2='C';
        $des2="";
        $mont=$monorden;
        $monto2=$mont;
        if ($moneda2!=$moneda) $monto2=$monto2*$valor;
      }
    }

    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;

    $arrecuentas=split("_",$cuentas);
    $arretipos=split("_",$tipos);
    $arremontos=split("_",$montos);
    $yapaso=array();
    $dondesta=array();

     foreach ($arrecuentas as $cta)
     {
       $dondesta=array_keys($yapaso,$cta);

       if (count($dondesta)==0)
       {
	    $yapaso[]=$cta;
	    // buscamos todas las posiciones de esa cta.
	    $posiciones=array();
        $posiciones=array_keys($arrecuentas,$cta); //arreglo con las posiciones

         $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;

         foreach ($posiciones as $pos)
         {
           if ($arretipos[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($arremontos[$pos]);
             $contd=$contd+1;
           }
           else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($arremontos[$pos]);
             $contc=$contc+1;
           }

         } // foreach 2

	      if ($contd>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='D';
           $new_montos[]=$acumd;
	      }
	      if ($contc>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=H::getX('codcta','Contabb','Descta',$cta);
           $new_movs[]='C';
           $new_montos[]=$acumc;
	      }

	  } // if dondesta
    } // foreach 1

    $sumdeb=0;
    $sumcre=0;

    $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          if ($new_movs[$i]=='D')
          {
          	$sumdeb= $sumdeb +$new_montos[$i];
          }
          else
          {
          	$sumcre= $sumcre + $new_montos[$i];
          }
	  	}
	  	$i++;
	  }

        $correl2=$numerocomprob;//OrdendePago::Buscar_Correlativo();
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl2);
	    $contabc->setReftra($reftra);
	    $contabc->setFeccom($fecha);
	    $contabc->setDescom($desord." - ".$bene);
	    if ($sumdeb==$sumcre)
	    $contabc->setStacom('D');
	    else
	    $contabc->setStacom('E');
	    $contabc->setTipcom('TES');
	    $contabc->setMoncom($sumdeb);
            $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
            $contabc->setLoguse($loguse);
            $contabc->setCodtiptra(H::getX_vacio('Modtiptra', 'Cotiptra', 'Codtiptra', true));
	    $contabc->save();

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl2);
          $contabc1->setFeccom($fecha);
          $contabc1->setCodcta($new_ctas[$i]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($reftra);
          $contabc1->setDesasi($new_descs[$i]);
          if ($new_movs[$i]=='D')
          {
          	$contabc1->setDebcre('D');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          else
          {
          	$contabc1->setDebcre('C');
          	$contabc1->setMonasi($new_montos[$i]);
          }
          $contabc1->save();
	  	}
	  	$i++;
	  }
    return true;
  }

  public static function aprobarOrdenesDirectas($opordpag,$grid)
  {
    $x=$grid[0];
    $j=0;
    $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
    while ($j<count($x))
    {
      if ($x[$j]->getAprorddir()=="1")
      {
        $x[$j]->setAprorddir('A');
        $x[$j]->setUsuaprdir($loguse);
        $x[$j]->setFecaprdir(date('Y-m-d'));
        $x[$j]->save();
      }
      else
      {
      	$x[$j]->setAprorddir(null);
        $x[$j]->setUsuaprdir(null);
        $x[$j]->setFecaprdir(null);
      	$x[$j]->save();
      }
      if ($x[$j]->getCheck()=="1")
      {
        $x[$j]->setAprorddir('R');
        $x[$j]->setUsuaprdir($loguse);
        $x[$j]->setFecaprdir(date('Y-m-d'));
        $x[$j]->save();
      }
      $j++;
    }
  }

  public static function anularComprobTes($numero,$fecha,$desc,&$msj)
  {
    $msj="";
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numero);
    $resul= ContabcPeer::doSelectOne($c);
    if ($resul)
    {
      $fecha_aux=split("/",$fecha);
      $dateFormat = new sfDateFormat('es_VE');
      $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

       if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $fecc=$fec;}
      else { $fecc=date('Y-m-d');}
      $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
      if ($confcorcom=='N')
      $numcom= 'RA'.substr($resul->getNumcomapr(),2,6);
      else
      $numcom= Comprobante::Buscar_Correlativo($fecc);


      $contabc= new Contabc();
      $contabc->setNumcom($numcom);
      if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
      { $contabc->setFeccom($fec);}
      else { $contabc->setFeccom(date('Y-m-d'));}
      //$contabc->setDescom($desc);
      $contabc->setDescom($resul->getDescom());
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setReftra($resul->getReftra());
      $contabc->setMoncom($resul->getMoncom());
      $contabc->save();

      $a= new Criteria();
      $a->add(Contabc1Peer::NUMCOM,$numero);
      $a->addAscendingOrderByColumn(Contabc1Peer::DEBCRE);
      $resul2= Contabc1Peer::doSelect($a);
      if ($resul2)
      {
        foreach ($resul2 as $datos)
        {
          $numcom1= $numcom;
          $contabc1= new Contabc1();
          $contabc1->setNumcom($numcom1);
          if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
          { $contabc1->setFeccom($fec);}
          $contabc1->setCodcta($datos->getCodcta());
          $contabc1->setNumasi($datos->getNumasi());
          $contabc1->setRefasi($datos->getRefasi());
          $contabc1->setDesasi($datos->getDesasi());
          if ($datos->getDebcre()=='D')
          {  $contabc1->setDebcre('C');}
          else { $contabc1->setDebcre('D');}
          $contabc1->setMonasi($datos->getMonasi());
          $contabc1->save();
        }
      }
    }
    else
    {
      $msj="El Comprobante Nro. ".$numero."no fue Anulado";
      return true;
    }

  return true;
  }

  public static function posiciondelaretencion2($arreglo,$codret,$codpre,$fila,$referencia)
  {
    $enc=false;
    $ind=0;

    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($referencia!="")
      {
        if ($ind<count($arreglo))
        { $i=$ind;}else{ $i=1;}

        if ($arreglo[$ind]["codtip"]==$codret && $fila!=$ind)
        { $enc=true;}
}
      else
      {
        if ($arreglo[$ind]["codtip"]==$codret && $fila!=$ind)
        { $enc=true;}
      }
      $ind++;
    }

    if ($enc)
    {$posiciondelaretencion=$ind;}else{ $posiciondelaretencion=0;}

   return $posiciondelaretencion;
  }

  public static function grabarEmpresas($opordpag,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCedrif()!="" && $x[$j]->getMontot()>0)
      {
        $x[$j]->setNumord($opordpag->getNumord());
        $x[$j]->save();
}
      $j++;
    }
  }  

  public static function buscarNomina($codigo,&$arreglodet,&$arregloret,&$arregloreten)
  {
     $trajo=false;
     $arreglodet=array();
     $arregloret=array();
     $arregloret2=array();     
     $referencias='_';
      $r= new criteria();
      $r->add(NpcienomPeer::REFCOM,$codigo);
      $r->add(NpcienomPeer::ASIDED,'A');
      $resulta= NpcienomPeer::doSelectOne($r);
      if ($resulta)
      {
        $trajo=true;         
        $p= new Criteria();
        $p->add(CpimpcomPeer::REFCOM,$codigo);
        $resultado= CpimpcomPeer::doSelect($p);
        if ($resultado)
        {
            $y=0;
            foreach ($resultado as $objres)
            {               
               $arreglodet[$y]["codpre"]=$objres->getCodpre();
               $arreglodet[$y]["comprometido"]=$objres->getComprometido();
               $arreglodet[$y]["moncau"]=number_format($objres->getMonimp(),2,',','.');
               $arreglodet[$y]["acausar"]=$objres->getAcausar();
               $arreglodet[$y]["retiva"]=$objres->getRetiva();
               $arreglodet[$y]["monret"]="0,00";
               $y++;
}
        }       
        
        $sql="SELECT a.codpre as codpre, a.monto as monto, a.asided as asided, a.codcon as codcon FROM NPCIENOM a,NPDEFCPT b WHERE  a.CODNOM = '".$resulta->getCodnom()."' AND a.CodTipGas='".$resulta->getCodtipgas()."' AND a.CODBAN='".$resulta->getCodban()."' AND  (a.ASIDED='D') ".($resulta->getEspecial()=='S' ? "AND a.especial='S' AND a.codnomesp='".$resulta->getCodnomesp()."'" : "AND a.especial='N'")." AND a.FECNOM=TO_DATE('".$resulta->getFecnom()."','YYYY-MM-DD') and a.refcom='".$codigo."' AND a.codcon=b.codcon Order By CodCon";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $i=0;
          while ($i<count($result))
          {
           if ($result[$i]["asided"]=='D' && $result[$i]["monto"]>0)
           {
             $c= new Criteria();
             $c->add(OpretconPeer::CODCON,$result[$i]["codcon"]);
             $c->add(OpretconPeer::CODNOM,$resulta->getCodnom());
             $resultado=OpretconPeer::doSelectOne($c);
             if ($resultado)
             {
              $pos2=OrdendePago::posiciondelaretencion($arregloret,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
              if ($pos2==0)
              {
                $e=count($arregloret)+1;
                $arregloret[$e-1]["codpre"]=$result[$i]["codpre"];
                $arregloret[$e-1]["codtip"]=$resultado->getCodtip();
                $arregloret[$e-1]["monret"]=number_format($result[$i]["monto"],2,',','.');
                $arregloret[$e-1]["refere"]=null;
                $arregloret[$e-1]["id"]="9";

              }
              else
              {
                $valor=H::toFloat($arregloret[$pos2-1]["monret"]);
                $arregloret[$pos2-1]["monret"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
              }

              $posY=OrdendePago::posiciondelaretencion2($arregloret2,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
              if ($posY==0)
              {
                $p=count($arregloret2)+1;
                $arregloret2[$p-1]["codtip"]=$resultado->getCodtip();
                $arregloret2[$p-1]["destip"]="";
                $arregloret2[$p-1]["codcon"]="";
                $arregloret2[$p-1]["basimp"]="0,00";
                $arregloret2[$p-1]["porret"]="0,00";
                $arregloret2[$p-1]["factor"]="0,00";
                $arregloret2[$p-1]["porsus"]="0,00";
                $arregloret2[$p-1]["unitri"]="0,00";
                $arregloret2[$p-1]["esta"]="";
                $arregloret2[$p-1]["base"]="0,00";
                $arregloret2[$p-1]["montorete"]=number_format($result[$i]["monto"],2,',','.');
                $arregloret2[$p-1]["estaislr"]="";
                $arregloret2[$p-1]["esta1xmil"]="";
                $arregloret2[$p-1]["montoiva"]="0,00";
                $arregloret2[$p-1]["estairs"]="";
                $arregloret2[$p-1]["monbasmin"]="0,00";
                $arregloret2[$p-1]["estamin"]="";
                $arregloret2[$p-1]["id"]="9";

              }
              else
              {
                $valor=H::toFloat($arregloret2[$posY-1]["montorete"]);
                $arregloret2[$posY-1]["montorete"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
              }

             }
             else
             {
               $pos3=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
               if ($pos3==0)
               {
                 $j=count($arreglodet)+1;
                 $arreglodet[$j]["codpre"]=$result[$i]["codpre"];
                 $arreglodet[$j]["moncau"]=number_format(($result[$i]["monto"]*-1),2,',','.');
                 $arreglodet[$j]["monret"]="0,00";
               }
               else
               {
                $valor=H::toFloat($arreglodet[$pos3-1]["moncau"]);
                 $arreglodet[$pos3-1]["moncau"]=number_format(($valor-$result[$i]["monto"]),2,',','.');
               }
             }
           }
            $i++;
          }
          $p=0;
          while ($p<count($arreglodet))
          {
            $arreglodet[$p]["monret"]="0,00";
            $p++;
          }

          $inc=0;
          $y=0;
          while ($y<count($arregloret))
          {
            if ($referencias=='')
            { $referencias='_';}
            $refere=split('_',$referencias);
            if ($refere[1]!="")
            {
              if ($y<count($arregloret))
              {
                $I=$y;
              }
              else
              {
                $I=$inc;
                $inc=$inc+1;
                if ($inc>=count($arregloret))
                {
                  $inc=0;
                }
              }
              $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,$arregloret[$y]["refere"]);
            }
            else
            {
              $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,"");
            }

            if ($fil!=0)
            {
             $valor=H::toFloat($arreglodet[$fil-1]["monret"]);
             $valor1=H::toFloat($arregloret[$y]["monret"]);
             $arreglodet[$fil-1]["monret"]=number_format(($valor+$valor1),2,',','.');
            }
            $y++;
          }   
          
          //Formar retenciones
          $l=0;
          $arregloreten='';
          while ($l<count($arregloret2))
          {
              $arregloreten=$arregloreten.$arregloret2[$l]["codtip"].'_'.$arregloret2[$l]["destip"].'_'.$arregloret2[$l]["codcon"].'_'.$arregloret2[$l]["basimp"].'_'.$arregloret2[$l]["porret"].'_'.$arregloret2[$l]["factor"].'_'.$arregloret2[$l]["porsus"].'_'.$arregloret2[$l]["unitri"].'_'.$arregloret2[$l]["esta"].'_'.$arregloret2[$l]["base"].'_'.$arregloret2[$l]["montorete"].'_'.$arregloret2[$l]["estaislr"].'_'.$arregloret2[$l]["esta1xmil"].'_'.$arregloret2[$l]["montoiva"].'_'.$arregloret2[$l]["estairs"].'_'.$arregloret2[$l]["monbasmin"].'_'.$arregloret2[$l]["estamin"].'!';
              $l++;
          }
        }         
      }
      
      return $trajo;
  }

    public static function buscarAporte($codigo,&$arreglodet)
  {
     $trajo=false;
     $arreglodet=array();
     $arregloret=array();
     $arregloret2=array();     
     $referencias='_';
      $r= new criteria();
      $r->add(NpcienomPeer::REFCOM,$codigo);
      $r->add(NpcienomPeer::ASIDED,'P');
      $resulta= NpcienomPeer::doSelectOne($r);
      if ($resulta)
      {
        $trajo=true;         
        $p= new Criteria();
        $p->add(CpimpcomPeer::REFCOM,$codigo);
        $resultado= CpimpcomPeer::doSelect($p);
        if ($resultado)
        {
            $y=0;
            foreach ($resultado as $objres)
            {               
               $arreglodet[$y]["codpre"]=$objres->getCodpre();
               $arreglodet[$y]["comprometido"]=$objres->getComprometido();
               $arreglodet[$y]["moncau"]=number_format($objres->getMonimp(),2,',','.');
               $arreglodet[$y]["acausar"]=$objres->getAcausar();
               $arreglodet[$y]["retiva"]=$objres->getRetiva();
               $arreglodet[$y]["monret"]="0,00";
               $y++;
}
        }           
      }
      
      return $trajo;
  }

  public static function SalvarOrdenesPagoElectronicos($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCheck3()=='1')
      {      
        $sql1="update opordpag set staele='S' where numord='".$x[$j]->getNumord()."'";
        Herramientas::insertarRegistros($sql1);
      }
      if ($x[$j]->getCheck2()=='1')
      {      
        $sql2="update opordpag set staele=null where numord='".$x[$j]->getNumord()."'";
        Herramientas::insertarRegistros($sql2);
      }
      $j++;
    }
  }

  public static function ArregloAporte2($codcond,$codconh,$fecha,$gasto,$referencias,&$arreglodet,&$aportes)
  {
    $result=array();
    $aportes="";
    $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon, codtipgas as codtipgas, fecnom as fecnom, codnom as codnom, especial as especial FROM NPCIENOM WHERE CODCON >= '".$codcond."' and CODCON <= '".$codconh."' AND CodTipGas='".$gasto."'  AND ASIDED='P' AND FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') Order By CodCon";
    //print $sql; exit();
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $arreglodet=array();
      $i=0;
      $apo=$result[0]["codcon"]."_".$result[0]["codtipgas"]."_".$result[0]["fecnom"]."_".$result[0]["codnom"]."_".$result[0]["especial"];
      while ($i<count($result))
      {        
        
       if ($result[$i]["asided"]=='P' && $result[$i]["monto"]>0)
       {
        if ($i==0) {
          $aportes=$apo."!";
          $apo3=$apo;
        }else {
          $apo2=$result[$i]["codcon"]."_".$result[$i]["codtipgas"]."_".$result[$i]["fecnom"]."_".$result[$i]["codnom"]."_".$result[$i]["especial"];
          if ($apo3!=$apo2){
            $aportes.=$apo2."!";
            $apo3=$apo2;
          }
        }

        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       }
       $i++;
     }      
    }
    return true;
  }

  public static function validarPartidaDeuAnt($grid,&$cod){

    $maspar=H::getMascaraPartida();
    $lengcat=strlen(H::getMascaraCategoria());
    $auxpar=split('-', $maspar);
    if (strlen($auxpar[0])==1)
    {
      $lengpar=strlen($auxpar[0].'-'.$auxpar[1]);
    }else $lengpar=strlen($auxpar[0]);

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if (substr($x[$j]->getCodpre(), $lengcat+1,$lengpar)!='411' && substr($x[$j]->getCodpre(), $lengcat+1,$lengpar)!='4-11') {
        $cod=$x[$j]->getCodpre();
        return 1378;
       } 
      $j++;
    }
    return -1;
  }

  public static function grabarComprobanteDeuAnt($orden,$grid,&$arrcompro)
  {
    $numeroorden="";
    if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
    {
      if ($orden->getNumord()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $sql="select numord from opordpag where numord='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $numeroorden=str_pad($r, 8, '0', STR_PAD_LEFT);                  
      }
      else
      {
        $numeroorden=str_replace('#','0',$orden->getNumord());
      }
    }
    $numeroorden2="OP".substr($numeroorden,2,6);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $numeroorden2;
    }else $numerocomprob= '########';
    

    $reftra = $numeroorden2;
    $codigocuentas="";
    $tipo1="";
    $desc="";
    $monto1="";
    $codigocuenta2="";
    $tipo2="";
    $des2="";
    $monto2="";
    $cuentas="";
    $tipos="";
    $montos="";
    $descr="";
    $msjuno="";
    $msjdos="";
    $moneda=$orden->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
      $valor=$orden->getValmon();
    else
      $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    
    if ($moneda2!=$moneda) $monto1=$orden->getMonord()*$valor;
    else $monto1=$orden->getMonord();
    $codigocuentas=$orden->getCtapag();
    $tipo1='D';
    $desc=H::getX_vacio('CODCTA', 'Contabb', 'Codcta',$codigocuentas);
    $monto1=$monto1;      


    $codigocuenta2=$orden->getCtapag();
    $tipo2='C';
    $des2=H::getX_vacio('CODCTA', 'Contabb', 'Codcta',$codigocuentas);
    $monto2=$monto1;

    $cuentas=$codigocuenta2.'_'.$codigocuentas;
    $descr=$des2.'_'.$desc;
    $tipos=$tipo2.'_'.$tipo1;
    $montos=$monto2.'_'.$monto1;    

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($orden->getFecemi())));
    $clscommpro->setDestra($orden->getDesord()." - ".$orden->getNomben());
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $arrcompro[]=$clscommpro;

  return true;
  }

  public static function PartidasDeudasAnteriores($codigo){
    $maspar=H::getMascaraPartida();
    $lengcat=strlen(H::getMascaraCategoria());
    $auxpar=split('-', $maspar);
    if (strlen($auxpar[0])==1)
    {
      $lengpar=strlen($auxpar[0].'-'.$auxpar[1]);
    }else $lengpar=strlen($auxpar[0]);

    $e= new Criteria();
    $e->add(CpimpcomPeer::REFCOM,$codigo);
    $result= CpimpcomPeer::doSelect($e);
    if ($result)
    {
      foreach ($result as $objres) {
        if (substr($objres->getCodpre(), $lengcat+1,$lengpar)!='411' && substr($objres->getCodpre(), $lengcat+1,$lengpar)!='4-11')
          return true;
      }
    }
    return false;
  }

  public static function ArregloAporte3($aportes,$referencias,&$arreglodet)
  {
    $arreglodet=array();
    $cadenaapo=split('!',$aportes);
    $r=0;
    while ($r<(count($cadenaapo)-1))
    {
      $aux=$cadenaapo[$r];
      $aux2=split('_',$aux);
      $dateFormat = new sfDateFormat('es_VE');
      $fec1 = $dateFormat->format($aux2[2], 'i', $dateFormat->getInputPattern('d'));

      $result=array();
      if ($aux2[4]=='S')
        $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon FROM NPCIENOM WHERE CODCON = '".$aux2[0]."' AND CodTipGas='".$aux2[1]."'  AND ASIDED='P' AND FECNOM=TO_DATE('".$fec1."','YYYY-MM-DD') and Codnom='".$aux2[3]."' and especial='".$aux2[4]."' and codnomesp='".$aux2[5]."' Order By CodCon";
      else
      $sql="SELECT codpre as codpre, monto as monto, asided as asided, codcon as codcon FROM NPCIENOM WHERE CODCON = '".$aux2[0]."' AND CodTipGas='".$aux2[1]."'  AND ASIDED='P' AND FECNOM=TO_DATE('".$fec1."','YYYY-MM-DD') and Codnom='".$aux2[3]."' and especial='".$aux2[4]."' Order By CodCon";
      if (Herramientas::BuscarDatos($sql,$result))
      {
        $i=0;
        while ($i<count($result))
        {
         if ($result[$i]["asided"]=='P' && $result[$i]["monto"]>0)
         {
          $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
          if ($pos==0)
          {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["check"]='0';
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
             $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
             $arreglodet[$j-1]["monret"]="0,00";
             $arreglodet[$j-1]["mondes"]="0,00";
             $arreglodet[$j-1]["id"]="9";
          }
          else
          {
              $valor=H::toFloat($arreglodet[$pos-1]["moncau"]);
              $arreglodet[$pos-1]["moncau"]=H::FormatoMonto(($valor+$result[$i]["monto"]),2,',','.');
          }
         }
         $i++;
        }
      }
      $r++;
    }//while
    return true;
  }

  public static function ArregloNomina2($nomina,$referencias,&$arreglodet,&$arregloret,&$dato,$impcpt='',&$arregloret2)
  {
    $dato="";
    $datosnom=split('_', $nomina);
    $tipnom=$datosnom[0];
    $gasto=$datosnom[1];
    $banco=$datosnom[2];
    $fecha=$datosnom[3];
    $nomespecial=$datosnom[4];
    $codnomesp=$datosnom[5];
    $agropnomesp=H::getX_vacio('CODEMP','Opdefemp','Agropnomesp','001');
    
    $result=array();
  $impcpt=='X' ? $sqlimpcpt='' : $sqlimpcpt="AND  b.impcpt='S'";
    if ($agropnomesp=='N')
    $sql="SELECT a.codpre as codpre, a.monto as monto, a.asided as asided, a.codcon as codcon, b.afepre as afepre FROM NPCIENOM a,NPDEFCPT b WHERE  a.CODNOM like '%%%' AND a.CodTipGas='".$gasto."' AND a.CODBAN like '%%%' AND  (a.ASIDED='A' OR a.ASIDED='D') ".($nomespecial=='S' ? "AND a.especial='S' AND a.codnomesp='".$codnomesp."'" : "AND a.especial='N'")." AND a.FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') $sqlimpcpt  AND a.codcon=b.codcon Order By CodCon";
  else
    $sql="SELECT a.codpre as codpre, a.monto as monto, a.asided as asided, a.codcon as codcon, b.afepre as afepre FROM NPCIENOM a,NPDEFCPT b WHERE  a.CODNOM = '".$tipnom."' AND a.CodTipGas='".$gasto."' AND a.CODBAN='".$banco."' AND  (a.ASIDED='A' OR a.ASIDED='D') ".($nomespecial=='S' ? "AND a.especial='S' AND a.codnomesp='".$codnomesp."'" : "AND a.especial='N'")." AND a.FECNOM=TO_DATE('".$fecha."','YYYY-MM-DD') $sqlimpcpt  AND a.codcon=b.codcon Order By CodCon";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$banco);
      $data=OpbenefiPeer::doSelectOne($c);
      if ($data)
      {
        $dato=$data->getCedrif();
      }
      $arreglodet=array();
      $arregloret=array();
      $arregloret2=array();
      $i=0;
      while ($i<count($result))
      {
       if ($result[$i]["asided"]=='A' && $result[$i]["monto"]>0)
       {
        $pos=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
        if ($pos==0)
        {
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
         $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
         $arreglodet[$j-1]["moncau"]=number_format($result[$i]["monto"],2,',','.');
         $arreglodet[$j-1]["monret"]="0,00";
         $arreglodet[$j-1]["mondes"]="0,00";
         $arreglodet[$j-1]["id"]="9";
        }
        else
        {
          $valor=H::convnume($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
        }
       }

       if ($result[$i]["asided"]=='D' && $result[$i]["monto"]>0)
       {
         $c= new Criteria();
         $c->add(OpretconPeer::CODCON,$result[$i]["codcon"]);
         $c->add(OpretconPeer::CODNOM,$tipnom);
         $resultado=OpretconPeer::doSelectOne($c);
         if ($resultado)
         {
          $pos2=OrdendePago::posiciondelaretencion($arregloret,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
          if ($pos2==0)
          {
            $e=count($arregloret)+1;
            $arregloret[$e-1]["codpre"]=$result[$i]["codpre"];
            $arregloret[$e-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
            $arregloret[$e-1]["codtip"]=$resultado->getCodtip();
            $arregloret[$e-1]["monret"]=number_format($result[$i]["monto"],2,',','.');
            $arregloret[$e-1]["refere"]=null;
            $arregloret[$e-1]["id"]="9";

          }
          else
          {
            $valor=H::convnume($arregloret[$pos2-1]["monret"]);
            $arregloret[$pos2-1]["monret"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
          }

          $posY=OrdendePago::posiciondelaretencion2($arregloret2,$resultado->getCodtip(),$result[$i]["codpre"],$i,"");
          if ($posY==0)
          {
            $p=count($arregloret2)+1;
            $arregloret2[$p-1]["codtip"]=$resultado->getCodtip();
            $arregloret2[$p-1]["destip"]="";
            $arregloret2[$p-1]["codcon"]="";
            $arregloret2[$p-1]["basimp"]="0,00";
            $arregloret2[$p-1]["porret"]="0,00";
            $arregloret2[$p-1]["factor"]="0,00";
            $arregloret2[$p-1]["porsus"]="0,00";
            $arregloret2[$p-1]["unitri"]="0,00";
            $arregloret2[$p-1]["esta"]="";
            $arregloret2[$p-1]["base"]="0,00";
            $arregloret2[$p-1]["montorete"]=number_format($result[$i]["monto"],2,',','.');
            $arregloret2[$p-1]["estaislr"]="";
            $arregloret2[$p-1]["esta1xmil"]="";
            $arregloret2[$p-1]["montoiva"]="0,00";
            $arregloret2[$p-1]["estairs"]="";
            $arregloret2[$p-1]["monbasmin"]="0,00";
            $arregloret2[$p-1]["id"]="9";

         }
         else
         {
            $valor=H::convnume($arregloret2[$posY-1]["montorete"]);
            $arregloret2[$posY-1]["montorete"]=number_format(($valor+$result[$i]["monto"]),2,',','.');
          }

         }
         else
         {
           $pos3=OrdendePago::posicion_en_el_grid($arreglodet,$result[$i]["codpre"],$referencias,"");
           if ($pos3==0)
           {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["check"]='0';
             $arreglodet[$j-1]["codpre"]=$result[$i]["codpre"];
             $arreglodet[$j-1]["nompre"]=H::getX('CODPRE','Cpdeftit','Nompre',$result[$i]["codpre"]);
             $arreglodet[$j-1]["moncau"]=number_format(($result[$i]["monto"]*-1),2,',','.');
             $arreglodet[$j-1]["monret"]="0,00";
             $arreglodet[$j-1]["mondes"]="0,00";
             $arreglodet[$j-1]["id"]="9";
           }
           else
           {
            if ($result[$i]["afepre"]=='N'){
                $valordes=H::toFloat($arreglodet[$pos3-1]["mondes"]);
                $arreglodet[$pos3-1]["mondes"]=number_format(($valordes+$result[$i]["monto"]),2,',','.');
             }else {
               $valor=H::convnume($arreglodet[$pos3-1]["moncau"]);
               $arreglodet[$pos3-1]["moncau"]=number_format(($valor-$result[$i]["monto"]),2,',','.');
             }
           }
         }
       }
        $i++;
      }
      $p=0;
      while ($p<count($arreglodet))
      {
        $arreglodet[$p]["monret"]="0,00";
        $p++;
      }

      $inc=0;
      $y=0;
      while ($y<count($arregloret))
      {
        if ($referencias=='')
        { $referencias='_';}
        $refere=split('_',$referencias);
        if ($refere[1]!="")
        {
          if ($y<count($arregloret))
          {
            $I=$y;
          }
          else
          {
            $I=$inc;
            $inc=$inc+1;
            if ($inc>=count($arregloret))
            {
              $inc=0;
            }
          }
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,$arregloret[$y]["refere"]);
        }
        else
        {
          $fil=OrdendePago::posicion_en_el_grid($arreglodet,$arregloret[$y]["codpre"],$referencias,"");
        }

        if ($fil!=0)
        {
         $valor=H::convnume($arreglodet[$fil-1]["monret"]);
         $valor1=H::convnume($arregloret[$y]["monret"]);
         $arreglodet[$fil-1]["monret"]=number_format(($valor+$valor1),2,',','.');
        }else {
          $valor=H::convnume($arreglodet[$fil]["monret"]);
          $valor1=H::convnume($arregloret[$y]["monret"]);
          $arreglodet[$fil]["monret"]=number_format(($valor+$valor1),2,',','.');
        }
        $y++;
      }
       return true;
    }
  }  


  public static function SalvarDesgloseBenOP($clasemodelo,$grid){
    $referencia=$clasemodelo->getNumord();
    $c = new Criteria();
    $c->add(OpdetbenopPeer::NUMORD,$referencia);
    OpdetbenopPeer::doDelete($c);

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getCedrif()!="" && $x[$j]->getMonben()>0)
     {
       $tabla= new Opdetbenop();
       $tabla->setNumord($referencia);
       $tabla->setCedrif($x[$j]->getCedrif());
       $tabla->setMonben($x[$j]->getMonben());
       $tabla->save();
     }
      $j++;
    }
  }

  public static function aprobarPropuestasPagos($opordpag,$grid)
  {
    $x=$grid[0];
    $j=0;
    $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
    $fecapr=date('Y-m-d');
    while ($j<count($x))
    {
      if ($x[$j]->getAprproord()=="1")
      {
        $sql1="update opordpag set aprproord='A', usuaprpro='".$loguse."', fecaprpro='".$fecapr."'  where numord='".$x[$j]->getNumord()."'";     
        Herramientas::insertarRegistros($sql1);  
      }      
      $j++;
    }
  }  

  public static function SalvarRetencionesOP($clasemodelo,$grid,$grid2){
    $codpre="NOAFECTA";
    $w=new Criteria();
    $w->add(OpdetordPeer::NUMORD,$clasemodelo->getNumord());
    $regw= OpdetordPeer::doSelect($w);
    if ($regw){
      foreach ($regw as $objw) {
        if ($objw->getRetiva()=='N'){
          $objw->setMonret($clasemodelo->getMonret());
          $refcom=$objw->getRefcom();
          $codpre=$objw->getCodpre();
          $objw->save();
          break;
        }
      }
    }

    $x=$grid2[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodtip()!="" )
      {
        $x[$j]->setNumord($clasemodelo->getNumord());
        $x[$j]->setCodpre($codpre);
        $x[$j]->setNumret('NOASIGNA');
        if ($refcom!='')
          $x[$j]->setRefere($refcom);
        else
          $x[$j]->setRefere('NULO');
        $x[$j]->setCorrel(str_pad($j+1,3,'0',STR_PAD_LEFT));
        $x[$j]->setMonret($x[$j]->getMonret()*H::toFloat($clasemodelo->getValmon(),6));
        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid2[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
    //Actualizo Datos de la OP
    $e=new Criteria();
    $e->add(OpordpagPeer::NUMORD,$clasemodelo->getNumord());
    $rege= OpordpagPeer::doSelectOne($e);
    if ($rege){
      $rege->setMonret($clasemodelo->getMonret());
      $rege->save();
    }
  }

  public static function BuscarIva($retenciones, $referencias){
    $arreiva=array();
    if ($retenciones!='') {
      $cadenaret=explode('!',$retenciones);
      $r=0;
      while ($r<(count($cadenaret)))
      {
         $aux=$cadenaret[$r];
         $aux2=explode('*',$aux);
         if ($referencias!=''){
            $arreref=explode('_',$referencias);
            $c= new Criteria();
            $c->add(TsretivaPeer::CODRET,$aux2[0]); //Código de Retención
            $resul= TsretivaPeer::doSelect($c);
            if ($resul)
            {
              foreach ($resul as $codigo)
              {
                $z=0;
                while ($z<(count($arreref)-1))
                {
                  $b= new Criteria();
                  $b->add(CargosolPeer::REQART,$arreref[$z+1]); //Referencia
                  $b->add(CargosolPeer::CODRGO,$codigo->getCodrec()); //Código Recargo
                  $result2= CargosolPeer::doSelectOne($b);
                  if ($result2)
                  {
                    $a= new Criteria();
                    $a->add(CarecargPeer::CODRGO,$result2->getCodrgo()); //Código Recargo
                    $result3= CarecargPeer::doSelectOne($a);
                    if ($result3)
                    {
                      $arreiva[$aux2[0].'_'.$result3->getMonrgo()] = $aux2[0].'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
                    }
                  }
                  else
                  {
                    $a= new Criteria();
                    $a->add(CarecargPeer::CODRGO,$codigo->getCodrec()); //Código Recargo
                    $result3= CarecargPeer::doSelectOne($a);
                    if ($result3)
                    {
                      $arreiva[$aux2[0].'_'.$result3->getMonrgo()] = $aux2[0].'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
                    }
                  }
                  $z++;
                }
              }
            }
         }else {
           $c= new Criteria();
           $c->add(TsretivaPeer::CODRET,$aux2[0]); //Código de Retención
           $resul= TsretivaPeer::doSelect($c);
           if ($resul)
           {
            foreach ($resul as $codigo)
            {
             $a= new Criteria();
             $a->add(CarecargPeer::CODRGO,$codigo->getCodrec()); //Código Recargo
             $result3= CarecargPeer::doSelectOne($a);
             if ($result3)
             {
               $arreiva[$aux2[0].'_'.$result3->getMonrgo()] = $aux2[0].'_'.$result3->getNomrgo().'_'.$result3->getMonrgo();
             }
            }
          }
         }
        $r++;
      }
    }
    return $arreiva;
  }

  public static function BuscarCombos($retenciones,$tipo){
    $arre=array();
    if ($retenciones!='') {
      $cadenaret=explode('!',$retenciones);
      $r=0;
      while ($r<(count($cadenaret)))
      {
         $aux=$cadenaret[$r];
         $aux2=explode('*',$aux);
         $c= new Criteria();
         if ($tipo=='ISLR')
          $c->add(TsrepretPeer::CODREP,'002'); // 002 es la Retencion de ISLR
         else if ($tipo=='IRS')
           $c->add(TsrepretPeer::CODREP,'005'); // 005 es la Retencion de IRS
         else if ($tipo=='IMN')
           $c->add(TsrepretPeer::CODREP,'004'); // 004 es la Retencion de IMN
          $c->add(TsrepretPeer::CODRET,$aux2[0]); //Código de Retención
          $resul= TsrepretPeer::doSelectOne($c);
          if ($resul)
          {
            $b= new Criteria();
            $b->add(OptipretPeer::CODTIP,$aux2[0]); //Código de Retención
            $result2= OptipretPeer::doSelectOne($b);
            if ($result2)
            {
             if ($result2->getPorret()>0)
             {
               $arre[$aux2[0].'_'.$result2->getPorret()] = $aux2[0].'_'.$result2->getDestip();
             }else{
              $arre[$aux2[0].'_'.$result2->getPorsus()] = $aux2[0].'_'.$result2->getDestip();
             }
            }
          }
        $r++;
      }
    }else {
        $b= new Criteria();
        $result2= OptipretPeer::doSelect($b);
        if ($result2)
        {
          foreach ($result2 as $obj2)
          {
            $arre[$obj2->getCodtip().'_'.$obj2->getPorret()] = $obj2->getCodtip().'_'.$obj2->getDestip();
          }
        }
    }
    return $arre;
  }

 public static function SalvarFacturasOP($clasemodelo,$grid){
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getFecfac()!="" && ($x[$j]->getNumfac()!='' || $x[$j]->getNotdeb()!='' || $x[$j]->getNotcrd()!=''))
      {
        $x[$j]->setNumord($clasemodelo->getNumord());
        if ($x[$j]->getTiptra()=='01')        
          $x[$j]->setNumfac($x[$j]->getNumfac());        
        else if ($x[$j]->getTiptra()=='02')        
          $x[$j]->setNumfac($x[$j]->getNotdeb());        
        else {
          $x[$j]->setNumfac($x[$j]->getNotcrd());
          $x[$j]->setTotfac($x[$j]->getTotfac()*-1);
        }

        if ($x[$j]->getRifalt()=='')
          $x[$j]->setRifalt($clasemodelo->getCedrif());        

        $x[$j]->save();
      }      
      $j++;
    }

    $z=$grid[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
          $z[$l]->delete();
          $l++;
      }
    }
 }

 public static function CalculaIvaRetenido($codiva,$impuesto,$unidad,$retenciones){
    $ivaret=0;
    if ($retenciones!='') {
      $cadenaret=explode('!',$retenciones);
      $r=0;
      while ($r<(count($cadenaret)))
      {
         $aux=$cadenaret[$r];
         $aux2=explode('*',$aux);
         if ($aux2[0]==$codiva){
           if ($aux2[2]!='N'){
            $base=H::toFloat($aux2[8]);
            $porret=H::toFloat($aux2[9]);            
            $factor=H::toFloat($aux2[10]);
            $porsus=H::toFloat($aux2[11]);
            $unitri=H::toFloat($aux2[12]);
            if ($porret!=0){
              $ivaret=($impuesto*($base/100))*($porret/100);
            }else {
              $sustraendo=($unidad*$unitri*$factor)*($porsus/100);
              $retencion=($impuesto*($base/100))*($porsus/100);
              if ($retencion>$sustraendo)
                $ivaret=$retencion-$sustraendo;
              else
                $ivaret=$sustraendo;
            }
           }
         }         
        $r++;
      }
    }
    return $ivaret;
  }

  public static function CalculaLTF($totfac,$impuesto,$retenciones,$basemil,&$bltf,&$pltf,&$mltf){
    $tieltf=false;
    $bltf=$pltf=$mltf=0;
    if ($retenciones!='') {
      $cadenaret=explode('!',$retenciones);
      $r=0;
      while ($r<(count($cadenaret)))
      {
         $aux=$cadenaret[$r];
         $aux2=explode('*',$aux);
          if ($aux2[5]=='S'){ //Tiene LTF
            $tieltf=true;
            $base=H::toFloat($aux2[8]);
            $porret=H::toFloat($aux2[9]); 
            $baseltf=H::toFloat($aux2[3]);
            if (H::toFloat($basemil)>0)           
              $bltf=H::toFloat($basemil);
            else
              $bltf=$baseltf;//($totfac-$impuesto)*$base/100;

            $pltf=$porret;
            $mltf=($bltf*H::toFloat($aux2[1]))/$baseltf; //H::toFloat($aux2[1]);
          }         
        $r++;
      }
    }
    return $tieltf;
  }  

  public static function CalculaISLR($totfac,$impuesto,$retenciones,$baseislr,$codret,&$bislr,&$pislr,&$mislr){
    $tieislr=false;
    $bislr=$pislr=$mislr=0;
    if ($retenciones!='') {
      $cadenaret=explode('!',$retenciones);
      $r=0;
      while ($r<(count($cadenaret)))
      {
         $aux=$cadenaret[$r];
         $aux2=explode('*',$aux);
          if ($aux2[4]=='S' && $aux2[0]==$codret){ //Tiene ISLR
            $tieislr=true;
            $base=H::toFloat($aux2[8]);
            $basislr=H::toFloat($aux2[3]);
            $porret=$aux2[9]; 
            if (H::toFloat($baseislr)>0)           
              $bislr=H::toFloat($baseislr);
            else
              $bislr=$basislr; //($totfac-$impuesto)*$base/100;

            $pislr=$aux2[0].'_'.$porret;
            $mislr=($bislr*H::toFloat($aux2[1]))/$basislr; //H::toFloat($aux2[1]);
          }         
        $r++;
      }
    }
    return $tieislr;
  }    

  public static function CalculaIRS($totfac,$impuesto,$retenciones,$baseirs,$codret,&$birs,&$pirs,&$mirs){
    $tieirs=false;
    $birs=$pirs=$mirs=0;
    if ($retenciones!='') {
      $cadenaret=explode('!',$retenciones);
      $r=0;
      while ($r<(count($cadenaret)))
      {
         $aux=$cadenaret[$r];
         $aux2=explode('*',$aux);
          if ($aux2[6]=='S' && $aux2[0]==$codret){ //Tiene IRS
            $tieirs=true;
            $base=H::toFloat($aux2[8]);
            $basirs=H::toFloat($aux2[3]);
            $porret=$aux2[9]; 
            if (H::toFloat($baseirs)>0)           
              $birs=H::toFloat($baseirs);
            else
              $birs=$basirs; //($totfac-$impuesto)*$base/100;

            $pirs=$aux2[0].'_'.$porret;
            $mirs=($birs*H::toFloat($aux2[1]))/$basirs; //H::toFloat($aux2[1]);
          }         
        $r++;
      }
    }
    return $tieirs;
  }

  public static function CalculaIMN($totfac,$impuesto,$retenciones,$baseimn,$codret,&$bimn,&$pimn,&$mimn){
    $tieimn=false;
    $bimn=$pimn=$mimn=0;
    if ($retenciones!='') {
      $cadenaret=explode('!',$retenciones);
      $r=0;
      while ($r<(count($cadenaret)))
      {
         $aux=$cadenaret[$r];
         $aux2=explode('*',$aux);
          if ($aux2[7]=='S' && $aux2[0]==$codret){ //Tiene Impuesto Municipal
            $tieimn=true;
            $base=H::toFloat($aux2[8]);
            $basimn=H::toFloat($aux2[3]);
            $porret=$aux2[9]; 
            if (H::toFloat($baseimn)>0)           
              $bimn=H::toFloat($baseimn);
            else
              $bimn=$basimn; //($totfac-$impuesto)*$base/100;

            $pimn=$aux2[0].'_'.$porret;
            $mimn=($bimn*H::toFloat($aux2[1]))/$basimn; //H::toFloat($aux2[1]);
          }         
        $r++;
      }
    }
    return $tieimn;
  }  

}
?>
