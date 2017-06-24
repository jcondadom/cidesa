<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/facturacion/Farrecaud.class.php");
    //require_once("../../lib/general/mc_table.php");

  class pdfreporte extends fpdf
  {

//DECLARACION DE VARIABLES GLOBALES AQUI

    function pdfreporte()
    {
            $this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

	        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
      //CODIGO DE RECARGO
      $this->cod1=H::GetPost("coddes");
      $this->cod2=H::GetPost("codhas");
      //TIPO DE RECARGO
      $this->tipo=H::GetPost("recargo");

      $this->far= new Farecaud();
      $this->llenartitulosmaestro();
      $this->arrp=$this->far->sqlp($this->cod1,$this->cod2);


        }// fin del pdf

function llenartitulosmaestro()
    {
        //$this->titulos[0]="CATÁLOGO DE RECAUDOS ";
        $this->titulos[1]="CÓDIGO RECAUDO";
        $this->titulos[2]="DESCRIPCIÓN RECAUDO";
        $this->titulos[3]="LIMITANTE";


  }

    function Header()
    {
         $this->setFont("Arial","B",9);
         $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
         $this->setFont("Arial","",9);
	     $this->Ln();
    }

    function Cuerpo()
    {
   $this->SetFont("Arial","B",9);
   $this->SetWidths(array(40,124.8,25));
   $this->SetAligns(array("C","C","C"));
   $this->SetBorder(1);
   $this->RowM(array($this->titulos[1],$this->titulos[2],$this->titulos[3]));
   $this->SetBorder(0);
   $this->SetFillTable(0);
   //$this->ln();
   //VIENEN LOS DATOS
   $registro=count($this->arrp);
   $reg = 1;
   foreach($this->arrp as $dato){

       $reg++;
       $y = $this->getY();
	   $this->setXY(10,$y);

	   $this->SetFont("Arial","B",8);
	   $this->SetWidths(array(40,125,25));
       $this->SetAligns(array("L","L","C"));
	   $this->SetBorder(0);
	   //$mensual = $dato["monanoact"]/12;
	  // print $mensual;exit;
	   $this->RowM(array($dato["codrec"],$dato["desrec"],$dato["limrec"]));
	   $this->SetBorder(0);
	   $this->SetFillTable(0);
       //$acummes = $acummes + $mensual;
       $y = $this->GetY();
       //print $y;
       if ($y >= 200)
       {

       	 $this->addpage();

       }
   }
   /*if ($reg<=$registro)
		        {
		        	//$this->ln(30);
		        	$this->addpage();
		       }*/



    }
  }
?>
