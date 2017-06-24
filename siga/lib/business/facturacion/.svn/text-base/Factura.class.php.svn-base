<?php
/**
 * Factura: Clase estática para el manejo de las facturas
 *
 * @package    Roraima
 * @subpackage facturacion
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Factura.class.php 38960 2010-06-15 19:04:48Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Factura {

  public static function salvarFactura($fafactur,$grid1,$grid3,$tipocaja,&$msj,&$msj2,&$msj3,$grid6)
  {
     $msj=-1;
     $msj2=-1;
     $nuevo=$fafactur->getId();
     $actreffac=$fafactur->getReffac();
    if ($fafactur->getIncluircliente()=='S')
    {
      $facliente= new Facliente();
      $facliente->setCodpro($fafactur->getRifpro());
      $facliente->setRifpro($fafactur->getRifpro());
      $facliente->setNompro($fafactur->getNompro());
      if ($fafactur->getTelpro()!="") $facliente->setTelpro($fafactur->getTelpro());
      if ($fafactur->getDirpro()!="") $facliente->setDirpro($fafactur->getDirpro());
      $facliente->setTipper($fafactur->getTipper());
      $facliente->save();
    }
    $r=0;
    if ($nuevo=="")
    {        
        $rancorcaj=H::getConfApp2('rancorcaj', 'facturacion', 'fafactur');
        if ($fafactur->getReffac()=="" || $fafactur->getReffac()=="########") {
        $c = new Criteria();
        $c->add(FadefcajPeer :: ID, sfContext::getInstance()->getUser()->getAttribute('clavecaja', null, 'fafactur')); //$this->getUser()->getAttribute('clavecaja', null, 'fafactur'));
        $reg = FadefcajPeer :: doSelectOne($c);
        if ($reg) {
          if ($rancorcaj=='S')
          {
            $p= new Criteria();
            $p->add(FarancorcajPeer::CODCAJ,$reg->getId());
            $p->add(FarancorcajPeer::ACTIVO,true);
            $trajo= FarancorcajPeer::doSelectOne($p);
            if ($trajo)
            {
               if ($trajo->getCoract()==0)
               {
                 $correl = str_pad($trajo->getCordes(), 8, '0', STR_PAD_LEFT);
                 $fafactur->setReffac($correl);      
                 $trajo->setCoract($trajo->getCordes()+1);
               }else {
                 if ($trajo->getCoract()<$trajo->getCorhas()) {
                   $correl = str_pad($trajo->getCoract(), 8, '0', STR_PAD_LEFT);
                   $fafactur->setReffac($correl);      
                   $trajo->setCoract($trajo->getCoract()+1);
                }else {
                  if ($trajo->getCoract()==$trajo->getCorhas()) {
                    $correl = str_pad($trajo->getCoract(), 8, '0', STR_PAD_LEFT);
                    $fafactur->setReffac($correl);                          
                    $trajo->setActivo(null);
                  }
                }
               }
               $trajo->save();
            }
          }else {
              $r = $reg->getSeccaj();
              $correl = str_pad($r, 8, '0', STR_PAD_LEFT);
              $fafactur->setReffac($correl);          
          }
        }
        }
    }

    /*if (!self::grabarComprobanteOrden(&$fafactur,$grid1,&$msj))
    {
      $fafactur->setReffac($actreffac);
      return true;
    }*/

    /*if ($fafactur->getTipref()=='VC')
    {
      if (!self::grabarComprobanteInv(&$fafactur,$grid1,&$msj2))
      {
        $fafactur->setReffac($actreffac);
      	return true;
      }
    } */   
    $gencomext=H::getConfApp2('gencomext', 'facturacion', 'fafactur');
    $nogencomp=H::getConfApp2('nogencomp', 'facturacion', 'fafactur');
    $msj3=-1;
    if ($gencomext!='S') {
      if ($nogencomp!="S") {
        if (!self::generarAsientos($fafactur,$grid1,$grid3,$arrasientos,$pos,$msj3))
        {
          $fafactur->setReffac($actreffac);
          return true;
        }    

        self::grabarComprobanteMaestro($fafactur,$arrasientos,$pos);    
      }
    }else {
        $t= new Criteria();
        $t->add(ContabcPeer::NUMCOM,$fafactur->getNumcom());
        $refg=ContabcPeer::doSelectOne($t);
        if ($refg)
        {
            $refg->setReftra("FA".substr($fafactur->getReffac(),2,6));
            $refg->save();
            
            $t1= new Criteria();
            $t1->add(Contabc1Peer::NUMCOM,$fafactur->getNumcom());
            $refg1= Contabc1Peer::doSelect($t1);
            if ($refg1)
            {
                foreach ($refg1 as $objref)
                {
                   $objref->setRefasi("FA".substr($fafactur->getReffac(),2,6));
                   $objref->save(); 
                }
            }
        }
    }

    self::grabarFactura($fafactur,$grid1,$grid3,$tipocaja);

    $usalib=H::getConfApp2('gridfaclib', 'facturacion', 'fafactur');
    if ($usalib=='S')
    {
        if ($nuevo=="")
        {
            self::generaFacturaLibro($fafactur,$grid1,$grid4);
        }
        self::grabarFacturaLibro($fafactur,$grid6);
    }

    if ($fafactur->getTipconpag()=='R') //Pago a Crédito
    {
      self::documentoXCobrar($fafactur);
      self::recargosXCobrar($fafactur,$grid1);
      self::descuentoXCobrar($fafactur,$grid1);
    }
    $geningreso=H::getConfApp2('geningreso', 'facturacion', 'fafactur');
    //if ($fafactur->getTipconpag()=='C') //Pago a Contado
    if ($geningreso=='S')
    {
      self::grabarIngreso($fafactur,$grid3);
      self::grabarImpIng($fafactur);
    }


    $fafactur->save();
    
    if ($nuevo=="")
    {
        $c = new Criteria();
        $c->add(FadefcajPeer :: ID, sfContext::getInstance()->getUser()->getAttribute('clavecaja', null, 'fafactur')); //$this->getUser()->getAttribute('clavecaja', null, 'fafactur'));
        $reg = FadefcajPeer :: doSelectOne($c);
        if ($reg) {
        $reg->setCorcaj($r+1);
        $reg->save();
        }
    }

    $afeinvfac=H::getConfApp2('afeinvfac', 'facturacion', 'fafactur');
    if ($afeinvfac=='S')
    {

        if (self::actualizarArticulosFactura1($fafactur,$grid1,$msjt))
        {
          self::actualizarArticulosFactura2($fafactur,$grid1);
        } 
    }    

    return true;

  }

  public static function grabarComprobanteOrden(&$fafactur,$grid1,&$msj)
  {
  	$grabarcomprobante=true;
  	$monto=0;
  	$cant=0;
  	$msj=-1;
    $col=self::determinarReferenciaDoc($fafactur->getTipref());

  	$x=$grid1[0];
    $j=0;
    while ($j<count($x))
    {
     if ($x[$j]->getPrecio()!="") { $precio=$x[$j]->getPrecio(); }
     else { $precio=$x[$j]->getPrecioe();}
     if ($x[$j]->getCodctapro()!="" || $fafactur->getTipref()=="VC")
     {
     	eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
        $monto= $monto + ($cant * $precio);
     }
     $j++;
    }

    if ($monto>0)
    {
      $numcomord="FO".substr($fafactur->getReffac(),2,6);
       $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $correl=$numcomord;
        }else {
           $correl=Comprobante::Buscar_Correlativo($fafactur->getFecfac());
        }
      $fafactur->setNumcomord($correl);

      $contabc= new Contabc();
      $contabc->setNumcom($correl);
      $contabc->setReftra($numcomord);
      $contabc->setFeccom($fafactur->getFecfac());
      if ($fafactur->getTipref()=='VC')
      {
      	$contabc->setDescom('Relación del Cliente de Mercancía Cedida en Consignación según Factura Nro. '.$fafactur->getReffac());
      }
      else
      {
        $contabc->setDescom('Venta de Mercancía a Consignación en la Factura Nro. '.$fafactur->getReffac());
      }
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setMoncom($monto);
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $contabc->setLoguse($loguse);
      $contabc->setCodtiptra(H::getX_vacio('Modtiptra', 'Cotiptra', 'Codtiptra', true));

      $numasi=0;
      if ($fafactur->getTipref()=='VC')
      {
      	$prov=$fafactur->getCodcli();
      	$cuenta=self::buscarCtaConsig('C',$prov,'P');
      	if ($cuenta!='')
      	{
      	  $numasi= $numasi +1;
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl);
          $contabc1->setFeccom($fafactur->getFecfac());
          $contabc1->setDebcre('D');
          $contabc1->setCodcta($cuenta);
          $contabc1->setNumasi($numasi);
          $contabc1->setRefasi($numcomord);
          $contabc1->setDesasi(H::getX('Codcta','Contabb','Descta',$cuenta));
          $contabc1->setMonasi($monto);

      	}
      	else
      	{
          $msj=1128;
          $grabarcomprobante=false;
          return $grabarcomprobante;
      	}

      	$cuenta2=self::buscarCtaConsig('C',$prov,'O');
      	if ($cuenta2!='')
      	{
      	   $contabc->save(); //Debido al rollback
      	   $contabc1->save(); //Debido al rollback

          $numasi= $numasi +1;
          $contabc2= new Contabc1();
          $contabc2->setNumcom($correl);
          $contabc2->setFeccom($fafactur->getFecfac());
          $contabc2->setDebcre('C');
          $contabc2->setCodcta($cuenta2);
          $contabc2->setNumasi($numasi);
          $contabc2->setRefasi($numcomord);
          $contabc2->setDesasi(H::getX('Codcta','Contabb','Descta',$cuenta2));
          $contabc2->setMonasi($monto);
          $contabc2->save();
      	}
      	else
      	{
      	  $msj=1129;
          $grabarcomprobante=false;
          return $grabarcomprobante;
      	}
      }
      else
      {
        $x=$grid1[0];
	    $j=0;
	    while ($j<count($x))
	    {
	     if ($x[$j]->getPrecio()!="") { $precio=$x[$j]->getPrecio(); }
         else { $precio=$x[$j]->getPrecioe();}
	     if ($x[$j]->getCodctapro()!="" || $fafactur->getTipref()=="VC")
	     {
	       $prov=$x[$j]->getCodctapro();
	       eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
           $monto= $monto + ($cant * $precio);
           $cuenta=self::buscarCtaConsig('P',$prov,'P');
	      	if ($cuenta!='')
	      	{
	      	  $c= new Criteria();
	      	  $c->add(Contabc1Peer::NUMCOM,$correl);
	      	  $c->add(Contabc1Peer::CODCTA,$cuenta);
	      	  $c->add(Contabc1Peer::DEBCRE,'D');
	      	  $contabc1= Contabc1Peer::doSelectOne($c);
	      	  if ($contabc1)
	      	  {
	      	  	$contabc1->setMonasi($data->getMonasi() +$monto);
	      	  }
	      	  else
	      	  {
	      	    $numasi= $numasi +1;
	            $contabc1= new Contabc1();
	            $contabc1->setNumcom($correl);
	            $contabc1->setFeccom($fafactur->getFecfac());
	            $contabc1->setDebcre('D');
	            $contabc1->setCodcta($cuenta);
	            $contabc1->setNumasi($numasi);
	            $contabc1->setRefasi($numcomord);
	            $contabc1->setDesasi(H::getX('Codcta','Contabb','Descta',$cuenta));
	            $contabc1->setMonasi($monto);
	      	  }
	      	}
	      	else
	      	{
	      	  $msj=1130;
              $grabarcomprobante=false;
              return $grabarcomprobante;
	      	}

	        $cuenta2=self::buscarCtaConsig('P',$prov,'O');
	      	if ($cuenta2!='')
	      	{
	      	  $contabc->save(); //Debido al rollback
      	      $contabc1->save(); //Debido al rollback

	      	  $c= new Criteria();
	      	  $c->add(Contabc1Peer::NUMCOM,$correl);
	      	  $c->add(Contabc1Peer::CODCTA,$cuenta2);
	      	  $c->add(Contabc1Peer::DEBCRE,'C');
	      	  $data= Contabc1Peer::doSelectOne($c);
	      	  if ($data)
	      	  {
	      	  	$data->setMonasi($data->getMonasi() +$monto);
	      	  	$data->save();
	      	  }
	      	  else
	      	  {
	      	    $numasi= $numasi +1;
	            $contabc2= new Contabc1();
	            $contabc2->setNumcom($correl);
	            $contabc2->setFeccom($fafactur->getFecfac());
	            $contabc2->setDebcre('C');
	            $contabc2->setCodcta($cuenta2);
	            $contabc2->setNumasi($numasi);
	            $contabc2->setRefasi($numcomord);
	            $contabc2->setDesasi($fafactur->getDesfac());
	            $contabc2->setMonasi($monto);
	            $contabc2->save();
	      	  }
	      	}
	      	else
	      	{
	      	  $msj=1131;
              $grabarcomprobante=false;
              return $grabarcomprobante;
	      	}
	     }
	     $j++;
	    }
      }
    }
    else
    {
      $grabarcomprobante=true;
    }

    return $grabarcomprobante;
  }

  public static function determinarReferenciaDoc($documento)
  {
    if ($documento=='V')
    {
      $colum='cantot';
    }

    if ($documento=='P' || $documento=='E')
    {
      $colum='canent';
    }

    if ($documento=='D' || $documento=='VC')
    {
      $colum='candesp';
    }
    return $colum;
  }

  public static function buscarCtaConsig($tipo,$prove,$ord_per)
  {
  	$busctasig="";
    if ($tipo=='P')
    {
      $c= new Criteria();
      $c->add(CaproveePeer::CODPRO,$prove);
      $reg= CaproveePeer::doSelectOne($c);
    }
    else
    {
      $c= new Criteria();
      $c->add(FaclientePeer::CODPRO,$prove);
      $reg= FaclientePeer::doSelectOne($c);
    }

    if ($reg)
    {
      if ($ord_per=='O')
      {
      	$busctasig=$reg->getCodordmercon();
      }else $busctasig=$reg->getCodperdmercon();

      $c= new Criteria();
      $c->add(ContabbPeer::CODCTA,$busctasig);
      $dat= ContabbPeer::doSelectOne($c);
      if (!$dat)
      {
      	$busctasig="";
      }
    }
    else $busctasig="";

    return $busctasig;
  }

  public static function generarAsientos(&$fafactur,$grid1,$grid3,&$arrasientos,&$pos,&$msj3)
  {
  	$msj3=-1;
  	$numcomord="FA".substr($fafactur->getReffac(),2,6);
  	$arrasientos=array();
    $valmon=H::toFloat($fafactur->getValmon(),6);
  	$pos=0;
    $col=self::determinarReferenciaDoc($fafactur->getTipref());
    $salactual=H::toFloat($fafactur->getMonfac())*$valmon;
    

      $a= new Criteria();
      $reg= CadefartPeer::doSelectOne($a);
      if ($reg)
      {
        $ctaVco= $reg->getCtavco();
      }
    if ($fafactur->getTipconpag()=='R') //Asiento Contable d Cta x Cobrar a Cliente
    {
      $ctacont=$fafactur->getCtacli();
      if ($ctacont!=""){
      $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctacont);
      if ($desdoc!="") {
          self::guardarAsientos($ctacont,$desdoc,'D',$salactual,$arrasientos,$pos);
      }else{
      	$msj3=1147;
      	return false;
      }
      }else{
      	$msj3=1147;
      	return false;
      }
    }
    else
    {
      $x=$grid3[0];
	  $j=0;
	  while ($j<count($x))
	  {
        $c= new Criteria();
        $c->add(FatippagPeer::ID,$x[$j]->getTippag());
        $data= FatippagPeer::doSelectOne($c);
        if ($data)
        {
          if ($data->getGenmov()=='S')
          {
            $a= new Criteria();
            $a->add(TsdefbanPeer::NUMCUE,$x[$j]->getNomban());
            $reg= TsdefbanPeer::doSelectOne($a);
            if ($reg)
            {
              $ctaban=$reg->getCodcta();
              if ($ctaban!=""){
              $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaban);
              if  ($desdoc!="") {
                  self::guardarAsientos($ctaban,$desdoc,'D',(H::toFloat($x[$j]->getMonpag())*$valmon),$arrasientos,$pos);
              }else{
            	$msj3=1149;
      	        return false;
              }
              }else{
            	$msj3=1149;
      	        return false;
              }
            }else{
            	$msj3=1148;
      	        return false;
            }
          }
          else  //Asiento Contable de Venta al Contado
          {
              $ctaVco= $reg->getCtavco();
              if ($ctaVco!=""){
              $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaVco);
              if ($desdoc!="") {
                  self::guardarAsientos($ctaVco,$desdoc,'D',(H::toFloat($x[$j]->getMonpag())*$valmon),$arrasientos,$pos);
              }else{
            	$msj3=1150;
      	        return false;
              }
              }else{
            	$msj3=1150;
      	        return false;
              }            
          }
        }
        else //Asiento Contable de Venta al Contado
        {            
            if ($ctaVco!=""){
              $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaVco);
              if ($desdoc!="") {
                  self::guardarAsientos($ctaVco,$desdoc,'D',(H::toFloat($x[$j]->getMonpag())*$valmon),$arrasientos,$pos);
              }else{
            	$msj3=1150;
      	        return false;
               }
            }else{
            	$msj3=1150;
      	        return false;
            }
          
        }
	  	$j++;
	  }
    }

     if ($fafactur->getVuelto()>0)  //Asiento Contable del Vuelto
     {
       if ($ctaVco=="")
       {
           $ctaVco= $reg->getCtavco();
           if ($ctaVco!="") {
            $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaVco);
            if ($desdoc!="") {
                self::guardarAsientos($ctaVco,$desdoc,'C',(H::toFloat($fafactur->getVuelto())*$valmon),$arrasientos,$pos);
            }else{
            	$msj3=1150;
      	        return false;
            }
           }else{
            	$msj3=1150;
      	        return false;
            }         
       }
       else
       {
       	 $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaVco);
         if ($desdoc!="") {
             self::guardarAsientos($ctaVco,$desdoc,'C',(H::toFloat($fafactur->getVuelto())*$valmon),$arrasientos,$pos);
         }else{
            	$msj3=1150;
      	        return false;
            }
       }
     }
      $cant=0;
         //Nuevos Asientos de Descuentos, Recargos y Cuenta Venta
          $z=$grid1[0];
          $j=0;
          while ($j<count($z))
          {
              if ($z[$j]->getDescuentos()!='') //Descuentos
              {
                 $cadenades=split('!',$z[$j]->getDescuentos());
                 $r=0;
                 while ($r<(count($cadenades)-1))
                 {
                   $aux=$cadenades[$r];
                   $aux2=split('_',$aux);
                   if ($aux2[0]!="" )
                   {                 
                       if ($aux2[3]!="") //Cuenta Contable
                       {
                        $cuencon=$aux2[3];
                        if ($cuencon!=""){
                        $descrip=H::getX_vacio('codcta','Contabb','Descta',$cuencon);
                        if ($descrip!="") {
                            self::guardarAsientos($cuencon,$descrip,'D',H::toFloat($aux2[2])*$valmon,$arrasientos,$pos);
                        }else{
                          $msj3=1151;
                          return false;
	                       }
                        }else{
                          $msj3=1151;
                          return false;
                        }
                       }else{
                          $msj3=1151;
                          return false;
                       }   
                   }
                 $r++;
                }//while
               }//if ($z[$j]->getDescuentos()!='')    

            if ($z[$j]->getRecargos()!='')  //Recargos
            {
             $cadenarec=split('!',$z[$j]->getRecargos());
             $r=0;
             while ($r<(count($cadenarec)-1))
             {
               $aux=$cadenarec[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                   if ($aux2[4]!="")
                   {
                    $cuencon=$aux2[4];
                    if ($cuencon!=""){
                     $descrip=H::getX_vacio('codcta','Contabb','Descta',$cuencon);
                     if ($descrip!="") {
                         $c = new Criteria();
                         $c->add(FargoartPeer::REFDOC,$fafactur->getReffac());
                         $c->add(FargoartPeer::CODRGO,$aux2[0]);
                         $per = FargoartPeer::doSelectOne($c);
                         if($per)
                            $monrgo=$per->getMonrgo()*$valmon;
                         else
                            $monrgo=H::toFloat ($aux2[3])*$valmon;
                         self::guardarAsientos($cuencon,$descrip,'C',$monrgo,$arrasientos,$pos);
                     }else{
                      $msj3=1152;
                      return false;
                    }
                    }else{
                      $msj3=1152;
                      return false;
                    }
                   }else{
                      $msj3=1152;
                      return false;
                  }
               }
              $r++;
             }//while
            }//if ($z[$j]->getRecargos()!='')

          if ($z[$j]->getCodart()!="")  //Cuenta Venta
          {
            if ($z[$j]->getBlanco2()=='0,00' && $fafactur->getTipref()!='VC')
            {
               eval('$cant = $z[$j]->get'.ucfirst(strtolower($col)).'();');
               if ($z[$j]->getPrecio()!="") { $precio=$z[$j]->getPrecio(); }
               else { $precio=$z[$j]->getPrecioe();}
               $monto_ingreso=$z[$j]->getTotart()-$z[$j]->getMonrgo()+$z[$j]->getMondes();
            }
            else
            {
              if ($fafactur->getTipref()=='VC')
              {
                $d= new Criteria();
                $d->add(FaartproPeer::CODPRO,$fafactur->getCodcli());
                $d->add(FaartproPeer::CODART,$z[$j]->getCodart());
                $d->add(FaartproPeer::TIPPER,'C');
                $dat= FaartproPeer::doSelectOne($d);
                if ($dat)
                {
                  $porcentaje=$dat->getComisi();
                  $cta_provee=$dat->getCtades();
                }
                else
                {
                  $porcentaje=$z[$j]->getBlanco2();
                }
              }
                eval('$cant = $z[$j]->get'.ucfirst(strtolower($col)).'();');
                if ($z[$j]->getPrecio()!="") { $precio=$z[$j]->getPrecio(); }
               else { $precio=$z[$j]->getPrecioe();}
               $monto_par=$z[$j]->getTotart()-$z[$j]->getMonrgo()+$z[$j]->getMondes();
               $monaux=(($monto_par*$porcentaje)/100);
               $monto_ingreso=(($monto_par)-$monaux);
            }

            $cta_vta=H::getX('Codart','Caregart','Ctavta',$z[$j]->getCodart());
            if ($cta_vta!="")
            {
              if (!self::buscarAsientos($cta_vta,'C',$monto_ingreso*$valmon,$arrasientos,$pos))
              {
                $descrip=H::getX_vacio('codcta','Contabb','Descta',$cta_vta);
                if ($descrip!="") {
                    self::guardarAsientos($cta_vta,$descrip,'C',$monto_ingreso*$valmon,$arrasientos,$pos);
                }else{
                $msj3=1153;
                return false;
                }
              }
            }else{
                $msj3=1153;
                return false;
            }

            if ($z[$j]->getBlanco2()!='0,00' || $fafactur->getTipref()=='VC')
            {
              eval('$cant = $z[$j]->get'.ucfirst(strtolower($col)).'();');
              if ($z[$j]->getPrecio()!="") { $precio=$z[$j]->getPrecio(); }
               else { $precio=$z[$j]->getPrecioe();}
               $monto_p=$z[$j]->getTotart()-$z[$j]->getMonrgo()+$z[$j]->getMondes();
                  $monto_provee=(($monto_p*$porcentaje)/100);
              if ($fafactur->getTipref()!='VC')
              {
                $f= new Criteria();
                $f->add(CaproveePeer::CODPRO,$z[$j]->getCodctapro());
                $reg= CaproveePeer::doSelectOne($f);
                if ($reg)
                {
                  $cta_provee=$reg->getCodcta();
                }else $cta_provee="";
              }
              if ($cta_provee!="")
              {
                  if (!self::buscarAsientos($cta_provee,'C',$monto_provee*$valmon,$arrasientos,$pos))
                {
                  $descrip=H::getX_vacio('codcta','Contabb','Descta',$cta_provee);
                        if ($descrip!="") {
                            self::guardarAsientos($cta_provee,$descrip,'C',$monto_provee*$valmon,$arrasientos,$pos);
                        }else{
                            $msj3=1154;
                           return false;
                        }
                }
              }else{
                $msj3=1154;
                return false;
              }
            }
          }

            $j++;
          }   

      $gencomext=H::getConfApp2('gencomext', 'facturacion', 'fafactur');
      if ($gencomext!='S') { 
          $i=0;
          $acumdeb=0;
          $acumcre=0;
          while ($i<=($pos-1))
          {
                if ($arrasientos[$i]["2"]!="")
                {
                  if ($arrasientos[$i]["2"]=='D')
                  {
                      $acumdeb= $acumdeb + $arrasientos[$i]["3"];
                  }
                  else
                  {
                        $acumcre= $acumcre + $arrasientos[$i]["3"];
                  }             
                }
                $i++;
          }
          $acumdeb=H::toFloat($acumdeb);
          $acumcre=H::toFloat($acumcre);

          if ((H::toFloat($acumdeb-$acumcre))==0.01)
          {
              $acumdeb=$acumdeb-0.01;
          }else if ((H::toFloat($acumcre-$acumdeb))==0.01){
              $acumcre=$acumcre-0.01;
          }

          if (H::toFloat($acumdeb)!=H::toFloat($acumcre))
          {
             $msj3=519;
              return false;
          }
      }
      
     return true;
  }

  public static function guardarAsientos($ctacont,$desdoc,$debcre,$monto,&$arrasientos,&$pos)
  {
    $i=0;
	while ($i<=($pos-1))
	{
      if ($arrasientos[$i]["0"]==$ctacont && $arrasientos[$i]["2"]==$debcre)
      {
      	$arrasientos[$i]["3"]=($arrasientos[$i]["3"] + $monto);
      	return true;
      }
	   $i++;
	}
	$arrasientos[$pos]["0"]=$ctacont;
    $arrasientos[$pos]["1"]=$desdoc;
    $arrasientos[$pos]["2"]=$debcre;
    $arrasientos[$pos]["3"]=$monto;
    $pos= $pos +1;
    return true;
  }

  public static function buscarAsientos($codcta,$debcre,$monasi,&$arrasientos,&$pos)
  {
    $busasi=false;
    $i=0;
	while ($i<=($pos-1))
	{
      if ($arrasientos[$i]["0"]==$codcta && $arrasientos[$i]["2"]==$debcre)
      {
      	$arrasientos[$i]["3"]=$arrasientos[$i]["3"] + $monasi;
      	$busasi=true;
      	return $busasi;
      }
	   $i++;
	}
	return $busasi;
  }

  public static function grabarComprobanteMaestro(&$fafactur,$arrasientos,&$pos)
  {
    $tiptraart=H::getConfApp2('tiptraart', 'facturacion', 'fafactur');
    $reftra="FA".substr($fafactur->getReffac(),2,6);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $correl3=$reftra;
    }else {
    $correl3=Comprobante::Buscar_Correlativo($fafactur->getFecfac());
    }
    $contabc = new Contabc();
    $contabc->setNumcom($correl3);
    $contabc->setReftra($reftra);
    $contabc->setFeccom($fafactur->getFecfac());
    $contabc->setDescom($fafactur->getDesfac());
    $contabc->setStacom('D');
    $contabc->setTipcom(null);
    $contabc->setMoncom($fafactur->getMonfac());
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $contabc->setLoguse($loguse);
    if ($tiptraart=='S')
      $contabc->setCodtiptra(Herramientas::getX_vacio('CODEMP','Cadefart','Codtiptra','001'));
    else
      $contabc->setCodtiptra(H::getX_vacio('Modtiptra', 'Cotiptra', 'Codtiptra', true));
    $contabc->save();

    $fafactur->setNumcom($correl3);

    self::grabarComprobanteDetalle($fafactur,$correl3,$arrasientos,$pos);
  }

  public static function grabarComprobanteDetalle($fafactur,$correl3,$arrasientos,&$pos)
  {
    if ($pos!=0)
    {
      $i=0;
	  while ($i<=($pos-1))
	  {
	  	if ($arrasientos[$i]["2"]!="")
	  	{
                  $contabc1= new Contabc1();
                  $contabc1->setNumcom($correl3);
                  $contabc1->setFeccom($fafactur->getFecfac());
                  $contabc1->setCodcta($arrasientos[$i]["0"]);
                  $numasi= $i +1;
                  $contabc1->setNumasi($numasi);
                  $contabc1->setRefasi($fafactur->getReffac());
                  $contabc1->setDesasi($arrasientos[$i]["1"]);
                  if ($arrasientos[$i]["2"]=='D')
                  {
                        $contabc1->setDebcre('D');
                        $contabc1->setMonasi($arrasientos[$i]["3"]);
                  }
                  else
                  {
                        $contabc1->setDebcre('C');
                        $contabc1->setMonasi($arrasientos[$i]["3"]);
                  }
                  $contabc1->save();
	  	}
	  	$i++;
	  }
    }
  }

  public static function grabarComprobanteInv(&$fafactur,$grid1,&$msj2)
  {
    $grabarcomprobanteinv=true;
    $msj2=-1;
    $montotot=self::calcularCostoPro($fafactur,$grid1);
    $col=self::determinarReferenciaDoc($fafactur->getTipref());
    $cant=0;

    if ($montotot>0)
    {
       $numcomprobinv="FI".substr($fafactur->getReffac(),2,6);
      $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $correl2=$numcomprobinv;
        }else {
        $correl2=Comprobante::Buscar_Correlativo($fafactur->getFecfac());
        }

      $fafactur->setNumcominv($correl2);
      $contabc= new Contabc();
      $contabc->setNumcom($correl2);
      $contabc->setReftra($numcomprobinv);
	  $contabc->setFeccom($fafactur->getFecfac());
	  $contabc->setDescom('Disminución de Inventario según Relación de Mercancía a Consignación de la Factura Nro. '.$fafactur->getReffac());
	  $contabc->setStacom('D');
	  $contabc->setTipcom(null);
	  $contabc->setMoncom($montotot);
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $contabc->setLoguse($loguse);
          $contabc->setCodtiptra(H::getX_vacio('Modtiptra', 'Cotiptra', 'Codtiptra', true));


	  $numasiento=0; //Grabamos el Debito. Costo de  Venta de cada Articulo
	  $x=$grid1[0];
	  $j=0;
	  while($j<count($x))
      {
        $a= new Criteria();
        $a->add(CaregartPeer::CODART,$x[$j]->getCodart());
        $resul= CaregartPeer::doSelectOne($a);
        if ($resul)
        {
          eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
          $monto=$cant*$resul->getCospro();
          if ($monto>0)
          {
            $f= new Criteria();
            $f->add(Contabc1Peer::NUMCOM,$correl2);
            $f->add(Contabc1Peer::FECCOM,$fafactur->getFecfac());
            $f->add(Contabc1Peer::CODCTA,$resul->getCtacos());
            $resul2= Contabc1Peer::doSelectOne($f);
            if ($resul2)
            {
              $contabc->save();
              $resul2->setMonasi($resul2->getMonasi() + $monto);
              $resul2->save();
            }
            else
            {
              $k= new Criteria();
              $k->add(ContabbPeer::CODCTA,$resul->getCtacos());
              $resul2= ContabbPeer::doSelectOne($k);
              if ($resul2)
              {
              	$contabc->save();
                $numasiento= $numasiento + 1;
                $contabc1= new Contabc1();
		        $contabc1->setNumcom($correl2);
		        $contabc1->setFeccom($fafactur->getFecfac());
		        $contabc1->setCodcta($resul->getCtacos());
		        $contabc1->setNumasi($numasiento);
		        $contabc1->setRefasi($numcomprobinv);
		        $contabc1->setDesasi($resul2->getDescta());
		        $contabc1->setDebcre('D');
		        $contabc1->setMonasi($monto);
		        $contabc1->save();

              }
              else
              {
              	$msj2="El Artículo ".$x[$j]->getCodart()." no posee una Cuenta de Costo asociada válida... El comprobante de Inventario no será generado";
              	$grabarcomprobanteinv=false;
              	return $grabarcomprobanteinv;
              }
            }
          }
          else
          {
          	$msj2="El Artículo ".$x[$j]->getCodart()."no tiene Costo Promedio... El comprobante de Inventario no será generado";
            $grabarcomprobanteinv=false;
            return $grabarcomprobanteinv;
          }
        }
      	$j++;
      }

      $x=$grid1[0]; // Grabamos el Crédito. Cuenta de Inventario de cada Artículo
	  $j=0;
	  while($j<count($x))
      {
      	$a= new Criteria();
        $a->add(CaregartPeer::CODART,$x[$j]->getCodart());
        $resul= CaregartPeer::doSelectOne($a);
        if ($resul)
        {
          eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
          $monto=$cant*$resul->getCospro();
          if ($monto>0)
          {
          	$f= new Criteria();
            $f->add(Contabc1Peer::NUMCOM,$correl2);
            $f->add(Contabc1Peer::FECCOM,$fafactur->getFecfac());
            $f->add(Contabc1Peer::CODCTA,$resul->getCodcta());
            $resul2= Contabc1Peer::doSelectOne($f);
            if ($resul2)
            {
              $contabc->save();
              $resul2->setMonasi($resul2->getMonasi() + $monto);
              $resul2->save();
            }
            else
            {
              $k= new Criteria();
              $k->add(ContabbPeer::CODCTA,$resul->getCodcta());
              $resul2= ContabbPeer::doSelectOne($k);
              if ($resul2)
              {
              	$contabc->save();
                $numasiento= $numasiento + 1;
                $contabc1= new Contabc1();
		        $contabc1->setNumcom($correl2);
		        $contabc1->setFeccom($fafactur->getFecfac());
		        $contabc1->setCodcta($resul->getCodcta());
		        $contabc1->setNumasi($numasiento);
		        $contabc1->setRefasi($numcomprobinv);
		        $contabc1->setDesasi($resul2->getDescta());
		        $contabc1->setDebcre('C');
		        $contabc1->setMonasi($monto);
		        $contabc1->save();

              }
              else
              {
              	$msj2="El Artículo ".$x[$j]->getCodart()." no posee una Cuenta de Costo asociada válida... El comprobante de Inventario no será generado";
              	$grabarcomprobanteinv=false;
              	return $grabarcomprobanteinv;
              }
            }
          }
          else
          {
          	$msj2="El Artículo ".$x[$j]->getCodart()."no tiene Costo Promedio... El comprobante de Inventario no será generado";
            $grabarcomprobanteinv=false;
            return $grabarcomprobanteinv;
          }
        }
      	$j++;
      }
    }
    else
    {
      	$msj2="Los Articulos no tienen Costo Promedio.El comprobante de Inventario no será generado";
        $grabarcomprobanteinv=false;
        return $grabarcomprobanteinv;
    }
    return $grabarcomprobanteinv;
  }

  public static function calcularCostoPro($fafactur,$grid1)
  {
  	$calcularcostopro=0;
  	$cant=0;
  	$col=self::determinarReferenciaDoc($fafactur->getTipref());

    $x=$grid1[0];
	$j=0;
	while($j<count($x))
    {
      $c= new Criteria();
      $c->add(CaregartPeer::CODART,$x[$j]->getCodart());
      $resul= CaregartPeer::doSelectOne($c);
      if ($resul)
      {
      	eval('$cant = $x[$j]->get'.ucfirst(strtolower($col)).'();');
        $calcularcostopro=  $calcularcostopro + ($cant*$resul->getCospro());
      }
      $j++;
    }
    return $calcularcostopro;
  }

  public static function grabarFactura($fafactur,$grid1,$grid3,$tipocaja)
  {
    $fafactur->setStatus('A');
    $fafactur->setCodcaj($tipocaja);
    if ($fafactur->getNumcontrol()=='##########')
    {
       if (Herramientas::getVerCorrelativo('corfaccont','facorrelat',$r))
       {
           $encontrado=false;
            while (!$encontrado)
            {
              $numero=str_pad($r, 10, '0', STR_PAD_LEFT);

              $sql="select numcontrol from fafactur where numcontrol='".$numero."'";
              if (Herramientas::BuscarDatos($sql,$result))
              {
                $r=$r+1;
              }
              else
              {
                $encontrado=true;
              }
            }
            $fafactur->setNumcontrol(str_pad($r, 10, '0', STR_PAD_LEFT));

         Herramientas::getSalvarCorrelativo('corfaccont','facorrelat','Referencia',$r,$msg);
       }
    }

    $fafactur->setMonfac($fafactur->getMonfac()*$fafactur->getValmon());
    $fafactur->setMondesc($fafactur->getMondesc()*$fafactur->getValmon());
    $fafactur->save();
    self::grabarDetalleFactura($fafactur,$grid1);
    self::grabarDescuentoArticulo($fafactur,$grid1);
    self::grabarRecargoArticulo($fafactur,$grid1);
    self::grabarFormaPago($fafactur,$grid3);    
  }

  public static function grabarDetalleFactura($fafactur,$grid1)
  {
  	$col=self::determinarReferenciaDoc($fafactur->getTipref());
    $valmon=H::toFloat($fafactur->getValmon(),6);
    $manprecon=H::getConfApp2('manprecon', 'facturacion', 'fafactur');   
    $fec1 = $fafactur->getFecper1();
    $fec2 = $fafactur->getFecper2();
    
    $x=$grid1[0];
    $j=0;
    $cantot=0;
    if ($x[$j]->getCodart()!="")
    {
        $monto=0;
      while ($j<count($x))
	  {
	  	eval('$cantot = $x[$j]->get'.ucfirst(strtolower($col)).'();');
	    if ($x[$j]->getCodart()!="" && $cantot>0)
	    {
	     $x[$j]->setReffac($fafactur->getReffac());
       $x[$j]->setMonrgo($x[$j]->getMonrgo()*$valmon);
       $x[$j]->setMondes($x[$j]->getMondes()*$valmon);
       $x[$j]->setTotart($x[$j]->getTotart()*$valmon);
	     if ($x[$j]->getPrecio()=="")
	     {
	     	$x[$j]->setPrecio($x[$j]->getPrecioe());
	     }
             $c = new Criteria();
             $c->add(FaartfacproPeer::REFFAC,$fafactur->getProform());
             $c->add(FaartfacproPeer::CODART,$x[$j]->getCodart());
             $per = FaartfacproPeer::doSelectOne($c);
             if($per)
             {
                 $per->setEstatus('P');
                 $per->setNumfac($fafactur->getReffac());
                 $per->save();
             }
       if ($fafactur->getTipref()=='V')
          $x[$j]->setCodref('FD');
	     $x[$j]->setCantot($cantot);
	     $x[$j]->save();

	     if ($fafactur->getTipref()!='D' && $fafactur->getTipref()!='VC')
	     {
	     	$c= new Criteria();
	     	$c->add(CaregartPeer::CODART,$x[$j]->getCodart());
	     	$result= CaregartPeer::doSelectOne($c);
	     	if ($result && $x[$j]->getBlanco2()=="A")
	     	{
          if ($result->getTipo()=='A') {
	     	    $result->setDistot($result->getDistot() - $cantot);
	     	    $result->save();
          }
	     	}
	     }
        if ($manprecon=='S')
        {   
          if ($fec1!='' && $fec2!='') {
          $sqla="update fadetcon set stacon='F'
            WHERE REFPRE='".$x[$j]->getCodref()."' and codart='".$x[$j]->getCodart()."' and (stacon<>'F' or stacon is null)
            AND FECINI>='".$fec1."' AND FECFIN<='".$fec2."'";
            H::insertarRegistros($sqla);
          }
        }
	    }
	    $j++;
	  }
    }

    $z=$grid1[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function grabarDescuentoArticulo($fafactur,$grid1)
  {
    $valmon=H::toFloat($fafactur->getValmon(),6);
      $z=$grid1[0];
      $j=0;
      $acumart=0;
      while ($j<count($z))
      {
          if ($z[$j]->getDescuentos()!='')
          {
             $cadenades=split('!',$z[$j]->getDescuentos());
             $r=0;
             while ($r<(count($cadenades)-1))
             {
               $aux=$cadenades[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                  $c= new Criteria();
                  $c->add(FadescartPeer::REFDOC,$fafactur->getReffac());
                  $c->add(FadescartPeer::CODART,$z[$j]->getCodart());
                  $c->add(FadescartPeer::DESART,$z[$j]->getDesart());
                  $c->add(FadescartPeer::CODDESC,$aux2[0]);                
                  $trajo=FadescartPeer::doSelectOne($c);
                  if ($trajo)
                  {
                       if ($aux2[6]=="M")
                       {
                         $monpro=self::proporcion($j,$grid1);
                         $descart= (H::toFloat($aux2[2]) * $monpro/100);
                       }
                       else
                       {
                         if ($z[$j]->getPrecio()!="")
                         {
                                $precio=$z[$j]->getPrecio();
                         }else $precio=$z[$j]->getPrecioe();

                         if ($fafactur->getEsretencion()=='N')
                         {
                           $descart= (($z[$j]->getCantot() * $precio * H::toFloat($aux2[2]))/100);
                         }
                         else
                         {
                           $descart= (($z[$j]->getMonrgo() * H::toFloat($aux2[2]))/100);
                         }
                       }

                       $acumart= $acumart + $descart;
                       if ($j==(count($z)-1))
                       {
                        $diferencia= round(($acumart - $z[$j]->getMondes()),2);
                        $descart= $descart + $diferencia;
                       }
                      $trajo->setMondetdesc($trajo->getMondetdesc() + $descart);
                      $trajo->save();
                   
                  }else {

                  $fadescart2= new Fadescart();
                  $fadescart2->setCodart($z[$j]->getCodart());
                  $fadescart2->setDesart($z[$j]->getDesart());
                  $fadescart2->setRefdoc($fafactur->getReffac());
                  $fadescart2->setCoddesc($aux2[0]);
                  $fadescart2->setMondesc(H::toFloat($aux2[2])*$valmon);
                  
                   if ($aux2[6]=="M")
                   {
                     $monpro=self::proporcion($j,$grid1);
                     $descart= (H::toFloat($aux2[2]) * $monpro/100);
    }
                   else
                   {
                     if ($z[$j]->getPrecio()!="")
                     {
                            $precio=$z[$j]->getPrecio();
                     }else $precio=$z[$j]->getPrecioe();

                     if ($fafactur->getEsretencion()=='N')
                     {
                       $descart= (($z[$j]->getCantot() * $precio * H::toFloat($aux2[2]))/100);
  }
                     else
                     {
                       $descart= (($z[$j]->getMonrgo() * H::toFloat($aux2[2]))/100);
                     }
                   }

                   $acumart= $acumart + $descart;
                   if ($j==(count($z)-1))
                   {
                    $diferencia= round(($acumart - $z[$j]->getMondes()),2);
                    $descart= $descart + $diferencia;
                   }
                  $fadescart2->setMondetdesc($descart);
                  $fadescart2->setTipdoc('F');
                  $fadescart2->save();
                  }
              }
             $r++;
            }//while
           }//if ($x[$j]->getDescuentos()!='')    
        
      	$j++;
      }
  }

  public static function proporcion($fila,$grid1)
  {
  	$montotot=0;
  	$proporcion=0;
  	$x=$grid1[0];
    $l=0;
    while ($l<count($x))
    {
      if ($x[$l]->getTotart()!="" && is_numeric($x[$l]->getTotart()))
      {
        if (!is_numeric($x[$l]->getPrecio()))
        {
         $precio="0,00";
        }

        if (!is_numeric($x[$l]->getPrecioe()))
        {
         $precio="0,00";
        }

        if ($x[$l]->getPrecio()!="")
        {
        $precio=$x[$l]->getPrecio();
        }else $precio=$x[$l]->getPrecioe();

        if ($x[$l]->getDesc()=="1")
        {
          $montotot= $montotot + ($x[$l]->getCantot() * $precio);
        }
      }
      $l++;
    }
    if ($x[$fila]->getPrecio()!="")
    $precio2=$x[$fila]->getPrecio();
    else $precio2=$x[$fila]->getPrecioe();
    $proporcion = (($x[$fila]->getCantot() * $precio2 * 100)/$montotot);

   return $proporcion;
  }

  public static function marcados($tipo,$grid)
  {
    $marcados=0;
    $marca="";
//    if ($tipo=='R') //Recargo
    $indice='check';
//    else
//    $indice='desc';

    $z=$grid[0];
    $j=0;
    while ($j<count($z))
    {
      eval('$marca = $z[$j]->get'.ucfirst(strtolower($indice)).'();');
      if ($marca=="1")
      {
      	$marcados= $marcados +1;
      }
      $j++;
    }

   return $marcados;
  }

  public static function grabarRecargoArticulo($fafactur,$grid1)
  {
        $valmon=H::toFloat($fafactur->getValmon(),6);
        $x=$grid1[0];
        $i=0;
        while ($i<count($x))
        {     
          if ($x[$i]->getRecargos()!='')
          {
             $cadenarec=split('!',$x[$i]->getRecargos());
             $r=0;
             while ($r<(count($cadenarec)-1))
             {
               $aux=$cadenarec[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                  $c= new Criteria();
                  $c->add(FargoartPeer::REFDOC,$fafactur->getReffac());
                  $c->add(FargoartPeer::CODART,$x[$i]->getCodart());
                  $c->add(FargoartPeer::DESART,$x[$i]->getDesart());
                  $c->add(FargoartPeer::CODRGO,$aux2[0]);                
                  $trajo= FargoartPeer::doSelectOne($c);
                  if ($trajo)
                  {
                      $trajo->setMonrgo($trajo->getMonrgo() + (H::toFloat($aux2[3])*$valmon));
                      $trajo->save();
                      
                  }else {
                      $fargoart2= new Fargoart();
                      $fargoart2->setCodart($x[$i]->getCodart());
                      $fargoart2->setDesart($x[$i]->getDesart());
                      $fargoart2->setRefdoc($fafactur->getReffac());
                      $fargoart2->setCodrgo($aux2[0]);
                      $fargoart2->setMonrgo(H::toFloat($aux2[3])*$valmon);
                      $fargoart2->setTipdoc('F');
                      $fargoart2->save();
                  }
    }
             $r++;
            }//while
           }//if ($x[$j]->getRecargos()!='')          
          $i++;
  }
  }

  public static function grabarFormaPago($fafactur,$grid3)
  {
    $valmon=H::toFloat($fafactur->getValmon(),6);
    $x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getTippag()!="" && $x[$j]->getMonpag()!=0)
      {
        $x[$j]->setReffac($fafactur->getReffac());
        $x[$j]->setNropag(str_pad($j,3,'0',STR_PAD_LEFT));
        $x[$j]->setMonpag($x[$j]->getMonpag()*$valmon);
        $x[$j]->save();

        $a= new Criteria();
        $a->add(FatippagPeer::ID,$x[$j]->getTippag());
        $resul= FatippagPeer::doSelectOne($a);
        if ($resul)
        {
          if ($resul->getGenmov()=='S')
          {
          	$descop=$fafactur->getDesfac();
          	$montop=$x[$j]->getMonpag()*$valmon;
          	$nroreflib=$x[$j]->getNumero();
            $nrocue=$x[$j]->getNomban();
            $tipmov=$x[$j]->getCodmov();
            self::generaMovLib($fafactur,$descop,$montop,$nroreflib,$nrocue,$tipmov);
          }
        }
      }
      $j++;
    }

    $z=$grid3[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }
  }

  public static function generaMovLib($fafactur,$descop,$montop,$nroreflib,$nrocue,$tipmov)
  {
  	$d= new Criteria();
  	$d->add(TsmovlibPeer::NUMCUE,$nrocue);
  	$d->add(TsmovlibPeer::REFLIB,$nroreflib);
  	$d->add(TsmovlibPeer::TIPMOV,$tipmov);
  	$resul= TsmovlibPeer::doSelectOne($d);
  	if (!$resul)
  	{
      $tsmovlib= new Tsmovlib();
      $tsmovlib->setNumcue($nrocue);
      $tsmovlib->setReflib($nroreflib);
      $tsmovlib->setFeclib($fafactur->getFecfac());
      $tsmovlib->setTipmov($tipmov);
      $tsmovlib->setDeslib($descop);
      $tsmovlib->setMonmov($montop);
      $tsmovlib->setNumcom($fafactur->getNumcom());
      $tsmovlib->setStatus('C');
      $tsmovlib->setFeccom($fafactur->getFecfac());
      $tsmovlib->setStacon('N');
      $tsmovlib->setCodmon($fafactur->getTipmon());
      /*$q= new Criteria();
      $q->add(TsdesmonPeer::CODMON,$fafactur->getTipmon());
      $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
      $reg2= TsdesmonPeer::doSelectOne($q);
      if ($reg2)
        $valmon=$reg2->getValmon();
      else $valmon=1;      */
      $tsmovlib->setValmon($fafactur->getValmon());
      $tsmovlib->save();
  	}
  }

  public static function documentoXCobrar($fafactur)
  {
    $valmon=H::toFloat($fafactur->getValmon(),6);
    $t= new Criteria();
    $t->add(FatipmovPeer::DEBCRE,'D');
    $fatipmov= FatipmovPeer::doSelectOne($t);
    //$fatipmov = Fatipmov::getFirst();
    if(!$fatipmov){

    }else{
      $cobdocume= new Cobdocume();
      $cobdocume->setCodcli($fafactur->getCodcli());
      $cobdocume->setRefdoc(str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
      //$cobdocume->setCodmov('001');
      $cobdocume->setFatipmovId($fatipmov->getId());
      $cobdocume->setFecemi($fafactur->getFecfac());
      $fecven=H::dateAdd('m',1,$fafactur->getFecfac(),'+');
      $cobdocume->setFecven($fecven);
      $cobdocume->setOridoc('FAC');
      $cobdocume->setDesdoc($fafactur->getDesfac());
      $mondoc= H::toFloat($fafactur->getMonto());
      $cobdocume->setMondoc($mondoc*$valmon);
      $cobdocume->setRecdoc(H::toFloat($fafactur->getMonrgo())*$valmon);
      $cobdocume->setDscdoc(H::toFloat($fafactur->getMondesc())*$valmon);
      $cobdocume->setAbodoc(H::toFloat($fafactur->getMoncan())*$valmon);
      $salact=H::toFloat($fafactur->getMonfac());
      $cobdocume->setSaldoc($salact*$valmon);
      $cobdocume->setStadoc('A');
      $cobdocume->setReffac($fafactur->getReffac());
      $cobdocume->setNumcom($fafactur->getNumcom());
      $cobdocume->setFeccom($fafactur->getFecfac());
      $cobdocume->setFadescripfacId($fafactur->getFadescripfacId());
      $cobdocume->save();
    }
  }

  public static function recargosXCobrar($fafactur,$grid4)
  {
    /*$x=$grid4[0];
    $j=0;
    if (count($x)>2)
    {
      while ($j<count($x))
      {
        if ($x[$j]->getCodrgo()!="")
        {
          $cobrecdoc= new Cobrecdoc();
          $cobrecdoc->setRefdoc(str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
          $cobrecdoc->setCodcli($fafactur->getCodcli());
          $cobrecdoc->setCodrec($x[$j]->getCodrgo());
          $cobrecdoc->setFecdoc($fafactur->getFecfac());
          $c = new Criteria();
          $c->add(FargoartPeer::REFDOC,$fafactur->getReffac());
          $c->add(FargoartPeer::CODRGO,$x[$j]->getCodrgo());
          $per = FargoartPeer::doSelectOne($c);
          if($per)
            $monrgo=$per->getMonrgo();
          else
            $monrgo=$x[$j]->getMonrgo();
          $cobrecdoc->setMonrec($monrgo);
          $cobrecdoc->save();
        }
      	$j++;
      }
    }*/
      $valmon=H::toFloat($fafactur->getValmon(),6);
    $x=$grid4[0];
    $j=0;
      while ($j<count($x))
      {
          if ($x[$j]->getRecargos()!='')
          {
             $cadenarec=split('!',$x[$j]->getRecargos());
             $r=0;
             while ($r<(count($cadenarec)-1))
             {
               $aux=$cadenarec[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                  $p= new Criteria();
                  $p->add(CobrecdocPeer::REFDOC,str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
                  $p->add(CobrecdocPeer::CODREC,$aux2[0]);
                  $resul= CobrecdocPeer::doSelectOne($p);
                  if ($resul)
                  {
                      $resul->setMonrec($resul->getMonrec()+ (H::toFloat($aux2[3])*$valmon));
                      $resul->save();
                  }else {
                      $cobrecdoc1= new Cobrecdoc();
                      $cobrecdoc1->setRefdoc(str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
                      $cobrecdoc1->setCodcli($fafactur->getCodcli());
                      $cobrecdoc1->setCodrec($aux2[0]);
                      $cobrecdoc1->setFecdoc($fafactur->getFecfac());
                      $c = new Criteria();
                      $c->add(FargoartPeer::REFDOC,$fafactur->getReffac());
                      $c->add(FargoartPeer::CODART,$x[$j]->getCodart());
                      $c->add(FargoartPeer::DESART,$x[$j]->getDesart());
                      $c->add(FargoartPeer::CODRGO,$aux2[0]);
                      $per = FargoartPeer::doSelectOne($c);
                      if($per)
                        $monrgo=$per->getMonrgo();
                      else
                        $monrgo=H::toFloat($aux2[3]);
                      $cobrecdoc1->setMonrec($monrgo*$valmon);
                      $cobrecdoc1->save();
    }
  }
             $r++;
            }//while
           }//if ($x[$j]->getRecargos()!='')      
      	$j++;
      } 
  }

  public static function descuentoXCobrar($fafactur,$grid2)
  {
    /*$x=$grid2[0];
    $j=0;
    if (count($x)>0)
    {
      while ($j<count($x))
      {
        if ($x[$j]->getCoddesc()!="")
        {
          $cobdesdoc= new Cobdesdoc();
          $cobdesdoc->setRefdoc(str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
          $cobdesdoc->setCodcli($fafactur->getCodcli());
          $cobdesdoc->setCoddes($x[$j]->getCoddesc());
          $cobdesdoc->setFecdes($fafactur->getFecfac());
          $cobdesdoc->setMondes($x[$j]->getMondesc());
          $cobdesdoc->save();
        }
      	$j++;
      }
    }*/
    $valmon=H::toFloat($fafactur->getValmon(),6);
    $x=$grid2[0];
    $j=0;
    if (count($x)>0)
    {
      while ($j<count($x))
      {
          if ($x[$j]->getDescuentos()!='')
          {
             $cadenades=split('!',$x[$j]->getDescuentos());
             $r=0;
             while ($r<(count($cadenades)-1))
             {
               $aux=$cadenades[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                 $p= new Criteria();
                 $p->add(CobdesdocPeer::REFDOC,str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
                 $p->add(CobdesdocPeer::CODDES,$aux2[0]);
                 $resul= CobdesdocPeer::doSelectOne($p);
                 if ($resul)
                 {
                    $resul->setMondes($resul->getMondes() + (H::toFloat($aux2[2])*$valmon));
                    $resul->save();
                 }else {
                      $cobdesdoc1= new Cobdesdoc();
                      $cobdesdoc1->setRefdoc(str_pad($fafactur->getReffac(),10,'0',STR_PAD_LEFT));
                      $cobdesdoc1->setCodcli($fafactur->getCodcli());
                      $cobdesdoc1->setCoddes($aux2[0]);
                      $cobdesdoc1->setFecdes($fafactur->getFecfac());
                      $cobdesdoc1->setMondes(H::toFloat($aux2[2])*$valmon);
                      $cobdesdoc1->save();
    }
  }
             $r++;
            }//while
           }//if ($x[$j]->getDescuentos()!='')   
      	$j++;
      }
    }
  }

  public static function grabarIngreso($fafactur,$grid3)
  {
    $valmon=H::toFloat($fafactur->getValmon());
  	$cireging= new Cireging();
  	$cireging->setRefing($fafactur->getReffac());
    $codtip=H::getX_vacio('CODEMP','Cidefniv','CODTIP','001');
    if ($codtip=='')
      $codtip='FAC';
  	$cireging->setCodtip($codtip);
  	$cireging->setFecing($fafactur->getFecfac());
  	$cireging->setAnoing(substr($fafactur->getFecfac(),0,4));
  	$cireging->setDesing($fafactur->getDesfac());
  	$cireging->setRifcon($fafactur->getRifpro());
  	$cireging->setDesanu(null);
  	$moning= (($fafactur->getMonfac() - H::toFloat($fafactur->getTotrec())) + H::toFloat($fafactur->getTotdesc()));
  	$cireging->setMoning($moning*$valmon);
  	$cireging->setMonrec(H::toFloat($fafactur->getTotrec())*$valmon);
  	$cireging->setMondes(H::toFloat($fafactur->getTotdesc())*$valmon);
  	$cireging->setMontot($moning*$valmon);
  	$cireging->setPrevis('S');
  	$cireging->setStaing('A');
    $cireging->setStaliq('S');
    $cireging->setCodmon($fafactur->getTipmon());
    $cireging->setValmon($valmon);

    $cireging->setFecliq($fafactur->getFecfac());

  	$x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
      $c= new Criteria();
      $c->add(FatippagPeer::ID,$x[$j]->getTippag());
      $result= FatippagPeer::doSelectOne($c);
      if ($result)
      {
      	if ($result->getGenmov()=="S")
      	{
      	  $cireging->setTipmov($x[$j]->getTippag());
      	  $cireging->setCtaban($x[$j]->getNomban());
      	}
      }
      $j++;
    }
   $cireging->save();
  }

  public static function grabarImpIng($fafactur)
  {
    $valmon=H::toFloat($fafactur->getValmon());
    $c= new Criteria();
    $c->add(CiimpingPeer::REFING,$fafactur->getReffac());
    $c->add(CiimpingPeer::FECING,$fafactur->getFecfac());
    CiimpingPeer::doDelete($c);

    $previsto=true;
    $sql="SELECT B.CODING as coding,SUM(A.MONRGO) as monrec,SUM(A.TOTART) as monfac FROM FAARTFAC A,CAREGART B WHERE A.REFFAC='".$fafactur->getReffac()."' AND A.CODART=B.CODART GROUP BY B.CODING";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $i=0;
      while ($i<count($result))
      {
        $ciimping= new Ciimping();
        $ciimping->setRefing($fafactur->getReffac());
        $ciimping->setFecing($fafactur->getFecfac());
        $ciimping->setCodpre($result[$i]["coding"]);
        $ciimping->setMoning(($result[$i]["monfac"] - $result[$i]["monrec"])*$valmon);
        $ciimping->setMonrec($result[$i]["monrec"]*$valmon);
        $ciimping->setMondes(0);
        $ciimping->setMontot(($result[$i]["monfac"] - $result[$i]["monrec"])*$valmon);
        $ciimping->setMonaju(0);
        $ciimping->setStaimp('A');
        $ciimping->save();
      	$i++;
      }
    }
  }

  public static function anularComprobante($tipo,$numcom,$fecanu,&$msj)
  {
  	$msj="";

    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numcom);
    $datos= ContabcPeer::doSelectOne($c);
    if ($datos)
    {
      if ($datos->getStacom()=='A'){
        $msj="El Comprobante Nro. ".$numcom." no fué Anulado debido a que esta Actualizado";
      }else {
      $contabc= new Contabc();
      if ($tipo=='C')
      {
      	$contabc->setNumcom("RF".substr($numcom,2,6));
      }else if ($tipo=='I')
      {
      	$contabc->setNumcom("RI".substr($numcom,2,6));
      }
      else
      {
      	$contabc->setNumcom("RO".substr($numcom,2,6));
      }
      $contabc->setReftra($datos->getReftra());
      $contabc->setFeccom($fecanu);
      $contabc->setDescom($datos->getDescom());
      $contabc->setStacom('D');
      $contabc->setTipcom(null);
      $contabc->setMoncom($datos->getMoncom());
      $contabc->save();

      $a= new Criteria();
      $a->add(Contabc1Peer::NUMCOM,$numcom);
      $results= Contabc1Peer::doSelect($a);
      if ($results)
      {
      	foreach ($results as $obj)
      	{
      	  $contabc1= new Contabc1();
      	  if ($tipo=='C')
      	  {
      	   $contabc1->setNumcom("RF".substr($numcom,2,6));
      	  }else if ($tipo=='I')
      	  {
      	  	$contabc1->setNumcom("RI".substr($numcom,2,6));
      	  }
      	  else
      	  {
      	  	$contabc1->setNumcom("RO".substr($numcom,2,6));
      	  }
      	  $contabc1->setFeccom($fecanu);
      	  $contabc1->setCodcta($obj->getCodcta());
      	  $contabc1->setNumasi($obj->getNumasi());
      	  $contabc1->setRefasi($obj->getRefasi());
      	  $contabc1->setDesasi($obj->getDesasi());
      	  if ($obj->getDebcre()=='D')
      	  {
      	    $contabc1->setDebcre('C');
      	  }else
      	  {
      	  	$contabc1->setDebcre('D');
      	  }
      	  $contabc1->setMonasi($obj->getMonasi());
      	  $contabc1->save();

      	}
      }
    }
    }
    else
    {
    	$msj="El Comprobante Nro. ".$numcom."no fué Anulado";
    }
  }

  public static function generarNotaCredito($reffac,$fecanu,$monto)
  {
    $facnotcre= new Fanotcre();
    $facnotcre->setReffac($reffac);
    $corre=substr(self::generarCodInt("Fanotcre","correl"),2,8);
    $facnotcre->setCorrel($corre);
    $facnotcre->setFecnot($fecanu);
    $facnotcre->setMonto($monto);
    $facnotcre->save();
  }

  public static function generarCodInt($nombretabla,$campoclave)
  {
  	$codinterno='1';
  	$codint=str_pad($codinterno,10,'0',STR_PAD_LEFT);
  	if (self::ultRegporCodInt2($nombretabla,$campoclave,$result))
  	{
  	  if ($result[0]["$campoclave"]!="")
  	  {
        $codig=$result[0]["$campoclave"];
        $codig= $codig + 1;
        $codinterno=$codig;
        $codint=str_pad($codinterno,10,'0',STR_PAD_LEFT);
  	  }
  	}
  	$generarcodint=$codint;
  	return $generarcodint;
  }

  public static function ultRegporCodInt2($nombretabla,$campoclave,&$result)
  {
  	$result=array();
  	$sql="SELECT ".$campoclave." FROM ".$nombretabla." WHERE ".$campoclave."=(SELECT MAX(".$campoclave.") FROM ".$nombretabla." WHERE ".$campoclave."<>'9999999999') Order By ".$campoclave."";
  	if (Herramientas::BuscarDatos($sql,$result))
    {
     return true;
    }else return false;
  }

  public static function anularCxC($reffac,$fecanu,$motanu)
  {
    $c= new Criteria();
    $c->add(CobdocumePeer::REFDOC,$reffac);
    $resul= CobdocumePeer::doSelectOne($c);
    if ($resul)
    {
      $resul->setFecanu($fecanu);
      $resul->setDesanu($motanu);
      $resul->setStadoc('N');
      $resul->save();
    }
  }

  public static function devolverArticulosExist($reffac)
  {
   $manprecon=H::getConfApp2('manprecon', 'facturacion', 'fafactur');
   $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');   
   $a= new Criteria();
   $a->add(FafacturPeer::REFFAC,$reffac);
   $reg= FafacturPeer::doSelectOne($a);
   if ($reg)
   {
     $calmacen=H::getX_vacio('ID','Fadefcaj','CODALM',$reg->getCodcaj()); 
     if ($reg->getTipref()!='D' && $reg->getTipref()!='VC')
     {
     	$d= new Criteria();
     	$d->add(FaartfacPeer::REFFAC,$reffac);
     	$results= FaartfacPeer::doSelect($d);
     	if ($results)
     	{
     	  foreach ($results as $regs)
     	  {
     	  	$c= new Criteria();
     	  	$c->add(CaregartPeer::CODART,$regs->getCodart());
     	  	$dato= CaregartPeer::doSelectOne($c);
     	  	if ($dato)
     	  	{
            $cantd=$regs->getCantot();
     	  		if ($dato->getTipo()=='A')
     	  		{
               if ($manunialt=='S')
              {

                 if ($x[$j]->getUnimed()!="")
                {
                   if ($x[$j]->getUnimed()!=$arti->getUnimed())
                   {
                       $k= new Criteria();                                     
                       $k->add(CaunialartPeer::CODART,$codarti);
                       $k->add(CaunialartPeer::UNIALT,$x[$j]->getUnimed());
                       $result3= CaunialartPeer::doSelectOne($k);
                       if ($result3)
                       {
                           $cantd=$cantd*$result3->getRelart();
                       }
                   }
                }                
              }
              $dato->setExitot($dato->getExitot() + $cantd);
     	  		  $dato->setDistot($dato->getDistot() + $cantd);
     	  		  $dato->save();

               $c = new Criteria();
               $c->add(CaartalmubiPeer::CODART,$regs->getCodart());
               $c->add(CaartalmubiPeer::CODALM,$calmacen);
               $alm = CaartalmubiPeer::doSelectOne($c);
               if ($alm)
               {
                  if($alm->getExiact()>=$cantd)
                   {
                       $act2=$alm->getExiact() + $cantd;
                       $alm->setExiact($act2);
                       $alm->save();
                   }
               }// if ($alm)
               $c = new Criteria();
               $c->add(CaartalmPeer::CODART,$regs->getCodart());
               $c->add(CaartalmPeer::CODALM,$calmacen);
               $reg = CaartalmPeer::doSelectOne($c);
               if ($reg)
               {
                if($reg->getExiact()>=$cantd)
                 {
                     $act2=$reg->getExiact() + $cantd;
                     $reg->setExiact($act2);
                     $reg->save();
                 }
              }
     	  		}
     	  	}
          if ($manprecon=='S')
          {   
            if ($reg->getFecper1()!='' && $reg->getFecper2()!='') {
            $sqla="update fadetcon set stacon=null
              WHERE REFPRE='".$regs->getCodref()."' and codart='".$regs->getCodart()."' and stacon='F'
              AND FECINI>='".$reg->getFecper1()."' AND FECFIN<='".$reg->getFecper2()."'";
              H::insertarRegistros($sqla);
            }
          }
     	  }
     	}
     }
   }
  }

  public static function eliminarComprob($numcom)
  {
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numcom);
    $datos= ContabcPeer::doSelectOne($c);
    if ($datos)
    {
      if ($datos->getStacom()!='A')
      {
        $d= new Criteria();
        $d->add(Contabc1Peer::NUMCOM,$numcom);
        $reg= Contabc1Peer::doSelect($d);
        if ($reg)
        {
          foreach ($reg as $obj)
          {
          	$obj->delete();
          }
         $datos->delete();
        }
      }else
      {
      	$msj="El Comprobante Nro. ".$numcom." no puede ser Eliminado por que ya fue Actualizado en Contabilidad";
      }
    }
    else
    {
      $msj="El Comprobante Nro. ".$numcom." ya fué eliminado anterioridad";
    }
  }

  public static function articulosConsignacion($codart)
  {
  	$art_consig=H::getX('CODART','Caregart','Mercon',$codart);
  	if ($art_consig=='S')
  	{
  	 $articulo_consig=true;
  	}
  	else
  	{
  	  $articulo_consig=false;
  	}
   return $articulo_consig;
  }

  public static function arregloPedidos($codreferencia,$tipref,&$encontro,&$msj,&$arreglodet,&$p,&$sin_cta_aso,&$tienerec)
  {
  	$msj="";
  	$p="";
    $tienerec="";
  	$fila1=""; $fila2=""; $fila3=""; $fila4=""; $fila5=""; $fila6="0,00"; $fila7="0,00"; $fila8="0,00"; $fila9="0,00"; $fila10="0,00"; $fila11="0,00"; $fila12="0,00";
  	$fila13="0,00"; $fila14="0,00"; $fila15="0,00"; $fila16="0,00"; $fila17=""; $fila18="0,00"; $fila19=""; $fila20=""; $fila21=""; $fila22="0,00";
    $c= new Criteria();
	$c->add(FaartpedPeer::NROPED,$codreferencia);
	$reg2= FaartpedPeer::doSelect($c);
	if ($reg2)
	{

    $l= new Criteria();
    $l->add(FargopedPeer::REFDOC,$codreferencia);
    $sitrajo= FargopedPeer::doSelectOne($l);
    if ($sitrajo)
    {
      $tienerec="S";
    }

	  $arreglodet="";
	  foreach ($reg2 as $objdato)
	  {
        $diferencia=0;
        $cant_total=0;

        $sql="Select cantot as cantot From FaArtFac where CODART='".$objdato->getCodart()."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where STATUS<>'N' AND TipRef='".$tipref."')";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $e=0;
          $p="artped";
          while ($e<count($result))
          {
          	$cant_total= $cant_total + $result[$e]["cantot"];
          	$e++;
          }
          $encontro=false;
          if ($objdato->getCantot()<= $cant_total)
          {
          	$encontro=true;
          }
          $diferencia= $objdato->getCantot() - $cant_total;
          if ($encontro==false)
          {
	         $fila1='0';
	         $fila2=$codreferencia;
	         $fila3=$objdato->getCodart();

             $a= new Criteria();
             $a->add(CaregartPeer::CODART,$objdato->getCodart());
             $reg= CaregartPeer::doSelectOne($a);
             if ($reg)
             {
             	$fila4=$reg->getDesart();
             	$fila5=$reg->getUnimed();
             	$fila14=number_format($reg->getDistot(),2,',','.');
             	if ($reg->getCtavta()=="")
             	{
             	  $sin_cta_aso='N';
             	}else $sin_cta_aso='S';
             }

             $fila7=number_format($objdato->getCantot(),2,',','.');
             $fila8=number_format($diferencia,2,',','.');
             $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());
             if ($diferencia==0)
             {
             	$fila16=number_format($objdato->getCantot(),2,',','.');
             }else $fila16=number_format($diferencia,2,',','.');
             $canentart=0;
             if (H::convnume($fila8)<= (H::convnume($fila14) - $canentart))
             {
               $fila8=$fila8;
               $fila6= H::convnume($fila14) - H::convnume($fila8 -$canentart);
             }else
             {
               $fila6="0";
               if ($reg->getTipo()=='A')  $fila8=$fila14;
             }
             $fila10=number_format($objdato->getPreart(),2,',','.');
             $fila11=number_format($objdato->getPreart(),2,',','.');
             $fila15=number_format($objdato->getPreart(),2,',','.');

             $colum=self::determinarReferenciaDoc($tipref);
             if ($objdato->getMonrgo()>0) {
               $fila12=H::FormatoMonto($objdato->getMonrgo());
               $fila1='1';
             }else
               $fila12="0,00";

             $fila15="0,00";
             $fila17="";
             $fila18="0,00";
             $fila19="";
             $fila20='0';
             $fila22="";
             $fila9="0,00";
             $cal=H::toFloat($fila10)*H::toFloat($fila8)+H::toFloat($fila12);
             //$fila13=number_format($cal,2,',','.');
             $fila13=number_format($objdato->getTotart(),2,',','.');
	         //$encontro=true;
	         //cambio moneda
             $fila23=number_format($objdato->getBtucon(),2,',','.');

          }

        }
        else
        {
        	$fila1='0';
	         $fila2=$codreferencia;
	         $fila3=$objdato->getCodart();

             $a= new Criteria();
             $a->add(CaregartPeer::CODART,$objdato->getCodart());
             $reg= CaregartPeer::doSelectOne($a);
             if ($reg)
             {
             	$fila4=$reg->getDesart();
             	$fila5=$reg->getUnimed();
             	$fila14=number_format($reg->getDistot(),2,',','.');
             	if ($reg->getCtavta()=="")
             	{
             	  $sin_cta_aso='N';
             	}else $sin_cta_aso='S';
             }           

             $fila7=number_format($objdato->getCantot(),2,',','.');
             $fila8=number_format($objdato->getCantot(),2,',','.');
             $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());
             if ($diferencia==0)
             {
             	$fila16=number_format($objdato->getCantot(),2,',','.');
             }else $fila16=number_format($diferencia,2,',','.');
             $canentart=0;
             if (H::convnume($fila8)<= (H::convnume($fila14) - $canentart))
             {
               $fila8=$fila8;
               $fila6= H::convnume($fila14) - H::convnume($fila8 -$canentart);
             }else
             {
               $fila6="0";
               if ($reg->getTipo()=='A') $fila8=$fila14;
             }
             $fila10=number_format($objdato->getPreart(),2,',','.');
             $fila11=number_format($objdato->getPreart(),2,',','.');
             $fila15=number_format($objdato->getPreart(),2,',','.');

             $colum=self::determinarReferenciaDoc($tipref);
             if ($objdato->getMonrgo()>0) {
               $fila12=H::FormatoMonto($objdato->getMonrgo());
               $fila1='1';
             }else
               $fila12="0,00";

             $fila17="";
             $fila18="0,00";
             $fila19="";
             $fila20='0';
             $fila22="";
             $fila9="0,00";
             $cal=H::toFloat($fila10)*H::toFloat($fila7)+H::toFloat($fila12);
             //$fila13=number_format($cal,2,',','.');
             $fila13=number_format($objdato->getTotart(),2,',','.');
	         //$encontro=true;
	         //cambio moneda
             $fila23=number_format($objdato->getBtucon(),2,',','.');
        }

        $arreglodet=$arreglodet.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'_'.$fila9.'_'.$fila10.'_'.$fila11.'_'.$fila12.'_'.$fila13.'_'.$fila14.'_'.$fila15.'_'.$fila16.'_'.$fila17.'_'.$fila18.'_'.$fila19.'_'.$fila20.'_'.$fila21.'_'.$fila22.'_'.$fila23.'!';

	  }
	}
	else
	{
	  $msj="alert('No Existen Datos Asociados al Criterio Seleccionado');";
	}
    return true;
  }

  public static function arregloDespachos($codreferencia,$tipref,&$encontro,&$msj,&$arreglodet,&$p,&$sin_cta_aso)
  {
  	$msj="";
  	$p="";
  	$fila1=""; $fila2=""; $fila3=""; $fila4=""; $fila5=""; $fila6="0,00"; $fila7="0,00"; $fila8="0,00"; $fila9="0,00"; $fila10="0,00"; $fila11="0,00"; $fila12="0,00";
  	$fila13="0,00"; $fila14="0,00"; $fila15="0,00"; $fila16="0,00"; $fila17=""; $fila18="0,00"; $fila19=""; $fila20=""; $fila21=""; $fila22="0,00";
    if ($tipref=='D' || $tipref=='VC')
    {
      $c= new Criteria();
      $c->add(CaartdphPeer::DPHART,$codreferencia);
      $resul= CaartdphPeer::doSelect($c);
      if ($resul)
      {
      	$arreglodet="";
        foreach ($resul as $objdato)
	    {
        $cantotdesp=$objdato->getCandph()-$objdato->getCandev();
        if ($cantotdesp>0) {
	      $diferencia=0;
          $cant_total=0;

          $sql="Select codart as codart, cantot as cantot From FaArtFac where CODART='".$objdato->getCodart()."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where TipRef='".$tipref."' and Status<>'N')";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $e=0;
            while ($e<count($result))
            {
          	  $cant_total= $cant_total + $result[$e]["cantot"];
          	  $e++;
            }
            $encontro=false;
            //if ($objdato->getCandph()<= $cant_total)
            if ($cantotdesp<= $cant_total)
            {
           	 $encontro=true;
            }
            //$diferencia= $objdato->getCandph() - $cant_total;
            $diferencia= $cantotdesp - $cant_total;

            if ($encontro==false)
            {
                 $fila1='0';
		         $fila2=$codreferencia;
		         $fila3=$objdato->getCodart();
                 $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());

	             $a= new Criteria();
	             $a->add(CaregartPeer::CODART,$objdato->getCodart());
	             $reg= CaregartPeer::doSelectOne($a);
	             if ($reg)
	             {
	             	$fila4=$reg->getDesart();
	             	$fila5=$reg->getUnimed();
	             	$fila6=number_format($reg->getDistot(),2,',','.');
	             	$fila14=number_format($reg->getDistot(),2,',','.');
	             	if ($reg->getCtavta()=="")
	             	{
	             	  $sin_cta_aso='N';
	             	}else $sin_cta_aso='S';
	             }

	             $fila9=number_format($diferencia,2,',','.');

	             $a= new Criteria();
	             $a->add(CadphartPeer::DPHART,$objdato->getDphart());
	             $registro= CadphartPeer::doSelectOne($a);
	             if ($registro)
	             {
                   $e= new Criteria();
                   $e->add(FaartnotPeer::CODART,$objdato->getCodart());
                   $e->add(FaartnotPeer::NRONOT,$registro->getReqart());
                   $data= FaartnotPeer::doSelectOne($e);
                   if ($data)
                   {
                   	 $fila10=number_format($data->getPreart(),2,',','.');
	                 $fila14=number_format($data->getPreart(),2,',','.');
                   }
                   else
                   {
                   	$fila10="0,00";
                   	$fila11="0,00";
                    $fila15="0,00";
                   }

                   $fila12="0,00";
                   //$fila13=number_format($objdato->getMontot(),2,',','.');
                   $cal=H::toFloat($fila10)*H::toFloat($fila9);
                   $fila13=number_format($cal,2,',','.');
	             }
	             else
	             {
                   $fila10="0,00";
                   $fila11="0,00";
                   $fila12="0,00";
                   $fila13="0,00";
                   $fila15="0,00";
	             }


	             $fila7="0,00";
	             $fila8="0,00";
                 $fila16="0,00";
	             $fila17="";
	             $fila18="0,00";
	             $fila19="";
	             $fila20='0';
	             $fila22="";
		         //$encontro=true;
		         //cambio moneda
            }
          }
          else
          {
          	     $p="artped";
          	     $fila1='0';
		         $fila2=$codreferencia;
		         $fila3=$objdato->getCodart();
                 $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());

	             $a= new Criteria();
	             $a->add(CaregartPeer::CODART,$objdato->getCodart());
	             $reg= CaregartPeer::doSelectOne($a);
	             if ($reg)
	             {
	             	$fila4=$reg->getDesart();
	             	$fila5=$reg->getUnimed();
	             	$fila6=number_format($reg->getDistot(),2,',','.');
	             	$fila14=number_format($reg->getDistot(),2,',','.');
	             	if ($reg->getCtavta()=="")
	             	{
	             	  $sin_cta_aso='N';
	             	}else $sin_cta_aso='S';
	             }

	             //$fila9=number_format($objdato->getCandph(),2,',','.');
               $fila9=number_format($cantotdesp,2,',','.');               

	             $a= new Criteria();
	             $a->add(CadphartPeer::DPHART,$objdato->getDphart());
	             $registro= CadphartPeer::doSelectOne($a);
	             if ($registro)
	             {
                   $e= new Criteria();
                   $e->add(FaartnotPeer::CODART,$objdato->getCodart());
                   $e->add(FaartnotPeer::NRONOT,$registro->getReqart());
                   $data= FaartnotPeer::doSelectOne($e);
                   if ($data)
                   {
                   	 $fila10=number_format($data->getPreart(),2,',','.');
                   	 $fila11=number_format($data->getPreart(),2,',','.');
	                 $fila15=number_format($data->getPreart(),2,',','.');
                   }
                   else
                   {
                   	$fila10=number_format($objdato->getPreart(),2,',','.');
                   	 $fila11=number_format($objdato->getPreart(),2,',','.');
	                 $fila15=number_format($objdato->getPreart(),2,',','.');
                   }

                   $fila12="0,00";
                   $fila13=number_format($objdato->getMontot(),2,',','.');
	             }
	             else
	             {
                   $fila10="0,00";
                   $fila11="0,00";
                   $fila12="0,00";
                   $fila13="0,00";
                   $fila15="0,00";
	             }


	             $fila7="0,00";
	             $fila8="0,00";
                 $fila16="0,00";
	             $fila17="";
	             $fila18="0,00";
	             $fila19="";
	             $fila20='0';
	             $fila22="";
	             $cal=H::convnume($fila10)*H::convnume($fila9);
                 $fila13=number_format($cal,2,',','.');
		         //$encontro=true;
		         //cambio moneda

          }
        
          $arreglodet=$arreglodet.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'_'.$fila9.'_'.$fila10.'_'.$fila11.'_'.$fila12.'_'.$fila13.'_'.$fila14.'_'.$fila15.'_'.$fila16.'_'.$fila17.'_'.$fila18.'_'.$fila19.'_'.$fila20.'_'.$fila21.'_'.$fila22.'!';
        }	    
      }
      }
      else
      {
        $msj="alert('No Existen Datos Asociados al Criterio Seleccionado');";
      }
    }
  }

  public static function datosRecargos($rgofijos,$reffac,&$arreglorec,&$trajo)
  {
  	if ($rgofijos=='S')
    {
      $c= new Criteria();
      $c->add(FarecargPeer::CALCUL,'S');
      $resul= FarecargPeer::doSelect($c);
    }
    else
    {
      $c= new Criteria();
      $c->add(FargoartPeer::REFDOC,$reffac);
      $c->add(FargoartPeer::TIPDOC,'F');
      $resul= FargoartPeer::doSelect($c);
    }
    $trajo=true;
    if ($resul)
    {
      $arreglorec="";
      foreach ($resul as $obj)
      {
      	$fila1=$obj->getCodrgo();
      	$c= new Criteria();
      	$c->add(FarecargPeer::CODRGO,$obj->getCodrgo());
      	$reg= FarecargPeer::doSelectOne($c);
      	if ($reg)
      	{
      	  $fila2=$reg->getNomrgo();
      	  if ($reg->getCalcul()=='S')
      	  {
      	  	$fila3="Si";
      	  }else $fila3="No";

      	 $fila4=number_format($obj->getMonrgo(),2,',','.');
      	 $fila5=$reg->getCodcta();
      	 $fila6=$reg->getTiprgo();
      	 $fila7=number_format($reg->getMonrgo(),2,',','.');

      	$arreglorec=$arreglorec.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'!';
      	}
      }
    }
    else
    {
    	$trajo=false;
    }
  }

  public static function mostrarDescuentos($tipcli,&$arreglodesc)
  {
  	$arreglodesc="";
    $a= new Criteria();
    $a->add(FadtoctePeer::FATIPCTE_ID,$tipcli);
    $resul= FadtoctePeer::doSelect($a);
    if ($resul)
    {
      foreach ($resul as $obj)
      {
        $d= new Criteria();
        $d->add(FadesctoPeer::CODDESC,$obj->getCoddto());
        $reg= FadesctoPeer::doSelectOne($d);
        if ($reg)
        {
          $fila1=$reg->getCoddesc();
          $fila2=$reg->getDesdesc();
          if ($reg->getTipdesc()=='M')
          {
            $fila3=number_format($reg->getMondesc(),2,',','.');
          }
          else
          {
          	$fila3="0,00";
          }
          $fila4=$reg->getCodcta();
          $fila5="";
          $fila6=number_format($reg->getMondesc(),2,',','.');
          $fila7=$reg->getTipdesc();
          $fila8=$reg->getTipret();

         $arreglodesc=$arreglodesc.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'!';
        }

      }
    }
    else
    {
      $fila1="";
      $fila2="";
      $fila3="0,00";
      $fila4="";
      $fila5="1";
      $fila6="";
      $fila7="";
      $fila8="";
      $arreglodesc=$arreglodesc.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'!';
    }
  }

  public static function PreciosRepetidos($grid)
  {
  	$precios_repetidos=false;
    return $precios_repetidos;
  	$x=$grid[0];
    $i=0;
    if (count($x)>0)
    {
  	  while ($i<count($x))
  	  {
  	   	$j=0;
        while ($j<count($x))
  	    {
          if ($i!=$j)
          {
            if ($x[$j]->getCodart() !='' && $x[$i]->getCodart()==$x[$j]->getCodart())
            {
            	if ($x[$i]->getPrecio()=="0,00")
            	{
            	  if ($x[$i]->getPrecioe()!=$x[$j]->getPrecioe())
            	  {
            	  	$precios_repetidos=true;
            	  	return $precios_repetidos;
            	  }
            	}
            	else
            	{
            	  if ($x[$i]->getPrecio()!=$x[$j]->getPrecio())
            	  {
            	  	$precios_repetidos=true;
            	  	return $precios_repetidos;
            	  }
              }
            }
          }
	        $j++;
	      }
 	    $i++;
 	    }
    }
    return $precios_repetidos;
  }

  public static function Verificar_pago($grid,$monfac,$tipconpag)
  {
  	$verificar_pago=false;
  	if (self::Pago_Mayor_Igual($grid,$monfac)==true)
  	{
  	  if ($tipconpag=='C')
  	  {
  	  	$verificar_pago=true;
  	  }
  	}
  	else
  	{
  	  if ($tipconpag=='R')
  	  {
  	  	$verificar_pago=true;
  	  }
  	}
  	return  $verificar_pago;
  }

  public static function Pago_Mayor_Igual($grid,$monfac)
  {
  	$pago_mayor_igual=false;
  	$monto_pago=0;
  	$x=$grid[0];
    $i=0;
    if (count($x)>0)
    {
	  while ($i<count($x))
	  {
	    if ($x[$i]->getMonpag()!="0,00")
	    {
	      $monto_pago= $monto_pago + $x[$i]->getMonpag();
	    }
	  	$i++;
	  }

	  if ($monto_pago>=$monfac)
	  {
	  	$pago_mayor_igual=true;
	  }
    }
    return $pago_mayor_igual;
  }

  public static function grabarFacturaLibro($fafactur,$grid6)
  {
      $x=$grid6[0];
      $i=0;
      while ($i<count($x))
      {
        if ($x[$i]->getFecfac()!="" && $x[$i]->getRifpro()!="" && $x[$i]->getTotfac()>0)
        {
           $x[$i]->setReffac($fafactur->getReffac());
           $x[$i]->setCodcli(H::getX('RIFPRO','Facliente','CODPRO',$x[$i]->getRifpro()));
           $x[$i]->save();
}
       $i++;
      }

    $z=$grid6[1];
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
  public static function generaFacturaLibro($fafactur,$grid1,$grid4)
  {
    $col=self::determinarReferenciaDoc($fafactur->getTipref());
    $x=$grid1[0];
    $j=0;
    $cantot=0;
    if ($x[$j]->getCodart()!="")
    {
      $monto=0;
      $acum=0;
      while ($j<count($x))
      {
            eval('$cantot = $x[$j]->get'.ucfirst(strtolower($col)).'();');
	    if ($x[$j]->getCodart()!="" && $cantot>0)
	    {
	     if ($x[$j]->getPrecio()=="")
	     {
	     	$precio=$x[$j]->getPrecioe();
	     }else $precio=$x[$j]->getPrecio();

             $calculo=$cantot*$precio;

             if($x[$j]->getMonrgo()==0 || $x[$j]->getMonrgo()=='')
             {
                $monto+=$calculo;
             }else {
                 $acum+=$calculo;
             }
	    }            
	    $j++;
     }
    }

    $z=$grid4[0];
    $j=0;
    $acumrec=0;
    $valrec="";
    while ($j<count($z))
    {
      if ($z[$j]->getCodrgo()!="")
      {
        $valrec=$z[$j]->getCodrgo();
        $acumrec+=$z[$j]->getMonrgo();
      }
      $j++;
    }


      $fafaclib= new Fafaclib();
      $fafaclib->setFecfac($fafactur->getFecfac());
      $fafaclib->setReffac($fafactur->getReffac());
      $fafaclib->setNumfac($fafactur->getReffac());
      $fafaclib->setNumctr($fafactur->getNumcontrol());
      $fafaclib->setCodcli($fafactur->getCodcli());
      $fafaclib->setTotfac($fafactur->getMonfac());
      if ($fafactur->getTipoven()=='E')
        $fafaclib->setValfob($fafactur->getMonfac());
      $fafaclib->setVenexec($monto);
      $fafaclib->setBasimp($acum);
      $conac=H::getConfApp2('conac', 'facturacion', 'fafactur');
      if ($conac=='S')
          $fafaclib->setCrefis($acum*0.12);
      else
        $fafaclib->setCrefis($fafactur->getMondesc());
      if ($valrec!="") {
      $fafaclib->setPoriva(H::getX('Codrgo','Farecarg','Monrgo',$valrec));
          if ($conac=='S') {
              $poriva=H::getX_vacio('CODPRO', 'Facliente', 'Poriva', $fafactur->getCodcli());
              if ($poriva=="") $poriva=75;
              $fafaclib->setMoniva(($acum*0.12)*$poriva);
          }
          else
              $fafaclib->setMoniva($acumrec);      
      }
      $fafaclib->save();
  }

  public static function grabarDescuentoArticuloPro($fafactur,$grid1,$grid2)
  {
     $z=$grid1[0];
      $j=0;
      $acumart=0;
      while ($j<count($z))
      {
          if ($z[$j]->getDescuentos()!='')
          {
             $cadenades=split('!',$z[$j]->getDescuentos());
             $r=0;
             while ($r<(count($cadenades)-1))
             {
               $aux=$cadenades[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                  $c= new Criteria();
                  $c->add(FadescartproPeer::REFDOC,$fafactur->getReffac());
                  $c->add(FadescartproPeer::CODART,$z[$j]->getCodart());
                  $c->add(FadescartproPeer::DESART,$z[$j]->getDesart());
                  $c->add(FadescartproPeer::CODDESC,$aux2[0]);                
                  FadescartproPeer::doDelete($c);
                  /*$trajo=FadescartproPeer::doSelectOne($c);
                  if ($trajo)
                  {
                       if ($aux2[6]=="M")
                       {
                         $monpro=self::proporcion($j,$grid1);
                         $descart= (H::toFloat($aux2[2]) * $monpro/100);
                       }
                       else
                       {
                         if ($z[$j]->getPrecio()!="")
                         {
                                $precio=$z[$j]->getPrecio();
                         }else $precio=$z[$j]->getPrecioe();

                         if ($fafactur->getEsretencion()=='N')
                         {
                           $descart= (($z[$j]->getCantot() * $precio * H::toFloat($aux2[2]))/100);
                         }
                         else
                         {
                           $descart= (($z[$j]->getMonrgo() * H::toFloat($aux2[2]))/100);
                         }
                       }

                       $acumart= $acumart + $descart;
                       if ($j==(count($z)-1))
                       {
                        $diferencia= round(($acumart - $z[$j]->getMondes()),2);
                        $descart= $descart + $diferencia;
                       }
                      $trajo->setMondetdesc($trajo->getMondetdesc() + $descart);
                      $trajo->save();
                  }
                  else {*/
                      $fadescartpro2= new Fadescartpro();
                      $fadescartpro2->setCodart($z[$j]->getCodart());
                      $fadescartpro2->setDesart($z[$j]->getDesart());
                      $fadescartpro2->setRefdoc($fafactur->getReffac());
                      $fadescartpro2->setCoddesc($aux2[0]);
                      $fadescartpro2->setMondesc(H::toFloat($aux2[2]));

                       if ($aux2[6]=="M")
                       {
                         $monpro=self::proporcion($j,$grid1);
                         $descart= (H::toFloat($aux2[2]) * $monpro/100);
                       }
                       else
                       {
                         if ($z[$j]->getPrecio()!="")
                         {
                                $precio=$z[$j]->getPrecio();
                         }else $precio=$z[$j]->getPrecioe();

                         if ($fafactur->getEsretencion()=='N')
                         {
                           $descart= (($z[$j]->getCantot() * $precio * H::toFloat($aux2[2]))/100);
                         }
                         else
                         {
                           $descart= (($z[$j]->getMonrgo() * H::toFloat($aux2[2]))/100);
                         }
                       }

                       $acumart= $acumart + $descart;
                       if ($j==(count($z)-1))
                       {
                        $diferencia= round(($acumart - $z[$j]->getMondes()),2);
                        $descart= $descart + $diferencia;
                       }
                      $fadescartpro2->setMondetdesc($descart);
                      $fadescartpro2->setTipdoc('F');
                      $fadescartpro2->save();
                  //}
              }
             $r++;
            }//while
           }//if ($x[$j]->getDescuentos()!='')    
        
      	$j++;
      }
  }
  
  public static function grabarRecargoArticuloPro($fafactur,$grid1,$grid4)
  {
        $x=$grid1[0];
        $i=0;
        while ($i<count($x))
        {     
          if ($x[$i]->getRecargos()!='')
          {
             $cadenarec=split('!',$x[$i]->getRecargos());
             $r=0;
             while ($r<(count($cadenarec)-1))
             {
               $aux=$cadenarec[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                  $c= new Criteria();
                  $c->add(FargoartproPeer::REFDOC,$fafactur->getReffac());
                  $c->add(FargoartproPeer::CODART,$x[$i]->getCodart());
                  $c->add(FargoartproPeer::DESART,$x[$i]->getDesart());
                  $c->add(FargoartproPeer::CODRGO,$aux2[0]);  
                  FargoartproPeer::doDelete($c);              
                 /* $trajo= FargoartproPeer::doSelectOne($c);
                  if ($trajo)
                  {
                      $trajo->setMonrgo($trajo->getMonrgo() + H::toFloat($aux2[3]));
                      $trajo->save();
                  }
                  else {*/
                      $fargoartpro2= new Fargoartpro();
                      $fargoartpro2->setCodart($x[$i]->getCodart());
                      $fargoartpro2->setDesart($x[$i]->getDesart());
                      $fargoartpro2->setRefdoc($fafactur->getReffac());
                      $fargoartpro2->setCodrgo($aux2[0]);
                      $fargoartpro2->setMonrgo(H::toFloat($aux2[3]));
                      $fargoartpro2->setTipdoc('F');
                      $fargoartpro2->save();
                  //}
              }
             $r++;
            }//while
           }//if ($x[$j]->getRecargos()!='')          
          $i++;
        }      
  }
  
  public static function mostrarDescuentosArticulos($tipcli,$codart,&$arreglodesc)
  {
    $arreglodesc="";
    $a= new Criteria();
    $a->add(FaartdtoctePeer::FATIPCTE_ID,$tipcli);
    $a->add(FaartdtoctePeer::CODART,$codart);
    $resul= FaartdtoctePeer::doSelectOne($a);
    if ($resul)
    {
        $d= new Criteria();
        $d->add(FadesctoPeer::CODDESC,$resul->getCoddesc());
        $reg= FadesctoPeer::doSelectOne($d);
        if ($reg)
        {
          $fila1=$reg->getCoddesc();
          $fila2=$reg->getDesdesc();
          if ($reg->getTipdesc()=='M')
          {
            $fila3=number_format($reg->getMondesc(),2,',','.');
          }
          else
          {
          	$fila3="0,00";
          }
          $fila4=$reg->getCodcta();
          $fila5="1";
          $fila6=number_format($reg->getMondesc(),2,',','.');
          $fila7=$reg->getTipdesc();
          $fila8=$reg->getTipret();

          $arreglodesc=$arreglodesc.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'!';
        }
      
    }   
  }  

 /*public static function buscarDespachos($codcli,$fechoy,$fecdes,$fechas,&$reg)
  {
     $reg=array();      
     if ($fecdes!="" && $fechas!="") {
      $sql = "Select '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id 
                from CADPHART A LEFT OUTER JOIN FANOTENT B ON (A.REQART=B.NRONOT AND (B.TIPNOT='D' OR B.TIPREF='F')) 
                WHERE A.CodCli='".$codcli."' and A.STADPH='A' and A.TIPDPH<>'D' and A.FECDPH>='".$fecdes."' AND A.FECDPH<='".$fechas."' and 
                B.NRONOT IS NULL  order by A.DPHART";
     }else  if ($fechoy!="" ){
         $sql = "Select '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id 
                from CADPHART A LEFT OUTER JOIN FANOTENT B ON (A.REQART=B.NRONOT AND (B.TIPNOT='D' OR B.TIPREF='F')) 
                WHERE A.CodCli='".$codcli."' and A.STADPH='A' and A.TIPDPH<>'D' and  A.FECDPH='".$fechoy."' and 
                B.NRONOT IS NULL  order by A.DPHART";
     }else {         
         $sql = "Select '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id 
                from CADPHART A LEFT OUTER JOIN FANOTENT B ON (A.REQART=B.NRONOT AND (B.TIPNOT='D' OR B.TIPREF='F')) 
                WHERE A.CodCli='".$codcli."' and A.STADPH='A' and A.TIPDPH<>'D' and  
                B.NRONOT IS NULL  order by A.DPHART";     
     }
      if (Herramientas::BuscarDatos($sql,&$res))
      {
          $p=0;          
          while ($p<count($res))
            { 
              $encontro=false;
              $c= new Criteria();
              $c->add(CaartdphPeer::DPHART,$res[$p]["dphart"]);
              $resul= CaartdphPeer::doSelect($c);
              if ($resul)
              {                
                foreach ($resul as $objdato)
                {
                  $diferencia=0;
                  $cant_total=0;
                  $sql1="Select A.codart as codart, A.cantot as cantot From FaArtFac A, FAFACTUR B  
                            where A.CODART='".$objdato->getCodart()."' AND A.codref = '".$res[$p]["dphart"]."' 
                            and A.RefFac=B.RefFac AND B.TipRef='D' and B.Status<>'N'";
                  if (Herramientas::BuscarDatos($sql1,&$result))
                  {
                    $e=0;
                    while ($e<count($result))
                    {
                          $cant_total= $cant_total + $result[$e]["cantot"];
                          $e++;
                    }

                    if ($objdato->getCandph()<= $cant_total)
                    {
                         $encontro=true;
                         break;
                    }           
                    
                  }                  
                }
                if ($encontro==false)
                {
                 $j=count($reg)+1;
                 $reg[$j-1]["check"]=$res[$p]["check"];
                 $reg[$j-1]["dphart"]=$res[$p]["dphart"];
                 $reg[$j-1]["desdph"]=$res[$p]["desdph"];
                 $reg[$j-1]["fecdph"]=$res[$p]["fecdph"];
                 $reg[$j-1]["id"]="9";
                }
              }              
              $p++;
            }
      }
  }   */
  
  public static function buscarDespachos($codcli,$fechoy,$fecdes,$fechas,$codalm,&$reg)
  {
     $reg=array();      
     $fildesp=H::getConfApp2('fildes', 'facturacion', 'fadesp');
     if ($fildesp=='S') {
         $con1=", F.STADEV";
         $con2="and A.STADEV='S'";
     }else {
         $con1=""; $con2="";
     }
     if ($fecdes!="" && $fechas!="") {
         if ($codalm!="") {
            $sql = "Select DISTINCT '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id
                FROM 
                (
                SELECT CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,SUM(CANDPH) AS CANDPH,STADPH,TIPDPH,G.CODALM ".$con1."
                from CADPHART F,CAARTDPH G WHERE F.DPHART=G.DPHART
                GROUP BY CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,STADPH,TIPDPH,G.CODALM ".$con1."
                ) A LEFT OUTER JOIN
                (
                SELECT D.CODART,SUM(CANTOT) AS CANFAC,CODREF 
                FROM FAARTFAC D,FAFACTUR E WHERE D.REFFAC=E.REFFAC AND TIPREF='D' AND STATUS<>'N'
                GROUP BY D.CODART,D.CODREF
                ) B ON (A.DPHART=B.CODREF  AND A.CODART=B.CODART)
                WHERE
                A.CodCli='".$codcli."' AND 
                A.STADPH='A' and A.TIPDPH<>'D'AND
                A.FECDPH>='".$fecdes."' AND 
                A.FECDPH<='".$fechas."' AND
                A.CANDPH>COALESCE(CANFAC,0) AND
                A.CODALM='".$codalm."'
                ".$con2."
                order by A.DPHART";
         }else {
             $sql = "Select DISTINCT '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id
                FROM 
                (
                SELECT CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,SUM(CANDPH) AS CANDPH,STADPH,TIPDPH ".$con1."
                from CADPHART F,CAARTDPH G WHERE F.DPHART=G.DPHART
                GROUP BY CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,STADPH,TIPDPH ".$con1."
                ) A LEFT OUTER JOIN
                (
                SELECT D.CODART,SUM(CANTOT) AS CANFAC,CODREF 
                FROM FAARTFAC D,FAFACTUR E WHERE D.REFFAC=E.REFFAC AND TIPREF='D' AND STATUS<>'N'
                GROUP BY D.CODART,D.CODREF
                ) B ON (A.DPHART=B.CODREF  AND A.CODART=B.CODART)
                WHERE
                A.CodCli='".$codcli."' AND 
                A.STADPH='A' and A.TIPDPH<>'D'AND
                A.FECDPH>='".$fecdes."' AND 
                A.FECDPH<='".$fechas."' AND
                A.CANDPH>COALESCE(CANFAC,0)
                ".$con2."
                order by A.DPHART";
         }
     }else  if ($fechoy!="" ){
         if ($codalm!="") {
            $sql = "Select DISTINCT '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id
            FROM 
            (
            SELECT CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,SUM(CANDPH) AS CANDPH,STADPH,TIPDPH,G.CODALM ".$con1."
            from CADPHART F,CAARTDPH G WHERE F.DPHART=G.DPHART
            GROUP BY CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,STADPH,TIPDPH,G.CODALM ".$con1."
            ) A LEFT OUTER JOIN
            (
            SELECT D.CODART,SUM(CANTOT) AS CANFAC,CODREF 
            FROM FAARTFAC D,FAFACTUR E WHERE D.REFFAC=E.REFFAC AND TIPREF='D' AND STATUS<>'N'
            GROUP BY D.CODART,D.CODREF
            ) B ON (A.DPHART=B.CODREF  AND A.CODART=B.CODART)
            WHERE
            A.CodCli='".$codcli."' AND 
            A.STADPH='A' and A.TIPDPH<>'D'AND
            A.FECDPH>='".$fechoy."' AND 
            A.FECDPH<='".$fechoy."' AND
            A.CANDPH>COALESCE(CANFAC,0) AND
            A.CODALM='".$codalm."'
            ".$con2."
            order by A.DPHART";
         }else {
                         $sql = "Select DISTINCT '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id
            FROM 
            (
            SELECT CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,SUM(CANDPH) AS CANDPH,STADPH,TIPDPH ".$con1."
            from CADPHART F,CAARTDPH G WHERE F.DPHART=G.DPHART
            GROUP BY CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,STADPH,TIPDPH ".$con1."
            ) A LEFT OUTER JOIN
            (
            SELECT D.CODART,SUM(CANTOT) AS CANFAC,CODREF 
            FROM FAARTFAC D,FAFACTUR E WHERE D.REFFAC=E.REFFAC AND TIPREF='D' AND STATUS<>'N'
            GROUP BY D.CODART,D.CODREF
            ) B ON (A.DPHART=B.CODREF  AND A.CODART=B.CODART)
            WHERE
            A.CodCli='".$codcli."' AND 
            A.STADPH='A' and A.TIPDPH<>'D'AND
            A.FECDPH>='".$fechoy."' AND 
            A.FECDPH<='".$fechoy."' AND
            A.CANDPH>COALESCE(CANFAC,0)
            ".$con2."
            order by A.DPHART";
         }
     }else {         
         if ($codalm!="") {
            $sql = "Select DISTINCT '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id
            FROM 
            (
            SELECT CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,SUM(CANDPH) AS CANDPH,STADPH,TIPDPH,G.CODALM ".$con1."
            from CADPHART F,CAARTDPH G WHERE F.DPHART=G.DPHART
            GROUP BY CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,STADPH,TIPDPH,G.CODALM ".$con1."
            ) A LEFT OUTER JOIN
            (
            SELECT D.CODART,SUM(CANTOT) AS CANFAC,CODREF 
            FROM FAARTFAC D,FAFACTUR E WHERE D.REFFAC=E.REFFAC AND TIPREF='D' AND STATUS<>'N'
            GROUP BY D.CODART,D.CODREF
            ) B ON (A.DPHART=B.CODREF  AND A.CODART=B.CODART)
            WHERE
            A.CodCli='".$codcli."' AND 
            A.STADPH='A' and A.TIPDPH<>'D'AND         
            A.CANDPH>COALESCE(CANFAC,0)AND
            A.CODALM='".$codalm."'
            ".$con2."
            order by A.DPHART";     
         }else {
             $sql = "Select DISTINCT '' as check, A.DPHART as dphart,A.DESDPH as desdph,A.FECDPH as fecdph, 9 as id
                    FROM 
                    (
                    SELECT CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,SUM(CANDPH) AS CANDPH,STADPH,TIPDPH ".$con1."
                    from CADPHART F,CAARTDPH G WHERE F.DPHART=G.DPHART
                    GROUP BY CODCLI,F.DPHART,F.DESDPH,FECDPH,G.CODART,STADPH,TIPDPH ".$con1."
                    ) A LEFT OUTER JOIN
                    (
                    SELECT D.CODART,SUM(CANTOT) AS CANFAC,CODREF 
                    FROM FAARTFAC D,FAFACTUR E WHERE D.REFFAC=E.REFFAC AND TIPREF='D' AND STATUS<>'N'
                    GROUP BY D.CODART,D.CODREF
                    ) B ON (A.DPHART=B.CODREF  AND A.CODART=B.CODART)
                    WHERE
                    A.CodCli='".$codcli."' AND 
                    A.STADPH='A' and A.TIPDPH<>'D'AND         
                    A.CANDPH>COALESCE(CANFAC,0)
                    ".$con2."
                    order by A.DPHART"; 
         }
     }
      if (Herramientas::BuscarDatos($sql,$res))
      {
          $p=0;          
          while ($p<count($res))
          {               
             $j=count($reg)+1;
             $reg[$j-1]["check"]=$res[$p]["check"];
             $reg[$j-1]["dphart"]=$res[$p]["dphart"];
             $reg[$j-1]["desdph"]=$res[$p]["desdph"];
             $reg[$j-1]["fecdph"]=$res[$p]["fecdph"];
             $reg[$j-1]["id"]=$res[$p]["id"];               
             
             $p++;
          }
      }
  } 
  
  public static function Buscar_Arreglo_Art($arreglo,$codigo)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["codart"]==$codigo)
        { 
            $enc=true;         
        } 
      $ind++;
    }
    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }  
  
public static function generarComprobanteExterno($fafactur,$grid1,$grid3,&$arrcompro,&$msjuno)  
{
    if (!self::generarAsientos2($fafactur,$grid1,$grid3,$arrasientos,$pos,$msjuno))
    {      
      $msjuno=Herramientas::obtenerMensajeError($msjuno);
      return true;
    }    
    
    if ($pos!=0)
    {
      $msjuno="";
      $i=0;
      while ($i<=($pos-1))
      {
        if ($arrasientos[$i]["2"]!="")
        {
          if ($i==0)  
          {
              $cuentas=$arrasientos[$i]["0"];
              $descr=$arrasientos[$i]["1"];
              $tipos=$arrasientos[$i]["2"];
              $montos=$arrasientos[$i]["3"];
          }else {
              $cuentas=$cuentas."_".$arrasientos[$i]["0"];
              $descr=$descr."_".$arrasientos[$i]["1"];
              $tipos=$tipos."_".$arrasientos[$i]["2"];
              $montos=$montos."_".$arrasientos[$i]["3"];
          }
        }        

        $i++;
      }
    }
    
      $reftra="FA".substr($fafactur->getReffac(),2,6);

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom("########");
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($fafactur->getFecfac())));
      $clscommpro->setDestra($fafactur->getDesfac());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;
      
      return  true;
}

  public static function arregloPresupuestos($codreferencia,$tipref,&$encontro,&$msj,&$arreglodet,&$p,&$sin_cta_aso,&$tienerec)
  {
    $msj="";
    $p="";
    $tienerec="";
    $fila1=""; $fila2=""; $fila3=""; $fila4=""; $fila5=""; $fila6="0,00"; $fila7="0,00"; $fila8="0,00"; $fila9="0,00"; $fila10="0,00"; $fila11="0,00"; $fila12="0,00";
    $fila13="0,00"; $fila14="0,00"; $fila15="0,00"; $fila16="0,00"; $fila17=""; $fila18="0,00"; $fila19=""; $fila20=""; $fila21=""; $fila22="0,00";
    $c= new Criteria();
  $c->add(FadetprePeer::REFPRE,$codreferencia);
  $reg2= FadetprePeer::doSelect($c);
  if ($reg2)
  {
    $l= new Criteria();
    $l->add(FargoprePeer::REFDOC,$codreferencia);
    $sitrajo= FargoprePeer::doSelectOne($l);
    if ($sitrajo)
    {
      $tienerec="S";
    }

    $arreglodet="";
    foreach ($reg2 as $objdato)
    {
        $diferencia=0;
        $cant_total=0;

        $sql="Select cantot as cantot From FaArtFac where CODART='".$objdato->getCodart()."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where STATUS<>'N' AND TipRef='".$tipref."')";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $e=0;
          $p="artpre";
          while ($e<count($result))
          {
            $cant_total= $cant_total + $result[$e]["cantot"];
            $e++;
          }
          $encontro=false;
          if ($objdato->getCansol()<= $cant_total)
          {
            $encontro=true;
          }
          $diferencia= $objdato->getCansol() - $cant_total;
          if ($encontro==false)
          {
           $fila1='0';
           $fila2=$codreferencia;
           $fila3=$objdato->getCodart();

             $a= new Criteria();
             $a->add(CaregartPeer::CODART,$objdato->getCodart());
             $reg= CaregartPeer::doSelectOne($a);
             if ($reg)
             {
              $fila4=$reg->getDesart();
              $fila5=$reg->getUnimed();
              $fila14=number_format($reg->getDistot(),2,',','.');
              if ($reg->getCtavta()=="")
              {
                $sin_cta_aso='N';
              }else $sin_cta_aso='S';
             }

             $fila7=number_format($objdato->getCansol(),2,',','.');
             $fila8=number_format($diferencia,2,',','.');
             $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());
             if ($diferencia==0)
             {
              $fila16=number_format($objdato->getCansol(),2,',','.');
             }else $fila16=number_format($diferencia,2,',','.');
             $canentart=0;
             if (H::convnume($fila8)<= (H::convnume($fila14) - $canentart))
             {
               $fila8=$fila8;
               $fila6= H::convnume($fila14) - H::convnume($fila8 -$canentart);
             }else
             {
               $fila6="0";
               $fila8=$fila14;
             }
             $fila10=number_format($objdato->getPrecio(),2,',','.');
             $fila11=number_format($objdato->getPrecio(),2,',','.');
             $fila15=number_format($objdato->getPrecio(),2,',','.');

             $colum=self::determinarReferenciaDoc($tipref);
             if ($objdato->getMonrgo()>0) {
               $fila12=H::FormatoMonto($objdato->getMonrgo());
               $fila1='1';
             }else
               $fila12="0,00";
             $fila15="0,00";
             $fila17="";
             $fila18="0,00";
             $fila19="";
             $fila20='0';
             $fila22="";
             $fila9="0,00";
             $cal=H::toFloat($fila10)*H::toFloat($fila8)+H::toFloat($fila12);
             //$fila13=number_format($cal,2,',','.');
             $fila13=number_format($objdato->getTotart(),2,',','.');
           //$encontro=true;
           //cambio moneda
             $fila23=number_format($objdato->getBtucon(),2,',','.');

          }

        }
        else
        {
           $fila1='0';           
           $fila2=$codreferencia;
           $fila3=$objdato->getCodart();

             $a= new Criteria();
             $a->add(CaregartPeer::CODART,$objdato->getCodart());
             $reg= CaregartPeer::doSelectOne($a);
             if ($reg)
             {
              $fila4=$reg->getDesart();
              $fila5=$reg->getUnimed();
              $fila14=number_format($reg->getDistot(),2,',','.');
              if ($reg->getCtavta()=="")
              {
                $sin_cta_aso='N';
              }else $sin_cta_aso='S';
             }

             $fila7=number_format($objdato->getCansol(),2,',','.');
             $fila8=number_format($diferencia,2,',','.');
             $fila21=H::getX('Codart','Caregart','Tipo',$objdato->getCodart());
             if ($diferencia==0)
             {
              $fila16=number_format($objdato->getCansol(),2,',','.');
             }else $fila16=number_format($diferencia,2,',','.');
             $canentart=0;
             if (H::convnume($fila8)<= (H::convnume($fila14) - $canentart))
             {
               $fila8=$fila8;
               $fila6= H::convnume($fila14) - H::convnume($fila8 -$canentart);
             }else
             {
               $fila6="0";
               $fila8=$fila14;
             }
             $fila10=number_format($objdato->getPrecio(),2,',','.');
             $fila11=number_format($objdato->getPrecio(),2,',','.');
             $fila15=number_format($objdato->getPrecio(),2,',','.');

             $colum=self::determinarReferenciaDoc($tipref);
              if ($objdato->getMonrgo()>0) {
               $fila12=H::FormatoMonto($objdato->getMonrgo());
               $fila1='1';
             }else
               $fila12="0,00";
             $fila17="";
             $fila18="0,00";
             $fila19="";
             $fila20='0';
             $fila22="";
             $fila9="0,00";
             $cal=H::toFloat($fila10)*H::toFloat($fila7)+H::toFloat($fila12);
             //$fila8=number_format($objdato->getCansol(),2,',','.');
             $fila13=number_format($objdato->getTotart(),2,',','.');//number_format($cal,2,',','.');
           //$encontro=true;
           //cambio moneda
             $fila23="0,00"; //number_format($objdato->getBtucon(),2,',','.');
        }

        $arreglodet=$arreglodet.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'_'.$fila9.'_'.$fila10.'_'.$fila11.'_'.$fila12.'_'.$fila13.'_'.$fila14.'_'.$fila15.'_'.$fila16.'_'.$fila17.'_'.$fila18.'_'.$fila19.'_'.$fila20.'_'.$fila21.'_'.$fila22.'_'.$fila23.'!';

    }
  }
  else
  {
    $msj="alert('No Existen Datos Asociados al Criterio Seleccionado');";
  }
    return true;
  }

  public static function mostrarRecargosArticulos($referencia,$codart,$tipref,&$arreglorecarg)
  {
    $arreglorecarg="";
    $a= new Criteria();
    if ($tipref=='P') {
      $a->add(FargopedPeer::REFDOC,$referencia);
      $a->add(FargopedPeer::CODART,$codart);
      $resul= FargopedPeer::doSelectOne($a);
    }else {
      $a->add(FargoprePeer::REFDOC,$referencia);
      $a->add(FargoprePeer::CODART,$codart);
      $resul= FargoprePeer::doSelectOne($a);
    }
    if ($resul)
    {
         $monrgo=H::FormatoMonto($resul->getMonrgo());
         $monrgoc=H::FormatoMonto($resul->getMonrgo2());
         $arreglorecarg=$resul->getCodrgo().'_'.$resul->getNomrgo().'_'.$resul->getRecfij().'_' .$monrgo.'_'.$resul->getCodcta().'_'.$resul->getTipo().'_'.$monrgoc.'!';
    }   
  }

  public static function buscarPedidosDis($codcli,$fecdes,$fechas,&$reg)
  {
     $reg=array();      
     if ($fecdes!="" && $fechas!="") {
         $sql = "Select DISTINCT '' as check, A.NROPED as nroped,A.DESPED as desped,A.FECPED as fecped, 9 as id
                FROM 
                (
                SELECT CODCLI,F.NROPED,F.DESPED,FECPED,G.CODART,SUM(CANTOT) AS CANTOT,STATUS,TIPREF
                from FAPEDIDO F,FAARTPED G WHERE F.NROPED=G.NROPED
                GROUP BY CODCLI,F.NROPED,F.DESPED,FECPED,G.CODART,STATUS,TIPREF
                ) A LEFT OUTER JOIN
                (
                SELECT D.CODART,SUM(CANTOT) AS CANFAC,CODREF 
                FROM FAARTFAC D,FAFACTUR E WHERE D.REFFAC=E.REFFAC AND TIPREF='P' AND STATUS<>'N'
                GROUP BY D.CODART,D.CODREF
                ) B ON (A.NROPED=B.CODREF  AND A.CODART=B.CODART)
                WHERE
                A.CodCli='".$codcli."' AND 
                A.STATUS='A' and A.TIPREF<>'P'AND   
                A.FECPED>='".$fecdes."' AND 
                A.FECPED<='".$fechas."' AND      
                A.CANTOT>COALESCE(CANFAC,0)
                order by A.NROPED";       
      }else {
        $sql = "Select DISTINCT '' as check, A.NROPED as nroped,A.DESPED as desped,A.FECPED as fecped, 9 as id
          FROM 
          (
          SELECT CODCLI,F.NROPED,F.DESPED,FECPED,G.CODART,SUM(CANTOT) AS CANTOT,STATUS,TIPREF
          from FAPEDIDO F,FAARTPED G WHERE F.NROPED=G.NROPED
          GROUP BY CODCLI,F.NROPED,F.DESPED,FECPED,G.CODART,STATUS,TIPREF
          ) A LEFT OUTER JOIN
          (
          SELECT D.CODART,SUM(CANTOT) AS CANFAC,CODREF 
          FROM FAARTFAC D,FAFACTUR E WHERE D.REFFAC=E.REFFAC AND TIPREF='P' AND STATUS<>'N'
          GROUP BY D.CODART,D.CODREF
          ) B ON (A.NROPED=B.CODREF  AND A.CODART=B.CODART)
          WHERE
          A.CodCli='".$codcli."' AND 
          A.STATUS='A' and A.TIPREF<>'P'AND      
          A.CANTOT>COALESCE(CANFAC,0)
          order by A.NROPED";
      }   
     
      if (Herramientas::BuscarDatos($sql,$res))
      {
          $p=0;          
          while ($p<count($res))
          {               
             $j=count($reg)+1;
             $reg[$j-1]["check"]=$res[$p]["check"];
             $reg[$j-1]["nroped"]=$res[$p]["nroped"];
             $reg[$j-1]["desped"]=$res[$p]["desped"];
             $reg[$j-1]["fecped"]=$res[$p]["fecped"];
             $reg[$j-1]["id"]=$res[$p]["id"];               
             
             $p++;
          }
      }
  } 

  public static function Buscararticulos($fafactur,$grid5,&$ref,&$arrart)
  {
    $z=$grid5[0];
    $j=0;
    $ref="";
    $tipref=$fafactur->getTipref();
    $descli=$fafactur->getDescli();
    $valmon=$fafactur->getValmon();
    $presupcon=$fafactur->getEsprecon();
    $fecper1=$fafactur->getFecper1();
    $fecper2=$fafactur->getFecper2();
    $arrart=array();
    while ($j<count($z))
    {
      if ($z[$j]["check"]=="1")
      {
        if ($tipref=='D') {
          self::arregloDespachosNuevo($z[$j]["nroped"],$tipref,$descli,$encontro,$arrart,$sin_cta_aso);
          if ($encontro && count($arrart)==0)
            $ref.=$z[$j]["nroped"]." - ";
        }
        else if ($tipref=='P') {
          self::arregloPedidosNuevo($z[$j]["nroped"],$tipref,$descli,$encontro,$arrart,$sin_cta_aso);
          if ($encontro && count($arrart)==0)
            $ref.=$z[$j]["nroped"]." - ";
        }else {
          self::arregloPresupuestosNuevo($z[$j]["nroped"],$tipref,$descli,$presupcon,$fecper1,$fecper2,$valmon,$encontro,$arrart,$sin_cta_aso);
          if ($encontro && count($arrart)==0)
            $ref.=$z[$j]["nroped"]." - ";
        }
      }
      $j++;
    }
  }

  public static function arregloDespachosNuevo($codreferencia,$tipref,$descli,&$encontro,&$arreglodet,&$sin_cta_aso)
  {
    if ($tipref=='D' || $tipref=='VC')
    {
      $c= new Criteria();
      $c->add(CaartdphPeer::DPHART,$codreferencia);
      $resul= CaartdphPeer::doSelect($c);
      if ($resul)
      {
        foreach ($resul as $objdato)
        {
         $cantotdesp=$objdato->getCandph()-$objdato->getCandev();
         if ($cantotdesp>0) {
           $diferencia=0;
           $cant_total=0;

          $sql="Select codart as codart, cantot-canaju as cantot From FaArtFac where CODART='".$objdato->getCodart()."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where TipRef='".$tipref."' and Status<>'N')";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $e=0;
            while ($e<count($result))
            {
              $cant_total= $cant_total + $result[$e]["cantot"];
              $e++;
            }
            $encontro=false;
            if ($cantotdesp<= $cant_total)
            {
             $encontro=true;
            }
            $diferencia= $cantotdesp - $cant_total;

            if ($encontro==false)
            {
               $j=count($arreglodet)+1;
               $arreglodet[$j-1]["check"]='0';
               $arreglodet[$j-1]["codref"]=$codreferencia;
               $arreglodet[$j-1]["codart"]=$objdato->getCodart();
               $arreglodet[$j-1]["blanco1"]=H::getX_vacio('Codart','Caregart','Tipo',$objdato->getCodart());
               $arreglodet[$j-1]["id"]="9";
               $a= new Criteria();
               $a->add(CaregartPeer::CODART,$objdato->getCodart());
               $reg= CaregartPeer::doSelectOne($a);
               if ($reg)
               {
                $arreglodet[$j-1]["desart"]=$reg->getDesart();
                $arreglodet[$j-1]["unimed"]=$reg->getUnimed();
                $arreglodet[$j-1]["exiart"]=H::FormatoMonto($reg->getDistot());
                $arreglodet[$j-1]["distot"]=H::FormatoMonto($reg->getDistot());
                if ($reg->getCtavta()=="")
                {
                  $sin_cta_aso='N';
                }else $sin_cta_aso='S';
               }
               $arreglodet[$j-1]["candesp"]=H::FormatoMonto($diferencia);
               $a= new Criteria();
               $a->add(CadphartPeer::DPHART,$objdato->getDphart());
               $registro= CadphartPeer::doSelectOne($a);
               if ($registro)
               {
                   $e= new Criteria();
                   $e->add(FaartnotPeer::CODART,$objdato->getCodart());
                   $e->add(FaartnotPeer::NRONOT,$registro->getReqart());
                   $data= FaartnotPeer::doSelectOne($e);
                   if ($data)
                   {
                    $arreglodet[$j-1]["precio"]=H::FormatoMonto($data->getPreart());
                    $arreglodet[$j-1]["precioe"]="0,00";
                    $arreglodet[$j-1]["distot"]=H::FormatoMonto($data->getPreart());   
                    $arreglodet[$j-1]["preant"]=H::FormatoMonto($data->getPreart());                
                   }
                   else
                   {
                    $arreglodet[$j-1]["precio"]="0,00";
                    $arreglodet[$j-1]["precioe"]="0,00";
                    $arreglodet[$j-1]["preant"]="0,00";
                   }

                   $arreglodet[$j-1]["monrgo"]="0,00";
                   $cal=H::toFloat($arreglodet[$j-1]["candesp"])*H::toFloat($arreglodet[$j-1]["precio"]);
                   $arreglodet[$j-1]["totart"]=H::FormatoMonto($cal);  
               }
               else
               {
                   $arreglodet[$j-1]["precio"]="0,00";
                   $arreglodet[$j-1]["precioe"]="0,00";
                   $arreglodet[$j-1]["monrgo"]="0,00";
                   $arreglodet[$j-1]["totart"]="0,00";
                   $arreglodet[$j-1]["preant"]="0,00";
               }
               $arreglodet[$j-1]["cantot"]="0,00";
               $arreglodet[$j-1]["canent"]="0,00";
               $arreglodet[$j-1]["canpreart"]="0,00";
               $arreglodet[$j-1]["codctapro"]="";
               $arreglodet[$j-1]["mondes"]="0,00";
               $arreglodet[$j-1]["recar"]="";
               $arreglodet[$j-1]["desc"]='0';
               $arreglodet[$j-1]["blanco2"]="";
               $arreglodet[$j-1]["btucon"]="0,00";
               if ($descli=='S'){
                self::mostrarDescuentosArticulosNuevos($descli,$arreglodet[$j-1]["codart"],(H::toFloat($arreglodet[$j-1]["candesp"])*H::toFloat($arreglodet[$j-1]["precio"])),$arreglodet[$j-1]["monrgo"],$arreglodesc,$mondesc);
                $arreglodet[$j-1]["mondes"]=$mondesc;
                $arreglodet[$j-1]["descuentos"]=H::FormatoMonto($mondesc);
               }else $arreglodet[$j-1]["descuentos"]="";
               $arreglodet[$j-1]["recargos"]="";

               $articulo=$arreglodet[$j-1]["codart"];
               $c= new Criteria();
               $c->add(FarecargPeer::TIPRGO,'P');
               $sqlq = "codrgo in (select codrgo from farecart where codart = '".$articulo."')";
               $c->add(FarecargPeer::CODRGO,$sqlq,Criteria :: CUSTOM);
               $sum=FarecargPeer::doSelectOne($c);
               if ($sum){
                 $porcrgo = $sum->getMonrgo();
                 $montorgo=($cal*$porcrgo/100);
                 $monrgoq=H::FormatoMonto($montorgo);
                 $monrgow=H::FormatoMonto($sum->getMonrgo());
                 if ($sum->getCalcul()=='S') $recfij="Si"; else $recfij="No";
                 $cad=$sum->getCodrgo().'_'.$sum->getNomrgo().'_'.$recfij.'_' .$monrgoq.'_'.$sum->getCodcta().'_'.$sum->getTiprgo().'_'.$monrgow.'!';         
                 $arreglodet[$j-1]["recargos"]=$cad;               
                 $arreglodet[$j-1]["monrgo"]=H::FormatoMonto($montorgo);
                 $arreglodet[$j-1]["check"]='1';
                  $cal=$cal+  $montorgo;
                  $arreglodet[$j-1]["totart"]=H::FormatoMonto($cal);
               }
            }
          }
          else
          {
             $j=count($arreglodet)+1;
             $arreglodet[$j-1]["check"]='0';
             $arreglodet[$j-1]["codref"]=$codreferencia;
             $arreglodet[$j-1]["codart"]=$objdato->getCodart();
             $arreglodet[$j-1]["blanco1"]=H::getX_vacio('Codart','Caregart','Tipo',$objdato->getCodart());
             $arreglodet[$j-1]["id"]="9";
             $a= new Criteria();
             $a->add(CaregartPeer::CODART,$objdato->getCodart());
             $reg= CaregartPeer::doSelectOne($a);
             if ($reg)
             {
                $arreglodet[$j-1]["desart"]=$reg->getDesart();
                $arreglodet[$j-1]["unimed"]=$reg->getUnimed();
                $arreglodet[$j-1]["exiart"]=H::FormatoMonto($reg->getDistot());
                $arreglodet[$j-1]["distot"]=H::FormatoMonto($reg->getDistot());
                if ($reg->getCtavta()=="")
                {
                  $sin_cta_aso='N';
                }else $sin_cta_aso='S';
             }
             $arreglodet[$j-1]["candesp"]=number_format($cantotdesp,2,',','.');              
             $a= new Criteria();
             $a->add(CadphartPeer::DPHART,$objdato->getDphart());
             $registro= CadphartPeer::doSelectOne($a);
             if ($registro)
             {
                 $e= new Criteria();
                 $e->add(FaartnotPeer::CODART,$objdato->getCodart());
                 $e->add(FaartnotPeer::NRONOT,$registro->getReqart());
                 $data= FaartnotPeer::doSelectOne($e);
                 if ($data)
                 {
                   $arreglodet[$j-1]["precio"]=H::FormatoMonto($data->getPreart());
                   $arreglodet[$j-1]["precioe"]="0,00";
                   $arreglodet[$j-1]["distot"]=H::FormatoMonto($data->getPreart()); 
                   $arreglodet[$j-1]["preant"]=H::FormatoMonto($data->getPreart()); 
                 }
                 else
                 {
                   $arreglodet[$j-1]["precio"]=H::FormatoMonto($objdato->getPreart());
                   $arreglodet[$j-1]["precioe"]="0,00";
                   $arreglodet[$j-1]["distot"]=H::FormatoMonto($objdato->getPreart()); 
                   $arreglodet[$j-1]["preant"]=H::FormatoMonto($objdato->getPreart()); 
                 }

                 $arreglodet[$j-1]["monrgo"]="0,00";
                 $arreglodet[$j-1]["totart"]=number_format($objdato->getMontot(),2,',','.');
             }
             else
             {
                 $arreglodet[$j-1]["precio"]="0,00";
                 $arreglodet[$j-1]["precioe"]="0,00";
                 $arreglodet[$j-1]["monrgo"]="0,00";
                 $arreglodet[$j-1]["totart"]="0,00";
                 $arreglodet[$j-1]["preant"]="0,00";
             }
            
             $arreglodet[$j-1]["cantot"]="0,00";
             $arreglodet[$j-1]["canent"]="0,00";
             $arreglodet[$j-1]["canpreart"]="0,00";
             $arreglodet[$j-1]["codctapro"]="";
             $arreglodet[$j-1]["mondes"]="0,00";
             $arreglodet[$j-1]["recar"]="";
             $arreglodet[$j-1]["desc"]='0';
             $arreglodet[$j-1]["blanco2"]="";

             $cal=H::toFloat($arreglodet[$j-1]["candesp"])*H::toFloat($arreglodet[$j-1]["precio"]);
             $arreglodet[$j-1]["totart"]=H::FormatoMonto($cal); 
             $arreglodet[$j-1]["btucon"]="0,00";
             if ($descli=='S'){
              self::mostrarDescuentosArticulosNuevos($descli,$arreglodet[$j-1]["codart"],(H::toFloat($arreglodet[$j-1]["candesp"])*H::toFloat($arreglodet[$j-1]["precio"])),$arreglodet[$j-1]["monrgo"],$arreglodesc,$mondesc);
              $arreglodet[$j-1]["mondes"]=H::FormatoMonto($mondesc);
              $arreglodet[$j-1]["descuentos"]=$arreglodesc;
             }else $arreglodet[$j-1]["descuentos"]="";
             $arreglodet[$j-1]["recargos"]="";
             
            $articulo=$arreglodet[$j-1]["codart"];
             $c= new Criteria();
             $c->add(FarecargPeer::TIPRGO,'P');
             $sqlq = "codrgo in (select codrgo from farecart where codart = '".$articulo."')";
             $c->add(FarecargPeer::CODRGO,$sqlq,Criteria :: CUSTOM);
             $sum=FarecargPeer::doSelectOne($c);
             if ($sum){
               $porcrgo = $sum->getMonrgo();
               $montorgo=($cal*$porcrgo/100);
               $monrgoq=H::FormatoMonto($montorgo);
               $monrgow=H::FormatoMonto($sum->getMonrgo());
               if ($sum->getCalcul()=='S') $recfij="Si"; else $recfij="No";
               $cad=$sum->getCodrgo().'_'.$sum->getNomrgo().'_'.$recfij.'_' .$monrgoq.'_'.$sum->getCodcta().'_'.$sum->getTiprgo().'_'.$monrgow.'!';         
               $arreglodet[$j-1]["recargos"]=$cad;               
               $arreglodet[$j-1]["monrgo"]=H::FormatoMonto($montorgo);
               $arreglodet[$j-1]["check"]='1';
                $cal=$cal+  $montorgo;
                $arreglodet[$j-1]["totart"]=H::FormatoMonto($cal);
             }
          }             
        }     
      }
      }
    }
  }

  public static function arregloPedidosNuevo($codreferencia,$tipref,$descli,&$encontro,&$arreglodet,&$sin_cta_aso)
  {
    $tienerec="";
    $c= new Criteria();
    $c->add(FaartpedPeer::NROPED,$codreferencia);
    $reg2= FaartpedPeer::doSelect($c);
    if ($reg2)
    {
      $l= new Criteria();
      $l->add(FargopedPeer::REFDOC,$codreferencia);
      $sitrajo= FargopedPeer::doSelectOne($l);
      if ($sitrajo)
      {
        $tienerec="S";
      }
      foreach ($reg2 as $objdato)
      {
        $diferencia=0;
        $cant_total=0;
        $sql="Select cantot-canaju as cantot From FaArtFac where CODART='".$objdato->getCodart()."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where STATUS<>'N' AND TipRef='".$tipref."')";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $e=0;
          while ($e<count($result))
          {
            $cant_total= $cant_total + $result[$e]["cantot"];
            $e++;
          }
        }
          $encontro=false;
          if ($objdato->getCantot()<= $cant_total)
          {
            $encontro=true;
          }
          $diferencia= $objdato->getCantot() - $cant_total;
         $j=count($arreglodet)+1;
         $arreglodet[$j-1]["check"]='0';
         $arreglodet[$j-1]["codref"]=$codreferencia;
         $arreglodet[$j-1]["codart"]=$objdato->getCodart();
         $arreglodet[$j-1]["id"]="9";
         if ($tienerec=='S')        
         {
            self::mostrarRecargosArticulos($codreferencia,$objdato->getCodart(),$tipref,$arreglorecarg);
            $arreglodet[$j-1]["recargos"]=$arreglorecarg;
         }else $arreglodet[$j-1]["recargos"]="";

         $a= new Criteria();
         $a->add(CaregartPeer::CODART,$objdato->getCodart());
         $reg= CaregartPeer::doSelectOne($a);
         if ($reg)
         {
          $arreglodet[$j-1]["desart"]=$reg->getDesart();
          $arreglodet[$j-1]["unimed"]=$reg->getUnimed();
          $arreglodet[$j-1]["distot"]=H::FormatoMonto($reg->getDistot());
          if ($reg->getCtavta()=="")
          {
            $sin_cta_aso='N';
          }else $sin_cta_aso='S';
          $arreglodet[$j-1]["blanco1"]=$reg->getTipo();
         }
          if ($encontro==false)
          {
             $arreglodet[$j-1]["cantot"]=H::FormatoMonto($objdato->getCantot());
             $arreglodet[$j-1]["canent"]=H::FormatoMonto($diferencia);             
             if ($diferencia==0)
             {
               $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($objdato->getCantot());
             }else $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($diferencia);
             $canentart=0;
             if (H::toFloat($arreglodet[$j-1]["canent"])<= (H::toFloat($arreglodet[$j-1]["distot"]) - $canentart))
             {
               $arreglodet[$j-1]["exiart"]= H::toFloat($arreglodet[$j-1]["distot"]) - H::toFloat($arreglodet[$j-1]["canent"]) -$canentart;
             }else
             {
               $arreglodet[$j-1]["exiart"]="0";
               if ($arreglodet[$j-1]["blanco1"]=='A')  $arreglodet[$j-1]["canent"]=$arreglodet[$j-1]["distot"];
             } 
          }
          else
          {
             $arreglodet[$j-1]["cantot"]=H::FormatoMonto($objdato->getCantot());
             $arreglodet[$j-1]["canent"]=H::FormatoMonto($objdato->getCantot());             
             if ($diferencia==0)
             {
              $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($objdato->getCantot());
             }else $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($diferencia);
             $canentart=0;
             if (H::toFloat($arreglodet[$j-1]["canent"])<= (H::toFloat($arreglodet[$j-1]["distot"]) - $canentart))
             {
               $arreglodet[$j-1]["exiart"]= H::toFloat($arreglodet[$j-1]["distot"]) - H::toFloat($arreglodet[$j-1]["canent"]) -$canentart;
             }else
             {
               $arreglodet[$j-1]["exiart"]="0";
               if ($reg->getTipo()=='A') $arreglodet[$j-1]["canent"]=$arreglodet[$j-1]["distot"];
             }
           }
           $arreglodet[$j-1]["precio"]=H::FormatoMonto($objdato->getPreart());
           $arreglodet[$j-1]["precioe"]=H::FormatoMonto($objdato->getPreart());
           $arreglodet[$j-1]["preant"]=H::FormatoMonto($objdato->getPreart());
           $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($objdato->getPreart());     
           $colum=self::determinarReferenciaDoc($tipref);
           if ($objdato->getMonrgo()>0) {
             $arreglodet[$j-1]["monrgo"]=H::FormatoMonto($objdato->getMonrgo());
             $arreglodet[$j-1]["check"]='1';
           }else  { $arreglodet[$j-1]["monrgo"]="0,00";}
           $arreglodet[$j-1]["codctapro"]="";
           $arreglodet[$j-1]["mondes"]="0,00";
           $arreglodet[$j-1]["recar"]="";
           $arreglodet[$j-1]["desc"]='0';
           $arreglodet[$j-1]["blanco2"]="";
           $arreglodet[$j-1]["candesp"]="0,00";
           $arreglodet[$j-1]["totart"]=H::FormatoMonto($objdato->getTotart());
           $arreglodet[$j-1]["btucon"]=H::FormatoMonto($objdato->getBtucon());
           if ($descli=='S'){
            self::mostrarDescuentosArticulosNuevos($descli,$arreglodet[$j-1]["codart"],(H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"])),$arreglodet[$j-1]["monrgo"],$arreglodesc,$mondesc);
            $arreglodet[$j-1]["mondes"]=H::FormatoMonto($mondesc);
            $arreglodet[$j-1]["descuentos"]=$arreglodesc;
           }else $arreglodet[$j-1]["descuentos"]="";
        }     
    } 
  }

  public static function mostrarDescuentosArticulosNuevos($tipcli,$codart,$monuni,$monrgo,&$arreglodesc,&$mondesc)
  {
    $arreglodesc="";
    $mondesc=0;
    $a= new Criteria();
    $a->add(FaartdtoctePeer::FATIPCTE_ID,$tipcli);
    $a->add(FaartdtoctePeer::CODART,$codart);
    $resul= FaartdtoctePeer::doSelectOne($a);
    if ($resul)
    {
        $d= new Criteria();
        $d->add(FadesctoPeer::CODDESC,$resul->getCoddesc());
        $reg= FadesctoPeer::doSelectOne($d);
        if ($reg)
        {
          $fila1=$reg->getCoddesc();
          $fila2=$reg->getDesdesc();
          $fila4=$reg->getCodcta();
          $fila5="1";
          $fila6=number_format($reg->getMondesc(),2,',','.');
          $fila7=$reg->getTipdesc();
          $fila8=$reg->getTipret();
          if ($reg->getTipdesc()=='M')
          {
            $cal=$reg->getMondesc()*H::toFloat($fila5);
            $fila3=H::FormatoMonto($cal);
          }else if ($reg->getTipdesc()=='P')
          {
            if ($fila8!='S')
              $cal=$monuni*H::toFloat($fila6)/100;
            else
              $cal=$monrgo*H::toFloat($fila6)/100;
            
            $fila3=H::FormatoMonto($cal);
          }
          else
          {
            $fila3="0,00";
          }

          $mondesc= $fila3;         

          $arreglodesc=$arreglodesc.$fila1.'_'.$fila2.'_'.$fila3.'_'.$fila4.'_'.$fila5.'_'.$fila6.'_'.$fila7.'_'.$fila8.'!';
        }
      
    }   
  }

  public static function arregloPresupuestosNuevo($codreferencia,$tipref,$descli,$presupcon,$fecper1,$fecper2,$valmon,&$encontro,&$arreglodet,&$sin_cta_aso)
  {
    $tienerec="N";
    $manprecon=H::getConfApp2('manprecon', 'facturacion', 'fafactur');
    if ($manprecon=='S' && $presupcon=='S')
    {
       $sqla="SELECT a.codart as codart, b.cancon as cansol, b.cancon as cancon, a.precio as precio, a.monrgo as monrgo, a.totart as totart, '' as btucon
        FROM fadetpre a, fadetcon b
        WHERE a.REFPRE='".$codreferencia."'  and (b.stacon<>'F' or b.stacon is null)
        AND b.FECINI>='".$fecper1."' AND b.FECFIN<='".$fecper2."' AND 
        a.REFPRE=b.REFPRE and a.codart=b.codart";
        //print $sqla; exit;
        if (Herramientas::BuscarDatos($sqla,$resulta)){
            $l= new Criteria();
            $l->add(FargoprePeer::REFDOC,$codreferencia);
            $sitrajo= FargoprePeer::doSelectOne($l);
            if ($sitrajo)
            {
              $tienerec="S";
            }

        foreach ($resulta as $objdato)
        {
            $diferencia=0;
            $cant_total=0;

            $sql="Select cantot-canaju as cantot From FaArtFac where CODART='".$objdato["codart"]."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where STATUS<>'N' AND TipRef='".$tipref."' and fecper1>='".$fecper1."' and fecper2<='".$fecper2."')";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $e=0;
              while ($e<count($result))
              {
                $cant_total= $cant_total + $result[$e]["cantot"];
                $e++;
              }
              $encontro=false;
              if ($objdato["cansol"]<= $cant_total)
              {
                $encontro=true;
              }
              $diferencia= $objdato["cansol"] - $cant_total;
              if ($encontro==false)
              {
                $pos=self::posicion_en_el_grid($arreglodet,$objdato["codart"],$codreferencia);
                if ($pos==0) {
                  $j=count($arreglodet)+1;
                  $arreglodet[$j-1]["check"]='0';
                  $arreglodet[$j-1]["codref"]=$codreferencia;
                  $arreglodet[$j-1]["codart"]=$objdato["codart"];
                  $arreglodet[$j-1]["id"]="9";

                   $a= new Criteria();
                   $a->add(CaregartPeer::CODART,$objdato["codart"]);
                   $reg= CaregartPeer::doSelectOne($a);
                   if ($reg)
                   {
                    $arreglodet[$j-1]["desart"]=$reg->getDesart();
                    $arreglodet[$j-1]["unimed"]=$reg->getUnimed();
                    $arreglodet[$j-1]["distot"]=H::FormatoMonto($reg->getDistot());
                    if ($reg->getCtavta()=="")
                    {
                      $sin_cta_aso='N';
                    }else $sin_cta_aso='S';
                    $arreglodet[$j-1]["blanco1"]=$reg->getTipo();
                   }

                   $arreglodet[$j-1]["cantot"]=H::FormatoMonto($objdato["cancon"]);
                   $arreglodet[$j-1]["canent"]=H::FormatoMonto($diferencia);
                   if ($diferencia==0)
                   {
                    $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($objdato["cancon"]);
                   }else $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($diferencia);
                   $canentart=0;
                   if (H::toFloat($arreglodet[$j-1]["canent"])<= (H::toFloat($arreglodet[$j-1]["distot"]) - $canentart))
                   {
                     $arreglodet[$j-1]["exiart"]= H::toFloat($arreglodet[$j-1]["distot"]) - H::toFloat($arreglodet[$j-1]["canent"]) -$canentart;
                   }else
                   {
                    $arreglodet[$j-1]["exiart"]="0";
                     if ($arreglodet[$j-1]["blanco1"]=='A') $arreglodet[$j-1]["canent"]=$arreglodet[$j-1]["distot"];
                   }
                   $arreglodet[$j-1]["precio"]=H::FormatoMonto($objdato["precio"]);
                   $arreglodet[$j-1]["precioe"]=H::FormatoMonto($objdato["precio"]);
                   $arreglodet[$j-1]["preant"]=H::FormatoMonto($objdato["precio"]);
                   if ($tienerec=='S')        
                   {  
                      $neto=H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"]);
                      self::mostrarRecargosArticulosContrato($codreferencia,$objdato["codart"],$tipref,$neto,$arreglorecarg,$acumrgo);
                      $arreglodet[$j-1]["recargos"]=$arreglorecarg;
                   }else $arreglodet[$j-1]["recargos"]="";

                   $colum=self::determinarReferenciaDoc($tipref);
                   if ($objdato["monrgo"]>0) {
                     $arreglodet[$j-1]["monrgo"]=H::FormatoMonto($acumrgo);//H::FormatoMonto($objdato["monrgo"]);
                     $arreglodet[$j-1]["check"]='1';
                   }else  $arreglodet[$j-1]["monrgo"]="0,00";
                   
                   $arreglodet[$j-1]["codctapro"]="";
                   $arreglodet[$j-1]["mondes"]="0,00";
                   $arreglodet[$j-1]["recar"]="";
                   $arreglodet[$j-1]["desc"]='0';
                   $arreglodet[$j-1]["blanco2"]="";
                   $arreglodet[$j-1]["candesp"]="0,00";
                   $cal=H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"])+H::toFloat($arreglodet[$j-1]["monrgo"]);
                   $arreglodet[$j-1]["totart"]=H::FormatoMonto($cal);//H::FormatoMonto($objdato["totart"]);
                   $arreglodet[$j-1]["btucon"]=H::FormatoMonto($objdato["btucon"]);
                   if ($descli=='S'){
                    self::mostrarDescuentosArticulosNuevos($descli,$arreglodet[$j-1]["codart"],(H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"])),$arreglodet[$j-1]["monrgo"],$arreglodesc,$mondesc);
                    $arreglodet[$j-1]["mondes"]=H::FormatoMonto($mondesc);
                    $arreglodet[$j-1]["descuentos"]=$arreglodesc;
                    $arreglodet[$j-1]["desc"]='1';
                   }else $arreglodet[$j-1]["descuentos"]="";
               }else {
                    $valor=H::toFloat($arreglodet[$pos-1]["cantot"]);
                    $arreglodet[$pos-1]["cantot"]=H::FormatoMonto($valor+$objdato["cancon"]);
                    $valor1=H::toFloat($arreglodet[$pos-1]["canent"]);
                    $arreglodet[$pos-1]["canent"]=H::FormatoMonto($valor1+$diferencia);

                    $valor2=H::toFloat($arreglodet[$pos-1]["canpreart"]);
                    $arreglodet[$pos-1]["canpreart"]=H::FormatoMonto($valor2+$diferencia);

                    if ($tienerec=='S')        
                   {  
                      $neto=H::toFloat($arreglodet[$pos-1]["canent"])*H::toFloat($arreglodet[$pos-1]["precio"]);
                      self::mostrarRecargosArticulosContrato($codreferencia,$objdato["codart"],$tipref,$neto,$arreglorecarg,$acumrgo);
                      $arreglodet[$pos-1]["recargos"]=$arreglorecarg;
                   }else $arreglodet[$pos-1]["recargos"]="";

                   if ($objdato["monrgo"]>0) {
                     $arreglodet[$pos-1]["monrgo"]=H::FormatoMonto($acumrgo);//H::FormatoMonto($objdato["monrgo"]);
                     $arreglodet[$pos-1]["check"]='1';
                   }else  $arreglodet[$pos-1]["monrgo"]="0,00";

                   $cal=H::toFloat($arreglodet[$pos-1]["canent"])*H::toFloat($arreglodet[$pos-1]["precio"])+H::toFloat($arreglodet[$pos-1]["monrgo"]);
                   $arreglodet[$pos-1]["totart"]=H::FormatoMonto($cal); 
               }
              }
            }
            else
            {
              $pos=self::posicion_en_el_grid($arreglodet,$objdato["codart"],$codreferencia);
              if ($pos==0) {
                $j=count($arreglodet)+1;
                $arreglodet[$j-1]["check"]='0';
                $arreglodet[$j-1]["codref"]=$codreferencia;
                $arreglodet[$j-1]["codart"]=$objdato["codart"];
                $arreglodet[$j-1]["id"]="9";

                 $a= new Criteria();
                 $a->add(CaregartPeer::CODART,$objdato["codart"]);
                 $reg= CaregartPeer::doSelectOne($a);
                 if ($reg)
                 {
                    $arreglodet[$j-1]["desart"]=$reg->getDesart();
                    $arreglodet[$j-1]["unimed"]=$reg->getUnimed();
                    $arreglodet[$j-1]["distot"]=H::FormatoMonto($reg->getDistot());
                    if ($reg->getCtavta()=="")
                    {
                      $sin_cta_aso='N';
                    }else $sin_cta_aso='S';
                    $arreglodet[$j-1]["blanco1"]=$reg->getTipo();
                 }
                 $arreglodet[$j-1]["cantot"]=H::FormatoMonto($objdato["cancon"]);
                 $arreglodet[$j-1]["canent"]=H::FormatoMonto($objdato["cancon"]);//H::FormatoMonto($diferencia);
                 if ($diferencia==0)
                 {
                  $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($objdato["cancon"]);
                 }else $arreglodet[$j-1]["canpreart"]=FormatoMonto($objdato["cancon"]);//H::FormatoMonto($diferencia);
                 $canentart=0;
                 if (H::toFloat($arreglodet[$j-1]["canent"])<= (H::toFloat($arreglodet[$j-1]["distot"]) - $canentart))
                 {
                   $arreglodet[$j-1]["exiart"]= H::toFloat($arreglodet[$j-1]["distot"]) - H::toFloat($arreglodet[$j-1]["canent"]) -$canentart;
                 }else
                 {
                  $arreglodet[$j-1]["exiart"]="0";
                   if ($arreglodet[$j-1]["blanco1"]=='A') $arreglodet[$j-1]["canent"]=$arreglodet[$j-1]["distot"];
                 }
                 $arreglodet[$j-1]["precio"]=H::FormatoMonto($objdato["precio"]);
                 $arreglodet[$j-1]["precioe"]=H::FormatoMonto($objdato["precio"]);
                 $arreglodet[$j-1]["preant"]=H::FormatoMonto($objdato["precio"]);
                if ($tienerec=='S')        
                {
                    $neto=H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"]);
                    self::mostrarRecargosArticulosContrato($codreferencia,$objdato["codart"],$tipref,$neto,$arreglorecarg,$acumrgo);
                    $arreglodet[$j-1]["recargos"]=$arreglorecarg;
                }else $arreglodet[$j-1]["recargos"]="";


                 $colum=self::determinarReferenciaDoc($tipref);
                 if ($objdato["monrgo"]>0) {
                   $arreglodet[$j-1]["monrgo"]=H::FormatoMonto($acumrgo);//H::FormatoMonto($objdato["monrgo"]);
                   $arreglodet[$j-1]["check"]='1';
                 }else  $arreglodet[$j-1]["monrgo"]="0,00";
                 
                 $arreglodet[$j-1]["codctapro"]="";
                 $arreglodet[$j-1]["mondes"]="0,00";
                 $arreglodet[$j-1]["recar"]="";
                 $arreglodet[$j-1]["desc"]='0';
                 $arreglodet[$j-1]["blanco2"]="";
                 $arreglodet[$j-1]["candesp"]="0,00";
                 $cal=H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"])+H::toFloat($arreglodet[$j-1]["monrgo"]);
                 $arreglodet[$j-1]["totart"]=H::FormatoMonto($cal);//H::FormatoMonto($objdato["totart"]);
                 $arreglodet[$j-1]["btucon"]="0,00";
                 if ($descli=='S'){
                  self::mostrarDescuentosArticulosNuevos($descli,$arreglodet[$j-1]["codart"],(H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"])),$arreglodet[$j-1]["monrgo"],$arreglodesc,$mondesc);
                  $arreglodet[$j-1]["mondes"]=H::FormatoMonto($mondesc);
                  $arreglodet[$j-1]["descuentos"]=$arreglodesc;
                  $arreglodet[$j-1]["desc"]='1';
                 }else $arreglodet[$j-1]["descuentos"]="";
               }else {
                  $valor=H::toFloat($arreglodet[$pos-1]["cantot"]);
                  $arreglodet[$pos-1]["cantot"]=H::FormatoMonto($valor+$objdato["cancon"]);
                  $valor1=H::toFloat($arreglodet[$pos-1]["canent"]);
                  $arreglodet[$pos-1]["canent"]=H::FormatoMonto($valor1+$objdato["cancon"]);

                  $valor2=H::toFloat($arreglodet[$pos-1]["canpreart"]);
                  $arreglodet[$pos-1]["canpreart"]=H::FormatoMonto($valor2+$objdato["cancon"]);

                  if ($tienerec=='S')        
                  {
                    $neto=H::toFloat($arreglodet[$pos-1]["canent"])*H::toFloat($arreglodet[$pos-1]["precio"]);
                    self::mostrarRecargosArticulosContrato($codreferencia,$objdato["codart"],$tipref,$neto,$arreglorecarg,$acumrgo);
                    $arreglodet[$pos-1]["recargos"]=$arreglorecarg;
                  }else $arreglodet[$pos-1]["recargos"]="";

                  if ($objdato["monrgo"]>0) {
                   $arreglodet[$pos-1]["monrgo"]=H::FormatoMonto($acumrgo);//H::FormatoMonto($objdato["monrgo"]);
                   $arreglodet[$pos-1]["check"]='1';
                 }else  $arreglodet[$pos-1]["monrgo"]="0,00";

                 $cal=H::toFloat($arreglodet[$pos-1]["canent"])*H::toFloat($arreglodet[$pos-1]["precio"])+H::toFloat($arreglodet[$pos-1]["monrgo"]);
                 $arreglodet[$pos-1]["totart"]=H::FormatoMonto($cal);              }
            }
        }
      }else { $encontro=true; }
    }else {
        $c= new Criteria();
        $c->add(FadetprePeer::REFPRE,$codreferencia);
        $reg2= FadetprePeer::doSelect($c);
        if ($reg2)
        {
          $l= new Criteria();
          $l->add(FargoprePeer::REFDOC,$codreferencia);
          $sitrajo= FargoprePeer::doSelectOne($l);
          if ($sitrajo)
          {
            $tienerec="S";
          }
        foreach ($reg2 as $objdato)
        {
            $diferencia=0;
            $cant_total=0;

            $sql="Select cantot as cantot From FaArtFac where CODART='".$objdato->getCodart()."' AND codref = '".$codreferencia."' and RefFac in (Select RefFac from FaFactur where STATUS<>'N' AND TipRef='".$tipref."')";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $e=0;
              while ($e<count($result))
              {
                $cant_total= $cant_total + $result[$e]["cantot"];
                $e++;
              }
              $encontro=false;
              if ($objdato->getCansol()<= $cant_total)
              {
                $encontro=true;
              }
              $diferencia= $objdato->getCansol() - $cant_total;
              if ($encontro==false)
              {
                $j=count($arreglodet)+1;
                $arreglodet[$j-1]["check"]='0';
                $arreglodet[$j-1]["codref"]=$codreferencia;
                $arreglodet[$j-1]["codart"]=$objdato->getCodart();
                $arreglodet[$j-1]["id"]="9";
                if ($tienerec=='S')        
                 {
                    self::mostrarRecargosArticulos($codreferencia,$objdato->getCodart(),$tipref,$arreglorecarg);
                    $arreglodet[$j-1]["recargos"]=$arreglorecarg;
                 }else $arreglodet[$j-1]["recargos"]="";

                 $a= new Criteria();
                 $a->add(CaregartPeer::CODART,$objdato->getCodart());
                 $reg= CaregartPeer::doSelectOne($a);
                 if ($reg)
                 {
                  $arreglodet[$j-1]["desart"]=$reg->getDesart();
                  $arreglodet[$j-1]["unimed"]=$reg->getUnimed();
                  $arreglodet[$j-1]["distot"]=H::FormatoMonto($reg->getDistot());
                  if ($reg->getCtavta()=="")
                  {
                    $sin_cta_aso='N';
                  }else $sin_cta_aso='S';
                  $arreglodet[$j-1]["blanco1"]=$reg->getTipo();
                 }

                 $arreglodet[$j-1]["cantot"]=H::FormatoMonto($objdato->getCansol());
                 $arreglodet[$j-1]["canent"]=H::FormatoMonto($diferencia);
                 if ($diferencia==0)
                 {
                  $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($objdato->getCansol());
                 }else $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($diferencia);
                 $canentart=0;
                 if (H::toFloat($arreglodet[$j-1]["canent"])<= (H::toFloat($arreglodet[$j-1]["distot"]) - $canentart))
                 {
                   $arreglodet[$j-1]["exiart"]= H::toFloat($arreglodet[$j-1]["distot"]) - H::toFloat($arreglodet[$j-1]["canent"]) -$canentart;
                 }else
                 {
                  $arreglodet[$j-1]["exiart"]="0";
                   if ($arreglodet[$j-1]["blanco1"]=='A') $arreglodet[$j-1]["canent"]=$arreglodet[$j-1]["distot"];
                 }
                 $arreglodet[$j-1]["precio"]=H::FormatoMonto($objdato->getPrecio());
                 $arreglodet[$j-1]["precioe"]=H::FormatoMonto($objdato->getPrecio());
                 $arreglodet[$j-1]["preant"]=H::FormatoMonto($objdato->getPrecio());

                 $colum=self::determinarReferenciaDoc($tipref);
                 if ($objdato->getMonrgo()>0) {
                   $arreglodet[$j-1]["monrgo"]=H::FormatoMonto($objdato->getMonrgo());
                   $arreglodet[$j-1]["check"]='1';
                 }else  $arreglodet[$j-1]["monrgo"]="0,00";
                 
                 $arreglodet[$j-1]["codctapro"]="";
                 $arreglodet[$j-1]["mondes"]="0,00";
                 $arreglodet[$j-1]["recar"]="";
                 $arreglodet[$j-1]["desc"]='0';
                 $arreglodet[$j-1]["blanco2"]="";
                 $arreglodet[$j-1]["candesp"]="0,00";
                 $arreglodet[$j-1]["totart"]=H::FormatoMonto($objdato->getTotart());
                 $arreglodet[$j-1]["btucon"]=H::FormatoMonto($objdato->getBtucon());
                 if ($descli=='S'){
                  self::mostrarDescuentosArticulosNuevos($descli,$arreglodet[$j-1]["codart"],(H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"])),$arreglodet[$j-1]["monrgo"],$arreglodesc,$mondesc);
                  $arreglodet[$j-1]["mondes"]=H::FormatoMonto($mondesc);
                  $arreglodet[$j-1]["descuentos"]=$arreglodesc;
                  $arreglodet[$j-1]["desc"]='1';
                 }else $arreglodet[$j-1]["descuentos"]="";
              }
            }
            else
            {
                $j=count($arreglodet)+1;
                $arreglodet[$j-1]["check"]='0';
                $arreglodet[$j-1]["codref"]=$codreferencia;
                $arreglodet[$j-1]["codart"]=$objdato->getCodart();
                $arreglodet[$j-1]["id"]="9";
                if ($tienerec=='S')        
                 {
                    self::mostrarRecargosArticulos($codreferencia,$objdato->getCodart(),$tipref,$arreglorecarg);
                    $arreglodet[$j-1]["recargos"]=$arreglorecarg;
                 }else $arreglodet[$j-1]["recargos"]="";

                 $a= new Criteria();
                 $a->add(CaregartPeer::CODART,$objdato->getCodart());
                 $reg= CaregartPeer::doSelectOne($a);
                 if ($reg)
                 {
                    $arreglodet[$j-1]["desart"]=$reg->getDesart();
                    $arreglodet[$j-1]["unimed"]=$reg->getUnimed();
                    $arreglodet[$j-1]["distot"]=H::FormatoMonto($reg->getDistot());
                    if ($reg->getCtavta()=="")
                    {
                      $sin_cta_aso='N';
                    }else $sin_cta_aso='S';
                    $arreglodet[$j-1]["blanco1"]=$reg->getTipo();
                 }
                 $arreglodet[$j-1]["cantot"]=H::FormatoMonto($objdato->getCansol());
                 $arreglodet[$j-1]["canent"]=H::FormatoMonto($diferencia);
                 if ($diferencia==0)
                 {
                  $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($objdato->getCansol());
                 }else $arreglodet[$j-1]["canpreart"]=H::FormatoMonto($diferencia);
                 $canentart=0;
                 if (H::toFloat($arreglodet[$j-1]["canent"])<= (H::toFloat($arreglodet[$j-1]["distot"]) - $canentart))
                 {
                   $arreglodet[$j-1]["exiart"]= H::toFloat($arreglodet[$j-1]["distot"]) - H::toFloat($arreglodet[$j-1]["canent"]) -$canentart;
                 }else
                 {
                  $arreglodet[$j-1]["exiart"]="0";
                   if ($arreglodet[$j-1]["blanco1"]=='A') $arreglodet[$j-1]["canent"]=$arreglodet[$j-1]["distot"];
                 }
                 $arreglodet[$j-1]["precio"]=H::FormatoMonto($objdato->getPrecio());
                 $arreglodet[$j-1]["precioe"]=H::FormatoMonto($objdato->getPrecio());
                 $arreglodet[$j-1]["preant"]=H::FormatoMonto($objdato->getPrecio());
                 $colum=self::determinarReferenciaDoc($tipref);
                 if ($objdato->getMonrgo()>0) {
                   $arreglodet[$j-1]["monrgo"]=H::FormatoMonto($objdato->getMonrgo());
                   $arreglodet[$j-1]["check"]='1';
                 }else  $arreglodet[$j-1]["monrgo"]="0,00";
                 
                 $arreglodet[$j-1]["codctapro"]="";
                 $arreglodet[$j-1]["mondes"]="0,00";
                 $arreglodet[$j-1]["recar"]="";
                 $arreglodet[$j-1]["desc"]='0';
                 $arreglodet[$j-1]["blanco2"]="";
                 $arreglodet[$j-1]["candesp"]="0,00";
                 $arreglodet[$j-1]["totart"]=H::FormatoMonto($objdato->getTotart());
                 $arreglodet[$j-1]["btucon"]="0,00";
                 if ($descli=='S'){
                  self::mostrarDescuentosArticulosNuevos($descli,$arreglodet[$j-1]["codart"],(H::toFloat($arreglodet[$j-1]["canent"])*H::toFloat($arreglodet[$j-1]["precio"])),$arreglodet[$j-1]["monrgo"],$arreglodesc,$mondesc);
                  $arreglodet[$j-1]["mondes"]=H::FormatoMonto($mondesc);
                  $arreglodet[$j-1]["descuentos"]=$arreglodesc;
                  $arreglodet[$j-1]["desc"]='1';
                 }else $arreglodet[$j-1]["descuentos"]="";
            }
        }
      }
    }  
    return true;
  }

  public static function generarAsientos2(&$fafactur,$grid1,$grid3,&$arrasientos,&$pos,&$msj3)
  {
    $msj3=-1;
    $numcomord="FA".substr($fafactur->getReffac(),2,6);
    $arrasientos=array();
    $pos=0;
    $col=self::determinarReferenciaDoc($fafactur->getTipref());
    $salactual=H::toFloat($fafactur->getMonfac());

    $a= new Criteria();
    $reg= CadefartPeer::doSelectOne($a);
    if ($reg)
    {
      $ctaVco= $reg->getCtavco();
    }

    if ($fafactur->getTipconpag()=='R') //Asiento Contable d Cta x Cobrar a Cliente
    {
      $ctacont=$fafactur->getCtacli();
      if ($ctacont!=""){
      $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctacont);
      if ($desdoc!="") {
          self::guardarAsientos($ctacont,$desdoc,'D',$salactual,$arrasientos,$pos);
      }else{
        $msj3=1147;
        return false;
      }
      }else{
        $msj3=1147;
        return false;
      }
    }
    else
    {
      $x=$grid3[0];
    $j=0;
    while ($j<count($x))
    {
        $c= new Criteria();
        $c->add(FatippagPeer::ID,$x[$j]->getTippag());
        $data= FatippagPeer::doSelectOne($c);
        if ($data)
        {
          if ($data->getGenmov()=='S')
          {
            $a= new Criteria();
            $a->add(TsdefbanPeer::NUMCUE,$x[$j]->getNomban());
            $reg= TsdefbanPeer::doSelectOne($a);
            if ($reg)
            {
              $ctaban=$reg->getCodcta();
              if ($ctaban!=""){
              $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaban);
              if  ($desdoc!="") {
                  self::guardarAsientos($ctaban,$desdoc,'D',$x[$j]->getMonpag(),$arrasientos,$pos);
              }else{
              $msj3=1149;
                return false;
              }
              }else{
              $msj3=1149;
                return false;
              }
            }else{
              $msj3=1148;
                return false;
            }
          }
          else  //Asiento Contable de Venta al Contado
          {
              $ctaVco= $reg->getCtavco();
              if ($ctaVco!=""){
              $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaVco);
              if ($desdoc!="") {
                  self::guardarAsientos($ctaVco,$desdoc,'D',$x[$j]->getMonpag(),$arrasientos,$pos);
              }else{
              $msj3=1150;
                return false;
              }
              }else{
              $msj3=1150;
                return false;
              }            
          }
        }
        else //Asiento Contable de Venta al Contado
        {            
            if ($ctaVco!=""){
              $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaVco);
              if ($desdoc!="") {
                  self::guardarAsientos($ctaVco,$desdoc,'D',$x[$j]->getMonpag(),$arrasientos,$pos);
              }else{
              $msj3=1150;
                return false;
               }
            }else{
              $msj3=1150;
                return false;
            }
          
        }
      $j++;
    }
    }

     if ($fafactur->getVuelto()>0)  //Asiento Contable del Vuelto
     {
       if ($ctaVco=="")
       {
           $ctaVco= $reg->getCtavco();
           if ($ctaVco!="") {
            $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaVco);
            if ($desdoc!="") {
                self::guardarAsientos($ctaVco,$desdoc,'C',$fafactur->getVuelto(),$arrasientos,$pos);
            }else{
              $msj3=1150;
                return false;
            }
           }else{
              $msj3=1150;
                return false;
            }         
       }
       else
       {
         $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctaVco);
         if ($desdoc!="") {
             self::guardarAsientos($ctaVco,$desdoc,'C',$fafactur->getVuelto(),$arrasientos,$pos);
         }else{
              $msj3=1150;
                return false;
            }
       }
     }
         $cant=0;
         //Asientos de Descuentos, Recargos y Cuenta Venta
          $z=$grid1[0];
          $j=0;
          while ($j<count($z))
          {
              if ($z[$j]->getDescuentos()!='')
              {
                 $cadenades=split('!',$z[$j]->getDescuentos());
                 $r=0;
                 while ($r<(count($cadenades)-1))
                 {
                   $aux=$cadenades[$r];
                   $aux2=split('_',$aux);
                   if ($aux2[0]!="" )
                   {                 
                       if ($aux2[3]!="") //Cuenta Contable
                       {
                        $cuencon=$aux2[3];
                        if ($cuencon!=""){
                        $descrip=H::getX_vacio('codcta','Contabb','Descta',$cuencon);
                        if ($descrip!="") {
                            self::guardarAsientos($cuencon,$descrip,'D',H::toFloat($aux2[2]),$arrasientos,$pos);
                        }else{
                          $msj3=1151;
                          return false;
                         }
                        }else{
                          $msj3=1151;
                          return false;
                        }
                       }else{
                          $msj3=1151;
                          return false;
                       }   
                   }
                 $r++;
                }//while
               }//if ($x[$j]->getDescuentos()!='')    

            if ($z[$j]->getRecargos()!='')
            {
             $cadenarec=split('!',$z[$j]->getRecargos());
             $r=0;
             while ($r<(count($cadenarec)-1))
             {
               $aux=$cadenarec[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                   if ($aux2[4]!="")
                   {
                    $cuencon=$aux2[4];
                    if ($cuencon!=""){
                     $descrip=H::getX_vacio('codcta','Contabb','Descta',$cuencon);
                     if ($descrip!="") {
                         $c = new Criteria();
                         $c->add(FargoartPeer::REFDOC,$fafactur->getReffac());
                         $c->add(FargoartPeer::CODRGO,$aux2[0]);
                         $per = FargoartPeer::doSelectOne($c);
                         if($per)
                            $monrgo=$per->getMonrgo();
                         else
                            $monrgo=H::toFloat ($aux2[3]);
                         self::guardarAsientos($cuencon,$descrip,'C',$monrgo,$arrasientos,$pos);
                     }else{
                      $msj3=1152;
                      return false;
                    }
                    }else{
                      $msj3=1152;
                      return false;
                    }
                   }else{
                      $msj3=1152;
                      return false;
                  }
               }
              $r++;
             }//while
            }//if ($x[$j]->getRecargos()!='')

        if ($z[$j]->getCodart()!="")
        {
          if ($z[$j]->getBlanco2()=='0,00' && $fafactur->getTipref()!='VC')
          {
             eval('$cant = $z[$j]->get'.ucfirst(strtolower($col)).'();');
             if ($z[$j]->getPrecio()!="") { $precio=$z[$j]->getPrecio(); }
             else { $precio=$z[$j]->getPrecioe();}
             $monto_ingreso=$z[$j]->getTotart()-$z[$j]->getMonrgo()+$z[$j]->getMondes();
          }
          else
          {
            if ($fafactur->getTipref()=='VC')
            {
              $d= new Criteria();
              $d->add(FaartproPeer::CODPRO,$fafactur->getCodcli());
              $d->add(FaartproPeer::CODART,$z[$j]->getCodart());
              $d->add(FaartproPeer::TIPPER,'C');
              $dat= FaartproPeer::doSelectOne($d);
              if ($dat)
              {
                $porcentaje=$dat->getComisi();
                $cta_provee=$dat->getCtades();
              }
              else
              {
                $porcentaje=$z[$j]->getBlanco2();
              }
            }
              eval('$cant = $z[$j]->get'.ucfirst(strtolower($col)).'();');
              if ($z[$j]->getPrecio()!="") { $precio=$z[$j]->getPrecio(); }
             else { $precio=$z[$j]->getPrecioe();}
             $monto_par=$z[$j]->getTotart()-$z[$j]->getMonrgo()+$z[$j]->getMondes();
             $monaux=(($monto_par*$porcentaje)/100);
             $monto_ingreso=(($monto_par)-$monaux);

          }

          $cta_vta=H::getX('Codart','Caregart','Ctavta',$z[$j]->getCodart());
          if ($cta_vta!="")
          {
            if (!self::buscarAsientos($cta_vta,'C',$monto_ingreso,$arrasientos,$pos))
            {
              $descrip=H::getX_vacio('codcta','Contabb','Descta',$cta_vta);
              if ($descrip!="") {
                  self::guardarAsientos($cta_vta,$descrip,'C',$monto_ingreso,$arrasientos,$pos);
              }else{
              $msj3=1153;
              return false;
              }
            }
          }else{
              $msj3=1153;
              return false;
          }

          if ($z[$j]->getBlanco2()!='0,00' || $fafactur->getTipref()=='VC')
          {
            eval('$cant = $z[$j]->get'.ucfirst(strtolower($col)).'();');
            if ($z[$j]->getPrecio()!="") { $precio=$z[$j]->getPrecio(); }
             else { $precio=$z[$j]->getPrecioe();}
             $monto_p=$z[$j]->getTotart()-$z[$j]->getMonrgo()+$z[$j]->getMondes();
                $monto_provee=(($monto_p*$porcentaje)/100);
            if ($fafactur->getTipref()!='VC')
            {
              $f= new Criteria();
              $f->add(CaproveePeer::CODPRO,$z[$j]->getCodctapro());
              $reg= CaproveePeer::doSelectOne($f);
              if ($reg)
              {
                $cta_provee=$reg->getCodcta();
              }else $cta_provee="";
            }
            if ($cta_provee!="")
            {
                if (!self::buscarAsientos($cta_provee,'C',$monto_provee,$arrasientos,$pos))
              {
                $descrip=H::getX_vacio('codcta','Contabb','Descta',$cta_provee);
                      if ($descrip!="") {
                          self::guardarAsientos($cta_provee,$descrip,'C',$monto_provee,$arrasientos,$pos);
                      }else{
                          $msj3=1154;
                         return false;
                      }
              }
            }else{
              $msj3=1154;
              return false;
            }
          }

        }
      $j++;
    }    
         

     return true;
  }


 public static function actualizarArticulosFactura1($factura,$grid,&$msjt)
 {
   $msjt="-1";
   $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
   $col=self::determinarReferenciaDoc($factura->getTipref());
   $x=$grid[0];
   $calmacen=H::getX_vacio('ID','Fadefcaj','CODALM',$factura->getCodcaj());   
   $j=0;
   while ($j<count($x))
   {
    eval('$cantot = $x[$j]->get'.ucfirst(strtolower($col)).'();');
    $codarti=$x[$j]->getCodart();
    $cantd=$cantot;
     if ($codarti!="" and $cantd>0)
     {
       $c = new Criteria();
       $c->add(CaregartPeer::CODART,$codarti);
       $arti = CaregartPeer::doSelectOne($c);
       if ($arti)
        {
         $tipoart=$arti->getTipo();
         if ($manunialt=='S')
        {
           if ($x[$j]->getUnimed()!="")
          {
             if ($x[$j]->getUnimed()!=$arti->getUnimed())
             {
                 $k= new Criteria();                                     
                 $k->add(CaunialartPeer::CODART,$codarti);
                 $k->add(CaunialartPeer::UNIALT,$x[$j]->getUnimed());
                 $result3= CaunialartPeer::doSelectOne($k);
                 if ($result3)
                 {
                     $cantd=$cantd*$result3->getRelart();
                 }
             }
          }                
        }
         if ($tipoart=='A')
         {
             $act1=$arti->getExitot() - $cantd;
             $dis1=$arti->getDistot() - $cantd;
             $arti->setExitot($act1);
             $arti->setDistot($dis1);
             $arti->save();
             $c = new Criteria();
             $c->add(CaartalmubiPeer::CODART,$codarti);
             $c->add(CaartalmubiPeer::CODALM,$calmacen);
             $alm = CaartalmubiPeer::doSelectOne($c);
             if ($alm)
             {
                if($alm->getExiact()>=$cantd)
                 {
                     $act2=$alm->getExiact() - $cantd;
                     $alm->setExiact($act2);
                     $alm->save();
                 }
             }// if ($alm)
             $c = new Criteria();
             $c->add(CaartalmPeer::CODART,$codarti);
             $c->add(CaartalmPeer::CODALM,$calmacen);
             $reg = CaartalmPeer::doSelectOne($c);
             if ($reg)
             {
              if($reg->getExiact()>=$cantd)
               {
                   $act2=$reg->getExiact() - $cantd;
                   $reg->setExiact($act2);
                   $reg->save();
               }
            }
         }
         }
      }
   $j++;
  }
 return true;
}   

public static function actualizarArticulosFactura2($factura,$grid)
{
  $requi=$factura->getReffac();
  $col=self::determinarReferenciaDoc($factura->getTipref());
  $x=$grid[0];
  $j=0;
  while ($j<count($x)) {
  $codarti=$x[$j]->getCodart();
  eval('$cantot = $x[$j]->get'.ucfirst(strtolower($col)).'();');
  $cantd=$cantot;
  if ($codarti!="" and $cantd>0)
  {
      $c = new Criteria();
      $c->add(FaartfacPeer::REFFAC,$requi);
      $c->add(FaartfacPeer::CODART,$codarti);
      $reqarti = FaartfacPeer::doSelectOne($c);
         if ($reqarti)
         {
           if (($reqarti->getCandes() != "") && ($reqarti->getCandes() >= 0))
              $act3=$reqarti->getCandes() + $cantd;
           else
              $act3=$cantd;
           $reqarti->setCandes($act3);
           $reqarti->save();
         }
    }
    $j++;
  }
}   

public static function grabarDetalleProforma($fafacturpro,$grid1)
  {
      $x=$grid1[0];
      $i=0;
      while ($i<count($x))
      {
        if ($x[$i]->getCheck()=="1" && $x[$i]->getEstatus2()!='F')
        {
            $x[$i]->setReffac($fafacturpro->getReffac());
            if ($x[$i]->getPrecio()==0)
            {
              $x[$i]->setPrecio($x[$i]->getPrecioe());
            }
           $x[$i]->save();
       }
       $i++;
      }

    $z=$grid1[1];
    $j=0;
    if (!empty($z[$j]))
    {
        while ($j<count($z))
        {
        //  if ($z[$j]->getEstatus2()!='F') {
            $z[$j]->delete();
         // }
          $j++;
        }
    }
  }

public static function buscarPresupuestos($codcli,$presupcon,$codmon,&$reg)
  {
     $reg=array();      
     $manprecon=H::getConfApp2('manprecon', 'facturacion', 'fafactur');
     if ($manprecon=='S') {
         if ($presupcon=='S')
           $sqlcompl=" and tippre='C'";
         else $sqlcompl="";
         $sql = "Select '' as check, refpre as refpre,despre as despre,fecpre as fecpre, 
         9 as id from fapresup WHERE CodCli='" . $codcli . "' and tipmon='".$codmon."' ".$sqlcompl."
         and refpre not in 
         (Select refped from FaPedido where refped=FaPresup.refpre and TipRef='PR') 
         order by refpre";       
      }else {
        $sql = "Select '' as check, refpre as refpre,despre as despre,fecpre as fecpre, 
         9 as id from fapresup WHERE CodCli='" . $codcli . "' and tipmon='".$codmon."'
         and refpre not in 
         (Select refped from FaPedido where refped=FaPresup.refpre and TipRef='PR') 
         order by refpre";
      }   
   
      if (Herramientas::BuscarDatos($sql,$res))
      {
          $p=0;          
          while ($p<count($res))
          {               
             $j=count($reg)+1;
             $reg[$j-1]["check"]=$res[$p]["check"];
             $reg[$j-1]["refpre"]=$res[$p]["refpre"];
             $reg[$j-1]["despre"]=$res[$p]["despre"];
             $reg[$j-1]["fecpre"]=$res[$p]["fecpre"];
             $reg[$j-1]["id"]=$res[$p]["id"];               
             
             $p++;
          }
      }
  }

  public static function grabarDetalleFacturaPro($fafactur,$grid1)
  {
    $x=$grid1[0];
    $j=0;
    $cantot=0;
    if ($x[$j]->getCodart()!="")
    {
      while ($j<count($x))
      {
        if ($x[$j]->getCheck()=='1' && $x[$j]->getCodart()!="")
        {
           $x[$j]->setReffac($fafactur->getReffac());
           if ($x[$j]->getPrecio()=="")
           {
            $x[$j]->setPrecio($x[$j]->getPrecioe());
           } 
           if ($nuevo=='')
              $x[$j]->save();
            else {
             if ($x[$j]->getEstatus2()!="P")        
               $x[$j]->save();
             }
        }
        $j++;
      }
    }

    $z=$grid1[1];
    $l=0;
    if (!empty($z[$l]))
    {
      while ($l<count($z))
      {
         if ($z[$l]->getEstatus2()!="P")   
           $z[$l]->delete();
        $l++;
      }
    }
  }

  public static function posicion_en_el_grid($arreglo,$codigo,$referencia)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($arreglo[$ind]["codref"]==$referencia  && $arreglo[$ind]["codart"]==$codigo)      
        $enc=true;
           
      $ind++;
    }
    if ($enc)
      $posicionenelgrid=$ind;
    else
      $posicionenelgrid=0;

   return $posicionenelgrid;
  }  

  public static function mostrarRecargosArticulosContrato($referencia,$codart,$tipref,$monnet,&$arreglorecarg,&$acumrgo)
  {
    $arreglorecarg="";
    $acumrgo=0;
    $a= new Criteria();
    if ($tipref=='P') {
      $a->add(FargopedPeer::REFDOC,$referencia);
      $a->add(FargopedPeer::CODART,$codart);
      $resul= FargopedPeer::doSelect($a);
    }else {
      $a->add(FargoprePeer::REFDOC,$referencia);
      $a->add(FargoprePeer::CODART,$codart);
      $resul= FargoprePeer::doSelect($a);
    }
    if ($resul)
    {      
      foreach ($resul as $datos)
      {
         if ($datos->getTipo()=='M')
           $monrgo=H::FormatoMonto($datos->getMonrgo2());
         else $monrgo=H::FormatoMonto($monnet*$datos->getMonrgo2()/100);
         //$monrgo=H::FormatoMonto($datos->getMonrgo());
          $acumrgo+=H::toFloat($monrgo);
         $monrgoc=H::FormatoMonto($datos->getMonrgo2());
         $arreglorecarg.=$datos->getCodrgo().'_'.$datos->getNomrgo().'_'.$datos->getRecfij().'_' .$monrgo.'_'.$datos->getCodcta().'_'.$datos->getTipo().'_'.$monrgoc.'!';
      }
    }
  }

  public static function anularMovLibroFac($reffac,$fecanu,$motanu,$numcom)
  {
    $msj="";
    $p= new Criteria();
    $p->add(FaforpagPeer::REFFAC,$reffac);
    $resultp= FaforpagPeer::doSelect($p);
    if ($resultp)
    {
        foreach ($resultp as $objp)
        {
          $a= new Criteria();
          $a->add(FatippagPeer::ID,$objp->getTippag());
          $resula= FatippagPeer::doSelectOne($a);
          if ($resula)
          {
            if ($resula->getGenmov()=='S')
            { 
              $nroreflib=$objp->getNumero();
              $nrocue=$objp->getNomban();
              $tipmov=$objp->getCodmov();

              $d= new Criteria();
              $d->add(TsmovlibPeer::NUMCUE,$nrocue);
              $d->add(TsmovlibPeer::REFLIB,$nroreflib);
              //$d->add(TsmovlibPeer::TIPMOV,$tipmov);
              $d->add(TsmovlibPeer::NUMCOM,$numcom);
              $resul=TsmovlibPeer::doSelectOne($d);
              if ($resul)
              { 
               if ($resul->getStacon()!='C')
               {
                  $tsmovlib= new Tsmovlib();
                  $tsmovlib->setNumcue($nrocue);
                  $tsmovlib->setReflib("A".substr($nroreflib,1,7));
                  $tsmovlib->setFeclib($fecanu);
                  $afecta="";
                  $c= new Criteria();
                  $c->add(TstipmovPeer::CODTIP,$tipmov);
                  $data=TstipmovPeer::doSelectOne($c);
                  if ($data)
                  { $afecta=$data->getDebcre();}
                  if ($afecta=='C')
                  {
                   $tsmovlib->setTipmov('ANUC');
                  }else { $tsmovlib->setTipmov('ANUD');}
                 $tsmovlib->setMonmov($resul->getMonmov());
                 $tsmovlib->setNumcom("A".substr($resul->getNumcom(),1,7));
                 $tsmovlib->setCodcta($resul->getCodcta());
                 $tsmovlib->setFeccom($fecanu);
                 $tsmovlib->setStatus('C');
                 $tsmovlib->setStacon('C');
                 $tsmovlib->setDeslib($motanu);
                 $tsmovlib->setReflibpad($nroreflib);
                 $tsmovlib->setTipmovpad($tipmov);
                 $tsmovlib->save();
                 Tesoreria::actualizaBancos($nrocue,'A',$afecta,$resul->getMonmov());
               }
               else
               {
                $msj='El Movimiento esta Conciliado, No puede ser anulado';
               }
              }
            }
          }
        }
    }
    return $msj;     
  }  

}
?>
