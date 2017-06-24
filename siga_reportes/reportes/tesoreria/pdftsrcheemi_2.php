<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/general/cabecera.php");
  require_once("../../lib/modelo/sqls/tesoreria/Tsrcheemi_2.class.php");

  class pdfreporte extends fpdf
  {
    var $bd;
    var $nro;
    var $mes1 = array(
						 "01"=>"ENERO",
						 "02"=>"FEBRERO",
						 "03"=>"MARZO",
						 "04"=>"ABRIL",
						 "05"=>"MAYO",
						 "06"=>"JUNIO",
						 "07"=>"JULIO",
						 "08"=>"AGOSTO",
						 "09"=>"SEPTIEMBRE",
						 "10"=>"OCTUBRE",
						 "11"=>"NOVIEMBRE",
						 "12"=>"DICIEMBRE"
						 );

    function pdfreporte()
    {
      $this->fpdf("p","mm","Letter");
      $this->bd=new basedatosAdo();
      $this->titulos=array();
      $this->cab=new cabecera();

	    //Recibir las variables por el Post
	    $this->che1=str_replace('*',' ',H::GetPost("che1"));
	    $this->che2=str_replace('*',' ',H::GetPost("che2"));
	    $this->cue1=str_replace('*',' ',H::GetPost("cue1"));
	    $this->cue2=str_replace('*',' ',H::GetPost("cue2"));
	    $this->fecmin=str_replace('*',' ',H::GetPost("fecmin"));
	    $this->fecmax=str_replace('*',' ',H::GetPost("fecmax"));
	    $this->status=str_replace('*',' ',H::GetPost("status"));
	    $this->prepor = str_replace('*',' ',H::GetPost("prepor"));
	    $this->bendes=H::GetPost("bendes");
		$this->benhas=H::GetPost("benhas");
		$this->revpor=H::GetPost("revpor");

      $this->tsrcheemi = new Tsrcheemi();
	  $this->arrp=$this->tsrcheemi->sqlp($this->che1,$this->che2,$this->cue1,$this->cue2,$this->status,$this->bendes,$this->benhas,$this->fecmin,$this->fecmax);
 	  $this->arrp3=$this->tsrcheemi->sqlpx($this->che1,$this->che2);

    }

    function Header()
    {
     		$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s","");
		    $this->SetXY(27,$this->getY()+4);
		  //  $this->Cell(120,5,'Dirección de Administración',0,0,'l');
		    $this->SetXY(27,$this->getY()+4);
		 //   $this->Cell(120,5,'División de Compras y Servicios Generales',0,0,'l');
			//$this->line(10, $this->getY()+10, 210, $this->getY()+10);
			//$this->setFont("Arial","",9);
			$this->setFont("Arial","B",11);
		//	$this->ln(12);
			$this->cell(100,5,"Del: ".$this->fecmin." Al: ".$this->fecmax);
			//$this->MultiCell(0,5,"Caracas, ".date("d")." de ".$this->mes1[date("m")]." de ".date("Y"),0,'R');
			$this->ln(10);

			//H::FormatoMonto
    }
    function Footer()
		{
		}
    function Cuerpo()
    {
    	$ref = "";
    	$primeravez = true;
    	$this->i=0;
    	foreach($this->arrp as $dato)
    	{
    		if ($dato["numcue"] != $ref) //Imprimimos encabezado
				{
				$ref = $dato["numcue"];
				if (!$primeravez) {
	             	$this->setFont("Arial","",11);
					$this->setFillcolor(155,155,155);
					$nro=count($this->arrp);
					$this->cell(45,6,"Numero Total de Cheques Emitidos: ".$this->i);
					$this->ln();
					$this->cell(45,6,"Monto Total de Cheques Emitidos: ".H::FormatoMonto($this->total));
					$this->total=0;
					$this->i=0;
					$this->AddPage();
				}
				$this->setFont("Arial","",9);
				$primeravez = false;
				$this->setFont("Arial","",11);
				//T=>Todos, E=>Entregados, A=>Anulados, C=>En Caja]
				if ($this->status=='T'){
					$this->status2='TODOS';
				}
					if ($this->status=='E'){
					$this->status2='ENTREGADOS';
				}
					if ($this->status=='A'){
					$this->status2='ANULADOS';
				}
					if ($this->status=='C'){
					$this->status2='EN CAJA';
				}
				$this->MultiCell(0,5,'REPORTE DE CHEQUES EMITIDOS CON REFERENCIA - '.$this->status2,0,'C');
				$this->MultiCell(0,5,$dato["nomcue"],0,'C');
				$this->MultiCell(0,5,'CUENTA NRO. '.$dato["numcue"],0,'C');
				$this->ln(10);
				$this->setaligns(array("C","C","C","C","C","C"));

	                     $this->setFillcolor(255,255,255);
				$this->settextcolor(155,0,0);
				$this->setwidths(array(20,20,70,20,30,25));
				$this->setBorder(true);
				$this->rowm(array('Núm. Cheque','Fecha de Cheque','Nombre del Beneficiario','Monto del Cheque','Estatus', 'Referencia Pagado'));
			    $this->ln();
				$this->setaligns(array("C","C","C","C","C","C"));
				$this->setFillcolor(0,0,0);
			    $this->settextcolor(0,0,0);

            	}

			//$this->rowm(array_slice($dato,0,9));
			$y2=$this->GetY();
			//$this->setwidths(array(30,30,30,50,30,20));
			//$this->setaligns(array("C","C","C","L","R","C"));
			$this->setFont("Arial","",7);//H::PrintR($dato["status"]);exit;

			$this->rowm(array($dato["numche"],$dato["fecemi1"],$dato["nomben"],H::FormatoMonto($dato["monche"]),$dato["status"],$dato["refpag"]));
			//if ($dato["status"]=='ENTREGADO' or $this->status=='A'){
					$this->total+=($dato["monche"]);
			//}



			$y3=$y2-15;
			$yy=67;
            $prime=true;
			//foreach ($this->arrp3 as $op)
	        {

				if($dato["numche"]==$op["numche"])
				{




	            $yy=$this->GetY();
				$this->SetXY(28,$y3+15);
				$this->cell(32,5,'');
				if (!$prime){
				//$this->cell(20,4,trim($op["numord"]),1,0,'C');
				}else
				//$this->cell(20,4,trim($op["numord"]),0,0,'C');
				 $prime=false;
               if ($this->GetY()>235){
				$this->AddPage();
				$this->setFont("Arial","",9);
				$this->MultiCell(120,5,'REPORTE DE CHEQUES EMITIDOS',0,0,'C');
				$this->MultiCell(120,5,$dato["nomcue"],0,0,'C');
				$this->MultiCell(120,5,'CUENTA NRO. '.$dato["numcue"],0,0,'C');
				$this->ln(10);
	            $this->setFillcolor(255,255,255);
				$this->settextcolor(155,0,0);
		    	$this->setwidths(array(20,20,70,20,30,25));
				$this->setBorder(true);
				$this->setFont("Arial","",11);

				$this->rowm(array('Núm. Cheque','Fecha de Cheque','Nombre del Beneficiario','Monto del Cheque','Estatus', 'Referencia Pagado'));
			    $this->ln();
				$this->setaligns(array("C","C","C","C","C","C"));
				$this->setFillcolor(0,0,0);
			    $this->settextcolor(0,0,0);
			    $y2=$this->GetY();
			    $this->setFont("Arial","",7);
			    $this->rowm(array($dato["numche"],$dato["fecemi1"],$dato["nomben"],H::FormatoMonto($dato["monche"]),$dato["status"],$dato["refpag"]));

									}
			/*	if ($dato["numche"]=='') { //como hago la condicion si el numero de cheque no se encuentra

				$yy=$this->GetY();
				$this->SetXY(20,$y3+15);
				$this->cell(42,5,'');
				$this->cell(30,5,'Cheque No. '.$dato["numche"],0,0,'R');
				}*/

				$b++;
				$vv++;
				$y3=$this->GetY()-10;
				$this->ln();
				}



	        }
				

				if ($this->GetY()>235){
				$this->AddPage();
				$this->setFont("Arial","",9);
				$this->MultiCell(120,5,'REPORTE DE CHEQUES EMITIDOS',0,0,'C');
				$this->MultiCell(120,5,$dato["nomcue"],0,0,'C');
				$this->MultiCell(120,5,'CUENTA NRO. '.$dato["numcue"],0,0,'C');
				$this->ln(10);
	                   $this->setFillcolor(255,255,255);
				$this->settextcolor(155,0,0);
				$this->setwidths(array(20,20,70,20,30,25));
				$this->setBorder(true);
				$this->setFont("Arial","",11);
				$this->rowm(array('Núm. Cheque','Fecha de Cheque','Nombre del Beneficiario','Monto del Cheque','Estatus', 'Referencia Pagado'));
			    $this->ln();
				$this->setaligns(array("C","C","C","C","C","C"));
				$this->setFillcolor(0,0,0);
			    $this->settextcolor(0,0,0);

									}
//if ($dato["status"]=='ENTREGADO' or $this->status=='A'){
	$this->i++;
//}

			$this->ln();

    	}

    		$this->setFont("Arial","B",11);
			$this->setFillcolor(155,155,155);
			$nro=count($this->arrp);
			$this->cell(45,6,"Numero Total de Cheques Emitidos: ".$this->i);
			$this->ln();
			$this->cell(45,6,"Monto Total de Cheques Emitidos: ".H::FormatoMonto($this->total));

     }
  }
?>
