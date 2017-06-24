<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $per1;
		var $per2;
		var $cod1;
		var $cod2;
		var $estado;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->cod1=$_POST["cod1"];
			$this->cod2=$_POST["cod2"];
			$this->codn1=$_POST["codn1"];
			$this->codn2=$_POST["codn2"];


		      $this->sql3="select a.codnom, a.codcar,  b.nomcar, b.canphom, b.canpmuj, b.canmix, b.carvan, b.graocp  from
     					npasicarnom a, npcargos b, npnomina c
					where
					a.codcar=b.codcar and
 					a.codnom=c.codnom and
					rtrim(a.codnom) = rtrim('".$this->codn1."')  
					
					order by b.nomcar";  

              

			


		//print '<pre>'; print $this->sql3; exit;

			$this->llenartitulosmaestro();
			$this->getAncho();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Nomina";
				$this->titulos[1]="Codigo Cargo";
				$this->titulos[2]="Descripcion Cargo";
				$this->titulos[3]="Grado Cargo";

                            $this->titulos[4]="Cargos Disponibles";
				$this->titulos[5]="Cargos Asignados";
				$this->titulos[6]="Cargos Vacantes";
		}
		function getAncho()
		{

			$this->anchos[0]=15;
			$this->anchos[1]=15;
			$this->anchos[2]=75;
			$this->anchos[3]=25;
			$this->anchos[4]=20;
                     $this->anchos[5]=20;
			$this->anchos[6]=20;

  
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			$this->setFont("Arial","B",8);
			$this->setwidths($this->anchos);
			$this->setAligns(array("L","L","L","L","L","L"));
			$this->Row($this->titulos);
			$this->setwidths($this->anchos);
			$this->setAligns(array("C","C","R","C","C","C"));
			$this->Line(10,45,210,45);
			$this->ln();

		}
		function Cuerpo()
		{
                     $tb3=$this->bd->select($this->sql3);
		 //print $this->sql3; exit;


		       $totnom=0;
		       $empnom=0;
		       $total=0;
		       $totalemp=0;
			$this->setFont("Arial","",8);
			$ref=$tb3->fields["codnom"];
			
			 

			

   			 $conta=0;


			while (!$tb3->EOF)

			{
                            $this->setX(13);
				$this->cell(15,4,$tb3->fields["codnom"]);
				$this->setX(27);
				$this->cell(15,4,$tb3->fields["codcar"]);
				$this->setX(40);
				$this->cell(15,4,$tb3->fields["nomcar"]);
				$this->setX(128);
                            $this->cell(5,4,$tb3->fields["graocp"],0,0,R);

                            $this->setX(145);
                            $this->cell(5,4,$tb3->fields["canphom"]+$tb3->fields["canpmuj"],0,0,R);
				

				$this->sql33="select a.codnom, a.codcar,  count (a.codemp) as canemp, b.staemp from
     					npasicaremp a, nphojint b 
					where
					a.codemp=b.codemp and
					a.codcar='".$tb3->fields["codcar"]."' and
 					a.codnom='".$tb3->fields["codnom"]."' and
					b.staemp='A' AND
					a.status='V'
					group by a.codnom, a.codcar, b.staemp";  
				
				$tb33=$this->bd->select($this->sql33);

				//print $this->sql33; exit;

				$conta=$conta+$tb33->fields["canemp"];

				$this->setX(165);
                            $this->cell(10,4,$tb33->fields["canemp"],0,0,R);
				$this->setX(185);

				$subtotaldis=($tb3->fields["canphom"]+$tb3->fields["canpmuj"]);


				$totaldis=($subtotaldis-$tb33->fields["canemp"]);
                            
				$this->cell(10,4,$totaldis,0,0,R);

				
				$totvac=$totvac+$totaldis;
			


				if($ref!=$tb3->fields["codnom"])
				{
					

					$this->ln(6);
					//$this->MCplus(180,4,' <@Total Nómina  '.trim($nomref).' : '.H::FormatoMonto($totnom).' <,>arial,B,10,155,0,0  @>');
					$this->MCplus(180,4,' <@Total Empleados de la Nómina   : '.($empnom).' <,>arial,B,10,155,0,0  @>');
					$totnom=0;
					$empnom=0;
					$this->ln(8);
					$this->MCplus(180,4,' <@ Código Nómina:  '.$tb->fields["codnom"].'<,>arial,B,10,155,0,0 @>');
					$this->MCplus(180,4,' <@ Descripción Nómina:  '.$tb->fields["nomnom"].'<,>arial,B,10,155,0,0 @> ');
					$this->ln(3);
				}
				//if ($tb->fields["carvan"]=='0'){
					//$tb->fields["carvan"]='';
				//}
                           
			 $totalas+=($tb3->fields["canphom"]+$tb3->fields["canpmuj"]);


				$this->Row(array("".$tb->fields["codcar"],trim($tb->fields["nomcar"]),H::FormatoMonto($tb->fields["suecar"]),
						      $tb2->fields["canmix"],$tb->fields["canemp"],trim($totalas)));
				$totnom+=$tb->fields["suecar"];
				$empnom+=$tb->fields["canemp"];
				$totalnom+=$tb3->fields["canemp"];
                            

				$total+=$tb->fields["suecar"];
				$nomref=$tb->fields["nomnom"];
				  $tb3->MoveNext();
			}
			$this->ln(6);
			$this->MCplus(180,4,' <@Total Cargos Disponibles   : '.($totalas).' <,>arial,B,11,0,0,155 @>');
			$this->MCplus(180,4,' <@Total de Cargos Asignados a Nomina: '.($conta).' <,>arial,B,11,0,0,155 @>');
                     $this->MCplus(180,4,' <@Total de Cargos Vacantes: '.($totvac).' <,>arial,B,11,0,0,155 @>');
			$this->bd->closed();
		}
	}
?>
