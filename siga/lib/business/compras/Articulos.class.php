<?php

/**
 * Articulos: Clase estática para el manejo de los Artículos a comprar
 *
 * @package    Roraima
 * @subpackage compras
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Articulos.class.php 41835 2010-12-23 21:38:05Z cramirez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Articulos
{
/**************************************************************************
**        Registro de Articulos Formulario AmlRegart                     **
**                                                                       **
**************************************************************************/
  /**
   * Función para registrar artículos
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */
    public static function Grabar_Articulo($articulo,$grid,$grid2,$grid3,$grid4,$grid5,$grid6,$grid7)
    {
      // si el articulo es nuevo se iguala distot a exitot
      if($articulo->getId()=='')
      {
       $articulo->setDistot($articulo->getExitot());
       $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
       if ($modulo=='facturacion')
         $articulo->setTipreg('F'); // para identificar si el articulo se registro por facturacion
      }

      //Se graba el Artículo      
      if ($articulo->getGencorart()!="S")
      { $articulo->save();
      }
      else {
        if (substr($articulo->getCodart(),-1,1)=='#')
        {
	      $mascaraarticulo=Herramientas::ObtenerFormato('Cadefart','Forart');
	      $longmas=strlen($mascaraarticulo);
	      $lonpadre=strlen($articulo->getCodart());
	      $padre=substr($articulo->getCodart(),0,strlen($articulo->getCodart())-2);
	      $lonultniv=strlen(substr($mascaraarticulo,strlen($padre) +1,$longmas));
	      $sql="select max(substring(codart,".$lonpadre.",length(codart))) as ultimo from caregart where codart like ('".$padre."%') and
	      length(codart)='".$longmas."' and tipo='".$articulo->getTipo()."' ";
	      if (Herramientas::BuscarDatos($sql,$result))
	      {
	        $r= $result[0]["ultimo"] + 1;
	        $codart=$padre."-".str_pad($r, $lonultniv, '0', STR_PAD_LEFT);
	      }
	      else{
	      	$r=1;
	      	$codart=$padre."-".str_pad($r, $lonultniv, '0', STR_PAD_LEFT);
	      }
	       $articulo->setCodart($codart);
	       $articulo->save();
      }
      else $articulo->save();
      }
      // Se graban los almacenes del articulo
      self::Grabar_ArticulosAlmacen($articulo,$grid);
      self::Grabar_Partidas_Articulos($articulo,$grid3);
      self::Grabar_Unidades_Articulos($articulo,$grid2);
      self::Grabar_Alternos_Articulos($articulo,$grid4);
      self::Grabar_Partes_Fabricantes($articulo,$grid5);
      self::Grabar_Referencia_Cruzada($articulo,$grid6);
      self::Grabar_Apl_Montaje($articulo,$grid7);
    }

     /**
   * Función para registrar los artículos en los diferentes Alamacenes
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */
  public static function Grabar_ArticulosAlmacen($articulo,$grid)
  {
  $codart=$articulo->getCodart();
  $dateFormat = new sfDateFormat('es_VE');
  $x=$grid[0];
  $j=0;
  while ($j<count($x))
  {
    if ($x[$j]->getCodalm()!="")
    {
      if ($x[$j]->getCodart()=="") $x[$j]->setCodart($codart);
        $x[$j]->save();
    //grabar Articulos por almacen y ubicación Caartalmubi

     if ($x[$j]->getUbicacion()!='')
       { 
   
        $c = new Criteria();
        $c->add(CaartalmubiPeer::CODART,$codart);
        $c->add(CaartalmubiPeer::CODALM,$x[$j]->getCodalm());
        CaartalmubiPeer::doDelete($c);

          $cadenaubi=split('!',$x[$j]->getUbicacion());
          

          $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
          $r=0;
          while ($r<(count($cadenaubi)-1))
          {
            $aux=$cadenaubi[$r];
            $aux2=split('_',$aux);
              //if ($aux2[0]!="" && $aux2[2]>0)
            if ($aux2[0]!="")
            {
         $q= new Criteria();
         $q->add(CaalmubiPeer::CODALM,$x[$j]->getCodalm());
         $q->add(CaalmubiPeer::CODUBI,$aux2[0]);
         $resu=CaalmubiPeer::doSelectOne($q);
         if ($resu) {
                
              $caartalmubi= new Caartalmubi();
              $caartalmubi->setCodart($codart);
              $caartalmubi->setCodalm($x[$j]->getCodalm());
              $caartalmubi->setCodubi($aux2[0]);
              $caartalmubi->setExiact($aux2[2]);
              if ($manartlot=='S')
              {
                  $caartalmubi->setNumlot($aux2[3]);
                  if ($aux2[4]!="")
                  {
                        $fecela_aux=split("/",$aux2[4]);
                        $fecela = $dateFormat->format($aux2[4], 'i', $dateFormat->getInputPattern('d'));
                        if (checkdate(intval($fecela_aux[1]),intval($fecela_aux[0]),intval($fecela_aux[2])))
                         $caartalmubi->setFecela($fecela);
                        else  $caartalmubi->setFecela(null);
                  }

                  if ($aux2[5]!="")
                  {
                        $fecven_aux=split("/",$aux2[5]);
                        $fecven = $dateFormat->format($aux2[5], 'i', $dateFormat->getInputPattern('d'));
                        if (checkdate(intval($fecven_aux[1]),intval($fecven_aux[0]),intval($fecven_aux[2])))
                         $caartalmubi->setFecven($fecven);
                        else  $caartalmubi->setFecven(null);
                  }
              }

              $caartalmubi->save();
         }
            }
            $r++;
          }
      }
    }
  $j++;
  }

   $z=$grid[1];
    $j=0;
    while ($j<count($z))
    {
          $c = new Criteria();
        $c->add(CaartalmubiPeer::CODART,$codart);
        $c->add(CaartalmubiPeer::CODALM,$z[$j]->getCodalm());
        CaartalmubiPeer::doDelete($c);
        $z[$j]->delete();
        $j++;
    }
  }



  /**
   * Función Principal para guardar datos del formulario Almregart
   * TODO Esta función (y todas las demás de su clase) deben retornar un
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */
    public static function salvarAlmregart($articulo,$grid,$grid2,$grid3,$grid4,$grid5,$grid6,$grid7){
      self::Grabar_Articulo($articulo,$grid,$grid2,$grid3,$grid4,$grid5,$grid6,$grid7);
    }


  /**
   * Función Principal para validar datos del formulario Almregart
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */
    public static function validarAlmregart($articulo,$grid) {

      /*$descodbar = H::getConfApp2('descodbar','compras','almregart');
      if($descodbar==true || $descodbar=='S'){
        if($articulo->getCodbar()=='' && $articulo->UltimoNivel()) return 2105;
      }*/

      $error = self::validarCodart($articulo);
      if($error!=-1) return $error;
      $error = self::validarAlmacenes($grid);
      return $error;
    }

    public static function validarAlmacenes($grid)
    {
      $x=$grid[0];
      foreach($x as $almacen){
        if($almacen->getId()=='' && $almacen->getUbicacion()=='') return 190;
      }

      /*foreach($x as $almacen){
        $cantalm = 0;
        foreach($x as $alm){
          if($almacen->getCodalm() == $alm->getCodalm()) $cantalm++;
        }
        if($cantalm>1) return 191;
      }*/

      return -1;
    }

  /**
   * Función Principal para validar datos del formulario Almregart
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @return void
   */

  public static function validarCodart($articulo,$valgrid="S",&$datos=array())
  {

         $codart=$articulo->getCodart();
         $formato=Herramientas::ObtenerFormato('Cadefart','Forart');
         $posrup1=Herramientas::instr($formato,'-',0,1);
         $posrup1=$posrup1-1;
         if (strlen(trim($codart))<$posrup1)
         {
           return 101;
         }

    Herramientas::FormarCodigoPadre($codart,$nivelcodigo,$ultimo,$formato);
      //verifico si el padre existe en la tabla registro de artículos, y si es del mismo tipo que se esta
      //intentando guardar Artículo o Servicio
      $c= new Criteria();
    $c->add(CaregartPeer::CODART,$ultimo);
    $c->add(CaregartPeer::TIPO, $articulo->getTipo());
    $caregart = CaregartPeer::doSelectOne($c);
    if (!$caregart)
      {
    if ($nivelcodigo == 0)
            return 100;
      }
      else//existen datos
      {
      	$datos["codcta"]=$caregart->getCodcta();
      	$datos["codpar"]=$caregart->getCodpar();
      	$datos["ramart"]=$caregart->getRamart();
      }
     //validacion partida este informado si el articulo/servicio es de ultimo nivel
    $novalpar="";  // Se creo para que no valide si tiene partida cuando el articulo sea de ultimo nivel
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('compras',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['compras']))
	     if(array_key_exists('almregart',$varemp['aplicacion']['compras']['modulos'])){
	       if(array_key_exists('novalpar',$varemp['aplicacion']['compras']['modulos']['almregart']))
	       {
	       	$novalpar=$varemp['aplicacion']['compras']['modulos']['almregart']['novalpar'];
	       }
         }

     $cant=0;
     $lonart=strlen($codart);
     $lonmas=strlen($formato);
     if ($valgrid=="S")
     {        
       if ($novalpar!="S") {
        if ($lonart==$lonmas && $articulo->getCodpar()=="")
        {
          return 117;
        }
       }

     }//if ($valgrid=="S")
     $valcodsnc=H::getConfApp2('valcodsnc', 'compras', 'almregart');
     if ($valcodsnc=='S' && $valgrid=="S")
     {
       if ($lonart==$lonmas && $articulo->getCodartsnc()=='')
        return 3001;
     }

  return -1;

  }


  /**
   * Función Principal para verificar si un artículo tiene hijos
   *
   * @static
   * @param $codart Codigo del Articulo el cual se va a verificar si posee hijos
   * @return void
   */
    public static function Buscar_CodigoHijo($codart)
    {
  $sql = "Select * from Caregart where codart Like '". $codart. "%'";
     if (Herramientas::BuscarDatos($sql,$result))
     {
      if (count($result)>1)
           return true;
      else
          return false;
     }
     else
     {
      return false;
     }
    }

    public static function Hay_movimientos($codart)
    {
     $sql = "Select * From CaArtSol Where Rtrim(CodArt) = '".$codart ."'";
     if (Herramientas::BuscarDatos($sql,$result))
     {
       return true;
     }
    else
    {
       $sql = "Select * From CaArtOrd Where Rtrim(CodArt) = '" .$codart. "'";
       if (Herramientas::BuscarDatos($sql,$result))
       {
          return true;
       }
       else
          return false;
     }//else
    }
  /**************************************************************************
   **           Fin Registro de Articulos Formulario AmlRegart              **
   **                                                                       **
   **************************************************************************/

/**************************************************************************
 **         Grid de la Requisición Formulario AmlReq                      **
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
public static function salvarAlmreqart($requisicion,$grid){
  self::Grabar_Requisicion($requisicion,$grid);
}

public static function Grabar_Requisicion($requisicion,$grid)
{
  //if (Herramientas::getVerCorrelativo('correq','cacorrel',&$r))
  if (true)
  {
    //Se graba la Requisición
    if ($requisicion->getReqart()=='########')
    {
      $cacorrel = new Cacorrel;
      $r = $cacorrel->getSecreq();      
      $encontrado=false;
      while (!$encontrado)
      {
        $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

        $sql="select reqart from careqart where reqart='".$numero."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $r =$cacorrel->getSecreq();   
        }
        else
        {
          $encontrado=true;
        }
      }
      $requisicion->setReqart(str_pad($r, 8, '0', STR_PAD_LEFT));
    }
    else
    {
      $r = null;
      $requisicion->setReqart(str_replace('#','0',$requisicion->getReqart()));
    }
    $requisicion->save();
    // Se graban los detalles de la Requisición
    self::Grabar_DetallesRequisicion($requisicion,$grid);
    if($r) Herramientas::getSalvarCorrelativo('correq','cacorrel','Requisición',$r,$msg);
  }
}
/**
 * Función para registrar los artículos en los diferentes Alamacenes
 *
 * @static
 * @param $articulo Object Artículo a guardar
 * @param $grid Array de Objects Almacen.
 * @return void
 */
 public static function Grabar_DetallesRequisicion($requisicion,$grid){
  $reqart=$requisicion->getReqart();
  $x=$grid[0];
  $j=0;
  while ($j<count($x)) {
    $x[$j]->setReqart($reqart);
    $monto="0,00";
    $x[$j]->setCanrec($monto);
    $x[$j]->save();
    $j++;
  }
  $z=$grid[1];
  $j=0;
  if (count($z)>0)
  {
  if (!empty($z[$j]))
   {
    while ($j<count($z))
     {
      $z[$j]->delete();
      $j++;
     }
   }//if (!empty($z[$j]))
  }
}
/**************************************************************************
 **           Fin Grid de la Requisición Formulario AmlReq                **
 **                       Jaime Suárez                                    **
**************************************************************************/


/**************************************************************************
**         Grid de la Requisición Formulario Almretser                   **
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
public static function salvarAlmretser($caretser,$grid){
  self::Grabar_Retenciones($caretser,$grid);
}

public static function Grabar_Retenciones($caretser,$grid)
{
  //$caretser->save();
  self::Grabar_DetallesRetenciones($caretser,$grid);
}
/**
 * Función para registrar los artículos en los diferentes Alamacenes
 *
 * @static
 * @param $articulo Object Artículo a guardar
 * @param $grid Array de Objects Almacen.
 * @return void
   */

public static function Grabar_DetallesRetenciones($caretser,$grid)
{
  $codser=$caretser->getCodser();
  $x=$grid[0];
  $j=0;
  while ($j<count($x)) {
    $x[$j]->setCodser($codser);
    $Codret=$x[$j]->getCodret();
    $x[$j]->setCodret($Codret);

    $x[$j]->save();
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


/**************************************************************************
**           Fin Grid de la Requisición Formulario AmlReq                **
**                       Jaime Suárez                                    **
**************************************************************************/





/**************************************************************************
**                          Entradas al Almacen                          **
**                                Miki                                   **
**************************************************************************/
  /**
   * Función para registrar entradas de almacen
   *
   * @static
   * @param $recepcion Object Canentalm a guardar
   * @param $grid Array de Objects DetalleRecepcion.
   * @param $coderr Array de Objects Código de error
   * @return void
   */
    public static function salvarAlmentalm($recepcion,$grid){
    //Modificacion
   if ($recepcion->getId())
   {
          //Se graba la recepcion
        $recepcion->save();
        // Se graban las entradas al almacen
        return -1;
    }
   else //INCLUSION
   {
   	  $tiecorr=false;
      //if (Herramientas::getVerCorrelativo('corent','cacorrel',&$r))
      if (true)
      {
        if ($recepcion->getRcpart()=='########')
        {
          $cacorrel = new Cacorrel();
          $r = $cacorrel->getSecent();
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $tiecorr=true;
          $recepcion->setRcpart(str_pad($r, 8, '0', STR_PAD_LEFT));
        }
      }
      $recepcion->setFecreg(date('Y-m-d'));
      
      $gencom=H::getConfApp2('gencom', 'compras', 'almentalm');
      if ($gencom=='S')
      {
           if (!self::generarasientosEnt($recepcion,$grid,$arrasientos,$acumdeb,$pos,$msj3))
           {
               return $msj3;
           }else {  
              //Primero se intenta actualizar los articulos, y el almacen, con la cantidad entrante de articulos
              //en el caso que no se pueda actualizar los artículos no se debe grabar el resto de la información
              //if (self::Actualizar_Articulos($recepcion,$grid,$coderr))
              //{
                  //Se graba la recepcion
                  if ($tiecorr) Herramientas::getSalvarCorrelativo('corent','cacorrel','Salidas',$r,$msg);
                  $recepcion->save();
                  self::Generar_Comprobante_Contable_Ent($recepcion,$arrasientos,$acumdeb,$pos);
                  // Se graban las entradas al almacen
                  self::Grabar_DetallesRecepcion($recepcion,$grid);
                  self::Actualizar_Articulos($recepcion,$grid,$coderr);
                  return -1;
              /*}
              else
              {
                  return $coderr;
              }*/
           }
      }else {
          //Primero se intenta actualizar los articulos, y el almacen, con la cantidad entrante de articulos
          //en el caso que no se pueda actualizar los artículos no se debe grabar el resto de la información
          //if (self::Actualizar_Articulos($recepcion,$grid,$coderr))
          //{
              //Se graba la recepcion
              if ($tiecorr) Herramientas::getSalvarCorrelativo('corent','cacorrel','Salidas',$r,$msg);
              $recepcion->save();
              // Se graban las entradas al almacen
              self::Grabar_DetallesRecepcion($recepcion,$grid);
              self::Actualizar_Articulos($recepcion,$grid,$coderr);
              return -1;
         /* }
          else
          {
              return $coderr;
          }*/
      }
   }//else (inclusiion)
   }

     /**
   * Función para registrar los artículos en los diferentes Alamacenes
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects DetalleAlmacen.
   * @return void
   */
    public static function Grabar_DetallesRecepcion($recepcion,$grid)
    {
    $rcpart=$recepcion->getRcpart();
    $x=$grid[0];
      $j=0;
      while ($j<count($x)) {
      $x[$j]->setRcpart($rcpart);
      $x[$j]->save();
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

    public static function Actualizar_Articulos($recepcion,$grid,&$msjerr)
    {
      $x=$grid[0];
      $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
      $actcosart=H::getConfApp2('actcosart', 'compras', 'almordcom');
      $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
		  $j=0;
		  $msjerr=-1;
		  while ($j<count($x))
		  {
		    $codarti    = $x[$j]->getCodart();
		    $dart       = $x[$j]->getDesart();
		    $cantd      = $x[$j]->getCanrec();
		    $costo      = $x[$j]->getCosart();
        $calmacen   = $x[$j]->getCodalm();
		    $cubicacion = $x[$j]->getCodubi();
		    $cnumjau   = $x[$j]->getNumjau();
		    $ctammet = $x[$j]->getTammet();
        if ($manartlot=='S')
            $numlot     = $x[$j]->getNumlot();

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

               $act1=$arti->getExitot() + $cantd;
               $dis1=$arti->getDistot() + $cantd;
               $arti->setExitot($act1);
               $arti->setDistot($dis1);
               if ($actcosart=='S'){
                if ($costo>$arti->getCosult())
                  $arti->setCosult($costo);
               }
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
    	         $c->add(CaartalmubiPeer::CODUBI,$cubicacion);
               if ($manartlot=='S')
                   $c->add(CaartalmubiPeer::NUMLOT,$numlot);
               $alm = CaartalmubiPeer::doSelectOne($c);
                if ($alm)
                {
      		        $act2=$alm->getExiact() + $cantd;
           	      $alm->setExiact($act2);
                  $alm->setFecven($x[$j]->getFecven());
                  $alm->setFecela($x[$j]->getFecela());
           	      $alm->save();
  			        }//if ($alm)
                else//if ($alm), //si no existe la existencia por almacen,ubicacion y lote, se incluye
    		     	  {
    		       	 	  $caartalmubi= new Caartalmubi();
    			       	  $caartalmubi->setCodart($codarti);
    			       	  $caartalmubi->setCodalm($calmacen);
    			       	  $caartalmubi->setCodubi($cubicacion);
    			       	  $caartalmubi->setExiact($cantd);
                    if ($manartlot=='S')
                        $caartalmubi->setNumlot($numlot);
                    $caartalmubi->setFecven($x[$j]->getFecven());
                    $caartalmubi->setFecela($x[$j]->getFecela());
    			       	  $caartalmubi->save();
    		     		}		  
              }
		      }
		    $j++;
		  }
     return true;
   }

 public static function  Hay_DevolucionRCP($recepcion)
 {
  $rcpart=$recepcion->getRcpart();
    $sql = "Select * From CaDevRcp Where RcpArt = '".$rcpart ."'";
    if (Herramientas::BuscarDatos($sql,$result))
          return true;
    else
          return false;
 }

  public static function Devolver_Articulos($recepcion)
    {
       $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
       $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart');
	      $c = new Criteria();
          $c->add(CadetentPeer::RCPART,$recepcion->getRcpart());
          $detalle = CadetentPeer::doSelect($c);

      foreach ($detalle as $arreglo)
      {
        $codarti=$arreglo->getCodart();
        $dart=$arreglo->getDesart();
        $cantd=$arreglo->getCanrec();
        $costo=$arreglo->getCosart();
        $calmacen=$arreglo->getCodalm();
        $cubicacion=$arreglo->getCodubi();
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

            $act1=$arti->getExitot() - $cantd;
            $dis1=$arti->getDistot() - $cantd;
            $arti->setExitot($act1);
            $arti->setDistot($dis1);
            $cospro=$arti->getCospro();
            $arti->setCosult($cospro);
            $arti->save();              

            $c = new Criteria();
            $c->add(CaartalmPeer::CODART,$codarti);
            $c->add(CaartalmPeer::CODALM,$calmacen);
            $reg = CaartalmPeer::doSelectOne($c);
            if ($reg)
            {
              $act2=$reg->getExiact() - $cantd;
              $reg->setExiact($act2);
              $reg->save();
            }
            $c = new Criteria();
            $c->add(CaartalmubiPeer::CODART,$codarti);
            $c->add(CaartalmubiPeer::CODALM,$calmacen);
            $c->add(CaartalmubiPeer::CODUBI,$cubicacion);
            if ($manartlot=='S')
                $c->add(CaartalmubiPeer::NUMLOT,$numlot);
            $alm = CaartalmubiPeer::doSelectOne($c);
            if ($alm)
            {
                $act2=$alm->getExiact() - $cantd;
                $alm->setExiact($act2);
                $alm->save();
            }
        }//if ($arti)
       }
    }
     return true;
   }

  public static function eliminarAlmentalm($recepcion)
  {
        $codigo=$recepcion->getRcpart();
        self::Devolver_Articulos($recepcion);
        Herramientas::EliminarRegistro('Cadetent','Rcpart',$codigo);
        Herramientas::EliminarRegistro('Caentalm','Rcpart',$codigo);
  }

/**************************************************************************
**                          Entradas al Almacen                          **
**                                Miki                                   **
**************************************************************************/

/**************************************************************************
**                          Requisición de Servicios                     **
**                                Gerana                                 **
**************************************************************************/
/**
   * Función Principal para guardar datos del formulario Alreqser
   * TODO Esta función (y todas las demás de su clase) deben retornar un
   * código de error para validar cualquier problema al guardar los datos.
   *
   * @static
   * @param $reqser Object CaReqArtSer a guardar
   * @param $grid Array de Objects Servicios.
   * @return void
   */
    public static function salvarReqser($reqser,$grid){
      self::Grabar_RequisicionServicio($reqser,$grid);
      self::Grabar_DetalleReqSer($reqser,$grid);
    }

/**
   * Función para Registrar el Maestro de la Requisición de Servicios
   *
   * @static
   * @param $reqser Object CaReqArtSer a guardar
   * @param $grid Array de Objects Servicios.
   * @return void
   */
    public static function Grabar_RequisicionServicio($reqser,$grid){
      if (Herramientas::getVerCorrelativo('correq','cacorrel',$r))
      {
         if ($reqser->getReqart()=='########')
        {
          $encontrado=false;
          while (!$encontrado)
          {
            $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
            $sql="select reqart from Careqartser where reqart='".$numero."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
          }
      $reqser->setReqart(str_pad($r, 8, '0', STR_PAD_LEFT));
        }
      else
      {
        $reqser->setReqart(str_replace('#','0',$reqser->getReqart()));
      }
      //Se graba la Recepcion
      $reqser->save();

    // Se graban los articulos dela recepcion
    Herramientas::getSalvarCorrelativo('correq','cacorrel','Requisición de Servicios',$r,$msg);
     }
    }

/**
   * Función para registrar el detalle de la Requisición de Servicios
   *
   * @static
   * @param $reqser Object CaReqArtSer a guardar
   * @param $grid Array de Objects Servicios a guardar.
   * @return void
   */
    public static function Grabar_DetalleReqSer($reqser,$grid)
     {

      $reqart=$reqser->getReqart();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
     {
      $x[$j]->setReqart($reqart);
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
      }  //while ($j<count($z))
    }//if (!empty($z[$j]))

     }  //end function

/**
      * Función para eliminar la requisición de servicios y su detalle
   *
   * @static
   * @param $reqser Object CaReqArtSer a eliminar
   * @param $grid Array de Objects Servicios a eliminar.
   * @return void
   */
  public static function eliminarReqser($reqser)
   {
    $reqart=$reqser->getReqart();
    Herramientas::EliminarRegistro('Caartreqser','Reqart',$reqart);
     $reqser->delete();
   }

   /**************************************************************************
    **                          Requisición de Servicios                     **
    **                                Gerana                                 **
    **************************************************************************/

/**************************************************************************
**         Grid de la Requisición Formulario Amltraalm                   **
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
   public static function salvarGrabar_Transferencia($catraalm,$grid,$grid_arreglo,&$error_obtenido,&$codigo_articulo)
   {
     if (!self::Grabar_Transferencia($catraalm,$grid,$grid_arreglo,$error,$codigo_art))
     {
        $codigo_articulo=$codigo_art;
        $error_obtenido=$error;
        return false;
     }
     $error_obtenido=-1;
     return true;
   }

   public static function Grabar_Transferencia($catraalm,$grid,$grid_arreglo,&$error,&$codigo_art)
   {
     $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
     if ($manartlot=='S')
     {
        $x=$grid[0];
        $i=0;
        $grid_arreglo=array();
        while ($i<count($x))
        {
         $grid_arreglo[$i]['codart'] = $x[$i]->getCodart();
         $grid_arreglo[$i]['canart'] = $x[$i]->getCanart();
         $grid_arreglo[$i]['numlotori'] = $x[$i]->getNumlotori();
         if ($x[$i]->getNumlotdes()=="")
             $grid_arreglo[$i]['numlotdes'] = $x[$i]->getNumlotori();
         else $grid_arreglo[$i]['numlotdes'] = $x[$i]->getNumlotdes();
         $i++;
        }
     }

    if (self::Actualizar_Artículos($catraalm,'D','Salvar',$grid_arreglo,$error,$articulo))
    {
        self::Actualizar_Artículos($catraalm,'S','Salvar',$grid_arreglo,$error,$articulo);

        $correl=false;
        //Herramientas::getVerCorrelativo('almcorre','cadefart',&$r)
          if (true)
            {
              if ($catraalm->getCodtra()=='########')
              {
                $cadefart = new Cadefart();
                $r = $cadefart->getSecalmcorre();
                $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
                $catraalm->setCodtra(str_pad($r, 8, '0', STR_PAD_LEFT));
                $correl=true;
              }//if ($catraalm->getCodtra()=='########')
              else
              {
                $catraalm->setCodtra(str_replace('#','0',$catraalm->getCodtra()));
                $catraalm->setCodtra(str_pad($catraalm->getCodtra(), 8, '0', STR_PAD_LEFT));
              }

             }
          if ($correl) Herramientas::getSalvarCorrelativo('almcorre','cadefart','cadefart',$r,$msg);
        $catraalm->save();
        // Se graban los detalles de la Transaccion
        if (Herramientas::getX_vacio('codtra','cadettra','codtra',$catraalm->getCodtra())!='')
        {
        $c= new Criteria();
          $c->add(CadettraPeer::CODTRA,$catraalm->getCodtra());
          $cadettra_del = CadettraPeer::doDelete($c);
        }
        $i=0;
        if (count($grid_arreglo)>0)
        {
        while ($i<count($grid_arreglo))
        {
            if ($grid_arreglo[$i]['codart']!='')
            {
                      $cadettra_new = new Cadettra();
                    $cadettra_new->setCodtra($catraalm->getCodtra());
                    $cadettra_new->setCodart($grid_arreglo[$i]['codart']);
                    $cadettra_new->setCanart($grid_arreglo[$i]['canart']);
                    if ($manartlot=='S') {
                        $cadettra_new->setNumlotori($grid_arreglo[$i]['numlotori']);
                        $cadettra_new->setNumlotdes($grid_arreglo[$i]['numlotdes']);
                    }
                    $cadettra_new->save();
            }
            $i++;
        }
        }
    }
    else
    {
        $codigo_art=$articulo;
        $error_obtenido=$error;
        return false;
    }
    return true;
     }

   public static function Actualizar_Artículos($catraalm,$bandera,$accion,$grid_arreglo,&$error,&$articulo)
   {
    if ($accion=='Salvar')
    {
      if ($bandera=='D')
      {
          $almacen = $catraalm->getAlmori();
          $ubicacion=$catraalm->getCodubiori();
          $desalma = $catraalm->getAlmaori();
      }
      else
      {
          $almacen = $catraalm->getAlmdes();
          $otralmacen=$catraalm->getAlmori();
          $ubicacion=$catraalm->getCodubides();
          $otrubicacion=$catraalm->getCodubiori();
          $desalma = $catraalm->getAlmades();
      }
    }
    else
    {
      if ($bandera=='S')
      {
          $almacen = $catraalm->getAlmori();
          $otralmacen=$catraalm->getAlmdes();
          $ubicacion=$catraalm->getCodubiori();
          $otrubicacion=$catraalm->getCodubides();
          $desalma = $catraalm->getAlmaori();
      }
      else
      {
          $almacen = $catraalm->getAlmdes();
          $ubicacion=$catraalm->getCodubides();
          $desalma = $catraalm->getAlmades();
      }
    }
    $i=0;
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    while ($i<count($grid_arreglo))
    {
        if ($grid_arreglo[$i]['codart']!='')
        {
          if ($manartlot=='S') {
              if ($accion=='Salvar')
             {
                if ($bandera=='D')
                {
                    $numlot=$grid_arreglo[$i]['numlotori'];
                }else $numlot=$grid_arreglo[$i]['numlotdes'];
             }else {
                 if ($bandera=='D')
                {
                    $numlot=$grid_arreglo[$i]['numlotdes'];
                }else $numlot=$grid_arreglo[$i]['numlotori'];
             }
          }


            $c= new Criteria();
          $c->add(CaartalmubiPeer::CODALM,$almacen);
          $c->add(CaartalmubiPeer::CODUBI,$ubicacion);
          $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
          if ($manartlot=='S')
              $c->add(CaartalmubiPeer::NUMLOT,$numlot);
          $caartalm_up = CaartalmubiPeer::doSelectOne($c);
          if ($caartalm_up)
          {

            if ($bandera=='S')
            {
              $caartalm_up->setExiact($caartalm_up->getExiact()+$grid_arreglo[$i]['canart']);
              $caartalm_up->save();
            }
            else
            {
              if ((($caartalm_up->getExiact())-($grid_arreglo[$i]['canart']))>=0)
              {
                $caartalm_up->setExiact(($caartalm_up->getExiact())-($grid_arreglo[$i]['canart']));
                $caartalm_up->save();
              }
              /*else
              {
                $articulo=$grid_arreglo[$i]['codart'];
                $error=125;
                return false;
              }*///else
              }//else
          }// if ($caartalm_up)
          else
          {//si  no existe el registro en la tabla CAARTALMUBI, hay q crearla con la disponibilidad transferida
            if ($bandera=='S')
            {
                $c= new Criteria();
              $c->add(CaartalmubiPeer::CODALM,$otralmacen);
              $c->add(CaartalmubiPeer::CODUBI,$otrubicacion);
              $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
              if ($manartlot=='S')
                  $c->add(CaartalmubiPeer::NUMLOT,$numlot);
              $caartalm = CaartalmubiPeer::doSelectOne($c);
              if ($caartalm)
              {
                    $caartalm_new = new Caartalmubi();
                    $caartalm_new->setCodalm($almacen);
                    $caartalm_new->setCodart($grid_arreglo[$i]['codart']);
                    $caartalm_new->setCodubi($ubicacion);
                    $caartalm_new->setExiact($grid_arreglo[$i]['canart']);
                    if ($manartlot=='S')
                       $caartalm_new->setNumlot($numlot);
                    $caartalm_new->save();
                  }
            }//if ($bandera=='S')
          }

          /******
           *
           * Esta funcion se creo porque en registro de articulos no graba en caartalm solo graba en caartalmubi
           * por lo tanto aqui actualizamos la tabla almacen con lo que tiene caartalmubi que la que esta correcta
           *
           * */
          $exiact2 = 0;
          $c= new Criteria();
          $c->add(CaartalmubiPeer::CODALM,$almacen);
          $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
          if ($manartlot=='S')
                  $c->add(CaartalmubiPeer::NUMLOT,$numlot);
          $caartalmubi2 = CaartalmubiPeer::doSelect($c);
          foreach($caartalmubi2 as $rs)
          {
              $exiact2 += $rs->getExiact();
          }

          #FIN FUNCION NUEVA



        //Actualizar la tabla Caartalm
          $c= new Criteria();
          $c->add(CaartalmPeer::CODALM,$almacen);
          $c->add(CaartalmPeer::CODART,$grid_arreglo[$i]['codart']);
          $caartalm_up = CaartalmPeer::doSelectOne($c);
          if($caartalm_up)
          {
              $caartalm_up->setExiact($exiact2);
              $caartalm_up->save();
          }
          /*if ($caartalm_up)
          {
            if ($bandera=='S')
            {
              $caartalm_up->setExiact($caartalm_up->getExiact()+$grid_arreglo[$i]['canart']);
              $caartalm_up->save();
            }
            else
            {
              if ((($caartalm_up->getExiact())-($grid_arreglo[$i]['canart']))>=0)
              {
                $caartalm_up->setExiact(($caartalm_up->getExiact())-($grid_arreglo[$i]['canart']));
                $caartalm_up->save();
              }
              else
              {
                $articulo=$grid_arreglo[$i]['codart'];
                $error=125;
                return false;
              }//else
            }//else
          }// if $caartalm_up)
        else
          {//si  no existe el registro en la tabla CAARTALMUBI, hay q crearla con la disponibilidad transferida
            if ($bandera=='S')
            {
                $c= new Criteria();
              $c->add(CaartalmPeer::CODALM,$otralmacen);
              $c->add(CaartalmPeer::CODART,$grid_arreglo[$i]['codart']);
              $caartalm = CaartalmPeer::doSelectOne($c);
              if ($caartalm)
              {
                    $caartalm_new = new Caartalm();
                    $caartalm_new->setCodalm($almacen);
                    $caartalm_new->setCodart($grid_arreglo[$i]['codart']);
                    $caartalm_new->setCodubi($ubicacion);
                    $caartalm_new->setEximin($caartalm->getEximin());
                    $caartalm_new->setEximax($caartalm->getEximax());
                    $caartalm_new->setExiact($grid_arreglo[$i]['canart']);
                    $caartalm_new->setPtoreo($caartalm->getPtoreo());
                    $caartalm_new->setPedmin($caartalm->getPedmin());
                    $caartalm_new->setPedmax($caartalm->getPedmax());
                    $caartalm_new->save();
              }//if (count($caartalm)>0)
            }//if ($bandera=='S')
          }//else*/

      }//if ($grid_arreglo[$i]['codart']!='')
        $i++;
    }
    return true;
   }


  public static function eliminar_Transferencia($catraalm,&$error)
  {
        $error=-1;
        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
        $grid_arreglo=array();
        $c = new Criteria();
        $c->add(CadettraPeer::CODTRA,$catraalm->getCodtra());
        $datos = CadettraPeer::doSelect($c);
        //Cargar arreglo detelle transferencia
        $i=0;
        foreach ($datos as $arreglo)
      {
        $grid_arreglo[$i]['codart'] = $arreglo->getCodart();
        $grid_arreglo[$i]['canart'] = $arreglo->getCanart();
        if ($manartlot=='S')
        {
            $grid_arreglo[$i]['numlotori'] = $arreglo->getNumlotori();
            $grid_arreglo[$i]['numlotdes'] = $arreglo->getNumlotdes();
        }
        $i++;
      }

        if (self::Actualizar_Artículos($catraalm,'D','Eliminar',$grid_arreglo,$error,$articulo))
      {
      Herramientas::EliminarRegistro('Cadettra','codtra',$catraalm->getCodtra());
          $catraalm->delete();
          self::Actualizar_Artículos($catraalm,'S','Eliminar',$grid_arreglo,$error,$articulo);
      }
        else
        {
            $error=139;
        }
  }

/**************************************************************************
**           Fin Grid de la Requisición Formulario Amltraalm             **
**                       Jaime Suárez                                    **
**************************************************************************/

/*******************************Definición de Artículos**********************************************/
  public static function salvarAlmdefart($articulo,$orden,$recepcion,$requisicion,$despacho,$servicios,$solicitud,$cotiza,$corent,$corsal,$grid)
  {
     $articulo->setCodemp('001');
 /*    if ($articulo->getGeneraop()=='1')
     { $articulo->setGeneraop('S');}
  else {$articulo->setGeneraop(null);}

    if ($articulo->getGeneracom()=='1')
     { $articulo->setGeneracom('S');}
  else {$articulo->setGeneracom(null);}*/

    if ($articulo->getPrcasopre()=='1')
     { $articulo->setPrcasopre('S');}
     else {$articulo->setPrcasopre(null);}

    if ($articulo->getPrcreqapr()=='1')
     { $articulo->setPrcreqapr('S');}
     else {$articulo->setPrcreqapr(null);}

    if ($articulo->getComasopre()=='1')
     { $articulo->setComasopre('S');}
     else {$articulo->setComasopre(null);}

    if ($articulo->getComreqapr()=='1')
     { $articulo->setComreqapr('S');}
     else {$articulo->setComreqapr(null);}

    if ($articulo->getGencorart()=='1')
     { $articulo->setGencorart('S');}
     else {$articulo->setGencorart(null);}

     if ($articulo->getReccoo()=='1')
     { $articulo->setReccoo('S');}
     else {$articulo->setReccoo(null);}

     $articulo->setReqreqapr(H::iif($articulo->getReqreqapr()=='1','S',null));

	 $articulo->setSolreqapr(H::iif($articulo->getSolreqapr()=='1','S',null));
     $articulo->save();

     $modifica_correl=false;
     $c = new Criteria();
     $data= CacorrelPeer::doSelectOne($c);

     if ($data)
     { $modifica_correl=true; }
     else { self::incluyePrimerRegistro(); $modifica_correl=true;}

/*
     if ($modifica_correl==true)
     {
       if (is_numeric($orden))
       { $sql="update cacorrel set corcom='".$orden."'"; }
       else { $sql="update cacorrel set corcom=0";}
      Herramientas::insertarRegistros($sql);

       if (is_numeric($recepcion))
       { $sql1="update cacorrel set correc='".$recepcion."'";}
       else { $sql1="update cacorrel set correc=0";}
      Herramientas::insertarRegistros($sql1);

      if (is_numeric($requisicion))
       { $sql2="update cacorrel set correq='".$requisicion."'";}
       else { $sql2="update cacorrel set correq=0";}
      Herramientas::insertarRegistros($sql2);

      if (is_numeric($despacho))
       { $sql3="update cacorrel set cordes='".$despacho."'";}
       else { $sql3="update cacorrel set cordes=0";}
      Herramientas::insertarRegistros($sql3);

      if (is_numeric($servicios))
       { $sql4="update cacorrel set corser='".$servicios."'";}
       else { $sql4="update cacorrel set corser=0";}
      Herramientas::insertarRegistros($sql4);

      if (is_numeric($solicitud))
       { $sql5="update cacorrel set cortra='".$solicitud."'";}
       else { $sql5="update cacorrel set cortra=0";}
      Herramientas::insertarRegistros($sql5);

      if (is_numeric($solicitud))
       { $sql6="update cacorrel set corsol='".$solicitud."'";}
       else { $sql6="update cacorrel set corsol=0";}
      Herramientas::insertarRegistros($sql6);

      if (is_numeric($cotiza))
       { $sql7="update cacorrel set corcot='".$cotiza."'";}
       else { $sql7="update cacorrel set corcot=0";}
      Herramientas::insertarRegistros($sql7);

     if (is_numeric($corent))
       { $sql8="update cacorrel set corent='".$corent."'";}
       else { $sql8="update cacorrel set corent=0";}
      Herramientas::insertarRegistros($sql8);

     if (is_numeric($corsal))
       { $sql9="update cacorrel set corsal='".$corsal."'";}
       else { $sql9="update cacorrel set corsal=0";}
      Herramientas::insertarRegistros($sql9);
    }

    */
    self::Grabar_UbicacionesNoSADA($articulo,$grid);
  }

  public static function incluyePrimerRegistro()
  {
    $c= new Criteria();
    $reg= CacorrelPeer::doSelectOne($c);
    if (count($reg)==0)
    {
      $tabla= new Cacorrel();
      $tabla->setCorcom(0);
      $tabla->setCorser(0);
      $tabla->setCorsol(0);
      $tabla->setCorreq(0);
      $tabla->setCordes(0);
      $tabla->setCorcot(0);
      $tabla->setCortra(0);
      $tabla->setCorrec(0);
      $tabla->save();
    }
  }

  public static function validarAlmdefart($articulo,&$msj1,&$msj2)
  {
    $compra='OC'.str_pad($articulo->getCorcom(),6,'0',STR_PAD_LEFT);
    $servicio='OS'.str_pad($articulo->getCorser(),6,'0',STR_PAD_LEFT);

    $c = new Criteria();
    $c->add(CaordcomPeer::ORDCOM,$compra);
    $dat= CaordcomPeer::doSelectOne($c);
    if ($dat)
    {$msj1=102;}else { $msj1=-1;}

    $c = new Criteria();
    $c->add(CaordcomPeer::ORDCOM,$servicio);
    $data= CaordcomPeer::doSelectOne($c);
    if ($data)
    {  $msj2=103;}else {$msj2=-1;}
  }


/***************************************************************************************************/


  public static function salvarAlminvfis($cainvfis,$grid,$param)
  {
    return self::Grabar_Inventario($cainvfis,$grid,$param);
  }

  public static function Grabar_Inventario($cainvfis,$grid,$param)
  {
    $x=$grid[0];
    $codalm=$cainvfis->getCodalm();
    $fecinv=$cainvfis->getFecinv();
    $j=0;
      while ($j<(count($x)))
      {
        Herramientas::EliminarRegistro("Cainvfis", "Id", $x[$j]["id"]);
          $j++;
      }

    $j=0;
      while ($j<(count($x)))
      {
        $detalle = new Cainvfis();
        $detalle->setCodart($x[$j]["codart"]);
        $detalle->setExiact($x[$j]["exiact"]);
        $detalle->setExiact2($x[$j]["exiact2"]);
        $detalle->setCodalm($codalm);
        $detalle->setFecinv($fecinv);

        //grabar Articulos por almacen y ubicación Cainvfisubi

        if ($x[$j]["ubicacion"]!='')
        {
        $c = new Criteria();
        $c->add(CainvfisubiPeer::CODART,$x[$j]["codart"]);
        $c->add(CainvfisubiPeer::CODALM,$codalm);
        $c->add(CainvfisubiPeer::FECINV,$fecinv);
        CainvfisubiPeer::doDelete($c);

          $cadenaubi=split('!',$x[$j]["ubicacion"]);
          $r=0;
          while ($r<(count($cadenaubi)-1))
          {
            $aux=$cadenaubi[$r];
            $aux2=split('_',$aux);

            if ($aux2[0]!="")
            {
              $caartalmubi= new Cainvfisubi();
              $caartalmubi->setFecinv($fecinv);
              $caartalmubi->setCodart($x[$j]["codart"]);
              $caartalmubi->setCodalm($codalm);
              $caartalmubi->setCodubi($aux2[0]);
              $caartalmubi->setExiact($aux2[2]);
              $caartalmubi->setExiact2($aux2[3]);
              $caartalmubi->save();
              $detalle->setCodubi($aux2[0]);
            }
            $r++;
          }
       }// if ($x[$j]->getUbicacion()!='')

       $detalle->save();
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
  return -1;
  }


/*
 * Author: Actualiza la Requisicion
 */
  public static function salvarAlmaprreq($clasemodelo,$grid)
  {
    $x = $grid[0];
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCheck()=='1' || $x[$j]->getCheck2()=='1' || $x[$j]->getCheck3()=='1')
      {

      	if ($x[$j]->getCheck()=='1') $x[$j]->setAprreq('S');
      	else if ($x[$j]->getCheck2()=='1') $x[$j]->setAprreq('R');
      	else $x[$j]->setAprreq('D');

        $x[$j]->setUsuapr($loguse);
        $x[$j]->setFecapr(date('Y-m-d'));
      	$x[$j]->save();
      }
      $j++;
    }

	return -1;
  }

  public static function Grabar_Unidades_Articulos($caregart,$grid2)
  {

    $codart=$caregart->getCodart();
    $x=$grid2[0];
    $j=0;
    while ($j<count($x))
     {
      if (($x[$j]->getUnialt()!=""|| $x[$j]->getCodunimed()!="") && $x[$j]->getRelart()!="")
      {
          $x[$j]->setCodart($codart);
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
  }

     /**
   * Función para registrar las partidas por artículos
   *
   * @static
   * @param $articulo Object Artículo a guardar
   * @param $grid Array de Objects Almacen.
   * @return void
   */
  public static function Grabar_Partidas_Articulos($articulo,$grid)
  {
      $codart=$articulo->getCodart();
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getCodpar()!="")
        {
            $x[$j]->setCodart($codart);
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
 public static function salvarGrabar_TransferenciaArt($catraalm,$grid,$grid_arreglo,&$error_obtenido,&$codigo_articulo)
   {
     if (!self::Grabar_TransferenciaArt($catraalm,$grid,$grid_arreglo,$error,$codigo_art))
     {
        $codigo_articulo=$codigo_art;
        $error_obtenido=$error;
        return false;
     }
     $error_obtenido=-1;
     return true;
   }

   public static function Grabar_TransferenciaArt($catraalm,$grid,$grid_arreglo,&$error,&$codigo_art)
   {
     $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
     if ($manartlot=='S')
     {
        $x=$grid[0];
        $i=0;
        while ($i<count($x))
        {
            if(!$catraalm->getId()){
                 $grid_arreglo[$i]['codart'] = $x[$i]->getCodart();
                 $grid_arreglo[$i]['canart'] = $x[$i]->getCanart();
                 $grid_arreglo[$i]['numlotori'] = $x[$i]->getNumlotori();
                 if ($x[$i]->getNumlotdes()=="")
                     $grid_arreglo[$i]['numlotdes'] = $x[$i]->getNumlotori();
                 else $grid_arreglo[$i]['numlotdes'] = $x[$i]->getNumlotdes();
            }         
         $i++;
        }
     }
 if(!$catraalm->getId()){
    if (self::Actualizar_ArticulosNue($catraalm,'D','Salvar',$grid_arreglo,$error,$articulo))
    {
        $correl=false;
      if ($catraalm->getCodtra()=='########')
      {
        $cadefart = new Cadefart();
        $r = $cadefart->getSecalmcorre();
        $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
        $catraalm->setCodtra(str_pad($r, 8, '0', STR_PAD_LEFT));
        $correl=true;
      }
      else
      {
        $catraalm->setCodtra(str_replace('#','0',$catraalm->getCodtra()));
        $catraalm->setCodtra(str_pad($catraalm->getCodtra(), 8, '0', STR_PAD_LEFT));
      }
             
      if ($correl) Herramientas::getSalvarCorrelativo('almcorre','cadefart','cadefart',$r,$msg);
      $catraalm->setStatra('T');
      $catraalm->setFecreg(date('Y-m-d'));
      $catraalm->setFecsal($catraalm->getFecsal() ? $catraalm->setFecsal() : date('Y-m-d H:m:s'));
      $catraalm->save();
      
    $i=0;
    if (count($grid_arreglo)>0)
    {
        while ($i<count($grid_arreglo))
        {
            if ($grid_arreglo[$i]['codart']!='')
            {
                $cadettra_new = new Cadettra();
                $cadettra_new->setCodtra($catraalm->getCodtra());
                $cadettra_new->setCodart($grid_arreglo[$i]['codart']);
                $cadettra_new->setCanart($grid_arreglo[$i]['canart']);
                $cadettra_new->setCanrec($grid_arreglo[$i]['canrec']);
                $cadettra_new->setCandev($grid_arreglo[$i]['candev']);
                $cadettra_new->setCandif($grid_arreglo[$i]['candif']);
                $cadettra_new->setCodfal($grid_arreglo[$i]['codfal']);
                $cadettra_new->setObstra($grid_arreglo[$i]['obstra']);
                $cadettra_new->setFecest($grid_arreglo[$i]['fecest']);
                if ($manartlot=='S') {
                    $cadettra_new->setNumlotori($grid_arreglo[$i]['numlotori']);
                    $cadettra_new->setNumlotdes($grid_arreglo[$i]['numlotdes']);
                }
                $cadettra_new->save();
            }
            $i++;
        }
    }
    }
    else
    {
        $codigo_art=$articulo;
        $error_obtenido=$error;
        return false;
    }

    }else{
      $catraalm->save();
    }
    return true;
     }

   public static function Actualizar_ArticulosNue($catraalm,$bandera,$accion,$grid_arreglo,&$error,&$articulo)
   {
    if ($accion=='Salvar')
    {
      if ($bandera=='D')
      {//Origen
          $almacen = $catraalm->getAlmori();
          $ubicacion=$catraalm->getCodubiori();
          $desalma = $catraalm->getAlmaori();
      }
      else
      {
          $almacen = $catraalm->getAlmdes();
          $otralmacen=$catraalm->getAlmori();
          $ubicacion=$catraalm->getCodubides();
          $otrubicacion=$catraalm->getCodubiori();
          $desalma = $catraalm->getAlmades();
      }
    }
    else
    {
      if ($bandera=='S')
      {
          $almacen = $catraalm->getAlmori();
          $otralmacen=$catraalm->getAlmdes();
          $ubicacion=$catraalm->getCodubiori();
          $otrubicacion=$catraalm->getCodubides();
          $desalma = $catraalm->getAlmaori();
      }
      else
      {  //Destino
          $almacen = $catraalm->getAlmdes();
          $ubicacion=$catraalm->getCodubides();
          $desalma = $catraalm->getAlmades();
      }
    }
    $i=0;
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    while ($i<count($grid_arreglo))
    {
        if ($grid_arreglo[$i]['codart']!='')
        {
          if ($manartlot=='S') {
              if ($accion=='Salvar')
             {
                if ($bandera=='D')
                {
                    $numlot=$grid_arreglo[$i]['numlotori'];
                }else $numlot=$grid_arreglo[$i]['numlotdes'];
             }else {
                 if ($bandera=='D')
                {
                    $numlot=$grid_arreglo[$i]['numlotdes'];
                }else $numlot=$grid_arreglo[$i]['numlotori'];
             }
          }
          
        if ($accion=='Salvar') {
          
          $l= new Criteria();
          $l->add(CadettraPeer::CODTRA,$catraalm->getCodtra());
          $l->add(CadettraPeer::CODART,$grid_arreglo[$i]['codart']);
          $l->add(CadettraPeer::NUMLOTORI,$grid_arreglo[$i]['numlotori']);                           
          $resultc= CadettraPeer::doSelectOne($l);
          if ($resultc)
          {
                $resultc->setCanrec($grid_arreglo[$i]['canrec']);
                $resultc->setCandev($grid_arreglo[$i]['candev']);
                $resultc->setCandif($grid_arreglo[$i]['candif']);
                $resultc->setCodfal($grid_arreglo[$i]['codfal']);
                $resultc->setObstra($grid_arreglo[$i]['obstra']);
                $resultc->setFecest($grid_arreglo[$i]['fecest']);
                $resultc->save();
          }
        }


          $c= new Criteria();
          $c->add(CaartalmubiPeer::CODALM,$almacen);
          $c->add(CaartalmubiPeer::CODUBI,$ubicacion);
          $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
          if ($manartlot=='S')
              $c->add(CaartalmubiPeer::NUMLOT,$numlot);
          $caartalm_up = CaartalmubiPeer::doSelectOne($c);
          if ($caartalm_up)
          {
            if ($bandera=='S')
            {
                if ($accion=='Salvar')  
                    $caartalm_up->setExiact($caartalm_up->getExiact()+$grid_arreglo[$i]['canrec']);
                else{
                    if ($grid_arreglo[$i]['canart']==$grid_arreglo[$i]['canrec'])
                        $caartalm_up->setExiact($caartalm_up->getExiact()+($grid_arreglo[$i]['canart']));
                    else
                        $caartalm_up->setExiact($caartalm_up->getExiact()+($grid_arreglo[$i]['canart']- ($grid_arreglo[$i]['canart']-$grid_arreglo[$i]['canrec'])));
                }
                $caartalm_up->save();
            }
            else
            {  //Origen
              if ((($caartalm_up->getExiact())-($grid_arreglo[$i]['canrec']))>=0)
              {
                 if ($accion=='Salvar')  
                     $caartalm_up->setExiact(($caartalm_up->getExiact())-($grid_arreglo[$i]['canart']));
                 else
                     $caartalm_up->setExiact(($caartalm_up->getExiact())-($grid_arreglo[$i]['canrec']));
                 
                $caartalm_up->save();
              }
           
            }//else
          }// if ($caartalm_up)
          else
          {//si  no existe el registro en la tabla CAARTALMUBI, hay q crearla con la disponibilidad transferida
            if ($bandera=='S')
            {
              $c= new Criteria();
              $c->add(CaartalmubiPeer::CODALM,$otralmacen);
              $c->add(CaartalmubiPeer::CODUBI,$otrubicacion);
              $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
              if ($manartlot=='S')
                  $c->add(CaartalmubiPeer::NUMLOT,$numlot);
              $caartalm = CaartalmubiPeer::doSelectOne($c);
              if ($caartalm)
              {
                    $caartalm_new = new Caartalmubi();
                    $caartalm_new->setCodalm($almacen);
                    $caartalm_new->setCodart($grid_arreglo[$i]['codart']);
                    $caartalm_new->setCodubi($ubicacion);
                    $caartalm_new->setExiact($grid_arreglo[$i]['canrec']);
                    if ($manartlot=='S')
                       $caartalm_new->setNumlot($numlot);
                    $caartalm_new->save();
                  }
            }//if ($bandera=='S')
          }

          /******
           *
           * Esta funcion se creo porque en registro de articulos no graba en caartalm solo graba en caartalmubi
           * por lo tanto aqui actualizamos la tabla almacen con lo que tiene caartalmubi que la que esta correcta
           *
           * */
          $exiact2 = 0;
           $c= new Criteria();
          $c->add(CaartalmubiPeer::CODALM,$almacen);
          $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
          if ($manartlot=='S')
                  $c->add(CaartalmubiPeer::NUMLOT,$numlot);
          $caartalmubi2 = CaartalmubiPeer::doSelect($c);
          foreach($caartalmubi2 as $rs)
          {
              $exiact2 += $rs->getExiact();
          }

          #FIN FUNCION NUEVA



          //Actualizar la tabla Caartalm
          $c= new Criteria();
          $c->add(CaartalmPeer::CODALM,$almacen);
          $c->add(CaartalmPeer::CODART,$grid_arreglo[$i]['codart']);
          $caartalm_up = CaartalmPeer::doSelectOne($c);
          if($caartalm_up)
          {
              $caartalm_up->setExiact($exiact2);
              $caartalm_up->save();
          }
         

      }//if ($grid_arreglo[$i]['codart']!='')
        $i++;
    }
    return true;
   }

  
  public static function eliminar_TransferenciaNuev($catraalm,&$error)
  {
        $error=-1;
        if ($catraalm->getStatra()=='N'){
           $error=3017;
        }else {
        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
        $grid_arreglo=array();
        $c = new Criteria();
        $c->add(CadettraPeer::CODTRA,$catraalm->getCodtra());
        $datos = CadettraPeer::doSelect($c);
        //Cargar arreglo detelle transferencia
        $i=0;
        foreach ($datos as $arreglo)
      {
        $grid_arreglo[$i]['codart'] = $arreglo->getCodart();
        $grid_arreglo[$i]['canart'] = $arreglo->getCanart();
        if($catraalm->getStatra()!='T')
            $grid_arreglo[$i]['canrec'] = $arreglo->getCanrec();
        else
            $grid_arreglo[$i]['canrec'] = $arreglo->getCanart();
        $grid_arreglo[$i]['candif'] = $arreglo->getCandif();
        $grid_arreglo[$i]['candev'] = $arreglo->getCandev();
        if ($manartlot=='S')
        {
            $grid_arreglo[$i]['numlotori'] = $arreglo->getNumlotori();
            $grid_arreglo[$i]['numlotdes'] = $arreglo->getNumlotdes();
        }
        $i++;
      }
        if($catraalm->getStatra()!='T'){//Se verifica para ver si afecto el almacen destino
            if (self::Actualizar_ArticulosNue($catraalm,'D','Eliminar',$grid_arreglo,$error,$articulo))
            {
              self::Actualizar_ArticulosNue($catraalm,'S','Eliminar',$grid_arreglo,$error,$articulo);          

              Herramientas::EliminarRegistro('Cadettra','codtra',$catraalm->getCodtra());
              $catraalm->delete();
            }
            else
            {
                $error=139;
            }
        }else{
           self::Actualizar_ArticulosNue($catraalm,'S','Eliminar',$grid_arreglo,$error,$articulo);
           
           Herramientas::EliminarRegistro('Cadettra','codtra',$catraalm->getCodtra());
           $catraalm->delete();
        }
      }
  }
   public static function Actualizar_Recepciones($codtra,$almacen,$estatus,$grid, $feclle=''){
          $exiact2=0;$status=false;
          $grid_arreglo= array();
          $cri= new Criteria();
          $cri->add(CatraalmPeer::CODTRA,$codtra);
          $catraalm = CatraalmPeer::doSelectOne($cri);
          if($catraalm){
              $catraalm->setStatra($estatus);
              $catraalm->setFeclle($feclle=='' ? date('Y-m-d H:m:s') : $feclle);
              $catraalm->save();
              $i=0;
              if ($catraalm->getStatra()=='D') {
                 self::Actualizar_ArticulosNue($catraalm,'S','Salvar',$grid,$error,$articulo);
                 self::Actualizar_ArticulosNue2($catraalm,'S','Eliminar',$grid,$error,$articulo);
              }else { 
                  self::Actualizar_ArticulosNue($catraalm,'S','Salvar',$grid,$error,$articulo);
              }
             $estatus=true;
          }
          return($estatus);
}

public static function Grabar_Alternos_Articulos($caregart,$grid4)
  {
    $codart=$caregart->getCodart();
    $x=$grid4[0];
    $j=0;
    while ($j<count($x))
     {
      if ($x[$j]->getCodalt()!="")
      {
          $x[$j]->setCodart($codart);
          $x[$j]->save();
      }
      $j++;
    }
    $z=$grid4[1];
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
  
     public static function generarasientosEnt($recepcion,$grid,&$arrasientos,&$acumdeb,&$pos,&$msj3)
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
            if($regis->getCodcta()!='')
            {
              $cuenta=$regis->getCodcta();
            }else {$cuenta='';}

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
                if (!Factura::buscarAsientos($cuenta,'D',$x[$j]->getMontot(),$arrasientos,$pos))
                {
                  Factura::guardarAsientos($cuenta,$regis2->getDescta(),'D',$x[$j]->getMontot(),$arrasientos,$pos);
                }
            }
            else{
            	$msj3=210;
      	        return false;
            }

            if($regis->getCtatra()!='')
            {
              $cuenta2=$regis->getCtatra();
            }else {$cuenta2='';}

            $b= new Criteria();
            $b->add(ContabbPeer::CODCTA,$cuenta2);
            $regis2 = ContabbPeer::doSelectOne($b);
            if ($regis2)
            {
                if (!Factura::buscarAsientos($cuenta2,'C',$x[$j]->getMontot(),$arrasientos,$pos))
                {
                  Factura::guardarAsientos($cuenta2,$regis2->getDescta(),'C',$x[$j]->getMontot(),$arrasientos,$pos);
                }
            }
            else{
            	$msj3=211;
      	        return false;
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

    public static function Generar_Comprobante_Contable_Ent(&$recepcion,$arrasientos,$acumdeb,$pos)
    {
        $reftra="E".substr($recepcion->getRcpart(),2,7);
        $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
        {
          $numerocomprob= $reftra;
        }else $numerocomprob= Comprobante::Buscar_Correlativo($recepcion->getFecrcp());


        $contabc = new Contabc();
        $contabc->setNumcom($numerocomprob);
        $contabc->setReftra($reftra);
        $contabc->setFeccom($recepcion->getFecrcp());
        $contabc->setDescom("RECEP. S/FACT. ".$recepcion->getDesrcp());
        $contabc->setStacom('D');
        $contabc->setTipcom('ALM');
        $contabc->setMoncom($recepcion->getMonrcp());
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $contabc->setLoguse($loguse);
        $contabc->save();
        
        if ($pos!=0)
        {
          $i=0;
          while ($i<=($pos-1))
          {
                if ($arrasientos[$i]["2"]!="")
                {
                  $contabc1= new Contabc1();
                  $contabc1->setNumcom($numerocomprob);
                  $contabc1->setFeccom($recepcion->getFecrcp());
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
          
          $recepcion->setNumcom($numerocomprob);  //actualizo el numero de comprobante en la recepcion
          $recepcion->save();
        }
    return true;
    }
    
   public static function Actualizar_ArticulosNue2($catraalm,$bandera,$accion,$grid_arreglo,&$error,&$articulo)
   {
    if ($accion=='Salvar')
    {
      if ($bandera=='D')
      {//Origen
          $almacen = $catraalm->getAlmori();
          $ubicacion=$catraalm->getCodubiori();
          $desalma = $catraalm->getAlmaori();
      }
      else
      {
          $almacen = $catraalm->getAlmdes();
          $otralmacen=$catraalm->getAlmori();
          $ubicacion=$catraalm->getCodubides();
          $otrubicacion=$catraalm->getCodubiori();
          $desalma = $catraalm->getAlmades();
      }
    }
    else
    {
      if ($bandera=='S')
      {
          $almacen = $catraalm->getAlmori();
          $otralmacen=$catraalm->getAlmdes();
          $ubicacion=$catraalm->getCodubiori();
          $otrubicacion=$catraalm->getCodubides();
          $desalma = $catraalm->getAlmaori();
      }
      else
      {  //Destino
          $almacen = $catraalm->getAlmdes();
          $ubicacion=$catraalm->getCodubides();
          $desalma = $catraalm->getAlmades();
      }
    }
    $i=0;
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    while ($i<count($grid_arreglo))
    {
        if ($grid_arreglo[$i]['codart']!='')
        {
          if ($manartlot=='S') {
              if ($accion=='Salvar')
             {
                if ($bandera=='D')
                {
                    $numlot=$grid_arreglo[$i]['numlotori'];
                }else $numlot=$grid_arreglo[$i]['numlotdes'];
             }else {
                 if ($bandera=='D')
                {
                    $numlot=$grid_arreglo[$i]['numlotdes'];
                }else $numlot=$grid_arreglo[$i]['numlotori'];
             }
          }
          
        if ($accion=='Salvar') {
          
          $l= new Criteria();
          $l->add(CadettraPeer::CODTRA,$catraalm->getCodtra());
          $l->add(CadettraPeer::CODART,$grid_arreglo[$i]['codart']);
          $l->add(CadettraPeer::NUMLOTORI,$grid_arreglo[$i]['numlotori']);                           
          $resultc= CadettraPeer::doSelectOne($l);
          if ($resultc)
          {
                $resultc->setCanrec($grid_arreglo[$i]['canrec']);
                $resultc->setCandev($grid_arreglo[$i]['candev']);
                $resultc->setCandif($grid_arreglo[$i]['candif']);
                $resultc->setCodfal($grid_arreglo[$i]['codfal']);
                $resultc->setObstra($grid_arreglo[$i]['obstra']);
                $resultc->setFecest($grid_arreglo[$i]['fecest']);
                $resultc->save();
          }
        }


          $c= new Criteria();
          $c->add(CaartalmubiPeer::CODALM,$almacen);
          $c->add(CaartalmubiPeer::CODUBI,$ubicacion);
          $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
          if ($manartlot=='S')
              $c->add(CaartalmubiPeer::NUMLOT,$numlot);
          $caartalm_up = CaartalmubiPeer::doSelectOne($c);
          if ($caartalm_up)
          {
            if ($bandera=='S')
            {
                if ($accion=='Salvar')  
                    $caartalm_up->setExiact($caartalm_up->getExiact()+$grid_arreglo[$i]['canrec']);
                else{
                    if ($grid_arreglo[$i]['canart']!=$grid_arreglo[$i]['canrec'])
                        $caartalm_up->setExiact($caartalm_up->getExiact()+($grid_arreglo[$i]['canart']-$grid_arreglo[$i]['canrec']));
                }
                $caartalm_up->save();
            }
            else
            {  //Origen
              if ((($caartalm_up->getExiact())-($grid_arreglo[$i]['canrec']))>=0)
              {
                 if ($accion=='Salvar')  
                     $caartalm_up->setExiact(($caartalm_up->getExiact())-($grid_arreglo[$i]['canart']));
                 else 
                         $caartalm_up->setExiact(($caartalm_up->getExiact())-($grid_arreglo[$i]['canrec']));
                 
                 
                $caartalm_up->save();
              }
           
            }//else
          }// if ($caartalm_up)
          else
          {//si  no existe el registro en la tabla CAARTALMUBI, hay q crearla con la disponibilidad transferida
            if ($bandera=='S')
            {
              $c= new Criteria();
              $c->add(CaartalmubiPeer::CODALM,$otralmacen);
              $c->add(CaartalmubiPeer::CODUBI,$otrubicacion);
              $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
              if ($manartlot=='S')
                  $c->add(CaartalmubiPeer::NUMLOT,$numlot);
              $caartalm = CaartalmubiPeer::doSelectOne($c);
              if ($caartalm)
              {
                    $caartalm_new = new Caartalmubi();
                    $caartalm_new->setCodalm($almacen);
                    $caartalm_new->setCodart($grid_arreglo[$i]['codart']);
                    $caartalm_new->setCodubi($ubicacion);
                    $caartalm_new->setExiact($grid_arreglo[$i]['canrec']);
                    if ($manartlot=='S')
                       $caartalm_new->setNumlot($numlot);
                    $caartalm_new->save();
                  }
            }//if ($bandera=='S')
          }

          /******
           *
           * Esta funcion se creo porque en registro de articulos no graba en caartalm solo graba en caartalmubi
           * por lo tanto aqui actualizamos la tabla almacen con lo que tiene caartalmubi que la que esta correcta
           *
           * */
          $exiact2 = 0;
           $c= new Criteria();
          $c->add(CaartalmubiPeer::CODALM,$almacen);
          $c->add(CaartalmubiPeer::CODART,$grid_arreglo[$i]['codart']);
          if ($manartlot=='S')
                  $c->add(CaartalmubiPeer::NUMLOT,$numlot);
          $caartalmubi2 = CaartalmubiPeer::doSelect($c);
          foreach($caartalmubi2 as $rs)
          {
              $exiact2 += $rs->getExiact();
          }

          #FIN FUNCION NUEVA



          //Actualizar la tabla Caartalm
          $c= new Criteria();
          $c->add(CaartalmPeer::CODALM,$almacen);
          $c->add(CaartalmPeer::CODART,$grid_arreglo[$i]['codart']);
          $caartalm_up = CaartalmPeer::doSelectOne($c);
          if($caartalm_up)
          {
              $caartalm_up->setExiact($exiact2);
              $caartalm_up->save();
          }
         

      }//if ($grid_arreglo[$i]['codart']!='')
        $i++;
    }
    return true;
   }    

   public static function validaDispoEntrada($clasemodelo){

   $funvaldisart="";
   $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
   if ($varemp)
     if(array_key_exists('generales',$varemp)) {
       if(array_key_exists('funvaldisart',$varemp['generales']))
       {
         $funvaldisart=$varemp['generales']['funvaldisart'];
       }
     }   

    $manunialt=H::getConfApp2('manunialt', 'compras', 'almregart'); 

    $q= new Criteria();
    $q->add(CadetentPeer::RCPART,$clasemodelo->getRcpart());
    $regq= CadetentPeer::doSelect($q);
    if ($regq){
      foreach ($regq as $objq) {
          $cantd=$objq->getCanrec();
          $c = new Criteria();
          $c->add(CaregartPeer::CODART,$objq->getCodart());
          $arti = CaregartPeer::doSelectOne($c);
          if ($arti)
          {
            if ($manunialt=='S')
            {
               if ($objq->getUnimed()!="")
              {
                 if ($objq->getUnimed()!=$arti->getUnimed())
                 {
                     $k= new Criteria();                                     
                     $k->add(CaunialartPeer::CODART,$objq->getCodart());
                     $k->add(CaunialartPeer::UNIALT,$objq->getUnimed());
                     $result3= CaunialartPeer::doSelectOne($k);
                     if ($result3)
                     {
                         $cantd=$cantd*$result3->getRelart();
                     }
                 }
              }                
            }
          }

        if ($funvaldisart=='S'){
           $result=array();
           $sql="select existenciaart('".$objq->getCodart()."','".$objq->getCodalm()."','".$objq->getCodubi()."','".$objq->getNumlot()."',now()::date) as exiact from empresa";
           if (Herramientas::BuscarDatos($sql,$result))
            {
              if ($cantd>$result[0]['exiact'])
              {
                return 3016;
              }
            }            
         }else {        
           $t= new Criteria();
           $t->add(CaartalmubiPeer::CODALM,$objq->getCodalm());
           $t->add(CaartalmubiPeer::CODART,$objq->getCodart());
           $t->add(CaartalmubiPeer::CODUBI,$objq->getCodubi());
           if ($objq->getNumlot()!='')
             $t->add(CaartalmubiPeer::NUMLOT,$objq->getNumlot());
           $result= CaartalmubiPeer::doSelectOne($t);
           if ($result)
           {
              if ($cantd>$result->getExiact())
                return 3016;
           }
       }
      }      
    }
    return -1;
  }

  public static function ActualizarArtTraspaso($catraalm,&$error)
  {
        $error=-1;
        $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
        $grid_arreglo=array();
        $c = new Criteria();
        $c->add(CadettraPeer::CODTRA,$catraalm->getCodtra());
        $datos = CadettraPeer::doSelect($c);
        //Cargar arreglo detelle transferencia
        $i=0;
        foreach ($datos as $arreglo)
      {
        $grid_arreglo[$i]['codart'] = $arreglo->getCodart();
        $grid_arreglo[$i]['canart'] = $arreglo->getCanart();
        if($catraalm->getStatra()!='T')
            $grid_arreglo[$i]['canrec'] = $arreglo->getCanrec();
        else
            $grid_arreglo[$i]['canrec'] = $arreglo->getCanart();
        $grid_arreglo[$i]['candif'] = $arreglo->getCandif();
        $grid_arreglo[$i]['candev'] = $arreglo->getCandev();
        if ($manartlot=='S')
        {
            $grid_arreglo[$i]['numlotori'] = $arreglo->getNumlotori();
            $grid_arreglo[$i]['numlotdes'] = $arreglo->getNumlotdes();
        }
        $i++;
      }
        if($catraalm->getStatra()!='T'){//Se verifica para ver si afecto el almacen destino
            if (self::Actualizar_ArticulosNue($catraalm,'D','Eliminar',$grid_arreglo,$error,$articulo))
            {
              self::Actualizar_ArticulosNue($catraalm,'S','Eliminar',$grid_arreglo,$error,$articulo);          
            
            }
            else
            {
                $error=139;
            }
        }else{
           self::Actualizar_ArticulosNue($catraalm,'S','Eliminar',$grid_arreglo,$error,$articulo);
            
        }
  }

  public static function BuscarPrecioUnidad($codart='', $unialt='')
  {
    $y= new Criteria();
    $y->add(CaregartPeer::CODART,$codart);
    $reg= CaregartPeer::doSelectOne($y);
    if ($reg)
    {
        if ($unialt==$reg->getUnimed())
          return $reg->getCosult();
        if ($unialt==$reg->getUnialt())          
          return $reg->getCosult();          
    }
    
    $c = new Criteria();
    $c->add(CaunialartPeer::CODART,$codart);
    $m = CaunialartPeer::doSelect($c);
    if($m){
     foreach($m as $pvp){
      if ($unialt==$pvp->getUnialt())
       return $pvp->getCosuni();
     }
    }
  
    return 0;
  }

  public static function Grabar_Partes_Fabricantes($caregart,$grid5)
  {

    $codart=$caregart->getCodart();
    $x=$grid5[0];
    $j=0;
    while ($j<count($x))
     {
      if ($x[$j]->getNumpar()!="" && $x[$j]->getCodfab()!="")
      {
          $x[$j]->setCodart($codart);
          $x[$j]->save();
      }
      $j++;
    }
    $z=$grid5[1];
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

  public static function Grabar_UbicacionesNoSADA($datos,$grid)
  {
    $codemp=$datos->getCodemp();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
     {
      if ($x[$j]->getCodubi()!="")
      {
          $x[$j]->setCodemp($codemp);
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

  public static function Grabar_Referencia_Cruzada($caregart,$grid6)
  {

    $codart=$caregart->getCodart();
    $x=$grid6[0];
    $j=0;
    while ($j<count($x))
     {
      if ($x[$j]->getStccod()!="" && $x[$j]->getRefere()!='')
      {
          $x[$j]->setCodart($codart);
          $x[$j]->save();
      }
      $j++;
    }
    $z=$grid6[1];
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

  public static function Grabar_Apl_Montaje($caregart,$grid7)
  {

    $codart=$caregart->getCodart();
    $x=$grid7[0];
    $j=0;
    while ($j<count($x))
     {
      if ($x[$j]->getNumequ()!="" && $x[$j]->getCanins()>0)
      {
          $x[$j]->setCodart($codart);
          $x[$j]->save();
      }
      $j++;
    }
    $z=$grid7[1];
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

}
