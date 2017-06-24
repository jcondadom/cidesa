<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $acum=0;
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
		var $codact1;
		var $codact2;
		var $codmue1;
		var $codmue2;
		var $nrodismue1;
		var $nrodismue2;
		var $fecreg1;
		var $fecreg2;
		var $prenom;
		var $precar;
		var $confnom;
		var $confcar;
		var $apronom;
		var $aprocar;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codact1=$_POST["codact1"];
			$this->codact2=$_POST["codact2"];
			$this->codmue1=$_POST["codmue1"];
			$this->codmue2=$_POST["codmue2"];
			$this->fecdis1=$_POST["fecdis1"];
			$this->fecdis2=$_POST["fecdis2"];

			
			$this->codubiori1=$_POST["codubiori1"];
			$this->codubiori2=$_POST["codubiori2"];
			
			$this->prenom=$_POST["prenom"];
			$this->precar=$_POST["precar"];
			$this->confnom=$_POST["confnom"];
			$this->confcar=$_POST["confcar"];
			$this->apronom=$_POST["apronom"];
			$this->aprocar=$_POST["aprocar"];
			$this->estado=strtoupper($_POST["estado"]);



				$this->sql="SELECT A.CODACT as acodact,A.CODMUE as acodmue,
							generar_descripcion(A.CODMUE) as adesmue,
							A.MONDISMUE as amondismue,
							A.OBSDISMUE as aobsdismue
							FROM BNDISMUE A, BNREGMUE B
							WHERE 
							A.CODACT=B.CODACT AND 
							A.CODMUE=B.CODMUE AND
							b.stamue<>'D' and
							RTRIM(A.CODMUE) >= RTRIM('".$this->codmue1."') AND 
							RTRIM(A.CODMUE) <= RTRIM('".$this->codmue2."') AND
							A.CODACT >= RTRIM('".$this->codact1."') AND 
							A.CODACT <= RTRIM('".$this->codact2."') AND
							A.FECdismue <= to_date('".$this->fecdis2."','dd/mm/yyyy') AND
							A.FECdismue >= to_date('".$this->fecdis1."','dd/mm/yyyy') AND
							A.OBSDISMUE LIKE ('".$this->estado."')and
							(a.tipdismue ='100002 - INCORPORACION POR TRASPASO' or a.tipdismue ='100001 - INVENTARIO INICIAL')
							ORDER BY A.CODACT, A.CODMUE";

			//print '<pre>'; print $this->sql;
			$this->llenartitulosmaestro();
			$this->llenartitulosdetalle();
			$this->cab=new cabecera();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO DEL ACTIVO";
				$this->titulos[1]="CODIGO DEL BIEN";
   				$this->titulos[2]="DESCRIPCION";
				$this->titulos[3]="MONTO";
				$this->titulos[4]="OBSERVACION";
				

		}
		function llenartitulosdetalle()
		{
				//$this->titulos2[0]="CODIGO";
				//$this->titulos2[1]="DETALLES";
				//$this->titulos2[2]="MONTO";
				//$this->titulos2[3]="ORIGEN";
				//$this->titulos2[4]="DESTINO";
				//$this->titulos2[5]="Nro. DISP";
		}



		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"]." EN EL ALMACEN DE CUMBRES DE CURUMO","l","s");
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);
			$ncampos2=count($this->titulos2);

				$this->cell(45,10,$this->titulos[0]);
				$this->cell(65,10,$this->titulos[1]);
				$this->cell(80,10,$this->titulos[2]);
				$this->cell(35,10,$this->titulos[3]);
				$this->cell(25,10,$this->titulos[4]);

			
			$this->ln();
			$this->Line(10,45,270,45);
		}
		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		    $tb2=$tb;
			$this->setFont("Arial","B",8);
			$ncampos=count($this->titulos);

//			if(!$tb->EOF)
	//		{
			while(!$tb->EOF)
			{

				$this->setFont("Arial","",8);
				$this->SetX(20);

				 $this->setFont("Arial","",8);
				 $this->cell($this->anchos[0],3,$tb->fields["acodact"]);
				 $x=$this->GetX();
				 $y=$this->GetY();
				 $this->cell(3);
				 $xx=$this->GetX();
				 //$this->cell(60);
				 //$this->cell(20);
				 $this->cell($this->anchos[0],3,$tb->fields["acodmue"]);
				 $this->SetX($x+45);
				 $this->MultiCell($this->anchos[1]+25,3,$tb->fields["adesmue"]);
				
			


				 //$this->SetXY($xx,$y);
				 //$this->ln();


				 //$this->cell($this->anchos2[0],7," ");
				 //$this->cell($this->anchos2[1],7,substr($aux,0,20));
				 // $this->cell(80);
				 $this->SetXY($xx+135,$y+1);

				 $this->cell($this->anchos2[2],2,number_format($tb->fields["amondismue"],2,',','.'));
				 $this->SetXY($xx+155,$y+1);
				 $this->Multicell(50,2,$tb->fields["aobsdismue"]);
				

				$this->acum=($this->acum+$tb->fields["amondismue"]);
				$this->cont=($this->cont+1);
				 $this->ln(10);
				 $y=$this->GetY();
				$tb->MoveNext();
				if ($y>=170)
				{
					$this->AddPage();
				}
			}
				$this->setFont("Arial","B",10);
				$this->line(10,$y,270,$y);
				$this->SetX(95);

				$this->cell(80,4,"Total Bienes  ".$this->cont);
				$this->cell(20,4,"Total General  ".number_format($this->acum,2,',','.'),0,0,"");
				if ($y>=170)

				{
					$this->SetY(-10);
					$this->Line(10,$this->GetY(),270,$this->GetY());
					$this->Line(10,$this->GetY(),10,$this->GetY()+25);
					$this->Line(100,$this->GetY(),100,$this->GetY()+25);
					$this->Line(180,$this->GetY(),180,$this->GetY()+25);
					$this->Line(270,$this->GetY(),270,$this->GetY()+25);
					$this->cell(90,5,"Preparación",0,0,'L');
					$this->cell(81,5,"Conformación",0,0,'L');
					$this->cell(90,5,"Aprobación",0,0,'L');
					$this->ln();
					$this->setFont("Arial","",8);
					$this->cell(90,5,"Nombre:  ".$this->prenom);
					$this->cell(81,5,"".$this->confnom);
					$this->cell(90,5,"".$this->apronom);
					$this->ln();
					$this->Line(10,$this->GetY(),270,$this->GetY());
					$this->cell(90,7,"Cargo:     ".$this->precar);
					$this->cell(81,7,$this->confcar);
					$this->cell(90,7,$this->aprocar);
					$this->ln();
					$this->Line(10,$this->GetY(),270,$this->GetY());
					$this->cell(0,8,"Firma:");
					$this->ln();
					$this->Line(10,$this->GetY(),270,$this->GetY());
				}
				else
				{
					$this->SetY(-50);
					$this->Line(10,$this->GetY(),270,$this->GetY());
					$this->Line(10,$this->GetY(),10,$this->GetY()+25);
					$this->Line(100,$this->GetY(),100,$this->GetY()+25);
					$this->Line(180,$this->GetY(),180,$this->GetY()+25);
					$this->Line(270,$this->GetY(),270,$this->GetY()+25);
					$this->cell(90,5,"Preparación",0,0,'L');
					$this->cell(81,5,"Conformación",0,0,'L');
					$this->cell(90,5,"Aprobación",0,0,'L');
					$this->ln();
					$this->setFont("Arial","",8);
					$this->cell(90,5,"Nombre:  ".$this->prenom);
					$this->cell(81,5,"".$this->confnom);
					$this->cell(90,5,"".$this->apronom);
					$this->ln();
					$this->Line(10,$this->GetY(),270,$this->GetY());
					$this->cell(90,7,"Cargo:     ".$this->precar);
					$this->cell(81,7,$this->confcar);
					$this->cell(90,7,$this->aprocar);
					$this->ln();
					$this->Line(10,$this->GetY(),270,$this->GetY());
					$this->cell(0,8,"Firma:");
					$this->ln();
					$this->Line(10,$this->GetY(),270,$this->GetY());
				}
		//	}
		}
	}
?>