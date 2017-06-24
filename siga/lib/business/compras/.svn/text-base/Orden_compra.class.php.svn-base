<?php
/**
 * Orden de Compra: Clase estática para el manejo de las ordenes de compras
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Orden_compra
{

  /***************************************************************************
   **                 ORDEN DE COMPRA ALMORDCOM                             **
   **                       Jaime Suárez                                    **
   **************************************************************************/
  /**
   * Función para registrar la Requisición
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */

//<!-----------------------------------Funcion General o madre  del Negocio------------------------------------------------------------>
/*
 * Funcion general del negocio
 * aqui se hacen todos los procesos
 * de validacion y gfuardar del formulariop almordcom
 */
  public static function Salvar($caordcom,$arreglo_arreglo,$arreglo_objetos,$arreglo_campos,$grid_detalle_formas_entrega,&$coderror)
  {

   $refere1="";
   $t= new Criteria();
   $t->add(CpimppagPeer::REFERE,$caordcom->getOrdcom());
   $result=CpimppagPeer::doSelectOne($t);
   if ($result)
   {
       if ($result->getStaimp()!='N')
       {
         $refere1=$result->getRefere();
       }
   }

   $refere2="";
   $t2= new Criteria();
   $t2->add(CpimpcauPeer::REFERE,$caordcom->getOrdcom());
   $result2=CpimpcauPeer::doSelectOne($t2);
   if ($result2)
   {
       if ($result2->getStaimp()!='N')
       {
         $refere2=$result2->getRefere();
       }
   }
        
   if (Herramientas::getX_vacio('ordcom','caordcom','ordcom',$caordcom->getOrdcom())!='' && $refere2=="")
   {
       $saveprocen=H::getConfApp2('saveprocen', 'compras', 'almordcom');
       if ($saveprocen=='S')
       {
          $c= new Criteria();
          $c->add(CaordcomPeer::ORDCOM,$caordcom->getOrdcom());
          $caordcom_mod= CaordcomPeer::doSelectOne($c);
          if (count($caordcom_mod)>0)
          {
             if ($caordcom_mod->getRefsol()=="") {
                 $caordcom_mod->setCodpro(CaproveePeer::getCod_provee(trim($caordcom->getRifpro())));
                 $caordcom_mod->setCodcen($caordcom->getCodcen());
                 $caordcom_mod->save();

                 $grid_detalle_orden_arreglos=$arreglo_arreglo[0][0];
                 self::salvarCentrodeCosto($caordcom,$grid_detalle_orden_arreglos);                         

                 $coderror=-1;
                 return true;
             }
          }
       }
   }

	$refere0 = Herramientas::getX_vacio('refcom','cpimpcom','refcom',$caordcom->getOrdcom());

	if (((!empty($refere1)) or (!empty($refere2)) or (!empty($refere0))) and ($caordcom->getId()))
	{
    $desaprcom=H::getConfApp2('desaprcom', 'presupuesto', 'precompro');
    if ($desaprcom == "S" and $caordcom->getComproaprob()=="N"){
      $c = new Criteria();
      $c->add(CaordcomPeer::ORDCOM,$caordcom->getOrdcom());
      $caordcom_mod= CaordcomPeer::doSelectOne($c);
      if (count($caordcom_mod)>0){
        $caordcom_mod->setDesord($caordcom->getDesord());
        $caordcom_mod->save();

        $t1= new Criteria();
        $t1->add(CpcomproPeer::REFCOM,$caordcom->getOrdcom());
        $resul1= CpcomproPeer::doSelectOne($t1);
        if ($resul1)
        {
           $resul1->setDescom($caordcom->getDesord());
           $resul1->save();
        }

        $coderror=-1;
        return true;
      }else return false;
    }else{
      $coderror=109;
      return false;      
    }
  }
  else
  {
	  $refiereprecom = '';
	  $afectacompro = '';
	  $afectadis = '';
	  $referencia='';
	  $codconpag='';
	  $codforent='';
	  $genero_compromiso='';
	  $coderror=-1;
      self::Obtener_formatocategoria($formatocategoria,$tiporec,$manejacompra,$manejaservicio);
      self::obtener_moneda($caordcom,$moneda,$posneg,$codigomoneda);
      self::definir_tasa_cambio($caordcom,$moneda,$tasacambio,$combo1_text,$multiplicar_grid_por_tasacambio,$monedasol,$tip_fin);
      $codigo_proveedor=$arreglo_campos[3];
      $hay_presupuesto=true;
      $referencia=$arreglo_campos[5];
      $codconpag=$arreglo_campos[6];
      $codforent=$arreglo_campos[7];
      $genero_compromiso=$arreglo_campos[8];
      $grid_detalle_orden_arreglos=$arreglo_arreglo[0][0];
      $grid_detalle_resumen=$arreglo_arreglo[1][0];
      $grid_detalle_entregas=$arreglo_arreglo[2][0];
      $grid_detalle_recargo=$arreglo_arreglo[3][0];
      $grid_detalle_entregaspda=isset($arreglo_arreglo[4][0]) ? $arreglo_arreglo[4][0] : array();

        $i=0;
        $result=array();
        $sql = "Select refprc,afecom,afedis From CpDocCom Where TipCom='".$caordcom->getDoccom()."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $refiereprecom = $result[0]['refprc'];
          $afectacompro = $result[0]['afecom'];
          $afectadis = $result[0]['afedis'];
        }
        if ($referencia==0) // para saber de que tabla me lo estoy trayendo
        {
          $campo11='rgoart';//tabla Caartord
          $campo10='dtoart';//tabla Caartord
        }
        else
        {
          $campo11='monrgo';//tabla Caartsol
          $campo10='mondes';//tabla Caartord
        }

        if (trim($caordcom->getRefsol())!='')
        {
          $c= new Criteria();
          $c->add(CasolartPeer::REQART,$caordcom->getRefsol());
          $casolart2 = CasolartPeer::doSelectOne($c);
          if (count($casolart2)>0)
          {
              if (self::Grabar_orden_compra($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$arreglo_objetos,$arreglo_campos,$moneda,$codigomoneda,$codigo_proveedor,$referencia,$codconpag,$codforent)) {
                self::Grabar_grid_resumen2($caordcom, $grid_detalle_resumen,$referencia);
                self::Grabar_grid_entregas2($caordcom, $grid_detalle_entregas);
                self::Grabar_grid_entregasPDA2($caordcom,$grid_detalle_entregaspda);
	            if ($afectacompro=='S')
	            {
	                // grabo imputacion
	                $c= new Criteria();
	                $cadefart_search = CadefartPeer::doSelectOne($c);
	                if (($cadefart_search->getComasopre()=='S') and ($cadefart_search->getComreqapr()=='S'))
	                    $aprobacion='S';
	                else
	                    $aprobacion='N';
	                if ($aprobacion!='S')
	                  self::Grabar_compromiso($caordcom);
	              }
	              self::grabarFormasEntrega($caordcom,$grid_detalle_formas_entrega);
	          }else {
	          	$coderror=3010;
                return false;
	          }		             
           }  //if (count($casolart2)>0)
        }
        else  //Directa
        {
          if (self::Grabar_orden_compra($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$arreglo_objetos,$arreglo_campos,$moneda,$codigomoneda,$codigo_proveedor,$referencia,$codconpag,$codforent))
          {
                self::Grabar_grid_resumen2($caordcom, $grid_detalle_resumen,$referencia);
                self::Grabar_grid_entregas2($caordcom, $grid_detalle_entregas);
                self::Grabar_grid_entregasPDA2($caordcom,$grid_detalle_entregaspda);
	            if ($afectacompro=='S')
	            {
	              // grabo imputacion
	              $c= new Criteria();
	              $cadefart_search = CadefartPeer::doSelectOne($c);
	              if (($cadefart_search->getComasopre()=='S') and ($cadefart_search->getComreqapr()=='S'))
	                $aprobacion='S';
	              else
	                $aprobacion='N';

	              if ($aprobacion!='S')
	                self::Grabar_compromiso($caordcom);
	            }
	            self::grabarFormasEntrega($caordcom,$grid_detalle_formas_entrega);
          }else {
          	$coderror=3010;
            return false;
          }	
     }  
 	}
   return true;
  }



//<!-----------------------------------Funciones del grid para cuando viene referida------------------------------------------------------------>
/*
 * esta funcion es para obtener el grid de los recargos cuando se llama parcialmente
 * me traigo ewl grid dependiendo del rif del proveedor escogido por el usuario
 */
  public static function Obtener_Grid_Parcial_Recargos($refsol,$rifpro,&$output)
  {
    $result=array();
    $arreglo_codart=array();
    if (Orden_compra::Verificar_proveedor(trim($refsol),trim($rifpro),$rifpro,$msg,$cancotpril,$strrifpro,$srtrefcot))
    {
      $sql = "Select reqart,codart,codcat,canreq,canrec,montot,costo,monrgo,canord,mondes,relart,unimed,codpar From CaArtSol Where ReqArt='".$refsol."' order By CodArt";
      if (Herramientas::BuscarDatos($sql,$result))
      {
        $i=0;
        while ($i<count($result))
        {
           if ($result[$i]['canord']<$result[$i]['canreq'])
           {
              if ($cancotpril>0)
              {
                //ARTICULO DE LA COTIZACION CON PRIORIDAD #1 PARA EL NUMERO DE FILAS DEL GRID
                  $result1=array();
                $sql1 = "select refcot,codart,canord,costo,totdet,fecent,priori,justifica,mondes from cadetcot where refcot='".$srtrefcot."' and codart='".$result[$i]['codart']."' and priori='1'";
                if (Herramientas::BuscarDatos($sql1,$result1))
                  $arreglo_codart[]=$result1[0]['codart'];
               }
           }
           $i++;
        }
      }
    }


    $output = array();
    $grid=array();
    $j=0;
    $seguir=true;
    $distinto=array_unique($arreglo_codart);
    //print print_r($distinto);
    if (count($distinto)>0)
    {
      while ($j<count($distinto))//la hace dos veces
      {
        $result=array();
        $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
        $sql="Select reqart,codrgo,monrgo,tipdoc From cadisrgo Where ReqArt ='".$refsol."' and codart='".$distinto[$j]."' and TipDoc='".$tipdoc."' order By CodRgo";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $i=0;
          while ($i<count($result))
          {
              if (count($output)>0)
              {
                $k=0;
                while ($k<count($output))
                {
                  if ($output[$k]['codrgo']==$result[0]['codrgo'])
                  {
                    $output[$k]['monrgo']=$output[$k]['monrgo']+$result[0]['monrgo'];
                    $output[$k]['recargototal'] = $output[$k]['monrgo'];
                    $output[$k]['pormonrgo'] = $output[$k]['monrgo'];
                    $seguir=false;
                    break;
                  }
                  $k++;
                }
              }
              if ($seguir)
              {
                $grid['id']=$i;
                $grid['codrgo'] = $result[0]['codrgo'];
                $grid['nomrgo'] = Herramientas::getX_vacio('codrgo','carecarg','nomrgo',$result[0]['codrgo']);
                $grid['monrgo'] = $result[0]['monrgo'];
                $grid['recargototal'] = $grid['monrgo'];
                $grid['pormonrgo'] = $grid['monrgo'];
                $grid['tiprgodos'] = $result[0]['tipdoc'];
                $output[] = $grid;
              }
              $i++;
           }
         }
         $j++;
      }

    }
  }
/*
 * esta funcion es para obtener el grid de los articulos cuando se llama parcialmente
 * me traigo ewl grid dependiendo del rif del proveedor escogido por el usuario
 * el grid yo lo envio en un arreglo
 */

  public static function Obtener_Grid_Parcial($refsol,$rifpro,&$output)
  {
    $result=array();
    $output = array();
    $grid=array();
    $result=array();
    $arreglo_codart=array();
    $tipopro=H::getX('RIFPRO','Caprovee','Tipo',trim($rifpro));
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
    $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
    $moneda=H::getX_vacio('REQART', 'Casolart', 'Tipmon', $refsol);
    $valor=H::getX_vacio('REQART', 'Casolart', 'Valmon', $refsol);
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if (Orden_compra::Verificar_proveedor(trim($refsol),trim($rifpro),$rifpro,$msg,$cancotpril,$strrifpro,$srtrefcot))
    {
      $detsinord=H::getConfApp2('detsinord', 'compras', 'almordcom');
      if ($detsinord=='S')
          $campo="id";
      else
          $campo="codart";

      $sql = "Select reqart,codart,codcat,canreq,canrec,montot,costo,monrgo,canord,mondes,relart,unimed,codpar,desart, unimed From CaArtSol Where ReqArt='".$refsol."' order By ".$campo;
      if (Herramientas::BuscarDatos($sql,$result))
      {
        $i=0;
        while ($i<count($result))
        {
           if ($result[$i]['canord']<$result[$i]['canreq'])
           {
             
              if ($cancotpril>0)
              {
                //ARTICULO DE LA COTIZACION CON PRIORIDAD #1 PARA EL NUMERO DE FILAS DEL GRID
                $result1=array();
                if ($claartdes=='S')
                    $sql1 = "select refcot,codart,canord,costo,totdet,fecent,priori,justifica,mondes from cadetcot where refcot='".$srtrefcot."' and codart='".$result[$i]['codart']."' and desart='".$result[$i]['desart']."' and priori='1'";
                else
                   $sql1 = "select refcot,codart,canord,costo,totdet,fecent,priori,justifica,mondes from cadetcot where refcot='".$srtrefcot."' and codart='".$result[$i]['codart']."' and priori='1'";
                if (Herramientas::BuscarDatos($sql1,$result1))
                {
                  $result2=array();
                  $sql2 ="Select codart,desart,codcta,codpar,ramart,cosult,cospro,exitot,unimed,unialt,relart,fecult,invini,codmar,codref,costot,sigecof,codclaart,lotuni,ctavta,ctacos,ctapro,preart,distot,tipo,tip0,coding,mercon From CaRegArt Where CodArt = '".$result[$i]['codart']."'";
                  if (Herramientas::BuscarDatos($sql2,$result2))
                  {
                    $grid['id']=$i;
                    if ($result[$i]['monrgo']>0 && $tipopro!='P')
                       $grid['check'] = '1';
                    else
                      $grid['check'] = '0';
                  $grid['codart']=$result2[0]['codart'];
                  $grid['desart'] = $result[$i]['desart'];
                  $grid['unimed'] = $result[$i]['unimed'];
                  $partidaregart = $result2[0]['codpar'];
                    //BUSCAMOS LOS TIPOS De ARTICULOS (ARTICULOS O SERVICIOS)
                    //PARA SABER SI ES ORDEN DE COMPRA, SERVICIO O MIXTA
                    if ($result2[0]['tipo']=='A')
                        $hay_articulos=true;
                    else
                        $hay_servicios=true;
                  $grid['codcat'] = $result[$i]['codcat'];

                  $grid['canord2']=H::FormatoMonto($result[$i]['canreq']-$result[$i]['canord']); 


                  if ($result[$i]['canreq']>0)
                      $grid['canreq'] = H::FormatoMonto($result[$i]['canreq']);
                    else
                      $grid['canreq'] = "0,00";

                    $grid['canaju'] = "0,00";

                    if ($result[$i]['canrec']>0)
                      $grid['canrec'] = H::FormatoMonto($result[$i]['canrec']);
                    else
                      $grid['canrec'] = "0,00";

                  if ($result[$i]['canreq']>0)
                      $grid['canreq'] = H::FormatoMonto($result[$i]['canreq']);
                  else
                      $grid['canreq'] = "0,00";

                 if ($result[$i]['costo']>0) {
                   if ($moneda2!=$moneda)  $grid['costo'] = $result[$i]['costo']/$valor;
                   else $grid['costo'] = $result[$i]['costo'];
                  }
                  else
                      $grid['costo'] = "0,00";

                  if ($result[$i]['canreq']>0 && $result[$i]['costo']>0){
                    if ($moneda2!=$moneda) $grid['cancost'] = H::FormatoMonto(H::toFloat($grid['canord2']) * ($result[$i]['costo']/$valor));
                    else $grid['cancost'] = H::FormatoMonto(H::toFloat($grid['canord2']) * $result[$i]['costo']);
                  }
                  else
                      $grid['cancost'] = "0,00";

                  if ($result[$i]['mondes']>0)
                      $grid['mondes'] = H::FormatoMonto($result[$i]['mondes']);
                  else
                      $grid['mondes'] = "0,00";

                  ///Calcular de acuerdo 
                  if ($result[$i]['monrgo']>0 && $tipopro!='P') {
                   $acum=0;
		           $datosrecargo="";
		           $cq= new Criteria();
		           $cq->add(CadisrgoPeer::REQART,$result[$i]['reqart']);
		           $cq->add(CadisrgoPeer::CODART,$result[$i]['codart']);
		           $cq->add(CadisrgoPeer::CODCAT,$result[$i]['codcat']);
		           $cq->add(CadisrgoPeer::TIPDOC,$tipdoc);
		           $resulth=CadisrgoPeer::doSelect($cq);
		           if ($resulth)
		           {
		              foreach ($resulth as $datosh)
		              {                 
		                 $reccal=SolicituddeEgresos::CalcularRecargos($datosh->getTiprgo(),$datosh->getMonrgoc(),H::toFloat($grid['cancost']));
		                 $monrgoc=number_format($datosh->getMonrgoc(),2,',','.');
		                 $datosrecargo=$datosrecargo . $datosh->getCodrgo().'_' . $datosh->getNomrgo().'_' . $monrgoc .'_'. $datosh->getTiprgo().'_' . $reccal .'_'. $datosh->getCodpar(). '!'; 
		                 $acum=$acum+H::toFloat($reccal);
		              }
		           
		          $grid['monrgo']=H::FormatoMonto($acum);
		          $grid['datosrecargo']=$datosrecargo;
		          }
		      }else  $grid['monrgo'] = "0,00";
		          


                  /*if ($result[$i]['monrgo']>0 && $tipopro!='P')
                      $grid['monrgo'] = $result[$i]['monrgo'];
                  else  $grid['monrgo'] = "0.00";
                  

                 if ($result[$i]['montot']>0 && $tipopro!='P') {
                    if ($moneda2!=$moneda) $grid['montot'] =$result[$i]['montot']/$valor;
                    else  $grid['montot'] =$result[$i]['montot'];
                  }
                  else if ($result[$i]['montot']>0 && $tipopro=='P') {
                    if ($moneda2!=$moneda) $grid['montot'] =($result[$i]['montot']/$valor) -$result[$i]['monrgo'];
                    else $grid['montot'] =$result[$i]['montot'] -$result[$i]['monrgo'];
                  }
                  else
                      $grid['montot'] = "0.00";*/

                  $grid['montot']=H::FormatoMonto((H::toFloat($grid['cancost'])+(H::toFloat($grid['monrgo'])*$valor)-(H::toFloat($grid['mondes'])*$valor))*$valor);

                  if ($refsol!="") {
                  if (($result[$i]['codpar']!='') and ($result[$i]['codcat']))
                        $grid['codigopre']=$result[$i]['codcat'].'-'.$result[$i]['codpar'];
                    else
                        $grid['codigopre']=$partidaregart;
                  }else {
                      if (($result[$i]['codpar']!='') and ($result[$i]['codcat']))
                        $grid['codpre']=$result[$i]['codcat'].'-'.$result[$i]['codpar'];
                    else
                        $grid['codpre']=$partidaregart;
                  }

                    if ($result[$i]['codpar']!='')
                        $grid['codpar']=$result[$i]['codpar'];
                    else
                        $grid['codpar']=$partidaregart;

                    $grid['anadir']="";
                    //$grid['datosrecargo']="";
                    //if ($tipopro!='P') $grid['datosrecargo']=self::Cargartirarecargosgrid($refsol,$result[$i]['codart'],$result[$i]['codcat'],$result[$i]['desart']);

                    $grid['nompar']="";
                    $grid['codcen']="";
                    $grid['codunimed']="";
                    $grid['descen']="";
                    $output[] = $grid;
                 }
               }
            }
           }
         $i++;
        }
      }
    }
  }

/*
 * verifica los pŕoveedores que tienen cotizaciones
 * y los acumula y cuando los escoge el usuario el verifica si esta en el arreglo obtenido por esta funcion
 *
 */
  public static function Verificar_proveedor($orden,$rif,&$rifpro,&$msg,&$cancotpril,&$strrifpro,&$srtrefcot)
  {
    if ($orden!='')
    {
      $espro1=false;
      $msg='';
      $cancotpril=0;
      $strrifpro='';
      $rifpro='';
      $srtrefcot='';
      $codigo=str_pad($orden,8,'0',STR_PAD_LEFT);
    $result2=array();
    $sql2 = "Select refsol from cacotiza where refsol= '".$codigo."'";
        if (Herramientas::BuscarDatos($sql2,$result2))
        {
          $result=array();
          $sql = "Select reqart,sum(coalesce(canreq,0)) as canreq,sum(coalesce(canord,0)) as canrec From CAArtSol Where ReqArt = '".$codigo."' Group By ReqArt";
      if (Herramientas::BuscarDatos($sql,$result))
      {
        if (($result[0]['canreq']-$result[0]['canrec'])<=0)
        {
            $msg="La Solicitud se encuentra totalmente saldada";
            $rifpro='';
        }
        else
        {
            $result1=array();
            $sql1 = "select distinct(b.rifpro) as rifpro, a.refcot,c.conpag,c.forent from cadetcot a,caprovee b,cacotiza c where c.codpro=b.codpro and c.refsol='".$codigo."' and a.refcot=c.refcot and a.priori=1";
            if (Herramientas::BuscarDatos($sql1,$result1))
            {
                $i=0;
                  $msg='';
                  $cancotpril=count($result1);
                  while ($i<count($result1))
                  {
                    $strrifpro=$result1[$i]['rifpro'];
                    $rifpro=$result1[$i]['rifpro'];
                    $srtrefcot=$result1[$i]['refcot'];
                    if ($result1[$i]['rifpro']==$rif)
                    {
                      $espro1=true;
                      break;
                    }
                    $i++;
                  }
            }
            if (!$espro1)
            {
                  $msg="La Contratistas de Bienes o Servicio y Cooperativas de la cotizacion asociada a la  Solicitud no se le ha asignado Prioridad";
                  $rifpro=$strrifpro;
            }
        }
      }
    }
    else
    {
          $msg="No hay Cotizaciones para esta Solicitud";
          $espro1=true;
    }
    }
    return $espro1;
  }

  public static function chequear_disponibilidad_incremento_recargo($caordcom,&$arreglo,&$total_ajuste)
  {
    $variable=false;
    $mitotal=0;
    if ($caordcom->getOrdcom()!='')
    {
     $result=array();
     $arreglo=array();
     $sql="select a.codart,a.codcat,a.codpre,a.monrgo,b.canord as comprada from cadisrgo a,caartord b where a.reqart='".$caordcom->getOrdcom()."' and a.tipdoc in (select tipcom from cpdoccom) and a.reqart=b.ordcom and a.codart=b.codart and a.codcat=b.codcat";
      if (Herramientas::BuscarDatos($sql,$result))
      {
        $i=0;
        if ($caordcom->getRefsol()!='')
        {
          while ($i<count($result))
          {
            $result1=array();
            $sql1="select a.codart,a.codcat,a.codpre,a.monrgo,b.canreq as solicitada from cadisrgo a,caartsol b where a.reqart='".$caordcom->getRefsol()."' and a.codart='".$result[$i]['codart']."' and a.codcat='".$result[$i]['codcat']."' and a.tipdoc in (select tipprc from cpdocprc) and a.reqart=b.reqart and a.codart=b.codart and a.codcat = b.codcat";
            if (Herramientas::BuscarDatos($sql1,$result1))
            {
              if ($result1[0]['monrgo'])
                $mitotal= $mitotal + ($result[$i]['monrgo'] - (($result1[0]['monrgo']) / ($result1[0]['solicitada'] * $result[$i]['comprada'])));
              else
                $mitotal=0;
            }
            if ($mitotal>0)
            {
              $codigopresupuestario = $result[$i]['codpre'];
              $ano=substr($caordcom->getFecord(), 0, 4);
              $result2=array();
              $sql2 = "Select mondis from CPAsiIni WHERE CodPre = '".$codigopresupuestario."' AND PERPRE = '00' and AnoPre='".$ano."'";
              if (Herramientas::BuscarDatos($sql2,$result2))
              {
                $lleno=true;
                if ($i>0)
                {
                  $j=0;
                  while ($j<count($arreglo))
                  {
                    if ($arreglo[$j][0]==$codigopresupuestario)
                    {
                      $arreglo[$j][1]=$arreglo[$j][1]+$mitotal;
                      $lleno=false;
                    }
                    $j++;
                  }
                }
                if ($lleno)
                {
                  $arreglo[$i][0]=$codigopresupuestario;
                  $arreglo[$i][1]=$mitotal;
                }
                $total_ajuste = $total_ajuste + $mitotal;
                $variable=true;
              }
            }
            $i++;
          }
        }
      }
    }
    return $variable;
  }



/*
 *Funcion para anular una orden de compra
 *esta se ejecuta en el executeSalvaranu
 *ya su ves esta es llamada en un javascript en el js almordcom
 */
  public static function Salvar_anular($caordcom,$descripcion,$fecanu,&$coderror)
  {
    $coderror=-1;
    $result=array();
    $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
    $sql = "Select refprc,afecom,afedis From CpDocCom Where TipCom='".$caordcom->getDoccom()."'";

    if (Herramientas::BuscarDatos($sql,$result))
      $afectacompro = $result[0]['afecom'];

      //Buscamos si tiene un Ajuste

      $result=array();
        //$sql = "Select refere From Cpajuste Where refaju='".'AC'.trim(substr($caordcom->getOrdcom(), 2, 6))."' and staaju='A'";
      $sql = "Select refere From Cpajuste Where refere='".$caordcom->getOrdcom()."' and staaju='A'";
    if (!Herramientas::BuscarDatos($sql,$result))
    {
        $result1=array();
          $sql1 = "Select rcpart From Carcpart Where ordcom='".$caordcom->getOrdcom()."'";
      if (!Herramientas::BuscarDatos($sql1,$result1))
      {
        //Ahora preguntamos si genero Comprobante de Orden y si lo podemos eliminar
          $result2=array();
            $sql2 = "Select codemp From Opdefemp";
        if (Herramientas::BuscarDatos($sql2,$result2))
        {
          if ($caordcom->getTipord()=='C')
            $numerocomprob='OC'.substr($caordcom->getOrdcom(), 2, 6);
          elseif($caordcom->getTipord()=='S')
            $numerocomprob='OS'.substr($caordcom->getOrdcom(), 2, 6);
          else if ($caordcom->getTipord()=='T')
            $numerocomprob='CO'.substr($caordcom->getOrdcom(), 2, 6);
          else
            $numerocomprob='OC'.substr($caordcom->getOrdcom(), 2, 6);



          if (self::verificar_status_compro($numerocomprob))///////////////////////////////////////////
          {
            if(!self::anular_comprob($numerocomprob,$fecanu,$coderror))
            {
              $coderror=124;
              return false;
            }
          }
          /*else
          {
            $coderror=167;
            return false;
          }*/
          }//Opdefemp

          $result3=array();
            $sql3 = "Select ordcom,refcom From Caordcom Where ordcom='".$caordcom->getOrdcom()."'";
        if (Herramientas::BuscarDatos($sql3,$result3))
        {
            $result4=array();
              $sql4 = "select * from cpimpcau where refere='".$result3[0]['ordcom']."' and STAIMP<>'N'";
          if (!Herramientas::BuscarDatos($sql4,$result4))
          {
              $traemot=H::getConfApp('traemot', 'almordcom', 'compras');
              $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
              if ($traemot=='S')
                $sql5="Update Caordcom set fecanu='".$fecanu."',staord='N',motanu='".$descripcion."',usuanu='".$loguse."'  where ordcom='".$caordcom->getOrdcom()."'";
              else
                $sql5="Update Caordcom set fecanu='".$fecanu."',staord='N'  where ordcom='".$caordcom->getOrdcom()."'";
              Herramientas::insertarRegistros($sql5);
                      $referenciacomp = $result3[0]['refcom'];
              if ($caordcom->getRefsol()!='')
              {
                $result5=array();
              $sql5 = "select canord,codart,codcat, desart, reqart from Caartord Where ordcom='".$caordcom->getOrdcom()."'";
              if (Herramientas::BuscarDatos($sql5,$result5))
              {
                  $i=0;
                  // en vez del grid hice una consulta a bd
                  while ($i<count($result5))
                  {
                     $p= new Criteria();
                     $p->add(CaartsolPeer::REQART,$result5[$i]['reqart']);
                     $p->add(CaartsolPeer::CODART,$result5[$i]['codart']);
                     if ($claartdes=='S') $p->add(CaartsolPeer::DESART,$result5[$i]['desart']);
                     $p->add(CaartsolPeer::CODCAT,$result5[$i]['codcat']);
                     $regp= CaartsolPeer::doSelectOne($p);
                     if ($regp){
                       $regp->setCanord($regp->getCanord()-$result5[$i]['canord']);
                       $regp->save();
                     }
                  //$sql6="Update Caartsol set Canord=Canord-".$result5[$i]['canord']." where reqart='".$result5[$i]['reqart']."' and codart='".$result5[$i]['codart']."' and codcat='".$result5[$i]['codcat']."'";
                  //Herramientas::insertarRegistros($sql6);
                  $i++;
                    }
              }
              }
                if ($afectacompro=="S")
              {
                $sql7="Update Cpcompro set desanu='".$descripcion."',fecanu='".$fecanu."',stacom='N'  where refcom='".$referenciacomp."'";
              Herramientas::insertarRegistros($sql7);
                        //Anular_ImpCom
              $sql8 = "Update Cpimpcom set staimp='N' Where Rtrim(RefCom)='".$referenciacomp."'";
              Herramientas::insertarRegistros($sql8);
            }
                    }
                    else
                    {
                $coderror=154;
              return false;
                    }
          }
        }
        else
        {
              $coderror=155;
            return false;
        }//Carcpart
      }
      else
      {
        $coderror=157;
        return false;
      }//$cpajuste
  }
/*
 * verifica el estatus del compromiso
 */
  public static function verificar_status_compro($comprobante)
  {
      $var=false;
      $result=array();
        $sql = "Select stacom From Contabc Where numcom='".$comprobante."'";
    if (Herramientas::BuscarDatos($sql,$result))
      $var=true;
  return $var;
  }

/*
 * anula el comprobante de la orden de compra
 */
  public static function anular_comprob($comprobante,$fecanu,&$coderror)
  {
    $coderror=-1;
    $contabc_up='';
    $c= new Criteria();
      $c->add(ContabcPeer::NUMCOM,$comprobante);
    $contabc_up = ContabcPeer::doSelectOne($c);
    if (count($contabc_up)>0)
    {
        $numcom='AC'.substr($contabc_up->getNumcom(), 2, 6);
        if ($fecanu=='')
        {
          $dateFormat = new sfDateFormat('es_VE');
          $fecanu = $dateFormat->format(date("d-m-Y"), 'i', $dateFormat->getInputPattern('d'));
        }
        $vacio='';
        $result=array();
      $sql = "Select numcom From Contabc Where numcom='".$numcom."'";
      if (!Herramientas::BuscarDatos($sql,$result))
      {
            $sql="Insert into Contabc values ('".$numcom."','".$fecanu."','".$contabc_up->getDescom()."','".$contabc_up->getMoncom()."','D','".$vacio."')";
            Herramientas::insertarRegistros($sql);

          $c= new Criteria();
            $c->add(Contabc1Peer::NUMCOM,$comprobante);
          $contabc1_up = Contabc1Peer::doSelect($c);
          if (count($contabc1_up)>0)
          {
              $i=0;
              $asiento=1;
              foreach ($contabc1_up as $detalle)
              {
                  $numcom='AC'.substr($detalle->getNumcom(), 2, 6);
                  if ($detalle->getDebcre()=='D')
                    $debcre='C';
                  else
                    $debcre='D';
                  $sql1="Insert into Contabc1 values ('".$numcom."','".$fecanu."','".$debcre."','".$detalle->getCodcta()."','".$asiento."','".$detalle->getRefasi()."','".$detalle->getDesasi()."','".$detalle->getMonasi()."')";
                  Herramientas::insertarRegistros($sql1);
              $asiento++;
            }
            return true;
          }
      }
      else
      {
          $coderror=159;
          return false;
      }
    }
    else
    {
        $coderror=124;
        return false;
    }
    return true;

  }

/*
 * calcula el monto del recargo que se va a guardar
 * esto se hace tanto en javascript como en codigo php
 */
  public static function monto_recargo($acumulado, $totalrgo, $totalart,&$monto_recargo)
  {
    $monto_recargo= 0;
    if ($acumulado!=0)
      $monto_recargo = ($totalrgo) * ($totalart / $acumulado);
    else
      $monto_recargo=0;
    return true;
  }


  public static function chequear_disponibilidad_recargo($codigo,$elmonto,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$referencia,&$sobregiro_recargo,$grid_total_unidad)
  {
      $codigo=str_replace("'","",$codigo);
      $chequear_disponibilidad_recargo = false;
      $sobregiro_recargo = true;
      $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
      if ($codigo=='')
        $mitotal=0;
      else
        $mitotal=$elmonto;
      $result=array();
      $sql = "Select codpre from CaRecArg where CodRgo = '".$codigo."'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
          if (trim($tiporec)=='P')
          {
            $mitotal=$elmonto;
            $codigo_presupuestario = str_replace("'","",$result[0]['codpre']);
            $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
            if ($mitotal <= $mondis)
            {
                $chequear_disponibilidad_recargo = true;
                $sobregiro_recargo = false;
            }
          }
        elseif (trim($tiporec)=='R')
        {
            $grid_total_unidad=self::acumular_unidad($elmonto,$grid_detalle_orden_arreglos,$referencia,$grid_total_unidad);
            $j=0;
            while ($j<count($grid_total_unidad))
            {
                $codigo_presupuestario = $grid_total_unidad[$j][0].'-'.$result[0]['codpre'];
                $mitotal=$grid_total_unidad[$j][1];
                $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
                if ($mitotal <= $mondis)
                {
                    $chequear_disponibilidad_recargo = true;
                    $sobregiro_recargo = false;
                }else {
                    break;
                }
                $j++;
            }
          }
       }

      return $chequear_disponibilidad_recargo;
  }

/*
 *
 */

  public static function acumular_unidad($elmonto,$grid_detalle_orden_arreglos,$referencia,$grid_total_unidad)
  {
    if ($referencia==0) // para saber de que tabla me lo estoy trayendo
    {
      $campo5='canord';//tabla Caartord
      $campo9='preart';//tabla Caartord
    }
    else
    {
      $campo5='canord2';//tabla Caartsol
      $campo9='costo';//tabla Caartsol
    }
    $i=0;
    $acum=0;
    while ($i<count($grid_detalle_orden_arreglos))
    {
      if ((str_replace("'","",$grid_detalle_orden_arreglos[$i]['check'])=='1') and (str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo9])>0))
        $acum = $acum + (str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo5])*str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo9]));
        $i++;
    }
    $i=0;
    while ($i<count($grid_detalle_orden_arreglos))
    {
        if (str_replace("'","",$grid_detalle_orden_arreglos[$i]['check'])=='1')
        {
          $totart = str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo9]) * str_replace("'","",$grid_detalle_orden_arreglos[$i][$campo5]);
          $j=0;
          if (count($grid_total_unidad)>0)
          {
            while ($j<count($grid_total_unidad))
            {
                $encontrado=false;
                if (str_replace("'","",$grid_detalle_orden_arreglos[$i]['codcat'])==$grid_total_unidad[$j][0])
                {
                  $encontrado=true;
                  $fila=$j;
                  break;
                }
                $j++;
            }
            if ($encontrado)
            {
              self::monto_recargo($acum,$elmonto,$totart,$monto_recargo);
              $grid_total_unidad[$fila][1]=$grid_total_unidad[$fila][1]+$monto_recargo;
            }
            else
            {
              $var=count($grid_total_unidad);
              $grid_total_unidad[$var][0]=str_replace("'","",$grid_detalle_orden_arreglos[$i]['codcat']);
              self::monto_recargo($acum,$elmonto,$totart,$monto_recargo);
              $grid_total_unidad[$var][1]=$monto_recargo;
            }
          }
          else
          {
            $grid_total_unidad[$j][0]=str_replace("'","",$grid_detalle_orden_arreglos[$i]['codcat']);
            self::monto_recargo($acum,$elmonto,$totart,$monto_recargo);
            $monto_recargo.$grid_total_unidad[$j][1]=$monto_recargo;
          }
        }
        $i++;
    }
      return $grid_total_unidad;
  }


//<!-----------------------------------Funciones del codigo probadas----------------------------------------------------------->

  public static function chequear_disponibilidad_presupuesto($caordcom,$grid_detalle_orden_arreglos,$fila,$referencia,&$sobregiro,&$codigo_presupuestario_sin_disponibilidad)
  {
    //print $referencia;
    if ($referencia==0) // para saber de que tabla me lo estoy trayendo
    {
      $campo12='rgoart';//tabla Caartord
      $campo11='dtoart';//tabla Caartord
      $campo9='preart';//tabla Caartord
      $campo13='totart';//tabla Caartord
      $campo15='codpre';//tabla Caartord
    }
    else
    {
      $campo12='monrgo';//tabla Caartsol
      $campo11='dondes';//tabla Caartsol
      $campo9='costo';//tabla Caartsol
      $campo13='montot';//tabla Caartsol
      $campo15='codigopre';//tabla Caartsol
    }
    //Verificar moneda y conversion
    if ($referencia==0) $moneda=$caordcom->getTipmon();
    else $moneda=Herramientas::getX('reqart','Casolart','Tipmon',$caordcom->getRefsol());
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda) {
            if ($referencia==0) $valor=$caordcom->getValmon();
            else $valor=Herramientas::getX('reqart','Casolart','Valmon',$caordcom->getRefsol());
    }else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    $mitotal = 0;
    $codigo_presupuestario='';
    $chequear_disponibilidad=false;
    $sobregiro=true;
    $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
    if (count($grid_detalle_orden_arreglos)>0)
    {
        $j=0;
          while ($j<count($grid_detalle_orden_arreglos))
          {
            if (str_replace("'","",$grid_detalle_orden_arreglos[$fila][$campo15])==str_replace("'","",$grid_detalle_orden_arreglos[$j][$campo15]))
            {
              if ($tiporec=='C') {
               if ($moneda2!=$moneda) $elmonto=H::toFloat(str_replace("'","",$grid_detalle_orden_arreglos[$j][$campo13]))*H::toFloat($valor,6);
               else $elmonto=str_replace("'","",$grid_detalle_orden_arreglos[$j][$campo13]);
              }
              else {
               if ($moneda2!=$moneda) $elmonto=((H::toFloat($grid_detalle_orden_arreglos[$j][$campo13])*H::toFloat($valor,6))-$grid_detalle_orden_arreglos[$j][$campo12]);
               else $elmonto=($grid_detalle_orden_arreglos[$j][$campo13]-$grid_detalle_orden_arreglos[$j][$campo12]);
              }
              $mitotal=$mitotal+$elmonto;
            }
              $j++;
          }
        if ($caordcom->getId()!='')
           $mitotal = $mitotal - $grid_detalle_orden_arreglos[$fila][$campo11];

        if ($grid_detalle_orden_arreglos[$fila][$campo15]!='')
        {
           $codigo_presupuestario =  $grid_detalle_orden_arreglos[$fila]['codcat']."-".$grid_detalle_orden_arreglos[$fila]['codpar'];
           $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
           if (H::toFloat($mitotal)<=H::toFloat($mondis))
           {
               $chequear_disponibilidad=true;
               $sobregiro=false;
           }
        }
    }
    $codigo_presupuestario_sin_disponibilidad=$codigo_presupuestario;
    return $chequear_disponibilidad;
  }


   public static function Grabar_ajuste_solicitud($caordcom,$totalaju,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$tiporec,$tasacambio,$monedasol,$referencia)
   {
      if ($referencia==0) // para saber de que tabla me lo estoy trayendo
      {
        $campo11='rgoart';//tabla Caartord
        $campo10='dtoart';//tabla Caartord
      }
        else
        {
          $campo11='monrgo';//tabla Caartsol
          $campo10='mondes';//tabla Caartord
        }
        $grabarajustesolicitud = true;
        $result=array();
        $fecha_ano=substr($caordcom->getFecord(), 0, 4);
        $sql = "SELECT tipaju FROM CPDOCAJU WHERE REFIER='P'";
        if (Herramientas::BuscarDatos($sql,$result))
           $tipo=str_replace("'","",$result[0]['tipaju']);
        else
           $tipo="AJPR";
        if ($caordcom->getOrdcom()!='')
        {
          $referenciaajuste = 'IS'.substr($caordcom->getOrdcom(), 2, 6);
          $cpajuste_new = new Cpajuste();
              $cpajuste_new->setRefaju($referenciaajuste);
              $cpajuste_new->setTipaju($tipo);
              $cpajuste_new->setFecaju($caordcom->getFecord());
              $cpajuste_new->setAnoaju($fecha_ano);
              $cpajuste_new->setRefere($caordcom->getRefsol());
              $cpajuste_new->setDesaju('AJUSTE POR INCREMENTO DE TASA CAMBIARIA A LA SOLICITUD DE EGRESO N° '. $caordcom->getRefer());
              $cpajuste_new->setTotaju($totalaju);
              $cpajuste_new->setStaaju('A');
              $cpajuste_new->save();
              $grabarajustesolicitud = true;
        }
        else
          $grabarajustesolicitud = false;
      $i=0;
      if ($grabarajustesolicitud)
      {
        while ($i<count($grid_detalle_orden_arreglos))
        {
          $result=array();
          if (self::obtener_codigo_presupuestario($caordcom,$grid_detalle_orden_arreglos,$i,$obtenercodigopresupuestario)=='true')
          {
              $sql1 = "select * From CPMovAju where refaju='".$referenciaajuste."' and Codpre='".$obtenercodigopresupuestario."'";
              if (Herramientas::BuscarDatos($sql1,$result))
              {
                $montoaxu=str_replace("'","",$result[0]['monaju']);
                $c = new Criteria();
                $c->add(CpmovajuPeer::REFAJU,$referenciaajuste);
                $c->add(CpmovajuPeer::CODPRE,$obtenercodigopresupuestario);
                  $cadisrgo = CadisrgoPeer::doSelect($c);
                  foreach ($cadisrgo as $arreglo)
                  {
                    $arreglo->delete();
                  }
              }
              else
                $montoaxu=0;

             $cpmovaju_new = new Cpmovaju();
             $cpmovaju_new->setRefaju($referenciaajuste);
             $cpmovaju_new->setCodpre($obtenercodigopresupuestario);
             if ($tiporec=='C')
               $mitotal=($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])-((($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])/$tasacambio)*$monedasol);
             else
               $mitotal=((($grid_detalle_orden_arreglos[$i][$campo11]-$grid_detalle_orden_arreglos[$i][$campo10])/$tasacambio)*$monedasol);
             $cpmovaju_new->setMonaju('-'.($mitotal-$montoaxu));// es columna 16
             $cpmovaju_new->setStamov('A');
             $cpmovaju_new->setRefprc($caordcom->getRefsol());
             $cpmovaju_new->setRefcom('NULO');
             $cpmovaju_new->setRefcau('NULO');
             $cpmovaju_new->setRefpag('NULO');
             $cpmovaju_new->save();
          }
              $i++;
        }
        $i=0;
        if (count($grid_detalle_recargo)>0)
        {
          while ($i<count($grid_detalle_recargo))
          {
            $result1=array();
            $codigo = $grid_detalle_recargo[$i][0];// colocar el nombre del griup q falta
            $sql1 = "select * From CPMovAju where refaju='".$referenciaajuste."' and Codpre='".$codigo."'";
            if (Herramientas::BuscarDatos($sql1,$result1))
            {
              $montoaxu=str_replace("'","",$result1[0]['monaju']);
                $c = new Criteria();
                $c->add(CpmovajuPeer::REFAJU,$referenciaajuste);
                $c->add(CpmovajuPeer::CODPRE,$obtenercodigopresupuestario);
                  $cpmovaju = CadisrgoPeer::doSelect($c);
                  foreach ($cpmovaju as $arreglo)
                  {
                    $arreglo->delete();
                  }
            }
            else
              $montoaxu=0;

                $cpmovaju_new = new Cpmovaju();
                  $cpmovaju_new->setRefaju($referenciaajuste);
                  $cpmovaju_new->setCodpre($obtenercodigopresupuestario);
                  $cpmovaju_new->setMonaju('-'.($montoaxu-$grid_detalle_recargo[$i][1]));
                  $cpmovaju_new->setStamov('A');
                  $cpmovaju_new->setRefprc($caordcom->getRefsol());
                  $cpmovaju_new->setRefcom('NULO'); // no vb
                  $cpmovaju_new->setRefcau('NULO'); // no vb
                  $cpmovaju_new->setRefpag('NULO'); //no vb
                  $cpmovaju_new->save();
                $i++;
          }
        }
      }
    return   $grabarajustesolicitud;
   }




  public static function Grabar_distribucion_recargo($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$referencia)// Aqui se usan los grid como arreglos
  {
    $arreglo_grid=$grid_detalle_orden_arreglos;
    $arreglo_grid_recargo=$grid_detalle_recargo;
    $acum=0;

    if (count($arreglo_grid_recargo)>0)
    {
      if ($referencia==0) // para saber de que tabla me lo estoy trayendo
      {
        $campo5='canord';//tabla Caartord
        $campo9='preart';//tabla Caartord
        $campo='canord';//tabla Caartord
        $campo1='totart';//tabla Caartord
        $campo11='rgoart';//tabla Caartsol
      }
      else
      {
        $campo5='canord2';//tabla Caartsol
        $campo9='costo';//tabla Caartord
        $campo='canreq';//tabla Caartsol
        $campo1='montot';//tabla Caartsol
        $campo11='monrgo';//tabla Caartsol
      }
      $i=0;
      while ($i<count($arreglo_grid))
      {
        $acum=$acum+($arreglo_grid[$i][$campo]*$arreglo_grid[$i][$campo9]);
        $i++;
      }

      $c= new Criteria();
        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
        $cadisrgo = CadisrgoPeer::doSelect($c);
        foreach ($cadisrgo as $arreglo)
        {
          $arreglo->delete();
        }


      $i=0;
      //guardo tantos recargos halla de acuerdo a cuantos articulos halla sido marcado con el check
      while ($i<count($arreglo_grid_recargo))
      {
        if ($arreglo_grid_recargo[$i]["codrgo"]!='')
        {
           $j=0;
           $total_articulo=0;
           while ($j<count($arreglo_grid))
           {
              if (($arreglo_grid[$j]["codart"]!='') and ($arreglo_grid[$j][$campo]!=''))
              {
                $total_articulo=($arreglo_grid[$j][$campo])*($arreglo_grid[$j][$campo9]);
                $cadisrgo_new = new Cadisrgo();
                $cadisrgo_new->setReqart($caordcom->getOrdcom());
                $cadisrgo_new->setCodart(str_replace("'","",$arreglo_grid[$j]["codart"]));
                $cadisrgo_new->setCodcat(str_replace("'","",$arreglo_grid[$j]["codcat"]));
                $cadisrgo_new->setCodrgo(str_replace("'","",$arreglo_grid_recargo[$i]["codrgo"]));
                $result2=array();
                $sql2 = "SELECT asiparrec FROM cadefart WHERE codemp<>''";
                if (Herramientas::BuscarDatos($sql2,$result2))
                  $tiporec=str_replace("'","",$result2[0]['asiparrec']);
                if ($tiporec!='')
                {
                  if ($tiporec!='C')
                  {
                      if ($tiporec=='P')
                        $cadisrgo_new->setCodpre(Herramientas::getX_vacio('codrgo','carecarg','codpre',$arreglo_grid_recargo[$i]["codrgo"]));
                      else
                        $cadisrgo_new->setCodpre(str_replace("'","",$arreglo_grid[$j]["codcat"]).'-'.Herramientas::getX_vacio('codrgo','carecarg','codpre',str_replace("'","",$arreglo_grid_recargo[$i]["codrgo"])));
                   }
                   else {
                      if ($referencia==1)
                      $cadisrgo_new->setCodpre(str_replace("'","",$arreglo_grid[$j]["codigopre"]));
                      else $cadisrgo_new->setCodpre(str_replace("'","",$arreglo_grid[$j]["codpre"]));
                   }
                }
                self::monto_recargo($acum, $arreglo_grid_recargo[$i]["recargototal"], $total_articulo,$monto_recargo);
                //$cadisrgo_new->setMonrgo(str_replace("'","",$arreglo_grid[$j][$campo11]));
                $cadisrgo_new->setMonrgo($monto_recargo);
                $cadisrgo_new->setTipdoc($caordcom->getDoccom());
                $cadisrgo_new->save();
               }
            $j++;
         }
        }
      $i++;
      }
      return true;
    }
    else
    {
      return false;
    }
  }



   public static function Grabar_compromiso($caordcom)
   {

      $referencia = $caordcom->getOrdcom();
      $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
      $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
      $acumrec=0;
      if ($comnoiva=='S')
      {
       $cr = new Criteria();
       $cr->add(CadisrgoPeer::REQART,$referencia);
       $cr->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
       $regrec = CadisrgoPeer::doSelect($cr);
       if ($regrec)
       {
        foreach ($regrec as $objrec) {
          $acumrec+=$objrec->getMonrgo();
        }
       }   
     }
      //if ($caordcom->getRefsol()=="") 
        $moneda=$caordcom->getTipmon();
        $valor=$caordcom->getValmon();
    /*else $moneda=Herramientas::getX('reqart','Casolart','Tipmon',$caordcom->getRefsol());
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda) {
            if ($caordcom->getRefsol()=="") $valor=$caordcom->getValmon();
            else $valor=Herramientas::getX('reqart','Casolart','Valmon',$caordcom->getRefsol());
    }else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);*/
      $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
      Herramientas::EliminarRegistro("CpCompro", "Refcom", $referencia);
      Herramientas::EliminarRegistro("Cpimpcom", "Refcom", $referencia);
      $result=array();
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
             $cpcompro_new->setRefprc(substr($caordcom->getRefsol(),0,8));
          else
             $cpcompro_new->setRefprc('NULO');
            $cpcompro_new->setTipprc($tipdoc);
            $cpcompro_new->setDescom($caordcom->getDesord());
            if ($comnoiva=='S')
               $cpcompro_new->setMoncom(($caordcom->getMonord()-$acumrec)*$valor);
            else
            	$cpcompro_new->setMoncom($caordcom->getMonord()*$valor);
              $cpcompro_new->setSalcau('0');
              $cpcompro_new->setSalpag('0');
              $cpcompro_new->setSalaju('0');
              $cpcompro_new->setCedrif($caordcom->getRifpro());
              $cpcompro_new->setStacom('A');
              $cpcompro_new->setTipo($caordcom->getTipo());
              $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$caordcom->getDoccom());
              if ($reqaut=='S')              
                $cpcompro_new->setAprcom('N');
              else  {
              	$loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
              	$cpcompro_new->setLoguse($loguse);
                $cpcompro_new->setAprcom('S');
            }
              if ($filsoldir=='S'){
                $cpcompro_new->setCoddirec($caordcom->getCoddirec());
              }
              $cpcompro_new->save();
        $result=array();
        $sql1='';
        $sql = "Select AsiParRec from CaDefArt";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $tiporec=str_replace("'","",$result[0]['asiparrec']);
          if (str_replace("'","",$result[0]['asiparrec'])!='C')
            $sql1="Select (A.CodCat)||'-'||(A.CodPar) AS codpre, SUM(A.TotArt)-SUM(A.RGOART) AS totimp, A.REQART as reqart From CaArtOrd A,CARegArt B  Where A.CODART=B.CODART AND A.OrdCom='".$caordcom->getOrdcom()."'  GROUP BY (A.CodCat)||'-'||(A.CodPar), A.REQART";
          else     //COSTO DEL ARTICULO
            $sql1= "Select Rtrim(A.CodCat)||'-'||Rtrim(A.CodPar) as codpre, SUM(A.TotArt) as totimp, A.REQART as reqart From CaArtOrd A,CARegArt B Where A.CODART=B.CODART AND A.OrdCom='".$caordcom->getOrdcom()."' GROUP BY Rtrim(A.CodCat)||'-'||Rtrim(A.CodPar), A.REQART";//ojo rebisar
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
       
       if ($tiporec<>'C' && $comnoiva!='S')
       {
        $sql="SELECT SUM(monrgo) as totimp,codpre, refsol FROM CADISRGO WHERE REQART='".$caordcom->getOrdcom()."' AND TIPDOC='".$caordcom->getDoccom()."' GROUP BY CODPRE, REFSOL";
        $result=array();
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $i=0;
          while ($i<count($result))
          {
            if (str_replace("'","",$result[$i]['totimp'])>0)
            {
                /*if ($caordcom->getRefsol()!='')
                      $var=$caordcom->getRefsol();
                else
                      $var='NULO';*/
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
         if (strlen($caordcom->getRefsol())==8)
           $codeve=H::getX_vacio('REQART','Casolart','Codeve',$caordcom->getRefsol());
         $e= new Criteria();
         $e->add(CpimpcomPeer::REFCOM,$referencia);
         $trajo= CpimpcomPeer::doSelect($e);
         if ($trajo)
         {
           foreach ($trajo as $objprc) {
              $cpdiseve= new Cpdiseve();
              $cpdiseve->setRefdoc($objprc->getRefcom());
              $cpdiseve->setCodpre($objprc->getCodpre());
              if (strlen($caordcom->getRefsol())>8)
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
         $codeve=H::getX_vacio('ORDCOM','Caordcom','Codeve',$referencia);
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



 public static function chequear_disponibilidad_incremento_recargo2($caordcom,&$total_ajuste)
  {
    if ($caordcom->getOrdcom()!='')
    {
      $result=array();
      $chequear_disponibilidad_incremento_recargo=true;
      //AQUI ESTAMOS BUSCANDO LA DISTRIBUCION DEL RECARGO DE LA ORDEN
      $sql = "SELECT
          A.CODART,
          A.CODCAT,
          A.CODPRE,
          A.MONRGO,
          B.CANORD AS COMPRADA
          FROM
            CADISRGO A,
            CAARTORD B
          WHERE
          A.REQART='".$caordcom->getOrdcom()."' AND
          A.TIPDOC
          IN (SELECT TIPCOM FROM CPDOCCOM) AND
          A.REQART=B.ORDCOM AND
          A.CODART=B.CODART AND
          A.CODCAT=B.CODCAT";
      //DE COMPRA QUE ESTAMOS GRABANDO. ESTO ES POR ARTICULO Y CODIGO DE UNIDAD
      $i=0;
      if (Herramientas::BuscarDatos($sql,$result))
      {
          while ($i<count($result))
          {
            $mitotal=0;
            if ($caordcom->getRefsol()!='')
            {
                //AQUI ESTAMOS BUSCANDO LA DISTRIBUCION DEL RECARGO DE LA ORDEN
                $sql = "SELECT A.CODART,
                  A.CODCAT,
                  A.CODPRE,
                  A.MONRGO,
                  B.CANREQ AS SOLICITADA
                  FROM
                  CADISRGO A,
                  CAARTSOL B
                  WHERE
                  A.REQART='".$caordcom->getRefsol()."' AND
                  A.CODART='".str_replace("'","",$result[$i]['codart'])."' AND
                  A.CODCAT='".str_replace("'","",$result[$i]['codcat'])."' AND
                  A.TIPDOC IN (SELECT TIPPRC FROM CPDOCPRC) AND
                  A.REQART=B.REQART AND
                  A.CODART=B.CODART AND
                  A.CODCAT = B.CODCAT";
            }
            if ((Herramientas::BuscarDatos($sql,$result2)) and ($caordcom->getRefsol()!=''))
            {
              $result2=array();
              $mitotal = $mitotal + str_replace("'","",$result[$i]['monrgo']) - ((str_replace("'","",$result2[$i]['monrgo']) / str_replace("'","",$result2[$i]['solicitada'])) * str_replace("'","",$result[$i]['comprada']));
            }
                  if (($mitotal>0) and ($caordcom->getRefsol()!=''))
                  {
                      $codigopresupuestario = str_replace("'","",$result[$i]['codpre']);
                      $fecha=substr($caordcom->getFecord(), 0, 4);
                      $sql = "Select mondis from CPAsiIni WHERE CodPre ='".$codigopresupuestario."' AND PERPRE = '00' and AnoPre='".$fecha."'";
                      $result3=array();
                      if (Herramientas::BuscarDatos($sql,$result3))
                      {
                        if ($mitotal>str_replace("'","",$result3[0]['mondis']))
                            $chequear_disponibilidad_incremento_recargo=false;
                        else
                            $total_ajuste = $total_ajuste + $mitotal;
                      }
                      else
                        $chequear_disponibilidad_incremento_recargo=false;
                  }
          $i++;
          }
      }
      return $chequear_disponibilidad_incremento_recargo;
  }

 }


  public static function Grabar_orden_compra($caordcom,$grid_detalle_orden_arreglos,$grid_detalle_recargo,$arreglo_objetos,$arreglo_campos,$moneda,$codigomoneda,$codigo_proveedor,$referencia,$codconpag,$codforent)
  {
    $prefijomixto=H::getConfApp('prefijomixto', 'compras', 'almordcom');
    $mancormext=H::getConfApp2('mancormext', 'compras', 'almordcom');
    $moneda1=$caordcom->getTipmon();      
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    $tiecorrel=false;
    if (Herramientas::getX_vacio('ordcom','caordcom','ordcom',$caordcom->getOrdcom())=='')
    {
        if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='M'))
              $tipord='corser';
        else if ($caordcom->getTipord()=='T')
            $tipord='corcont';
        else if ($caordcom->getTipord()=='G')
            $tipord='corsergen';
        else if ($caordcom->getTipord()=='A')
            $tipord='corordman';
        else
            $tipord='corcom';

        if ($mancormext=='S')
        {         
          if ($moneda1!=$moneda2)
          {
          	$tipord='corocmext';
          }
        }

	    if (Herramientas::getVerCorrelativo($tipord,'cacorrel',$r))
	    {
              if ($caordcom->getOrdcom()=='########')
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

                    if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='M'))
                    	$tipoorden='S';
                    else
                    	$tipoorden=$caordcom->getTipord();

                  if ($formatcont!='S')
                  {
                    $encontrado=false;
		            while (!$encontrado)
		            {
		              $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
		                  if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='M'))
		                  $numero='OS'.(substr($numero,2,strlen($numero)));
	                          else if ($caordcom->getTipord()=='T')
	                            $numero='CO'.(substr($numero,2,strlen($numero)));
	                          else if ($caordcom->getTipord()=='G')
	                            $numero='SG'.(substr($numero,2,strlen($numero)));
	                         else if ($caordcom->getTipord()=='A')
	                            $numero='OM'.(substr($numero,2,strlen($numero)));
		                  else
		                    $numero='OC'.(substr($numero,2,strlen($numero))); 
	                      if ($mancormext=='S' && $moneda1!=$moneda2) $numero='OE'.(substr($numero,2,strlen($numero)));

		                $sql="select ordcom from caordcom where ordcom='".$numero."' and tipord='".$tipoorden."'";
		                if (Herramientas::BuscarDatos($sql,$result))
		                {
		                  $r=$r+1;
		                }
		                else
		                {
		                  $encontrado=true;
		                }
		            }//while (!$encontrado)
                    $caordcom->setOrdcom(str_pad($r, 8, '0', STR_PAD_LEFT));
                    $tiecorrel=true;
                    //Herramientas::getSalvarCorrelativo($tipord,'cacorrel','cacorrel',$r,$msg);
                

                    if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='M') || ($caordcom->getTipord()=='T') || ($caordcom->getTipord()=='G') || ($caordcom->getTipord()=='A'))
                     {
                       if ($prefijomixto!="" && $caordcom->getTipord()=='M')
                          $caordcom->setOrdcom($prefijomixto.substr($caordcom->getOrdcom(), 2, 6));
                       else if ($caordcom->getTipord()=='T')
                          $caordcom->setOrdcom('CO'.substr($caordcom->getOrdcom(), 2, 6));
                       else if ($caordcom->getTipord()=='G')
                          $caordcom->setOrdcom('SG'.substr($caordcom->getOrdcom(), 2, 6));
                       else if ($caordcom->getTipord()=='A')
                          $caordcom->setOrdcom('OM'.substr($caordcom->getOrdcom(), 2, 6)); // Orden de Mantenimiento
                       else $caordcom->setOrdcom('OS'.substr($caordcom->getOrdcom(), 2, 6));
                     }
                     else
                     {
                       $caordcom->setOrdcom('OC'.substr($caordcom->getOrdcom(), 2, 6));
                     }
                     if ($mancormext=='S' && $moneda1!=$moneda2) $caordcom->setOrdcom('OE'.substr($caordcom->getOrdcom(), 2, 6));
                  }
                  else {
                      $fecc=$orden->getFecord();
				      $c = new Criteria();
				      $c->add(ContabaPeer::CODEMP,'001');
				      $per = ContabaPeer::doSelectOne($c);
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
					      if(!$clase){
					        $valido = true;
					      }else { $cor=$cor +1;}
				      	}
				      	$caordcom->setOrdcom($nroorden);

				      }elseif ($per->getCorcomp()=='MMAA####'){
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
					      if(!$clase){
					        $valido = true;
					      }else { $cor=$cor +1;}
				      	}
				      	$caordcom->setOrdcom($nroorden);

				      }else{
			            $encontrado=false;
			            while (!$encontrado)
			            {
			              $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
			                  if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='M'))
		                              $numero='OS'.(substr($numero,2,strlen($numero)));
		                          else if ($caordcom->getTipord()=='T')
		                              $numero='CO'.(substr($numero,2,strlen($numero)));
		                          else if ($caordcom->getTipord()=='G')
		                              $numero='SG'.(substr($numero,2,strlen($numero)));
		                          else if ($caordcom->getTipord()=='A')
		                              $numero='OM'.(substr($numero,2,strlen($numero)));
		                          else
		                              $numero='OC'.(substr($numero,2,strlen($numero)));

		                          if ($mancormext=='S' && $moneda1!=$moneda2) $numero='OE'.(substr($numero,2,strlen($numero)));
			                $sql="select ordcom from caordcom where ordcom='".$numero."' and tipord='".$tipoorden."'";
			                if (Herramientas::BuscarDatos($sql,$result))
			                {
			                  $r=$r+1;
			                }
			                else
			                {
			                  $encontrado=true;
			                }
			            }//while (!$encontrado)
		                $caordcom->setOrdcom(str_pad($r, 8, '0', STR_PAD_LEFT));
		                $tiecorrel=true;
		                //Herramientas::getSalvarCorrelativo($tipord,'cacorrel','cacorrel',$r,$msg);

		                if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='M') || ($caordcom->getTipord()=='T') || ($caordcom->getTipord()=='G') || ($caordcom->getTipord()=='A'))
		                {
		                   if ($prefijomixto!="" && $caordcom->getTipord()=='M')
		                      $caordcom->setOrdcom($prefijomixto.substr($caordcom->getOrdcom(), 2, 6));
		                   else if ($caordcom->getTipord()=='T')
		                      $caordcom->setOrdcom('CO'.substr($caordcom->getOrdcom(), 2, 6));
		                   else if ($caordcom->getTipord()=='G')
		                      $caordcom->setOrdcom('SG'.substr($caordcom->getOrdcom(), 2, 6));
		                   else if ($caordcom->getTipord()=='A')
		                      $caordcom->setOrdcom('OM'.substr($caordcom->getOrdcom(), 2, 6));				   
		                   else $caordcom->setOrdcom('OS'.substr($caordcom->getOrdcom(), 2, 6));
		                } else {
		                  $caordcom->setOrdcom('OC'.substr($caordcom->getOrdcom(), 2, 6)); 
		                }
                        if ($mancormext=='S' && $moneda1!=$moneda2) $caordcom->setOrdcom('OE'.substr($caordcom->getOrdcom(), 2, 6)); 
                     }
                  }
                }else
	              {
	                $caordcom->setOrdcom(str_replace('#','0',$caordcom->getOrdcom()));
	                $caordcom->setOrdcom(str_pad($caordcom->getOrdcom(), 8, '0', STR_PAD_LEFT));

    	            if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='M') || ($caordcom->getTipord()=='T') || ($caordcom->getTipord()=='G') || ($caordcom->getTipord()=='A'))
    			        {
	                     if ($prefijomixto!="" && $caordcom->getTipord()=='M')
	                        $caordcom->setOrdcom($prefijomixto.substr($caordcom->getOrdcom(), 2, 6));
	                     else if ($caordcom->getTipord()=='T')
	                        $caordcom->setOrdcom('CO'.substr($caordcom->getOrdcom(), 2, 6));
	                     else if ($caordcom->getTipord()=='G')
	                        $caordcom->setOrdcom('SG'.substr($caordcom->getOrdcom(), 2, 6));	
	                     else if ($caordcom->getTipord()=='A')
	                        $caordcom->setOrdcom('OM'.substr($caordcom->getOrdcom(), 2, 6));				 
	                     else $caordcom->setOrdcom('OS'.substr($caordcom->getOrdcom(), 2, 6));
	                }else {
			            $caordcom->setOrdcom('OC'.substr($caordcom->getOrdcom(), 2, 6)); 
			            }
                  if ($mancormext=='S' && $moneda1!=$moneda2) $caordcom->setOrdcom('OE'.substr($caordcom->getOrdcom(), 2, 6));
	             }
              }

              if (H::getX_vacio('ordcom', 'caordcom', 'ordcom', $caordcom->getOrdcom())!=''){
                return false;
              }else {
              	if ($tiecorrel)
              		Herramientas::getSalvarCorrelativo($tipord,'cacorrel','cacorrel',$r,$msg);
              }     
           

          // campos
            $total_detalle_orden=$arreglo_campos[0];
            $total_descuento=$arreglo_campos[1];
            $total_recargo=$arreglo_campos[2];
            //arreglos de arreglos
            $grid_detalle_orden_objetos=$grid_detalle_orden_arreglos;
            //arreglos de objetos
            $grid_detalle_resumen_objetos=$arreglo_objetos[0];
            $grid_detalle_entrega_objetos=$arreglo_objetos[1];

            if ($referencia==0) $moneda=$caordcom->getTipmon();
            else $moneda=Herramientas::getX('reqart','Casolart','Tipmon',$caordcom->getRefsol());
            $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
            if ($moneda2!=$moneda) {
                    if ($referencia==0) $valor=$caordcom->getValmon();
                    else $valor=Herramientas::getX('reqart','Casolart','Valmon',$caordcom->getRefsol());
            }else
                $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

            if ($caordcom->getOrdcom()!='')
            {
              $caordcom_new = new Caordcom();
              $caordcom_new->setOrdcom($caordcom->getOrdcom());
              $caordcom_new->setFecord($caordcom->getFecord());
              $caordcom_new->setCodpro($codigo_proveedor);
              $caordcom_new->setDesord($caordcom->getDesord());
              $caordcom_new->setMonord($caordcom->getMonord()*$valor);
              $caordcom_new->setDtoord($total_descuento);
              $caordcom_new->setStaord('A');
              $caordcom_new->setAfepre('N');
              $caordcom_new->setTipmon($codigomoneda);
              $caordcom_new->setValmon($valor);
              $caordcom_new->setTipord($caordcom->getTipord());
              $caordcom_new->setTipo($caordcom->getTipo());
              $caordcom_new->setCodemp($caordcom->getCodemp());
              $caordcom_new->setNotord($caordcom->getNotord());
              $caordcom_new->setTippro($caordcom->getTippro());
              $caordcom_new->setAfepro($caordcom->getRefprc());
              $caordcom_new->setDoccom($caordcom->getDoccom());
              $caordcom_new->setRefsol($caordcom->getRefsol());
              $caordcom_new->setTipfin($caordcom->getTipfin());
              $caordcom_new->setJustif($caordcom->getJustif());
              $caordcom_new->setRefprc($caordcom->getRefprc());
              $caordcom_new->setCoduni($caordcom->getCoduni());
              $caordcom_new->setCodmedcom($caordcom->getCodmedcom());
              $caordcom_new->setCodprocom($caordcom->getCodprocom());
              $caordcom_new->setNumproc($caordcom->getNumproc());
              $caordcom_new->setCodpai($caordcom->getCodpai());
              $caordcom_new->setCodedo($caordcom->getCodedo());
              $caordcom_new->setCodmun($caordcom->getCodmun());
              $caordcom_new->setAplart($caordcom->getAplart());
              $caordcom_new->setAplart6($caordcom->getAplart6());
              $caordcom_new->setUnimed($caordcom->getUnimed());

              $caordcom_new->setNumsigecof($caordcom->getNumsigecof());
              $caordcom_new->setFecsigecof($caordcom->getFecsigecof());
              $caordcom_new->setExpsigecof($caordcom->getExpsigecof());
              $caordcom_new->setCodcen($caordcom->getCodcen());
              $caordcom_new->setCodcenaco($caordcom->getCodcenaco());
              $caordcom_new->setForent($caordcom->getCodforent());
              $caordcom_new->setConpag($caordcom->getCodconpag());
              $loguse=sfContext::getInstance()->getUser()->getAttribute('loguse');
              $caordcom_new->setUsuroc($loguse);
              $caordcom_new->getMonord();
              $caordcom_new->setNumcon($caordcom->getNumcon());
              $caordcom_new->setCoddirec($caordcom->getCoddirec());
              $caordcom_new->setCoddivi($caordcom->getCoddivi());
              $caordcom_new->setCodeve($caordcom->getCodeve());
              $caordcom_new->setLugfec($caordcom->getLugfec());
              $caordcom_new->setDirent($caordcom->getDirent());
              $caordcom_new->setNumpro($caordcom->getNumpro());
              $caordcom_new->setPercon($caordcom->getPercon());
              $caordcom_new->setTelcon($caordcom->getTelcon());
              $caordcom_new->setFaxcon($caordcom->getFaxcon());
              $caordcom_new->setEmacon($caordcom->getEmacon());
              $caordcom_new->setCodgar($caordcom->getCodgar());
              $caordcom->getOrdcom();

              if ($caordcom->getManorddon()=='S')  // En Caso de una OC de Donación
              {
                  $caordcom_new->setTipocom($caordcom->getTipocom());
                  $caordcom_new->setCeddon($caordcom->getCeddon());
                  $caordcom_new->setNomdon($caordcom->getNomdon());
                  $caordcom_new->setFecdon($caordcom->getFecdon());
                  $caordcom_new->setSexdon($caordcom->getSexdon());
                  $caordcom_new->setEdadon($caordcom->getEdadon());
                  $caordcom_new->setSerdon($caordcom->getSerdon());
              }

              $caordcom_new->save();
              self::Grabar_detalles_orden_compra($caordcom,$grid_detalle_orden_objetos,$grid_detalle_recargo,$total_recargo,$referencia,$codconpag,$codforent);//grabo en el grid general de detalle de la orden
              self::grabarDistribucionRgo($caordcom,$grid_detalle_orden_arreglos,$referencia);
              self::grabarRecargo($caordcom);
              return true;
            }
            else
              return false;
    }
    else
    {
      $c= new Criteria();
      $c->add(CaordcomPeer::ORDCOM,$caordcom->getOrdcom());
      $caordcom_mod= CaordcomPeer::doSelectOne($c);
      if (count($caordcom_mod)>0)
      {
          $moddesord=H::getConfApp('moddesord', 'compras', 'almordcom');
          if ($moddesord=='S')
          {
              $t= new Criteria();
              $t->add(CpimpcauPeer::REFERE,$caordcom->getOrdcom());
              $registro= CpimpcauPeer::doSelect($t);
              if (!$registro)
              {
                 $caordcom_mod->setDesord($caordcom->getDesord());
              }
          }

      $modfecpro=H::getConfApp('modfecpro', 'compras', 'almordcom'); //Modifica la fecha y el proveedor
      if ($modfecpro=='S'){
        $caordcom_mod->setFecord($caordcom->getFecord());
        $caordcom_mod->setCodpro($codigo_proveedor);
      }

		  $caordcom_mod->setCodmedcom($caordcom->getCodmedcom());
		  $caordcom_mod->setCodprocom($caordcom->getCodprocom());
          $caordcom_mod->setNumproc($caordcom->getNumproc());
		  $caordcom_mod->setCodpai($caordcom->getCodpai());
		  $caordcom_mod->setCodedo($caordcom->getCodedo());
		  $caordcom_mod->setCodmun($caordcom->getCodmun());
		  $caordcom_mod->setAplart($caordcom->getAplart());
		  $caordcom_mod->setAplart6($caordcom->getAplart6());
		  $caordcom_mod->setNumsigecof($caordcom->getNumsigecof());
		  $caordcom_mod->setFecsigecof($caordcom->getFecsigecof());
		  $caordcom_mod->setExpsigecof($caordcom->getExpsigecof());
          $caordcom_mod->setCodcen($caordcom->getCodcen());
          $caordcom_mod->setCodcenaco($caordcom->getCodcenaco());
          $caordcom_mod->setDesord($caordcom->getDesord());
          $caordcom_mod->setNotord($caordcom->getNotord());
          $caordcom_mod->setUnimed($caordcom->getUnimed());
          $caordcom_mod->setNumcon($caordcom->getNumcon());
          $caordcom_mod->setCoddirec($caordcom->getCoddirec());
          $caordcom_mod->setCoddivi($caordcom->getCoddivi());
          $caordcom_mod->setCodeve($caordcom->getCodeve());
          $caordcom_mod->setLugfec($caordcom->getLugfec());
          $caordcom_mod->setDirent($caordcom->getDirent());
          $caordcom_mod->setNumpro($caordcom->getNumpro());
          $caordcom_mod->setPercon($caordcom->getPercon());
          $caordcom_mod->setTelcon($caordcom->getTelcon());
          $caordcom_mod->setFaxcon($caordcom->getFaxcon());
          $caordcom_mod->setEmacon($caordcom->getEmacon());
          $caordcom_mod->setCodgar($caordcom->getCodgar());

          if ($caordcom->getManorddon()=='S') // En Caso de una OC de Donación
          {
              $caordcom_mod->setTipocom($caordcom->getTipocom());
              $caordcom_mod->setCeddon($caordcom->getCeddon());
              $caordcom_mod->setNomdon($caordcom->getNomdon());
              $caordcom_mod->setFecdon($caordcom->getFecdon());
              $caordcom_mod->setSexdon($caordcom->getSexdon());
              $caordcom_mod->setEdadon($caordcom->getEdadon());
              $caordcom_mod->setSerdon($caordcom->getSerdon());
          }

        if ($caordcom_mod->getCompro()=='N') {
         $caordcom_mod->setMonord($caordcom->getMonord());
          $caordcom_mod->save();
        // campos
        $total_detalle_orden=$arreglo_campos[0];
        $total_descuento=$arreglo_campos[1];
        $total_recargo=$arreglo_campos[2];
        //arreglos de arreglos
        $grid_detalle_orden_objetos=$grid_detalle_orden_arreglos;
        //arreglos de objetos
        $grid_detalle_resumen_objetos=$arreglo_objetos[0];
        $grid_detalle_entrega_objetos=$arreglo_objetos[1];

        self::Grabar_detalles_orden_compra($caordcom,$grid_detalle_orden_objetos,$grid_detalle_recargo,$total_recargo,$referencia,$codconpag,$codforent);//grabo en el grid general de detalle de la orden
        self::grabarDistribucionRgo($caordcom,$grid_detalle_orden_arreglos,$referencia);
        self::grabarRecargo($caordcom);
        return true;
        }else  { 
        	$caordcom_mod->save(); 
        	return true;
        }

      }else return false;
    }

    return true;
  }

  public static function Grabar_recargos($caordcom,$grid_detalle_recargo)
  {
    $monto_total_recargo=0;
    if ($caordcom->getOrdcom()!='')
    {
        Herramientas::EliminarRegistro("Cargosol", "Reqart", $caordcom->getOrdcom());
        $i=0;
        if (count($grid_detalle_recargo)>0)
        {
            while ($i<count($grid_detalle_recargo))
            {
              if ($grid_detalle_recargo[$i]['codrgo']!='')
              {
                $cargosol_new = new Cargosol();
                $cargosol_new->setReqart($caordcom->getOrdcom());
                $cargosol_new->setCodrgo(str_replace("'","",$grid_detalle_recargo[$i]['codrgo']));
                $cargosol_new->setMonrgo(str_replace("'","",$grid_detalle_recargo[$i]['recargototal']));
                $cargosol_new->setTipdoc($caordcom->getDoccom());
                $cargosol_new->save();
              }
              $i++;
            }
              return true;
         }
    }
    else
    {
       return false;
    }
  }


  public static function Grabar_grid_entregas($caordcom,$grid_entregas)
  {
      $x=$grid_entregas[0];
      $j=0;
      while ($j<count($x)) {
      if ($x[$j]->getCodart()!="")
      {
        $x[$j]->setOrdcom($caordcom->getOrdcom());
        $x[$j]->save();
      }
        $j++;
      }
      $z=$grid_entregas[1];
      $j=0;
      if (!empty($z[$j])) {
        while ($j<count($z)) {
          $z[$j]->delete();
          $j++;
        }

      }
  }

  public static function Grabar_grid_resumen($caordcom,$grid_resumen)
  {
      $x=$grid_resumen[0];
      $j=0;
      while ($j<count($x)) {
      if ($x[$j]->getCodart()!="")
      {
        $x[$j]->setOrdcom($caordcom->getOrdcom());                
        $x[$j]->save();
      }
        $j++;
      }
      $z=$grid_resumen[1];
      $j=0;
      if (!empty($z[$j])) {
        while ($j<count($z)) {
          $z[$j]->delete();
          $j++;
        }

      }
    }

      public static function Grabar_grid_resumen2($caordcom,$grid_resumen,$referencia)
  {
      //if ($caordcom->getId()){
    		Herramientas::EliminarRegistro("Caresordcom", "Ordcom", $caordcom->getOrdcom());
    	//}

      
       if ($referencia==0) $moneda=$caordcom->getTipmon();
      else $moneda=Herramientas::getX('reqart','Casolart','Tipmon',$caordcom->getRefsol());
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      if ($moneda2!=$moneda) {
              if ($referencia==0) $valor=$caordcom->getValmon();
              else $valor=Herramientas::getX('reqart','Casolart','Valmon',$caordcom->getRefsol());
      }else
          $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

      $i=0;
      while ($i<count($grid_resumen)) {
      if ($grid_resumen[$i]['codart']!="")
      {
        $caresordcom_new = new Caresordcom();
        $caresordcom_new->setOrdcom($caordcom->getOrdcom());
        $caresordcom_new->setCodart(str_replace("'","",$grid_resumen[$i]['codart']));
        $caresordcom_new->setDesres($grid_resumen[$i]['desres']);
        $caresordcom_new->setCodartpro(str_replace("'","",$grid_resumen[$i]['codartpro']));
        $caresordcom_new->setCanord(str_replace("'","",$grid_resumen[$i]['canord']));
        $caresordcom_new->setCanaju(str_replace("'","",$grid_resumen[$i]['canaju']));
        $caresordcom_new->setCanrec(str_replace("'","",$grid_resumen[$i]['canrec']));
        $caresordcom_new->setCantot(str_replace("'","",$grid_resumen[$i]['cantot']));
        $caresordcom_new->setCosto(H::toFloat($grid_resumen[$i]['costo'],6)*$valor);
        $caresordcom_new->setRgoart(H::toFloat($grid_resumen[$i]['rgoart'],4)*$valor);
        $caresordcom_new->setTotart(H::toFloat($grid_resumen[$i]['totart'],6)*$valor);
        $caresordcom_new->save();
      }
        $i++;
      }
    }

      public static function Grabar_grid_entregas2($caordcom,$grid_entregas)
  {
      //if ($caordcom->getId()){
    		Herramientas::EliminarRegistro("Caartfec", "Ordcom", $caordcom->getOrdcom());
    	//}

      $i=0;
      while ($i<count($grid_entregas)) {
      if ($grid_entregas[$i]['codart']!="")
      {
        $caartfec_new = new Caartfec();
        $caartfec_new->setOrdcom($caordcom->getOrdcom());
        $caartfec_new->setCodart(str_replace("'","",$grid_entregas[$i]['codart']));
        $caartfec_new->setDesart($grid_entregas[$i]['desart']);
        $caartfec_new->setCanart(str_replace("'","",$grid_entregas[$i]['canart']));
        $caartfec_new->setFecent(str_replace("'","",$grid_entregas[$i]['fecent']));        
        $caartfec_new->save();
      }
        $i++;
      }
  }


  public static function Grabar_detalles_orden_compra($caordcom,$grid_detalle,$grid_detalle_recargo,$total_recargo,$referencia,$codconpag,$codforent)
  {
    if ($referencia==0)
    {
        $campo_col5='canord';//tabla Caartord
        $campo_col6='canaju';//tabla Caartord
        $campo_col8='cantot';//tabla Caartord
        $campo_col9='preart';//tabla Caartord
        $campo_col10='dtoart';//tabla Caartord
        $campo_col11='rgoart';//tabla Caartord
        $campo_col12='totart';//tabla Caartord
        $campo_col13='unimed';//tabla Caartord
    }
    elseif ($referencia==1)
    {
        $campo_col5='canord2';//tabla Caartsol
        $campo_col6='canaju';//tabla Caartsol
        $campo_col8='canreq';//tabla Caartsol
        $campo_col9='costo';//tabla Caartsol
        $campo_col10='mondes';//tabla Caartsol
        $campo_col11='monrgo';//tabla Caartsol
        $campo_col12='montot';//tabla Caartsol
        $campo_col13='unimed';//tabla Caartsol
    }

     if ($referencia==0) $moneda=$caordcom->getTipmon();
    else $moneda=Herramientas::getX('reqart','Casolart','Tipmon',$caordcom->getRefsol());
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda) {
            if ($referencia==0) $valor=$caordcom->getValmon();
            else $valor=Herramientas::getX('reqart','Casolart','Valmon',$caordcom->getRefsol());
    }else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);

    if (count($grid_detalle)>0)
    {
    	if ($caordcom->getId()){
    		Herramientas::EliminarRegistro("Caartord", "Ordcom", $caordcom->getOrdcom());
    	}
      $i=0;
      $a=0;
        while ($i<count($grid_detalle))
        {
          if (H::toFloat($grid_detalle[$i][$campo_col5])>0) {
          if (count($grid_detalle_recargo)>0)
            $codrgo=str_replace("'","",$grid_detalle_recargo[$a]['codrgo']);
          else
            $codrgo=0;

          $vacio='';
          $caartord_new = new Caartord();
          $caartord_new->setOrdcom($caordcom->getOrdcom());
          $caartord_new->setCodart(str_replace("'","",$grid_detalle[$i]['codart']));
          $caartord_new->setCodcat(str_replace("'","",$grid_detalle[$i]['codcat']));
          $caartord_new->setCanord(str_replace("'","",$grid_detalle[$i][$campo_col5]));
          $caartord_new->setCanaju(str_replace("'","",$grid_detalle[$i][$campo_col6]));
          $caartord_new->setCanrec(str_replace("'","",$grid_detalle[$i]['canrec']));
          $caartord_new->setCantot(str_replace("'","",$grid_detalle[$i][$campo_col8]));
          $caartord_new->setPreart(H::toFloat(str_replace("'","",$grid_detalle[$i][$campo_col9]),6)*H::toFloat($valor,6));
          $result=array();
          $actcosart=H::getConfApp2('actcosart', 'compras', 'almordcom');
        if ($actcosart=='S')
        {
          $c = new Criteria();
          $c->add(CaregartPeer::CODART,$grid_detalle[$i]['codart']);
          $arti = CaregartPeer::doSelectOne($c);
          if ($arti)
          {
             $k= new Criteria();                                     
             $k->add(CaunialartPeer::CODART,$grid_detalle[$i]['codart']);
             $k->add(CaunialartPeer::UNIALT,$grid_detalle[$i]['unimed']);
             $result3= CaunialartPeer::doSelectOne($k);
             if ($result3){

              $precio=H::toFloat(str_replace("'","",$grid_detalle[$i][$campo_col9]))*H::toFloat($valor,6)/H::toFloat($result3->getRelart());
              if ($arti->getCosult()<$precio)
              {
                  $arti->setCosult($precio);
                  $arti->save();
              }
            }else {
              $precio=H::toFloat(str_replace("'","",$grid_detalle[$i][$campo_col9]))*H::toFloat($valor,6);
              if ($arti->getCosult()<$precio)
              {
                  $arti->setCosult($precio);
                  $arti->save();
              }
            }
           }
        }else {

          $sql = "select preart from caregart where codart='".str_replace("'","",$grid_detalle[$i]['codart'])."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            if (Herramientas::toFloat($result[0]['preart'])!=(Herramientas::toFloat(str_replace("'","",$grid_detalle[$i][$campo_col9])))*H::toFloat($valor,6))
            {
                $precio=H::toFloat(str_replace("'","",$grid_detalle[$i][$campo_col9]))*H::toFloat($valor,6);
                  $sql="Update Caregart set cosult='".$precio."' where codart='".str_replace("'","",$grid_detalle[$i]['codart'])."'";
                  Herramientas::insertarRegistros($sql);
            }
          }
        }
          $caartord_new->setDtoart(str_replace("'","",$grid_detalle[$i][$campo_col10]));
          $caartord_new->setRgoart(H::toFloat(str_replace("'","",$grid_detalle[$i][$campo_col11]),4)*H::toFloat($valor,6));
          $caartord_new->setCodrgo($codrgo);
          $caartord_new->setTotart(H::toFloat(str_replace("'","",$grid_detalle[$i][$campo_col12]),6)*H::toFloat($valor,6));
          $caartord_new->setDesart(str_replace("'","",$grid_detalle[$i]['desart']));
          $caartord_new->setUnimed(str_replace("'","",$grid_detalle[$i][$campo_col13]));
          $caartord_new->setCodpar($grid_detalle[$i]['codpar']);
          $caartord_new->setCodcen($grid_detalle[$i]['codcen']);
          $caartord_new->setCodunimed($grid_detalle[$i]['codunimed']);
          $caartord_new->setPartida($vacio);
          $caartord_new->setReqart($caordcom->getRefsol());
          $caartord_new->save();
          $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
          if ($caordcom->getRefprc()=='S')
          {
            $c= new Criteria();
                $c->add(CaartsolPeer::REQART,$caordcom->getRefsol());
                $c->add(CaartsolPeer::CODART,$grid_detalle[$i]['codart']);
                if ($claartdes=='S') $c->add(CaartsolPeer::DESART,trim($grid_detalle[$i]['desart']));
                $c->add(CaartsolPeer::CODCAT,$grid_detalle[$i]['codcat']);
                $caartsol2 = CaartsolPeer::doSelectOne($c);
            if (count($caartsol2)>0)
            {
              $suma=$caartsol2->getCanord()+$grid_detalle[$i][$campo_col5];
              $caartsol2->setCanord($suma);
              $caartsol2->save();
            }
        }
        
        //Se actualiza la ultima fecha de compra del articulos
        $q= new Criteria();
        $q->add(CaregartPeer::CODART,$grid_detalle[$i]['codart']);
        $regs= CaregartPeer::doSelectOne($q);
        if ($regs)
        {
            $regs->setFecult($caordcom->getFecord());
            $regs->save();
        }
        }

        $i++;
    }
      if ($codconpag!='')
      {
          Herramientas::EliminarRegistro("Caordconpag", "Ordcom", $caordcom->getOrdcom());
          $caordconpag_new = new Caordconpag();
              $caordconpag_new->setOrdcom($caordcom->getOrdcom());
              $caordconpag_new->setCodconpag($codconpag);
              $caordconpag_new->save();

      }

      if ($codforent!='')
      {
          Herramientas::EliminarRegistro("Caordforent", "Ordcom", $caordcom->getOrdcom());
          $caordforent_new = new Caordforent();
              $caordforent_new->setOrdcom($caordcom->getOrdcom());
              $caordforent_new->setCodforent($codforent);
              $caordforent_new->save();
      }
      return true;
    }
    else
      return false;
  }

  public static function chequear_disponibilidad_incremento($caordcom,$grid_detalle,$f,$referencia,$tiporec,$tasacambio,$monedasol)
  {
    $mitotal=0;
    $i=0;
    $chequear_disponibilidad_incremento=false;
    if ($referencia==0) // para saber de que tabla me lo estoy trayendo
    {
      $campo11='rgoart';//tabla Caartord
      $campo10='dtoart';//tabla Caartord
    }
    else
    {
      $campo11='monrgo';//tabla Caartsol
      $campo10='mondes';//tabla Caartord
    }

        while ($i<count($grid_detalle))
        {
          if (self::obtener_codigo_presupuestario($caordcom,$grid_detalle,$f,$obtenercodigopresupuestario))
            $codigo_fila_presupuestario = $obtenercodigopresupuestario;
          else
            $codigo_fila_presupuestario='';
          if (self::obtener_codigo_presupuestario($caordcom,$grid_detalle,$i,$obtenercodigopresupuestario))
            $codigo_presupuestario = $obtenercodigopresupuestario;
          else
            $codigo_presupuestario ='';

          if ($codigo_fila_presupuestario == $codigo_presupuestario)// quede aquiiiiiii
          {
            if ($tiporec=='C')
              $mitotal=($grid_detalle[$i][$campo11]-$grid_detalle[$i][$campo10])-((($grid_detalle[$i][$campo11]-$grid_detalle[$i][$campo10])/$tasacambio)*$monedasol);
            else
              $mitotal=((($grid_detalle[$i][$campo11]-$grid_detalle[$i][$campo10])/$tasacambio)*$monedasol);
          }
          $i++;
        }
        if ($codigo_fila_presupuestario<>'')
        {
          $mondis=Herramientas::Monto_disponible($codigo_fila_presupuestario);
          if ($mitotal>$mondis)
            $chequear_disponibilidad_incremento=false;
          else
            $chequear_disponibilidad_incremento=true;
        }
        else
          $chequear_disponibilidad_incremento=false;
    return $chequear_disponibilidad_incremento;
    }


  public static function Obtener_codigo_presupuestario($caordcom,$grid,$i,&$obtenercodigopresupuestario)
  {
    $arreglo=$grid;
    $result=array();
    $sql= "Select codpar From caregart Where codart = '".$arreglo[$i]['codart']."'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
        $partida = $result[0]['codpar'];
        $codigopresupuestario=str_replace("'","",$arreglo[$i]['codcat']).'-'.$partida;
        $sql1 = "Select * From CpDefTit Where Rtrim(CodPre) ='".$codigopresupuestario."'";
        if (Herramientas::BuscarDatos($sql1,$result))
        {
             $obtenercodigopresupuestario = $codigopresupuestario;
             $encontrado=true;
        }
        else
        {
         $obtenercodigopresupuestario='';
         $encontrado=false;
        }
    }
    else
    {
      $obtenercodigopresupuestario='';
      $encontrado=false;
    }
    return $encontrado;
  }

  public static function Obtener_codigo_presupuestario_v2($codart,$codcat)
  {
    $obtenercodigopresupuestario = '';
    $result=array();
    $sql= "Select codpar From caregart Where codart = '".$codart."'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
          $partida = $result[0]['codpar'];
        $codigopresupuestario=str_replace("'","",$codcat).'-'.$partida;
          $sql1 = "Select * From CpDefTit Where Rtrim(CodPre) ='".$codigopresupuestario."'";
        if (Herramientas::BuscarDatos($sql1,$result))
        {
             $obtenercodigopresupuestario = $codigopresupuestario;
             $encontrado=true;
        }
        else
        {
         $obtenercodigopresupuestario='';
         $encontrado=false;
        }
     }
     else
     {
        $obtenercodigopresupuestario='';
        $encontrado=false;
     }
     return $obtenercodigopresupuestario;
  }

  public static function Obtener_formatocategoria(&$formatocategoria,&$tiporec,&$manejacompra,&$manejaservicio)
  {
    $manejaservicio=false;
    $manejacompra=false;
    $formatocategoria=Herramientas::getObtener_FormatoCategoria();
      $c= new Criteria();
      $cadefart2 = CadefartPeer::doSelectOne($c);
      if (count($cadefart2)>0)
      {
          $tiporec=$cadefart2->getAsiparrec();
          if ($cadefart2->getOrdcom()<>0)  $manejacompra=true;
          if ($cadefart2->getOrdser()<>0)  $manejaservicio=true;
      }
  }



  public static function definir_tasa_cambio($caordcom,$moneda,&$tasacambio,&$combo1_text,&$multiplicar_grid_por_tasacambio,&$monedasol,&$tip_fin)//Combo1_LostFocus()
  {
    $result=array();
    $multiplicar_grid_por_tasacambio=false;
    $combo1_text='';
    $tasacambio='';
    //Buscamos la Tasa de Cambio con que fue hecha la Solicitud de Egreso Y EL TIPO DE FINANCIAMIENTO
    $sql = "Select valmon,tipfin from CASolArt where ReqArt='".$caordcom->getRefsol()."'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
      $monedasol = $result[0]['valmon'];
      $tip_fin = $result[0]['tipfin'];
    }
    $sql='';
    $result='';
    $result=array();
    $sql = "Select tipmon from casolart where reqart='".$caordcom->getRefsol()."'";
    if (Herramientas::BuscarDatos($sql,$result))
        $combo1_text = $result[0]['tipmon'];
    if ($combo1_text<>$caordcom->getTipmon())
    {
        if ($monedasol<>$moneda)
        {
            if ($tasacambio<>'')
            {
              if ($tasacambio>$monedasol)
                 $multiplicar_grid_por_tasacambio=true;
              else
                 $tasacambio = $monedasol;
            }
            else
              $tasacambio = $monedasol;
        }
        else
         $tasacambio = $monedasol;
    }
    else
      $tasacambio = $monedasol;
    $sql='';
    $result='';
    return $multiplicar_grid_por_tasacambio;
  }



  public static function obtener_moneda($caordcom,&$moneda,&$posneg,&$codigomoneda)//Combo1_LostFocus()
  {
    $result=array();
    $sql = "Select a.valmon as valmon,b.aumdis as aumdis,b.codmon as codmon from TSDesMon a, tsdefmon b where a.codmon=b.codmon and b.codmon='".$caordcom->getTipmon()."' and FecMon=TO_DATE('".$caordcom->getFecord()."','DD/MM/YYYY')";
    if (Herramientas::BuscarDatos($sql,$result))
    {
        $moneda = $result[0]['valmon'];
        $posneg = $result[0]['aumdis'];
        $codigomoneda = $result[0]['codmon'];
    }
    else
    {
      $sql = "Select a.valmon as valmon,b.aumdis as aumdis,b.codmon as codmon from TSDesMon a, tsdefmon b where a.codmon=b.codmon and b.codmon='".$caordcom->getTipmon()."'ORDER BY FECMON DESC";
      if (Herramientas::BuscarDatos($sql,$result))
      {
        $moneda = $result[0]['valmon'];
        $posneg = $result[0]['aumdis'];
        $codigomoneda = $result[0]['codmon'];
      }
      else
      {
        $moneda = 0;
        $posneg = "D";
        $codigomoneda = "";
      }
    }
    $sql='';
    $result='';
  }


//<!-----------------------------------Funciones de  Eliminar------------------------------------------------------------>
  public static function Eliminar($caordcom,&$coderror)
  {
    $coderror=-1;
    $refiereprecom = '';
    $seguir='';
    $afectacompro = '';
    $afectadis = '';
    $genctaord='';
    $numerocomprobante='';
    $result=array();
    
    


    $sql = "Select staord from caordcom Where ordcom='".$caordcom->getOrdcom()."' and staord='A'";
    if (Herramientas::BuscarDatos($sql,$result))
    {
        $result=array();
        $sql = "Select refprc,afecom,afedis From CpDocCom Where TipCom='".$caordcom->getDoccom()."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
            $refiereprecom = $result[0]['refprc'];
            $afectacompro = $result[0]['afecom'];
            $afectadis = $result[0]['afedis'];
        }
        if ($afectacompro=='S' ){
          $fecha=date('d/m/Y',strtotime($caordcom->getFecord()));
          if (!Herramientas::validarPeriodoPresuesto($fecha))
          {
            $coderror=142;
            return false;
          }
        }
        
        if (!self::Hay_ajuste($caordcom))
        {
          if (!self::Hay_ajuste_orden($caordcom))
          {
            if (!self::Hay_recepcion($caordcom))
            {
              if ($afectacompro=='S')
              {
                if (!self::Se_elimina_compromiso($caordcom))
                {
                    $coderror=171;
                    return false;
                }
              }
              if ($seguir!='N')
              {
                  $result=array();
                  $sql = "Select genctaord From opdefemp";
                  if (Herramientas::BuscarDatos($sql,$result))
                  {
                      $genctaord = $result[0]['genctaord'];
                    if ($caordcom->getTipord()=='C')
                      $numerocomprobante='OC'.substr($caordcom->getOrdcom(), 2, 6);
                    elseif   ($caordcom->getTipord()=='S')
                      $numerocomprobante='OS'.substr($caordcom->getOrdcom(), 2, 6);
                    elseif ($caordcom->getTipord()=='T')
                      $numerocomprobante='CO'.substr($caordcom->getOrdcom(), 2, 6);
                    else
                      $numerocomprobante='OC'.substr($caordcom->getOrdcom(), 2, 6);

                    if (self::Verificar_status_comprobante($numerocomprobante))
                    {
                      Herramientas::EliminarRegistro("Contabc1", "Numcom", $numerocomprobante);
                      Herramientas::EliminarRegistro("Contabc", "Numcom", $numerocomprobante);
                    }
                  }


                  Herramientas::EliminarRegistro("Caresordcom", "Ordcom", $caordcom->getOrdcom());
                  Herramientas::EliminarRegistro("Caordconpag", "Ordcom", $caordcom->getOrdcom());
                  Herramientas::EliminarRegistro("Caordforent", "Ordcom", $caordcom->getOrdcom());

                  $c= new Criteria();
                  $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
                  $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
                  $cadisrgo_del = CadisrgoPeer::doSelect($c);
                  foreach ($cadisrgo_del as $arreglo)
                  {
                    $arreglo->delete();
                  }

                  Herramientas::EliminarRegistro("Caartfec", "Ordcom", $caordcom->getOrdcom());

                  if ($afectacompro=='S')
                    self::Eliminar_compromiso($caordcom);
                  self::Eliminar_recargos($caordcom);
                  //Actualizamos la Solicitud de Egresos
                  $i=0;
                  if ($caordcom->getRefsol()!='')
                  {
                      $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
                    $sql="SELECT codart,codcat,canord, desart FROM Caartord WHERE ordcom='".$caordcom->getOrdcom()."'";
                    $result=array();
                    if (Herramientas::BuscarDatos($sql,$result))
                    {
                      $i=0;
                      while ($i<count($result))
                      {
                        if (str_replace("'","",$result[$i]['codart'])!='')
                        {
                        $sql1="SELECT canord FROM Caartsol WHERE reqart='".$caordcom->getRefsol()."' and codart='".$result[$i]['codart']."' and codcat='".$result[$i]['codcat']."'";
                        $result1=array();
                        if (Herramientas::BuscarDatos($sql1,$result1))
                        {
                          if ($claartdes=='S')
                          {
                              if (($result1[0]['canord']-$result[$i]['canord'])>0)
                              $sql2="Update Caartsol set canord=canord-".$result[$i][canord]." where reqart='".$caordcom->getRefsol()."' and codart='".$result[$i]['codart']."' and desart='".$result[$i]['desart']."' and codcat='".$result[$i]['codcat']."'";
                            else
                              $sql2="Update Caartsol set canord=0 where reqart='".$caordcom->getRefsol()."' and codart='".$result[$i]['codart']."' and desart='".$result[$i]['desart']."' and codcat='".$result[$i]['codcat']."'";
                          }else {
                            if (($result1[0]['canord']-$result[$i]['canord'])>0)
                              $sql2="Update Caartsol set canord=canord-".$result[$i][canord]." where reqart='".$caordcom->getRefsol()."' and codart='".$result[$i]['codart']."' and codcat='".$result[$i]['codcat']."'";
                            else
                              $sql2="Update Caartsol set canord=0 where reqart='".$caordcom->getRefsol()."' and codart='".$result[$i]['codart']."' and codcat='".$result[$i]['codcat']."'";
                          }
                            Herramientas::insertarRegistros($sql2);
                        }
                          }
                          $i++;
                        }
                      }
                  }
                  Herramientas::EliminarRegistro("Caartord", "Ordcom", $caordcom->getOrdcom());
                  Herramientas::EliminarRegistro("Caordcom", "Ordcom", $caordcom->getOrdcom());

              }
              }
              else
              {
                  $coderror=173;
                return false;
              }
            }
          else
          {
                  $coderror=172;
                return false;
          }
          }
          else
          {
                $coderror=172;
              return false;
          }
    }
    else
    {
      $coderror=170;
      return false;
    }
  }


  public static function Hay_recepcion($caordcom)
  {
     $j=0;
     $sql="SELECT canrec FROM Caartord WHERE ordcom='".$caordcom->getOrdcom()."'";

     $result=array();
      if (Herramientas::BuscarDatos($sql,$result))
      {
        while ($j<count($result))
        {
          if (str_replace("'","",$result[$j]['canrec'])>0)
          {
              return true;
              break;
          }
          $j++;
        }
      }
     return false;
  }


  public static function Verificar_status_comprobante($comprobante)
  {
    $sql="Select stacom From Contabc Where numcom = '".$comprobante."'";
    $result=array();
    if (Herramientas::BuscarDatos($sql,$result))
    {
      if ($result[0]['stacom']!='A')
         return true;
        else
         return false;
    }
    else
      return false;
  }


  public static function Hay_ajuste_orden($caordcom)
  {
    $sql="Select * From CaAjuOC Where Rtrim(OrdCom) = '".$caordcom->getOrdcom()."'";
    $result=array();
    if (Herramientas::BuscarDatos($sql,$result))
      return true;
    else
      return false;
  }


  public static function Hay_ajuste($caordcom)
  {
    $sql="Select A.* From Cpajuste a, Cpdocaju b where a.tipaju=b.tipaju and a.refere = '".$caordcom->getOrdcom()."' and a.staaju='A' and b.refier='C'";
     $result=array();
     if (Herramientas::BuscarDatos($sql,$result))
        return true;
     else
        return false;
  }



  public static function Eliminar_compromiso($caordcom)
  {
    $c= new Criteria();
        $c->add(CpcomproPeer::REFCOM,$caordcom->getOrdcom());
        $cpcompro_del = CpcomproPeer::doSelectOne($c);
          if (count($cpcompro_del)>0)
          {
            Herramientas::EliminarRegistro("Cpimpcom", "Refcom", $caordcom->getOrdcom());
            Herramientas::EliminarRegistro("Cpcompro", "Refcom", $caordcom->getOrdcom());
            $t = new Criteria();
		    $t->add(CpdisevePeer::REFDOC,$caordcom->getOrdcom());
		    $t->add(CpdisevePeer::TIPMOV ,'COM');
		    $cpdiseven = CpdisevePeer::doSelect($t);
		    if ($cpdiseven) {
		      foreach ($cpdiseven as $objeve) {
		        $objeve->delete();
		      }
		    }
            return true;
          }
          return false;
  }

  public static function Se_elimina_compromiso($caordcom)
  {
    $c= new Criteria();
    $c->add(CpimpcauPeer::REFERE,$caordcom->getOrdcom());
    $cpimpcau = CpimpcauPeer::doSelect($c);
    if (count($cpimpcau)>0)
    {
      return false;
    }
    else
      return true;
   }


  public static function Eliminar_recargos($caordcom)
  {
    $c= new Criteria();
        $c->add(CargosolPeer::REQART,$caordcom->getOrdcom());
        $c->add(CargosolPeer::TIPDOC,$caordcom->getDoccom());
        //$cargosol_del = CargosolPeer::doDelete($c);
        $cargosol_del = CargosolPeer::doSelect($c);
        foreach ($cargosol_del as $arreglo)
        {
          $arreglo->delete();
        }

        $c= new Criteria();
        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
        $cadisrgo_del = CadisrgoPeer::doSelect($c);
        foreach ($cadisrgo_del as $arreglo)
        {
          $arreglo->delete();
        }
    if (Herramientas::getX_vacio('reqart','Cadisrgo','reqart',$caordcom->getOrdcom())=='')  return true;
    return false;
  }

  public static function Validar_fecha_egreso($fecord,$reqart)
  {
     $result=array();
    $sql="Select fecreq from Casolart where reqart='".$reqart."'";
     if (Herramientas::BuscarDatos($sql,$result))
     {
        if ($result[0]['fecreq']<=$fecord)
          return true;
        else
          return false;
     }
     return false;
  }

  public static function grabarDistribucionRgo($caordcom,$grid_detalle_orden_arreglos,$referencia)
  {

  $arreglo_grid=$grid_detalle_orden_arreglos;
       if ($referencia==0) $moneda=$caordcom->getTipmon();
    else $moneda=Herramientas::getX('reqart','Casolart','Tipmon',$caordcom->getRefsol());
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda) {
            if ($referencia==0) $valor=$caordcom->getValmon();
            else $valor=Herramientas::getX('reqart','Casolart','Valmon',$caordcom->getRefsol());
    }else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
      $t= new Criteria();
      $t->add(CpdoccomPeer::TIPCOM,$caordcom->getDoccom());
      $reg= CpdoccomPeer::doSelectOne($t);
      if ($reg)
      {
      	$refprc=$reg->getRefprc();
      	$afeprc=$reg->getAfeprc();
      	$afecom=$reg->getAfecom();
      	$afedis=$reg->getAfedis();
      }else {
      	$refprc="";
      	$afeprc="";
      	$afecom="";
      	$afedis="";
      }

  $j=0;
  $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
  while ($j<count($arreglo_grid))
  {
   $marcado=$arreglo_grid[$j]["check"];
   $unidad=$arreglo_grid[$j]["codcat"];
   if ($caordcom->getRefsol()!="" && $caordcom->getId()=="")
   $codpresu=$arreglo_grid[$j]["codigopre"];
   else $codpresu=$arreglo_grid[$j]["codpre"];
   if ($marcado=="1")
   {
    if ($caordcom->getRefsol()!="" && $caordcom->getId()=="")
    //si la orden de compra refiere a Solicitud de egreso, los recargos son iguales a los de la solicitud,
    //de lo contrario si es orden de compra directa los recargos son los que el usuario haya introducido
    {
    	
	    /*$tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
	    $c= new Criteria();
	    $c->add(CadisrgoPeer::REQART,$caordcom->getRefsol());
	    $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
            if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,trim($arreglo_grid[$j]["desart"]));
	    $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
	    $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
	    $recargos= CadisrgoPeer::doSelect($c);
         foreach ($recargos as $cadisrgo_ordcom)
         {
           $distribucion = new Cadisrgo();
        $distribucion->setReqart($caordcom->getOrdcom());
        $distribucion->setCodart(str_replace("'","",$arreglo_grid[$j]["codart"]));
        $distribucion->setDesart(str_replace("'","",$arreglo_grid[$j]["desart"]));
        $distribucion->setCodcat(str_replace("'","",$arreglo_grid[$j]["codcat"]));
        $distribucion->setCodrgo($cadisrgo_ordcom->getCodrgo());
           $distribucion->setCodpre($cadisrgo_ordcom->getCodpre());
               $distribucion->setMonrgo(H::toFloat($cadisrgo_ordcom->getMonrgo())*H::toFloat($valor));
           $distribucion->setTipdoc($caordcom->getDoccom());
           $distribucion->save();
         }*/
    	

         //if ($refprc=='N' && $afeprc=='S' && $afecom=='S' && $afedis=='R')
         //{
         	 if ($arreglo_grid[$j]["datosrecargo"]!='')
		     {
		    $cadenarec=split('!',$arreglo_grid[$j]["datosrecargo"]);
	              $c= new Criteria();
		        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
		        $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
                        if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,trim($arreglo_grid[$j]["desart"]));
		        $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
		        //$c->add(CadisrgoPeer::CODRGO,$aux2[0]);
		        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
		        CadisrgoPeer::doDelete($c);
		        $r=0;
		        while ($r<(count($cadenarec)-1))
		        {
		          $aux=$cadenarec[$r];
		          $aux2=split('_',$aux);
		          if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
		          {
		            $distribucion = new Cadisrgo();
		          $distribucion->setReqart($caordcom->getOrdcom());
		          $distribucion->setCodart(str_replace("'","",$arreglo_grid[$j]["codart"]));
                          $distribucion->setDesart(str_replace("'","",$arreglo_grid[$j]["desart"]));
		          $distribucion->setCodcat(str_replace("'","",$arreglo_grid[$j]["codcat"]));
		          $distribucion->setCodrgo($aux2[0]);

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
		            $distribucion->setCodpre($presupuesto->getCodpre());
		            }
		            else
		            {
		            $codigo= $unidad.'-'.$presupuesto->getCodpre();
		            $distribucion->setCodpre($codigo);
		            }
		            }
		          }
		          else
		          {
		            $distribucion->setCodpre($codpresu);
		          }
		          }
		          $montorecargo= Herramientas::toFloat($aux2[4],4);
		          $distribucion->setMonrgo($montorecargo*H::toFloat($valor,6));
		          $distribucion->setTipdoc($caordcom->getDoccom());
              $distribucion->setRefsol($caordcom->getRefsol());
		          $distribucion->save();
		          }
		          $r++;
		        }//while
		     }//if ($x[$j]->getDatosrecargo()!="")
         //}
    }
    else//if ($caordcom->getRefsol()!="")
    {
     if ($arreglo_grid[$j]["datosrecargo"]!='')
     {
    $cadenarec=split('!',$arreglo_grid[$j]["datosrecargo"]);
        $c= new Criteria();
        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
        $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
        if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,trim($arreglo_grid[$j]["desart"]));
        $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
        //$c->add(CadisrgoPeer::CODRGO,$aux2[0]);
        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
        CadisrgoPeer::doDelete($c);
        $r=0;
        while ($r<(count($cadenarec)-1))
        {
          $aux=$cadenarec[$r];
          $aux2=split('_',$aux);
          if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
          {
            $distribucion = new Cadisrgo();
          $distribucion->setReqart($caordcom->getOrdcom());
          $distribucion->setCodart(str_replace("'","",$arreglo_grid[$j]["codart"]));
          $distribucion->setDesart(str_replace("'","",$arreglo_grid[$j]["desart"]));
          $distribucion->setCodcat(str_replace("'","",$arreglo_grid[$j]["codcat"]));
          $distribucion->setCodrgo($aux2[0]);
          

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
            $distribucion->setCodpre($presupuesto->getCodpre());
            }
            else
            {
            $codigo= $unidad.'-'.$presupuesto->getCodpre();
            $distribucion->setCodpre($codigo);
            }
            }
          }
          else
          {
            $distribucion->setCodpre($codpresu);
          }
          }
          $montorecargo= Herramientas::toFloat($aux2[4],4);
          $distribucion->setMonrgo($montorecargo*H::toFloat($valor,6));
          $distribucion->setTipdoc($caordcom->getDoccom());
          $distribucion->setRefsol($caordcom->getRefsol());
          $distribucion->save();
          }
          $r++;
        }//while
     }//if ($x[$j]->getDatosrecargo()!="")
    }//else//if ($caordcom->getRefsol()!="")
   }// if ($marcado=="1")
   else {
        $c= new Criteria();
        $c->add(CadisrgoPeer::REQART,$caordcom->getOrdcom());
        $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
        if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,trim($arreglo_grid[$j]["desart"]));
        $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
        $c->add(CadisrgoPeer::TIPDOC,$caordcom->getDoccom());
        CadisrgoPeer::doDelete($c);
   }
   $j++;
  }// while ($j<count($x))
  }

  public static function grabarRecargo($caordcom)
  {
   Herramientas::EliminarRegistro("Cargosol", "Reqart", $caordcom->getOrdcom());
   $ordcom=$caordcom->getOrdcom();
   $sql="select reqart,codrgo,sum(coalesce(monrgo,0)) as monrgo from cadisrgo where reqart='".$ordcom."'  group by reqart,codrgo";
   $result=array();
   if (Herramientas::BuscarDatos($sql,$result))
    {
      $i=0;
      while ($i<count($result))
      {
        $cargosol= new Cargosol();
        $cargosol->setReqart($ordcom);
        $cargosol->setCodrgo($result[$i]['codrgo']);
        $cargosol->setMonrgo($result[$i]['monrgo']);
         $cargosol->setTipdoc($caordcom->getDoccom());
         $cargosol->save();
         $i++;
       }// while ($i<count($result))
    }
 }

  public static function armarArregloTotalesRecargo($caordcom,$grid_detalle_orden_arreglos,&$arr_recargo)
  {

  $arreglo_grid=$grid_detalle_orden_arreglos;
  $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
  $j=0;
  $arr_recargo=array();
  $indarr_rec=0;
  while ($j<count($arreglo_grid))
  {
   $marcado=$arreglo_grid[$j]["check"];
   $unidad=$arreglo_grid[$j]["codcat"];
   if ($caordcom->getRefsol()!="" && !$caordcom->getId())
   $codpresu=$arreglo_grid[$j]["codigopre"];
   else $codpresu=$arreglo_grid[$j]["codpre"];
   if ($marcado=="1")
   {
    if ($caordcom->getRefsol()!="")
    //si la orden de compra refiere a Solicitud de egreso, los recargos son iguales a los de la solicitud,
    //de lo contrario si es orden de compra directa los recargos son los que el usuario haya introducido
    {
    $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
    $c= new Criteria();
    $c->add(CadisrgoPeer::REQART,$caordcom->getRefsol());
    $c->add(CadisrgoPeer::CODART,$arreglo_grid[$j]["codart"]);
    if ($claartdes=='S') $c->add(CadisrgoPeer::DESART,trim($arreglo_grid[$j]["desart"]));
    $c->add(CadisrgoPeer::CODCAT,$arreglo_grid[$j]["codcat"]);
    $c->add(CadisrgoPeer::TIPDOC,$tipdoc);
    $recargos= CadisrgoPeer::doSelect($c);
         foreach ($recargos as $cadisrgo_ordcom)
         {
          $arr_recargo[$indarr_rec]['codart']=str_replace("'","",$arreglo_grid[$j]["codart"]);
          $arr_recargo[$indarr_rec]['codcat']=str_replace("'","",$arreglo_grid[$j]["codcat"]);
          $arr_recargo[$indarr_rec]['codrgo']=$cadisrgo_ordcom->getCodrgo();
          $montorecargo= $cadisrgo_ordcom->getMonrgo();
          $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
          $indarr_rec++;
         }
    }
    else//if ($caordcom->getRefsol()!="")
    {
     if ($arreglo_grid[$j]["datosrecargo"]!='')
     {
    $cadenarec=split('!',$arreglo_grid[$j]["datosrecargo"]);
        $r=0;
        while ($r<(count($cadenarec)-1))
        {
          $aux=$cadenarec[$r];
          $aux2=split('_',$aux);
          if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
          {
              $arr_recargo[$indarr_rec]['codart']=str_replace("'","",$arreglo_grid[$j]["codart"]);
          $arr_recargo[$indarr_rec]['codcat']=str_replace("'","",$arreglo_grid[$j]["codcat"]);
          $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
          $montorecargo= Herramientas::toFloat($aux2[4]);
          $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
           $arr_recargo[$indarr_rec]['codpar']=$aux2[5];
          $indarr_rec++;
          }
          $r++;
        }//while
     }//if ($x[$j]->getDatosrecargo()!="")
    }//else//if ($caordcom->getRefsol()!="")
   }// if ($marcado=="1")
   $j++;
  }// while ($j<count($x))
  }//END SUB


 public static function Cargartirarecargosgrid($numordcom="",$codart="",$coduni="", $desart="")
 {

     $cadena="";
     $tipdoc=Compras::ObtenerTipoDocumentoPrecompromiso();
     $c = new Criteria();
     $c->add(CadisrgoPeer::REQART,$numordcom);
     $c->add(CadisrgoPeer::CODART,$codart);
     if ($desart!="") $c->add(CadisrgoPeer::DESART,trim($desart));
     $c->add(CadisrgoPeer::CODCAT,$coduni);
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

 public static function generarComprobante($caordcom,$grid,$referencia,$total,&$msjuno,&$arrcompro)
 {
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

    $numerocomprob= '########';
    if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
      $tipord='corser';
    else
      $tipord='corcom';

    if (Herramientas::getVerCorrelativo($tipord,'cacorrel',$r))
    {
      if ($caordcom->getOrdcom()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
            $numero='OS'.(substr($numero,2,strlen($numero)));
          else
            $numero='OC'.(substr($numero,2,strlen($numero)));
          $sql="select ordcom from caordcom where ordcom='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
           }
        }//while (!$encontrado)
       $reftra=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      else
      {
        $reftra=str_replace('#','0',$caordcom->getOrdcom());
        $reftra=str_pad($reftra, 8, '0', STR_PAD_LEFT);
      }
    }

    if (($caordcom->getTipord()=='S') || ($caordcom->getTipord()=='T'))
      $reftra='OS'.substr($reftra, 2, 6);
    else
      $reftra='OC'.substr($reftra, 2, 6);

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
      	$codpre=$x[$j]["codcat"]."-".$x[$j]["codpar"];
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$codpre);
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
          	if ($referencia==0)
          	$mont=$x[$j]["totart"];
          	else $mont=$x[$j]["montot"];

            if ($mont>0)
            {
	            $codigocuenta=$regis2->getCodcta();
	            $tipo='D';
	            $des="";
	            $monto=$mont;
            }
          }else {
          	$msjuno='El Código Presupuestario no tiene asociado Codigo Contable válido'; return true;}
        }
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

        $j++;
      }

      $catpro=H::getX('rifpro','Caprovee','codcta',$caordcom->getRifpro());
      $codigocuenta2=$catpro;
      $tipo2='C';
      $des2="";
      $b=$total;
      $monto2=$b;

      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($caordcom->getFecord())));
      $clscommpro->setDestra($caordcom->getDesord());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

      return true;
 }

 public static function generarComprobanteOrden($caordcom,$total,&$msjuno,&$arrcompro)
 {
    $msjuno="";
    $numerocomprob= '########'; $codigocuenta=""; $codigocuenta2="";
    $tipo2=""; $tipo=""; $des2=""; $des=""; $monto2=""; $monto="";

    if (($caordcom->getTipord()=='S'))
      $tipord='corser';
    else if ($caordcom->getTipord()=='T')
            $tipord='corcont';
    else
      $tipord='corcom';

    if (Herramientas::getVerCorrelativo($tipord,'cacorrel',$r))
    {
      if ($caordcom->getOrdcom()=='########')
      {
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          if (($caordcom->getTipord()=='S'))
            $numero='OS'.(substr($numero,2,strlen($numero)));
          else if ($caordcom->getTipord()=='T')
            $numero='CO'.(substr($numero,2,strlen($numero)));
          else
            $numero='OC'.(substr($numero,2,strlen($numero)));
          $sql="select ordcom from caordcom where ordcom='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
           }
        }//while (!$encontrado)
       $reftra=str_pad($r, 8, '0', STR_PAD_LEFT);
      }
      else
      {
        $reftra=str_replace('#','0',$caordcom->getOrdcom());
        $reftra=str_pad($reftra, 8, '0', STR_PAD_LEFT);
      }
    }

    if (($caordcom->getTipord()=='S'))
      $reftra='OS'.substr($reftra, 2, 6);
    else if ($caordcom->getTipord()=='T')
      $reftra='CO'.substr($reftra, 2, 6);
    else
      $reftra='OC'.substr($reftra, 2, 6);

   $afectaproyecto=false;
   $tipprovee=H::getX('rifpro','Caprovee','tipo',$caordcom->getRifpro());
   $c= new Criteria();
   $c->add(CatipproPeer::CODPRO,$caordcom->getTippro());
   $reg= CatipproPeer::doSelectOne($c);
   if ($reg)
   {
   	 if ($reg->getCtaord()!="" && $reg->getCtaper()!="")
   	 {
   	   $ctaproyord=$reg->getCtaord();
   	   $ctaproyper=$reg->getCtaper();
   	   $afectaproyecto=true;
   	 }
   	 else
     {
   	  $afectaproyecto=false;
     }
   }

   if ($afectaproyecto==true)
   {
   	  $b= new Criteria();
   	  $b->add(ContabbPeer::CODCTA,$ctaproyord);
   	  $registro= ContabbPeer::doSelectOne($b);
   	  if ($registro)
   	  {
        $codigocuenta=$registro->getCodcta();
        $tipo='D';
        $des="";
        $monto=$total;
   	  }else { $msjuno='El Proyecto "'.$caordcom->getTippro().'" no tiene una Cuenta de Orden válida asociada'; return true;}

   	  $d= new Criteria();
   	  $d->add(ContabbPeer::CODCTA,$ctaproyper);
   	  $registro= ContabbPeer::doSelectOne($d);
   	  if ($registro)
   	  {
        $codigocuenta2=$registro->getCodcta();
        $tipo2='C';
        $des2="";
        $monto2=$total;

   	  }else { $msjuno='El Proyecto "'.$caordcom->getTippro().'" no tiene una Cuenta de Percontra válida asociada'; return true;}
   }
   else
   {
     $b= new Criteria();
     $b->add(OpbenefiPeer::CEDRIF,$caordcom->getRifpro());
     $reg= OpbenefiPeer::doSelectOne($b);
     if ($reg)
     {
       if ($caordcom->getTipord()!="S") //Orden de Compra
       {
       	 if ($tipprovee!="C") //Proveedor
       	 {
       	 	if (!is_null($reg->getCodord()))
       	 	{
       	 	  $cuenta=$reg->getCodord();
       	 	}else $cuenta='';
       	 }
       	 else //contratista
       	 {
           if (!is_null($reg->getCodordadi()))
       	 	{
       	 	  $cuenta=$reg->getCodordadi();
       	 	}else $cuenta='';
       	 }
       }
       else  //Orden de Servicio u otra
       {
         if ($tipprovee!="C") //Proveedor
       	 {
       	 	if (!is_null($reg->getCodordadi()))
       	 	{
       	 	  $cuenta=$reg->getCodordadi();
       	 	}else $cuenta='';
       	 }
       	 else //contratista
       	 {
           if (!is_null($reg->getCodord()))
       	 	{
       	 	  $cuenta=$reg->getCodord();
       	 	}else $cuenta='';
       	 }
       }

      $b= new Criteria();
   	  $b->add(ContabbPeer::CODCTA,$cuenta);
   	  $registro= ContabbPeer::doSelectOne($b);
   	  if ($registro)
   	  {
        $codigocuenta=$registro->getCodcta();
        $tipo='D';
        $des="";
        $monto=$total;
   	  }else { $msjuno='El Beneficiario "'.$caordcom->getRifpro().'" no tiene una Cuenta de Orden válida asociada'; return true;}

      if ($caordcom->getTipord()!="S") //Orden de Compra
      {
       	 if ($tipprovee!="C") //Proveedor
       	 {
       	 	if (!is_null($reg->getCodpercon()))
       	 	{
       	 	  $cuenta2=$reg->getCodpercon();
       	 	}else $cuenta2='';
       	 }
       	 else //contratista
       	 {
           if (!is_null($reg->getCodperconadi()))
       	 	{
       	 	  $cuenta2=$reg->getCodperconadi();
       	 	}else $cuenta2='';
       	 }
       }
       else  //Orden de Servicio u otra
       {
         if ($tipprovee!="C") //Proveedor
       	 {
       	 	if (!is_null($reg->getCodperconadi()))
       	 	{
       	 	  $cuenta2=$reg->getCodperconadi();
       	 	}else $cuenta2='';
       	 }
       	 else //contratista
       	 {
           if (!is_null($reg->getCodpercon()))
       	 	{
       	 	  $cuenta2=$reg->getCodpercon();
       	 	}else $cuenta2='';
       	 }
       }

      $d= new Criteria();
   	  $d->add(ContabbPeer::CODCTA,$cuenta2);
   	  $registro= ContabbPeer::doSelectOne($d);
   	  if ($registro)
   	  {
        $codigocuenta2=$registro->getCodcta();
        $tipo2='C';
        $des2="";
        $monto2=$total;
   	  }else { $msjuno='El Beneficiario "'.$caordcom->getRifpro().'" no tiene una Cuenta Percontra válida asociada'; return true;}
     }
   }

    $cuentas=$codigocuenta2.'_'.$codigocuenta;
    $tipos=$tipo2.'_'.$tipo;
    $descr=$des2.'_'.$des;
    $montos=$monto2.'_'.$monto;

    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numerocomprob);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($caordcom->getFecord())));
    $clscommpro->setDestra($caordcom->getDesord());
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $arrcompro[]=$clscommpro;

    return true;
 }

   public static function totalImputacion($ordcom)
  {
  	$total=0;
  	$c= new Criteria();
  	$c->add(CpimpcomPeer::REFCOM,$ordcom);
  	$result= CpimpcomPeer::doSelect($c);
  	if ($result)
  	{
  	   foreach ($result as $obj)
  	   {
  	   	 $total= $total + $obj->getMonimp();
  	   }
  	}
  	return $total;
  }
  
  public static function verificarDispComprometer($caordcom,&$error1,&$cod1,&$error2,&$error3,&$mdis,&$mimp,&$resta)
  {
    $hay_disponibilidad=true;
  	$error1=-1;
  	$error2=-1;	
    $error3=-1;
	$cod1="";
	$mdis=0;
	$mimp=0;
	$resta=0;
        $c= new Criteria();
        $regis= CadefartPeer::doSelectOne($c);
        if ($regis)
        {
          $tiporec= $regis->getAsiparrec();
        }
        $fec=split('-',$caordcom->getFecord());
        $feccom=$fec[2].'/'.$fec[1].'/'.$fec[0];
      if (!Herramientas::validarPeriodoPresuesto($feccom))
      {
        $error3=151;
        return false;
      }
      
        $datosGrid = array();    
        $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
        $moneda=$caordcom->getTipmon();
        $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
        if ($moneda2!=$moneda)
        {
            $valor=$caordcom->getValmon();
        }else $valor=H::getX_vacio('CODMON', 'Tsdesmon', 'Valmon', $moneda);
      
  	if ($caordcom->AfectaDisponibilidad())
	{
		$l= new Criteria();
		$l->add(CaartordPeer::ORDCOM,$caordcom->getOrdcom());
		$objetos= CaartordPeer::doSelect($l);
		if ($objetos)
		{
			foreach ($objetos as $obj)
			{
                              $t= new Criteria();
                              $t->add(CpdeftitPeer::CODPRE,$obj->getCodpre());
                              $trajo= CpdeftitPeer::doSelectOne($t);
                              if ($trajo) {
                                $a= new Criteria();
                                $a->add(CpasiiniPeer::PERPRE,'00');
                                $a->add(CpasiiniPeer::CODPRE,$obj->getCodpre());
                                $data2= CpasiiniPeer::doSelectOne($a);
                                if (!$data2)
                                {
                                    $cod1=$obj->getCodpre();
                                    $error1=512;
                                    $hay_disponibilidad=false;
                                    return false;
                                }
                              }else {
                                $cod1=$obj->getCodpre();
                                $error1=2103;
                                $hay_disponibilidad=false;
                                return false;
                              }

                                $codpre=H::getCodPreDis($obj->getCodpre());
                                if ($tiporec=='C') {
                                  if ($moneda2!=$moneda) $monto=$obj->getTotart()*$valor;
                                  else $monto=$obj->getTotart();
                                }
                                else {
                                 if ($moneda2!=$moneda) $monto=(($obj->getTotart()*$valor)-$obj->getRgoart());
                                 else $monto=($obj->getTotart()-$obj->getRgoart());
                                }

                                $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
                                if ($pos==0)
                                {
                                 $i=count($datosGrid)+1;
                                 $datosGrid[$i-1]["codpre"]=$codpre;
                                 $datosGrid[$i-1]["monimp"]=$monto;     
                                 $datosGrid[$i-1]["codpre2"]=$obj->getCodpre();     
                                }
                                else
                                {
                                 $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$monto;
                                }
			}
                        
                        $p=0;
                        while ($p<count($datosGrid))
                        {
                          $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$caordcom->getFecord());
                          if(H::toFloat($datosGrid[$p]["monimp"]) > H::toFloat($disponible)){
                              $hay_disponibilidad=false; 
                              $cod1=$datosGrid[$p]["codpre2"];
                              $mdis=$disponible;
                              $mimp=$datosGrid[$p]["monimp"];
                              $resta=$datosGrid[$p]["monimp"]-$disponible;
                              $error1=118;
                              return false;
                          }
                          $p++;
                        }
                        
                        
			self::armarArregloTotalesRecargo2($caordcom,$grid_recargos_detalle);
			if ($hay_disponibilidad)
			{
                            $i=0;
                            $datosGridRec=array();
                            if (count($grid_recargos_detalle)>0 && $comnoiva!='S')
                            {
                              while ($i<count($grid_recargos_detalle))
                              {
                                 $c= new Criteria();
                                 $c->add(CarecargPeer::CODRGO,$grid_recargos_detalle[$i]['codrgo']);
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
                                             $error2=512;
                                             return false;
                                        }
                                       }else {
                                             $error2=2103;
                                             return false;                                            
                                       }
                                        $codpre=H::getCodPreDis($data->getCodpre());
                                    }
                                    else  {
                                       $t= new Criteria();
                                       $t->add(CpdeftitPeer::CODPRE,$grid_recargos_detalle[$i]['codcat'].'-'.$data->getCodpre());
                                       $trajo= CpdeftitPeer::doSelectOne($t);
                                       if ($trajo) {
                                            $a= new Criteria();
                                            $a->add(CpasiiniPeer::PERPRE,'00');
                                            $a->add(CpasiiniPeer::CODPRE,$grid_recargos_detalle[$i]['codcat'].'-'.$data->getCodpre());
                                            $data2= CpasiiniPeer::doSelectOne($a);
                                            if (!$data2)
                                            {
                                                $error2=512;
                                                return false;
                                            }
                                       }else {
                                             $error2=2103;
                                             return false;
                                       }
                                       $codpre=H::getCodPreDis($grid_recargos_detalle[$i]['codcat'].'-'.$data->getCodpre());
                                    }

                                    if ($moneda2!=$moneda) $monrecar=$grid_recargos_detalle[$i]['monrgo']*$valor;
                                    else  $monrecar=$grid_recargos_detalle[$i]['monrgo'];
                                    $pos=  Presupuesto::posicion_en_el_grid2($datosGridRec, $codpre);
                                    if ($pos==0)
                                    {
                                     $j=count($datosGridRec)+1;
                                     $datosGridRec[$j-1]["codpre"]=$codpre;
                                     $datosGridRec[$j-1]["monimp"]=$monrecar;
                                    }
                                    else
                                    {
                                     $datosGridRec[$pos-1]["monimp"]=$datosGridRec[$pos-1]["monimp"]+$monrecar;
                                    }  

                                 }
                              $i++;
                              }
                              
                              $g=0;
                             while ($g<count($datosGridRec))
                             {
                              $disponible = H::Monto_disponible($datosGridRec[$g]["codpre"],$caordcom->getFecord());
                              if($datosGridRec[$g]["monimp"] > $disponible){
                                 $error2=118;
                                 $cod1=$datosGridRec[$g]["codpre"];
                                 $mdis=$disponible;
	                             $mimp=$datosGridRec[$g]["monimp"];
	                             $resta=$datosGridRec[$g]["monimp"]-$disponible;
                                 return false;
                              }
                              $g++;
                             } 
                            }				
			}
		}
	}

  }
  
  
  public static function chequear_disponibilidad_presupuesto2($caordcom,$codpre,$dtco,$categoria,$partida,&$sobregiro,&$codigo_presupuestario_sin_disponibilidad)
  {
   
    $mitotal = 0;
    $codigo_presupuestario='';
    $chequear_disponibilidad=false;
    $moneda=$caordcom->getTipmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda) {
            $valor=$caordcom->getValmon();
    }else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    
    $sobregiro=true;
    $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
	$l= new Criteria();
	$l->add(CaartordPeer::ORDCOM,$caordcom->getOrdcom());
	$objetos= CaartordPeer::doSelect($l);
	if ($objetos)
	{
		foreach ($objetos as $obj)
		{
			if ($codpre==$obj->getCodpre())
			{
				if ($tiporec=='C') {
                                  if ($moneda2!=$moneda) $elmonto=$obj->getTotart()*$valor;
                                  else $elmonto=$obj->getTotart();
                                                }
                                else {
                                 if ($moneda2!=$moneda) $elmonto=(($obj->getTotart()*$valor)-$obj->getRgoart());
                                 else $elmonto=($obj->getTotart()-$obj->getRgoart());
                                }
				
              $mitotal=$mitotal+$elmonto;
			}
		}
		
		if ($caordcom->getId()!='')
           $mitotal = $mitotal - $dtco;
		if ($codpre!="")
		{
		   $codigo_presupuestario =  $categoria."-".$partida;
           $mondis=Herramientas::Monto_disponible(H::getCodPreDis($codigo_presupuestario),$caordcom->getFecord());
           if (Herramientas::toFloat($mitotal)<= Herramientas::toFloat($mondis))
           {
               $chequear_disponibilidad=true;
               $sobregiro=false;
           }
		}
		
	}
    $codigo_presupuestario_sin_disponibilidad=$codigo_presupuestario;
    return $chequear_disponibilidad;
  }
  
  public static function armarArregloTotalesRecargo2($caordcom,&$arr_recargo)
  {
    $arr_recargo=array();
    $indarr_rec=0;
    $l= new Criteria();
	$l->add(CaartordPeer::ORDCOM,$caordcom->getOrdcom());
	$objetos= CaartordPeer::doSelect($l);
	if ($objetos)
	{
		foreach ($objetos as $obj)
		{
		   $marcado=$obj->getCheck();
		   $unidad=$obj->getCodcat();
		   $codpresu=$obj->getCodpre();
		   if ($marcado=="1")
		   {
		     if ($obj->getDatosrecargo()!='')
		     {
  		        $cadenarec=split('!',$obj->getDatosrecargo());
		        $r=0;
		        while ($r<(count($cadenarec)-1))
		        {
		          $aux=$cadenarec[$r];
		          $aux2=split('_',$aux);
		          if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
		          {
		              $arr_recargo[$indarr_rec]['codart']=$obj->getCodart();
			          $arr_recargo[$indarr_rec]['codcat']=$obj->getCodcat();
			          $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
			          $montorecargo= Herramientas::toFloat($aux2[4]);
			          $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
			           $arr_recargo[$indarr_rec]['codpar']=$aux2[5];
			          $indarr_rec++;
		          }
		          $r++;
		        }
		     }
		   }
		}
	}
  }
  
  public static function chequear_disponibilidad_recargo2($codigo,$elmonto,$objetos,$grid_detalle_recargo,&$sobregiro_recargo,$grid_total_unidad)
  {
      $codigo=str_replace("'","",$codigo);
      $chequear_disponibilidad_recargo = false;
      $sobregiro_recargo = true;
      $tiporec = Herramientas::getX_vacio('codemp','cadefart','asiparrec','001');
      if ($codigo=='')
        $mitotal=0;
      else
        $mitotal=$elmonto;
      $result=array();
      $sql = "Select codpre from CaRecArg where CodRgo = '".$codigo."'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
          if (trim($tiporec)=='P')
          {
            $mitotal=$elmonto;
            $codigo_presupuestario = str_replace("'","",$result[0]['codpre']);
            $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
            if ($mitotal <= $mondis)
            {
                $chequear_disponibilidad_recargo = true;
                $sobregiro_recargo = false;
            }
          }
        elseif (trim($tiporec)=='R')
        {
            $grid_total_unidad=self::acumular_unidad2($elmonto,$objetos,$grid_total_unidad);
            $j=0;
            while ($j<count($grid_total_unidad))
            {
                $codigo_presupuestario = $grid_total_unidad[$j][0].'-'.$result[0]['codpre'];
                $mitotal=$grid_total_unidad[$j][1];
                $mondis=Herramientas::Monto_disponible($codigo_presupuestario);
                if ($mitotal <= $mondis)
                {
                    $chequear_disponibilidad_recargo = true;
                    $sobregiro_recargo = false;
                }
                $j++;
            }
          }
       }

      return $chequear_disponibilidad_recargo;
  }  
  
  public static function acumular_unidad2($elmonto,$objetos,$grid_total_unidad)
  {
    $acum=0;
	foreach ($objetos as $obj)
	{
		if ($obj->getCheck()=='1' && $obj->getPreart()>0)
		  $acum= $acum + ($obj->getCanord() * $obj->getPreart());
	}

	foreach ($objetos as $obj)
	{
		if ($obj->getCheck()=='1')
		{
			$totart=$obj->getCanord() * $obj->getPreart();
			$j=0;
	        if (count($grid_total_unidad)>0)
	        {
	            while ($j<count($grid_total_unidad))
	            {
	                $encontrado=false;
	                if ($obj->getCodcat()==$grid_total_unidad[$j][0])
	                {
	                  $encontrado=true;
	                  $fila=$j;
	                  break;
	                }
	                $j++;
	            }
	            if ($encontrado)
	            {
	              self::monto_recargo($acum,$elmonto,$totart,$monto_recargo);
	              $grid_total_unidad[$fila][1]=$grid_total_unidad[$fila][1]+$monto_recargo;
	            }
	            else
	            {
	              $var=count($grid_total_unidad);
	              $grid_total_unidad[$var][0]=$obj->getCodcat();
	              self::monto_recargo($acum,$elmonto,$totart,$monto_recargo);
	              $grid_total_unidad[$var][1]=$monto_recargo;
	            }
	        }
	        else
	        {
	          $grid_total_unidad[$j][0]=$obj->getCodcat();
	          self::monto_recargo($acum,$elmonto,$totart,$monto_recargo);
	          $grid_total_unidad[$j][1]=$monto_recargo;
	        }
		}
	}

     return $grid_total_unidad;
  }  

  public static function grabarFormasEntrega($caordcom,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodart()!='' && $x[$j]->getCodalm()!='' && $x[$j]->getCanent()>0)
      {
      	$x[$j]->setOrdcom($caordcom->getOrdcom());
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
  }

  public static function VerificarDuplicidadArticulosDetalleOrden($grid_detalle_detallado, $codart){
   $claartdes=H::getConfApp2('claartdes', 'compras', 'almsolegr');
   if ($claartdes=='S')
   {
	    foreach($grid_detalle_detallado as $det){
	      $count = 0;
	      foreach ($grid_detalle_detallado as $detdet){
	        if($det['codart']==$detdet['codart'] && $det['desart']==$detdet['desart'] && $det['codcat']==$detdet['codcat']){
	          $count++;
	          $codart = $det['codart'];
	        }
	      }
	      if($count>1) return false;
	    }
   }else {
	    foreach($grid_detalle_detallado as $det){
	      $count = 0;
	      foreach ($grid_detalle_detallado as $detdet){
	        if($det['codart']==$detdet['codart'] && $det['codcat']==$detdet['codcat']){
	          $count++;
	          $codart = $det['codart'];
	        }
	      }
	      if($count>1) return false;
	    }
    }
    return true;


  }

  public static function salvarCentrodeCosto($caordcom,$grid_detalle)
  {
      $i=0;
      while ($i<count($grid_detalle))
      {     
          $r= new Criteria();
          $r->add(CaartordPeer::ORDCOM,$caordcom->getOrdcom());
          $r->add(CaartordPeer::CODART,$grid_detalle[$i]['codart']);
          $r->add(CaartordPeer::DESART,$grid_detalle[$i]['desart']);
          $r->add(CaartordPeer::CODCAT,$grid_detalle[$i]['codcat']);
          $reg= CaartordPeer::doSelectOne($r);
          if ($reg)
          {
              $reg->setCodcen($grid_detalle[$i]['codcen']);
              $reg->save();
          }        
        $i++;
      }
  }

  public static function Grabar_grid_entregasPDA($caordcom,$grid_entregas_pda)
  {
      $x=$grid_entregas_pda[0];
      $j=0;
      while ($j<count($x)) {
      if ($x[$j]->getCodart()!="" && $x[$j]->getCanart()>0)
      {
        $x[$j]->setOrdcom($caordcom->getOrdcom());
        $x[$j]->save();
      }
        $j++;
      }
      $z=$grid_entregas[1];
      $j=0;
      if (!empty($z[$j])) {
        while ($j<count($z)) {
          $z[$j]->delete();
          $j++;
        }

      }
  }  
  
   public static function Grabar_grid_entregasPDA2($caordcom,$grid_entregas_pda)
  {
      if ($caordcom->getId()){
    		Herramientas::EliminarRegistro("Caentpda", "Ordcom", $caordcom->getOrdcom());
    	}

      $i=0;
      while ($i<count($grid_entregas_pda)) {
      if ($grid_entregas_pda[$i]['codart']!="" && H::toFloat(str_replace("'","",$grid_entregas_pda[$i]['canart']))>0)
      {
        $caentpda_new = new Caentpda();
        $caentpda_new->setOrdcom($caordcom->getOrdcom());
        $caentpda_new->setCodart(str_replace("'","",$grid_entregas_pda[$i]['codart']));
        $caentpda_new->setDesart($grid_entregas_pda[$i]['desart']);
        $caentpda_new->setCanart(str_replace("'","",$grid_entregas_pda[$i]['canart']));
        $caentpda_new->setFecent(str_replace("'","",$grid_entregas_pda[$i]['fecent']));
        $caentpda_new->setTiptra($grid_entregas_pda[$i]['tiptra']);
        $caentpda_new->setDirori($grid_entregas_pda[$i]['dirori']);
        $caentpda_new->setObserv($grid_entregas_pda[$i]['observ']);
        $caentpda_new->save();
      }
        $i++;
      }
  }

   public static function verificarDispGenComp($ordencompra,&$msjuno,&$codi1,&$msjdos,&$codi2,&$codi3,&$msjtres,&$mdis,&$mimp,&$resta)
   {

    $msjuno=-1; $codi1="";
    $msjdos=-1; $codi2="";
    $msjtres=-1;
    $mdis=0;
    $mimp=0;
    $resta=0;
    $j=0;
    $c= new Criteria();
    $regis= CadefartPeer::doSelectOne($c);
    if ($regis)
    {
      $tiporec= $regis->getAsiparrec();
    }
    $fec=split('-',$ordencompra->getFecord());
    $feccom=$fec[2].'/'.$fec[1].'/'.$fec[0];
    if (!Herramientas::validarPeriodoPresuesto($feccom))
    {
      $msjtres=142;
      return false;
    }
    $datosGrid = array();    
    $moneda=$ordencompra->getTipmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
    {
        $valor=$ordencompra->getValmon();
    }else $valor=H::getX_vacio('CODMON', 'Tsdesmon', 'Valmon', $moneda);

    $l= new Criteria();
    $l->add(CaartordPeer::ORDCOM,$ordencompra->getOrdcom());
    $objetos= CaartordPeer::doSelect($l);
    if ($objetos)
    {
       foreach ($objetos as $obj)
       {
        
          $t= new Criteria();
          $t->add(CpdeftitPeer::CODPRE,$obj->getCodcat().'-'.$obj->getCodpar());
          $trajo= CpdeftitPeer::doSelectOne($t);
          if ($trajo) {
            $a= new Criteria();
            $a->add(CpasiiniPeer::PERPRE,'00');
            $a->add(CpasiiniPeer::CODPRE,$obj->getCodcat().'-'.$obj->getCodpar());
            $data2= CpasiiniPeer::doSelectOne($a);
            if (!$data2)
            {
                $msjuno=512; $codi1=$obj->getCodart(); $codi3=$obj->getCodcat().'-'.$obj->getCodpar();
                return false;
            }
          }else {            
             $msjuno=2103; $codi1=$obj->getCodart(); $codi3=$obj->getCodcat().'-'.$obj->getCodpar();
             return false;
          }

            $codpre=H::getCodPreDis($obj->getCodcat().'-'.$obj->getCodpar());
            $cantidad=$obj->getCanord();
            if ($moneda2!=$moneda) $costo=$obj->getPreart()*$valor;
            else  $costo=$obj->getPreart();
            $recargo=$obj->getRgoart();
            if ($tiporec!='C')        
              $monto= $cantidad*$costo;        
            else
              $monto= $recargo;

            $pos=  Presupuesto::posicion_en_el_grid2($datosGrid, $codpre);
            if ($pos==0)
            {
             $i=count($datosGrid)+1;
             $datosGrid[$i-1]["codpre"]=$codpre;
             $datosGrid[$i-1]["monimp"]=$monto;
             $datosGrid[$i-1]["codart"]=$obj->getCodart();
             $datosGrid[$i-1]["codpre"]=$obj->getCodcat().'-'.$obj->getCodpar();
            }
            else
            {
             $datosGrid[$pos-1]["monimp"]=$datosGrid[$pos-1]["monimp"]+$monto;
            }
       }
       
        $p=0;
        while ($p<count($datosGrid))
        {
          $disponible = H::Monto_disponible($datosGrid[$p]["codpre"],$ordencompra->getFecord());
          if($datosGrid[$p]["monimp"] > $disponible){
            $mdis=$disponible;
            $mimp=$datosGrid[$p]["monimp"];
            $resta=$datosGrid[$p]["monimp"]-$disponible;
            $msjuno=113; $codi1=$datosGrid[$p]["codart"]; $codi3=$datosGrid[$p]["codpre"];
            return false;
          }
          $p++;
        }


    $comnoiva=H::getConfApp2('comnoiva', 'compras', 'almordcom');
    //Validar presupuesto Recargos
    if ($comnoiva!='S') {
    $j=0;
    $requi=$ordencompra->getOrdcom();
    $arr_recargo=array();
    $indarr_rec=0;
    foreach ($objetos as $datos)
    {
	    $marcado=$datos->getCheck();
	    if ($marcado=="1")
	    {
	      if ($datos->getDatosrecargo()!='')
	      {
	          $cadenarec=split('!',$datos->getDatosrecargo());
	          $r=0;
	          while ($r<(count($cadenarec)-1))
	          {
	            $aux=$cadenarec[$r];
	            $aux2=split('_',$aux);
	            if ($aux2[0]!="" && Herramientas::toFloat($aux2[4])>0)
	            {
	            $arr_recargo[$indarr_rec]['codart']=$datos->getCodart();
	            $arr_recargo[$indarr_rec]['codcat']=$datos->getCodcat();
	            $arr_recargo[$indarr_rec]['codrgo']=$aux2[0];
	            $montorecargo= Herramientas::toFloat($aux2[4]);
	            $arr_recargo[$indarr_rec]['monrgo']=$montorecargo;
	            $indarr_rec++;
	            }
	            $r++;
	          }
	      }
	    }
    }

    $h = 0;
    $datosGridRec=array();
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
                    $msjdos=512; $codi2=$arr_recargo[$h]['codrgo']; $codi3=$data->getCodpre();
                    return false;
                }
               }else {
                   $msjdos=2103; $codi2=$arr_recargo[$h]['codrgo']; $codi3=$data->getCodpre();
                    return false;
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
                        $msjdos=512; $codi2=$arr_recargo[$h]['codrgo']; $codi3=$arr_recargo[$h]['codcat'].'-'.$data->getCodpre();
                        return false;
                    }
               }else {
                   $msjdos=2103; $codi2=$arr_recargo[$h]['codrgo']; $codi3=$arr_recargo[$h]['codcat'].'-'.$data->getCodpre();
                    return false;
               }
               $codpre=H::getCodPreDis($arr_recargo[$h]['codcat'].'-'.$data->getCodpre());
            }
           
            if ($moneda2!=$moneda) $monrecar=$arr_recargo[$h]['monrgo']*$valor;
            else  $monrecar=$arr_recargo[$h]['monrgo'];
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
      $disponible = H::Monto_disponible($datosGridRec[$g]["codpre"],$ordencompra->getFecord());
      if($datosGridRec[$g]["monimp"] > $disponible){
        $mdis=$disponible;
        $mimp=$datosGridRec[$g]["monimp"];
        $resta=$datosGridRec[$g]["monimp"]-$disponible;
        $msjdos=114; $codi2=$datosGridRec[$g]["codrgo"]; $codi3=$datosGridRec[$g]["codpre"];
        return false;
      }
      $g++;
     }   
     }   
    }

     return true;

   }  

  public static function salvarAlmaprordcom($clasemodelo,$grid)
  {   
    $x = $grid[0];
    $j = 0;
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    while ($j < count($x)) {
      if ($x[$j]->getAprobar()=='1')
      {
  		  $t= new Criteria();
  		  $t->add(CaordcomPeer::ORDCOM,$x[$j]->getOrdcom());
  		  $ordencompra=CaordcomPeer::doSelectOne($t);
  		  if ($ordencompra){
  		    self::Grabar_compromiso($ordencompra);
          $ordencompra->setUsuapr($loguse);
          $ordencompra->setFecapr(date('Y-m-d'));
          $ordencompra->save();
  		  }
      }
      $j++;
    }
	return -1;

  }  

  public static function salvarAlmverordcom($clasemodelo,$grid)
  {   
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getAprobar()=='1')
      {
         $x[$j]->setStaver('S');
         $x[$j]->save();
      }
      $j++;
    }
  return -1;

  }    


}// fin



  /**************************************************************************
   **                     Formulario Amlordcom                             **
   **                       Jaime Suárez                                   **
   **************************************************************************/
