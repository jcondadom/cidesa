<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Herramientas.class.php");

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/tmp/despachos_almacen".date('d/m/Y').".xls");


$bd= new basedatosAdo();

	              $codesde=$_GET["codesde"];
			$codhasta=$_GET["codhasta"];
			$fecdes=$_GET["fecdes"];
			$fechas=$_GET["fechas"];
			$maxcodalm=$_GET["maxcodalm"];
			$mincodalm=$_GET["mincodalm"];
			$ubides=$_GET["ubides"];
			$ubihas=$_GET["ubihas"];
			

   

			$sql="SELECT 	A.DPHART as dphart, 
							to_char(A.FECDPH,'dd/mm/yyyy') as fecdph, 
							A.CODORI as codori,
							
							B.CODART as codart, 
							C.DESART as desart,
							c.unimed as unimed,
							d.codubi as codubi, 
							d.desubi as desubi,
							b.candph as candph
						       FROM CADPHART A, caartdph B, CAREGART c, bnubibie d
						       WHERE
						(b.CODART) >= ('".$codesde."') AND
						(b.CODART) <= ('".$codhasta."') and
						b.codalm >= ('".$mincodalm."') and 
					       b.codalm <= ('".$maxcodalm."') and
						a.fecdph >= to_date('".$fecdes."','dd/mm/yyyy') and
						a.fecdph <= to_date('".$fechas."','dd/mm/yyyy') and
						a.codori >= ('".$ubides."') and
						a.codori <= ('".$ubihas."') and
						A.DPHART=B.dphart AND
						B.CODART=C.CODART and
						a.codori=d.codubi
						ORDER BY A.codori, a.dphart, a.fecdph";

						//print '<pre>'; print $sql;

			
	$arrp=$bd->select($sql);
	

        echo "<table>";
    	echo "<tr>";
    	echo "<td>"."MOVIMIENTO DE ARTICULOS"."</td>";
        echo "</tr>";
        echo "<tr>";
    	 echo "</tr>";
		echo "</table>";

		///cabecera
		echo "<table>";
		echo "<tr>";
        echo "<td>"."NUM_DESP"."</td>";
		echo "<td>"."FEC_DESP"."</td>";
		echo "<td>"."COD_ART"."</td>";
	    echo "<td>"."DESCR_ART"."</td>";
	    echo "<td>"."CANT_DESP"."</td>";
	    echo "<td>"."UNI_MED"."</td>";
	    echo "<td>"."UNIDAD_DESP"."</td>";

       

        
		echo "</tr>";
		echo "</table>";
		///fin cabecera


while(!$arrp->EOF)
{

           
		echo "<table>";
		echo "<tr>";
		echo "<td>".$cont."</td>";
              echo "<td>".$arrp->fields["dphart"]."</td>";
		echo "<td>".$arrp->fields["fecdph"]."</td>";
		echo "<td>".$arrp->fields["codart"]."</td>";
	       echo "<td>".$arrp->fields["desart"]."</td>";
		
		echo "<td>".H::Formatomonto($arrp->fields["candph"],0,0)."</td>";

		echo "<td>".$arrp->fields["unimed"]."</td>";
		echo "<td>".$arrp->fields["desubi"]."</td>";

       
       
		echo "</tr>";
		echo "</table>";

    $cont++;
 $arrp->MoveNext();
   
}// arrp

?>
