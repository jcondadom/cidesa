<?php
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Fardefpre.class.php");

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

			$this->codpdes=H::GetPost("codpdes");
			$this->codphas=H::GetPost("codphas");

			$this->fardefpre = new Fardefpre();
		    $this->arrp = $this->fardefpre->sqlp($this->coddes,$this->codhas,$this->codpdes,$this->codphas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();

		}

	function llenartitulosmaestro()
		{
                $this->titulosm[0]="Cod.Artículo";
				$this->titulosm[1]="Descripción";
				$this->titulosm[2]="Cod.Precio";
				$this->titulosm[3]="Precio";

		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=190;
		$this->anchos[1]=65;
		$this->anchos[2]=20;

	}

function Header()
		{
			   $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			   $this->setFont("Arial","B",9);
			   $this->Ln();
			   $this->SetWidths(array($this->anchos[2],$this->anchos[1],$this->anchos[2],$this->anchos[1],$this->anchos[2]));
    	       $this->SetAligns(array("C","C","C","C","C"));
    	       $this->setBorder(1);
    	       $this->Row(array($this->titulosm[0],$this->titulosm[1],$this->titulosm[2],$this->titulosm[1],$this->titulosm[3]));

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
                  $this->setFont("Arial","",9);
                $this->SetWidths(array($this->anchos[2],$this->anchos[1],$this->anchos[2],$this->anchos[1],$this->anchos[2]));
    	        $this->SetAligns(array("L","L","C","L","R"));
    	        $this->setBorder(1);
    	        $this->RowM(array($dato["codart"],$dato["desart"],$dato["id"],$dato["despvp"],$dato["pvpart"]));

              }
            }

		if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }
		}

}//fin de la clase
?>