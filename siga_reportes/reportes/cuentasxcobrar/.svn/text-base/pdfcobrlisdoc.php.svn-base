<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
      require_once("../../lib/modelo/sqls/cuentasxcobrar/Cobrlisdoc.class.php");

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

			$this->fechamin=H::GetPost("fechamin");
			$this->fechamax=H::GetPost("fechamax");

			$this->tipmovdes=H::GetPost("tipmovdes");
			$this->tipmovhas=H::GetPost("tipmovhas");

			$this->Cobrlisdoc = new Cobrlisdoc();
		    $this->arrp = $this->Cobrlisdoc->sqlp($this->coddes,$this->codhas,$this->codclides,$this->codclihas,$this->fechamin,$this->fechamax,$this->tipmovdes,$this->tipmovhas);

			$this->llenartitulosmaestro();
		}

	function llenartitulosmaestro()
		{

				$this->titulosm[0]="DOCUMENTO";
				$this->titulosm[1]="FECHA";
				$this->titulosm[2]="TIPO";
				$this->titulosm[3]="CODIGO CLIENTE";
				$this->titulosm[4]="NOMBRE";
				$this->titulosm[5]="DESCRIPCIÓN";
				$this->titulosm[6]="MONTO";
				$this->titulosm[7]="RECARGO";
				$this->titulosm[8]="DESCUENTO";
				$this->titulosm[9]="TOTAL";

		}

function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"l","s","n");

			$this->Ln();
		    $this->SetWidths(array(20,15,10,15,40,80,20,20,20,20));
	        $this->SetAligns(array("C","C","C","C","C","C","C","C","C","C"));
	        $this->setBorder(1);
	        $this->setFont("Arial","B",7.5);
	        $this->RowM(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[3],$this->titulosm[4],$this->titulosm[5],$this->titulosm[6],$this->titulosm[7],$this->titulosm[8],$this->titulosm[9]));
	        $this->SetAligns(array("C","C","C","C","L","L","R","R","R","R"));
	        $this->setFont("Arial","",7);
                $this->setBorder(0);
            $this->Ln();
            if ($this->tipo==1) {
            	$this->SetWidths(array(20,15,10,15,40,80,20,20,20,20));
		    $this->SetAligns(array("C","C","C","C","L","L","R","R","R","R"));
		    $this->setBorder(0);
		    $this->setFont("Arial","",6);
            }elseif ($this->tipo==2) {
            	$this->SetWidths(array(40,140,20,20,20,20));
		    $this->SetAligns(array("C","C","R","R","R","R"));
		    $this->setBorder(1);
		    $this->setFont("Arial","B",6);
            }


		}

function Cuerpo()
{
	$tipo=0;
	    $reg=1;
		$numtra="";
		$codtipo="";
		$refdoc="";
		$registro=count($this->arrp);
		$totfacpago=0;$totfacdescuento=0;$totfacrecargo=0;$totfactotal=0;$totmontra=0;
		foreach($this->arrp as $dato)
        {
        	$this->tipo=1;
            $reg++;
		    $this->SetWidths(array(20,15,10,15,40,80,20,20,20,20));
		    $this->SetAligns(array("C","C","C","C","L","L","R","R","R","R"));
		    $this->setBorder(0);
		    $this->setFont("Arial","",6);

		    $this->RowM(array($dato["refdoc"],$dato["fecemi"],$dato["codmov"],$dato["codpro"],$dato["nompro"],$dato["desdoc"],H::FormatoMonto($dato["montoafe"]),H::FormatoMonto($dato["recdocafe"]),H::FormatoMonto($dato["dscdocafe"]),H::FormatoMonto($dato["saldocafe"])));

		    //$this->Ln();

                   $totfacpago=$totfacpago+$dato["montoafe"];
                   $totfacdescuento=$totfacdescuento+$dato["dscdocafe"];
                   $totclirecargo=$totclirecargo+$dato["recdocafe"];
                   $totfactotal=$totfactotal+$dato["saldocafe"];

          }
          $this->tipo=2;
            $this->Ln();
            $this->vienetotal=1;
            $this->SetWidths(array(40,140,20,20,20,20));
		    $this->SetAligns(array("C","C","R","R","R","R"));
		    $this->setBorder(1);
		    $this->setFont("Arial","B",6);
		    $this->RowM(array("TOTAL DOCUMENTOS: ".$registro,"TOTAL GENERAL",H::FormatoMonto($totfacpago),H::FormatoMonto($totclirecargo),H::FormatoMonto($totfacdescuento),H::FormatoMonto($totfactotal)));

                    $totfacpago=0;
    	            $totfacdescuento=0;
    	            $totclirecargo=0;
    	            $totfactotal;
    	            $tipo=0;
			if ($reg<=$registro)
	        {
	        	$this->addpage();
	        }

		}

}//fin de la clase
?>
