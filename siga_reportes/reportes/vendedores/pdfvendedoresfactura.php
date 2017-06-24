<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/vendedores/Factura.class.php");

	class pdfreporte extends fpdf
	{

		var $bd;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();


			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");

			$this->fafactur = new Factura();
		        $this->arrp = $this->fafactur->sqlp($this->fecdes,$this->fechas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
			//H::PrintR($this->arrp);
			///

		}

	function llenartitulosmaestro()
		{
              //  $this->titulosm=array();
				$this->titulosm[0]="Cantidad";
				$this->titulosm[1]="Vendedor";			
				

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=20;
		$this->anchos[1]=80;
		$this->anchos[2]=80;
	}

function Header()
		{
		    	$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			$this->setFont("Arial","",10);
			$this->Ln();
			$this->SetWidths(array($this->anchos[0],$this->anchos[1]));
	    	        $this->SetAligns(array("C","C"));
	    	        $this->setBorder(1);
	    	        $this->Row(array($this->titulosm[0],$this->titulosm[1]));
		        $this->Ln();

		}

function Cuerpo(){
	        $reg=1;
		$codruta="";
		$registro=count($this->arrp);
		foreach($this->arrp as $dato)
                {
            	//H::PrintR($dato);

		     $reg++;
		     //if($dato["id"]!=$codruta)
		      //{
		        $this->SetWidths(array($this->anchos[0],$this->anchos[1]));
	    	        $this->SetAligns(array("C","C"));
	    	        $this->setBorder(1);
	    	        $this->Row(array($dato["cantidad"],$dato["vendedor"]));
		      //}
                }

		if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

		}

}//fin de la clase
?>
