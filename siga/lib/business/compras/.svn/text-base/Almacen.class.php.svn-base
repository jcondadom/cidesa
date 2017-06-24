<?php
/**
 * Compras: Clase estática para el manejo de los almacenes
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Almacen.class.php 44068 2011-04-28 08:06:24Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Almacen
{

  public static function salvarAlmsalalm($salida,$grid)
  {

   //Modificacion
   if ($salida->getId())
   {
	   	$proveedor=$salida->getRifpro();
	  	$c= new Criteria();
	  	$c->add(CaproveePeer::RIFPRO,$proveedor);
	  	$reg= CaproveePeer::doSelectOne($c);
	  	if ($reg)
	  	{
	  		$salida->setCodpro($reg->getCodpro());
	  	}
	    $salida->save();
        return -1;
   }
   else //INCLUSION
   {  	  $tiecorr=false;
	      if (true)
	      {
	         if ($salida->getCodsal()=='########')
				{
                                  $cacorrel = new Cacorrel();
                                  $r = $cacorrel->getSecsal();
			      	  $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
                                  $tiecorr=true;
                                  $salida->setCodsal(str_pad($r, 8, '0', STR_PAD_LEFT));
				}
	       }
            $salida->setFecreg(date('Y-m-d'));
            $gencom=H::getConfApp2('gencom', 'compras', 'almsalalm');
            if ($gencom=='S')
            {
               if (!self::generarasientosSal($salida,$grid,$arrasientos,$acumdeb,$pos,$msj3))
               {
                   return $msj3;
               }else {
                 //Primero se intenta actualizar los articulos, y el almacen, con la cantidad saliente de articulos
                 //en el caso que no se pueda actualizar los artículos no se debe grabar el resto de la información
                  //   if (self::Actualizar_Articulos($salida,$grid,$coderr))
                     //{
                                $proveedor=$salida->getRifpro();
                                $c= new Criteria();
                                $c->add(CaproveePeer::RIFPRO,$proveedor);
                                $reg= CaproveePeer::doSelectOne($c);
                                if ($reg)
                                {
                                        $salida->setCodpro($reg->getCodpro());
                                }
                                if ($tiecorr) Herramientas::getSalvarCorrelativo('corsal','cacorrel','Salidas',$r,$msg);
                            $salida->save();
                            self::Generar_Comprobante_Contable_Sal($salida,$arrasientos,$acumdeb,$pos);
                            self::grabarDetalleSalida($salida,$grid);
                            self::Actualizar_Articulos($salida,$grid,$coderr);

                        return -1;
                    /* }
                     else
                     {
                        return $coderr;
                     }*/
               }
            }else {
                 //Primero se intenta actualizar los articulos, y el almacen, con la cantidad saliente de articulos
                 //en el caso que no se pueda actualizar los artículos no se debe grabar el resto de la información
                    // if (self::Actualizar_Articulos($salida,$grid,$coderr))
                     //{
                                $proveedor=$salida->getRifpro();
                                $c= new Criteria();
                                $c->add(CaproveePeer::RIFPRO,$proveedor);
                                $reg= CaproveePeer::doSelectOne($c);
                                if ($reg)
                                {
                                        $salida->setCodpro($reg->getCodpro());
                                }
                                if ($tiecorr) Herramientas::getSalvarCorrelativo('corsal','cacorrel','Salidas',$r,$msg);
                            $salida->save();
                            self::grabarDetalleSalida($salida,$grid);
                            self::Actualizar_Articulos($salida,$grid,$coderr);

                        return -1;
                    /* }
                     else
                     {
                        return $coderr;
                     }*/
            }
   }//  else //INCLUSION
  }

  public static function grabarDetalleSalida($salida,$grid)
  {
	$codsalida=$salida->getCodsal();
	$x=$grid[0];
	$j=0;
	  while ($j<count($x))
	  {
		$x[$j]->setCodsal($codsalida);
		$x[$j]->save();
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

  public static function eliminarAlmsalalm($salida)
  {
    self::eliminarSalida($salida);
  }

  public static function eliminarSalida($salida)
  {
  	self::Devolver_Articulos($salida);
  	$codigo=$salida->getCodsal();
  	Herramientas::EliminarRegistro('Cadetsal','Codsal',$codigo);
  	$salida->delete();
  }

  public static function Actualizar_Articulos($salida,$grid,&$msjerr)
    {
	    $x=$grid[0];
      $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
      $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
		  $j=0;
		  $msjerr=-1;
		  while ($j<count($x))
		  {
		    $codarti=$x[$j]->getCodart();
		    $dart=$x[$j]->getDesart();
		    $cantd=H::toFloat($x[$j]->getCantot());
		    $costo=$x[$j]->getCosart();
        $calmacen=$x[$j]->getCodalm();
        $cubicacion=$x[$j]->getCodubi();
        if ($manartlot=='S')
            $numlot=$x[$j]->getNumlot();
		     if (($codarti!="") and ($cantd>0))
		     {		         
          $c = new Criteria();
          $c->add(CaregartPeer::CODART,$codarti);
          $arti = CaregartPeer::doSelectOne($c);
          if ($arti)
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

             $act1=$arti->getExitot() - $cantd;
             $dis1=$arti->getDistot() - $cantd;
             $arti->setExitot($act1);
             $arti->setDistot($dis1);
             $arti->save();
        	 
         	   $c = new Criteria();
             $c->add(CaartalmubiPeer::CODART,$codarti);
             $c->add(CaartalmubiPeer::CODALM,$calmacen);
             $c->add(CaartalmubiPeer::CODUBI,$cubicacion);
             if ($manartlot=='S')
               $c->add(CaartalmubiPeer::NUMLOT,$numlot);
             $alm = CaartalmubiPeer::doSelectOne($c);
              if ($alm)
              {
                if($alm->getExiact()>=$cantd)
                 {
                  $act2=$alm->getExiact() - $cantd;
                  $alm->setExiact($act2);
                  $alm->save();
                 }
  				    }
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
             }// if ($reg)
	       }//if ($arti)
		  }
		    $j++;
		  }
     return true;
   }

    public static function Devolver_Articulos($salida)
    {
        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
        $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
		  $c = new Criteria();
          $c->add(CadetsalPeer::CODSAL,$salida->getCodsal());
          $detalle = CadetsalPeer::doSelect($c);

		  foreach ($detalle as $arreglo)
 		  {
 		    $codarti=$arreglo->getCodart();
		    $dart=$arreglo->getDesart();
		    $cantd=H::toFloat($arreglo->getCantot());
		    $costo=$arreglo->getCosart();
		    $calmacen=$arreglo->getCodalm();
		    $codubicacion=$arreglo->getCodubi();
        if ($manartlot=='S')
            $numlot=$arreglo->getNumlot();
		    if (($codarti!="") and ($cantd>0))
		     {
          $c = new Criteria();
          $c->add(CaregartPeer::CODART,$codarti);
          $arti = CaregartPeer::doSelectOne($c);
          if ($arti)
          {
            if ($manunialt=='S')
            {
               if ($arreglo->getUnimed()!="")
              {
                 if ($arreglo->getUnimed()!=$arti->getUnimed())
                 {
                     $k= new Criteria();                                     
                     $k->add(CaunialartPeer::CODART,$codarti);
                     $k->add(CaunialartPeer::UNIALT,$arreglo->getUnimed());
                     $result3= CaunialartPeer::doSelectOne($k);
                     if ($result3)
                     {
                         $cantd=$cantd*$result3->getRelart();
                     }
                 }
              }                
            }

             $act1=$arti->getExitot() + $cantd;
             $dis1=$arti->getDistot() + $cantd;
             $arti->setExitot($act1);
             $arti->setDistot($dis1);
             $arti->save();
           
             $c = new Criteria();
  	         $c->add(CaartalmPeer::CODART,$codarti);
  	         $c->add(CaartalmPeer::CODALM,$calmacen);
             $reg = CaartalmPeer::doSelectOne($c);
             if ($reg)
             {
    		        $act2=$reg->getExiact() + $cantd;
         	      $reg->setExiact($act2);
         	      $reg->save();
             }
     	       $c = new Criteria();
             $c->add(CaartalmubiPeer::CODART,$codarti);
             $c->add(CaartalmubiPeer::CODALM,$calmacen);
             $c->add(CaartalmubiPeer::CODUBI,$codubicacion);
             if ($manartlot=='S')
                 $c->add(CaartalmubiPeer::NUMLOT,$numlot);
             $alm = CaartalmubiPeer::doSelectOne($c);
              if ($alm)
              {
                $act2=$alm->getExiact() + $cantd;
                $alm->setExiact($act2);
                $alm->save();
			       }
	          }//if ($arti)
		      }
		  }
     return true;
   }
/**************************************************************************
**                          Inventario de Servicios                       **
**                                Miki                                   **
**************************************************************************/
	public static function salvarAlminvfis($inventario,$grid){
      self::Grabar_InvFisic($inventario,$grid);
    }

    public static function Grabar_InvFisic($inventario,$grid)
    {
   	  $fecha=$inventario->getFecinv();
   	  $almacen=$inventario->getCodalm();
      $x=$grid[0];
	  $j=0;

	  while ($j<count($x))
	  {
	      $detalle = new Cainvfis();
	  	  $detalle->setFecinv($fecha);
	  	  $detalle->setCodalm($almacen);
	  	  $detalle->setCodart($x[$j]->getCodart());
	  	  $detalle->setExiact($x[$j]->getExiact());
	  	  $detalle->setExiact2($x[$j]->getExiact2());

		$detalle->save();
	    $j++;
	    }
    }


  public static function eliminarAlminvfis($inventario)
  {
  	$c = new Criteria();
  	$c->addAscendingOrderByColumn(CainvfisPeer::CODART);
    $c->add(CainvfisPeer::FECINV,$inventario->getFecinv());
	$c->add(CainvfisPeer::CODALM,$inventario->getCodalm());
    $obj = CainvfisPeer::doSelect($c);
    foreach ($obj as $value)
   	{
    	$value->delete();
   	}
  }
/**************************************************************************
**                          Inventario de Servicios                       **
**                                Miki                                   **
**************************************************************************/

/**************************************************************************
**                          Definición de Ubicacion                     **
**                                CaDefubi                              **
**************************************************************************/
 public static function salvarCadefubi($cadefubi,$grid)
 {
   if($cadefubi->getId()=='')
   {
      $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
      if ($modulo=='facturacion')
         $cadefubi->setTipreg('F'); // para identificar si la Ubicacion se registro por facturacion
   }  
   
   $cadefubi->save();
   $c = new Criteria();
   $c->add(CaalmubiPeer::CODUBI,$cadefubi->getCodubi());
   CaalmubiPeer::doDelete($c);

   $x=$grid[0];
   $j=0;
   while ($j<count($x))
   {
    if ($x[$j]['check']=="1")
    {
     $c = new Criteria();
     $c->add(CaalmubiPeer::CODUBI,$cadefubi->getCodubi());
     $c->add(CaalmubiPeer::CODALM,$x[$j]['codalm']);
     $reg=CaalmubiPeer::doSelectOne($c);
     if (!$reg)
     {
         $caalmubi= new Caalmubi();
         $caalmubi->setCodalm($x[$j]['codalm']);
         $caalmubi->setCodubi($cadefubi->getCodubi());
     
     $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
      if ($modulo=='facturacion')
         $caalmubi->setTipreg('F'); // para identificar si la Ubicacion se registro por facturacion
         $caalmubi->save();
     }
    }//if
    $j++;
   }//while
 }
   public static function Hay_articulos($codubi)
    {
      $sql = "Select * From CaArtAlmUbi Where codubi = '" .$codubi. "'";
       if (Herramientas::BuscarDatos($sql,$result))
       {
          return true;
       }
       else
          return false;
     }

     public static function Hay_articulos_almacen($codalm)
     {
      	 $sql = "Select * From CaArtAlmUbi Where codalm = '" .$codalm. "'";
	     if (Herramientas::BuscarDatos($sql,$result))
	     {
	       return true;
	     }
	    else
	    {
	       $sql = "Select * From CaArtAlm Where codalm = '" .$codalm. "'";
	       if (Herramientas::BuscarDatos($sql,$result))
	       {
	          return true;
	       }
	       else
	          return false;
	     }//else
     }

     public static function ExistenciayObtenerDisponibilidadAlmArt($codart,$codalm,$codubi,&$exiact,&$numlot="")
     {
        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
        $funvaldisart="";
         $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
         if ($varemp)
           if(array_key_exists('generales',$varemp)) {
             if(array_key_exists('funvaldisart',$varemp['generales']))
             {
               $funvaldisart=$varemp['generales']['funvaldisart'];
             }
           }
         if ($funvaldisart=='S'){
           $result=array();
           $sql="select existenciaart('".$codart."','".$codalm."','".$codubi."','".$numlot."',now()::date) as exiact from empresa";
           if (Herramientas::BuscarDatos($sql,$result))
            {
              $exiact=$result[0]['exiact'];
              return true;
            }
            else
            {
              $exiact=0;
              return false;
            }
         }else {
           $c = new Criteria();
           $c->add(CaartalmubiPeer::CODART,$codart);
           $c->add(CaartalmubiPeer::CODALM,$codalm);
           $c->add(CaartalmubiPeer::CODUBI,$codubi);
           if ($manartlot=='S') $c->add(CaartalmubiPeer::NUMLOT,$numlot);
           $alm = CaartalmubiPeer::doSelectOne($c);
           if ($alm)
           {
             $exiact=$alm->getExiact(true);
             if ($manartlot=='S')
                 $numlot=$alm->getNumlot();
             return true;
           }
           else
           {
              $exiact=0;
              return false;
           }
       }
     }

    public static function TraspasarInventario($fecinv,$codalm='',$codubi='')
    {
   //Datos Inventario fisico
    if($codubi!='' && $codalm!='')
    {
        $c = new Criteria();
        $c->add(CainvfisPeer::FECINV,$fecinv);
        $c->add(CainvfisPeer::CODALM,$codalm);
        $c->add(CainvfisPeer::CODUBI,$codubi);
        $resinvfis=CainvfisPeer::doSelect($c);
    }elseif($codalm!='')
    {
	$c = new Criteria();
        $c->add(CainvfisPeer::FECINV,$fecinv);
        $c->add(CainvfisPeer::CODALM,$codalm);
        $resinvfis=CainvfisPeer::doSelect($c);
    }else
    {
        $c = new Criteria();
        $c->add(CainvfisPeer::FECINV,$fecinv);
        $resinvfis=CainvfisPeer::doSelect($c);
    }
    foreach ($resinvfis as $datinvfis)
   	{
          #TODO ESTO SE COMENTO PORQUE ASI LO DECIDIO LEOBARDO, YA QUE SOLO DEBE
          //GUARDAR Y BUSCAR EN  EN CAALMART Y CAINVIFS
		/*$c = new Criteria();
		$c->add(CainvfisubiPeer::FECINV,$fecinv);
    	$c->add(CainvfisubiPeer::CODART,$datinvfis->getCodart());
    	$c->add(CainvfisubiPeer::CODALM,$datinvfis->getCodalm());
    	$resinfisubi=CainvfisubiPeer::doSelect($c);
        foreach ($resinfisubi as $datinvfisubi)
   	    {
   	    	$c = new Criteria();
    		$c->add(CaartalmubiPeer::CODART,$datinvfisubi->getCodart());
    		$c->add(CaartalmubiPeer::CODALM,$datinvfisubi->getCodalm());
    		$c->add(CaartalmubiPeer::CODUBI,$datinvfisubi->getCodubi());
    		$caartalmubi=CaartalmubiPeer::doSelectOne($c);
    		if ($caartalmubi)//existe solo se actualiza la existencia actual
    		{
    			$caartalmubi->setExiact($datinvfisubi->getExiact());
    			$caartalmubi->save();
    		}
    		else//no existe esa existencia por articulo, almacen y ubicacion entonces se incluye
    		{
		          $newcaartalmubi= new Caartalmubi();
		          $newcaartalmubi->setCodart($datinvfisubi->getCodart());
		          $newcaartalmubi->setCodalm($datinvfisubi->getCodalm());
		          $newcaartalmubi->setCodubi($datinvfisubi->getCodubi());
		          $newcaartalmubi->setExiact($datinvfisubi->getExiact());
		          $newcaartalmubi->save();
    		}//$caartalmubi
   	    }//foreach ($resinfisubi as $datinvfisubi)*/

            if($datinvfis->getCodubi()!='')
            {
                $c = new Criteria();
                $c->add(CaartalmubiPeer::CODART,$datinvfis->getCodart());
                $c->add(CaartalmubiPeer::CODALM,$datinvfis->getCodalm());
                $c->add(CaartalmubiPeer::CODUBI,$datinvfis->getCodubi());
                $caartalmubi=CaartalmubiPeer::doSelectOne($c);
                if ($caartalmubi)//existe solo se actualiza la existencia actual
                {
                        $caartalmubi->setExiact($datinvfis->getExiact());
                        $caartalmubi->save();
                        
                        $c = new Criteria();
                $c->add(CaartalmPeer::CODART,$datinvfis->getCodart());
                $c->add(CaartalmPeer::CODALM,$datinvfis->getCodalm());
                $caartalm=CaartalmPeer::doSelectOne($c);
                if ($caartalm)//existe solo se actualiza la existencia actual
                {
                                $caartalm->setExiact(($caartalm->getExiact()-$caartalmubi->getExiact())+$datinvfis->getExiact());
                        $caartalm->save();
                }
                }
                else//no existe esa existencia por articulo y almacen entonces se incluye
                {
                  $newcaartalmubi= new Caartalmubi();
                  $newcaartalmubi->setCodart($datinvfis->getCodart());
                  $newcaartalmubi->setCodalm($datinvfis->getCodalm());
                  $newcaartalmubi->setCodubi($datinvfis->getCodubi());
                  $newcaartalmubi->setExiact($datinvfis->getExiact());
                  $newcaartalmubi->setEximin(0);
                  $newcaartalmubi->setEximax(0);
                  $newcaartalmubi->setPtoreo(0);
                  $newcaartalmubi->save();
                  
                    $c = new Criteria();
                    $c->add(CaartalmPeer::CODART,$datinvfis->getCodart());
                    $c->add(CaartalmPeer::CODALM,$datinvfis->getCodalm());
                    $caartalm=CaartalmPeer::doSelectOne($c);
                    if ($caartalm)//existe solo se actualiza la existencia actual
                    {
                            $caartalm->setExiact($caartalm->getExiact()+$datinvfis->getExiact());
                            $caartalm->save();
                    }
                    else//no existe esa existencia por articulo, almacen y ubicacion entonces se incluye
                    {
                  $newcaartalm= new Caartalm();
                  $newcaartalm->setCodart($datinvfis->getCodart());
                  $newcaartalm->setCodalm($datinvfis->getCodalm());
                              $newcaartalm->setCodubi('');
                  $newcaartalm->setExiact($datinvfis->getExiact());
                  $newcaartalm->setEximin(0);
                  $newcaartalm->setEximax(0);
                  $newcaartalm->setPtoreo(0);
                  $newcaartalm->save();
                    }//$caartalmubi
                }//$caartalm

            }else
            {
                $c = new Criteria();
                $c->add(CaartalmPeer::CODART,$datinvfis->getCodart());
                $c->add(CaartalmPeer::CODALM,$datinvfis->getCodalm());
                $caartalm=CaartalmPeer::doSelectOne($c);
                if ($caartalm)//existe solo se actualiza la existencia actual
                {
                        $caartalm->setExiact($datinvfis->getExiact());
                        $caartalm->save();
                }
                else//no existe esa existencia por articulo y almacen entonces se incluye
                {
                  $newcaartalm= new Caartalm();
                  $newcaartalm->setCodart($datinvfis->getCodart());
                  $newcaartalm->setCodalm($datinvfis->getCodalm());
                  $newcaartalm->setExiact($datinvfis->getExiact());
                  $newcaartalm->setEximin(0);
                  $newcaartalm->setEximax(0);
                  $newcaartalm->setPtoreo(0);
                  $newcaartalm->save();


                }//$caartalm
            }

	  $c = new Criteria();
	  $c->add(CaregartPeer::CODART,$datinvfis->getCodart());
	  $arti = CaregartPeer::doSelectOne($c);
	  if ($arti)
	  {
                 $arti->setInvini($datinvfis->getExiact());
	         $arti->save();
	   }
	  //Actualizar el montotal por por articulo
	  $sql = "UPDATE CAREGART SET EXITOT=(SELECT coalesce(SUM(EXIACT),0) FROM CAARTALM WHERE CODART='".$datinvfis->getCodart()."') WHERE CODART='".$datinvfis->getCodart()."'";
          Herramientas::BuscarDatos($sql, $output);
          
          $datinvfis->setFectras(date('Y-m-d'));
          $datinvfis->save();

   	}// foreach ($resinvfis as $datinvfis)

    }
    
    public static function buscarDetalleSD($capdaoc,$grid,&$arredet)
    {
        $arredet=array();
        $x=$grid[0];
	$j=0;
        while ($j<count($x))
        {
            if ($x[$j]->getCheck()=='1')
            {
                $p= new Criteria();
                $p->add(CaentpdaPeer::ORDCOM,$x[$j]->getOrdcom());
                $result= CaentpdaPeer::doSelect($p);
                if ($result)
                {
                    foreach ($result as $objresult)
                    {
                        $l=count($arredet)+1;
                        $arredet[$l-1]["ordcom"]=$objresult->getOrdcom();
                        $q= new Criteria();
                        $q->add(CaordcomPeer::ORDCOM,$objresult->getOrdcom());
                        $resul= CaordcomPeer::doSelectOne($q);
                        if ($resul)
                        {
                          $arredet[$l-1]["codpro"]=$resul->getCodpro();       
                        }                        
                        $arredet[$l-1]["codart"]=$objresult->getCodart();
                        $arredet[$l-1]["desart"]=$objresult->getDesart();
                        $arredet[$l-1]["canart"]=number_format($objresult->getCanart(),2,',','.');
                        $p= new Criteria();
                        $p->add(CaunialartPeer::CODART,$objresult->getCodart());
                        $p->add(CaunialartPeer::UNIALT,'TM');
                        $regi= CaunialartPeer::doSelectOne($p);
                        if ($regi)
                        {
                            $calculo=$objresult->getCanart()*$regi->getRelart();
                            $arredet[$l-1]["tmart"]=number_format($calculo,2,',','.');
                        }else $arredet[$l-1]["tmart"]="0,00";
                        $arredet[$l-1]["fecent"]=$objresult->getFecent();
                        $arredet[$l-1]["tiptra"]=$objresult->getTiptra();
                        $arredet[$l-1]["dirori"]=$objresult->getDirori();
                        $arredet[$l-1]["id"]="9";
                    }
                }
            }
            $j++;
        }
    }
    
public static function generarasientosSal($salida,$grid,&$arrasientos,&$acumdeb,&$pos,&$msj3)
   {
        $arrasientos=array();
        $pos=0;
        $msj3=-1;

        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {

          $c= new Criteria();
          $c->add(CaregartPeer::CODART,$x[$j]->getCodart());
          $regis = CaregartPeer::doSelectOne($c);
          if ($regis)
          {
            /*$y= new Criteria();
            $y->add(CaartreqPeer::REQART,$despacho->getReqart());
            $y->add(CaartreqPeer::CODART,$x[$j]->getCodart());
            $resi= CaartreqPeer::doSelectOne($y);
            if ($resi)
            {
                $costo=$resi->getMontot()/$resi->getCanreq();
            }*/
            if (!$regis->getPerbienes())
            {
                if($regis->getCtadef()!='')
                {
                  $cuenta=$regis->getCtadef();
                }else {$cuenta='';}

                $b= new Criteria();
                $b->add(ContabbPeer::CODCTA,$cuenta);
                $regis2 = ContabbPeer::doSelectOne($b);
                if ($regis2)
                {                    
                    $montodes= $x[$j]->getCantot()*$x[$j]->getCosart();//$costo;
                    if (!Factura::buscarAsientos($cuenta,'D',$montodes,$arrasientos,$pos))
                    {
                      Factura::guardarAsientos($cuenta,$regis2->getDescta(),'D',$montodes,$arrasientos,$pos);
                    }
                }
                else{
                    $msj3=212;
                    return false;
                }

                if($regis->getCodcta()!='')
                {
                  $cuenta2=$regis->getCodcta();
                }else {$cuenta2='';}

                $b= new Criteria();
                $b->add(ContabbPeer::CODCTA,$cuenta2);
                $regis2 = ContabbPeer::doSelectOne($b);
                if ($regis2)
                {
                    $montodes=$x[$j]->getCantot()*$x[$j]->getCosart();//$costo;
                    if (!Factura::buscarAsientos($cuenta2,'C',$montodes,$arrasientos,$pos))
                    {
                      Factura::guardarAsientos($cuenta2,$regis2->getDescta(),'C',$montodes,$arrasientos,$pos);
                    }
                }
                else{
                    $msj3=210;
                    return false;
                }
            }
          }
          $j++;
        }

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
          if (H::toFloat($acumdeb)!=H::toFloat($acumcre))
          {
             $msj3=519;
              return false;
          }

      return true;
   }

    public static function Generar_Comprobante_Contable_Sal(&$salida,$arrasientos,$acumdeb,$pos)
    {
       if (count($arrasientos)>0)
       {
        $reftra="S".substr($salida->getCodsal(),2,7);
        $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $numerocomprob= $reftra;
        }else $numerocomprob= Comprobante::Buscar_Correlativo($salida->getFecsal());

            $contabc = new Contabc();
            $contabc->setNumcom($numerocomprob);
            $contabc->setReftra($reftra);
            $contabc->setFeccom($salida->getFecsal());
            $contabc->setDescom($salida->getDessal());
            $contabc->setStacom('D');
            $contabc->setTipcom('ALM');
            $contabc->setMoncom($acumdeb);
            $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
            $contabc->setLoguse($loguse);
            $contabc->save();

       if ($pos!=0)
        {
          $i=0;
          $acumdeb=0;
          while ($i<=($pos-1))
          {
                if ($arrasientos[$i]["2"]!="")
                {
                  $contabc1= new Contabc1();
                  $contabc1->setNumcom($numerocomprob);
                  $contabc1->setFeccom($salida->getFecsal());
                  $contabc1->setCodcta($arrasientos[$i]["0"]);
                  $numasi= $i +1;
                  $contabc1->setNumasi($numasi);
                  $contabc1->setRefasi($reftra);
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
          $salida->setNumcom($numerocomprob);  //actualizo el numero de comprobante en la salida
          $salida->save();
        }
       }

    return true;
    } 

  public static function posicion_en_el_grid($arreglo,$codigo)
  {
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
      if ($manartlot=='S')
        $codigo2=$arreglo[$ind]["codalm"].'-'.$arreglo[$ind]["codubi"].'-'.$arreglo[$ind]["numlot"].'-'.$arreglo[$ind]["codart"];
      else
        $codigo2=$arreglo[$ind]["codalm"].'-'.$arreglo[$ind]["codubi"].'-'.$arreglo[$ind]["codart"];
        if ($codigo2==$codigo)
        { 
            $enc=true;        
        }
      $ind++;
    }

    if ($enc)
    { 
        $posicionenelgrid=$ind;
        
    }else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

public static function validacionTVA($catraalm,$grid,&$codigo)
  {
    $codigo="";
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    $datosGrid = array();
      $x=$grid[0];
      $j=0;
      while ($j<count($x)) {
        if ($x[$j]->getAlmori()!="" && $x[$j]->getCodubiori()!="" && $x[$j]->getCodart()!="")
        {
          if ($manartlot=='S')
            $cadena=$x[$j]->getAlmori().'-'.$x[$j]->getCodubiori().'-'.$x[$j]->getNumlotori().'-'.$x[$j]->getCodart();
          else
            $cadena=$x[$j]->getAlmori().'-'.$x[$j]->getCodubiori().'-'.$x[$j]->getCodart();
          $pos=  self::posicion_en_el_grid($datosGrid,$cadena);
          if ($pos==0)
          {
           $i=count($datosGrid)+1;
           $datosGrid[$i-1]["codalm"]=$x[$j]->getAlmori();
           $datosGrid[$i-1]["codubi"]=$x[$j]->getCodubiori();
           $datosGrid[$i-1]["codart"]=$x[$j]->getCodart();
           $datosGrid[$i-1]["cantra"]=H::toFloat($x[$j]->getCanart());
           if ($manartlot=='S')
            $datosGrid[$i-1]["numlot"]=$x[$j]->getNumlotori();
          }
          else
          {
           $datosGrid[$pos-1]["cantra"]=$datosGrid[$pos-1]["cantra"]+H::toFloat($x[$j]->getCanart());
          }           
        }
        $j++;
      }

      $p=0;
      while ($p<count($datosGrid))
      {
        if ($manartlot=='S')
          $numlot=$datosGrid[$p]["numlot"];
        else
          $numlot="";
        $exiact=0;
        if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($datosGrid[$p]["codart"],$datosGrid[$p]["codalm"],$datosGrid[$p]["codubi"],$exiact,$numlot)) {
          $disponible =$exiact;
          if($datosGrid[$p]["cantra"] > $disponible){
              $codigo='. El Artículo: '.$datosGrid[$p]["codart"].' en el Almacén: '.$datosGrid[$p]["codalm"].' y Ubicación: '.$datosGrid[$p]["codubi"].' tiene disponible: '.$disponible;
              return 3022;
          }
        }else{
           $codigo='. Artículo: '.$datosGrid[$p]["codart"].' Almacén: '.$datosGrid[$p]["codalm"].' y Ubicación: '.$datosGrid[$p]["codubi"];
           return 3021;
        }
        $p++;
      }   
          
    return -1;
  }      

  public static function salvarTrasferenciaArticulos($clasemodelo,$grid){
    $x=$grid[0];
    if (!$clasemodelo->getId()){
      $correl=false;
      if ($clasemodelo->getCodtra()=='########')
      {
        $cadefart = new Cadefart();
        $r = $cadefart->getSecalmcorre();
        $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
        $clasemodelo->setCodtra(str_pad($r, 8, '0', STR_PAD_LEFT));
        $correl=true;
      }
      else
      {
        $clasemodelo->setCodtra(str_replace('#','0',$clasemodelo->getCodtra()));
        $clasemodelo->setCodtra(str_pad($clasemodelo->getCodtra(), 8, '0', STR_PAD_LEFT));
      }

      $clasemodelo->setAlmori($x[0]->getAlmori());
      $clasemodelo->setAlmdes($x[0]->getAlmdes());
      if ($correl) H::getSalvarCorrelativo('almcorre','cadefart','cadefart',$r,$msg);
      $clasemodelo->save();

      self::salvarDetalleArticulosTras($clasemodelo,$grid);
    }

    return -1;
  } 

  public static function salvarDetalleArticulosTras($clasemodelo,$grid){
      $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
      $x=$grid[0];
      $j=0;
      while ($j<count($x)) {
        if ($x[$j]->getAlmori()!="" && $x[$j]->getCodubiori()!="" && $x[$j]->getCodart()!="" && $x[$j]->getAlmdes()!="" && $x[$j]->getCodubides()!="" && $x[$j]->getCanart()>0)
        {
          $x[$j]->setCodtra($clasemodelo->getCodtra());
          if ($manartlot=='S') {
            if ($x[$j]->getNumlotdes()=='')  
              $x[$j]->setNumlotdes($x[$j]->getNumlotori());
          }
          $x[$j]->save();
        }
        $j++;
      }
      self::Actualizar_ArticulosSalvar('D',$x);
      self::Actualizar_ArticulosSalvar('S',$x);      
  }

  public static function Actualizar_ArticulosSalvar($bandera,$x)
  {
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    $j=0;
    while ($j<count($x)) {
      if ($x[$j]->getAlmori()!="" && $x[$j]->getCodubiori()!="" && $x[$j]->getCodart()!="" && $x[$j]->getAlmdes()!="" && $x[$j]->getCodubides()!="" && $x[$j]->getCanart()>0)
      {        
        if ($bandera=='D')
        {
          $almacen = $x[$j]->getAlmori();
          $ubicacion=$x[$j]->getCodubiori();
          if ($manartlot=='S')
            $numlot=$x[$j]->getNumlotori();          
        }
        else
        {
          $almacen = $x[$j]->getAlmdes();
          $otralmacen=$x[$j]->getAlmori();
          $ubicacion=$x[$j]->getCodubides();
          $otrubicacion=$x[$j]->getCodubiori();
          if ($manartlot=='S')
            $numlot=$x[$j]->getNumlotdes();
        }

        $c= new Criteria();
        $c->add(CaartalmubiPeer::CODALM,$almacen);
        $c->add(CaartalmubiPeer::CODUBI,$ubicacion);
        $c->add(CaartalmubiPeer::CODART,$x[$j]->getCodart());
        if ($manartlot=='S') $c->add(CaartalmubiPeer::NUMLOT,$numlot);
        $caartalm_up = CaartalmubiPeer::doSelectOne($c);
        if ($caartalm_up)
        {
          if ($bandera=='S')
          {
            $caartalm_up->setExiact($caartalm_up->getExiact()+H::toFloat($x[$j]->getCanart()));
            $caartalm_up->save();
          }
          else
          {
            if ((($caartalm_up->getExiact())-(H::toFloat($x[$j]->getCanart())))>=0)
            {
              $caartalm_up->setExiact(($caartalm_up->getExiact())-(H::toFloat($x[$j]->getCanart())));
              $caartalm_up->save();
            }
          }
        }
        else
        {//si  no existe el registro en la tabla CAARTALMUBI, hay q crearla con la disponibilidad transferida
          if ($bandera=='S')
          {
            $c= new Criteria();
            $c->add(CaartalmubiPeer::CODALM,$otralmacen);
            $c->add(CaartalmubiPeer::CODUBI,$otrubicacion);
            $c->add(CaartalmubiPeer::CODART,$x[$j]->getCodart());
            if ($manartlot=='S') $c->add(CaartalmubiPeer::NUMLOT,$numlot);
            $caartalm = CaartalmubiPeer::doSelectOne($c);
            if ($caartalm)
            {
              $caartalm_new = new Caartalmubi();
              $caartalm_new->setCodalm($almacen);
              $caartalm_new->setCodart($x[$j]->getCodart());
              $caartalm_new->setCodubi($ubicacion);
              $caartalm_new->setExiact($x[$j]->getCanart());
              if ($manartlot=='S') $caartalm_new->setNumlot($numlot);
              $caartalm_new->save();
            }
          }
        }

        $exiact2 = 0;
        $c= new Criteria();
        $c->add(CaartalmubiPeer::CODALM,$almacen);
        $c->add(CaartalmubiPeer::CODART,$x[$j]->getCodart());
        if ($manartlot=='S') $c->add(CaartalmubiPeer::NUMLOT,$numlot);
        $caartalmubi2 = CaartalmubiPeer::doSelect($c);
        if ($caartalmubi2) {
          foreach($caartalmubi2 as $rs)
          {
              $exiact2 += $rs->getExiact();
          }
        }

        $c= new Criteria();
        $c->add(CaartalmPeer::CODALM,$almacen);
        $c->add(CaartalmPeer::CODART,$x[$j]->getCodart());
        $caartalm_up = CaartalmPeer::doSelectOne($c);
        if($caartalm_up)
        {
            $caartalm_up->setExiact($exiact2);
            $caartalm_up->save();
        }else {
          if ($bandera=='S')
          {
            $c= new Criteria();
            $c->add(CaartalmPeer::CODALM,$otralmacen);
            $c->add(CaartalmPeer::CODART,$x[$j]->getCodart());
            $caartalmori = CaartalmPeer::doSelectOne($c);
            if ($caartalmori)
            {
              $caartalm_new = new Caartalm();
              $caartalm_new->setCodalm($almacen);
              $caartalm_new->setCodart($x[$j]->getCodart());
              $caartalm_new->setExiact($x[$j]->getCanart());
              $caartalm_new->save();
            }
          }
        }

      }
      $j++;
    }
    return true;
  }  

public static function Actualizar_ArticulosEliminar($bandera,$cadettra)
{
   $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
   foreach ($cadettra as $objdel) {
    if ($bandera=='S')
    {
        $almacen = $objdel->getAlmori();
        $otralmacen=$objdel->getAlmdes();
        $ubicacion=$objdel->getCodubiori();
        $otrubicacion=$objdel->getCodubides();
        if ($manartlot=='S')
          $numlot=$objdel->getNumlotori();
    }
    else
    {
        $almacen = $objdel->getAlmdes();
        $ubicacion=$objdel->getCodubides();
        if ($manartlot=='S')
          $numlot=$objdel->getNumlotdes();
    }

    $c= new Criteria();
    $c->add(CaartalmubiPeer::CODALM,$almacen);
    $c->add(CaartalmubiPeer::CODUBI,$ubicacion);
    $c->add(CaartalmubiPeer::CODART,$objdel->getCodart());
    if ($manartlot=='S') $c->add(CaartalmubiPeer::NUMLOT,$numlot);
    $caartalm_up = CaartalmubiPeer::doSelectOne($c);
    if ($caartalm_up)
    {
      if ($bandera=='S')
      {
        $caartalm_up->setExiact($caartalm_up->getExiact()+$objdel->getCanart());
        $caartalm_up->save();
      }
      else
      {
        if ((($caartalm_up->getExiact())-($objdel->getCanart()))>=0)
        {
          $caartalm_up->setExiact(($caartalm_up->getExiact())-($objdel->getCanart()));
          $caartalm_up->save();
        }
      }
    }
    else
    {
      if ($bandera=='S')
      {
        $c= new Criteria();
        $c->add(CaartalmubiPeer::CODALM,$otralmacen);
        $c->add(CaartalmubiPeer::CODUBI,$otrubicacion);
        $c->add(CaartalmubiPeer::CODART,$objdel->getCodart());
        if ($manartlot=='S') $c->add(CaartalmubiPeer::NUMLOT,$numlot);
        $caartalm = CaartalmubiPeer::doSelectOne($c);
        if ($caartalm)
        {
          $caartalm_new = new Caartalmubi();
          $caartalm_new->setCodalm($almacen);
          $caartalm_new->setCodart($objdel->getCodart());
          $caartalm_new->setCodubi($ubicacion);
          $caartalm_new->setExiact($objdel->getCanart());
          if ($manartlot=='S') $caartalm_new->setNumlot($numlot);
          $caartalm_new->save();
        }
      }
    }

    $exiact2 = 0;
    $c= new Criteria();
    $c->add(CaartalmubiPeer::CODALM,$almacen);
    $c->add(CaartalmubiPeer::CODART,$objdel->getCodart());
    if ($manartlot=='S') $c->add(CaartalmubiPeer::NUMLOT,$numlot);
    $caartalmubi2 = CaartalmubiPeer::doSelect($c);
    if ($caartalmubi2) {
      foreach($caartalmubi2 as $rs)
      {
          $exiact2 += $rs->getExiact();
      }
    }

    $c= new Criteria();
    $c->add(CaartalmPeer::CODALM,$almacen);
    $c->add(CaartalmPeer::CODART,$objdel->getCodart());
    $caartalm_up = CaartalmPeer::doSelectOne($c);
    if($caartalm_up)
    {
        $caartalm_up->setExiact($exiact2);
        $caartalm_up->save();
    }     
   }
    return true;
  }  

  public static function validacionTVAEliminar($catraalm,$cadettra,&$codigo)
  {
    $codigo="";
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    $datosGrid = array();
    foreach ($cadettra as $objdel) {
      if ($manartlot=='S')
        $cadena=$objdel->getAlmdes().'-'.$objdel->getCodubides().'-'.$objdel->getNumlotdes().'-'.$objdel->getCodart();
      else
        $cadena=$objdel->getAlmdes().'-'.$objdel->getCodubides().'-'.$objdel->getCodart();
      $pos=  self::posicion_en_el_grid($datosGrid,$cadena);
      if ($pos==0)
      {
         $i=count($datosGrid)+1;
         $datosGrid[$i-1]["codalm"]=$objdel->getAlmdes();
         $datosGrid[$i-1]["codubi"]=$objdel->getCodubides();
         $datosGrid[$i-1]["codart"]=$objdel->getCodart();
         $datosGrid[$i-1]["cantra"]=$objdel->getCanart();
         if ($manartlot=='S')
           $datosGrid[$i-1]["numlot"]=$objdel->getNumlotdes();
      }
      else
      {
         $datosGrid[$pos-1]["cantra"]=$datosGrid[$pos-1]["cantra"]+$objdel->getCanart();
      }        
    }      

    $p=0;
    while ($p<count($datosGrid))
    {
      if ($manartlot=='S')
        $numlot=$datosGrid[$p]["numlot"];
      else
        $numlot="";
      $exiact=0;
      if (Almacen::ExistenciayObtenerDisponibilidadAlmArt($datosGrid[$p]["codart"],$datosGrid[$p]["codalm"],$datosGrid[$p]["codubi"],$exiact,$numlot)) {
        $disponible =$exiact;
        if($datosGrid[$p]["cantra"] > $disponible){
            $codigo='. El Artículo: '.$datosGrid[$p]["codart"].' en el Almacén: '.$datosGrid[$p]["codalm"].' y Ubicación: '.$datosGrid[$p]["codubi"].' tiene disponible'.$disponible;
            return 3023;
        }
      }else{
         $codigo='. Artículo: '.$datosGrid[$p]["codart"].' Almacén: '.$datosGrid[$p]["codalm"].' y Ubicación: '.$datosGrid[$p]["codubi"];
         return 3024;
      }
      $p++;
    }   
          
    return -1;
  }     
}
?>
