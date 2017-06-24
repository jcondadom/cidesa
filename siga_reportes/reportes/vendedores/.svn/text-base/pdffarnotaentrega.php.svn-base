<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Farnotaentrega.class.php");


	class pdfreporte extends fpdf
	{

		var $bd;

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm",array(200,150));

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();

			$this->condes=H::GetPost("notdes");
			$this->conhas=H::GetPost("nothas");

            $this->entregado=H::GetPost("entregado");
			$this->recibido=H::GetPost("recibido");

			$this->farnota = new Farnotaentrega();
		    $this->arrp = $this->farnota->sqlp($this->condes,$this->conhas);
            //H::PrintR($this->arrp);exit;
		}


function Header()
		{

		}

function Cuerpo()

		{

	    $reg=1;
		$numnota="";
		$codart="";
		$reg1=1;
		$registro=count($this->arrp);
        $y=10;
        $x=20;
		foreach($this->arrp as $dato)
           {

             $reg++;
               if($dato["numero"]!=$numnota)
             {

                $this->SetXY(120,10);
                $this->setFont("Helvetica","",8);
                $this->Multicell(40,4,'Correlativo: '.$dato["numero"]);
                $this->SetXY(5,4+$y);
                $this->setFont("Helvetica","",8);
                $this->Multicell(80,4,$dato["cliente"]);

                $this->SetXY(5,7+$y);
                $this->Multicell(80,4,$dato["direccion"]);

                $this->SetXY(5,18+$y);
               $this->setFont("Helvetica","",8);
                $this->cell(45,5,'Telefono: '.$dato["telefono"]);

                $this->SetXY(5,22+$y);
                 $this->cell(80,5,'Rif. '.$dato["rif"].'         '.$dato[""]);


                $this->SetXY(50+$x,18+$y);
                $this->cell(20,6,$dato[""]);
                $this->cell(45,6,$dato[""]);
                //$this->cell(35,6,$dato["observacion"]);

                $this->cell(20,6,$dato["fecha"]);
                $numnota=$dato["numero"];

                $this->arrp1 = $this->farnota->sqlp1($numnota);
                $this->SetXY(5,30+$y);
                foreach($this->arrp1 as $dato1)

                 {
                 	    $this->Ln(1);
                        $this->SetX(5);
                      	$this->SetWidths(array(70,25,20,20));
    	                $this->SetAligns(array("L","R","R","R"));
    	                $this->setBorder(0);
    	                $this->RowM(array($dato1["codart"].' - '.$dato1["articulo"],$dato1["cantidad"],"",""));
                 }

                        $this->SetXY(10,59+$y);
                        $this->SetWidths(array(110,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("",''));
    	                $this->Ln(-0.2);

    	                $this->SetWidths(array(110,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("",''));
                        $this->Ln(-0.2);

                        $this->SetWidths(array(110,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	              //print  H::FormatoMonto($dato["monto"]);exit;
    	                $this->Row(array("",''));
    	                $h=$this->GetY();
    	                $this->Ln(-10);
                        $this->SetWidths(array(60,60));
    	                $this->SetAligns(array("C","C"));
    	                $this->setBorder(0);
    	                $this->Row(array($this->entregado,$this->recibido));
    	                $this->SetY($h-3);
    	                $this->setFont("Helvetica","",8);
                        $this->SetWidths(array(40,30,30,30));
    	                $this->SetAligns(array("L","L","L","L"));
    	                $this->setBorder(0);
    	                //H::PrintR($dato["tipdph"]);exit;
						if ($dato["tipdph"]=="P")
						{
    	                   $lin=$this->GetY();
    	                   $this->Row(array('Numero de Pedido: '.$dato["reqart"],$dato[""],$dato[""],''));
    	                   $this->SetY($lin+3);
    	                   $this->SetWidths(array(40));
    	                   $this->SetAligns(array("L"));
    	                   $this->Row(array($dato["desped"]));
						}
                        else
						{
    	                   $lin=$this->GetY();
    	                   $this->Row(array('Numero de Factura: '.$dato["reqart"],' '.$dato[""],$dato[""],''));
    	                   $this->arrp_desfac = $this->farnota->sqlpdesfac($dato["reqart"]);
    	                   $this->SetY($lin+3);
    	                   $this->SetWidths(array(40));
    	                   $this->SetAligns(array("L"));
    	                   $this->Row(array($this->arrp_desfac[0]["descripcion"]));
						}



           }//if primer foreach
           if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

       }//foreach
 }//cuerpo


}//fin de la clase
?>
