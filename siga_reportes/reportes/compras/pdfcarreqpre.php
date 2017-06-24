<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/compras/Carreqpre.class.php");
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


			$this->Carreqpre = new Carreqpre();
			$this->arrp = $this->Carreqpre->sqlp($this->codreqdes, $this->codreqhas, $this->codcatdes, $this->codcathas, $this->codesde, $this->codhasta, $sta1, $sta2);

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

				$this->titulosm[9]='DIRECCIÓN DE ADMINISTRACIÓN Y SERVICIOS';
				$this->titulosm[11]='RECIBIDO POR';
				$this->titulosm[10]='COORDINADOR';
				$this->titulosm[12]='FECHA: este ';
				$this->titulosm[13]='Nro:';
                            $this->titulosm[14]='Apellidos y Nombres:';
 				$this->titulosm[15]='Firma y Sello:                       Fecha:';
				$this->titulosm[16]='Actividad Presupuestaria';

		}


	    function llenaranchos()
	     {
		    $this->anchos=array();
			$this->anchos[0]=195;
			$this->anchos[1]=95;
			$this->anchos[2]=100;
			$this->anchos[3]=95;
			$this->anchos[5]=25;
			$this->anchos[6]=40;
			$this->anchos[7]=35;
			$this->anchos[8]=20;
                     $this->anchos[9]=65;

	     }

		function Header()
		{
			 $this->SetAutoPageBreak(true,0.5);
     			 $this->SetFont("Arial","B",9);
     		

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
              

			if ($dato["aprreq"]=='No Aprobada')

     			 {
     			   $this->SetLineWidth(1);
     			   $this->SetDrawColor(100,1,1);
  			   $this->SetFont("Arial","B",65);
     			   $this->SetTextColor(100,1,1);
    			   //$this->SetAlpha(0.5);
    			   $this->Rotate(45,40,160);
    			   $this->RoundedRect(40, 160, 180, 25, 2.5, 'D');
  		    	   $this->Text(42,183,'NO APROBADA');
    			   $this->Rotate(0);
  		          $this->SetDrawColor(0);
    		    	   $this->SetTextColor(0);
      			   //$this->SetAlpha(1);
     			   $this->SetLineWidth(0);
    			  }

				$this->Ln(8);
				 $this->setFont("Arial","B",8);
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
    	             $this->Line(10,$y+11,205,$y+11);

    	             $this->Line(10,$y+120,205,$y+120);

    	             $this->Line(10,$y+2,10,$y+180);

    	             $this->Line(34,$y+2,34,$y+120);

    	             $this->Line(58,$y+2,58,$y+120);

    	             $this->Line(85,$y+2,85,$y+120);

		      $this->Line(110,$y+2,110,$y+120);

    	             $this->Line(205,$y+2,205,$y+180);







///////////////

    	             $this->SetY($y+3);
                     $this->setFont("Arial","B",9);
    	             $this->SetWidths(array($this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[3]));
    	        	 $this->SetAligns(array("C","C","C","C","C"));
    	             $this->setBorder(0);
    	             $this->RowM(array($this->titulosm[3],$this->titulosm[4],$this->titulosm[16],$this->titulosm[5],$this->titulosm[6]));
    	             $this->Ln(2);
    	             $this->arrp1 = $this->Carreqpre->sqlp1($reqart);

                     foreach ($this->arrp1 as $dato1)
			          {

                     $this->setFont("Arial","",8);
    	             $this->SetWidths(array($this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[3]));
    	        	 $this->SetAligns(array("C","C","C","C","J"));
    	             $this->setBorder(0);
    	             $this->RowM(array($dato1["canreq"],$dato1["unidad"],$dato1["codcat"],$dato1["codart"],$dato1["desart"]));
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
			$this->multicell(45,4,$this->resp);

                    $this->Ln(25);
                    $this->SetWidths(array($this->anchos[9],$this->anchos[9],$this->anchos[9]));
		      $this->Ln(-8);

    	             $this->RowM(array($this->titulosm[15],$this->titulosm[15],$this->titulosm[15]));
                    $this->Line(10,243,205,243);


                    $this->Line(75,207,75,243);


                     $this->Line(140,207,140,243);



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
			if ($dato["aprreq"]=='No Aprobada')

     			 {
     			   $this->SetLineWidth(1);
     			   $this->SetDrawColor(100,1,1);
  			   $this->SetFont("Arial","B",65);
     			   $this->SetTextColor(100,1,1);
    			   //$this->SetAlpha(0.5);
    			   $this->Rotate(45,40,160);
    			   $this->RoundedRect(40, 160, 180, 25, 2.5, 'D');
  		    	   $this->Text(42,183,'NO APROBADA');
    			   $this->Rotate(0);
  		          $this->SetDrawColor(0);
    		    	   $this->SetTextColor(0);
      			   //$this->SetAlpha(1);
     			   $this->SetLineWidth(0);
    			  }

                     $this->Ln(8);
				 $this->setFont("Arial","B",8);
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
    	             $this->Line(10,$y+11,205,$y+11);

    	             $this->Line(10,$y+120,205,$y+120);

    	             $this->Line(10,$y+2,10,$y+180);

    	             $this->Line(34,$y+2,34,$y+120);

    	             $this->Line(58,$y+2,58,$y+120);

    	             $this->Line(85,$y+2,85,$y+120);

		      $this->Line(110,$y+2,110,$y+120);

    	             $this->Line(205,$y+2,205,$y+180);
	
    	             $this->SetY($y+3);
                    $this->setFont("Arial","B",9);



///////////////// segunda
				$this->SetY($y+3);
                     $this->setFont("Arial","B",9);
    	             $this->SetWidths(array($this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[3]));
    	        	 $this->SetAligns(array("C","C","C","C","C"));
    	             $this->setBorder(0);
    	             $this->RowM(array($this->titulosm[3],$this->titulosm[4],$this->titulosm[16],$this->titulosm[5],$this->titulosm[6]));
    	             $this->Ln(2);
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
	
                    $this->Ln(24);
                    $this->SetWidths(array($this->anchos[9],$this->anchos[9],$this->anchos[9]));

			 $this->Ln(-8);

    	             $this->RowM(array($this->titulosm[15],$this->titulosm[15],$this->titulosm[15]));
                    $this->Line(10,243,205,243);

                    $this->Line(75,207,75,243);
                    $this->Line(140,207,140,243);

    	        	}

			}

	   	}
}
?>
