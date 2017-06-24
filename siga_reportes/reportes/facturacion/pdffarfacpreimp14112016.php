<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Farfacpreimp.class.php");


	class pdfreporte extends fpdf
	{

		var $bd;
        var $forma;
        var   $entregado;
        var   $recibido;
        var  $h;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Legal");

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();

			$this->condes=H::GetPost("codfacdes");
			$this->conhas=H::GetPost("codfachas");

            $this->entregado=H::GetPost("entregado");
			$this->recibido=H::GetPost("recibido");

			$this->farfacpreimp = new Farfacpreimp();
		    $this->arrp = $this->farfacpreimp->sqlp($this->condes,$this->conhas);
           //H::PrintR($this->arrp);exit;
		}


function Header()
		{

		}

function Cuerpo()

		{

	    $reg=1;
		$reffac="";
		$codart="";
		$reg1=1;
		$monto=0;
		$registro=count($this->arrp);
        $y=10;
        $x=20;
		foreach($this->arrp as $dato)
           {

             $reg++;

               if($dato["reffac"]!=$reffac)
             {

             	$this->SetXY(120,10);
               $this->setFont("Helvetica","",11);
               // $this->Multicell(40,4,'Correlativo: '.$dato["reffac"]);

                 $this->SetXY(35,55);
                $this->setFont("Helvetica","",11);
                $this->Multicell(80,4,$dato["cliente"]);
		
		$this->SetFont("Helvetica","",9);
                $this->SetXY(20,65);
                $this->Multicell(170,4,$dato["direccion"]);

		$this->SetFont("Helvetica","",11);
                $this->SetXY(68,75);
                $this->setFont("Helvetica","",11);
                $this->cell(45,5,$dato["telefono"]);

                 $this->SetXY(185,55);
                 $this->cell(80,5,$dato["rif"]);


                $this->SetXY(170,71);
                $this->cell(25,8,$dato["forma"]);

                //La observacoion se monta en la condicion de pago, segun formato de cliente no requiere la misma
                //$this->cell(35,8,$dato["observacion"]);
                
                $this->SetXY(186,26);
                $fec=split("/",$dato["fecha"]);
                $this->cell(10,8,$fec[0]);
                $this->cell(10,8,$fec[1]);
                $this->cell(5,8,$fec[2]);

                $reffac=$dato["reffac"];

                $this->arrp1 = $this->farfacpreimp->sqlp1($reffac);
                $total_bruto=0; 
                $total_recargos=0;
                $total_bruto_acumulado=0;
                $total_pagar=0;
                $this->SetXY(5,75);
                $total_recargo=0;
                $codart="";
                $this->Ln(18);
                foreach($this->arrp1 as $dato1)

                {
                   // H::PrintR($dato1);exit;

                    if($dato1["codart"]!=$codart)

                       {
                        $this->setFont("Helvetica","",12);
                      	$total_bruto=$dato1["cantidad"]*$dato1["precio"];
                      	$total_bruto_acumulado+=$total_bruto;
                        $this->SetX(1);
                      	$this->SetWidths(array(18,110,40,40));
    	                $this->SetAligns(array("L","J","R","R"));
    	                $this->setBorder(0);
    	                $this->RowM(array($dato1["cantidad"],$dato1["codart"].' - '.$dato1["articulo"],H::FormatoMonto($dato1["precio"]),H::FormatoMonto($total_bruto)));
                        $codart=$dato1["codart"];


                          $total_recargo+=$dato1["recargo"];
                        $this->Ln(4);
                       }

                 }


                        $this->arrp2 = $this->farfacpreimp->sqlp2($reffac);
                        $monto+=$this->arrp2[0]["monto"];
                        $total_pagar=($total_bruto_acumulado)+$total_recargo;
                        $pctIVA=(($total_recargo)/($total_bruto_acumulado)*100);
                        $this->SetXY(15,310);
                        $this->SetWidths(array(180,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("",H::FormatoMonto($total_bruto_acumulado)));
    	                $this->Ln(-0.2);

                        $this->SetXY(15,305+$y);
    	                $this->SetWidths(array(180,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("",H::FormatoMonto($total_recargo)));
                        $this->Ln(-0.2);

                        $this->SetXY(10,305+$y);
                        $this->SetWidths(array(85,20));
                        $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
                        $this->Row(array("",H::FormatoMonto($pctIVA)));
                        $this->Ln(-0.2);
                         
                        $this->SetXY(15,310+$y);
                        $this->SetWidths(array(180,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	              //print  H::FormatoMonto($dato["monto"]);exit;
    	                $this->Row(array("",H::FormatoMonto($total_pagar)));
    	                $h=$this->GetY();
    	                $this->Ln(-10);
                        $this->SetWidths(array(60,50));
    	                $this->SetAligns(array("C","C"));
    	                $this->setBorder(0);
    	                $this->Row(array($this->entregado,$this->recibido));
    	                $this->arrp5 = $this->farfacpreimp->sqlp5($reffac);

    	                   $this->SetY($h);

    	                        if ($dato["forma"]!='CREDITO')
				               {

				                $this->cell(25,6,' ');

				                $banco=' ';
				                $contar=0;
						         foreach($this->arrp5 as $dato5)
						        {

		    	                if ($dato5["banco"]!="" and strlen($dato5["banco"])>=28)
		    	                {
		    	                  $banco=substr($dato5["banco"],0,28).'...';
		    	                }elseif ($dato5["banco"]!="" and strlen($dato5["banco"])<28)
		    	                {
		    	                	$banco=$dato5["banco"];
		    	                }
		    	                elseif ($dato5["banco"]="")
		    	                {
		    	                $banco='';
		    	                }
		    	                $this->SetY($h+$contar);
		    	                $this->setFont("Helvetica","",10);
		                        $this->SetWidths(array(23,23,40,45));
		    	                $this->SetAligns(array("L","C","L","L"));
		    	                $this->setBorder(0);
                                        //MONTO QUE SALE Y SE IMPRIME y NO DEBE SALIR
		    	                //$this->Row(array($dato5["pago"],$dato5["numero"],$banco,'Monto: '.H::FormatoMonto($dato5["monto"])));
                                $contar+=3;
		                         }

				               }
				               else
				               {
				               	$this->cell(25,6,'');
				                $this->SetY($h);
		    	                $this->setFont("Helvetica","",10);
		                        $this->SetWidths(array(40,30,30,30));
		    	                $this->SetAligns(array("L","L","L","L"));
		    	                $this->setBorder(0);
		    	                $this->Row(array('',$dato["numero"],$dato["banco"],'Monto : '.H::FormatoMonto($dato["monto"])));
		    	                $this->pos=$this->GetY();

				               }


                        if ($reg<=$registro)
					        {
					        	$this->addpage();
					       }

			           }//if primer foreach



       }//foreach
 }//cuerpo


}//fin de la clase
?>
