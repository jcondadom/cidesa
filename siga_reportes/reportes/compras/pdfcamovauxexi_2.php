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
		var $codesde;
		var $codhasta;
		var $fecinv;
		var $conf;
		

		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","Letter");

	$this->arrp=array("no_vacio");
				$this->cab=new Cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->codesde=H::GetPost("codartdes");
			$this->codhasta=H::GetPost("codarthas");
			$this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");
			$this->maxcodalm=H::GetPost("maxcodalm");
			$this->mincodalm=H::GetPost("mincodalm");
                     $this->ubides=H::GetPost("ubides");
			$this->ubihas=H::GetPost("ubihas");
		
				$this->sql="SELECT 	 				
							B.CODART as codart,
							C.DESART as desart,
							c.unimed as unimed,
                                                 c.cosult as cosult, 
							sum(b.candph) as candph
						       FROM CADPHART A, caartdph B, CAREGART c, bnubibie d
						       WHERE
						(b.CODART) >= ('".$this->codesde."') AND
						(b.CODART) <= ('".$this->codhasta."') and
						b.codalm>= ('".$this->mincodalm."') and 
					       b.codalm<= ('".$this->maxcodalm."') and
						a.fecdph >= to_date('".$this->fecdes."','dd/mm/yyyy') and
						a.fecdph <= to_date('".$this->fechas."','dd/mm/yyyy') and
						a.codori >= ('".$this->ubides."') and
						a.codori <= ('".$this->ubihas."') and
						A.DPHART=B.dphart AND
						B.CODART=C.CODART and
						a.codori=d.codubi
						group by b.codart, c.desart, c.unimed, c.cosult
						order by codart";


							//print '<pre>';print $this->sql;
						$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				
				$this->anchos[0]=30;
				$this->anchos[1]=80;
				$this->anchos[2]=15;
				$this->anchos[3]=15;
				$this->anchos[4]=15;
				$this->anchos[5]=15;
				$this->anchos[6]=15;
				$this->anchos[7]=15;
				$this->anchos[8]=15;

		}

		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;

			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s"); 
			$this->setFont("Arial","B",9);
                     $this->SetTextColor(128,0,0); 
			$this->SetTextColor(0,0,0); 
			$totgen=0;
			$linea=0;
                     //-----------------------
                      $this->setFont("Arial","B",9);

                  
			$this->cell(10,5,'Desde: '.$this->fecdes. 'Hasta: '.$this->fechas);
                  
			if ($this->ubides==$this->ubihas){
			$this->ln(4);
			$this->sql1="SELECT desubi as desubi
					from bnubibie 
					where 
					codubi = ('".$this->ubides."')";
					//print '<pre>';print $this->sql1;
					$tb1=$this->bd->select($this->sql1);

			$this->cell(10,5,$tb1->fields["desubi"]);
			} else {

			$this->ln(4);
			$this->cell(10,5,'Todas las Direcciones');
			}
			$this->ln(4);
			$this->cell(10,5,'COD ARTICULO                       DESCRIPCION                                                                       UNIDAD DE MEDIDA        CANTIDAD DPH          ULTIMO COSTO      GASTO APROX');
	

                    //---------------------------------------   
                     
 				
		$this->ln(4);
			$this->Line(10,48,270,48);
			
			$this->ln(2);
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		       $tb=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$acum4=0;
			$acum5=0;
			$acum6=0;
			$acum7=0;
			while(!$tb->EOF)
			{
				$this->setFont("Arial","",8);
                  
                     $this->ln(3);
                            			     		
       		 $i++;
        		 $this->setFont("Arial","",9);
                      $this->setwidths(array(35,95,30,40,20,35));
                	 $this->setaligns(array("C","L","C","C","R","R"));
			 	
			 $totgen=$totgen+($tb->fields["candph"]*($tb->fields["cosult"]));

	
               	 $this->rowm(array($tb->fields["codart"],
				            $tb->fields["desart"],
					     $tb->fields["unimed"],
					     H::FormatoMonto($tb->fields["candph"],0,0),
					     H::FormatoMonto($tb->fields["cosult"],2,0),
					     H::FormatoMonto($tb->fields["candph"]*$tb->fields["cosult"],2,0)));
					
                			
        		 $tb->MoveNext();
          		}
			


			 $this->setFont("Arial","B",12);

			 $this->ln(6);
			 $this->SetX(209);

			$this->cell(10,5,'TOTAL GASTO: '.H::FormatoMonto($totgen),0,0);

			 $this->ln(8);

			$this->cell(10,5,'        NOTA: EL COSTO INDICADO ES EN BASE A LA ULTIMA COMPRA REALIZADA DE CADA UNO DE LOS ARTICULOS');

      		  	
		
		}
	}
