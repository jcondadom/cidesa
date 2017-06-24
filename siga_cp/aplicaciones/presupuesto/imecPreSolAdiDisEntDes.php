<?
session_start();
//require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp = $_SESSION["codemp"];
$bd     = new basedatosAdo($codemp);
$z      = new tools();

  /////////////////////////////////////
    $codigo        = $_POST["codigo"];
    $fecha         = $_POST["fecha"];
    $ano           = substr($fecha,6,4);
    $desc          = $_POST["desc"];
    $codart        = $_POST["codart"];
    $adidis          = $_POST["tipo"];
    $numofi          = $_POST["numofi"];
    $fecofi          = $_POST["fecofi"];
    //exit();
    $enunciado     = $_POST["enunciado"];
    $justificacion = $_POST["justificacion"];
    $desanu = "";
    $totadidis=(float)(str_replace(',','',$_POST["totmono"])) + (float)(str_replace(',','',$_POST["totmond"]));
    $staadi = "A";
        $imec     = $_GET["imec"];

function crearLog($valor)
{
  global $bd;
  global $codigo;
  // Guardar en Segbitaco
  $sql = "Select id from cpsoladidis where refadi='".$codigo."'";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpsoladidis', 'Presoladidisentdes', $valor);

}

  try{

    if (!$z->validarFechaPresup($fecha))
    {
      Regresar("PresoladidisEntDes.php");
      exit;
    }

    $cont=1;
    while ($cont<=500)
    {
      if ($_POST["x".$cont."1"]!='')
      {
        if (substr(trim($_POST["x".$cont."1"]),0,2)!="--")
        {
          if ((float)str_replace(',','',$_POST["x".$cont."3"])!=0)
          {
            $col1[$cont] = $_POST["x".$cont."1"];
              //validamos que la fecha este dentro del periodo seleccionado
              //$periodo = ObtenerPeriodo($fecha);
            $col2[$cont] = ObtenerPeriodo($fecha);
            $col3[$cont] = (float)str_replace(',','',$_POST["x".$cont."3"]);
            $col4[$cont] = $_POST["x".$cont."4"];
            $col5[$cont] = $_POST["x".$cont."5"];
            $col6[$cont] = $_POST["x".$cont."6"];
            $col7[$cont] = (float)str_replace(',','',$_POST["x".$cont."7"]);
            $col8[$cont] = (float)str_replace(',','',$_POST["x".$cont."8"]);

          }else
          {
            Mensaje("Existe Monto con valor 0, No se puede Guardar.");
            Regresar("PreSolAdiDisEntDes.php");
            exit;
          }
        }
        $cont=$cont+1;
      }else
      {
        $cont=501;
      }
    }

    $cont2=1;
    while ($cont2<=500)
    {
      if ($_POST["f".$cont2."1"]!='')
      {
        if (substr(trim($_POST["f".$cont2."1"]),0,2)!="--")
        {
          if ((float)str_replace(',','',$_POST["f".$cont2."3"])!=0)
          {
            $col11[$cont2] = $_POST["f".$cont2."1"];
            $col22[$cont2] = ObtenerPeriodo($fecha);
            $col33[$cont2] = (float)str_replace(',','',$_POST["f".$cont2."3"]);
            $col44[$cont2] = $_POST["f".$cont2."4"];
            $col55[$cont2] = $_POST["f".$cont2."5"];
            $col66[$cont2] = $_POST["f".$cont2."6"];
            $col77[$cont2] = (float)str_replace(',','',$_POST["f".$cont2."7"]);
            $col88[$cont2] = (float)str_replace(',','',$_POST["f".$cont2."8"]);

          }else
          {
            Mensaje("Existe Monto con valor 0, No se puede Guardar.");
            Regresar("PreSolAdiDisEntDes.php");
            exit;
          }
        }
        $cont2=$cont2+1;
      }else
      {
        $cont2=501;
      }
    }
      ///////////////
      //$bd->startTransaccion();
        Grabar_Adicion();
        Grabar_GridMovAdi();
     // $bd->completeTransaccion();
      ///////////////

         Mensaje("Los Datos de la Solicitud Fueron Guardado Con Exito. Referencia: ".$codigo);
         LanzarReporte('presupuesto','preadidispre.php&codadides='.$codigo.'&codadihas='.$codigo.'');
         Regresar("PreSolAdiDisEntDes.php");

    }
    catch(Exception $e)
    {
        Print "Excepcion Obtenida: ".$e->getMessage()."\n";
    }

  /////////////////////////////////////

  function Grabar_Adicion(){

    global $tools;
    global $bd;
    global $imec;
    global $col1;
    global $col2;
    global $col3;
    global $fecha;
    global $ano;
    global $desc;
    global $desanu;
    global $totadidis;
    global $stadidis;
    global $codigo;
    global $justificacion;
    global $enunciado;
    global $codart;
    global $staadi;
    global $adidis;
    global $numofi;
    global $fecofi;
    global $z;

    if ($imec=='I' or  $imec=='M')
    {
      try
      {

        if (!$z->validarFechaPresup($fecha))
        {
          Regresar("Presoladidis.php");
          exit;
        }else{

          // $bd->startTransaccion();

          if ($imec=='I')
          {

          ////////////// CORRELATIVO ////////////////
             $reg='';
            if ($codigo=='########')
            {
              $z->getVerCorrelativo('corsoladidis','cpdefniv',$reg);
               $encontrado = false;

              //Busca el correlativo si existe
                    while (!$encontrado)
                    {
                       $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                       $sql    = "select RefAdi from cpsoladidis where RefAdi='$codigo'";
                       if ($tb=$z->buscar_datos($sql))
                       {
                         $reg = $reg + 1;
                       }
                       else
                       {
                         $encontrado=true;
                       }
                    }

                    $z->getSalvarCorrelativo('corsoladidis','cpdefniv',$codigo);

            }else
            //estes codigo nunca se debiera ejecutar, pero se coloco por si acaso
            {
              $sql   = "select RefAdi from cpsoladidis where RefAdi='$codigo'";
              if ($tb=$z->buscar_datos($sql))
              {
                $encontrado = false;
              if (Confirmar("Esta refencia".$codigo." se encuentra registrada, ¿Desea que el sistema busque una Referencia automaticamente?"))
              {
              //Busca una referencia valida
                    while (!$encontrado)
                    {
                       $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                       $sql    = "select RefAdi from cpsoladidis where RefAdi='$codigo'";
                       if ($tb=$z->buscar_datos($sql))
                       {
                         $reg = $reg + 1;
                       }
                       else
                       {
                         $encontrado=true;
                       }
                    }

              }else
              {
                Regresar("PresoladidisEntDes.php");
                exit;
              }
              }
            }
                    ////////////////////////////

            //	GRABAR TRASLADO
            if($fecofi!='') $fechaoficio=", to_date('$fecofi','dd/mm/yyyy')";
            else $fechaoficio='';
              $sql="insert into cpsoladidis
              (RefAdi,FecAdi,AnoAdi,DesAdi,DesAnu,TotAdi,StaAdi,AdiDis,justificacion,enunciado,codart, numofi ".($fechaoficio=='' ? '' : ', fecofi').")
               values ('".$codigo."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$desc."','".$desanu."', ".$totadidis.",'".$staadi."','".$adidis."','".$justificacion."','".$enunciado."','".$codart."', '$numofi' $fechaoficio )";

            $bd->actualizar($sql);
            crearLog('G');
          } //if ($imec=='I')
          else if ($imec=='M')
          {
            if($fecofi!='') $fechaoficio=", fecofi = to_date('$fecofi','dd/mm/yyyy')";
            else $fechaoficio='';
            //	ACTUALIZAR DATOS TRASLADO
            $sql="update cpsoladidis set FecAdi=to_date('".$fecha."','dd/mm/yyyy'),
                     AnoAdi='".$ano."',
                     DesAdi='".$desc."',
                     TotAdi= ".$totadidis.",
                     AdiDis='".$adidis."',
                     enunciado='".$enunciado."',
                     justificacion='".$justificacion."',
                     numofi='$numofi'
                     ".$fechaoficio."
                  where trim(RefAdi) = '".trim($codigo)."'";
            $bd->actualizar($sql);
            crearLog('A');
          }

          //$bd->completeTransaccion();
        }
      }//try
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }
  }

  function Grabar_GridMovAdi()
  {
    global $z;
    global $bd;
    global $col1;
    global $col2;
    global $col3;
    global $col4;
    global $col5;
    global $col6;
    global $col7;
    global $col8;
    global $codigo;
    global $col11;
    global $col22;
    global $col33;
    global $col44;
    global $col55;
    global $col66;
    global $col77;
    global $col88;

    try
    {
        $sql= "select * from cpsolmovadi where trim(RefAdi)='$codigo'";
      if ($tb=$z->buscar_datos($sql))
       {
        $sql="delete from cpsolmovadi where trim(RefAdi)='$codigo'";
        $bd->actualizar($sql);
       }

          $conta=1;
      while ($conta<=count($col1))
      {
        if($col6[$conta]!='') $fechareserva=", to_date('".$col6[$conta]."','dd/mm/yyyy')";
        else $fechareserva='';


        $sql    = "insert into cpsolmovadi (RefAdi,CodPre,PerPre,MonMov,StaMov, nrores, tipo, monto, iva ".($fechareserva=='' ? '' : ', fecres')." )
                 values ('".$codigo."','".$col1[$conta]."','".$col2[$conta]."',".$col3[$conta].",'A', '".$col5[$conta]."', 'O',".$col7[$conta].",".$col8[$conta]." $fechareserva)";

//echo $sql;
//exit();
        $bd->actualizar($sql);

        $conta++;
      }

          $conta2=1;
      while ($conta2<=count($col11))
      {
        if($col66[$conta2]!='') $fechareserva=", to_date('".$col66[$conta2]."','dd/mm/yyyy')";
        else $fechareserva='';


        $sql1    = "insert into cpsolmovadi (RefAdi,CodPre,PerPre,MonMov,StaMov, nrores, tipo, monto, iva ".($fechareserva=='' ? '' : ', fecres')." )
                 values ('".$codigo."','".$col11[$conta2]."','".$col22[$conta2]."',".$col33[$conta2].",'A', '".$col55[$conta2]."', 'D',".$col77[$conta2].",".$col88[$conta2]." $fechareserva)";

//echo $sql;
//exit();
        $bd->actualizar($sql1);

        $conta2++;
      }

    }
    catch(Exception $e)
    {
      print "Excepcion Obtenida: ".$e->getMessage()."\n";
    }

  }

?>
