<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/vendedores/Metas.class.php");

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


			$this->coddes=H::GetPost("coddes");
			$this->codhas=H::GetPost("codhas");
			$this->mesasignacion=H::GetPost("mesasignacion");
			$this->status=H::GetPost("status");

			$this->metas = new Metas();
		        $this->arrp = $this->metas->sqlp($this->coddes,$this->codhas,$this->mesasignacion,$this->status);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
			//H::PrintR($this->arrp);
			///

		}

	function llenartitulosmaestro()
		{
              //  $this->titulosm=array();
				$this->titulosm[0]="Código";
				$this->titulosm[1]="Cantidad";	
				$this->titulosm[2]="Vendedor";	
				$this->titulosm[3]="Producto";			
				

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=20;
		$this->anchos[1]=150;
		$this->anchos[2]=160;
		$this->anchos[3]=80;
		$this->anchos[5]=40;
		$this->anchos[6]=50;




	}

function Header()
		{
		    	$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->setFont("Arial","",10);
			     $this->Ln();
			    $this->SetWidths(array($this->anchos[0],$this->anchos[0],$this->anchos[3],$this->anchos[3]));
    	        $this->SetAligns(array("L","C","C","C"));
    	        $this->setBorder(1);
    	        $this->Row(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[3]));
                $this->Ln();

		}

function Cuerpo()

		{
	    $reg=1;
		$codruta="";
		$registro=count($this->arrp);
		foreach($this->arrp as $dato)
            {
            	//H::PrintR($dato);

             $reg++;
             if($dato["id"]!=$codruta)
              {
                $this->SetWidths(array($this->anchos[0],$this->anchos[0],$this->anchos[3],$this->anchos[3]));
    	        $this->SetAligns(array("L","C","C","C"));
    	        $this->setBorder(1);
    	        $this->Row(array($dato["id"],$dato["cantidad"],$dato["vendedor"],$dato["producto"]));

              }
            }

		if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

		}

}//fin de la clase
?>
