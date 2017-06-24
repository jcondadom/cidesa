<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
      require_once("../../lib/modelo/sqls/cuentasxcobrar/Cobrbalparpen.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;


		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	        $this->arrp=array("no_vacio");
	        $this->arrp1=array("no_vacio");

			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();

			$this->codclides=H::GetPost("codclides");
			$this->codclihas=H::GetPost("codclihas");

			$this->fechamin=H::GetPost("fechamin");
			$this->fechamax=H::GetPost("fechamax");

			$this->cobrbalpar = new Cobrbalparpen();
		    $this->arrp = $this->cobrbalpar->sqlp($this->codclides,$this->codclihas,$this->fechamin,$this->fechamax);
		    $this->arrp1 = $this->cobrbalpar->sqlsalant($this->codclides,$this->codclihas,$this->fechamin,$this->fechamax);

			$this->llenartitulosmaestro();
			$this->llenaranchos();
            $this->cont=false;

		}

	function llenartitulosmaestro()
		{
                //$this->titulosm=array();
				$this->titulosm[0]="Codigo";
				$this->titulosm[1]="Nombre el Cliente";
				$this->titulosm[2]="Saldo Anterior";
				$this->titulosm[3]="Debe";
				$this->titulosm[4]="Haber";
				$this->titulosm[5]="Saldo Factura";
				$this->titulosm[6]="Tipo de Cliente";
				$this->titulosm[7]="Totales por Tipo de Cliente";
				$this->titulosm[8]="Totales Generales";

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=190;
		$this->anchos[1]=150;
		$this->anchos[2]=100;
		$this->anchos[3]=50;
		$this->anchos[5]=25;
		$this->anchos[6]=35;
		$this->anchos[7]=20;
		$this->anchos[8]=20;
	}

function Header()
		{
				$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->setFont("Arial","",9);
                             if ($this->GetY()<36){
                           //print $this->GetY();
                                                     // exit();
                                                   $this->Sety(50);
                       }

		}
		function Cuerpo()
		{

		$reg=0;
            $deuda=0;
		$codtipo=$this->arrp[0]["tipo"];
		$codcli="";
		$registro=count($this->arrp);
		$codcli="";
		$codpro1=$this->arrp[0]["codcli"];
		$pri=true;
		$saldo=0;
		$y1=74;
		foreach($this->arrp as $dato)
            {
				if ($dato["codcli"]!=$codcli){

					if (!$pri) {
						$this->setFont("Arial","B",9);
						$this->ln();
                              $this->SetWidths(array(50,40,60,45));
                              $this->SetAligns(array("R","L","C","R"));
                              $this->setBorder(1);
                              $this->RowM(array("Total Documentos:    ","".$reg,"Deuda Cliente",H::FormatoMonto($deuda)));
						$this->setY($y1);
					      //$this->cell(190,3,"Saldo al : ".$this->fechamax."        Monto: ".H::FormatoMonto($saldo),0,0,'R');
						$this->addpage();
						$reg=0;
                                  $deuda=0;
						$pri=true;
					}

                  $pri=false;
                  $codcli=$dato["codcli"];
                  $this->line(10,$this->GetY()+3,206,$this->GetY()+3);
                  $y=$this->GetY()+3;
                  $this->ln();
                  $this->setFont("Arial","B",9);
                  $this->SetWidths(array(70,60,60));
    	            $this->SetAligns(array("L","L","L"));
    	            $this->setBorder(0);
    	            $this->RowM(array("Código: ".$dato["codcli"],"R.I.F.: ".$dato["rifcli"],"Tipo: ".$dato["tipcli"]));
    	            $this->ln();
    	            $this->SetWidths(array(190));
    	            $this->SetAligns(array("L"));
    	            $this->RowM(array("Nombre: ".$dato["nomcli"]));
    	            $this->ln();
    	            $this->SetWidths(array(130,20,40));
    	            $this->SetAligns(array("L","C","L"));
    	            $this->RowM(array("Dirección:  ".$dato["dircli"],"Teléfono: ",$dato["telcli"]));
    	            $this->ln();
    	            $y1=$this->GetY();
    	          //  $this->cell(140,3,"Saldo al : ".$this->fechamax."        Monto: ".$saldo,0,0,'R');
    	            $this->ln();
    	            $this->line(10,$this->GetY(),206,$this->GetY());
    	            $this->line(10,$y,10,$this->GetY());
    	            $this->line(206,$y,206,$this->GetY());
    	            $this->ln();
    	            $saldo=0;

			 $this->SetWidths(array(18,10,18,49,20,20,20,20,20));
	            $this->SetAligns(array("C","C","C","C","C","C","C","C","C"));
	            $this->setBorder(0);
	            $this->line(10,$this->GetY(),206,$this->GetY());
	            $this->setFont("Arial","B",8);
	            $this->RowM(array("Fecha Emisión","Tipo","Número","Descripción","Monto Factura","Nota Debito","Nota Credito", "Pagos","Saldo Factura"));
	            $this->setFont("Arial","",8);
	            $this->line(10,$this->GetY(),206,$this->GetY());
				$this->ln();

				}//fin del cliente

                    $reg++;


                  $this->SetWidths(array(18,10,18,49,20,20,20,20,20));
    	            $this->SetAligns(array("C","C","C","L","R","R","R","R","R"));
    	            $this->setBorder(0);
    	            $this->setFont("Arial","",8);
    	            $debe=$dato["totdoc"];
    	            $haber=$dato["tottra"];
    	            $saldo+=$debe-$haber;
    	            $this->RowM(array($dato["fechaemi"],$dato["tipmov"],$dato["refdoc"],$dato["desdoc"],H::FormatoMonto($dato["monfac"]),H::FormatoMonto($dato["mondeb"]),H::FormatoMonto($dato["moncre"]),H::FormatoMonto($dato["montopago"]),H::FormatoMonto($dato["saldofac"])));
                  $deuda=$deuda+$dato["saldofac"];
                    if ($this->GetY()>240){//cuando el detalle del mismo cliente pasa de la linea 240
					$this->addpage();
                    $this->line(10,$this->GetY()+3,200,$this->GetY()+3);
					$y=$this->GetY()+3;
					$this->cell(200,3,"CONTINUACION...");
					$this->ln();
					$this->setFont("Arial","B",9);
                    $this->SetWidths(array(70,60,60));
    	            $this->SetAligns(array("L","L","L"));
    	            $this->setBorder(0);
    	            $this->RowM(array("Código: ".$dato["codcli"],"R.I.F.: ".$dato["rifcli"],"Tipo: ".$dato["tipcli"]));
    	            $this->ln();
    	            $this->SetWidths(array(190));
    	            $this->SetAligns(array("L"));
    	            $this->RowM(array("Nombre: ".$dato["nomcli"]));
    	            $this->ln();
    	            $this->SetWidths(array(130,20,40));
    	            $this->SetAligns(array("L","C","L"));
    	            $this->RowM(array("Dirección:  ".$dato["dircli"],"Teléfono: ",$dato["telcli"]));
    	            $this->ln();
    	             $y1=$this->GetY();
    	           // $this->cell(190,3,"Sub-Total: ".H::FormatoMonto($saldo),0,0,'R');
    	            $this->ln();
    	            $this->line(10,$this->GetY(),200,$this->GetY());
    	            $this->line(10,$y,10,$this->GetY());
    	            $this->line(200,$y,200,$this->GetY());
    	            $this->ln();

                  $this->SetWidths(array(18,10,18,49,20,20,20,20,20));
                  $this->SetAligns(array("C","C","C","L","R","R","R","R","R"));
                  $this->setBorder(0);
                  $this->setFont("Arial","",8);
                  $debe=$dato["totdoc"];
                  $haber=$dato["tottra"];
                  $saldo+=$debe-$haber;
                  $this->RowM(array($dato["fechaemi"],$dato["tipmov"],$dato["refdoc"],$dato["desdoc"],H::FormatoMonto($dato["monfac"]),H::FormatoMonto($dato["mondeb"]),H::FormatoMonto($dato["moncre"]),H::FormatoMonto($dato["montopago"]),H::FormatoMonto($dato["saldofac"])));

	            //$this->line(10,$this->GetY(),200,$this->GetY());
				$this->ln();
                    }//cuando el detalle del mismo cliente pasa de la linea 240
                 }//fin foreach
                        $this->ln();


						$this->setFont("Arial","B",9);
                              $this->SetWidths(array(50,40,60,45));
                              $this->SetAligns(array("R","L","C","R"));
                              $this->setBorder(1);
                              $this->RowM(array("Total Documentos:    ","".$reg,"Deuda Cliente",H::FormatoMonto($deuda)));

                              						$this->setY($y1);
					 //   $this->cell(190,3,"Saldo al : ".$this->fechamax."        Monto: ".H::FormatoMonto($saldo),0,0,'R');
						$reg=0;


            }
}//fin de la clase
?>
