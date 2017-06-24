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
				$this->cab=new cabecera();
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
		
				$this->sql="SELECT 	A.DPHART as dphart, 
							to_char(A.FECDPH,'dd/mm/yyyy') as fecdph, 
							A.CODORI as codori,
							
							B.CODART as codart, 
							C.DESART as desart,
							c.unimed as unimed,
							d.codubi as codubi, 
							d.desubi as desubi,
							b.candph as candph
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
						ORDER BY A.codori, a.dphart, a.fecdph";


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

                     //-----------------------
                      $this->setFont("Arial","B",9);

                     //$this->SetXY(229,13);
			$this->cell(10,5,'NUMERO DPH       FECHA               COD ARTICULO                                 DESCRIPCION                                         CANT           MEDIDA                UNIDAD ADMINISTRATIVA');
                    //---------------------------------------   
                      $this->SetXY(24,40);

			$this->ln(3);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);

 				
		$this->ln(4);
			$this->Line(10,45,270,45);
			//$this->MultiCell(2000,10,$this->sql);
			$this->ln(4);
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

         

                 
        

                     $this->ln(5);
                            		
			

     		
       		 $i++;
        		 $this->setFont("Arial","",9);
                      $this->setwidths(array(25,25,30,80,20,20,60));
                	 $this->setaligns(array("C","L","C","C","C","C","C"));
			 

               	 $this->rowm(array($tb->fields["dphart"],
					     $tb->fields["fecdph"],
                                        $tb->fields["codart"],
				            $tb->fields["desart"],
					     H::FormatoMonto($tb->fields["candph"],0,0),
					     $tb->fields["unimed"],
			                   $tb->fields["desubi"]
						
));
                			
        		 $tb->MoveNext();
          		
      		  	}
		
			//generar el listado en excel
	$dir = parse_url($_SERVER['HTTP_REFERER']);
	$dirpath=$dir['path'];
				
			if(!(strrpos($dir['path'],".php")))
				
			$dirpath=$dir['path'].".php";
				
			$dir = eregi_replace(".php","_hc.php",$dir['scheme'].'://'.$dir['host'].$dirpath);
				
			

			$this->PutLink(trim($dir).'?codesde='.$this->codesde.'&codhasta='.$this->codhasta.'&fecdes='.$this->fecdes.'&fechas='.$this->fechas.'&maxcodalm='.$this->maxcodalm.'&mincodalm='.$this->mincodalm.'&ubides='.$this->ubides.'&ubihas='.$this->ubihas.'&schema='.$_SESSION["schema"],'Listado en Excel');


			
			
		
			
		


		



		}
	}
