<?
      require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
      require_once("../../lib/modelo/sqls/cuentasxcobrar/Cobrlistra.class.php");

	class pdfreporte extends fpdf
	{
		var $bd;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","legal");
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
			$this->tipclides=H::GetPost("tipclides");
			$this->tipclihas=H::GetPost("tipclihas");
			$this->Cobrlistra = new Cobrlistra();
		    $this->arrp = $this->Cobrlistra->sqlp($this->coddes,$this->codhas,$this->codclides,$this->codclihas,$this->fechamin,$this->fechamax,$this->tipmovdes,$this->tipmovhas,$this->tipclides,$this->tipclihas);
			$this->llenartitulosmaestro();
		}

	function llenartitulosmaestro()
		{
			$this->titulosm[0]="Nro.Tras.";
			$this->titulosm[1]="Fecha";
			$this->titulosm[2]="Descripción";
			$this->titulosm[3]="Codigo";
			$this->titulosm[4]="Cliente";
			$this->titulosm[5]="Movimiento";
			$this->titulosm[6]="Referencia del Doc.";
			$this->titulosm[7]="Pago";
			$this->titulosm[8]="Descuento";
			$this->titulosm[9]="Recargo";
			$this->titulosm[10]="Total Pag.";
			$this->titulosm[11]="Monto Trans.";
			$this->titulosm[12]="Comprobante";
			$this->titulosm[13]="Fecha Comp.";
			$this->titulosm[14]="Monto Comp.";
		}

function Header()
		{
	        $this->cab->poner_cabecera_f($this,H::GetPost("titulo"),"l","s","s");
            $this->Ln();
		    $this->SetWidths(array(20,20,70,20,70,25,20,20,20,20,20,20,25,20,25));
	        $this->SetAligns(array("C","C","C","C","C","C","C","C","C","C","C","C","C","C","C"));
	        $this->setBorder(0);
	        $this->setFont("Arial","B",8);
	        $this->RowM(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[3],$this->titulosm[4],$this->titulosm[5],$this->titulosm[6],$this->titulosm[7],$this->titulosm[11],$this->titulosm[12],$this->titulosm[13]));
	        $this->SetAligns(array("C","C","L","C","L","L","C","R","R","R","R","R"));
	        $this->setFont("Arial","",6);
            $this->Ln();
		}

function Cuerpo()

		{
	    $reg=1;
		$numtra="";
		$codtipo="";
		$refdoc="";
		$registro=count($this->arrp);
		$totfacpago=0;$totfacdescuento=0;$totfacrecargo=0;$totfactotal=0;$totmontra=0;
		foreach($this->arrp as $dato)
        {
            $reg++;
		    $this->SetWidths(array(20,20,70,20,70,25,20,20,20,20,20,20,25,20,25));
		    $this->SetAligns(array("C","C","L","C","L","L","C","R","R","R","R","R","C","C","R"));
		    $this->setBorder(0);
		    $this->setFont("Arial","",6);
		    $this->RowM(array($dato["numtra"],$dato["fectra"],$dato["destra"],$dato["codpro"],$dato["nompro"],$dato["desmov"],$dato["refdoc"],H::FormatoMonto($dato["pago"]),H::FormatoMonto($dato["montra"]),$dato["numcom"],$dato["feccom"]));

		//  $this->Ln();
                   $totfacpago=$totfacpago+$dato["pago"];
                   $totfacdescuento=$totfacdescuento+$dato["descuento"];
                   $totclirecargo=$totclirecargo+$dato["recargo"];
                   $totfactotal=$totfactotal+$dato["totpag"];
                   $totmontra=$totmontra+$dato["montra"];
          }
            $this->Ln();
            $this->SetWidths(array(245,20,20,20,20,20,25,20,25,25+20+25));
		    $this->SetAligns(array("C","R","R","R","R","R","C"));
		    $this->setBorder(0);
		    $this->setFont("Arial","B",6);
		    $this->RowM(array("TOTAL GENERAL",H::FormatoMonto($totfacpago)));

                    $totfacpago=0;
    	            $totfacdescuento=0;
    	            $totclirecargo=0;
    	            $totfactotal;

			if ($reg<=$registro)
	        {
	        	$this->addpage();
	        }

		}

}//fin de la clase
?>
