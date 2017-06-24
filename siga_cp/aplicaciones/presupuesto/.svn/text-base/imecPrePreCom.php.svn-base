<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$bd=new basedatosAdo($codemp);
$z= new tools();



  /////////////////////////////////////

    $codigo=$_POST["codigo"];
    $fecha=$_POST["fecha"];
    $ano=substr($fecha,6,4);
    $desc=$_POST["desc"];
    $tippre=$_POST["tippre"];
    $totmonto=str_replace(',','',$_POST["totmonto"]);
    $codben=trim($_POST["codben"]);

function crearLog($valor)
{
  global $bd;
  global $codigo;
  // Guardar en Segbitaco
  $sql = "Select id from cpprecom where refprc='".$codigo."'";

  $tb=$bd->select($sql);
  $id = $tb->fields["id"];
  $bd->Log($id, 'pre', 'Cpprecom', 'Preprecom', $valor);

}
    if (!$z->validarFechaPresup($fecha))
    {
      Regresar("PrePrecom.php");
      exit;
    }

    $i=1;
    while ($i<=150)
      {
        if (trim($_POST["x".$i."1"])!="")
        {
          if (substr(trim($_POST["x".$i."1"]),0,2)!="--")
            {
            if ((float)str_replace(',','',$_POST["x".$i."2"])!=0)
            {
              $grid1[$i]=$_POST["x".$i."1"];
              $grid2[$i]=(float)(str_replace(',','',$_POST["x".$i."2"]));
              $grid3[$i]=(float)(str_replace(',','',$_POST["x".$i."3"]));
              $grid4[$i]=(float)(str_replace(',','',$_POST["x".$i."4"]));
              $grid5[$i]=(float)(str_replace(',','',$_POST["x".$i."5"]));
            }else
            {
              Mensaje("Existe Monto con valor 0, No se puede Guardar.");
              Regresar("PrePreCom.php");
              exit;
            }
            }
            $i=$i+1;
        }
        else
        {
          $fin=$i-1;
          $i=151;
        }
      }
      //Eventos por Imputaciones
    $j=1;
    while ($j<=150)
      {
        if (trim($_POST["f".$j."1"])!="" && trim($_POST["f".$j."3"])!="")
        {
            if (substr(trim($_POST["f".$j."1"]),0,2)!="--")
            {
            if ((float)str_replace(',','',$_POST["f".$j."3"])!=0)
            {
              $grid11[$j]=$_POST["f".$j."1"];
              $grid21[$j]=$_POST["f".$j."3"];
              $grid31[$j]=(float)(str_replace(',','',$_POST["f".$j."5"]));
            }else
            {
              Mensaje("Existe un Monto de Evento con valor 0, No se puede Guardar.");
              Regresar("PrePreCom.php");
              exit;
            }
            }
            $j=$j+1;
        }
        else
        {
          $fin2=$j-1;
          $j=151;
        }
      }      

    $imec=$_GET["imec"];


    ////////////////
    ////////////////
    $bd->startTransaccion();

    if ($imec=='I')
    {
      try
      {
        if ($codigo=='########')
        {
          $z->getVerCorrelativo('corprc','cpdefniv',$reg);
          $encontrado = false;

          //Busca el correlativo si existe
                while (!$encontrado)
                {
                  $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                  $sql    = "select refprc from cpprecom where refprc='$codigo'";
                  if ($tb=$z->buscar_datos($sql))
                  {
                    $reg = $reg + 1;
                  }
                  else
                  {
                    $encontrado=true;
                  }
                }

                $z->getSalvarCorrelativo('corprc','cpdefniv',$codigo);
        }else
        //estes codigo nunca se debiera ejecutar, pero se coloco por si acaso
        {
          $sql   = "select refprc from cpprecom where refprc='$codigo'";
          if ($tb=$z->buscar_datos($sql))
          {
            $encontrado = false;
          if (Confirmar("Esta refencia".$codigo." se encuentra registrada, ¿Desea que el sistema busque una Referencia automaticamente?"))
          {
          //Busca una referencia valida
                while (!$encontrado)
                {
                  $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                  $sql    = "select refprc from cpprecom where refprc='$codigo'";
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
            Regresar("PrePreCom.php");
            exit;
          }
          }
        }

        //  GRABAR PRECOMPROMISO
          $sql="insert into cpprecom
          (refprc,tipprc,fecprc,anoprc,desprc,desanu,monprc,salcom,salcau,salpag,salaju,staprc,cedrif)
            values ('".$codigo."','".$tippre."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$desc."',
          '',".$totmonto.",0,0,0,0,'A','".$codben."')";

        $bd->actualizar($sql); //$bd->completeTransaccion();
        crearLog('G');
        // GRABAR GRID
        $sql="delete from cpimpprc where refprc = '".$codigo."' ";
        $bd->actualizar($sql);
        $i=1;
        while ($i<=$fin)
        {
              $sql="insert into cpimpprc (refprc,codpre,monimp,moncom,moncau,monpag,monaju,staimp)
            values ('".$codigo."','".$grid1[$i]."',".$grid2[$i].",".$grid3[$i].",".$grid4[$i].",".$grid5[$i].",0,'A')";

          $bd->actualizar($sql);



          $i=$i+1;
        }
        //Grabar Grid de Eventos
        $sqle="delete from cpdiseve where refdoc = '".$codigo."' and tipdoc = '".$tippre."'";
        $bd->actualizar($sqle);
        $y=1;
        while ($y<=$fin2)
        {
            $sqlie="insert into cpdiseve (refdoc,codpre,codeve,moneve,tipdoc, tipmov)
            values ('".$codigo."','".$grid11[$y]."','".$grid21[$y]."',".$grid31[$y].",'".$tippre."','PRC')";

          $bd->actualizar($sqlie);

          $y=$y+1;
        }
        LanzarReporte('presupuesto','cprprecompromiso.php&refpredes='.$codigo.'&refprehas='.$codigo.'');

      }
      catch(Exception $e)
      {
        //print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }
    else if ($imec=="M")
    {
      try
      {
          $sql="update cpprecom set desprc='".$desc."',
                      tipprc='".$tippre."',
                      cedrif='".$codben."'
                    where refprc='".$codigo."' ";
          $bd->actualizar($sql);
          
        //Grabar Grid de Eventos
        $sql2 = "select refdoc from cpdiseve where refdoc='$codigo'";
        $tb=$z->buscar_datos($sql2);
        if (!$tb)
        {
            $y=1;
            while ($y<=$fin2)
            {
                $sqlie="insert into cpdiseve (refdoc,codpre,codeve,moneve,tipdoc)
                values ('".$codigo."','".$grid11[$y]."','".$grid21[$y]."',".$grid31[$y].",'".$tippre."')";

            $bd->actualizar($sqlie);

            $y=$y+1;
            }      
        }
          
        crearLog('A');
      }
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }

    }

    $bd->completeTransaccion();

    //echo $e->getMessage();
    //exit('fin');
?>
<script>
  location=("PrePreCom.php");
</script>
