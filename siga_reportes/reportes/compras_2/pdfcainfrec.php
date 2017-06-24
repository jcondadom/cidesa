<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/general/Herramientas.class.php");

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
	var $codreqdes;
	var $codreqhas;
	var $analizado;
	var $evaluado;
	var $autorizado;
	var $conf;

	function pdfreporte()
	{
              $this->fpdf("p","mm","Letter");

		$this->cab=new cabecera();
		$this->bd=new basedatosAdo();
		$this->titulos=array();
		$this->titulos2=array();
		$this->campos=array();
		$this->anchos=array();
		$this->anchos2=array();
		$this->codreqdes=H::GetPost("codreqdes");
		$this->ela=H::GetPost("ela");
		$this->revis=H::GetPost("rev");
		$this->apro=H::GetPost("apro");
              $this->obs=H::GetPost("obs");
              $this->proc=H::GetPost("proc");

	$this->sql="	select reqart, fecapr, desreq from casolart
				where reqart='".$this->codreqdes."'";

 			         
		//echo "<pre>{$this->sql}</pre>"; exit;

		// ------------------------ DATOS REPETITIVOS -----------------------------------
		$this->tb=$this->bd->select($this->sql);
		$this->arrp=$this->tb;
	
	}

	function Header()
	{
		
		//$this->line(10,35,10,190);
		$this->cab->poner_cabecera($this,$_POST["titulo"].'              ');//,$this->conf,"n","n");
              $this->SetX(155);
                      $this->setFont("Arial","B",9);
                     
			

                     $this->cell(40,-6, $this->tb->fields["reqart"].'/'.$this->proc);

       }
       
		

	function Cuerpo()
	 {

		$this->setFont("Arial","",9);
                    $this->SetX(10);

	       $this->multicell(185,5,'    La  Contraloría  Municipal  de  Chacao,  a  través  del área de Compras  de la  Dirección de Administración y Finanzas, procedió a una consulta de precios para '.$this->tb->fields["desreq"].'. Se procedió a solicitar el presupuesto a las empresas que se detallan a continuación: ');
		
               ///// BUSCAR PROVEEDORES
    
               $this->sql010 = "select a.refcot, a.refsol, a.codpro, b.nompro 
 					from cacotiza a, caprovee b
					where
					a.refsol='".$this->codreqdes."' and
					a.codpro=b.codpro";

                        		$tbg010=$this->bd->select($this->sql010);
                       		 //$ref=$tb->fields["reqart"];

               while(!$tbg010->EOF)
               { 
                     			
					    $this->ln(3);

                                                    
                        $this->SetX(55);
                        $this->multicell(120,4,$tbg010->fields["nompro"].' RIF: '.$tbg010->fields["codpro"]);                 

                       $tbg010->MoveNext();
               }

               
              $this->ln(3);

		 $this->multicell(195,5,' Una vez realizado el análisis de precios se seleccionó a la(s) empresa(s): ');



                    $this->sql020="select a.refcot, a.refsol, a.codpro, to_char(a.feccot,'dd/mm/yyyy')  as fecha, b.nompro, c.priori, sum(c.totdet)
					from
					cacotiza a, caprovee b, cadetcot c
					where
					a.refsol= '".$this->codreqdes."' and
					a.codpro=b.codpro AND
					a.refcot=c.refcot and
					c.priori='1'
				group by a.refcot, a.refsol, a.codpro, a.feccot, b.nompro, c.priori";

                             $tbg020=$this->bd->select($this->sql020);

 
                   while(!$tbg020->EOF)
               {
     
	 						//	$this->setX(-40);
								$fecha=$tbg020->fields["fecha"];
							//	$this->cell(10,-130,'Fecha: '.$fecha);
																	                                 
					    $this->ln(3);
                            
                        $this->SetX(20);
                        $this->cell(10,4,'');
                        $this->setFont("Arial","B",12);
		 			
			   //$total=$tbg020->fields["sum"]*12/100;		
			   $total_2=$total+$tbg020->fields["sum"];	
				
                        $this->multicell(150,4,$tbg020->fields["nompro"]. ' RIF: ' .$tbg020->fields["codpro"]. ' Por Bs. '.H::FormatoMonto($total_2),0,0,'C');
                 

                       $tbg020->MoveNext();
               }
			   
			   	$this->setFont("Arial","B",10);
			   	$this->setX(-40);
			   	$this->cell(10,-160,'Fecha: '.$fecha);
			   
		    $this->setFont("Arial","B",12);

			$this->ln(4);


                   $this->multicell(120,5,'Montos sin impuestos de ley',0,0,'C');

         

                  $this->setFont("Arial","",9);
                       $this->ln(4);
                 $this->multicell(185,5,'La modalidad de selección de contratista se realizó a través de Consulta de Precios, en virtud de lo establecido en los Artículos Nros. 73 y 74 de la ley de Contrataciones Públicas Vigente ');

                      $this->ln(4);

               $this->setFont("Arial","B",9);


		   $this->multicell(185,5,'Observaciones: '.$this->obs);
         
            $this->setFont("Arial","",9);

              


 
		  $this->SetY(210);
                $this->cell(125,5,'________________________________________',C,0,0);
                $this->ln(4);
                $this->SetX(85);

                $this->cell(110,5,$this->apro); 
                $this->ln(4);
                $this->cell(125,5,'DIRECTORA DE ADMINISTRACION Y FINANZAS',C,0,0);

                $this->ln(27);

                $this->cell(125,5,'________________________________________');
                $this->cell(125,5,'________________________________________');
                $this->ln(4);
                $this->SetX(32);

                 
                $this->cell(80,5,$this->revis); 
                $this->SetX(155);

                $this->cell(100,5,$this->ela);
                $this->ln(4);
  
                $this->cell(155,5,'          COORDINADOR DE FINANZAS');
                $this->cell(85,5,'COMPRAS');



	}
       
}
?>