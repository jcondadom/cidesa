<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Farpedart.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();

			$this->coddes=H::GetPost("coddes");
			$this->codhas=H::GetPost("codhas");

            $this->codclides=H::GetPost("codclides");
			$this->codclihas=H::GetPost("codclihas");

            $this->codartdes=H::GetPost("codartdes");
			$this->codarthas=H::GetPost("codarthas");

			$this->fechades=H::GetPost("fechades");
			$this->fechahas=H::GetPost("fechahas");

			$this->estatus=H::GetPost("estatus");

			$this->status=$this->verificar_status();

			$this->farpedart = new Farpedart();
		    $this->arrp = $this->farpedart->sqlp($this->coddes,$this->codhas,$this->codclides,$this->codclihas,$this->codartdes,$this->codarthas,$this->fechades,$this->fechahas,$this->status);

			$this->llenartitulosmaestro();
			$this->llenaranchos();
		}
function llenartitulosmaestro()
		{
				$this->titulosm[30]="";
				$this->titulosm[0]="Cod.Cliente";
				$this->titulosm[1]="Nombre/R. Social";
				$this->titulosm[2]="Nro.Pedido";
				$this->titulosm[3]="Descripcion";
                $this->titulosm[4]="Fecha";
				$this->titulosm[5]="Estatus";

				$this->titulosm[6]="Cod.Articulo";
				$this->titulosm[7]="Desc.Articulo";
				$this->titulosm[8]="Unidad de Medida";
				$this->titulosm[9]="Cantidad Solicitada";
                $this->titulosm[10]="Cantidad Despachada";
                $this->titulosm[11]="Cantidad Ajustada";
				$this->titulosm[12]="Cantidad Total";
				$this->titulosm[13]="Precio";
				$this->titulosm[14]="Total";

				$this->titulosm[15]="Total Pedido";
				$this->titulosm[16]="TOTALES";

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=190;
		$this->anchos[1]=150;
		$this->anchos[2]=100;
		$this->anchos[3]=70;
		$this->anchos[4]=35;
		$this->anchos[5]=30;
		$this->anchos[6]=25;
		$this->anchos[7]=80;
		$this->anchos[9]=20;
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
			    $this->setFont("Arial","B",8);
			    $this->SetWidths(array($this->anchos[6],$this->anchos[4]+30,$this->anchos[5],$this->anchos[5]+50,$this->anchos[6],$this->anchos[6]));
    	        $this->SetAligns(array("L","L","L","L","L","L"));
    	         $this->SetFillColor(230,230,230);
		        $this->SetFillTable(1);
    	        $this->setBorder(1);
    	        $this->RowM(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[3],$this->titulosm[4],$this->titulosm[5]));
                $this->Ln(1);
                $this->SetWidths(array($this->anchos[5],$this->anchos[6],$this->anchos[4],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[9],$this->anchos[6]));
    	        $this->SetAligns(array("C","C","C","C","C","C","C","C","C","C"));
    	         $this->SetFillColor(230,230,230);
		        $this->SetFillTable(1);
    	        $this->setBorder(1);
    	        $this->RowM(array('DETALLES DEL PEDIDO',$this->titulosm[6],$this->titulosm[7],$this->titulosm[8],$this->titulosm[9],$this->titulosm[10],$this->titulosm[11],$this->titulosm[12],$this->titulosm[13],$this->titulosm[14]));
                $this->Ln(3);
                $this->SetFillTable(0);
                $this->setBorder(0);
		}

function Cuerpo()

		{

	    $reg=1;
		$codpro=$this->arrp[0]["nroped"];
		$codart="";
		$reg1=1;
		$pedido="";

		$cansolicitada= 0;
        $candespachada=0;
        $canajustada=0;
        $cantotal=0;
        $canprecio=0;
        $totalpedido = 0;
        //$total=0;
		$registro=count($this->arrp);

		//imprimimos el primer registro

		$this->setFont("Arial","",9);
        $this->SetWidths(array($this->anchos[6],$this->anchos[4]+30,$this->anchos[5],$this->anchos[5]+50,$this->anchos[6],$this->anchos[6]));
    	$this->SetAligns(array("L","C","L","C","L","L"));
    	$this->setBorder(0);
    	$this->RowM(array($this->arrp[0]["codcli"],$this->arrp[0]["nompro"],$this->arrp[0]["nroped"],$this->arrp[0]["desped"],$this->arrp[0]["fecped"],$this->arrp[0]["case"]));
    	$this->ln(8);

		foreach ($this->arrp as $dato)
		{

            //H::PrintR($codpro);
			if ($codpro != $dato["nroped"])
			{
				$this->setFont("Arial","B",9);
                $this->SetWidths(array($this->anchos[7],$this->anchos[5],$this->anchos[5],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[9],$this->anchos[6]));
        		$this->SetAligns(array("R","R","R","R","R","R","R","R"));
    	        $this->setBorder(0);
    	        $this->RowM(array($this->titulosm[30],$this->titulosm[15],$cansolicitada,$candespachada,$canajustada,$cantotal,$canprecio,$totalpedido));
                $this->ln(3);
    	        $totalsolicitado=$totalsolicitado+$cansolicitada;
                $totaldespachada=$totaldespachada+$candespachada;
                $totalajustada=$totalajustada+$canajustada;
                $totalcantotal=$totalcantotal+$cantotal;
                $totalprecio=$totalprecio+$canprecio;
                $totaltotal=$totaltotal+$totalpedido;

    	        $cansolicitada= 0;
		        $candespachada=0;
		        $canajustada=0;
		        $cantotal=0;
		        $canprecio=0;
		        $totalpedido = 0;
		        $codpro = $dato["nroped"];

		        $this->setFont("Arial","",9);
		       $this->SetWidths(array($this->anchos[6],$this->anchos[4]+30,$this->anchos[5],$this->anchos[5]+50,$this->anchos[6],$this->anchos[6]));
		    	$this->SetAligns(array("L","L","L","L","L","L"));
		    	$this->setBorder(0);
		    	$this->RowM(array($dato["codcli"],$dato["nompro"],$dato["nroped"],$dato["desped"],$dato["fecped"],$dato["case"]));
		    	$this->ln(3);

			}


				$cansolicitada=$cansolicitada+$dato["canord"];
                $candespachada=$candespachada+$dato["candes"];
                $canajustada=$canajustada+$dato["canaju"];
                $cantotal=$cantotal+$dato["cantot"];
                $canprecio=$canprecio+$dato["preart"];
                $total=$dato["cantot"]*$dato["preart"];
                $totalpedido=$totalpedido+$total;
                $this->setFont("Arial","",9);
                $this->SetWidths(array($this->anchos[5],$this->anchos[6],$this->anchos[4],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[9],$this->anchos[6]));
    	        $this->SetAligns(array("C","C","C","C","R","R","R","R","R","R"));
    	        $this->setBorder(0);
    	        $this->RowM(array($this->titulosm[30],$dato["codart"],$dato["desart"],$dato["unimed"],$dato["canord"],$dato["candes"],$dato["canaju"],$dato["cantot"],$dato["preart"],$total));
                $this->Ln(3);


		}//fin del foreach
/*
		foreach($this->arrp as $dato)
           {

             $reg++;
               if($dato["codcli"]!=$codpro)
             {

                 $this->arrp2 = $this->farpedart->sqlp2($dato["codcli"]);

                  foreach($this->arrp2 as $dato2)
                     {
                      if($dato2["nroped"]!=$pedido)
                     {
                 $this->setFont("Arial","",9);
                 $this->SetWidths(array($this->anchos[6],$this->anchos[4],$this->anchos[5],$this->anchos[5],$this->anchos[6],$this->anchos[6]));
    	         $this->SetAligns(array("L","L","L","L","L","L"));
    	         $this->setBorder(1);
    	         $this->RowM(array($dato["codcli"],$dato["nompro"],$dato2["nroped"],$dato2["desped"],$dato2["fecped"],$dato2["case"]));
                 $this->Ln();
                 $codpro=$dato["codcli"];

                $this->arrp1 = $this->farpedart->sqlp1($dato2["nroped"]);
                $registro1=count($this->arrp1);

                $precio=0;$total=0;$descuento=0;$recargo=0;	$totalpedido=0;
                foreach($this->arrp1 as $dato1)

                {

                    if($dato1["codart"]!=$codart)
                      {
//H::PrintR($dato1);
                       	$cansolicitada=$cansolicitada+$dato1["canord"];
                       	$candespachada=$candespachada+$dato1["candes"];
                       	$canajustada=$canajustada+$dato1["canaju"];
                       	$cantotal=$cantotal+$dato1["cantot"];
                       	$canprecio=$canprecio+$dato1["preart"];
                       	$total=$dato1["cantot"]*$dato1["preart"];
                       	$totalpedido=$totalpedido+$total;
                        $this->setFont("Arial","",9);
                        $this->SetWidths(array($this->anchos[5],$this->anchos[6],$this->anchos[4],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[9],$this->anchos[6]));
    	                $this->SetAligns(array("C","C","C","C","R","R","R","R","R","R"));
    	                $this->setBorder(1);
    	                $this->RowM(array($this->titulosm[30],$dato1["codart"],$dato1["desart"],$dato1["unimed"],$dato1["canord"],$dato1["candes"],$dato1["canaju"],$dato1["cantot"],$dato1["preart"],$total));
                        $this->Ln();
                        $codart=$dato1["codart"];

                       }
                     $totalsolicitado=$totalsolicitado+$cansolicitada;
                     $totaldespachada=$totaldespachada+$candespachada;
                     $totalajustada=$totalajustada+$canajustada;
                     $totalcantotal=$totalcantotal+$cantotal;
                     $totalprecio=$totalprecio+$canprecio;
                     $totaltotal=$totaltotal+$totalpedido;

                   }
                         $this->setFont("Arial","B",9);
                         $this->SetWidths(array($this->anchos[7],$this->anchos[5],$this->anchos[5],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[9],$this->anchos[6]));
    	        		 $this->SetAligns(array("R","R","R","R","R","R","R","R"));
    	        		 $this->setBorder(0);
    	        		 $this->RowM(array($this->titulosm[30],$this->titulosm[15],$cansolicitada,$candespachada,$canajustada,$cantotal,$canprecio,$totalpedido));




            if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

                    $pedido=$dato["nroped"];
                     }//if

             }//FOREACH

           }//if primer foreach
       }//foreach
*/
                         $this->Ln();
                          $this->setFont("Arial","B",10);
                         $this->SetWidths(array($this->anchos[7],$this->anchos[5],$this->anchos[5],$this->anchos[6],$this->anchos[6],$this->anchos[6],$this->anchos[9],$this->anchos[6]));
    	        		 $this->SetAligns(array("R","R","R","R","R","R","R","R"));
    	        		 $this->setBorder(0);
    	        		 $this->RowM(array($this->titulosm[30],$this->titulosm[16],$totalsolicitado,$totaldespachada,$totalajustada,$totalcantotal,$totalprecio,$totaltotal));




 }//cuerpo


}//fin de la clase
?>
