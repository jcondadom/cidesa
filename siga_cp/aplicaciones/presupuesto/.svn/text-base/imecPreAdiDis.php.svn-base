<?
session_start();
require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php');
require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
require_once($_SESSION["x"].'lib/general/tools.php');
require_once($_SESSION["x"].'lib/general/funciones.php');
validar(array(11,15));            //Seguridad  del Sistema
$codemp=$_SESSION["codemp"];
$loguse=$_SESSION["loguse"];
$bd=new basedatosAdo($codemp);
$z= new tools();
$numfil=$_SESSION["configemp"]["aplicacion"]["presupuesto"]["modulos"]["PreSolAdiDis"]["numfil"];
if ($numfil=='') $numfil=500;

  /////////////////////////////////////
    $codigo=$_POST["codigo"];
    $fecha=$_POST["fecha"];
    $ano=substr($fecha,6,4);
    $desc=$_POST["desc"];
    $tipo=$_POST["tipo"];
    $clasificacion=$_POST["clasifica"];
    $desanu="";
    $totadidis=(float)(str_replace(',','',$_POST["totmon"]));
    $stadidis="A";
    $imec=$_GET["imec"];
    
  //validamos que la fecha este dentro del periodo seleccionado
    $periodo = ObtenerPeriodo($fecha);

  ////////////////
  ////////////////

    if ($imec=='I' or  $imec=='M')
    {
      try
      {
        //$bd->startTransaccion();

        if ($imec=='I')
        {
          $sql="delete from CPAdiDis Where trim(RefAdi)='".trim($codigo)."'";
          $bd->actualizar($sql);
          //  GRABAR TRASLADO

          $sql="insert into CPAdiDis
            (RefAdi,FecAdi,AnoAdi,DesAdi,DesAnu,TotAdi,StaAdi,AdiDis,Loguse, clasifica)
            values ('".$codigo."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$desc."','".$desanu."', ".$totadidis.",'".$stadidis."','".$tipo."','".$loguse."','".$clasificacion."')";

          $bd->actualizar($sql);

                 $sql= "select * from CPMovAdi where trim(RefAdi)='$codigo'";
                  if ($tb=$z->buscar_datos($sql))
                   {
                    $sql="delete from CPMovAdi Where trim(RefAdi)='".trim($codigo)."'";
                      $bd->actualizar($sql);
                   }


            // GRABAR DETALLE TRASLADOS CODIGOS PRESUPUESTARIOS -- GRID
          

          $i=1;
          while ($i<=$numfil)
          {
            if ((trim($_POST["x".$i."1"])!="") and (number_format($_POST["x".$i."3"],2,'.',',')!= number_format(0,2,'.',',')) )
            {
              $monto=(float)(str_replace(',','',$_POST["x".$i."3"]));
              $monto1=(float)(str_replace(',','',$_POST["x".$i."5"]));
              $monto2=(float)(str_replace(',','',$_POST["x".$i."6"]));
              if ((trim($_POST["x".$i."7"])=="ORIGEN"))
                  $tip='O';
              else $tip='D';
              $sql="insert into CPMovAdi (RefAdi,CodPre,PerPre,MonMov,StaMov,tipo,monto,iva)
                    values ('".$codigo."','".$_POST["x".$i."1"]."','".$periodo."',".$monto.",'A','".$tip."',".$monto1.",".$monto2.")";
              $bd->actualizar($sql);
              $i=$i+1;
            }
            else
            {
              $i=$numfil+1;
            }
          } //while
        } //if ($imec=='I')
        else if ($imec=='M')
        {
          //  ACTUALIZAR DATOS TRASLADO
          $sql="update CPAdiDis set FecAdi=to_date('".$fecha."','dd/mm/yyyy'),
                  AnoAdi='".$ano."',
                  DesAdi='".$desc."',
                  TotAdi= ".$totadidis.",
                  clasifica= ".$clasificacion.",
                  AdiDis='".$tipo."'
                where trim(RefAdi) = '".trim($codigo)."'";
          $bd->actualizar($sql);
        }

        // Guardar en Segbitaco
        $sql = "Select id from cpadidis where trim(RefAdi) = '".trim($codigo)."'";

        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpadidis', 'Preadidis', $imec=='M' ? 'A' : 'G' );


        //$bd->completeTransaccion();

      }//try
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }

?>
<script>
  location=("PreAdiDis.php");
</script>
