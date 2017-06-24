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
			$this->codhasta=$_POST["coddesde"];
			//$this->codhasta=$_POST["codhasta"];
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
						FROM NPHOJINT A, NPASICAREMP B, npestorg c--, NPPAIS C
						WHERE
							RTRIM(A.CODEMP) >= RTRIM('".$this->codesde."') AND
							RTRIM(A.CODEMP) <= RTRIM('".$this->codhasta."') AND 
                                                 A.codemp=B.codemp and 
                                                 c.codniv=a.codniv and 
                                                 b.status='V'
                                                 --and A.CODPAI=C.CODPAI
						ORDER BY A.CODEMP";


						//print '<pre>';print $this->sql;

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			//$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","B",9);
		}
		function Cuerpo()
		{
			$this->cab->poner_cabecera_O($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);

			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
			//Marco de la P�gina

			while(!$tb->EOF)
			{
			    $this->Rect(10,35,200,225);
				 
				 $this->SetY(34);
				 $this->setFont("Arial","B",6);
				
                           
				$this->ln(-1);
				 $this->Cell(180,10,"NIVEL                       PROFESIONALES Y TÉCNICOS                           ADMINISTRATIVOS",0,0,'C',0);
				$this->rect(71,36,4,3);  
				$this->rect(119,36,4,3);
				 $this->line(10,42,210,42);
				$this->ln(3);
				  $this->Cell(190,10,"PERÍODO A EVALUAR: 01/11/2012 HASTA 30/04/2013",0,0,'C',0);
				//	  $this->Cell(190,10,"PERÍODO A EVALUAR: 01/01/2013 HASTA 30/04/2013",0,0,'C',0);

 					$this->ln(3);
					$this->setFont("Arial","B",8);
				  $this->Cell(180,10,"DATOS DEL EVALUADO",0,0,'C',0);

 				// $this->SetTextColor(0,0,0);
				 $this->ln(2.5);
 				 $this->setFont("Arial","B",7);
				 $this->cell(50,10,'Apellidos y Nombres');
				 $this->cell(30,10,'Cédula de Identidad');
				 $this->ln(3);
				 $this->setFont("Arial","",6);
				 $this->cell(54,10,$tb->fields["nomemp"]);
				 $this->setFont("Arial","",6);
				 $this->cell(50,10,$tb->fields["cedemp"]);
				 $this->ln(3);
				$this->setFont("Arial","",8);
				 //años en la contraloria o en la empresa
				 $this->sql2="select antpub_e('A',codemp,date(now()),'S') as ano,
							antpub_e('M',codemp,date(now()),'S') as mes,
							antpub_e('D',codemp,date(now()),'S') as dias,
							profes as profesional
							from nphojint
							where codemp=RTRIM('".$tb->fields["codemp"]."') "; //H::PrintR($this->sql2);exit;
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
                              $this->ln(-6);

				$this->setx(90);
				 $this->cell(30,10,'Cargo:');
				 $this->cell(35,10,'');
				 $this->cell(35,10,'Dependencia:');
				 $this->ln(4);
					$this->setFont("Arial","",6);
				 $this->cell(30,10,$tb->fields["fecing"]); $y=$this->gety();
				  $this->setxy(85,$y+2);
				 $this->multicell(60,2,$tb->fields["nomcar"]);
				 //$this->cell(35,10,'');
				 //$this->cell(20,10,"");
				 $this->setxy(152,$y+2);
				 $this->multicell(58,2,$tb->fields["ubica"]);

				if ($tb2->fields["profesional"]=='S')

					{$this->rect(71,36,4,3,"DF");}
				ELSE	
					{$this->rect(119,36,4,3,"DF");}

				 $this->ln(2);
				 $this->line(10,$this->getY(),210,$this->getY());

				 ///DATOS EVALUACIÓN DE COMPETENCIA
				 $sql="SELECT A.CODEVDO as codevdo,
							A.CODOBJ as codobj,
							to_char(A.FECEVAL,'dd/mm/yyyy') as feceval,
						   	A.CODNIV as codniv,
							A.PESOBJ as pesobj,
							A.PUNOBJ as punobj,
							C.CODOBJ as codobj,
							C.DESOBJ as desobj
							
						FROM
							RHEVAEMPOBJ A, RHDEFOBJ C
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
                    $this->Cell(210,5,"EVALUACIÓN DE COMPETENCIAS (1ra. FASE)",0,0,'C',0);
				       $this->line(10,$this->getY()+5,210,$this->getY()+5);
				   // $this->SetTextColor(0,0,0);
					$this->ln(6);
 				    $this->setFont("Arial","B",8);
					$this->cell(2,10,'');
					//$this->cell(15,5,'Nº');
					// $this->line(19,56,19,157);
					$this->cell(141,5,'                                            OBJETIVOS DE DESEMPEÑO INDIVIDUAL');
					$this->line(150,58.5,150,145);
					$this->line(10,65,210,65);

					$this->cell(17,5,'PESO');
					$this->cell(10,2,'RANGO');
					$this->setXY(185,61);
					$this->cell(11,2,'PESO * RANGO');
					$this->line(165,58.5,165,145);
					$this->line(170,62,170,140);
					$this->line(175,62,175,140);
					$this->line(180,62,180,140);
					$this->line(185,58.5,185,145);
					$this->line(165,62,185,62);
					$this->setXY(166,62);
					$this->setFont("Arial","B",5);
					$this->cell(5,3,'1');
					$this->cell(5,3,'2');
					$this->cell(5,3,'3');
					$this->cell(5,3,'4');
					$this->ln(3);
					//$this->line(10,$this->getY()+5,210,$this->getY()+5);
					$this->ln(2);
				


						 while(!$tbInfCom->EOF)
						 {
							 $this->setFont("Arial","",8);
		 					 //$this->cell(10,5,$tbInfCom->fields["codobj"]);
							 $this->multicell(140,3,$tbInfCom->fields["desobj"]);
							

							 $this->setx(155);
 							 $this->cell(7,-5,number_format($tbInfCom->fields["pesobj"],0));
                                                  $totpeso=$totpeso+($tbInfCom->fields["pesobj"]);
							if ($tbInfCom->fields["punobj"]=='1')
							  {
							    $this->setx(165);							   
							   $this->cell(15,-5,'X');

							   }
							if ($tbInfCom->fields["punobj"]=='2')
							  {
							      $this->setx(170);
								$this->cell(20,-5,'X');				
							   }
							if ($tbInfCom->fields["punobj"]=='3')
							  {
							  	$this->setx(175);
								$this->cell(25,-5,'X');
							   }
							if ($tbInfCom->fields["punobj"]=='4')
							  {
							       $this->setx(180);
								$this->cell(30,-5,'X');
							   }							
							 $total=(($tbInfCom->fields["pesobj"])*($tbInfCom->fields["punobj"]));
							 $this->setx(195);
 							 $this->cell(10,-5,$total);
							 $this->ln(3);
							 $totalt=$totalt+$total;
							 $tbInfCom->MoveNext();
							 }
				 $this->line(10,140,210,140);
				 $this->setXY(155,140);
				$this->setFont("Arial","B",9);

				 $this->cell(60,6,$totpeso);
				 $this->setXY(170,140);
				
				 $this->cell(24,6,'TOTAL');
				 $this->cell(10,6,$totalt);
				  $this->setFont("Arial","",8);
				  //$this->ln(0);
				  $this->line(10,145,210,145);
					$this->setFont("Arial","B",9);
				$this->setx(82);
				 $this->cell(100,6,'CALIFICACIÓN (1RA FASE)');
					$this->setFont("Arial","",8);
				$this->setFont("Arial","B",8);



///////////////////////////////////////// segunda faseeeeeeee//////////////////////////////
///////////////////////////////////////

			$totalt=0;
			$totpes=0;
			$totpeso=0;

 ///DATOS EVALUACIÓN DE COMPETENCIA
				 $sql="SELECT A.CODEVDO as codevdo,
							A.CODVALINS as codvalins,
							to_char(A.FECEVAL,'dd/mm/yyyy') as feceval,
						   	A.CODNIV as codniv,
							A.PESVAL as pesval,
							A.PUNVAL as punval,
							C.DESVALINS as desvalins,
							C.OBSVALINS as obsvalins
							
						FROM
							RHEVACONCOM A, RHDEFVALINS C
						WHERE
							(A.CODVALINS) = (C.CODVALINS) AND
							(A.CODEVDO) = '".$tb->fields["codemp"]."'
						ORDER BY A.CODVALINS";


//print '<pre>';print $sql;exit;
			     $tbInfCom=$this->bd->select($sql);

				 if (!$tbInfCom->EOF)
				 {
					$this->ln(6);
				    $this->setFont("Arial","B",9);

				   
                                 $this->Cell(210,5,"EVALUACIÓN DE COMPETENCIAS (2da. FASE)",0,0,'C',0);
				    $this->ln(6);
 				    $this->setFont("Arial","B",8);
				   $this->line(10,151,210,151);

				
				
					$this->cell(125,5,'                                                       COMPETENCIAS GENERALES');
					$this->setXY(152,152);
					$this->cell(17,5,'PESO');
					$this->cell(17,2,'RANGO');
					$this->cell(11,5,'PESO * RANGO');
					$this->line(165,155,185,155);
					$this->setXY(166,155);
					$this->setFont("Arial","B",5);
					$this->cell(5,3,'1');
					$this->cell(5,3,'2');
					$this->cell(5,3,'3');
					$this->cell(5,3,'4');

					
					$this->line(10,158,210,158);
					$this->line(150,151,150,260);
					$this->line(165,151,165,260);
 					$this->line(170,155,170,253);
					$this->line(175,155,175,253);
 					$this->line(180,155,180,253);
					$this->line(185,151,185,260);

					$this->ln(3);
					//$this->line(10,$this->getY()+5,210,$this->getY()+5);
					$this->ln(4);
				


						 while(!$tbInfCom->EOF)
						 {
							 $this->setFont("Arial","",8);
		 					 //$this->cell(10,5,$tbInfCom->fields["codvalins"]);
							 $this->multicell(140,2.5,$tbInfCom->fields["desvalins"]);
							

							 $this->setx(155);
 							 $this->cell(7,-5,number_format($tbInfCom->fields["pesval"],0));
                                                  $totpeso=$totpeso+($tbInfCom->fields["pesval"]);
							if ($tbInfCom->fields["punval"]=='1')
							  {
							    $this->setx(165);							   
							   $this->cell(15,-5,'X');

							   }
							if ($tbInfCom->fields["punval"]=='2')
							  {
							      $this->setx(170);
								$this->cell(20,-5,'X');				
							   }
							if ($tbInfCom->fields["punval"]=='3')
							  {
							  	$this->setx(175);
								$this->cell(25,-5,'X');
							   }
							if ($tbInfCom->fields["punval"]=='4')
							  {
							       $this->setx(180);
								$this->cell(30,-5,'X');
							   }							
							 $total=(($tbInfCom->fields["pesval"])*($tbInfCom->fields["punval"]));
							 $this->setx(195);
 							 $this->cell(10,-5,$total);
							 $this->ln(3);
							 $totalt=$totalt+$total;
							 $tbInfCom->MoveNext();
							 }
////////////////// total segunda fase ////////////////////////////
                           
				$this->line(10,253,210,253);
				 
				$this->setFont("Arial","B",9);
				$this->setXY(70,253);
			

				$this->cell(85,6,'              CALIFICACIÓN (2DA FASE)');
				$this->cell(15,6,$totpeso);
				$this->cell(25,6,'TOTAL');
				$this->cell(15,6,$totalt);
				$this->setFont("Arial","",8);

		$this->AddPage();

/////////////////////////////   segunda pagina ////////////////////

				$this->Rect(10,15,200,135);
  
				 ///DATOS EVALUACIÓN DE OBJETIVOS
				 $sql="SELECT A.CODEVDO as codevdo,
							A.CODOBJ as codobj,
							to_char(A.FECEVAL,'dd/mm/yyyy') as feceval,
						   	A.CODNIV as codniv,
							A.PESOBJ as pesobj,
							A.PUNOBJ as punobj,
							C.CODOBJ as codobj,
							C.DESOBJ as desobj
							
						FROM
							RHEVAEMPOBJ A, RHDEFOBJ C
						WHERE
							(A.CODOBJ) = (C.CODOBJ) AND
							(A.CODEVDO) = '".$tb->fields["codemp"]."'
						ORDER BY A.CODOBJ";


				//print '<pre>';print $sql;exit;
			       $tbInfObj=$this->bd->select($sql);

					$totalobj= 0;
					$totaltobj= 0;

					 while(!$tbInfObj->EOF)
					 {
						  $totalobj=(($tbInfObj->fields["pesobj"])*($tbInfObj->fields["punobj"]));
							 $totaltobj=$totaltobj+$totalobj;
							 $tbInfObj->MoveNext();
						 
					 }

				$total1y2 = $totalt + $totaltobj ;
				$promedio = $total1y2 / 2;			 
				$this->line(10,20,210,20);
				
				$this->setFont("Arial","B",9);
	   				  			  
				
				
				  $this->line(10,25,210,25);
  				  $this->line(10,30,210,30);
				  $this->line(10,35,210,35);
				  $this->line(10,40,210,40);
				  $this->line(170,20,170,40);
				  $this->setFont("Arial","B",9);
 				 $this->setXY(70,15);
				 $this->cell(40,6,'CALIFICACIÓN (1RA FASE Y 2da FASE)');
  				 $this->setXY(122,20);
				$this->cell(60,6,'CALIFICACIÓN (1ra FASE)');
 				 $this->cell(10,6,$totaltobj);
				 $this->setXY(122,25);
				$this->cell(60,6,'CALIFICACIÓN (2da FASE)');
				 $this->cell(10,6,$totalt);
 				 $this->setXY(99,30);
				 $this->cell(83,6,'TOTAL PUNTAJE (1RA FASE Y 2da FASE)');
 				 $this->cell(10,6,$total1y2);
 				 $this->setXY(122,35);
				 $this->cell(60,6,'PROMEDIO');
 				 $this->cell(10,6,$promedio);


				  				 ///DATOS DE RANGO
				 $sql="SELECT 
						VALRAN as valran, 
						DESDET as desdet,
						VALDES as valdes,
						VALHAS as valhas
						FROM
							RHDEFDETRAN
						WHERE
							(VALHAS) >= '$promedio' AND
							(VALDES) <= '$promedio'
						ORDER BY VALRAN";


//print '<pre>';print $sql;exit;
			     $tbInfRan=$this->bd->select($sql);

 				$this->setXY(10,38);
				$this->setFont("Arial","",8);
				$this->setFont("Arial","B",8);
				$this->cell(35,10,'RANGO: ');
 				$this->cell(100,10,'Deficiente                                  Bueno                                       Muy Bueno                                Excelente');
 				if ($tbInfRan->fields["valran"]=='1')
				$this->rect(40,41.5,3,3,"DF"); else $this->rect(40,41.5,3,3);
				if ($tbInfRan->fields["valran"]=='2')
				$this->rect(80,41.5,3,3,"DF"); else $this->rect(80,41.5,3,3);	
				if ($tbInfRan->fields["valran"]=='3')
				$this->rect(120,41.5,3,3,"DF"); else $this->rect(120,41.5,3,3);	
				if ($tbInfRan->fields["valran"]=='4')
				$this->rect(160,41.5,3,3,"DF"); else $this->rect(160,41.5,3,3);
				 $this->setXY(68,45);
				 $this->cell(70,10,'SOLO PARA USO DEL SUPERVISOR INMEDIATO');
				$this->setFont("Arial","",7);
				$this->line(10,47,210,47);
				
				$this->line(10,52,210,52);
				// $this->line(10,58,210,58);
				$this->line(115,52,115,62);

				$this->line(180,52,180,95);

				$this->ln(6);
				$this->cell(105,6,'APELLIDOS Y NOMBRES');
				$this->cell(24,6,'FIRMA');
				$this->setFont("Arial","",4);
				$this->setXY(184,50);
				$this->cell(105,6,'FECHA DE EVALUACIÓN');
				$this->setXY(177,51);
				$this->cell(105,8,'               DIA                  MES                 AÑ0');

				

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

						 $this->cell(110,5,$tbDatEvor->fields["nomevor"]);
				
						$this->setXY(180,56);
						$auxfec = split("/",$tbDatEvor->fields["fecela"]);
					$this->cell(10,6,$auxfec[0],1,0,'C');
					$this->cell(10,6,$auxfec[1],1,0,'C');
					$this->cell(10,6,$auxfec[2],1,0,'C');
						 $this->ln(1);
					       
				

						 $tbDatEvor->MoveNext();
					 }

				   $this->ln(4);
					$this->setFont("Arial","",7);

                               $this->setXY(10,62);
				   $this->cell(105,6,'COMENTARIOS DEL SUPERVISOR');
					$this->setFont("Arial","",5);
                               $this->setXY(180,62);
				   $this->Multicell(30,2,'SELLO DE LA UNIDAD ADMINISTRATIVA','C');

          				$this->line(10,62,180,62);
				       $this->line(10,80,180,80);

					$this->setXY(70,80);
					$this->setFont("Arial","B",8);
				  $this->cell(105,6,'SOLO PARA USO DEL SUPERVISOR MEDIATO');

					$this->line(10,86,180,86);
					$this->setFont("Arial","",7);
				$this->setXY(10,86);
				$this->cell(105,6,'APELLIDOS Y NOMBRES');
				$this->cell(24,6,'FIRMA');
				$this->setXY(10,88);
			
				if ($tb->fields["ubica"]<>'DESPACHO DEL CONTRALOR')
							  {
							  if ($tb->fields["ubica"]<>'UNIDAD AUDITORÍA INTERNA')
							  {
							       $this->setFont("Arial","",8);
								$this->cell(105,10,'UZCÁTEGUI DLIMA, REBECA');
								$this->setFont("Arial","",7); 
			     	               	   }					
                   				    	}
			
					$this->line(10,95,210,95);
					$this->line(115,86,115,95);
					
				$this->line(10,133,210,133);
				$this->setXY(78,95.5);
					$this->setFont("Arial","B",8);
				   $this->cell(105,6,'SOLO PARA USO DEL EVALUADO');
					 $this->ln(4);
					$this->setFont("Arial","",7);
				   $this->cell(27,6,'ESTA DE ACUERDO');
				   $this->cell(105,6,'COMENTARIOS DEL EVALUADO');
				$this->rect(12,105,3,3); 	
				$this->rect(25,105,3,3);  
				$this->line(37,100,37,110);
				$this->setXY(16,104);
				$this->cell(10,6,'SI               NO');
				$this->line(10,100,210,100);

				$this->setXY(10,110);
				$this->cell(10,6,'APELLIDOS Y NOMBRES DEL EVALUADO                                                         FIRMA DEL EVALUADO                                                                    FECHA DE NOTIFICACIÓN');
				$this->line(10,110,210,110);
				$this->line(168,115,210,115);
				
				$this->line(168,120,210,120);
				$this->line(10,130,210,130);
				
				$this->line(168,110,168,130);

				$this->line(183,115,183,130);
				
				$this->line(196,115,196,130);
			
				$this->line(168,133,168,150);
				$this->line(115,133,115,150);


				//$this->line(95,110,95,130);

				$this->setFont("Arial","",5);
  				$this->setXY(173,115);
				$this->cell(105,6,'DIA                     MES                      AÑ0');

				

				 $this->ln(-2);
				$this->setFont("Arial","",8);
				$this->cell(45,10,$tb->fields["nomemp"]);
				 $this->ln(16);
				$this->setFont("Arial","B",8);
				$this->cell(105,6,'                                                                                         SOLO PARA USO DEL DESPACHO DEL CONTRALOR');
				$this->setFont("Arial","",7);
				
				
				$this->ln(5);
				$this->cell(105,6,'APELLIDOS Y NOMBRES                                                                                                              FIRMA                                                                  SELLO');
				 $this->ln(4);
				$this->setFont("Arial","",8);
				$this->cell(105,6,'SÁEZ ÁLVAREZ, RAFAEL NEPTALI');
				$this->setFont("Arial","",7);
				$this->setXY(10,145);
				$this->cell(105,6,'FECHA');

				 $this->ln(4);
				$this->cell(105,6,'VA SIN ENMIENDA');
		

				 } 


			   

					

				  
				

				


				
				
				
				

					






				 

				 $tb->MoveNext();
				 
			     
			}
		}
	}
?>