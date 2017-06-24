<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Farintipban.class.php");

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

			$this->farintipban = new Farintipban();
		    $this->arrp = $this->farintipban->sqlp($this->coddes,$this->codhas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();

		}

	function llenartitulosmaestro()
		{
              	$this->titulosm[0]="Código Banco";
				$this->titulosm[1]="Descripción";

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=190;
		$this->anchos[1]=160;
		$this->anchos[2]=110;
		$this->anchos[3]=140;
		$this->anchos[5]=50;

	}

function Header()
		{
		    	$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->Ln(0.5);
			    $this->setFont("Arial","B",9);
			    $this->SetWidths(array($this->anchos[5],$this->anchos[3]));
    	        $this->SetAligns(array("C","C"));
    	        $this->setBorder(1);
    	        $this->Row(array($this->titulosm[0],$this->titulosm[1]));
    	        $this->Ln();
    	 }

function Cuerpo()

		{

	    $reg=1;
		$codigo="";
		$registro=count($this->arrp);

		foreach($this->arrp as $dato)
            {

             $reg++;
             if($dato["codigo"]!=$codigo)
              {
                $this->setFont("Arial","",9);
                $this->SetWidths(array($this->anchos[5],$this->anchos[3]));
    	        $this->SetAligns(array("L","L"));
    	        $this->setBorder(0);
    	        $this->Row(array($dato["codigo"],$dato["nombre"]));

              }
            }

		if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

		}

}//fin de la clase
?>
