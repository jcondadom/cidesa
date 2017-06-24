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
			$this->fecinv=H::GetPost("fecinv");
			$this->maxcodalm=H::GetPost("maxcodalm");
			$this->mincodalm=H::GetPost("mincodalm");

			$this->sql="SELECT  A.CODART as codart,
                			     (C.DESART) as desart,
					      A.CODALM as codalm,
					      C.UNIMED as unimed,
                			      a.exiact as exis
				     FROM  caartalm A, CAREGART C
				     where
					(A.CODART)=(C.CODART) AND
					(a.CODART) >= ('".$this->codesde."') AND
					(a.CODART) <= ('".$this->codhasta."') and
					a.codalm>= ('".$this->mincodalm."') and 
					a.codalm<= ('".$this->maxcodalm."')
					GROUP BY A.CODALM,a.CODART,C.DESART,C.UNIMED , a.exiact order by A.codalm, C.DESART  ";







							//print '<pre>';print $this->sql;
						$this->llenartitulosmaestro();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[0]="Código Artículo";
				$this->titulos[1]="Descripción Artículo";
				$this->titulos[2]="Inventario Inicial";
				$this->titulos[3]="Entradas";
				$this->titulos[4]="Devoluciones";
				$this->titulos[5]="Despachos";
				$this->titulos[6]="Existencia";
				$this->titulos[7]="Costo";
				//$this->titulos[8]="            Valor Total";
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
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","s"); 
			$this->setFont("Arial","B",9);
                     $this->SetTextColor(128,0,0); 

			$this->cell(40,4,"Almacen: ".$this->mincodalm);
                     $this->cell(40,4,"Fecha Inventario: ".$this->fecinv);
			$this->SetTextColor(0,0,0); 

                   
                     //-----------------------
                      $this->setFont("Arial","B",9);

                     //$this->SetXY(229,13);
			//$this->cell(10,5,'Fecha:  21/01/2010');
                    //---------------------------------------  
                      $this->SetXY(24,40);

			/*$this->cell($this->anchos[0],5,'  ');
			$this->cell($this->anchos[1],5,'  ');
			$this->setFont("Arial","BU",9);
			$this->cell($this->anchos[2],5,'                       ');
			$this->cell($this->anchos[3],5,'    LOGICO(A)          ');
			$this->cell($this->anchos[4],5,'                               ');
			$this->cell($this->anchos[5],5,'        FISICO(B)         ');
			$this->cell($this->anchos[6],5,'                               ');
			$this->cell($this->anchos[7],5,'  DIFERENCIA(A - B)        ');
			$this->cell($this->anchos[7],5,'                               ');*/
			$this->ln(3);
			$this->setFont("Arial","B",9);
			$ncampos=count($this->titulos);


           //  $this->ln();
			 //$this->setwidths(array(30,50,28,23,20,25,20,20,20,20));
			 //$this->setaligns(array("L","L","R","R","R","R","R","R","R"));
			 //$this->rowm(array("Código Artículo","Descripción Artículo","Inventario Inicial","Entradas O/C","Entr. por Traspaso","Devoluciones",
						//"Despachos","Sal. por Traspasos","Existencia","      Costo"));


			$this->ln(-3);
                     $this->cell(25,1,'Código',0,0,'C');
                     $this->cell(60,1,'Descripción',0,0,'C');
                     $this->cell(20,1,'Inventario',0,0,'C');
                     $this->cell(60,1,'               E N T R A D A S   A L   A L M A C E N',0,0,'R');
                     $this->cell(60,1,'                  S A L I D A S   D E L   A L M A C E N',0,0,'R');
                     $this->cell(22,1,'                                          Ultimo',0,0,'C');
  


                     $this->ln(1);
			$this->cell(25,6,'Artículo',0,0,'C');
                     $this->cell(60,6,'Artículo',0,0,'C');
                     $this->cell(20,6,'Fisico',0,0,'C');
                     $this->cell(25,6,'Recepcion O/C',0,0,'C');
                     $this->cell(20,6,'Traslados',0,0,'C');
                     $this->cell(20,6,'Entradas ',0,0,'C');
 			$this->cell(20,6,'Despachos ',0,0,'C');
                     $this->cell(20,6,'Traslados',0,0,'C');
                     $this->cell(18,6,'Salidas ',0,0,'C');
                     $this->cell(18,6,'Existencia',0,0,'C');
                     $this->cell(18,6,'Costo',0,0,'C');
                     $this->ln(-3);
			
		
                     
/*
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],10,$this->titulos[$i]);
			}*/
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

             /// buscar inventario fisico por articulo //////////////////
                    
                    $this->sql001="select fecinv, codalm, codart, exiact
                                    from cainvfis
                                   where 
                                   CODART = '".$tb->fields["codart"]."' AND
					FECINV = to_date('".$this->fecinv."','dd/mm/yyyy')  and
					codalm = '".$tb->fields["codalm"]."'";
                                   $tb001=$this->bd->select($this->sql001);


				
			
             	//// buscar recepcion de ordenes de compras  ////////           
                   
                     
                        $this->sql010="select coalesce(sum((CASE WHEN a.fecrcp >= to_date('".$this->fecinv."','dd/mm/yyyy')
                            	  THEN b.canrec ELSE 0 END))) as recep
         				  from carcpart a, caartrcp B
      					  where
       					a.rcpart = b.rcpart and
       					b.codart = '".$tb->fields["codart"]."' and
        					b.codalm = '".$tb->fields["codalm"]."'"; 
      					   $tb010=$this->bd->select($this->sql010); 
                       
 			    

        

            	//////// buscar   ENTRADAS POR TRASLADOS //////////////////

                       $this->sql110="select coalesce(sum((CASE WHEN a.fectra >= to_date('".$this->fecinv."','dd/mm/yyyy')
                            	    THEN b.canart ELSE 0 END))) as entdes
         				    from catraalm a, cadettra B
      					    where
       					a.codtra = b.codtra and
       					A.almdes = '".$tb->fields["codalm"]."' and
						B.codart = '".$tb->fields["codart"]."'";


                                      $tb110=$this->bd->select($this->sql110); 

                                     

		//////// buscar  entradas del almacen ENTRADAS POR otros conceptos /////////////////

                       $this->sql120="select coalesce(sum((CASE WHEN a.fecrcp >= to_date('".$this->fecinv."','dd/mm/yyyy')
                  	 			 THEN b.canrec ELSE 0 END))) as otentr
         				 	 from caentalm a, cadetent B
      					  		where
       					a.rcpart = b.rcpart and
       				       b.codart = '".$tb->fields["codart"]."' and
        				   	b.codalm = '".$tb->fields["codalm"]."'"; 
      					   $tb120=$this->bd->select($this->sql120); 

                                   
                     
              //////// busca despachos del almacen
      
                     
			 $this->sql200="select coalesce(sum((CASE WHEN a.fecdph >= to_date('".$this->fecinv."','dd/mm/yyyy')
                            	  THEN b.candph ELSE 0 END))) as despa
         				  from cadphart a, caartdph B
      					  where
       					a.dphart = b.dphart and
       					b.codart = '".$tb->fields["codart"]."' and
        					b.codalm = '".$tb->fields["codalm"]."'";
                                     $tb200=$this->bd->select($this->sql200); 






 		//////// buscar  entradas del almacen salidas POR TRASLADOS

                       $this->sql210="select coalesce(sum((CASE WHEN a.fectra >= to_date('".$this->fecinv."','dd/mm/yyyy')
                            	    THEN b.canart ELSE 0 END))) as saldes
         				    from catraalm a, cadettra B
      					    where
       					a.codtra = b.codtra and
       					A.almori = '".$tb->fields["codalm"]."' and
						B.codart = '".$tb->fields["codart"]."'";
                                      $tb210=$this->bd->select($this->sql210); 

//////// buscar  entradas del almacen SALIDAS POR otros conceptos

                       $this->sql220="select coalesce(sum((CASE WHEN a.fecsal >= to_date('".$this->fecinv."','dd/mm/yyyy')
                  	 			 THEN b.cantot ELSE 0 END))) as otentr
         				 	 from casalalm a, cadetsal B
      					  	 where
       					 a.codsal = b.codsal and
       				        b.codart = '".$tb->fields["codart"]."' and
        				   	 b.codalm = '".$tb->fields["codalm"]."'"; 
      					   $tb220=$this->bd->select($this->sql220); 

//////// bucar ULTIMO COSTO ///////

                  $this->sql230="select cosult from caregart
 					where
				       codart = '".$tb->fields["codart"]."'";
                         $tb230=$this->bd->select($this->sql230);
             
        

                     $this->ln(5);
                            		
			

     		
       		 $i++;
        		 $this->setFont("Arial","",9);
                      $this->setwidths(array(25,60,20,20,20,20,20,20,20,20,20));
                	 $this->setaligns(array("C","L","C","C","R","R","R","R","R","R","C"));
			 

               	 $this->rowm(array($tb->fields["codart"],
					     $tb->fields["desart"],
                                        H::FormatoMonto($tb001->fields["exiact"],0,0),
					     H::FormatoMonto($tb010->fields["recep"],0,0),	
                                        H::FormatoMonto($tb110->fields["entdes"],0,0),
					     H::FormatoMonto($tb120->fields["otentr"],0,0),
 					     H::FormatoMonto($tb200->fields["despa"],0,0),
					     H::FormatoMonto($tb210->fields["saldes"],0,0),
					     H::FormatoMonto($tb220->fields["otentr"],0,0),
					     H::FormatoMonto(($tb001->fields["exiact"]+$tb010->fields["recep"]+$tb110->fields["entdes"]+$tb120->fields["otentr"]
                                                         - $tb200->fields["despa"]-$tb210->fields["saldes"]-$tb220->fields["otentr"]),0,0),

					     $tb230->fields["cosult"]));
                			
        		 $tb->MoveNext();
          		
      		  

			}
				
		}
	}
?>