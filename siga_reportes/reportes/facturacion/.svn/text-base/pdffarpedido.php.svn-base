<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/facturacion/Farpedido.class.php");
    //require_once("../../lib/general/mc_table.php");

  class pdfreporte extends fpdf
  {

//DECLARACION DE VARIABLES GLOBALES AQUI

    function pdfreporte()
    {
            $this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
      //CODIGO DE ARTICULO
      $this->cod1=H::GetPost("coddes");
      $this->cod2=H::GetPost("codhas");
      //CODIGO DE CLIENTE
      $this->cli1=H::GetPost("clides");
      $this->cli2=H::GetPost("clihas");
      //FECHA
      $this->fec1=H::GetPost("fechades");
      $this->fec2=H::GetPost("fechahas");
      //ESTATUS
      $this->estatus=H::GetPost("estatus");
      //REFERENCIA
      $this->ref=H::GetPost("referencia");

      //REALIZADO POR, AUTORIZADO POR, RECIBIDO POR
      $this->realizado=H::GetPost("realizado");
      $this->autorizado=H::GetPost("autorizado");
      $this->L=H::GetPost("recibido");
      $this->fecharec=H::GetPost("fecharec");



      //print $this->ref."-".$this->estatus;exit;
      //$caso = $this->ref.$this->estatus;
      //print $caso;exit;
      if ($this->estatus == "M")

      	{$caso = 1;}

      else
         {$caso = 0;}

     //  print $caso;exit;


      $this->far= new Farpedido();
      $this->llenartitulosmaestro();
      $this->arrp=$this->far->sqlp($this->cod1,$this->cod2,$this->cli1,$this->cli2,$this->fec1,$this->fec2,$this->estatus,$caso);


        }// fin del pdf

function llenartitulosmaestro()
    {
        $this->titulos[0]="PEDIDO";
        $this->titulos[1]="Fecha: ";
        $this->titulos[2]="Hora: ";
        $this->titulos[3]="Pedido N°: ";
        $this->titulos[4]="Fecha: ";
        $this->titulos[5]="Telefono: ";
        $this->titulos[6]="Cliente N°";
        $this->titulos[7]="Nombre Cliente: ";
        $this->titulos[8]="Dirección: ";
        $this->titulos[9]="Observacion: ";
        $this->titulos[10]="Telefonos";
        $this->titulos[11]="Vendedor";
        $this->titulos[12]="Código";
        $this->titulos[13]="Descripción";
        $this->titulos[14]="Unidad";
        $this->titulos[15]="Cantidad";
        $this->titulos[16]="Precio Unitario";
        $this->titulos[17]="Total";
        $this->titulos[18]="ESTE DOCUMENTO VA SIN TACHADURA NI ENMENDADURA";
        $this->titulos[19]="Total: ";
        $this->titulos[20]="Condiciones: ";
        $this->titulos[21]="Elaborado por: ";
        $this->titulos[22]="Revisado por: ";
        //$this->titulos[23]="Fecha: ";
  }




    function Header()
    {
     $this->setFont("Arial","B",9);
      $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
      $this->setFont("Arial","",9);
	  //$this->Ln();


    }

    function Cuerpo()
    {
       // $this->ln(30);


   //ENCABEZADO DEL CUADRO
   //$this->ln();
   //$x = $this->getX();
   $y = $this->getY();
   $this->setXY(10,$y);

   //VIENEN LOS DATOS
   $registro=count($this->arrp);
   $reg = 1;
   foreach($this->arrp as $dato){


       $reg++;
       //TITULO DEL REPORTE
	    /*$this->ln();
	    $this->setFont("Arial","B",12);
		$this->SetWidths(array(260));
		$this->SetAligns(array("C"));
		//$this->SetBorder(1);
		$this->Row(array($this->titulos[0]));
		//$this->SetBorder(0);
		$this->SetFillTable(0);
        $this->ln();*/
        //linea 2
        $fecha_actual=date("d/m/Y");
        $hora = date(" H:i",time());
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(200,60));
		$this->SetAligns(array("L","L"));
		//$this->SetBorder(1);
		$this->Row(array("",$this->titulos[1].""."".$fecha_actual));
		//$this->SetBorder(0);
		$this->SetFillTable(0);
		//linea 3
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(200,60));
		$this->SetAligns(array("L","L"));
		//$this->SetBorder(1);
		$this->Row(array("",$this->titulos[2].""."".$hora));
		//$this->SetBorder(0);
		$this->SetFillTable(0);
		//linea 4

        $this->arrp3 = $this->far->datos();
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(80,40,140));
		$this->SetAligns(array("L","L","L"));
		//$this->SetBorder(1);
		$this->Row(array($this->arrp3[0][direccion],"RIF: xxxxx",""));
		//$this->SetBorder(0);
		$this->SetFillTable(0);
		//linea 5
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(80,40,80,60));
		$this->SetAligns(array("L","L","L","L"));
		//$this->SetBorder(1);
		$this->Row(array($this->arrp3[0][nombre],"NIT: XXXXX","",$this->titulos[3].""."".$dato["nroped"]));
		//$this->SetBorder(0);
		$this->SetFillTable(0);
        //linea 6
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(80,120,60));
		$this->SetAligns(array("L","L","L"));
		//$this->SetBorder(1);
		$this->Row(array($this->titulos[5].""."".$this->arrp3[0][telf],"",$this->titulos[4].""."".$dato["fecped"]));
		//$this->SetBorder(0);
		$this->SetFillTable(0);
        $this->ln();
		//linea 7
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(120,140));
		$this->SetAligns(array("L","L"));
		$this->SetBorder(1);
		$this->Row(array($this->titulos[6]."\n".$dato["codcli"],$this->titulos[7]."\n".$dato["nomcli"]));
		$this->SetBorder(0);
		$this->SetFillTable(0);
		//linea 9
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(260));
		$this->SetAligns(array("L"));
		$this->SetBorder(1);
		$this->Row(array($this->titulos[8].""."".$dato["dircli"]));
		$this->SetBorder(0);
		$this->SetFillTable(0);
		//linea 8
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(180,40,40));
		$this->SetAligns(array("L","C","C"));
		$this->SetBorder(1);
		$this->Row(array($this->titulos[9]."\n".$dato["obsped"],$this->titulos[10]."\n".$dato["telcli"],$this->titulos[11]."\n".$this->realizado));
		$this->SetBorder(0);
		$this->SetFillTable(0);
		$this->ln();
		//linea 9
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(42,50,42,42,42,42));
		$this->SetAligns(array("C","C","C","C","C","C"));
		$this->SetBorder(1);
		$this->Row(array($this->titulos[12],$this->titulos[13],$this->titulos[14],$this->titulos[15],$this->titulos[16],$this->titulos[17]));
		$this->SetBorder(0);
		$this->SetFillTable(0);

	   //VIENE EL DETALLE
        $this->arrp2 = $this->far->sqldetalle($dato["nroped"]);
        $acum = 0;
        foreach ($this->arrp2 as $dato2)
        {

	        $this->setFont("Arial","",8);
			$this->SetWidths(array(42,50,42,42,42,42));
			$this->SetAligns(array("L","L","L","R","R","R"));
			$this->SetBorder(1);
			$total = $dato2["cantot"] * $dato2["preart"];
			$this->Row(array($dato2["codart"], $dato2["desart"], $dato2["unimed"], $dato2["cantot"], H::FormatoMonto($dato2["preart"]), H::FormatoMonto($total)));
			$this->SetBorder(0);
			$this->SetFillTable(0);
			$acum = $acum + $dato2["totart"];

        }

        $this->ln();
        $this->setFont("Arial","B",8);
		$this->SetWidths(array(218,42));
		$this->SetAligns(array("C","L"));
		//$this->SetBorder(1);
		$this->Row(array($this->titulos[18],$this->titulos[19].""."".H::FormatoMonto($acum)));
		//$this->SetBorder(0);
		$this->SetFillTable(0);
		$this->ln();
		//Observaciones

		$this->setFont("Arial","B",8);
		$this->SetWidths(array(260));
		$this->SetAligns(array("L"));
		$this->SetBorder(1);
		$this->Row(array($this->titulos[20]."\n".""));//no se de donde salen las condiciones
		$this->SetBorder(0);
		$this->SetFillTable(0);
		//realizado por

		$this->setFont("Arial","B",8);
		$this->SetWidths(array(90,90,80));
		$this->SetAligns(array("L","L","L"));
		$this->SetBorder(1);
		$this->Row(array($this->titulos[21].""."".$this->realizado, $this->titulos[22].""."".$this->recibido,""));
		$this->SetBorder(0);
		$this->SetFillTable(0);

         if ($reg<=$registro)
		        {
		        	$this->addpage();
		       }

   }



    }
  }
?>
