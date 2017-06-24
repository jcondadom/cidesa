<?php
/**
 * Cuentas por cobrar: Clase estática para el manejo las cuentas por cobrar
 *
 * @package    Roraima
 * @subpackage cuentasxcobrar
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cuentasxcobrar {
  public static function salvarDocumentos($cobdocume, $grid, $grid2)
  {
  	$cobdocume->setStadoc('A');
    $cobdocume->save();
    //Actualizar Documento Afectado Crédito
    if ($cobdocume->getRefdocnc()!='')
    {
        $q= new Criteria();
        $q->add(CobdocumePeer::REFDOC,$cobdocume->getRefdocnc());
        $q->add(CobdocumePeer::CODCLI,$cobdocume->getCodcli());
        $regq= CobdocumePeer::doSelectOne($q);
        if ($regq){
          $regq->setAbodoc($regq->getAbodoc() + $cobdocume->getSaldoc());
          $regq->setSaldoc($regq->getSaldoc() - $cobdocume->getSaldoc());
          $regq->save();
        }
    }
    //Actualizar Documento Afectado Débito
    if ($cobdocume->getRefdocnd()!='')
    {
        $q= new Criteria();
        $q->add(CobdocumePeer::REFDOC,$cobdocume->getRefdocnd());
        $q->add(CobdocumePeer::CODCLI,$cobdocume->getCodcli());
        $regq= CobdocumePeer::doSelectOne($q);
        if ($regq){
          $regq->setAbodoc($regq->getAbodoc() + $cobdocume->getSaldoc());
          $regq->setSaldoc($regq->getSaldoc() - $cobdocume->getSaldoc());
          $regq->save();
        }
    }
    self::Grabar_Recargos_Documentos($cobdocume, $grid);
    self::Grabar_Descuentos_Documentos($cobdocume, $grid2);
  }

   public static function Grabar_Recargos_Documentos($cobdocume, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodrec()!="")
       {
       	$x[$j]->setRefdoc($cobdocume->getRefdoc());
       	$x[$j]->setCodcli($cobdocume->getCodcli());
       	$x[$j]->setFecrec($cobdocume->getFecemi());
       	$x[$j]->save();
       }
       $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

    }

    public static function Grabar_Descuentos_Documentos($cobdocume, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCoddes()!="")
       {
       	$x[$j]->setRefdoc($cobdocume->getRefdoc());
       	$x[$j]->setCodcli($cobdocume->getCodcli());
       	$x[$j]->setFecrec($cobdocume->getFecemi());
       	$x[$j]->save();
       }
       $j++;
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }

    }

    public static function salvarTransacciones($cobtransa,$grid,$grid2,$grid3,$grid4,$numcom,$grid5)
    {
      self::grabarPago($cobtransa,$numcom);
      self::grabarDetallesPago($cobtransa,$grid,$grid2,$grid3,$grid4);
      self::grabarDetallesForpag($cobtransa,$grid2,$grid5);      
    }

    public static function grabarPago($cobtransa,$numcom)
    {
      /*if ($cobtransa->getNumtra()=="" || $cobtransa->getNumtra()=="##########") {
        $valido = false;
        while(!$valido){
          $num = H::getNextvalSecuencia('cobtransa_numtra_seq');
          $numtra = str_pad((string)$num, 10, "0", STR_PAD_LEFT);

          $c = new Criteria();
          $c->add(CobtransaPeer::NUMTRA,$numtra);
          $cobtran = CobtransaPeer::doSelectOne($c);
          if(!$cobtran){
            $valido = true;
          }
        }
        $cobtransa->setNumtra($numtra);  
      }*/
      $cobtransa->setNumcom($numcom);
      $cobtransa->setMontra($cobtransa->getTottra());
      $cobtransa->setFeccom($cobtransa->getFectra());
      if ($cobtransa->getTotmondes()>0)
      {
      	$cobtransa->setTotdsc($cobtransa->getTotmondes());
      }else $cobtransa->setTotdsc(0);

      if ($cobtransa->getTotmonrec()>0)
      {
      	$cobtransa->setTotrec($cobtransa->getTotmonrec());
      }else $cobtransa->setTotrec(0);
      $cobtransa->setStatus('A');
      $cobtransa->save();
      self::ActualizaComprobante($cobtransa);
    }


  public static function  Verificar_Comprobante($Comprob)
  {
    $sql = "Select * From CONTABC Where NumCom = '". $Comprob ."' Order by NumCom";
    if (Herramientas::BuscarDatos($sql,$result))
          return true;
    else
        return false;
  }

	public static function generar_comprobante($cobdocume,$gridrec,$griddes,&$arrcompro)
	{
 	$numerocomprobante = Comprobante::Buscar_Correlativo(date("d/m/Y",strtotime($cobdocume->getFecemi())));
	$ctas="";$movs="";$montos="";$desc="";
    if (!self::Verificar_Comprobante($numerocomprobante))
    {
      $p= FacorrelatPeer::doSelectOne(new Criteria());
      if ($p){
        if ($p->getFatipmovId()==$cobdocume->getFatipmovId())
        {
          //Comprobante.IncluirAsiento CtaCli, DesDoc, Comprob, "D", CDbl(monto)
          $ctas = $cobdocume->getCodctacli();
          $desc=$cobdocume->getDesdoc();
          $movs="C";
          $montos=$cobdocume->getSaldoc();

        //Descuentos
          $x=$griddes[0];
            $j=0;
            while ($j<count($x))
            {
              if ($x[$j]->getCoddes()!="")
              {
                //primero busco la cuenta contable asociada al descuento
                $codctades="";
                $c = new Criteria();
                $c->add(FadesctoPeer::CODDESC,$x[$j]->getCoddes());
              $datos = FadesctoPeer::doSelectOne($c);
              if($datos)
              {
                $codctades=$datos->getCodcta();
              }
                if ($codctades!="")
                {
                 //Comprobante.IncluirAsiento GridDescuentos.TextMatrix(I, 3), DesDoc, Comprob, "D", CDbl(GridDescuentos.TextMatrix(I, 1))
                 if (trim($ctas)!="") $ctas=$ctas."_".$codctades; else  $ctas = $codctades;
                 if (trim($desc)!="") $desc=$desc."_".$cobdocume->getDesdoc(); else  $desc = $cobdocume->getDesdoc();
                 if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                 $montot=$x[$j]->getMondes();
                 if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
                }
              }
              $j++;
            }//while

            //Recargos
            $x=$gridrec[0];
            $j=0;
            while ($j<count($x))
            {
              if ($x[$j]->getCodrec()!="")
              {
                //primero busco la cuenta contable asociada al descuento
                $codctades="";
                $c = new Criteria();
                $c->add(CarecargPeer::CODRGO,$x[$j]->getCodrec());
              $datos = CarecargPeer::doSelectOne($c);
              if($datos)
              {
                $codctarec=$datos->getCodcta();
              }
                if ($codctarec!="")
                {
                 //Comprobante.IncluirAsiento GridRecargos.TextMatrix(I, 3), DesDoc, Comprob, "C", CDbl(GridRecargos.TextMatrix(I, 1))
                 if (trim($ctas)!="") $ctas=$ctas."_".$codctarec; else  $ctas = $codctarec;
                 if (trim($desc)!="") $desc=$desc."_".$cobdocume->getDesdoc(); else  $desc = $cobdocume->getDesdoc();
                 if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                 $montot=$x[$j]->getMonrec();
                 if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
                }
              }
              $j++;
            }//while

          $cuehabtipmov=H::getConfApp2('cuehabtipmov', 'cuentasxcobrar', 'cobdocume');
          if ($cuehabtipmov=='S')
            $codctades=Herramientas::getX_vacio('ID','Fatipmov','Codcta',$cobdocume->getFatipmovId());
          else
            $codctades="";
          $ctas=$ctas."_".$codctades;
          $desc=$desc."_".$cobdocume->getDesdoc();
          $movs=$movs."_"."D";
          $mon=$cobdocume->getMondoc();
          $montos=$montos."_".$mon; 
      }else {
        //Comprobante.IncluirAsiento CtaCli, DesDoc, Comprob, "D", CDbl(monto)
          $ctas = $cobdocume->getCodctacli();
          $desc=$cobdocume->getDesdoc();
          $movs="D";
          $montos=$cobdocume->getSaldoc();

      	//Descuentos
          $x=$griddes[0];
            $j=0;
            while ($j<count($x))
            {
              if ($x[$j]->getCoddes()!="")
              {
              	//primero busco la cuenta contable asociada al descuento
              	$codctades="";
              	$c = new Criteria();
              	$c->add(FadesctoPeer::CODDESC,$x[$j]->getCoddes());
             	$datos = FadesctoPeer::doSelectOne($c);
              if($datos)
              {
              	$codctades=$datos->getCodcta();
              }
                if ($codctades!="")
                {
                 //Comprobante.IncluirAsiento GridDescuentos.TextMatrix(I, 3), DesDoc, Comprob, "D", CDbl(GridDescuentos.TextMatrix(I, 1))
                 if (trim($ctas)!="") $ctas=$ctas."_".$codctades; else  $ctas = $codctades;
                 if (trim($desc)!="") $desc=$desc."_".$cobdocume->getDesdoc(); else  $desc = $cobdocume->getDesdoc();
                 if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                 $montot=$x[$j]->getMondes();
                 if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
                }
              }
              $j++;
            }//while

            //Recargos
            $x=$gridrec[0];
            $j=0;
            while ($j<count($x))
            {
              if ($x[$j]->getCodrec()!="")
              {
              	//primero busco la cuenta contable asociada al descuento
              	$codctades="";
              	$c = new Criteria();
              	$c->add(CarecargPeer::CODRGO,$x[$j]->getCodrec());
             	$datos = CarecargPeer::doSelectOne($c);
              if($datos)
              {
              	$codctarec=$datos->getCodcta();
              }
                if ($codctarec!="")
                {
                 //Comprobante.IncluirAsiento GridRecargos.TextMatrix(I, 3), DesDoc, Comprob, "C", CDbl(GridRecargos.TextMatrix(I, 1))
                 if (trim($ctas)!="") $ctas=$ctas."_".$codctarec; else  $ctas = $codctarec;
                 if (trim($desc)!="") $desc=$desc."_".$cobdocume->getDesdoc(); else  $desc = $cobdocume->getDesdoc();
                 if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                 $montot=$x[$j]->getMonrec();
                 if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
                }
              }
              $j++;
            }//while

          $cuehabtipmov=H::getConfApp2('cuehabtipmov', 'cuentasxcobrar', 'cobdocume');
          if ($cuehabtipmov=='S')
            $codctades=Herramientas::getX_vacio('ID','Fatipmov','Codcta',$cobdocume->getFatipmovId());
          else
            $codctades="";
          $ctas=$ctas."_".$codctades;
          $desc=$desc."_".$cobdocume->getDesdoc();
          $movs=$movs."_"."C";
          $mon=$cobdocume->getMondoc();
          $montos=$montos."_".$mon;
    }
  }

    $clscommpro=new Comprobante();
	$clscommpro->setGrabar("N");
	$clscommpro->setNumcom($numerocomprobante);
	$reftra=substr($cobdocume->getRefdoc(),2,8);
	$clscommpro->setReftra($reftra);
	$clscommpro->setFectra(date("d/m/Y",strtotime($cobdocume->getFecemi())));
	$clscommpro->setDestra($cobdocume->getDesdoc());
	$clscommpro->setCtas($ctas);
	$clscommpro->setDesc($desc);
	$clscommpro->setMov($movs);
	$clscommpro->setMontos($montos);
	$arrcompro[]=$clscommpro;

    }// if (!self::Verificar_Comprobante($numerocomprobante))
	else
     {
        $mensaje="No se pudo generar el comproban te contable. El Número del Comprobante: ". $numerocomprobante . " ya existe";
        $clscommpro=new Comprobante();
        $clscommpro->setError("S");
        $clscommpro->setMsgerr($mensaje);
        $arrcompro[]=$clscommpro;
     }


}// fin generar_comprobante

    public static function grabarDetallesPago($cobtransa,$grid1,$grid2,$grid3,$grid4)
    {
      $a= new Criteria();
      $a->add(CobdettraPeer::NUMTRA,$cobtransa->getNumtra());
      CobdettraPeer::doDelete($a);

      $x=$grid1[0];
	  $j=0;
	  if (count($x)>0)
	  {
		  while ($j<count($x))
		  {

		  	if ($x[$j]->getMonpag()>0)
		  	{
              $cobdettra= new Cobdettra();
              $cobdettra->setNumtra($cobtransa->getNumtra());
              $cobdettra->setCodcli($cobtransa->getCodcli());
              $cobdettra->setRefdoc($x[$j]->getRefdoc());
              $cobdettra->setCorrel($j);
              $cobdettra->setMonpag($x[$j]->getMonpag());              
              $cobdettra->setNroant($x[$j]->getNroant());
              $cobdettra->setMonamo($x[$j]->getMonamo());
              if ($x[$j]->getNroant()!='' && $x[$j]->getMonamo()>0){
                $q= new Criteria();
                $q->add(FaantcliPeer::NROANT,$x[$j]->getNroant());
                $q->add(FaantcliPeer::CODCLI,$cobtransa->getCodcli());
                $resulg= FaantcliPeer::doSelectOne($q);
                if ($resulg){
                  $resulg->setResant($resulg->getResant()-$x[$j]->getMonamo());
                  $resulg->save();
                }
              }

              $auxdescuento=0;
              $cobdettra->setMondsc($x[$j]->getMondsc());
              if ($x[$j]->getMondsc()>0)
              {
              	$auxdescuento=$x[$j]->getMondsc();
              }

              $auxrecargo=0;
              $cobdettra->setMonrec($x[$j]->getMonrec());
              if ($x[$j]->getMonrec()>0)
              {
              	$auxrecargo=$x[$j]->getMonrec();
              }

              $cobdettra->setTottra($x[$j]->getMonpag() + $x[$j]->getMonrec() - $x[$j]->getMonrec());
              $cobdettra->save();

              if ($auxdescuento>0)
              {
              	self::grabarDescuentosTransaccion($cobtransa,$x[$j]->getRefdoc(),$grid4);
              }

              if ($auxrecargo>0)
              {
              	self::grabarRecargosTransaccion($cobtransa,$x[$j]->getRefdoc(),$grid3);
              }
		  	}
		    $j++;
		  }
		self::actualizaFactura($cobtransa,$grid1,$grid2);
	  }

	  $z=$grid1[1];
	  $j=0;
	  while ($j<count($z))
	  {
	      $z[$j]->delete();
	      $j++;
	  }
    }

    public static function grabarDescuentosTransaccion($cobtransa,$refdoc,$descuentos)
    {
       $a= new Criteria();
       $a->add(CobdestraPeer::REFDOC,$refdoc);
       $a->add(CobdestraPeer::CODCLI,$cobtransa->getCodcli());
       $a->add(CobdestraPeer::NUMTRA,$cobtransa->getNumtra());
       CobdestraPeer::doDelete($a);

	   $z=$descuentos[0];
	   $l=0;
	   if (count($z)>0)
	   {
		 while ($l<count($z))
		 {
           if ($z[$l]->getMondes()!="0.00" && $z[$l]->getRefdoc()==$refdoc && $z[$l]->getCoddes()!="")
           {
           	$z[$l]->setNumtra($cobtransa->getNumtra());
           	$z[$l]->setRefdoc($refdoc);
           	$z[$l]->setCodcli($cobtransa->getCodcli());
           	$z[$l]->setFecdes($cobtransa->getFectra());
           	$z[$l]->save();
           }
		  $l++;
		 }
	   }

	   $p=$descuentos[1];
	   $j=0;
	   while ($j<count($p))
	   {
	      $p[$j]->delete();
	      $j++;
	   }
    }

    public static function grabarRecargosTransaccion($cobtransa,$refdoc,$recargos)
    {
       $a= new Criteria();
       $a->add(CobrectraPeer::REFDOC,$refdoc);
       $a->add(CobrectraPeer::CODCLI,$cobtransa->getCodcli());
       $a->add(CobrectraPeer::NUMTRA,$cobtransa->getNumtra());
       CobrectraPeer::doDelete($a);

	   $z=$recargos[0];
	   $l=0;
	   if (count($z)>0)
	   {
		 while ($l<count($z))
		 {
           if ($z[$l]->getMonrec()!="0.00" && $z[$l]->getRefdoc()==$refdoc && $z[$l]->getCodrec()!="")
           {
           	$z[$l]->setNumtra($cobtransa->getNumtra());
           	$z[$l]->setRefdoc($refdoc);
           	$z[$l]->setCodcli($cobtransa->getCodcli());
           	$z[$l]->setFecdes($cobtransa->getFectra());
           	$z[$l]->save();
           }
		  $l++;
		 }
	   }

   	   $p=$recargos[1];
	   $j=0;
	   while ($j<count($p))
	   {
	      $p[$j]->delete();
	      $j++;
	   }
    }

    public static function actualizaFactura($cobtransa,$documentos,$grid2)
    {
    $x=$documentos[0];
    $geningreso=H::getConfApp2('geningreso', 'facturacion', 'fafactur');
	  $j=0;
	  if (count($x)>0)
	  {
		  while ($j<count($x))
		  {
        if ($x[$j]->getMonpag()>0)
		  	{
		  	  $c= new Criteria();
		  	  $c->add(CobdocumePeer::REFDOC,$x[$j]->getRefdoc());
		  	  $c->add(CobdocumePeer::CODCLI,$cobtransa->getCodcli());
		  	  $datos= CobdocumePeer::doSelectOne($c);
		  	  if ($datos)
		  	  {
            $auxsumfac=0;
            $reffac=$datos->getReffac();
            $datos->setAbodoc($datos->getAbodoc() + $x[$j]->getMonpag());
            $datos->setSaldoc($datos->getSaldoc() - $x[$j]->getMonpag());
            $datos->save();
            if ($reffac!="") {   
              if ($geningreso=='S') {
         	     $i=0;
               $y=$grid2[0];
               while ($i<count($y))
               {
                 if ($y[$i]->getMonpag()>0) {
                   $d= new Criteria();
                   $d->add(FatippagPeer::ID,$y[$i]->getIdtippag());
                   $reg1= FatippagPeer::doSelectOne($d);
                   if ($reg1)
                   {
                     if ($reg1->getGening()=='S')
                     {
                        $b= new Criteria();
                        $b->add(CiregingPeer::REFING,$reffac);
                        //$b->add(CiregingPeer::FECING,$cobtransa->getFectra());
                        $reg= CiregingPeer::doSelectOne($b);
                        if (!$reg)
                        {
                          self::grabarIngreso($cobtransa,$reffac,$x[$j]->getMonpag(),$x[$j]->getMonrec(),$x[$j]->getMondes(),$grid2);
                          self::grabarImping($cobtransa,$reffac,$x[$j]->getMonpag(),$x[$j]->getMonrec(),$x[$j]->getMondes());
                        }else {
                          $reg->setStarec('S');
                          $reg->setFecrec($cobtransa->getFectra());
                          if ($reg1->getGenmov()=='S' && $y[$i]->getCodban()!="")
                           {
                             $reg->setTipmov($y[$i]->getCodtip());
                             $reg->setCtaban($y[$i]->getCodban());               
                           }
                          if ($y[$i]->getCodtip()!="")
                          {                       
                           $reg->setNumdep($y[$i]->getCodtip().'-'.$y[$i]->getNumide2());
                          }else {
                            $reg->setNumdep($y[$i]->getNumide2());
                          }
                          $reg->setFecdep($cobtransa->getFectra());
                          $reg->save();
                       }
                     }
                   }
                  }
                $i++;
               }   
              }                     
            }
		  	  }
		  	}
		  	$j++;
		  }
	  }
    }


  public static function grabarIngreso($cobtransa,$reffac,$monpag,$monrec,$mondes,$grid2)
  {
     $r= new Criteria();
     $r->add(CiregingPeer::REFING,$reffac);
     //$r->add(CiregingPeer::FECING,$cobtransa->getFectra());
     $reg= CiregingPeer::doSelectOne($r);
     if (!$reg)
     {
       $cireging= new Cireging();
       $cireging->setRefing($reffac);
       $codtip=H::getX_vacio('CODEMP','Cidefniv','CODTIP','001');
       if ($codtip=='')
         $codtip='FAC';
       $cireging->setCodtip($codtip);
       $cireging->setFecing($cobtransa->getFectra());
       $cireging->setAnoing(substr($cobtransa->getFectra(),0,4));
       $cireging->setDesing($cobtransa->getDestra());

       /*$a= new Criteria();
       $a->add(FaclientePeer::RIFPRO,$cobtransa->getCodcli());
       $regi= FaclientePeer::doSelectOne($a);
       if ($regi)
       { $cireging->setRifcon($regi->getCodcli()); }
       else { */$cireging->setRifcon($cobtransa->getRifpro()); //}
       $cireging->setDesanu(null);
       $cireging->setMoning($monpag);
       $cireging->setMonrec($monrec);
       $cireging->setMondes($mondes);
       $cireging->setMontot($monpag + $monrec - $mondes);

       $i=0;
       $y=$grid2[0];
       while ($i<count($y))
       {
         if ($y[$i]->getMonpag()>0) {
           $d= new Criteria();
           $d->add(FatippagPeer::ID,$y[$i]->getIdtippag());
           $reg= FatippagPeer::doSelectOne($d);
           if ($reg)
           {
             if ($reg->getGenmov()=='S' && $y[$i]->getCodban()!="")
             {
               $cireging->setTipmov($y[$i]->getCodtip());
               $cireging->setCtaban($y[$i]->getCodban());               
             }
             if ($y[$i]->getCodtip()!="")
             {                       
              $reg->setNumdep($y[$i]->getCodtip().'-'.$y[$i]->getNumide2());
             }else {
               $reg->setNumdep($y[$i]->getNumide2());
             }
           }
         }
       	$i++;
       }
       $cireging->setPrevis('S');
       $cireging->setStaing('A');
       $cireging->setStaliq('S');
       $cireging->setFecliq(H::getX_vacio('REFFAC','Fafactur','Fecfac',$reffac));
       $cireging->setStarec('S');
       $cireging->setFecrec($cobtransa->getFectra());
       $cireging->setFecdep($cobtransa->getFectra());
       $cireging->setCodmon(H::getX_vacio('REFFAC','Fafactur','Tipmon',$reffac));
       $cireging->setValmon(H::getX_vacio('REFFAC','Fafactur','Valmon',$reffac));
       $cireging->save();
     }
  }

  public static function grabarImping($cobtransa,$reffac,$monpag,$montorec,$montodes)
  {
  	$c= new Criteria();
  	$c->add(CiimpingPeer::REFING,$reffac);
  	CiimpingPeer::doDelete($c);

    $previsto=true;
    $result=array();
    $sql="SELECT SUM(A.TOTART) as monfac, SUM(A.MONRGO) as monrec FROM FAARTFAC A,CAREGART B WHERE A.REFFAC='".$reffac."' AND A.CODART=B.CODART";
    if(Herramientas :: BuscarDatos($sql, $result))
    {
      $monfac=$result[0]["monfac"];
      $monrec=$result[0]["monrec"];
    }
    $result2=array();
    $sql2="SELECT B.CODING as coding,SUM(A.MONRGO) as MONREC,SUM(A.TOTART) as MONFAC FROM FAARTFAC A,CAREGART B WHERE A.REFFAC='".$reffac."' AND A.CODART=B.CODART GROUP BY B.CODING";
    if(Herramientas :: BuscarDatos($sql2, $result2))
    {
      foreach ($result2 as $datos)
      {
         $ciimping= new Ciimping();
         $ciimping->setRefing($reffac);
         $ciimping->setFecing($cobtransa->getFectra());
         $ciimping->setCodpre($datos["coding"]);
         $monto=(($datos["monfac"]/$monfac)*$monpag);
         $ciimping->setMoning($monto);
         $ciimping->setMonrec($montorec);
         $ciimping->setMondes($montodes);
         $monto2=(($datos["monfac"]/$monfac)*$monpag - $montodes + $montorec);
         $ciimping->setMontot($monto2);
         $ciimping->setMonaju(0);
         $ciimping->setStaimp("A");
         $ciimping->save();
      }
    }
  }


  public static function generarComprobante($cobtransa,$formapagos,$recargos,$descuentos,&$msjuno,&$arrcompro)
  {
  	$refnumtra="CC".substr($cobtransa->getNumtra(),4,6);
    $numcom='########';;
    $reftra=$refnumtra;
    $codigocuenta=""; $tipo=""; $des=""; $monto="";  $codigocuentas=""; $tipo1=""; $desc="";
    $monto1=""; $codigocuenta2=""; $tipo2=""; $des2=""; $monto2=""; $cuentas=""; $tipos="";
    $montos=""; $descr=""; $msjuno="";

    $r= new Criteria();
    $r->add(FatipmovPeer::ID,$cobtransa->getFatipmovId());
    $dat= FatipmovPeer::doSelectOne($r);
    if ($dat)
    {
      $debcre=$dat->getDebcre();
      $ctacon=$dat->getCodcta();
    }

    $e= new Criteria();
    $e->add(FaclientePeer::CODPRO,$cobtransa->getCodcli());
    $dat1= FaclientePeer::doSelectOne($e);
    if ($dat1)
    {
    	$ctacli=$dat1->getCodcta();
    }
    $pagmaytra=H::getConfApp2('pagmaytra', 'cuentasxcobrar', 'cobtransa');
    if (H::toFloat($cobtransa->getTottra())>0)
      $difpag=H::toFloat($cobtransa->getMonpagado())-H::toFloat($cobtransa->getTottra());
    else $difpag=0;

    if ($debcre=='C')
    { 
      $x=$formapagos[0];
      $j=0;
      $y=0;
      if (count($x)>0)
      {
	      while ($j<count($x))
	      {
            if (H::toFloat($x[$j]->getMonpag())>0 && $x[$j]->getPagret()!='S')
            {
              if ($x[$j]->getGenmov()=='S')
              {
              	$ctacon=H::getX('NUMCUE','Tsdefban','Codcta',$x[$j]->getCodban());
              }
              if (H::toFloat($cobtransa->getTotant())>0){
                  $codigocuenta=$ctacon;
                  $tipo='D';
                  $des="";
                  if ($y==0)
                    $moncau=(H::toFloat($x[$j]->getMonpag())-H::toFloat($cobtransa->getTotant()));
                  else
                    $moncau=H::toFloat($x[$j]->getMonpag());
                  $monto=$moncau;
                  if ($y==0) {
                    $codigocuentaA=$ctacli;
                    $tipoA='D';
                    $desA="";
                    $moncauA=H::toFloat($cobtransa->getTotant());
                    $montoA=$moncauA;

                    $codigocuenta=$codigocuenta.'_'.$codigocuentaA;
                    $des=$des.'_'.$desA;
                    $tipo=$tipo.'_'.$tipoA;
                    $monto=$monto.'_'.$montoA;
                }
             }else {
                  if ($x[$j]->getGennotcre()=='S' && H::toFloat($x[$j]->getMonnotcre())>0 && $pagmaytra=='S'){
                    $ctatipmov="";
                    $c1= new Criteria();
                    $reg1=FacorrelatPeer::doSelectOne($c1);
                    if ($reg1)
                      $ctatipmov=H::getX_vacio('ID','Fatipmov','Codcta',$reg1->getFatipmovId());
                    $codigocuenta=$ctatipmov;
                    $tipo='D';
                    $des="";
                    $moncau=H::toFloat($x[$j]->getMonnotcre());
                    $monto=$moncau;
                  }else {                  
                    $codigocuenta=$ctacon;
                    $tipo='D';
                    $des="";
                    $moncau=H::toFloat($x[$j]->getMonpag());
                    $monto=$moncau;
                 }
             }
            if ($y==0)
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
	          $y++;
            }
	    	$j++;
	      }
      }

      $z=$descuentos[0];
	  $a=0;
      if (count($z)>0)
      {
	      while ($a<count($z))
	      {
            if ($z[$a]->getMondes()!="")
            {
             if (H::toFloat($z[$a]->getMondes())>0 && $z[$a]->getCoddes()!="")
             {
              $codigocuenta=$z[$a]->getCodcon();
              $tipo='D';
              $des="";
              $moncau=H::toFloat($z[$a]->getMondes());
              $monto=$moncau;

              if ($y==0)
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
	          $y++;
             }
            }
	    	$a++;
	      }
      }

      if (H::toFloat($cobtransa->getTotmonpag())>0)
      {
      	if ($pagmaytra=='S' && $difpag>0){
          $ctatipmov="";
          $c1= new Criteria();
          $reg1=FacorrelatPeer::doSelectOne($c1);
          if ($reg1)
            $ctatipmov=H::getX_vacio('ID','Fatipmov','Codcta',$reg1->getFatipmovId());
          $codigocuenta2=$ctatipmov.'_'.$ctacli;
          $tipo2='C_C';
          $des2="".'_'."";
          $b=$difpag.'_'.H::toFloat($cobtransa->getTotmonpag());
          $monto2=$b;
        }else  {
          $codigocuenta2=$ctacli;
        	$tipo2='C';
          $des2="";
          $b=H::toFloat($cobtransa->getTotmonpag());
          $monto2=$b;
        }
      }

      $y=$recargos[0];
      $l=0;
      if (count($y)>0)
      {
	      while ($l<count($y))
	      {
            if ($y[$l]->getMonrec()!="")
            {
             if (H::toFloat($y[$l]->getMonrec())>0 && $y[$l]->getCodrec()!="")
             {
              $codigocuenta=$y[$l]->getCodcta();
              $tipo='C';
              $des="";
              $moncau=H::toFloat($y[$l]->getMonrec());
              $monto=$moncau;

              if ($y==0)
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
	          $y++;
             }
            }
	      $l++;
	      }
      }
    }
    else
    {

      if (H::toFloat($cobtransa->getTotmonpag())>0)
      {
      	$codigocuenta2=$ctacli;
      	$tipo2='D';
        $des2="";
        $b=H::toFloat($cobtransa->getTotmonpag());
        $monto2=$b;
      }

      $y=$recargos[0];
	  $l=0;
	  $t=0;
      if (count($y)>0)
      {
	      while ($l<count($y))
	      {
            if ($y[$l]->getMonrec()!="")
            {
             if (H::toFloat($y[$l]->getMonrec())>0 && $y[$l]->getCodrec()!="")
             {
              $codigocuenta=$y[$l]->getCodcta();
              $tipo='D';
              $des="";
              $moncau=H::toFloat($y[$l]->getMonrec());
              $monto=$moncau;

              if ($t==0)
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
	          $t++;
             }
            }
	      $l++;
	      }
      }

      $x=$formapagos[0];
      $j=0;
      $t=0;
      if (count($x)>0)
      {
          while ($j<count($x))
	      {
            if (H::toFloat($x[$j]->getMonpag())>0)
            {
              if (H::toFloat($cobtransa->getTotant())>0){
                  $codigocuenta=$ctacon;
                  $tipo='C';
                  $des="";
                  if ($t==0)
                    $moncau=(H::toFloat($x[$j]->getMonpag())-H::toFloat($cobtransa->getTotant()));
                  else
                    $moncau=H::toFloat($x[$j]->getMonpag());
                  $monto=$moncau;
                  if ($t==0) {
                    $codigocuentaA=$ctacli;
                    $tipoA='C';
                    $desA="";
                    $moncauA=H::toFloat($cobtransa->getTotant());
                    $montoA=$moncauA;

                    $codigocuenta=$codigocuenta.'_'.$codigocuentaA;
                    $des=$des.'_'.$desA;
                    $tipo=$tipo.'_'.$tipoA;
                    $monto=$monto.'_'.$montoA;
                }
             }else {
              $codigocuenta=$ctacon;
              $tipo='C';
              $des="";
              $moncau=H::toFloat($x[$j]->getMonpag());
              $monto=$moncau;
            }

    		      if ($t==0)
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
		      $t++;
            }
	    	$j++;
	      }
      }

      $z=$descuentos[0];
      $a=0;
      if (count($z)>0)
      {
	      while ($a<count($z))
	      {
            if ($z[$a]->getMondes()!="")
            {
             if (H::toFloat($z[$a]->getMondes())>0 && $z[$a]->getCoddes()!="")
             {
              $codigocuenta=$z[$a]->getCodcon();
              $tipo='C';
              $des="";
              $moncau=H::toFloat($z[$a]->getMondes());
              $monto=$moncau;

              if ($t==0)
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
	          $t++;
             }
            }
	    	$a++;
	      }
      }
    }

    $cuentas=$codigocuenta2.'_'.$codigocuentas;
    $descr=$des2.'_'.$desc;
    $tipos=$tipo2.'_'.$tipo1;
    $montos=$monto2.'_'.$monto1;

	$clscommpro=new Comprobante();
	$clscommpro->setGrabar("N");
	$clscommpro->setNumcom($numcom);
	$clscommpro->setReftra($reftra);
	$clscommpro->setFectra(date("d/m/Y",strtotime($cobtransa->getFectra())));
	$clscommpro->setDestra($cobtransa->getDestra());
	$clscommpro->setCtas($cuentas);
	$clscommpro->setDesc($descr);
	$clscommpro->setMov($tipos);
	$clscommpro->setMontos($montos);
	$arrcompro[]=$clscommpro;
  }

  public static function verificarHijos($numtra,&$msj)
  {
  	$msj="";
    $a= new Criteria();
    $a->add(CobtransaPeer::NUMTRA,$numtra);
    $resul= CobtransaPeer::doSelectOne($a);
    if ($resul)
    {
      $snumcom=$resul->getNumcom();
      $sfeccom=$resul->getFeccom();
    }

    $b= new Criteria();
    $b->add(CobdetforPeer::NUMTRA,$numtra);
    $reg= CobdetforPeer::doSelect($b);
    if ($reg)
    {
      foreach ($reg as $obj)
      {
      	$val=strlen($obj->getNumide());
        $longitud=explode('-', $obj->getNumide());                 

        $c= new Criteria();
        $c->add(TsmovlibPeer::NUMCUE,$obj->getCodban());
        $c->add(TsmovlibPeer::REFLIB,$longitud[1]);
        $c->add(TsmovlibPeer::TIPMOV,$longitud[0]);
        $data= TsmovlibPeer::doSelectOne($c);
        if ($data)
        {
          if ($data->getStacon()=='C')
          {
          	$hayrelpag=true;
          	$msj="No se Puede Eliminar o Anular esta Transacción porque el Movimiento segun libro Asociado Conciliado";
            return true;

          }
        }
      }
    }

    $e= new Criteria();
    $e->add(ContabcPeer::NUMCOM,$snumcom);
    $e->add(ContabcPeer::FECCOM,$sfeccom);
    $registro= ContabcPeer::doSelectOne($e);
    if ($registro)
    {
      if ($registro->getStacom()=='A')
      {
        $msj="No Puede Anular o Eliminar la Transacción ya que el Comprobante Contable está actualizado";
        return true;
      }
    }
  return false;
  }

  public static function eliminarIngreso($refdoc,$fectra)
  {
     $r= new Criteria();
     $r->add(CiregingPeer::REFING,$refdoc);
     $r->add(CiregingPeer::FECING,$fectra);
     $reg= CiregingPeer::doSelectOne($r);
     if ($reg)
     {
     	$t= new Criteria();
 	    $t->add(CiimpingPeer::REFING,$refdoc);
 	    $t->add(CiimpingPeer::FECING,$fectra);
 	    CiimpingPeer::doDelete($t);

    	$reg->delete();

     }
  }

  public static function actualizaTransacion($numtra,$fectra,$codcli)
  {
  	$g= new Criteria();
  	$g->add(CobdettraPeer::NUMTRA,$numtra);
  	$datos= CobdettraPeer::doSelect($g);
  	if ($datos)
  	{
      foreach ($datos as $objdat)
      {
        $f= new Criteria();
        $f->add(CobdocumePeer::REFDOC,$objdat->getRefdoc());
        $f->add(CobdocumePeer::CODCLI,$codcli);
        $regi = CobdocumePeer::doSelectOne($f);
        if ($regi)
        {
          $reffac=$regi->getReffac();
          $regi->setSaldoc($regi->getSaldoc() + $objdat->getMonpag());
          $regi->setAbodoc($regi->getAbodoc() - $objdat->getMonpag());
          $regi->save();
          if ($reffac=='')
            Cuentasxcobrar::eliminarIngreso($reffac,$fectra);
        }
        
      }
  	}
  }

  public static function anularComprobante($numcom,$feccom,$fecanu)
  {
     $d= new Criteria();
     $d->add(ContabcPeer::NUMCOM,$numcom);
     $d->add(ContabcPeer::FECCOM,$feccom);
     $regi= ContabcPeer::doSelectOne($d);
     if ($regi)
     {
     	$numcomnew=Comprobante::Buscar_Correlativo($fecanu);
     	$contabc= new Contabc();
     	$contabc->setNumcom($numcomnew);
     	$contabc->setReftra("RC".substr($numcom,2,6));
     	$contabc->setFeccom($fecanu);
     	$contabc->setDescom($regi->getDescom());
     	$contabc->setStacom('D');
     	$contabc->setTipcom(null);
     	$contabc->setMoncom($regi->getMoncom());
        $contabc->save();

         $e= new Criteria();
	     $e->add(Contabc1Peer::NUMCOM,$numcom);
	     $e->add(Contabc1Peer::FECCOM,$feccom);
	     $regi2= Contabc1Peer::doSelect($e);
	     if ($regi2)
	     {
	     	foreach ($regi2 as $datos)
	     	{
	          	$contabc1= new Contabc1();
		     	$contabc1->setNumcom($numcomnew);
		     	$contabc1->setFeccom($fecanu);
		     	$contabc1->setCodcta($datos->getCodcta());
		     	$contabc1->setNumasi($datos->getNumasi());
		     	$contabc1->setRefasi($datos->getRefasi());
		     	$contabc1->setDesasi($datos->getDesasi());
		     	if ($datos->getDebcre()=='C')
		     	{
		     	  $contabc1->setDebcre('D');
		     	}
		     	else $contabc1->setDebcre('C');
		     	$contabc1->setMonasi($datos->getMonasi());
		        $contabc1->save();
	     	}
	     }
     }
  }

  public static function anularMovlib($numtra,$fecanu)
  {
    $a= new Criteria();
    $a->add(CobdetforPeer::NUMTRA,$numtra);
    $resultados= CobdetforPeer::doSelect($a);
    if ($resultados)
    {
      foreach ($resultados as $objeto)
      {
        $longitud=explode('-', $objeto->getNumide());
        $val=strlen($objeto->getNumide());
      	$sreflib=$longitud[1];//substr($objeto->getNumide(),5,$val);

        $c= new Criteria();
        $c->add(TsmovlibPeer::NUMCUE,$objeto->getCodban());
        $c->add(TsmovlibPeer::REFLIB,$longitud[1]);
        $c->add(TsmovlibPeer::TIPMOV,$longitud[0]);
        $data= TsmovlibPeer::doSelectOne($c);
        if ($data)
        {
          $scodtip=$data->getTipmov();
          $smonmov=$data->getMonmov();
          $pcodcta=$data->getCodcta();
          $codmon=$data->getCodmon();
          $valmon=$data->getValmon();
          $debcre=H::getX('Codtip','Tstipmov','Debcre',$scodtip);
          Tesoreria::actualiza_Bancos('E', $debcre, $objeto->getCodban(),$smonmov);
          $afecta=$debcre;

          $tsmovlib = new Tsmovlib();
    		  $tsmovlib->setRefpag(null);
    		  $tsmovlib->setNumcue($objeto->getCodban());
    		  $tsmovlib->setReflib("A".substr($sreflib,1,7));
    		  $tsmovlib->setFeclib($fecanu);
    		  if ($afecta=='C')
    		  $tsmovlib->setTipmov("ANUC");
    		  else if ($afecta=='D') $tsmovlib->setTipmov("ANUD");
    		  $tsmovlib->setDeslib('Deposito Anulado');
    		  $tsmovlib->setMonmov($smonmov);
    		  $tsmovlib->setCodcta($pcodcta);
    		  $tsmovlib->setNumcom("A".substr($data->getNumcom(),1,7));
    		  $tsmovlib->setFeccom($fecanu);
    		  $tsmovlib->setStatus("C");
    		  $tsmovlib->setStacon("C");
    		  $tsmovlib->setCodmon($codmon);
    		  $tsmovlib->setValmon($valmon);
    		  $tsmovlib->setReflibpad($sreflib);
    		  $tsmovlib->setTipmovpad($scodtip);
    		  $tsmovlib->save();
        }
      }
    }
  }

  public static function grabarDetallesForpag($cobtransa,$grid2,$grid5)
  {
  	  $a= new Criteria();
      $a->add(CobdetforPeer::NUMTRA,$cobtransa->getNumtra());
      CobdetforPeer::doDelete($a);

      $pagmaytra=H::getConfApp2('pagmaytra', 'cuentasxcobrar', 'cobtransa');
      if ($cobtransa->getTottra()>0)
       $difpag=H::toFloat($cobtransa->getMonpagado())-H::toFloat($cobtransa->getTottra());
     else
      $difpag=0;

      $x=$grid2[0];
	  $j=0;

	  if (count($x)>0)
	  {
		  while ($j<count($x))
		  {

		  	if ($x[$j]->getMonpag()>0)
		  	{
              $cobdetfor= new Cobdetfor();
              $cobdetfor->setNumtra($cobtransa->getNumtra());
              $cobdetfor->setCodcli($cobtransa->getCodcli());
              $cobdetfor->setCorrel($j+1);
              $cobdetfor->setFatippagId($x[$j]->getIdtippag());
              if ($x[$j]->getCodtip()!="")
              {                       
                $cobdetfor->setNumide($x[$j]->getCodtip().'-'.$x[$j]->getNumide2());
                //$cobdetfor->setNumide($x[$j]->getCodtip().$x[$j]->getNumide2());
              }else {
              	$cobdetfor->setNumide($x[$j]->getNumide2());
              }
              $cobdetfor->setCodban($x[$j]->getCodban());
              $cobdetfor->setMonpag($x[$j]->getMonpag());
              $cobdetfor->setNotcres($x[$j]->getNotcres());
              $cobdetfor->save();

              $n= new Criteria();
              $n->add(FatippagPeer::ID,$x[$j]->getIdtippag());
              $record= FatippagPeer::doSelectOne($n);
              if ($record)
              {
              	if ($record->getGenmov()=='S')
              	{
                  $desocp=$cobtransa->getDestra();
                  $montoop=$x[$j]->getMonpag();
                  $numreflib=$x[$j]->getNumide2();
                  $comprob=$cobtransa->getNumcom();
                 self::generaMovlibTransacciones($x[$j]->getCodban(),$numreflib,$cobtransa->getFectra(),$x[$j]->getCodtip(),$desocp,$montoop,$comprob);
              	}                
              }

              if ($x[$j]->getGennotcre()=='S' && $pagmaytra=='S'){
                 if ($x[$j]->getNotcres()!='')
                 {
                    $cadenanc=split('!',$x[$j]->getNotcres());
                    $r=0;
                    while ($r<(count($cadenanc)-1))
                    {
                      $aux=$cadenanc[$r];
                      $aux2=split('_',$aux);
                      if ($aux2[0]!="")
                      {
                         $qt= new Criteria();
                         $qt->add(CobdocumePeer::REFDOC,$aux2[0]);
                         $regqt= CobdocumePeer::doSelectOne($qt);
                         if ($regqt){
                           $regqt->setAbodoc($regqt->getAbodoc()+H::toFloat($aux2[1]));
                           $regqt->setSaldoc($regqt->getSaldoc()-H::toFloat($aux2[1]));
                           $regqt->save();
                         }
                      }
                      $r++;
                    }//while
                 }//if ($x[$j]->getGennotcre()!="")
              }

              if ($x[$j]->getGendetche()=='S'){
                self::grabarDetallesCheque($cobtransa,$grid5,$cobdetfor->getId());
              }
		  	}

		  $j++;
		  }

      if ($pagmaytra=='S' &&  $difpag>0){
        self::generarNotaCredito($cobtransa,$difpag);
      }
	  }
  }

  public static function generaMovlibTransacciones($numcue,$numreflib,$fectra,$tipmov,$desocp,$montoop,$comprob)
  {

    $result=array();
    $criterio = "Select * From TSMOVLIB Where NumCue = '".$numcue."' AND RefLib = '".$numreflib."'AND tipmov = '".$tipmov."'";
    if (!Herramientas::BuscarDatos($criterio,$result))
    {
      $tsmovlib = new Tsmovlib();
      $tsmovlib->setRefpag(null);
      $tsmovlib->setNumcue($numcue);
      $tsmovlib->setReflib($numreflib);
      $tsmovlib->setFeclib($fectra);
      $tsmovlib->setTipmov($tipmov);
      $tsmovlib->setDeslib($desocp);
      //$CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$numcue);
      $tsmovlib->setMonmov($montoop);
      //$tsmovlib->setCodcta($CtaBan);
      $tsmovlib->setNumcom($comprob);
      $tsmovlib->setFeccom($fectra);
      $tsmovlib->setStatus("C");
      $tsmovlib->setStacon("N");
      $tipmon=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      $tsmovlib->setCodmon($tipmon);
      $q= new Criteria();
      $q->add(TsdesmonPeer::CODMON,$tipmon);
      $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
      $reg2= TsdesmonPeer::doSelectOne($q);
      if ($reg2)
        $valmon=$reg2->getValmon();
      else $valmon=1;      
      $tsmovlib->setValmon($valmon);
      $tsmovlib->save();
    }
    else
    {
      $mensaje="El Movimiento Según Libro ya ha Sido Grabado";
    }
  }

  public static function eliminarMovlibTrassacion($numtra)
  {
  	$q= new Criteria();
  	$q->add(CobdetforPeer::NUMTRA,$numtra);
  	$resul= CobdetforPeer::doSelect($q);
  	if ($resul)
  	{
  		foreach ($resul as $obj)
  		{
	      $val=strlen($obj->getNumide());
              $longitud=explode('-', $obj->getNumide());                 

	      $c= new Criteria();
	      $c->add(TsmovlibPeer::NUMCUE,$obj->getCodban());
	      $c->add(TsmovlibPeer::REFLIB,$longitud[1]);//substr($obj->getNumide(),4,$val));
	      $c->add(TsmovlibPeer::TIPMOV,$longitud[0]);//substr($obj->getNumide(),0,4));
	      $data= TsmovlibPeer::doSelectOne($c);
	      if ($data)
	      {
            $scodtip=$data->getTipmov();
            $smonmov=$data->getMonmov();
            $data->delete();
            $debcre=H::getX('Codtip','Tstipmov','Debcre',$scodtip);
            Tesoreria::actualiza_Bancos('E', $debcre, $obj->getCodban(),$smonmov);
	      }
  		}
  	}
  }

  public static function anularDocumento($refdoc,$fecanu,$desanu)
  {
  	$q= new Criteria();
  	$q->add(CobdocumePeer::REFDOC,$refdoc);
  	$datos= CobdocumePeer::doselectOne($q);
  	if ($datos)
  	{
  	  $datos->setDesanu($desanu);
  	  $datos->setFecanu($fecanu);
  	  $datos->setStadoc('N');
  	  $datos->save();

      //Actualizar Documento Afectado Crédito
      if ($datos->getRefdocnc()!='')
      {
          $q1= new Criteria();
          $q1->add(CobdocumePeer::REFDOC,$datos->getRefdocnc());
          $q1->add(CobdocumePeer::CODCLI,$datos->getCodcli());
          $regq= CobdocumePeer::doSelectOne($q1);
          if ($regq){
            $regq->setAbodoc($regq->getAbodoc() - $datos->getSaldoc());
            $regq->setSaldoc($regq->getSaldoc() + $datos->getSaldoc());
            $regq->save();
          }
      }
      //Actualizar Documento Afectado Débito
      if ($datos->getRefdocnd()!='')
      {
          $q1= new Criteria();
          $q1->add(CobdocumePeer::REFDOC,$datos->getRefdocnd());
          $q1->add(CobdocumePeer::CODCLI,$datos->getCodcli());
          $regq= CobdocumePeer::doSelectOne($q1);
          if ($regq){
            $regq->setAbodoc($regq->getAbodoc() - $datos->getSaldoc());
            $regq->setSaldoc($regq->getSaldoc() + $datos->getSaldoc());
            $regq->save();
          }
      }
  	}
  }

  public static function anularComprobanteDoc($numcom,$fecanu)
  {
     $d= new Criteria();
     $d->add(ContabcPeer::NUMCOM,$numcom);
     $regi= ContabcPeer::doSelectOne($d);
     if ($regi)
     {
     	$numcomnew=Comprobante::Buscar_Correlativo($fecanu);
     	$contabc= new Contabc();
     	$contabc->setNumcom($numcomnew);
     	$contabc->setReftra("RE".substr($numcom,2,6));
     	$contabc->setFeccom($fecanu);
     	$contabc->setDescom($regi->getDescom());
     	$contabc->setStacom('D');
     	$contabc->setTipcom(null);
     	$contabc->setMoncom($regi->getMoncom());
        $contabc->save();

         $e= new Criteria();
	     $e->add(Contabc1Peer::NUMCOM,$numcom);
	     $regi2= Contabc1Peer::doSelectOne($d);
	     if ($regi2)
	     {
	     	foreach ($regi2 as $datos)
	     	{
	          	$contabc1= new Contabc1();
		     	$contabc1->setNumcom($numcomnew);
		     	$contabc1->setFeccom($fecanu);
		     	$contabc1->setCodcta($datos->getCodcta());
		     	$contabc1->setNumasi($datos->getNumasi());
		     	$contabc1->setRefasi($datos->getRefasi());
		     	$contabc1->setDesasi($datos->getDesasi());
		     	if ($datos->getDebcre()=='C')
		     	{
		     	  $contabc1->setDebcre('D');
		     	}
		     	else $contabc1->setDebcre('C');
		     	$contabc1->setMonasi($datos->getMonasi());
		        $contabc1->save();
	     	}
	     }
     }
  }
  

 public static function ActualizarDocumentoCliente($codcli)
 {

  $e= new Criteria();
  $e->add(CobtransaPeer::CODCLI,$codcli);
  $e->add(CobtransaPeer::STATUS,'N',Criteria::NOT_EQUAL);
  $e->addJoin(CobdettraPeer::NUMTRA,CobtransaPeer::NUMTRA);
  $result2= CobdettraPeer::doSelect($e);
  if ($result2) {
    foreach ($result2 as $obj) {
       $sql1="Update cobdocume set abodoc=coalesce(pagos.MONpag,0)
        from (select a.refdoc,a.codcli,sum(a.MONpag) as MONpag from cobdettra a, cobtransa b where a.numtra=b.numtra and b.status!='N' group by a.refdoc,a.codcli) pagos
        where pagos.refdoc=cobdocume.refdoc and
        pagos.codcli=cobdocume.codcli and cobdocume.refdoc='".$obj->getRefdoc()."' and
        cobdocume.codcli='".$codcli."'";
      Herramientas::insertarRegistros($sql1);
      
      $sql2="UPDATE COBDOCUME SET SALDOC=((MONDOC-DSCDOC)+RECDOC)-ABODOC WHERE codcli='".$codcli."' and refdoc='".$obj->getRefdoc()."'";
      Herramientas::insertarRegistros($sql2);  
    }

   
  }  
 }
  
 public static function ActualizaComprobante($cobtransa)
 {
   $c= new Criteria();
   $c->add(ContabcPeer::NUMCOM,$cobtransa->getNumcom());
   $resulcom= ContabcPeer::doSelectOne($c);
   if ($resulcom)
   {
     $resulcom->setReftra("CC".substr($cobtransa->getNumtra(),4,6));
     $resulcom->save();

      $q= new Criteria();
      $q->add(Contabc1Peer::NUMCOM,$cobtransa->getNumcom());
      $resulcomq= Contabc1Peer::doSelect($q);
      if ($resulcomq)
      {
        foreach ($resulcomq as $objq) {
          $objq->setRefasi("CC".substr($cobtransa->getNumtra(),4,6));
          $objq->save();
        }
      }
   }
 }

 public static function generarNotaCredito($cobtransa,$difpag){
    $c1= new Criteria();
    $reg1=FacorrelatPeer::doSelectOne($c1);
    if ($reg1)
      $tipmov=$reg1->getFatipmovId();
    else  $tipmov="";
    if ($tipmov!='') {
      $c2= new Criteria();
      $c2->add(CobdocumePeer::REFDOC,$cobtransa->getNumtra());
      $reg2= CobdocumePeer::doSelectOne($c2);
      if ($reg2)
      {
           $t= new Criteria();
           $t->setLimit(1);
           $t->addDescendingOrderByColumn(CobdocumePeer::REFDOC);
           $reg3= CobdocumePeer::doSelectOne($t);
           if ($reg3)
           {
               $refdoc=str_pad(($reg3->getRefdoc()+1),10,'0',STR_PAD_LEFT);
           }
      }else $refdoc=$cobtransa->getNumtra();
      $cobdocume= new Cobdocume();      
      $cobdocume->setRefdoc($refdoc);
      $cobdocume->setCodcli($cobtransa->getCodcli());
      $cobdocume->setFatipmovId($tipmov);
      $cobdocume->setFecemi($cobtransa->getFectra());
      $fecven=H::dateAdd('m',1,$cobtransa->getFectra(),'+');
      $cobdocume->setFecven($fecven);
      $cobdocume->setOridoc('TRA');
      $cobdocume->setDesdoc($cobtransa->getDestra());
      $cobdocume->setMondoc($difpag);
      $cobdocume->setRecdoc(0);
      $cobdocume->setDscdoc(0);
      $cobdocume->setAbodoc(0);      
      $cobdocume->setSaldoc($difpag);
      $cobdocume->setStadoc('A');
      $cobdocume->setReffac(substr($refdoc,3,8));
      $cobdocume->setReftra($cobtransa->getNumtra());
      $cobdocume->setNumcom($cobtransa->getNumcom());
      $cobdocume->setFeccom($cobtransa->getFecfac());
      $cobdocume->save();
    }
 }

  public static function MontoTotalPagado($cobtransa)
  {
    $acum=0;
    $a= new Criteria();
    $a->add(CobdetforPeer::NUMTRA,$cobtransa->getNumtra());
    $reg= CobdetforPeer::doSelect($a);
    if ($reg){
      foreach ($reg as $obj) {
        $acum+=$obj->getMonpag();
      }
    }
    return $acum;
  } 

  public static function buscarTransNotCre($numtra){
    $u= new Criteria();
    $u->add(CobtransaPeer::NUMTRA,$numtra,Criteria::NOT_EQUAL);
    $u->add(CobtransaPeer::STATUS,'N',Criteria::NOT_EQUAL);
    $u->addJoin(CobdetforPeer::NUMTRA,CobtransaPeer::NUMTRA);
    $resulu= CobdetforPeer::doSelect($u);
    if ($resulu)
    {
      foreach ($resulu as $obju) {        
       if ($obju->getNotcres()!='')
       {
          $cadenanc=split('!',$obju->getNotcres());
          $r=0;
          while ($r<(count($cadenanc)-1))
          {
            $aux=$cadenanc[$r];
            $aux2=split('_',$aux);
            if ($aux2[0]!="")
            {
               $qt= new Criteria();
               $qt->add(CobdocumePeer::REFDOC,$aux2[0]);
               $regqt= CobdocumePeer::doSelectOne($qt);
               if ($regqt){
                 return true;
               }
            }
            $r++;
          }//while
       }//$obju->getNotcres()
      }
    }
    return false;
  }

   public static function grabarDetallesCheque($cobtransa,$grid5,$id)
  {
    $x=$grid5[0];
    $j=0;
    if (count($x)>0)
    {
      while ($j<count($x))
      {
        if ($x[$j]->getMonche()>0)
        {
          $x[$j]->setNumtra($cobtransa->getNumtra());            
          $x[$j]->setCobdetforId($id); 
          $x[$j]->save();
        }
        $j++;
      }
    }

    $z=$grid5[1];
    $j=0;
    if (!empty($z[$j]))
    {
      while ($j<count($z))
      {
          $z[$j]->delete();
          $j++;
      }
    }
  }

  public static function RegistrarComprobantesDescuentos($cobtransa,$grid1,$grid4){
    $x=$grid1[0];
    $j=0;
    if (count($x)>0)
    {
      while ($j<count($x))
      {
        if ($x[$j]->getMondsc()>0)
        {
          $auxdescuento=$x[$j]->getMondsc();
        }

        if ($auxdescuento>0)
        {
          self::ActualizarComprobantesDescuentos($cobtransa,$x[$j]->getRefdoc(),$grid4);
        }

        $j++;
      }
  }
}

    public static function ActualizarComprobantesDescuentos($cobtransa,$refdoc,$descuentos)
    {
       $z=$descuentos[0];
       $l=0;
       if (count($z)>0)
       {
         while ($l<count($z))
         {
           if ($z[$l]->getNumcomret()!="" && $z[$l]->getRefdoc()==$refdoc && $z[$l]->getFeccomret()!="")
           {
            $z[$l]->save();
           }
          $l++;
         }
       }
    }

  public static function TraDocPenPag($empresa)
  {
    $codorigen='SIMA'.$empresa->getCodemp();
    $coddestino='SIMA'.$empresa->getCodempdes();
    $anno=Autenticacion::anoPeriodo($coddestino);
    $anoperiodo=substr($anno,-2);

    $sql0='select * from "'.$codorigen.'".contaba1 Where pereje=\'12\' and status=\'C\'';
    if (Herramientas::BuscarDatos($sql0, $result0)) {

      $sql='select * from "'.$codorigen.'".Cobdocume Where tradoc is null and saldoc>0';
      if (Herramientas::BuscarDatos($sql, $result)) {
        $i=0;
        while ($i<count($result)) {
          $refdoc=$result[$i]["refdoc"];

          $sql5='Delete from "'.$coddestino.'".Cobdocume where refdoc=\''.$refdoc.'\'';
          Herramientas::insertarRegistros($sql5);

          $sql6='Delete from "'.$coddestino.'".Cobrecdoc where refdoc=\''.$refdoc.'\'';
          Herramientas::insertarRegistros($sql6);

          $sql7='Delete from "'.$coddestino.'".Cobdesdoc where refdoc=\''.$refdoc.'\'';
          Herramientas::insertarRegistros($sql7);

          
          $fecini=$anno."-01-01";
          $feccie=$anno."-01-31";
          $desdoc="SALDO INICIAL AL ".date('d/m/Y',strtotime($fecini));

          $sql8='Insert into "'.$coddestino.'".Cobdocume Select refdoc,codcli,\''.$fecini.'\',\''.$feccie.'\',\'SIN\',\''.$desdoc.'\',mondoc,recdoc,dscdoc,abodoc,saldoc,desanu,
          fecanu,stadoc,numcom,feccom,reffac,fatipmov_id From "'.$codorigen.'".Cobdocume where refdoc=\''.$refdoc.'\'';
          Herramientas::insertarRegistros($sql8);

          $sql9='Insert into "'.$coddestino.'".Cobrecdoc Select refdoc,codcli,codrec,fecrec,monrec  From "'.$codorigen.'".Cobrecdoc where refdoc=\''.$refdoc.'\'';
          Herramientas::insertarRegistros($sql9);

          $sql10='Insert Into "'.$coddestino.'".Cobdesdoc Select refdoc,codcli,coddes,fecdes,mondes From "'.$codorigen.'".Cobdesdoc Where refdoc=\''.$refdoc.'\'';
          Herramientas::insertarRegistros($sql10);   
          
          $sql1='update "'.$codorigen.'".cobdocume set tradoc=\'S\' where refdoc=\''.$refdoc.'\'';
          Herramientas::insertarRegistros($sql1);

        $i++;
      }
    }
  }else return 1809;

    return -1; 
  }

  }
?>
