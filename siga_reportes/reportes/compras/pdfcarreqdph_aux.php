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

			if ($this->status=='t')
			{
			 $this->sql="select a.reqart,a.fecreq,a.desreq,b.codart,d.dphart,e.desdph,e.fecdph,b.canreq,b.canrec,d.candph,
						b.montot,c.desart,c.exitot
						from careqart a, caartreq b, caregart c,caartdph d, cadphart e
						where
						(a.reqart) = (b.reqart) and (b.codart)  = (c.codart) and
						(b.codart)  = (d.codart) and (b.reqart)  = (e.reqart) and
						(d.dphart)  = (e.dphart) and
						(a.reqart) >= ('".$this->req1."') and (a.reqart) <= ('".$this->req2."') and
						(b.codart) >= ('".$this->art1."') and (b.codart) <= ('".$this->art2."') and
						a.fecreq >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecreq <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						b.canreq<>d.candph
						order by a.reqart";



			}
			else
			{
			$this->sql="select a.reqart,a.fecreq,a.desreq,b.codart,d.dphart,e.desdph,e.fecdph,b.canreq,b.canrec,d.candph,
						b.montot,c.desart,c.exitot
						from careqart a, caartreq b, caregart c,caartdph d, cadphart e
						where
						(a.reqart) = (b.reqart) and (b.codart)  = (c.codart) and
						(b.codart)  = (d.codart) and (b.reqart)  = (e.reqart) and
						(d.dphart)  = (e.dphart) and
						(a.reqart) >= ('".$this->req1."') and (a.reqart) <= ('".$this->req2."') and
						(b.codart) >= ('".$this->art1."') and (b.codart) <= ('".$this->art2."') and
						a.fecreq >= to_date('".$this->fecha1."','dd/mm/yyyy') and a.fecreq <= to_date('".$this->fecha2."','dd/mm/yyyy') and
						b.canreq<>d.candph and
						stareq='".$this->status."'
						order by a.reqart,b.codart";
			}

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

			$this->cell(180,5,"Fecha Req.    Nro. Req.     Fecha Desp.     Nro. Despacho      Codigo Art.                Descripción Despacho                          Cant Req.        Cant. Despachada          Diferencia");

			



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

			$this->setwidths(array(20,20,20,25,25,70,15,25,30,20));
		    $this->setaligns(array("C","C","C","C","C","L","R","R","R","R"));

                  $this->SetY($i);
		    $this->setFont("Arial","",9);
		    $this->rowm(array($tb->fields["fecreq"],$tb->fields["reqart"],$tb->fields["fecdph"],$tb->fields["dphart"],$tb->fields["codart"],$tb->fields["desart"],$tb->fields["canreq"],$tb->fields["candph"],abs($tb->fields["candph"]-$tb->fields["canreq"])));
                     


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
