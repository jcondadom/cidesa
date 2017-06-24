<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Carcatart.class.php");

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

			$this->eximin=H::GetPost("eximin");
			$this->eximax=H::GetPost("eximax");

			$this->carcatart = new Carcatart();
		    $this->arrp = $this->carcatart->sqlp($this->coddes,$this->codhas,$this->eximin,$this->eximax);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
			//H::PrintR($this->arrp);
			///

		}

	function llenartitulosmaestro()
		{
              //  $this->titulosm=array();
				$this->titulosm[0]="Codigo";
				$this->titulosm[1]="Descripcion";
				$this->titulosm[2]="Unidad de Medida";
				//$this->titulosm[3]="Presentacion";
				$this->titulosm[4]="Codigo Contable";
				$this->titulosm[5]="Codigo Partida";
				$this->titulosm[6]="Existencia";

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=30;
		$this->anchos[1]=110;
		$this->anchos[2]=30;
		$this->anchos[3]=30;
		$this->anchos[4]=30;
		$this->anchos[5]=30;
	}

function Header()
		{
		    	$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->setFont("Arial","B",9);
			//$this->setFont("Arial","B",14);
			//$this->cell(220,5, $this->titulosm[100],0,0,'C');
			    $this->Ln();
			    $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3],$this->anchos[4],$this->anchos[5]));
    	        $this->SetAligns(array("L","L","L","L","L","R"));
    	        $this->setBorder(1);
    	        $this->Row(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[4],$this->titulosm[5],$this->titulosm[6]));

		}

function Cuerpo()

		{

	    $reg=1;
		$codart="";
		$registro=count($this->arrp);
		foreach($this->arrp as $dato)
            {

             $reg++;
             if($dato["codart"]!=$codart)
              {
                $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3],$this->anchos[4],$this->anchos[5]));
    	        $this->SetAligns(array("L","L","L","L","L","R"));
    	        $this->setBorder(1);
    	        $this->Row(array($dato["codart"],$dato["desart"],$dato["unimed"],$dato["codcta"],$dato["codpar"],$dato["exitot"]));

              }
            }

		if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

		}

}//fin de la clase
?>
