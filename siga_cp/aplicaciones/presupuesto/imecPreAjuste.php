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
$numfilas= $_SESSION["configemp"]["aplicacion"]["presupuesto"]["modulos"]["precompro"]["numfilas"];
if ($numfilas!="")
    $numfil=$numfilas;
else $numfil=150;

  /////////////////////////////////////
    $imec   = $_POST["imec"];
    $codigo = $_POST["codigo"];
    $fecha  = $_POST["fecha"];
    $ano    = substr($fecha,6,4);
    $desc   = $_POST["desc"];
    $tipaju = $_POST["tipaju"];
    $refmov = $_POST["refmov"];
    $fecmov = $_POST["fecmov"];
    $afectap = $_POST["afec"];

    $desanu = $_POST["desmov"];
    $totaju = (float)(str_replace(',','',$_POST["totmon"]));
    $staaju = "A";


    if (!$z->validarFechaPresup($fecha))
    {
      Regresar("Preajuste.php");
      exit;
    }


  ////////////////
  ////////////////

    if ($imec=='I' or $imec=='M')
    {
      try
      {
        if (ValidarFechaAjuste($fecha, $fecmov))
        {
          Mensaje("La Fecha del Ajuste no puede ser menor a la Fecha del Movimiento");
          Regresar('PreAjuste.php');

        }
        else{

          $bd->startTransaccion();

        if ($imec=='I')
        {

          ////////////// CORRELATIVO ////////////////
             $reg='';
            if ($codigo=='########')
            {
              $z->getVerCorrelativo('coraju','cpdefniv',$reg);
               $encontrado = false;

              //Busca el correlativo si existe
                    while (!$encontrado)
                    {
                       $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                       $sql    = "select RefAju from CPAJuste where RefAju='$codigo'";
                       if ($tb=$z->buscar_datos($sql))
                       {
                         $reg = $reg + 1;
                       }
                       else
                       {
                         $encontrado=true;
                       }
                    }

                    $z->getSalvarCorrelativo('coraju','cpdefniv',$codigo);

            }else
            //estes codigo nunca se debiera ejecutar, pero se coloco por si acaso
            {
              $sql   = "select RefAju from CPAJuste where RefAju='$codigo'";
              if ($tb=$z->buscar_datos($sql))
              {
                $encontrado = false;
              if (Confirmar("Esta refencia".$codigo." se encuentra registrada, ¿Desea que el sistema busque una Referencia automaticamente?"))
              {
              //Busca una referencia valida
                    while (!$encontrado)
                    {
                       $codigo = str_pad($reg,8,0,STR_PAD_LEFT);
                       $sql    = "select RefAju from CPAJuste where RefAju='$codigo'";
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
                Regresar("PreAjuste.php");
                exit;
              }
              }
            }
                    ////////////////////////////


          $sql="delete from CPAJuste Where trim(RefAju)='".trim($codigo)."'";
          $bd->actualizar($sql);
          //	GRABAR TRASLADO

          $sql="insert into CPAJuste
            (RefAju,TipAju,FecAju,AnoAju,DesAju,Refere,DesAnu,TotAju,StaAju)
             values ('".$codigo."','".$tipaju."',to_date('".$fecha."','dd/mm/yyyy'),'".$ano."','".$desc."','".$refmov."','".$desanu."', ".abs($totaju).",'".$staaju."')";

          $bd->actualizar($sql);
          // GRABAR DETALLE TRASLADOS CODIGOS PRESUPUESTARIOS -- GRID
          $sql="delete from CPMovAju Where trim(RefAju)='".trim($codigo)."'";
          $bd->actualizar($sql);

          $i=1;
          while ($i<=$numfil)
          {
            if ((trim($_POST["x".$i."1"])!="")  and (number_format($_POST["x".$i."2"],2,'.',',')!= number_format(0,2,'.',',')) )
            {
              $monto=(float)(str_replace(',','',$_POST["x".$i."2"]));
              if (trim($_POST["x".$i."4"])!="" )
              {
                $refprc=$_POST["x".$i."4"];
              }
              else
              {
                $refprc='NULO';
              }

              if (trim($_POST["x".$i."5"])!="" )
              {
                $refcom=$_POST["x".$i."5"];
              }
              else
              {
                $refcom='NULO';
              }

              if (trim($_POST["x".$i."6"])!="")
              {
                $refcau=$_POST["x".$i."6"];
              }
              else
              {
                $refcau='NULO';
              }
              /*$sql="insert into CPMovAju (RefAju,CodPre,MonAju,StaMov,RefPrc,RefCom,RefCau,RefPag)
                values ('".$codigo."','".$_POST["x".$i."1"]."',($monto*(-1)),'A','".$refprc."','".$refcom."','".$refcau."','NULO')";
              */
              if ($monto>0) {
               if ($afectap=='R'){
              $sql="insert into CPMovAju (RefAju,CodPre,MonAju,StaMov,RefPrc,RefCom,RefCau,RefPag)
                values ('".$codigo."','".$_POST["x".$i."1"]."',($monto),'A','".$refprc."','".$refcom."','".$refcau."','NULO')";
               }else {
               	$monto1=$monto*-1;
               	$sql="insert into CPMovAju (RefAju,CodPre,MonAju,StaMov,RefPrc,RefCom,RefCau,RefPag)
                values ('".$codigo."','".$_POST["x".$i."1"]."',($monto1),'A','".$refprc."','".$refcom."','".$refcau."','NULO')";
               }

              $bd->actualizar($sql);
              }

            } 	//if ((trim($_POST["x".$i."1"])!="")  and (number_format($_POST["x".$i."2"],2,'.',',')!= number_format(0,2,'.',',')) )
           // else
           // {
           //   $i=51;
           // }
           $i=$i+1;
          } //while

          //Grabamos el evento
          $cont2 = 1;
          while ($cont2<=$numfil)
          {
            if ($_POST["f".$cont2."1"]!='' && $_POST["f".$cont2."3"]!='')
            {
              if (substr(trim($_POST["f".$cont2."1"]),0,2)!="--")
              {
                if ((float)str_replace(',','',$_POST["f".$cont2."5"])!=0)
                {
                  $col11[$cont2] = $_POST["f".$cont2."1"];
                  $col21[$cont2] = $_POST["f".$cont2."3"];
                  $montove=(float)str_replace(',','',$_POST["f".$cont2."5"]);
                  if ($afectap=='R')
                    $col31[$cont2] = $montove;
                  else
                    $col31[$cont2] = $montove*-1;
                }else
                {
                  Mensaje("Existe Monto del Evento con valor 0, No se puede Guardar.");
                  Regresar("PreCompro.php");
                  exit;
                }
                    
              }
              $cont2=$cont2+1;
            }else
            {
              $cont2=$numfil+1;
            }
          }     
            //Grabar Grid de Eventos
          $sqle="delete from cpdiseve where refdoc = '".$codigo."' and tipdoc = '".$tipaju."'";
          $bd->actualizar($sqle);
          $y=1;
          while ($y<=count($col11))
          {
              $sqlie="insert into cpdiseve (refdoc,codpre,codeve,moneve,tipdoc,tipmov)
              values ('".$codigo."','".$col11[$y]."','".$col21[$y]."',".$col31[$y].",'".$tipaju."','AJU')";
            $bd->actualizar($sqlie);

            $y=$y+1;
          }


        } //if ($imec=='I')
        else if ($imec=='M')
        {
          //	ACTUALIZAR DATOS TRASLADO
          $sql="update CPAJuste set  DesAju='".$desc."'
                where trim(RefAju) = '".trim($codigo)."'";
          $bd->actualizar($sql);
        }

        // Guardar en Segbitaco
        $sql = "Select id from cpajuste where trim(RefAju) = '".trim($codigo)."'";

        $tb=$bd->select($sql);
        $id = $tb->fields["id"];
        $bd->Log($id, 'pre', 'Cpajuste', 'Preajuste', $imec=='M' ? 'A' : 'G' );

        $bd->completeTransaccion();
        }
      }//try
      catch(Exception $e)
      {
        print "Excepcion Obtenida: ".$e->getMessage()."\n";
      }
    }


  function ValidarFechaAjuste($fecha='', $fecmov='')
  {
     $tool= new tools();

      if ($tool->Validar_Periodo($fecha,"CPDefNiv"))
       {
          $explodefecha = explode('/', $fecha); //Fecha Ajuste
          $explodefecotr = explode('/', $fecmov); //Fecha Movimiento
          $fecha_for = $explodefecha[2] . "-" . $explodefecha[1] . "-" . $explodefecha[0];
          $fecotr_for = $explodefecotr[2] . "-" . $explodefecotr[1] . "-" . $explodefecotr[0];
          if  ((!empty($fecmov))  and (strtotime($fecha_for) < strtotime($fecotr_for)))
          {
            Mensaje("La Fecha del Ajuste no puede ser menor a la Fecha del Movimiento");
        ?>
          <script>
            opener.document.getElementById('fecha').value="";
            opener.document.getElementById('fecha').focus();
          </script>
        <?
         }//  if  ((!empty($fecmov))  and (strtotime($fecha_for) < strtotime($fecotr_for)))
      }
  }

?>
<script>
  location=("PreAjuste.php");
</script>
