<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/nomina/Relacion_bod_disco.class_2.php");



	class pdfreporte extends fpdf
	{

	var $bd;

		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->cab = new Cabecera();
			$this->coddes=H::GetPost("nommin");
			$this->codhas=H::GetPost("nommax");
			$this->codespdes=H::GetPost("nomminesp");
			$this->codesphas=H::GetPost("nommaxesp");
			$this->banco=H::GetPost("banco");
			$this->fecha = H::GetPost("fecha");
			$this->fecha_2 = H::GetPost("fecha_2");
			$this->cuenta = H::GetPost("cuenta");
			$this->especial = H::GetPost("especial");
			$this->quincena = H::GetPost("quincena");
			$this->codfederal = H::GetPost("codfederal");
			$this->bd=new basedatosAdo();
			$this->fed = new Federal();
        	    $this->arrp = $this->fed->sqlp($this->coddes,$this->codhas,$this->codespdes,$this->codesphas,$this->banco,$this->especial);
		    $this->arrp2 = $this->fed->nomina($this->coddes,$this->codhas,$this->banco,$this->especial,$this->codespdes,$this->codesphas);
			$this->llenartitulosmaestro();
			$this->llenaranchos();
}

	function llenartitulosmaestro()
		{

				$this->titulos[0]="CÉDULA";
				$this->titulos[1]="NOMBRE DEL EMPLEADO";
				$this->titulos[2]="CUENTA";
				$this->titulos[3]="MONTO A DEPOSITAR";
		}

function llenaranchos()
	{
		$this->anchos=array();
		$this->anchos[0]=30;
		$this->anchos[1]=90;
		$this->anchos[2]=40;
		$this->anchos[3]=30;

	}

	function PutLink($URL,$txt)
		{
		    //Escribir un hiper-enlace
		    $this->SetTextColor(0,0,255);
		    $this->SetStyle('U',true);
		    $this->Write(5,$txt,$URL);
		    $this->SetStyle('U',false);
		    $this->SetTextColor(0);
		}

		function SetStyle($tag,$enable)
		{
		    //Modificar estilo y escoger la fuente correspondiente
		    $this->$tag+=($enable ? 1 : -1);
		    $style='';
		    foreach(array('B','I','U') as $s)
		        if($this->$s>0)
		            $style.=$s;
		    $this->SetFont('',$style);
		}


		function Header()
    {
         $this->setFont("Arial","B",9);
         $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
         $this->setFont("Arial","",9);
         $this->Ln(10);



    }
function Cuerpo()

		{

	    $reg=1;
		$cuenta="";
		$registro=count($this->arrp);
		$acumulado = 0;
		$lineatxt = "";

		$nombre_archivo="/tmp/BOD"."_".strftime('%d%m%Y',time()).".txt";
			if (!file_exists($nombre_archivo)){
				$cuentas = fopen($nombre_archivo,"w+");
				chmod ($nombre_archivo,0755);
			}
			else {
				unlink($nombre_archivo);
				$cuentas = fopen($nombre_archivo,"w+");
				chmod ($nombre_archivo,0755);
			}


        $this->setFont("Arial","B",12);
	    $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3]));
		$this->SetAligns(array("C","C","C","C"));
		$this->SetFillColor(230,230,230);
		$this->SetFillTable(1);
		$this->SetBorder(1);
		$this->Row(array($this->titulos[0],$this->titulos[1],$this->titulos[2],$this->titulos[3]));
		$this->SetBorder(0);
		$this->SetFillTable(0);
			$cuantos=0;
		//print $this->arrp2[0][nomina];exit;
		 $cuantos = $registro+1;
		 $monto1=number_format(trim($this->arrp2[0][nomina]),2,'.',',');
		 $monto1=str_replace(',','',$monto1);
		 $monto1=str_replace('.','',$monto1);

		$dia='';
		$mes='';
		$ano='';

		$fecha1 = $this->fecha;
		$dia = substr ($fecha1, 0, 2);
		$mes   = substr ($fecha1, 3, 2);
		$ano = substr ($fecha1, -4);
		$fecha2 = $ano.$mes.$dia; 


		$fecha_22 = $this->fecha_2;
		$dia = substr ($fecha_22, 0, 2);
		$mes   = substr ($fecha_22, 3, 2);
		$ano = substr ($fecha_22, -4);
		$fecha_21 = $ano.$mes.$dia; 








         $mes = substr ($fecha,2,2);
  

          $lineatxt = "01Nomina              G20000239540040200002395001".
			"0".str_pad(trim(strtoupper(trim(str_replace("/","",str_replace("-","",$cuantos))))),8,"0",STR_PAD_LEFT).
			   str_pad(trim(strtoupper(trim(str_replace("/","",str_replace("-","",$fecha_21))))),8," ",STR_PAD_LEFT).
			   str_pad(trim(strtoupper(trim(str_replace(",","",str_replace(".","",$cuantos-1))))),6,"0",STR_PAD_LEFT).
			   str_pad(trim(strtoupper(trim(str_replace(",","",str_replace(".","",$monto1))))),17,"0",STR_PAD_LEFT)."VEB".
			   str_pad(trim(strtoupper(trim(str_replace("-","",str_replace(" ",""," "))))),158," ",STR_PAD_RIGHT).chr(13);
			
		  fputs ($cuentas,$lineatxt.chr(10));

          $numemp=0;
		foreach($this->arrp as $dato)
         {
           if (($dato["monto"])> 0) {
         	$numemp++;
		 
		
                $this->setFont("Arial","",8);
			    $this->SetWidths(array($this->anchos[0],$this->anchos[1],$this->anchos[2],$this->anchos[3]));
				$this->SetAligns(array("L","L","L","R"));
				//$this->SetFillColor(230,230,230);
				//$this->SetFillTable(1);
				$this->SetBorder(1);
				$this->Row(array($dato["codemp"],$dato["nomemp"],$dato["cuenta_banco"],H::FormatoMonto($dato["monto"])));
				$this->SetBorder(0);
				$this->SetFillTable(0);
				//$acumulado = $acumulado + $dato["monto"];
				 $chrmonto = strval($dato["monto"]);
				 $monto=number_format(trim($dato["monto"]),2,'.',',');
				 $monto=str_replace(',','',$monto);
				 $monto=str_replace('.','',$monto);
			       
			                
                	$lineatext2 = "02".($dato["nacemp"]).
			 		str_pad(trim(strtoupper(trim(str_replace(".","",str_replace("-","",$dato["codemp"]))))),9,"0",STR_PAD_LEFT).
					str_pad(trim(strtoupper(trim(str_replace(","," ",str_replace("."," ",$dato["nomemp"]))))),60," ",STR_PAD_RIGHT).
					"0".str_pad(trim(strtoupper(trim(str_replace("/","",str_replace("-","",$dato["fecnom"]))))),8," ",STR_PAD_RIGHT).
					str_pad(($this->quincena),30," ",STR_PAD_RIGHT)."CTA".
					str_pad(trim(strtoupper(trim(str_replace("-","",str_replace("-","",$dato["cuenta_banco"]))))),20,"0",STR_PAD_LEFT).
					"0116".$fecha2.
					str_pad(trim(strtoupper(trim(str_replace(",","",str_replace(".","",$dato["monto"]))))),15,"0",STR_PAD_LEFT).
					"VEB000000000000000".
					str_pad(trim(strtoupper(trim(str_replace(".",".",str_replace("-","-",$dato["emaemp"]))))),40," ",STR_PAD_RIGHT).
					str_pad(trim(strtoupper(trim(str_replace("-","",str_replace(" ","",$dato["celemp"]))))),11,"0",STR_PAD_RIGHT).
					str_pad(trim(strtoupper(trim(str_replace("-","",str_replace(" ",""," "))))),20," ",STR_PAD_RIGHT).chr(13);

		 

               fputs ($cuentas,$lineatext2.chr(10));

                $acumulado = $acumulado + $dato["monto"];
				$y = $this->gety();
				if($y>180){
					$this->addPage();
				}

         }
        }


         $this->ln();
         $this->setFont("Arial","B",10);
		 $this->SetWidths(array(80,80));
		 $this->SetAligns(array("L","L","L","R"));
		  //$this->SetFillColor(230,230,230);
		 //$this->SetFillTable(1);
		// $this->SetBorder(1);
		 $this->Row(array("TOTAL DE EMPLEADOS: ".($numemp),"TOTAL A PAGAR: ".H::FormatoMonto($acumulado)));
		


		 //$this->SetBorder(0);
		 $this->SetFillTable(0);

         //$lineatxt3 = "670".str_pad($this->cuenta,20,'0',STR_PAD_LEFT)."0000".$mes.$this->quincena.$this->codfederal.str_pad($monto1,13,'0',STR_PAD_LEFT)."000000000000000000000000000000000";

         //fputs ($cuentas,$lineatxt3);

         //H::PrintR ($linea);exit;

        unset($this->creapecue);
				fclose ($cuentas);


 				//$dir = parse_url($_SERVER['PATH_TRANSLATED']);
 				$dir = parse_url($_SERVER['HTTP_REFERER']);

				$parte = explode("/",$dir['path']);
				for($i=0;$i<count($parte)-1;$i++)
				{
					$agregar.=$parte[$i]."/";
				}

//print $agregar." ----- ".$dir['path']." ----- ".$dir['host'] ;
				$dir = $dir['scheme'].'://'.$dir['host'].$agregar;

				//print $dir;
			    $this->PutLink($dir.'descargar.php?archivo='.$nombre_archivo,'Descargar Archivo');

		}
}