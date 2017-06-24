<?php
/**
 * Bienes: Clase estática para el manejo de los Bienes Nacionales
 *
 * @package    Roraima
 * @subpackage bienes
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Bienes
{
  /*
   * Función Principal para validar datos del formulario Bieregactmued
   */
  public static function validarBnregmue($articulo) {
      return self::validarCodact($articulo);
    }


  public static function validarCodact($articulo)
  {
         $codact=$articulo->getCodact();
         $codmue=$articulo->getCodmue();
    if (!$articulo->getId()) {
     $c = new Criteria();
     $c->add(BnregmuePeer::CODACT,$codact);
     $c->add(BnregmuePeer::CODMUE,$codmue);
     $objBnregmue = BnregmuePeer::doSelectOne($c);

     if ($objBnregmue)
       return 203;
    }
    $valcodalt=H::getConfApp2('valcodalt', 'bienes', 'bieregactmued');
    if ($valcodalt=='S') {
     if ($articulo->getCodalt()=='')
      return 225;
    }
    $novalmonini=H::getConfApp2('novalvalini', 'bienes', 'bieregactmued');
    if ($novalmonini!='S') {
      if ($articulo->getCodactdep()=='' && $articulo->getCodmuedep()=='')
    	 if ($articulo->getValini()<=0)
    	  return 208;
    }
    $mes=substr($articulo->getFecreg(),5,2);
    $e= new Criteria();
    $e->add(Contaba1Peer::STATUS,'C');
    $e->addAscendingOrderByColumn(Contaba1Peer::PEREJE);
    $reg= Contaba1Peer::doSelectOne($e);    
    if ($reg)
    {
        if ($mes<$reg->getPereje())
        {
           return 214;
        }
        
    } 
    
    return -1;

  }

  /*
   * Función Principal para validar datos del formulario Bieregactinm
   */
  public static function validarBnreginm($articulo)
  {
      return self::validarCodmue($articulo);
  }


  public static function validarCodmue($articulo)
  {
     $codact=$articulo->getCodact();
     $codinm=$articulo->getCodinm();

     $c = new Criteria();
     //$c->add(BnreginmPeer::CODACT,$codact);
     $c->add(BnreginmPeer::CODINM,$codinm);
     $objBnreginm = BnreginmPeer::doSelectOne($c);

     if ($objBnreginm)
       return 203;
     
         $mes=substr($articulo->getFecreg(),5,2);
        $e= new Criteria();
        $e->add(Contaba1Peer::STATUS,'C');
        $e->addAscendingOrderByColumn(Contaba1Peer::PEREJE);
        $reg= Contaba1Peer::doSelectOne($e);    
        if ($reg)
        {
            if ($mes<$reg->getPereje())
            {
               return 214;
            }

        }
     
     
    return -1;
  }

  public static function iniciarAjusteActivos($tipoactivo,$fecha,&$revejecutada)
  {
     switch ($tipoactivo)
     {
       case '1':
         $c= new Criteria();
         $c->add(BnregmuePeer::FECREG,$fecha,Criteria::LESS_EQUAL);
         $c->add(BnregmuePeer::STAMUE,'A');
         $c->addAscendingOrderByColumn(BnregmuePeer::CODACT);
         $c->addAscendingOrderByColumn(BnregmuePeer::CODMUE);
         $reg= BnregmuePeer::doSelect($c);
        break;
       case '2':
         $c= new Criteria();
         $c->add(BnreginmPeer::FECREG,$fecha,Criteria::LESS_EQUAL);
         $c->add(BnreginmPeer::STAINM,'A');
         $c->addAscendingOrderByColumn(BnreginmPeer::CODACT);
         $c->addAscendingOrderByColumn(BnreginmPeer::CODINM);
         $reg= BnreginmPeer::doSelect($c);
        break;
       case '3':
         $c= new Criteria();
         $c->add(BnregsemPeer::FECREG,$fecha,Criteria::LESS_EQUAL);
         $c->add(BnregsemPeer::STASEM,'A');
         $c->addAscendingOrderByColumn(BnregsemPeer::CODACT);
         $c->addAscendingOrderByColumn(BnregsemPeer::CODSEM);
         $reg= BnregsemPeer::doSelect($c);
        break;
     }

     if ($reg)
     {
     	foreach ($reg as $datos)
     	{
          $anoipc=date('Y',strtotime($datos->getFecreg()));
          $d= new Criteria();
          $criterion=$d->getNewCriterion(BnipcactPeer::ANOIPC,$anoipc);
          $criterion->addOr($d->getNewCriterion(BnipcactPeer::ANOIPC,date('Y',strtotime($fecha))));
          $d->add($criterion);
          $d->addAscendingOrderByColumn(BnipcactPeer::ANOIPC);
          $resultado=BnipcactPeer::doSelect($d);
          if ($resultado)
          {
          	 $contador=0;
             foreach ($resultado as $result)
             {
             	$contador=$contador +1;
               if ($contador==1)
               {
             	$mesipc=date('m',strtotime($datos->getFecreg()));
             	switch ($mesipc)
             	{
             	  case '1':
             	    $ipcmesini=$result->getIpcene();
             	   break;
             	  case '2':
             	    $ipcmesini=$result->getIpcfeb();
             	   break;
             	  case '3':
             	    $ipcmesini=$result->getIpcmar();
             	   break;
             	  case '4':
             	    $ipcmesini=$result->getIpcabr();
             	   break;
             	  case '5':
             	    $ipcmesini=$result->getIpcmay();
             	   break;
             	  case '6':
             	    $ipcmesini=$result->getIpcjun();
             	   break;
             	  case '7':
             	    $ipcmesini=$result->getIpcjul();
             	   break;
             	  case '8':
             	    $ipcmesini=$result->getIpcago();
             	   break;
             	  case '9':
             	    $ipcmesini=$result->getIpcsep();
             	   break;
             	  case '10':
             	    $ipcmesini=$result->getIpcoct();
             	   break;
             	  case '11':
             	    $ipcmesini=$result->getIpcnov();
             	   break;
             	  case '12':
             	    $ipcmesini=$result->getIpcdic();
             	   break;
             	}
               }
               	 $mesipc=date('m',strtotime($fecha));
             	 switch ($mesipc)
             	 {
             	  case '1':
             	    $ipcmesfin=$result->getIpcene();
             	   break;
             	  case '2':
             	    $ipcmesfin=$result->getIpcfeb();
             	   break;
             	  case '3':
             	    $ipcmesfin=$result->getIpcmar();
             	   break;
             	  case '4':
             	    $ipcmesfin=$result->getIpcabr();
             	   break;
             	  case '5':
             	    $ipcmesfin=$result->getIpcmay();
             	   break;
             	  case '6':
             	    $ipcmesfin=$result->getIpcjun();
             	   break;
             	  case '7':
             	    $ipcmesfin=$result->getIpcjul();
             	   break;
             	  case '8':
             	    $ipcmesfin=$result->getIpcago();
             	   break;
             	  case '9':
             	    $ipcmesfin=$result->getIpcsep();
             	   break;
             	  case '10':
             	    $ipcmesfin=$result->getIpcoct();
             	   break;
             	  case '11':
             	    $ipcmesfin=$result->getIpcnov();
             	   break;
             	  case '12':
             	    $ipcmesfin=$result->getIpcdic();
             	   break;
             	  }
               }

             if ($ipcmesini>0)
             {
             	$calculo= (($ipcmesini/$ipcmesfin)* $datos->getValini());
               $datos->setvalrex($calculo);
             }else $datos->setvalrex(0);
             $datos->save();
          }
       }
     }
     else
     {
     	$revejecutada=false;
     }
  }

  public static function actualizarRevalorizacion($fecha)
  {
     $r= new Criteria();
     $r->add(BnrevactPeer::FECREV,$fecha);
     $trajo=BnrevactPeer::doSelectOne($r);
     if (!$trajo)
     {
     	$bnrevact= new Bnrevact();
     	$bnrevact->setFecrev($fecha);
     	$bnrevact->setMonmuerev(0);
     	$bnrevact->setMoninmrev(0);
     	$bnrevact->setMonsegrev(0);
     	$bnrevact->save();
     }
  }

  public static function iniciarDepreciacionActivos($tipoactivo,$lafechadep,&$depejecutadam,&$depejecutadai,&$montodepm,&$montodepi,&$msj)
  {
  	 switch ($tipoactivo)
     {
       case '1':
         $c= new Criteria();
         $c->add(BnregmuePeer::STAMUE,'A');
         $c->add(BnregmuePeer::DEPREC,'S');
         $c->add(BnregmuePeer::VALLIB,0,Criteria::GREATER_THAN); 
         $c->addAscendingOrderByColumn(BnregmuePeer::CODACT);  //Muebles
         $c->addAscendingOrderByColumn(BnregmuePeer::CODMUE);
         $reg= BnregmuePeer::doSelect($c);

         $c1= new Criteria();
         $c1->add(BndefconPeer::STACTA,'A');
         $c1->add(BnregmuePeer::DEPREC,'S');
         $c1->add(BnregmuePeer::STAMUE,'A');
         $c1->add(BnregmuePeer::VALLIB,0,Criteria::GREATER_THAN);
         $c1->addAscendingOrderByColumn(BndefconPeer::CODACT);
         $c1->addAscendingOrderByColumn(BndefconPeer::CODMUE); //Definición Contable
         $c1->addJoin(BndefconPeer::CODACT, BnregmuePeer::CODACT);
         $c1->addJoin(BndefconPeer::CODMUE, BnregmuePeer::CODMUE);
         $reg1= BndefconPeer::doSelect($c1);

         //Monto  Depreciación Mueble
         $montodepm=0;

         $c2= new Criteria();    //Detalle Depreciación
         $reg2= BndepactdetPeer::doSelect($c2);

        break;
       case '2':
         $c= new Criteria();
         $c->add(BnreginmPeer::STAINM,'A');
         $c->add(BnreginmPeer::DEPREC,'S');
         $c->add(BnreginmPeer::VALLIB,0,Criteria::GREATER_THAN); 
         $c->addAscendingOrderByColumn(BnreginmPeer::CODACT);
         $c->addAscendingOrderByColumn(BnreginmPeer::CODINM); //Inmuebles
         $reg= BnreginmPeer::doSelect($c);

         $c1= new Criteria();
         $c1->add(BndefconiPeer::STACTA,'A');
         $c1->add(BnreginmPeer::STAINM,'A');
         $c1->add(BnreginmPeer::DEPREC,'S');
         $c1->add(BnreginmPeer::VALLIB,0,Criteria::GREATER_THAN); 
         $c1->addAscendingOrderByColumn(BndefconiPeer::CODACT);
         $c1->addAscendingOrderByColumn(BndefconiPeer::CODINM); //Definición Contable
         $c1->addJoin(BndefconiPeer::CODACT, BnreginmPeer::CODACT);
         $c1->addJoin(BndefconiPeer::CODINM, BnreginmPeer::CODINM);
         $reg1= BndefconiPeer::doSelect($c1);

         //Monto  Depreciación Inmueble
         $montodepi=0;

         $c2= new Criteria();    //Detalle Depreciación
         $reg2= BndepactdetPeer::doSelect($c2);

        break;
     }

     if ($reg)
     {
     	if ($reg1)
     	{
     		if (count($reg)==count($reg1))
     		{
              foreach ($reg as $dato)
              {
                $montodep=0;
                $depmensual=0;
                $montodeprec=0;

                if ($tipoactivo=='1')
                {
                  self::obtenerMejora($dato->getCodact(),$dato->getCodmue(),$lafechadep,'1',$montomejora,$vidamejora);
                }else{
                  self::obtenerMejora($dato->getCodact(),$dato->getCodinm(),$lafechadep,'2',$montomejora,$vidamejora);
                }

                $difmes=Herramientas :: dateDiff('m', $dato->getFecreg(), $lafechadep); // + 1;
                $difdia=Herramientas :: dateDiff('d', $dato->getFecreg(), $lafechadep);


                /*if ($dato->getDepmen()==0)
                {
                  if ($dato->getViduti()>0)
                  {
                    $valorbien= (($dato->getValini() + $montomejora) - $dato->getValres());
                    $vidabien= ($dato->getViduti() + $vidamejora);
                    $depmensual= ($valorbien / $vidabien);
                  }
                  else $depmensual=0;
                }
                else $depmensual=$dato->getDepmen();*/
                 $valorbien= (($dato->getValini() + $montomejora) - $dato->getValres());
                 $vidabien= ($dato->getViduti() + $vidamejora);
                 if ($dato->getViduti()>0)
                   $depmensual= ($valorbien / $vidabien);
                 else $depmensual=0;

                if ($difdia>0)
                {
                  if ($difmes > ($dato->getViduti()+$vidamejora))
                  {
                    $depacu= (($dato->getValini() + $montomejora)- $dato->getValres());
                    $mesesdep= ($dato->getViduti() + $vidamejora);
                    $montodeprec=0;
                  }
                  else
                  {
                    if ($montomejora>0 && $vidamejora>0)
                    {
                      $difmes= (($dato->getViduti() - $difmes) + 1);
                      $mesesdep= $difmes;
                      $valorbien= (($dato->getvalini()-$dato->getDepacu()) +$montomejora -$dato->getValres());
                      $vidabien= $difmes + $vidamejora;

                      $depmensual= ($valorbien / $vidabien);
                      $depacu= $dato->getDepacu() + $depmensual;
                    }
                    else
                    {
                      $depacu= $depmensual * $difmes;
                      $mesesdep= $difmes;
                      $montodeprec=$depmensual;
                    }
                  }
                  $vallib=$dato->getValini() + $dato->getValadi() - $depacu;
                  $dato->setVallib($vallib);
                  $dato->setDepmen($depmensual);
                  $dato->setDepacu($depacu);
                  $dato->setMesdep($mesesdep);
                  $dato->setFecdep($lafechadep);
                  $dato->save();

                  $bndepactdet= new Bndepactdet();
                  $bndepactdet->setCodact($dato->getCodact());
                  if ($tipoactivo=='1')
                  $bndepactdet->setCodmue($dato->getCodmue());
                  else $bndepactdet->setCodmue($dato->getCodinm());
                  $bndepactdet->setFecdep($lafechadep);
                  $bndepactdet->setDepmue($depmensual);
                  $bndepactdet->setDepacu($depacu);
                  $bndepactdet->setVallib($vallib);
                  $bndepactdet->save();
                }
                else
                {
                   $dato->setDepacu(0);
                   $dato->setMesdep(0);
                   $dato->setFecdep($lafechadep);
                   $dato->save();
                   $depmensual=0;

	               $bndepactdet= new Bndepactdet();
	               $bndepactdet->setCodact($dato->getCodact());
	               if ($tipoactivo=='1')
	               $bndepactdet->setCodmue($dato->getCodmue());
	               else $bndepactdet->setCodmue($dato->getCodinm());
	               $bndepactdet->setFecdep($lafechadep);
	               $bndepactdet->setDepmue($depmensual);
	               $bndepactdet->setDepacu(0);
	               $bndepactdet->setVallib($dato->getVallib());
	               $bndepactdet->save();
                }

                switch ($tipoactivo)
			    {
			      case '1':
			       $montodepm= $montodepm + $montodeprec;
			       break;
			      case '2':
			        $montodepi= $montodepi + $montodeprec;
			       break;
			    }
              }

              switch ($tipoactivo)
			  {
			    case '1':
			     $depejecutadam=true;
			     break;
			    case '2':
			     $depejecutadai=true;
			     break;
			  }
     		}
     		else
     		{
     		  switch ($tipoactivo)
			  {
			    case '1':
			    $depejecutadam=false;
			     $msj="alert('Existe Muebles que no tienen la definicion contable por consiguiente la Depreciacion no puede ser realizada');";
			     break;
			    case '2':
			     $msj="alert('Existe Inmueble que no tienen la definicion contable por consiguiente la Depreciacion no puede ser realizada');";
			     $depejecutadai=false;
			     break;
			  }
     		}
     	}
     	else
     	{
     	  switch ($tipoactivo)
		  {
		    case '1':
		    $depejecutadam=false;
		     $msj="alert('Existe Muebles que no tienen la definición contable por consiguiente la Depreciacion no puede ser realizada');";
		     break;
		    case '2':
		     $msj="alert('Existe Inmueble que no tienen la definición contable por consiguiente la Depreciacion no puede ser realizada');";
		     $depejecutadai=false;
		     break;
		  }
     	}
     }
     else
     {
          switch ($tipoactivo)
		  {
		    case '1':
		    $depejecutadam=true;
		     break;
		    case '2':
		     $depejecutadai=true;
		     break;
		  }
     }
  }

  public static function obtenerMejora($codigoact,$codigo,$fecdep,$codtipact,&$montomejora,&$vidamejora)
  {
  	if ($codtipact=='1')
  	{
	  	$sql="select coalesce(sum(mondismue),0) as mondismue, coalesce(sum(vidutil),0) as vidutil from bndismue A,bndisbie B where substr(a.tipdismue, 1, 6)=b.coddis and b.adimej='S' and codmue='".$codigo."' and codact='".$codigoact."' and fecdismue<='".$fecdep."'";
	  	if (Herramientas::BuscarDatos($sql,$result))
	    {
	       $montomejora=$result[0]["mondismue"];
	       $vidamejora=$result[0]["vidutil"];
	    }
  	}else
  	{
  	  $sql="select coalesce(sum(mondisinm),0) as mondisinm, coalesce(sum(vidutil),0) as vidutil from bndisinm where codmue='".$codigo."' and codact='".$codigoact."' and fecdisinm<='".$fecdep."'";
  	    if (Herramientas::BuscarDatos($sql,$result))
	    {
	       $montomejora=$result[0]["mondisinm"];
	       $vidamejora=$result[0]["vidutil"];
	    }
  	}
  }

  public static function actualizarFecdep($lafechadep,$montodepm,$montodepi)
  {
    $y= new Criteria();
    $y->add(BndepactPeer::FECDEP,$lafechadep);
    $y->addAscendingOrderByColumn(BndepactPeer::FECDEP);
    $result= BndepactPeer::doSelectOne($y);
    if ($result)
    {
       $result->setMonmue($montodepm);
       $result->setMoninm($montodepi);
       $result->save();
    }else
    {
      $bndepact= new Bndepact();
      $bndepact->setFecdep($lafechadep);
      $bndepact->setMonmue($montodepm);
      $bndepact->setMoninm($montodepi);
      $bndepact->save();
    }
  }

  public static function generaComprobanteDepreciacion($fechacomp,&$arrcompro)
  {
    $result=array();  $codigocuenta=""; $tipo=""; $des=""; $monto="";  $codigocuentas=""; $tipo1=""; $desc="";
    $monto1=""; $cuentas=""; $tipos="";
    $montos=""; $descr=""; $msjuno="";
    $numerocomprob= '########';
    $mes=date('m',strtotime($fechacomp));
    $anno=date('Y',strtotime($fechacomp));
    $reftra="DM".str_pad($mes, 2, '0', STR_PAD_LEFT).$anno;
    $descom="DEPRECIACION DE MUE. MES ".$mes." AÑO ".$anno;

    $sql="SELECT A.CTAAJUCAR as codcta, SUM(B.DEPMEN) as monto, SUM(B.DEPACU) as monto1, B.CODACT as codact, B.CODMUE as codmue FROM BNDEFCON A, BnRegmue B, Bndepactdet c WHERE A.CODACT=B.CODACT AND
          A.CODMUE = B.CODMUE AND A.STACTA = 'A' AND B.STAMUE = 'A' AND b.codact=c.codact and b.codmue=c.codmue  and c.fecdep='".$fechacomp."' and c.depmue>0
              AND B.DEPACU > 0  AND DEPREC='S' Group By a.CTAAJUCAR, B.CODACT, B.CODMUE";
    
    if (H::BuscarDatos($sql,$result))
    {
       $i=0;
       while ($i<count($result))
       {
         if ($result[$i]["monto"]>0) {
           $r2= new Criteria();
           $r2->add(BndepactdetPeer::CODACT,$result[$i]["codact"]);
           $r2->add(BndepactdetPeer::CODMUE,$result[$i]["codmue"]);
           $trajo2=BndepactdetPeer::doSelect($r2);

          $codigocuenta=$result[$i]["codcta"];
          $tipo='D';
          $des="";
          if (count($trajo2)==1 && $result[$i]["monto1"]>0)
            $moncau=$result[$i]["monto1"];//$result[$i]["monto"]+$result[$i]["monto1"];
          else
            $moncau=$result[$i]["monto"];
          $monto=$moncau;

          if ($i==0)
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
       	$i++;
       }
    }
    $result2=array();
    $sql1="SELECT A.CTAAJUABO as codcta, SUM(B.DEPMEN) as monto, SUM(B.DEPACU) as monto1, B.CODACT as codact, B.CODMUE as codmue FROM BNDEFCON A, BnRegmue B, Bndepactdet c WHERE A.CODACT=B.CODACT AND
           A.CODMUE = B.CODMUE AND A.STACTA = 'A' AND B.STAMUE = 'A' AND b.codact=c.codact and b.codmue=c.codmue  and c.fecdep='".$fechacomp."' and c.depmue>0
               AND B.DEPACU > 0 AND B.DEPREC='S' Group By a.CTAAJUABO, B.CODACT, B.CODMUE";
    if (H::BuscarDatos($sql1,$result2))
    {
      $l=0;
      while ($l<count($result2))
      {
         if ($result2[$l]["monto"]>0) {
           $r2= new Criteria();
           $r2->add(BndepactdetPeer::CODACT,$result2[$l]["codact"]);
           $r2->add(BndepactdetPeer::CODMUE,$result2[$l]["codmue"]);
           $trajo2=BndepactdetPeer::doSelect($r2);
          $codigocuenta=$result2[$l]["codcta"];
          $tipo='C';
          $des="";
          if (count($trajo2)==1 && $result2[$l]["monto1"]>0)
            $moncau=$result2[$l]["monto1"];//$result2[$l]["monto"]+$result2[$l]["monto1"];
          else
            $moncau=$result2[$l]["monto"];          
          $monto=$moncau;

          if ($i==0)
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
      	$l++;
      }
    }

    $result3=array();
    $sql2="SELECT A.CTAAJUCAR as codcta, SUM(B.DEPMEN) as monto, SUM(B.DEPACU) as monto1, B.CODACT as codact, B.CODINM as codinm FROM BNDEFCONI A, BnRegInm B, Bndepactdet c WHERE A.CODACT=B.CODACT AND
           A.CODINM = B.CODINM AND A.STACTA = 'A' AND B.STAINM = 'A' AND b.codact=c.codact and b.codinm=c.codmue  and c.fecdep='".$fechacomp."' and c.depmue>0
               AND B.DEPACU > 0 AND B.DEPREC='S' Group By A.CTAAJUCAR, B.CODACT, B.CODINM";
    if (H::BuscarDatos($sql2,$result3))
    {
      $p=0;
      while ($p<count($result3))
      {
         if ($result3[$p]["monto"]>0) {
           $r2= new Criteria();
           $r2->add(BndepactdetPeer::CODACT,$result3[$p]["codact"]);
           $r2->add(BndepactdetPeer::CODMUE,$result3[$p]["codinm"]);
           $trajo2=BndepactdetPeer::doSelect($r2);

          $codigocuenta=$result3[$p]["codcta"];
          $tipo='D';
          $des="";
          if (count($trajo2)==1 && $result3[$p]["monto1"]>0)
            $moncau=$result3[$p]["monto1"];//$result2[$l]["monto"]+$result2[$l]["monto1"];
          else
            $moncau=$result3[$p]["monto"];
          $monto=$moncau;

          if ($i==0)
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
      	$p++;
      }
    }

    $result4=array();
    $sql3="SELECT A.CTAAJUABO as codcta, SUM(B.DEPMEN) as monto, SUM(B.DEPACU) as monto1, B.CODACT as codact, B.CODINM as codinm  FROM BNDEFCONI A, BnRegInm B, Bndepactdet c WHERE A.CODACT=B.CODACT AND
           A.CODINM = B.CODINM AND A.STACTA = 'A' AND B.STAINM = 'A' AND b.codact=c.codact and b.codinm=c.codmue  and c.fecdep='".$fechacomp."' and c.depmue>0
               AND B.DEPACU > 0 AND B.DEPREC='S' Group By A.CTAAJUABO, B.CODACT, B.CODINM";
    if (H::BuscarDatos($sql3,$result4))
    {
      $e=0;
      while ($e<count($result4))
      {
        if ($result4[$e]["monto"]>0) {
           $r2= new Criteria();
           $r2->add(BndepactdetPeer::CODACT,$result4[$e]["codact"]);
           $r2->add(BndepactdetPeer::CODMUE,$result4[$e]["codinm"]);
           $trajo2=BndepactdetPeer::doSelect($r2);
      	  $codigocuenta=$result4[$e]["codcta"];
          $tipo='C';
          $des="";
           if (count($trajo2)==1 && $result4[$e]["monto1"]>0)
            $moncau=$result4[$e]["monto1"];//$result2[$l]["monto"]+$result2[$l]["monto1"];
          else
            $moncau=$result4[$e]["monto"];
          $monto=$moncau;

          if ($i==0)
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
      	$e++;
      }
    }

    $cuentas=$codigocuentas;
    $descr=$desc;
    $tipos=$tipo1;
    $montos=$monto1;

	$clscommpro=new Comprobante();
	$clscommpro->setGrabar("S");
	$clscommpro->setNumcom($numerocomprob);
	$clscommpro->setReftra($reftra);
	$clscommpro->setFectra(date("d/m/Y",strtotime($fechacomp)));
	$clscommpro->setDestra($descom);
	$clscommpro->setCtas($cuentas);
	$clscommpro->setDesc($descr);
	$clscommpro->setMov($tipos);
	$clscommpro->setMontos($montos);
	$arrcompro[]=$clscommpro;

    return true;
  }

  public static function salvarSaveBnregmue($clase)
  {
    $mancornacreg=H::getConfApp2('mancornacreg', 'bienes', 'bieregactmued');
     if ($clase->getCodmue()=='########')
     {
      if ($mancornacreg=='S')
      {
        if ($clase->getProced()=='N') //Nacionales
          $corre='cormuenacd';
        else //Regionales
          $corre='cormueregd';

        if (Herramientas::getVerCorrelativo($corre,'bndefins',$r))
        {
          $encontrado=false;
          while (!$encontrado)
          {
            $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
            $sql="select codmue from bnregmue where codmue='".$numero."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
               $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
          }
          $clase->setCodmue(str_pad($r, 8, '0', STR_PAD_LEFT));
         }
         Herramientas::getSalvarCorrelativo($corre,'bndefins','RegistroMuebles',$r,$msg);
      }else {
        if (Herramientas::getVerCorrelativo('coractmue','bndefins',$r))
        {
          $encontrado=false;
          while (!$encontrado)
          {
            $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
            $sql="select codmue from bnregmue where codmue='".$numero."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
               $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
          }
          $clase->setCodmue(str_pad($r, 8, '0', STR_PAD_LEFT));
         }
         Herramientas::getSalvarCorrelativo('coractmue','bndefins','RegistroMuebles',$r,$msg);
      }
    }

    if ($clase->getCodalt()=='##########'){
       $t= new Criteria();
       $t->setLimit(1);
       $t->add(BnregmuePeer::CODUBI,$clase->getCodubi());
       $t->addDescendingOrderByColumn(BnregmuePeer::CODALT);
       $reg= BnregmuePeer::doSelectOne($t);
       if ($reg)
       {
          $clase->setCodalt($reg->getCodalt()+1);
       }else $clase->setCodalt('01');
    }

     
     /* $saveusu=H::getConfApp('saveusu','bienes','bieregactmued');
     if ($saveusu=='S') {*/
	     $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
	  	 $clase->setLogusu($loguse);
  	//}

    if ($clase->getSegnom()=='N')
      $clase->setFrenom('');
        
     $canmueigu=$clase->getCanmueigu();
     $clase->save(); // La Disposición se Graba despues que Graba el Mueble pregunta si desea generarla.
     
     $mansegbie=H::getConfApp2('mansegbie', 'bienes', 'bieregactmued');
     if ($mansegbie=='S' && $clase->getNumcue()!="" && $clase->getFecdepseg()!="")
     {
        if ($bnregmue->getSegnom()=='N')
          self::generar_movimientos_segun_librosSegBieMue($clase);
        self::grabarPolhistorico($clase);
     }
     //Se crean el mismo tipo de Mueble con Codigos  Distintos.
     if ($canmueigu>0)
     {
         $l=0;
         $corcodaltmuelot=H::getConfApp2('corcodaltmuelot', 'bienes', 'bieregactmued');
         while ($l<$canmueigu)
         {
                $r=$clase->getCodmue()+1;
                $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 10, '0', STR_PAD_LEFT);

	          $sql="select codmue from bnregmue where codmue='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
                
                $bnregmuenew= new Bnregmue();
                $bnregmuenew->setCodact($clase->getCodact());
                $bnregmuenew->setCodmue($numero);
                $bnregmuenew->setDesmue($clase->getDesmue());
                $bnregmuenew->setCodpro($clase->getCodpro());
                $bnregmuenew->setOrdcom($clase->getOrdcom());
                $bnregmuenew->setFecreg($clase->getFecreg());
                $bnregmuenew->setFeccom($clase->getFeccom());
                $bnregmuenew->setOrdrcp($clase->getOrdrcp());
                $bnregmuenew->setOrdrcp($clase->getOrdrcp());
                $bnregmuenew->setMarmue($clase->getMarmue());
                $bnregmuenew->setModmue($clase->getModmue());
                $bnregmuenew->setAnomue($clase->getAnomue());
                $bnregmuenew->setColmue($clase->getColmue());
                $bnregmuenew->setCodubi($clase->getCodubi());
                $bnregmuenew->setCodubiadm($clase->getCodubiadm());
                $bnregmuenew->setPesmue($clase->getPesmue());
                $bnregmuenew->setCapmue($clase->getCapmue());
                $bnregmuenew->setTipmue($clase->getTipmue());
                $bnregmuenew->setDetmue($clase->getDetmue());
                $bnregmuenew->setCoddis($clase->getCoddis());
                $bnregmuenew->setCodrespat($clase->getCodrespat());
                $bnregmuenew->setCodresuso($clase->getCodresuso());
                $bnregmuenew->setTippro($clase->getTippro());
                $bnregmuenew->setSermue($clase->getSermue());
                $bnregmuenew->setNropie($clase->getNropie());
                $bnregmuenew->setAltmue($clase->getAltmue());
                $bnregmuenew->setAncmue($clase->getAncmue());
                $bnregmuenew->setLarmue($clase->getLarmue());
                $bnregmuenew->setUsomue($clase->getUsomue());
                $bnregmuenew->setValini($clase->getValini());
                $bnregmuenew->setDepmen($clase->getDepmen());
                $bnregmuenew->setDepacu($clase->getDepacu());                
                $bnregmuenew->setVallib($clase->getVallib());
                $bnregmuenew->setValadi($clase->getValadi());
                $bnregmuenew->setValrex($clase->getValrex());
                $bnregmuenew->setValres($clase->getValres());
                $bnregmuenew->setCosrep($clase->getCosrep());                
                $bnregmuenew->setViduti($clase->getViduti());
                $bnregmuenew->setAumviduti($clase->getAumviduti());
                $bnregmuenew->setDimviduti($clase->getDimviduti());                
                $bnregmuenew->setNrocon($clase->getNrocon());                
                $bnregmuenew->setFeccon($clase->getFeccon());                
                $bnregmuenew->setCodest($clase->getCodest());                
                $bnregmuenew->setCodmod($clase->getCodmod());  
                $bnregmuenew->setFotmue($clase->getFotmue());
                $bnregmuenew->setCodusobie($clase->getCodusobie());
                if ($corcodaltmuelot=='S') {
                  $t1= new Criteria();
                  $t1->setLimit(1);
                  $t1->add(BnregmuePeer::CODUBI,$clase->getCodubi());
                  $t1->addDescendingOrderByColumn(BnregmuePeer::CODALT);
                  $reg1= BnregmuePeer::doSelectOne($t1);
                  if ($reg1)
                  {
                    if (($reg1->getCodalt()+1)>9)
                      $bnregmuenew->setCodalt($reg1->getCodalt()+1);
                    else
                      $bnregmuenew->setCodalt('0'.$reg1->getCodalt()+1);
                  }else $bnregmuenew->setCodalt('01');      
                }else $bnregmuenew->setCodalt($clase->getCodalt());
                $bnregmuenew->save();
             $l++;
         }
     }
     
     return -1;
  }

  public static function GrabarMovimiento($id) //Incorporacion
  {
  	$c = new Criteria();
  	$c->add(BnregmuePeer::ID,$id);
  	$clase = BnregmuePeer::doSelectOne($c);
  	if ($clase){
		  	$c = new Criteria();
		  	$c->add(BndisbiePeer::CODDIS,$clase->getCoddis());
		  	$per2 = BndisbiePeer::doselectone($c);
				if ($per2){
					$tipoinc = $per2->getCoddis().' - '.$per2->getDesdis();
				}

				if (H::getVerCorrelativo('corrmue','bndefins',$output)){
          $encontrado=false;
          while (!$encontrado)
          {
            $numero=str_pad($output, 10, '0', STR_PAD_LEFT);

            $sql="select nrodismue from bndismue where codact='".$clase->getCodact()."' and codmue='".$clase->getCodmue()."' and nrodismue='".$numero."'";
            if (Herramientas::BuscarDatos($sql,$result))
            {
              $output=$output+1;
            }
            else
            {
              $encontrado=true;
            }
          }

  			  $ref = str_pad($output, 10, '0', STR_PAD_LEFT);
          $saveusu=H::getConfApp('saveusu','bienes','bieregactmued');
  	      if (H::getSalvarCorrelativo('corrmue','bndefins','Registo de Disposicion de Bienes',$output,$msg)){
    				$c = new Bndismue();
    				$c->setCodact($clase->getCodact());
    				$c->setCodmue($clase->getCodmue());
    				$c->setNrodismue($ref);
    				$c->setTipdismue($tipoinc);
    				$c->setFecdismue($clase->getFecreg());
    				$c->setMotdismue(Herramientas::getX('coddis','Bndisbie','desdis',$clase->getCoddis()));
    				$c->setCodubiori($clase->getCodubi());
    				$c->setMondismue($clase->getValini());
            if ($saveusu=='S') {
              $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
              $c->setLogusu($loguse);
            }
    				$c->setStadismue('A');
    				//$c->save();

            Bienes::GrabarComprobanteDisRegMue($c);
            $c->save();

  				  return 'Se Genero una Incorporacion con el numero '.$ref;
    		  }
			}else{
				return 'Error al Buscar el Correlativo';
			}
  	}
  }

  public static function validarCodubi($codubi)
  {
     $formato=Herramientas::ObtenerFormato('Bndefins','forubi');
     $posrup1=Herramientas::instr($formato,'-',0,1);
     $posrup1=$posrup1-1;
     if (strlen(trim($codubi))<$posrup1)
     {
       return 101;
     }

    Herramientas::FormarCodigoPadre($codubi,$nivelcodigo,$ultimo,$formato);
    $c= new Criteria();
    $c->add(BnubibiePeer::CODUBI,$ultimo);
    $bnubibie = BnubibiePeer::doSelectOne($c);
    if (!$bnubibie)
    {
       if ($nivelcodigo == 0) return 100;
    }
    return -1;
  }

    public static function validarCodactivo($codact)
  {
     $formato=Herramientas::ObtenerFormato('Bndefins','foract');
     $posrup1=Herramientas::instr($formato,'-',0,1);
     $posrup1=$posrup1-1;
     if (strlen(trim($codact))<$posrup1)
     {
       return 101;
     }

    Herramientas::FormarCodigoPadre($codact,$nivelcodigo,$ultimo,$formato);
    $c= new Criteria();
    $c->add(BndefactPeer::CODACT,$ultimo);
    $bnubibie = BndefactPeer::doSelectOne($c);
    if (!$bnubibie)
    {
       if ($nivelcodigo == 0) return 100;
    }
    return -1;
  }
  
public static function generarComprobanteBieMue($bnregmue,&$arrcompro,&$msjuno)
  {

    $numerocomprob= '########';    
    $reftra=$bnregmue->getNumdep();
    
    $codigocuentas = "";
    $tipo1  = "";
    $desc   = "";
    $monto1 = "";

    $codigo = "";
    $tipo2  ="";
    $des2   ="";
    $monto2 ="";
    
    $msjuno = "";
    
    
    //Obtener cta asociada al banco
        $b1= new Criteria();
        $b1->add(TsdefbanPeer::NUMCUE,$bnregmue->getNumcue());
        $regis1 = TsdefbanPeer::doSelectOne($b1);
        if ($regis1) {
          $codigocuentas = $regis1->getCodcta();
        }    
        
        //Obtener la descripcion del codigo de cuenta
        $b= new Criteria();
        $b->add(ContabbPeer::CODCTA,$codigocuentas);
        $regis2  = ContabbPeer::doSelectOne($b);
        if ($regis2) {
          $tipo1  = 'D';
          $desc   = $regis2->getDescta();
          $monto1 = $bnregmue->getMonpag();
        }else {
          	$msjuno='La Cuenta Contable asociada a Cuenta Bancaria no existe';
          	return true;
        }
   
        //Obtener cta asociada al Tipo de Movimienro
        $b= new Criteria();
        $b->add(TstipmovPeer::CODTIP,$bnregmue->getCodtip());
        $regis = TstipmovPeer::doSelectOne($b);
        if ($regis) {
          $codigo = $regis->getCodcon();
        }

        //Obtener la descripcion del codigo de cuenta
        $b2= new Criteria();
        $b2->add(ContabbPeer::CODCTA,$codigo);
        $regis4  = ContabbPeer::doSelectOne($b2);
        if ($regis4) {
          $tipo2  = 'C';
          $des2   = $regis4->getDescta();
          $monto2 = $bnregmue->getMonpag();
        }else {
          	$msjuno='La Cuenta Contable asociada al Tipo de Movimiento no existe';
          	return true;
        }

      $cuentas=$codigo.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);
      $clscommpro->setReftra(substr($reftra,0,8));
      $clscommpro->setFectra(date("d/m/Y",strtotime($bnregmue->getFecregcom())));
      $clscommpro->setDestra('Cancelación del Seguro del Bien Mueble '.$bnregmue->getCodact()." - ".$bnregmue->getCodmue());
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
  }  
  
  public static function generar_movimientos_segun_librosSegBieMue($bnregmue)
  {
    $tsmovlib = new Tsmovlib();
    $tsmovlib->setNumcue($bnregmue->getNumcue());
    $tsmovlib->setReflib($bnregmue->getNumdep());
    $tsmovlib->setFeclib($bnregmue->getFecdepseg());
    $tsmovlib->setFecing($bnregmue->getFecdepseg());
    $tsmovlib->setTipmov($bnregmue->getCodtip());
    $tsmovlib->setMonmov($bnregmue->getMonpag());
    $tsmovlib->setDeslib('Cancelación del Seguro del Bien Mueble '.$bnregmue->getCodact()." - ".$bnregmue->getCodmue());
    $tsmovlib->setStacon('N');
    $tsmovlib->setStatus('C');   //Contabilizado
    $tsmovlib->setFeccom($bnregmue->getFecing());
    $tsmovlib->setNumcom($bnregmue->getNumcom());
    $moneda=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    $tsmovlib->setCodmon($moneda);
    $tsmovlib->setValmon($valor);     
    $tsmovlib->save();
  }//Fin generar_movimientos_segun_libros()  

  public static function grabarPolhistorico($clase)
  {
    $t= new Criteria();
    $t->add(BnpolmuePeer::CODACT,$clase->getCodact());
    $t->add(BnpolmuePeer::CODMUE,$clase->getCodmue());
    $t->add(BnpolmuePeer::FECDEPSEG,$clase->getFecdepseg());
    $trajo= BnpolmuePeer::doSelectOne($t);
    if (!$trajo) {
      $bnpolmue= new Bnpolmue();
      $bnpolmue->setCodact($clase->getCodact());
      $bnpolmue->setCodmue($clase->getCodmue());
      $bnpolmue->setNumcue($clase->getNumcue());
      $bnpolmue->setNumdep($clase->getNumdep());
      $bnpolmue->setFecdepseg($clase->getFecdepseg());
      $bnpolmue->setCodtip($clase->getCodtip());
      $bnpolmue->setMonpag($clase->getMonpag());
      $bnpolmue->setPorpri($clase->getPorpri());
      $bnpolmue->setMonpri($clase->getMonpri());
      $bnpolmue->setNumcom($clase->getNumcom());
      $bnpolmue->setSegnom($clase->getSegnom());
      $bnpolmue->setMonnom($clase->getMonnom());
      $bnpolmue->setFrenom($clase->getFrenom());
      $bnpolmue->save();
  }
  }

  public static function generarDisposicionMuebles($clasemodelo,$grid,&$cadena)
  {
    $x=$grid[0];
    $j=0;
    $cadena="";
    while ($j<count($x))
    {
       if ($x[$j]->getCodact()!='' && $x[$j]->getCodmue()!="")
       {
         $clasemodelo->setCodact($x[$j]->getCodact());
         $clasemodelo->setCodmue($x[$j]->getCodmue());

        $comprobante=true;
        $afecta=false;
        $c = new Criteria();
        $c->add(BndisbiePeer::CODDIS,substr($clasemodelo->getTipdismue(),0,6));
        $bndisbie = BndisbiePeer::doSelectOne($c);
        if ($bndisbie){
          if ($bndisbie->getDesinc()=='S'){
            $desincorpora = true;
          }else{
            $desincorpora = false;
          }

          if ($bndisbie->getAfecon()=='S'){
            $afecta=true;
            $c = new Criteria();
            $c->add(BndefconPeer::CODACT,$x[$j]->getCodact());
            $c->add(BndefconPeer::CODMUE,$x[$j]->getCodmue());
            $bndefcon = BndefconPeer::doSelectOne($c);
            if ($bndefcon){
              $c = new Criteria();
              $c->add(BnregmuePeer::CODACT,$x[$j]->getCodact());
              $c->add(BnregmuePeer::CODMUE,$x[$j]->getCodmue());
              $bnregmue = BnregmuePeer::doSelectOne($c);
                if ($bnregmue)
                {

                }else {$comprobante=false;}
            }else {$comprobante=false;}
          }
        }else {$comprobante=false;}

         if ($comprobante==true)
         {         
            if ($afecta==true) {
              if (self::grabarComprobanteDisposicion($clasemodelo,$desincorpora,$bnregmue,$bndefcon)) {
                  if (Muebles::Actualizar_Mueble($clasemodelo)== -1) {
                      $tienecorrelativo=false;
                       if (Herramientas::getVerCorrelativo('corrmue','bndefins',$r))
                       {
                          $tienecorrelativo=true;
                          $encontrado=false;
                          while (!$encontrado)
                          {
                            $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
                            $sql="select nrodismue from bndismue where codact='".$x[$j]->getCodact()."' and codmue='".$x[$j]->getCodmue()."' and nrodismue='".$numero."'";
                            if (Herramientas::BuscarDatos($sql,$result))
                            {
                              $r=$r+1;
                            }
                            else
                            {
                              $encontrado=true;
                            }
                          }
                          $nrodismueble=str_pad($r, 10, '0', STR_PAD_LEFT);
                      }

                     $bndismue2= new Bndismue();
                     $bndismue2->setCodact($x[$j]->getCodact());
                     $bndismue2->setCodmue($x[$j]->getCodmue());
                     $bndismue2->setNrodismue($nrodismueble);
                     $bndismue2->setCodmot($clasemodelo->getCodmot());
                     $bndismue2->setTipdismue($clasemodelo->getTipdismue());
                     $bndismue2->setFecdismue($clasemodelo->getFecdismue());
                     $bndismue2->setFecdevdis($clasemodelo->getFecdevdis());
                     $bndismue2->setDetdismue($clasemodelo->getDetdismue());
                     $bndismue2->setCodubiori($x[$j]->getCodubi());
                     if ($x[$j]->getCoddes()!="")
                       $bndismue2->setCodubides($x[$j]->getCoddes());
                     else
                       $bndismue2->setCodubides($clasemodelo->getCodubides());
                     //$bndismue2->setValini($clasemodelo->getMondismue());          
                     $bndismue2->setMondismue($clasemodelo->getMondismue());          
                     $bndismue2->setStadismue('A') ;
                     $saveusu=H::getConfApp('saveusu','bienes','biedisactmuenew');
                     if ($saveusu=='S') {
                       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
                       $bndismue2->setLogusu($loguse);
                     }
                     $bndismue2->save();

                     if ($tienecorrelativo)
                     {
                        Herramientas::getSalvarCorrelativo('corrmue','bndefins','Referencia',$r,$msg);
                     }
                   }else {
                     if ($cadena=="")
                        $cadena=$x[$j]->getCodact()."*".$x[$j]->getCodmue();
                      else            
                        $cadena=$cadena."/".$x[$j]->getCodact()."*".$x[$j]->getCodmue();
                  }
            }else {
                  if ($cadena=="")
                    $cadena=$x[$j]->getCodact()."*".$x[$j]->getCodmue();
                  else            
                    $cadena=$cadena."/".$x[$j]->getCodact()."*".$x[$j]->getCodmue();   
                }   
            }else {
                if (Muebles::Actualizar_Mueble($clasemodelo)== -1) {
                      $tienecorrelativo=false;
                       if (Herramientas::getVerCorrelativo('corrmue','bndefins',$r))
                       {
                          $tienecorrelativo=true;
                          $encontrado=false;
                          while (!$encontrado)
                          {
                            $numero=str_pad($r, 10, '0', STR_PAD_LEFT);
                            $sql="select nrodismue from bndismue where codact='".$x[$j]->getCodact()."' and codmue='".$x[$j]->getCodmue()."' and nrodismue='".$numero."'";
                            if (Herramientas::BuscarDatos($sql,$result))
                            {
                              $r=$r+1;
                            }
                            else
                            {
                              $encontrado=true;
                            }
                          }
                          $nrodismueble=str_pad($r, 10, '0', STR_PAD_LEFT);
                      }

                     $bndismue2= new Bndismue();
                     $bndismue2->setCodact($x[$j]->getCodact());
                     $bndismue2->setCodmue($x[$j]->getCodmue());
                     $bndismue2->setNrodismue($nrodismueble);
                     $bndismue2->setCodmot($clasemodelo->getCodmot());
                     $bndismue2->setTipdismue($clasemodelo->getTipdismue());
                     $bndismue2->setFecdismue($clasemodelo->getFecdismue());
                     $bndismue2->setFecdevdis($clasemodelo->getFecdevdis());
                     $bndismue2->setDetdismue($clasemodelo->getDetdismue());
                     $bndismue2->setCodubiori($x[$j]->getCodubi());
                     if ($x[$j]->getCoddes()!="")
                       $bndismue2->setCodubides($x[$j]->getCoddes());
                     else
                       $bndismue2->setCodubides($clasemodelo->getCodubides());
                     //$bndismue2->setValini($clasemodelo->getMondismue());     
                     $bndismue2->setMondismue($clasemodelo->getMondismue());               
                     $bndismue2->setStadismue('A') ;
                     $saveusu=H::getConfApp('saveusu','bienes','biedisactmuenew');
                     if ($saveusu=='S') {
                       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
                       $bndismue2->setLogusu($loguse);
                     }
                     $bndismue2->save();

                     if ($tienecorrelativo)
                     {
                        Herramientas::getSalvarCorrelativo('corrmue','bndefins','Referencia',$r,$msg);
                     }
                   }else {
                     if ($cadena=="")
                        $cadena=$x[$j]->getCodact()."*".$x[$j]->getCodmue();
                      else            
                        $cadena=$cadena."/".$x[$j]->getCodact()."*".$x[$j]->getCodmue();
                  }
            }
        }else {
             if ($afecta==true) {
              if ($cadena=="")
                $cadena=$x[$j]->getCodact()."*".$x[$j]->getCodmue();
              else            
                $cadena=$cadena."/".$x[$j]->getCodact()."*".$x[$j]->getCodmue();
             }          
        }      
       } 
     $j++;
    }
  }

  public static function Repetido2($grid, $codact, $fila, $col) {
    $repetido = false;
    $i = 0;
    while ($i < count($grid)) {
      $codact2 = $grid[$i][$col]."*".$grid[$i][0];
      $codact3=$codact."*".$grid[$fila][0];
      if ($i != $fila) {
        if ($codact3 == $codact2) {
          $repetido = true;
          break;
        }
      }
      $i++;
    }

    return $repetido;
  }

  public static function grabarComprobanteDisposicion($clasemodelo,$desincorpora,$bnregmue,$bndefcon)
  {
    $codigocuenta = "";
    $tipo  = "";
    $des   = "";
    $monto = "";

    $codigocuenta1 = "";
    $tipo1  = "";
    $desc1   = "";
    $monto1 = "";

    $codigocuenta2 = "";
    $tipo2  ="";
    $desc2   ="";
    $monto2 ="";

    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $descr  ="";

    $msjuno = "";
    $msjdos = "";

    $depacu   = $bnregmue->getDepacu();
    $valini   = $bnregmue->getValini();
    $valadi   = $bnregmue->getValadi();
    $descri = split('-',$clasemodelo->getTipdismue());
    $descripC = $descri[1];
    $ctadepcar= $bndefcon->getCtadepcar();  //CuentaCar
    $CuentaAbo= $bndefcon->getCtadepabo();
    $CuentaPedida= $bndefcon->getCtapercar();

    if (!$desincorpora)
    {
        $codigocuenta1  = $ctadepcar;
        $desc1 = $descripC;
        $tipo1 = 'D';
        $monto1 = $clasemodelo->getMondismue();
    }else{
        if ($depacu>0)
        {
            $codigocuenta1  = $ctadepcar;
            $desc1 = $descripC;
            $tipo1 = 'D';
            $monto1 = $depacu;            
        }

        if (($valini + $valadi) - $depacu > 0)
        {
          if ($depacu>0){
            $codigocuenta1  = $codigocuenta1."_".$CuentaPedida;
            $desc1 = $desc1."_".$descripC;
            $tipo1 = $tipo1."_".'D';
            $monto1 = $monto1."_".(($valini + $valadi) - $depacu);
            }else{
                $codigocuenta1  = $CuentaPedida;
            $desc1 = $descripC;
            $tipo1 = 'D';
            $monto1 = (($valini + $valadi) - $depacu);
          }
        }

        $codigocuenta2 = $CuentaAbo;
        $desc2 = $descripC;
        $tipo2 = 'C';
        $monto2 = ($valini + $valadi);
    }
    
    $cuentas = $codigocuenta1.'_'.$codigocuenta2;
    $descr   = $desc1.'_'.$desc2;
    $tipos   = $tipo1.'_'.$tipo2;
    $montos  = $monto1.'_'.$monto2;

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
    $numorden="ACM".substr($clasemodelo->getNrodismue(),-5,10);
    $correl3=Comprobante::Buscar_Correlativo($clasemodelo->getFecdismue());
    $contabc = new Contabc();
    $contabc->setNumcom($correl3);
    $contabc->setReftra($numorden);
    $contabc->setFeccom($clasemodelo->getFecdismue());
    $descri = split('-',$clasemodelo->getTipdismue());
    $contabc->setDescom($descri[1]);
    if ($sumdeb==$sumcre)
    $contabc->setStacom('D');
    else
    $contabc->setStacom('E');
    $contabc->setTipcom('BIE');
    $contabc->setMoncom($sumdeb);
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $contabc->setLoguse($loguse);
    $tiptra=H::getX_vacio('CODINS','Bndefins','Codtiptra','001');
    $contabc->setCodtiptra($tiptra);
    $contabc->save();

    $i=0;
    while ($i<=(count($new_ctas)-1))
    {
      if ($new_ctas[$i]!="")
      {
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl3);
          $contabc1->setFeccom($clasemodelo->getFecdismue());
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

public static function salvarSolicitudPolizasCertificados($clasemodelo,$grid){

  if (!$clasemodelo->getId()){
    if ($clasemodelo->getNumsol()=='####################')
    {
        $valido = false;
        $formato = date('my');
        $mes=date('m');
        $longitud='9';
        $sql="select substring(numsol,7,9) as num from bnsolpolcer where substring(numsol,16,2)='".$mes."' order by fecsol desc limit 1";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $cor=$result[0]["num"]+1;
        }else $cor=1;

        while(!$valido){
         $numsol = 'DSP/SEG'.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT).$formato;
          $c = new Criteria();
          $c->add(BnsolpolcerPeer::NUMSOL,$numsol);
          $bnsolpolcer = BnsolpolcerPeer::doSelectOne($c);
          if(!$bnsolpolcer){
            $valido = true;
          }else { $cor=$cor +1;}
        }

        $clasemodelo->setNumsol($numsol);
    }
  }
  $clasemodelo->save();

  $x = $grid[0];
  $j = 0;
  while ($j < count($x)) {
    if ($x[$j]->getCodact()!='' && $x[$j]->getCodmue()!='' && $x[$j]->getMonpri()>0 && $x[$j]->getNumdep()!='' && $x[$j]->getMondep()>0)
    {
       $x[$j]->setNumsol($clasemodelo->getNumsol());
       $x[$j]->save();
    }
    $j++;
  }

  $z=$grid[1];
  $l=0;
  if (!empty($z[$l])) {
    while ($l<count($z)) {
      $z[$l]->delete();
      $l++;
    }
  }
}

public static function salvarRegistroPolizasCertificados($clasemodelo,$grid){

  $clasemodelo->save();

  $x = $grid[0];
  $j = 0;
  while ($j < count($x)) {
    if ($x[$j]->getCodact()!='' && $x[$j]->getCodmue()!='' && $x[$j]->getMonpri()>0)
    {
       $x[$j]->setNumpol($clasemodelo->getNumpol());
       $x[$j]->save();
    }
    $j++;
  }

  $z=$grid[1];
  $l=0;
  if (!empty($z[$l])) {
    while ($l<count($z)) {
      $z[$l]->delete();
      $l++;
    }
  }
}

  public static function validarCorrelativoNacReg($bnregmue){  
    if ($bnregmue->getProced()=='N') //Nacionales
      $corre='cormuenacd';
    else//Regionales
      $corre='cormueregd';    

    $resul=BndefinsPeer::doSelectOne(new Criteria());
    if ($result)
    {
      if ($bnregmue->getProced()=='N'){
        if (($result->getCormuenacd()+1)>$result->getCormuenach())
          return 226;
        else {
          $q= new Criteria();
          $q->add(BnregmuePeer::CODACT,$bnregmue->getCodact());
          $q->add(BnregmuePeer::CODMUE,str_pad(($result->getCormuenacd()+1), 8, '0', STR_PAD_LEFT));
          $resul= BnregmuePeer::doSelectOne($q);
          if ($resul)
            return 228;        
        }
      }else {
        if (($result->getCormueregd()+1)>$result->getCormueregh())
          return 227;
        else {
          $q= new Criteria();
          $q->add(BnregmuePeer::CODACT,$bnregmue->getCodact());
          $q->add(BnregmuePeer::CODMUE,str_pad(($result->getCormueregd()+1), 8, '0', STR_PAD_LEFT));
          $resul= BnregmuePeer::doSelectOne($q);
          if ($resul)
            return 228;        
        }
      }
    }   
    return -1;
  }

  public static function generarComprobanteDisRegMue($bnregmue,&$arrcompro,$desincorpora,$bndefcon)
  {
    if (H::getVerCorrelativo('corrmue','bndefins',$output)){
      $encontrado=false;
      while (!$encontrado)
      {
        $numero=str_pad($output, 10, '0', STR_PAD_LEFT);

        $sql="select nrodismue from bndismue where codact='".$bnregmue->getCodact()."' and codmue='".$bnregmue->getCodmue()."' and nrodismue='".$numero."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $output=$output+1;
        }
        else
        {
          $encontrado=true;
        }
      }
      $ref = str_pad($output, 10, '0', STR_PAD_LEFT);
      $desdis=Herramientas::getX('coddis','Bndisbie','desdis',$bnregmue->getCoddis());
      $clase = new Bndismue();
      $clase->setCodact($bnregmue->getCodact());
      $clase->setCodmue($bnregmue->getCodmue());
      $clase->setNrodismue($ref);
      $clase->setTipdismue($bnregmue->getCoddis().' - '.$desdis);
      $clase->setFecdismue($bnregmue->getFecreg());
      $clase->setMotdismue($desdis);
      $clase->setCodubiori($bnregmue->getCodubi());
      $clase->setMondismue($bnregmue->getValini());
      $clase->setStadismue('A');   
    } 
////

    $mensaje="";
    $numeroorden="";
    $r='';

    $numorden="ACM".substr($clase->getNrodismue(),-5,10);
    //$numerocomprob = $numeroorden;
    $numerocomprob=Comprobante::Buscar_Correlativo(date("d/m/Y",strtotime($clase->getFecdismue())));
    $cuentaporpagarrendicion = "";

    $codigocuenta = "";
    $tipo  = "";
    $des   = "";
    $monto = "";

    $codigocuenta1 = "";
    $tipo1  = "";
    $desc1   = "";
    $monto1 = "";

    $codigocuenta2 = "";
    $tipo2  ="";
    $desc2   ="";
    $monto2 ="";

    $cuentas= "";
    $tipos  = "";
    $montos ="";
    $descr  ="";

    $msjuno = "";
    $msjdos = "";

    $depacu   = $bnregmue->getDepacu();
    $valini   = $bnregmue->getValini();
    $valadi   = $bnregmue->getValadi();
    $descri = split('-',$clase->getTipdismue());
    $descripC = $descri[1];
    if ($bndefcon) {
      $ctadepcar= $bndefcon->getCtadepcar();  //CuentaCar
      $CuentaAbo= $bndefcon->getCtadepabo();
      $CuentaPedida= $bndefcon->getCtapercar();
    }else {
      $ctadepcar= "";  //CuentaCar
      $CuentaAbo= "";
      $CuentaPedida= "";
    }

    if (!$desincorpora)
    {
        $codigocuenta1  = $ctadepcar;
        $desc1 = $descripC;
        $tipo1 = 'D';
        $monto1 = $clase->getMondismue();
    }else{

        if ($depacu>0)
        {
            $codigocuenta1  = $ctadepcar;
            $desc1 = $descripC;
            $tipo1 = 'D';
            $monto1 = $depacu;            
        }

        if (($valini + $valadi) - $depacu > 0)
        {
          if ($depacu>0){
          $codigocuenta1  = $codigocuenta1."_".$CuentaPedida;
          $desc1 = $desc1."_".$descripC;
          $tipo1 = $tipo1."_".'D';
          $monto1 = $monto1."_".(($valini + $valadi) - $depacu);
          }else{
              $codigocuenta1  = $CuentaPedida;
          $desc1 = $descripC;
          $tipo1 = 'D';
          $monto1 = (($valini + $valadi) - $depacu);
          }
        }

        $codigocuenta2 = $CuentaAbo;
        $desc2 = $descripC;
        $tipo2 = 'C';
        $monto2 = ($valini + $valadi);
    }

      $cuentas = $codigocuenta1.'_'.$codigocuenta2;
      $descr   = $desc1.'_'.$desc2;
      $tipos   = $tipo1.'_'.$tipo2;
      $montos  = $monto1.'_'.$monto2;

      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      $clscommpro->setNumcom($numerocomprob);  //Correlativo
      $clscommpro->setReftra($numorden);
      $clscommpro->setFectra(date("d/m/Y",strtotime($clase->getFecdismue())));
      $descri = split('-',$clase->getTipdismue());
      $clscommpro->setDestra($descri[1]);
      $clscommpro->setCtas($cuentas);
      $clscommpro->setDesc($descr);
      $clscommpro->setMov($tipos);
      $clscommpro->setMontos($montos);
      $arrcompro[]=$clscommpro;

  return true;
   
 }

  public static function GrabarComprobanteDisRegMue(&$bndismue)
  {
      $concom=1;
      $form="sf_admin/bieregactmued/confincomgendis";
      $grabo=sfContext::getInstance()->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=sfContext::getInstance()->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if (sfContext::getInstance()->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=sfContext::getInstance()->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=sfContext::getInstance()->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=sfContext::getInstance()->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=sfContext::getInstance()->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=sfContext::getInstance()->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=sfContext::getInstance()->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=sfContext::getInstance()->getUser()->getAttribute('grid',null,$formulario[$i]);

          sfContext::getInstance()->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          sfContext::getInstance()->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          sfContext::getInstance()->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          sfContext::getInstance()->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          sfContext::getInstance()->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          sfContext::getInstance()->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          sfContext::getInstance()->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          $tiptra=H::getX_vacio('CODINS','Bndefins','Codtiptra','001');
          $numero = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,sfContext::getInstance()->getUser()->getAttribute('grabar',null,$formulario[$i]),'BIE',$tiptra);

          $bndismue->setNumcom($numero);
         }
         $i++;
        }
      }
      sfContext::getInstance()->getUser()->getAttributeHolder()->remove('grabo',$form.'0');
  }

}
?>
