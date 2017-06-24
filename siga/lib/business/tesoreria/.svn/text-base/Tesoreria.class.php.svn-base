<?php
/**
 * Tesorería: Clase estática para procesar el modulo de tesorería
 *
 * @package    Roraima
 * @subpackage tesoreria
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Tesoreria {
  /**************************Definición del Iva para Agentes de Retención**********************************/
  public static function salvarPagretiva($iva, $grid) {
    self :: grabarIva($iva, $grid);
  }

  public static function grabarIva($iva, $grid)
  {
    $c= new Criteria();
    TsretivaPeer::doDelete($c);

    $x = $grid[0];
    $j = 0;
    while ($j < count($x))
    {
      if ($x[$j]->getCodret()!="" && $x[$j]->getCodrec()!="" && $x[$j]->getCodpar()!="")
      {
          if ($x[$j]->getAnoant()=="1")
          {
              $x[$j]->setAnoant('S');
          }else {
              $x[$j]->setAnoant(null);
          }
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

  public static function grabarIva2($iva, $grid)
  {
    $tipo=$iva->getCodrep();
    $x = $grid[0];
    $j = 0;
    while ($j < count($x))
    {
      $x[$j]->setCodrep($tipo);
      $x[$j]->save();
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

  public static function validarPagmodret($reten, $grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getMonret()=='')
      {
        return 515;
      }
      $j++;
    }
    return -1;
  }

  /********************************************************************************************************/

  /****************************** Miki- Cierre de Bancos **************************************************/

  public static function hay_Conciliacion($tabla, $nro, $mes, $ano) {
    $result = array ();
    $sql = "Select * From " . $tabla . " Where numcue = '" . $nro . "' And mescon = '" . $mes . "' And anocon = '" . $ano . "'";
    if (Herramientas :: BuscarDatos($sql, $result)) {
      return true;
    } else
      return false;
  }

  public static function generaCierre($nro, $mes, $ano) {
    $sql = "Select numcue,mescon,anocon,refere,movlib,movban,feclib,fecban,desref,monlib,monban,result From tsconcil Where numcue = '" . $nro . "' And mescon = '" . $mes . "' And anocon = '" . $ano . "'";
    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tsconcil) {
        Tesoreria :: grabarHistorico($tsconcil);
        Tesoreria :: eliminarTsconcil($nro, $mes, $ano);

      }
    }
  }

  public static function generaApertura($nro, $mes, $ano) {
    $sql = "Select numcue,mescon,anocon,refere,movlib,movban,feclib,fecban,desref,monlib,monban,result From tsconcilhis Where numcue = '" . $nro . "' And mescon = '" . $mes . "' And anocon = '" . $ano . "'";
    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tsconcilhis) {
        Tesoreria :: grabarTsconcil($tsconcilhis);
        Tesoreria :: eliminarHistorico($nro, $mes, $ano);
      }
    }
  }

  public static function grabarHistorico($tsconcil) {
    $tsconcilhis = new Tsconcilhis();
    $tsconcilhis->setNumcue($tsconcil["numcue"]);
    $tsconcilhis->setMescon($tsconcil["mescon"]);
    $tsconcilhis->setAnocon($tsconcil["anocon"]);
    $tsconcilhis->setRefere($tsconcil["refere"]);
    $tsconcilhis->setMovlib($tsconcil["movlib"]);
    $tsconcilhis->setMovban($tsconcil["movban"]);
    $tsconcilhis->setFeclib($tsconcil["feclib"]);
    $tsconcilhis->setFecban($tsconcil["fecban"]);
    $tsconcilhis->setDesref($tsconcil["desref"]);
    $tsconcilhis->setMonlib($tsconcil["monlib"]);
    $tsconcilhis->setMonban($tsconcil["monban"]);
    $tsconcilhis->setResult($tsconcil["result"]);

    $tsconcilhis->save();
  }

  public static function grabarTsconcil($tsconcilhis) {
    $tsconcil = new Tsconcil();
    $tsconcil->setNumcue($tsconcilhis["numcue"]);
    $tsconcil->setMescon($tsconcilhis["mescon"]);
    $tsconcil->setAnocon($tsconcilhis["anocon"]);
    $tsconcil->setRefere($tsconcilhis["refere"]);
    $tsconcil->setMovlib($tsconcilhis["movlib"]);
    $tsconcil->setMovban($tsconcilhis["movban"]);
    $tsconcil->setFeclib($tsconcilhis["feclib"]);
    $tsconcil->setFecban($tsconcilhis["fecban"]);
    $tsconcil->setDesref($tsconcilhis["desref"]);
    $tsconcil->setMonlib($tsconcilhis["monlib"]);
    $tsconcil->setMonban($tsconcilhis["monban"]);
    $tsconcil->setResult($tsconcilhis["result"]);

    $tsconcil->save();
  }

  public static function eliminarTsconcil($nro, $mes, $ano) {
    $c = new Criteria();
    $c->add(TsconcilPeer :: NUMCUE, $nro);
    $c->add(TsconcilPeer :: MESCON, $mes);
    $c->add(TsconcilPeer :: ANOCON, $ano);
    $tsconcil = TsconcilPeer :: doSelect($c);
    if ($tsconcil)
    {
    foreach ($tsconcil as $valor) {
      $valor->delete();
    }
    }
  }

  public static function eliminarHistorico($nro, $mes, $ano) {
    $c = new Criteria();
    $c->add(TsconcilhisPeer :: NUMCUE, $nro);
    $c->add(TsconcilhisPeer :: MESCON, $mes);
    $c->add(TsconcilhisPeer :: ANOCON, $ano);
    $tsconcilhis = TsconcilhisPeer :: doSelect($c);
    if ($tsconcilhis)
    {
    foreach ($tsconcilhis as $valor) {
      $valor->delete();
    }
    }
  }

  /********************************************************************************************************/
  //formulario tesmovtraban
  /********************************************************************************************************/
  /****************************** Definición de Cuentas Bancarias **************************************************/
  /* Función para grabar el detalle; las chequeras pertenecientes a una cuenta bancaria
  *
  * @static
  * @param $reqser Object $defcueban a guardar
  * @param $grid Array de Objects a guardar.
  * @return void
  */
  public static function Grabar_Chequeras($defcueban, $grid) {

    $numcue = $defcueban->getNumcue();
    $x = $grid[0];
    $j = 0;
    while ($j < count($x)) {
      $x[$j]->setNumcue($numcue);
      $x[$j]->save();
      $j++;
    }
    $z = $grid[1];
    $j = 0;
    if (!empty($z[$j])) {
      while ($j < count($z)) {
        $z[$j]->delete();
        $j++;
      } //while ($j<count($z))
    } //if (!empty($z[$j]))
  } //end function

  /********************************* Miki- Conciliacion **************************************************/
  public static function el_Banco_Esta_Cerrado($nro, $mes, $ano) {
    $sql = "Select * From TSCONCILHIS Where NumCue = '" . $nro . "' And MesCon = '" . $mes . "' And AnoCon = '" . $ano . "'";
    if (Herramientas :: BuscarDatos($sql,  $result)) {
      return true;
    } else {
      return false;
    }
  }

  public static function elimina_Conciliaciones_Anteriores($nro) {
    $c = new Criteria();
    $c->add(TsconcilPeer :: NUMCUE, $nro);
    $tsconcil = TsconcilPeer :: doSelect($c);
    if ($tsconcil)
    {
    foreach ($tsconcil as $valor) {
      $valor->delete();
    }
    }

  }

	public static function hacer_Conciliables($nro, $mes, $ano, $fechas) {
    $sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
            A.TipMov as tipmov1, B.TipMov as tipmov2, A.DesLib as deslib, B.DesBan as desban,
            A.MonMov as monmov1, B.MonMov as monmov2
                   From TsMovLib A, TsMovBan B
                  Where A.RefLib = B.RefBan And
                    A.MonMov = B.MonMov And A.tipmov=b.tipmov and
                    A.NumCue = '" . $nro . "' And
            B.NumCue = '" . $nro . "' And
                     A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     A.StaCon='N' And B.StaCon='N' AND
                     A.Status='C' And B.Status='C'";

    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tstemigu) {
        $tsconcil = new Tsconcil();
        $tsconcil->setNumcue($nro);
        $tsconcil->setMescon($mes);
        $tsconcil->setAnocon($ano);
        $tsconcil->setRefere($tstemigu["reflib"]);
        $tsconcil->setMovlib($tstemigu["tipmov1"]);
        $tsconcil->setMovban($tstemigu["tipmov2"]);
        $tsconcil->setFeclib($tstemigu["feclib"]);
        $tsconcil->setFecban($tstemigu["fecban"]);
        $tsconcil->setDesref($tstemigu["deslib"]);
        $tsconcil->setMonlib($tstemigu["monmov1"]);
        $tsconcil->setMonban($tstemigu["monmov2"]);
        $tsconcil->setResult('CONCILIADO');
        $tsconcil->save();

        Tesoreria :: actualizar_Status($nro, $tstemigu["reflib"], 'C',$tstemigu["tipmov1"]);
      }
    }

  }


	public static function hacer_Conciliables_Inconciliables($nro, $mes, $ano, $fechas) {
  	  $dateFormat = new sfDateFormat('es_VE');
      $fechas = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));

  	  $c=new Criteria();
	  $c->add(TsmovlibPeer::NUMCUE,$nro);
	  $c->add(TsmovlibPeer::FECLIB,$fechas,Criteria::LESS_EQUAL);
	  $c->add(TsmovlibPeer::STACON1,'C');
	  $reg = TsmovlibPeer::doSelect($c);

	  if ($reg){
	      foreach ($reg as $tsconcil) {
	        $tsconcil->setStacon('C');
	        $tsconcil->save();
	  	  }

      }
      //Bancos
  	  $c=new Criteria();
	  $c->add(TsmovbanPeer::NUMCUE,$nro);
	  $c->add(TsmovbanPeer::FECBAN,$fechas,Criteria::LESS_EQUAL);
	  $c->add(TsmovbanPeer::STACON1,'C');
	  $reg = TsmovbanPeer::doSelect($c);

	  if ($reg){
	      foreach ($reg as $tstemigu) {
	        $tstemigu->setStacon('C');
	        $tstemigu->save();
	  	  }

      }
  }

  public static function hacer_Conciliables_Anulados($nro, $mes, $ano, $fechas) {
    $sql = "Select reflibpad,tipmovpad
                 From TSMovLib
                 Where NumCue = '" . $nro . "' And
                       FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                       (TipMov in ('ANUC','ANUD') ) 
                       		";

    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tstemigu) {
        $c = new Criteria();
        $c->add(TsmovlibPeer :: NUMCUE, $nro);
        $c->add(TsmovlibPeer :: REFLIB, $tstemigu["reflibpad"]);
        $c->add(TsmovlibPeer :: TIPMOV, $tstemigu["tipmovpad"]);
        $tsmovlib = TsmovlibPeer :: doSelectOne($c);

        if ($tsmovlib) {
          $tsmovlib->setStacon('C');
          $tsmovlib->save();
        }
      }
    }
  }

   public static function hacer_Libro_No_Banco($nro, $mes, $ano, $fechas) {
    $sql = "Select reflib,tipmov,feclib,deslib,monmov From TsMovLib
                  Where NumCue = '" . $nro . "' And
                    FecLib<= To_Date('" . $fechas . "','DD/MM/YYYY') And Status = 'C' And StaCon='N' ";

    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tsmovlib) {
        $sql2 = "SELECT REFBAN From TSMOVBAN
                         WHERE NUMCUE= '" . $nro . "' And
                            RefBan ='" . $tsmovlib["reflib"] . "' And Tipmov ='" . $tsmovlib["tipmov"] . "' And
                            FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY')";
        if  (!Herramientas :: BuscarDatos($sql2, $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tsmovlib["reflib"]);
          $tsconcil->setMovlib($tsmovlib["tipmov"]);
          $tsconcil->setMovban(null);
          $tsconcil->setFeclib($tsmovlib["feclib"]);
          $tsconcil->setFecban(null);
          $tsconcil->setDesref($tsmovlib["deslib"]);
          $tsconcil->setMonlib($tsmovlib["monmov"]);
          $tsconcil->setMonban(0);
          $tsconcil->setResult('MOVIMIENTO EN TRANSITO');
          $tsconcil->save();

          $fec=explode('/',$fechas);
          $fecfin=$fec[2]."-".$fec[1]."-".$fec[0];

          $c = new Criteria();
          $c->add(TsmovlibPeer :: NUMCUE, $nro);
          $c->add(TsmovlibPeer :: FECLIB, $fecfin);
          $c->add(TsmovlibPeer :: STATUS, 'C');
          $c->add(TsmovlibPeer :: STACON, 'N');
          $tsmovlib2 = TsmovlibPeer :: doSelectOne($c);
          if ($tsmovlib2) {
          	//foreach ($tsmovlib2 as $lib2) {
            $tsmovlib2->setStacon('N');
            $tsmovlib2->save();
          	//}
          }
        }

      }
    }
  }

  public static function hacer_Banco_No_Libro($nro, $mes, $ano, $fechas) {
    $sql = "Select refban, tipmov, fecban, desban, monmov
                    From TsMovBan
                  Where NumCue = '" . $nro . "' And
                    FecBan<= To_Date('" . $fechas . "','DD/MM/YYYY') And STATUS='C' And StaCon='N'";
    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tsmovban) {
        $sql2 = "SELECT * From TSMOVLIB
                             WHERE NUMCUE = '" . $nro . "' And
                             RefLib = '" . $tsmovban["refban"] . "' And Tipmov = '" . $tsmovban["tipmov"] . "' And
                             FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY')";

        if (!Herramientas :: BuscarDatos($sql2, $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tsmovban["refban"]);
          $tsconcil->setMovlib(null);
          $tsconcil->setMovban($tsmovban["tipmov"]);
          $tsconcil->setFeclib(null);
          $tsconcil->setFecban($tsmovban["fecban"]);
          $tsconcil->setDesref($tsmovban["desban"]);
          $tsconcil->setMonlib(0);
          $tsconcil->setMonban($tsmovban["monmov"]);
          $tsconcil->setResult('MOVIMIENTO NO REGISTRADO EN LIBROS');
          $tsconcil->save();

          //$dateFormat = new sfDateFormat($this->getUser()->getCulture());
          //$fechas = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));

          $fec=explode('/',$fechas);
          $fecfin=$fec[2]."-".$fec[1]."-".$fec[0];

          $c = new Criteria();
          $c->add(TsmovbanPeer :: NUMCUE, $nro);
          $c->add(TsmovbanPeer :: FECBAN, $fecfin);
          $c->add(TsmovbanPeer :: STATUS, 'C');
          $c->add(TsmovbanPeer :: STACON, 'N');
          $tsmovban2 = TsmovbanPeer :: doSelectOne($c);
          if ($tsmovban2) {
          	//foreach ($tsmovban2 as $ban2) {
            $tsmovban2->setStacon('N');
            $tsmovban2->save();
          	//}
          }
        }

      }
    }
  }

  public static function hacer_No_Conciliables($nro, $mes, $ano, $fechas) {
	$sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
          A.TipMov as movlib, B.TipMov as movban, A.DesLib as deslib, B.DesBan as desban,
          A.MonMov as monmov1, B.MonMov as monmov2
                From TsMovLib A, TsMovBan B
                Where
                A.NumCue = '" . $nro . "' And
                B.NumCue = '" . $nro . "' And
          A.RefLib = B.RefBan And A.TipMov=B.TipMov And
                A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                A.MonMov <> B.MonMov and A.stacon='N'";

    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tstemigu) {
        $sql2 = "Select * From TSconcil Where
                        NumCue = '" . $nro . "' And
                        Refere = '" . $tstemigu["reflib"] . "' And
                        Refere = '" . $tstemigu["refban"] . "' And
                        FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        movlib='" . $tstemigu["movlib"] . "'  and
                        Result like 'CONCILIADO%'";

        if (!Herramientas :: BuscarDatos($sql2, $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tstemigu["reflib"]);
          $tsconcil->setMovlib($tstemigu["movlib"]);
          $tsconcil->setMovban($tstemigu["movban"]);
          $tsconcil->setFeclib($tstemigu["feclib"]);
          $tsconcil->setFecban($tstemigu["fecban"]);
          $tsconcil->setDesref($tstemigu["deslib"]);
          $tsconcil->setMonlib($tstemigu["monmov1"]);
          $tsconcil->setMonban($tstemigu["monmov2"]);
          $tsconcil->setResult('ERROR EN CONCILIACION (MONTOS DIFERENTES)');
          $tsconcil->save();
        }

      }
    }
  }

  public static function anular_Conciliacion($nro, $mes, $ano) {
    $c = new Criteria();
    $c->add(TsconcilPeer :: NUMCUE, $nro);
    $result = TsconcilPeer :: doSelect($c);
    if ($result)
    {
	    foreach ($result as $tsconcil) {
	      $tsconcil->delete();
	    }
    }
    
    //ANULANDO MOVIMIENTOS SEGUN LIBROS
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $nro);
    $sql = "Tsmovlib.tipmov<>'ANUC'  AND Tsmovlib.tipmov<>'ANUD' AND Tsmovlib.tipmov<>'CAN'";
    $c->add(TsmovlibPeer :: TIPMOV, $sql, Criteria :: CUSTOM);
    $result = TsmovlibPeer :: doSelect($c);

    if ($result)
    {
	    foreach ($result as $tsmovlib) {
	      $tsmovlib->setStacon('N');
	      $tsmovlib->save();
	    }
    }

    $fecdes = "01/".$mes."/".$ano;
    $dateFormat = new sfDateFormat('es_VE');
    $fecdes = $dateFormat->format($fecdes, 'i', $dateFormat->getInputPattern('d'));

    /*$c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $nro);
    $c->add(TsmovlibPeer::FECLIB,$fecdes,Criteria::GREATER_EQUAL);
    $c->add(TsmovlibPeer :: STACON1, 'C');
    $result = TsmovlibPeer :: doSelect($c);

    if ($result)
    {
	    foreach ($result as $tsmovlib) {
	      $tsmovlib->setStacon1('N');
	      $tsmovlib->save();
	    }
    }*/


	$c=new criteria();
    //ANULANDO MOVIMIENTOS SEGUN BANCOS
    $c = new Criteria();
    $c->add(TsmovbanPeer :: NUMCUE, $nro);
    $sql = "Tsmovban.tipmov<>'ANUC'  AND Tsmovban.tipmov<>'ANUD' AND Tsmovban.tipmov<>'CAN'";
    $c->add(TsmovbanPeer :: TIPMOV, $sql, Criteria :: CUSTOM);
    $result = TsmovbanPeer :: doSelect($c);

    if ($result)
    {
	    foreach ($result as $tsmovban) {
	      $tsmovban->setStacon('N');
	      $tsmovban->save();
	    }
    }

  /*  $c = new Criteria();
    $c->add(TsmovbanPeer :: NUMCUE, $nro);
    $c->add(TsmovbanPeer::FECBAN,$fecdes,Criteria::GREATER_EQUAL);
    $c->add(TsmovbanPeer :: STACON1, 'C');
    $result = TsmovbanPeer :: doSelect($c);

    if ($result)
    {
	    foreach ($result as $tsmovban) {
	      $tsmovban->setStacon1('N');
	      $tsmovban->save();
	    }
    }*/

  }

  public static function actualizar_Status($nro, $refere, $status,$tipmov) {
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $nro);
    $c->add(TsmovlibPeer :: REFLIB, $refere);
    $c->add(TsmovlibPeer :: TIPMOV, $tipmov);
    $tsmovlib = TsmovlibPeer :: doSelectOne($c);

    if ($tsmovlib) {    
      $tsmovlib->setStacon($status);
      $tsmovlib->save();
    }

    $c = new Criteria();
    $c->add(TsmovbanPeer :: NUMCUE, $nro);
    $c->add(TsmovbanPeer :: REFBAN, $refere);
    $c->add(TsmovbanPeer :: TIPMOV, $tipmov);
    $tsmovban = TsmovbanPeer :: doSelectOne($c);

    if ($tsmovban) {    
      $tsmovban->setStacon($status);
      $tsmovban->save();
    
    }
  }

  /********************************************************************************************************/
  //formulario confincomgen
  /********************************************************************************************************/

  public static function Salvarconfincomgen($numcom, $reftra, $feccom, $descom, $debito, $credito, $tipcom=null,$codtiptra=null,$coddirec='',$codmon='',$valmon=1)
  {
      $aux=substr($feccom,2,1);
      if ($aux=='/') {
        $dateFormat = new sfDateFormat('es_VE');
        $feccom_mod = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
      }else {
          $feccom_mod=$feccom;
      }

    $contabc2 = new Contabc();
    $contabc2->setNumcom($numcom);
    $contabc2->setReftra($reftra);
    $contabc2->setFeccom($feccom_mod);
    $contabc2->setDescom($descom);

    if ($debito == $credito) {
      $contabc2->setStaCom('D');
    } else {
      $contabc2->setStaCom('E');
    }
    $contabc2->setTipcom($tipcom);
    $contabc2->setMoncom($debito);
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $contabc2->setLoguse($loguse);  
    $contabc2->setCodtiptra($codtiptra);
    $contabc2->setCoddirec($coddirec);
    $contabc2->setCodmon($codmon);
    $contabc2->setValmon($valmon);
    $compgene = $numcom;
    $contabc2->save();

  }

  public static function Salvar_asientosconfincomgen($numcom, $reftra, $feccom, $grid, $guarda)
  {
    if ($guarda == 'S') {
      $aux=substr($feccom,2,1);
      if ($aux=='/') {
      $dateFormat = new sfDateFormat('es_VE');
      $feccom_mod = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
      }else {
          $feccom_mod=$feccom;
      }

      $x = $grid[0];
      $j = 0;
      while ($j < count($x)) {
        if ($x[$j]->getCodcta()!="")
        {
        $x[$j]->setNumcom($numcom);
        $x[$j]->setFeccom($feccom_mod);

        If (($x[$j]->getMondebito() > 0) and ($x[$j]->getMoncredito() <= 0)) {
          $cre = 'D';
          $monto = $x[$j]->getMondebito();
        }
        If (($x[$j]->getMoncredito() > 0) and ($x[$j]->getMondebito() <= 0)) {
          $cre = 'C';
          $monto = $x[$j]->getMoncredito();
        }
        $x[$j]->setDesasi($x[$j]->getDescta());
        $x[$j]->setRefasi($reftra);
        $x[$j]->setNumasi($j +1);
        $x[$j]->setDebcre($cre);
        $x[$j]->setMonasi($monto);
        $x[$j]->save();
        }
        $j++;
      }
      $z = isset($grid[1]) ? $grid[1] : null;
      $j = 0;
      if (!empty($z[$j])) {
        while ($j < count($z)) {
          $z[$j]->delete();
          $j++;
        }

      }
    } else {
      $arreglo = $grid[0];
      $i = 0;
      $aux=substr($feccom,2,1);
      if ($aux=='/') {
      $dateFormat = new sfDateFormat('es_VE');
      $feccom_mod = $dateFormat->format($feccom, 'i', $dateFormat->getInputPattern('d'));
      }else {
          $feccom_mod=$feccom;
      }

      $c = new Criteria();
      $c->add(Contabc1Peer::NUMCOM, $numcom);
      $c->add(Contabc1Peer::FECCOM, $feccom_mod);
      $contabc1 = Contabc1Peer::doSelectOne($c);
      if (count($contabc1) == 0) {
        while ($i < count($grid[0])) {
        if ($arreglo[$i]['codcta']!="" && ($arreglo[$i]['mondebito'] > 0 || $arreglo[$i]['moncredito'] > 0))
        {
          $reg = new Contabc1();
          $reg->setNumcom($numcom);
          $reg->setFeccom($feccom_mod);
          if (($arreglo[$i]['mondebito'] > 0) and ($arreglo[$i]['moncredito'] <= 0)) {
            $cre = 'D';
            $monto = $arreglo[$i]['mondebito'];
          }
          if (($arreglo[$i]['moncredito'] > 0) and ($arreglo[$i]['mondebito'] <= 0)) {
            $cre = 'C';
            $monto = $arreglo[$i]['moncredito'];
          }
          $reg->setDebcre($cre);
          $reg->setCodcta(str_replace("'", "", $arreglo[$i]['codcta']));
          $reg->setNumasi($i +1);
          $reg->setRefasi($reftra);
          $desasi = ContabbPeer :: getDescta(str_replace("'", "", $arreglo[$i]['codcta']));
          $reg->setDesasi($desasi);
          $reg->setMonasi($monto);
          $reg->save();
        }
          $i++;
        }
      }
    }
  }
  /********************************************************************************************************/
  //formulario tesmovtraban
  /********************************************************************************************************/

  public static function Salvartesmovtraban($objeto, $tipmovdesd, $tipmovhast,$comprobaut) {

    if ($comprobaut=='S')
    {
     self::generaComprobanteAutomatico($objeto, $tipmovdesd, $tipmovhast,$numcom);
     $objeto->setNumcom($numcom);
     $objeto->save();
    }
    self :: Genera_movlibdeb_confincomgen($objeto, $tipmovdesd);
    self :: Genera_movlibcre_confincomgen($objeto, $tipmovhast);
    
    $mancomban=H::getConfApp2('mancomban', 'tesoreria', 'tesmovtraban');
    if ($mancomban=='S')
    {
       $moncom=H::getX_vacio('CODCOM', 'Tscomban', 'Moncom', $objeto->getCodcom());
       if ($moncom>0) {
         $monto3=H::toFloat($objeto->getMontra())*H::toFloat($objeto->getValmon(),6)*(H::toFloat($moncom)/100);
         $monto1=H::toFloat($objeto->getMontra())*H::toFloat($objeto->getValmon(),6)-$monto3;   
       }else {
        $monto1=H::toFloat($objeto->getMontra())*H::toFloat($objeto->getValmon(),6);
       }
    }else {
        $monto1=H::toFloat($objeto->getMontra())*H::toFloat($objeto->getValmon(),6);
    }
      
    $c = new Criteria();
    $c->add(TsmovtraPeer :: REFTRA, $objeto->getReftra());
    $tsmovtra = TsMovtraPeer :: doSelectOne($c);
    if (!$tsmovtra) {
      self :: Actualiza_bancostra('A', 'C', $objeto->getCtaori(), $monto1);
      self :: Actualiza_bancostra('A', 'D', $objeto->getCtades(), $monto1); //$objeto->getMontra());
    }
    $escheque=H::getX_vacio('CODTIP', 'Tstipmov', 'Escheque', $tipmovhast);
    $reqfirma=H::getConfApp2('reqfirma', 'tesoreria', 'tesmovemiche');
    if ($escheque==1) {

      $t= new Criteria();
      $t->add(TscheemiPeer::TIPDOC,$tipmovhast);
      $t->add(TscheemiPeer::NUMCUE,$objeto->getCtaori());
      $t->add(TscheemiPeer::NUMCHE,$objeto->getReftra());
      $resul= TscheemiPeer::doSelectOne($t);
      if (!$resul) {
      $tscheeminew= new Tscheemi();
      $tscheeminew->setTipdoc($tipmovhast);
      $tscheeminew->setNumcue($objeto->getCtaori());
      $tscheeminew->setFecemi($objeto->getFectra());
      $tscheeminew->setCedrif(null);
      $tscheeminew->setNumche($objeto->getReftra());
      $tscheeminew->setNombensus(null);
      $tscheeminew->setMonche($monto1);//$objeto->getMontra());
      if ($reqfirma=='S')  $tscheeminew->setStatus("F");   //Firma
      else $tscheeminew->setStatus("C");  //Caja
      $tscheeminew->setCodent(null);
      $tscheeminew->setObsent(null);
      $tscheeminew->setFecanu(null);
      $tscheeminew->setCedrec(null);
      $tscheeminew->setNomrec(null);
      $tscheeminew->setCodmon($objeto->getCodmon());
      $tscheeminew->setValmon($objeto->getValmon());
      $tscheeminew->save();
  }
    }
  }

  public static function Actualiza_bancostra($accion, $debcre, $numcta, $monto) {
    $c = new Criteria();
    $c->add(TsdefbanPeer :: NUMCUE, $numcta);
    $tsdefban = TsdefbanPeer :: doSelectOne($c);
    if ($tsdefban) {
      if ($debcre == 'D') {
        $debito = $tsdefban->getDeblib();
        if ($accion == 'A') {
          $total = $debito + $monto;
        }
        elseif ($accion == 'E') {
          $total = $debito - $monto;
        }
      }
      elseif ($debcre == 'C') {
        $debito = $tsdefban->getCrelib();
        if ($accion == 'A') {
          $total = $debito + $monto;
        }
        elseif ($accion == 'E') {
          $total = $debito - $monto;
        }
      }
      $tsdefban->setCrelib($monto);
      $tsdefban->save();
    }
  }

  public static function Genera_movlibdeb_confincomgen($objeto, $tipmovdesd) {
    $grabocontabilidad = true;
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $objeto->getCtades());
    $c->add(TsmovlibPeer :: REFLIB, $objeto->getReftra());
    $c->add(TsmovlibPeer :: TIPMOV, $tipmovdesd);
    $tsmov = TsmovlibPeer :: doSelectOne($c);

    if (count($tsmov) == 0) {
      $tsmov = new Tsmovlib();
      $tsmov->setNumcue($objeto->getCtades());
      $tsmov->setReflib($objeto->getReftra());
      //$refpag = self::Buscar_Correlativo_Pago();
      //$tsmov->setRefpag($objeto->getRefpag());
      $tsmov->setTipmov($tipmovdesd);
      $tsmov->setFeclib($objeto->getFectra());
      $tsmov->setFecing($objeto->getFectra());
      $tsmov->setDeslib('TRANSFERENCIA DE LA CUENTA ' . $objeto->getCtaori().'. '.$objeto->getDestra());
      $mancomban=H::getConfApp2('mancomban', 'tesoreria', 'tesmovtraban');
      if ($mancomban=='S')
      {
         $moncom=H::getX_vacio('CODCOM', 'Tscomban', 'Moncom', $objeto->getCodcom());
         $monto3=H::toFloat($objeto->getMontra())*H::toFloat($objeto->getValmon(),6)*(H::toFloat($moncom)/100);
         $monto1=H::toFloat($objeto->getMontra())*H::toFloat($objeto->getValmon(),6)-$monto3;   
         $tsmov->setMonmov($monto1);
      }else {
      $tsmov->setMonmov($objeto->getMontra()*H::toFloat($objeto->getValmon(),6));
      }
      $ctahasta = Herramientas :: getX_vacio('numcue', 'TSdefban', 'CodCta', $objeto->getCtades());
      $tsmov->setCodcta($ctahasta);
      $tsmov->setNumcom($objeto->getNumcom());
      $tsmov->setFeccom($objeto->getFectra());
      if ($grabocontabilidad) {
        $tsmov->setStatus('C');
      } else {
        $tsmov->setStatus('N');
        $tsmov->setFeccom(null);
      }
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $tsmov->setLoguse($loguse);
      $tsmov->setStacon('N');

      $mancomban=H::getConfApp2('mancomban', 'tesoreria', 'tesmovtraban');
      $valmon=$objeto->getValmon();//0;
      //if ($mancomban=='S')
      //{         
         $mone=$objeto->getCodmon();//H:: getX_vacio('numcue', 'TSdefban', 'Codmon', $objeto->getCtades());
      /*}else {
           $mone=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      }
         $q= new Criteria();
         $q->add(TsdesmonPeer::CODMON,$mone);
         $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
         $reg= TsdesmonPeer::doSelectOne($q);
         if ($reg)
         {
           $valmon=number_format($reg->getValmon(),6,',','.');
         }*/
      
      $tsmov->setCodmon($mone);
      $tsmov->setValmon($valmon);
      $tsmov->save();

     /* $c = new Criteria();
	  $datos = CpdefnivPeer::doSelectOne($c);
	  if ($datos){
	  	$datos->setCorpag((string)$refpag);
	   	$datos->save();
	  }*/
    }
  }

  public static function Genera_movlibcre_confincomgen($objeto, $tipmovhast) {
    $grabocontabilidad = true;
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $objeto->getCtaori());
    $c->add(TsmovlibPeer :: REFLIB, $objeto->getReftra());
    $c->add(TsmovlibPeer :: TIPMOV, $tipmovhast);
    $tsmov2 = TsmovlibPeer :: doSelectOne($c);

    if (count($tsmov2) == 0) {
      $tsmov2 = new Tsmovlib();
      $tsmov2->setNumcue($objeto->getCtaori());
      $tsmov2->setReflib($objeto->getReftra());
      //$refpag = self::Buscar_Correlativo_Pago();
      $tsmov2->setNumcom($objeto->getNumcom());
      $tsmov2->setFeclib($objeto->getFectra());
      $tsmov2->setFecing($objeto->getFectra());
      $tsmov2->setTipmov($tipmovhast);
      $tsmov2->setDeslib('TRANSFERENCIA A LA CUENTA ' . $objeto->getCtades().'. '.$objeto->getDestra());
      $tsmov2->setMonmov($objeto->getMontra()*H::toFloat($objeto->getValmon(),6));
      $ctadesde = Herramientas :: getX_vacio('numcue', 'TSdefban', 'CodCta', $objeto->getCtaori());
      $tsmov2->setCodcta($ctadesde);
      $tsmov2->setFeccom($objeto->getFectra());
      if ($grabocontabilidad) {
        $tsmov2->setStatus('C');
      } else {
        $tsmov2->setStatus('N');
        $tsmov2->setFeccom(null);
      }
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $tsmov2->setLoguse($loguse);
      $tsmov2->setStacon('N');         
      $mancomban=H::getConfApp2('mancomban', 'tesoreria', 'tesmovtraban');
      //if ($mancomban=='S')
      //{
      $tsmov2->setCodmon($objeto->getCodmon());
      $tsmov2->setValmon($objeto->getValmon());
     /* }else {
           $mone=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
           $valmon=0;
             $q= new Criteria();
             $q->add(TsdesmonPeer::CODMON,$mone);
             $q->addDescendingOrderByColumn(TsdesmonPeer::FECMON);
             $reg= TsdesmonPeer::doSelectOne($q);
             if ($reg)
             {
               $valmon=number_format($reg->getValmon(),6,',','.');
             }
          
          $tsmov2->setCodmon($mone);
          $tsmov2->setValmon($valmon);
      }*/
      
      
      $tsmov2->save();

      /* $c = new Criteria();
	   $datos = CpdefnivPeer::doSelectOne($c);
	   if ($datos){
	   	 $datos->setCorpag((string)$refpag);
	   	 $datos->save();
	   }*/
    }
  }

  public static function Eliminar_confincomgen($tsmovtra) {
    //Eliminar_Movimientos
    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $tsmovtra->getCtaori());
    $c->add(TsmovlibPeer :: REFLIB, $tsmovtra->getReftra());
    $c->add(TsmovlibPeer :: TIPMOV, $tsmovtra->getTipmovhast());
    $tsmovlib = TsmovlibPeer :: doSelectOne($c);
    if (count($tsmovlib) > 0) {
      if ($tsmovlib->getStacon() != 'C') {
        $tsmovlib->delete();
      }
    }

    $c = new Criteria();
    $c->add(TsmovlibPeer :: NUMCUE, $tsmovtra->getctades());
    $c->add(TsmovlibPeer :: REFLIB, $tsmovtra->getReftra());
    $c->add(TsmovlibPeer :: TIPMOV, $tsmovtra->getTipmovdesd());
    $tsmovlib = TsmovlibPeer :: doSelectOne($c);
    if (count($tsmovlib) > 0) {
      if ($tsmovlib->getStacon() != 'C') {
        $tsmovlib->delete();
      }
    }

    //Eliminar_Comprobante
    $c = new Criteria();
    $c->add(ContabcPeer :: NUMCOM, $tsmovtra->getReftra());
    $c->add(ContabcPeer :: FECCOM, $tsmovtra->getFectra());
    $contabc = ContabcPeer :: doSelectOne($c);
    if (count($contabc) > 0) {
      if ($contabc->getStacom() == 'A') {
        $msgbox = 'El Comprobante ya esta Actualizado';
      }
      if ($contabc->getStacom() == 'N') {
        $msgbox = 'El Comprobante ya esta Anulado';
      }
      if ($contabc->getStacom() == 'D') {
        $c = new Criteria();
        $c->add(Contabc1Peer :: NUMCOM, $tsmovtra->getReftra());
        $c->add(Contabc1Peer :: FECCOM, $tsmovtra->getFectra());
        Contabc1Peer :: doDelete($c);
      }
    }

    //Eliminar_Pagado
    $c = new Criteria();
    $c->add(CppagosPeer :: REFPAG, $tsmovtra->getReftra());
    $cppagos = CppagosPeer :: doSelectOne($c);
    if (count($cppagos) > 0) {
      $c = new Criteria();
      $c->add(CpimppagPeer :: REFPAG, $tsmovtra->getReftra());
      CpimppagPeer :: doDelete($c);
    }
    $c = new Criteria();
    $c->add(TsmovtraPeer :: REFTRA, $tsmovtra->getReftra());
    TsmovtraPeer :: doDelete($c);

    self :: Actualiza_bancostra('A', 'D', $tsmovtra->getCtades(), $tsmovtra->getMontra());
    self :: Actualiza_bancostra('A', 'C', $tsmovtra->getCtaori(), $tsmovtra->getMontra());

  }

  /**************************  Miki MOVIMIENTOS SEGUN LIBROS  *******************************************/

  public static function anular_Eliminar_Cheque($accion, $numcue, $reflib) {
    $mosdatimp=H::getConfApp2('mosdatimp', 'tesoreria', 'teschecus');
    $sql = "Select status, cheimp From TSCHEEMI Where NumCue = '" . $numcue . "' AND NumChe = '" . $reflib . "' Order by NumCue,NumChe";
    if (Herramientas :: BuscarDatos($sql, $tscheemi)) {
      switch ($accion) {
        case 'A' :
          if ($mosdatimp=='S' && $tscheemi[0]["cheimp"] == 'S') {
            return "No se puede anular el movimiento, El cheque fué Impreso";
          }
          if ($tscheemi[0]["status"] == 'E') {
            return "No se puede anular el movimiento, El cheque fué Entregado";
          }
          if ($tscheemi[0]["status"] == 'A') {
            return "No se puede anular el movimiento, El cheque fué Anulado";
          }
          if ($tscheemi[0]["status"] == 'C' || $tscheemi[0]["status"] == 'F') {
            $c = new Criteria();
            $c->add(TscheemiPeer :: NUMCUE, $numcue);
            $c->add(TscheemiPeer :: NUMCHE, $reflib);
            $tscheemi = TscheemiPeer :: doSelectOne($c);
            if ($tscheemi)
            {
             $tscheemi->setStatus('A');
             $tscheemi->save();
            }
            return '';
          }
          break;
        case 'E' :
          if ($tscheemi[0]["status"] == 'E') {
            return "No se puede eliminar el movimiento, El cheque fué Entregado";
          }
          if ($tscheemi[0]["status"] == 'A') {
            return "No se puede eliminar el movimiento, El cheque fué Anulado";
          }
          if ($tscheemi[0]["status"] == 'C' || $tscheemi[0]["status"] == 'F') {
            $c = new Criteria();
            $c->add(TscheemiPeer :: NUMCUE, $numcue);
            $c->add(TscheemiPeer :: NUMCHE, $reflib);
            TscheemiPeer :: doDelete($c);
            return '';
          }
          break;
      }
    }
  }

  public static function anular_Eliminar_Imppag($accion, $reflib, $numcue, $feclib, $refpag) {
    //$pagado = $reflib;
    $pagado =$refpag;
    $sql = "Select * from CPIMPPAG where refpag='" . $pagado . "'";
    if (Herramientas :: BuscarDatos($sql, $cpimppag)) {
      switch ($accion) {
        case 'A' :
          $msg = Tesoreria :: anular_Eliminar_Pagado($accion, $reflib, $feclib, $refpag);
          $c = new Criteria();
          $c->add(CpimppagPeer :: REFPAG, $pagado);
          $cpimppag = CpimppagPeer :: doSelect($c);
          foreach($cpimppag as $imppag){
            $imppag->setStaimp('N');
            $imppag->save();
          }
          return $msg;
          break;

        case 'E' :
          $c = new Criteria();
          $c->add(CpimppagPeer :: REFPAG, $pagado);
          CpimppagPeer :: doDelete($c);
          $msg = Tesoreria :: anular_Eliminar_Pagado($accion, $reflib, $feclib, $refpag);

          return $msg;
          break;
      }
    }
  }

  public static function anular_Eliminar_Pagado($accion, $reflib, $feclib, $refpag) {
    //$pagado = $reflib;
	$pagado = $refpag;
    $c = new Criteria();
    $c->add(CppagosPeer :: REFPAG, $pagado);
    $cppagos = CppagosPeer :: doSelectOne($c);
    if ($cppagos) {
      if ($accion == 'A') {
        if ($cppagos->getStapag() == 'A') {
          $dateFormat = new sfDateFormat('es_VE');
          $fec = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));

          $cppagos->setFecanu($fec);
          $cppagos->setStapag('N');
          $cppagos->save();
        }

      } else
        if ($accion == 'E') {
          if ($cppagos->getStapag() == 'A') {
            $cppagos->delete();
          }
        }
      return '';
    } else {
      return 'El Pagado No fue Actualizado';
    }
  }

  public static function actualiza_Orden_De_Pago($reflib, $numcue, $tipmov) {
    $result=array();
    $sql = "Select numord,monpag from opordche where numche='" . $reflib . "' and codcta='".$numcue."' and tipmov='".$tipmov."' order by numche";
    if (Herramientas :: BuscarDatos($sql,$result))
    {
      $j=0;
      while ($j<count($result))
      {
        $monpag=H::toFloat(H::getX_vacio('NUMORD','Opordpag','Monpag',$result[$j]["numord"]));
        $montoact=H::toFloat($monpag)-$result[$j]["monpag"];
        if ($montoact<0)
          $montoact=0;

         $sql4="update opordpag set status='N', numche=null, ctaban=null, monpag=".$montoact." where numord='".$result[$j]["numord"]."'";
         Herramientas::insertarRegistros($sql4);

        /*$c = new Criteria();
        $c->add(OpordpagPeer :: NUMORD, $result[$j]["numord"]);
        $opordpag = OpordpagPeer :: doSelectOne($c);
        if ($opordpag) {
          $opordpag->setStatus('N');
          $opordpag->setNumche(null);
          $opordpag->setCtaban(null);
          if ($opordpag->getMonpag() > 0) {
            $opordpag->setMonpag($opordpag->getMonpag() - $result[$j]["monpag"]);
          } else {
            $opordpag->setMonpag(0);
          }
          $opordpag->save();
        }*/

        $c1 = new Criteria();
        $c1->add(OpdetperPeer :: NUMORD, $result[$j]["numord"]);
        $c1->add(OpdetperPeer :: NUMCHE, $reflib);
        $c1->add(OpdetperPeer :: CTABAN, $numcue);
        $c1->add(OpdetperPeer :: TIPMOV, $tipmov);
        $opdetper = OpdetperPeer :: doSelectOne($c1);
        if ($opdetper) {
          $opdetper->setFecpag(null);
          $opdetper->setNumche(null);
          $opdetper->save();
        }
        $j++;
      }
      /*$c2 = new Criteria();
      $c2->add(OpordchePeer :: NUMCHE, $reflib);
      OpordchePeer :: doDelete($c2);*/

      $sql6="delete from opordche where numche='" . $reflib . "' and codcta='".$numcue."' and tipmov='".$tipmov."'";
      Herramientas::insertarRegistros($sql6);

      return '';
    } else {

    	$sql4="update opordpag set status='N', numche=null, ctaban=null, monpag=0 where numche='".$reflib."' and ctaban='".$numcue."'";
         Herramientas::insertarRegistros($sql4);

      /*$c = new Criteria();
      $c->add(OpordpagPeer :: NUMCHE, $reflib);
      $res = OpordpagPeer :: doSelectOne($c);
      if ($res) {
        foreach ($res as $opordpag) {
          $opordpag->setNumche(null);
          $opordpag->setCtaban(null);
          $opordpag->setStatus('N');
          $opordpag->save();
        }*/
        return '';
      /*} else {
        return 'La Orden de Pago no fue Actualizada';
      }*/
    }
  }

  public static function actualiza_Bancos($accion, $debcre, $numcue, $monmov) {
    $c = new Criteria();
    $c->add(TsdefbanPeer :: NUMCUE, $numcue);
    $tsdefban = TsdefbanPeer :: doSelectOne($c);
    if ($tsdefban) {
      switch ($debcre) {
        case 'D' :
          if ($accion == 'A') {
            $debito = $tsdefban->getDeblib();
            $total = $debito + $monmov;
            $tsdefban->setDeblib($total);
          }
          if ($accion == 'E') {
            $debito = $tsdefban->getDeblib();
            $total = $debito - $monmov;
            $tsdefban->setDeblib($total);
          }
          $tsdefban->save();
          break;

        case 'C' :
          if ($accion == 'A') {
            $credito = $tsdefban->getCrelib();
            $total = $credito + $monmov;
            $tsdefban->setCrelib($total);
          }
          if ($accion == 'E') {
            $credito = $tsdefban->getCrelib();
            $total = $credito - $monmov;
            $tsdefban->setCrelib($total);
          }
          $tsdefban->save();
          break;
      }
    }
  }

  public static function anular_Eliminar($accion, $numcomadi, $feccomadi, $compadic, $fechacom, $numcom, &$numcom2, $feclib,$reflib2='',$desanu='') {
    $msj='';
    if ($accion == 'E') {
      $msj=self :: buscar_Comprobante('E', $numcomadi, $feccomadi, $compadic, $fechacom, $numcom, $numcom2, $feclib, $reflib2);
    }
    if ($accion == 'A') {
      $msj=self :: buscar_Comprobante('A', $numcomadi, $feccomadi, $compadic, $fechacom, $numcom, $numcom2, $feclib, $reflib2,$desanu);
    }
    return $msj;
  }

  public static function buscar_Comprobante($accion,$numcomadi,$feccomadi,$compadic,$fechacom,$numcom,&$numcom2,$feclib, $reflib2='',$desanu='')
  {
    if ($accion=='E')
    {
      if ($numcomadi!='')
      {
        $fechacar=$feccomadi;
        $dateFormat = new sfDateFormat('es_VE');
          $fec = $dateFormat->format($fechacar, 'i', $dateFormat->getInputPattern('d'));

        $c = new Criteria();
        $c->add(Contabc1Peer::NUMCOM,$numcomadi);
        //$c->add(Contabc1Peer::FECCOM,$fec);
        Contabc1Peer::doDelete($c);

        $c = new Criteria();
        $c->add(ContabcPeer::NUMCOM,$numcomadi);
        //$c->add(ContabcPeer::FECCOM,$fec);
        ContabcPeer::doDelete($c);
      }
      if ($compadic=='S')
      {
        $dateFormat = new sfDateFormat('es_VE');
          $fec = $dateFormat->format($fechacom, 'i', $dateFormat->getInputPattern('d'));

         $c = new Criteria();
        $c->add(Contabc1Peer::NUMCOM,$numcom);
        //$c->add(Contabc1Peer::FECCOM,$fec);
        Contabc1Peer::doDelete($c);

        $c = new Criteria();
        $c->add(ContabcPeer::NUMCOM,$numcom);
        //$c->add(ContabcPeer::FECCOM,$fec);
        ContabcPeer::doDelete($c);
      }
      $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($fechacom, 'i', $dateFormat->getInputPattern('d'));
      $c = new Criteria();
      $c->add(Contabc1Peer::NUMCOM,$numcom);
      //$c->add(Contabc1Peer::FECCOM,$fec);
      Contabc1Peer::doDelete($c);

      $c = new Criteria();
      $c->add(ContabcPeer::NUMCOM,$numcom);
      //$c->add(ContabcPeer::FECCOM,$fec);
      ContabcPeer::doDelete($c);
    }
    else
    {
     // if($numcom2=='########') $numcom2 = Comprobante::Buscar_Correlativo();

      if ($numcom!='' && $numcom!='########' && $numcom!='********'){
      $sql="Select descom,moncom from CONTABC where NumCom = '".$numcom."'";
      if (Herramientas::BuscarDatos($sql,$contabc))
      {
        $dateFormat = new sfDateFormat('es_VE');
        $fec = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));
        $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
        if ($confcorcom=='N')
         $numcom2="A".substr($numcom,1,7);
         else { $numcom2 = Comprobante::Buscar_Correlativo($fec);
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
                $numcom2= 'A'.substr($numcom2,1,7);
            }
         }

        $tcontabc= new Contabc();
        $tcontabc->setNumcom($numcom2);
        $tcontabc->setFeccom($fec);
        $desanucom=H::getConfAppGen('desanucom');
        if ($desanucom=='S')
          $tcontabc->setDescom($desanu);
        else
          $tcontabc->setDescom($contabc[0]["descom"]);
        $tcontabc->setStacom('D');
        $tcontabc->setTipcom(null);
        $tcontabc->setReftra($reflib2);
        $tcontabc->setMoncom($contabc[0]["moncom"]);
        $tcontabc->save();

        $sql2="Select codcta,numasi,refasi,desasi,debcre,monasi from CONTABC1 where NumCom = '".$numcom."'";
        if (Herramientas::BuscarDatos($sql2,$result2))
        {
          foreach ($result2 as $contabc1)
          {
            $tcontabc1= new Contabc1();
            $tcontabc1->setNumcom($numcom2);
            $tcontabc1->setFeccom($fec);
            $tcontabc1->setCodcta($contabc1["codcta"]);
            $tcontabc1->setNumasi($contabc1["numasi"]);
            $tcontabc1->setRefasi($reflib2);
            $tcontabc1->setDesasi($contabc1["desasi"]);
            if ($contabc1["debcre"]=='D')
            {
              $tcontabc1->setDebcre('C');
            }
            else
            {
              $tcontabc1->setDebcre('D');
            }
            $tcontabc1->setMonasi($contabc1["monasi"]);
            $tcontabc1->save();
          }
        }
      }else{
      	return 'El Comprobante Nro. '.$numcom.' no fué anulado, y falta que se genere el comprobante INVERSO.';
      }
      }
      else
      {
        return 'El Nro. generado para el comprobante de anulación:'.$numcom2.' no es válido, y falta que se genere el comprobante INVERSO.';
      }
      /*if ($compadic=='S')
      {
        $sql3="Select descom,moncom from CONTABC where NumCom = '".$numcom."'";
          if (Herramientas::BuscarDatos($sql3,&$contabc))
          {
            $dateFormat = new sfDateFormat('es_VE');
            $fec = $dateFormat->format($feclib, 'i', $dateFormat->getInputPattern('d'));

            $tcontabc= new Contabc();
            $tcontabc->setNumcom($numcom2);
            $tcontabc->setFeccom($fec);
            $tcontabc->setDescom($contabc[0]["descom"]);
              $tcontabc->setStacom('D');
            $tcontabc->setTipcom('');
            $tcontabc->setMoncom($contabc[0]["moncom"]);
            $tcontabc->save();

            $sql4="Select codcta,numasi,refasi,desasi,debcre,monasi from CONTABC1 where NumCom = '".$numcom."' AND FECCOM=TO_DATE('".$fechacom."','DD/MM/YYYY')";
            if (Herramientas::BuscarDatos($sql4,&$result4))
            {
              foreach ($result4 as $contabc1)
              {
                $tcontabc1= new Contabc1();
                $tcontabc1->setNumcom($numcom2);
                $tcontabc1->setFeccom($fec);
                $tcontabc1->setCodcta($contabc1["codcta"]);
                $tcontabc1->setNumasi($contabc1["numasi"]);
                $tcontabc1->setRefasi($contabc1["refasi"]);
                $tcontabc1->setDesasi($contabc1["desasi"]);
                if ($contabc1["debcre"]=='D')
                {
                  $tcontabc1->setDebcre('C');
                }
                else
                {
                  $tcontabc1->setDebcre('D');
                }
                $tcontabc1->setMonasi($contabc1["monasi"]);
                $tcontabc1->save();
              }
            }
          }
      }*/
    }
    return '';
  }


  /*******************************************************************************************************/

   public static function anularMovLibro($nrocuenta,$referencia,$tipmov,$refanu,$fecanu,$destra,$monto)
   {
      $c= new Criteria();
      $c->add(TsmovlibPeer::NUMCUE,$nrocuenta);
      $c->add(TsmovlibPeer::REFLIB,$referencia);
      $c->add(TsmovlibPeer::TIPMOV,$tipmov);
      $resul=TsmovlibPeer::doSelectOne($c);
      if ($resul)
      {
       if ($resul->Stacon()!='C')
       {
          $tsmovlib= new Tsmovlib();
          $tsmovlib->setNumcue($nrocuenta);
          $tsmovlib->setReflib($refanu);
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
         $tsmovlib->setDeslib($destra);
         //$tsmovlib->setReflibpad(str_pad($refanu,8,'0',STR_PAD_LEFT));
         $tsmovlib->setReflibpad($referencia);
         $tsmovlib->setTipmovpad($tipmov);
         $tsmovlib->save();
         self::actualizaBancos($nrocuenta,'A',$afecta,$monto);
       }
       else
       {
        $msj='El Movimiento esta Conciliado, No puede ser anulado';
       }
      }
   }

  public static function actualizaBancos($nrocuenta,$accion,$debcre,$monto)
  {
    $c= new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$nrocuenta);
    $dato=TsdefbanPeer::doSelectOne($c);
    if ($dato)
    {
      switch($dato->getDebcre())
      {
        case "D":
          if ($accion=='A')
          {
            $debito=self::tranformarGrid($dato->getDeblib());
            $total= $debito + $monto;
            $dato->setDeblib($total);
          }
          if ($accion=='E')
          {
            $debito=self::tranformarGrid($dato->getDeblib());
            $total= $debito - $monto;
            $dato->setDeblib($total);
          }
          break;
       case "C":
         if ($accion=='A')
          {
            $credito=self::tranformarGrid($dato->getCrelib());
            $total= $credito + $monto;
            $dato->setCrelib($total);
          }
          if ($accion=='E')
          {
            $credito=self::tranformarGrid($dato->getCrelib());
            $total= $credito - $monto;
            $dato->setCrelib($total);
          }
         break;
      }
      $dato->save();
    }
  }

  public static function transformarGrid($dato)
  {
    $pos=Herramientas::instr($dato,',',0,1);
    if ($pos== 0)
    {
      $tranformargrid=$dato;
    }
    else
    {
     $tranformargrid=substr($dato,0,($pos-1));
     $tranformargrid=$tranformargrid.'.'.substr($dato,($pos+1),strlen($dato));
    }
   return $tranformargrid;
  }

  public static function reversarComprobante($numerocomprobante,$fecanu,$desanu)
  {
    $numcom=Comprobante::Buscar_Correlativo($fecanu);
    $c= new Criteria();
    $c->add(ContabcPeer::NUMCOM,$numerocomprobante);
    $resulta=ContabcPeer::doSelectOne($c);
    if ($resulta)
    {
       $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
      if ($confcorcom=='N')
      $numcom= 'A'.substr($numerocomprobante,1,7);

      $contabc2 = new Contabc();
      $contabc2->setNumcom($numcom);
      $contabc2->setFeccom($fecanu);
      $desanucom=H::getConfAppGen('desanucom');
      if ($desanucom=='S')
        $contabc2->setDescom($desanu);
      else
        $contabc2->setDescom($resulta->getDescom());
      $contabc2->setStaCom('D');
      $contabc2->setTipcom(null);
      $contabc2->setReftra($resulta->getReftra());
      $contabc2->setMoncom($resulta->getMoncom());
      $contabc2->save();
    }

    $c= new Criteria();
    $c->add(Contabc1Peer::NUMCOM,$numerocomprobante);
    $resulcontabc=Contabc1Peer::doSelect($c);
    foreach ($resulcontabc as $resultados)
    {
    $contabc1= new Contabc1();
    $contabc1->setNumcom($numcom);
    $contabc1->setFeccom($fecanu);
    $contabc1->setCodcta($resultados->getCodcta());
    $contabc1->setNumasi($resultados->getNumasi());
    $contabc1->setRefasi($resultados->getRefasi());
    $contabc1->setDesasi($resultados->getDesasi());
    if ($resultados->getDebcre()=='D')
    {
      $contabc1->setDebcre('C');
    }
    else
    {
      $contabc1->setDebcre('D');
    }
    $contabc1->setMonasi($resultados->getMonasi());
    $contabc1->save();
    }//foreach ($resulcontabc as $resultados)
  }

  public static function validarTesdefcueban($grid)
  {
    $x=$grid[0];
    if (self::chequeraRepetida($grid))
        return 552;
    $j=0;
    $total1=0;
    $total2=0;
    while ($j<count($x))
    {

      if ($x[$j]->getActiva()=='SI')
      {
        $total1=$total1 +1;
      }
      else
      {
        $total2=$total2 +1;
      }
      $j++;
    }

    if ($total1==0)
    {
      return 517;
    }
    else if ($total1>1)
    {
     return 518;
    }
    else
    {
      return -1;
    }
  }

  public static function chequeraRepetida($grid)
  {
    $chequerarepetida=false;
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      $cheq1=$x[$j]->getCodchq().'-'.$x[$j]->getNumchedes().'-'.$x[$j]->getNumchehas();
      $l=0;
      while ($l<count($x))
      {
        $cheq2=$x[$l]->getCodchq().'-'.$x[$l]->getNumchedes().'-'.$x[$l]->getNumchehas();
        if ($l!=$j)
        {
        	if ($cheq1==$cheq2)
        	{
              $chequerarepetida=true;
              break;
        	}
        }
    	$l++;
      }
      if ($chequerarepetida) break;

      $j++;
    }

   return $chequerarepetida;
  }

  public static function validarComprobanteDescuadrado($grid)
  {
    $x=$grid[0];
    $j=0;
    $total1=0;
    $total2=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcta()!="")
      {
        $mondeb=$x[$j]->getMondebito();
        $moncre=$x[$j]->getMoncredito();
        if ($mondeb>0)
        {
          $total1=$total1 + $mondeb;
        }

        if ($moncre>0)
        {
          $total2=$total2 + $moncre;
        }
      }
      $j++;
    }

    if (Herramientas::toFloat($total1)!=Herramientas::toFloat($total2))
    {
      return false;
    }
    else
    {
      return true;
    }
  }
  
public static function validarCuentasGrid($grid,$fecha)
  {
    $x=$grid[0];
    $j=0;
    //$total1=0;
    //$total2=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodcta()!="")
      {
        $c = new Criteria();
        $c->add(ContabbPeer::CODCTA,$x[$j]->getCodcta());
        $per = ContabbPeer::doSelectOne($c);
        if(!$per)
        {
        	return 549;
        }else {
          if ($per->getCargab()!='C')
            return 1517;
          else {
            $p= new Criteria();
            $p->add(TsdefbanPeer::CODCTA,$x[$j]->getCodcta());
            $regp= TsdefbanPeer::doSelect($p);
            if ($regp){
              foreach ($regp as $objp) {
                if (Tesoreria::validaPeriodoCerradoBanco($fecha,$objp->getNumcue())==false){
                   return 649;
                }
              }
            }
          }
        }
      }
      $j++;
    }

    /*if (Herramientas::toFloat($total1)!=Herramientas::toFloat($total2))
    {
      return false;
    }
    else
    {
      return true;
    }*/
    return -1;
  } 

  public static function validarFechaPerContable($fecha)
  {
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $conta=ContabaPeer::doSelectOne($c);
    if ($conta)
    {
      if ($fec>=$conta->getFecini() && $fec<=$conta->getFeccie())
      {
        return false;
      }
      else
      {
        return true;
      }
    }

  }

    public static function validarFechaContable($fecha)
  {
    $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $conta=ContabaPeer::doSelectOne($c);
    if ($conta)
    {
      if ($fec<$conta->getFecini())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

  }

   public static function validarFechaMayorMenor($fecha1,$fecha2,$mayormenor)
  {
    $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
    $fec1 = $dateFormat->format($fecha1, 'i', $dateFormat->getInputPattern('d'));

    $dateFormat = new sfDateFormat(sfContext::getInstance()->getUser()->getCulture());
    $fec2 = $dateFormat->format($fecha2, 'i', $dateFormat->getInputPattern('d'));
    if ($mayormenor=='>')
    {
	  if ($fec1 > $fec2)
	  {
	    return true;
	  }
	  else
	  {
	    return false;
	  }
    }
    else if ($mayormenor=='<')
    {
      if ($fec1 < $fec2)
  {
    return true;
  }
  else
  {
    return false;
  }
    }
    else  if ($mayormenor=='>=')
    {
      if ($fec1 >= $fec2)
  {
    return true;
  }
  else
  {
    return false;
  }
    }
    else
    {
     if ($fec1 <= $fec2)
  {
    return true;
  }
  else
  {
    return false;
     }
    }

  }

  public static function salvarTesmovseglib($tsmovlib,$numcom,$grid)
  {
    if (!$tsmovlib->getId())
    {
      $tsmovlib->setNumcom($numcom);
      $tsmovlib->setCodcta($tsmovlib->getCtacon());
    }
    if (!$tsmovlib->getRefpag())
    {
      $tsmovlib->setRefpag("NULO");
    }
    if ($tsmovlib->getSavemovcero()=='S' && $tsmovlib->getMonmov()==0)
    {
       $tsmovlib->setStatus('N');
       $tsmovlib->setStacon('C');
    }else {
      $tsmovlib->setStatus('C');
      $tsmovlib->setStacon('N');
    }
    $tsmovlib->setStacon1('N');
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $tsmovlib->setLoguse($loguse);
    $tsmovlib->save();
    
    if ($tsmovlib->getRefrei()!='')
      self::salvarReintegro($tsmovlib,$grid);

  }

  public static function VerificarChequeCaducado($numcue,$fecemiche,$estatus)
  {
    $diasval=0;
    $c = new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$numcue);
    $datos=TsdefbanPeer::doSelectOne($c);
    if ($datos)
    {
      $diasval=$datos->getValche();
    }
    $fechacaducidad=Herramientas::dateAdd('d',$diasval,$fecemiche,'+');
    $fechaactual=date("Y-m-d");

    if ((strtotime($fechacaducidad)<=strtotime($fechaactual)) and $estatus=='C')
      return true;
    else
      return false;

  }

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

  public static function chequear_disponibilidad_financiera($banco='',$monto=0, $fechad='',$fechah='',&$saldo)
  {
    $saldo = Tesoreria::Monto_disponible_financiero($banco,$fechad,$fechah);
    $saldo=round($saldo,2);
    if(H::tofloat($saldo) < H::tofloat($monto)){
      return false;
    }else return true;
  }

  public static function Monto_disponible_financiero($banco,$fechad,$fechah)
  {
    $anterior=0;
    $deb=0;
    $cre=0;
    $contaba = ContabaPeer::doSelectOne(new Criteria());
    $fechah=date('Y-m-d');

    if($contaba){
      $fechainicio = $contaba->getFecini();
    }
    $c = new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$banco);
    $tsdefban = TsdefbanPeer::doSelectOne($c);
    if($tsdefban){
      $fecha = date('');
      $anterior=$tsdefban->getAntlib();
    }

    $sql = "SELECT COALESCE(  SUM(  case when A.DEBCRE='D' then B.MONMOV/COALESCE(B.VALMON,1) else 0 end),0) as debitos ,
     COALESCE( SUM(  case when A.DEBCRE='C' then B.MONMOV/COALESCE(B.VALMON,1) else 0 end),0) as creditos
    FROM TSTIPMOV A,TSMOVLIB B,TSDEFBAN c WHERE B.NUMCUE = '".$banco."' AND b.numcue = c.numcue and
    B.TIPMOV = A.CODTIP AND
    B.FECLib <= TO_DATE('".$fechah."','yyyy-MM-DD') AND
    B.FECLib >=TO_DATE('".$fechad."','yyyy-MM-DD')";
    //print $sql;
    if(Herramientas :: BuscarDatos($sql, $result)){
      $deb = $result[0]['debitos'];
      $cre = $result[0]['creditos'];
    }

  	return $anterior + $deb - $cre;
  }

  public static function salvarSalidasCajas($tssalcaj,$grid)
  {
    if (OrdendePago::agregaBenefi($tssalcaj)==true)
    {
      OrdendePago::grabarBenefi($tssalcaj);
    }
    self::generaSalida($tssalcaj,$grid);

    $var = H::getConfApp2('nomovlib', 'tesoreria', 'tesmovsalcaj');
    if($var!='S')
        self::Genera_MovLib($tssalcaj,$tssalcaj->getDessal(),$tssalcaj->getMonsal(),null,$tssalcaj->getRefsal(),null);
    
    self::Actualiza_BancosCaja($tssalcaj,"A","C",$tssalcaj->getMonsal(),$tssalcaj->getRefsal());
  }

  public static function generaSalida($tssalcaj,$grid)
  {
     if ($tssalcaj->getRefsal()=='####################')
     {
       $correlxcaja = H::getConfApp2('correlxcaja', 'tesoreria', 'tesmovsalcaj');
       if ($correlxcaja=='S'){     
         $a = new Criteria();
         $a->add(TsdefcajchiPeer::CODCAJ, $tssalcaj->getCodcaj());
         $resul1 = TsdefcajchiPeer::doSelectOne($a);
         if ($resul1) {
           $r=$resul1->getNumini();
         	 $encontrado=false;
           while (!$encontrado)
           {
            $numero=$tssalcaj->getCodcaj().'-'.str_pad($r, 16, '0', STR_PAD_LEFT);
            $c= new Criteria();
            $c->add(TssalcajPeer::REFSAL,$numero);
            $resul= TssalcajPeer::doSelectOne($c);
            if ($resul)
            {
            	$r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
           }

         $tssalcaj->setRefsal($numero);
         
         $resul1->setNumini($r);
         $resul1->save();
       }
      }else {
       if (Herramientas::getVerCorrelativo('numinicajchi','opdefemp',$r))
       {
           $encontrado=false;
           while (!$encontrado)
           {
            $numero=str_pad($r, 20, '0', STR_PAD_LEFT);
            $c= new Criteria();
            $c->add(TssalcajPeer::REFSAL,$numero);
            $resul= TssalcajPeer::doSelectOne($c);
            if ($resul)
            {
            $r=$r+1;
            }
            else
            {
              $encontrado=true;
            }
           }
           $tssalcaj->setRefsal($numero);
        }
        H::getSalvarCorrelativo('numinicajchi','opdefemp','Referencia',$r,$msg);
      }
    }
    else
    {
      $tssalcaj->setRefsal(str_replace('#','0',$tssalcaj->getRefsal()));
    }

    $tssalcaj->setStasal('P');
    $tssalcaj->save();
    self::generaDetalleSalida($tssalcaj,$grid);

  }

  public static function generaDetalleSalida($tssalcaj,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodart()!='')
      {
        $x[$j]->setRefsal($tssalcaj->getRefsal());
        $x[$j]->setStasal('P');
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

  public static function Genera_MovLib($tscheemi,$Descrip,$Monto,$Comprobante,$numche,$refpago='')
  {
    $result=array();
    $criterio = "Select * From TSMOVLIB Where NumCue = '".$tscheemi->getNumcue()."' AND RefLib = '".$numche."' And TipMov='".$tscheemi->getTipdoc()."'";
    if (!Herramientas::BuscarDatos($criterio,$result))
    {
      $tsmovlib = new Tsmovlib();
      $tsmovlib->setRefpag($refpago);
      $tsmovlib->setNumcue($tscheemi->getNumcue());
      $tsmovlib->setReflib($numche);
      $tsmovlib->setFeclib($tscheemi->getFecsal());
      $tsmovlib->setTipmov($tscheemi->getTipdoc());
      $tsmovlib->setDeslib($Descrip);
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
      $tsmovlib->setMonmov($Monto);
      $tsmovlib->setCodcta($CtaBan);
      $tsmovlib->setNumcom($Comprobante);
      $tsmovlib->setFeccom($tscheemi->getFecsal());
      $tsmovlib->setStatus("C");
      $tsmovlib->setStacon("N");
      $tsmovlib->setFecing(date("Y-m-d"));
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda2);
      $tsmovlib->setCodmon($moneda2);
      $tsmovlib->setValmon($valor);  
      $tsmovlib->save();
    }
    else
    {
      $mensaje="El Movimiento Según Libro ya ha Sido Grabado";
    }
  }

  public static function Actualiza_BancosCaja($tscheemi,$Accion,$DebCre,$Monto,$numche)
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
            $tsdefban->setNumche($numche);
          }
          else if ($Accion == "E")
          {
            $Debito = $tsdefban->getDeblib();
            $Total = $Debito - $Monto;
            $tsdefban->setDeblib($Total);
            $tsdefban->setNumche($numche);
          }
          $tsdefban->save();
         case "C":
           if ($Accion== "A")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito + $Monto;
             $tsdefban->setCrelib($Total);
             $nrocheque=intval($numche);
             if (is_numeric($nrocheque))
             {
              $nrocheques=$nrocheque+1;
              $nrocheque=str_pad($nrocheques,8,"0",STR_PAD_LEFT);
             }
             $tsdefban->setNumche($nrocheque);

           }
           if ($Accion== "E")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito - $Monto;
             $tsdefban->setCrelib($Total);
             $nrocheque=intval($numche);
             if (is_numeric($nrocheque))
             {
	           $nrocheques=$nrocheque-1;
	           $nrocheque=str_pad($nrocheques,8,"0",STR_PAD_LEFT);
             }
	         $tsdefban->setNumche($nrocheque);
           }

           $tsdefban->save();
      }//  switch($DebCre)
    }// if ($tsdefban)
  }

  public static function salvarRendicionCajaChica($opordpag,$grid,$numerocomp,$grid1)
  {
  	self::grabarOrden($opordpag,$numerocomp);
  	self::grabarDetalleOrden($opordpag,$grid);
  	self::grabarCausado($opordpag);
  	self::grabarImpcau($opordpag,$grid);
    self::grabarEventoCajChi($opordpag,$grid);

  	$x=$grid1[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=='1'){
          $a= new Criteria();
  	  $a->add(TssalcajPeer::REFSAL,$x[$j]->getRefsal());
  	  $data= TssalcajPeer::doSelectOne($a);
  	  if ($data)
  	  {
  	   $data->setStasal('R');
  	   $data->save();
  	  }
          }
          $j++;
        }

  }

  public static function grabarCausado($opordpag)
  {
    $cpcausad= new Cpcausad();
    $cpcausad->setRefcau($opordpag->getNumord());
    $cpcausad->setTipcau($opordpag->getTipcau());
    $cpcausad->setRefcom(null);
    $cpcausad->setTipcom(null);
    $cpcausad->setDescau($opordpag->getDesord());
    $cpcausad->setCedrif($opordpag->getCedrif());
    $cpcausad->setFeccau($opordpag->getFecemi());
    $cpcausad->setAnocau(substr($opordpag->getFecemi(),0,4));
    $cpcausad->setDesanu(null);
    $cpcausad->setMoncau($opordpag->getMonord());
    $cpcausad->setSalaju(0);
    $cpcausad->setSalpag(0);
    $cpcausad->setStacau('A');
    $cpcausad->save();
  }

  public static function grabarImpcau($opordpag,$grid)
  {
  	$referencia=$opordpag->getNumord();    
  	$g= new Criteria();
  	$g->add(CpimpcauPeer::REFCAU,$referencia);
  	CpimpcauPeer::doDelete($g);

    $arreglo=self::Arreglodet($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='' && $arreglo[$j]["moncau"]!=0)
      {
        $cpimpcau= new Cpimpcau();
        $cpimpcau->setRefcau($referencia);
        $cpimpcau->setCodpre($arreglo[$j]["codpre"]);
        $cpimpcau->setMonimp($arreglo[$j]["moncau"]);
        $cpimpcau->setMonaju(0);
        $cpimpcau->setMonpag(0);
        $cpimpcau->setStaimp('A');
        $cpimpcau->setRefere('NULO');
        $cpimpcau->setRefprc('NULO');
        $cpimpcau->save();
      }
      $j++;
    }
  }

  public static function validarDisponibilidadPresuCajChi($grid,$afecta,&$codigo)
  {
    $validardisponibilidad=true;
    $arreglo=self::Arreglodet($grid);
    $j=0;
    while ($j<count($arreglo))
    {
     $codigo=$arreglo[$j]["codpre"];
     if (!OrdendePago::montoValido($j,H::toFloat($arreglo[$j]["moncau"]),'N',$codigo,$afecta,$msj,$mondis,$sobregiro))
     {
      $validardisponibilidad=false;
      break;
     }
     $j++;
    }
    return $validardisponibilidad;
  }

  public static function grabarComprobante($opordpag,$grid,&$msjuno,&$arrcompro)
  {
    if ($opordpag->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numero);
          $resul= OpordpagPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }
    else
    {
      $numorden=str_replace('#','0',$opordpag->getNumord());
    }
     $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numcom= "OP".substr($numorden,2,6);
    }else $numcom= Comprobante::Buscar_Correlativo(date("d/m/Y",strtotime($opordpag->getFecemi())));
    
    $reftra=$numorden;
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

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      $codp=$x[$j]["codpre"];
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]["codpre"]);
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if(!is_null($regis->getCodcta()))
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=$x[$j]["moncau"];
            if ($moncau>0)
            {
              $codigocuenta=$regis2->getCodcta();
              $tipo='D';
              $des="";
              $moncau=$x[$j]["moncau"];
              $monto=$moncau;
           }
          }else { $msjuno='El Código Presupuestario'.$x[$j]["codpre"].' no tiene asociado Codigo Contable válido'; return true;}
        }else { $msjuno='El Código Presupuestario'.$x[$j]["codpre"].' no esta registrado'; return true;}
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

    $t= new Criteria();
    $t->add(TsdefcajchiPeer::CODCAJ,$opordpag->getCodcajchi());
    $reg= TsdefcajchiPeer::doSelectOne($t);
    if ($reg){
      $n= new Criteria();
      $n->add(OpbenefiPeer::CEDRIF,$reg->getCedrif());
      $resul= OpbenefiPeer::doSelectOne($n);
      if ($resul)
      {
        if (!is_null($resul->getCodcta())  && $resul->getCodcta()!='')
        {
         
         $b= new Criteria();
          //$b->add(ContabbPeer::CODCTA,$resul->getCodcta());
          $b->add(ContabbPeer::CODCTA,$opordpag->getCtapag());
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
             if ($opordpag->getMonord()>0)
            {
              //$codigocuenta2=$resul->getCodcta();
              $codigocuenta2=$opordpag->getCtapag();
              $tipo2='C';
              $des2="";
              $b=$opordpag->getMonord();
              $monto2=$b;
            }
          }else { $msjuno='El Cuenta Contable Asociada al Beneficiario no existe'; return true;}
        }else { $msjuno='El Beneficiario no tiene Cuenta Contable Asociada'; return true;}        
      }else { $msjuno='El Beneficiario no esta Registrado'; return true;}
    }else { $msjuno='El Caja no esta registrada'; return true;}

      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;


      $clscommpro=new Comprobante();
	  $clscommpro->setGrabar("N");
	  $clscommpro->setNumcom($numcom);
	  $clscommpro->setReftra($reftra);
	  $clscommpro->setFectra(date("d/m/Y",strtotime($opordpag->getFecemi())));
	  $clscommpro->setDestra($opordpag->getDesord());
	  $clscommpro->setCtas($cuentas);
	  $clscommpro->setDesc($descr);
	  $clscommpro->setMov($tipos);
	  $clscommpro->setMontos($montos);
	  $arrcompro[]=$clscommpro;
  }

  public static function grabarOrden($opordpag,$numerocomp)
  {
  	if ($opordpag->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numero);
          $resul= OpordpagPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $opordpag->setNumord($numero);
      }
     H::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,$msg);
    }
    else
    {
      $opordpag->setNumord(str_replace('#','0',$opordpag->getNumord()));
    }

    $b= new Criteria();
    $b->add(TsdefcajchiPeer::CODCAJ,$opordpag->getCodcajchi());
    $dat=TsdefcajchiPeer::doSelectOne($b);
    if ($dat)
    {
      $opordpag->setTipcau($dat->getTipcau());
      $opordpag->setCedrif($dat->getCedrif());
      $opordpag->setCodcat($dat->getCodcat());
      if ($dat->getCtapag()!='')
        $opordpag->setCtapag($dat->getCtapag());
      else
        $opordpag->setCtapag(H::getX_vacio('Cedrif','Opbenefi','Codcta',$opordpag->getCedrif()));
    }

    $opordpag->setMonret(0);
    $opordpag->setMondes(0);
    $opordpag->setNomben(H::getX_vacio('Cedrif','Opbenefi','Nomben',$opordpag->getCedrif()));
    $opordpag->setNumche(null);
    $opordpag->setCtaban(null);
    //$opordpag->setCtapag(H::getX_vacio('Cedrif','Opbenefi','Codcta',$opordpag->getCedrif()));
    $opordpag->setNumcom($numerocomp);
    $opordpag->setStatus('N');
    $moneda=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    $opordpag->setCodmon($moneda);
    $opordpag->setValmon($valor);
    $opordpag->save();
  }

  public static function posicion_en_el_grid($arreglo,$codigo)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["codpre"]==$codigo)
        { $enc=true; }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function Arreglodet($grid)
  {
  	$arreglodet=array();
  	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
  	    $pos=self::posicion_en_el_grid($arreglodet,$x[$j]["codpre"]);
        if ($pos==0)
        {
         $l=count($arreglodet)+1;
         $arreglodet[$l-1]["codpre"]=$x[$j]["codpre"];
         $arreglodet[$l-1]["moncau"]=$x[$j]["moncau"];
         $arreglodet[$l-1]["refsal"]=$x[$j]["refsal"];
        }
        else
        {
          $valor=H::toFloat($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=($valor+$x[$j]["moncau"]);
          $arreglodet[$pos-1]["refsal"]=$x[$j]["refsal"].",".$arreglodet[$pos-1]["refsal"];
        }

        $j++;
    }

    return $arreglodet;
  }

  public static function grabarDetalleOrden($opordpag,$grid)
  {
    $referencia=$opordpag->getNumord();
    $arreglo=self::Arreglodet($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='')
      {
        $opdetord= new Opdetord();
        $opdetord->setNumord($referencia);
        $opdetord->setRefcom('NULO');
        $opdetord->setCodpre($arreglo[$j]["codpre"]);
        $opdetord->setMoncau($arreglo[$j]["moncau"]);
        $opdetord->setRefsal($arreglo[$j]["refsal"]);
        $opdetord->setMonret(0);
        $opdetord->setMondes(0);
        $opdetord->save();
      }
      $j++;
    }
  }

  public static function validaPeriodoCerrado($fecha)
  {
    $fec = H::toDateUS($fecha);

    $c= new Criteria();
    $c->add(Contaba1Peer::FECDES,$fec,Criteria::LESS_EQUAL);
    $c->add(Contaba1Peer::FECHAS,$fec,Criteria::GREATER_EQUAL);
    $c->add(Contaba1Peer::STATUS,'A');
    $conta1=Contaba1Peer::doSelectOne($c);
    if ($conta1)
    {
      return false;
    }else
    {return true;}
  }

  public static function validaPeriodoCerradoBanco($fecha,$numcue='')
  {
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
    $mes = substr($fec,5,2);
    $ano = substr($fec,0,4);

    $c= new Criteria();
    $c->add(TsconcilhisPeer::MESCON,$mes);
    $c->add(TsconcilhisPeer::NUMCUE,$numcue);
    $c->add(TsconcilhisPeer::ANOCON,$ano);
    $conta1=TsconcilhisPeer::doSelect($c);
    if ($conta1)
    {
      return false;
    }else
    {
      $c1= new Criteria();
      $c1->add(TsconcilPeer::MESCON,$mes);
      $c1->add(TsconcilPeer::NUMCUE,$numcue);
      $c1->add(TsconcilPeer::ANOCON,$ano);
      $conta2=TsconcilPeer::doSelect($c1);
      if ($conta2)
      {
        return false;
      }else {
          $t= new Criteria();
          $t->add(TsccilnmovPeer::NUMCUE,$numcue);
          $t->add(TsccilnmovPeer::MESCON,$mes);
          $t->add(TsccilnmovPeer::ANOCON,$ano);
          $dat= TsccilnmovPeer::doSelectOne($t);
          if ($dat) {
              if ($dat->getStatus()=='A')
                return true;
              else
                return false;
          }
              else
                return true;
        }
        
     }
  }


  public static function salvarRelaciones($tsrelasiord,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCtagasxpag()!='' && $x[$j]->getCtaordxpag()!='')
      {
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

  public static function saveTesconmovban($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      if ($x[$j]->getCheck()=='1')
      {
      	$x[$j]->setStacon('C');
      	$x[$j]->setStacon1('C');
        $x[$j]->save();
      }
      $j++;
    }
	return -1;
  }


  public static function saveTesconmovlib($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      if ($x[$j]->getCheck()=='1')
      {
      	$x[$j]->setStacon('C');
      	$x[$j]->setStacon1('C');
        $x[$j]->save();
      }
      $j++;
    }
	return -1;
  }

  public static function saveTesdesconmovlib($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      if ($x[$j]->getCheck()=='1')
      {
      	$x[$j]->setStacon('N');
      	$x[$j]->setStacon1('N');
        $x[$j]->save();
      }
      $j++;
    }
	return -1;
  }

  public static function saveTesdesconmovban($clasemodelo,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {

      if ($x[$j]->getCheck()=='1')
      {
      	$x[$j]->setStacon('N');
      	$x[$j]->setStacon1('N');
        $x[$j]->save();
      }
      $j++;
    }
	return -1;
  }

  public static function MigrarMovimientosBancarios($tspararc,&$total,&$rechazado)
  {
    $val=-1;
    if ($file = fopen(sfConfig::get('sf_upload_dir')."//".$tspararc->getArchivo(),  "r")) {
    $i=0;
    $total=0;
    $rechazado=0;
    $t= new Criteria();
    $t->add(TspararcPeer::NUMCUE,$tspararc->getNumcue());
    $regis= TspararcPeer::doSelectOne($t);
    if ($regis)
    {
	  while(!feof($file)) {
	    $cuenta=fgets($file, 255);
            if (trim($cuenta)!='' && trim($cuenta)!='/n'){
                if ($regis->getInicue()>0)
                $numcue= trim(substr($cuenta,$regis->getInicue()-1,$regis->getFincue()));
                else $numcue= $regis->getNumcue();

                $ref= trim(substr($cuenta,$regis->getIniref()-1,$regis->getFinref()));

                $fecha= trim(substr($cuenta,$regis->getInifec()-1,$regis->getFinfec()));
                if ($regis->getForfec()=='dd/mm/yyyy' || $regis->getForfec()=='DD/MM/YYYY')    {
		    $dateFormat = new sfDateFormat('es_VE');
                    $fec1 = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
                }else if ($regis->getForfec()=='yyyy-mm-dd' || $regis->getForfec()=='YYYY-MM-DD') {
                    $fec1=$fecha;
                }
                $signomonto=substr(trim(substr($cuenta,$regis->getInimon()-1,$regis->getFinmon())),0,1);
                $mes=substr($fec1,5,2);
                $sql="select refban from tsmovban where numcue='".$numcue."' and refban='".$ref."'and to_char(fecban,'MM')='".$mes."'";
                if (Herramientas::BuscarDatos($sql,$resul))
                {                    
                    $correl="";
                    $campo="";
                    $a= new Criteria();
                    $a->add(TscormestxtPeer::NUMCUE,$numcue);
                    $reg=TscormestxtPeer::doSelectOne($a);
                    if ($reg)
                    {   $ames=intval($mes);
                        eval('$correl=$reg->getCormes'.$ames.'();');
                        eval('$campo="cormes'.$ames.'";');
                    
                     $formato = date('ym');
                     $longitud='4';
                     $encontrado=false;
                     while (!$encontrado)
                     {
                      $numero=$formato.str_pad((string)$correl, $longitud, "0", STR_PAD_LEFT);
                      $sql="select refban from tsmovban where numcue='".$numcue."' and refban='".$numero."'and to_char(fecban,'MM')='".$mes."'";
                      if (Herramientas::BuscarDatos($sql,$result))
                      {
                        $correl=$correl+1;
                      }
                      else
                      {
                        $encontrado=true;
                      }
                     }
                     $referencia=$numero;

                     eval('$reg->set'.ucfirst(strtolower($campo)).'('.$correl.');');
                     eval('$reg->save();');
                     
                    }
                }else
                {
                    if ($signomonto=='-')
                      $referencia=substr($ref,($regis->getDigsign()*-1));
                    else $referencia=substr($ref,($regis->getDigsigp()*-1));
                }                
                if ($regis->getFintip()>0)
                {
                   $tipo= trim(substr($cuenta,$regis->getInitip()-1,$regis->getFintip()));
                }else {
                    if ($signomonto=='-')
                      $tipo=$regis->getValdefn();
                    else $tipo=$regis->getValdefp();
                }

                if ($regis->getFindes()>0)
		   $descrip= trim(substr($cuenta,$regis->getInides()-1,$regis->getFindes()));
                else 
                   $descrip= $regis->getValdefd();
                
             $valormon=trim(substr($cuenta,$regis->getInimon()-1,$regis->getFinmon()));
             if ($signomonto=='-')
               $montor=substr($valormon,1,strlen($valormon));
             else $montor=$valormon;
             if (is_numeric(H::toFloat($montor)))
             {
               $monto=H::toFloat($montor);
             }else $monto=0;

                $d= new Criteria();
                $d->add(TsmovbanPeer::NUMCUE, $tspararc->getNumcue());
                $d->add(TsmovbanPeer::REFBAN, $referencia);
                $d->add(TsmovbanPeer::TIPMOV, $tipo);
                $reg1= TsmovbanPeer::doSelectOne($d);
                if (!$reg1)
                {
                        $tsmovban = new Tsmovban();
                        $tsmovban->setNumcue($tspararc->getNumcue());
                        $tsmovban->setCodcta(H::getX_Vacio('Numcue','Tsdefban','Codcta',$tspararc->getNumcue()));
                        $tsmovban->setRefban($referencia);
                        $tsmovban->setFecban($fec1);
                        $tsmovban->setTipmov($tipo);
                        $tsmovban->setDesban($descrip);
                        $tsmovban->setMonmov($monto);
                        $tsmovban->setStatus('C');
                        $tsmovban->setStacon('N');
                        $tsmovban->save();
                }else{
                  $rechazado= $rechazado + 1;
                }
		$total= $total + 1;
	    }
	  $i++;
    }

    if ($total==$rechazado)
    {
      $val=-1;
    }else{
      $val=-1;
      if ($rechazado>0)
      {
      	$val=-1;
      }
    }
    }
    fclose ($file);
    unlink(sfConfig::get('sf_upload_dir')."//".$tspararc->getArchivo());
  }else
  {
  	$val=541;
  }
  return $val;
  }

  public static function generaComprobanteAutomatico($objeto, $tipmovdesd, $tipmovhast,&$correl2)
  {
        $correl2=Comprobante::Buscar_Correlativo($objeto->getFectra());
	    $contabc = new Contabc();
	    $contabc->setNumcom($correl2);
	    $contabc->setReftra($objeto->getReftra());
	    $contabc->setFeccom($objeto->getFectra());
	    $contabc->setDescom($objeto->getDestra());
	    $contabc->setStacom('D');
	    $contabc->setTipcom(null);
	    $contabc->setMoncom($objeto->getMontra());
	    $contabc->save();

        $contabc1= new Contabc1();
        $contabc1->setNumcom($correl2);
        $contabc1->setFeccom($objeto->getFectra());
        $ctades=H::getX('numcue','Tsdefban','Codcta',$objeto->getCtades());
        $contabc1->setCodcta($ctades);
        $contabc1->setNumasi(1);
        $contabc1->setRefasi($objeto->getReftra());
        $contabc1->setDesasi(H::getX('codcta','Contabb','Descta',$ctades));
       	$contabc1->setDebcre('D');
       	$contabc1->setMonasi($objeto->getMontra());
        $contabc1->save();

        $contabc1= new Contabc1();
        $contabc1->setNumcom($correl2);
        $contabc1->setFeccom($objeto->getFectra());
        $ctahas=H::getX('numcue','Tsdefban','Codcta',$objeto->getCtaori());
        $contabc1->setCodcta($ctahas);
        $contabc1->setNumasi(2);
        $contabc1->setRefasi($objeto->getReftra());
        $contabc1->setDesasi(H::getX('codcta','Contabb','Descta',$ctahas));
       	$contabc1->setDebcre('C');
       	$contabc1->setMonasi($objeto->getMontra());
        $contabc1->save();

  }

  public static function FormarArreImp($cadenasal)
  {
    $arregloimp=array();
    $j=0;
    $arre=split('/',$cadenasal);
    $ind=count($arre)-1;
    $p=1;
    while ($p<=$ind)
    {
      $sql = "Select A.Codcat||'-'||B.CodPar as codpre,Sum(A.MonSal) as moncau, A.refsal as refsal, '' as id From TSDetSal A,CARegArt B Where A.RefSal='".$arre[$p]."' And A.CodArt=B.CodArt Group By A.Codcat,B.CodPar,A.refsal";
      if (Herramientas :: BuscarDatos($sql, $reg)){      
         $i=0;
         while ($i<count($reg)) {
          $j=count($arregloimp)+1;
          $arregloimp[$j-1]["codpre"]=$reg[$i]["codpre"];
          $arregloimp[$j-1]["moncau"]=number_format($reg[$i]["moncau"],2,',','.');
          $arregloimp[$j-1]["refsal"]=$reg[$i]["refsal"];
          $arregloimp[$j-1]["id"]=$reg[$i]["id"];
          $i++;
         }
      }
      $p++;
    }
    return $arregloimp;
  }

  public static function grabarCompAnulacionMovLibAnoANt($numcue,$reflib,$tipmov,$fecanu,&$msjuno,&$arrcompro)
  {
    $msjuno="";
    $c= new Criteria();
    $c->add(TsmovlibPeer::NUMCUE,$numcue);
    $c->add(TsmovlibPeer::REFLIB,$reflib);
    $c->add(TsmovlibPeer::TIPMOV,$tipmov);
    $resul= TsmovlibPeer::doSelectOne($c);
    if ($resul){

    $reftra="A".substr($reflib,1,7);
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numerocomprob= $reftra;
    }else $numerocomprob= '########';


    $codigocuenta=""; $tipo=""; $des=""; $monto=""; $codigocuentas=""; $tipo1=""; $desc=""; $monto1=""; $codigocuenta2=""; $tipo2=""; $des2=""; $monto2="";
    $cuentas=""; $tipos=""; $montos=""; $descr=""; $msjuno="";

    $d= new Criteria();
    $d->add(TstipmovPeer::CODTIP,$tipmov);
    $dato= TstipmovPeer::doSelectOne($d);
    if ($dato)
    {
        $afecta=$dato->getDebcre();
    }

        if ($afecta=='D')
        {
            $codigocuenta=H::getX('NUMCUE','Tsdefban','Codcta',$numcue);
            $tipo='C';
            $des="";
            $monto=$resul->getMonmov();
        }else{
            $codigocuenta=H::getX('NUMCUE','Tsdefban','Codcta',$numcue);
            $tipo='D';
            $des="";
            $monto=$resul->getMonmov();
        }
    
        $r= new Criteria();
        $r->add(OpordchePeer::NUMCHE,$reflib);
        $r->add(OpordchePeer::CODCTA,$numcue);
        $r->add(OpordchePeer::TIPMOV,$tipmov);
        $regs=  OpordchePeer::doSelectOne($r);
        if ($regs)
        {
            $codigocuenta2=H::getX_vacio('NUMORD', 'Opordpag', 'Ctapag', $regs->getNumord());
           if ($afecta=='D')
               $tipo2='D';
           else
               $tipo2='C';           
            $des2="";
            $monto2=$resul->getMonmov();
        }    

        $cuentas=$codigocuenta2.'_'.$codigocuenta;
        $tipos=$tipo2.'_'.$tipo;
        $descr=$des2.'_'.$des;
        $montos=$monto2.'_'.$monto;

        $clscommpro=new Comprobante();
        $clscommpro->setGrabar("N");
        $clscommpro->setNumcom($numerocomprob);
        $clscommpro->setReftra($reftra);
        $clscommpro->setFectra($fecanu);
        $clscommpro->setDestra($resul->getDeslib());
        $clscommpro->setCtas($cuentas);
        $clscommpro->setDesc($descr);
        $clscommpro->setMov($tipos);
        $clscommpro->setMontos($montos);
        $arrcompro[]=$clscommpro;
    }

    return true;
  }

public static function reversarMovSegLib($clasemodelo)
{
  $t= new Criteria();
  $t->add(TsmovlibPeer::NUMCUE,$clasemodelo->getNumcue());
  $t->add(TsmovlibPeer::REFLIB,$clasemodelo->getReflib());
  $t->add(TsmovlibPeer::TIPMOV,$clasemodelo->getCodtip());
  $result=TsmovlibPeer::doSelectOne($t);
  if ($result)
  {
    $g= new Criteria();
    $g->add(TsmovlibPeer::NUMCUE,$clasemodelo->getNumcue());
    $g->add(TsmovlibPeer::REFLIBPAD,$clasemodelo->getReflib());
    $g->add(TsmovlibPeer::TIPMOVPAD,$clasemodelo->getCodtip());
    $result2=TsmovlibPeer::doSelectOne($g);
    if ($result2)
    {
        $escheque=H::getX('CODTIP','Tstipmov','Escheque',$result->getTipmov());
        if ($escheque==1)
        {
            $c = new Criteria();
            $c->add(TscheemiPeer :: NUMCUE, $result->getNumcue());
            $c->add(TscheemiPeer :: NUMCHE, $result->getReflib());
            $tscheemi = TscheemiPeer :: doSelectOne($c);
            if ($tscheemi)
            {
             $tscheemi->setStatus('C');
             $tscheemi->save();
            }

            $c = new Criteria();
            $c->add(CpimppagPeer :: REFPAG, $result->getRefpag());
            $cpimppag = CpimppagPeer :: doSelect($c);
            foreach($cpimppag as $imppag){
             $imppag->setStaimp('A');
             $imppag->save();
            }

            
        }else{
            $e= new Criteria();
            $e->add(CpdocpagPeer::TIPPAG,$result->getTipmov());
            $result3=CpdocpagPeer::doSelectOne($e);
            if ($result3)
            {
              if ($result3->getRefier()=='A')
              {
                $c = new Criteria();
                $c->add(CpimppagPeer :: REFPAG, $result->getRefpag());
                $cpimppag = CpimppagPeer :: doSelect($c);
                foreach($cpimppag as $imppag){
                 $imppag->setStaimp('A');
                 $imppag->save();
                }
              }else {
                $c = new Criteria();
                $c->add(CpimppagPeer :: REFPAG, $result->getRefpag());
                $cpimppag = CpimppagPeer :: doSelect($c);
                foreach($cpimppag as $imppag){
                 $imppag->setStaimp('A');
                 $imppag->save();
                }
              }
                    
            }
        }

        $c = new Criteria();
        $c->add(Contabc1Peer::NUMCOM,$result2->getNumcom());
        Contabc1Peer::doDelete($c);

        $c = new Criteria();
        $c->add(ContabcPeer::NUMCOM,$result2->getNumcom());
        ContabcPeer::doDelete($c);
   
        $result2->delete();

    }else return 1511;
    
  }else{
    return 1510;
  }
  return -1;
}

	public static function hacer_ConciliablesMig($nro, $mes, $ano, $fechas) {
    $sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
            A.TipMov as tipmov1, B.TipMov as tipmov2, A.DesLib as deslib, B.DesBan as desban,
            A.MonMov as monmov1, B.MonMov as monmov2
                   From TsMovLib A, TsMovBan B
                  Where A.RefLib = B.RefBan And
                    A.MonMov = B.MonMov And
                    A.NumCue = '" . $nro . "' And
            B.NumCue = '" . $nro . "' And
                     A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     A.StaCon='N' And B.StaCon='N' AND
                     A.Status='C' And B.Status='C'";
  //A.tipmov=b.tipmov and
    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tstemigu) {
        $tsconcil = new Tsconcil();
        $tsconcil->setNumcue($nro);
        $tsconcil->setMescon($mes);
        $tsconcil->setAnocon($ano);
        $tsconcil->setRefere($tstemigu["reflib"]);
        $tsconcil->setMovlib($tstemigu["tipmov1"]);
        $tsconcil->setMovban($tstemigu["tipmov2"]);
        $tsconcil->setFeclib($tstemigu["feclib"]);
        $tsconcil->setFecban($tstemigu["fecban"]);
        $tsconcil->setDesref($tstemigu["deslib"]);
        $tsconcil->setMonlib($tstemigu["monmov1"]);
        $tsconcil->setMonban($tstemigu["monmov2"]);
        $tsconcil->setResult('CONCILIADO');
        $tsconcil->save();

        Tesoreria :: actualizar_Status($nro, $tstemigu["reflib"], 'C',$tstemigu["tipmov1"]);
}
    }

  }

   public static function hacer_Libro_No_BancoMig($nro, $mes, $ano, $fechas) {
    $sql = "Select reflib,tipmov,feclib,deslib,monmov From TsMovLib
                  Where NumCue = '" . $nro . "' And
                    FecLib<= To_Date('" . $fechas . "','DD/MM/YYYY') And Status = 'C' And StaCon='N' ";

    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tsmovlib) {
        $sql2 = "SELECT REFBAN From TSMOVBAN
                         WHERE NUMCUE= '" . $nro . "' And
                            RefBan ='" . $tsmovlib["reflib"] . "' And
                            FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY')";
        //Tipmov ='" . $tsmovlib["tipmov"] . "' And
        if  (!Herramientas :: BuscarDatos($sql2, $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tsmovlib["reflib"]);
          $tsconcil->setMovlib($tsmovlib["tipmov"]);
          $tsconcil->setMovban(null);
          $tsconcil->setFeclib($tsmovlib["feclib"]);
          $tsconcil->setFecban(null);
          $tsconcil->setDesref($tsmovlib["deslib"]);
          $tsconcil->setMonlib($tsmovlib["monmov"]);
          $tsconcil->setMonban(0);
          $tsconcil->setResult('MOVIMIENTO EN TRANSITO');
          $tsconcil->save();

          $fec=explode('/',$fechas);
          $fecfin=$fec[2]."-".$fec[1]."-".$fec[0];

          $c = new Criteria();
          $c->add(TsmovlibPeer :: NUMCUE, $nro);
          $c->add(TsmovlibPeer :: FECLIB, $fecfin);
          $c->add(TsmovlibPeer :: STATUS, 'C');
          $c->add(TsmovlibPeer :: STACON, 'N');
          $tsmovlib2 = TsmovlibPeer :: doSelectOne($c);
          if ($tsmovlib2) {
          	//foreach ($tsmovlib2 as $lib2) {
            $tsmovlib2->setStacon('N');
            $tsmovlib2->save();
          	//}
          }
        }

      }
    }
  }

  public static function hacer_Banco_No_LibroMig($nro, $mes, $ano, $fechas) {
    $sql = "Select refban, tipmov, fecban, desban, monmov
                    From TsMovBan
                  Where NumCue = '" . $nro . "' And
                    FecBan<= To_Date('" . $fechas . "','DD/MM/YYYY') And STATUS='C' And StaCon='N'";
    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tsmovban) {
        $sql2 = "SELECT * From TSMOVLIB
                             WHERE NUMCUE = '" . $nro . "' And
                             RefLib = '" . $tsmovban["refban"] . "' And
                             FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY')";
         //Tipmov = '" . $tsmovban["tipmov"] . "' And
        if (!Herramientas :: BuscarDatos($sql2, $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tsmovban["refban"]);
          $tsconcil->setMovlib(null);
          $tsconcil->setMovban($tsmovban["tipmov"]);
          $tsconcil->setFeclib(null);
          $tsconcil->setFecban($tsmovban["fecban"]);
          $tsconcil->setDesref($tsmovban["desban"]);
          $tsconcil->setMonlib(0);
          $tsconcil->setMonban($tsmovban["monmov"]);
          $tsconcil->setResult('MOVIMIENTO NO REGISTRADO EN LIBROS');
          $tsconcil->save();

          //$dateFormat = new sfDateFormat($this->getUser()->getCulture());
          //$fechas = $dateFormat->format($fechas, 'i', $dateFormat->getInputPattern('d'));

          $fec=explode('/',$fechas);
          $fecfin=$fec[2]."-".$fec[1]."-".$fec[0];

          $c = new Criteria();
          $c->add(TsmovbanPeer :: NUMCUE, $nro);
          $c->add(TsmovbanPeer :: FECBAN, $fecfin);
          $c->add(TsmovbanPeer :: STATUS, 'C');
          $c->add(TsmovbanPeer :: STACON, 'N');
          $tsmovban2 = TsmovbanPeer :: doSelectOne($c);
          if ($tsmovban2) {
          	//foreach ($tsmovban2 as $ban2) {
            $tsmovban2->setStacon('N');
            $tsmovban2->save();
          	//}
          }
        }

      }
    }
  }

  public static function hacer_No_ConciliablesMig($nro, $mes, $ano, $fechas) {
	$sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
          A.TipMov as movlib, B.TipMov as movban, A.DesLib as deslib, B.DesBan as desban,
          A.MonMov as monmov1, B.MonMov as monmov2
                From TsMovLib A, TsMovBan B
                Where
                A.NumCue = '" . $nro . "' And
                B.NumCue = '" . $nro . "' And
          A.RefLib = B.RefBan And
                A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                A.MonMov <> B.MonMov and A.stacon='N'";
  //A.TipMov=B.TipMov And
    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tstemigu) {
        $sql2 = "Select * From TSconcil Where
                        NumCue = '" . $nro . "' And
                        Refere = '" . $tstemigu["reflib"] . "' And
                        Refere = '" . $tstemigu["refban"] . "' And
                        FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        movlib='" . $tstemigu["movlib"] . "'  and
                        Result like 'CONCILIADO%'";

        if (!Herramientas :: BuscarDatos($sql2, $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tstemigu["reflib"]);
          $tsconcil->setMovlib($tstemigu["movlib"]);
          $tsconcil->setMovban($tstemigu["movban"]);
          $tsconcil->setFeclib($tstemigu["feclib"]);
          $tsconcil->setFecban($tstemigu["fecban"]);
          $tsconcil->setDesref($tstemigu["deslib"]);
          $tsconcil->setMonlib($tstemigu["monmov1"]);
          $tsconcil->setMonban($tstemigu["monmov2"]);
          $tsconcil->setResult('ERROR EN CONCILIACION (MONTOS DIFERENTES)');
          $tsconcil->save();
        }

      }
    }
  }

  public static function salvarSalidaFondosAnticipo($tsfonant,$grid)
  {
    if (OrdendePago::agregaBenefi($tsfonant)==true)
    {
      OrdendePago::grabarBenefi($tsfonant);
}
    self::generaSalidaFonAnt($tsfonant,$grid);

    //self::Genera_MovLibF($tsfonant,$tsfonant->getDesfon(),$tsfonant->getMonfon(),null,$tsfonant->getReffon(),null);
    //self::Actualiza_BancosCaja($tsfonant,"A","C",$tsfonant->getMonfon(),$tsfonant->getReffon());
  }

  public static function generaSalidaFonAnt($tsfonant,$grid)
  {
     if ($tsfonant->getReffon()=='########')
     {
       $r=((H::getX('CODFON', 'Tsdeffonant', 'numini', $tsfonant->getCodfon()))+1);
        $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(TsfonantPeer::REFFON,$numero);
          $resul= TsfonantPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $tsfonant->setReffon($numero);
        $t= new Criteria();
        $t->add(TsdeffonantPeer::CODFON,$tsfonant->getCodfon());
        $reg= TsdeffonantPeer::doSelectOne($t);
        if ($reg)
        {
            $reg->setNumini($r);
            $reg->save();
        }
    }
    else
    {
      $tsfonant->setReffon(str_replace('#','0',$tsfonant->getReffon()));
    }

    $tsfonant->setStafon('P');
    $tsfonant->save();
    self::generaDetalleSalidaF($tsfonant,$grid);
  }

  public static function generaDetalleSalidaF($tsfonant,$grid)
  {
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCodart()!='')
      {
        $x[$j]->setReffon($tsfonant->getReffon());
        $x[$j]->setStafon('P');
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

  public static function Genera_MovLibF($tscheemi,$Descrip,$Monto,$Comprobante,$numche,$refpago='')
  {
    $result=array();
    $criterio = "Select * From TSMOVLIB Where NumCue = '".$tscheemi->getNumcue()."' AND RefLib = '".$numche."' And TipMov='".$tscheemi->getTipdoc()."'";
    if (!Herramientas::BuscarDatos($criterio,$result))
    {
      $tsmovlib = new Tsmovlib();
      $tsmovlib->setRefpag($refpago);
      $tsmovlib->setNumcue($tscheemi->getNumcue());
      $tsmovlib->setReflib($numche);
      $tsmovlib->setFeclib($tscheemi->getFecfon());
      $tsmovlib->setTipmov($tscheemi->getTipdoc());
      $tsmovlib->setDeslib($Descrip);
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tscheemi->getNumcue());
      $tsmovlib->setMonmov($Monto);
      $tsmovlib->setCodcta($CtaBan);
      $tsmovlib->setNumcom($Comprobante);
      $tsmovlib->setFeccom($tscheemi->getFecfon());
      $tsmovlib->setStatus("C");
      $tsmovlib->setStacon("N");
      $tsmovlib->setFecing(date("Y-m-d"));
      $tsmovlib->save();
    }
    else
    {
      $mensaje="El Movimiento Según Libro ya ha Sido Grabado";
    }
  }

  public static function FormarArreImpF($cadenasal)
  {
    $arregloimp=array();
    $j=0;
    $arre=split('/',$cadenasal);
    $ind=count($arre)-1;
    $p=1;
    while ($p<=$ind)
    {
      $sql = "Select A.Codcat||'-'||B.CodPar as codpre,Sum(A.Monfon) as moncau, A.reffon as reffon, '' as id From TSDetfon A,CARegArt B Where A.Reffon='".$arre[$p]."' And A.CodArt=B.CodArt Group By A.Codcat,B.CodPar,A.reffon";
      if (Herramientas :: BuscarDatos($sql, $reg)){
         $i=0;
         while ($i<count($reg)) {
          $j=count($arregloimp)+1;
          $arregloimp[$j-1]["codpre"]=$reg[$i]["codpre"];
          $arregloimp[$j-1]["moncau"]=number_format($reg[$i]["moncau"],2,',','.');
          $arregloimp[$j-1]["reffon"]=$reg[$i]["reffon"];
          $arregloimp[$j-1]["id"]=$reg[$i]["id"];
          $i++;
         }
      }
      $p++;
    }
    return $arregloimp;
  }

   public static function ArreglodetF($grid)
  {
  	$arreglodet=array();
  	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
  	    $pos=self::posicion_en_el_grid($arreglodet,$x[$j]["codpre"]);
        if ($pos==0)
        {
         $l=count($arreglodet)+1;
         $arreglodet[$l-1]["codpre"]=$x[$j]["codpre"];
         $arreglodet[$l-1]["moncau"]=$x[$j]["moncau"];
         $arreglodet[$l-1]["reffon"]=$x[$j]["reffon"];
        }
        else
        {
          $valor=H::toFloat($arreglodet[$pos-1]["moncau"]);
          $arreglodet[$pos-1]["moncau"]=($valor+$x[$j]["moncau"]);
          $arreglodet[$pos-1]["reffon"]=$x[$j]["reffon"].",".$arreglodet[$pos-1]["reffon"];
        }

        $j++;
    }

    return $arreglodet;
  }

  public static function validarDisponibilidadPresuFonAnt($grid,$afecta,&$codigo)
  {
    $validardisponibilidad=true;
    $arreglo=self::ArreglodetF($grid);
    $j=0;
    while ($j<count($arreglo))
    {
     $codigo=$arreglo[$j]["codpre"];
     if (!OrdendePago::montoValido($j,H::toFloat($arreglo[$j]["moncau"]),'N',$codigo,$afecta,$msj,$mondis,$sobregiro))
     {
      $validardisponibilidad=false;
      break;
     }
     $j++;
    }
    return $validardisponibilidad;
  }

  public static function grabarComprobanteF($opordpag,$grid,&$msjuno,&$arrcompro)
  {
    if ($opordpag->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numero);
          $resul= OpordpagPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }
    else
    {
      $numorden=str_replace('#','0',$opordpag->getNumord());
    }
     $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numcom= "OP".substr($numorden,2,6);
    }else $numcom= Comprobante::Buscar_Correlativo(date("d/m/Y",strtotime($opordpag->getFecemi())));

    $reftra=$numorden;
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

    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$x[$j]["codpre"]);
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if(!is_null($regis->getCodcta()))
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=$x[$j]["moncau"];
            if ($moncau>0)
            {
              $codigocuenta=$regis2->getCodcta();
              $tipo='D';
              $des="";
              $moncau=$x[$j]["moncau"];
              $monto=$moncau;
           }
          }else { $msjuno='El Código Presupuestario'.$x[$j]["codpre"].' no tiene asociado Codigo Contable válido'; return true;}
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

    $t= new Criteria();
    $t->add(TsdeffonantPeer::CODFON,$opordpag->getCodfonant());
    $reg= TsdeffonantPeer::doSelectOne($t);
    if ($reg){

      $n= new Criteria();
      $n->add(OpbenefiPeer::CEDRIF,$reg->getCedrif());
      $resul= OpbenefiPeer::doSelectOne($n);
      if ($resul)
      {
        if (!is_null($resul->getCodcta())  && $resul->getCodcta()!='')
        {
         $codigocuenta2=$resul->getCodcta();
         if ($opordpag->getMonord()>0)
        {
          $tipo2='C';
          $des2="";
          $b=$opordpag->getMonord();
          $monto2=$b;
        }
        }else {$codigocuenta2="";
             $tipo2="";
          $des2="";
          $b="0,00";
          $monto2=$b;
        }
      }
    }else{
        $codigocuenta2="";
             $tipo2="";
          $des2="";
          $b="0,00";
          $monto2=$b;
    }
      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;


      $clscommpro=new Comprobante();
	  $clscommpro->setGrabar("N");
	  $clscommpro->setNumcom($numcom);
	  $clscommpro->setReftra($reftra);
	  $clscommpro->setFectra(date("d/m/Y",strtotime($opordpag->getFecemi())));
	  $clscommpro->setDestra($opordpag->getDesord());
	  $clscommpro->setCtas($cuentas);
	  $clscommpro->setDesc($descr);
	  $clscommpro->setMov($tipos);
	  $clscommpro->setMontos($montos);
	  $arrcompro[]=$clscommpro;
  }

public static function salvarReposicionFondosAnticipo($opordpag,$grid,$numerocomp,$grid1)
  {
  	self::grabarOrdenF($opordpag,$numerocomp);
  	self::grabarDetalleOrdenF($opordpag,$grid);
  	self::grabarCausado($opordpag);
  	self::grabarImpcauF($opordpag,$grid);

  	$x=$grid1[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=='1'){
          $a= new Criteria();
  	  $a->add(TsfonantPeer::REFFON,$x[$j]->getReffon());
  	  $data= TsfonantPeer::doSelectOne($a);
  	  if ($data)
  	  {
  	   $data->setStafon('R');
  	   $data->save();
  	  }
          }
          $j++;
        }
  }

public static function grabarOrdenF($opordpag,$numerocomp)
  {
  	if ($opordpag->getNumord()=='########')
    {
       if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
       {
       	 $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpordpagPeer::NUMORD,$numero);
          $resul= OpordpagPeer::doSelectOne($c);
          if ($resul)
          {
          	$r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $opordpag->setNumord($numero);
      }
     H::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,$msg);
    }
    else
    {
      $opordpag->setNumord(str_replace('#','0',$opordpag->getNumord()));
    }

    $b= new Criteria();
    $b->add(TsdeffonantPeer::CODFON,$opordpag->getCodfonant());
    $dat=TsdeffonantPeer::doSelectOne($b);
    if ($dat)
    {
      $opordpag->setTipcau($dat->getTipmovren());
      $opordpag->setCedrif($dat->getCedrif());
      $opordpag->setCodcat($dat->getCodcat());
    }

    $opordpag->setMonret(0);
    $opordpag->setMondes(0);
    $opordpag->setNomben(H::getX_vacio('Cedrif','Opbenefi','Nomben',$opordpag->getCedrif()));
    $opordpag->setNumche(null);
    $opordpag->setCtaban(null);
    $opordpag->setCtapag(H::getX_vacio('Cedrif','Opbenefi','Codcta',$opordpag->getCedrif()));
    $opordpag->setNumcom($numerocomp);
    $opordpag->setStatus('N');
    $moneda=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
    $opordpag->setCodmon($moneda);
    $opordpag->setValmon($valor);
    $opordpag->save();
  }

  public static function grabarDetalleOrdenF($opordpag,$grid)
  {
    $referencia=$opordpag->getNumord();
    $arreglo=self::ArreglodetF($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='')
      {
        $opdetord= new Opdetord();
        $opdetord->setNumord($referencia);
        $opdetord->setRefcom('NULO');
        $opdetord->setCodpre($arreglo[$j]["codpre"]);
        $opdetord->setMoncau($arreglo[$j]["moncau"]);
        $opdetord->setReffon($arreglo[$j]["reffon"]);
        $opdetord->setMonret(0);
        $opdetord->setMondes(0);
        $opdetord->save();
      }
      $j++;
    }
  }

  public static function grabarImpcauF($opordpag,$grid)
  {
  	$referencia=$opordpag->getNumord();
  	$g= new Criteria();
  	$g->add(CpimpcauPeer::REFCAU,$referencia);
  	CpimpcauPeer::doDelete($g);

    $arreglo=self::ArreglodetF($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='' && $arreglo[$j]["moncau"]!=0)
      {
        $cpimpcau= new Cpimpcau();
        $cpimpcau->setRefcau($referencia);
        $cpimpcau->setCodpre($arreglo[$j]["codpre"]);
        $cpimpcau->setMonimp($arreglo[$j]["moncau"]);
        $cpimpcau->setMonaju(0);
        $cpimpcau->setMonpag(0);
        $cpimpcau->setStaimp('A');
        $cpimpcau->setRefere('NULO');
        $cpimpcau->setRefprc('NULO');
        $cpimpcau->save();
      }
      $j++;
    }
  }

  public static function validarPeriodo($fecha,$tabla,&$error)
  {
     $validaperiodo=true;
     $error=-1;

     $sql="select fecini, feccie from ".$tabla;
     if (Herramientas::BuscarDatos($sql,$result))
     {
         if ($fecha>=$result[0]["fecini"] && $fecha<=$result[0]["feccie"])
         {
             if (strtoupper($tabla)=='CPDEFNIV')
             {
                $c = new Criteria();
                $c->add(CpperejePeer::FECDES,$fecha,Criteria::LESS_EQUAL);
                $c->add(CpperejePeer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
                $result= CpperejePeer::doSelectOne($c);
                if ($result)
                {
                   if ($result->getEstper()!='C')
                   {
                       $validaperiodo=true;
                   }else {
                       $validaperiodo=false;
                       $error=1334;
}
                }else {
                    $validaperiodo=false;
                    $error=629;
                }
             }else {
                $c= new Criteria();
                $c->add(Contaba1Peer::FECDES,$fecha,Criteria::LESS_EQUAL);
                $c->add(Contaba1Peer::FECHAS,$fecha,Criteria::GREATER_EQUAL);
                $conta1=Contaba1Peer::doSelectOne($c);
                if ($conta1)
                {
                  if ($conta1->getStatus()=='A')
                  {
                     $validaperiodo=true;
                  }else {
                    $validaperiodo=false;
                    $error=630;
                  }
                }else {
                    $validaperiodo=false;
                    $error=629;
                }
             }
         }else {
           $validaperiodo=false;
           $error=543;
         }
     }else {
         $validaperiodo=false;
         $error=631;
     }

     return $validaperiodo;
  }

  public static function generarOrdenPagoHistorico($clasemodelo)
  {
    if (self::validarPeriodo($clasemodelo->getUltfec(),'CPDEFNIV',$error))
    {
         if (strlen($clasemodelo->getCodcon())==0)
         {
           $c= new Criteria();
           $c->add(NpcienomPeer::CODNOM,$clasemodelo->getCodnom());
           if ($clasemodelo->getEspecial()=='S'){
             $c->add(NpcienomPeer::ESPECIAL,$clasemodelo->getEspecial());
             $c->add(NpcienomPeer::CODNOMESP,$clasemodelo->getCodnomesp());
           }
           //$c->add(NpcienomPeer::FECNOM,$clasemodelo->getUltfec());
           $sql="npcienom.fecnom>='".$clasemodelo->getUltfec()."' and npcienom.fecnom<='".$clasemodelo->getProfec()."'";
           $c->add(NpcienomPeer::FECNOM,$sql,Criteria::CUSTOM);
           $resul= NpcienomPeer::doSelect($c);
           if ($resul)
           {
                 foreach ($resul as $update)
                 {
                   $update->delete();
                 }
           }

           if ($clasemodelo->getEspecial()=='S')
           {
             $c= new Criteria();
             $c->add(NphisconPeer::CODNOM,$clasemodelo->getCodnom());
             $c->add(NphisconPeer::CODNOMESP,$clasemodelo->getCodnomesp());
             //$c->add(NphisconPeer::FECNOM,$clasemodelo->getUltfec());
             //$c->add(NphisconPeer::MONTO,0,Criteria::NOT_EQUAL);
             if ($clasemodelo->getTipcon()=='A')
               $c->add(NpdefcptPeer::OPECON,'A');
             elseif ($clasemodelo->getTipcon()=='D')
               $c->add(NpdefcptPeer::OPECON,'D');
             elseif ($clasemodelo->getTipcon()=='P')
               $c->add(NpdefcptPeer::OPECON,'P');
             $c->add(NphisconPeer::ESPECIAL,'S');
             $sql="nphiscon.monto<>0 and nphiscon.fecnom>='".$clasemodelo->getUltfec()."' and nphiscon.fecnom<='".$clasemodelo->getProfec()."'";
             $c->add(NphisconPeer::FECNOM,$sql,Criteria::CUSTOM);
             $c->addJoin(NphisconPeer::CODCON,NpdefcptPeer::CODCON);
             $resultado= NphisconPeer::doSelect($c);
           }else {
             $c= new Criteria();
             $c->add(NphisconPeer::CODNOM,$clasemodelo->getCodnom());      
             //$c->add(NphisconPeer::FECNOM,$clasemodelo->getUltfec());       
             //$c->add(NphisconPeer::MONTO,0,Criteria::NOT_EQUAL);
             if ($clasemodelo->getTipcon()=='A')
               $c->add(NpdefcptPeer::OPECON,'A');
             elseif ($clasemodelo->getTipcon()=='D')
               $c->add(NpdefcptPeer::OPECON,'D');
             elseif ($clasemodelo->getTipcon()=='P')
               $c->add(NpdefcptPeer::OPECON,'P');
             $c->add(NphisconPeer::ESPECIAL,'N');
             $sql="nphiscon.monto<>0 and nphiscon.fecnom>='".$clasemodelo->getUltfec()."' and nphiscon.fecnom<='".$clasemodelo->getProfec()."'";
             $c->add(NphisconPeer::FECNOM,$sql,Criteria::CUSTOM);
             $c->addJoin(NphisconPeer::CODCON,NpdefcptPeer::CODCON);
             $resultado= NphisconPeer::doSelect($c);
           }
         }else {
           $c= new Criteria();
           $c->add(NpcienomPeer::CODNOM,$clasemodelo->getCodnom());
           if ($clasemodelo->getEspecial()=='S'){
             $c->add(NpcienomPeer::ESPECIAL,$clasemodelo->getEspecial());
             $c->add(NpcienomPeer::CODNOMESP,$clasemodelo->getCodnomesp());
           }
           //$c->add(NpcienomPeer::FECNOM,$clasemodelo->getUltfec());
           $c->add(NpcienomPeer::CODCON,$clasemodelo->getCodcon());
           $sql="npcienom.fecnom>='".$clasemodelo->getUltfec()."' and npcienom.fecnom<='".$clasemodelo->getProfec()."'";
           $c->add(NpcienomPeer::FECNOM,$sql,Criteria::CUSTOM);
           $resul= NpcienomPeer::doSelect($c);
           if ($resul)
           {
                 foreach ($resul as $update)
                 {
                   $update->delete();
                 }
           }

           if ($clasemodelo->getEspecial()=='S')
           {
             $c= new Criteria();
             $c->add(NphisconPeer::CODNOM,$clasemodelo->getCodnom());
             $c->add(NphisconPeer::CODNOMESP,$clasemodelo->getCodnomesp());
             //$c->add(NphisconPeer::FECNOM,$clasemodelo->getUltfec());
             $c->add(NphisconPeer::CODCON,$clasemodelo->getCodcon());
             //$c->add(NphisconPeer::MONTO,0,Criteria::NOT_EQUAL);
             if ($clasemodelo->getTipcon()=='A')
               $c->add(NpdefcptPeer::OPECON,'A');
             elseif ($clasemodelo->getTipcon()=='D')
               $c->add(NpdefcptPeer::OPECON,'D');
             elseif ($clasemodelo->getTipcon()=='P')
               $c->add(NpdefcptPeer::OPECON,'P');
             $c->add(NphisconPeer::ESPECIAL,'S');
             $sql="nphiscon.monto<>0 and nphiscon.fecnom>='".$clasemodelo->getUltfec()."' and nphiscon.fecnom<='".$clasemodelo->getProfec()."'";
             $c->add(NphisconPeer::FECNOM,$sql,Criteria::CUSTOM);
             $c->addJoin(NphisconPeer::CODCON,NpdefcptPeer::CODCON);
             $resultado= NphisconPeer::doSelect($c);
           }else {
             $c= new Criteria();
             $c->add(NphisconPeer::CODNOM,$clasemodelo->getCodnom());
             $c->add(NphisconPeer::FECNOM,$clasemodelo->getUltfec());
             $c->add(NphisconPeer::CODCON,$clasemodelo->getCodcon());
             //$c->add(NphisconPeer::MONTO,0,Criteria::NOT_EQUAL);
             if ($clasemodelo->getTipcon()=='A')
               $c->add(NpdefcptPeer::OPECON,'A');
             elseif ($clasemodelo->getTipcon()=='D')
               $c->add(NpdefcptPeer::OPECON,'D');
             elseif ($clasemodelo->getTipcon()=='P')
               $c->add(NpdefcptPeer::OPECON,'P');
             $c->add(NphisconPeer::ESPECIAL,'N');
             $sql="nphiscon.monto<>0 and nphiscon.fecnom>='".$clasemodelo->getUltfec()."' and nphiscon.fecnom<='".$clasemodelo->getProfec()."'";
             $c->add(NphisconPeer::FECNOM,$sql,Criteria::CUSTOM);
             $c->addJoin(NphisconPeer::CODCON,NpdefcptPeer::CODCON);
             $resultado= NphisconPeer::doSelect($c);
           }
         }

         if ($resultado)
         {
             foreach ($resultado as $obj)
             {
                 //$sql="Select a.CodCat as codcat, a.CodTipGas as codtipgas,b.CodBan as codban,b.NumCue as numcue From NPAsiCarEmp a, NPHojInt b Where a.CodNom = '".$obj->getCodnom(). "' And a.CodCar = '".$obj->getCodcar()."' And a.codemp=b.codemp and a.CodEmp = '".$obj->getCodemp()."' And a.Status = 'V'";

                 //$sql="Select b.CodBan,b.NumCue From NPHojInt b Where B.CodEmp = '".$obj->getCodemp()."'";
                /* if (Herramientas::BuscarDatos($sql,$result))
                 {
                     if (is_null($result[0]["numcue"]) || $result[0]["numcue"]=="" || is_null($result[0]["codban"]) || $result[0]["codban"]=="")
                     {
                         $codban=$obj->getCodemp();
                     }else {
                         $codban=$result[0]["codban"];
                     }

                     if ($obj->getCodtipgas()=="")
                     {
                        $codtipgas=$result[0]["codtipgas"];
                     }else {
                         $codtipgas=$obj->getCodtipgas();
                     }*/
                     //$codban=$result[0]["codban"];
                     //$codtipgas='0001';

                     $t= new Criteria();
                     $t->add(NpdefcptPeer::CODCON,$obj->getCodcon());
                     $reg= NpdefcptPeer::doSelectOne($t);
                     if ($reg)
                     {
                         $r= new Criteria();
                         $r->add(NpasiparconPeer::CODNOM,$obj->getCodnom());
                         $r->add(NpasiparconPeer::CODCAR,$obj->getCodcar());
                         $r->add(NpasiparconPeer::CODCON,$obj->getCodcon());
                         $registro = NpasiparconPeer::doSelectOne($r);
                         if ($registro)
                         {
                             $partida=$registro->getCodpar();
                         }else $partida=$obj->getCodpar();

                         //$partida=$obj->getCodpar();

                         $w= new Criteria();
                         $w->add(NpconceptoscategoriaPeer::CODCON,$obj->getCodcon());
                         $rew= NpconceptoscategoriaPeer::doSelectOne($w);
                         if ($rew)
                         {
                           $categoria=$rew->getCodcat();
                         }else $categoria=$obj->getCodcat();

                         //$categoria=$obj->getCodcat();

                         $codpre=$categoria."-".$partida;

                         if (($reg->getOrdpag()== "S" && $reg->getImpcpt()== "S" && ($reg->getOpecon()== "A" || $reg->getOpecon()== "D")) || ($reg->getOrdpag()== "S" && $reg->getOpecon()== "P"))
                         {
                             $q= new Criteria();
                             $q->add(CpdeftitPeer::CODPRE,$codpre);
                             $regi2= CpdeftitPeer::doSelectOne($q);
                             if ($regi2)
                             {
                                 $t= new Criteria();
                                 $t->add(NpcienomPeer::CODBAN,$obj->getCodban()); //$codban);
                                 $t->add(NpcienomPeer::CODTIPGAS,$obj->getCodtipgas());//$codtipgas);
                                 $t->add(NpcienomPeer::CODPRE,$codpre);
                                 $t->add(NpcienomPeer::CODCON,$obj->getCodcon());
                                 $t->add(NpcienomPeer::CODNOM,$obj->getCodnom());
                                 if ($clasemodelo->getEspecial()=='S')
                                   $t->add(NpcienomPeer::CODNOMESP,$obj->getCodnomesp());                                 
                                 $t->add(NpcienomPeer::ASIDED,$reg->getOpecon());
                                 //$t->add(NpcienomPeer::FECNOM,$obj->getFecnom());
                                 $t->add(NpcienomPeer::FECNOM,$clasemodelo->getProfec());
                                 $resultado2=NpcienomPeer::doSelectOne($t);
                                 if (count($resultado2)>0)
                                 {
                                   $resultado2->setMonto($resultado2->getMonto() + $obj->getMonto());
                                   $resultado2->save();
                                 }
                                 else
                                 {
                                    $npcienom = new Npcienom();
                                    $npcienom->setCodnom($obj->getCodnom());
                                    if ($clasemodelo->getEspecial()=='S')
                                      $npcienom->setCodnomesp($obj->getCodnomesp());
                                    $npcienom->setCodcon($obj->getCodcon());
                                    //$npcienom->setFecnom($obj->getFecnom());
                                    $npcienom->setFecnom($clasemodelo->getProfec());
                                    $npcienom->setCodpre($codpre);
                                    $npcienom->setCodcta($regi2->getCodcta());
                                    $npcienom->setMonto($obj->getMonto());
                                    $npcienom->setAsided($reg->getOpecon());
                                    $npcienom->setCodtipgas($obj->getCodtipgas());//$codtipgas);
                                    $npcienom->setCodban($obj->getCodban()); //$codban);
                                    $npcienom->setEspecial($obj->getEspecial());
                                    $npcienom->setCantidad($obj->getCantidad());
                                    $npcienom->save();
                                 }
                             }else {
                                $msj="El Código".$codpre."No Esta Definido. Los Datos de la Orden se generarán en forma errónea.";
                             }
                         }else {
                          $msj="El Código de Concepto ".$reg->getCodcon()." con Imputación Presupuestaria ".$codpre." No Esta Definido, los datos de la Orden se generaran de Forma errónea.";
                         }
                     }
                 //}
             }
         }else {
             $error=632;
         }



      return $error;
    }else {
        return $error;
    }

  }
  
  public static function grabarConciliacionNueva($nro,$mes,$ano,$estatus)
  {
    $msj=true;
      $c= new Criteria();
      $c->add(TsccilnmovPeer::NUMCUE,$nro);
      $c->add(TsccilnmovPeer::MESCON,$mes);
      $c->add(TsccilnmovPeer::ANOCON,$ano);
      $reg= TsccilnmovPeer::doSelectOne($c);
      if ($reg)
      {
          if ($estatus=='A' && $reg->getStatus()=='C') {
             $reg->setStatus($estatus);
             $reg->save();
          }else if ($estatus=='C' && $reg->getStatus()=='C') {
              $msj=false;
          }else {
              $reg->setStatus($estatus);
             $reg->save();
          }
      }else {
         if ($estatus=='C') 
         {
           $tsccilnmov= new Tsccilnmov();
           $tsccilnmov->setNumcue($nro);
           $tsccilnmov->setMescon($mes);
           $tsccilnmov->setAnocon($ano);
           $tsccilnmov->setStatus($estatus);
           $tsccilnmov->save();
         }else $msj=false;
      }
      
      return $msj;

  }
  
  public static function cargarPagosAjuste($numcue,$fec1,$fec2,&$arreglodet)
  {
     $arreglodet=array();
    
     $sql="select a.reflib as numche, b.nomben as nomben, a.feclib as fecemi, a.monmov as monche, c.codmon as codmon, a.valmon as valmon, a.refpag as refpag, a.tipmov as tipmov
            from tsmovlib a, opbenefi b, opordpag c
            where a.feclib>='".$fec1."' and a.feclib<='".$fec2."' and a.stadif is null
            and a.numcue='".$numcue."' and a.cedrif=b.cedrif and c.cedrif=b.cedrif
            and a.reflib=c.numche
            order by a.reflib";
     if (Herramientas::BuscarDatos($sql,$result))
     {
         $i=0;
         while ($i<count($result))
         {
             $arreglodet[$i]["check"]='0';
             $arreglodet[$i]["numche"]=$result[$i]["numche"];
             $arreglodet[$i]["nomben"]=$result[$i]["nomben"];
             $arreglodet[$i]["cadfec"]=date('d/m/Y',strtotime($result[$i]["fecemi"]));
             $arreglodet[$i]["monche"]=number_format($result[$i]["monche"],2,',','.');                       
             $p= new Criteria();
             $p->add(TsdesmonPeer::CODMON,$result[$i]["codmon"]);
             $reg= TsdesmonPeer::doSelectOne($p);
             if ($reg)
                $arreglodet[$i]["moneda"]=  $reg->getCodmon().'-'.$reg->getNommon();
             else
                $arreglodet[$i]["moneda"]=  "0001-Bolívar";
             
             $arreglodet[$i]["fecaju"]=date('d/m/Y');
             $arreglodet[$i]["monaju"]="0,00";
             $arreglodet[$i]["majust"]="0,00";
             if ($result[$i]["valmon"]>0)
                 $arreglodet[$i]["valmon"]=$result[$i]["valmon"];
             else
                 $arreglodet[$i]["valmon"]=1;
             
             $calculo=$result[$i]["monche"]/$arreglodet[$i]["valmon"];
             $arreglodet[$i]["monori"]=number_format($calculo,2,',','.');
             $arreglodet[$i]["fecemi"]=date('d/m/Y',strtotime($result[$i]["fecemi"]));
             $arreglodet[$i]["refpag"]=$result[$i]["refpag"];
             $arreglodet[$i]["tipmov"]=$result[$i]["tipmov"];
             
             $i++;
}
     }   
     return true;
  }
  
  public static function generaComprobanteAjustePagos($comprob,$monto,$orden,$fecha,$tipo,$descripcion,$clasemodelo,$grid,$valmon,&$arrcompro)
  {
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
    	 $comprobante=$comprob;
    }else $comprobante = "########";
    
    $ctas="";  $desc=""; $movs=""; $montos="";
    $ctaban=H::getX_vacio('NUMCUE','Tsdefban','Codcta',$clasemodelo->getNumcue());
    $descba=H::getX_vacio('CODCTA','Contabb','Descta',$ctaban);
    
    $p= new Criteria();
    $p->add(OpordpagPeer::NUMCHE,$orden);
    $reg= OpordpagPeer::doSelectOne($p);
    if ($reg)
    {
        if ($tipo=='+')
        {            
        //Comprobante.IncluirAsiento FILL(ObtenerValorRegistro(OPORDPAG!CtaPag), " ", 32, 3), ObtenerNombreCodigo(CONTABB, "Select DesCta From Contabb Where CodCta='" + FILL(ObtenerValorRegistro(OPORDPAG!CtaPag), " ", 32, 3) + "'"), Comprob, "D", monto
            /*$ctas = $reg->getCtapag();
            $desc=H::getX_vacio('CODCTA','Contabb','Descta',$reg->getCtapag());
            $movs="D";
            $montos=$monto;*/

         $p= new Criteria();
         $p->add(OpdetordPeer::NUMORD,$reg->getNumord());
         $datosreg= OpdetordPeer::doSelect($p);
         if ($datosreg)
         {
             foreach ($datosreg as $objreg)
             {
                 $c= new Criteria();
                 $c->add(CpdeftitPeer::CODPRE,$objreg->getCodpre());
                 $regis = CpdeftitPeer::doSelectOne($c);
                 if ($regis)
                 {
                    $descdet=H::getX_vacio('CODCTA','Contabb','Descta',$regis->getCodcta());                            
                    $moncau=$objreg->getMoncau();//$reg->getValmon();
                    $montocau=($moncau*$valmon)-($objreg->getMoncau()*$reg->getValmon());

                    if (trim($ctas)!="") $ctas=$ctas."_".$regis->getCodcta(); else  $ctas = $regis->getCodcta();
                    if (trim($desc)!="") $desc=$desc."_".$descdet; else  $desc = $descdet;
                    if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                    if (trim($montos)!="") $montos=$montos."_".$montocau; else $montos=$montocau;
                 }
             }
         }
         //Incluir retenciones
            $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where NumOrd= '".$reg->getNumord()."' group by CodTip,Numret";
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
                    if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                    if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                    if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                    $calculo=$result[$k]['montoret']*$reg->getValmon();
                    $monret1a=($result[$k]['montoret']*$valmon)-$calculo;
                    if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                  }
                  }
                $k++;
              } //while ($k<count($result))
            }//buscar datos
            
        //Comprobante.IncluirAsiento FILL(CtaBan, " ", 32, 3), ObtenerNombreCodigo(CONTABB, "Select DesCta From Contabb Where CodCta='" + CtaBan + "'"), Comprob, "C", monto
            if (trim($ctas)!="") $ctas=$ctas."_".$ctaban; else  $ctas = $ctaban;
            if (trim($desc)!="") $desc=$desc."_".$descba; else  $desc = $descba;
            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
            if (trim($montos)!="") $montos=$montos."_".$monto; else $montos=$monto;
            
         //Comprobante de Orden
            $h= new Criteria();
            $h->add(OpordpagPeer::NUMORD,$reg->getNumord());
            $h->addJoin(OpbenefiPeer::CEDRIF,OpordpagPeer::CEDRIF);            
            $reg2=OpbenefiPeer::doSelectOne($h);
            if ($reg2)
            {
                if ($reg2->getCodpercon()!="" && $reg2->getCodord()!="")
                {
                   //Comprobante.IncluirAsiento FILL(Resultado_Busqueda!CodPerCon, " ", 32, 3), ObtenerNombreCodigo(CONTABB, "Select DesCta From Contabb Where CodCta='" + Resultado_Busqueda!CodPerCon + "'"), Comprob, "D", monto
                    $desc1=H::getX_vacio('CODCTA','Contabb','Descta',$reg2->getCodpercon());                    
                    if (trim($ctas)!="") $ctas=$ctas."_".$reg2->getCodpercon(); else  $ctas = $reg2->getCodpercon();
                    if (trim($desc)!="") $desc=$desc."_".$desc1; else  $desc = $desc1;
                    if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                    if (trim($montos)!="") $montos=$montos."_".$monto; else $montos=$monto;
                    
                    //Comprobante.IncluirAsiento FILL(Resultado_Busqueda!CodOrd, " ", 32, 3), ObtenerNombreCodigo(CONTABB, "Select DesCta From Contabb Where CodCta='" + Resultado_Busqueda!CodOrd + "'"), Comprob, "C", monto
                    $desc2=H::getX_vacio('CODCTA','Contabb','Descta',$reg2->getCodord());
                    if (trim($ctas)!="") $ctas=$ctas."_".$reg2->getCodord(); else  $ctas = $reg2->getCodord();
                    if (trim($desc)!="") $desc=$desc."_".$desc2; else  $desc = $desc2;
                    if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                    if (trim($montos)!="") $montos=$montos."_".$monto; else $montos=$monto;
                }
            }            
        }else {
            //Comprobante.IncluirAsiento FILL(CtaBan, " ", 32, 3), ObtenerNombreCodigo(CONTABB, "Select DesCta From Contabb Where CodCta='" + CtaBan + "'"), Comprob, "D", monto
            $ctas = $ctaban;
            $desc=$descba;
            $movs="D";
            $montos=$monto;
            
            //Comprobante.IncluirAsiento FILL(ObtenerValorRegistro(OPORDPAG!CtaPag), " ", 32, 3), ObtenerNombreCodigo(CONTABB, "Select DesCta From Contabb Where CodCta='" + FILL(ObtenerValorRegistro(OPORDPAG!CtaPag), " ", 32, 3) + "'"), Comprob, "C", monto
               /* $descp=H::getX_vacio('CODCTA','Contabb','Descta',$reg->getCtapag());
                if (trim($ctas)!="") $ctas=$ctas."_".$reg->getCtapag(); else  $ctas = $reg->getCtapag();
                if (trim($desc)!="") $desc=$desc."_".$descp; else  $desc = $descp;
                if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                if (trim($montos)!="") $montos=$montos."_".$monto; else $montos=$monto;*/

                 $p= new Criteria();
                 $p->add(OpdetordPeer::NUMORD,$reg->getNumord());
                 $datosreg= OpdetordPeer::doSelect($p);
                 if ($datosreg)
                 {
                     foreach ($datosreg as $objreg)
                     {
                         $c= new Criteria();
                         $c->add(CpdeftitPeer::CODPRE,$objreg->getCodpre());
                         $regis = CpdeftitPeer::doSelectOne($c);
                         if ($regis)
                         {
                            $descdet=H::getX_vacio('CODCTA','Contabb','Descta',$regis->getCodcta());
                            $moncau=$objreg->getMoncau();//$reg->getValmon();
                            $montocau=(($moncau*$valmon)-($objreg->getMoncau()*$reg->getValmon()));
                            $montocau=$montocau*-1;

                            if (trim($ctas)!="") $ctas=$ctas."_".$regis->getCodcta(); else  $ctas = $regis->getCodcta();
                            if (trim($desc)!="") $desc=$desc."_".$descdet; else  $desc = $descdet;
                            if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                            if (trim($montos)!="") $montos=$montos."_".$montocau; else $montos=$montocau;
                         }                     
                     }
                 }
                 
                          //Incluir retenciones
            $SQL = "Select codtip,SUM(MonRet) as montoret,numret,codtip from OPRetOrd where NumOrd= '".$reg->getNumord()."' group by CodTip,Numret";
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
                    if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                    if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                    if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                    $calculo=$result[$k]['montoret']*$reg->getValmon();
                    $monret1a=(($result[$k]['montoret']*$valmon)-$calculo);
                    $monret1a=$monret1a*-1;
                    if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                  }
                  }
                $k++;
              } //while ($k<count($result))
            }//buscar datos

             //Comprobante de Orden
                $h= new Criteria();
                $h->add(OpordpagPeer::NUMORD,$reg->getNumord());
                $h->addJoin(OpbenefiPeer::CEDRIF,OpordpagPeer::CEDRIF);            
                $reg2=OpbenefiPeer::doSelectOne($h);
                if ($reg2)
                {
                    if ($reg2->getCodpercon()!="" && $reg2->getCodord()!="")
                    {
                       //Comprobante.IncluirAsiento FILL(Resultado_Busqueda!CodOrd, " ", 32, 3), ObtenerNombreCodigo(CONTABB, "Select DesCta From Contabb Where CodCta='" + Resultado_Busqueda!CodOrd + "'"), Comprob, "D", monto
                        $desc1=H::getX_vacio('CODCTA','Contabb','Descta',$reg2->getCodord());                    
                        if (trim($ctas)!="") $ctas=$ctas."_".$reg2->getCodord(); else  $ctas = $reg2->getCodord();
                        if (trim($desc)!="") $desc=$desc."_".$desc1; else  $desc = $desc1;
                        if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
                        if (trim($montos)!="") $montos=$montos."_".$monto; else $montos=$monto;

                        //Comprobante.IncluirAsiento FILL(Resultado_Busqueda!CodPerCon, " ", 32, 3), ObtenerNombreCodigo(CONTABB, "Select DesCta From Contabb Where CodCta='" + Resultado_Busqueda!CodPerCon + "'"), Comprob, "C", monto
                        $desc2=H::getX_vacio('CODCTA','Contabb','Descta',$reg2->getCodpercon());
                        if (trim($ctas)!="") $ctas=$ctas."_".$reg2->getCodpercon(); else  $ctas = $reg2->getCodpercon();
                        if (trim($desc)!="") $desc=$desc."_".$desc2; else  $desc = $desc2;
                        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                        if (trim($montos)!="") $montos=$montos."_".$monto; else $montos=$monto;
                    }
                }
        }
      $clscommpro=new Comprobante();
      $clscommpro->setGrabar("N");
      //Cabecera del Comprobante
      $clscommpro->setNumcom($comprobante);
      $clscommpro->setReftra($comprob);
      $clscommpro->setFectra(date("d/m/Y",strtotime($fecha)));
      $clscommpro->setDestra($descripcion);
      //Detalle (Asientos Contables)
      $clscommpro->setCtas($ctas);
      $clscommpro->setDesc($desc);
      $clscommpro->setMov($movs);
      $clscommpro->setMontos($montos);
      $clscommpro->setError("N");
      $arrcompro[]=$clscommpro;
    }
    return true;
  }

  public static function generaCorrelativoAjuste($fecha,&$tienecorrelativo,&$r)
  {
    $referencia="";
    $tienecorrelativo=false;
    if (Herramientas::getVerCorrelativo('coraju','Cpdefniv',$r))
    {
          $valido=false;
      	  $longitud='8';
          $formatcont="";
          $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
          if ($varemp)
            if(array_key_exists('generales',$varemp)) {
               if(array_key_exists('formatcont',$varemp['generales']))
               {
                $formatcont=$varemp['generales']['formatcont'];
               }
           }
          //if ($formatcont!='S')
          //{
                $tienecorrelativo=true;
                $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 6, '0', STR_PAD_LEFT);
	          $sql="select refaju from cpajuste where refaju like '%".$numero."'";
	          if (Herramientas::BuscarDatos($sql,$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $referencia=str_pad($r, 8, '0', STR_PAD_LEFT);  
         /* }else {
              $fecc=$fecha;
              $formato='';
	      $c = new Criteria();
	      $c->add(ContabaPeer::CODEMP,'001');
	      $per = ContabaPeer::doSelectOne($c);

	      if ($per->getCorcomp()=='AAMM####'){
	      	$formato = substr($fecc,2,2).substr($fecc,5,2); //date('ym');
	      	$mes=substr($fecc,5,2); //date('m');
	      	$longitud='4';
	      	$sql="select substring(refaju,5,4) as num from cpajuste where substring(refaju,3,2)='".$mes."' order by fecaju desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroajuste = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		      $c = new Criteria();
		      $c->add(CpajustePeer::REFAJU,$nroajuste);
		      $clase = CpajustePeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	$referencia=$nroajuste;

	      }elseif ($per->getCorcomp()=='MMAA####'){
	      	$formato = substr($fecc,5,2).substr($fecc,2,2); //date('my',$fecha);
                $longitud='4';
                $mes=substr($fecc,5,2);//date('m');
	      	$sql="select substring(refaju,5,4) as num from cpajuste where substring(refaju,1,2)='".$mes."' order by fecaju desc limit 1";
	      	if (Herramientas::BuscarDatos($sql,&$result))
	      	{
	      	  $cor=$result[0]["num"]+1;
	      	}else $cor=1;

	      	while(!$valido){
		     $nroajuste = $formato.str_pad((string)$cor, $longitud, "0", STR_PAD_LEFT);

		     $c = new Criteria();
		      $c->add(CpajustePeer::REFAJU,$nroajuste);
		      $clase = CpajustePeer::doSelectOne($c);
		      if(!$clase){
		        $valido = true;
		      }else { $cor=$cor +1;}
	      	}
	      	$referencia=$nroajuste;

	      }else{
                $tienecorrelativo=true;
	        $encontrado=false;
	        while (!$encontrado)
	        {
	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
	          $sql="select refaju from cpajuste where refaju='".$numero."'";
	          if (Herramientas::BuscarDatos($sql,&$result))
	          {
	            $r=$r+1;
	          }
	          else
	          {
	            $encontrado=true;
	          }
	        }
	        $referencia=str_pad($r, 8, '0', STR_PAD_LEFT);
           }
          }*/
    }    
    return $referencia;
  }
  
  public static function generaAjustePagado($referencia,$monto,$orden,$fecha,$tipo,$montoorden,$descripcion,$numche)
  {
      $cpajustenew= new Cpajuste();
      $cpajustenew->setRefaju($referencia);
      $cpajustenew->setTipaju('AJPA');
      $cpajustenew->setFecaju($fecha);
      $cpajustenew->setAnoaju(substr($fecha,0,4));
      $cpajustenew->setDesaju($descripcion);
      $cpajustenew->setRefere($orden);
      $cpajustenew->setDesanu(null);
      $cpajustenew->setTotaju($monto);
      $cpajustenew->setStaaju('A');
      $cpajustenew->save();
      
      self::generarMovaju($referencia,$monto,$numche,$fecha,$tipo,$montoorden);     
  }        

  public static function generarMovaju($referencia,$montoajuste,$orden,$fecha,$tipo,$montoorden)
  {
      $sql="select a.* from opdetord a, opordpag b where a.numord=b.numord and b.numche='".$orden."'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
          $j=0;
          while ($j<count($result))
          {
             $cpmovajunew= new Cpmovaju();
             $cpmovajunew->setRefaju($referencia);
             $cpmovajunew->setCodpre($result[$j]["codpre"]);
             if ($tipo=='+')
             {
                $calculo=$montoajuste*($result[$j]["moncau"]/$montoorden)*-1;                
             }else {
                 $calculo=$montoajuste*($result[$j]["moncau"]/$montoorden);                
             }
             $cpmovajunew->setMonaju($calculo);
             $cpmovajunew->setStamov('A');
             $cpmovajunew->setRefprc('NULO');
             $cpmovajunew->setRefcom($result[$j]["refcom"]);
             $cpmovajunew->setRefcau($result[$j]["numord"]);
             $cpmovajunew->setRefpag($result[$j]["numord"]);
             $cpmovajunew->save();
              
             $j++;
          }
      }
  }
  
  public static function generaAjusteCausado($referencia,$monto,$orden,$fecha,$tipo,$montoorden,$descripcion,$numche)
  {
      $cpajustenew= new Cpajuste();
      $cpajustenew->setRefaju($referencia);
      $cpajustenew->setTipaju('AJCA');
      $cpajustenew->setFecaju($fecha);
      $cpajustenew->setAnoaju(substr($fecha,0,4));
      $cpajustenew->setDesaju($descripcion);
      $cpajustenew->setRefere($orden);
      $cpajustenew->setDesanu(null);
      $cpajustenew->setTotaju($monto);
      $cpajustenew->setStaaju('A');
      $cpajustenew->save();
      
      self::generarMovaju($referencia,$monto,$numche,$fecha,$tipo,$montoorden);     
  }   
  
  public static function generaMovLib($referencia,$monto,$orden,$fecha,$tipo,$descripcion,$numcue,$numcom,$moneda,$valmon,$tipmov)
  {
      $tsmovlibnew= new Tsmovlib();
      $tsmovlibnew->setNumcue($numcue);
      $tsmovlibnew->setReflib($referencia);
      $tsmovlibnew->setFeclib($fecha);
      if ($tipo=='+')
          $tsmovlibnew->setTipmov('ND');
      else
          $tsmovlibnew->setTipmov('NC');
      $tsmovlibnew->setDeslib($descripcion);
      $tsmovlibnew->setMonmov($monto);
      $tsmovlibnew->setCodcta(H::getX_vacio('NUMCUE','Tsdefban','Codcta',$numcue));
      $tsmovlibnew->setFeccom($fecha);
      $tsmovlibnew->setStatus('C');
      $tsmovlibnew->setNumcom($numcom);
      $tsmovlibnew->setStacon('N');
      $tsmovlibnew->setFecing($fecha);
      $tsmovlibnew->setTipmon($moneda);
      $tsmovlibnew->setValmon($valmon);
      $tsmovlibnew->setReflibaju($orden);
      $tsmovlibnew->setTipmovaju($tipmov);

      $tsmovlibnew->save();

      //Actualizo el estatus Movimiento original para que no se vuelva hacer ajuste
      $e= new Criteria();
      $e->add(TsmovlibPeer::NUMCUE,$numcue);
      $e->add(TsmovlibPeer::REFLIB,$orden);
      $e->add(TsmovlibPeer::TIPMOV,$tipmov);
      $reg= TsmovlibPeer::doSelectOne($e);
      if ($reg)
      {
        $reg->setStadif('A');  //A-justado
        $reg->save();
      }
  }
  
  public static function generaAjusteCompromiso($referencia,$monto,$orden,$fecha,$tipo,$montoorden,$descripcion,$numche)
  {
      $cpajustenew= new Cpajuste();
      $cpajustenew->setRefaju($referencia);
      $cpajustenew->setTipaju('AJCO');
      $cpajustenew->setFecaju($fecha);
      $cpajustenew->setAnoaju(substr($fecha,0,4));
      $cpajustenew->setDesaju($descripcion);
      $cpajustenew->setRefere($orden);
      $cpajustenew->setDesanu(null);
      $cpajustenew->setTotaju($monto);
      //$cpajustenew->setNumcom($numcom);
      $cpajustenew->setStaaju('A');
      $cpajustenew->save();
      
      self::generarMovaju($referencia,$monto,$numche,$fecha,$tipo,$montoorden);  
  }        

  public static function ajustarPagosDiferencial($clasemodelo,$grid,$gencom,$numcomarr,&$arrcompro,&$concom,&$cadena,&$cadena1)
  {
     $x = $grid[0];
     $j = 0;
     $cadena="";
     $cadena1="";
     $referencia="";
     $r=0;
     $concom=0; //Contador de Comprobantes generados
     while ($j < count($x)) {
       if ($x[$j]->getCheck()=="1" && $x[$j]->getMajust()!=0) {
          if ($x[$j]->getObserve()=="")
              $descripcion="AJUSTE POR DIFERENCIAL CAMBIARIO";
          else
              $descripcion=$x[$j]->getObserve();
          
          if ($x[$j]->getSigno()=='+')
          {
             $sql="select b.* from opdetord a, cpimpcom b, opordpag c where c.numche='".$x[$j]->getNumche()."' and a.numord=c.numord and a.refcom=b.refcom";
             if (Herramientas::BuscarDatos($sql,$result))
             {
               if (($result[0]["monimp"]-$result[0]["moncau"])>H::toFloat($x[$j]->getMajust()))  //El Compromiso tiene Saldo
               {
                   if ($gencom=="S") {
                         if ($referencia=="")
                           $referencia=self::generaCorrelativoAjuste($x[$j]->getFecemi(),$tienecorrelativo,$r);
                         else {
                           $tienecorrelativo=true;
                            $encontrado=false;
                            $r=$r+1;
                            while (!$encontrado)
                            {
                              $numero=str_pad($r, 6, '0', STR_PAD_LEFT);
                              $sql="select refaju from cpajuste where refaju like '%".$numero."'";
                              if (Herramientas::BuscarDatos($sql,$result))
                              {
                                $r=$r+1;
                              }
                              else
                              {
                                $encontrado=true;
                              }
                            }
                          $referencia=$referencia=str_pad($r, 8, '0', STR_PAD_LEFT);
                         }
                    }else $referencia=self::generaCorrelativoAjuste($x[$j]->getFecemi(),$tienecorrelativo,$r);
                   if ($gencom=="S")
                   {
                      self::generaComprobanteAjustePagos($referencia,$x[$j]->getMajust(),$x[$j]->getNumche(),$x[$j]->getFecaju(),'+',$descripcion,$clasemodelo,$grid,H::toFloat($x[$j]->getValmon(),6),$arrcompro);
                      $concom++;
                   }else {
                       $minumcom=split("_",$numcomarr);
                       $numcom=$minumcom[$concom +1];
                       $concom++;
                       $refpag=$x[$j]->getRefpag();
                       self::generaAjustePagado("AP".substr($referencia,2,6),H::toFloat($x[$j]->getMajust()),$refpag,$x[$j]->getFecaju(),'+',H::toFloat($x[$j]->getMonche()),$descripcion,$x[$j]->getNumche());
                       $refcau=H::getX_vacio('NUMCHE', 'Opordpag', 'Numord', $x[$j]->getNumche());
                       self::generaAjusteCausado("AA".substr($referencia,2,6),H::toFloat($x[$j]->getMajust()),$refcau,$x[$j]->getFecaju(),'+',H::toFloat($x[$j]->getMonche()),$descripcion,$x[$j]->getNumche());
                       self::generaMovLib("AJ".substr($referencia,2,6),H::toFloat($x[$j]->getMajust()),$x[$j]->getNumche(),$x[$j]->getFecaju(),'+',$descripcion,$clasemodelo->getNumcue(),$numcom,substr($x[$j]->getMoneda(),0,3),H::toFloat($x[$j]->getValmon(),6),$x[$j]->getTipmovi());
                       if ($tienecorrelativo)
                       {
                         Herramientas::getSalvarCorrelativo('coraju','Cpdefniv','Referencia',$r,$msg);
                       }
                   }                  
               }else {  //Se debe ajustar el compromiso
                   $mondis= SolicituddeEgresos::montoDisponible($result[0]["codpre"]);
                   if ($mondis>=H::toFloat($x[$j]->getMajust()))
                   {
                    if ($gencom=="S") {
                         if ($referencia=="")
                           $referencia=self::generaCorrelativoAjuste($x[$j]->getFecemi(),$tienecorrelativo,$r);
                         else {
                           $tienecorrelativo=true;
                            $encontrado=false;
                            $r=$r+1;
                            while (!$encontrado)
                            {
                              $numero=str_pad($r, 6, '0', STR_PAD_LEFT);
                              $sql="select refaju from cpajuste where refaju like '%".$numero."'";
                              if (Herramientas::BuscarDatos($sql,$result))
                              {
                                $r=$r+1;
                              }
                              else
                              {
                                $encontrado=true;
                              }
                            }
                          $referencia=$referencia=str_pad($r, 8, '0', STR_PAD_LEFT);
                         }
                    }else $referencia=self::generaCorrelativoAjuste($x[$j]->getFecemi(),$tienecorrelativo,$r);
                     
                     if ($gencom=="S")
                     {
                        self::generaComprobanteAjustePagos("AJ".substr($referencia,2,6),H::toFloat($x[$j]->getMajust()),$x[$j]->getNumche(),$x[$j]->getFecaju(),'+',$descripcion,$clasemodelo,$grid,H::toFloat($x[$j]->getValmon(),6),$arrcompro);    
                        $concom++;
                     }else {
                       $minumcom=split("_",$numcomarr);
                       $numcom=$minumcom[$concom +1];
                       $concom++;
                       $refpag=$x[$j]->getRefpag();
                       self::generaAjustePagado("AP".substr($referencia,2,6),H::toFloat($x[$j]->getMajust()),$refpag,$x[$j]->getFecaju(),'+',H::toFloat($x[$j]->getMonche()),$descripcion,$x[$j]->getNumche());
                       $refcau=H::getX_vacio('NUMCHE', 'Opordpag', 'Numord', $x[$j]->getNumche());
                       self::generaAjusteCausado("AA".substr($referencia,2,6),H::toFloat($x[$j]->getMajust()),$refcau,$x[$j]->getFecaju(),'+',H::toFloat($x[$j]->getMonche()),$descripcion,$x[$j]->getNumche());
                       $refcom=H::getX_vacio('NUMORD', 'Opdetord', 'Refcom', $refcau);
                       self::generaAjusteCompromiso("AC".substr($referencia,2,6),H::toFloat($x[$j]->getMajust()),$refcom,$x[$j]->getFecaju(),'+',H::toFloat($x[$j]->getMonche()),$descripcion,$x[$j]->getNumche());                    
                       self::generaMovLib("AJ".substr($referencia,2,6),H::toFloat($x[$j]->getMajust()),$x[$j]->getNumche(),$x[$j]->getFecaju(),'+',$descripcion,$clasemodelo->getNumcue(),$numcom,substr($x[$j]->getMoneda(),0,3),H::toFloat($x[$j]->getValmon(),6),$x[$j]->getTipmovi());
                       if ($tienecorrelativo)
                       {
                         Herramientas::getSalvarCorrelativo('coraju','Cpdefniv','Referencia',$r,$msg);
                       }
                     }
                   }else {
                       if ($cadena1=="")
                         $cadena1=$x[$j]->getNumche();
                     else
                         $cadena1=$cadena1.'_'.$x[$j]->getNumche();
                   }
               }
                 
             }else {
                 if ($cadena=="")
                     $cadena=$x[$j]->getNumche();
                 else
                     $cadena=$cadena.'_'.$x[$j]->getNumche();
             }               
          }else {
              if ($gencom=="S") {
                         if ($referencia=="")
                           $referencia=self::generaCorrelativoAjuste($x[$j]->getFecemi(),$tienecorrelativo,$r);
                         else {
                           $tienecorrelativo=true;
                            $encontrado=false;
                            $r=$r+1;
                            while (!$encontrado)
                            {
                              $numero=str_pad($r, 6, '0', STR_PAD_LEFT);
                              $sql="select refaju from cpajuste where refaju like '%".$numero."'";
                              if (Herramientas::BuscarDatos($sql,$result))
                              {
                                $r=$r+1;
                              }
                              else
                              {
                                $encontrado=true;
                              }
                            }
                          $referencia=$referencia=str_pad($r, 8, '0', STR_PAD_LEFT);
                         }
                    }else $referencia=self::generaCorrelativoAjuste($x[$j]->getFecemi(),$tienecorrelativo,$r);
              if ($gencom=="S")
              {
                 self::generaComprobanteAjustePagos("AJ".substr($referencia,2,6),($x[$j]->getMajust()),$x[$j]->getNumche(),$x[$j]->getFecaju(),'-',$descripcion,$clasemodelo,$grid,H::toFloat($x[$j]->getValmon(),6),$arrcompro);    
                 $concom++;
              }else {
                $minumcom=split("_",$numcomarr);
                $numcom=$minumcom[$concom +1];
                $concom++;                
                $refpag=$x[$j]->getRefpag();
                self::generaAjustePagado("AP".substr($referencia,2,6),(H::toFloat($x[$j]->getMajust())),$refpag,$x[$j]->getFecaju(),'-',H::toFloat($x[$j]->getMonche()),$descripcion,$x[$j]->getNumche());
                $refcau=H::getX_vacio('NUMCHE', 'Opordpag', 'Numord', $x[$j]->getNumche());
                self::generaAjusteCausado("AA".substr($referencia,2,6),(H::toFloat($x[$j]->getMajust())),$refcau,$x[$j]->getFecaju(),'-',H::toFloat($x[$j]->getMonche()),$descripcion,$x[$j]->getNumche());
                $refcom=H::getX_vacio('NUMORD', 'Opdetord', 'Refcom', $refcau);
                self::generaAjusteCompromiso("AC".substr($referencia,2,6),(H::toFloat($x[$j]->getMajust())),$refcom,$x[$j]->getFecaju(),'-',H::toFloat($x[$j]->getMonche()),$descripcion,$x[$j]->getNumche());                    
                self::generaMovLib("AJ".substr($referencia,2,6),(H::toFloat($x[$j]->getMajust())),$x[$j]->getNumche(),$x[$j]->getFecaju(),'-',$descripcion,$clasemodelo->getNumcue(),$numcom,substr($x[$j]->getMoneda(),0,3),H::toFloat($x[$j]->getValmon(),6),$x[$j]->getTipmovi());
                if ($tienecorrelativo)
                {
                 Herramientas::getSalvarCorrelativo('coraju','Cpdefniv','Referencia',$r,$msg);
                }
             }
          }         
       }
      $j++;
    }
  }
  
  public static function CargarOrdenes($fecdes,$fechas,$tipca1,$tipca2,$cedri1,$cedri2,$conc1,$conc2,$tipdoc,&$arreglo,$codmon,$coddirec)
  {
      $arreglo=array();
      $esextra=false;
      $q= new Criteria();
      $q->add(CpdocpagPeer::TIPPAG,$tipdoc);
      $resul= CpdocpagPeer::doSelectOne($q);
      if ($resul){
        if ($resul->getAfeprc()=='N' && $resul->getAfecom()=='N' && $resul->getAfecau()=='N' && $resul->getAfepag()=='N' && $resul->getAfedis()=='N' && $resul->getRefier()=='N')
          $esextra=true;
      }
      $filopext=H::getConfApp2('filopext', 'tesoreria', 'tesmovemipagele');

      $sql="";
      if ($fecdes!='' && $fechas!='')
        $sql="a.FECEMI >= TO_DATE('".$fecdes."','DD/MM/YYYY') and a.FECEMI <= TO_DATE('".$fechas."','DD/MM/YYYY')";
      if ($tipca1!='' && $tipca2!='') {
        if ($sql=='')
          $sql="a.tipcau>='".$tipca1."' and a.tipcau<='".$tipca2."'";
        else
          $sql.="and a.tipcau>='".$tipca1."' and a.tipcau<='".$tipca2."'";
      }
      if ($cedri1!='' && $cedri2!=''){
         if ($sql=='')
          $sql="a.cedrif>='".$cedri1."' and a.cedrif<='".$cedri2."'";
        else
          $sql.="and a.cedrif>='".$cedri1."' and a.cedrif<='".$cedri2."'";
      }
      if ($conc1!='' && $conc2!=''){
        if ($sql=='')
          $sql="a.codconcepto>='".$conc1."' and a.codconcepto<='".$conc2."'";
        else
          $sql.="and a.codconcepto>='".$conc1."' and a.codconcepto<='".$conc2."'";
      }

      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $filsoldir=H::getConfApp2('filsoldir', 'compras', 'almsolegr'); 
      if ($filsoldir=='S')  //$sql.=' and a.coddirec in (select coddirec from "SIMA_USER".segdirusu where loguse=\''.$loguse.'\')';
        $sql.=' and a.coddirec=\''.$coddirec.'\'';

      if ($sql!='') $sql.=" and";
      
      if ($filopext=='S' && $esextra==true)
        $sql="Select * From opordpag a, cpdoccau b Where  a.tipcau=b.tipcau and ".$sql." a.status = 'N' and codmon='".$codmon."' and a.staele='S' and (b.afeprc='N' and b.afecom='N' and b.afecau='N' and b.afedis='N' and b.refier='N') order by a.numord";
      else
        $sql="Select * From opordpag a Where  ".$sql." a.status = 'N' and codmon='".$codmon."' and a.staele='S' order by a.numord";

      if (Herramientas::BuscarDatos($sql,$result))
      {
          $i=0;
          while ($i<count($result))
          {
             $j=count($arreglo)+1;
             $arreglo[$j-1]["numord"]=$result[$i]["numord"];
             $arreglo[$j-1]["tipcau"]=$result[$i]["tipcau"];
             $arreglo[$j-1]["fecemi"]=(string)date('d/m/Y',strtotime($result[$i]["fecemi"]));
             $arreglo[$j-1]["nomben"]=$result[$i]["nomben"]; 
             $arreglo[$j-1]["cedrif"]=$result[$i]["cedrif"];
             $calculo=($result[$i]["monord"] - $result[$i]["monpag"] - $result[$i]["monret"] - $result[$i]["mondes"] - self::obtenerMontoAjuste($result[$i]["numord"]))/$result[$i]["valmon"];
             $arreglo[$j-1]["monord"]=number_format($calculo,2,',','.');
             $arreglo[$j-1]["check"]='';
             $arreglo[$j-1]["fecval"]=null;
             $arreglo[$j-1]["id"]="9";
              $i++;
          }
      }
      
  }
  
  public static function obtenerMontoAjuste($numord)
  {
      $monaju=0;
      $sql="Select coalesce(Sum(MonAju),0) as monaju From CPImpCau Where RefCau='".$numord."'";
      if (Herramientas::BuscarDatos($sql,$result))
      {
          $monaju=$result[0]["monaju"];
      }
      
      return $monaju;
  } 
  
  public static function BuscarRetenciones($grid)
  {
     $tiene=false;
     $j=0;
     $x=$grid[0];
     while ($j < count($x)) {
       if ($x[$j]->getCheck()=="1" && $x[$j]->getMajust()!=0) {
          $p= new Criteria();
          $p->add(OpordpagPeer::NUMCHE,$x[$j]->getNumche());
          $reg= OpordpagPeer::doSelectOne($p);
          if ($reg)
          {
              $w= new Criteria();
              $w->add(OpretordPeer::NUMORD,$reg->getNumord());
              $resul= OpretordPeer::doSelectOne($w);
              if ($resul)
              {
                  $tiene=true;
                  break;
              }
          }
       }
       $j++;
     }
     return $tiene;
  }
  
  public static function salvarPagosElectronicos($tspagele,$grid)
  {
    if (!$tspagele->getId()) {
      if ($tspagele->getRefpag()=='########')
      {
          $tienecorrelativo=false;
          if (Herramientas::getVerCorrelativo('corpagele','opdefemp',$r))
          {
                $tienecorrelativo=true;
    	        $encontrado=false;
    	        while (!$encontrado)
    	        {
    	          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);

    	          $sql="select refpag from tspagele where refpag='".$numero."'";
    	          if (Herramientas::BuscarDatos($sql,$result))
    	          {
    	            $r=$r+1;
    	          }
    	          else
    	          {
    	            $encontrado=true;
    	          }
    	        }
	        $tspagele->setRefpag(str_pad($r, 8, '0', STR_PAD_LEFT));
          }
      }else {
          $tspagele->setRefpag(str_replace('#','0',$tspagele->getRefpag()));
      }
      
       if ($tienecorrelativo)
       {
         Herramientas::getSalvarCorrelativo('corpagele','opdefemp','Referencia',$r,$msg);
       }
       
       $tspagele->setEstpag('E');
       $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
       $tspagele->setLoguse($loguse);       
       $tspagele->save();
       
       self::grabarDetallePagosElectronicos($tspagele,$grid);
     }
  }
  
  public static function grabarDetallePagosElectronicos($tspagele,$grid)
  {
    $sql1="update opordpag set status='N' where numord in (select numord from tsdetpagele where refpag='".$tspagele->getRefpag()."')";
    Herramientas::insertarRegistros($sql1);
    
    $sql2="DELETE from TSDETPAGELE where refpag='".$tspagele->getRefpag()."'";
    Herramientas::insertarRegistros($sql2);
      
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCheck()=='1')
      {      
        $tsdetpagele= new Tsdetpagele();
        $tsdetpagele->setRefpag($tspagele->getRefpag());
        $tsdetpagele->setNumord($x[$j]->getNumord());
        if ($x[$j]->getFecval()=='' || $x[$j]->getFecval()==null)  $tsdetpagele->setFecval($tspagele->getFecpag());
        else $tsdetpagele->setFecval($x[$j]->getFecval());
        $tsdetpagele->setEstord('E');
        $tsdetpagele->setMonord($x[$j]->getMonord());
        $tsdetpagele->save();
        
        $t= new Criteria();
        $t->add(OpordpagPeer::NUMORD,$x[$j]->getNumord());
        $reg= OpordpagPeer::doSelectOne($t);
        if ($reg)
        {
            $reg->setStatus('E');
            $reg->save();
        }
      }
      $j++;
    }
  }
  
  public static function verificarDisponibilidad($numcue,$monpag)
  {
      $disponibilidad=true;
      $anterior=0;
      $deb=0;
      $cre=0;
      
      $c= new Criteria();
      $c->add(ContabaPeer::CODEMP,'001');
      $reg= ContabaPeer::doSelectOne($c);
      if ($reg)
      {
          $fecinicio=date('d/m/Y',strtotime($reg->getFecini()));
      }
      
      $t= new Criteria();
      $t->add(TsdefbanPeer::NUMCUE,$numcue);
      $reg2= TsdefbanPeer::doSelectOne($t);
      if ($reg2)
      {
          $fecha=date('d/m/Y');
          $anterior=$reg2->getAntlib();
      }
      
      $sql="SELECT coalesce(SUM((case when A.DEBCRE='D' then B.MONMOV else 0 end)),0) as debitos , coalesce(SUM((case when A.DEBCRE='C' then B.MONMOV else 0 end)),0) as creditos 
            FROM TSTIPMOV A,TSMOVLIB B,TSDEFBAN c WHERE B.NUMCUE = '".$numcue."' AND b.numcue = c.numcue and 
            B.TIPMOV = A.CODTIP AND
            B.FECLib <= TO_DATE('$fecha','dd/mm/yyyy') AND
            B.FECLib >=TO_DATE('$fecinicio','dd/mm/yyyy')";
       if (Herramientas::BuscarDatos($sql,$result))
       {
           $deb=$result[0]["debitos"];
           $cre=$result[0]["creditos"];
       }
       
       $saldo=$anterior+$deb-$cre;
       
       if ($saldo<$monpag)
       {
           $disponibilidad=false;
       }      
      
      return $disponibilidad;
  }
  
  public static function buscarActualizarOrdpagEle($tipopag,$tspagele,$grid)
  {
      $monto=0;
      //$tspagele->setFecpagado(date('Y-m-d'));
      $corpagado="";
      $esextra=false;
      $q= new Criteria();
      $q->add(CpdocpagPeer::TIPPAG,$tspagele->getTipdoc());
      $resul= CpdocpagPeer::doSelectOne($q);
      if ($resul){
        if ($resul->getAfeprc()=='N' && $resul->getAfecom()=='N' && $resul->getAfecau()=='N' && $resul->getAfepag()=='N' && $resul->getAfedis()=='N' && $resul->getRefier()=='N')
          $esextra=true;
      }
      $filopext=H::getConfApp2('filopext', 'tesoreria', 'tesmovemipagele');

      $cedularif="";
      if ($tipopag=='S') //Pago Simple
      {
          $nrochq=str_pad($tspagele->getRefpag(), 8, '0', STR_PAD_LEFT);
          $x=$grid[0];
            $j=0;
            while ($j<count($x))
            {
              $montop=0;
              $monret=0;
              $mondescto=0;
              if ($x[$j]->getCheck()=='1')
              {      
                 $l= new Criteria();
                 $l->add(OpordpagPeer::NUMORD,$x[$j]->getNumord());
                 $resul= OpordpagPeer::doSelectOne($l);
                 if ($resul)
                 {
                      if (Herramientas::getVerCorrelativo('cormovele','opdefemp',$r))
                      {
                            $tienecorrelativo=true;                                  
                            $encontrado=false;
                            while (!$encontrado)
                            {
                              $cormovele=str_pad($r, 8, '0', STR_PAD_LEFT);   
                              $sql="select reflib from tsmovlib where reflib='".$cormovele."' and numcue='".$tspagele->getNumcue()."' and tipmov='".$tspagele->getTipdoc()."'";
                              if (Herramientas::BuscarDatos($sql,$result))
                              {
                                $r=$r+1;
                              }
                              else
                              {
                                $encontrado=true;
                              }
                            }
                      }
                      
                      if ($tienecorrelativo)
                      {
                          Herramientas::getSalvarCorrelativo('cormovele','opdefemp','Referencia',$r,$msg);
                      } 
                     $cedularif=$resul->getCedrif();
                     $resul->setNumche($cormovele);
                     $descop=$resul->getDesord();
                     $desctadeb = "PAG.ORD." . " " . $resul->getNumord();
                     $desctacre = $resul->getNomben();
                     $numorden = $resul->getNumord();
                     $tipcausad = $resul->getTipcau();
                     
                     if (!self::buscar_beneficiario($x[$j]->getCedrif()))
                     {
                         $consulto=false;
                     }
                     $hay_contabilidad=true;
                     if ($hay_contabilidad)
                     {
                         $resul->setCtaban($tspagele->getNumcue());
                         $ctapag=$resul->getCtapag();
                     }
                     
                     if ($resul->getMonret()>0)
                     {
                         $monret=$monret+$resul->getMonret();                        
                     }
                     $monto=$x[$j]->getMonord();
                     //$montopagado=$monto;
                     $montopagado=$resul->getMonpag() + $x[$j]->getMonord();

                     $resul->setMonpag($montopagado);
                     
             
                     $q= new Criteria();
                     $q->add(OpordchePeer::NUMORD,$x[$j]->getNumord());
                     $q->add(OpordchePeer::NUMCHE,$cormovele); 
                     $q->add(OpordchePeer::CODCTA,$tspagele->getNumcue());
                     $q->add(OpordchePeer::TIPMOV,$tspagele->getTipdoc());
                     $buscar= OpordchePeer::doSelectOne($q);
                     if (!$buscar)
                     {
                         $opordchenew= new Opordche();
                         $opordchenew->setNumord($x[$j]->getNumord());
                         $opordchenew->setNumche($cormovele); 
                         $opordchenew->setCodcta($tspagele->getNumcue());
                         $opordchenew->setTipmov($tspagele->getTipdoc());
                         $opordchenew->setMonpag($x[$j]->getMonord());
                         $opordchenew->save();

                         if (($resul->getMonord()-$resul->getMonret()-self::obtenerMontoAjuste($resul->getNumord()))<=($resul->getMonpag()+$x[$j]->getMonord()))
                         {
                            $resul->setStatus('I');
                            $resul->setFecpag(date('Y-m-d'));
                         }

                     }else return  false;

                     
                     $porcentaje=(($monto+$mondescto)*100)/($resul->getMonord()-$resul->getMonret());
                     $ordendepago=$resul->getNumord();     
                     $campced=$x[0]->getCedrif();
                     self::Genera_ComprobanteEle($cormovele,$tspagele,$grid,$numorden,$tipopag,$descop,$desctadeb,
                                     $desctacre,$ctapag,"",0,$descop,$monto,$monret,$correl2);                    
                     $resul->save();
                     $numcom=$correl2;
                     //if ($filopext!='S' && !($esextra))
                     if (!($esextra))
                       $corpagado=self::Genera_PagosEle($tspagele, $numorden, $cedularif, $tipcausad, $descop, $monto, "O", $porcentaje, $grid);
                     self::Actualiza_BancosEle($tspagele,"A","C",$monto);
                     self::Genera_MovLibEle($tspagele,$descop,$monto,$numcom,$cormovele,$corpagado,$cedularif);

                     $w= new Criteria();
                     $w->add(TsdetpagelePeer::REFPAG,$tspagele->getRefpag());
                     $w->add(TsdetpagelePeer::NUMORD,$x[$j]->getNumord());
                     $resultado= TsdetpagelePeer::doSelectOne($w);
                     if ($resultado)
                     {
                         $resultado->setRefmovlib($cormovele);
                         $resultado->setNumcom($numcom);
                         $resultado->setRefpagpre($corpagado);
                         $resultado->save();
                     }                                    
                 }
              }
              $j++;
            }
      }
      elseif ($tipopag=='C') //Pago Compuesto
      {
          $nrochq=str_pad($tspagele->getRefpag(), 8, '0', STR_PAD_LEFT);       
          $x=$grid[0];
          $j=0;
          $misrefpag=H::getConfApp2('misrefpag', 'tesoreria', 'tesmovemipagele');
          if ($misrefpag=='S'){
            $cormovele=$nrochq;
          }else {
            if (Herramientas::getVerCorrelativo('cormovele','opdefemp',$r))
            {
                  $tienecorrelativo=true;                                     
                  $encontrado=false;
                  while (!$encontrado)
                  {
                    $cormovele=str_pad($r, 8, '0', STR_PAD_LEFT);   
                    $sql="select reflib from tsmovlib where reflib='".$cormovele."' and numcue='".$tspagele->getNumcue()."' and tipmov='".$tspagele->getTipdoc()."'";
                    if (Herramientas::BuscarDatos($sql,$result))
                    {
                      $r=$r+1;
                    }
                    else
                    {
                      $encontrado=true;
                    }
                  }
                    
            }     
          }                
                      
            while ($j<count($x))
            {
              $montop=0;
              $monret=0;
              $mondescto=0;
              if ($x[$j]->getCheck()=='1')
              {      
                 $l= new Criteria();
                 $l->add(OpordpagPeer::NUMORD,$x[$j]->getNumord());
                 $resul= OpordpagPeer::doSelectOne($l);
                 if ($resul)
                 {      
                     $cedularif=$resul->getCedrif();
                     $resul->setNumche($cormovele);
                     $descop=$resul->getDesord();
                     $desctadeb = "PAG.ORD." . " " . $resul->getNumord();
                     $desctacre = $resul->getNomben();
                     $numorden = $resul->getNumord();
                     $tipcausad = $resul->getTipcau();
                     
                     if (!self::buscar_beneficiario($x[$j]->getCedrif()))
                     {
                         $consulto=false;
                     }
                     $hay_contabilidad=true;
                     if ($hay_contabilidad)
                     {
                         $resul->setCtaban($tspagele->getNumcue());
                         $ctapag=$resul->getCtapag();
                     }
                     $monto=$monto+$x[$j]->getMonord();
                     if ($resul->getMonret()>0)
                     {
                         $monret=$monret+$resul->getMonret();                
                     }
                     if ($resul->getMondes()>0)
                     {
                         $mondescto=$mondescto+$resul->getMondes();                     
                         $CtaDcto=self::Busca_CtaDes();
                     }
                     
                     $q= new Criteria();
                     $q->add(OpordchePeer::NUMORD,$x[$j]->getNumord());
                     $q->add(OpordchePeer::NUMCHE,$cormovele); 
                     $q->add(OpordchePeer::CODCTA,$tspagele->getNumcue());
                     $q->add(OpordchePeer::TIPMOV,$tspagele->getTipdoc());
                     $buscar= OpordchePeer::doSelectOne($q);
                     if (!$buscar)
                     {
                         $opordchenew= new Opordche();
                         $opordchenew->setNumord($x[$j]->getNumord());
                         $opordchenew->setNumche($cormovele);  
                         $opordchenew->setCodcta($tspagele->getNumcue());
                         $opordchenew->setTipmov($tspagele->getTipdoc());
                         $opordchenew->setMonpag($x[$j]->getMonord()+$resul->getMondes());
                         $opordchenew->save();
                         
                         if (($resul->getMonord()-$resul->getMonret()-self::obtenerMontoAjuste($resul->getNumord()))<=($resul->getMonpag()+$x[$j]->getMonord()+$resul->getMondes()))
                         {
                            $resul->setStatus('I');
                            $resul->setFecpag(date('Y-m-d'));
                         }
                         $montopagado=$resul->getMonpag()+$x[$j]->getMonord();
                         //$montopagado=$x[$j]->getMonord();
                         $resul->setMonpag($montopagado);
                         
                     }else return  false;                     
                     $resul->save();                          
                 }
              }
              $j++;
            }
            if ($tienecorrelativo)
            {
               Herramientas::getSalvarCorrelativo('cormovele','opdefemp','Referencia',$r,$msg);
            }
             self::Genera_ComprobanteEle($cormovele,$tspagele,$grid,$numorden,$tipopag,$descop,$desctadeb,
                             $desctacre,$ctapag,"",$mondescto,$descop,$monto,$monret,$correl2);                        
             $numcom=$correl2;
             //if ($filopext!='S' && !($esextra))
             if (!($esextra))
                $corpagado = self::Genera_Pagos_CompuestoEle($tspagele,$numorden,$cedularif,$tipcausad,$descop,$x);
             self::Genera_MovLibEle($tspagele,$descop,$monto,$numcom,$cormovele,$corpagado,$cedularif);
             self::Actualiza_BancosEle($tspagele,"A","C",$monto);   

             $w= new Criteria();
             $w->add(TsdetpagelePeer::REFPAG,$tspagele->getRefpag());
             $resultado= TsdetpagelePeer::doSelect($w);
             if ($resultado)
             {
               foreach ($resultado as $objres) {
                 $objres->setRefmovlib($cormovele);
                 $objres->setNumcom($numcom);
                 $objres->setRefpagpre($corpagado);
                 $objres->save();
               }

             }            
      }
  }
  
  public static function buscar_beneficiario($cedrif)
  {
      $encontrado=false;
      
      $t= new Criteria();
      $t->add(OpbenefiPeer::CEDRIF,$cedrif);
      $resul= OpbenefiPeer::doSelectOne($t);
      if ($resul)
      {
         $encontrado=true;   
         $ctapag=$resul->getCodcta();
         $cedrif=$resul->getCedrif();
         $desctacre=$resul->getNomben();
      }
      
      return $encontrado;
  }
  
  public static function Genera_PagosEle($tspagele,$NumOrd,$CedRif, $TipoCa,$DesOrd,$Monto,$TipoOrig,$Porcentaje,$grid)
  {
     //Preguntar si afecta o no al pagado
    $refpag=Herramientas::getX('tippag','Cpdocpag','Afepag',$tspagele->getTipdoc());
    $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
    // Afecta Presupuesto
     $refpagaux = "NULO";
    $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$NumOrd."' AND B.TIPCAU=A.TIPCAU";
    if (Herramientas::BuscarDatos($criterio,$result))
    {
      if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")){
        if ($refpag != "N")
        {
            $cppagos=new Cppagos();
            $refpagaux = self::Buscar_Correlativo_Pago();
            $cppagos->setRefpag($refpagaux);
            $cppagos->setTippag($tspagele->getTipdoc());
            $cppagos->setFecpag($tspagele->getFecpagado());
            $anno=substr($tspagele->getFecpagado(),0, 4);
            $cppagos->setAnopag($anno);
            $cppagos->setCedrif($CedRif);
            $cppagos->setRefcau($NumOrd);
            $cppagos->setTipcau($TipoCa);
            $cppagos->setDespag($DesOrd);
            $cppagos->setDesanu(null); 
            $cppagos->setMonpag($Monto);        
            $cppagos->setSalaju(0);
            $cppagos->setStapag("A");
            if ($filsoldir=='S')
              $cppagos->setCoddirec($tspagele->getCoddirec());
            
            $cppagos->save();

            $c = new Criteria();
            $datos = CpdefnivPeer::doSelectOne($c);
            if ($datos)
            {
                $datos->setCorpag($refpagaux);
                $datos->save();
            }

            if ($TipoOrig == "O")
            {
              self::Genera_ImpPagEle($tspagele,$NumOrd,$Porcentaje,$refpagaux);
            }        
         }//if ($refpag != "N")

      }
    }//if (!Herramientas::BuscarDatos($criterio,&$result))   
    
     return $refpagaux;
   } 
   
     public static function Genera_ImpPagEle($tspagele,$numord,$porcentaje,$refpag)
  {
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
            $cpimppag->setRefpag($refpag);
            $cpimppag->setCodpre($opdetord[$k]['codpre']);
            $monimp = ($opdetord[$k]['moncau'] * $porcentaje) / 100;
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
            $k++;
          }//while ($k<count($ordpag))
        }//if (Herramientas::BuscarDatos($sql,&$$opdetord))
      }//if !($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")
    }//if (!Herramientas::BuscarDatos($criterio,&$result))
  }
  
   public static function Actualiza_BancosEle($tspagele,$Accion,$DebCre,$Monto)
  {
    $result=array();
    $c = new Criteria();
    $c->add(TsdefbanPeer::NUMCUE,$tspagele->getNumcue());
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
          }
          else if ($Accion == "E")
          {
            $Debito = $tsdefban->getDeblib();
            $Total = $Debito - $Monto;
            $tsdefban->setDeblib($Total);
          }
          $tsdefban->save();
         case "C":
           if ($Accion== "A")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito + $Monto;
             $tsdefban->setCrelib($Total);
           }
           if ($Accion== "E")
           {
             $Credito = $tsdefban->getCrelib();
             $Total = $Credito - $Monto;
             $tsdefban->setCrelib($Total);
           }

           $tsdefban->save();
      }//  switch($DebCre)
    }// if ($tsdefban)
  }
  
  public static function Genera_MovLibEle($tspagele,$Descrip,$monto,$Comprobante,$cormovele,$refpago,$cedrif, $ordendepago)
  {
    $result=array();
    $moneda=$tspagele->getCodmon();
    $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
    if ($moneda2!=$moneda)
            $valor=$tspagele->getValmon();
    else
        $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda2);
    $criterio = "Select * From TSMOVLIB Where NumCue = '".$tspagele->getNumcue()."' AND RefLib = '".$cormovele."' And TipMov='".$tspagele->getTipdoc()."'";
    if (!Herramientas::BuscarDatos($criterio,$result))
    {
      $tsmovlib = new Tsmovlib();
      $tsmovlib->setRefpag($refpago);
      $tsmovlib->setNumcue($tspagele->getNumcue());
      $tsmovlib->setReflib($cormovele);
      $tsmovlib->setFeclib($tspagele->getFecpagado());
      $tsmovlib->setTipmov($tspagele->getTipdoc());
      $tsmovlib->setDeslib($Descrip);
      $CtaBan = Herramientas::getX('numcue','Tsdefban','Codcta',$tspagele->getNumcue());
      $tsmovlib->setMonmov($monto*$valor);
      $tsmovlib->setCodcta($CtaBan);
      $tsmovlib->setNumcom($Comprobante);
      $tsmovlib->setFeccom($tspagele->getFecpagado());
      $tsmovlib->setCoddirec($tspagele->getCoddirec());
      $tsmovlib->setStatus("C");
      $tsmovlib->setStacon("N");
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $tsmovlib->setLoguse($loguse);
      $tsmovlib->setFecing(date("Y-m-d"));
      $tsmovlib->setCedrif($cedrif);      
      $tsmovlib->setCodmon($moneda);
      $tsmovlib->setValmon($valor);
      $tsmovlib->save();
    }    
  }
  
     public static function Genera_Pagos_CompuestoEle($tspagele,$NumOrd,$CedRif,$TipoCa,$DesOrd,$grid)
   {
     $MontoDelCompuesto = 0;
      $j=0;
      $result=array();
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
          $criterio = "Select A.afeprc,A.afecom,A.afecau,A.afedis From CPDOCCAU A,OPORDPAG B Where B.NumOrd = '".$grid[$j]->getNumord()."' AND B.TIPCAU=A.TIPCAU";
          if (Herramientas::BuscarDatos($criterio,$result))
          {
            if (!($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")){
                 $MontoDelCompuesto = $MontoDelCompuesto + $grid[$j]->getMonord();

            }
          }//if (!Herramientas::BuscarDatos($criterio,&$result))
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }  //End del ciclo que recorre el grid while ($j<count($grid))

      //Preguntar si afecta o no al pagado
      $refpag=Herramientas::getX('tippag','Cpdocpag','Afepag',$tspagele->getTipdoc());
      $filsoldir=H::getConfApp2('filsoldir', 'presupuesto', 'preprecom');   
      $refpagaux = "";
      // Afecta Presupuesto
      if ($refpag != "N" && $MontoDelCompuesto>0)
      {
          $cppagos=new Cppagos();
          $refpagaux = self::Buscar_Correlativo_Pago();
          $cppagos->setRefpag($refpagaux);
          $cppagos->setTippag($tspagele->getTipdoc());
          //$cppagos->setFecpag(date('Y-m-d'));
          $cppagos->setFecpag($tspagele->getFecpagado());
          $anno=substr(date('Y-m-d'),0, 4);
          $cppagos->setAnopag($anno);
          $cppagos->setCedrif($CedRif);
          $cppagos->setRefcau($NumOrd);
          $cppagos->setTipcau($TipoCa);
          $cppagos->setDespag($DesOrd);
          $cppagos->setDesanu(null);
          $cppagos->setMonpag($MontoDelCompuesto);
          $cppagos->setSalaju(0);
          $cppagos->setStapag("A");
          if ($filsoldir=='S')
              $cppagos->setCoddirec($tspagele->getCoddirec());
          $cppagos->save();

          $c = new Criteria();
          $datos = CpdefnivPeer::doSelectOne($c);
          if ($datos)
          {
            $datos->setCorpag((string)$refpagaux);
            $datos->save();
          }

          self::Genera_ImpPag_CompuestoEle($tspagele,$grid,$refpagaux);
    }//if ($refpag != "N")
    return $refpagaux;
   }
   
  public static function Genera_ImpPag_CompuestoEle($tspagele,$grid,$refpag)
  {
    $j=0;
      $result=array();
      $opdetord=array();
      while ($j<count($grid))
      {
        if ($grid[$j]->getCheck()=="1")
        {
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
                  $cpimppag->setRefpag($refpag);
                  $cpimppag->setCodpre($opdetord[$k]['codpre']);
                  $Porcentaje = (($grid[$j]->getMonord() + $grid[$j]->getMondes()) * 100) / Cheques::Obtener_Monto_Total_Orden($grid[$j]->getNumord());
                  $monimp = ($opdetord[$k]['moncau'] * $Porcentaje) / 100;
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
                  $k++;
                }//while ($k<count($ordpag))
              }//if (Herramientas::BuscarDatos($sql,&$$opdetord))
            }//if !($result[0]['afeprc']== "N" and $result[0]['afecom']== "N" and $result[0]['afecau']== "N" and $result[0]['afedis']=="N")
          }//if (!Herramientas::BuscarDatos($criterio,&$result))
        }//if ($grid[$j]->getCheck()=="1")
        $j++;
      }//while ($j<count($grid))
  }
  
public static function  Genera_ComprobanteEle($numcomcon,$tspagele,$grid,$ordendepago,$tippag,$DescOp,$DesCtaDeb,
                                             $DesCtaCre,$CtaPag,$CtaDcto,$MontDcto,$ConDto,$monto,$MonRet,&$correl2)
  {   
    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    $cheret='N';
    if ($confcorcom=='N')
    {
         $Comprob=$numcomcon;
    }else $Comprob = "########";   

      $ctas="";$movs="";$montos="";$desc="";
      $CtaBan = Herramientas::getX_vacio('numcue','Tsdefban','Codcta',$tspagele->getNumcue());
      $SQL = "Select pagrepcaj,ctarepcaj,pagcheant,ctacheant from TSDefRenGas";
      if (Herramientas::BuscarDatos($SQL,$result))
      {
         if (($tspagele->getTipdoc()==$result[0]['pagrepcaj'])  &&  ($result[0]['ctarepcaj'] != "" ))
            $CtaPag = $result[0]['ctarepcaj'];
         else if ($tspagele->getTipdoc()== $result[0]['pagcheant'] && trim($result[0]['ctacheant']) != "" )
            $CtaPag = $result[0]['ctacheant'];

      }//if (Herramientas::BuscarDatos($SQL,&$result))
      $moneda=$tspagele->getCodmon();
      $moneda2=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
      if ($moneda2!=$moneda)
              $valor=$tspagele->getValmon();
      else
          $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda2);


      if ($tippag=='S') //Pago Simple
      {
        //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(Monto + MontDcto)
        $ctas = $CtaPag;
        $desc=$DesCtaDeb;
        $movs="D";
        $montos=$monto+$MontDcto+$MonRet;
        if ($moneda2!=$moneda) $montos=$montos*$valor;
      }
      else if ($tippag=='C')//pagos compuestos
      {
        $x=$grid[0];
        $j=0;
        while ($j<count($x))
        {
          if ($x[$j]->getCheck()=="1")
          {
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
               $sql = "Select ctapag,mondes,monret,monord From OPORDPAG Where NumOrd = '". $x[$j]->getNumord() ."' Order by NumOrd";
               if (Herramientas::BuscarDatos($sql,$result))
               {
                  $CtaPag = $result[0]['ctapag'];
               }
             //Comprobante.IncluirAsiento CtaPag, DesCtaDeb, Comprob, "D", CDbl(GridBd1.TextMatrix(I, 5))
             if (trim($ctas)!="") $ctas=$ctas."_".$CtaPag; else  $ctas = $CtaPag;
             if (trim($desc)!="") $desc=$desc."_".$DesCtaDeb; else  $desc = $DesCtaDeb;
             if (trim($movs)!="") $movs=$movs."_"."D"; else  $movs = "D";
             $montot=$result[0]['monord']; 
             if (trim($montos)!="") $montos=$montos."_".$montot; else $montos=$montot;
          }
          $j++;
        }//while
      }//else if ($tippag=='C')//pagos compuestos

      if ($MontDcto > 0) //Para que incluya la cuenta del descuento solo en primer pago
      {
        // Comprobante.IncluirAsiento CtaDcto, DescOp, Comprob, "C", CDbl(MontDcto)
        if (trim($ctas)!="") $ctas=$ctas."_".$CtaDcto; else  $ctas = $CtaDcto;
        if (trim($desc)!="") $desc=$desc."_".$ConDto; else  $desc = $ConDto;
        if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";    
        if ($moneda2!=$moneda) $MontDcto=$MontDcto*$valor;  
        if (trim($montos)!="") $montos=$montos."_".$MontDcto; else $montos=$MontDcto;
      }//if ($MontDcto > 0)


        //Comprobante.IncluirAsiento CtaBan, DesCtaCre, Comprob, "C", CDbl(Monto)
      if (trim($ctas)!="") $ctas=$ctas."_".$CtaBan; else  $ctas = $CtaBan;
      if (trim($desc)!="") $desc=$desc."_".$DesCtaCre; else  $desc = $DesCtaCre;
      if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";     
      if ($moneda2!=$moneda) $monto=$monto*$valor;  
      if (trim($montos)!="") $montos=$montos."_".$monto; else $montos=$monto;
      //--------------------------Generando la Parte de Las Retenciones --------------------------------

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
                    if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                    if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                    if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                    $monret1a=$result[$k]['montoret'];
                    if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                   
                  }
                  }
                $k++;
              } //while ($k<count($result))
            }//buscar datos
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
                          if (trim($ctas)!="") $ctas=$ctas."_".$optipret[0]['codcon']; else  $ctas = $optipret[0]['codcon'];
                          if (trim($desc)!="") $desc=$desc."_".$optipret[0]['destip']; else  $desc = $optipret[0]['destip'];
                          if (trim($movs)!="") $movs=$movs."_"."C"; else  $movs = "C";
                          $monret1a=$resultado[$k]['montoret'];
                          if (trim($montos)!="") $montos=$montos."_".$monret1a; else $montos=$monret1a;
                      }
                    }                    
                  $k++;
                } //while ($k<count($result))
              }//buscar datos
          }//if ($x[$j]->getCheck()=="1")
          $j++;
        }//while
       }//else if ($tippag=='C')//pagos compuestos
      
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

//        $correl2=Comprobante::Buscar_Correlativo(date("d/m/Y"));
        $correl2=Comprobante::Buscar_Correlativo($tspagele->getFecpagado());
        
        $contabc = new Contabc();
        $contabc->setNumcom($correl2);
        $contabc->setReftra($numcomcon);
        //$contabc->setFeccom(date("d/m/Y"));
        $contabc->setFeccom($tspagele->getFecpagado());
        $contabc->setDescom($DescOp);
        if (H::toFloat($sumdeb)==H::toFloat($sumcre))
        $contabc->setStacom('D');
        else
        $contabc->setStacom('E');
        $contabc->setTipcom(null);
        $contabc->setMoncom($sumdeb);
        $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
        $contabc->setCoddirec($tspagele->getCoddirec());
        $contabc->setCodmon($tspagele->getCodmon());
        $contabc->setValmon($tspagele->getValmon());
        $contabc->setLoguse($loguse);
        $contabc->save();

          $i=0;
	  while ($i<=(count($new_ctas)-1))
	  {
	  	if ($new_ctas[$i]!="")
	  	{
                  $contabc1= new Contabc1();
                  $contabc1->setNumcom($correl2);
                  //$contabc1->setFeccom(date("d/m/Y"));
                  $contabc1->setFeccom($tspagele->getFecpagado());
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

  }//end function Genera_Comprobante  
  
  
  public static function generarTXTPagEle($tipotxt,$tspagele,$grid)
  {
        //Generar archivo txt
        $nombre_archivo=sfConfig::get('sf_upload_dir')."/pagoselectronicos/".$tspagele->getRefpag()."_".strftime('%d_%m_%Y',time()).".txt";
        $dir="";
        if (!file_exists($nombre_archivo))
        {
                fopen($nombre_archivo,"w");
        }
        chmod ($nombre_archivo,0777);
        $pagosele = fopen($nombre_archivo,'w+');
        $dir=$tspagele->getRefpag()."_".strftime('%d_%m_%Y',time()).".txt";


          $x=$grid[0];
          $j=0;
          $tipocta="  ";
          $cadena="";
          $nacionalidad="";
          $cuentaban=str_pad('', 20, ' ', STR_PAD_LEFT);
          $codigobanpro=str_pad('', 12, '0', STR_PAD_LEFT);
          $tipopago="";
          $mantxtfun=H::getConfApp2('mantxtfun', 'tesoreria', 'tesmovemipagele');  //Fundamusical
          $mantxtsacs=H::getConfApp2('mantxtsacs', 'tesoreria', 'tesmovemipagele'); //SACS
          $mantxtumbv=H::getConfApp2('mantxtumbv', 'tesoreria', 'tesmovemipagele'); //UMBV
          $mantxtsecr=H::getConfApp2('mantxtsecr', 'tesoreria', 'tesmovemipagele');  //Secretaria
          $mantxtproal=H::getConfApp2('mantxtproal', 'tesoreria', 'tesmovemipagele'); //Fundaproal
          $mantxtfontur=H::getConfApp2('mantxtfontur', 'tesoreria', 'tesmovemipagele'); //Fontur
          $numneg=H::getX_vacio('CODEMP', 'Opdefemp', 'Numneg', '001');
          $nomemp=H::getX_vacio('CODEMP', 'Empresa', 'Nomemp', '001');
          $rifemp=H::getX_vacio('CODEMP', 'Opdefemp', 'Rifemp', '001');
          $emailpro=str_pad(' ', 50, ' ', STR_PAD_RIGHT);
          if ($mantxtfun=='S'){  //FUNDAMUSICAL
            while ($j<count($x))
            {
              if ($tipotxt=="N")
              {
                 $sql="SELECT A.*,b.codbanele FROM nphojint a, npbancos b WHERE cedemp='".$x[$j]->getCedrif()."' and a.codban=b.codban";
                 if (Herramientas::BuscarDatos($sql,$result))
                 {
                      $cuentaban=$result[0]["numcue"];
                      $codigoban="";
                      $codigobanpro=$result[0]["codbanele"];
                      $encontro=strrpos($result[0]["tipcue"], 'Cta Corriente');
                      if ($encontro)
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$result[0]["emaemp"];
                      $tipopago=substr($result[0]["numcue"],0,4);
                      if ($tipopago=="0112") //Identificador del Banco Venezuela
                          $tipopago="10";
                      else $tipopago="00";
                      $nacionalidad=$result[0]["nacemp"];
                 }
                 $monstr=(string)$x[$j]->getMonord();
                 if (substr($monstr,-3,1)!='.')
                    $monstr= $monstr.'.00';
                 $cuentaben=H::getX_vacio('CEDRIF','Opbenefi','Numcueb',$x[$j]->getCedrif());
                 if ($nacionalidad=='') $nacionalidad=H::getX_vacio('CEDEMP','Nphojint','Nacemp',$x[$j]->getCedrif());
                 //Nacionalidad(1) Cedula (9) Cuenta Beneficiario (4-4-2-10) Monto (13-2) Nomben beneficiario (35)
                 $cadena=str_pad($nacionalidad, 1, ' ', STR_PAD_LEFT).str_pad($x[$j]->getCedrif(), 9, '0', STR_PAD_LEFT).str_pad(substr($cuentaben, 0,4), 4, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 4,4), 4, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 8,2), 2, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 10,10), 10, ' ', STR_PAD_RIGHT).str_pad(substr($monstr, 0,strlen($monstr)-3), 13, '0', STR_PAD_LEFT).str_pad(substr($monstr,-1,2), 2, '0', STR_PAD_LEFT).str_pad($x[$j]->getNomben(), 35, ' ', STR_PAD_RIGHT);
              }else {
                 $r= new Criteria();
                 $r->add(CaproveePeer::RIFPRO,$x[$j]->getCedrif());
                 $registros= CaproveePeer::doSelectOne($r);
                 if ($registros)
                 {
                      $cuentaban=$registros->getNumcue();
                      $codigoban=$registros->getCodban();                    
                      if ($registros->getCodtip()=='00')
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$registros->getEmail();
                      $tipopago=substr($registros->getNumcue(),0,4);
                      if ($tipopago=="0112") //Identificador del Banco Venezuela
                          $tipopago="10";
                      else $tipopago="00";
                      $nacionalidad=$registros->getNacpro();
                      $codigobanpro=H::getX_vacio('Codban', 'Cabanco', 'Codpagele', $codigoban);
                 }

                 $monstr=(string)$x[$j]->getMonord();
                 $aux=explode('.', $monstr);
                 if (count($aux)>1)
                 {
                  $parent=substr($monstr, 0,strlen($monstr)-3);
                  $decimal=substr($monstr,-1,2);
                 }else {
                   $parent=$monstr;
                   $decimal='00';
                 }
                 $cuentaben=H::getX_vacio('CEDRIF','Opbenefi','Numcueb',$x[$j]->getCedrif()); 
                 //Tipo de Persona(1) Rif (9) Cuenta Beneficiario (4-4-2-10) Monto (13-2) Nomben beneficiario (35) Email Beneficiario (35)
                 // $cadena=str_pad(substr($x[$j]->getCedrif(),0,1), 1, ' ', STR_PAD_LEFT).str_pad(substr($x[$j]->getCedrif(),1,9), 10, '0', STR_PAD_LEFT).str_pad(substr($cuentaben, 0,4), 4, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 4,4), 4, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 8,2), 2, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 10,10), 10, ' ', STR_PAD_RIGHT).str_pad($parent, 13, '0', STR_PAD_LEFT).str_pad($decimal, 2, '0', STR_PAD_LEFT).str_pad($x[$j]->getNomben(), 35, ' ', STR_PAD_RIGHT).str_pad($emailpro, 35, ' ', STR_PAD_RIGHT);
                 //Tipo de Persona(1) Rif (9) Cuenta Beneficiario (4-4-2-10) Monto (10-2) Nomben beneficiario (35) 
                 $cadena=str_pad(substr($x[$j]->getCedrif(),0,1), 1, ' ', STR_PAD_LEFT).str_pad(substr($x[$j]->getCedrif(),1,9), 10, '0', STR_PAD_LEFT).str_pad(substr($cuentaben, 0,4), 4, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 4,4), 4, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 8,2), 2, ' ', STR_PAD_RIGHT).str_pad(substr($cuentaben, 10,10), 10, ' ', STR_PAD_RIGHT).str_pad($parent, 10, '0', STR_PAD_LEFT).str_pad($decimal, 2, '0', STR_PAD_LEFT).str_pad($x[$j]->getNomben(), 35, ' ', STR_PAD_RIGHT);
  
                fputs($pagosele,$cadena.chr(10));   

              }
              $j++;
            }
            fclose($pagosele);
          }elseif ($mantxtsacs=='S') {  //SACS
            //Encabezado
            $coddes='';
            //Tipo de Registro. Tipo de Transacción. Código de Descripción. Condición de la Orden de Pago. Número de la Orden (Referencia del Pagado). Fecha de Creación de la Orden de Pago (Fecha del Pagado)
            $cadena=str_pad('01', 2, ' ', STR_PAD_RIGHT).str_pad('SAL', 3, ' ', STR_PAD_RIGHT).str_pad($coddes, 32, ' ', STR_PAD_RIGHT).str_pad('9', 3, ' ', STR_PAD_RIGHT).str_pad(substr($tspagele->getRefpag(),0,8), 35, ' ', STR_PAD_RIGHT).str_pad($tspagele->getFecpag(), 14, ' ', STR_PAD_RIGHT);
            fputs($pagosele,$cadena.chr(10));

            //Débito      
            //Tipo de Registro. Número de Referencia del Débito
             $cadena=str_pad('02', 2, ' ', STR_PAD_RIGHT).str_pad(substr($tspagele->getRefpag(),0,8), 30, ' ', STR_PAD_RIGHT);
              
            //Rif del Ordenante. Nombre del Ordenante. Monto Total a Debitar. Moneda. Campo Libre. Número de Cuenta a Debitar. Cód. Banco Ordenado. Fecha Efectiva del Pago
             if ($tspagele->getFecefepag()!='') {
              $fechaefec=split('-', $tspagele->getFecefepag());
              $fecefepag=$fechaefec[0].$fechaefec[1].$fechaefec[2];
             }else $fecefepag=date('Ymd');
             $cadena=$cadena.str_pad($rifemp, 17, ' ', STR_PAD_LEFT).str_pad($nomemp, 35, ' ', STR_PAD_RIGHT).str_pad($tspagele->getMonpag(), 15, '0', STR_PAD_LEFT).str_pad('VEF', 3, ' ', STR_PAD_RIGHT).str_pad('', 1, ' ', STR_PAD_RIGHT).str_pad($tspagele->getNumcue(), 20, ' ', STR_PAD_RIGHT).str_pad('BANESCO', 11, ' ', STR_PAD_RIGHT).str_pad($fecefepag, 8, ' ', STR_PAD_RIGHT);
             fputs($pagosele,$cadena.chr(10));

            while ($j<count($x))
            {
              if ($tipotxt=="N")
              {
                 $sql="SELECT A.*,b.codbanele FROM nphojint a, npbancos b WHERE cedemp='".$x[$j]->getCedrif()."' and a.codban=b.codban";
                 if (Herramientas::BuscarDatos($sql,$result))
                 {
                      $cuentaban=$result[0]["numcue"];
                      $codigoban="";
                      $codigobanpro=$result[0]["codbanele"];
                      $encontro=strrpos($result[0]["tipcue"], 'Cta Corriente');
                      if ($encontro)
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$result[0]["emaemp"];
                      if ($emailpro=='') $emailpro=' ';
                      $telpro=$result[0]["celemp"];
                      if ($telpro=='') $telpro=' ';                        
                      $tipopago=substr($result[0]["numcue"],0,4);
                      if ($tipopago=="0112") //Identificador del Banco Venezuela
                          $tipopago="425";
                      else $tipopago="42";
                }else {
                   $sql="SELECT * FROM vianoemp  WHERE rifnemp='".$x[$j]->getCedrif()."'";
                   if (Herramientas::BuscarDatos($sql,$result))
                   {
                        $cuentaban=$result[0]["numcueb"];
                        $codigoban="";
                        $codigobanpro=$result[0]["codban"];                        
                        $emailpro=$result[0]["emanemp"];
                        if ($emailpro=='') $emailpro=' ';
                        $telpro=$result[0]["telnemp"];
                        if ($telpro='') $telpro=' ';                        
                        $tipopago=substr($result[0]["numcueb"],0,4);
                        if ($tipopago=="0112") //Identificador del Banco Venezuela
                            $tipopago="425";
                        else $tipopago="42";
                  }
                }
              }else {
                 $r= new Criteria();
                 $r->add(CaproveePeer::RIFPRO,$x[$j]->getCedrif());
                 $registros= CaproveePeer::doSelectOne($r);
                 if ($registros)
                 {
                      $cuentaban=$registros->getNumcue();
                      $codigoban=$registros->getCodban();                    
                      if ($registros->getCodtip()=='00')
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$registros->getEmail();
                      if ($emailpro=='') $emailpro=' ';
                      $telpro=$registros->getTelpro();
                      if ($telpro='') $telpro=' ';
                      $tipopago=substr($registros->getNumcue(),0,4);
                      if ($tipopago=="0112") //Identificador del Banco Venezuela
                          $tipopago="425";
                      else $tipopago="42";
                      $codigobanpro=H::getX_vacio('Codban', 'Cabanco', 'Codpagele', $codigoban);
                 }
              }
              //Créditos
              //Tipo de Registro. Número de recibo (Ref. del Pagado).             
              $cadena=str_pad('03', 2, ' ', STR_PAD_RIGHT).str_pad(substr($tspagele->getRefpag(),0,8), 30, ' ', STR_PAD_RIGHT);

              //Monto a Pagar. Moneda. Número de Cuenta del Beneficiario. Banco del Beneficiario. Código de Agencia
              $cadena=$cadena.str_pad($x[$j]->getMonord(), 15, '0', STR_PAD_LEFT).str_pad('VEF', 3, ' ', STR_PAD_RIGHT).str_pad($cuentaban, 30, ' ', STR_PAD_RIGHT).str_pad($codigobanpro, 11, '0', STR_PAD_RIGHT).str_pad('', 3, ' ', STR_PAD_RIGHT);
              
              //CI Beneficiario. Nombre del Beneficiario. Correo Electrónico del Beneficiario. Nro de Telefóno del Beneficiario              
              $cadena=$cadena.str_pad($x[$j]->getCedrif(), 17, ' ', STR_PAD_LEFT).str_pad($x[$j]->getNomben(), 70, ' ', STR_PAD_RIGHT).str_pad($emailpro, 70, ' ', STR_PAD_RIGHT).str_pad($telpro, 25, ' ', STR_PAD_RIGHT);
              
              //CI Persona Contanto. Nombre Persona Contanto. Calificador de Fideicomiso. Ficha del Empleado. Tipo de Nómina. Ubicación Geográfica. Forma de Pago (42 o 425).
              $cadena=$cadena.str_pad('', 17, ' ', STR_PAD_RIGHT).str_pad('', 35, ' ', STR_PAD_RIGHT).str_pad('', 1, ' ', STR_PAD_RIGHT).str_pad('', 30, ' ', STR_PAD_RIGHT).str_pad('', 2, ' ', STR_PAD_RIGHT).str_pad('', 21, ' ', STR_PAD_RIGHT).str_pad($tipopago, 3, ' ', STR_PAD_RIGHT);
                  
              fputs($pagosele,$cadena.chr(10));              
              $j++;
            }
            fclose($pagosele);
          }elseif ($mantxtumbv=='S'){ //UMBV
            //Encabezado                        
            //Número de Cuenta de la Empresa. Fecha de la Nómina. Monto General de la Nómina. Total Registros en Archivos
             if ($tspagele->getFecefepag()!='') {
              $fechaefec=split('-', $tspagele->getFecefepag());
              $fecefepag=$fechaefec[0].$fechaefec[1].$fechaefec[2];
             }else $fecefepag=date('Ymd');
             $cadena=str_pad($tspagele->getNumcue(), 20, ' ', STR_PAD_RIGHT).str_pad($fecefepag, 8, ' ', STR_PAD_RIGHT).str_pad($tspagele->getMonpag(), 17, '0', STR_PAD_LEFT).str_pad(count($x), 4, '0', STR_PAD_LEFT);
             fputs($pagosele,$cadena.chr(10));

             while ($j<count($x))
            {
              if ($tipotxt=="N")
              {
                 $sql="SELECT A.*,b.codbanele FROM nphojint a, npbancos b WHERE cedemp='".$x[$j]->getCedrif()."' and a.codban=b.codban";
                 if (Herramientas::BuscarDatos($sql,$result))
                 {
                      $cuentaban=$result[0]["numcue"];
                      $codigoban="";
                      $codigobanpro=$result[0]["codbanele"];
                      $encontro=strrpos($result[0]["tipcue"], 'Cta Corriente');
                      if ($encontro)
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$result[0]["emaemp"];
                      if ($emailpro=='') $emailpro=' ';
                      $telpro=$result[0]["celemp"];
                      if ($telpro=='') $telpro=' ';                        
                      $tipopago=substr($result[0]["numcue"],0,4);
                      if ($tipopago=="0112") //Identificador del Banco Venezuela
                          $tipopago="425";
                      else $tipopago="42";
                }else {
                   $sql="SELECT * FROM vianoemp  WHERE rifnemp='".$x[$j]->getCedrif()."'";
                   if (Herramientas::BuscarDatos($sql,$result))
                   {
                        $cuentaban=$result[0]["numcueb"];
                        $codigoban="";
                        $codigobanpro=$result[0]["codban"];                        
                        $emailpro=$result[0]["emanemp"];
                        if ($emailpro=='') $emailpro=' ';
                        $telpro=$result[0]["telnemp"];
                        if ($telpro='') $telpro=' ';                        
                        $tipopago=substr($result[0]["numcueb"],0,4);
                        if ($tipopago=="0112") //Identificador del Banco Venezuela
                            $tipopago="425";
                        else $tipopago="42";
                  }
                }
              }else {
                 $r= new Criteria();
                 $r->add(CaproveePeer::RIFPRO,$x[$j]->getCedrif());
                 $registros= CaproveePeer::doSelectOne($r);
                 if ($registros)
                 {
                      $cuentaban=$registros->getNumcue();
                      $codigoban=$registros->getCodban();                    
                      if ($registros->getCodtip()=='00')
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$registros->getEmail();
                      if ($emailpro=='') $emailpro=' ';
                      $telpro=$registros->getTelpro();
                      if ($telpro='') $telpro=' ';
                      $tipopago=substr($registros->getNumcue(),0,4);
                      if ($tipopago=="0112") //Identificador del Banco Venezuela
                          $tipopago="425";
                      else $tipopago="42";
                      $codigobanpro=H::getX_vacio('Codban', 'Cabanco', 'Codpagele', $codigoban);
                 }
              }
              //Número de Empresa. Monto para Abonar/debitado.Número de Cuenta del Nominante.Cédula. Campo relleno con ceros5. Tipo de Proceso I/O.Campo relleno con ceros 2
              $cadena=str_pad('0513', 4, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getMonord(), 12, '0', STR_PAD_LEFT).str_pad($cuentaban, 20, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getCedrif(), 10, ' ', STR_PAD_LEFT).str_pad('', 5, '0', STR_PAD_RIGHT).str_pad('0', 1, '', STR_PAD_RIGHT).str_pad('', 2, '0', STR_PAD_RIGHT);
                             
              fputs($pagosele,$cadena.chr(10));              
              $j++;
            }

             fclose($pagosele);
          }else if ($mantxtsecr=='S'){ // TXT de Secretaria
              $cadena=str_pad('HEADER', 8, ' ', STR_PAD_RIGHT).str_pad(substr($tspagele->getRefpag(),0,8), 8, ' ', STR_PAD_RIGHT).str_pad($numneg, 8, ' ', STR_PAD_RIGHT).str_pad($rifemp, 10, ' ', STR_PAD_RIGHT).date('d/m/Y');
              fputs($pagosele,$cadena.chr(10));
              while ($j<count($x))
              {
                $cadena=str_pad('DEBITO', 8, ' ', STR_PAD_RIGHT); 
                if ($x[$j]->getRefmovlib()=="")
                   $cadena=$cadena.str_pad(substr($x[$j]->getRefpag(),0,8),8,' ',STR_PAD_RIGHT);
                else $cadena=$cadena.str_pad(substr($x[$j]->getRefmovlib(),0,8),8,' ',STR_PAD_RIGHT);
                
                $cadena=$cadena.str_pad($rifemp, 10, ' ', STR_PAD_LEFT).str_pad($nomemp, 35, ' ', STR_PAD_RIGHT).date('d/m/Y').'00'.str_pad($tspagele->getNumcue(), 20, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getMonord(), 18, '0', STR_PAD_LEFT).'VEB'.'40';
                fputs($pagosele,$cadena.chr(10));               
                

                $k= new Criteria(); 
                $k->add(OpdetbenopPeer::NUMORD,$x[$j]->getNumord());
                $regk= OpdetbenopPeer::doSelect($k);
                if ($regk){
                  foreach ($regk as $objk) {
                      if ($tipotxt=="N")
                      {
                         $sql="SELECT A.*,b.codbanele FROM nphojint a, npbancos b WHERE cedemp='".$objk->getCedrif()."' and a.codban=b.codban";
                         if (Herramientas::BuscarDatos($sql,$result))
                         {
                              $cuentaban=$result[0]["numcue"];
                              $codigoban="";
                              $codigobanpro=$result[0]["codbanele"];
                              $encontro=strrpos($result[0]["tipcue"], 'Cta Corriente');
                              if ($encontro)
                              {
                                $tipocta='00';
                              }else {
                                $tipocta='01';  
                              }
                              $emailpro=$result[0]["emaemp"];                      
                              $tipopago=substr($result[0]["numcue"],0,4);
                              if ($tipopago=="0112") //Identificador del Banco Venezuela
                                  $tipopago="10";
                              else $tipopago="00";
                              $nacionalidad=$result[0]["nacemp"];
                         }
                      }else {
                         $r= new Criteria();
                         $r->add(CaproveePeer::RIFPRO,$objk->getCedrif());
                         $registros= CaproveePeer::doSelectOne($r);
                         if ($registros)
                         {
                              $cuentaban=$registros->getNumcue();
                              $codigoban=$registros->getCodban();                    
                              if ($registros->getCodtip()=='00')
                              {
                                $tipocta='00';
                              }else {
                                $tipocta='01';  
                              }
                              $emailpro=$registros->getEmail();
                              $tipopago=substr($registros->getNumcue(),0,4);
                              if ($tipopago=="0112") //Identificador del Banco Venezuela
                                  $tipopago="10";
                              else $tipopago="00";
                              $nacionalidad=$registros->getNacpro();
                              $codigobanpro=H::getX_vacio('Codban', 'Cabanco', 'Codpagele', $codigoban);
                         }
                      }                
                      $cadena=str_pad('CREDITO', 8, ' ', STR_PAD_RIGHT); 
                      $cadena=$cadena.str_pad(substr($x[$j]->getRefmovlib(),0,8),8,' ',STR_PAD_RIGHT);      
                      
                      if (substr($objk->getCedrif(),0,1)=='J' || substr($objk->getCedrif(),0,1)=='V' || substr($objk->getCedrif(),0,1)=='E' || substr($objk->getCedrif(),0,1)=='P')
                          $cadena=$cadena.substr($objk->getCedrif(),0,1).str_pad(substr($objk->getCedrif(),1,9), 9, '0', STR_PAD_LEFT);
                      else
                          $cadena=$cadena.'V'.str_pad($objk->getCedrif(), 9, '0', STR_PAD_LEFT);
                      
                      $cadena=$cadena.str_pad(H::getX_vacio('CEDRIF','Opbenefi','Nomben',$objk->getCedrif()), 30, ' ', STR_PAD_RIGHT).$tipocta.str_pad($cuentaban, 20, ' ', STR_PAD_RIGHT);
                      $cadena=$cadena.str_pad($objk->getMonben(), 18, '0', STR_PAD_LEFT).$tipopago.str_pad($codigobanpro, 12, '0', STR_PAD_RIGHT).'000'.'0000';
                      if ($emailpro!="")
                          $cadena=$cadena.str_pad($emailpro, 50, ' ', STR_PAD_RIGHT);
                      else
                          $cadena=$cadena.str_pad(' ', 50, ' ', STR_PAD_RIGHT);
                          
                      fputs($pagosele,$cadena.chr(10));                    
                  }
                }else {
                  if ($tipotxt=="N")
                  {
                     $sql="SELECT A.*,b.codbanele FROM nphojint a, npbancos b WHERE cedemp='".$x[$j]->getCedrif()."' and a.codban=b.codban";
                     if (Herramientas::BuscarDatos($sql,$result))
                     {
                          $cuentaban=$result[0]["numcue"];
                          $codigoban="";
                          $codigobanpro=$result[0]["codbanele"];
                          $encontro=strrpos($result[0]["tipcue"], 'Cta Corriente');
                          if ($encontro)
                          {
                            $tipocta='00';
                          }else {
                            $tipocta='01';  
                          }
                          $emailpro=$result[0]["emaemp"];                      
                          $tipopago=substr($result[0]["numcue"],0,4);
                          if ($tipopago=="0112") //Identificador del Banco Venezuela
                              $tipopago="10";
                          else $tipopago="00";
                          $nacionalidad=$result[0]["nacemp"];
                     }
                  }else {
                     $r= new Criteria();
                     $r->add(CaproveePeer::RIFPRO,$x[$j]->getCedrif());
                     $registros= CaproveePeer::doSelectOne($r);
                     if ($registros)
                     {
                          $cuentaban=$registros->getNumcue();
                          $codigoban=$registros->getCodban();                    
                          if ($registros->getCodtip()=='00')
                          {
                            $tipocta='00';
                          }else {
                            $tipocta='01';  
                          }
                          $emailpro=$registros->getEmail();
                          $tipopago=substr($registros->getNumcue(),0,4);
                          if ($tipopago=="0112") //Identificador del Banco Venezuela
                              $tipopago="10";
                          else $tipopago="00";
                          $nacionalidad=$registros->getNacpro();
                          $codigobanpro=H::getX_vacio('Codban', 'Cabanco', 'Codpagele', $codigoban);
                     }
                  }
                                    
                  $cadena=str_pad('CREDITO', 8, ' ', STR_PAD_RIGHT); 
                  $cadena=$cadena.str_pad(substr($x[$j]->getRefmovlib(),0,8),8,' ',STR_PAD_RIGHT);
                  
                  if (substr($x[$j]->getCedrif(),0,1)=='J' || substr($x[$j]->getCedrif(),0,1)=='V' || substr($x[$j]->getCedrif(),0,1)=='E' || substr($x[$j]->getCedrif(),0,1)=='P')
                      $cadena=$cadena.substr($x[$j]->getCedrif(),0,1).str_pad(substr($x[$j]->getCedrif(),1,9), 9, '0', STR_PAD_LEFT);
                  else
                      $cadena=$cadena.'V'.str_pad($x[$j]->getCedrif(), 9, '0', STR_PAD_LEFT);
                  
                  $cadena=$cadena.str_pad($x[$j]->getNomben(), 30, ' ', STR_PAD_RIGHT).$tipocta.str_pad($cuentaban, 20, ' ', STR_PAD_RIGHT);
                  $cadena=$cadena.str_pad($x[$j]->getMonord(), 18, '0', STR_PAD_LEFT).$tipopago.str_pad($codigobanpro, 12, '0', STR_PAD_RIGHT).'000'.'0000';
                  if ($emailpro!="")
                      $cadena=$cadena.str_pad($emailpro, 50, ' ', STR_PAD_RIGHT);
                  else
                      $cadena=$cadena.str_pad(' ', 50, ' ', STR_PAD_RIGHT);
                      
                  fputs($pagosele,$cadena.chr(10));
              }
                
                $j++;
              }
              
              $veces=0;
              $veces=$j;
              $cadena=str_pad('TOTAL', 8, ' ', STR_PAD_RIGHT).str_pad($veces, 5, '0', STR_PAD_LEFT).str_pad($veces, 5, '0', STR_PAD_LEFT).str_pad($tspagele->getMonpag(), 18, '0', STR_PAD_LEFT); 
              fputs($pagosele,$cadena.chr(10));
              fclose($pagosele);
          }elseif ($mantxtproal=='S') {  // TXT FUNDAPROAL
            $agenban="";
            $durche=0;
            //Encabezado
            if ($tspagele->getFecefepag()!='') {
              $fechaefec=split('-', $tspagele->getFecefepag());
              $fecefepag=$fechaefec[2].'/'.$fechaefec[1].'/'.$fechaefec[0];
             }else $fecefepag=date('d/m/Y');

            //Identificador del Registro. Número referencia del lote. Número Negociación. R.I.F de la Empresa Ordenante. Fecha Propuesta de Pago(dd/mm/aaaa). Fecha de Envío (dd/mm/aaaa)
            $cadena=str_pad('HEADER', 8, ' ', STR_PAD_RIGHT).str_pad(substr($tspagele->getRefpag(),0,8), 8, ' ', STR_PAD_RIGHT).str_pad($numneg, 8, ' ', STR_PAD_RIGHT).str_pad($rifemp, 10, ' ', STR_PAD_LEFT).str_pad($tspagele->getFecpag(), 10, ' ', STR_PAD_RIGHT).str_pad($fecefepag, 10, ' ', STR_PAD_RIGHT);
            fputs($pagosele,$cadena.chr(10));

            //Débito      
            //Identificador del Registro. Número de Referencia del Debito
             $cadena=str_pad('DEBITO', 8, ' ', STR_PAD_RIGHT).str_pad(substr($tspagele->getRefpag(),0,8), 8, ' ', STR_PAD_RIGHT);
            //R.I.F de la Empresa Ordenante. Nombre Ordenante. Fecha Valor (dd/mm/aaaa).Tipo de cuenta. Número de Cuenta. Monto. Moneda. Tipo de Pago
             $cadena=$cadena.str_pad($rifemp, 10, ' ', STR_PAD_LEFT).str_pad($nomemp, 35, ' ', STR_PAD_RIGHT).str_pad($fecefepag, 10, ' ', STR_PAD_RIGHT).'00'.str_pad($tspagele->getNumcue(), 20, ' ', STR_PAD_RIGHT).str_pad($tspagele->getMonpag(), 18, '0', STR_PAD_LEFT).'VEB'.'40';
             fputs($pagosele,$cadena.chr(10));

            while ($j<count($x))
            {
              if ($tipotxt=="N")
              {
                 $sql="SELECT A.*,b.codbanele FROM nphojint a, npbancos b WHERE cedemp='".$x[$j]->getCedrif()."' and a.codban=b.codban";
                 if (Herramientas::BuscarDatos($sql,$result))
                 {
                      $cuentaban=$result[0]["numcue"];
                      $codigobanpro=$result[0]["codbanele"];
                      $encontro=strrpos($result[0]["tipcue"], 'Cta Corriente');
                      if ($encontro)
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$result[0]["emaemp"];
                      if ($emailpro=='') $emailpro=' ';
                      $tipopago=substr($result[0]["numcue"],0,4);
                      if ($tipopago=="0102") //Identificador del Banco Venezuela
                        $tipopago="10";
                      else if ($tipopago=="0110") 
                        $tipopago="20";
                      else $tipopago="00";

                      if ($tipopago=='20'){
                          $agenban='0521';
                          $durche=120;
                      }
                }else {
                   $sql="SELECT * FROM vianoemp  WHERE rifnemp='".$x[$j]->getCedrif()."'";
                   if (Herramientas::BuscarDatos($sql,$result))
                   {
                        $cuentaban=$result[0]["numcueb"];
                        $codigobanpro=$result[0]["codban"];                        
                        $emailpro=$result[0]["emanemp"];
                        if ($emailpro=='') $emailpro=' ';
                        $tipopago=substr($result[0]["numcueb"],0,4);
                        if ($tipopago=="0102") //Identificador del Banco Venezuela
                          $tipopago="10";
                        else if ($tipopago=="0110") 
                          $tipopago="20";
                        else $tipopago="00";

                        if ($tipopago=='20'){
                          $agenban='0521';
                          $durche=120;
                        }
                  }
                }
              }else {
                 $r= new Criteria();
                 $r->add(CaproveePeer::RIFPRO,$x[$j]->getCedrif());
                 $registros= CaproveePeer::doSelectOne($r);
                 if ($registros)
                 {
                      $cuentaban=$registros->getNumcue();          
                      $codigobanpro=H::getX_vacio('Codban', 'Cabanco', 'Codpagele', $codigoban);
                      if ($registros->getCodtip()=='00')
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$registros->getEmail();
                      if ($emailpro=='') $emailpro=' ';                     
                      $tipopago=substr($registros->getNumcue(),0,4);
                       if ($tipopago=="0102") //Identificador del Banco Venezuela
                          $tipopago="10";
                        else if ($tipopago=="0110") 
                          $tipopago="20";
                        else $tipopago="00";
                      
                      if ($tipopago=='20'){
                          $agenban='0521';
                          $durche=120;
                        }
                 }
              }
              //Créditos
              //Identificador del Registro. Número de Referencia del Crédito             
              $cadena=str_pad('CREDITO', 8, ' ', STR_PAD_RIGHT).str_pad(substr($tspagele->getRefpag(),0,8), 8, ' ', STR_PAD_RIGHT);
              //R.I.F/C.I. del Beneficiario. Nombre del Beneficiario. Tipo de cuenta.Número de Cuenta. Monto. Tipo de pago. Banco. Duración del Cheque .Agencia Bancaria. Correo Electrónico del Beneficiario.        
              $cadena=$cadena.str_pad($x[$j]->getCedrif(), 10, ' ', STR_PAD_LEFT).str_pad($x[$j]->getNomben(), 30, ' ', STR_PAD_RIGHT).$tipocta.str_pad($cuentaban, 20, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getMonord(), 18, '0', STR_PAD_LEFT).$tipopago.str_pad($codigobanpro, 12, '0', STR_PAD_RIGHT).str_pad($durche, 3, '0', STR_PAD_LEFT).str_pad($agenban, 4, ' ', STR_PAD_RIGHT).str_pad($emailpro, 50, ' ', STR_PAD_RIGHT);
              fputs($pagosele,$cadena.chr(10));              
              $j++;
            }
            fclose($pagosele);
          }elseif ($mantxtfontur=='S'){ // TXT Fontur
            //Encabezado
            if ($tspagele->getFecefepag()!='') {
              $fechaefec=split('-', $tspagele->getFecefepag());
              $fecefepag=$fechaefec[2].'/'.$fechaefec[1].'/'.substr($fechaefec[0],2,2);
            }else $fecefepag=date('d/m/y');
            $monstr=(string)$tspagele->getMonpag();
            $aux=explode('.', $monstr);
            if (count($aux)>1)
            {
              $parent=$aux[0];
              $decimal=str_pad($aux[1], 2, '0', STR_PAD_RIGHT);
            }else {
              $parent=$monstr;
              $decimal='00';
            }  
            //Header. 
            $cadena=str_pad('H', 1, ' ', STR_PAD_RIGHT).str_pad($nomemp, 40, ' ', STR_PAD_RIGHT).str_pad($tspagele->getNumcue(), 20, ' ', STR_PAD_RIGHT).str_pad(1, 2, '0', STR_PAD_LEFT).str_pad($fecefepag, 8, ' ', STR_PAD_RIGHT).str_pad($parent, 11, '0', STR_PAD_LEFT).str_pad($decimal, 2, '0', STR_PAD_LEFT).'03291'.' ';
            fputs($pagosele,$cadena.chr(10));
            $cuentaban=$tipocta=$tipopago='';
            while ($j<count($x))
            {
              if ($tipotxt=="N")
              {
                 $sql="SELECT A.*,b.codbanele FROM nphojint a, npbancos b WHERE cedemp='".$x[$j]->getCedrif()."' and a.codban=b.codban";
                 if (Herramientas::BuscarDatos($sql,$result))
                 {
                      $cuentaban=$result[0]["numcue"];
                      $encontro=strrpos($result[0]["tipcue"], 'Cta Corriente');
                      if ($encontro)
                      {
                        $tipocta='0';
                      }else {
                        $tipocta='1';  
                      }
                      if ($encontro) 
                        $tipopago="0770";
                      else $tipopago="1770";
                 }
              }else {
                 /*$r= new Criteria();
                 $r->add(CaproveePeer::RIFPRO,$x[$j]->getCedrif());
                 $registros= CaproveePeer::doSelectOne($r);
                 if ($registros)
                 {
                      $cuentaban=$registros->getNumcue();              
                      if ($registros->getCodtip()=='00')
                      {
                        $tipocta='0';
                      }else {
                        $tipocta='1';  
                      }
                      if ($registros->getCodtip()=='00')
                        $tipopago="0770";
                      else $tipopago="1770";
                 }*/
                 $r= new Criteria();
                 $r->add(OpbenefiPeer::CEDRIF,$x[$j]->getCedrif());
                 $registros= OpbenefiPeer::doSelectOne($r);
                 if ($registros)
                 {
                      $cuentaban=$registros->getNumcueb();  
                      $encontro=strrpos(H::getX_vacio('CODTIP','Tstipcue','Destip',$registros->getCodtipban()), 'Corriente');            
                      if ($encontro)
                      {
                        $tipocta='0';
                      }else {
                        $tipocta='1';  
                      }
                      if ($encontro)
                        $tipopago="0770";
                      else $tipopago="1770";
                 }                 
              }

              $monstr=(string)$x[$j]->getMonord();
              $aux=explode('.', $monstr);
              if (count($aux)>1)
              {
                $parent=$aux[0];
                $decimal=str_pad($aux[1], 2, '0', STR_PAD_RIGHT);
              }else {
                $parent=$monstr;
                $decimal='00';
              }   

              $cadena=str_pad($tipocta, 1, '0', STR_PAD_LEFT).str_pad($cuentaban,20,' ',STR_PAD_RIGHT).str_pad($parent, 9, '0', STR_PAD_LEFT).str_pad($decimal, 2, '0', STR_PAD_LEFT).str_pad($tipopago, 4, ' ', STR_PAD_RIGHT).str_pad(H::normaliza($x[$j]->getNomben()), 40, ' ', STR_PAD_RIGHT); 
              $cadena=$cadena.str_pad($x[$j]->getCedrif(), 10, '0', STR_PAD_LEFT).'003291'.'  ';            
              fputs($pagosele,$cadena.chr(10));              
              $j++;
            }           
            fclose($pagosele);
        }else { //Otros
            $cadena=str_pad('HEADER', 8, ' ', STR_PAD_RIGHT).str_pad(substr($tspagele->getRefpag(),0,8), 8, ' ', STR_PAD_RIGHT).str_pad($numneg, 8, ' ', STR_PAD_RIGHT).str_pad($rifemp, 10, ' ', STR_PAD_RIGHT).date('d/m/Y');
            fputs($pagosele,$cadena.chr(10));
            while ($j<count($x))
            {
              if ($tipotxt=="N")
              {
                 $sql="SELECT A.*,b.codbanele FROM nphojint a, npbancos b WHERE cedemp='".$x[$j]->getCedrif()."' and a.codban=b.codban";
                 if (Herramientas::BuscarDatos($sql,$result))
  	             {
                      $cuentaban=$result[0]["numcue"];
                      $codigoban="";
                      $codigobanpro=$result[0]["codbanele"];
                      $encontro=strrpos($result[0]["tipcue"], 'Cta Corriente');
                      if ($encontro)
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$result[0]["emaemp"];                      
                      $tipopago=substr($result[0]["numcue"],0,4);
                      if ($tipopago=="0112") //Identificador del Banco Venezuela
                          $tipopago="10";
                      else $tipopago="00";
                      $nacionalidad=$result[0]["nacemp"];
                 }
              }else {
                 $r= new Criteria();
                 $r->add(CaproveePeer::RIFPRO,$x[$j]->getCedrif());
                 $registros= CaproveePeer::doSelectOne($r);
                 if ($registros)
                 {
                      $cuentaban=$registros->getNumcue();
                      $codigoban=$registros->getCodban();                    
                      if ($registros->getCodtip()=='00')
                      {
                        $tipocta='00';
                      }else {
                        $tipocta='01';  
                      }
                      $emailpro=$registros->getEmail();
                      $tipopago=substr($registros->getNumcue(),0,4);
                      if ($tipopago=="0112") //Identificador del Banco Venezuela
                          $tipopago="10";
                      else $tipopago="00";
                      $nacionalidad=$registros->getNacpro();
                      $codigobanpro=H::getX_vacio('Codban', 'Cabanco', 'Codpagele', $codigoban);
                 }
              }
              $cadena=str_pad('DEBITO', 8, ' ', STR_PAD_RIGHT); 
              if ($x[$j]->getRefmovlib()=="")
                 $cadena=$cadena.str_pad(substr($x[$j]->getRefpag(),0,8),8,' ',STR_PAD_RIGHT);
              else $cadena=$cadena.str_pad(substr($x[$j]->getRefmovlib(),0,8),8,' ',STR_PAD_RIGHT);
              
              $cadena=$cadena.str_pad($rifemp, 10, ' ', STR_PAD_LEFT).str_pad($nomemp, 35, ' ', STR_PAD_RIGHT).date('d/m/Y').'00'.str_pad($tspagele->getNumcue(), 20, ' ', STR_PAD_RIGHT).str_pad($x[$j]->getMonord(), 18, '0', STR_PAD_LEFT).'VEB'.'40';
              fputs($pagosele,$cadena.chr(10));
              
              $cadena=str_pad('CREDITO', 8, ' ', STR_PAD_RIGHT); 
              $cadena=$cadena.str_pad(substr($x[$j]->getRefmovlib(),0,8),8,' ',STR_PAD_RIGHT);
              
              if (substr($x[$j]->getCedrif(),0,1)=='J' || substr($x[$j]->getCedrif(),0,1)=='V' || substr($x[$j]->getCedrif(),0,1)=='E' || substr($x[$j]->getCedrif(),0,1)=='P')
                  $cadena=$cadena.substr($x[$j]->getCedrif(),0,1).str_pad(substr($x[$j]->getCedrif(),1,9), 9, '0', STR_PAD_LEFT);
              else
                  $cadena=$cadena.'V'.str_pad($x[$j]->getCedrif(), 9, '0', STR_PAD_LEFT);
              
              $cadena=$cadena.str_pad($x[$j]->getNomben(), 30, ' ', STR_PAD_RIGHT).$tipocta.str_pad($cuentaban, 20, ' ', STR_PAD_RIGHT);
              $cadena=$cadena.str_pad($x[$j]->getMonord(), 18, '0', STR_PAD_LEFT).$tipopago.str_pad($codigobanpro, 12, '0', STR_PAD_RIGHT).'000'.'0000';
              if ($emailpro!="")
                  $cadena=$cadena.str_pad($emailpro, 50, ' ', STR_PAD_RIGHT);
              else
                  $cadena=$cadena.str_pad(' ', 50, ' ', STR_PAD_RIGHT);
                  
              fputs($pagosele,$cadena.chr(10));
              
              $j++;
            }
            
            $veces=0;
            $veces=$j;
            $cadena=str_pad('TOTAL', 8, ' ', STR_PAD_RIGHT).str_pad($veces, 5, '0', STR_PAD_LEFT).str_pad($veces, 5, '0', STR_PAD_LEFT).str_pad($tspagele->getMonpag(), 18, '0', STR_PAD_LEFT); 
            fputs($pagosele,$cadena.chr(10));
            fclose($pagosele);
        }

          return $dir;      
  }

  public static function verificarTransferencia($numcue,$reflib,$tipmov)
  {
    //Verificar si es el movimiento origen
      $t= new Criteria();
      $t->add(TsmovtraPeer::CTAORI,$numcue);
      $t->add(TsmovtraPeer::REFTRA,$reflib);
      $t->add(TsmovtraPeer::TIPMOVHAST,$tipmov);
      $regt= TsmovtraPeer::doSelectOne($t);
      if ($regt) return true;
      else {  //Verificar si es el movimiento Destino
        $q= new Criteria();
        $q->add(TsmovtraPeer::CTADES,$numcue);
        $q->add(TsmovtraPeer::REFTRA,$reflib);
        $q->add(TsmovtraPeer::TIPMOVDESD,$tipmov);
        $regq= TsmovtraPeer::doSelectOne($q);
        if ($regq) return true;
      }
    return false;
  }

  public static function FormarArreImp2($cadenasal)
  {
    $arregloimp=array();
    $j=0;
    $arre=split('/',$cadenasal);
    $ind=count($arre)-1;
    $p=1;
    while ($p<=$ind)
    {
      $sql = "Select A.Codcat||'-'||B.CodPar as codpre,Sum(A.MonSal) as moncom, A.refsal as refsal, '' as id From TSDetSal A,CARegArt B Where A.RefSal='".$arre[$p]."' And A.CodArt=B.CodArt Group By A.Codcat,B.CodPar,A.refsal";
      if (Herramientas :: BuscarDatos($sql, $reg)){      
         $i=0;
         while ($i<count($reg)) {

          $j=count($arregloimp)+1;
          $arregloimp[$j-1]["codpre"]=$reg[$i]["codpre"];
          $arregloimp[$j-1]["moncom"]=number_format($reg[$i]["moncom"],2,',','.');
          $arregloimp[$j-1]["refsal"]=$reg[$i]["refsal"];
          $arregloimp[$j-1]["id"]=$reg[$i]["id"];
          $i++;
         }
      }
      $p++;
    }
    return $arregloimp;
  }

   public static function ArreglodetCierre($grid)
  {
    $arreglodet=array();
    $x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
        $pos=self::posicion_en_el_grid($arreglodet,$x[$j]["codpre"]);
        if ($pos==0)
        {
         $l=count($arreglodet)+1;
         $arreglodet[$l-1]["codpre"]=$x[$j]["codpre"];
         $arreglodet[$l-1]["moncom"]=$x[$j]["moncom"];
         $arreglodet[$l-1]["refsal"]=$x[$j]["refsal"];
        }
        else
        {
          $valor=H::toFloat($arreglodet[$pos-1]["moncom"]);
          $arreglodet[$pos-1]["moncom"]=($valor+$x[$j]["moncom"]);
          $arreglodet[$pos-1]["refsal"]=$x[$j]["refsal"].",".$arreglodet[$pos-1]["refsal"];
        }

        $j++;
    }

    return $arreglodet;
  }

  public static function validarDisponibilidadPresuCajChi2($grid,$afecta,&$codigo,$perhas='12')
  {
    $validardisponibilidad=true;
    $arreglo=self::ArreglodetCierre($grid);
    $j=0;
    while ($j<count($arreglo))
    {
     $codigo=$arreglo[$j]["codpre"];
     if (!OrdendePago::montoValido($j,H::toFloat($arreglo[$j]["moncom"]),'N',$codigo,$afecta,$msj,$mondis,$sobregiro,$perhas))
     {
      $validardisponibilidad=false;
      break;
     }
     $j++;
    }
    return $validardisponibilidad;
  }

  public static function salvarCierreCajaChica($clasemodelo,$grid,$grid1)
  {
    $ciegenpag=H::getConfApp2('ciegenpag', 'tesoreria', 'tesciecajchi');
    self::grabarCierre($clasemodelo,$grid);
    if ($ciegenpag!='S')
      self::generarCompromisoCierre($clasemodelo,$grid);
    else {
      if ($clasemodelo->getSujren()=='S'){
        //self::generaComprobanteCierre($clasemodelo,$grid);
        self::generarPagadoCierre($clasemodelo,$grid);
      }else {
        //self::generaComprobanteCierre($clasemodelo,$grid);
        self::generarPagadoCierre($clasemodelo,$grid);
        $monape=H::getX_vacio('CODCAJ','Tsdefcajchi','Monape',$clasemodelo->getCodcajchi());
        if (H::toFloat($clasemodelo->getMoncie())>H::toFloat($monape))
        self::generarOPFinancieraCierre($clasemodelo,$grid);
      }
    }
    
    
    //Actualizar el estatus de las Salidas
    $x=$grid1[0];
    $j=0;
    while ($j<count($x))
    {
      if ($x[$j]->getCheck()=='1'){
        $a= new Criteria();
        $a->add(TssalcajPeer::REFSAL,$x[$j]->getRefsal());
        $data= TssalcajPeer::doSelectOne($a);
        if ($data)
        {
         $data->setStasal('R');
         $data->save();
        }
      }
      $j++;
    }

    return -1;

  }  

  public static function grabarCierre($clasemodelo,$grid){
    if ($clasemodelo->getNumref()=='########')
    {
       if (Herramientas::getVerCorrelativo('corciecaj','opdefemp',$r))
       {
         $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpciecajPeer::NUMREF,$numero);
          $resul= OpciecajPeer::doSelectOne($c);
          if ($resul)
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $clasemodelo->setNumref($numero);
      }
     H::getSalvarCorrelativo('corciecaj','opdefemp','Referencia',$r,$msg);
    }
    else
    {
      $clasemodelo->setNumref(str_replace('#','0',$clasemodelo->getNumref()));
    }

    $b= new Criteria();
    $b->add(TsdefcajchiPeer::CODCAJ,$clasemodelo->getCodcajchi());
    $dat=TsdefcajchiPeer::doSelectOne($b);
    if ($dat)
    {
      $clasemodelo->setTipcom($dat->getTipcom());
      $clasemodelo->setCedrif($dat->getCedrif());
      $clasemodelo->setTippag($dat->getTippag());
      $clasemodelo->setSujren($dat->getSujren());
      $clasemodelo->setMonape($dat->getMonape());
      $clasemodelo->setCtapag($dat->getCtapag());
    }
    $clasemodelo->setLoguse(sfContext::getInstance()->getUser()->getAttribute('loguse'));
    $clasemodelo->save();

    //Grabar el detalle

    $referencia=$clasemodelo->getNumref();
    $arreglo=self::ArreglodetCierre($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='')
      {
        $opdetciecaj= new Opdetciecaj();
        $opdetciecaj->setNumref($referencia);
        $opdetciecaj->setCodpre($arreglo[$j]["codpre"]);
        $opdetciecaj->setMoncom($arreglo[$j]["moncom"]);
        $opdetciecaj->setRefsal($arreglo[$j]["refsal"]);
        $opdetciecaj->save();
      }
      $j++;
    }

  }

  public static function generarCompromisoCierre(&$clasemodelo,$grid) {
    if (Herramientas::getVerCorrelativo('corcom','cpdefniv',$r))
    { 
      $encontrado=false;
      while (!$encontrado)
      {
        $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
        $sql="select refcom from cpcompro where refcom='".$numero."'";
        if (Herramientas::BuscarDatos($sql,$result))
        {
          $r=$r+1;
        }
        else
        {
          $encontrado=true;
        }
      }
      $cpcompro = new Cpcompro();
      $cpcompro->setRefcom(str_pad($r, 8, '0', STR_PAD_LEFT));
      $cpcompro->setTipcom($clasemodelo->getTipcom());
      $cpcompro->setCedrif($clasemodelo->getCedrif());
      $cpcompro->setFeccom($clasemodelo->getFeccie());
      $cpcompro->setAnocom(substr($clasemodelo->getFeccie(), 0, 4));
      $cpcompro->setRefprc('NULO');
      $cpcompro->setTipprc(null);
      $cpcompro->setDescom($clasemodelo->getDescon());
      $cpcompro->setDesanu(null);
      $cpcompro->setMoncom($clasemodelo->getMoncie());
      $cpcompro->setSalcau(0);
      $cpcompro->setSalpag(0);
      $cpcompro->setSalaju(0);
      $cpcompro->setStacom('A');
      $reqaut=H::getX('TIPCOM','Cpdoccom','Reqaut',$clasemodelo->getTipcom());
      if ($reqaut=='S')              
        $cpcompro->setAprcom('N');
      else 
        $cpcompro->setAprcom('S');
      $cpcompro->setLoguse(sfContext::getInstance()->getUser()->getAttribute('loguse'));
      $cpcompro->save();

      Herramientas::getSalvarCorrelativo('corcom','cpdefniv','Compromiso',$r,$msg);

      self::grabarDetalleCompromisoCierre($cpcompro, $grid);

      $clasemodelo->setRefcom($cpcompro->getRefcom());
      $clasemodelo->save();
    }
  }

  public static function grabarDetalleCompromisoCierre($cpcompro, $grid) {
    $referencia=$cpcompro->getRefcom();
    $arreglo=self::ArreglodetCierre($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='' && $arreglo[$j]["moncom"]!=0)
      {
        $cpimpcom = new Cpimpcom();
        $cpimpcom->setRefcom($referencia);
        $cpimpcom->setCodpre($arreglo[$j]["codpre"]);
        $cpimpcom->setMonimp($arreglo[$j]["moncom"]);
        $cpimpcom->setMoncau(0);
        $cpimpcom->setMonpag(0);
        $cpimpcom->setMonaju(0);
        $cpimpcom->setStaimp('A');
        $cpimpcom->setRefere('NULO');
        $cpimpcom->save();
      }
      $j++;
    }
  }

  public static function grabarEventoCajChi($opordpag,$grid){
    $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
    if ($manevento=='S')
    {
      $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
         $q= new Criteria();
         $q->add(TssalcajPeer::REFSAL,$x[$j]["refsal"]);           
         $regq=TssalcajPeer::doSelectOne($q);
         if ($regq) {
            $codeve=$regq->getCodeve();
            $cpdiseve= new Cpdiseve();
            $cpdiseve->setRefdoc($opordpag->getNumord());
            $cpdiseve->setCodpre($x[$j]["codpre"]);
            $cpdiseve->setCodeve($codeve);
            $cpdiseve->setMoneve($x[$j]["moncau"]);
            $cpdiseve->setTipdoc($opordpag->getTipcau());
            $cpdiseve->setTipmov('CAU');
            $cpdiseve->save();
        }
          $j++;
      }
    }
  }

  public static function generarPagadoCierre(&$clasemodelo,$grid)
  {
    $refpag=Herramientas::getX('tippag','Cpdocpag','Afepag',$clasemodelo->getTippag());
    $refpagaux = "NULO";
    if ($refpag != "N")
    {
        $cppagos=new Cppagos();
        $refpagaux = self::Buscar_Correlativo_Pago();
        $cppagos->setRefpag($refpagaux);
        $cppagos->setTippag($clasemodelo->getTippag());
        $cppagos->setFecpag($clasemodelo->getFeccie());
        $anno=substr($clasemodelo->getFeccie(),0, 4);
        $cppagos->setAnopag($anno);
        $cppagos->setCedrif($clasemodelo->getCedrif());
        $cppagos->setRefcau(null);
        $cppagos->setTipcau(null);
        $cppagos->setDespag($clasemodelo->getDescon());
        $cppagos->setDesanu(null);
        $cppagos->setMonpag($clasemodelo->getMoncie());        
        $cppagos->setSalaju(0);
        $cppagos->setStapag('A');
        $cppagos->save();

        $c = new Criteria();
        $datos = CpdefnivPeer::doSelectOne($c);
        if ($datos){
          $datos->setCorpag($refpagaux);
          $datos->save();
        }

     self::grabarDetallePagadoCierre($cppagos,$grid);
     $clasemodelo->setRefpag($cppagos->getRefpag());
     $clasemodelo->save();  
    }     
  } 

  public static function grabarDetallePagadoCierre($cppagos,$grid)
  {
    $referencia=$cppagos->getRefpag();
    $arreglo=self::ArreglodetCierre($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='' && $arreglo[$j]["moncom"]!=0)
      {
        $cpimppag= new Cpimppag();
        $cpimppag->setRefpag($referencia);
        $cpimppag->setCodpre($arreglo[$j]["codpre"]);
        $cpimppag->setMonimp($arreglo[$j]["moncom"]);
        $cpimppag->setMonaju(0);
        $cpimppag->setStaimp('A');
        $cpimppag->setRefere('NULO');
        $cpimppag->setRefprc('NULO');
        $cpimppag->setRefcom('NULO');
        $cpimppag->save();
      }
      $j++;
    }
  }
    public static function generaComprobanteCierre(&$clasemodelo,$grid)
  {
      $correl2=Comprobante::Buscar_Correlativo($clasemodelo->getFeccie());
      $contabc = new Contabc();
      $contabc->setNumcom($correl2);
      $contabc->setReftra($clasemodelo->getNumref());
      $contabc->setFeccom($clasemodelo->getFeccie());
      $contabc->setDescom($clasemodelo->getDescon());
      $contabc->setStacom('C');
      $contabc->setTipcom(null);
      $contabc->setMoncom($clasemodelo->getMoncie());
      $contabc->save();

      $arreglo=self::ArreglodetCierre($grid);
      $j=0;
      while ($j<count($arreglo))
      {
        if ($arreglo[$j]["codpre"]!='' && $arreglo[$j]["moncom"]!=0)
        {
          $contabc1= new Contabc1();
          $contabc1->setNumcom($correl2);
          $contabc1->setFeccom($clasemodelo->getFeccie());
          $cta=H::getX_vacio('CODPRE','Cpdeftit','Codcta',$arreglo[$j]["codpre"]);
          $contabc1->setCodcta($cta);
          $contabc1->setNumasi($j+1);
          $contabc1->setRefasi($clasemodelo->getNumref());
          $contabc1->setDesasi(H::getX_vacio('codcta','Contabb','Descta',$cta));
          $contabc1->setDebcre('D');
          $contabc1->setMonasi($arreglo[$j]["moncom"]);
          $contabc1->save();
        }
        $j++;
      }

      $contabc1= new Contabc1();
      $contabc1->setNumcom($correl2);
      $contabc1->setFeccom($clasemodelo->getFeccie());      
      $contabc1->setCodcta($clasemodelo->getCtapag());
      $contabc1->setNumasi($j+1);
      $contabc1->setRefasi($clasemodelo->getNumref());
      $contabc1->setDesasi(H::getX('codcta','Contabb','Descta',$clasemodelo->getCtapag()));
      $contabc1->setDebcre('C');
      if (H::toFloat($clasemodelo->getMoncie())>H::toFloat($clasemodelo->getMonape()))
        $contabc1->setMonasi($clasemodelo->getMonape());
      else
        $contabc1->setMonasi(H::toFloat($clasemodelo->getMoncie()));
      $contabc1->save();

      if (H::toFloat($clasemodelo->getMoncie())>H::toFloat($clasemodelo->getMonape())){
        $contabc1= new Contabc1();
        $contabc1->setNumcom($correl2);
        $contabc1->setFeccom($clasemodelo->getFeccie());      
        $contabc1->setCodcta($clasemodelo->getCtapag());
        $contabc1->setNumasi($j+1);
        $contabc1->setRefasi($clasemodelo->getNumref());
        $contabc1->setDesasi(H::getX('codcta','Contabb','Descta',$clasemodelo->getCtapag()));
        $contabc1->setDebcre('C');
        $contabc1->setMonasi(H::toFloat($clasemodelo->getMoncie())-H::toFloat($clasemodelo->getMonape()));
        $contabc1->save();
      }
      $clasemodelo->setNumcom($correl2);
  }

  public static function generarOPFinancieraCierre($clasemodelo,$grid){
    $dif=H::toFloat($clasemodelo->getMoncie())-H::toFloat($clasemodelo->getMonape());
    $opordpag_new = new Opordpag();
    $tienecorrelativo=false;
    if (Herramientas::getVerCorrelativo('numini','opdefemp',$r))
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
      $opordpag_new->setNumord(str_pad($r, 8, '0', STR_PAD_LEFT));          
    }

     if ($tienecorrelativo)
     {
       Herramientas::getSalvarCorrelativo('numini','opdefemp','Referencia',$r,$msg);
     }

     $t= new Criteria();
     $t->add(OpdefempPeer::CODEMP,'001');
     $regt= OpdefempPeer::doSelectOne($t);
     if ($regt){
       $opordpag_new->setTipcau($regt->getOrdciecaj());
       $opordpag_new->setCodmon($regt->getCodmon());
       $valmon=H::getX_vacio('CODMON','Tsdesmon','Valmon',$regt->getCodmon());
       $opordpag_new->setCodmon($valmon);
     }
      $opordpag_new->setFecemi($clasemodelo->getFeccie());
      $opordpag_new->setCedrif($clasemodelo->getCedrif());
      $c= new Criteria();
      $c->add(OpbenefiPeer::CEDRIF, $clasemodelo->getCedrif());
      $ben= OpbenefiPeer::doSelectOne($c);
      if ($ben) $opordpag_new->setNomben($ben->getNomben());      
      $opordpag_new->setMonord($dif);
      $opordpag_new->setDesord($clasemodelo->getDescon());
      $opordpag_new->setCoduni($clasemodelo->getCodubi());
      $opordpag_new->setTipfin($clasemodelo->getCodfin());
      $opordpag_new->setMonret(0);
      $opordpag_new->setMondes(0);
      $opordpag_new->setCtapag($clasemodelo->getCtapag()); 
      $opordpag_new->setStatus('N');
      $opordpag_new->setNumche(null);
      $opordpag_new->setCtaban(null);
      $opordpag_new->setNumcom($clasemodelo->getNumcom());
      $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
      $opordpag_new->setLoguse($loguse);
      $opordpag_new->save();    
  }

    public static function grabarComprobanteCierre($clasemodelo,$grid,&$msjuno,&$arrcompro)
  {
    if ($clasemodelo->getNumref()=='########')
    {
       if (Herramientas::getVerCorrelativo('corciecaj','opdefemp',$r))
       {
         $encontrado=false;
         while (!$encontrado)
         {
          $numero=str_pad($r, 8, '0', STR_PAD_LEFT);
          $c= new Criteria();
          $c->add(OpciecajPeer::NUMREF,$numero);
          $resul= OpciecajPeer::doSelectOne($c);
          if ($resul)
          {
            $r=$r+1;
          }
          else
          {
            $encontrado=true;
          }
         }
         $numorden=$numero;
      }
    }
    else
    {
      $numorden=str_replace('#','0',$clasemodelo->getNumref());
    }

    $confcorcom=sfContext::getInstance()->getUser()->getAttribute('confcorcom');
    if ($confcorcom=='N')
    {
      $numcom= $numorden;
    }else $numcom= Comprobante::Buscar_Correlativo(date("d/m/Y",strtotime($clasemodelo->getFeccie())));

    $reftra=$numorden;
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

    $arreglo=self::ArreglodetCierre($grid);
    $j=0;
    while ($j<count($arreglo))
    {
      if ($arreglo[$j]["codpre"]!='' && $arreglo[$j]["moncom"]!=0)
      {
        $c= new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$arreglo[$j]["codpre"]);
        $regis = CpdeftitPeer::doSelectOne($c);
        if ($regis)
        {
          if(!is_null($regis->getCodcta()))
          {
            $cuenta=$regis->getCodcta();
          }else {$cuenta='';}

          $b= new Criteria();
          $b->add(ContabbPeer::CODCTA,$cuenta);
          $regis2 = ContabbPeer::doSelectOne($b);
          if ($regis2)
          {
            $moncau=$arreglo[$j]["moncom"];
            if ($moncau>0)
            {
              $codigocuenta=$regis2->getCodcta();
              $tipo='D';
              $des="";
              $moncau=$arreglo[$j]["moncom"];
              $monto=$moncau;
           }
          }else { $msjuno='El Código Presupuestario'.$arreglo[$j]["codpre"].' no tiene asociado Codigo Contable válido'; return true;}
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
      }
      $j++;
    }

    if (H::toFloat($clasemodelo->getMoncie())>H::toFloat($clasemodelo->getMonape())){
        $codigocuenta2="_".$clasemodelo->getCtapag();
        $tipo2="C_C";
        $des2="_";
        $dif=H::toFloat($clasemodelo->getMoncie())-H::toFloat($clasemodelo->getMonape());
        $b=$clasemodelo->getMonape().'_'.$dif;
        $monto2=$b;

    }else {
        $codigocuenta2="";
        $tipo2="C";
        $des2="";
        $b=$clasemodelo->getMoncie();
        $monto2=$b;
    }
    
      $cuentas=$codigocuenta2.'_'.$codigocuentas;
      $descr=$des2.'_'.$desc;
      $tipos=$tipo2.'_'.$tipo1;
      $montos=$monto2.'_'.$monto1;


    $clscommpro=new Comprobante();
    $clscommpro->setGrabar("N");
    $clscommpro->setNumcom($numcom);
    $clscommpro->setReftra($reftra);
    $clscommpro->setFectra(date("d/m/Y",strtotime($clasemodelo->getFeccie())));
    $clscommpro->setDestra($clasemodelo->getDescon());
    $clscommpro->setCtas($cuentas);
    $clscommpro->setDesc($descr);
    $clscommpro->setMov($tipos);
    $clscommpro->setMontos($montos);
    $arrcompro[]=$clscommpro;
  }

  public static function hay_ConcilMesAnt($nro, $mes, $ano) {
     $r3= new Criteria();   
     $r3->add(TsconcilPeer::NUMCUE,$nro);     
     $r3->add(TsconcilPeer::ANOCON,$ano);
     $r3->addDescendingOrderByColumn(TsconcilPeer::MESCON);
     $trajo3=TsconcilPeer::doSelectOne($r3);
     if ($trajo3)
     {
         $m1=(integer) $mes;
         $m2=(integer) $trajo3->getMescon();
         $dif=$m1-$m2;   
         if ($dif>1){
           $r1= new Criteria();   
           $r1->add(TsconcilhisPeer::NUMCUE,$nro);     
           $r1->add(TsconcilhisPeer::ANOCON,$ano);
           $r1->add(TsconcilhisPeer::MESCON,$trajo3->getMescon());
           $trajo4=TsconcilhisPeer::doSelectOne($r1);
           if (!$trajo4)
            return true;
          else
            return false;
         }          
         else return false;           
     }else return false;
  }

  public static function validaBancoBloqueado($fecha,$numcue)
  {
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecha, 'i', $dateFormat->getInputPattern('d'));
    
    $c= new Criteria();
    $c->add(TsciebanfecPeer::NUMCUE,$numcue);
    $c->add(TsciebanfecPeer::FECDES,$fec,Criteria::LESS_EQUAL);
    $c->add(TsciebanfecPeer::FECHAS,$fec,Criteria::GREATER_EQUAL);
    $c->add(TsciebanfecPeer::STATUS,'C');
    $reg=TsciebanfecPeer::doSelectOne($c);
    if ($reg)
      return true;
    else
      return false;
  }  

 public static function hacer_ConciliablesNew($nro, $mes, $ano, $fechas) {
    $sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
            A.TipMov as tipmov1, B.TipMov as tipmov2, A.DesLib as deslib, B.DesBan as desban,
            A.MonMov as monmov1, B.MonMov as monmov2
                   From TsMovLib A, TsMovBan B
                  Where A.MonMov = B.MonMov And A.tipmov=b.tipmov and
                    A.NumCue = '" . $nro . "' And
            B.NumCue = '" . $nro . "' And
                     A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                     A.StaCon='N' And B.StaCon='N' AND
                     A.Status='C' And B.Status='C'";

    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tstemigu) {
        $tsconcil = new Tsconcil();
        $tsconcil->setNumcue($nro);
        $tsconcil->setMescon($mes);
        $tsconcil->setAnocon($ano);
        $tsconcil->setRefere($tstemigu["reflib"]);
        $tsconcil->setMovlib($tstemigu["tipmov1"]);
        $tsconcil->setMovban($tstemigu["tipmov2"]);
        $tsconcil->setFeclib($tstemigu["feclib"]);
        $tsconcil->setFecban($tstemigu["fecban"]);
        $tsconcil->setDesref($tstemigu["deslib"]);
        $tsconcil->setMonlib($tstemigu["monmov1"]);
        $tsconcil->setMonban($tstemigu["monmov2"]);
        $tsconcil->setResult('CONCILIADO');
        $tsconcil->save();

        Tesoreria :: actualizar_Status($nro, $tstemigu["reflib"], 'C',$tstemigu["tipmov1"]);
      }
    }

  }

  public static function hacer_No_ConciliablesNew($nro, $mes, $ano, $fechas) {
    $sql = "Select A.RefLib as reflib, B.RefBan as refban, A.FecLib as feclib, B.FecBan as fecban,
          A.TipMov as movlib, B.TipMov as movban, A.DesLib as deslib, B.DesBan as desban,
          A.MonMov as monmov1, B.MonMov as monmov2
                From TsMovLib A, TsMovBan B
                Where
                A.NumCue = '" . $nro . "' And
                B.NumCue = '" . $nro . "' And
                A.TipMov=B.TipMov And
                A.FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                B.FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                A.MonMov <> B.MonMov and A.stacon='N'";

    if (Herramientas :: BuscarDatos($sql, $result)) {
      foreach ($result as $tstemigu) {
        $sql2 = "Select * From TSconcil Where
                        NumCue = '" . $nro . "' And
                        Refere = '" . $tstemigu["reflib"] . "' And
                        Refere = '" . $tstemigu["refban"] . "' And
                        FecLib <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        FecBan <= To_Date('" . $fechas . "','DD/MM/YYYY') And
                        movlib='" . $tstemigu["movlib"] . "'  and
                        Result like 'CONCILIADO%'";

        if (!Herramientas :: BuscarDatos($sql2, $result2)) {
          $tsconcil = new Tsconcil();
          $tsconcil->setNumcue($nro);
          $tsconcil->setMescon($mes);
          $tsconcil->setAnocon($ano);
          $tsconcil->setRefere($tstemigu["reflib"]);
          $tsconcil->setMovlib($tstemigu["movlib"]);
          $tsconcil->setMovban($tstemigu["movban"]);
          $tsconcil->setFeclib($tstemigu["feclib"]);
          $tsconcil->setFecban($tstemigu["fecban"]);
          $tsconcil->setDesref($tstemigu["deslib"]);
          $tsconcil->setMonlib($tstemigu["monmov1"]);
          $tsconcil->setMonban($tstemigu["monmov2"]);
          $tsconcil->setResult('ERROR EN CONCILIACION (MONTOS DIFERENTES)');
          $tsconcil->save();
        }

      }
    }
  }

  public static function posicion_en_el_grid_ban($arreglo,$numcue,$tipmov)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["numcue"]==$numcue || $arreglo[$ind]["tipmov"]==$tipmov)
        { $enc=true; }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function CargarMovban(&$cadena){
    $per=array();
    $cadena="";
    $sql="select numcue as numcue,refban as refban,fecban as fecban,tipmov as tipmov,desban as desban,monmov as monmov from tmpmovbanexc order by numcue, refban, tipmov, fecban";
    if (H::BuscarDatos($sql,$result)){
      $i=0;
      $j=0;
      while ($i<count($result))
      {
          $pos=self::posicion_en_el_grid_MovBan($per,$result[$i]["numcue"],$result[$i]["refban"],$result[$i]["tipmov"]);
          if ($pos==0){
            $j=count($per)+1;
            $per[$j-1]["numcue"]=$result[$i]["numcue"];
            $per[$j-1]["refban"]=$result[$i]["refban"];
            $per[$j-1]["fecban"]=$result[$i]["fecban"];
            $per[$j-1]["tipmov"]=$result[$i]["tipmov"];
            $per[$j-1]["desban"]=$result[$i]["desban"];
            $per[$j-1]["monmov"]=number_format($result[$i]["monmov"],2,',','.');
            $per[$j-1]["id"]="9";     
          }else {
            if ($cadena=='')
              $cadena=$result[$i]["numcue"].' - '.$result[$i]["refban"].' - '.$result[$i]["tipmov"];
            else
              $cadena=' / '.$result[$i]["numcue"].' - '.$result[$i]["refban"].' - '.$result[$i]["tipmov"];
          }

        $i++;
      }
    }
    return $per;
  }

  public static function posicion_en_el_grid_MovBan($arreglo,$numcue,$refban,$tipmov)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["numcue"]==$numcue && $arreglo[$ind]["refban"]==$refban && $arreglo[$ind]["tipmov"]==$tipmov)
        { $enc=true; }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

    public static function MigrarMovBanExcel($grid){
      $x = $grid[0];
      $j = 0;
      while ($j<count($x))
      {
        $fecban=$x[$j]["fecban"];
        $fecha=date("d/m/Y",strtotime($fecban));

        $t= new Criteria();
        $t->add(TsmovbanPeer::NUMCUE,$x[$j]["numcue"]);
        $t->add(TsmovbanPeer::REFBAN,$x[$j]["refban"]);
        $t->add(TsmovbanPeer::TIPMOV,$x[$j]["tipmov"]);
        $regt= TsmovbanPeer::doSelectOne($t);
        if (!$regt){
          $tsmovban_new= new Tsmovban();
          $tsmovban_new->setNumcue($x[$j]["numcue"]);
          $tsmovban_new->setRefban($x[$j]["refban"]);     
          $tsmovban_new->setFecban($fecha);   
          $tsmovban_new->setTipmov($x[$j]["tipmov"]);   
          $tsmovban_new->setDesban($x[$j]["desban"]);   
          $tsmovban_new->setCodcta(H::getX_Vacio('Numcue','Tsdefban','Codcta',$x[$j]["numcue"]));
          $tsmovban_new->setMonmov(H::toFloat($x[$j]["monmov"]));            
          $moneda=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
          $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
          $tsmovban_new->setCodmon($moneda);
          $tsmovban_new->setValmon($valor);
          $tsmovban_new->setStacon('N');
          $tsmovban_new->setStatus('C');
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $tsmovban_new->setLoguse($loguse);
          $tsmovban_new->save();
        }
     $j++;
    }

    return -1;
  }

public static function posicion_en_el_grid_lib($arreglo,$numcue,$tipmov,$cedrif)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["numcue"]==$numcue || $arreglo[$ind]["tipmov"]==$tipmov || $arreglo[$ind]["cedrif"]==$cedrif)
        { $enc=true; }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

  public static function CargarMovLib(&$cadena){
    $per=array();
    $cadena="";
    $sql="select numcue as numcue,reflib as reflib,feclib as feclib,tipmov as tipmov,deslib as deslib, cedrif as cedrif, monmov as monmov from tmpmovlibexc order by numcue, reflib, tipmov, feclib";
    if (H::BuscarDatos($sql,$result)){
      $i=0;
      $j=0;
      while ($i<count($result))
      {
          $pos=self::posicion_en_el_grid_MovLib($per,$result[$i]["numcue"],$result[$i]["reflib"],$result[$i]["tipmov"]);
          if ($pos==0){
            $j=count($per)+1;
            $per[$j-1]["numcue"]=$result[$i]["numcue"];
            $per[$j-1]["reflib"]=$result[$i]["reflib"];
            $per[$j-1]["feclib"]=$result[$i]["feclib"];
            $per[$j-1]["tipmov"]=$result[$i]["tipmov"];
            $per[$j-1]["deslib"]=$result[$i]["deslib"];
            $per[$j-1]["cedrif"]=$result[$i]["cedrif"];
            $per[$j-1]["monmov"]=number_format($result[$i]["monmov"],2,',','.');
            $per[$j-1]["id"]="9";     
          }else {
            if ($cadena=='')
              $cadena=$result[$i]["numcue"].' - '.$result[$i]["reflib"].' - '.$result[$i]["tipmov"];
            else
              $cadena=' / '.$result[$i]["numcue"].' - '.$result[$i]["reflib"].' - '.$result[$i]["tipmov"];
          }

        $i++;
      }
    }
    return $per;
  }

  public static function posicion_en_el_grid_MovLib($arreglo,$numcue,$reflib,$tipmov)
  {
    $enc=false;
    $ind=0;
    while (($ind<count($arreglo)) && (!$enc))
    {
        if ($arreglo[$ind]["numcue"]==$numcue && $arreglo[$ind]["reflib"]==$reflib && $arreglo[$ind]["tipmov"]==$tipmov)
        { $enc=true; }
      $ind++;
    }

    if ($enc)
    { $posicionenelgrid=$ind;}else{ $posicionenelgrid=0;}

   return $posicionenelgrid;
  }

    public static function MigrarMovLibExcel($grid){
      $x = $grid[0];
      $j = 0;
      while ($j<count($x))
      {
        $feclib=$x[$j]["feclib"];
        $fecha=date("d/m/Y",strtotime($feclib));

        $t= new Criteria();
        $t->add(TsmovlibPeer::NUMCUE,$x[$j]["numcue"]);
        $t->add(TsmovlibPeer::REFLIB,$x[$j]["reflib"]);
        $t->add(TsmovlibPeer::TIPMOV,$x[$j]["tipmov"]);
        $regt= TsmovlibPeer::doSelectOne($t);
        if (!$regt){
          $tsmovlib_new= new Tsmovlib();
          $tsmovlib_new->setNumcue($x[$j]["numcue"]);
          $tsmovlib_new->setReflib($x[$j]["reflib"]);     
          $tsmovlib_new->setFeclib($fecha);   
          $tsmovlib_new->setTipmov($x[$j]["tipmov"]);   
          $tsmovlib_new->setDeslib($x[$j]["deslib"]);   
          $tsmovlib_new->setCedrif($x[$j]["cedrif"]);
          $tsmovlib_new->setCodcta(H::getX_Vacio('Numcue','Tsdefban','Codcta',$x[$j]["numcue"]));
          $tsmovlib_new->setMonmov(H::toFloat($x[$j]["monmov"]));            
          $moneda=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001');
          $valor=H::getX_vacio('CODMON','Tsdesmon','Valmon',$moneda);
          $tsmovlib_new->setCodmon($moneda);
          $tsmovlib_new->setValmon($valor);
          $tsmovlib_new->setStacon('N');
          $tsmovlib_new->setStatus('C');
          $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
          $tsmovlib_new->setLoguse($loguse);
          $tsmovlib_new->save();

          self::grabarComprobanteMigMovLib($tsmovlib_new);
        }
     $j++;
    }

    return -1;
  }

public static function grabarComprobanteMigMovLib(&$tsmovlib)
  {
    $reftra=$tsmovlib->getReflib();

    //Maestro Comprobante
    $correl3=Comprobante::Buscar_Correlativo($tsmovlib->getFeclib());
    $contabc = new Contabc();
    $contabc->setNumcom($correl3);
    $contabc->setReftra($reftra);
    $contabc->setFeccom($tsmovlib->getFeclib());
    $contabc->setDescom($tsmovlib->getDeslib());
    $contabc->setStacom('D');
    $contabc->setTipcom('TES');
    $contabc->setMoncom($tsmovlib->getMonmov());
    $loguse= sfContext::getInstance()->getUser()->getAttribute('loguse');
    $contabc->setLoguse($loguse);
    $tiptra=H::getX_vacio('NUMCUE','Tsdefban','Codtiptra',$tsmovlib->getNumcue());
    $contabc->setCodtiptra($tiptra);
    $contabc->save();
    //Detalle Comprobante

    $v= new Criteria();
    $v->add(TstipmovPeer::CODTIP,$tsmovlib->getTipmov());
    $regv= TstipmovPeer::doSelectOne($v);
    if ($regv){
      $debcre=$regv->getDebcre();
      $ctahas=$regv->getCodcon();
    }

    $contabc1= new Contabc1();
    $contabc1->setNumcom($correl3);
    $contabc1->setFeccom($tsmovlib->getFeclib());
    $ctades=H::getX('numcue','Tsdefban','Codcta',$tsmovlib->getNumcue());
    $contabc1->setCodcta($ctades);
    $contabc1->setNumasi(1);
    $contabc1->setRefasi($reftra);
    $contabc1->setDesasi(H::getX('codcta','Contabb','Descta',$ctades));
    if ($debcre=='D')
    $contabc1->setDebcre('D');
    else
      $contabc1->setDebcre('C');
    $contabc1->setMonasi($tsmovlib->getMonmov());
    $contabc1->save();

    $contabc1= new Contabc1();
    $contabc1->setNumcom($correl3);
    $contabc1->setFeccom($tsmovlib->getFeclib());
    $contabc1->setCodcta($ctahas);
    $contabc1->setNumasi(2);
    $contabc1->setRefasi($reftra);
    $contabc1->setDesasi(H::getX('codcta','Contabb','Descta',$ctahas));
    if ($debcre=='D')
      $contabc1->setDebcre('C');
    else
      $contabc1->setDebcre('D');
    $contabc1->setMonasi($tsmovlib->getMonmov());
    $contabc1->save();

    $tsmovlib->setNumcom($correl3);
    $tsmovlib->setFeccom($tsmovlib->getFeclib());
    $tsmovlib->save();
  return true;
  }

public static function salvarReintegro($tsmovlib,$grid7){
    $x=$grid7[0];
    $j=0;
    while ($j<count($x))
     {
      if ($x[$j]->getCodpre()!="" && $x[$j]->getMonto()>0)
      {
          $x[$j]->setRefrei($tsmovlib->getRefrei());
          $x[$j]->setNumcue($tsmovlib->getNumcue());
          $x[$j]->setReflib($tsmovlib->getReflib());
          $x[$j]->setTipmov($tsmovlib->getTipmov());
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
