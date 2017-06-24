<?php
/**
 * Cheques: Clase estática para procesar los cheques del módulo de caja y bancos
 *
 * @package    Roraima
 * @subpackage tesoreria
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cheques
{
  public static function ObtenerAjuste($numord)
  {
    $result=array();
    $Valmon=H::getX_vacio('NUMORD','Opordpag','Valmon',$numord);
    $sql="Select coalesce(sum(MonAju),0) as  monaju From CPImpCau Where RefCau='". $numord ."'";
    if (Herramientas::BuscarDatos($sql,$result))
    return $ajuste = $result[0]['monaju']/$Valmon;
    else
    return 0;
  }

  public static function Obtener_Monto_Total_Orden($numord)
  {
    $total = 0;
    $result=array();
    $sql = "Select monord,monret, mondes, numord, valmon from OPOrdPag where NumOrd='".$numord."'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $total = $result[0]['monord'] -$result[0]['monret'] - $result[0]['mondes'] -(self::ObtenerAjuste($result[0]['numord'])*$result[0]['valmon']);
    }
    return $total;
  }

  public static function Genera_MovLib($tscheemi,$Descrip,$Monto,$Comprobante,$numche,$refpago='', $cedrif)
  {
    $result=array();
    //$genmov=H::getX('CODTIP','Tstipmov','Genmov',$tscheemi->getTipdoc());
    $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    //if ($genmov=='S' || $genmov=='') {
      $criterio = "Select * From TSMOVLIB Where NumCue = '".$tscheemi->getNumcue()."' AND RefLib = '".$numche."' And TipMov='".$tscheemi->getTipdoc()."'";
      if (!Herramientas::BuscarDatos($criterio,$result))
      {
        $tsmovlib = new Tsmovlib();
        $tsmovlib->setRefpag($refpago);
        $tsmovlib->setNumcue($tscheemi->getNumcue());
        $tsmovlib->setReflib($numche);
        $tsmovlib->setFeclib($tscheemi->getFecemi());
        $tsmovlib->setTipmov($tscheemi->getTipdoc());
        $tsmovlib->setDeslib($Descrip);
        $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
        $tsmovlib->setMonmov($Monto*$valor);
        $tsmovlib->setCodcta($CtaBan);
        $tsmovlib->setNumcom($Comprobante);
        $tsmovlib->setFeccom($tscheemi->getFecemi());
        $tsmovlib->setStatus("C");
        $tsmovlib->setStacon("N");
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $tsmovlib->setLoguse($loguse);
        $tsmovlib->setFecing(date("Y-m-d"));
        $tsmovlib->setCedrif($cedrif);
        $tsmovlib->setCodconcepto($tscheemi->getCodconcepto());
        $tsmovlib->setCodpro($tscheemi->getCodpro());
        $tsmovlib->setCoddirec($tscheemi->getCoddirec());
        $moneda=$tscheemi->getCodmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
        else
            $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda2);
        $tsmovlib->setCodmon($moneda);
        $tsmovlib->setValmon($valor);  
        $tsmovlib->save();

        Comprobante::ActualizarReferenciaComprobante($Comprobante,$numche,'');

      }
      else
      {
        $mensaje="El Movimiento Según Libro ya ha Sido Grabado";
      }
   //}
  }


  public static function Actualiza_Bancos($tscheemi,$Accion,$DebCre,$Monto,$numche)
  {
    $result=array();
    $c = new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$tscheemi->getNumcue());
    $tsdefban = TsdefbanPeer::doSelectOne($c);
    if ($tsdefban)
    {
      switch($DebCre) {
        case "D":
          if ($Accion== "A")
          {
            $Debito = $tsdefban->getDeblib();
            $Total = $Debito + $Monto;
            $tsdefban->setDeblib($Total);
            $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tscheemi->getTipdoc());
            if ($escheque==1) $tsdefban->setNumche($numche);
          }
          else if ($Accion == "E")
          {
            $Debito = $tsdefban->getDeblib();
            $Total = $Debito - $Monto;
            $tsdefban->setDeblib($Total);
            $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tscheemi->getTipdoc());
            if ($escheque==1) $tsdefban->setNumche($numche);
          }
          $tsdefban->save();
         case "C":
           if ($Accion== "A")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito + $Monto;
             $tsdefban->setCrelib($Total);
             $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tscheemi->getTipdoc());
             if ($escheque==1)
             {
	             $nrocheque=intval($numche);
	             $nrocheque=$nrocheque+1;
	             $newnumche=str_pad($nrocheque,8,"0",STR_PAD_LEFT);
	             $tsdefban->setNumche($newnumche);
             }
           }
           if ($Accion== "E")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito - $Monto;
             $tsdefban->setCrelib($Total);
             $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tscheemi->getTipdoc());
             if ($escheque==1)
             {
	             $nrocheque=intval($numche);
	             $nrocheque=$nrocheque-1;
	             $newnumche=str_pad($nrocheque,8,"0",STR_PAD_LEFT);
	             $tsdefban->setNumche($newnumche);
             }
           }

           $tsdefban->save();
      }//  switch($DebCre)
    }// if ($tsdefban)
  }

  //Para Generar Imputaciones Presupuestaria desde Ordenes de Pago(Causados), Compromisos y Precompromisos,  "D" Pago Directo
  public static function Genera_Pagos($tscheemi,$NumOrd,$CedRif, $TipoCa,$DesOrd,$Monto,$TipoOrig,$Porcentaje,$numche,$grid)
  // TipoOrig = "O" : Orden de Pago, "C" : Compromiso, "P" : PreCompromiso
  {
    //Preguntar si afecta o no al pagado
    $refpag=Herramientas::getX('tippag','Cpdocpag','Afepag',$tscheemi->getTipdoc());
    //Cambio de Moneda
    $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

  $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
  $refpagaux = "NULO";
  if ($TipoOrig == "O") {
    $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$NumOrd."' AND B.TIPCAU=A.TIPCAU";
    if (Herramientas::BuscarDatos($criterio,$result))
    {
      if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N"))
      {
        // Afecta Presupuesto
        if ($refpag != "N")
        {
            $cppagos=new Cppagos();
            $refpagaux = self::Buscar_Correlativo_Pago();
            $cppagos->setRefpag($refpagaux);
            $cppagos->setTippag($tscheemi->getTipdoc());
            $cppagos->setFecpag($tscheemi->getFecemi());
            $anno=substr($tscheemi->getFecemi(),0, 4);
            $cppagos->setAnopag($anno);
            $cppagos->setCedrif($CedRif);
            $cppagos->setRefcau($NumOrd);
            $cppagos->setTipcau($TipoCa);
            $cppagos->setDespag($DesOrd);
            $cppagos->setDesanu(null);
            if ($moneda2!=$moneda) $cppagos->setMonpag($Monto*$valor);
            else $cppagos->setMonpag($Monto);
            
            $cppagos->setSalaju(0);
            $cppagos->setStapag("A");
            if ($filsoldir=='S'){
              $cppagos->setCoddirec($tscheemi->getCoddirec());
            }
            $cppagos->save();

            $c = new Criteria();
       	    $datos = CpdefnivPeer::doSelectOne($c);
       	    if ($datos){
    			   $datos->setCorpag($refpagaux);
       			 $datos->save();
       		  }
            if ($TipoOrig == "O")
            {
              self::Genera_ImpPag($tscheemi,$NumOrd,$numche,$Porcentaje,$refpagaux);
            }        
        }//if ($refpag != "N")
      }
    }
  }else {
     // Afecta Presupuesto
        if ($refpag != "N")
        {
            $cppagos=new Cppagos();
            $refpagaux = self::Buscar_Correlativo_Pago();
            $cppagos->setRefpag($refpagaux);
            $cppagos->setTippag($tscheemi->getTipdoc());
            $cppagos->setFecpag($tscheemi->getFecemi());
            $anno=substr($tscheemi->getFecemi(),0, 4);
            $cppagos->setAnopag($anno);
            $cppagos->setCedrif($CedRif);
            $cppagos->setRefcau($NumOrd);
            $cppagos->setTipcau($TipoCa);
            $cppagos->setDespag($DesOrd);
            $cppagos->setDesanu(null);
            if ($moneda2!=$moneda) $cppagos->setMonpag($Monto*$valor);
            else $cppagos->setMonpag($Monto);
            
            $cppagos->setSalaju(0);
            $cppagos->setStapag("A");
            if ($filsoldir=='S'){
              $cppagos->setCoddirec($tscheemi->getCoddirec());
            }
            $cppagos->save();

            $c = new Criteria();
            $datos = CpdefnivPeer::doSelectOne($c);
            if ($datos){
              $datos->setCorpag($refpagaux);
              $datos->save();
            }

            if ($TipoOrig == "C")
            {
              self::Genera_ImpPag_De_Compromiso($numche,$grid,$refpagaux,$tscheemi);
            }
            if ($TipoOrig == "P")
            {
              self::Genera_ImpPag_De_PreCompromiso($numche,$grid,$refpagaux,$tscheemi);
            }
            if ($TipoOrig == "D")
            {
              self::Genera_ImpPag_Pago_Directo($numche,$grid,$refpagaux,$tscheemi);
            }
     }//if ($refpag != "N")
  }
 return $refpagaux;
} //end sub

   public static function Buscar_Correlativo_Pago(){
   	$c = new Criteria();
   	$datos = CpdefnivPeer::doSelectOne($c);
   	if ($datos){
   		$corpag = (int)$datos->getCorpag();
   		$newcorpag = $corpag + 1;
   		$cadcorpag = str_pad((string)$newcorpag, 8, "0", STR_PAD_LEFT);
   		$valido = false;
   		while(!$valido){
   			$c2 = new Criteria();
	   		$c2->add(CppagosPeer::REFPAG,$cadcorpag);
	   		$contabc = CppagosPeer::doSelectOne($c2);
	   		if($contabc){
	   			$newcorpag++;
	   			$cadcorpag = str_pad((string)$newcorpag, 8, "0", STR_PAD_LEFT);
	   		}
	   		else {
	   			$valido = true;
	   		}
   		}
   		//$datos->setCorpag((string)$newcorpag);
   		//$datos->save();
   		return $cadcorpag;
   	}
   	else return "00000000";
   }

   public static function Buscar_Correlativo_Comprobante(){
   	$c = new Criteria();
   	$datos = CpdefnivPeer::doSelectOne($c);
   	if ($datos){
   		$corcomcont = (int)$datos->getCorcomcont();
   		$newcorcomcont = $corcomcont + 1;
   		$cadcorcomcont = str_pad((string)$newcorcomcont, 8, "0", STR_PAD_LEFT);;
   		$valido = false;
   		while(!$valido){
   			$c2 = new Criteria();
	   		$c2->add(ContabcPeer::NUMCOM,$cadcorcomcont);
	   		$contabc = ContabcPeer::doSelectOne($c2);
	   		if($contabc){
	   			$newcorcomcont++;
	   			$cadcorcomcont = str_pad((string)$newcorcomcont, 8, "0", STR_PAD_LEFT);
	   		}
	   		else {
	   			$valido = true;
	   		}
   		}
   		//$datos->setCorcomcont((string)$newcorcomcont);
   		//$datos->save();
   		return $cadcorcomcont;
   	}
   	else return "00000000";
   }


   public static function Genera_Pagos_Compuesto($tscheemi,$NumOrd,$CedRif,$TipoCa,$DesOrd,$numche,$grid)
   {
     //Cambio de Moneda
    $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

     $MontoDelCompuesto = 0;
     $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
      $j=0;
      $result=array();
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          $monpagado=H::getX('Numord','Opordpag','Monpag',$grid[$j]->getNumord());
          $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis, B.Numord, B.Tipcau, B.Desord From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$grid[$j]->getNumord()."' AND B.TIPCAU=A.TIPCAU";
          if (Herramientas::BuscarDatos($criterio,$result))
          {
            if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")){
               $NumOrd=$result[0]['numord'];
               $TipoCa=$result[0]['tipcau'];
               $DesOrd=$result[0]['desord'];
               if ($monpagado==0 || is_null($monpagado))
                 $MontoDelCompuesto = $MontoDelCompuesto + $grid[$j]->getMontotalGrid()+ $grid[$j]->getMondes();
               else 
                $MontoDelCompuesto = $MontoDelCompuesto + $grid[$j]->getMontotalGrid();
            }
          }//if (!Herramientas::BuscarDatos($criterio,&$result))
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }  //End del ciclo que recorre el grid while ($j<count($grid))

      //Preguntar si afecta o no al pagado
      $refpag=Herramientas::getX('tippag','Cpdocpag','Afepag',$tscheemi->getTipdoc());
      $refpagaux = "";
      // Afecta Presupuesto
      if ($refpag != "N")
      {
        /*$criterio = "Select * From CPPAGOS Where RefPag = '".$numche."' Order by RefPag";
        if (!Herramientas::BuscarDatos($criterio,&$result))
        {*/
          $cppagos=new Cppagos();
          $refpagaux = self::Buscar_Correlativo_Pago();
          $cppagos->setRefpag($refpagaux);
          $cppagos->setTippag($tscheemi->getTipdoc());
          $cppagos->setFecpag($tscheemi->getFecemi());
          $anno=substr($tscheemi->getFecemi(),0, 4);
          $cppagos->setAnopag($anno);
          $cppagos->setCedrif($CedRif);
          $cppagos->setRefcau($NumOrd);
          $cppagos->setTipcau($TipoCa);
          $cppagos->setDespag($DesOrd);
          $cppagos->setDesanu(null);
          if ($moneda2!=$moneda) $cppagos->setMonpag($MontoDelCompuesto*$valor);
          else $cppagos->setMonpag($MontoDelCompuesto);
          $cppagos->setSalaju(0);
          $cppagos->setStapag("A");
          if ($filsoldir=='S'){
            $cppagos->setCoddirec($tscheemi->getCoddirec());
          }
          $cppagos->save();

          $c = new Criteria();
	   	  $datos = CpdefnivPeer::doSelectOne($c);
	      if ($datos){
	      	$datos->setCorpag((string)$refpagaux);
	   		$datos->save();
	      }

          self::Genera_ImpPag_Compuesto($tscheemi,$grid,$refpagaux);
       /* }
        else
        {
          $mensaje="El Pagado ya ha Sido Grabado";
        }//if (!Herramientas::BuscarDatos($criterio,&$result))        
        */
    }//if ($refpag != "N")
    return $refpagaux;
   }

  public static function Genera_ImpPag($tscheemi,$numord,$numche,$porcentaje,$refpag)
  {
    $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
    $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$numord."' AND B.TIPCAU=A.TIPCAU";
    if (Herramientas::BuscarDatos($criterio,$result))
    {
      if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N"))
      {
        $sql = "Select numord,codpre,refcom,sum(moncau) as moncau,sum(monret) as monret From OPDETORD Where NumOrd = '".$numord."' GROUP BY NUMORD,CODPRE,REFCOM";
        if (Herramientas::BuscarDatos($sql,$opdetord))
        {
          $k=0;
          while ($k<count($opdetord))
          {
            $cpimppag= new Cpimppag();
            //$cpimppag->setRefpag($numche);
            $cpimppag->setRefpag($refpag);
            $cpimppag->setCodpre($opdetord[$k]['codpre']);
            $monimp = (($opdetord[$k]['moncau']-H::toFloat(self::ObtenerAjuste2($numord,$opdetord[$k]['codpre'])))* $porcentaje) / 100;
            $cpimppag->setMonimp($monimp);
            $cpimppag->setMonaju(0);
            $cpimppag->setStaImp("A");
            $cpimppag->setRefere($numord);
            if (trim($opdetord[$k]['refcom'])=="")
              $newsql= "Select refere,refprc From CPIMPCAU Where RefCau = '".$numord."' And CodPre = '".$opdetord[$k]['codpre']."'";
            else
              $newsql= "Select refere,refprc From CPIMPCAU Where RefCau = '".$numord."' And CodPre = '".$opdetord[$k]['codpre']."' And Refere = '".$opdetord[$k]['refcom']."'";
            $resimpcau=array();
            if (Herramientas::BuscarDatos($newsql,$resimpcau))
            {
              if ($resimpcau[0]['refere']!='') //No es Null
              {
              	$cpimppag->setRefcom($resimpcau[0]['refere']);
                
              }
              else
              {
              	$cpimppag->setRefcom('NULO');
              }

              if ($resimpcau[0]['refprc']!='')
              {
                $cpimppag->setRefprc($resimpcau[0]['refprc']);
              }
              else
              {
              	$cpimppag->setRefprc('NULO');
              }

            }
            else
            {
              $cpimppag->setRefcom('NULO');
              $cpimppag->setRefprc('NULO');
            }

            $cpimppag->save();
            if ($manevento=='S')
            {
               $tipdoc=$tipdoc=H::getX_vacio('REFPAG','Cppagos','Tippag',$refpag);
               $q= new Criteria();
               $q->add(CpdisevePeer::REFDOC,$numord);
               $q->add(CpdisevePeer::CODPRE,$opdetord[$k]['codpre']);
               $q->add(CpdisevePeer::TIPMOV,'CAU');
               $tradis=CpdisevePeer::doSelectOne($q);
               if ($tradis) {
                  $codeve=$tradis->getCodeve();
                  $cpdiseve= new Cpdiseve();
                  $cpdiseve->setRefdoc($refpag);
                  $cpdiseve->setCodpre($opdetord[$k]['codpre']);
                  $cpdiseve->setCodeve($codeve);
                  $cpdiseve->setMoneve($monimp);
                  $cpdiseve->setTipdoc($tipdoc);
                  $cpdiseve->setTipmov('PAG');
                  $cpdiseve->save();
              }
            }
            $k++;
          }//while ($k<count($ordpag))


        }//if (Herramientas::BuscarDatos($sql,&$$opdetord))
      }//if !($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")
    }//if (!Herramientas::BuscarDatos($criterio,&$result))
  }


  public static function Genera_ImpPag_Compuesto($tscheemi,$grid,$refpag)
  {
      $j=0;
      $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
          $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
      $result=array();
      $opdetord=array();
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          $monpagado=H::getX('Numord','Opordpag','Monpag',$grid[$j]->getNumord());
          //AGREGADO PARA QUE SE PUEDAN CANCELAR ORDENES DE PAGO QUE AFECTAN PRESUPUESTO Y OTRAS QUE NO AFECTAN
          $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$grid[$j]->getNumord()."' AND B.TIPCAU=A.TIPCAU";
          if (Herramientas::BuscarDatos($criterio,$result))
          {
            if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N"))
            {
              $sql = "Select numord,codpre,refcom,sum(moncau) as moncau,sum(monret) as monret From OPDETORD Where NumOrd = '".$grid[$j]->getNumord()."' GROUP BY NUMORD,CODPRE,REFCOM";
              if (Herramientas::BuscarDatos($sql,$opdetord))
              {
                $k=0;
                while ($k<count($opdetord))
                {
                  $cpimppag= new Cpimppag();
                  //$cpimppag->setRefpag($tscheemi->getNumche());
                  $cpimppag->setRefpag($refpag);
                  $cpimppag->setCodpre($opdetord[$k]['codpre']);

                  /*$m1=$montotord;          
                  $m2=H::toFloat($monretenido);
                  $m3=self::ObtenerAjuste($x[$j]->getNumord())/$monvalord;
                  if ($monpagado==0 || is_null($monpagado))
                  $Porcentaje =  (($Monto + H::toFloat($monamortizado)) * 100) / (($m1-$m3) - $m2);
                  else
                  $Porcentaje =  (($Monto) * 100) / (($m1-$m3) - $m2);*/

                  if ($monpagado==0 || is_null($monpagado))
                    $Porcentaje = (($grid[$j]->getMontotalGrid() + $grid[$j]->getMondes()) * 100) / self::Obtener_Monto_Total_Orden($grid[$j]->getNumord());
                  else
                      $Porcentaje = (($grid[$j]->getMontotalGrid()) * 100) / self::Obtener_Monto_Total_Orden($grid[$j]->getNumord());
                  $monimp = (($opdetord[$k]['moncau']-H::toFloat(self::ObtenerAjuste2($numord,$opdetord[$k]['codpre']))) * ($Porcentaje*$valor)) / 100;
                  $cpimppag->setMonimp($monimp);
                  $cpimppag->setMonaju(0);
                  $cpimppag->setStaImp("A");
                  $cpimppag->setRefere($opdetord[$k]['numord']);
                  $newsql= "Select refere,refprc From CPIMPCAU Where RefCau = '".$opdetord[$k]['numord']."' And CodPre = '".$opdetord[$k]['codpre']."' And Refere = '".$opdetord[$k]['refcom']."'";
                  $resimpcau=array();
                  if (Herramientas::BuscarDatos($newsql,$resimpcau))
                  {
                    if ($resimpcau[0]['refere']!="")//No es Null
                    {
                     $cpimppag->setRefcom($resimpcau[0]['refere']);
                    }else
                    {
                     $cpimppag->setRefcom('NULO');
                    }

                    if ($resimpcau[0]['refprc']!="")
                    {
                     $cpimppag->setRefprc($resimpcau[0]['refprc']);
                    }
                    else
                    {
                     $cpimppag->setRefprc('NULO');
                    }
                  }
                  else
                  {
                  	$cpimppag->setRefcom('NULO');
                    $cpimppag->setRefprc('NULO');
                  }
                  $cpimppag->save();
                  if ($manevento=='S')
                  {
                     $tipdoc=$tipdoc=H::getX_vacio('REFPAG','Cppagos','Tippag',$refpag);
                     $q= new Criteria();
                     $q->add(CpdisevePeer::REFDOC,$numord);
                     $q->add(CpdisevePeer::CODPRE,$opdetord[$k]['codpre']);
                     $q->add(CpdisevePeer::TIPMOV,'CAU');
                     $tradis=CpdisevePeer::doSelectOne($q);
                     if ($tradis) {
                        $codeve=$tradis->getCodeve();
                        $cpdiseve= new Cpdiseve();
                        $cpdiseve->setRefdoc($refpag);
                        $cpdiseve->setCodpre($opdetord[$k]['codpre']);
                        $cpdiseve->setCodeve($codeve);
                        $cpdiseve->setMoneve($monimp);
                        $cpdiseve->setTipdoc($tipdoc);
                        $cpdiseve->setTipmov('PAG');
                        $cpdiseve->save();
                    }
                  }
                  $k++;
                }//while ($k<count($ordpag))
              }//if (Herramientas::BuscarDatos($sql,&$$opdetord))
            }//if !($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")
          }//if (!Herramientas::BuscarDatos($criterio,&$result))
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }//while ($j<count($grid))
  }

  public static function Genera_ImpPag_De_Compromiso($numche,$grid,$refpag,$tscheemi)
  {
     //Cambio de Moneda
    $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    
    $j=0;
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          $cpimppag= new Cpimppag();
          //$cpimppag->setRefpag($numche);
          $cpimppag->setRefpag($refpag);
          $cpimppag->setCodpre($grid[$j]->getCodpre());
          if ($moneda2!=$moneda) $cpimppag->setMonimp($grid[$j]->getMonporpagGrid()*$valor);
          else $cpimppag->setMonimp($grid[$j]->getMonporpagGrid());
          $cpimppag->setMonaju(0);
          $cpimppag->setStaImp("A");
          $cpimppag->setRefere('NULO');
          $cpimppag->setRefcom($grid[$j]->getRefcom());
          $newsql= "Select refere From CPIMPCOM Where RefCom = '".$grid[$j]->getRefcom()."' And CodPre = '".$grid[$j]->getCodpre()."'";
          $resimpcom=array();
          if (Herramientas::BuscarDatos($newsql,$resimpcom))
          {
            if ($resimpcom[0]['refere']!='') //No es Null
            {
              $cpimppag->setRefprc($resimpcom[0]['refere']);
            }
            else
            {
              $cpimppag->setRefprc('NULO');
            }
          }
          else
          {
          	$cpimppag->setRefprc('NULO');
          }
          $cpimppag->save();
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }//while
  }

  public static function Genera_ImpPag_De_PreCompromiso($numche,$grid,$refpag,$tscheemi)
  {
    //Cambio de Moneda
    $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    $j=0;
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          $cpimppag= new Cpimppag();
          //$cpimppag->setRefpag($numche);
          $cpimppag->setRefpag($refpag);
          $cpimppag->setCodpre($grid[$j]->getCodpre());
          if ($moneda2!=$moneda) $cpimppag->setMonimp($grid[$j]->getMonporpagGrid()*$valor);
          else $cpimppag->setMonimp($grid[$j]->getMonporpagGrid());
          $cpimppag->setMonaju(0);
          $cpimppag->setStaImp("A");
          $cpimppag->setRefere('NULO');
          $cpimppag->setRefcom('NULO');
          $cpimppag->setRefprc($grid[$j]->getRefprc());
          $cpimppag->save();
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }//while
  }


  public static function Genera_ImpPag_Pago_Directo($numche,$grid,$refpag,$tscheemi)
  {
    $j=0;
    //Cambio de Moneda
    $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

      $result=array();
      while ($j<count($grid))
      {
        $cpimppag= new Cpimppag();
        //$cpimppag->setRefpag($numche);
        $cpimppag->setRefpag($refpag);
        $cpimppag->setCodpre($grid[$j]->getCodpre());
        if ($moneda2!=$moneda) $cpimppag->setMonimp($grid[$j]->getMonimp()*$valor);
        else $cpimppag->setMonimp($grid[$j]->getMonimp());
        $cpimppag->setMonaju(0);
        $cpimppag->setStaImp("A");
        $cpimppag->setRefere('NULO');
        $cpimppag->setRefprc('NULO');
        $cpimppag->setRefcom('NULO');
        $cpimppag->save();
        $j++;
      }//while
  }


  public static function Grabar_Datos($tscheemi,$Monto,$cedrif,$numche,$reqfirma,$mancomegr)
  {
    $escheque=H::getX('CODTIP','Tstipmov','Escheque',$tscheemi->getTipdoc());
    $gencodseg=H::getConfApp2('gencodseg', 'tesoreria', 'tesmovemiche');
    $comegrseq=H::getConfApp2('comegrseq', 'tesoreria', 'tesmovemiche');
    $gencheqnotdeb="";
    $varemp=sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
			if(array_key_exists('aplicacion',$varemp))
			 if(array_key_exists('tesoreria',$varemp['aplicacion']))
			   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
			     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){			       
			       if(array_key_exists('gencheqnotdeb',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
			       {
			       	$gencheqnotdeb=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['gencheqnotdeb'];
			       }
			     }
	    
    
    $numcomegr="";
    if ($escheque==1 || $gencheqnotdeb=='S')
    {
      $tscheeminew= new Tscheemi();
      $tscheeminew->setTipdoc($tscheemi->getTipdoc());
      $tscheeminew->setNumcue($tscheemi->getNumcue());
      $tscheeminew->setFecemi($tscheemi->getFecemi());

      if (trim($cedrif)!="") $tscheeminew->setCedrif($cedrif);
      $tscheeminew->setNumche($numche);
      $tscheeminew->setCedrifsus($tscheemi->getCedrifsus());
      $tscheeminew->setNombensus($tscheemi->getNombensus());
      //$tscheeminew->setFecent($tscheemi->getFecemi());
      $tscheeminew->setMonche($Monto);
      if ($reqfirma=='S')
      $tscheeminew->setStatus("F");   //Firma
      else $tscheeminew->setStatus("C");  //Caja
      $tscheeminew->setCodent(null);
      $tscheeminew->setObsent(null);
      $tscheeminew->setFecanu($tscheemi->getFecemi());
      $tscheeminew->setCedrec(null);
      $tscheeminew->setNomrec(null);
      if ($mancomegr=='S'){
        if ($tscheemi->getNumcomegr()=='') {
          if ($comegrseq=='S'){
            $valido = false;
            while(!$valido){
              $r = H::getNextvalSecuencia('com_egr_seq');
              $numcomegr=str_pad($r, 8, '0', STR_PAD_LEFT);

              $c = new Criteria();
              $c->add(TscheemiPeer::NUMCOMEGR,$numcomegr);
              $regt = TscheemiPeer::doSelectOne($c);
              if(!$regt){
                $valido = true;
              }
            }
            $tscheeminew->setNumcomegr($numcomegr);
          }else {
            $numcomegr=self::BuscarCorrelEgrMes($tscheemi,$correl,$campo);
            $tscheeminew->setNumcomegr($numcomegr);   //Numero de Comprobante de Egreso
            Herramientas::getSalvarCorrelativo($campo,'tscomegrmes','Referencia',$correl,$msg);
          }
        }else {
          $tscheeminew->setNumcomegr($tscheemi->getNumcomegr()); 
        }
      }
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $tscheeminew->setLoguse($loguse);
      $tscheeminew->setCodconcepto($tscheemi->getCodconcepto());
      $tscheeminew->setCodmon($tscheemi->getCodmon());
      $tscheeminew->setValmon($tscheemi->getValmon());
      $tscheeminew->setCoddirec($tscheemi->getCoddirec());
      $tscheeminew->setCodpro($tscheemi->getCodpro());
      if ($gencodseg=='S') {
        $tscheeminew->setCodseg(self::generarcodigoRandom());
        $tscheeminew->setCodcon(self::generarcodigoRandomConformacion());
      }
      $tscheeminew->setFecreg(time('h:i:s'));
      $tscheeminew->save();

      // Para desbloquear la cuenta Bancaria
      $q= new  Criteria();
  	  $result=OpdefempPeer::doSelectOne($q);
  	  if ($result)
  	  {
		  if ($result->getManbloqban()=='S')
		  {
             $t= new Criteria();
             $t->add(TsbloqbanPeer::NUMCUE,$tscheemi->getNumcue());
             TsbloqbanPeer::doDelete($t);
		  }
      }
    }
  }

  public static function Busca_CtaDes()
  {
      $c = new Criteria();
      $c->add(OpdefempPeer::CODEMP,'001');
      $dato = OpdefempPeer::doSelectOne($c);
      if ($dato)
      $CtaDcto=$dato->getCtades();
      else
      $CtaDcto='';
      return  $CtaDcto;
  }

  /**
   * Función Principal para guardar datos del formulario TesMovEmiChe
   * TODO Esta función (y todas las demás de su clase) deben retornar u
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $recepcion Object Tscheemi a guardar
   * @param $grid Array de Objects
   * @return void
   */

  public static function ActualizaOrdPag($tscheemi,$grid,$tippag,$despag,$numcomarr,$gencom,&$arraynumche,&$concom,&$arrcompro,$reqfirma,$mancomegr,$comprobaut,&$arraynumcue,&$cheret)
  {
      //////////////////////PAGO SIMPLE/////////////////////////////////////////////////////////////////////
    $arraynumche="";
    $arraynumcue="";
    $concom=0;
    $gencomaut=H::getConfApp2('gencomaut', 'tesoreria', 'tesmovemiche');
    $gradesche=H::getConfApp2('gradesche', 'tesoreria', 'tesmovemiche');
    if ($tippag=='S') //Pago Simple
    {
      $x=$grid[0];
      $numche=$tscheemi->getNumche();
      $numcue=$tscheemi->getNumcue();
      $moneda=$tscheemi->getCodmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
                $valor=$tscheemi->getValmon();
        else
            $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
      $j=0;
      $concom=0;
     if ($gencom!="S" && $comprobaut!='S') $minumcom=split("_",$numcomarr);

      while ($j<count($x))
      {
        $Monto=0;
        $MontRet=0;
        $MontDcto=0;
        $CtaDcto="";
        if ($x[$j]->getCheck()=="1")
        {
          $c = new Criteria();
          $c->add(BnubicaPeer::CODUBI,$x[$j]->getCoduni());
          $estatusubica = BnubicaPeer::doSelectOne($c);
          if ($estatusubica)
          {
            if ($estatusubica->getStacod()=='C')
            $GenerarOtro=true;
            else
            $GenerarOtro=false;
          }
          else
          {
            $GenerarOtro=false;
          }

          $x[$j]->setNumche($numche);
          $x[$j]->setCtaban($tscheemi->getNumcue());

          $DescOp=$x[$j]->getDesorden();
          $DesCtaDeb = "PAG.ORD. ". $x[$j]->getNumord();
          $DesCtaCre = $x[$j]->getNombeneficiario();
          $NumOrden = $x[$j]->getNumord();
          $TipCausad = $x[$j]->getTipcau();

           $t2= new Criteria();
           $t2->add(OpordpagPeer::NUMORD,$x[$j]->getNumord());
           $regt2= OpordpagPeer::doSelectOne($t2);
           if ($regt2)
           {
             $monpagado=$regt2->getMonpag();
             $monvalord=$regt2->getValmon();
             $montotord=$regt2->getMonord();
             $monretenido=$regt2->getMonret();
             $monamortizado=$regt2->getMondes();
             $codtde=$regt2->getCodtde();
           }else {
             $monpagado=0;
             $monvalord=0;
             $montotord=0;
             $monretenido=0;
             $monamortizado=0;
             $codtde='';
           }

          //$monpagado=H::getX('Numord','Opordpag','Monpag',$x[$j]->getNumord());
          //$monvalord=H::getX('Numord','Opordpag','Valmon',$x[$j]->getNumord());

          //El status ahora solo se pondra en "I" cuando el monto total de los cheques
          //sea igual al monto de la orden menos el monto de las retenciones
          $CtaPag = $x[$j]->getCtapag();

          //$montotord=H::getX_vacio('Numord','Opordpag','Monord',$x[$j]->getNumord());
          
          //$monretenido=H::getX_vacio('Numord','Opordpag','Monret',$x[$j]->getNumord());
          //if ($x[$j]->getMonret() > 0)
          if (H::toFloat($monretenido)>0)
          {
            $MontRet = $MontRet + H::toFloat($monretenido);//$x[$j]->getMonret();
            //Acumula_Ret GridBd1.TextMatrix(I, 1)
            // GridBd1.TextMatrix(I, 9) = Format(OPORDPAG!MonRet, "##.00")
          }//if ($x[$j]->getMonret() > 0)

          //$Monto =  $x[$j]->getMontotaltotal(); LUIS NO SE PARA QUE PUSO ESTA LINEA; SE DAÑO LO DE PAGOS PARCIALES
           $Monto =  $x[$j]->getMontotalGrid();

           //$monamortizado=H::getX_vacio('Numord','Opordpag','Mondes',$x[$j]->getNumord());           
          //if ($x[$j]->getMondes() > 0 )
           if (H::toFloat($monamortizado)>0)
          {
            $tietipodes=H::getConfApp2('tietipodes', 'tesoreria', 'pagemiord');
            if ($tietipodes=='S')
            {
               //$codtde=H::getX_vacio('Numord','Opordpag','Codtde',$x[$j]->getNumord());
               $CtaDcto = H::getX_vacio('Codtde','Optipdes','Codcta',$codtde);
            }else  $CtaDcto = self::Busca_CtaDes();
            $MontDcto = $MontDcto + H::toFloat($monamortizado);//$x[$j]->getMondes();
          }

          //Vamos a actualizar una tabla nueva llamada OPOrdChe que tiene tantos cheque se hayan hecho
          //a una orden de pago. Tambien actualizaremos el STATUS solo si se paga la orden completamente
          if ($gencom!="S")
          {
            $sql = "Select * from OPOrdChe where NumOrd='". $x[$j]->getNumord()."' and NumChe='". $numche ."' and CodCta='". $tscheemi->getNumcue() ."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $arraynumcue="Esta Orden de Pago ya fue pagada con un cheque de igual número y la misma cuenta";
              return true;
            }
            else
            {
              $opordche = new Opordche();
              $opordche->setNumord($x[$j]->getNumord());
              $opordche->setNumche($numche);
              $opordche->setCodcta($tscheemi->getNumcue());
              $opordche->setTipmov($tscheemi->getTipdoc());
              $monpagopordche=$Monto; //+ H::toFloat($monamortizado); //$x[$j]->getMontotalGrid() + $x[$j]->getMondes();
              $opordche->setMonpag($monpagopordche*$monvalord);
              if ($gencomaut=='S' && $comprobaut=='S'){
                $cheret='N';
                $q= new Criteria();
                $q->add(OpordchePeer::NUMORD,$x[$j]->getNumord());
                $resulq= OpordchePeer::doSelect($q);
                if ($resulq){
                  foreach ($resulq as $objq) {
                    if ($objq->getCompret()=='S'){
                      $cheret='S';
                      break;
                    }
                  }
                }
              }
              if ($tscheemi->getCompret()=='N' || $cheret=='N')
                $opordche->setCompret('S');
              $opordche->save();

              //Ahora Actualizamos el Estatus de la Orden de Pago y el Monto Pagado de la Orden             
              //$monto1=$x[$j]->getMonord() - $x[$j]->getMonret() - (self::ObtenerAjuste($x[$j]->getNumord()/$monvalord));
              //$monto2=$x[$j]->getMonpag() + $x[$j]->getMontotalGrid() + $x[$j]->getMondes();
              
              $monto1=H::toFloat($montotord) - H::toFloat($monretenido) - (self::ObtenerAjuste($x[$j]->getNumord())/$monvalord);
              $monto2=H::toFloat($monpagado) + $Monto + H::toFloat($monamortizado);
              if (H::tofloat($monto1) <= H::tofloat($monto2))
              {
                $x[$j]->setStatus("I");
                $x[$j]->setFecpag($tscheemi->getFecemi());
              }
              $montoordpag= H::toFloat($monpagado) + $Monto;//$x[$j]->getMonpag() + $x[$j]->getMontotalGrid();
              $x[$j]->setMonpag($montoordpag*$monvalord);
            }  /*else if (Herramientas::BuscarDatos($sql,&$result))*/
          }// if ($gencom!="S")

          ///////////////////////////////////////////////////////////////////////////////////////////
          $m1=$montotord;          
          $m2=H::toFloat($monretenido);
          $m3=self::ObtenerAjuste($x[$j]->getNumord())/$monvalord;
          if ($monpagado==0 || is_null($monpagado))
          $Porcentaje =  (($Monto + H::toFloat($monamortizado)) * 100) / (($m1-$m3) - $m2);
          else
          $Porcentaje =  (($Monto) * 100) / (($m1-$m3) - $m2);

            $OrdenDePago = $x[$j]->getNumord();
            if (trim($despag)!= "" && $gradesche=='S')
            $DescOp = $despag;

            if ($gencom=="S")
            {
               $c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
			       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,$msjuno,$arrcompro,$DesCtaCre,$MontRet,$monpagado,"ordpag",$OrdenDePago,$CtaDcto,$DescOp);
			     }
			     else
			     {
                    self::Genera_Comprobante($numche,$tscheemi,$grid,$OrdenDePago,$tippag,$DescOp,$DesCtaDeb,
                                         $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$DescOp,$Monto,$MontRet,
										 "ordpag",$arrcompro,$monpagado,$cheret);
			     }
			   }

                $concom++;
            }
            else
            {        
              $x[$j]->setMondes(H::toFloat($monamortizado)*$monvalord);
              $x[$j]->save();
              if ($comprobaut!='S' && $gencomaut!='S')
              {
              $numcom=$minumcom[$concom +1];
              $concom++;
              }else{
               $c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
			       self::grabarComprobanteAlcAutomatico($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,$DesCtaCre,$numcom,$MontRet,"ordpag",$monpagado,$CtaDcto,$DescOp,$OrdenDePago,$DesCtaDeb);
			     }
			     else
			     {
                    self::Genera_Comprobante_Automatico($numche,$tscheemi,$grid,$OrdenDePago,$tippag,$DescOp,$DesCtaDeb,
                                         $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$DescOp,$Monto,$MontRet,
										 "ordpag",$numcom,$monpagado);
			     }
			   }
              }
              //print "Comprobante Nro. ". $numcom . " para el cheque ". $numche . " con la orden de pago ".$x[$j]->getNumord() ;
		         if ($monpagado==0 || is_null($monpagado))
		          $montoreal =  $Monto + $MontDcto;
		          else
		          $montoreal =  $Monto;

              self::Actualiza_Bancos($tscheemi,"A","C",$Monto,$numche);
              $refpago = self::Genera_Pagos($tscheemi,$x[$j]->getNumord(),$x[$j]->getCedrif(),$TipCausad,$DescOp,$montoreal,"O",$Porcentaje,$numche,$x);
              self::Genera_MovLib($tscheemi,$DescOp,$Monto,$numcom,$numche,$refpago,$x[$j]->getCedrif());
              self::Grabar_Datos($tscheemi,$Monto,$x[$j]->getCedrif(),$numche,$reqfirma,$mancomegr);
              //Actualizar arreglos de Cheques, necesario para imprimir luego los cheques emitidos;
              if (trim($arraynumche)!=""){
                $arraynumche=$arraynumche.",".$numche;
                $arraynumcue=$arraynumcue.",".$numcue;
              }
              else{
                $arraynumche=$numche;
                $arraynumcue=$numcue;
              }
              $estran=H::getX_vacio('CODTIP','Tstipmov','Estran',$tscheemi->getTipdoc());
              if ($estran=='S')
                self::generarTxtProveedor($x[$j]->getCedrif(),$DescOp,$Monto,$numche,$x[$j]->getNumord());

            }// if ($gencom="S")
            $CanRet = 0;

            $numchenew=intval($numche);
            $numchenew=$numchenew+1;
            $numche=str_pad($numchenew,8,"0",STR_PAD_LEFT);
        }//if ($x[$j]->getCheck()=="1")
          $j++;
      }  //End del ciclo que recorre el grid while ($j<count($x))

    }//if ($tippag=='S') Then //Pago Simple

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////PAGO COMPUESTO/////////////////////////////////////////////////////////////////////
    else if ($tippag=='C') //Pago Compuesto
    {
      $x=$grid[0];
      $j=0;
      $numche=$tscheemi->getNumche();
      $numcue=$tscheemi->getNumcue();
      $CtaDcto="";
      $Monto=0;
      $MontRet=0;
      $MontDcto=0;
      $grabar="N";
      $concom=0;
      $numfacs="";
      $estran=H::getX_vacio('CODTIP','Tstipmov','Estran',$tscheemi->getTipdoc());
      while ($j<count($x))
      {
        if ($x[$j]->getCheck()=="1")
        {
          $grabar="S";
          $c = new Criteria();
          $c->add(BnubicaPeer::CODUBI,$x[$j]->getCoduni());
          $estatusubica = BnubicaPeer::doSelectOne($c);
          if ($estatusubica)
          {
            if ($estatusubica->getStacod()=='C')
            $GenerarOtro=true;
            else
            $GenerarOtro=false;
          }
          else
          {
            $GenerarOtro=false;
          }

          $x[$j]->setNumche($numche);
          $x[$j]->setCtaban($tscheemi->getNumcue());

          if (trim($despag)!= "")
            $DescOp = $despag;
          else
            $DescOp = $x[$j]->getDesorden();

          $DesCtaDeb=$DescOp;
          $DesCtaCre = $x[$j]->getNombeneficiario();
          $NumOrden = $x[$j]->getNumord();
          $TipCausad = $x[$j]->getTipcau();

          $t2= new Criteria();
           $t2->add(OpordpagPeer::NUMORD,$x[$j]->getNumord());
           $regt2= OpordpagPeer::doSelectOne($t2);
           if ($regt2)
           {
             $monpagado=$regt2->getMonpag();
             $monvalord=$regt2->getValmon();
             $montotord=$regt2->getMonord();
             $monretenido=$regt2->getMonret();
             $monamortizado=$regt2->getMondes();
             $codtde=$regt2->getCodtde();
           }else {
             $monpagado=0;
             $monvalord=0;
             $montotord=0;
             $monretenido=0;
             $monamortizado=0;
             $codtde='';
           }

          //$monpagado=H::getX('Numord','Opordpag','Monpag',$x[$j]->getNumord());
          //$monvalord=H::getX('Numord','Opordpag','Valmon',$x[$j]->getNumord());
          //El status ahora solo se pondr� en "I" cuando el monto total de los cheques
          //sea igual al monto de la orden menos el monto de las retenciones
          $CtaPag = $x[$j]->getCtapag();
          
          //$montotord=H::getX_vacio('Numord','Opordpag','Monord',$x[$j]->getNumord());

          $Monto =  $Monto + $x[$j]->getMontotalGrid();

          //$monretenido=H::getX_vacio('Numord','Opordpag','Monret',$x[$j]->getNumord());
          if (H::toFloat($monretenido) > 0)
          {
            $MontRet = $MontRet + H::toFloat($monretenido); //$x[$j]->getMonret();
            //Acumula_Ret GridBd1.TextMatrix(I, 1)
            // GridBd1.TextMatrix(I, 9) = Format(OPORDPAG!MonRet, "##.00")
          }//if ($x[$j]->getMonret() > 0)

          //$monamortizado=H::getX_vacio('Numord','Opordpag','Mondes',$x[$j]->getNumord());           
          if (H::toFloat($monamortizado) > 0 )
          {
           $tietipodes=H::getConfApp2('tietipodes', 'tesoreria', 'pagemiord');
            if ($tietipodes=='S')
            {
               //$codtde=H::getX_vacio('Numord','Opordpag','Codtde',$x[$j]->getNumord());
               $CtaDcto = H::getX_vacio('Codtde','Optipdes','Codcta',$codtde);
            }else  $CtaDcto = self::Busca_CtaDes();
            $MontDcto = $MontDcto + H::toFloat($monamortizado); //$x[$j]->getMondes();
          }

         if ($gencom!="S")
         {
            //Vamos a actualizar una tabla nueva llamada OPOrdChe que tiene tantos cheque se hayan hecho
            //a una orden de pago. Tambien actualizaremos el STATUS solo si se paga la orden completamente
            $sql = "Select * from OPOrdChe where NumOrd='". $x[$j]->getNumord()."' and NumChe='". $numche ."' and CodCta='". $tscheemi->getNumcue() ."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $arraynumcue="Esta Orden de Pago ya fue pagada con un cheque de igual número y la misma cuenta";
              return true;
            }
            else
            {
              $opordche = new Opordche();
              $opordche->setNumord($x[$j]->getNumord());
              $opordche->setNumche($numche);
              $opordche->setCodcta($tscheemi->getNumcue());
              $opordche->setTipmov($tscheemi->getTipdoc());


              $monpagopordche=$x[$j]->getMontotalGrid(); //+ H::toFloat($monamortizado); //$x[$j]->getMondes();
              $opordche->setMonpag($monpagopordche*$monvalord);
              if ($gencomaut=='S' && $comprobaut=='S'){
                $cheret='N';
                $q= new Criteria();
                $q->add(OpordchePeer::NUMORD,$x[$j]->getNumord());
                $resulq= OpordchePeer::doSelect($q);
                if ($resulq){
                  foreach ($resulq as $objq) {
                    if ($objq->getCompret()=='S'){
                      $cheret='S';
                      break;
                    }
                  }
                }
              }
              if ($tscheemi->getCompret()=='N' || $cheret=='N')
                $opordche->setCompret('S');
              $opordche->save();

              //Ahora Actualizamos el Estatus de la Orden de Pago y el Monto Pagado de la Orden
                  //$monto1=$x[$j]->getMonord() - $x[$j]->getMonret() - (self::ObtenerAjuste($x[$j]->getNumord()/$monvalord));
                  //$monto2=$x[$j]->getMonpag() + $x[$j]->getMontotalGrid() + $x[$j]->getMondes();
                  
                  $monto1=H::toFloat($montotord) - H::toFloat($monretenido) - (self::ObtenerAjuste($x[$j]->getNumord())/$monvalord);
                  $monto2=H::toFloat($monpagado) + $x[$j]->getMontotalGrid() + H::toFloat($monamortizado); //$x[$j]->getMondes();                  

                  if (H::tofloat($monto1) <= H::tofloat($monto2))
                  {
                    $x[$j]->setStatus("I");
                    $x[$j]->setFecpag($tscheemi->getFecemi());
                  }
                  $montoordpag= H::toFloat($monpagado) + $x[$j]->getMontotalGrid();
                  $x[$j]->setMonpag($montoordpag*$monvalord);               
            }  /*else if (Herramientas::BuscarDatos($sql,&$result))*/
            if ($estran=='S'){
              $y1= new Criteria();
              $y1->add(OpfacturPeer::NUMORD,$x[$j]->getNumord());
              $regy1= OpfacturPeer::doSelect($y1);
              if ($regy1){
                foreach ($regy1 as $objy) {
                  if (strlen($numfacs)==0)
                    $numfacs=$objy->getNumfac();
                  else
                    $numfacs.='-'.$objy->getNumfac();
                }          
              }
            }

         }//if ($gencom!="S")
          ///////////////////////////////////////////////////////////////////////////////////////////
          $numord=$x[$j]->getNumord();
          $cedrif=$x[$j]->getCedrif();
           if ($gencom!='S')
           { if ($grabar=="S")
              {
                  $x[$j]->setMondes(H::toFloat($monamortizado)*$monvalord);
                  $x[$j]->save();               
               }               
           }
          }//if ($x[$j]->getCheck()=="1")
          $j++;
      }  //End del ciclo que recorre el grid while ($j<count($x))

       if ($gencom=="S")
       {
               $c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
                               self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,$msjuno,$arrcompro,$DesCtaCre,$MontRet,$monpagado,"ordpag","",$CtaDcto,$DescOp);
			     }
			     else
			     {
                  self::Genera_Comprobante($numche,$tscheemi,$grid,"",$tippag,$DescOp,$DesCtaDeb,
                                    $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$DescOp,$Monto,$MontRet,"ordpag",
                                    $arrcompro,$monpagado,$cheret);
			     }
			   }
           $concom++;
       }
       else //if ($gencom=="S")
       {
          if ($grabar=="S")
          {
          	if ($comprobaut!='S' && $gencomaut!='S'){
            $minumcom=explode("_",$numcomarr);
            $numcom=$minumcom[1];
          	}else{
               $c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
                               self::grabarComprobanteAlcAutomatico($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,$DesCtaCre,$numcom,$MontRet,"ordpag",0,$CtaDcto,$DescOp,"",$DesCtaDeb);
			     }
			     else
			     {
                    self::Genera_Comprobante_Automatico($numche,$tscheemi,$grid,"",$tippag,$DescOp,$DesCtaDeb,
                                    $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$DescOp,$Monto,$MontRet,"ordpag",
                                    $numcom,0);
			     }
			   }
          	}

            $refpago = self::Genera_Pagos_Compuesto($tscheemi,$numord,$cedrif,$TipCausad,$DescOp,$numche,$x);
            self::Genera_MovLib($tscheemi,$DescOp,$Monto,$numcom,$numche,$refpago,$cedrif);
            self::Actualiza_Bancos($tscheemi,"A","C",$Monto,$numche);
            self::Grabar_Datos($tscheemi,$Monto,$cedrif,$numche,$reqfirma,$mancomegr);            
            if ($estran=='S')
              self::generarTxtProveedorCompuesto($cedrif,$DescOp,$Monto,$numche,$numfacs);
            $arraynumche=$numche;
            $arraynumcue=$numcue;
          }
       }// else if ($gencom=="S")

    }//if ($tippag=='C') Then //Pago Simple

     return true;
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
  }//end function ActualizaOrdpag

  public static function ActualizaCompro($tscheemi,$grid,$numcom,$ctapag,$desctacre,&$arraynumche,$gencom,&$arrcompro,$reqfirma,$mancomegr,$comprobaut,&$arraynumcue)
  {
      $x=$grid[0];
      $arraynumche="";
      $arraynumcue="";
      $gencomaut=H::getConfApp2('gencomaut', 'tesoreria', 'tesmovemiche');
      $j=0;
      $numche=$tscheemi->getNumche();
      $numcue=$tscheemi->getNumcue();
      $MontOP = 0;
      $DescOp="";
      $TipCompro="";
      $grabar="N";
      $DescOp="";
      $DesCtaDeb="";
      while ($j<count($x))
      {
        if ($x[$j]->getCheck()=="1")
        {
          $grabar="S";
          $c = new Criteria();
          $c->add(CpcomproPeer::REFCOM,$x[$j]->getRefcom());
          $compro = CpcomproPeer::doSelectOne($c);
          if ($compro)
          {
            $NumCompro=$compro->getRefcom();
            $DescOp=$compro->getDescom();
            $DesCtaDeb = $DescOp;
            $TipCompro = $compro->getTipcom();
            $MontOP = $MontOP + $x[$j]->getMonporpagGrid();
          }
        }//if ($x[$j]->getCheck()=="1")
        $j++;
      }  //End del ciclo que recorre el grid while ($j<count($x))

     if ($grabar=="S")
     {
       if ($gencom=="S")
       {
           $c= new Criteria();
		   $reg= OpdefempPeer::doSelectOne($c);
		   if ($reg)
		   {
		     if ($reg->getGencomalc()=='S')
		     {
                       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,"S",0,$MontOP,$ctapag,$msjuno,$arrcompro,$desctacre,0,0,"compro","","","");
		     }
		     else
		     {
                self::Genera_Comprobante($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                    $desctacre,$ctapag,"",0,"",$MontOP,0,"compro",$arrcompro,0);
		     }
		    }
       }
       else //if ($gencom=="S")
       {
       	 if ($comprobaut=='S' || $gencomaut=='S')
       	 {
       	 	$c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
                               self::grabarComprobanteAlcAutomatico($tscheemi,$grid,$DescOp,"S",0,$MontOP,$ctapag,$desctacre,$numcom,0,"compro",0,"","","","");
			     }
			     else
			     {
                    self::Genera_Comprobante_Automatico($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                    $desctacre,$ctapag,"",0,"",$MontOP,0,"compro",$numcom,0);
			     }
			   }
       	 }

         self::Actualiza_Bancos($tscheemi,"A","C",$MontOP,$numche);
         $refpago = self::Genera_Pagos($tscheemi,$NumCompro,$tscheemi->getCedrif(),$TipCompro,$DescOp,$MontOP,"C",100,$numche,$x);
         self::Genera_MovLib($tscheemi,$DescOp,$MontOP,$numcom,$numche, $refpago,$tscheemi->getCedrif());
         self::Grabar_Datos($tscheemi,$MontOP,$tscheemi->getCedrif(),$numche,$reqfirma,$mancomegr);
         $arraynumche=$numche;
         $arraynumcue=$numcue;
       }
     }
  }//end del function


  public static function ActualizaPrecom($tscheemi,$grid,$numcom,$ctapag,$desctacre,&$arraynumche,$gencom,&$arrcompro,$reqfirma,$mancomegr,$comprobaut,&$arraynumcue)
  {
      $x=$grid[0];
      $arraynumche="";
      $arraynumcue="";
      $gencomaut=H::getConfApp2('gencomaut', 'tesoreria', 'tesmovemiche');
      $j=0;
      $numche=$tscheemi->getNumche();
      $numcue=$tscheemi->getNumcue();
      $MontOP = 0;
      $DescOp="";
      $TipCompro="";
      $grabar="N";
      $DescOp="";
      $DesCtaDeb="";

      while ($j<count($x))
      {
        if ($x[$j]->getCheck()=="1")
        {
          $grabar="S";
          $c = new Criteria();
          $c->add(CpprecomPeer::REFPRC,$x[$j]->getRefprc());
          $precom = CpprecomPeer::doSelectOne($c);
          if ($precom)
          {
            $NumPreCom=$precom->getRefprc();
            $DescOp=$precom->getDesprc();
            $DesCtaDeb = $DescOp;
            $TipPreCom = $precom->getTipprc();
            $MontOP = $MontOP + $x[$j]->getMonporpagGrid();
          }//if ($precom)
        }//if ($x[$j]->getCheck()=="1")
        $j++;
      }

      if ($grabar=="S")
      {
        if ($gencom=="S")
        {
           $c= new Criteria();
		   $reg= OpdefempPeer::doSelectOne($c);
		   if ($reg)
		   {
		     if ($reg->getGencomalc()=='S')
		     {
                       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,"S",0,$MontOP,$ctapag,$msjuno,$arrcompro,$desctacre,0,0,"precom","","","");
		     }
		     else
		     {
               self::Genera_Comprobante($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                             $desctacre,$ctapag,"",0,"",$MontOP,0,"precom",$arrcompro,0);
		     }
		   }
        }
        else
        {
       	 if ($comprobaut=='S' || $gencomaut=='S')
       	 {
       	 	$c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
                               self::grabarComprobanteAlcAutomatico($tscheemi,$grid,$DescOp,"S",0,$MontOP,$ctapag,$desctacre,$numcom,0,"precom",0,"","","","");
			     }
			     else
			     {
                    self::Genera_Comprobante_Automatico($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                             $desctacre,$ctapag,"",0,"",$MontOP,0,"precom",$numcom,0);
			     }
			   }
       	 }

            self::Genera_MovLib($tscheemi,$DescOp,$MontOP,$numcom,$numche,'', $tscheemi->getCedrif());
            self::Actualiza_Bancos($tscheemi,"A","C",$MontOP,$numche);
            $refpago = self::Genera_Pagos($tscheemi,$NumPreCom,$tscheemi->getCedrif(),$TipPreCom,$DescOp,$MontOP,"P",100,$numche,$x);
            self::Genera_MovLib($tscheemi,$DescOp,$MontOP,$numcom,$numche,$refpago,$tscheemi->getCedrif());
            self::Grabar_Datos($tscheemi,$MontOP,$tscheemi->getCedrif(),$numche,$reqfirma,$mancomegr);
            $arraynumche=$numche;
            $arraynumcue=$numcue;
        }
      }

  }//end Busca_Actualiza_PreCompromiso


  public static function ActualizaPagDir($tscheemi,$grid,$numcom,$concep,$descue,$condto,$ctapag,$desctacre,&$arraynumche,$gencom,&$arrcompro,$reqfirma,$mancomegr,$comprobaut,&$arraynumcue)
  {
      $x=$grid[0];
      $arraynumche="";
      $arraynumcue="";
      $gencomaut=H::getConfApp2('gencomaut', 'tesoreria', 'tesmovemiche');
      $j=0;
      $numche=$tscheemi->getNumche();
      $numcue=$tscheemi->getNumcue();
      $MontOP=0;
      $CuentaDes="";
      $MontDcto=0;
      $CtaPag="";
      while ($j<count($x))
      {
        $MontOP = $MontOP + $x[$j]->getMonimp();
        $CtaPag=Herramientas::getX('CODPRE','Cpdeftit','Codcta',$x[$j]->getCodpre());
        //$CtaPag=$x[$j]->getCodpre();
        $j++;
      }//while
     $DescOp = $concep;
     $DesCtaDeb = $DescOp;
     $NumOrden = "";
     $TipCausad = "";
     if ($descue > 0)
     {
       $CuentaDes=self::Busca_CtaDes();
       $MontDcto = $descue;
     }//if ($descue > 0)


     //Comprob = NroCheque
     //Genera_Comprobante Comprob, MontOP - MontDcto, False
     //Comprob = COMPGENE
     if (count($x)>0)
     {
       if ($gencom=="S")
        {

           $total=$MontOP-Herramientas::tofloat($MontDcto);
           $c= new Criteria();
		   $reg= OpdefempPeer::doSelectOne($c);
		   if ($reg)
		   {
		     if ($reg->getGencomalc()=='S')
		     {
                       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,"S",Herramientas::tofloat($MontDcto),$total,$ctapag,$msjuno,$arrcompro,$desctacre,0,0,"pagdir","","","");
		     }
		     else
		     {
           self::Genera_Comprobante($numche,$tscheemi,$grid,"","D",$DescOp,$DesCtaDeb,
                                    $desctacre,$CtaPag,$CuentaDes,Herramientas::tofloat($MontDcto),$condto,
                                    $total,0,"pagdir",$arrcompro,0);
		     }
		   }
        }
        else
        {
        $total=$MontOP-Herramientas::tofloat($MontDcto);
       	 if ($comprobaut=='S' || $gencomaut=='S')
       	 {
       	 	   $c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
                               self::grabarComprobanteAlcAutomatico($tscheemi,$grid,$DescOp,"S",Herramientas::tofloat($MontDcto),$total,$ctapag,$desctacre,$numcom,0,"pagdir",0,"","","","");
			     }
			     else
			     {
                    self::Genera_Comprobante_Automatico($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                    $desctacre,$CtaPag,$CuentaDes,Herramientas::tofloat($MontDcto),$condto,
                                    $total,0,"pagdir",$numcom,0);
			     }
			   }
       	 }

           self::Actualiza_Bancos($tscheemi,"A","C",$total,$numche);
           $refpago = self::Genera_Pagos($tscheemi,"",$tscheemi->getCedrif(),"",$DescOp,$MontOP,"D",100,$numche,$x);
           self::Genera_MovLib($tscheemi,$DescOp,$total,$numcom,$numche,$refpago,$tscheemi->getCedrif());
           self::Grabar_Datos($tscheemi,$total,$tscheemi->getCedrif(),$numche,$reqfirma,$mancomegr);
           $arraynumche=$numche;
           $arraynumcue=$numcue;
        }
     }
  }


  public static function ActualizaPagExtPre($tscheemi,$numcom,$concpnrn,$montpnrn,$dctopnrn,$condpnrn,$ctapag,$desctacre,&$arraynumche,$gencom,&$arrcompro,$reqfirma,$mancomegr,$comprobaut,&$arraynumcue)
  {
     $arraynumche="";
     $arraynumcue="";
     $gencomaut=H::getConfApp2('gencomaut', 'tesoreria', 'tesmovemiche');
     $CtaDcto="";
     $DescOp = $concpnrn;
     $DesCtaDeb = $DescOp;
     $MontOP = $montpnrn;
     $MontDcto=0;
     $grid=array();
     $NumOrden = "";
     $TipCausad = "";
     $numche=str_pad($tscheemi->getNumche(),8,"0",STR_PAD_LEFT);
     $numcue=$tscheemi->getNumcue();
     if ($dctopnrn > 0)
     {
       $CtaDcto=self::Busca_CtaDes();
       $MontDcto = $dctopnrn;
     }//if ($dctopnrn > 0)

     // Comprob = NroCheque
     // Genera_Comprobante Comprob, MontOP - MontDcto, False
     // Comprob = COMPGENE

      if ($gencom=="S")
        {
           $total=Herramientas::tofloat($MontOP)-Herramientas::tofloat($MontDcto);
          $c= new Criteria();
		   $reg= OpdefempPeer::doSelectOne($c);
		   if ($reg)
		   {
		     if ($reg->getGencomalc()=='S')
		     {
                       self::grabarComprobanteAlc($tscheemi,$grid,$DescOp,"S",Herramientas::tofloat($MontDcto),$total,$ctapag,$msjuno,$arrcompro,$desctacre,0,0,"pagnopre","","","");
		     }
		     else
		     {
               self::Genera_Comprobante($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                    $desctacre,$ctapag,$CtaDcto,Herramientas::tofloat($MontDcto),$condpnrn,
                                    $total,0,"pagnopre",$arrcompro,0);
		     }
		   }
        }
        else
        {
           $total=Herramientas::tofloat($MontOP)-Herramientas::tofloat($MontDcto);
       	 if ($comprobaut=='S' || $gencomaut=='S')
       	 {
       	 	   $c= new Criteria();
			   $reg= OpdefempPeer::doSelectOne($c);
			   if ($reg)
			   {
			     if ($reg->getGencomalc()=='S')
			     {
                               self::grabarComprobanteAlcAutomatico($tscheemi,$grid,$DescOp,"S",Herramientas::tofloat($MontDcto),$total,$ctapag,$desctacre,$numcom,0,"pagnopre",0,"","","","");
			     }
			     else
			     {
                    self::Genera_Comprobante_Automatico($numche,$tscheemi,$grid,"","S",$DescOp,$DesCtaDeb,
                                    $desctacre,$ctapag,$CtaDcto,Herramientas::tofloat($MontDcto),$condpnrn,
                                    $total,0,"pagnopre",$numcom,0);
			     }
			   }
       	 }

           self::Genera_MovLib($tscheemi,$DescOp,$total,$numcom,$numche,'', $tscheemi->getCedrif());
           self::Actualiza_Bancos($tscheemi,"A","C",$total,$numche);
           self::Grabar_Datos($tscheemi,$total,$tscheemi->getCedrif(),$numche,$reqfirma,$mancomegr);
           $arraynumche=$numche;
           $arraynumcue=$numcue;
        }
  }

  public static function  Verificar_Comprobante($Comprob)
  {
    $sql = "Select * From CONTABC Where NumCom = '". $Comprob ."' Order by NumCom";
    if (Herramientas::BuscarDatos($sql,$result))
          return true;
    else
        return false;
  }

  public static function  Genera_Comprobante($numcomcon,$tscheemi,$grid,$ordendepago,$tippag,$DescOp,$DesCtaDeb,
                                             $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$ConDto,$Monto,$MonRet,
                                             $operacion,&$arrcompro,$monpagado,&$cheret='N')
  {
   //$Comprob=$numcomcon;
    $forconuney="";
    $normal=true;
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
    if(array_key_exists('generales',$varemp)) {
       if(array_key_exists('forconuney',$varemp['generales']))
       {
        $forconuney=$varemp['generales']['forconuney'];
       }
   }   
    $fecc=$tscheemi->getFecemi();
   if ($forconuney=='S')
    {
        $formato = substr($fecc,5,2).'-4-'; //date('my',$fecha);
        $longitud='3';
        $tipo='4';
        $valido = false;
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
        $Comprob=$nroorden7;
    }
    else {     
        $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
            if (strlen($numcomcon)>8)
                $Comprob=substr($numcomcon,0,8);
            else
                $Comprob=$numcomcon;
        }else $Comprob = "########";
    }
    $aplrecop=H::getConfApp2('aplrecop', 'tesoreria', 'pagemiord');
    $mosivacom=H::getConfApp2('mosivacom', 'tesoreria', 'pagemiord');
    $mosretcomop=H::getConfApp2('mosretcomop', 'tesoreria', 'pagemiord');
    $monivaord=0;
    $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    $ordpagnom=H::getX_vacio('CODEMP', 'Opdefemp', 'Ordnom', '001');
    $ordpagamo=H::getX_vacio('CODEMP', 'Opdefemp', 'Ordamo', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda2);

   if (true)
   {
      $ctas="";$movs="";$montos="";$desc="";
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
      $SQL = "Select pagrepcaj,ctarepcaj,pagcheant,ctacheant from TSDefRenGas";
      if (Herramientas::BuscarDatos($SQL,$result))
      {
         if (($tscheemi->getTipdoc()==$result[0]['pagrepcaj'])  &&  ($result[0]['ctarepcaj'] != "" ))
            $CtaPag = $result[0]['ctarepcaj'];
         else if ($tscheemi->getTipdoc()== $result[0]['pagcheant'] && trim($result[0]['ctacheant']) != "" )
            $CtaPag = $result[0]['ctacheant'];

      }//if (Herramientas::BuscarDatos($SQL,&$result))

      //if ($operacion=='ordpag')
      $acummonret=0;

      if ($tippag=='S') //Pago Simple
      {
        //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(Monto + MontDcto)
        $ctas = $CtaPag;
        $desc=$DesCtaDeb;
        $movs="D";
        $tipcauord=H::getX_vacio('NUMORD','OPOrdPag','Tipcau',$ordendepago);
        $q= new Criteria();
          $q->add(OpordchePeer::NUMORD,$ordendepago);
          $resulq= OpordchePeer::doSelect($q);
          if ($resulq){            
            foreach ($resulq as $objq) {
              if ($objq->getCompret()=='S'){
                $cheret='S';
                break;
              }
            }
          }
        //if ($monpagado==0 || is_null($monpagado))
        if ($cheret=='N'){
          if ($mosretcomop=='S' && $tipcauord==$ordpagnom){
            $montos=$Monto+$MontDcto;
          }else        
            $montos=$Monto+$MontDcto+$MonRet;
        }else $montos=$Monto; //+$MonRet;
        if ($moneda2!=$moneda) $montos=$montos*$valor;
        $acummonret=$MonRet;

       if ($aplrecop=='S' && $operacion=='ordpag')
       {
         $x=$grid[0];
         $j=0;
         while ($j<count($x))
         {
          if ($x[$j]->getCheck()=="1")
          {          
             $w = new Criteria();
             $w->add(OpretordPeer::NUMORD,$x[$j]->getNumord());
             $resulret= OpretordPeer::doSelect($w);
             if ($resulret)
             {
               $monivaord=0;
               foreach ($resulret as $objret) {
                  $p= new Criteria();
                  $p->add(TsretivaPeer::CODRET,$objret->getCodtip());
                  $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$x[$j]->getNumord()));
                  $resuliva= TsretivaPeer::doSelectOne($p);
                  if ($resuliva) {
                    $monivaord=$objret->getMonret();
                  }
               }
               
             }
          }
          $j++;
        }
        $montos=H::toFloat($montos)-$monivaord;
       }
       /*if ($mosivacom=='S' && $operacion=='ordpag' && $monivaord==0)
       {
         $x=$grid[0];
         $j=0;
         while ($j<count($x))
         {
          if ($x[$j]->getCheck()=="1")
          {          
             $w = new Criteria();
             $w->add(OpretordPeer::NUMORD,$x[$j]->getNumord());
             $resulret= OpretordPeer::doSelect($w);
             if ($resulret)
             {
               $monivaord=0;
               foreach ($resulret as $objret) {
                  $p= new Criteria();
                  $p->add(TsretivaPeer::CODRET,$objret->getCodtip());                  
                  $resuliva= TsretivaPeer::doSelectOne($p);
                  if ($resuliva) {
                    $monivaord=$objret->getMonret();
                  }
               }
               
             }
          }
          $j++;
        }
        $montos=H::toFloat($montos)-$monivaord;
       }*/
      if ($tipcauord==$ordpagamo && $operacion=='ordpag'){
        $normal=false;
        $cedrifop=H::getX_vacio('NUMORD','OPOrdPag','Cedrif',$ordendepago);
        $CtaBenant=H::getX_vacio('CEDRIF', 'Opbenefi', 'Codcopant', $cedrifop);
        $DesCtaBenant=H::getX_vacio('CODCTA', 'Contabb', 'Codcta',$CtaBenant);
        //Comprobante.IncluirAsiento CtaBan, DesCtaCre, Comprob, "C", CDbl(Monto)
        if (trim($ctas)!="") $ctas=$ctas."_".$CtaBenant; else  $ctas = $CtaBenant;
        if (trim($desc)!="") $desc=$desc."_".$DesCtaBenant; else  $desc = $DesCtaBenant;
        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
        if ($moneda2!=$moneda) $Monto=$Monto*$valor;
        if (trim($montos)!="") $montos=$montos."_".$Monto; else $montos=$Monto;
      }

      }
      else if ($tippag=='C')//pagos compuestos
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
            $cheret='N';
            $q= new Criteria();
            $q->add(OpordchePeer::NUMORD,$x[$j]->getNumord());
            $resulq= OpordchePeer::doSelect($q);
            if ($resulq){
              foreach ($resulq as $objq) {
                if ($objq->getCompret()=='S'){
                  $cheret='S';
                  break;
                }
              }
            }

              $numordmadre=H::getX_vacio('Numret','Opretord','Numord',$x[$j]->getNumord());
              if ($numordmadre=='') {
               $sql = "Select ctapag, codrgo, tipcau From OPORDPAG Where NumOrd = '". $x[$j]->getNumord() ."' Order by NumOrd";
               if (Herramientas::BuscarDatos($sql,$result))
               {
                  $CtaPag = $result[0]['ctapag'];
                  $tipcauord = $result[0]['tipcau'];
               }
             //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(GridBd1.TextMatrix(I, 5))
             if (trim($ctas)!="") $ctas=$ctas."_".$CtaPag; else  $ctas = $CtaPag;
             if (trim($desc)!="") $desc=$desc."_".$DesCtaDeb; else  $desc = $DesCtaDeb;
             if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
             //if ($monpagado==0 || is_null($monpagado))
             if ($cheret=='N'){
                if ($mosretcomop=='S' && $tipcauord==$ordpagnom){
                  $montot=$x[$j]->getMontotalGrid()+$x[$j]->getMondes();
                }else   
                  $montot=$x[$j]->getMontotalGrid()+$x[$j]->getMondes() + $x[$j]->getMonret();
             }
             else $montot=$x[$j]->getMontotalGrid(); //+ $x[$j]->getMonret();

             $acummonret+=$x[$j]->getMonret();

             if ($aplrecop=='S' && $operacion=='ordpag')
             {
               $w = new Criteria();
               $w->add(OpretordPeer::NUMORD,$x[$j]->getNumord());
               $resulret= OpretordPeer::doSelect($w);
               if ($resulret)
               {
                 $monivaord=0;
                 foreach ($resulret as $objret) {
                    $p= new Criteria();
                    $p->add(TsretivaPeer::CODRET,$objret->getCodtip());
                    $p->add(TsretivaPeer::CODREC,$result[0]['codrgo']);
                    $resuliva= TsretivaPeer::doSelectOne($p);
                    if ($resuliva) {
                      $monivaord=$objret->getMonret();
                    }
                 }
                 $montot=H::toFloat($montot)-$monivaord;
               }
             }
            /* if ($mosivacom=='S' && $operacion=='ordpag' && $monivaord==0)
             {
               $w = new Criteria();
               $w->add(OpretordPeer::NUMORD,$x[$j]->getNumord());
               $resulret= OpretordPeer::doSelect($w);
               if ($resulret)
               {
                 $monivaord=0;
                 foreach ($resulret as $objret) {
                    $p= new Criteria();
                    $p->add(TsretivaPeer::CODRET,$objret->getCodtip());
                    $resuliva= TsretivaPeer::doSelectOne($p);
                    if ($resuliva) {
                      $monivaord=$objret->getMonret();
                    }
                 }
                 $montot=H::toFloat($montot)-$monivaord;
               }
             }*/
             
             if ($moneda2!=$moneda) $montot=$montot*$valor;             
             if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
          }
        }
          $j++;
        }//while
      }//else if ($tippag=='C')//pagos compuestos
      else if ($tippag=='D')//pagos Directo
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCodpre()!="")
          {
             $CtaPag=Herramientas::getX('CODPRE','Cpdeftit','Codcta',$x[$j]->getCodpre());
             if (trim($ctas)!="") $ctas=$ctas."_".$CtaPag; else  $ctas = $CtaPag;
             if (trim($desc)!="") $desc=$desc."_".$DesCtaDeb; else  $desc = $DesCtaDeb;
             if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
             $montot=$x[$j]->getMonimp(); //+ $x[$j]->getMonret();
             
             if ($moneda2!=$moneda) $montot=$montot*$valor;             
             if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
          }
          $j++;
        }//while
      }//else if ($tippag=='C')//pagos compuestos

       if ($operacion=='ordpag')
       {
          if ($MontDcto > 0 && ($monpagado==0 || is_null($monpagado))) //Para que incluya la cuenta del descuento solo en primer pago
          {
            // Comprobante.IncluirAsiento CtaDcto, DescOp, Comprob, "C", CDbl(MontDcto)
            if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
            if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
            
            if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;             
            if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
          }//if ($MontDcto > 0)
       }

        if ($operacion=='pagdir')
        {
          if ($MontDcto > 0)
          {
            // //Comprobante.IncluirAsiento CtaDcto, ConcDescto.Text, Comprob, "C", CDbl(MontDcto)
            if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
            if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
            
            if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;
            if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
          }//if ($MontDcto > 0)
        }//if ($operacion=='pagdir')

        if ($operacion=='pagnopre')
         {
           if ($MontDcto > 0)
           {
              //Comprobante.IncluirAsiento CtaDcto, ConDPnrn.Text, Comprob, "C", CDbl(MontDcto)
              if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
              if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
              if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
              
              if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;
              if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
           }//if ($MontDcto > 0)
         }


      //--------------------------Generando la Parte de Las Retenciones --------------------------------

      if ($operacion=='ordpag')
      {
      //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(MontRet)
       /*if (trim($ctas)!="") $ctas=$ctas."_".$CtaPag; else  $ctas = $CtaPag;
       if (trim($desc)!="") $desc=$desc."_".$DesCtaDeb; else  $desc = $DesCtaDeb;
       if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
       if (trim($montos)!="") $montos=$montos."_".$MonRet; else $montos=$MonRet;*/
       if ($tippag=='S') //Pago Simple
       {          
          $tipcauord=H::getX_vacio('NUMORD','OPOrdPag','Tipcau',$ordendepago);
          $llevaret=true;
          if ($mosretcomop=='S' && $tipcauord==$ordpagnom)
            $llevaret=false;
          $cheret='N';
          if ($llevaret) {
          $q= new Criteria();
          $q->add(OpordchePeer::NUMORD,$ordendepago);
          $resulq= OpordchePeer::doSelect($q);
          if ($resulq){
            foreach ($resulq as $objq) {
              if ($objq->getCompret()=='S'){
                $cheret='S';
                break;
              }
            }
          }

            $numordmadre=H::getX_vacio('Numret','Opretord','Numord',$ordendepago);
            if ($numordmadre!='') //OP de Retenciones
            {
             $ctas=""; $desc=""; $movs=""; $montos="";
             $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where numret='".$ordendepago."' group by CodTip,Numret";
            if (Herramientas::BuscarDatos($SQL,$result))
            {
              $k=0;
              while ($k<count($result))
              {
                  $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($result[$k]['codtip']) ."'";
                  if (Herramientas::BuscarDatos($strsql,$optipret))
                  {
                   if ($result[$k]['montoret']>0)
                   {
                   //if ($cheret=='N' && ($monpagado==0 || is_null($monpagado))) //Para que incluya la cuenta las retenciones solo en primer pago
                   if ($cheret=='N')
                   {
                    if ($aplrecop=='S' && $operacion=='ordpag')
                    {
                      $p= new Criteria();
                      $p->add(TsretivaPeer::CODRET,$result[$k]['codtip']);
                      $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$ordendepago));
                      $resuliva= TsretivaPeer::doSelectOne($p);
                      if (!$resuliva) 
                      {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }else {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                      if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                      if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                      if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                      $monret1a=$result[$k]['montoret'];
                      if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                      if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }/*else if ($mosivacom=='S' && $operacion=='ordpag'){
                      $p= new Criteria();
                      $p->add(TsretivaPeer::CODRET,$result[$k]['codtip']);
                      $resuliva= TsretivaPeer::doSelectOne($p);
                      if (!$resuliva) 
                      {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }else {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                      if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                      if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                      if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                      $monret1a=$result[$k]['montoret'];
                      if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                      if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }*/else {
                      //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                      if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                      if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                      if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                      $monret1a=$result[$k]['montoret'];
                      if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                      if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                    }     
                  }
                }
              }
              $k++;
             } //while ($k<count($result))
            }//buscar datos
            }else { 
            $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where NumOrd= '".$ordendepago."' group by CodTip,Numret";
            if (Herramientas::BuscarDatos($SQL,$result))
            {
              $k=0;
              while ($k<count($result))
              {
                  $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($result[$k]['codtip']) ."'";
                  if (Herramientas::BuscarDatos($strsql,$optipret))
                  {
                   if ($result[$k]['montoret']>0)
                   {
                   //if ($cheret=='N' && ($monpagado==0 || is_null($monpagado)))//Para que incluya la cuenta las retenciones solo en primer pago
                   if ($cheret=='N')
                   {
                    if ($aplrecop=='S' && $operacion=='ordpag')
                    {
                      $p= new Criteria();
                      $p->add(TsretivaPeer::CODRET,$result[$k]['codtip']);
                      $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$ordendepago));
                      $resuliva= TsretivaPeer::doSelectOne($p);
                      if (!$resuliva) 
                      {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }else {
                         //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }/*else if ($mosivacom=='S' && $operacion=='ordpag') {
                       $p= new Criteria();
                      $p->add(TsretivaPeer::CODRET,$result[$k]['codtip']);
                      $resuliva= TsretivaPeer::doSelectOne($p);
                      if (!$resuliva) 
                      {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }else {
                         //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }*/else {
                      //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                      if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                      if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                      if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                      $monret1a=$result[$k]['montoret'];
                      if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                      if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                    }
     
                  }
                   }
                  }
                $k++;
              } //while ($k<count($result))
            }//buscar datos
          }
        }
       }
       else if ($tippag=='C')//pagos compuestos
       {
        $x=$grid[0];
        $contret=0;
        $j=0;        
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
            $cheret='N';
            $tipcauord=H::getX_vacio('NUMORD','OPOrdPag','Tipcau',$x[$j]->getNumord());
            $llevaret=true;
            if ($mosretcomop=='S' && $tipcauord==$ordpagnom)
              $llevaret=false;
            if ($llevaret) {
            $q= new Criteria();
            $q->add(OpordchePeer::NUMORD,$x[$j]->getNumord());
            $resulq= OpordchePeer::doSelect($q);
            if ($resulq){
              foreach ($resulq as $objq) {
                if ($objq->getCompret()=='S'){
                  $cheret='S';
                  break;
                }
              }
            }

            $numordmadre=H::getX_vacio('Numret','Opretord','Numord',$x[$j]->getNumord());
            if ($numordmadre!='')
            {  
              //if ($contret==0) { $ctas=""; $desc=""; $movs=""; $montos="";}              
              //$contret++;                           
               $strsql = "Select codtip,SUM(MonRet) as montoret,numret from OPRetOrd where numret= '".$x[$j]->getNumord()."' group by codtip,Numret";
               if (Herramientas::BuscarDatos($strsql,$resultado))
               {
                $k=0;
                while ($k<count($resultado))
                { 
                    
                    $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($resultado[$k]['codtip']) ."'";
                    if (Herramientas::BuscarDatos($strsql,$optipret))
                    {
                      if ($resultado[$k]['montoret']>0)
                      {
                       //if ($cheret=='N' && ($monpagado==0 || is_null($monpagado)))
                       if ($cheret=='N') {//Para que incluya la cuenta las retenciones solo en primer pago           
                         if ($aplrecop=='S' && $operacion=='ordpag')
                         {
                            $p= new Criteria();
                            $p->add(TsretivaPeer::CODRET,$resultado[$k]['codtip']);
                            $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$x[$j]->getNumord()));
                            $resuliva= TsretivaPeer::doSelectOne($p);
                            if (!$resuliva) 
                            {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                              if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                              if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                              if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                              $monret1a=$resultado[$k]['montoret'];
                            }else {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                            $monret1a=$resultado[$k]['montoret'];
                            }
                          }/*else if ($mosivacom=='S' && $operacion=='ordpag'){
                            $p= new Criteria();
                            $p->add(TsretivaPeer::CODRET,$resultado[$k]['codtip']);
                            $resuliva= TsretivaPeer::doSelectOne($p);
                            if (!$resuliva) 
                            {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                              if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                              if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                              if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                              $monret1a=$resultado[$k]['montoret'];
                            }else {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                            $monret1a=$resultado[$k]['montoret'];
                            }
                          }*/else {
                            //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                            $monret1a=$resultado[$k]['montoret'];
                          }
                          if ($moneda2!=$moneda) $monret1a=$monret1a; //*$valor;
                          if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }
                   }
                  $k++;
                } //while ($k<count($result))
              }//buscar datos
            }else {
               $strsql = "Select codtip,SUM(MonRet) as montoret,numret from OPRetOrd where NumOrd= '".$x[$j]->getNumord()."' group by codtip,Numret";
               if (Herramientas::BuscarDatos($strsql,$resultado))
               {
                $k=0;
                while ($k<count($resultado))
                {
                    $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($resultado[$k]['codtip']) ."'";
                    if (Herramientas::BuscarDatos($strsql,$optipret))
                    {
                      if ($resultado[$k]['montoret']>0)
                      {
                       //if ($cheret=='N' && ($monpagado==0 || is_null($monpagado))) 
                       if ($cheret=='N') {//Para que incluya la cuenta las retenciones solo en primer pago           
                         if ($aplrecop=='S' && $operacion=='ordpag')
                         {
                            $p= new Criteria();
                            $p->add(TsretivaPeer::CODRET,$resultado[$k]['codtip']);
                            $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$x[$j]->getNumord()));
                            $resuliva= TsretivaPeer::doSelectOne($p);
                            if (!$resuliva) 
                            {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                              if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                              if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                              if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                              $monret1a=$resultado[$k]['montoret'];
                            }else {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                            $monret1a=$resultado[$k]['montoret'];
                            }
                          }/*else if ($mosivacom=='S' && $operacion=='ordpag'){
                            $p= new Criteria();
                            $p->add(TsretivaPeer::CODRET,$resultado[$k]['codtip']);
                            $resuliva= TsretivaPeer::doSelectOne($p);
                            if (!$resuliva) 
                            {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                              if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                              if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                              if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                              $monret1a=$resultado[$k]['montoret'];
                            }else {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                            $monret1a=$resultado[$k]['montoret'];
                            }
                          }*/else {
                            //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                            $monret1a=$resultado[$k]['montoret'];
                          }
                          if ($moneda2!=$moneda) $monret1a=$monret1a; //*$valor;
                          if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }
                   }
                  $k++;
                } //while ($k<count($result))
              }//buscar datos
            }
          }
          }//if ($x[$j]->getCheck()=="1")
          $j++;
        }//while
       }//else if ($tippag=='C')//pagos compuestos
       // Comprobante.CargarComprobante
      }//if ($operacion=='ordpag')

      if ($normal) {

      //Comprobante.IncluirAsiento CtaBan, DesCtaCre, Comprob, "C", CDbl(Monto)
      if (trim($ctas)!="") $ctas=$ctas."_".$CtaBan; else  $ctas = $CtaBan;
      if (trim($desc)!="") $desc=$desc."_".$DesCtaCre; else  $desc = $DesCtaCre;
      if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
      
      if ($moneda2!=$moneda) $Monto=$Monto*$valor;
      if ($mosretcomop=='S' && $tipcauord==$ordpagnom)
        $Monto=$Monto+$acummonret;
      if (trim($montos)!="") $montos=$montos."_".$Monto; else $montos=$Monto;
     }


      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      //Cabecera del Comprobante
      $clscommpro->setNumcom($Comprob);
      $clscommpro->setReftra($numcomcon);
      $clscommpro->setFectra(date("d/m/Y",strtotime($tscheemi->getFecemi())));
      $mancomegr=H::getConfApp2('mancomegr', 'tesoreria', 'tesmovemiche');
      $comegrseq=H::getConfApp2('comegrseq', 'tesoreria', 'tesmovemiche');
      if ($mancomegr=='S' && $comegrseq!='S')
        $numcomegr=self::BuscarCorrelEgrMes($tscheemi,$correl,$campo);
      else $numcomegr="";
      if ($numcomegr!='')
        $clscommpro->setDestra($DescOp." - ".$DesCtaCre." - ".$numcomegr);
      else
        $clscommpro->setDestra($DescOp." - ".$DesCtaCre);
      //Detalle (Asientos Contables)
      $clscommpro->setCtas($ctas);
      $clscommpro->setDesc($desc);
      $clscommpro->setMov($movs);
      $clscommpro->setMontos($montos);
      $clscommpro->setError("N");
      $arrcompro[]=$clscommpro;
     }
     ///////////////////////////////////////////////////////////////////////////////
     else
     {
        $mensaje="No se pudo generar el comprobante contable. El Número del Comprobante: ". $Comprob . " ya existe";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;
     }
  }//end function Genera_Comprobante


  public static function validarDisponibilidadPresu($grid,&$msj,$mone,$valm,$fecdoc)
  {
    $validardisponibilidad=true;
    $msj=-1;
    $datosGrid = array();
    $moneda=$mone;
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
       $valor=H::toFloat($valm,6);
    else
      $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    $filcatpre=H::getConfApp2('filcatpre', 'tesoreria', 'pagemiord');      
    $lonmas=strlen(H::getObtener_FormatoCategoria())+1;   
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');

    $x=$grid[0];
    $i=0;
    while ($i<count($x))
    {
       $codigo=$x[$i]->getCodpre();
       $p= new Criteria();
       if ($filcatpre=='S'){
         $sql='cpdeftit.codpre=\''.$codigo.'\' and substr(cpdeftit.codpre,0,'.$lonmas.')  in (select codcat from "SIMA_USER".segcatusu where loguse=\''.$loguse.'\')';
         $p->add(CpdeftitPeer::CODPRE,$sql,Criteria::CUSTOM);
       }else $p->add(CpdeftitPeer::CODPRE,$codigo);
       $datap=CpdeftitPeer::doSelectOne($p);
       if (!$datap)
       {
          $validardisponibilidad=false;
          $msj=500;
          break;
       }

        $a= new Criteria();
        $a->add(CpasiiniPeer::PERPRE,'00');
        $a->add(CpasiiniPeer::CODPRE,$codigo);
        $data2= CpasiiniPeer::doSelectOne($a);
        if (!$data2)
        {
            $validardisponibilidad=false;
            $msj=1509;
            break;
        }

        $codpre=H::getCodPreDis($codigo);       
        $monto=$x[$i]->getMonimp()*$valor;
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
        $p=0;
        while ($p<count($datosGrid))
        {
          $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$fecdoc);
          if($datosGrid[$p]["monimp"] > $disponible){
            $validardisponibilidad=false;
            $msj=152;
            break;
          }
          $p++;
        }
    }    
    
    return $validardisponibilidad;
  }

  public static function grabarComprobanteAlc($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,&$msjuno,&$arrcompro,$desctacre,$MontRet,$monpagado,$operacion,$ordendepago,$CtaDcto,$ConDto)
  {
    $mensaje="";
    $numerocomprob= '########';
    $reftra = str_pad($tscheemi->getNumche(),8,"0",STR_PAD_LEFT);
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
    $mont=0;
    $codigocuenta3="";
    $tipo3="";
    $des3="";
    $monto3="";
    $codigocuenta4="";
    $tipo4="";
    $des4="";
    $monto4="";
    $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    $aplretcomalc=H::getConfApp2('aplretcomalc', 'tesoreria', 'tesmovemiche');

     if ($tippag=='S') //Pago Simple
     {
       if ($aplretcomalc=='S') {
         if ($monpagado==0 || is_null($monpagado))
           $mont=$Monto+$MontDcto+$MontRet;
         else
     	$mont=$Monto+$MontDcto;
     }
       else {
           $mont=$Monto+$MontDcto;
       }
     }
     else if ($tippag=='C')//pagos compuestos
     {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
            if ($aplretcomalc=='S') {
             if ($monpagado==0 || is_null($monpagado))
                 $mont= $mont + ($x[$j]->getMontotalGrid()+$x[$j]->getMondes()+$x[$j]->getMonret());
             else
             $mont= $mont + ($x[$j]->getMontotalGrid()+$x[$j]->getMondes());
            }else {
                $mont= $mont + ($x[$j]->getMontotalGrid()+$x[$j]->getMondes());
          }
          }
          $j++;
        }
     }
     
     $ctaretben=H::getConfApp2('ctaretben', 'tesoreria', 'tesmovemiche');
     $trajo=H::getX_vacio('NUMRET','Opretord','numret',$ordendepago);

   if ($ctaretben=='S' && $operacion=='ordpag' && $trajo!='')
   {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$CtaPag);
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta=$dato->getCodcta();
        $tipo='D';
        $des="";
        $monto=$mont;
        if ($moneda2!=$moneda) $monto=$monto*$valor;
      }else {
      	 $mensaje="El Código Contable asociado al Beneficiario no es válido";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;

        return true;}
   }else {
    $c= new Criteria();
    $c->add(TsrelasiordPeer::CTAGASXPAG,$CtaPag);
    $reg= TsrelasiordPeer::doSelectOne($c);
    if ($reg)
    {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$reg->getCtaordxpag());
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta=$dato->getCodcta();
        $tipo='D';
        $des="";
        $monto=$mont;
        if ($moneda2!=$moneda) $monto=$monto*$valor;
      }else {
      	 $mensaje="El Código Contable asociado a Cuenta de Gastos por Pagar no es válido";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;

        return true;}
    }else {
    	$mensaje="El Código Contable asociado al Beneficiario ".$CtaPag." no posee Relacion para Asientos de Ordenes";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;

        return true;}
   }

   $b= new Criteria();
   $b->add(TsdefbanPeer::NUMCUE,$tscheemi->getNumcue());
   $reg1= TsdefbanPeer::doSelectOne($b);
   if ($reg1)
   {
   	 $cuenta=$reg1->getCodcta();
   }else $cuenta='';

    $x= new Criteria();
    $x->add(ContabbPeer::CODCTA,$cuenta);
    $reg2= ContabbPeer::doSelectOne($x);
    if ($reg2)
    {
       $codigocuenta2=$cuenta;
	   $tipo2='C';
	   $des2="";
           if ($aplretcomalc=='S')
               $monto2=$Monto;
           else
	   $monto2=$mont;
       if ($moneda2!=$moneda) $monto2=$monto2*$valor;
    }else {
    	$mensaje="El Código Contable asociado a la Cuenta Bancaria no es válido";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;

    	return true;

        }

    if ($aplretcomalc=='S')
    {
        if ($operacion=='ordpag')
       {

          if ($MontDcto > 0 && ($monpagado==0 || is_null($monpagado))) //Para que incluya la cuenta del descuento solo en primer pago
          {
            if (trim($codigocuenta3)!="") $codigocuenta3=$codigocuenta3."_".$CtaDcto; else  $codigocuenta3 = $CtaDcto;
            if (trim($des3)!="") $des3=$des3."_".$ConDto; else  $des3 = $ConDto;
            if (trim($tipo3)!="") $tipo3=$tipo3."_"."C"; else  $tipo3 = "C";
            
            if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;
            if (trim($monto3)!="") $monto3=$monto3."_".$MontDcto; else $monto3=$MontDcto;
          }
       }

       if ($operacion=='ordpag')
      {
        if ($tippag=='S') //Pago Simple
       {
            $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where NumOrd= '".$ordendepago."' group by CodTip,Numret";
            if (Herramientas::BuscarDatos($SQL,$result))
            {
              $k=0;
              while ($k<count($result))
              {
                  $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($result[$k]['codtip']) ."'";
                  if (Herramientas::BuscarDatos($strsql,$optipret))
                  {
                   if ($result[$k]['montoret']>0)
                   {
                   if ($monpagado==0 || is_null($monpagado)) //Para que incluya la cuenta las retenciones solo en primer pago
                   {
                    if (trim($codigocuenta4)!="") $codigocuenta4=$codigocuenta4."_".$optipret[0]['codcon']; else  $codigocuenta4 = $optipret[0]['codcon'];
                    if (trim($des4)!="") $des4=$des4."_".$optipret[0]['destip']; else  $des4 = $optipret[0]['destip'];
                    if (trim($tipo4)!="") $tipo4=$tipo4."_"."C"; else  $tipo4 = "C";
                    $montret2=$result[$k]['montoret'];
                    if ($moneda2!=$moneda) $montret2=$montret2*$valor;
                    if (trim($monto4)!="") $monto4=$monto4."_".$montret2; else $monto4=$montret2;
                  }
                   }
                  }
                $k++;
              }
            }
       }
       else if ($tippag=='C')//pagos compuestos
       {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
               $strsql = "Select codtip,SUM(MonRet) as montoret,numret from OPRetOrd where NumOrd= '".$x[$j]->getNumord()."' group by codtip,Numret";
               if (Herramientas::BuscarDatos($strsql,$resultado))
               {
                $k=0;
                while ($k<count($resultado))
                {
                    $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($resultado[$k]['codtip']) ."'";
                    if (Herramientas::BuscarDatos($strsql,$optipret))
                    {
                       if ($resultado[$k]['montoret']>0)
                      {
                     if ($monpagado==0 || is_null($monpagado)) { //Para que incluya la cuenta las retenciones solo en primer pago
                      if (trim($codigocuenta4)!="") $codigocuenta4=$codigocuenta4."_".$optipret[0]['codcon']; else  $codigocuenta4 = $optipret[0]['codcon'];
                      if (trim($des4)!="") $des4=$des4."_".$optipret[0]['destip']; else  $des4 = $optipret[0]['destip'];
                      if (trim($tipo4)!="") $tipo4=$tipo4."_"."C"; else  $tipo4 = "C";
                      
                      $montret2=$result[$k]['montoret'];
                      if ($moneda2!=$moneda) $montret2=$montret2*$valor;
                      if (trim($monto4)!="") $monto4=$monto4."_".$montret2; else $monto4=$montret2;
                    }
                    }
                    }
                  $k++;
                }
              }
          }
          $j++;
        }
       }
      }
    }

   if ($aplretcomalc=='S')
   {
       if ($operacion=='ordpag') {
        if ($codigocuenta3=="" && $codigocuenta4=="") {
    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;
        }else if ($codigocuenta3=="") {
        $cuentas=$codigocuenta.'_'.$codigocuenta2.'_'.$codigocuenta4;
        $tipos=$tipo.'_'.$tipo2.'_'.$tipo4;
        $descr=$des.'_'.$des2.'_'.$des4;
        $montos=$monto.'_'.$monto2.'_'.$monto4;
        } else {
        $cuentas=$codigocuenta.'_'.$codigocuenta2.'_'.$codigocuenta3;
        $tipos=$tipo.'_'.$tipo2.'_'.$tipo3;
        $descr=$des.'_'.$des2.'_'.$des3;
        $montos=$monto.'_'.$monto2.'_'.$monto3;
        }
       }else {
        $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;
       }
   }else {
        $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;
   }

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($tscheemi->getFecemi())));
    //$numcomegr=self::BuscarCorrelEgrMes($tscheemi,&$correl,&$campo);
    //$clscommpro->setDestra($DescOp." - ".$desctacre."N° Com. Egr. ".$numcomegr);
    $clscommpro->setDestra($DescOp." - ".$desctacre);
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $clscommpro->setError("N");
    $arrcompro[]=$clscommpro;

    return true;
  }

  public static function ActualizarEstatusCheques($grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getFirmado()=="1")
      {
        $reqfirpre=H::getConfApp2('reqfirpre', 'tesoreria', 'tesmovemiche');
        if ($reqfirpre=='S')
            $x[$j]->setStatus('P'); //Requiere Firma de Presidencia
        else
        $x[$j]->setStatus('C');
        $x[$j]->save();
      }
      $j++;
    }
  }

  public static function BuscarCorrelEgrMes($tscheemi,&$correl,&$campo)
  {
  	$mes=substr($tscheemi->getFecemi(),5,2);
  	$correl="";
  	$campo="";
  	$numoferpre="";
    $q= new Criteria();
    $reg=TscomegrmesPeer::doSelectOne($q);
    if ($reg)
    {   $ames=intval($mes);
    	eval('$correl=$reg->getCormes'.$ames.'();');
    	eval('$campo="cormes'.$ames.'";');

     $encontrado=false;
     while (!$encontrado)
     {
      $numero=str_pad($correl, 8, '0', STR_PAD_LEFT);
      $sql="select numcomegr from tscheemi where numcomegr='".$numero."' and to_char(fecemi,'MM')='".$mes."'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
        $correl=$correl+1;
      }
      else
      {
        $encontrado=true;
      }
    }
    $numoferpre=str_pad($correl, 8, '0', STR_PAD_LEFT);

    }

    return $numoferpre;

  }

  public static function  Genera_Comprobante_Automatico($numcomcon,$tscheemi,$grid,$ordendepago,$tippag,$DescOp,$DesCtaDeb,
                                             $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$ConDto,$Monto,$MonRet,
                                             $operacion,&$correl2,$monpagado,&$cheret='N')
  {
      $ctas="";$movs="";$montos="";$desc="";
      $aplrecop=H::getConfApp2('aplrecop', 'tesoreria', 'pagemiord');
      $mosivacom=H::getConfApp2('mosivacom', 'tesoreria', 'pagemiord');
      $mosretcomop=H::getConfApp2('mosretcomop', 'tesoreria', 'pagemiord');
      $monivaord=0;
      $moneda=$tscheemi->getCodmon();
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      $ordpagnom=H::getX_vacio('CODEMP', 'Opdefemp', 'ordnom', '001');
      if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
      else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
      $SQL = "Select pagrepcaj,ctarepcaj,pagcheant,ctacheant from TSDefRenGas";
      if (Herramientas::BuscarDatos($SQL,$result))
      {
         if (($tscheemi->getTipdoc()==$result[0]['pagrepcaj'])  &&  ($result[0]['ctarepcaj'] != "" ))
            $CtaPag = $result[0]['ctarepcaj'];
         else if ($tscheemi->getTipdoc()== $result[0]['pagcheant'] && trim($result[0]['ctacheant']) != "" )
            $CtaPag = $result[0]['ctacheant'];

      }//if (Herramientas::BuscarDatos($SQL,&$result))
      $acummonret=0;
      if ($tippag=='S') //Pago Simple
      {
        //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(Monto + MontDcto)
        if ($operacion=='ordpag')
          $ctas = H::getX_vacio('NUMORD','OPOrdPag','CtaPag',$ordendepago);
        else
          $ctas =$CtaPag;
        $desc=$DesCtaDeb;
        $movs="D";
        $tipcauord=H::getX_vacio('NUMORD','OPOrdPag','Tipcau',$ordendepago);
        $q= new Criteria();
        $q->add(OpordchePeer::NUMORD,$ordendepago);
        $resulq= OpordchePeer::doSelect($q);
        if ($resulq){
          foreach ($resulq as $objq) {
            if ($objq->getCompret()=='S'){
              $cheret='S';
              break;
            }
          }
        }
        if ($cheret=='N'){
          if ($mosretcomop=='S' && $tipcauord==$ordpagnom)
             $montos=$Monto+$MontDcto;
           else
            $montos=$Monto+$MontDcto+$MonRet;
        }else $montos=$Monto; //+$MonRet;
        if ($moneda2!=$moneda) $montos=$montos*$valor;     

        $acummonret= $MonRet;


       if ($aplrecop=='S' && $operacion=='ordpag')
       {
         $x=$grid[0];
         $j=0;
         while ($j<count($x))
         {
          if ($x[$j]->getCheck()=="1")
          {          
             $w = new Criteria();
             $w->add(OpretordPeer::NUMORD,$x[$j]->getNumord());
             $resulret= OpretordPeer::doSelect($w);
             if ($resulret)
             {
               $monivaord=0;
               foreach ($resulret as $objret) {
                  $p= new Criteria();
                  $p->add(TsretivaPeer::CODRET,$objret->getCodtip());
                  $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$x[$j]->getNumord()));
                  $resuliva= TsretivaPeer::doSelectOne($p);
                  if ($resuliva) {
                    $monivaord=$objret->getMonret();
                  }
               }
               
             }
          }
          $j++;
        }
        $montos=H::toFloat($montos)-$monivaord;
       }

      }
      else if ($tippag=='C')//pagos compuestos
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
            $cheret='N';
            $q= new Criteria();
            $q->add(OpordchePeer::NUMORD,$x[$j]->getNumord());
            $resulq= OpordchePeer::doSelect($q);
            if ($resulq){
              foreach ($resulq as $objq) {
                if ($objq->getCompret()=='S'){
                  $cheret='S';
                  break;
                }
              }
            }

              $numordmadre=H::getX_vacio('Numret','Opretord','Numord',$x[$j]->getNumord());
              if ($numordmadre=='') {
               $sql = "Select ctapag, codrgo, tipcau From OPORDPAG Where NumOrd = '". $x[$j]->getNumord() ."' Order by NumOrd";
               if (Herramientas::BuscarDatos($sql,$result))
               {
                  $CtaPag = $result[0]['ctapag'];
                  $tipcauord= $result[0]['tipcau'];
               }
             //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(GridBd1.TextMatrix(I, 5))
             if (trim($ctas)!="") $ctas=$ctas."_".$CtaPag; else  $ctas = $CtaPag;
             if (trim($desc)!="") $desc=$desc."_".$DesCtaDeb; else  $desc = $DesCtaDeb;
             if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
             if ($cheret=='N'){
               if ($mosretcomop=='S' && $tipcauord==$ordpagnom)
                 $montot=$x[$j]->getMontotalGrid()+$x[$j]->getMondes();
               else
                 $montot=$x[$j]->getMontotalGrid()+$x[$j]->getMondes() + $x[$j]->getMonret();
             }
             else $montot=$x[$j]->getMontotalGrid(); //+ $x[$j]->getMonret();
             $acummonret+=$x[$j]->getMonret();

             if ($aplrecop=='S' && $operacion=='ordpag')
             {
               $w = new Criteria();
               $w->add(OpretordPeer::NUMORD,$x[$j]->getNumord());
               $resulret= OpretordPeer::doSelect($w);
               if ($resulret)
               {
                 $monivaord=0;
                 foreach ($resulret as $objret) {
                    $p= new Criteria();
                    $p->add(TsretivaPeer::CODRET,$objret->getCodtip());
                    $p->add(TsretivaPeer::CODREC,$result[0]['codrgo']);
                    $resuliva= TsretivaPeer::doSelectOne($p);
                    if ($resuliva) {
                      $monivaord=$objret->getMonret();
                    }
                 }
                 $montot=H::toFloat($montot)-$monivaord;
               }
             }

             if ($moneda2!=$moneda) $montot=$montot*$valor;             
             if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
           }
          }
          $j++;
        }//while
      }//else if ($tippag=='C')//pagos compuestos

       if ($operacion=='ordpag')
       {
          if ($MontDcto > 0 && ($monpagado==0 || is_null($monpagado)))
          {
            // Comprobante.IncluirAsiento CtaDcto, DescOp, Comprob, "C", CDbl(MontDcto)
            if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
            if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
            if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;  
            if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
          }//if ($MontDcto > 0)
       }

        if ($operacion=='pagdir')
        {
          if ($MontDcto > 0)
          {
            // //Comprobante.IncluirAsiento CtaDcto, ConcDescto.Text, Comprob, "C", CDbl(MontDcto)
            if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
            if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
            if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;
            if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
          }//if ($MontDcto > 0)
        }//if ($operacion=='pagdir')

        if ($operacion=='pagnopre')
         {
           if ($MontDcto > 0)
           {
              //Comprobante.IncluirAsiento CtaDcto, ConDPnrn.Text, Comprob, "C", CDbl(MontDcto)
              if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
              if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
              if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
              if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;
              if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
           }//if ($MontDcto > 0)
         }

        //Comprobante.IncluirAsiento CtaBan, DesCtaCre, Comprob, "C", CDbl(Monto)
      if (trim($ctas)!="") $ctas=$ctas."_".$CtaBan; else  $ctas = $CtaBan;
      if (trim($desc)!="") $desc=$desc."_".$DesCtaCre; else  $desc = $DesCtaCre;
      if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
      if ($moneda2!=$moneda) $Monto=$Monto*$valor;
      if ($mosretcomop=='S' && $tipcauord==$ordpagnom)
        $Monto=$Monto;//+$acummonret;
      if (trim($montos)!="") $montos=$montos."_".$Monto; else $montos=$Monto;
      //--------------------------Generando la Parte de Las Retenciones --------------------------------
      
      if ($operacion=='ordpag')
      {
      //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(MontRet)
      /* if (trim($ctas)!="") $ctas=$ctas."_".$CtaPag; else  $ctas = $CtaPag;
       if (trim($desc)!="") $desc=$desc."_".$DesCtaDeb; else  $desc = $DesCtaDeb;
       if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
       if (trim($montos)!="") $montos=$montos."_".$MonRet; else $montos=$MonRet;*/
       if ($tippag=='S') //Pago Simple
       {
           $llevaret=true;
           $tipcauord=H::getX_vacio('NUMORD','OPOrdPag','Tipcau',$ordendepago);
           if ($mosretcomop=='S' && $tipcauord==$ordpagnom)
           $llevaret=false;
           $cheret='N';
         if ($llevaret) {          
          $q= new Criteria();
          $q->add(OpordchePeer::NUMORD,$ordendepago);
          $resulq= OpordchePeer::doSelect($q);
          if ($resulq){
            foreach ($resulq as $objq) {
              if ($objq->getCompret()=='S'){
                $cheret='S';
                break;
              }
            }
          }

            $numordmadre=H::getX_vacio('Numret','Opretord','Numord',$ordendepago);
            if ($numordmadre!='') //OP de Retenciones
            {
             $ctas=""; $desc=""; $movs=""; $montos="";
             $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where numret='".$ordendepago."' group by CodTip,Numret";
            if (Herramientas::BuscarDatos($SQL,$result))
            {
              $k=0;
              while ($k<count($result))
              {
                  $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($result[$k]['codtip']) ."'";
                  if (Herramientas::BuscarDatos($strsql,$optipret))
                  {
                   if ($result[$k]['montoret']>0)
                   {
                   //if ($cheret=='N' && ($monpagado==0 || is_null($monpagado))) //Para que incluya la cuenta las retenciones solo en primer pago
                   if ($cheret=='N')
                   {
                    if ($aplrecop=='S' && $operacion=='ordpag')
                    {
                      $p= new Criteria();
                      $p->add(TsretivaPeer::CODRET,$result[$k]['codtip']);
                      $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$ordendepago));
                      $resuliva= TsretivaPeer::doSelectOne($p);
                      if (!$resuliva) 
                      {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }else {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                      if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                      if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                      if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                      $monret1a=$result[$k]['montoret'];
                      if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                      if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }else {
                      //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                      if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                      if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                      if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                      $monret1a=$result[$k]['montoret'];
                      if ($moneda2!=$moneda) $monret1a=$monret1a;//*$valor;
                      if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                    }     
                  }
                }
              }
              $k++;
             } //while ($k<count($result))
            }//buscar datos
            }else { 
            $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where NumOrd= '".$ordendepago."' group by CodTip,Numret";
            if (Herramientas::BuscarDatos($SQL,$result))
            {
              $k=0;
              while ($k<count($result))
              {
                  $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($result[$k]['codtip']) ."'";
                  if (Herramientas::BuscarDatos($strsql,$optipret))
                  {
                   if ($result[$k]['montoret']>0)
                   {
                   //Para que incluya la cuenta las retenciones solo en primer pago
                   if ($cheret=='N')
                   {
                    if ($aplrecop=='S' && $operacion=='ordpag')
                    {
                      $p= new Criteria();
                      $p->add(TsretivaPeer::CODRET,$result[$k]['codtip']);
                      $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$ordendepago));
                      $resuliva= TsretivaPeer::doSelectOne($p);
                      if (!$resuliva) 
                      {
                        //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }else {
                         //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                        if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                        if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                        $monret1a=$result[$k]['montoret']; 
                        if ($moneda2!=$moneda) $monret1a=$monret1a;
                        if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }else {
                      //Comprobante.IncluirAsiento $optipret[0]['codcon'], $optipret[0]['destip'], Comprob, "C", $result[0]['montoret'])
                      if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                      if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                      if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                      $monret1a=$result[$k]['montoret'];
                      if ($moneda2!=$moneda) $monret1a=$monret1a;
                      if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                    }
     
                  }
                   }
                  }
                $k++;
              } //while ($k<count($result))
            }//buscar datos
          }
        }
       }
       else if ($tippag=='C')//pagos compuestos
       {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
            $llevaret=true;
           $tipcauord=H::getX_vacio('NUMORD','OPOrdPag','Tipcau',$x[$j]->getNumord());
           if ($mosretcomop=='S' && $tipcauord==$ordpagnom)
             $llevaret=false;
            $cheret='N';
            if ($llevaret) {
            $q= new Criteria();
            $q->add(OpordchePeer::NUMORD,$x[$j]->getNumord());
            $resulq= OpordchePeer::doSelect($q);
            if ($resulq){
              foreach ($resulq as $objq) {
                if ($objq->getCompret()=='S'){
                  $cheret='S';
                  break;
                }
              }
            }

            $numordmadre=H::getX_vacio('Numret','Opretord','Numord',$x[$j]->getNumord());
            if ($numordmadre!='')
            {
               $strsql = "Select codtip,SUM(MonRet) as montoret,numret from OPRetOrd where numret= '".$x[$j]->getNumord()."' group by codtip,Numret";
               if (Herramientas::BuscarDatos($strsql,$resultado))
               {
                $k=0;
                while ($k<count($resultado))
                { 
                    
                    $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($resultado[$k]['codtip']) ."'";
                    if (Herramientas::BuscarDatos($strsql,$optipret))
                    {
                      if ($resultado[$k]['montoret']>0)
                      {
                       //if ($cheret=='N' && ($monpagado==0 || is_null($monpagado)))
                       if ($cheret=='N') {//Para que incluya la cuenta las retenciones solo en primer pago           
                         if ($aplrecop=='S' && $operacion=='ordpag')
                         {
                            $p= new Criteria();
                            $p->add(TsretivaPeer::CODRET,$resultado[$k]['codtip']);
                            $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$x[$j]->getNumord()));
                            $resuliva= TsretivaPeer::doSelectOne($p);
                            if (!$resuliva) 
                            {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                              if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                              if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                              if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                              $monret1a=$resultado[$k]['montoret'];
                            }else {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                            $monret1a=$resultado[$k]['montoret'];
                            }
                          }else {
                            //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                            $monret1a=$resultado[$k]['montoret'];
                          }
                          if ($moneda2!=$moneda) $monret1a=$monret1a;
                          if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }
                   }
                  $k++;
                } //while ($k<count($result))
              }//buscar datos
            }else {
               $strsql = "Select codtip,SUM(MonRet) as montoret,numret from OPRetOrd where NumOrd= '".$x[$j]->getNumord()."' group by codtip,Numret";
               if (Herramientas::BuscarDatos($strsql,$resultado))
               {
                $k=0;
                while ($k<count($resultado))
                {
                    $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($resultado[$k]['codtip']) ."'";
                    if (Herramientas::BuscarDatos($strsql,$optipret))
                    {
                      if ($resultado[$k]['montoret']>0)
                      {
                       //if ($cheret=='N' && ($monpagado==0 || is_null($monpagado))) 
                       if ($cheret=='N') {//Para que incluya la cuenta las retenciones solo en primer pago           
                         if ($aplrecop=='S' && $operacion=='ordpag')
                         {
                            $p= new Criteria();
                            $p->add(TsretivaPeer::CODRET,$resultado[$k]['codtip']);
                            $p->add(TsretivaPeer::CODREC,H::getX_vacio('NUMORD','Opordpag','Codrgo',$x[$j]->getNumord()));
                            $resuliva= TsretivaPeer::doSelectOne($p);
                            if (!$resuliva) 
                            {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                              if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                              if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                              if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                              $monret1a=$resultado[$k]['montoret'];
                            }else {
                              //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                            $monret1a=$resultado[$k]['montoret'];
                            }
                          }else {
                            //Comprobante.IncluirAsiento $toptipret[0]['codcon'], $toptipret[0]['destip'], Comprob, "C", $resultado[0]['montoret'])
                            if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                            if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                            $monret1a=$resultado[$k]['montoret'];
                          }
                          if ($moneda2!=$moneda) $monret1a=$monret1a; 
                          if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }
                   }
                  $k++;
                } //while ($k<count($result))
              }//buscar datos
            }
          }
          }//if ($x[$j]->getCheck()=="1")
          $j++;
        }//while
       }//else if ($tippag=='C')//pagos compuestos
       // Comprobante.CargarComprobante
      }//if ($operacion=='ordpag')


    $arrecuentas=split("_",$ctas);
    $arretipos=split("_",$movs);
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
      $codtiptra=H::getX_vacio('CODTIP','Tstipmov','Codtiptra',$tscheemi->getTipdoc());
        $correl2=Comprobante::Buscar_Correlativo($tscheemi->getFecemi());
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl2);
	    $contabc->setReftra($numcomcon);
	    $contabc->setFeccom($tscheemi->getFecemi());
      $mancomegr=H::getConfApp2('mancomegr', 'tesoreria', 'tesmovemiche');
      $comegrseq=H::getConfApp2('comegrseq', 'tesoreria', 'tesmovemiche');
      if ($mancomegr=='S' && $comegrseq!='S')
	      $numcomegr=self::BuscarCorrelEgrMes($tscheemi,$correl,$campo);
      else
        $numcomegr="";
      if ($numcomegr!='')
	      $contabc->setDescom($DescOp." - ".$DesCtaCre." - ".$numcomegr);
      else
        $contabc->setDescom($DescOp." - ".$DesCtaCre);
	    if (H::toFloat($sumdeb)==H::toFloat($sumcre))
	    $contabc->setStacom('D');
	    else
	    $contabc->setStacom('E');
	    $contabc->setTipcom('TES');
	    $contabc->setMoncom($sumdeb);
            $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
            $contabc->setLoguse($loguse);
            $contabc->setCodtiptra($codtiptra);
	    $contabc->save();

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl2);
          $contabc1->setFeccom($tscheemi->getFecemi());
          $contabc1->setCodcta($new_ctas[$i]);
          $numasi= $i +1;
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($numcomcon);
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

  }//end function Genera_Comprobante_Automatico


  public static function grabarComprobanteAlcAutomatico($tscheemi,$grid,$DescOp,$tippag,$MontDcto,$Monto,$CtaPag,$desctacre,&$correl3,$MonRet,$operacion,$monpagado,$CtaDcto,$ConDto,$ordendepago,$DesCtaDeb)
  {
    $reftra = str_pad($tscheemi->getNumche(),8,"0",STR_PAD_LEFT);
    $codigocuenta="";  $tipo="";  $des="";  $monto="";  $codigocuentas="";  $tipo1="";  $desc="";  $monto1="";  $codigocuenta2="";  $tipo2="";  $des2="";  $monto2="";
    $codigocuenta3="";  $tipo3="";  $des3="";  $monto3=""; $codigocuenta4="";  $tipo4="";  $des4="";  $monto4=""; $codigocuenta5="";  $tipo5="";  $des5="";  $monto5="";
    $cuentas="";  $tipos="";  $montos="";  $descr="";   $msjuno="";  $msjdos="";  $mont=0;
    $aplretcomalc=H::getConfApp2('aplretcomalc', 'tesoreria', 'tesmovemiche');
        $moneda=$tscheemi->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tscheemi->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

     if ($tippag=='S') //Pago Simple
     {
     	if ($monpagado==0 || is_null($monpagado))
     	$mont=$Monto+$MontDcto;
        else $mont=$Monto+$MontDcto;
     }
     else if ($tippag=='C')//pagos compuestos
     {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
             if ($monpagado==0 || is_null($monpagado))
             $mont= $mont + ($x[$j]->getMontotalGrid()+$x[$j]->getMondes());
             else  $mont= $mont + ($x[$j]->getMontotalGrid()+$x[$j]->getMondes());
          }
          $j++;
        }
     }
    $ctaretben=H::getConfApp2('ctaretben', 'tesoreria', 'tesmovemiche');
     $trajo=H::getX_vacio('NUMRET','Opretord','numret',$ordendepago);

   if ($ctaretben=='S' && $operacion=='ordpag' && $trajo!='')
   {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$CtaPag);
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta=$dato->getCodcta();
        $tipo='D';
        $des="";
        $monto=$mont;
        if ($moneda2!=$moneda) $monto=$monto*$valor;
      }
   }else {
    $c= new Criteria();
    $c->add(TsrelasiordPeer::CTAGASXPAG,$CtaPag);
    $reg= TsrelasiordPeer::doSelectOne($c);
    if ($reg)
    {
      $v= new Criteria();
      $v->add(ContabbPeer::CODCTA,$reg->getCtaordxpag());
      $dato= ContabbPeer::doSelectOne($v);
      if ($dato)
      {
        $codigocuenta=$dato->getCodcta();
        $tipo='D';
        $des="";
        $monto=$mont;
        if ($moneda2!=$moneda) $monto=$monto*$valor;
      }
    }
   }

   $b= new Criteria();
   $b->add(TsdefbanPeer::NUMCUE,$tscheemi->getNumcue());
   $reg1= TsdefbanPeer::doSelectOne($b);
   if ($reg1)
   {
   	 $cuenta=$reg1->getCodcta();
   }else $cuenta='';

    $x= new Criteria();
    $x->add(ContabbPeer::CODCTA,$cuenta);
    $reg2= ContabbPeer::doSelectOne($x);
    if ($reg2)
    {
       $codigocuenta2=$cuenta;
	   $tipo2='C';
	   $des2="";
           if ($aplretcomalc=='S')
               $monto2=$Monto;
           else
	   $monto2=$mont;
      if ($moneda2!=$moneda) $monto2=$monto2*$valor;
    }

    if ($aplretcomalc=='S')
    {
        if ($operacion=='ordpag')
       {
          if ($MontDcto > 0 || is_null($monpagado))
          {
            if (trim($codigocuenta3)!="") $codigocuenta3=$codigocuenta3."_".$CtaDcto; else  $codigocuenta3 = $CtaDcto;
            if (trim($des3)!="") $des3=$des3."_".$ConDto; else  $des3 = $ConDto;
            if (trim($tipo3)!="") $tipo3=$tipo3."_"."C"; else  $tipo3 = "C";
            
            if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;
            if (trim($monto3)!="") $monto3=$monto3."_".$MontDcto; else $monto3=$MontDcto;
          }
       }
       if ($operacion=='ordpag')
      {
       if (trim($codigocuenta4)!="") $codigocuenta4=$codigocuenta4."_".$codigocuenta; else  $codigocuenta4 = $codigocuenta;
       if (trim($des4)!="") $des4=$des4."_".$DesCtaDeb; else  $des4 = $DesCtaDeb;
       if (trim($tipo4)!="") $tipo4=$tipo4."_"."D"; else  $tipo4 = "D";
       
       if ($moneda2!=$moneda) $MonRet=$MonRet*$valor;
       if (trim($monto4)!="") $monto4=$monto4."_".$MonRet; else $monto4=$MonRet;
       if ($tippag=='S') //Pago Simple
       {
            $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where NumOrd= '".$ordendepago."' group by CodTip,Numret";
            if (Herramientas::BuscarDatos($SQL,$result))
            {
              $k=0;
              while ($k<count($result))
              {
                  $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($result[$k]['codtip']) ."'";
                  if (Herramientas::BuscarDatos($strsql,$optipret))
                  {
                    if ($result[$k]['montoret']>0)
                   {
                    if (trim($codigocuenta5)!="") $codigocuenta5=$codigocuenta5."_".$optipret[0]['codcon']; else  $codigocuenta5 = $optipret[0]['codcon'];
                    if (trim($des5)!="") $des5=$des5."_".$optipret[0]['destip']; else  $des5 = $optipret[0]['destip'];
                    if (trim($tipo5)!="") $tipo5=$tipo5."_"."C"; else  $tipo5 = "C";
                    $monret2q=$result[$k]['montoret'];
                    if ($moneda2!=$moneda) $monret2q=$monret2q*$valor;
                    if (trim($monto5)!="") $monto5=$monto5."_".$monret2q; else $monto5=$monret2q;
                  }
                  }
                $k++;
              }
            }
       }
       else if ($tippag=='C')//pagos compuestos
       {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
               $strsql = "Select codtip,SUM(MonRet) as montoret,numret from OPRetOrd where NumOrd= '".$x[$j]->getNumord()."' group by codtip,Numret";
               if (Herramientas::BuscarDatos($strsql,$resultado))
               {
                $k=0;
                while ($k<count($resultado))
                {
                    $strsql = "Select codcon,destip From OPTipRet where CodTip= '". trim($resultado[$k]['codtip']) ."'";
                    if (Herramientas::BuscarDatos($strsql,$optipret))
                    {
                      if ($resultado[$k]['montoret']>0)
                      {
                      if (trim($codigocuenta5)!="") $codigocuenta5=$codigocuenta5."_".$optipret[0]['codcon']; else  $codigocuenta5 = $optipret[0]['codcon'];
                      if (trim($des5)!="") $des5=$des5."_".$optipret[0]['destip']; else  $des5 = $optipret[0]['destip'];
                      if (trim($tipo5)!="") $tipo5=$tipo5."_"."C"; else  $tipo5 = "C";
                      $monret2q=$resultado[$k]['montoret'];
                      if ($moneda2!=$moneda) $monret2q=$monret2q*$valor;
                      if (trim($monto5)!="") $monto5=$monto5."_".$monret2q; else $monto5=$monret2q;
                    }
                    }
                  $k++;
                }
              }
          }
          $j++;
        }
       }
      }
    }

      if ($aplretcomalc=='S')
    {
        if ($operacion=='ordpag')
       {
        if ($codigocuenta5=="" && $codigocuenta4=="" && $codigocuenta3=="")
        {
    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;
        }else if ($codigocuenta5=="" && $codigocuenta4=="") {
            $cuentas=$codigocuenta3.'_'.$codigocuenta2.'_'.$codigocuenta;
            $tipos=$tipo3.'_'.$tipo2.'_'.$tipo;
            $descr=$des3.'_'.$des2.'_'.$des;
            $montos=$monto3.'_'.$monto2.'_'.$monto;
        }else if ($codigocuenta5=="" && $codigocuenta3==""){
            $cuentas=$codigocuenta4.'_'.$codigocuenta2.'_'.$codigocuenta;
            $tipos=$tipo4.'_'.$tipo2.'_'.$tipo;
            $descr=$des4.'_'.$des2.'_'.$des;
            $montos=$monto4.'_'.$monto2.'_'.$monto;
        }else if ($codigocuenta4=="" && $codigocuenta3==""){
            $cuentas=$codigocuenta5.'_'.$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo5.'_'.$tipo2.'_'.$tipo;
        $descr=$des5.'_'.$des2.'_'.$des;
        $montos=$monto5.'_'.$monto2.'_'.$monto;
        }else  if ($codigocuenta3=="") {
            $cuentas=$codigocuenta5.'_'.$codigocuenta4.'_'.$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo5.'_'.$tipo4.'_'.$tipo2.'_'.$tipo;
        $descr=$des5.'_'.$des4.'_'.$des2.'_'.$des;
        $montos=$monto5.'_'.$monto4.'_'.$monto2.'_'.$monto;
        }else {
        $cuentas=$codigocuenta5.'_'.$codigocuenta4.'_'.$codigocuenta3.'_'.$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo5.'_'.$tipo4.'_'.$tipo3.'_'.$tipo2.'_'.$tipo;
        $descr=$des5.'_'.$des4.'_'.$des3.'_'.$des2.'_'.$des;
        $montos=$monto5.'_'.$monto4.'_'.$monto3.'_'.$monto2.'_'.$monto;
        }

       }else {
           $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;
       }
    }else {
        $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;
    }


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
      $codtiptra=H::getX_vacio('CODTIP','Tstipmov','Codtiptra',$tscheemi->getTipdoc());
        $correl3=Comprobante::Buscar_Correlativo($tscheemi->getFecemi());//OrdendePago::Buscar_Correlativo();
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl3);
	    $contabc->setReftra($reftra);
	    $contabc->setFeccom($tscheemi->getFecemi());
	    //$numcomegr=self::BuscarCorrelEgrMes($tscheemi,&$correl,&$campo);
	    //$contabc->setDescom($DescOp." - ".$desctacre."N° Com. Egr. ".$numcomegr);
	    $contabc->setDescom($DescOp." - ".$desctacre);
	    if ($sumdeb==$sumcre)
	    $contabc->setStacom('D');
	    else
	    $contabc->setStacom('E');
	    $contabc->setTipcom('TES');
	    $contabc->setMoncom($sumdeb);
            $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
            $contabc->setLoguse($loguse);
            $contabc->setCodtiptra($codtiptra);
	    $contabc->save();

      $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl3);
          $contabc1->setFeccom($tscheemi->getFecemi());
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

  public static function salvarTesactestcheanu($clasemodelo,$grid)
  {
    //try{
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
      	if ($x[$j]->getCheck()=='1')
      	{
      		//echo '1';
      		$x[$j]->setStatus('C');
			$x[$j]->save();
      	}
        $j++;
      }
      //H::printR($x);
//exit();

		return -1;
	/*} catch (Exception $ex){
		echo $ex; exit();
		 return 0;
	}*/
  }

  public static function EnterarPagoGeBOS($tscheemi,$grid)
  {
    $grid = $grid[0];
    
    foreach($grid as $g){
      $c = new Criteria();
      $c->add(OpdetsolpagPeer::REFORD,$g->getNumord());
      $opdetsolpag = OpdetsolpagPeer::doSelectOne($c);
      if($opdetsolpag) // existe la solicitud de pago
      {
        $opsolpag = $opdetsolpag->getOpsolpag();
        // Entero al GeBos mediante el servicio web
        $urlws = H::getConfApp('urlwsdlgebos', 'tesoreria', 'tesmovemiche');
        $usugebos = H::getConfApp('usugebos', 'tesoreria', 'tesmovemiche');
        $pasgebos = H::getConfApp('pasgebos', 'tesoreria', 'tesmovemiche');

        if($urlws && $usugebos && $pasgebos){
          //try{
            $client = new SoapClient($urlws);
            
            $ticket = $client->__call('autenticar',array($usugebos, md5($pasgebos)));

            $det = array(array($opsolpag->getNomben(),$tscheemi->getNomcue(),$tscheemi->getNumche(),$tscheemi->getFecemi(),$g->getMonord(true)));
            $result = $client->__call('notificar_pago', array($ticket,$opsolpag->getNumsolcre(),$opsolpag->getNumcre(),$opdetsolpag->getReford(),$det));

            if(is_array($result)){
              if($result[0][1]=='0'){
                $opsolpag->setStasol('D');
                $opsolpag->save();
                $opdetsolpag->setStaimp('D');
                $opdetsolpag->save();
                return 'NO se pudo enterar el pago al GeBos, intente mas tarde. ('.$result[1][1].')';
              }
              else {
                $opsolpag->setStasol('P');
                $opsolpag->save();
                $opdetsolpag->setStaimp('P');
                $opdetsolpag->save();
                return 'Pago Enterado Satisfactoriamente al GeBos';
              }
            }else {
              $opsolpag->setStasol('D');
              $opsolpag->save();
              $opdetsolpag->setStaimp('D');
              $opdetsolpag->save();
              return 'NO se pudo enterar el pago al GeBos. (Error la respuesta del servicio web)';
            }
            
          /*}catch(Exception $ex){
            return 'NO se pudo enterar el pago al GeBos. ('.$ex->__toString().')';
          }*/
        }
      }
    }

  }
  
      public static function ActualizarEstatusChequesPresidencia($grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getFirmado()=="1")
      {        
        $x[$j]->setStatus('C');
        $x[$j]->save();
      }
      $j++;
    }
  }

    public static function ObtenerAjuste2($numord,$codpre)
  {
    $result=array();
    $sql="Select coalesce(sum(MonAju),0) as  monaju From CPImpCau Where RefCau='". $numord ."' and codpre='".$codpre."'";
    if (Herramientas::BuscarDatos($sql,$result))
    return $result[0]['monaju'];
    else
    return 0;
  }

  public static function generarTxtProveedor($cedrif,$despag,$monto,$reflib,$numord)
  {
    $dir="";    
    $t= new Criteria();
    $t->add(OpbenefiPeer::CEDRIF,$cedrif);
    $regt=OpbenefiPeer::doSelectOne($t);
    if ($regt){
      if ($regt->getEmail()!='') {
        $correo=$regt->getEmail();
        //Generar archivo txt
        $nombre_archivo=sfConfig::get('sf_upload_dir')."/pagosportransferencias/".$reflib."_".$correo.".txt";
    
        if (!file_exists($nombre_archivo))
        {
          fopen($nombre_archivo,"w");
        }
        chmod ($nombre_archivo,0777);

        $correoprove = fopen($nombre_archivo,'w+');
        $dir=$reflib."_".$correo.".txt";

        $cadena="";
        $cadena=$correo;
        fputs($correoprove,$cadena.chr(10));

        $y= new Criteria();
        $y->add(OpfacturPeer::NUMORD,$numord);
        $regy= OpfacturPeer::doSelect($y);
        if ($regy){
          $i=0;
          foreach ($regy as $objy) {
            if ($i==0)
              $numfac=$objy->getNumfac();
            else
              $numfac.='-'.$objy->getNumfac();
            $i++;
          }          
        }else $numfac="";

        $cadena="Buenas tardes.- ";
        fputs($correoprove,$cadena.chr(13).chr(10));

        //$cadena="Mediante la presente se le informa que tiene una transferencia bancaria realizada por parte de PDVAL a nombre de ".$regt->getNomben().", por concepto de ".$despag.", por un monto de ".$monto.".";
        $cadena=" Se informa que se ha realizado una Transferencia Bancaria identificada con el N° ".$reflib.", relacionada al pago de la Factura(s) N° ".$numfac.", por parte de la Productora y Distribuidora Venezolana de Alimentos S.A. (PDVAL) a nombre de ".$regt->getNomben().". Se invita de la misma manera a retirar los Comprobantes en la Unidad de Tesorería ubicada en Sede Central, en los Horarios comprendidos de 8:00am a 12:00pm y de 1:15pm a 4:45 pm.";
        fputs($correoprove,$cadena.chr(10));

        /*$y= new Criteria();
        $y->add(OpretordPeer::NUMORD,$numord);
        $regy= OpretordPeer::doSelect($y);
        if ($regy){
          foreach ($regy as $objr) {
            $cadena="Tipo Retención ".H::getX_vacio('CODTIP','Optipret','Destip',$objr->getCodtip()). " Monto Retenciones ".H::FormatoMonto($objr->getMonret());
            fputs($correoprove,$cadena.chr(10));
          }
        }*/       
        
        fclose($correoprove);
      }
    }

    return $dir;
  }

  protected function generarcodigoRandom()
  {
    $string = '';
    $pool   = 'abcdefghijklmnopqrstuvwxyz';
    $pool1   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pool2   = '0123456789';
    $enc=false;
    while (!$enc){
      $string = '';      
      for ($i = 1; $i <= 5; $i++)
      {
        $ramdom=rand(0, 2);
        if ($ramdom==0)
        $string .= substr($pool, rand(0, 25), 1);
        else if ($ramdom==1)
          $string .= substr($pool1, rand(0, 25), 1);
        else
          $string .= substr($pool2, rand(0, 9), 1);
      }

      $t= new Criteria();
      $t->add(TscheemiPeer::CODSEG,$string);
      $regt= TscheemiPeer::doSelectOne($t);
      if (!$regt)
        $enc=true;
    }

   return $string;
  }

    protected function generarcodigoRandomConformacion()
  {
    $string = '';
    $pool   = 'abcdefghijklmnopqrstuvwxyz';
    $pool1   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pool2   = '0123456789';
    $enc=false;
    while (!$enc){
      $string = '';      
      for ($i = 1; $i <= 5; $i++)
      {
        $ramdom=rand(0, 2);
        if ($ramdom==0)
        $string .= substr($pool, rand(0, 25), 1);
        else if ($ramdom==1)
          $string .= substr($pool1, rand(0, 25), 1);
        else
          $string .= substr($pool2, rand(0, 9), 1);
      }

      $t= new Criteria();
      $t->add(TscheemiPeer::CODCON,$string);
      $regt= TscheemiPeer::doSelectOne($t);
      if (!$regt)
        $enc=true;
    }

   return $string;
  }

  public static function generarTxtProveedorCompuesto($cedrif,$despag,$monto,$reflib,$numfac)
  {
    $dir="";    
    $t= new Criteria();
    $t->add(OpbenefiPeer::CEDRIF,$cedrif);
    $regt=OpbenefiPeer::doSelectOne($t);
    if ($regt){
      if ($regt->getEmail()!='') {
        $correo=$regt->getEmail();
        //Generar archivo txt
        $nombre_archivo=sfConfig::get('sf_upload_dir')."/pagosportransferencias/".$reflib."_".$correo.".txt";
    
        if (!file_exists($nombre_archivo))
        {
          fopen($nombre_archivo,"w");
        }
        chmod ($nombre_archivo,0777);

        $correoprove = fopen($nombre_archivo,'w+');
        $dir=$reflib."_".$correo.".txt";

        $cadena="";
        $cadena=$correo;
        fputs($correoprove,$cadena.chr(10));

        $cadena="Buenas tardes.- ";
        fputs($correoprove,$cadena.chr(13).chr(10));

        $cadena=" Se informa que se ha realizado una Transferencia Bancaria identificada con el N° ".$reflib.", relacionada al pago de la Factura(s) N° ".$numfac.", por parte de la Productora y Distribuidora Venezolana de Alimentos S.A. (PDVAL) a nombre de ".$regt->getNomben().". Se invita de la misma manera a retirar los Comprobantes en la Unidad de Tesorería ubicada en Sede Central, en los Horarios comprendidos de 8:00am a 12:00pm y de 1:15pm a 4:45 pm.";
        fputs($correoprove,$cadena.chr(10));
     
        
        fclose($correoprove);
      }
    }

    return $dir;
  }

}
?>
