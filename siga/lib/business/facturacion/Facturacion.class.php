<?php
/**
 * Facturación: Clase estática para el manejo de las facturas
 *
 * @package    Roraima
 * @subpackage facturacion
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Facturacion.class.php 45528 2011-08-12 19:35:10Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Facturacion {

/*******************************Definición de Ciudades**********************************************/

    public static function getEstados($pais='')
    {
      $edo = array();
      $edo[''] = '';
      $c = new Criteria();
      if($pais!='') $c->add(FaestadoPeer::FAPAIS_ID,$pais);
      $edos = FaestadoPeer::doSelect($c);
      if($edos){
        foreach($edos as $m){
          $edo[$m->getId()] = $m->getNomedo();
        }
      }
      return $edo;
    }
/*******************************Fin Definición de Ciudades**********************************************/

/*******************************Definición de Ciudades**********************************************/

    public static function getCiudades($estado)
    {
      $ciu = array();

      $ciu[''] = '';
      $c = new Criteria();
      if($estado!='') $c->add(FaciudadPeer::FAESTADO_ID,$estado);
      $cius = FaciudadPeer::doSelect($c);
      if($cius){
        foreach($cius as $p){
          $ciu[$p->getId()] = $p->getNomciu();
        }
      }
      return $ciu;
    }

/*******************************Fin Definición de Ciudades**********************************************/

/*******************************Definición de Artículos**********************************************/
  public static function salvarFadefart($articulo,$presupuesto,$pedido,$factura,$notaengrega,$despacho,$devolucion,$ajuste)
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

     $articulo->save();

     $modifica_correl=false;
     $c = new Criteria();
     $data= FacorrelatPeer::doSelectOne($c);

     if ($data)
     { $modifica_correl=true; }
     else { self::incluyePrimerRegistro(); $modifica_correl=true;}

     if ($modifica_correl==true)
     {
       if (is_numeric($presupuesto))
       { $sql="update facorrelat set corpre='".$presupuesto."'";}
       else { $sql="update facorrelat set corpre=500";}
      Herramientas::insertarRegistros($sql);

       if (is_numeric($pedido))
       { $sql1="update facorrelat set corped='".$pedido."'";}
       else { $sql1="update facorrelat set corped=0";}
      Herramientas::insertarRegistros($sql1);

      if (is_numeric($factura))
       { $sql2="update facorrelat set corfac='".$factura."'";}
       else { $sql2="update facorrelat set corfac=0";}
      Herramientas::insertarRegistros($sql2);

      if (is_numeric($notaengrega))
       { $sql3="update facorrelat set cornot='".$notaengrega."'";}
       else { $sql3="update facorrelat set cornot=0";}
      Herramientas::insertarRegistros($sql3);

      if (is_numeric($despacho))
       { $sql4="update facorrelat set cordph='".$despacho."'";}
       else { $sql4="update facorrelat set cordph=0";}
      Herramientas::insertarRegistros($sql4);

      if (is_numeric($devolucion))
       { $sql5="update facorrelat set cordev='".$devolucion."'";}
       else { $sql5="update facorrelat set cordev=0";}
      Herramientas::insertarRegistros($sql5);

      if (is_numeric($ajuste))
       { $sql6="update facorrelat set coraju='".$ajuste."'";}
       else { $sql6="update facorrelat set coraju=0";}
      Herramientas::insertarRegistros($sql6);

    }
  }

  public static function incluyePrimerRegistro()
  {
    $c= new Criteria();
    $reg= FacorrelatPeer::doSelectOne($c);
    if (count($reg)==0)
    {
      $tabla= new Facorrelat();
      $tabla->setCorpre(0);
      $tabla->setCorped(0);
      $tabla->setCorfac(0);
      $tabla->setCornot(0);
      $tabla->setCordph(0);
      $tabla->setCordev(0);
      $tabla->setCoraju(0);
      $tabla->save();
    }
  }

  public static function salvarNumlot($numlot)
  {
	if ($numlot != ''){
		$sql="Update Empresa set numlot='".$numlot."' where codemp='001'";
		Herramientas::insertarRegistros($sql);
		return -1;
	}
	else
		return 0;
  }

  public static function salvarCodcat($codcat)
  {
	if ($codcat != ''){
		$sql="Update Empresa set codcat='".$codcat."' where codemp='001'";
		Herramientas::insertarRegistros($sql);
		return -1;
	}
	else
		return 0;
  }

/*******************************Fin Definición de Artículos**********************************************/

/*******************************Definición de Productos Alternos **********************************************/


  public static function eliminarFaproalt($codart)
   {

    $c = new Criteria();
    $c->add(FaproaltPeer::CODART,$codart);
    $obj = FaproaltPeer::doSelect($c);

    if ($obj)
        foreach ($obj as $registro)
    		$registro->delete();
    return true;
   }

    public static function salvarFaproalt($faproalt, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {

        $x[$j]->setCodart($faproalt->getCodart());
        $x[$j]->save();
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

/*******************************Fin Definición de Productos Alternos **********************************************/

/*******************************Definición de Precios **********************************************/
  public static function salvarFaartpvp($faartpvp,$grid, $codart, $codbar)
  {
    $x = $grid[0];
    $j = 0;
    while (($j < count($x))&&($x[$j]->getPvpart() > 0)) {
      if ($x[$j]->getDespvp() != ''){
	      $x[$j]->setCodart($codart);
              $x[$j]->setCodbar($codbar);
	      $x[$j]->setDespvp($x[$j]->getDespvp());
	      $x[$j]->setPvpart($x[$j]->getPvpart());
              $x[$j]->setFecdes($x[$j]->getFecdes());
              $x[$j]->setFechas($x[$j]->getFechas());
	      $x[$j]->save();
      }
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty($z[$j]))
    {
      while ($j < count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }
  }

/*******************************Fin Definición de Precios **********************************************/

/*******************************Definición de Ciudad **********************************************/

  public static function salvarFaciudad($faciudad,$estado,$ciudad)
  {

  	if (Herramientas :: getX_vacio('id', 'Faciudad', 'id', $faciudad->getId()) != '') {
  		if ($estado != 0){
		  $faciudad->setFaestadoId($estado);
		  $faciudad->setNomciu($ciudad);
		  $faciudad->save();
  		}
  	}
  	else{
      if ($estado!='')
      {
	      $tabla= new Faciudad();
	      $tabla->setFaestadoId($estado);
	      $tabla->setNomciu($ciudad);
	      $tabla->save();
      }
  	}
  }


/*******************************Fin Definición de Ciudad **********************************************/


/*******************************Recargos por Articulos **********************************************/

    public static function salvarFarecart($farecart, $grid, $codrgo){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        $x[$j]->setCodrgo($codrgo);
        $x[$j]->setCodart($x[$j]->getCodart());
        $x[$j]->save();
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


/*******************************Fin Recargos por Articulos **********************************************/

/*******************************Descuentos por tipo de cliente **********************************************/
    public static function salvarFadtocte($fadtocte, $grid)
    {
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
          $x[$j]->setFatipcteId($fadtocte->getFatipcteId());
          $x[$j]->save();
          $j++;
        }

        $z=$grid[1];
        $j=0;
        while ($j<count($z)){
          $z[$j]->delete();
          $j++;
        }

    }

/*******************************Fin Descuentos por tipo de cliente **********************************************/

/*******************************Consignación **********************************************/

  public static function salvarFaartpro($faartpro, $grid, $rifpro, $codalm){
    $codigo=Herramientas::getX('rifpro','facliente','codpro',$rifpro);

    $c = new Criteria();
    $c->add(FaartproPeer::CODPRO,$codigo);
    $c->add(FaartproPeer::CODALM,$codalm);
    $datos = FaartproPeer::doSelect($c);

    try
    {
       if ($datos)
       {
    	  foreach ($datos as $reg)
    	  {
           $reg->delete();
    	  }
       }
    }
    catch (PropelException $e){}


        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
              $x[$j]->setCodpro($codigo);
              $x[$j]->setCodalm($codalm);
              $x[$j]->setCodcta($faartpro->getCodcta());
              $x[$j]->setComisi($x[$j]->getComisi());
              $x[$j]->save();
              $j++;
        }

        $z=$grid[1];
        $j=0;
        while ($j<count($z)){
          $z[$j]->delete();
          $j++;
        }
      }

/*******************************Fin Consignación **********************************************/

/******************************* Salvar Presupuesto **********************************************/
  public static function salvarFapresup($fapresup, $grid, $grid3,$grid4)
  {

  try {
  //if (Herramientas::getVerCorrelativo('corpre','Facorrelat',&$r))
    $mantippre=H::getConfApp2('mantippre', 'facturacion', 'fapresup');
    $mancorsed=H::getConfApp2('mancorsed', 'facturacion', 'fapresup');
    $tienecorrelativo=false;
    if (true)
	  {
	    //Se graba el Pedido
	    if ($fapresup->getRefpre()=='########')
	    {        
        if ($mantippre=='S' && $fapresup->getTippre()!='C')
        {          
          if ($fapresup->getTippre()=='R') $correl='corprerot'; else $correl='corprepat';
          if (Herramientas::getVerCorrelativo($correl,'facorrelat',$r))
          {
              $tienecorrelativo=true;
              $encontrado=false;
              while (!$encontrado)
              {
                $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
                if ($fapresup->getTippre()=='R') $numero='RO'.substr($numero,2,strlen($numero));
                else $numero='PA'.substr($numero,2,strlen($numero));

                $sql="select refpre from fapresup where refpre='".$numero."'";
                if (Herramientas::BuscarDatos($sql,$result))
                {
                  $r=$r+1;
                }
                else
                {
                  $encontrado=true;
                }
              }
              $fapresup->setRefpre($numero);
          }
        }else {
          if ($mancorsed=='S'){
            if ($fapresup->getTiecot()=='S'){
              $r1=H::getX_vacio('CODSED','Fadefsed','Corsed1',$fapresup->getCodsed());
              $cormadre=substr($fapresup->getRefpreaso(),0,strlen($fapresup->getRefpreaso())-2);
              $tienecorrelativo=true;
              $encontrado=false;
              while (!$encontrado)
              {
                $numero=$cormadre.str_pad($r1, 2, '0', STR_PAD_LEFT);
                $sql="select refpre from fapresup where refpre='".$numero."'";
                if (Herramientas::BuscarDatos($sql,$result))
                {
                  $r1=$r1+1;
                }
                else
                {
                  $encontrado=true;
                }
              }
              $fapresup->setRefpre($numero);
            }else{
              $r=H::getX_vacio('CODSED','Fadefsed','Corsed',$fapresup->getCodsed());
              $r1=H::getX_vacio('CODSED','Fadefsed','Corsed1',$fapresup->getCodsed());
              $tienecorrelativo=true;
              $encontrado=false;
              while (!$encontrado)
              {
                $numero=$fapresup->getCodsed().str_pad($r, 3, '0', STR_PAD_LEFT).str_pad($r1, 2, '0', STR_PAD_LEFT);

                $sql="select refpre from fapresup where refpre='".$numero."'";
                if (Herramientas::BuscarDatos($sql,$result))
                {
                  $r=$r+1;
                }
                else
                {
                  $encontrado=true;
                }
              }
              $fapresup->setRefpre($numero);
            }

          }else {
            $tienecorrelativo=true;
            $facorrelat = new Facorrelat();
            $r=$facorrelat->getSecpre();
            $fapresup->setRefpre(str_pad($r, 8, '0', STR_PAD_LEFT));
          }
        }
	    }
	    else
	    {
	      $fapresup->setRefpre(str_replace('#','0',$fapresup->getRefpre()));
	    }

      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $fapresup->setReapor($loguse);

      $moneda=$fapresup->getTipmon();
      $valor=$fapresup->getValmon();   
      $fapresup->setMonpre($fapresup->getMonpre()*$valor);
      $fapresup->setMonrgo($fapresup->getMonrgo()*$valor);
      $fapresup->setMondesc($fapresup->getMondesc()*$valor);
	    $fapresup->save();
      if ($tienecorrelativo==true && $mantippre=='S' && $fapresup->getTippre()!='C')
      {
       H::getSalvarCorrelativo($correl,'facorrelat','Referencia',$r,$msg);
      }

      if ($mancorsed=='S' && $fapresup->getTiecot()=='S' && $tienecorrelativo==true){
        $q= new Criteria();
        $q->add(FadefsedPeer::CODSED,$fapresup->getCodsed());
        $regq= FadefsedPeer::doSelectOne($q);
        if ($regq){
          $regq->setCorsed1($r1);
          $regq->save();
        }        
      }
      if ($mancorsed=='S' && $fapresup->getTiecot()=='N' && $tienecorrelativo==true){
        $q= new Criteria();
        $q->add(FadefsedPeer::CODSED,$fapresup->getCodsed());
        $regq= FadefsedPeer::doSelectOne($q);
        if ($regq){
          $regq->setCorsed($r);
          $regq->setCorsed1($r1);
          $regq->save();
        }        
      }

	    // Se graban los detalles del Pedido
	    self::Grabar_DetallesPresup($fapresup,$grid);
      self::Grabar_RecargosPresup($fapresup,$grid);
      self::Grabar_ClausulasPresup($fapresup,$grid4);
      /*if ($mantippre=='S' && $fapresup->getTippre()=='C'){
        self::Grabar_ContratoPresup($fapresup,$grid3);
      }*/
	    //Herramientas::getSalvarCorrelativo('corpre','Facorrelat','Presupuesto',$r,$msg);
	  }

      return -1;
    } catch (Exception $ex) {
      return 0;
    }
  }

    public static function Grabar_DetallesPresup($fapresup, $grid){

      $anaprecio=H::getConfApp2('anaprecio', 'facturacion', 'fapresup');
        $c= new Criteria();
        $c->add(FadetprePeer::REFPRE,$fapresup->getRefpre());     
        FadetprePeer::doDelete($c);

      $moneda=$fapresup->getTipmon();
      $valor=$fapresup->getValmon();

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="")
       {
       	 $fadetpre= new Fadetpre();
         $fadetpre->setRefpre($fapresup->getRefpre());
         $fadetpre->setCodart($x[$j]->getCodart());
         $fadetpre->setDesart($x[$j]->getDesart());
         $fadetpre->setUnimed($x[$j]->getUnimed());
         $fadetpre->setNuitem($x[$j]->getNuitem());
         $fadetpre->setCansol($x[$j]->getCansol());
         $fadetpre->setPrecio($x[$j]->getPrecio());
         $fadetpre->setMondesc($x[$j]->getMondesc()*$valor);
         if ($x[$j]->getCheck()=='1')
           $fadetpre->setMonrgo($x[$j]->getMonrgo()*$valor);
         else
            $fadetpre->setMonrgo(0);
         $fadetpre->setTotart($x[$j]->getTotart()*$valor);
         $fadetpre->setFecent($x[$j]->getFecent());
         $fadetpre->setCodmon($x[$j]->getCodmon());
         $fadetpre->setValmon($x[$j]->getValmon());
         if ($x[$j]->getContratos()!=''){
              $c1= new Criteria();
              $c1->add(FadetconPeer::REFPRE,$fapresup->getRefpre());                 
              $c1->add(FadetconPeer::CODART,$x[$j]->getCodart());                 
              FadetconPeer::doDelete($c1);
             $cadenacont=split('!',$x[$j]->getContratos());
             $r=0;
             while ($r<(count($cadenacont)-1))
             {
               $aux=$cadenacont[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {               
                 $dateFormat = new sfDateFormat('es_VE');
                 $fec1 = $dateFormat->format($aux2[0], 'i', $dateFormat->getInputPattern('d')); 

                 $dateFormat = new sfDateFormat('es_VE');
                 $fec2 = $dateFormat->format($aux2[1], 'i', $dateFormat->getInputPattern('d'));

                 /* $c= new Criteria();
                  $c->add(FadetconPeer::REFPRE,$fapresup->getRefpre());
                  $c->add(FadetconPeer::PERCON,$fapresup->getPercon());
                  $c->add(FadetconPeer::CODART,$x[$j]->getCodart());
                  $c->add(FadetconPeer::FECINI,$fec1);                
                  FadetconPeer::doDelete($c);
                  $trajo= FadetconPeer::doSelectOne($c);
                  if ($trajo)
                  {
                      $trajo->setCancon(H::toFloat($aux2[2]));
                      $trajo->save();                      
                  }else {*/
                      $fadetcon2= new Fadetcon();
                      $fadetcon2->setRefpre($fapresup->getRefpre());
                      $fadetcon2->setPercon($fapresup->getPercon());
                      $fadetcon2->setCodart($x[$j]->getCodart());
                      $fadetcon2->setFecini($fec1);
                      $fadetcon2->setFecfin($fec2);                      
                      $fadetcon2->setCancon(H::toFloat($aux2[2]));
                      $fadetcon2->save();
                  //}
              }
             $r++;
            }//while
         }
        if ($anaprecio=='S'){
          //Materiales
          if ($x[$j]->getAnapreunimat()!=''){
            $mat= new Criteria();
            $mat->add(FaprematartPeer::REFPRE,$fapresup->getRefpre());                 
            $mat->add(FaprematartPeer::CODART,$x[$j]->getCodart());                 
            FaprematartPeer::doDelete($mat);

            $cadenamat=split('!',$x[$j]->getAnapreunimat());
            $m=0;
            while ($m<(count($cadenamat)-1))
            {
               $aux=$cadenamat[$m];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {               
                 $faprematart2= new Faprematart();
                 $faprematart2->setRefpre($fapresup->getRefpre());
                 $faprematart2->setCodart($x[$j]->getCodart());
                 $faprematart2->setCodmat($aux2[0]);                 
                 $faprematart2->setUnimat($aux2[2]);               
                 $faprematart2->setCanmat(H::toFloat($aux2[3]));
                 $faprematart2->setCosmat(H::toFloat($aux2[4]));
                 $faprematart2->setTotmat(H::toFloat($aux2[5]));
                 $faprematart2->save();                  
              }
             $m++;
            }//while
          }
          //Maquinaria o Equipos 
          if ($x[$j]->getAnapreuniequ()!=''){
            $equ= new Criteria();
            $equ->add(FapreequartPeer::REFPRE,$fapresup->getRefpre());                 
            $equ->add(FapreequartPeer::CODART,$x[$j]->getCodart());                 
            FapreequartPeer::doDelete($equ);

            $cadenaequ=split('!',$x[$j]->getAnapreuniequ());
            $e=0;
            while ($e<(count($cadenaequ)-1))
            {
               $aux=$cadenaequ[$e];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {               
                 $fapreequart2= new Fapreequart();
                 $fapreequart2->setRefpre($fapresup->getRefpre());
                 $fapreequart2->setCodart($x[$j]->getCodart());
                 $fapreequart2->setCodequ($aux2[0]);                 
                 $fapreequart2->setUniequ($aux2[2]);               
                 $fapreequart2->setCanequ(H::toFloat($aux2[3]));
                 $fapreequart2->setCosequ(H::toFloat($aux2[4]));
                 $fapreequart2->setTotequ(H::toFloat($aux2[5]));
                 $fapreequart2->save();                  
              }
             $e++;
            }//while
          }
          //Mano de Obra
          if ($x[$j]->getAnapreuniman()!=''){
            $man= new Criteria();
            $man->add(FapremanartPeer::REFPRE,$fapresup->getRefpre());                 
            $man->add(FapremanartPeer::CODART,$x[$j]->getCodart());                 
            FapremanartPeer::doDelete($man);

            $cadenaman=split('!',$x[$j]->getAnapreuniman());
            $o=0;
            while ($o<(count($cadenaman)-1))
            {
               $aux=$cadenaman[$o];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {               
                 $fapremanart2= new Fapremanart();
                 $fapremanart2->setRefpre($fapresup->getRefpre());
                 $fapremanart2->setCodart($x[$j]->getCodart());
                 $fapremanart2->setCodman($aux2[0]);                 
                 $fapremanart2->setUniman($aux2[2]);               
                 $fapremanart2->setCanman(H::toFloat($aux2[3]));
                 $fapremanart2->setCosman(H::toFloat($aux2[4]));
                 $fapremanart2->setTotman(H::toFloat($aux2[5]));
                 $fapremanart2->save();                  
              }
             $o++;
            }//while
          }
          //Servicios Externos
          if ($x[$j]->getAnapreuniser()!=''){
            $serv= new Criteria();
            $serv->add(FapreserartPeer::REFPRE,$fapresup->getRefpre());                 
            $serv->add(FapreserartPeer::CODART,$x[$j]->getCodart());                 
            FapreserartPeer::doDelete($serv);

            $cadenaser=split('!',$x[$j]->getAnapreuniser());
            $s=0;
            while ($s<(count($cadenaser)-1))
            {
               $aux=$cadenaser[$s];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {               
                 $fapreserart2= new Fapreserart();
                 $fapreserart2->setRefpre($fapresup->getRefpre());
                 $fapreserart2->setCodart($x[$j]->getCodart());
                 $fapreserart2->setCodser($aux2[0]);                 
                 $fapreserart2->setUniser($aux2[2]);               
                 $fapreserart2->setCanser(H::toFloat($aux2[3]));
                 $fapreserart2->setCosser(H::toFloat($aux2[4]));
                 $fapreserart2->setTotser(H::toFloat($aux2[5]));
                 $fapreserart2->save();                  
              }
             $s++;
            }//while
          }
        }

         $fadetpre->save();
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

/******************************* Fin de Salvar Presupuesto **********************************************/

/******************************* Salvar Ajustes **********************************************/
    public static function salvarFaajuste($faajuste,$grid)
    {
	    //try {

        	  if (Herramientas::getVerCorrelativo('coraju','Facorrelat',$r))
		  {
		    //Se graba el ajuste
		    if ($faajuste->getRefaju()=='########')
		    {
		        $encontrado=false;
		        while (!$encontrado)
		        {
		          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
		          $sql="select refaju from Faajuste where refaju='".$numero."'";
		          if (Herramientas::BuscarDatos($sql,$result))
		          {
		            $r=$r+1;
		          }
		          else
		          {
		            $encontrado=true;
		          }
		        }
		    $faajuste->setRefaju(str_pad($r, 8, '0', STR_PAD_LEFT));
		    }
		    else
		    {
		      $faajuste->setRefaju(str_replace('#','0',$faajuste->getRefaju()));

		    }

                 if ($faajuste->getTipaju() == 'F'){

                            if (self::generarAsientos($faajuste, $grid,$arrasientos,$pos,$msj3))
                            {
                              self::grabarComprobanteMaestro($faajuste,$arrasientos,$pos);
                            }else {
                                return $msj3;
                            }
                      }
			$faajuste->setStaaju('A');
			$faajuste->save();


		    // Se graban los detalles del ajuste
		    self::Grabar_DetallesAjuste($faajuste,$grid);
		    Herramientas::getSalvarCorrelativo('coraju','Facorrelat','Ajustes',$r,$msg);
		  }

	      return -1;
	   /* } catch (Exception $ex) {
	      return 0;
	    }*/
    }

    public static function Grabar_DetallesAjuste($faajuste, $grid){
  	  $c = new Criteria();
  	  $c->add(EmpresaPeer::CODEMP,'001');
  	  $reg = EmpresaPeer::doSelectone($c);
	  if ($reg)
	  	$numlot = $reg->getNumlot();

      $x=$grid[0];
      $totalajus=0;
      $totalrec=0;
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="" && $x[$j]->getCanaju()>0)
       {
       	 $codarti = $x[$j]->getCodart();
       	 $famovaju= new Famovaju();
         $famovaju->setRefaju($faajuste->getRefaju());
         $famovaju->setCodart($codarti);
         if ($faajuste->getTipaju() == 'NE'){
             $famovaju->setNumlot($x[$j]->getNumlot());
         }
         $famovaju->setCanord($x[$j]->getCanord());
         if ($faajuste->getTipo()=='CREDITO')
         {
           $famovaju->setCanaju($x[$j]->getCanaju());
           $facantaju=$x[$j]->getCanaju();
           $famovaju->setPreaju($x[$j]->getAjupre());
           $fapreaju=$x[$j]->getAjupre();
         }
         else {
         	$famovaju->setCanaju($x[$j]->getCanaju()*(-1));
         	$facantaju=$x[$j]->getCanaju()*(-1);
           $famovaju->setPreaju($x[$j]->getAjupre()*(-1));
           $fapreaju=$x[$j]->getAjupre()*(-1);
         }
         $famovaju->setMontot($x[$j]->getMontot());
         $totalajus=$totalajus+$x[$j]->getMontot();
         $famovaju->setRecaju($x[$j]->getRecaju());
         $totalrec=$totalrec + $x[$j]->getRecaju();
         $famovaju->setRefdetfacid($x[$j]->getId());
         $famovaju->save();
         $tipo=H::getX('CODART','Caregart','Tipo',$codarti);

         if ($faajuste->getTipaju() == 'NE'){
                $p= new Criteria();
                $p->add(FaartnotPeer::NRONOT,$faajuste->getCodref());
                $p->add(FaartnotPeer::CODART,$codarti);
                $datos= FaartnotPeer::doSelectOne($p);
                if ($datos){

                if ($tipo=='A') {
                    $l= new Criteria();
                    $l->add(CaregartPeer::CODART,$codarti);
                    $data= CaregartPeer::doSelectOne($l);
                    if ($data)
                    {
                      if ($x[$j]->getCanaju() < $x[$j]->getCanord())
                      {
                        $data->setDistot($data->getDistot() + ($x[$j]->getCanord() - $x[$j]->getCanaju()));
                        $data->save();
                      }else{
                        $data->setDistot($data->getDistot() - ($x[$j]->getCanaju() - $x[$j]->getCanord()));
                        $data->save();
                      }
                    }
                }
                 $datos->setCanaju($datos->getCanaju() + $facantaju);
                 $datos->save();
                }
         }
         else if ($faajuste->getTipaju() == 'P'){
                 $p= new Criteria();
                 $p->add(FaartpedPeer::NROPED,$faajuste->getCodref());
                 $p->add(FaartpedPeer::CODART,$codarti);
                 $datos= FaartpedPeer::doSelectOne($p);
                 if ($datos){
                   $datos->setCanaju($datos->getCanaju() + $facantaju);
                   $datos->save();
                 }
         }
         else if ($faajuste->getTipaju() == 'F'){
                 $p= new Criteria();
                 $p->add(FaartfacPeer::REFFAC,$faajuste->getCodref());
                 $p->add(FaartfacPeer::CODART,$codarti);
                 $datos= FaartfacPeer::doSelectOne($p);
                 if ($datos){

                 if ($tipo=='A') {
                    $l= new Criteria();
                    $l->add(CaregartPeer::CODART,$codarti);
                    $data= CaregartPeer::doSelectOne($l);
                    if ($data)
                    {
                      if ($facantaju < $x[$j]->getCanord())
                      {
                        $data->setDistot($data->getDistot() - $facantaju);
                        $data->save();
                      }else{
                        $data->setDistot($data->getDistot() - ($facantaju - $x[$j]->getCanord()));
                        $data->save();
                      }
                    }
                 }
                 $sql="select preaju as preajureal from faartfac where reffac='".$faajuste->getCodref()."' and codart='".$codarti."'";
                 if (Herramientas::BuscarDatos($sql,$result))
                 {
                    $precioajureal=$result[0]["preajureal"];
                 }
                   if ($x[$j]->getAjupre()==0)
                       $datos->setCanaju($datos->getCanaju() + $facantaju);
                   else
                        $datos->setPreaju($precioajureal + $fapreaju);

                   $datos->setRecaju($x[$j]->getRecaju());

                   $datos->save();                   
                 }
         }
       }
       $j++;
      }
      if ($faajuste->getTipaju() == 'F'){
         self::ajusteDocumentoxCobrar($faajuste,$totalajus,$totalrec);

          /*if (self::generarAsientos($faajuste, $grid,$arrasientos,$pos,$msj3))
            {
              self::grabarComprobanteMaestro($faajuste,$arrasientos,$pos);
            }*/
      }

      $z=$grid[1];
      $j=0;
      while ($j<count($z))
      {
        $z[$j]->delete();
        $j++;
      }
    }

/******************************* Fin de Salvar Ajustes **********************************************/

/******************************* Salvar Devoluciones **********************************************/

    public static function salvarFadevolu($fadevolu,$grid)
    {
	    try {
		  if (Herramientas::getVerCorrelativo('cordev','Facorrelat',$r))
		  {
		    //Se graba la devolución
		    if ($fadevolu->getNrodev()=='########')
		    {
		        $encontrado=false;
		        while (!$encontrado)
		        {
		          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
		          $sql="select nrodev from Fadevolu where nrodev='".$numero."'";
		          if (Herramientas::BuscarDatos($sql,$result))
		          {
		            $r=$r+1;
		          }
		          else
		          {
		            $encontrado=true;
		          }
		        }
		    $fadevolu->setNrodev(str_pad($r, 8, '0', STR_PAD_LEFT));
		    }
		    else
		    {
		      $fadevolu->setNrodev(str_replace('#','0',$fadevolu->getNrodev()));

		    }
			$fadevolu->setStadph('A');
      $fadevolu->setFecreg(date('Y-m-d'));
			$fadevolu->save();


		    // Se graban los detalles de la devolucion
		    self::Grabar_DetallesDev($fadevolu,$grid);
		    Herramientas::getSalvarCorrelativo('cordev','Facorrelat','Devolución',$r,$msg);
		  }

	      return -1;
	    } catch (Exception $ex) {
	      return 0;
	    }
    }

    public static function Grabar_DetallesDev($fadevolu, $grid){
  	  $c = new Criteria();
  	  $c->add(EmpresaPeer::CODEMP,'001');
  	  $reg = EmpresaPeer::doSelectone($c);
	  if ($reg)
	  	$numlot = $reg->getNumlot();

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="" && $x[$j]->getCandev()>0)
       {
       	 $codarti = $x[$j]->getCodart();
       	 $faartnot= new Faartdev();
         $faartnot->setNrodev($fadevolu->getNrodev());
         $faartnot->setCodart($codarti);
         $faartnot->setNumlot($x[$j]->getNumlot());
         $faartnot->setCandes($x[$j]->getCandph());
         $faartnot->setCandev($x[$j]->getCandev());
         $faartnot->setPreart($x[$j]->getPreart());
         $faartnot->setTotart($x[$j]->getMontot());
         $faartnot->setCodalm($x[$j]->getCodalm());
         $faartnot->setCodubi($x[$j]->getCodubi());
         $faartnot->setNumlot($x[$j]->getNumlot());
         $faartnot->save();

    		 $p= new Criteria();
    		 $p->add(CaregartPeer::CODART,$codarti);
    		 $resul= CaregartPeer::doSelectOne($p);
    		 if ($resul)
    		 {
    		 	$tipo=$resul->getTipo();
               if ($resul->getTipo()=='A')
               {
               	 $resul->setExitot($resul->getExitot() + $x[$j]->getCandev());
               	 $resul->setDistot($resul->getDistot() + $x[$j]->getCandev());
               	 $resul->save();
               }
    		 }

         $p= new Criteria();
         $p->add(CaartalmPeer::CODALM,$x[$j]->getCodalm());
         $p->add(CaartalmPeer::CODART,$x[$j]->getCodart());         
         $resultp= CaartalmPeer::doSelectOne($p);
         if ($resultp)
         {
         	if ($tipo=='A')
         	{
         		$resultp->setExiact($resultp->getExiact() + $x[$j]->getCandev());
         		$resultp->save();
         	}
         }
         
         $t= new Criteria();
         $t->add(CaartalmubiPeer::CODALM,$x[$j]->getCodalm());
         $t->add(CaartalmubiPeer::CODART,$x[$j]->getCodart());
         $t->add(CaartalmubiPeer::CODUBI,$x[$j]->getCodubi());
         $t->add(CaartalmubiPeer::NUMLOT,$x[$j]->getNumlot());
         $result= CaartalmubiPeer::doSelectOne($t);
         if ($result)
         {
         	if ($tipo=='A')
         	{
         		$result->setExiact($result->getExiact() + $x[$j]->getCandev());
         		$result->save();
         	}
         }

		 $sql = "select * from caartdph where dphart ='" . $fadevolu->getRefdes() . "' and codart = '" . $codarti. "'";
		 if (Herramientas :: BuscarDatos($sql, $resul)) {
			if ($resul){
				foreach ($resul as $r){
				     $c = new Criteria();
				     $c->add(CaartdphPeer::DPHART,$r['dphart']);
				     $c->add(CaartdphPeer::CODART,$r['codart']);
				     $arti = CaartdphPeer::doSelectOne($c);
				     if ($arti){
				         $act1=$arti->getCandev() + $x[$j]->getCandev();
				         $arti->setCandev($act1);
				         $arti->save();
				     }
				}
			}
		 }

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

/******************************* Fin Salvar Devoluciones **********************************************/


/******************************* Salvar Nota de Entrega **********************************************/
  public static function salvarFafanot($fanotent, $grid,$logusu)
  {
    try {
	  if (Herramientas::getVerCorrelativo('cornot','Facorrelat',$r))
	  {
	    //Se graba el Pedido
	    if ($fanotent->getNronot()=='########')
	    {
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	          $sql="select nronot from Fanotent where nronot='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	    $fanotent->setNronot(str_pad($r, 8, '0', STR_PAD_LEFT));
	    }
	    else
	    {
	      $fanotent->setNronot(str_replace('#','0',$fanotent->getNronot()));

	    }
		$fanotent->setStatus('A');
		if ($fanotent->getTipnot()=='O')
		{
			$fanotent->setAutori('S');
			$fanotent->setFecaut(date('Y-m-d'));
			$fanotent->setCodusu($logusu);

		}
		$fanotent->save();


	    // Se graban los detalles del Pedido
	    self::Grabar_DetallesNotEnt($fanotent,$grid);
	    if (self::grabarComprobanteNotEnt($fanotent, $grid,$msj2))
	    {
	      $fanotent->save();
	    }
	    Herramientas::getSalvarCorrelativo('cornot','Facorrelat','Nota de Entrega',$r,$msg);
	  }

      return -1;
    } catch (Exception $ex) {
      return 0;
    }
  }

    public static function Grabar_DetallesNotEnt($fanotent, $grid){
  	  $c = new Criteria();
  	  $c->add(EmpresaPeer::CODEMP,'001');
  	  $reg = EmpresaPeer::doSelectone($c);
	  if ($reg)
	  	$numlot = $reg->getNumlot();

      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="")
       {
       	 if ($x[$j]->getCanent() > 0){
	       	 $faartnot= new Faartnot();
	         $faartnot->setNronot($fanotent->getNronot());
	         $faartnot->setCodart($x[$j]->getCodart());
	         $faartnot->setCodalm($x[$j]->getCodalm());
	         $faartnot->setNumlot($numlot);
	         $faartnot->setCansol($x[$j]->getCansol());
	         $faartnot->setCanent($x[$j]->getCanent());
	         $faartnot->setCandes($x[$j]->getCandes());
	         $faartnot->setCanaju($x[$j]->getCanaju());
	         $faartnot->setCandev($x[$j]->getCandev());
	         $faartnot->setCantot($x[$j]->getCantot());
	         $faartnot->setPreart($x[$j]->getPreart());
	         $faartnot->setMondes($x[$j]->getMondes());
	         $faartnot->setMonrgo($x[$j]->getMonrgo());
	         $faartnot->setTotart($x[$j]->getTotart());
	         $faartnot->save();

		     $codarti = $x[$j]->getCodart();
		     $cante = $x[$j]->getCanent();
		     $c = new Criteria();
		     $c->add(CaregartPeer::CODART,$codarti);
		     $arti = CaregartPeer::doSelectOne($c);
		     if ($arti)
		     {
		       $tipoart=$arti->getTipo();
		       if ($tipoart=='A')
		       {
		         $act1=$arti->getExitot() - $cante;
		         $dis1=$arti->getDistot() - $cante;
		         $arti->setExitot($act1);
		         $arti->setDistot($dis1);
		         $arti->save();

		         $c = new Criteria();
		         $c->add(CaartalmPeer::CODART,$codarti);
		         $c->add(CaartalmPeer::CODALM,$x[$j]->getCodalm());
		         $reg = CaartalmPeer::doSelectOne($c);
		         if ($reg)
		         {
		                if($reg->getExiact()>=$cante)
		                 {
		                     $act2=$reg->getExiact() - $cante;
		                     $reg->setExiact($act2);
		                     $reg->save();
		                 }
		         }
		       }
		     }

			 if ($fanotent->getTipref() == 'P'){

				 $sql = "select * from caartdph where codart = '" . $codarti. "' and dphart in (select dphart from cadphart where tipref = 'P' and reqart = '" . $fanotent->getCodref() . "' and stadph = 'A')";
	 			 if (Herramientas :: BuscarDatos($sql, $resul)) {
	    			if ($resul){
	  					foreach ($resul as $r){
						     $c = new Criteria();
						     $c->add(CaartdphPeer::DPHART,$r['dphart']);
						     $c->add(CaartdphPeer::CODART,$r['codart']);
						     $c->add(CaartdphPeer::CODCAT,$r['codcat']);
						     $arti = CaartdphPeer::doSelectOne($c);
						     if ($arti){
						         $act1=$arti->getCanent() + $x[$j]->getCanent();
						         $arti->setCanent($act1);
						         $arti->save();
						     }
	  					}
	    			}
				 }
			 }

			 if ($fanotent->getTipref() == 'F'){

				 $sql = "select * from caartdph where codart = '" . $codarti. "' and dphart in (select dphart from cadphart where tipref = 'F' and reqart = '" . $fanotent->getCodref() . "' and stadph = 'A')";
	 			 if (Herramientas :: BuscarDatos($sql, $resul)) {
	    			if ($resul){
	  					foreach ($resul as $r){
						     $c = new Criteria();
						     $c->add(CaartdphPeer::DPHART,$r['dphart']);
						     $c->add(CaartdphPeer::CODART,$r['codart']);
						     $c->add(CaartdphPeer::CODCAT,$r['codcat']);
						     $arti = CaartdphPeer::doSelectOne($c);
						     if ($arti){
						         $act1=$arti->getCanent() + $x[$j]->getCanent();
						         $arti->setCanent($act1);
						         $arti->save();
						     }
	  					}
	    			}
				 }
			 }


       	 }
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

	public static function BuscarTotalEntregado($codart, $tipref, $codref){
		//se suma lo entregado por notas de entrega
		$sql="select sum(canent) as canent from faartnot where codart = '" . $codart . "' and nronot in (select nronot from fanotent where tipref = '" . $tipref . "' and codref = '" . $codref . "' and status = 'A')";
		if (Herramientas :: BuscarDatos($sql, $resul)) {
			$canent = $resul[0]["canent"];
		} else {
			$canent = 0;
		}

		//se suma lo entregado por despachos
		$sql = "select sum(candph) as candph from caartdph where codart = '" . $codart . "' and dphart in (select dphart from cadphart where tipref = '" . $tipref . "' and reqart = '" . $codref . "' and stadph = 'A')";
		if (Herramientas :: BuscarDatos($sql, $resul)) {
			$candes = $resul[0]["candph"];
		} else {
			$candes = 0;
		}

		$totent = $canent + $candes;
		return $totent;
	}
/******************************* Fin de Salvar Nota de Entrega **********************************************/

/******************************* Salvar Pedidos **********************************************/

  public static function salvarPedidos($fapedido, $grid, $grid2)
  {
   	if ($fapedido->getId()=="")
   	{

  	 $nuevo=true;
     if ($fapedido->getNroped()=='########') {
    	 $c= new Criteria();
    	 $reg=FacorrelatPeer::doSelectOne($c);
    	 if ($reg)
    	 {
             $numero=str_pad($reg->getSecped(), 8, '0', STR_PAD_LEFT);
           }else {
             $facorrelat= new Facorrelat();
             $numero=str_pad($facorrelat->getSecped(), 8, '0', STR_PAD_LEFT);
             $facorrelat->save();
    	 }
    }else {
      $numero=$fapedido->getNroped();
    }

  	 $fapedido->setNroped($numero);
   	}
  	else $nuevo=false;
  	$fapedido->setStatus('A');
    $fapedido->save();
    self::salvarFaartped($fapedido, $grid,$nuevo);
    self::salvarFafecped($fapedido, $grid2);
    self::SalvarRecargosPedidos($fapedido,$grid);
  }

/*******************************Fin Salvar Pedidos **********************************************/

/******************************* Detalle de Pedidos **********************************************/

    public static function salvarFaartped($fapedido, $grid, $nuevo){
    	try{
		      $x=$grid[0];
		      $j=0;
		      while ($j<count($x))
		      {
		        if (($fapedido->getRefped()!='' && $nuevo==true) || ($fapedido->getCombo()!='' && $nuevo==true))
		        {
		           if ($x[$j]->getCodart()!="" && $x[$j]->getCanord()>0)
			       {
			       	   $faartped= new Faartped();
		             $faartped->setNroped($fapedido->getNroped());
		             $faartped->setCodart($x[$j]->getCodart());
		             $faartped->setCanord($x[$j]->getCanord());
		             $faartped->setCanaju($x[$j]->getCanaju());
		             $faartped->setCandes($x[$j]->getCandes());
		             $faartped->setCantot($x[$j]->getCantot());
		             $faartped->setMondesc($x[$j]->getMondesc());
		             $faartped->setMonrgo($x[$j]->getMonrgo());
                             $faartped->setBtucon($x[$j]->getBtucon());
		             if ($fapedido->getCombo()!='')
		             {
		             	if ($x[$j]->getPreart()=="0,00")
				       {
				         $faartped->setPreart(H::tofloat($x[$j]->getPrecioe()));
				       }
				       else
				       {
				       	$faartped->setPreart($x[$j]->getPreart(true));
				       }
		             }
		             else
		             {
		               if ($x[$j]->getPreart()=="0,00")
				       {
				         $faartped->setPreart($x[$j]->getPrecioe());
				       }
				       else
				       {
				       	$faartped->setPreart($x[$j]->getPreart());
				       }
		             }
                     if ($fapedido->getRefped()!='')
                     {
		              $faartped->setTotart(H::tofloat($x[$j]->getTotart2()));
                     }else $faartped->setTotart(H::tofloat($x[$j]->getTotart()));

			         $faartped->save();
			       }
		        }
		        else
		        {
			       if ($x[$j]->getCodart()!="" && $x[$j]->getCanord()>0)
			       {
			       	$x[$j]->setNroped($fapedido->getNroped());
                     if ($x[$j]->getPreart()=="0,00")
				     {
				     	$x[$j]->setPreart($x[$j]->getPrecioe());
				     }
			        $x[$j]->save();
			       }
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

    		return -1;
    	}
	    catch (Exception $ex) {
	      return 0;
	    }


    }

/*******************************Fin Detalle de Pedidos **********************************************/

/******************************* Detalle de Fecha de Entrega de Pedidos **********************************************/

    public static function salvarFafecped($fapedido, $grid){
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
       if ( $x[$j]->getCodart()!="")
       {
       	$x[$j]->setNroped($fapedido->getNroped());
       	$x[$j]->setStafec('V');
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

/*******************************Detalle de Fecha de Entrega de Pedidos**********************************************/

public static function entregas($nroped)
{
 	$a= new Criteria();
  	$a->add(FaartpedPeer::NROPED,$nroped);
  	$reg= FaartpedPeer::doSelect($a);
  	if ($reg)
  	{
  	 foreach ($reg as $obj)
  	 {
  	 	if ($obj->getCandes()!=0)
  	 	{
  	 	  $entregas=true;
  	 	  break;
  	 	}
  	 	else {
  	 		$entregas=false;
  	 	}
  	 }
  	}else $entregas=false;
  	return $entregas;
}

/*******************************Edición de precios **********************************************/
    public static function salvarFaactpre($faartpvp, $grid, $tipo, $precio, $valor)
    {
        $valor = H::toFloat($faartpvp->getMonaum());
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
          $codart = $x[$j]->getCodart();
          $c = new Criteria();
    		  $c->add(FaartpvpPeer::CODART,$codart);
    		  $datos = FaartpvpPeer::doSelect($c);
		    try
		    {
		       if ($datos)
		       {
		    	  foreach ($datos as $reg)
		    	  {
		    	  	if ($faartpvp->getPrecio() == 'A'){ //Aumenta
		    	  		if ($faartpvp->getTipo() == 'P'){ //Puntual
		    	  		  $precio_actual = $reg->getPvpart();
		    	  		  $nuevo_precio = $precio_actual + $valor;
		    	  		  $reg->setPvpart($nuevo_precio);
                          $reg->save();
		    	  		}
		    	  		else{ //Porcentual
		    	  		  $precio_actual = $reg->getPvpart();
		    	  		  $nuevo_precio = $precio_actual + ($precio_actual * ($valor/100));
		    	  		  $reg->setPvpart($nuevo_precio);
                          $reg->save();
		    	  		}
		    	  	}
		    	  	else{ //Disminuye
		    	  		if ($faartpvp->getTipo() == 'P'){ //Puntual
		    	  		  $precio_actual = $reg->getPvpart();
		    	  		  $nuevo_precio = $precio_actual - $valor;
		    	  		  if ($nuevo_precio < 0)
		    	  		     $nuevo_precio = 0;
		    	  		  $reg->setPvpart($nuevo_precio);
                          $reg->save();
		    	  		}
		    	  		else{ //Porcentual
		    	  		  $precio_actual = $reg->getPvpart();
		    	  		  $nuevo_precio = $precio_actual - ($precio_actual * ($valor/100));
		    	  		  if ($nuevo_precio < 0)
		    	  		     $nuevo_precio = 0;
		    	  		  $reg->setPvpart($nuevo_precio);
                          $reg->save();
		    	  		}
		    	  	}
		    	  }
		       }
		       else{
		       	  if ($faartpvp->getTipo() == 'P'){ //Puntual
			       	  $cfaartpvp = new Faartpvp();
			       	  $cfaartpvp->setCodart($codart);
			       	  $cfaartpvp->setPvpart($valor);
			       	  $cfaartpvp->setDespvp('Precio del Venta al Público');
			       	  $cfaartpvp->save();
		       	  }
		       }
		    }
		    catch (PropelException $e){}

          $j++;
        }

        $z=$grid[1];
        $j=0;
        while ($j<count($z)){
          $z[$j]->delete();
          $j++;
        }

    }


/*******************************Fin Edición de precios **********************************************/

/*******************************Definición de Artículos (Correlativos)**********************************************/
	public static function salvarCuentas($ctadev, $ctavco, $generaop, $generacom, $apliclades,$codmon,$codtiptra){
		if ($generaop == 1)
			$generaop = 'S';
		else
			$generaop = 'N';
		if ($generacom == 1)
			$generacom = 'S';
		else
			$generacom = 'N';
		if ($apliclades == 1)
			$apliclades = 'S';
		else
			$apliclades = 'N';
		try{
			$c = new Criteria();
			$c->add(CadefartPeer::CODEMP,'001');
			$reg = CadefartPeer::doSelectone($c);
			if ($reg){
				$reg->setCtadev($ctadev);
				$reg->setCtavco($ctavco);
				$reg->setGeneraop($generaop);
				$reg->setGeneracom($generacom);
				$reg->setApliclades($apliclades);
        $reg->setCodmon($codmon);
        $reg->setCodtiptra($codtiptra);
				$reg->save();
			}
			return -1;
		}
		catch (Exception $ex){
			return 0;
		}
	}

    public static function salvarFacorrelat($fadefcaj, $grid,$proform)
    {
        if (self :: Grabar_Fadefcaj($fadefcaj,$proform) != -1) {
          return 0;
        }
        if (self :: Grabar_Correlativos($grid) != -1) {
          return 0;
        }
		return -1;
    }

  public static function Grabar_Fadefcaj($fadefcaj,$proform) {
    //try {
     if ($proform == 1)
            $proform = 'S';
     else
            $proform = 'N';
     $fadefcaj->setProform($proform);
     $fadefcaj->save();
      return -1;
   /*} catch (Exception $ex) {

      return 0;

    }*/

  }

  public static function Grabar_Correlativos($grid) {
    try {
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){
           $x[$j]->save();
           $j++;
        }

        $z=$grid[1];
        $j=0;
        while ($j<count($z)){
          $z[$j]->delete();
          $j++;
        }

      return -1;

    } catch (Exception $ex) {

      return 0;

    }

  }

  public static function chequearCantPedido($refped,$articulo,$ajustada,$solicitada,$valorcol7,$precioaju,&$cantaju,&$canent)
  {
  	$cantaju=0;
  	$sument=0;
  	$sumdev=0;
  	$cantidad=0;
        $canent=0;

  	$p= new Criteria();
  	$p->add(FaartpedPeer::NROPED,$refped);
  	$p->add(FaartpedPeer::CODART,$articulo);
  	$reg= FaartpedPeer::doSelectOne($p);
  	if ($reg){
  	  $l= new Criteria();
  	  $l->add(FanotentPeer::TIPREF,'P');
  	  $l->add(FanotentPeer::CODREF,$refped);
  	  $regi= FanotentPeer::doSelect($l);
  	  if ($regi)
  	  {
  	  	foreach ($regi as $reg2)
  	  	{
	  	  	$y= new Criteria();
	  	  	$y->add(FaartnotPeer::NRONOT,$reg2->getNronot());
	  	  	$y->add(FaartnotPeer::CODART,$articulo);
	  	  	$regis= FaartnotPeer::doSelectOne($y);
	  	  	if ($regis){
             $sument= $sument + $regis->getCantot();
	  	  	}
  	  	}
  	  }

  	  if ($reg->getCantot()>$sument)
  	  {
  	  	$cantidad= $reg->getCantot() -$reg->getCandes();
  	  }

  	  if (H::tofloat($ajustada)>$cantidad)
  	  {
  	  	if ((H::tofloat($ajustada)<=$sument) && (H::tofloat($ajustada)>=$reg->getCandes()))
  	  	{
  	  	  $cantaju=$ajustada;
  	  	  return true;
  	  	}else
  	  	{
                   if ((H::tofloat($valorcol7)<H::tofloat($solicitada)) && (H::tofloat($ajustada)>=$reg->getCandes()))
           {
           	 $cantaju= $reg->getCantot() -$reg->getCandes();
           	 return true;
           }else
           {
                          if (H::tofloat($valorcol7)<$reg->getCandes())
           	{
           	  	$cantaju=-1;
           	  }else {
           	  	$canent=$reg->getCandes();
           	  	$cantaju=$solicitada;
           	  }
           	return false;
           }
  	  	}
  	  }else{
        if ($sument<=H::tofloat($ajustada))
        {
          $cantaju=$ajustada;
  	  	  return true;
        }else{
          $cantaju=-1;
          return false;
        }
  	  }
  	}else{
  	  return false;
  	}
  }

  public static function chequearCantNota($refnot,$articulo,$ajustada,$solicitada,$tipref,$canentart,$valorcol7,&$cantaju,&$canent,&$canrealped,&$canrealdes,&$canpuedoaju)
  {
    $suma=0;
    $totped=0;
    $cantaju=0;
    $totdes=0;
    $sumgrid=0;

    $l= new Criteria();
    $l->add(FanotentPeer::NRONOT,$refnot);
    $reg= FanotentPeer::doselectOne($l);
    if ($reg)
    {
      $codrefiere= $reg->getCodref();
      $refiere= $reg->getTipref();
      $a= new Criteria();
      $a->add(FanotentPeer::NRONOT,$refnot,Criteria::NOT_EQUAL);
      $a->add(FanotentPeer::CODREF,$codrefiere);
      $a->add(FanotentPeer::TIPREF,$refiere);
      $reg2= FanotentPeer::doselect($a);
      if ($reg2)
      {
      	foreach ($reg2 as $data)
      	{
      	  $e= new Criteria();
      	  $e->add(FaartnotPeer::NRONOT,$data->getNronot());
      	  $reg3= FaartnotPeer::doSelect($e);
      	  if ($reg3)
      	  {
      	  	foreach ($reg3 as $data1)
      	  	{
      	  	  if ($data1->getCodart()==$articulo)
      	  	  {
      	  	  	$suma= $suma + $data1->getCanent();
      	  	  }
      	  	}
      	  }
      	}
      }
      if ($tipref=='P')
      {
      	$t= new Criteria();
      	$t->add(FaartpedPeer::NROPED,$codrefiere);
      	$t->add(FaartpedPeer::CODART,$articulo);
      	$datos= FaartpedPeer::doSelectOne($t);
      }else if ($tipref=='NE')
      {
      	$t= new Criteria();
      	$t->add(FaartnotPeer::NRONOT,$refnot);
      	$t->add(FaartnotPeer::CODART,$articulo);
      	$datos= FaartnotPeer::doSelectOne($t);
      }else
      {
      	$t= new Criteria();
      	$t->add(FaartfacPeer::REFFAC,$refnot);
      	$t->add(FaartfacPeer::CODART,$articulo);
      	$datos= FaartfacPeer::doSelectOne($t);
      }
      if ($datos)
      {
      	$totdes= $datos->getCandes();
      	if ($tipref=='P' || $tipref=='F')
      	  $totped= $datos->getCantot();
      	else $totped=$datos->getCansol();

      	$canrealped=$datos->getCantot();
        $canrealdes=$datos->getCandes();
      }
      $sumgrid=$canentart;
    }else {
    	return false;
    }
    $cantaju=$totped - $suma - $sumgrid;
    $canent= $totdes;
    $canpuedoaju= $cantaju;
    if (H::tofloat($ajustada)>($totped - $suma - $sumgrid))
    {
    	return false;
    }else{
       if ((H::tofloat($valorcol7)>=$totdes) && (H::tofloat($valorcol7)<=$cantaju))
       {
         if ($totdes!=$cantaju)
         {
         	return true;
         }else return false;
       }else return false;
    }
  }

  public static function grabarComprobanteNotEnt(&$fades, $grid,&$msj2)
  {
    $grabarcomprobantenot=true;
    $msj2="";

	$correl=Comprobante::Buscar_Correlativo($fades->getFecdph());
	$reftra=$fades->getDphart();
    $fades->setNumcom($correl);
	$contabc= new Contabc();
	$contabc->setNumcom($correl);
	$contabc->setReftra($reftra);
	$contabc->setFeccom($fades->getFecdph());
	$contabc->setDescom($fades->getDesdph());
	$contabc->setStacom('D');
	$contabc->setTipcom(null);
	$contabc->setMoncom($fades->getMondph());

	$numasiento=0; // Generamos el asiento del Debito del articulo
	$numasiento2=0;
	$x=$grid[0];
	$j=0;
	while($j<count($x))
	{
	  $a= new Criteria();
	  $a->add(CaregartPeer::CODART,$x[$j]->getCodart());
	  $resul= CaregartPeer::doSelectOne($a);
	  if ($resul)
	  {
	      $monto=$x[$j]->getMontotdes();
	      if ($monto>0)
	      {
	        $f= new Criteria();
	        $f->add(Contabc1Peer::NUMCOM,$correl);
	        $f->add(Contabc1Peer::FECCOM,$fades->getFecdph());
	        $f->add(Contabc1Peer::CODCTA,$resul->getCtavta());
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
	          $k->add(ContabbPeer::CODCTA,$resul->getCtavta());
	          $resul2= ContabbPeer::doSelectOne($k);
	          if ($resul2)
	          {
	          	$contabc->save();
	            $numasiento= $numasiento + 1;
	            $contabc1= new Contabc1();
		        $contabc1->setNumcom($correl);
		        $contabc1->setFeccom($fades->getFecdph());
		        $contabc1->setCodcta($resul->getCtavta());
		        $contabc1->setNumasi($numasiento);
		        $contabc1->setRefasi($reftra);
		        $contabc1->setDesasi($resul2->getDescta());
		        $contabc1->setDebcre('D');
		        $contabc1->setMonasi($monto);
		        $contabc1->save();

	          }
	          else
	          {
	          	$msj2="El Artículo ".$x[$j]->getCodart()." no posee una Cuenta de Venta asociada válida... El comprobante de Nota de Entrega no será generado";
	          	$grabarcomprobantenot=false;
	          	return $grabarcomprobantenot;
	          }
	        }

	        $f= new Criteria(); // Generamos el asiento del Credito del articulo
	        $f->add(Contabc1Peer::NUMCOM,$correl);
	        $f->add(Contabc1Peer::FECCOM,$fades->getFecdph());
	        $f->add(Contabc1Peer::CODCTA,$resul->getCtapro());
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
	          $k->add(ContabbPeer::CODCTA,$resul->getCtapro());
	          $resul2= ContabbPeer::doSelectOne($k);
	          if ($resul2)
	          {
	          	$contabc->save();
	            $numasiento2= $numasiento2 + 1;
	            $contabc1= new Contabc1();
		        $contabc1->setNumcom($correl);
		        $contabc1->setFeccom($fades->getFecdph());
		        $contabc1->setCodcta($resul->getCtapro());
		        $contabc1->setNumasi($numasiento2);
		        $contabc1->setRefasi($reftra);
		        $contabc1->setDesasi($resul2->getDescta());
		        $contabc1->setDebcre('C');
		        $contabc1->setMonasi($monto);
		        $contabc1->save();

	          }
	          else
	          {
	          	$msj2="El Artículo ".$x[$j]->getCodart()." no posee una Cuenta de Ingreso de Venta asociada válida... El comprobante de Nota de Entrega no será generado";
	          	$grabarcomprobantenot=false;
	          	return $grabarcomprobantenot;
	          }
	        }
	    }
	    else
	    {
	      	$msj2="El Monto del Artículo ".$x[$j]->getCodart()." debe ser mayor a cero";
	        $grabarcomprobantenot=false;
	        return $grabarcomprobantenot;
	    }
	    }
	  	$j++;
	  }

    return $grabarcomprobantenot;
  }

  public static function eliminarFaajuste($faajuste)
  {
    self::devolverArticulosAju($faajuste);
    if ($faajuste->getTipaju()=='F')
    {
        Herramientas :: EliminarRegistro('Contabc1', 'Refasi', $faajuste->getRefaju());
        Herramientas :: EliminarRegistro('Contabc', 'Reftra', $faajuste->getRefaju());
    }
    Herramientas :: EliminarRegistro('Famovaju', 'Refaju', $faajuste->getRefaju());
    Herramientas :: EliminarRegistro('Faajuste', 'Refaju', $faajuste->getRefaju());
  }

  public static function devolverArticulosAju($faajuste)
  {
    $totalajus=0;
    $totalrec=0;
    $r= new Criteria();
    $r->add(FamovajuPeer::REFAJU,$faajuste->getRefaju());
    $resu= FamovajuPeer::doSelect($r);
    if ($resu)
    {
      foreach ($resu as $resul) {
      $totalrec=$totalrec+$resul->getRecaju();
      $totalajus=$totalajus + $resul->getMontot();
      if ($faajuste->getTipaju()=='P')
      {
         $p= new Criteria();
         $p->add(FaartpedPeer::NROPED,$faajuste->getCodref());
         $p->add(FaartpedPeer::CODART,$resul->getCodart());
         $reg= FaartpedPeer::doSelectOne($p);
      }else if ($faajuste->getTipaju()=='NE'){
      	 $p= new Criteria();
         $p->add(FaartnotPeer::NRONOT,$faajuste->getCodref());
         $p->add(FaartnotPeer::CODART,$resul->getCodart());
         $reg= FaartnotPeer::doSelectOne($p);
      }else{
      	 $p= new Criteria();
         $p->add(FaartfacPeer::REFFAC,$faajuste->getCodref());
         $p->add(FaartfacPeer::CODART,$resul->getCodart());
         $reg= FaartfacPeer::doSelectOne($p);
      }
      if ($reg)
      {
        $tipo=H::getX('CODART','Caregart','Tipo',$resul->getCodart());
        if ($tipo=='A')
        {
            $l= new Criteria();
            $l->add(FadeflotPeer::CODART,$resul->getCodart());
            $l->add(FadeflotPeer::CODALM,$faajuste->getCodalm());
            $l->add(FadeflotPeer::NUMLOT,$resul->getNumlot());
            $datos= FadeflotPeer::doSelectOne($l);
            if ($datos)
            {
              if ($resul->getCanaju() <= $resul->getCanord())
              {
                $datos->setCanlot($datos->getCanlot() - ($resul->getCanord() - $resul->getCanaju()));
              	$datos->save();
              }else{
              	$data->setCanlot($datos->getCanlot() + ($resul->getCanaju() - $resul->getCanord()));
              	$datos->save();
              }
            }

            $l= new Criteria();
		 	$l->add(CaregartPeer::CODART,$resul->getCodart());
		 	$data= CaregartPeer::doSelectOne($l);
		 	if ($data)
		 	{
              if ($resul->getCanaju() <= $resul->getCanord())
              {
              	$data->setDistot($data->getDistot() - ($resul->getCanord() - $resul->getCanaju()));
              	$data->save();
              }else{
              	$data->setDistot($data->getDistot() + ($resul->getCanaju() - $resul->getCanord()));
              	$data->save();
              }
		 	}
        }
        if ($faajuste->getTipaju()=='F'){
        $sql="select preaju as preajureal from faartfac where reffac='".$faajuste->getCodref()."' and codart='".$resul->getCodart()."'";
        if (Herramientas::BuscarDatos($sql,$result))
      {
        $precioajureal=$result[0]["preajureal"];
      }
            if ($resul->getPreaju()==0)
                $reg->setCanaju($reg->getCanaju()-$resul->getCanaju());
            else
                $reg->setPreaju($precioajureal-$resul->getPreaju());
        }else {
            $reg->setCanaju($reg->getCanaju()-$resul->getCanaju());
        }
        $reg->save();
      }
     }

     if ($faajuste->getTipaju()=='F'){
      $q= new Criteria();
      $q->add(CobdocumePeer::REFFAC,$faajuste->getCodref());
      $registro= CobdocumePeer::doSelectOne($q);
      if ($registro)
      {
          $registro->setMondoc($registro->getMondoc()+($totalajus-$totalrec));
          $registro->setRecdoc($registro->getRecdoc() + $totalrec);
          $registro->setSaldoc($registro->getMondoc() + $registro->getRecdoc()-$registro->getDscdoc()-$registro->getAdodoc());
          $registro->save();
      }
     }

    }
  }

  public static function generarAsientos($faajuste, $grid,&$arrasientos,&$pos,&$msj3)
  {
  	$msj3=-1;
        $saldoactual=$faajuste->getMonaju();
        $periodocon=substr($faajuste->getFecaju(),0,4);

        $arrasientos=array();
  	$pos=0;

        $codcli=H::getX('REFFAC', 'Fafactur', 'Codcli', $faajuste->getCodref());
        $ctacont=H::getX('CODPRO', 'Facliente', 'Codcta', $codcli);
        if ($faajuste->getTipo()=='DEBITO')
        {
          if ($ctacont!=""){
          $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctacont);
          if ($desdoc!='')
            Factura::guardarAsientos($ctacont,$desdoc,'D',$saldoactual,$arrasientos,$pos);
          else{
              $msj3=1147;
              return false;
           }
          }else{
            $msj3=1147;
            return false;
         }

        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          $monto_ingreso=$x[$j]->getMonaju();
          $cta_vta=H::getX_vacio('Codart','Caregart','Ctavta',$x[$j]->getCodart());
          if ($cta_vta!="")
          {
            if (!Factura::buscarAsientos($cta_vta,'C',$monto_ingreso,$arrasientos,$pos))
            {
              $descrip=H::getX_vacio('codcta','Contabb','Descta',$cta_vta);
              if ($descrip!='')
                Factura::guardarAsientos($cta_vta,$descrip,'C',$monto_ingreso,$arrasientos,$pos);
              else{
              $msj3=1159;
              return false;
              }
            }
          }else{
              $msj3=1159;
      	      return false;
          }

          //Recargos
          if ($x[$j]->getRecaju()>0) {
          $cta_vta2=self::cuentaRecargo($x[$j]->getCodart(),$faajuste->getCodref(),$x[$j]->getDesart());
          $monto_ingreso2=$x[$j]->getRecaju();
          if ($cta_vta2!="")
          {
            if (!Factura::buscarAsientos($cta_vta2,'C',$monto_ingreso2,$arrasientos,$pos))
            {
              $descrip=H::getX_vacio('codcta','Contabb','Descta',$cta_vta2);
              if ($descrip!='')
                Factura::guardarAsientos($cta_vta2,$descrip,'C',$monto_ingreso2,$arrasientos,$pos);
              else{
              $msj3=1152;
              return false;
             }
            }
          }else{
              $msj3=1152;
      	      return false;
          }
          }
           $j++;
        }

       }
        else
       {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          $monto_ingreso=$x[$j]->getMonaju();
          $cta_vta=H::getX('Codart','Caregart','Ctavta',$x[$j]->getCodart());
          if ($cta_vta!="")
          {
            if (!Factura::buscarAsientos($cta_vta,'D',$monto_ingreso,$arrasientos,$pos))
            {
              $descrip=H::getX_vacio('codcta','Contabb','Descta',$cta_vta);
              if ($descrip!='')
               Factura::guardarAsientos($cta_vta,$descrip,'D',$monto_ingreso,$arrasientos,$pos);
              else{
              $msj3=1159;
              return false;
             }
            }
          }else{
              $msj3=1159;
      	      return false;
          }

          //Recargos
          if ($x[$j]->getRecaju()>0) {
          $cta_vta2=self::cuentaRecargo($x[$j]->getCodart(),$faajuste->getCodref(),$x[$j]->getDesart());
          $monto_ingreso2=$x[$j]->getRecaju();
          if ($cta_vta2!="")
          {
            if (!Factura::buscarAsientos($cta_vta2,'D',$monto_ingreso2,$arrasientos,$pos))
            {
              $descrip=H::getX_vacio('codcta','Contabb','Descta',$cta_vta2);
              if ($descrip!='')
                Factura::guardarAsientos($cta_vta2,$descrip,'D',$monto_ingreso2,$arrasientos,$pos);
              else{
              $msj3=1152;
              return false;
             }
            }
          }else{
              $msj3=1152;
      	      return false;
          }
          }
           $j++;
        }

        if ($ctacont!=""){
          $desdoc=H::getX_vacio('codcta','Contabb','Descta',$ctacont);
          if ($desdoc!='')
            Factura::guardarAsientos($ctacont,$desdoc,'C',$saldoactual,$arrasientos,$pos);
          else{
              $msj3=1147;
              return false;
          }
          }else{
            $msj3=1147;
            return false;
         }
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

  public static function ajusteRecargo($articulo,$referencia,$descrip)
  {
    $ajusterec=0;    
       $t= new Criteria();
       $t->add(FargoartPeer::REFDOC,$referencia);
       $t->add(FargoartPeer::CODART,$articulo);
//       $t->add(FargoartPeer::DESART,$descrip);
       $t->addJoin(FarecargPeer::CODRGO,FargoartPeer::CODRGO);
       $result=FarecargPeer::doSelectOne($t);
       if ($result)
       {
         $ajusterec=$result->getMonrgo()/100;
       }

       return $ajusterec;
  }

  public static function cuentaRecargo($articulo,$referencia,$descrip)
  {
    $cuentarec="";
       $t= new Criteria();
       $t->add(FargoartPeer::REFDOC,$referencia);
       $t->add(FargoartPeer::CODART,$articulo);
//       $t->add(FargoartPeer::DESART,$descrip);
       $t->addJoin(FarecargPeer::CODRGO,FargoartPeer::CODRGO);
       $result=FarecargPeer::doSelectOne($t);
       if ($result)
       {
         $cuentarec=$result->getCodcta();
       }

       return $cuentarec;
  }

  public static function grabarComprobanteMaestro($faajuste,$arrasientos,&$pos)
  {
    $prefijo=H::getConfApp2('prefijo', 'facturacion', 'faajuste');
    $periodocon=substr($faajuste->getFecaju(),0,4);
    if ($prefijo=='S')
    {
      if ($faajuste->getTipo()=='DEBITO')
      {
         $numcomp="ND".substr($faajuste->getRefaju(),2,6);
      }else {
          $numcomp="NC".substr($faajuste->getRefaju(),2,6);
      }
    }else {
    $numcomp="AJ".substr($faajuste->getRefaju(),2,6);
    }
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $correl= $numcomp;
    }else {
      if ($prefijo=='S')
        $correl= $numcomp;
      else
        $correl=Comprobante::Buscar_Correlativo($faajuste->getFecaju());
    }

    $contabc = new Contabc();
    $contabc->setNumcom($correl);
    $contabc->setFeccom($faajuste->getFecaju());
    if ($faajuste->getDesaju()!="")
     $contabc->setDescom($faajuste->getDesaju());
    else $contabc->setDescom('FACTURACION');
    $contabc->setStacom('D');
    $contabc->setTipcom(null);
    $contabc->setReftra($faajuste->getRefaju());
    $contabc->setMoncom($faajuste->getMonaju());
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $contabc->setLoguse($loguse);
    $contabc->save();

    self::grabarComprobanteDetalle($faajuste,$correl,$arrasientos,$pos);
  }

  public static function grabarComprobanteDetalle($faajuste,$correl,$arrasientos,&$pos)
  {
    if ($pos!=0)
    {
      $i=0;
	  while ($i<=($pos-1))
	  {
	  	if ($arrasientos[$i]["2"]!="")
	  	{
                  $contabc1= new Contabc1();
                  $contabc1->setNumcom($correl);
                  $contabc1->setFeccom($faajuste->getFecaju());
                  $contabc1->setCodcta($arrasientos[$i]["0"]);
                  $numasi= $i +1;
                  $contabc1->setNumasi($numasi);
                  $contabc1->setRefasi($faajuste->getRefaju());
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

  public static function ajusteDocumentoxCobrar($faajuste,$totalajus,$totalrec)
  {
      $q= new Criteria();
      $q->add(CobdocumePeer::REFFAC,$faajuste->getCodref());
      $registro= CobdocumePeer::doSelectOne($q);
      if ($registro)
      {
          $registro->setMondoc($registro->getMondoc()-($totalajus-$totalrec));
          $registro->setRecdoc($registro->getRecdoc() - $totalrec);
          $registro->setSaldoc($registro->getMondoc() + $registro->getRecdoc()-$registro->getDscdoc()-$registro->getAdodoc());
          $registro->save();
      }
  }

/*******************************Descuentos de Articulos  por tipo de cliente **********************************************/
    public static function SalvarDescuentosArticulosCliente($faartdtocte, $grid)
    {
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){         
          if ($x[$j]->getCodart()!="" && $x[$j]->getCoddesc()!="")
          { 
              $x[$j]->setFatipcteId($faartdtocte->getFatipcteId());
              $x[$j]->save();
          }
          $j++;
        }

        $z = $grid[1];
        $l = 0;
        if (!empty($z[$l]))
        {
          while ($l < count($z))
          {
            $z[$l]->delete();
            $l++;
          }
        }

    }  

/******************************* Registro de Anticipo de Clientes *********************************************/
    public static function SalvarAnticipoCliente($faantcli, $grid)
    {     
    
      $faantcli->setResant($faantcli->getTotant());
      $faantcli->save();

        $x=$grid[0];
        $j=0;
        while ($j<count($x)){         
          if ($x[$j]->getPorant()>0 && $x[$j]->getMonant()>0)
          { 
              $x[$j]->setNroant($faantcli->getNroant());
              $x[$j]->save();
          }
          $j++;
        }
        
        //Genero Movimiento Según Libros
        self::generar_movimientos_segun_libros_anticipo($faantcli);        
    }
    
    
  public static function generarComprobanteAnticipo($faantcli,&$arrcompro,&$msjuno)
  {
    $reftra=$faantcli->getNroant();

     $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= 'AN'.substr($reftra,2,6);
    }else $numerocomprob= '########';

    $codigocuenta = "";
    $tipo1  = "";
    $desc   = "";
    $monto1 = "";

    $codigo = "";
    $tipo2  ="";
    $des2   ="";
    $monto2 ="";

    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $descr  ="";

    $msjuno = "";

   //Obtener Datos de la Cuenta Bancaria
    $b1= new Criteria();
    $b1->add(TsdefbanPeer::NUMCUE,$faantcli->getNumcue());
    $regis3 = TsdefbanPeer::doSelectOne($b1);
    if ($regis3) {        
        $codigo = $regis3->getCodcta();
    
        //Obtener la descripcion del codigo de cuenta
        $b2= new Criteria();
        $b2->add(ContabbPeer::CODCTA,$codigo);
        $regis4  = ContabbPeer::doSelectOne($b2);
        if ($regis4) {
          $tipo2  = 'D';
          $des2   = $regis4->getDescta();
          $monto2 = $faantcli->getTotant();
        }else {
            $msjuno='La Cuenta Contable asociada a Cuenta Bancaria no existe';
            return true;
        }
    }else {
        $msjuno='La Cuenta Bancaria no existe';
        return true;
    }
    
    //Obtener Cuenta asociada al Cliente
    $b= new Criteria();
    $b->add(FaclientePeer::RIFPRO,$faantcli->getRifpro());
    $regis = FaclientePeer::doSelectOne($b);
    if ($regis) {
      if ($regis->getCodctaant()!='')
        $codigocuenta = $regis->getCodctaant();        
      else
        $codigocuenta = $regis->getCodcta();        

        //Obtener la descripcion del codigo de cuenta
        $ba= new Criteria();
        $ba->add(ContabbPeer::CODCTA,$codigocuenta);
        $regis2  = ContabbPeer::doSelectOne($ba);
        if ($regis2) {
          $tipo1  = 'C';
          $desc   = $regis2->getDescta();
          $monto1 = $faantcli->getTotant();
        }else {
            $msjuno='La Cuenta Contable asociada a Cliente no existe';
            return true;
        }
    }else {
        $msjuno='El Cliente  no existe';
        return true;
   }

      $cuentas=$codigocuenta.'_'.$codigo;
      $descr=$desc.'_'.$des2;
      $tipos=$tipo1.'_'.$tipo2;
      $montos=$monto1.'_'.$monto2;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra($reftra);
      $clscommpro->setFectra(date("d/m/Y",strtotime($faantcli->getFecant())));
      $clscommpro->setDestra($faantcli->getDesant());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }
  
  public static function generar_movimientos_segun_libros_anticipo($faantcli)
  {
    $grabocontabilidad=true;
    
    $tsmovlib = new Tsmovlib();
    $tsmovlib->setNumcue($faantcli->getNumcue());
    $tsmovlib->setReflib($faantcli->getNroant());
    $tsmovlib->setCedrif($faantcli->getRifpro());
    $tsmovlib->setFeclib($faantcli->getFecant());
    $tsmovlib->setFecing($faantcli->getFecant());
    $tsmovlib->setTipmov($faantcli->getCodtip());
    $tsmovlib->setMonmov($faantcli->getTotant());
    $tsmovlib->setCodcta(H::getX_vacio('Numcue', 'Tsdefban', 'Codcta', $faantcli->getNumcue()));
    $tsmovlib->setDeslib($faantcli->getDesant());
    $tsmovlib->setStatus('C');
    $tsmovlib->setStacon('N');

    if ($grabocontabilidad){
      $tsmovlib->setStatus('C');   //Contabilizado
      $tsmovlib->setFeccom($faantcli->getFecant());
      $tsmovlib->setNumcom($faantcli->getNumcom());

    }else{
      $tsmovlib->setStatus('N');
      $tsmovlib->setNumcom('');
      $tsmovlib->setCodcta('');
      $tsmovlib->setFeccom('NULO');
    }
    $tsmovlib->save();
  }//Fin generar_movimientos_segun_libros()  


/*******************************Fin Definición de Artículos **********************************************/

    public static function SalvarAlmacenesaProgramas($fadefprg, $grid)
    {
        $c= new Criteria();
        $c->add(FaprgalmPeer::CODPRG,$fadefprg->getCodprg());
        FaprgalmPeer::doDelete($c);
        
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){         
          if ($x[$j]->getCheck()=="1")
          { 
              $x[$j]->setCodprg($fadefprg->getCodprg());
              $x[$j]->save();
          }
          $j++;
        }
    }  
  
    
    public static function SalvarFabancos($fabancos, $grid)
    {
        $fabancos->save();
        
        $x=$grid[0];
        $j=0;
        while ($j<count($x)){         
          if ($x[$j]->getTippagId()!="")
          { 
              $x[$j]->setFabancos($fabancos);
              $x[$j]->save();
          }
          $j++;
        }

        $z = $grid[1];
        $l = 0;
        if (!empty($z[$l]))
        {
          while ($l < count($z))
          {
            $z[$l]->delete();
            $l++;
          }
        }

    }  
    
    public static function armarCadenaFamArt($grid,&$cadena)
    {
        $cadena = "";
        $i = 0;
        while ($i < count($grid)) {
          if ($grid[$i][0]!="") {
            if ($i==0)
                $cadena = $grid[$i][0];
            else
                $cadena = $cadena.'_'.$grid[$i][0];
          }
          $i++;
        }

        return true;
    }

      public static function validarUsuarioEspecial($pasuse) {

        $loguse = sfContext::getInstance()->getUser()->getAttribute('loguse');
        $c = new Criteria();
        $c->add(UsuariosPeer::LOGUSE, $loguse);
        $datos = UsuariosPeer::doSelectOne($c);
        if ($datos) {
            $cedemp = $datos->getCedemp();
            $c1 = new Criteria();
            $c1->add(SegperespPeer::CEDEMP, $cedemp);
            $c1->add(SegperespPeer::PASUSE, $pasuse);
            $c1->add(SegperespPeer::PROCESO, 'Devoluciones en efectivo');
            $resultado = SegperespPeer::doSelectOne($c1);
            if ($resultado)
                return -1;
            else
                return 1180;
        }
            return -1;
        }
    
  public static function Grabar_RecargosPresup($fapresup,$grid)
  {
     $c1= new Criteria();
      $c1->add(FargoprePeer::REFDOC,$fapresup->getRefpre());                                
      $regc1=FargoprePeer::doSelect($c1);
      foreach ($regc1 as $objc1) {
        $objc1->delete();
      }

      $moneda=$fapresup->getTipmon();
      $valor=$fapresup->getValmon();
        $x=$grid[0];
        $i=0;
        while ($i<count($x))
        {     
          if ($x[$i]->getRecargos()!='' && $x[$i]->getCheck()=='1')
          {            
             $cadenarec=split('!',$x[$i]->getRecargos());
             $r=0;
             while ($r<(count($cadenarec)-1))
             {
               $aux=$cadenarec[$r];
               $aux2=split('_',$aux);
               if ($aux2[0]!="" )
               {                 
                  /*$c= new Criteria();
                  $c->add(FargoprePeer::REFDOC,$fapresup->getRefpre());
                  $c->add(FargoprePeer::CODART,$x[$i]->getCodart());
                  $c->add(FargoprePeer::CODRGO,$aux2[0]);                
                  $trajo= FargoprePeer::doSelectOne($c);
                  if ($trajo)
                  {
                      $trajo->setMonrgo($trajo->getMonrgo() + H::toFloat($aux2[3]));
                      $trajo->save();                      
                  }else {*/
                      $fargopre2= new Fargopre();
                      $fargopre2->setCodart($x[$i]->getCodart());
                      $fargopre2->setRefdoc($fapresup->getRefpre());
                      $fargopre2->setCodrgo($aux2[0]);
                      $fargopre2->setMonrgo(H::toFloat($aux2[3])*$valor);
                      $fargopre2->setTipdoc('E');
                      $fargopre2->save();
                  //}
              }
             $r++;
            }//while
           }//if ($x[$j]->getRecargos()!='')          
          $i++;
    }
  }

  public static function SalvarRecargosPedidos($fapedido,$grid)
  {
        $x=$grid[0];
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
                  $c->add(FargopedPeer::REFDOC,$fapedido->getNroped());
                  $c->add(FargopedPeer::CODART,$x[$i]->getCodart());
                  $c->add(FargopedPeer::CODRGO,$aux2[0]);                
                  $trajo= FargopedPeer::doSelectOne($c);
                  if ($trajo)
                  {
                      $trajo->setMonrgo($trajo->getMonrgo() + H::toFloat($aux2[3]));
                      $trajo->save();                      
                  }else {
                      $fargoped2= new Fargoped();
                      $fargoped2->setCodart($x[$i]->getCodart());
                      $fargoped2->setRefdoc($fapedido->getNroped());
                      $fargoped2->setCodrgo($aux2[0]);
                      $fargoped2->setMonrgo(H::toFloat($aux2[3]));
                      $fargoped2->setTipdoc('E');
                      $fargoped2->save();
                  }
              }
             $r++;
            }//while
           }//if ($x[$j]->getRecargos()!='')          
          $i++;
    }
  }  

  public static function SalvarRangosCaja($fadefcaj, $grid)
  {
    $fadefcaj->save();
      
    $x=$grid[0];
    $j=0;
    while ($j<count($x)){         
      if ($x[$j]->getCordes()>0 && $x[$j]->getCorhas()>0)
      { 
          $x[$j]->setCodcaj($fadefcaj->getId());
          if ($x[$j]->getActivo()==1) $x[$j]->setActivo('S');
          $x[$j]->save();
      }
      $j++;
    }    
  }    

  public static function SalvarEstimacionesVentas($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x)){         
      if ($x[$j]->getMonest()>0)
      { 
          $x[$j]->setAnoest($clasemodelo->getAnoest());
          $x[$j]->save();
      }
      $j++;
    }    
  }

  public static function salvarPreProCanFre($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x)){         
      if ($x[$j]->getFrecuen()!="" && $x[$j]->getPrecio()>0)
      { 
          $x[$j]->setCodart($clasemodelo->getCodart());
          $x[$j]->setCodcan($clasemodelo->getCodcan());
          $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l]))
    {
      while ($l < count($z))
      {
        $z[$l]->delete();
        $l++;
      }
    }    
  }

  public static function Grabar_ContratoPresup($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x)){         
      if ($x[$j]->getCodart()!="" && $x[$j]->getPercon()!="" && $x[$j]->getCancon()>0 && $x[$j]->getFecini()!="")
      { 
          $x[$j]->setRefpre($clasemodelo->getRefpre());
          $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l]))
    {
      while ($l < count($z))
      {
        $z[$l]->delete();
        $l++;
      }
    }    
  }

  public static function Grabar_ClausulasPresup($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x)){         
      if ($x[$j]->getCodcla()!="")
      { 
          $x[$j]->setRefpre($clasemodelo->getRefpre());
          $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l]))
    {
      while ($l < count($z))
      {
        $z[$l]->delete();
        $l++;
      }
    }    
  }

  public static function CalPorcion($periodo, $fechini, $fechfin) {
    $numpor = 0;
    //Cálculo del Nro de porciones
    switch ($periodo) {
      case 'M':
        while ((Herramientas::dateAdd('d', 1, $fechini, '-')) <= $fechfin) {
          $fechaprox = Herramientas::dateAdd('m', (12 / 12), $fechini, '+');
          $fechini = $fechaprox;
          $numpor = $numpor + 1;
        }
        break;
      case 'B':
        while ((Herramientas::dateAdd('d', 1, $fechini, '-')) <= $fechfin) {
          $fechaprox = Herramientas::dateAdd('m', (12 / 6), $fechini, '+');
          $fechini = $fechaprox;
          $numpor = $numpor + 1;
        }
        break;
      case 'T':
        while ((Herramientas::dateAdd('d', 1, $fechini, '-')) <= $fechfin) {
          $fechaprox = Herramientas::dateAdd('m', (12 / 4), $fechini, '+');
          $fechini = $fechaprox;
          $numpor = $numpor + 1;
        }
        break;
      case 'A':
        while ((Herramientas::dateAdd('d', 1, $fechini, '-')) <= $fechfin) {
          $fechaprox = Herramientas::dateAdd('d', 365, $fechini, '+');
          $fechini = $fechaprox;
          $numpor = $numpor + 1;
        }
        break;        
    }

    return($numpor);
  }  

  public static function distribucionContrato($percon,$fecini,$fecfin,$tipconfil,&$arreglo=array()){
    //if ($tipconfil!='' && $tipconfil!=$percon) $percon=$tipconfil;
    $numpor = self::CalPorcion($percon, $fecini, $fecfin);
    //print $numpor; 
    $fecini1=$fecini;
     switch ($percon) {
        case 'M':
           $arreglo[0]["fecini"] = date('d/m/Y',strtotime($fecini1)); 
           $auxiliar[0] = Herramientas::dateAdd('d', 1, Herramientas::dateAdd('m', 12 / 12, $fecini1, '+'), '-');
           $arreglo[0]["fecfin"] = date('d/m/Y',strtotime($auxiliar[0])); 
           $arreglo[0]["cancon"]=0;
          for ($i = 1; $i < (int) $numpor - 1; $i++) {
            $fecini1 = Herramientas::dateAdd('d', 1, $auxiliar[$i - 1], '+');
            $auxiliar[$i] = Herramientas::dateAdd('d', 1, Herramientas::dateAdd('m', 12 / 12, $fecini1, '+'), '-');
            $arreglo[$i]["fecini"] = date('d/m/Y',strtotime($fecini1)); 
            $arreglo[$i]["fecfin"] = date('d/m/Y',strtotime($auxiliar[$i])); 
            $arreglo[$i]["cancon"]=0;
          }                      
          break;
        case 'B':
           $arreglo[0]["fecini"] = date('d/m/Y',strtotime($fecini1)); 
           $auxiliar[0] = Herramientas::dateAdd('d', 1, Herramientas::dateAdd('m', 12 / 6, $fecini1, '+'), '-');
           $arreglo[0]["fecfin"] = date('d/m/Y',strtotime($auxiliar[0])); 
           $arreglo[0]["cancon"]=0;
          for ($i = 1; $i < (int) $numpor - 1; $i++) {
            $fecini1 = Herramientas::dateAdd('d', 1, $auxiliar[$i - 1], '+');
            $auxiliar[$i] = Herramientas::dateAdd('d', 1, Herramientas::dateAdd('m', 12 / 6, $fecini1, '+'), '-');
            $arreglo[$i]["fecini"] = date('d/m/Y',strtotime($fecini1)); 
            $arreglo[$i]["fecfin"] = date('d/m/Y',strtotime($auxiliar[$i])); 
            $arreglo[$i]["cancon"]=0;
          }
         break;
        case 'T':
           $arreglo[0]["fecini"] = date('d/m/Y',strtotime($fecini1)); 
           $auxiliar[0] = Herramientas::dateAdd('d', 1, Herramientas::dateAdd('m', 12 / 4, $fecini1, '+'), '-');
           $arreglo[0]["fecfin"] = date('d/m/Y',strtotime($auxiliar[0])); 
           $arreglo[0]["cancon"]=0;
          for ($i = 1; $i < (int) $numpor - 1; $i++) {
            $fecini1 = Herramientas::dateAdd('d', 1, $auxiliar[$i - 1], '+');
            $auxiliar[$i] = Herramientas::dateAdd('d', 1, Herramientas::dateAdd('m', 12 / 4, $fecini1, '+'), '-');
            $arreglo[$i]["fecini"] = date('d/m/Y',strtotime($fecini1)); 
            $arreglo[$i]["fecfin"] = date('d/m/Y',strtotime($auxiliar[$i])); 
            $arreglo[$i]["cancon"]=0;
          }
        break;
        case 'A':
           $arreglo[0]["fecini"] = date('d/m/Y',strtotime($fecini1)); 
           $auxiliar[0] = Herramientas::dateAdd('d', 1, Herramientas::dateAdd('d', 366, $fecini1, '+'), '-');
           $arreglo[0]["fecfin"] = date('d/m/Y',strtotime($auxiliar[0])); 
           $arreglo[0]["cancon"]=0;
          for ($i = 1; $i < (int) $numpor - 1; $i++) {
            $fecini1 = Herramientas::dateAdd('d', 1, $auxiliar[$i - 1], '+');
            $auxiliar[$i] = Herramientas::dateAdd('d', 1, Herramientas::dateAdd('d', 366, $fecini1, '+'), '-');
            $arreglo[$i]["fecini"] = date('d/m/Y',strtotime($fecini1)); 
            $arreglo[$i]["fecfin"] = date('d/m/Y',strtotime($auxiliar[$i])); 
            $arreglo[$i]["cancon"]=0;
          }
         break;        
    }
  }

  public static function validaDispoDevolu($nrodev){
    $funvaldisart="";
   $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
   if ($varemp)
     if(array_key_exists('generales',$varemp)) {
       if(array_key_exists('funvaldisart',$varemp['generales']))
       {
         $funvaldisart=$varemp['generales']['funvaldisart'];
       }
     }

    $q= new Criteria();
    $q->add(FaartdevPeer::NRODEV,$nrodev);
    $regq= FaartdevPeer::doSelect($q);
    if ($regq){
      foreach ($regq as $objq) {     
         if ($funvaldisart=='S'){
           $result=array();
           $sql="select existenciaart('".$objq->getCodart()."','".$objq->getCodalm()."','".$objq->getCodubi()."','".$objq->getNumlot()."',now()::date) as exiact from empresa";
           if (Herramientas::BuscarDatos($sql,$result))
            {
              if ($objq->getCandev()>$result[0]['exiact'])
              {
                return 1197;
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
              if ($objq->getCandev()>$result->getExiact())
                return 1197;
           }
       }
      }      
    }
    return -1;
  }

  public static function actualizaArtDevolu($clasemodelo){
    $q= new Criteria();
    $q->add(FaartdevPeer::NRODEV,$clasemodelo->getNrodev());
    $regq= FaartdevPeer::doSelect($q);
    if ($regq){
      foreach ($regq as $objq) {
        $codarti=$objq->getCodart();
         $p= new Criteria();
         $p->add(CaregartPeer::CODART,$codarti);
         $resul= CaregartPeer::doSelectOne($p);
         if ($resul)
         {
               $tipo=$resul->getTipo();
               if ($resul->getTipo()=='A')
               {
                 $resul->setExitot($resul->getExitot() - $objq->getCandev());
                 $resul->setDistot($resul->getDistot() - $objq->getCandev());
                 $resul->save();
               }
         }

         $p= new Criteria();
         $p->add(CaartalmPeer::CODALM,$objq->getCodalm());
         $p->add(CaartalmPeer::CODART,$objq->getCodart());         
         $resultp= CaartalmPeer::doSelectOne($p);
         if ($resultp)
         {
          if ($tipo=='A')
          {
            $resultp->setExiact($resultp->getExiact() - $objq->getCandev());
            $resultp->save();
          }
         }
         
         $t= new Criteria();
         $t->add(CaartalmubiPeer::CODALM,$objq->getCodalm());
         $t->add(CaartalmubiPeer::CODART,$objq->getCodart());
         $t->add(CaartalmubiPeer::CODUBI,$objq->getCodubi());
         if ($objq->getNumlot()!='')
           $t->add(CaartalmubiPeer::NUMLOT,$objq->getNumlot());
         $result= CaartalmubiPeer::doSelectOne($t);
         if ($result)
         {
          if ($tipo=='A')
          {
            $result->setExiact($result->getExiact() - $objq->getCandev());
            $result->save();
          }
         }

         $sql = "select * from caartdph where dphart ='" . $clasemodelo->getRefdes() . "' and codart = '" . $codarti. "'";
         if (Herramientas :: BuscarDatos($sql, $resul)) {
          if ($resul){
            foreach ($resul as $r){
                 $c = new Criteria();
                 $c->add(CaartdphPeer::DPHART,$r['dphart']);
                 $c->add(CaartdphPeer::CODART,$r['codart']);
                 $arti = CaartdphPeer::doSelectOne($c);
                 if ($arti){
                     $act1=$arti->getCandev() - $objq->getCandev();
                     $arti->setCandev($act1);
                     $arti->save();
                 }
            }
          }
        }
    }      
  }
  }

    public static function grabarClausulasGrupo($clasemodelo, $grid) {
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodcla() != '') {
        $x[$j]->setCodgru($clasemodelo->getCodgru());
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $j = 0;
    if (!empty($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function SalvarRecetasServicio($clasemodelo,$grid1,$grid2,$grid3,$grid4){
    //Materiales
    $x = $grid1[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodmat() != '') {
        $x[$j]->setCodart($clasemodelo->getCodart());
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid1[1];
    $j = 0;
    if (!empty($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
    
    //Maquinaria y Equipos
    $x = $grid2[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodequ() != '') {
        $x[$j]->setCodart($clasemodelo->getCodart());
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid2[1];
    $j = 0;
    if (!empty($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }

    //Mano de Obra
    $x = $grid3[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodman() != '') {
        $x[$j]->setCodart($clasemodelo->getCodart());
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid3[1];
    $j = 0;
    if (!empty($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }

    //Servicios Externos
    $x = $grid4[0];
    $j = 0;
    while ($j < count($x)) {
      if ($x[$j]->getCodser() != '') {
        $x[$j]->setCodart($clasemodelo->getCodart());
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid4[1];
    $j = 0;
    if (!empty($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      }
    }
  }

  public static function SalvarOrdendeTrabajo($clasemodelo,$grid){
    $tienecorrelativo=false;
    if ($clasemodelo->getReford()=='########')
    {        
      if ($clasemodelo->getRefcot()=='S'){
        $r1=H::getX_vacio('CODSED','Fadefsed','Corsed1',$clasemodelo->getCodsed());
        $cormadre=substr($clasemodelo->getRefpre(),0,strlen($clasemodelo->getRefpre())-2);
        $tienecorrelativo=true;
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=$cormadre.str_pad($r1, 2, '0', STR_PAD_LEFT);
          $sql="select reford from faordtra where reford='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $r1=$r1+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $clasemodelo->setReford($numero);
      }else{
        $r=H::getX_vacio('CODSED','Fadefsed','Corsed',$clasemodelo->getCodsed());
        $r1=H::getX_vacio('CODSED','Fadefsed','Corsed1',$clasemodelo->getCodsed());
        $tienecorrelativo=true;
        $encontrado=false;
        while (!$encontrado)
        {
          $numero=$clasemodelo->getCodsed().str_pad($r, 3, '0', STR_PAD_LEFT).str_pad($r1, 2, '0', STR_PAD_LEFT);

          $sql="select reford from faordtra where reford='".$numero."'";
          if (Herramientas::BuscarDatos($sql,$result))
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
        }
        $clasemodelo->setReford($numero);
      }      
    }
    else
    {
      $clasemodelo->setReford(str_replace('#','0',$clasemodelo->getReford()));
    }

    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $clasemodelo->setReapor($loguse);
    $clasemodelo->save();

    if ($tienecorrelativo==true){
      $q= new Criteria();
      $q->add(FadefsedPeer::CODSED,$clasemodelo->getCodsed());
      $regq= FadefsedPeer::doSelectOne($q);
      if ($regq){
        if ($clasemodelo->getRefcot()=='S')
          $regq->setCorsed1($r1);
        else if ($clasemodelo->getRefcot()=='N') {
          $regq->setCorsed($r);
          $regq->setCorsed1($r1);
        }
        $regq->save();
      }        
    }
    self::Grabar_DetalleOrden($clasemodelo,$grid);
  }

  public static function Grabar_DetalleOrden($clasemodelo,$grid){
    $x = $grid[0];
    $j = 0;
    $reford=$clasemodelo->getReford();
    while ($j < count($x)) {
      if ($x[$j]->getCodart() != '') {
        $x[$j]->setReford($reford);
        $x[$j]->save();
      }
      $j++;
    }

    $z = $grid[1];
    $l = 0;
    if (!empty($z[$l])) {
      while ($l < count($z)) {
        $z[$l]->delete();
        $l++;
      }
    }
  }
}
?>
