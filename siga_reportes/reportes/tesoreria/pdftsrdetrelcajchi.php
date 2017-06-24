<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/tesoreria/Tsrdetrelcajchi.class.php");

  class pdfreporte extends fpdf
  {
    var $bd;
    var $nro;

    function pdfreporte()
    {
      $this->fpdf("p","mm","Letter");
      $this->cab=new cabecera();
      $this->bd=new basedatosAdo();
      $this->titulos=array();

	    //Recibir las variables por el Post
	    $this->refsalmin=str_replace('*',' ',H::GetPost("refsalmin"));
	    $this->refsalmax=str_replace('*',' ',H::GetPost("refsalmax"));
	    $this->cedrifmin=str_replace('*',' ',H::GetPost("cedrifmin"));
	    $this->cedrifmax=str_replace('*',' ',H::GetPost("cedrifmax"));
	    $this->fecmin=str_replace('*',' ',H::GetPost("fecmin"));
	    $this->fecmax=str_replace('*',' ',H::GetPost("fecmax"));


      $this->tsrdetrelcajchi = new Tsrdetrelcajchi();
	  $this->arrp=$this->tsrdetrelcajchi->sqlp($this->refsalmin,$this->refsalmax,$this->cedrifmin,$this->cedrifmax,$this->fecmin,$this->fecmax);
      $this->arrp2=$this->tsrdetrelcajchi->montoape();
      $this->arrp3=$this->tsrdetrelcajchi->montotal();



    }

    function Header()
    {
     	        $this->cab->poner_cabecera($this,$_POST["titulo"],"p","s");
			    $this->ln(2);
			    $this->setFillcolor(255,255,255);
				$this->settextcolor(155,0,0);
				$this->setwidths(array(30,18,18,34,80,20));
				$this->setBorder(true);
				$this->setFont("Arial","B",9);
				$this->setaligns(array("C","C","C","C","C","C"));
				$this->rowm(array('Núm. Recibo','Fecha de Emisión','Cédula','Beneficiario','Concepto','Total'));
				$this->setaligns(array("C","C","L","L","L","R"));


			//H::FormatoMonto
    }
    function Footer()
		{
		}
    function Cuerpo()
    {
    	$ref="";
    	$this->total=0;
    	foreach($this->arrp as $dato)
    	{
    		if ($ref!=$dato["refsal"])
    		{
    		$this->ln();
    		$ref=$dato["refsal"];
    		$this->setwidths(array(30,18,18,34,80,20));
    		$this->setaligns(array("C","C","C","C","C","C"));
    		$this->setBorder(true);
			$this->setFont("Arial","",7);//H::PrintR($dato["status"]);exit;
			$this->rowm(array($dato["refsal"],$dato["fecsal"],$dato["cedrif"],$dato["nomben"],$dato["dessal"],H::FormatoMonto($dato["total"])));
			$this->total+=($dato["total"]);

				//CABECERA DEL DETALLE
				$this->ln(5);
    			$this->setwidths(array(30,90,1,1,40,30));
				$this->setBorder(false);
				$this->setFont("Arial","B",9);
				$this->setaligns(array("C","L","L","C"));
				$this->rowm(array('Codigo Art.','Descripción',"","",'Imputación Presupuestaria','Monto'));
				$this->setaligns(array("C","L","L","L","L","R"));
				$this->ln();

    		}

		   $this->setFont("Arial","",7);
           $this->rowm(array($dato["codart"],$dato["desart"],"","",$dato["codpre"],H::FormatoMonto($dato["monsal"])));


    	}
    		$this->ln();
    		$this->line(10,$this->gety(),205,$this->gety());
    		$this->ln();
    		foreach($this->arrp2 as $dato2)
    		foreach($this->arrp3 as $dato3)
    	{
    	$this->setFont("Arial","B",9);
    	$this->setBorder(false);
    	$this->setwidths(array(30,20,20,100,20));
    	$this->setaligns(array("C","C","L","R","R","R"));
    	$this->rowm(array("","","","TOTAL GENERAL GASTADO: ",H::FormatoMonto($dato3["montotal"])));
    	$this->rowm(array("","","","TOTAL GASTADO PERIODO:$this->fecmin al $this->fecmax: ",H::FormatoMonto($this->total)));
    	$this->rowm(array("","","","PORCENTAJE EJECUTADO EN PERIODO: ",H::FormatoMonto(($this->total*100)/$dato2["monapecajchi"]).' %'));
    	$this->rowm(array("","","","APERTURA DE CAJA DE CHICA: ",H::FormatoMonto($dato2["monapecajchi"])));
    	$this->rowm(array("","","","PORCENTAJE DE REPOSICION: ",H::FormatoMonto($dato2["porrepcajchi"]).' %'));
    	$this->rowm(array("","","","TOTAL ARQUEOS ACUMULADOS: ",H::FormatoMonto($dato2["monren"])));
    	$this->rowm(array("","","","SALDO DE CAJA CHICA: ",H::FormatoMonto(($dato2["monapecajchi"]+$dato2["monren"])-$dato3["montotal"]-($this->total))));

    	$this->setFont("Arial","B",6);
			    $this->ln(25);

				$this->Cell(200,4,'APROBACIÓN ',0,0,'C');
			    
				$this->ln(4);

    		$this->line(10,$this->gety(),210,$this->gety());
				$this->Cell(55,4,'CUSTODIO',0,0,'C');
				$this->Cell(70,4,'RESPONSABLE DE LOS FONDOS DE CAJA CHICA ',0,0,'C');
				$this->Cell(75,4,'DIRECTOR DE LA OFICINA DE PLANIFICACIÓN Y PRESUPUESTO(E) ',0,0,'C');

				$this->ln(5);

    		$this->line(10,$this->gety(),210,$this->gety());
				$this->Cell(55,4,'Nombres y Apellidos',0,0,'C');
				$this->Cell(70,4,'Nombres y Apellidos ',0,0,'C');
				$this->Cell(75,4,'Nombres y Apellidos',0,0,'C');

				$this->ln(5);

				$this->Cell(55,4,'LISBETH VARGAS',0,0,'C');
				$this->Cell(70,4,'ESTHER NORELIA PÉREZ',0,0,'C');
				$this->Cell(75,4,'DAMASO PAYARES',0,0,'C');

				$this->ln(5);

    		$this->line(10,$this->gety(),210,$this->gety());

				$this->ln(10);

				$this->Cell(55,4,'Fecha:                       Firma: ',0,0,'C');
				$this->Cell(70,4,'Fecha:                       Firma: ',0,0,'C');
				$this->Cell(75,4,'Fecha:                       Firma: ',0,0,'C');
				$this->Cell(36,4,$this->date,0,0,'C');
 
 				$this->ln(5);
   		$this->line(10,$this->gety(),210,$this->gety());

				$this->Cell(36,4,$this->responsable,0,0,'C');
				$this->Cell(36,4,$this->elaborado,0,0,'C');
				$this->Cell(36,4,$this->conformado,0,0,'C');

   	}


     }
  }
?>
