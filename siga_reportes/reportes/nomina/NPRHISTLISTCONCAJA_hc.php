<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Herramientas.class.php");

	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/tmp/listado_caja_ahorros".date('d/m/Y').".xls");


$bd= new basedatosAdo();

	              $codempdes=$_GET["codempdes"];
			$codemphas=$_GET["codemphas"];
			$codcardes=$_GET["codcardes"];
			$codcarhas=$_GET["codcarhas"];
			$codnom=$_GET["codnom"];
			$especial=$_GET["especial"];
		       $fecreg1=$_GET["fecreg1"];
			$fecreg2=$_GET["fecreg2"];
			$tipnomesp=$_GET["tipnomesp"];
		    

		
		
         if ($codnom == '001')
                {
                	$con1 = "D07"; 
			$con2 = "P09"; 
			$con3 = "D39"; 
			$con4 = "DC1"; 
			$con5 = "DC6"; 
			$con6 = "DE2"; 

	         }
			if ($codnom == '002')

                {
			$con1 = "D30"; 
			$con2 = "P10"; 
			//$con3 = "D50"; 
			$con3 = "D10"; 
			$con4 = "DC2"; 
			$con5 = "DC7"; 
			$con6 = "DE3"; 

          	
                }
			if ($codnom == '003')
                {
                	$con1 = "D27"; 
			$con2 = "P18"; 
			//$con3 = "D26"; 
			$con3 = "D43"; 
			$con4 = "DC4"; 
			$con5 = "DC9"; 
			$con6 = "DE5"; 

						                	
                }
			if ($codnom == '004')
                {
                	$con1 = "D28') or (codcon='DF3') or (codcon='DE7"; 
			$con2 = "P19') or (codcon='P94') or (codcon='P96"; 
			//$con3 = "D29"; 
			$con3 = "D35"; 
			$con4 = "DC3"; 
			$con5 = "DC8"; 
			$con6 = "DE4"; 

		  }
			if ($codnom == '006')
                {
                	$con1 = "D44"; 
			$con2 = "P25"; 
			
                }

			if ($codnom == '008')
                {
                	$con1 = "DG4"; 
			$con2 = "P98"; 
			//$con3 = "DB1";
			$con3 = "DB2";
			$con4 = "DC5"; 
			$con5 = "DE1"; 
			$con6 = "DE6"; 

 
                }

				if ($codnom == '009')
                {
                		$con1 = "DA8"; 
			$con2 = "P83"; 
			$con3 = "DH1";
			//$con3 = "DB2";
				$con4 = "DC5"; 
				$con5 = "DE1"; 
				$con6 = "DE6"; 

 
                }




		

		  if ($especial == 'S')
                {
                $especial = "especial = 'S' AND (CODNOMESP) = TRIM('".$tipnomesp."') AND ";
                }
                else
                {if ($especial == 'N')          
                $especial = "especial = 'N' AND";
                }


				
				$sql="SELECT A.CODEMP, A.NOMEMP, B.CODNOM, B.STATUS
							FROM NPHOJINT A, NPASICAREMP B
							WHERE
							A.CODEMP=B.CODEMP AND
							A.CODEMP >= RTRIM('".$codempdes."') AND A.CODEMP <= RTRIM('".$codemphas."') AND
							A.STAEMP='A' AND
							B.CODNOM='".$codnom."' AND
							B.STATUS='V'
							order by a.codemp";


		

			//print '<pre>'; print $sql;

			$arrp=$bd->select($sql);

			$cont=1;
			echo "<table>";
    		echo "<tr>";
    		echo "</tr>";
        	echo "<tr>";
    		echo "</tr>";
		echo "</table>";

		///cabecera
		echo "<table>";
		echo "<tr>";
        	echo "<td>"."N#"."</td>";
		echo "<td>"."Cedula       "."</td>";
		echo "<td>"."Nombre                                                                       "."</td>";
	    	echo "<td>"."Retencion Emp."."</td>";
	    	echo "<td>"."Aporte Patr."."</td>";
		//echo "<td>"."Prestamo Caja Ahorros."."</td>";
		echo "<td>"."Prestamo Comercial Caja Ahorros."."</td>";
		echo "<td>"."Prestamo Caja Ahorros Corto Plazo."."</td>";
		echo "<td>"."Prestamo Caja Ahorros Mediano Plazo."."</td>";
		echo "<td>"."Prestamo Caja Ahorros Largo Plazo."."</td>";





			while(!$arrp->EOF)
			{
				$monto1=0;
				$sql1="select sum(monto) as monto1 from nphiscon where
						codemp='".$arrp->fields["codemp"]."' and
							".$especial."
						fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND
						fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') AND
						((codcon='$con1'))";
				$tbg1=$bd->select($sql1);
				$monto1=$tbg1->fields["monto1"];
				
				//print '<pre>'; print $sql1;


				$monto2=0;
				$sql2="select sum(monto) as monto2 from nphiscon where
						codEMP ='".$arrp->fields["codemp"]."' and
							".$especial."
						fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND
						fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') AND
						((codcon='$con2'))";
				$tbg2=$bd->select($sql2);
				$monto2=$tbg2->fields["monto2"];

				//print '<pre>'; print $sql2;

				$monto3=0;
				$sql3="select sum(monto) as monto3 from nphiscon where
						codEMP ='".$arrp->fields["codemp"]."' and
								".$especial."
						fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND
						fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') AND
						((codcon='$con3'))";
				$tbg3=$bd->select($sql3);
				$monto3=$tbg3->fields["monto3"];

				if ($monto3 == '')
              	  {
                		$monto3 = "0";
              	  }

					
        			$monto4=0;
				$sql4="select sum(monto) as monto4 from nphiscon where
						codEMP ='".$arrp->fields["codemp"]."' and
							".$especial."
						fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND
						fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') AND
						((codcon='$con4'))";
				$tbg4=$bd->select($sql4);
				$monto4=$tbg4->fields["monto4"];
				if ($monto4 == '')
              	  {
               		$monto4 = "0";
              	  }

				$monto5=0;
				$sql5="select sum(monto) as monto5 from nphiscon where
						codEMP ='".$arrp->fields["codemp"]."' and
							".$especial."
						fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND
						fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') AND
						((codcon='$con5'))";
				$tbg5=$bd->select($sql5);
				$monto5=$tbg5->fields["monto5"];
				if ($monto5 == '')
              	  {
                		$monto5 = "0";
			  }

				$monto6=0;
				$sql6="select sum(monto) as monto6 from nphiscon where
						codEMP ='".$arrp->fields["codemp"]."' and
							".$especial."
						fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND
						fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') AND
						((codcon='$con6'))";
				$tbg6=$bd->select($sql6);
				$monto6=$tbg6->fields["monto6"];
				if ($monto6 == '')
              	  {
                		$monto6 = "0";
              	  }

                             	
		

              $total=0;
		echo "<table>";
		echo "<tr>";
		echo "<td>".$cont."</td>";
              echo "<td>".$arrp->fields["codemp"]."</td>";
		echo "<td>".$arrp->fields["nomemp"]."</td>";
		echo "<td>".number_format($monto1,2,',','.')."</td>";
		echo "<td>".number_format($monto2,2,',','.')."</td>";
		echo "<td>".number_format($monto3,2,',','.')."</td>";
		echo "<td>".number_format($monto4,2,',','.')."</td>";
		echo "<td>".number_format($monto5,2,',','.')."</td>";
		echo "<td>".number_format($monto6,2,',','.')."</td>";
		

		
		$cont=$cont+1;
		
				$refemp=$arrp->fields["codemp"];

				$arrp->MoveNext();

			}



        
?>
