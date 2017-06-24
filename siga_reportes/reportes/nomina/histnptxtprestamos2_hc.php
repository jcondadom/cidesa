<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Herramientas.class.php");

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/tmp/txt_prestamos_".date('d/m/Y').".txt");



    $bd= new basedatosAdo();
	$codempdes=H::GetPost("codempdes");
	$codemphas=H::GetPost("codemphas");
	$tipnom=H::GetPost("tipnom");
	$tipnom2=H::GetPost("tipnom2");
	$codcatdes =H::GetPost("codcatdes");
	$codcathas = H::GetPost("codcathas");
    $especial =H::GetPost("especial");
    $tipnomesp=H::GetPost("tipnomesp");
    $codtipapodes="0014";
    $codcondes=H::GetPost("codcondes");

    //$codtipapodes=H::GetPost("codtipapodes");

    $fecreg1=H::GetPost("fec1");
    $fecreg2=H::GetPost("fec2");

       	   if ($especial == 'S')
            {
            	$especial = " a.especial = 'S' AND 	(A.CODNOMESP) = TRIM('".$tipnomesp."') AND  ";
                $especial2 = " a.especial = 'S' AND 	(A.CODNOMESP) = TRIM('".$tipnomesp."') AND  ";
            }
            else
            {
            	if ($especial == 'N') {
            		$especial = " a.especial = 'N' AND A.CODCON<>'A03' AND";}
            	else
            	    if ($especial == 'T')
            	       $especial = "A.CODCON<>'A03' AND";
            }

		///cabecera
		echo "<table>";
		echo "<tr>";
		echo "<td>"."Cedula"."</td>";
		echo "<td>"."Nombre"."</td>";
		echo "<td>"."Apellido"."</td>";
	    echo "<td>"."Monto"."</td>";
	    echo "<td>"."Cuenta"."</td>";


						$sql="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						b.numcue as numcue,
						A.CODNOM,
					--	A.CODCAR as codcar,
						SUM(A.monto) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV, cast(REPLACE(b.cedemp,'.', '') as int )
						 FROM
						   nphiscon  A,NPHOJINT B, npdefcpt e
						 WHERE
						 ".$especial."
						B.CODEMP = A.CODEMP
						AND a.codcon=('".$codcondes."')
						AND  A.CODNOM = ('".$tipnom."')
						AND  B.CODEMP >=  ('".$codempdes."')
						AND  B.CODEMP <= ('".$codemphas."')
						and a.codcat >= ('".$codcatdes."')
						and a.codcat <= ('".$codcathas."') AND
						A.fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND A.fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') and
						a.codcon=e.codcon
						GROUP BY A.CODEMP, B.CEDEMP, b.numcue,A.CODNOM, to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') ,
						B.NOMEMP , B.NACEMP, to_char(B.FECNAC,'dd/mm/yyyy') , B.SEXEMP ,B.CODNIV, a.codcat
						order by cast(REPLACE(b.cedemp,'.', '') as int )";
			// print $sql; exit;




$arrp=$bd->select($sql);
$pri=true;
while(!$arrp->EOF)

{

       $montoaporte=number_format($arrp->fields["monto"],2,'','');
		$auxfecha=split("/",$fecreg2);
		
         $apellido=($arrp->fields["nomemp"]);
		 $apellido2=explode(",",$apellido);
		 $nombre=$apellido2[1];
		 $nombre2=explode(" ",$nombre);
		 $cuenta=str_replace("-","",$arrp->fields["numcue"]);
		 $cuenta2=rtrim(substr($cuenta,10,10));


	//echo $arrp->fields["codemp"].'aqui';
		///contenido
		echo "<table>";
		echo "<tr>";
        echo "<td>".$arrp->fields["codemp"]."</td>";
		echo "<td>".$nombre2[1]."</td>";
		echo "<td>".$apellido2[0]."</td>";
		echo "<td>".$montoaporte."</td>";
		echo "<td>".$cuenta2."</td>";
            
	    $total+=$montoaporte;


  //      $montoaporte=number_format($arrp->fields["monto"],2,'','');
//		$auxfecha=split("/",$fecreg2);
//		echo "V".str_pad(trim(strtoupper(trim(str_replace(".","",str_replace("-","",$arrp->fields["cedemp"]))))),10,"0",STR_PAD_LEFT)."00000000". str_pad(trim($auxfecha[2]),4,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[1]),2,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[0]),2,"0",STR_PAD_LEFT)."003"."040793".str_pad(str_replace(".","",$montoaporte),14,"0",STR_PAD_LEFT).chr(10);




     $arrp->MoveNext();
}

	    echo "<td>"."Monto Total: "."</td>";
        echo "<td>".$total."</td>";
		echo "</tr>";
		echo "</table>";

$bd->closed();
?>
