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


   //   FUNCIONES NUEVAS PARA UTILIZAR HTML EN EL PDF

function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}
function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';

}


//    FIN FUNCIONES NUEVAS PARA UTILIZAR HTML EN EL PDF */


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
        
//-------------------------------------------------------------------- LINEA SUPERIOR REPORTE
        $this->setFont("Helvetica","",9);
        $this->Line(5,48,211,48); // LINEA SUPERIOR REPORTE

//-------------------------------------------------------------------- FIN LINEA SUPERIOR REPORTE

//--------------- REPORTE SUPERIOR IZQUIERDO

                $this->SetXY(5,49);
                $this->writeHTML('<b>Factura a nombre de:</b>');

                $this->SetXY(20,55);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'Cliente:');

                 $this->SetXY(33,55);
                $this->setFont("Helvetica","",10);
                $this->Multicell(90,4,$dato["cliente"]);

                $this->SetXY(17.5,60);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'Atención:');

                 $this->SetXY(33,60);
                $this->setFont("Helvetica","",10);
                $this->Multicell(90,4,'SRA. BLANCA PACHECO Y/O SR. JUAN C RUIZ');

                $this->SetXY(23,65);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'R.I.F:');

                 $this->SetXY(33,65);
                $this->setFont("Helvetica","",10);
                $this->Multicell(90,4,$dato["rif"]);

                $this->SetXY(23,70);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'N.I.T:');

                 $this->SetXY(33,70);
                $this->setFont("Helvetica","",10);
                $this->Multicell(90,4,$dato["nit"]);

                $this->SetXY(16,75);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'Teléfonos:');

                $this->SetXY(33,75);
                $this->setFont("Helvetica","",10);
                $this->Multicell(90,4,$dato["telefono"]);

                $this->SetXY(16.5,80);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'Dirección:');

                $this->SetXY(33,80);
                $this->setFont("Helvetica","",10);
                $this->Multicell(90,4,$dato["direccion"]);

                $this->SetXY(20.5,90);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'E-mail:');

                $this->SetXY(33,90);
                $this->setFont("Helvetica","",10);
                $this->Multicell(90,4,'contacto@multiequiposamoa.com');

//--------------- REPORTE SUPERIOR DERECHO
                
                $this->SetXY(135,49);
                $this->writeHTML('<b>FACTURA N°.: </b>'.$dato["reffac"]);

                $this->SetXY(138,55);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'Emitido por:');

                $this->SetXY(158,54.5);
                $this->writeHTML('<b>MULTIEQUIPOS SAMOA C.A</b>');


     //       SEPARAR LA FECHA

                $fec=split("/",$dato["fecha"]);


                $this->SetXY(142.5,70);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'Emisión:');

                 $this->SetXY(158,70);
                $this->setFont("Helvetica","",10);
                $this->Multicell(50,4,$fec[0].'/'.$fec[1].'/'.$fec[2]);

                $this->SetXY(136.5,75);
                $this->setFont("Helvetica","",9);
                $this->Multicell(25,4,'Vencimiento:');

                $this->SetXY(158,75);
                $this->setFont("Helvetica","",10);
                $this->Multicell(50,4,$fec[0].'/'.$fec[1].'/'.$fec[2]);

                $this->SetXY(144,80);
                $this->setFont("Helvetica","",9);
                $this->Multicell(20,4,'Asesor:');

                 $this->SetXY(158,80);
                $this->setFont("Helvetica","",10);
                $this->Multicell(50,4,' ');






		
	/*	$this->SetFont("Helvetica","",9);
                $this->SetXY(20,75);
                $this->Multicell(170,4,$dato["direccion"]);

		$this->SetFont("Helvetica","",11);
                $this->SetXY(68,75);
                $this->setFont("Helvetica","",11);
                $this->cell(45,5,$dato["telefono"]);

                // $this->SetXY(185,55);
                 //$this->cell(80,5,$dato["rif"]);*/


               // $this->SetXY(170,71);
                //$this->cell(25,8,$dato["forma"]);

                //La observacoion se monta en la condicion de pago, segun formato de cliente no requiere la misma
                //$this->cell(35,8,$dato["observacion"]);
                
             /*   $this->SetXY(186,26);
                $fec=split("/",$dato["fecha"]);
                $this->cell(10,8,$fec[0]);
                $this->cell(10,8,$fec[1]);
                $this->cell(5,8,$fec[2]); */

                $reffac=$dato["reffac"];

//-------------------------------------------------------------------- LINEA SUPERIOR REPORTE ARTICULOS
        $this->setFont("Helvetica","",9);
       
        $this->Line(5,95,211,95); // LINEA SUPERIOR REPORTE ARTICULOS 1

        $this->Line(5,99,211,99); // LINEA SUPERIOR REPORTE ARTICULOS 2

                $this->SetXY(10,100);
                $this->setFont("Helvetica","B",9);
                $this->Multicell(20,4,'Código');

                $this->SetXY(70,100);
                $this->setFont("Helvetica","B",10);
                $this->Multicell(50,4,'Descripción');

                $this->SetXY(140,100);
                $this->setFont("Helvetica","B",9);
                $this->Multicell(20,4,'Cantidad');

                $this->SetXY(165,100);
                $this->setFont("Helvetica","B",10);
                $this->Multicell(50,4,'Precio');

                $this->SetXY(195,100);
                $this->setFont("Helvetica","B",10);
                $this->Multicell(50,4,'Total');

          $this->Line(5,104,211,104); // LINEA SUPERIOR REPORTE ARTICULOS 2       



//-------------------------------------------------------------------- LINEA SUPERIOR REPORTE ARTICULOS



                $this->arrp1 = $this->farfacpreimp->sqlp1($reffac);
                $total_bruto=0; 
                $total_recargos=0;
                $total_bruto_acumulado=0;
                $total_pagar=0;
                $this->SetXY(5,90);
                $total_recargo=0;
                $codart="";
                $this->Ln(18);
                foreach($this->arrp1 as $dato1)

                {
                   // H::PrintR($dato1);exit;

                    if($dato1["codart"]!=$codart)

                       {
                        $this->setFont("Helvetica","",9);
                      	$total_bruto=$dato1["cantidad"]*$dato1["precio"];
                      	$total_bruto_acumulado+=$total_bruto;
                        $this->SetX(1);
                      	$this->SetWidths(array(40,100,15,27,27));
    	                $this->SetAligns(array("L","J","C","R","R"));

                     //       $this->SetWidths(array(18,110,40,40));
                       // $this->SetAligns(array("L","J","R","R"));
    	                $this->setBorder(0);
    	     $this->RowM(array($dato1["codart"],$dato1["articulo"],$dato1["cantidad"],H::FormatoMonto($dato1["precio"]),H::FormatoMonto($total_bruto)));

          //   $this->RowM(array($dato1["cantidad"],$dato1["codart"].' - '.$dato1["articulo"],H::FormatoMonto($dato1["precio"]),H::FormatoMonto($total_bruto)));

                        $codart=$dato1["codart"];


                          $total_recargo+=$dato1["recargo"];
                        $this->Ln(4);
                       }



                 }

                  
                  //$this->Image("../../img/logo_1.jpg", 8, 10, 36);
                     //Your text cell
            
         
           /* $this->writeHTML('1- Tiempo de entrega: inmediato, salvo a venta previa.');

                  //$this->Multicell(170,4,'1- Tiempo de entrega: inmediato, salvo a venta previa.');
                  $this->Multicell(170,4,'2- Forma de pago: CONTADO');
                  $this->Multicell(170,4,'3- Todo Cheque Devuelto, genera una Nota de Debito por Bs.F. 150,00 Sin Excepción.');
                  $this->Multicell(170,4,'4- USTED PUEDE EFECTUAR SU PAGO EN:');
                  $this->Multicell(170,4,'Cta. Cte. N° 0156-0031-46-0400256061 de 100% Banco a Nombre de: MULTIEQUIPOS SAMOA, C.A.');
                  $this->Multicell(170,4,'Cta. Cte. N° 0134-0046-61-0461025051 de Banco Banesco a Nombre de: MULTIEQUIPOS SAMOA, C.A.');
                  $this->Multicell(170,4,'Cta. Cte. N° 0105-0151-29-1151061662 de Banco Mercantil a Nombre de: MULTIEQUIPOS SAMOA, C.A.');

                  $this->WriteHTML('1- Tiempo de entrega: inmediato, salvo a venta previa.<br>
                    2- Forma de pago: <b>CONTADO.</b><br>
                    You can<br>
                    <p align="center">3- Todo Cheque Devuelto, genera una Nota de Debito por Bs.F. 150,00 Sin Excepción.</p>and add a horizontal rule:<br><hr>');
*/


                        $this->arrp2 = $this->farfacpreimp->sqlp2($reffac);
                        $monto+=$this->arrp2[0]["monto"];
                        $total_pagar=($total_bruto_acumulado)+$total_recargo;
                        $pctIVA=(($total_recargo)/($total_bruto_acumulado)*100);
                      

 $this->Line(5,168,211,168); // LINEA SUPERIOR REPORTE ARTICULOS 2

  $this->Line(5,195,211,195); // LINEA SUPERIOR REPORTE ARTICULOS 2


                        $this->SetY(160+$y);
                        $this->setFont("Helvetica","",10);
                        $this->SetX(5);
                        $this->writeHTML('<b>NOTA:</b><br>');


                        $this->SetY(165+$y);
                        $this->setFont("Helvetica","B",9);
                        $this->SetX(5);
                          $this->Multicell(125,4, $dato["observacion"]);


  //   SUB TOTAL


                        $this->SetXY(155,160+$y);
                        $this->setFont("Helvetica","",10);
                        $this->Multicell(90,4,'Sub-Total Bs.F.:');

                //$this->setFont("Helvetica","",10);
                //$this->Multicell(90,4,$dato["telefono"]);
//  Descuento   Fletes I.V.A 12%   Total Bs.F

                        $this->SetXY(15,160+$y);

                        $this->SetWidths(array(175,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("",H::FormatoMonto($total_bruto_acumulado)));
    	                $this->Ln(-0.2);

  //   DESCUENTO
                         $this->SetXY(162.5,165+$y);
                        $this->setFont("Helvetica","",10);
                        $this->Multicell(90,4,'Descuento:');

                            $this->SetXY(20,165+$y);
                        $this->SetWidths(array(165,20));
                        $this->SetAligns(array("C","R"));
                        $this->setBorder(0);
                        $this->Row(array("",H::FormatoMonto($dato["descuento"])));
                        $this->Ln(-0.2);


  //   FLETE 

                        $this->SetXY(171.5,170+$y);
                        $this->setFont("Helvetica","",10);
                        $this->Multicell(90,4,'Flete:');



 //   IVA

                        $this->SetXY(162,175+$y);
                        $this->setFont("Helvetica","",10);
                        $this->Multicell(90,4,'I.V.A. '.$pctIVA.' %:');



                        $this->SetXY(15,175+$y);
    	                $this->SetWidths(array(175,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	                $this->Row(array("",H::FormatoMonto($total_recargo)));
                        $this->Ln(-0.2);

//   TOTAL

                         
                        $this->SetXY(162.5,180+$y);
                        $this->setFont("Helvetica","",10);
                        $this->Multicell(90,4,'Total Bs.F.:');



                        $this->SetXY(15,180+$y);
                        $this->SetWidths(array(175,20));
    	                $this->SetAligns(array("C","R"));
    	                $this->setBorder(0);
    	              //print  H::FormatoMonto($dato["monto"]);exit;
    	                $this->Row(array("",H::FormatoMonto($total_pagar)));


//   CREDITOS

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
                   
                     $this->Ln(15);

                   $this->setFont("Helvetica","",8);

                   $this->Image("../../img/logo_1.jpg", 7, 198, 36);
                  // $this->writeHTML('<img src="../../img/logo_1.jpg" width="104"> '); 
                   $this->SetX(5);
                   $this->writeHTML('1- Tiempo de entrega: inmediato, salvo a venta previa.<br>');
                   $this->SetX(5);
                   $this->writeHTML('2- Forma de pago: <b>CONTADO.</b><br>');
                   $this->SetX(5);
                   $this->writeHTML('3- Todo Cheque Devuelto, genera una Nota de Debito por <b>Bs.F. 150,00 Sin Excepción.</b><br>');
                   $this->SetX(5);
                   $this->writeHTML('4- <b>USTED PUEDE EFECTUAR SU PAGO EN:</b><br>');
                   $this->SetX(5);
                   $this->writeHTML('Cta. Cte. N° 0156-0031-46-0400256061 de 100% Banco a Nombre de: <b>MULTIEQUIPOS SAMOA, C.A.</b><br>');
                   $this->SetX(5);
                   $this->writeHTML('Cta. Cte. N° 0134-0046-61-0461025051 de Banco Banesco a Nombre de: <b>MULTIEQUIPOS SAMOA, C.A.</b><br>');
                   $this->SetX(5);
                   $this->writeHTML('Cta. Cte. N° 0105-0151-29-1151061662 de Banco Mercantil a Nombre de: <b>MULTIEQUIPOS SAMOA, C.A.</b><br>');




                        if ($reg<=$registro)
					        {
					        	$this->addpage();
					       }

			           }//if primer foreach



       }//foreach
 }//cuerpo


}//fin de la clase
?>