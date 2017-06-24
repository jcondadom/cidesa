<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

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
		var $codesde;
		var $codhasta;
		var $estado;
		var $conf;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codesde=$_POST["coddesde"];
			$this->codhasta=$_POST["codhasta"];
			$this->estado=$_POST["estado"];
			$this->sql="SELECT
						distinct	A.CODEMP as codemp,
							A.NOMEMP as nomemp,
							A.CEDEMP as cedemp,
							A.NUMCON as numcon, B.nomcar as nomcar,
							A.CODPAI AS codpai,
							A.CELEMP as celemp,
							A.STAEMP as staemp,
							A.FOTEMP as fotemp,
							A.OBSEMP as obsemp,
							c.desniv as ubica
						FROM NPHOJINT A, NPASICAREMP B, npestorg c
						WHERE
							RTRIM(A.CODEMP) >= RTRIM('".$this->codesde."') AND
							RTRIM(A.CODEMP) <= RTRIM('".$this->codhasta."') AND 
                                                 A.codemp=B.codemp and 
                                                 c.codniv=a.codniv and 
						       (b.codnom='001' or b.codnom='999') and
                                                 b.status='V' and
							a.staemp='A'
                                                 --and A.CODPAI=C.CODPAI
						ORDER BY A.CODEMP";


						//print '<pre>';print $this->sql;

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			//Marco de la P�gina

			while(!$tb->EOF)
			{
			    $this->Rect(10,35,200,160);
				 
				 $this->SetY(33);
				 $this->setFont("Arial","B",8);
				
                             $this->Cell(200,10,"PERÍODO DE EVALUACIÓN",0,0,'C',0);
							  $this->ln(2);
			 				 $this->setFont("Arial","",6);
							 $this->Cell(26,20,"PERÍODO A EVALUAR: ",0,0,'C',0);
			 
				 $this->line(10,41,210,41);
 


 				// $this->SetTextColor(0,0,0);
				 $this->ln(12);
				 $this->setFont("Arial","B",8);
				 $this->line(10,48,210,48);
				 $this->Cell(180,8,"DATOS DEL EVALUADO",0,0,'C',0);
				 $this->line(10,54,210,54);
 				 //$this->setFont("Arial","B",8);
				 //$this->cell(55,18,'Apellidos y Nombres');
				 //$this->cell(30,18,'       Cédula de Identidad');
				 $this->ln(6);
				 $this->setFont("Arial","",6);
				 $this->cell(55,13,$tb->fields["nomemp"]);
				 $this->setFont("Arial","",6);
				 $this->cell(30,13,$tb->fields["cedemp"]);
				 $this->ln(3);
				$this->setFont("Arial","",8);
				 //años en la contraloria o en la empresa
				 $this->sql2="select antpub_e('A',codemp,date(now()),'S') as ano,
							antpub_e('M',codemp,date(now()),'S') as mes,
							antpub_e('D',codemp,date(now()),'S') as dias
							from nphojint
							where codemp=RTRIM('".$tb->fields["codemp"]."') ";//H::PrintR($this->sql2);exit;
							 $tb2=$this->bd->select($this->sql2);

							 //print '<pre>'; print  $this->sql2;
				//años en la administracion publica
							  $this->sql222="select antpub('A',codemp,date(now()),'S') as ano,
							antpub('M',codemp,date(now()),'S') as mes,
							antpub('D',codemp,date(now()),'S') as dias
							from nphojint
							where codemp=RTRIM('".$tb->fields["codemp"]."') ";

					 $tb222=$this->bd->select($this->sql222);

					///H::PrintR($this->sql222);exit;

                 //   SELECT fecing,fecadmpub, *    FROM nphojint where fecadmpub is not null and fecing<>fecadmpub
                // $this->cell(30,10,'A:'.$tb222->fields["ano"].'/M:'.$tb222->fields["mes"].'/D:'.$tb222->fields["dias"]);



				// $this->cell(30,10,'A:'.$tb2->fields["ano"].'/M:'.$tb2->fields["mes"].'/D:'.$tb2->fields["dias"]);
			//	 $this->cell(30,10,"");
				 
				 //$this->cell(30,10,'Fecha Ingreso');
				$this->setFont("Arial","B",8);
                              $this->ln(-5);

				$this->setx(10);
				 $this->cell(13,10,'Apellidos y Nombres:');
				 $this->cell(32,10,'');
				 $this->cell(40,10,'Cédula de Identidad:');
				 $this->cell(10,10,'Cargo:');
				 $this->cell(50,10,'');
				 $this->cell(35,10,'Dependencia:');
				 $this->ln(4);
					$this->setFont("Arial","",6);
				 $this->cell(30,10,$tb->fields["fecing"]); $y=$this->gety();
				  $this->setxy(80,$y+3);
				 $this->multicell(80,3,$tb->fields["nomcar"]);
				 $this->cell(35,10,'');
				 $this->cell(30,10,"");
				 $this->setxy(135,$y+3);
				  $this->cell(59,3,$tb->fields["ubica"]);

				 //$this->ln(2);
				 $this->line(10,$this->getY(),210,$this->getY());

				 ///DATOS EVALUACIÓN DE OBJETIVOS
				 $sql="SELECT A.CODEVDO as codevdo,
							A.CODOBJ as codobj,
						
						   	A.CODNIV as codniv,
							A.PESOBJ as pesobj,
							
							C.CODOBJ as codobj,
							C.DESOBJ as desobj
							
						FROM
							rhrelobjind A, RHDEFOBJ C
						WHERE
							(A.CODOBJ) = (C.CODOBJ) AND
							(A.CODEVDO) = '".$tb->fields["codemp"]."'
						ORDER BY A.CODOBJ";


			//print '<pre>';print $sql;exit;
			     $tbInfCom=$this->bd->select($sql);

				 if (!$tbInfCom->EOF)
				 {
					//DATOS PERSONALES
				    $this->setFont("Arial","B",9);
				   // $this->SetTextColor(0,0,128);
				   					$this->ln(4);
				       $this->line(10,$this->getY(),210,$this->getY());
                    $this->Cell(200,5,"ESTABLECIMIENTO Y REVISIÓN DE LOS O.D.I.",0,0,'C',0);
				       $this->line(10,$this->getY()+5,210,$this->getY()+5);
				   // $this->SetTextColor(0,0,0);
					$this->ln(5);
 				    $this->setFont("Arial","B",8);
					$this->cell(2,10,'');
					$this->cell(15,5,'Nº');
					$this->line(19,67,19,157);
					$this->cell(125,5,'                                  OBJETIVOS DE DESEMPEÑO INDIVIDUAL');
					$this->line(150,67,150,157);
					$this->line(10,71,210,71);

					$this->cell(17,5,'PESO');
					//$this->cell(11,2,'RANGO');
					//$this->setXY(175,60);
					$this->cell(20,5,'     OBSERVACIÓN');
					$this->line(165,67,165,157);
					//$this->line(170,59,170,150);
					//$this->line(175,59,175,150);
					//$this->line(180,59,180,150);
					//$this->line(185,56,185,157);
					//$this->line(165,59,185,59);
					$this->setXY(166,60);
					//$this->cell(5,3,'1');
					//$this->cell(5,3,'2');
					//$this->cell(5,3,'3');
					//$this->cell(5,3,'4');
					//$this->ln(1);
					//$this->line(10,$this->getY()+5,210,$this->getY()+5);
					$this->ln(15);
				


						 while(!$tbInfCom->EOF)
						 {
							 $this->setFont("Arial","",8);
		 					 $this->cell(10,5,$tbInfCom->fields["codobj"]);
							 $this->multicell(130,2.5,$tbInfCom->fields["desobj"]);
							

							 $this->setx(155);
 							 $this->cell(7,-5,number_format($tbInfCom->fields["pesobj"],0));
                                                  $totpeso=$totpeso+($tbInfCom->fields["pesobj"]);
							/*if ($tbInfCom->fields["punobj"]=='1')
							  {
							    $this->setx(165);							   
							   //$this->cell(15,-5,'X');

							   }
							if ($tbInfCom->fields["punobj"]=='2')
							  {
							      $this->setx(170);
								//$this->cell(20,-5,'X');				
							   }
							if ($tbInfCom->fields["punobj"]=='3')
							  {
							  	$this->setx(175);
								//$this->cell(25,-5,'X');
							   }
							if ($tbInfCom->fields["punobj"]=='4')
							  {
							       $this->setx(180);
								//$this->cell(30,-5,'X');
							   }	*/						
							 $total=(($tbInfCom->fields["pesobj"])*($tbInfCom->fields["punobj"]));
							 $this->setx(195);
 							 //$this->cell(10,-5,$total);
							 $this->ln(3);
							 $totalt=$totalt+$total;
							 $tbInfCom->MoveNext();
							 }
				 $this->line(10,150,210,150);
				 $this->setXY(155,151);
				$this->setFont("Arial","B",9);

				 $this->cell(50,6,$totpeso);
				 $this->setXY(75,151);
				$totpeso=0;
				 $this->cell(10,6,'TOTAL');
				// $this->cell(10,6,$totalt);
				  $this->setFont("Arial","",8);
				  $this->ln(6);
				  $this->line(10,157,210,157);
				  $this->line(10,162,210,162);
					$this->setFont("Arial","B",9);
				 $this->cell(100,6,'                                                                                                 CONFORMACIÓN');
//					$this->setFont("Arial","",8);
//				$this->setFont("Arial","B",8);
//					 $this->ln(4);
//				 $this->cell(40,8,'                                                                         SOLO PARA USO DEL SUPERVISOR INMEDIATO                  ');
					$this->setFont("Arial","B",7);
				 $this->line(10,167,210,167);
				 $this->line(10,177,210,177);
				$this->line(110,162,110,195);
				//$this->line(180,167,180,170);
				$this->ln(5);
				$this->cell(140,6,'                                                       EVALUADO');
				$this->cell(120,6,'EVALUADOR');
/*				$this->setFont("Arial","",5);
				$this->setXY(184,165);
				$this->cell(105,6,'FECHA');
				$this->setXY(177,166);
				$this->cell(105,8,'            DIA              MES            AÑ0');*/

				

				 } 


			  ///DATOS DEL EVALUADOR
				 $sql="SELECT  
						A.CODEVDO as codevdo,
						A.CODEVOR as codevor,
						A.CODSUP as codsup,
						B.NOMEMP as nomevor,
						to_char(FECDES,'dd/mm/yyyy') as fecdes,
						to_char(FECHAS,'dd/mm/yyyy') as fechas,
						to_char(FECELA,'dd/mm/yyyy') as fecela
						FROM
							RHDATEVA A, NPHOJINT B
						WHERE
							CODEVOR = CODEMP and
							CODEVDO = '".$tb->fields["codemp"]."'  and fecela is not null
						ORDER BY codevdo";
						//print '<pre>';print $sql; exit;

			     $tbDatEvor=$this->bd->select($sql);

					 while(!$tbDatEvor->EOF)
					 {
						 $this->ln(5);
						 $this->setFont("Arial","",8);
						  //$this->setX(40);

						 $this->cell(100,5,$tb->fields["nomemp"]);

						 $this->cell(100,5,$tbDatEvor->fields["nomevor"]);
						 
						 
		 				 if ($tbDatEvor->fields["fechas"]<='30/06/2014')
							  {
							      $this->setXY(35,35);
				  				 $this->setFont("Arial","B",7);
								$this->cell(10,20,'PRIMER SEMESTRE');				
							   }
							   else
							    	{
									$this->setXY(35,35);
				  				 	$this->setFont("Arial","B",7);
									$this->cell(10,20,'PRIMER SEMESTRE');	
							 		}		
				
					/*	$this->setXY(180,169);
						$auxfec = split("/",$tbDatEvor->fields["fecela"]);
					$this->cell(10,8,$auxfec[0],1,0,'C');
					$this->cell(10,8,$auxfec[1],1,0,'C');
					$this->cell(10,8,$auxfec[2],1,0,'C');
						 $this->ln(1);*/
						 $tbDatEvor->MoveNext();
					 }

				   $this->ln(4);
					$this->setFont("Arial","",7);
                               $this->setXY(10,176);
				   $this->cell(60,20,'FIRMA:');
				   $this->cell(40,20,'FECHA:           /         /');
				   $this->cell(60,20,'FIRMA:');
				   $this->cell(60,20,'FECHA:           /        /');
 //         				$this->line(10,194,175,194);
//					$this->line(10,198,175,198);	
//					$this->line(10,208,210,208);
//					$this->line(10,212,210,212);
//					$this->line(10,222,210,222);
//					$this->line(10,235,210,235);
//					$this->line(10,239.5,210,239.5);
					//$this->line(10,255,210,255);
/*					$this->line(175,177,175,208);
				$this->setXY(70,193);
					$this->setFont("Arial","B",8);
				   $this->cell(105,6,'SOLO PARA USO DEL SUPERVISOR MEDIATO');
				$this->setFont("Arial","",7);
				$this->setXY(10,197);
				$this->cell(105,6,'APELLIDOS Y NOMBRES:');
				$this->cell(24,6,'FIRMA');
				$this->setXY(10,199);
				$this->cell(115,10,'UZCATEGUI DLIMA, REBECA');
				$this->line(115,198,115,208);
				$this->setXY(78,207);
					$this->setFont("Arial","B",8);
				   $this->cell(105,6,'SOLO PARA USO DEL EVALUADO');
					 $this->ln(4);
					$this->setFont("Arial","",7);
				   $this->cell(27,6,'ESTA DE ACUERDO');
				   $this->cell(105,6,'COMENTARIO DEL EVALUADO');


				$this->rect(12,216,5,4); 	
				$this->rect(25,216,5,4);  
				$this->line(37,212,37,222);
				$this->setXY(18,215);
				$this->cell(10,6,'SI               NO');


				//$this->rect(12,217,5,4,"DF"); //CUADRO PINTADO
				
				$this->setXY(10,221);
				$this->cell(10,6,'APELLIDOS Y NOMBRES DEL EVALUADO                                                         FIRMA DEL EVALUADO                                                                     FECHA DE NOTIFICACIÓN');
				$this->line(168,222,168,235);
				$this->line(98,222,98,235);
				$this->setFont("Arial","",5);
  				$this->setXY(173,223);
				$this->cell(105,6,'DIA                     MES                       AÑ0');
				$this->line(168,225,210,225);
				$this->line(182,225,182,235);
				$this->line(195,225,195,235);
				 $this->ln(3);
				$this->setFont("Arial","",8);
				$this->cell(45,10,$tb->fields["nomemp"]);
				 $this->ln(8);
				$this->setFont("Arial","B",8);
				$this->cell(105,6,'                                                                                         SOLO PARA USO DEL DESPACHO DEL CONTRALOR');
				$this->setFont("Arial","",7);
				$this->line(160,239.5,160,265);
				$this->ln(5);
				$this->cell(105,6,'APELLIDOS Y NOMBRES                                                                                                                                                                                  SELLO');
				$this->ln(5);
				$this->setFont("Arial","B",8);
				$this->cell(105,6,'RAFAEL SÁEZ');
				$this->setFont("Arial","",7);
				$this->setY(253);

				$this->cell(105,6,'FIRMA                                                        FECHA');

					

*/




				 //  $this->line(10,$this->getY(),270,$this->getY());
				 // if (!$tbExpLab->EOF)
				 /////////////////////////////////

				 $tb->MoveNext();
				 if (!$tb->EOF)  {$this->AddPage();}
			     $this->ln(3);
			}
		}
	}
?>