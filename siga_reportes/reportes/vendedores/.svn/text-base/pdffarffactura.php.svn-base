<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Farffactura.class.php");


	class pdfreporte extends fpdf
	{

		var $bd;
		var $forma;
		var $numero;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();

			$this->codfacdes=H::GetPost("codfacdes");
			$this->codfachas=H::GetPost("codfachas");

			$this->fechades=H::GetPost("fechamin");
			$this->fechahas=H::GetPost("fechamax");

			$this->codclides=H::GetPost("codclides");
			$this->codclihas=H::GetPost("codclihas");

            $this->estatus=H::GetPost("estatus");
			$this->plazo=H::GetPost("dias");

			$this->status=$this->verificar_status();

			$this->farffactura = new Farffactura();
		    $this->arrp = $this->farffactura->sqlp($this->fechades,$this->fechahas,$this->status,$this->codfacdes,$this->codfachas,$this->plazo,$this->codclides,$this->codclihas);
		    //H::PrintR($this->arrp);exit;


			$this->verificar_status();
			$this->llenartitulosmaestro();
			$this->llenaranchos();
		}

	function llenartitulosmaestro()
		{

				$this->titulosm[0]="Cod.Cliente :";
				$this->titulosm[1]="Rif :";
				$this->titulosm[2]="Cliente :";
				$this->titulosm[3]="Direccion :";

                $this->titulosm[4]="Cod. Articulo";
				$this->titulosm[5]="Descripcion";
				$this->titulosm[6]="Cantidad";
				$this->titulosm[7]="Precio/U";
				$this->titulosm[8]="Sub Total";

				$this->titulosm[9]="Num. Factura";
				$this->titulosm[10]="Monto Recargo";
				$this->titulosm[11]="Forma de Pago :";
				$this->titulosm[12]="Banco: ";

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=190;
		$this->anchos[1]=150;
		$this->anchos[2]=100;
		$this->anchos[3]=70;
		$this->anchos[4]=40;
		$this->anchos[5]=25;
	}

		function verificar_status()
		{

		if    ($this->estatus=='ACTIVAS'){  //Activas
			  $this->sta='A';


		}else if ($this->estatus=='ANULADAS'){  //Anuladas
			      $this->sta='N';

		}
		return $this->sta;
		}

function Header()
		{
			    $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->setFont("Arial","",9);

		}

function Cuerpo()

		{

	    $reg=0;
		$codpro="";
		$codart="";
		$reg1=0;
		$totalrecargo=0;
		$registro=count($this->arrp);
		//print $registro;exit;
		$this->fact = new Farffactura();
		foreach($this->arrp as $dato)
           {



               if($dato["codpro"]!=$codpro)
             {


                if ($dato["forma"]!='CREDITO')
               {

                $this->forma=$this->titulosm[11].'  '.$dato["pago"];
                $this->numero='Nº de Documento :'.$dato["numero"];

               }
               else
               {

               	$this->forma='CREDITO';
               }
                $this->SetXY(15,40);
                //$this->cell(20,6,"CLIENTE",0,0,0);
                 $this->SetXY(130,50);
                $this->cell(45,6,"Fecha.Emision".':   '.$dato["fecfac"],1,1,1);
                $this->Ln();
                $this->SetWidths(array(100,45,50));
    	        $this->SetAligns(array("L","L","L"));
    	        $this->setBorder(0);
    	        $this->RowM(array($this->titulosm[0].''.$dato["codpro"],$this->titulosm[9].'     '.$dato["reffac"],$this->numero));
                $this->Ln(1);
    	        $this->SetWidths(array($this->anchos[4]+5,$this->anchos[1]));
    	        $this->SetAligns(array("L","L"));
    	        $this->setBorder(1);
    	        $this->RowM(array($this->titulosm[1].'  '.$dato["rifpro"],$this->titulosm[2].'  '.$dato["nompro"]));
                $this->Ln(1);
    	        $this->SetWidths(array(100,55,40));
    	        $this->SetAligns(array("L","L","L"));
    	        $this->setBorder(1);
    	         $this->setFont("Arial","",8);
    	        $this->RowM(array($this->titulosm[3].''.$dato["dirpro"],$this->forma,$this->titulosm[12].$dato["banco"]));
                $codpro=$dato["codpro"];
                 $this->setFont("Arial","",9);
    	        $this->arrp1 =$this->fact->sqlp1($codpro);
                $this->Ln(1);
    	       	$this->SetWidths(array($this->anchos[5],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]));
    	        $this->SetAligns(array("C","C","C","C","C","C"));
    	        $this->setBorder(1);
    	        $this->Row(array( $this->titulosm[4], $this->titulosm[5], $this->titulosm[6], $this->titulosm[7],$this->titulosm[10], $this->titulosm[8]));
                $registro1=count($this->arrp1);

                $precio=0;$total=0;$descuento=0;$recargo=0;
                foreach($this->arrp1 as $dato1)

                {

                    if($dato1["codart"]!=$codart)
                      {
                       	$montototal=0;
                       	$precio=$dato1["precio"]*$dato1["cantot"];
                       	$total=$total+$precio;
                       	$descuento=$descuento+$dato["mondesc"];
                       	$recargo=$recargo+$dato1["recargo"];
                       	$this->SetWidths(array($this->anchos[5],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]));
    	                $this->SetAligns(array("L","L","R","R","R","R"));
    	                $this->setBorder(1);
    	                $this->Row(array($dato1["codart"],$dato1["desart"],$dato1["cantot"],$dato1["precio"],$dato1["recargo"],''.$precio));
    	                $y=$this->GetY();//print $y;
                        $codart=$dato1["codart"];
                       }

               }

                        $this->Ln(2);
                        $this->SetWidths(array($this->anchos[5],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]));
    	                $this->SetAligns(array("L","L","L","R","R","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("","","","Sub Total",H::FormatoMonto($recargo),''.H::FormatoMonto($total)));
    	                $this->Ln(2);

    	                 $this->SetWidths(array($this->anchos[5],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]));
    	                $this->SetAligns(array("L","L","L","R","C","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("","","","","Total Descuento",''.H::FormatoMonto($descuento)));
    	                $this->Ln(2);
                        $montototal=$total-$descuento+$recargo;
                        $totalrecargo+=$recargo;
                        $this->setFont("Arial","B",9);
    	                $this->SetWidths(array($this->anchos[5],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]));
    	                $this->SetAligns(array("L","L","L","R","C","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("","","","","MONTO TOTAL",''.H::FormatoMonto($montototal)));
    	                $this->setFont("Arial","",9);
    	                //$this->Ln(2);

                        /*
                        $this->SetXY(155,$y);
                        $montototal=$total-$descuento+$recargo;
                        $this->cell(65,6,"Sub Total".'                '.$total);
                        $this->SetXY(155,$y+5);
                        $this->cell(65,6,"Total Descuento".'     '.$descuento);
                        $this->SetXY(155,$y+10);
                        $this->cell(65,6,"MONTO TOTAL".'     '.$montototal);*/


                   if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

           }//if primer foreach

       }//foreach
 }//cuerpo


}//fin de la clase
?>
