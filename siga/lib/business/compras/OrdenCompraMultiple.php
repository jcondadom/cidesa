<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class OrdenCompraMultiple {

  public static function Verificar_proveedor($codigo,$rif,&$msg)
  {
    $msg="";
    $seguir=true;
    
        $cadenasol=split('_',$codigo);
        $r=0;
        while ($r<(count($cadenasol)-1) && ($seguir))
        {
            $t= new Criteria();
            $t->add(CacotizaPeer::REFSOL,$cadenasol[$r]);
            $resul= CacotizaPeer::doSelectOne($t);
            if ($resul)
            {
                 $sql = "Select reqart,sum(coalesce(canreq,0)) as canreq,sum(coalesce(canord,0)) as canrec From CAArtSol Where ReqArt = '".$cadenasol[$r]."' Group By ReqArt";
               if (Herramientas::BuscarDatos($sql,$result))
               {
                   if (($result[0]['canreq']-$result[0]['canrec'])<=0)
                    {
                        $msg="La Solicitud se encuentra totalmente saldada";
                        $seguir=false;
                    }
                    else
                    {
                       $sql1 = "select distinct(b.rifpro) as rifpro, a.refcot,c.conpag,c.forent from cadetcot a,caprovee b,cacotiza c where c.codpro=b.codpro and c.refsol='".$cadenasol[$r]."' and a.refcot=c.refcot and a.priori=1";
                        if (Herramientas::BuscarDatos($sql1,$result1))
                        {
                            $i=0;
                            $seguir=false;
                            while ($i<count($result1))
                            {
                                if ($result1[$i]['rifpro']==$rif)
                                {
                                  $seguir=true;
                                  break;
                                }
                                $i++;
                              }
                            if (!$seguir)
                            {
                                  $msg="La Contratistas de Bienes o Servicio y Cooperativas de la Cotizacion asociada a la  Solicitud no tiene asignado Prioridad 1";
                                  break;
                            }
                        }                        
                    }
               }
            }else {
              $seguir=true;
            }
          $r++;
        }
        

    return $seguir;
  }

 public static function Cargartirarecargosgrid($refsol="",$codart="",$codcat="")
 {

     $cadena="";
     $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
     $c = new Criteria();
     $c->add(CadisrgoPeer::REQART,$refsol);
     $c->add(CadisrgoPeer::CODART,$codart);
     $c->add(CadisrgoPeer::CODCAT,$codcat);
     $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
     $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
     $result = CadisrgoPeer::doSelect($c);
     if ($result)
     {
        foreach ($result as $datos)
        {
           $cadena=$cadena . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $datos->getMonrgoc() .'_'. $datos->getTiprgo().'_' . $datos->getMonrgo() .'_'. $datos->getCodpar(). '!';
        }
     }
    return $cadena;
 }


  public static function GenerarDetalle($solicitudes="", $fecord="", $rifpro="", &$arreglo=array(), &$msj="", &$provee="")
  {
      if ($solicitudes!="")
      {
        //Validar que la fecha de las solicitudes sea menor a la de OC
        $cadenasol=split('_',$solicitudes);
        $r=0;
        while ($r<(count($cadenasol)-1))
        {
           $t= new Criteria();
           $t->add(CasolartPeer::REQART,$cadenasol[$r]);
           $reg=  CasolartPeer::doSelectOne($t);
           if ($reg)
           {
             if ($reg->getFecreq()>$fecord)
             {
                 $msj="La Fecha de la Solicitud ".$cadenasol[$r]." no puede ser mayor a la de la Orden de Compra";
                 return false;
             }
           }
          $r++;
        }

        $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();

        //Se Busca si todas las solicitudes tienen cotizacion o no
        $cad1="";
        $cad2="";
        $cadenasol=split('_',$solicitudes);
        $r=0;
        while ($r<(count($cadenasol)-1))
        {
           $t= new Criteria();
           $t->addJoin(CacotizaPeer::REFCOT,  CadetcotPeer::REFCOT);
           $t->add(CadetcotPeer::PRIORI,'1');
           $t->add(CacotizaPeer::REFSOL,$cadenasol[$r]);
           $reg=  CacotizaPeer::doSelectOne($t);
           if ($reg)
           {
             $cad1= $cad1.$cadenasol[$r]."!";
           }else {
               $cad2= $cad2.$cadenasol[$r]."!";
           }
          $r++;
        }

        $canprove=0;
        if ($cad1!="" && $cad2=="")
        {
          $cadsol=split('!',$cad1);
            $r=0;
            $enc=false;
            while ($r<(count($cadsol)-1))
            {
               $t= new Criteria();
               $t->addJoin(CacotizaPeer::REFCOT,  CadetcotPeer::REFCOT);
               $t->add(CadetcotPeer::PRIORI,'1');
               $t->add(CacotizaPeer::REFSOL,$cadsol[$r]);
               $reg=  CacotizaPeer::doSelectOne($t);
               if ($reg)
               {
                 $canprove=count($reg);
                if ($canprove==1){
                   if ($r==0) {
                       $provee=$reg->getCodpro();
                   }
                   if ($reg->getCodpro()!=$provee)
                   {
                       $enc=true;
                       $msj="La Solicitud ".$cadsol[$r]." tiene distinto Proveedor a la de las demás, desmarquela para continuar ";
                       break;
                   }

                }else  {
                    if ($rifpro=="") {
                    $enc=true;
                    $msj="La Solicitud ".$cadsol[$r]." tiene más de un Proveedor con Prioridad 1, Por favor indique el Proveedor a cargar en esta Orden. ";
                    break;
                    }
                }

               }
              $r++;
            }
            
            if (!$enc)
            {
               $cadsol=split('!',$cad1);
                $r=0;
                if ($rifpro=="")
                    $tippro=H::getX_vacio('CODPRO', 'Caprovee', 'Tipo', $provee);
                else
                    $tippro=H::getX_vacio('CODPRO', 'Caprovee', 'Tipo', $rifpro);
                while ($r<(count($cadsol)-1))
                {
                    $q= new Criteria();
                    if ($rifpro=="") {
                        $q->add(CaartsolPeer::REQART,$cadsol[$r]);
                        $result= CaartsolPeer::doSelect($q);
                    }else {                        
                        $q->addJoin(CaartsolPeer::REQART,CasolartPeer::REQART);
                        $q->addJoin(CacotizaPeer::REFCOT, CadetcotPeer::REFCOT);
                        $q->addJoin(CaartsolPeer::CODART, CadetcotPeer::CODART);
                        $q->addJoin(CasolartPeer::REQART,  CacotizaPeer::REFSOL);
                        $q->add(CaartsolPeer::REQART,$cadsol[$r]);
                        $q->add(CacotizaPeer::CODPRO,H::getX_vacio('RIFPRO', 'Caprovee', 'Codpro', $rifpro));
                        $q->add(CadetcotPeer::PRIORI,'1');
                        $result= CaartsolPeer::doSelect($q);
                    }
                    if ($result) {
                        foreach ($result  as $objres)
                        {
                            //Chequeamos si tiene recargo o no
                            $w= new Criteria();
                            $w->add(CadisrgoPeer::REQART,$cadsol[$r]);
                            $w->add(CadisrgoPeer::CODART,$objres->getCodart());
                            $w->add(CadisrgoPeer::CODCAT,$objres->getCodcat());
                            $w->add(CadisrgoPeer::TIPDOC,$tipdoc);
                            $trajo= CadisrgoPeer::doSelect($w);

                             $j=count($arreglo)+1;
                             if ($trajo && $tippro!='P')
                                 $arreglo[$j-1]["check"]='1';
                             else
                                 $arreglo[$j-1]["check"]='0';
                             $arreglo[$j-1]["codart"]=$objres->getCodart();
                             $arreglo[$j-1]["desart"]=$objres->getDesart();
                             if ($objres->getUnimed()!="")
                                 $arreglo[$j-1]["unimed"]= $objres->getUnimed();
                             else
                                 $arreglo[$j-1]["unimed"]=H::getX_vacio('Codart', 'Caregart', 'Unimed', $objres->getCodart());
                             $arreglo[$j-1]["codpar"]=$objres->getCodpar();
                             $arreglo[$j-1]["codcat"]=$objres->getCodcat();
                             $arreglo[$j-1]["codpre"]=$arreglo[$j-1]["codcat"]."-".$arreglo[$j-1]["codpar"];
                             $arreglo[$j-1]["canord"]=number_format($objres->getCanreq()-$objres->getCanord(),2,',','.');
                             $arreglo[$j-1]["canaju"]="0,00";
                             $arreglo[$j-1]["canrec"]=number_format($objres->getCanrec(),2,',','.');
                             $arreglo[$j-1]["cantot"]=number_format($objres->getCanreq()-$objres->getCanord(),2,',','.');
                             $arreglo[$j-1]["preart"]=number_format($objres->getCosto(),6,',','.');
                             $arreglo[$j-1]["prenet"]=number_format($objres->getCosto()*($objres->getCanreq()-$objres->getCanord()),6,',','.');
                             $arreglo[$j-1]["dtoart"]=number_format($objres->getMondes(),2,',','.');

                             $arreglo[$j-1]["rgoart"]=number_format($objres->getMonrgo(),4,',','.');
                             /*$arreglo[$j-1]["totart"]=number_format($objres->getMontot(),6,',','.');
                             $arreglo[$j-1]["anadir"]="";
                              if ($trajo && $tippro!='P'){
                                 $arreglo[$j-1]["datosrecargo"]=self::Cargartirarecargosgrid($cadsol[$r], $objres->getCodart(), $objres->getCodcat());
                              }else {
                                  $arreglo[$j-1]["datosrecargo"]="";
                              }*/
                             $acum=0;
                             $datosrecargo="";
                             $arreglo[$j-1]["anadir"]="";
                             $arreglo[$j-1]["datosrecargo"]="";
                             if ($trajo)
                             {
                                foreach ($trajo as $datos)
                                {                 
                                   $reccal=SolicituddeEgresos::CalcularRecargos($datos->getTiprgo(),$datos->getMonrgoc(),H::toFloat($arreglo[$j-1]["prenet"],6));
                                   $monrgoc=number_format($datos->getMonrgoc(),2,',','.');
                                   if ($datos->getTiprgo()=='M')
                                     $reccal=number_format($datos->getMonrgo(),4,',','.');
                                   else 
                                    $reccal=number_format($reccal,4,',','.');
                                   $datosrecargo=$datosrecargo . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $monrgoc .'_'. $datos->getTiprgo().'_' . $reccal .'_'. $datos->getCodpar(). '!'; 
                                   $acum=$acum+H::toFloat($reccal,4);
                                }
                             
                            $arreglo[$j-1]["rgoart"]=H::toFloat($acum,4);
                            $arreglo[$j-1]["datosrecargo"]=$datosrecargo;
                            }
                            $arreglo[$j-1]["totart"]=H::toFloat($arreglo[$j-1]["prenet"],6)+(H::toFloat($arreglo[$j-1]["rgoart"],4))-($objres->getMondes());
                              $arreglo[$j-1]["reqart"]=$cadsol[$r];
                              $arreglo[$j-1]["canreq"]=number_format($objres->getCanreq()-$objres->getCanord(),2,',','.');
                              $arreglo[$j-1]["id"]="9";
                        }
                    }

                 $r++;
                }
            }
        }else if ($cad1=="" && $cad2!="") {
            $cadsol=split('!',$cad2);            
            $r=0;
            $tippro="";
            while ($r<(count($cadsol)-1))
            {
                $q= new Criteria();
                $q->add(CaartsolPeer::REQART,$cadsol[$r]);
                $result= CaartsolPeer::doSelect($q);
                if ($result) {
                    foreach ($result  as $objres)
                    {
                        //Chequeamos si tiene recargo o no
                        $w= new Criteria();
                        $w->add(CadisrgoPeer::REQART,$cadsol[$r]);
                        $w->add(CadisrgoPeer::CODART,$objres->getCodart());
                        $w->add(CadisrgoPeer::CODCAT,$objres->getCodcat());
                        $w->add(CadisrgoPeer::TIPDOC,$tipdoc);
                        $trajo= CadisrgoPeer::doSelect($w);

                         $j=count($arreglo)+1;
                         if ($trajo && $tippro!='P')
                             $arreglo[$j-1]["check"]='1';
                         else
                             $arreglo[$j-1]["check"]='0';
                         $arreglo[$j-1]["codart"]=$objres->getCodart();
                         $arreglo[$j-1]["desart"]=$objres->getDesart();
                         if ($objres->getUnimed()!="")
                             $arreglo[$j-1]["unimed"]= $objres->getUnimed();
                         else
                             $arreglo[$j-1]["unimed"]=H::getX_vacio('Codart', 'Caregart', 'Unimed', $objres->getCodart());
                         $arreglo[$j-1]["codpar"]=$objres->getCodpar();
                         $arreglo[$j-1]["codcat"]=$objres->getCodcat();
                         $arreglo[$j-1]["codpre"]=$arreglo[$j-1]["codcat"]."-".$arreglo[$j-1]["codpar"];
                         $arreglo[$j-1]["canord"]=number_format($objres->getCanreq()-$objres->getCanord(),2,',','.');
                         $arreglo[$j-1]["canaju"]="0,00";
                         $arreglo[$j-1]["canrec"]=number_format($objres->getCanrec(),2,',','.');
                         $arreglo[$j-1]["cantot"]=number_format($objres->getCanreq()-$objres->getCanord(),2,',','.');
                         $arreglo[$j-1]["preart"]=number_format($objres->getCosto(),6,',','.');
                         $arreglo[$j-1]["prenet"]=number_format($objres->getCosto()*($objres->getCanreq()-$objres->getCanord()),6,',','.');
                         $arreglo[$j-1]["dtoart"]=number_format($objres->getMondes(),2,',','.');
                         $arreglo[$j-1]["rgoart"]=number_format($objres->getMonrgo(),4,',','.');
                         $acum=0;
                         $datosrecargo="";
                         $arreglo[$j-1]["datosrecargo"]="";
                         if ($trajo)
                         {
                            foreach ($trajo as $datos)
                            {                 
                               $reccal=SolicituddeEgresos::CalcularRecargos($datos->getTiprgo(),$datos->getMonrgoc(),H::toFloat($arreglo[$j-1]["prenet"],6));
                               $monrgoc=number_format($datos->getMonrgoc(),2,',','.');
                               if ($datos->getTiprgo()=='M')
                                 $reccal=number_format($datos->getMonrgo(),4,',','.');
                               else 
                                $reccal=number_format($reccal,4,',','.');
                               $datosrecargo=$datosrecargo . $datos->getCodrgo().'_' . $datos->getNomrgo().'_' . $monrgoc .'_'. $datos->getTiprgo().'_' . $reccal .'_'. $datos->getCodpar(). '!'; 
                               $acum=$acum+H::toFloat($reccal,4);
                            }
                         
                        $arreglo[$j-1]["rgoart"]=H::toFloat($acum,4);
                        $arreglo[$j-1]["datosrecargo"]=$datosrecargo;
                        }
                        $arreglo[$j-1]["totart"]=H::toFloat($arreglo[$j-1]["prenet"],6)+(H::toFloat($arreglo[$j-1]["rgoart"],4))-($objres->getMondes());
                        // $arreglo[$j-1]["rgoart"]=number_format($objres->getMonrgo(),4,',','.');
                         //$arreglo[$j-1]["totart"]=number_format($objres->getMontot(),6,',','.');
                         $arreglo[$j-1]["anadir"]="";
                         /*if ($trajo && $tippro!='P'){
                             $arreglo[$j-1]["datosrecargo"]=self::Cargartirarecargosgrid($cadsol[$r], $objres->getCodart(), $objres->getCodcat());
                          }else {
                              $arreglo[$j-1]["datosrecargo"]="";
                          }*/
                          $arreglo[$j-1]["reqart"]=$cadsol[$r];
                          $arreglo[$j-1]["canreq"]=number_format($objres->getCanreq()-$objres->getCanord(),2,',','.');
                          $arreglo[$j-1]["id"]="9";
                    }
                }

             $r++;
            }
        }else {
           $msj="Se deben seleccionar Solicitudes donde Todas tengan Cotizaci&oacute;n o No tengan Cotizaci&oacute;n";
        }
      }else {
          $msj="Debe Seleccionar al menos una Solicitud";
      }

      return true;
  }

   public static function Grabar_compromiso($caordcom)
   {
      $referencia = $caordcom->getOrdcom();
      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
      Herramientas::EliminarRegistro("CpCompro", "Refcom", $referencia);
      Herramientas::EliminarRegistro("Cpimpcom", "Refcom", $referencia);
      $result=array();
      $ref_scs=split('_', $caordcom->getRefsol());
      if (count($ref_scs)==0)
        $ref_sc=$caordcom->getRefsol();
      else
        $ref_sc=$ref_scs[0];

      $sql = "Select * From CpCompro Where rtrim(RefCom) ='".$referencia."'";
      $fecha_ano=substr($caordcom->getFecord(), 0, 4);
      if (!Herramientas::BuscarDatos($sql,$result))
      {
          $cpcompro_new = new Cpcompro();
          $cpcompro_new->setRefcom($referencia);
          $cpcompro_new->setTipcom($caordcom->getDoccom());
          $cpcompro_new->setFeccom($caordcom->getFecord());
          $cpcompro_new->setAnocom($fecha_ano);
          if ($caordcom->getRefsol())
             $cpcompro_new->setRefprc($ref_sc);
          else
             $cpcompro_new->setRefprc('NULO');
          $cpcompro_new->setTipprc($tipdoc);
          $cpcompro_new->setDescom($caordcom->getDesord());
          $cpcompro_new->setMoncom($caordcom->getMonord());
          $cpcompro_new->setSalcau('0');
          $cpcompro_new->setSalpag('0');
          $cpcompro_new->setSalaju('0');
          $cpcompro_new->setCedrif($caordcom->getRifpro());
          $cpcompro_new->setStacom('A');
          $cpcompro_new->setTipo($caordcom->getTipo());
          $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$caordcom->getDoccom());
          if ($reqaut=='S')
            $cpcompro_new->setAprcom('N');
          else{
            $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
            $cpcompro_new->setLoguse($loguse);
            $cpcompro_new->setAprcom('S');
          }

          $cpcompro_new->save();
        $result=array();
        $sql1='';
        $sql = "Select AsiParRec from CaDefArt";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $tiporec=str_replace("'","",$result[0]['asiparrec']);
          if (str_replace("'","",$result[0]['asiparrec'])!='C')
            $sql1="Select (A.CodCat)||'-'||(A.CodPar) AS codpre, SUM(A.TotArt)-SUM(A.RGOART) AS totimp, reqart as reqart From CaArtOrd A,CARegArt B  Where A.CODART=B.CODART AND A.OrdCom='".$caordcom->getOrdcom()."'  GROUP BY (A.CodCat)||'-'||(A.CodPar), reqart";
          else     //COSTO DEL ARTICULO
            $sql1= "Select Rtrim(A.CodCat)||'-'||Rtrim(A.CodPar) as codpre, SUM(A.TotArt) as totimp, reqart as reqart From CaArtOrd A,CARegArt B Where A.CODART=B.CODART AND A.OrdCom='".$caordcom->getOrdcom()."' GROUP BY Rtrim(A.CodCat)||'-'||Rtrim(A.CodPar),reqart";//ojo rebisar
        }
        $sql1;
        $result2=array();
        $refprecom=H::getX_vacio('TipCom','CpDocCom','RefPrc',$caordcom->getDoccom());
        if (Herramientas::BuscarDatos($sql1,$result2))
        {
          $i=0;
          while ($i<count($result2))
          {
            if (str_replace("'","",$result2[$i]['totimp'])>0)
            {
                  $cpimpcom_new = new Cpimpcom();
                    $cpimpcom_new->setRefcom($referencia);
                    $cpimpcom_new->setCodpre(str_replace("'","",$result2[$i]['codpre']));
                    $cpimpcom_new->setMonimp(str_replace("'","",$result2[$i]['totimp']));
                    $cpimpcom_new->setMoncau('0');
                    $cpimpcom_new->setMonpag('0');
                    $cpimpcom_new->setMonaju('0');
                    $cpimpcom_new->setStaimp('A');
                    if ($caordcom->getRefsol() && $refprecom!='N')
                         $cpimpcom_new->setRefere($result2[$i]['reqart']);
                    else
                         $cpimpcom_new->setRefere('NULO');
                  $cpimpcom_new->save();
            }
            $i++;
          }
       }
       if ($tiporec<>'C')
       {
        $sql="SELECT SUM(monrgo) as totimp,codpre, refsol FROM CADISRGO WHERE REQART='".$caordcom->getOrdcom()."' AND TIPDOC='".$caordcom->getDoccom()."' GROUP BY CODPRE,refsol";
        $result=array();
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $i=0;
          while ($i<count($result))
          {
            if (str_replace("'","",$result[$i]['totimp'])>0)
            {
                if ($result[$i]['refsol']!='')
                      $var=$result[$i]['refsol'];
                else
                      $var='NULO';
                $sql="Insert into Cpimpcom values ('".$referencia."','".$result[$i]['codpre']."','".$result[$i]['totimp']."','0','0','0','A','".$var."')";
                Herramientas::insertarRegistros($sql);
             }
             $i++;
           }
        }
       }
         $c= new Criteria();
         $c->add(CaordcomPeer::ORDCOM,$caordcom->getOrdcom());
         $caordcom_up = CaordcomPeer::doSelectOne($c);
         if (count($caordcom_up)>0)
         {
              $caordcom_up->setRefcom($referencia);
              $caordcom_up->setAfepre('S');
              $caordcom_up->save();
         }
      $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
      if ($manevento=='S' && $caordcom->getRefsol()!='')
      {
         $tipdoc=H::getX_vacio('REFCOM','Cpcompro','Tipcom',$referencia);         
         $e= new Criteria();
         $e->add(CpimpcomPeer::REFCOM,$referencia);
         $trajo= CpimpcomPeer::doSelect($e);
         if ($trajo)
         {
           foreach ($trajo as $objprc) {
              $cpdiseve= new Cpdiseve();
              $cpdiseve->setRefdoc($objprc->getRefcom());
              $cpdiseve->setCodpre($objprc->getCodpre());
              $codeve=H::getX_vacio('REQART','Casolart','Codeve',$objprc->getRefere());
              $cpdiseve->setCodeve($codeve);
              $cpdiseve->setMoneve($objprc->getMonimp());
              $cpdiseve->setTipdoc($tipdoc);
              $cpdiseve->setTipmov('COM');
              $cpdiseve->save();
           }
         }
      }else {
        if ($manevento=='S' && $caordcom->getRefsol()=='')
        {
         $tipdoc=H::getX_vacio('REFCOM','Cpcompro','Tipcom',$referencia);
         $codeve=H::getX_vacio('ORDCOM','Caordcom','Codeve',$caordcom->getOrdcom());
         $e= new Criteria();
         $e->add(CpimpcomPeer::REFCOM,$referencia);
         $trajo= CpimpcomPeer::doSelect($e);
         if ($trajo)
         {
           foreach ($trajo as $objprc) {
              $cpdiseve= new Cpdiseve();
              $cpdiseve->setRefdoc($objprc->getRefcom());
              $cpdiseve->setCodpre($objprc->getCodpre());
              $cpdiseve->setCodeve($codeve);
              $cpdiseve->setMoneve($objprc->getMonimp());
              $cpdiseve->setTipdoc($tipdoc);
              $cpdiseve->setTipmov('COM');
              $cpdiseve->save();
           }
         }
        }
      }
        return true;
    }
    else
        return false;
 }

 public static function generarResumen($grida, $gridr) {
    $articulos = array();
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
    foreach ($grida as $cicloA) {
      $encontrado = false;

      foreach ($articulos as $i => $cicloR) {

        if ($claartdes=='S'){
          if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0] && $cicloA[2] == $cicloR[1] && $cicloA[5] == $cicloR[2]) {
            $encontrado = true;
            $indice = $i;
          }
        }else {
          if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0] && $cicloA[5] == $cicloR[2]) {
            $encontrado = true;
            $indice = $i;
          }
        }
      }

      if (!$encontrado) {
        if ($cicloA[1] != '' && H::toFloat($cicloA[7])>0)
          $articulos[] = array($cicloA[1], $cicloA[2], $cicloA[5], H::toFloat($cicloA[7]), H::toFloat($cicloA[8]), H::toFloat($cicloA[9]), H::toFloat($cicloA[10]), H::toFloat($cicloA[11],6), H::toFloat($cicloA[14],4), H::toFloat($cicloA[15],6));
      }else {
        $articulos[$indice][3] += H::toFloat($cicloA[7]);
        $articulos[$indice][4] += H::toFloat($cicloA[8]);
        $articulos[$indice][5] += H::toFloat($cicloA[9]);
        $articulos[$indice][6] += H::toFloat($cicloA[10]);
        $articulos[$indice][7] += H::toFloat($cicloA[11],6);
        $articulos[$indice][8] += H::toFloat($cicloA[14],4);
        $articulos[$indice][9] += H::toFloat($cicloA[15],6);
      }
    }    
    foreach ($articulos as $art) {

      foreach ($gridr as $res) {
        if ($art[0] == $res[0]) {
          $art[1] == $res[1];
          break;
        }
      }
    }
    return $articulos;
  }

  public static function generarResumenPartidas($grida) {

    $articulos = array();
    foreach ($grida as $cicloA) {
      $encontrado = false;

      foreach ($articulos as $i => $cicloR) {

        if ($cicloA[4] != '' && $cicloA[4] == $cicloR['codpar']) {
          $encontrado = true;
          $indice = $i;
        }
      }
       
      if (!$encontrado) {
        if ($cicloA[4] != '')
          $articulos[] = array('id' => '9', 'codpar' => $cicloA[4], 'totart' => (H::toFloat($cicloA[12],6) - H::toFloat($cicloA[13])), 'totarti' => H::toFloat($cicloA[14],5), 'recargo' => 'N');
      }else {
        $articulos[$indice]['totart'] += ( H::toFloat($cicloA[12],6) - H::toFloat($cicloA[13]));
        $articulos[$indice]['totarti'] += H::toFloat($cicloA[15],6);
      }
    }


    foreach ($grida as $cicloA) {
      $encontrado = false;
      $auxrec = explode('!', $cicloA[17]);
      $q=0;
      while ($q<(count($auxrec)-1)){
        $recarg = explode('_', $auxrec[$q]);
        //if (count($recarg) > 1)
//          $recarg[5] = substr($recarg[5], 0, -1);

        foreach ($articulos as $i => $cicloR) {

          if (count($recarg) > 1) {
            if ($recarg[5] != '' && $recarg[5] == $cicloR['codpar']) {
              $encontrado = true;
              $indice = $i;
            }
          }
        }      

        if (!$encontrado) {
          if (count($recarg) > 1)
            if ($recarg[5] != '')
              $articulos[] = array('id' => '9', 'codpar' => $recarg[5], 'totart' => H::toFloat($recarg[4],4), 'totarti' => H::toFloat($recarg[4],4), 'recargo' => 'S');
        }else {
          $articulos[$indice]['totart'] += H::toFloat($recarg[4],4);
          $articulos[$indice]['totarti'] += H::toFloat($recarg[4],4);
          $articulos[$indice]['recargo'] = 'S';
        }
      $q++;
     }      
    }

    /*$i=0;
    while ($i<count($articulos))
    {
      if ($articulos[$i]["recargo"]=='N') {
        $articulos[$i]["totart"]=H::FormatoMonto($articulos[$i]["totart"],6);
        $articulos[$i]["totarti"]=H::FormatoMonto($articulos[$i]["totarti"],6);
      }else {
        $articulos[$i]["totart"]=H::FormatoMonto($articulos[$i]["totart"],4);
        $articulos[$i]["totarti"]=H::FormatoMonto($articulos[$i]["totarti"],4);
      }
      $i++;
    }  */

    return $articulos;
  }

    public static function generarEntregas($grida, $gridc) {

    $articulos = array();
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');

    foreach ($grida as $cicloA) {
      $encontrado = false;

      foreach ($articulos as $i => $cicloR) {
        if ($claartdes=='S')
        {
          if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0] && $cicloA[2] == $cicloR[1]) {
            $encontrado = true;
            $indice = $i;
          }
        }else {
          if ($cicloA[1] != '' && $cicloA[1] == $cicloR[0]) {
            $encontrado = true;
            $indice = $i;
          }
        }
      }

      if (!$encontrado) {
        if ($cicloA[1] != '' && H::toFloat($cicloA[7])>0)
          $articulos[] = array($cicloA[1], $cicloA[2], H::toFloat($cicloA[7]), date('Y-m-d'));
      }else {
        $articulos[$indice][2] += H::toFloat($cicloA[7]);
      }
    }

    foreach ($articulos as $art) {

      foreach ($gridc as $ent) {
        if ($art[0] == $ent[0]) {
          $art[3] == $ent[3];
          break;
        }
      }
    }

    return $articulos;
  }

  public static function salvarOrdenCompraM($clasemodelo,$grid,$grid2,$grid4,$grid5)
  {
    self::grabarMaestroOC($clasemodelo);
    if ($clasemodelo->getCompro()=='N') {
      self::grabarDetalleOC($clasemodelo,$grid);
      Orden_compra::grabarRecargo($clasemodelo);
      self::grabarResumenOC($clasemodelo,$grid2);
      self::grabarCroEntOC($clasemodelo,$grid4);
      Orden_compra::grabarFormasEntrega($clasemodelo,$grid5);

      $cadefart = CadefartPeer::doSelectOne(new Criteria());
      $afecom=H::getX_vacio('TIPCOM','Cpdoccom','Afecom',$clasemodelo->getDoccom());

      if ($afecom=='S' && ($cadefart->getComasopre()=='S' && $cadefart->getComreqapr()!='S'))
        self::grabarCompromisoOC($clasemodelo);
    }

    return -1;
  }

  public static function grabarMaestroOC(&$clasemodelo)
  {
    $prefijomixto=H::getConfApp('prefijomixto', 'compras', 'almordcom');
    $formatcont=H::getConfAppGen('formatcont');
    $valmon=$clasemodelo->getValmon();
     if (!$clasemodelo->getId())
     {              
        if ($clasemodelo->getOrdcom()=='########')
        {
          if ($formatcont!='S') 
          {
            if ($clasemodelo->getTipord()=='S' || $clasemodelo->getTipord()=='M')
              $tipord='corser';
            else if ($clasemodelo->getTipord()=='T')
              $tipord='corcont';
            else if ($clasemodelo->getTipord()=='G')
              $tipord='corsergen';
            else if ($clasemodelo->getTipord()=='A')
              $tipord='corordman';
            else
              $tipord='corcom';

            if (H::getVerCorrelativo($tipord,'cacorrel',$r))
            {
              $encontrado=false;
              while (!$encontrado)
              {
                $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
                if ($clasemodelo->getTipord()=='S')
                  $numero='OS'.(substr($numero,2,strlen($numero)));
                else if ($clasemodelo->getTipord()=='M'){
                  if ($prefijomixto!="")
                    $numero=$prefijomixto.(substr($numero,2,strlen($numero)));
                   else 
                     $numero='OS'.(substr($numero,2,strlen($numero)));
                }else if ($clasemodelo->getTipord()=='T')
                  $numero='CO'.(substr($numero,2,strlen($numero)));
                else if ($clasemodelo->getTipord()=='G')
                  $numero='SG'.(substr($numero,2,strlen($numero)));
                else if ($clasemodelo->getTipord()=='A')
                  $numero='OM'.(substr($numero,2,strlen($numero)));
                else
                  $numero='OC'.(substr($numero,2,strlen($numero)));
                
                $sql="select ordcom from caordcom where ordcom='".$numero."'";
                if (H::BuscarDatos($sql,$result))
                {
                  $r=$r+1;
                }
                else
                {
                  $encontrado=true;
                }
              }//while (!$encontrado)
              $clasemodelo->setOrdcom($numero);
              H::getSalvarCorrelativo($tipord,'cacorrel','cacorrel',$r,$msg);
            }   
          }else {
             $fecc=$clasemodelo->getFecord();
             $c = new Criteria();
             $c->add(ContabaPeer::CODEMP,'001');
             $per = ContabaPeer::doSelectOne($c);
             if ($per)
             {
                if ($per->getCorcomp()=='AAMM####'){
                  $formato = substr($fecc,2,2).substr($fecc,5,2); //date('ym');
                  $mes=substr($fecc,5,2); //date('m');
                  $longitud='4';
                  $sql="select substring(ordcom,5,4) as num from caordcom where substring(ordcom,3,2)='".$mes."' order by fecord desc limit 1";
                  if (Herramientas::BuscarDatos($sql,$result))
                  {
                    $cor=$result[0]["num"]+1;
                  }else $cor=1;

                  while(!$valido){
                    $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);
                    $c = new Criteria();
                    $c->add(CaordcomPeer::ORDCOM,$nroorden);
                    $clase = CaordcomPeer::doSelectOne($c);
                    if(!$clase)
                      $valido = true;
                    else 
                      $cor=$cor +1; 
                  }
                  $clasemodelo->setOrdcom($nroorden);
                }else if ($per->getCorcomp()=='MMAA####'){
                  $formato = substr($fecc,5,2).substr($fecc,2,2); //date('my',$fecha);
                  $longitud='4';
                  $mes=substr($fecc,5,2);//date('m');
                  $sql="select substring(ordcom,5,4) as num from caordcom where substring(ordcom,1,2)='".$mes."' order by fecord desc limit 1";
                  if (Herramientas::BuscarDatos($sql,$result))
                  {
                    $cor=$result[0]["num"]+1;
                  }else $cor=1;     

                  while(!$valido){
                    $nroorden = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);
                    $c = new Criteria();
                    $c->add(CaordcomPeer::ORDCOM,$nroorden);
                    $clase = CaordcomPeer::doSelectOne($c);
                    if(!$clase)
                      $valido = true;
                    else 
                      $cor=$cor +1; 
                  }
                  $clasemodelo->setOrdcom($nroorden);  
                }else {
                  if ($clasemodelo->getTipord()=='S' || $clasemodelo->getTipord()=='M')
                    $tipord='corser';
                  else if ($clasemodelo->getTipord()=='T')
                    $tipord='corcont';
                  else if ($clasemodelo->getTipord()=='G')
                    $tipord='corsergen';
                  else if ($clasemodelo->getTipord()=='A')
                    $tipord='corordman';
                  else
                    $tipord='corcom';

                  if (H::getVerCorrelativo($tipord,'cacorrel',$r))
                  {
                    $encontrado=false;
                    while (!$encontrado)
                    {
                      $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
                      if ($clasemodelo->getTipord()=='S')
                        $numero='OS'.(substr($numero,2,strlen($numero)));
                      else if ($clasemodelo->getTipord()=='M'){
                        if ($prefijomixto!="")
                          $numero=$prefijomixto.(substr($numero,2,strlen($numero)));
                         else 
                           $numero='OS'.(substr($numero,2,strlen($numero)));
                      }else if ($clasemodelo->getTipord()=='T')
                        $numero='CO'.(substr($numero,2,strlen($numero)));
                      else if ($clasemodelo->getTipord()=='G')
                        $numero='SG'.(substr($numero,2,strlen($numero)));
                      else if ($clasemodelo->getTipord()=='A')
                        $numero='OM'.(substr($numero,2,strlen($numero)));
                      else
                        $numero='OC'.(substr($numero,2,strlen($numero)));
                      
                      $sql="select ordcom from caordcom where ordcom='".$numero."'";
                      if (H::BuscarDatos($sql,$result))
                      {
                        $r=$r+1;
                      }
                      else
                      {
                        $encontrado=true;
                      }
                    }//while (!$encontrado)
                    $clasemodelo->setOrdcom($numero);
                    H::getSalvarCorrelativo($tipord,'cacorrel','cacorrel',$r,$msg);
                  }   
               }               
             }
          }
        }else {
            $numero=str_pad($clasemodelo->getOrdcom(), 8, '0', STR_PAD_LEFT);
            if ($clasemodelo->getTipord()=='S')
              $numero='OS'.(substr($numero,2,strlen($numero)));
            else if ($clasemodelo->getTipord()=='M'){
              if ($prefijomixto!="")
                $numero=$prefijomixto.(substr($numero,2,strlen($numero)));
               else 
                 $numero='OS'.(substr($numero,2,strlen($numero)));
            }else if ($clasemodelo->getTipord()=='T')
              $numero='CO'.(substr($numero,2,strlen($numero)));
            else if ($clasemodelo->getTipord()=='G')
              $numero='SG'.(substr($numero,2,strlen($numero)));
            else if ($clasemodelo->getTipord()=='A')
              $numero='OM'.(substr($numero,2,strlen($numero)));
            else
              $numero='OC'.(substr($numero,2,strlen($numero)));
            $clasemodelo->setOrdcom($numero);
        }
        $clasemodelo->setStaord('A');
        $clasemodelo->setAfepre('N');
        $clasemodelo->setMonord($clasemodelo->getMonord()*$valmon);
        $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
        $clasemodelo->setUsuroc($loguse);
        $clasemodelo->save();

        if ($clasemodelo->getConpag()!='')
        {
            H::EliminarRegistro("Caordconpag", "Ordcom", $clasemodelo->getOrdcom());
            $caordconpag_new = new Caordconpag();
            $caordconpag_new->setOrdcom($clasemodelo->getOrdcom());
            $caordconpag_new->setCodconpag($clasemodelo->getConpag());
            $caordconpag_new->save();
        }
        if ($clasemodelo->getForent()!='')
        {
            H::EliminarRegistro("Caordforent", "Ordcom", $clasemodelo->getOrdcom());
            $caordforent_new = new Caordforent();
            $caordforent_new->setOrdcom($clasemodelo->getOrdcom());
            $caordforent_new->setCodforent($clasemodelo->getForent());
            $caordforent_new->save();
        }
     }else {
        $moddesord=H::getConfApp('moddesord', 'almordcom', 'compras');
        $c= new Criteria();
        $c->add(CaordcomPeer::ORDCOM,$clasemodelo->getOrdcom());
        $caordcom_mod= CaordcomPeer::doSelectOne($c);
        if (count($caordcom_mod)>0)
        {          
          if ($moddesord=='S')
          {
              $t= new Criteria();
              $t->add(CpimpcauPeer::REFERE,$clasemodelo->getOrdcom());
              $registro= CpimpcauPeer::doSelect($t);
              if (!$registro)
              {
                 $caordcom_mod->setDesord($clasemodelo->getDesord());
              }
          }
          $caordcom_mod->setCodmedcom($clasemodelo->getCodmedcom());
          $caordcom_mod->setCodprocom($clasemodelo->getCodprocom());
          $caordcom_mod->setNumproc($clasemodelo->getNumproc());
          $caordcom_mod->setCodpai($clasemodelo->getCodpai());
          $caordcom_mod->setCodedo($clasemodelo->getCodedo());
          $caordcom_mod->setCodmun($clasemodelo->getCodmun());
          $caordcom_mod->setAplart($clasemodelo->getAplart());
          $caordcom_mod->setAplart6($clasemodelo->getAplart6());
          $caordcom_mod->setNumsigecof($clasemodelo->getNumsigecof());
          $caordcom_mod->setFecsigecof($clasemodelo->getFecsigecof());
          $caordcom_mod->setExpsigecof($clasemodelo->getExpsigecof());
          $caordcom_mod->setCodcen($clasemodelo->getCodcen());
          $caordcom_mod->setCodcenaco($clasemodelo->getCodcenaco());
          $caordcom_mod->setDesord($clasemodelo->getDesord());
          $caordcom_mod->setNotord($clasemodelo->getNotord());
          $caordcom_mod->setUnimed($clasemodelo->getUnimed());
          $caordcom_mod->setNumcon($clasemodelo->getNumcon());
          $caordcom_mod->setCoddirec($clasemodelo->getCoddirec());
          $caordcom_mod->setCoddivi($clasemodelo->getCoddivi());
          $caordcom_mod->setCodeve($clasemodelo->getCodeve());
          $caordcom_mod->setLugfec($clasemodelo->getLugfec());
          $caordcom_mod->setDirent($clasemodelo->getDirent());
          $caordcom_mod->setNumpro($clasemodelo->getNumpro());
          $caordcom_mod->setPercon($clasemodelo->getPercon());
          $caordcom_mod->setTelcon($clasemodelo->getTelcon());
          $caordcom_mod->setFaxcon($clasemodelo->getFaxcon());
          $caordcom_mod->setEmacon($clasemodelo->getEmacon());
          $caordcom_mod->setCodgar($clasemodelo->getCodgar());

          if ($clasemodelo->getManorddon()=='S') // En Caso de una OC de Donación
          {
              $caordcom_mod->setTipocom($clasemodelo->getTipocom());
              $caordcom_mod->setCeddon($clasemodelo->getCeddon());
              $caordcom_mod->setNomdon($clasemodelo->getNomdon());
              $caordcom_mod->setFecdon($clasemodelo->getFecdon());
              $caordcom_mod->setSexdon($clasemodelo->getSexdon());
              $caordcom_mod->setEdadon($clasemodelo->getEdadon());
              $caordcom_mod->setSerdon($clasemodelo->getSerdon());
          }
          if ($caordcom_mod->getCompro()=='N')
            $caordcom_mod->setMonord($clasemodelo->getMonord()*$valmon);
          $caordcom_mod->save();
        }
     }

  }

  public static function grabarDetalleOC($clasemodelo, $grid)
  {
     $moneda=$clasemodelo->getTipmon();
     $valmon=$clasemodelo->getValmon();
     $actcosart=H::getConfApp2('actcosart', 'compras', 'almordcom');
     $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
      $x=$grid[0];
      $j=0;
      while ($j<count($x)) {
      if ($x[$j]->getCodart()!="" && $x[$j]->getCanord()>0)
      {
         $x[$j]->setOrdcom($clasemodelo->getOrdcom());
         $precio=H::toFloat($x[$j]->getPreart(),6)*$valmon;
         $x[$j]->setPreart($precio);
         $x[$j]->setMonrgo($x[$j]->getMonrgo()*$valmon);
         $x[$j]->setTotart($x[$j]->getTotart()*$valmon);
          if ($actcosart=='S') //Se actualiza el costo con respecto al costo ultimo y Fecha ultima de Compra
          {
            $c = new Criteria();
            $c->add(CaregartPeer::CODART,$x[$j]->getCodart());
            $arti = CaregartPeer::doSelectOne($c);
            if ($arti)
            {
               $arti->setFecult($clasemodelo->getFecord());
                if ($arti->getCosult()<$precio)
                {
                    $arti->setCosult($precio);
                    $arti->save();
                }
             }
          }else { //Se actualiza el costo con respecto al precio del articulo y Fecha ultima de Compra
            $c = new Criteria();
            $c->add(CaregartPeer::CODART,$x[$j]->getCodart());
            $arti = CaregartPeer::doSelectOne($c);
            if ($arti)
            {            
              $arti->setFecult($clasemodelo->getFecord());
               if ($arti->getPreart()!=$precio)
               {
                $arti->setCosult($precio);
                $arti->save();
               }
            }
          }
          if ($clasemodelo->getRefprc()=='S')
          {
            $w= new Criteria();
            $w->add(CaartsolPeer::REQART,$x[$j]->getReqart());
            $w->add(CaartsolPeer::CODART,$x[$j]->getCodart());
            if ($claartdes=='S') $c->add(CaartsolPeer::DESART,$x[$j]->getDesart());
            $w->add(CaartsolPeer::CODCAT,$x[$j]->getCodcat());
            $caartsol2 = CaartsolPeer::doSelectOne($w);
            if ($caartsol2)
            {
              $suma=$caartsol2->getCanord()+H::toFloat($x[$j]->getCanord());
              $caartsol2->setCanord($suma);
              $caartsol2->save();
            }
          }
          // Grabar Distribucion de Recargos
          if ($x[$j]->getCheck()=='1')
          {
             if ($x[$j]->getDatosrecargo()!='')
             {
                $cadenarec=split('!',$x[$j]->getDatosrecargo());
                $c= new Criteria();
                $c->add(CadisrgoPeer::REQART,$clasemodelo->getOrdcom());
                $c->add(CadisrgoPeer::CODART,$x[$j]->getCodart());
                $c->add(CadisrgoPeer::DESART,$x[$j]->getDesart());
                if ($x[$j]->getReqart()!='')
                  $c->add(CadisrgoPeer::REFSOL,$x[$j]->getReqart());
                $c->add(CadisrgoPeer::CODCAT,$x[$j]->getCodcat());
                $c->add(CadisrgoPeer::TIPDOC,$clasemodelo->getDoccom());
                CadisrgoPeer::doDelete($c);
                
                $r=0;
                while ($r<(count($cadenarec)-1))
                {
                  $aux=$cadenarec[$r];
                  $aux2=split('_',$aux);
                  if ($aux2[0]!="" && H::toFloat($aux2[4])>0)
                  {
                    $cadisrgonew= new Cadisrgo();
                    $cadisrgonew->setReqart($clasemodelo->getOrdcom());
                    $cadisrgonew->setCodart($x[$j]->getCodart());
                    $cadisrgonew->setDesart($x[$j]->getDesart());
                    $cadisrgonew->setCodcat($x[$j]->getCodcat());
                    $cadisrgonew->setCodrgo($aux2[0]);
                    $cadisrgonew->setRefsol($x[$j]->getReqart());

                    $c = new Criteria();
                    $tiporec = CadefartPeer::doSelectOne($c);
                    if ($tiporec)
                    {
                      if ($tiporec->getAsiparrec()!='C')
                      {
                        $c = new Criteria();
                        $c->add(CarecargPeer::CODRGO,$aux2[0]);
                        $presupuesto = CarecargPeer::doSelectOne($c);
                        if ($presupuesto)
                        {
                          if ($tiporec->getAsiparrec()=='P')
                          {
                            $cadisrgonew->setCodpre($presupuesto->getCodpre());
                          }
                          else
                          {
                            $codigop= $x[$j]->getCodcat().'-'.$presupuesto->getCodpre();
                            $cadisrgonew->setCodpre($codigop);
                          }
                        }
                      }
                      else
                      {
                        $cadisrgonew->setCodpre($x[$j]->getCodpre());
                      }
                    }
                    $montorecargo= H::toFloat($aux2[4]);
                    $cadisrgonew->setMonrgo($montorecargo*H::toFloat($valmon,6));
                    $cadisrgonew->setTipdoc($clasemodelo->getDoccom());
                    $cadisrgonew->save();
                  }
                  $r++;
                }//while

             }
          }else {
                $c= new Criteria();
                $c->add(CadisrgoPeer::REQART,$clasemodelo->getOrdcom());
                $c->add(CadisrgoPeer::CODART,$x[$j]->getCodart());
                $c->add(CadisrgoPeer::DESART,$x[$j]->getDesart());
                $c->add(CadisrgoPeer::CODCAT,$x[$j]->getCodcat());
                if ($x[$j]->getReqart()!='')
                  $c->add(CadisrgoPeer::REFSOL,$x[$j]->getReqart());
                $c->add(CadisrgoPeer::TIPDOC,$clasemodelo->getDoccom());
                CadisrgoPeer::doDelete($c);
          }

         $x[$j]->save();
      }
        $j++;
      }

      $z=$grid[1];
      $j=0;
      if (!empty($z[$j])) {
        while ($j<count($z)) {
          $z[$j]->delete();
          $j++;
        }
      }
  }

  public static function grabarResumenOC($clasemodelo,$grid2)
  {
      if ($clasemodelo->getId()){
        Herramientas::EliminarRegistro("Caresordcom", "Ordcom", $clasemodelo->getOrdcom());
      }
      $valmon=$clasemodelo->getValmon(); 

      $x=$grid2[0];
      $j=0;
      while ($j<count($x)) {
        if ($x[$j]->getCodart()!="")
        {
          //$caresordcom_new = new Caresordcom();
          $x[$j]->setOrdcom($clasemodelo->getOrdcom());
         /* $caresordcom_new->setCodart($x[$j]->getCodart());
          $caresordcom_new->setDesres($x[$j]->getDesres());
          $caresordcom_new->setCodartpro($x[$j]->getCodartpro());
          $caresordcom_new->setCanord($x[$j]->getCanord());
          $caresordcom_new->setCanaju($x[$j]->getCanaju());
          $caresordcom_new->setCanrec($x[$j]->getCanrec());
          $caresordcom_new->setCantot($x[$j]->getCantot());*/
          //$x[$j]->setCosto($x[$j]->getCosto()*$valmon);
          $x[$j]->setCosto($x[$j]->getPreart()*$valmon);
          $x[$j]->setRgoart($x[$j]->getRgoart()*$valmon);
          $x[$j]->setTotart($x[$j]->getTotart()*$valmon);
          $x[$j]->save();
        }
        $j++;
    }
  }

  public static function grabarCroEntOC($clasemodelo,$grid4)
  {
    if ($clasemodelo->getId()){
      Herramientas::EliminarRegistro("Caartfec", "Ordcom", $clasemodelo->getOrdcom());
    }
    $x=$grid4[0];
    $j=0;
    while ($j<count($x)) {
      if ($x[$j]->getCodart()!="")
      {
        //$caartfec_new = new Caartfec();
        $x[$j]->setOrdcom($clasemodelo->getOrdcom());
        /*$caartfec_new->setCodart($x[$j]->getCodart());
        $caartfec_new->setDesart($x[$j]->getDesart());
        $caartfec_new->setCanart($x[$j]->getCanart());
        $caartfec_new->setFecent($x[$j]->getFecent());  */      
        $x[$j]->save();
      }
      $j++;
    }
  }

  public static function grabarCompromisoOC($clasemodelo)
  {    
    Herramientas::EliminarRegistro("Cpimpcom", "Refcom", $clasemodelo->getOrdcom());
    Herramientas::EliminarRegistro("Cpcompro", "Refcom", $clasemodelo->getOrdcom());
    $fecha_ano=substr($clasemodelo->getFecord(), 0, 4);
    $reqaut=H::getX_vacio('TIPCOM','Cpdoccom','Reqaut',$clasemodelo->getDoccom());
    $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
    $valmon=$clasemodelo->getValmon();

    $t= new Criteria();
    $t->add(CpcomproPeer::REFCOM,$clasemodelo->getOrdcom());
    $result= CpcomproPeer::doSelectOne($t);
    if (!$result)
    {
      $cpcompro_new = new Cpcompro();
      $cpcompro_new->setRefcom($clasemodelo->getOrdcom());
      $cpcompro_new->setTipcom($clasemodelo->getDoccom());
      $cpcompro_new->setFeccom($clasemodelo->getFecord());
      $cpcompro_new->setAnocom($fecha_ano);
      if ($clasemodelo->getRefsol())
        $cpcompro_new->setRefprc(substr($clasemodelo->getRefsol(),0,8));
      else
        $cpcompro_new->setRefprc('NULO');
      $cpcompro_new->setTipprc($tipdoc);
      $cpcompro_new->setDescom($clasemodelo->getDesord());
      $cpcompro_new->setMoncom($clasemodelo->getMonord()*$valmon);
      $cpcompro_new->setSalcau('0');
      $cpcompro_new->setSalpag('0');
      $cpcompro_new->setSalaju('0');
      $cpcompro_new->setCedrif($clasemodelo->getRifpro());
      $cpcompro_new->setStacom('A');
      $cpcompro_new->setTipo($clasemodelo->getTipo());          
      if ($reqaut=='S')              
        $cpcompro_new->setAprcom('N');
      else 
        $cpcompro_new->setAprcom('S');          
      $cpcompro_new->save();

      $asiparrec=H::getX_vacio('CODEMP','Cadefart','Asiparrec','001');
      if ($asiparrec!='C')
        $sql1="Select (A.CodCat)||'-'||(A.CodPar) AS codpre, SUM(A.TotArt)-SUM(A.RGOART) AS totimp, A.reqart as refsol From CaArtOrd A,CARegArt B  Where A.CODART=B.CODART AND A.OrdCom='".$clasemodelo->getOrdcom()."'  GROUP BY (A.CodCat)||'-'||(A.CodPar), refsol";
      else     
        $sql1= "Select Rtrim(A.CodCat)||'-'||Rtrim(A.CodPar) as codpre, SUM(A.TotArt) as totimp, A.reqart as refsol From CaArtOrd A,CARegArt B Where A.CODART=B.CODART AND A.OrdCom='".$clasemodelo->getOrdcom()."' GROUP BY Rtrim(A.CodCat)||'-'||Rtrim(A.CodPar), refsol";

      $result2=array();
      if (Herramientas::BuscarDatos($sql1,$result2))
      {
        $i=0;
        while ($i<count($result2))
        {
          if ($result2[$i]['totimp']>0)
          {
            $cpimpcom_new = new Cpimpcom();
            $cpimpcom_new->setRefcom($clasemodelo->getOrdcom());
            $cpimpcom_new->setCodpre($result2[$i]['codpre']);
            $cpimpcom_new->setMonimp($result2[$i]['totimp']);
            $cpimpcom_new->setMoncau('0');
            $cpimpcom_new->setMonpag('0');
            $cpimpcom_new->setMonaju('0');
            $cpimpcom_new->setStaimp('A');
            if ($result2[$i]['refsol']!='')
                 $cpimpcom_new->setRefere($result2[$i]['refsol']);
            else
                 $cpimpcom_new->setRefere('NULO');
            $cpimpcom_new->save();
          }
          $i++;
        }
     }

     if ($asiparrec!='C') 
     {
        $sql="SELECT SUM(monrgo) as totimp,codpre, refsol FROM CADISRGO WHERE REQART='".$clasemodelo->getOrdcom()."' AND TIPDOC='".$clasemodelo->getDoccom()."' GROUP BY CODPRE, refsol";
        $result=array();
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $i=0;
          while ($i<count($result))
          {
            if ($result[$i]['totimp']>0)
            {
                if ($result[$i]['refsol']!='')
                      $var=$result[$i]['refsol'];
                else
                      $var='NULO';
                $sql="Insert into Cpimpcom values ('".$clasemodelo->getOrdcom()."','".$result[$i]['codpre']."','".$result[$i]['totimp']."','0','0','0','A','".$var."')";
                Herramientas::insertarRegistros($sql);
             }
             $i++;
           }
        }
     }
     $c= new Criteria();
     $c->add(CaordcomPeer::ORDCOM,$clasemodelo->getOrdcom());
     $caordcom_up = CaordcomPeer::doSelectOne($c);
     if (count($caordcom_up)>0)
     {
        $caordcom_up->setRefcom($clasemodelo->getOrdcom());
        $caordcom_up->setAfepre('S');
        $caordcom_up->save();
     }
     
      $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
      if ($manevento=='S' && $clasemodelo->getRefsol()!='')
      {
         $tipdoc=H::getX_vacio('REFCOM','Cpcompro','Tipcom',$clasemodelo->getOrdcom());         
         $e= new Criteria();
         $e->add(CpimpcomPeer::REFCOM,$clasemodelo->getOrdcom());
         $trajo= CpimpcomPeer::doSelect($e);
         if ($trajo)
         {
           foreach ($trajo as $objprc) {
              $cpdiseve= new Cpdiseve();
              $cpdiseve->setRefdoc($objprc->getRefcom());
              $cpdiseve->setCodpre($objprc->getCodpre());
              $codeve=H::getX_vacio('REQART','Casolart','Codeve',$objprc->getRefere());
              $cpdiseve->setCodeve($codeve);
              $cpdiseve->setMoneve($objprc->getMonimp());
              $cpdiseve->setTipdoc($tipdoc);
              $cpdiseve->setTipmov('COM');
              $cpdiseve->save();
           }
         }
      }else {
        if ($manevento=='S' && $clasemodelo->getRefsol()=='')
        {
         $tipdoc=H::getX_vacio('REFCOM','Cpcompro','Tipcom',$clasemodelo->getOrdcom());
         $codeve=H::getX_vacio('ORDCOM','Caordcom','Codeve',$clasemodelo->getOrdcom());
         $e= new Criteria();
         $e->add(CpimpcomPeer::REFCOM,$clasemodelo->getOrdcom());
         $trajo= CpimpcomPeer::doSelect($e);
         if ($trajo)
         {
           foreach ($trajo as $objprc) {
              $cpdiseve= new Cpdiseve();
              $cpdiseve->setRefdoc($objprc->getRefcom());
              $cpdiseve->setCodpre($objprc->getCodpre());
              $cpdiseve->setCodeve($codeve);
              $cpdiseve->setMoneve($objprc->getMonimp());
              $cpdiseve->setTipdoc($tipdoc);
              $cpdiseve->setTipmov('COM');
              $cpdiseve->save();
           }
         }
        }
      }
    }
  }

  public static function eliminarOrdenCompraM($clasemodelo)
  {
    $afectacompro=H::getX_vacio('TIPCOM','Cpdoccom','Afecom',$clasemodelo->getDoccom());
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
    if (!Orden_compra::Hay_ajuste($clasemodelo)) {
      if (!Orden_compra::Hay_ajuste_orden($clasemodelo)) {
        if (!Orden_compra::Hay_recepcion($clasemodelo)) {
          if ($afectacompro=='S')
            if (!Orden_compra::Se_elimina_compromiso($clasemodelo))
              return 171;
          Herramientas::EliminarRegistro("Caresordcom", "Ordcom", $clasemodelo->getOrdcom());
          Herramientas::EliminarRegistro("Caartfec", "Ordcom", $clasemodelo->getOrdcom());
          Herramientas::EliminarRegistro("caentord", "Ordcom", $clasemodelo->getOrdcom());
          $c= new Criteria();
          $c->add(CadisrgoPeer::REQART,$clasemodelo->getOrdcom());
          $c->add(CadisrgoPeer::TIPDOC,$clasemodelo->getDoccom());
          $cadisrgo_del = CadisrgoPeer::doSelect($c);
          if ($cadisrgo_del) {
            foreach ($cadisrgo_del as $arreglo)
            {
              $arreglo->delete();
            }
          }

          $t= new Criteria();
          $t->add(CargosolPeer::REQART,$clasemodelo->getOrdcom());
          $t->add(CargosolPeer::TIPDOC,$clasemodelo->getDoccom());
          $cargosol_del = CargosolPeer::doSelect($t);
          if ($cargosol_del) {
            foreach ($cargosol_del as $arreglo)
            {
              $arreglo->delete();
            }
          }

          if ($afectacompro=='S'){
            Herramientas::EliminarRegistro("Cpimpcom", "Refcom", $clasemodelo->getOrdcom());
            Herramientas::EliminarRegistro("Cpcompro", "Refcom", $clasemodelo->getOrdcom());
          }

          $w= new Criteria();
          $w->add(CaartordPeer::ORDCOM,$clasemodelo->getOrdcom());
          $registros= CaartordPeer::doSelect($w);
          if ($registros)
          {
            foreach ($registros as $obj) {
              if ($obj->getReqart()!='')
              {
                $q= new Criteria();
                $q->add(CaartsolPeer::REQART,$obj->getReqart());
                $q->add(CaartsolPeer::CODART,$obj->getCodart());
                if ($claartdes=='S') $q->add(CaartsolPeer::DESART,$obj->getDesart());
                $q->add(CaartsolPeer::CODCAT,$obj->getCodcat());
                $resul2= CaartsolPeer::doSelectOne($q);
                if ($resul2)
                {
                   if (($resul2->getCanord()-$obj->getCanord())>0)
                     $resul2->setCanord($resul2->getCanord()-$obj->getCanord());
                   else
                     $resul2->setCanord(0);
                   $resul2->save();
                }
              }
              $obj->delete();
            }
          }
          $clasemodelo->delete();          
        }else return 173;
      }else return 172;
    }else return 223;

    return -1;
  }

  public static function validacionOCM($caordcom,$grid,&$codigo)
  {
    $codigo="";
    $cadefart= CadefartPeer::doSelectOne(new Criteria());
    if ($cadefart)
    {
      $comasopre=$cadefart->getComasopre();
      $comreqapr=$cadefart->getComreqapr();
      $tiporec=$cadefart->getAsiparrec();
    }
    $verificardisponibilidad = $caordcom->AfectaDisponibilidad();
    $datosGrid = array();
          

    if($verificardisponibilidad && ($comasopre=='S' && $comreqapr!='S'))
    {
      $x=$grid[0];
      $j=0;
      while ($j<count($x)) {
        if ($x[$j]->getCodart()!="")
        {
          $a= new Criteria();
          $a->add(CpasiiniPeer::PERPRE,'00');
          $a->add(CpasiiniPeer::CODPRE,$x[$j]->getCodpre());
          $data2= CpasiiniPeer::doSelectOne($a);
          if (!$data2)
            return 512;
          $codpre=H::getCodPreDis($x[$j]->getCodpre());
          if ($tiporec=='C')
            $monto=H::toFloat($x[$j]->getTotart(),6)*H::toFloat($caordcom->getValmon(),6);
          else
            $monto=(H::toFloat($x[$j]->getTotart(),6)-H::toFloat($x[$j]->getRgoart(),4))*H::toFloat($caordcom->getValmon(),6);

          $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
          if ($pos==0)
          {
           $i=count($datosGrid)+1;
           $datosGrid[$i-1]["codpre"]=$codpre;
           $datosGrid[$i-1]["monimp"]=$elmonto;
           $datosGrid[$i-1]["codpre2"]=$codigo_presupuestario;
          }
          else
          {
           $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$elmonto;
          }           
        }
        $j++;
      }

      $p=0;
      while ($p<count($datosGrid))
      {
        $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$caordcom->getFecord());
        if($datosGrid[$p]["monimp"] > $disponible){
            $codigo=$datosGrid[$p]["codpre2"];
            return 118;
        }
        $p++;
      }

      //Validamos los recargos
      $datosGridRec=array();
      $arr_recargo=array();
      $x=$grid[0];
      $i=0;
      $indarr_rec=0;
      while ($i<count($x)) {
        if ($x[$i]->getCodart()!="" && $x[$i]->getCheck()=="1")
        {
          if ($x[$i]->getDatosrecargo()!='')
          {
            $cadenarec=split('!',$x[$i]->getDatosrecargo());
            $r=0;
            while ($r<(count($cadenarec)-1))
            {
              $aux=$cadenarec[$r];
              $aux2=split('_',$aux);
              if ($aux2[0]!="" && H::toFloat($aux2[4])>0)
              {
                $arr_recargo[$indarr_rec]['codart']=$x[$i]->getCodart();
                $arr_recargo[$indarr_rec]['codcat']=$x[$i]->getCodcat();
                $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
                $montorecargo= H::toFloat($aux2[4],4);
                $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
                $indarr_rec++;
              }
              $r++;
            }
          }
        }
        $i++;
      }

    $h = 0;
    while ($h < count($arr_recargo))
    {
       $c= new Criteria();
       $c->add(CarecargPeer::CODRGO,$arr_recargo[$h]['codrgo']);
       $data= CarecargPeer::doSelectOne($c);
       if ($data)
       {
          if ($tiporec=='P') {          
             $t= new Criteria();
             $t->add(CpdeftitPeer::CODPRE,$data->getCodpre());
             $trajo= CpdeftitPeer::doSelectOne($t);
             if ($trajo) {
              $a= new Criteria();
              $a->add(CpasiiniPeer::PERPRE,'00');
              $a->add(CpasiiniPeer::CODPRE,$data->getCodpre());
              $data2= CpasiiniPeer::doSelectOne($a);
              if (!$data2)
              {
                  $codigo=$arr_recargo[$h]['codrgo'];
                  return 512;
              }
             }else {
                  $codigo=$arr_recargo[$h]['codrgo'];
                  return 2103;
             }
            $codpre=H::getCodPreDis($data->getCodpre());
          }
          else  {
             $t= new Criteria();
             $t->add(CpdeftitPeer::CODPRE,$arr_recargo[$h]['codcat'].'-'.$data->getCodpre());
             $trajo= CpdeftitPeer::doSelectOne($t);
             if ($trajo) {
                  $a= new Criteria();
                  $a->add(CpasiiniPeer::PERPRE,'00');
                  $a->add(CpasiiniPeer::CODPRE,$arr_recargo[$h]['codcat'].'-'.$data->getCodpre());
                  $data2= CpasiiniPeer::doSelectOne($a);
                  if (!$data2)
                  {
                      $codigo=$arr_recargo[$h]['codrgo'];
                      return 512;
                  }
             }else {
                  $codigo=$arr_recargo[$h]['codrgo'];
                  return 2103;
             }
             $codpre=H::getCodPreDis($arr_recargo[$h]['codcat'].'-'.$data->getCodpre());
          }
         
          $monrecar=$arr_recargo[$h]['monrgo']*H::toFloat($caordcom->getValmon(),6);
          $pos=  Presupuesto::posicion_en_el_grid2($datosGridRec, $codpre);
          if ($pos==0)
          {
           $i=count($datosGridRec)+1;
           $datosGridRec[$i-1]["codpre"]=$codpre;
           $datosGridRec[$i-1]["monimp"]=$monrecar;
           $datosGridRec[$i-1]["codrgo"]=$arr_recargo[$h]['codrgo'];
          }
          else
          {
           $datosGridRec[$pos-1]["monimp"]=$datosGridRec[$pos-1]["monimp"]+$monrecar;
          }            
         }        
      $h++;
     }
     
     $g=0;
     while ($g<count($datosGridRec))
     {
      $disponible = H::Monto_disponible($datosGridRec[$g]["codpre"],$caordcom->getFecord());
      if($datosGridRec[$g]["monimp"] > $disponible){
        $codigo=$datosGridRec[$g]["codrgo"];
        return 114;
      }
      $g++;
     }
    }
          
    return -1;
  }
}
?>
