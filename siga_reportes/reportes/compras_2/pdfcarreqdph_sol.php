<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $fecha1;
		var $fecha2;
		var $art1;
		var $art2;
		var $req1;
		var $req2;
		var $status;
		var $auxd=0;
		var $car;
		var $salant=0;
		var $salact=0;

		function pdfreporte()
		{
			 $this->conf="p";

			$this->fpdf("l","mm","Letter");

	            $this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->req1=H::GetPost("req1");
			$this->req2=H::GetPost("req2");
			$this->art1=H::GetPost("art1");
			$this->art2=H::GetPost("art2");
			$this->fecha1=H::GetPost("fecha1");
			$this->fecha2=H::GetPost("fecha2");
			$this->status=strtolower(H::GetPost("status"));

			


	
		
			$this->sql="select a.dphart as dphart, a.fecdph as fecdph, a.reqart as reqart, a.desdph as desdph, a.codori as codori, b.desubi as desubi
						from cadphart a, bnubibie b
						where
						a.codori=b.codubi and
						(reqart) >= ('".$this->req1."') and 
						(reqart) <= ('".$this->req2."') and
						fecdph >= to_date('".$this->fecha1."','dd/mm/yyyy') and 
						fecdph <= to_date('".$this->fecha2."','dd/mm/yyyy') 
						order by reqart";
		




//print '<pre>'; print $this->sql;

			$this->llenartitulosmaestro();
			$this->cab=new cabecera();

		}

	function getAncho($pos)
	{
		$anchos=array();
		$anchos[0]=35;
		$anchos[1]=130;
		$anchos[2]=40;
		$anchos[3]=40;
		$anchos[4]=40;
		$anchos[5]=40;
		$anchos[6]=20;
		$anchos[7]=10;
		$anchos[8]=30;
		$anchos[9]=30;
		$anchos[10]=30;
		$anchos[11]=30;

		return $anchos[$pos];
	}
	function getAncho2($pos)
	{
		$anchos2=array();
		$anchos2[0]=30;
		$anchos2[1]=30;
		$anchos2[2]=30;
		$anchos2[3]=30;
		$anchos2[4]=30;
		$anchos2[5]=30;
		$anchos2[6]=30;
		$anchos2[7]=30;
		$anchos2[8]=30;
		$anchos2[9]=30;
		$anchos2[10]=30;

		return $anchos2[$pos];
	}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="CODIGO. CUENTA";
				$this->titulos[1]="DESCRIPCION";
				$this->titulos[2]="CARGABLE";
		}

		function Header()
		{
			$this->cab->poner_cabecera_F($this,H::GetPost("titulo")." DESDE: ".$this->fecha1." HASTA: ".$this->fecha2,"l","s");
			$this->setFont("Arial","B",9);
 
			$this->cell(180,5,"Nro. Despacho           Fecha Despacho     Nro. Solicitud                           Descripción Despacho                                             Unidad Solicitante ");

			



		}
		function Cuerpo()
		{

		       $tb=$this->bd->select($this->sql);
			
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,128);
			
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","B",8);
            $ref='';
	               $i=44;

			while(!$tb->EOF)
			{
				
			//Detalle

			$this->setwidths(array(30,30,30,70,100));
		    $this->setaligns(array("C","C","C","C","L"));

                  $this->SetY($i);
		    $this->setFont("Arial","",9);
		    $this->rowm(array($tb->fields["dphart"],$tb->fields["fecdph"],$tb->fields["reqart"],$tb->fields["desdph"],$tb->fields["desubi"]));
                     
			 

				$i=$i+15;
                     if ($i>180)
				{
				$this->AddPage();
				$i=44;

				}

			$this->setFont("Arial","",8);
			$ref=$tb->fields["codart"];
		
			
			$tb->MoveNext();
			}
		}
	}
?>
