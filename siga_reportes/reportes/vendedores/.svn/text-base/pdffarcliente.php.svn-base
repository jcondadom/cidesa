<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
      require_once("../../lib/modelo/sqls/facturacion/Farcliente.class.php");

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

			$this->rifdes=H::GetPost("rifdes");
			$this->rifhas=H::GetPost("rifhas");

			$this->nomdes=H::GetPost("nomdes");
			$this->nomhas=H::GetPost("nomhas");

			$this->farcliente = new Farcliente();
		    $this->arrp = $this->farcliente->sqlp($this->coddes,$this->codhas,$this->rifdes,$this->rifhas,$this->nomdes,$this->nomhas);

			$this->llenartitulosmaestro();
			$this->llenaranchos();



		}

	function llenartitulosmaestro()
			{
				$this->titulosm[0]="Código";
				$this->titulosm[1]="Rif";
				$this->titulosm[2]="Nombre o Razón Social";
				$this->titulosm[3]="Tipo";
				$this->titulosm[4]="Dirección";
				$this->titulosm[5]="Teléfono";
				$this->titulosm[6]="Cta. Contable";
		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=190;
		$this->anchos[1]=150;
		$this->anchos[2]=100;
		$this->anchos[3]=65;
		$this->anchos[5]=30;
		$this->anchos[6]=40;
		$this->anchos[7]=10;
		$this->anchos[8]=20;
	}

function Header()
		{
				$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->setFont("Arial","B",9);
			    $this->SetWidths(array($this->anchos[5],$this->anchos[5],$this->anchos[3],$this->anchos[7],$this->anchos[3],$this->anchos[5],$this->anchos[5]));
    	        $this->SetAligns(array("C","C","C","C","C","C"));
    	        $this->setBorder(1);
    	        $this->RowM(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[3],$this->titulosm[4],$this->titulosm[5],$this->titulosm[6]));		}

function Cuerpo()

		{

	    $reg=1;
		$codpro="";
		$registro=count($this->arrp);
		foreach($this->arrp as $dato)

            {

             $reg++;
             if($dato["codpro"]!=$codpro)
                 {
                 $this->setFont("Arial","",9);
                $this->SetWidths(array($this->anchos[5],$this->anchos[5],$this->anchos[3],$this->anchos[7],$this->anchos[3],$this->anchos[5],$this->anchos[5]));
    	        $this->SetAligns(array("L","L","L","C","L","L","L"));
    	        $this->setBorder(1);
    	        $this->RowM(array($dato["codpro"],$dato["rifpro"],$dato["nompro"],$dato["tipo"],$dato["dirpro"],$dato["telpro"],$dato["codcta"]));

                 }
            }
		if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

		}

}//fin de la clase
?>
