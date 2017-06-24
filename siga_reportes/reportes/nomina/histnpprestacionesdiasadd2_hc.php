<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Herramientas.class.php");

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/tmp/dias_Adicionales_Prestaciones_".date('d/m/Y').".xls");

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




						$sql = "select codemp as codemp,cedemp,numcue as numcue,CODNOM,FECING,nomemp,NACEMP,fecnac,sexemp,CODNIV,sum(monto) as monto  ,cast(REPLACE(cedemp,'.', '') as int ) as repl from (select distinct codemp as codemp,cedemp,numcue,CODNOM,codcar,FECING,nomemp,NACEMP,fecnac,sexemp,CODNIV,monto,cast(REPLACE(cedemp,'.', '') as int ) as repl from ((SELECT
									DISTINCT
									A.CODEMP as codemp,
									B.CEDEMP as cedemp,
									b.numcue as numcue,
									--replace(b.numcue,'-', '' ) as numcue,

									A.CODNOM,
									A.CODCAR as codcar,
									SUM(A.monto) as MONTO,
									to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
									B.NOMEMP as nomemp,
									B.NACEMP,
									to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
									B.SEXEMP as sexemp,
									B.CODNIV, cast(REPLACE(b.cedemp,'.', '') as int ) as repl, '0014' as codtipapor
									 FROM
									   nphiscon  A,NPHOJINT B, npdefcpt e, npconsalint d
									 WHERE
									 " . $especial . "
									B.CODEMP = A.CODEMP and A.codcon = d.codcon and A.codnom = d.codnom
									--AND e.opecon='A'
									AND  A.CODNOM >= '" . $tipnom . "' 
									AND  A.CODNOM <= '" . $tipnom2 . "' 
									AND  B.CODEMP >=  ('" . $codempdes . "')
									AND  B.CODEMP <= ('" . $codemphas . "')
									and a.codcat >= ('" . $codcatdes . "')
									and a.codcat <= ('" . $codcathas . "') AND
									A.fecnom >= to_date('" . $fecreg1 . "','dd/mm/yyyy') AND A.fecnom <= to_date('" . $fecreg2 . "','dd/mm/yyyy') and
			                        a.codcon=e.codcon   and ( montorethist('0014','A',A.CODNOM,B.CODEMP,A.CODCAR,'" . $fecreg1 . "','" . $fecreg2 . "') +  montorethist('0014','R',A.CODNOM,B.CODEMP,A.CODCAR,'" . $fecreg1 . "','" . $fecreg2 . "') )> 0
									GROUP BY A.CODEMP, B.CEDEMP, b.numcue, A.CODNOM, A.CODCAR, to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') ,
				                    B.NOMEMP , B.NACEMP, to_char(B.FECNAC,'dd/mm/yyyy') , B.SEXEMP ,B.CODNIV, a.codcat order by cast(REPLACE(b.cedemp,'.', '') as int ) )
			union all
					             (    SELECT
									DISTINCT
									A.CODEMP as codemp,
									B.CEDEMP as cedemp,
									b.numcue  as numcue,
									--replace(b.numcue,'-', '' ) as numcue,
									A.CODNOM,
									A.CODCAR as codcar,
									SUM(A.monto) as MONTO,
									to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
									B.NOMEMP as nomemp,
									B.NACEMP,
									to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
									B.SEXEMP as sexemp,
									B.CODNIV, cast(REPLACE(b.cedemp,'.', '') as int ) as repl, '0013' as codtipapor
									 FROM
									   nphiscon  A,NPHOJINT B, npdefcpt e, npconsalint d
									 WHERE
									  " . $especial . "
									B.CODEMP = A.CODEMP and A.codcon = d.codcon and A.codnom = d.codnom
									--AND e.opecon='A'
									AND  A.CODNOM >= '" . $tipnom . "' 
									AND  A.CODNOM <= '" . $tipnom2 . "' 
									AND  B.CODEMP >=  ('" . $codempdes . "')
									AND  B.CODEMP <= ('" . $codemphas . "')
									and a.codcat >= ('" . $codcatdes . "')
									and a.codcat <= ('" . $codcathas . "') AND
									A.fecnom >= to_date('" . $fecreg1 . "','dd/mm/yyyy') AND A.fecnom <= to_date('" . $fecreg2 . "','dd/mm/yyyy') and
			                        a.codcon=e.codcon   and ( montorethist('0013','A',A.CODNOM,B.CODEMP,A.CODCAR,'" . $fecreg1 . "','" . $fecreg2 . "') +  montorethist('0013','R',A.CODNOM,B.CODEMP,A.CODCAR,'" . $fecreg1 . "','" . $fecreg2 . "') )> 0
									GROUP BY A.CODEMP, B.CEDEMP, b.numcue, A.CODNOM, A.CODCAR, to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') ,
				                    B.NOMEMP , B.NACEMP, to_char(B.FECNAC,'dd/mm/yyyy') , B.SEXEMP ,B.CODNIV, a.codcat order by cast(REPLACE(b.cedemp,'.', '') as int  )
									) )a group by
									codemp,cedemp,numcue, CODNOM,codcar,FECING,nomemp,NACEMP,fecnac,sexemp,CODNIV,monto
			                      )a group by
			codemp,cedemp,numcue,CODNOM,FECING,nomemp,NACEMP,fecnac,sexemp,CODNIV  order by cast(REPLACE(cedemp,'.', '') as int ) 
				                    		";
			//print "<pre>";print_r($sql); exit;





/*
        echo "<table>";
    	echo "<tr>";
    	echo "<td>"."NOMBRE DE LA EMPRESA: CONTRALORIA MUNICIPAL DE CHACAO"."</td>";
        echo "<tr>";
    	echo "<td>"."NUMERO DE FONDO:      667 "."</td>";
        echo "</tr>";
		    	echo "<td>"."OPERACION A REALIZAR: "."</td>";
        echo "</tr>";
		echo "</table>";
*/
		///cabecera
		echo "<table>";
		echo "<tr>";
		echo "<td>"."Nº"."</td>";
		echo "<td>"."Cedula"."</td>";
		echo "<td>"."Nombre"."</td>";
		echo "<td>"."Apellido"."</td>";
	    echo "<td>"."Monto"."</td>";
	    echo "<td>"."Cuenta"."</td>";



$arrp=$bd->select($sql);
$pri=true;
while(!$arrp->EOF)
{
	//echo $arrp->fields["codemp"].'aqui';


        	$sql5 = "select sum (ELMONTO) as ELMONTO from (SELECT SUM(MONTO) as  ELMONTO
																 FROM NPCONTIPAPORET C, NPHOJINT B, NPHISCON A
																 WHERE
																 C.CODTIPAPO='0014' AND
																 B.CODEMP='" . $arrp->fields["codemp"] . "' AND
																 FECNOM>=to_date('" . $fecreg1 . "','dd/mm/yyyy') AND
														  		 FECNOM<=to_date('" . $fecreg2 . "','dd/mm/yyyy') AND
																 A.CODCAR='" . $arrp->fields["codcar"] . "' AND
																 A.CODNOM=C.CODNOM AND
																 A.CODCON=C.CODCON AND
																 C.TIPO='A' AND
																 B.CODEMP=A.CODEMP
																 union
																 SELECT SUM(MONTO) as  ELMONTO
																 FROM NPCONTIPAPORET C, NPHOJINT B, NPHISCON A
																 WHERE
																 (C.CODTIPAPO='0013' or C.CODTIPAPO='0014')  and
																 B.CODEMP='" . $arrp->fields["codemp"] . "' AND
																 FECNOM>=to_date('" . $fecreg1 . "','dd/mm/yyyy') AND
														  		 FECNOM<=to_date('" . $fecreg2 . "','dd/mm/yyyy') AND
															--	 A.CODCAR='" . $arrp->fields["codcar"] . "' AND
																 A.CODNOM=C.CODNOM AND
																 A.CODCON=C.CODCON AND
																 C.TIPO='A' AND
																 B.CODEMP=A.CODEMP)a

						";
			//print($sql5); exit;
		$tb5=$bd->select($sql5);
       	$contador+=1;
		

		$montoaporte=number_format($tb5->fields["elmonto"],2,',','');
		$auxfecha=split("/",$fecreg2);
             
		 $apellido=($arrp->fields["nomemp"]);
        	 $apellido2=explode(",",$apellido);
		 $nombre=$apellido2[1];
		 $nombre2=explode(" ",$nombre);
		 $apellido3=rtrim(substr($apellido2[0],0,20));


		
			









			// $cuenta=rtrim($arrp->fields["numcue"]." ");


		//$cuenta3=rtrim(substr($cuenta,0,20));

              
		$cuenta=str_replace("-","",$arrp->fields["numcue"]);
		
		$cuenta2=trim(substr($cuenta,0,23));

              //$cuenta2=explode($cuenta);


		//$cuenta2=str_pad(trim(substr($cuenta,1,11)));















		///contenido


		echo "<table>";
		echo "<tr>";
		echo "<td>".$contador."</td>";
              echo "<td>".$arrp->fields["codemp"]."</td>";
		echo "<td>".$nombre2[1]."</td>";
		echo "<td>".$apellido3."</td>";
		echo "<td>".$montoaporte."</td>";
		
		echo "<td>".$cuenta2."&nbsp;</td>";


              //echo "<td>".$arrp->fields["numcue"]."</td>";

		//$montoaporte=number_format($tb5->fields["elmonto"],2,',','');

            
	      $total+=number_format($montoaporte,2,',','');

		//echo str_pad(trim(strtoupper(trim(str_replace(".","",str_replace("-","",$arrp->fields["cedemp"]))))),10,"0",STR_PAD_LEFT).";".str_pad(trim(substr($arrp->fields["nomemp"],0,35)),35," ",STR_PAD_RIGHT).";".str_pad(str_replace(".","",$montoaporte),15,"0",STR_PAD_LEFT).chr(10);

     $arrp->MoveNext();
}

	    echo "<td>"."Monto Total: "."</td>";
        echo "<td>".$total."</td>";
		echo "</tr>";
		echo "</table>";

$bd->closed();
?>
