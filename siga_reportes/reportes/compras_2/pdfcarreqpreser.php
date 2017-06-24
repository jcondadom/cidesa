<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/compras/Carreqpreser.class.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/modelo/business/compras.class.php");

	class pdfreporte extends fpdf
	{
//
		var $bd;


		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->codreqdes  = H::GetPost('codreqdes');
			$this->codreqhas  = H::GetPost('codreqhas');
			$this->codcatdes  = H::GetPost('codcatdes');
			$this->codcathas  = H::GetPost('codcathas');
			$this->codesde    = H::GetPost('codesde');
			$this->codhasta   = H::GetPost('codhasta');
			//$this->fechadesde = H::GetPost('fechadesde');
			//$this->fechahasta = H::GetPost('fechahasta');
			$this->estado     = H::GetPost('estado');
                     $this->mot = H::GetPost('mot');
			$this->resp = H::GetPost('resp');

			$this->fecha = date("d/m/Y");
			$this->llenartitulosmaestro();
			$this->llenaranchos();

			//$this->otros();
			if($this->estado=='Ambos')
			{
				$sta1='A';
				$sta2='N';
			}
			else if($this->estado=='Activas')
			{
				$sta1='A';
				$sta2='A';
			}
			else if($this->estado=='Anuladas')
			{
				$sta1='N';
				$sta2='N';
			}


			$this->Carreqpreser = new Carreqpreser();
			$this->arrp = $this->Carreqpreser->sqlp($this->codreqdes, $this->codreqhas, $this->codcatdes, $this->codcathas, $this->codesde, $this->codhasta, $sta1, $sta2);

		}

		function llenartitulosmaestro()
		{
				$this->titulosm[0]='DESCRIPCIÓN:';
				$this->titulosm[1]='UNIDAD DE ADSCRIPCIÓN:';
				$this->titulosm[2]='BIENES MUEBLES Y MATERIALES SOLICITADOS:';

				$this->titulosm[3]='Cant. Solicitada';
				$this->titulosm[4]='Unidad de Medida';

				$this->titulosm[5]='Cod. Artículo';
				$this->titulosm[6]='Descripción de Bienes Muebles y Materiales';

				$this->titulosm[7]='MOTIVACIÓN :';
				


				$this->titulosm[8]='DIRECCIÓN U OFICINA SOLICITANTE';

				$this->titulosm[9]='DIRECCIÓN DE ADMINISTRACIÓN Y FINANZAS';
				$this->titulosm[11]='RECIBIDO POR';
				$this->titulosm[10]='COORDINADOR';
				$this->titulosm[12]='FECHA: este ';
				$this->titulosm[13]='Nro:';
                            $this->titulosm[14]='Apellidos y Nombres:';
 				$this->titulosm[15]='Firma y Sello:                       Fecha:';

		}


	    function llenaranchos()
	     {
		    $this->anchos=array();
			$this->anchos[0]=195;
			$this->anchos[1]=95;
			$this->anchos[2]=100;
			$this->anchos[3]=105;
			$this->anchos[5]=30;
			$this->anchos[6]=40;
			$this->anchos[7]=35;
			$this->anchos[8]=20;
                     $this->anchos[9]=65;

	     }

		function Header()
		{
			//$this->getCabecera(H::GetPost("titulo"),"","N");
			$this->cab->poner_cabecera($this,H::GetPost("titulo"));//,$this->conf,"n");
			$this->setFont("Arial","B",9);
		}

	function Cuerpo()
	{
			$reqart="";
			foreach ($this->arrp as $dato)
			{

				if ($reqart!=$dato["reqart"])
				{
					if ($reqart)
					{
						$this->AddPage();
					}
					 $reqart=$dato["reqart"];
					 $this->setFont("Arial","B",8);

					 $this->SetXY(150,38);
					 $this->cell(15,4,"Nº :",0,0,'R');
					 $this->cell(20,4,$reqart,1,0,'C');
					 $this->SetXY(150,43);
					 $this->cell(15,4,"FECHA :",0,0,'R');
					 $this->cell(20,4,$dato["fecreq"],1,0,'C');
                     $this->Ln(8);
			   		 $this->SetWidths(array($this->anchos[0]));
    	        	 $this->SetAligns(array("L"));
    	             $this->setBorder(1);
    	             $this->RowM(array($this->titulosm[0].'  '.$dato["desreq"]));
    	             $this->Ln(2);

    	             $this->SetWidths(array($this->anchos[0]));
    	        	 $this->SetAligns(array("L"));
    	             $this->setBorder(1);
    	             $this->RowM(array($this->titulosm[1].'  '.$dato["desubi"]));
    	             $this->Ln(2);
    	             $y=$this->GetY();
    	             $this->Line(10,$y+2,205,$y+2);
    	             $this->Line(10,$y+8,205,$y+8);

    	             $this->Line(10,$y+120,205,$y+120);

    	             $this->Line(10,$y+2,10,$y+176);

    	             $this->Line(40,$y+2,40,$y+120);

    	             $this->Line(70,$y+2,70,$y+120);

    	             $this->Line(100,$y+2,100,$y+120);

    	             $this->Line(205,$y+2,205,$y+176);

    	             $this->SetY($y+3);
                     $this->setFont("Arial","B",9);
    	             $this->SetWidths(array($this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[3]));
    	        	 $this->SetAligns(array("C","C","C","C"));
    	             $this->setBorder(0);
    	             $this->RowM(array($this->titulosm[3],$this->titulosm[4],$this->titulosm[5],$this->titulosm[6]));
    	             $this->Ln(2);
    	                 $this->arrp1 = $this->Carreqpreser->sqlp1($reqart);

                     foreach ($this->arrp1 as $dato1)
			          {

                     $this->setFont("Arial","",8);
    	             $this->SetWidths(array($this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[3]));
    	        	 $this->SetAligns(array("C","C","C","L"));
    	             $this->setBorder(0);
    	             $this->RowM(array($dato1["canreq"],$dato1["unidad"],$dato1["codart"],$dato1["desart"]));
    	             if ($this->gety()>170){
    	             	 $this->SetY($y+120);
			 //$this->SetWidths(array($this->anchos[0]));
    	        	 $this->SetAligns(array("L"));
    	             //$this->setBorder(1);
    	             $this->RowM(array($this->titulosm[7]));
 			$this->multicell(190,4,$this->mot);

    	             $this->Ln(8);

    	             $this->SetWidths(array($this->anchos[9],$this->anchos[9],$this->anchos[9]));
    	             $this->SetAligns(array("C","C","C"));
    	             $this->setBorder(1);
    	             $this->RowM(array($this->titulosm[8],$this->titulosm[9],$this->titulosm[10]));


///////////
                    $this->Ln(10);

    	             $this->SetWidths(array($this->anchos[2],$this->anchos[1]));
    	             $this->SetAligns(array("L","L","L"));
    	             $this->setBorder(1);
                    $this->Ln(-10);
                    $this->SetWidths(array($this->anchos[9],$this->anchos[9],$this->anchos[9]));
                    $this->RowM(array($this->titulosm[14],$this->titulosm[14],$this->titulosm[14]));
                    $this->Ln(27);
                    $this->SetWidths(array($this->anchos[9],$this->anchos[9],$this->anchos[9]));
    	             $this->RowM(array($this->titulosm[15],$this->titulosm[15],$this->titulosm[15]));
                    $this->Line(10,243,205,243);
                    $this->Line(75,199,75,243);
                     $this->Line(140,199,140,243);
                    $this->Ln(10);
                    $this->SetX(130);
    	          //  $this->cell(50,10,$this->titulosm[12].':  '.$this->fecha,1,0,'L');
    	             	$this->addpage();
    	             	$this->setFont("Arial","B",8);

					 $this->SetXY(150,38);
					 $this->cell(15,4,"Nº :",0,0,'R');
					 $this->cell(20,4,$reqart,1,0,'C');
					 $this->SetXY(150,43);
					 $this->cell(15,4,"FECHA :",0,0,'R');
					 $this->cell(20,4,$dato["fecreq"],1,0,'C');
                     $this->Ln(8);
			   		 $this->SetWidths(array($this->anchos[0]));
    	        	 $this->SetAligns(array("L"));
    	             $this->setBorder(1);
    	             $this->RowM(array($this->titulosm[0].'  '.$dato["desreq"]));
    	             $this->Ln(2);

    	             $this->SetWidths(array($this->anchos[0]));
    	        	 $this->SetAligns(array("L"));
    	             $this->setBorder(1);
    	             $this->RowM(array($this->titulosm[1].'  '.$dato["desubi"]));
    	             $this->Ln(2);
    	             $y=$this->GetY();
    	             $this->Line(10,$y+2,205,$y+2);
    	             $this->Line(10,$y+8,205,$y+8);
    	             $this->Line(10,$y+120,205,$y+120);
    	             $this->Line(10,$y+2,10,$y+180);
    	             $this->Line(40,$y+2,40,$y+120);
    	             $this->Line(70,$y+2,70,$y+120);
    	             $this->Line(100,$y+2,100,$y+120);
    	             $this->Line(205,$y+2,205,$y+180);
    	             $this->SetY($y+3);
                    $this->setFont("Arial","B",9);
    	             $this->SetWidths(array($this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[3]));
    	             $this->SetAligns(array("C","C","C","C"));
    	             $this->setBorder(0);
    	             $this->RowM(array($this->titulosm[3],$this->titulosm[4],$this->titulosm[5],$this->titulosm[6]));
    	             $this->Ln(2);
    	             }
    	             $this->Ln(1);

			          }

                    $this->SetY($y+120);
		      //$this->SetWidths(array($this->anchos[0]));
    	             $this->SetAligns(array("L"));
    	             //$this->setBorder(1);
    	             $this->RowM(array($this->titulosm[7]));

		      $this->multicell(190,4,$this->mot);
    	             $this->Ln(8);


    	             $this->SetWidths(array($this->anchos[9],$this->anchos[9],$this->anchos[9]));
    	             $this->SetAligns(array("C","C","C"));
    	             $this->setBorder(1);


    	             $this->RowM(array($this->titulosm[8],$this->titulosm[9],$this->titulosm[10]));
                    $this->Ln(10);

    	             $this->SetWidths(array($this->anchos[2],$this->anchos[1]));
    	             $this->SetAligns(array("L","L","L"));
    	             $this->setBorder(1);
                    $this->Ln(-10);
                    $this->SetWidths(array($this->anchos[9],$this->anchos[9],$this->anchos[9]));
                    $this->RowM(array($this->titulosm[14],$this->titulosm[14],$this->titulosm[14]));
			$this->multicell(45,4,$this->resp);


                    $this->Ln(19);
                    $this->SetWidths(array($this->anchos[9],$this->anchos[9],$this->anchos[9]));
    	             $this->RowM(array($this->titulosm[15],$this->titulosm[15],$this->titulosm[15]));
		      $this->Ln(40); //**********OJO*****
                    $this->Line(10,243,205,243);
                    $this->Line(75,205,75,243);
                    $this->Line(140,205,140,243);

    	        	}

			}

	   	}
}
?>
