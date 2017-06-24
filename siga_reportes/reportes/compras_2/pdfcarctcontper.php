<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/general/funciones.php");
    require_once("../../lib/modelo/sqls/compras/Carctcontper.class.php");

	class pdfreporte extends fpdf
	{
		var $mes = array(
						 "01"=>"ENERO",
						 "02"=>"FEBRERO",
						 "03"=>"MARZO",
						 "04"=>"ABRIL",
						 "05"=>"MAYO",
						 "06"=>"JUNIO",
						 "07"=>"JULIO",
						 "08"=>"AGOSTO",
						 "09"=>"SEPTIEMBRE",
						 "10"=>"OCTUBRE",
						 "11"=>"NOVIEMBRE",
						 "12"=>"DICIEMBRE"
						 );
		var $i = 0;
		var $codrefdes = '';
		var $codrefhas = '';
		var $rifpromin = '';
		var $rifpromax = '';


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
            		$this->cab=new cabecera();
	        	$this->arrp=array("no_vacio");
	        	$this->codorddes = H::GetPost("codorddes");
			$this->codordhas = H::GetPost("codordhas");
			$this->codprodes = H::GetPost("codprodes");
			$this->codprohas = H::GetPost("codprohas");
			$this->fechamin = H::GetPost("fecreg1");
			$this->fechamax = H::GetPost("fecreg2");
			$this->auto = H::GetPost("auto");
			$this->ced1 = H::GetPost("ced1");
			$this->elab = H::GetPost("elab");
			$this->ced2 = H::GetPost("ced2");
                     $this->sol_por = H::GetPost("sol_por");
			$this->ced3 = H::GetPost("ced3");

			$this->carctcontper= new Carctcontper();
		       $this->arrp = $this->carctcontper->sqlp($this->codorddes ,$this->codordhas,$this->codprodes,$this->codprohas,$this->fechamin,$this->fechamax);

		}

		function suma_fechas($fecha,$ndias)
		{
			if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
            	           list($dia,$mes,$año)=split("/", $fecha);
                     if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
            	           list($dia,$mes,$año)=split("-",$fecha);
            $nueva = mktime(0,0,0, $mes,$dia,$año) + $ndias * 24 * 60 * 60;
            $nuevafecha=date("d-m-Y",$nueva);

            return ($nuevafecha);
		}

		function Footer()
		{   $this->setFont("Arial","",9);
       	 $this->ln(10);
		
		$this->SetX(20);
		$this->cell(80,3,'DIRECCION DE ADMINISTRACION Y FINANZAS');
              $this->SetX(120);
              $this->cell(80,3,'DIRECCION DE ADMINISTRACION Y FINANZAS');
              $this->ln(11);
             	$this->SetX(40);
              $this->multicell(150,3,'  C.I.:' .$this->ced1. '                                                                                         C.I.: ' .$this->ced2);
               
		$this->ln(11);
		 $this->SetX(120);

		$this->SetX(90);
              $this->cell(60,3,'UNIDAD SOLICITANTE');
               $this->ln(11);
              $this->SetX(95);
		$this->cell(20,3,'C.I.: '.$this->ced3);
		
		$this->SetY(-30);

		$this->cell(30,5,'ORIGINAL:',0,0,'L');
		$this->SetX(50);
		$this->multicell(100,5,'EXPEDIENTE DE ORDEN DE COMPRA Y/O SEVICIO (DAF)');

		$this->cell(30,5,'COPIA:',0,0,'L');
		$this->SetX(50);
		$this->multicell(100,5,'COORDINACION DE LOGISTICA');

              $this->cell(30,5,'COPIA:',0,0,'L');
		$this->SetX(50);
		$this->multicell(100,5,'UNIDAD SOLICITANTE');



		
		$this->SetX(100);

		$this->SetY(-15);
		$this->Line(15,$this->GetY(),200,$this->GetY());
		$this->Cell(190,5,'Av. Francisco de Miranda, Centro Plaza, Torre "C". Piso 20, Caracas - Venezuela ',0,0,'C');
		$this->ln();
		$this->Cell(190,5,' Teléfonos: (0212)285.19.66 285.52.60',0,0,'C');
	}

		function Header()
		{
		    $dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST[""],"n","n",$parte[$ubica]);
			$this->setFont("Arial","B",9);
			$this->ln();
			$this->MultiCell(190,5,"Caracas, ".date("d")." de ".$this->mes[date("m")]." de ".date("Y"),0,'R');

		}
function Cuerpo2(){}
		function Cuerpo()
		{
		     $total = count($this->arrp);
			 foreach($this->arrp as $registro)
			{
				$this->SetX(175);
                            
				$fecha = date("d/m/Y");
				$fecreq = date("d/m/Y");


                            $this->setFont("Arial","B",12);

                            $this->ln(8);
				$this->MultiCell(135,5,'ACTA DE CONTROL PERCEPTIVO',0,0,'C');
				$this->ln(10);
			    $this->setFont("Arial","",9);
			    $this->setx(20);
				$this->MCPlus(175,5,"\t\t\t".'Control Perceptivo practicado en la Contraloría Municipal de Chacao, ubicada en Centro Plaza, Torre C, Piso 20,  Los Palos Grandes, en la ciudad de Caracas, el dia  ____________________________________, los Ciudadanos (as): '.$this->auto.', '.$this->elab.', cédula de identidad Nro: '.$this->ced1.' y '.$this->ced2.', respectivamente,  ambos  adscritos a la Dirección de Administración y Finanzas, asi como también el Ciudadano(a): '.$this->sol_por. ', cédula de identidad: '.$this->ced3.' , en representacion de la Unidad Solicitante, dejando constancia del Control Perceptivo según Orden de Compra y/o Servicios  <@'.$this->arrp[$this->i]["ordcom"].'<,>arial,B, 9@>, de fecha <@'.$this->arrp[$this->i]["fecha"].'<,>arial,B,9@> a nombre de la Empresa <@'.$this->arrp[$this->i]["nompro"].'<,>arial,B,9@>., por concepto de <@'.$this->arrp[$this->i]["desord"].'<,>arial,B,9@> por un monto de Bs. <@'.$this->arrp[$this->i]["monord"].'<,>arial,B,9@>, amparada en la Solicitud de Bienes y Materiales y/o Servicios Nro: ______________________, presupuesto base Nro: <@'.$this->arrp[$this->i]["refsol"].'<,>arial,B,9@>  de fecha <@'.$this->arrp[$this->i]["fecreq"].'<,>arial,B,9@> según factura Nro ______________________________, de fecha ___________________________,  y/o,  nota de entrega Nro: ________________________ de fecha ________________________________.');
				
  
       			$this->ln();
				 $this->setx(20);
                            $this->MCPlus(175,5,"\t\t\t".'Cumplida la revision ordenada se constato lo siguiente:'  );
				
				$this->ln();
				$this->setx(20);
                            $this->MCPlus(175,5,"\t\t\t".'1.- Revision de los  Bienes o Servicios  en  relacion  con  la  orden  mencionada  SI _____ NO _____'  );
 				$this->setx(20);
                            $this->MCPlus(175,5,"\t\t\t".'2.- Revision de la documentacion que respalda la orden de compra y/o servicion  SI _____ NO _____'  );
				$this->ln();

				$this->setx(20);
                            $this->MCPlus(175,5,"\t\t\t".'En consecuencia esta unidad: '  );

				$this->ln();
                            $this->setx(20);
                            $this->MCPlus(175,5,"\t\t\t".'_____ Imparte conformidad     _____ No imparte conformidad     _____Imparte conformidad parcial '  );

				$this->ln();
                            $this->setx(20);
                            $this->MCPlus(175,5,"\t\t\t".'Observaciones:'  );

				$this->ln();
                            $this->setx(20);
                            $this->MCPlus(175,5,"\t\t\t".'Se levanta la presente Acta en Original y dos copias, aun mismo tenor y aun solo efecto. En  conformidad firman.'  );


				
			$this->Ln(5);

			$this->i++;
			if($this->i < $total)
			{
				$this->AddPage();
			}
			}
		}
	}
?>