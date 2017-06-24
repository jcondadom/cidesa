<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Farfactur.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $posi;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();

			$this->coddes=H::GetPost("coddes");
			$this->codhas=H::GetPost("codhas");

			$this->fechades=H::GetPost("fechades");
			$this->fechahas=H::GetPost("fechahas");

			$this->estatus=H::GetPost("estatus");
			$this->condipago=H::GetPost("condipago");

			$this->codfacdes=H::GetPost("codfacdes");
			$this->codfachas=H::GetPost("codfachas");

			$this->codartdes=H::GetPost("codartdes");
			$this->codarthas=H::GetPost("codarthas");




			$this->status=$this->verificar_status();
			$this->condi=$this->verificar_condicion();

			$this->farfactur = new Farfactur();
		    $this->arrp = $this->farfactur->sqlp($this->coddes,
		                                         $this->codhas,
		                                         $this->codfacdes,
		                                         $this->codfachas,
		                                         $this->codartdes,
		                                         $this->codarthas,
		                                         $this->fechades,
		                                         $this->fechahas,
		                                         $this->status,
		                                         $this->condi);

			$this->llenartitulosmaestro();
			$this->llenaranchos();
		}

	function llenartitulosmaestro()
		{

				$this->titulosm[30]="";
				$this->titulosm[0]="Cod.Cliente";
				$this->titulosm[1]="Nombre/R. Social";
				$this->titulosm[2]="Nro.Factura";
				$this->titulosm[3]="Descripción";
                $this->titulosm[4]="Fecha";
				$this->titulosm[5]="Estatus";
				$this->titulosm[6]="Referencia";
				//$this->titulosm[7]="Monto Descuento";
				$this->titulosm[8]="Monto Factura";

				$this->titulosm[9]="Cod.Artículo";
				$this->titulosm[10]="Desc.Artículo";
				//$this->titulosm[11]="Cantidad Solicitada";
				$this->titulosm[12]="Cant. Facturada";
              //  $this->titulosm[13]="Cantidad Despachada";
				$this->titulosm[14]="Monto Recargo";
				$this->titulosm[15]="Precio Unitario";
				$this->titulosm[16]="Total";

				$this->titulosm[17]="Total Factura";
				$this->titulosm[18]="TOTALES";

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
		$this->anchos[7]=20;
		$this->anchos[8]=55;
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

		function verificar_condicion()
		{

		if    ($this->condipago=='CONTADO'){
			  $this->condicion='C';


		}else if ($this->condipago=='CREDITO'){
			      $this->condicion='R';

		}
		return $this->condicion;
		}

function Header()
		{
			    $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->setFont("Arial","B",9);
			    $this->SetWidths(array($this->anchos[6],$this->anchos[3],$this->anchos[7],$this->anchos[8],$this->anchos[7],$this->anchos[7],$this->anchos[7],$this->anchos[6]));
    	        $this->SetAligns(array("C","C","C","C","C","C","C","C"));
    	        $this->setBorder(1);
    	        $this->RowM(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[3],$this->titulosm[4],$this->titulosm[5],$this->titulosm[6],$this->titulosm[8]));
                $this->Ln();
                $this->SetWidths(array($this->anchos[6],$this->anchos[4],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]+2));
    	        $this->SetAligns(array("C","C","L","C","R","R","R"));
    	        $this->setBorder(0);
    	        $this->RowM(array($this->titulosm[30],$this->titulosm[9],$this->titulosm[10],$this->titulosm[12],$this->titulosm[14],$this->titulosm[15],$this->titulosm[16]));
                $this->Ln();

		}

function Cuerpo()

		{

	    $reg=1;
		$reffac="";
		$reg1=1;
		$registro=count($this->arrp);
		//$this->fact = new Farfactur();
		//H::PrintR($this->arrp);
		             $totalrecargo=0;
                     $totalprecio=0;
                     $canfacturada=0;
                     $totalfacturada=0;
                     $totalsolicitado=0;
                     $totalfacturada=0;
                     $totalrecargo=0;
                     $totaldespachada=0;
                     $totalprecio=0;
                     $totaltotal=0;

		foreach($this->arrp as $dato)
           {

             $reg++;
               if($dato["reffac"]!=$reffac)
             {

                   if ($this->GetY()>=175)
                           {
					        	$this->addpage();
					        }
                $this->setFont("Arial","",8);
                $this->SetWidths(array($this->anchos[6],$this->anchos[3],$this->anchos[7],$this->anchos[8],$this->anchos[7],$this->anchos[7],$this->anchos[7],$this->anchos[6]));
    	        $this->SetAligns(array("L","L","C","C","C","C","C","C"));
    	        $this->setBorder(1);
    	        $this->RowM(array($dato["codcli"],$dato["nompro"],$dato["reffac"],$dato["desfac"],$dato["fecfac"],$dato["estatus"],$dato["tiporeferencia"],H::FormatoMonto($dato["monfac"])));
                $this->Ln();
                $totaltotal=$totaltotal+$dato["monfac"];

                //$this->arrp1 = $this->farfactur->sqlp1($dato["codcli"],$dato["reffac"]);
                $this->arrp1 = $this->farfactur->sqlp2($dato["reffac"]);
                $registro1=count($this->arrp1);

                $precio=0;$total=0;$recargo=0;
                $codart="";$total_fac_X_articulo=0;$fac_X_articulo=0;

                foreach($this->arrp1 as $dato1)

                {

                    if($dato1["codart"]!=$codart)
                      {
                       	 //$this->arrpcod=array();
                       	 $montototal=0;
                       	 $fac_X_articulo=0;
                         $precio=$precio+$dato1["precio"];
                         $cantidad+=$dato1["cantidad"];
                         $recargo+=$dato1["recargo"];

                         $fac_X_articulo=($dato1["precio"]*$dato1["cantidad"])+$dato1["recargo"];
                         $total_fac_X_articulo+=$fac_X_articulo;

                         $total=$total + $dato1["totart"];


                         //H::PrintR($dato1["codart"]);

                         //$this->arrpcod = $this->farfactur->sqlp2($dato["reffac"]);
                         //$this->arrpdespacho = $this->farfactur->sqlp3($dato1["reffac"],$dato1["codart"]);
                         //$cantdespa+=$this->arrpdespacho[0]["despacho"];
                         //$canfacturada+=$this->arrpcod[0]["cantot"];
						 //$cansol+=$this->arrpcod[0]["canord"];
						 //H::PrintR($this->arrpcod[0]["cantot"]);
						// $total_bruto=$this->arrpcod[0]["cantidad"]*$this->arrpcod[0]["precio"];
						   if ($this->GetY()>=181)
                           {
					        	$this->addpage();
					        }
                         $this->SetWidths(array($this->anchos[6],$this->anchos[4],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]+5.5));
    	                 $this->SetAligns(array("R","C","L","R","R","R","R"));
    	        		 $this->setBorder(0);
    	        		 $this->RowM(array($this->titulosm[30],$dato1["codart"],$dato1["articulo"], H::FormatoMonto($dato1["cantidad"]), H::FormatoMonto($dato1["recargo"]),$dato1["precio"],H::FormatoMonto($fac_X_articulo)));

                         $codart=$dato1["codart"];

                       }

                   }
                     $this->Ln();

                     $totalfacturada=$totalfacturada+$cantidad;
                     $totalrecargo=$totalrecargo+$recargo;
                     $totalprecio=$totalprecio+$precio;

                        //print $totalsolicitado; print $cansol;

                         $this->setFont("Arial","B",9);
                         $this->SetWidths(array($this->anchos[6],$this->anchos[4],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]+5.5));
    	                 $this->SetAligns(array("C","C","C","R","R","R","R"));
    	        		 $this->setBorder(0);
    	        		 $this->RowM(array($this->titulosm[30],$this->titulosm[30],$this->titulosm[17],H::FormatoMonto($cantidad),H::FormatoMonto($recargo),H::FormatoMonto($precio),H::FormatoMonto($total_fac_X_articulo)));
                         $this->Ln(0.5);
                         $recargo=0;$canfacturada=0;$precio=0;
                         $total_fac_X_articulo=0;$fac_X_articulo=0;
                         $cantidad=0;
                         $reffac=$dato["reffac"];

           }//if primer foreach

       }//foreach

                         $this->SetWidths(array($this->anchos[6],$this->anchos[4],$this->anchos[3],$this->anchos[5],$this->anchos[5],$this->anchos[5],$this->anchos[5]+5.5));
    	                 $this->SetAligns(array("C","C","C","R","R","R","R"));
    	        		 $this->setBorder(0);
    	        		 $this->RowM(array($this->titulosm[30],$this->titulosm[30],$this->titulosm[18],H::FormatoMonto($totalfacturada),H::FormatoMonto($totalrecargo),H::FormatoMonto($totalprecio),H::FormatoMonto($totaltotal)));
			  if ($reg<=$registro)
					        {
					        	$this->addpage();
					        }

 }//cuerpo

}//fin de la clase
?>
