<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/facturacion/Faforsol.class.php");
    //require_once("../../lib/general/mc_table.php");

  class pdfreporte extends fpdf
  {

//DECLARACION DE VARIABLES GLOBALES AQUI

    function pdfreporte()
    {
      $this->fpdf("l","mm","Letter");
      //CODIGO DE RECARGO
      $this->cod1=H::GetPost("coddes");
      $this->cod2=H::GetPost("codhas");

      $this->far= new Farfarsol();
      $this->cab=new cabecera();
      $this->llenartitulosmaestro();
      $this->arrp=$this->far->sqlp($this->cod1,$this->cod2);


        }// fin del pdf

function llenartitulosmaestro()
    {
        $this->titulos[0]="FORMAS DE SOLICITUD ";
        $this->titulos[1]="CÓDIGO SOLICITUD";
        $this->titulos[2]="DESCRIPCIÓN SOLICITUD";
  }




    function Header()
    {
     $this->setFont("Arial","B",9);
      $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
      $this->setFont("Arial","",9);
	  //$this->Ln();


    }

    function Cuerpo()
    {
        //$this->ln(10);


	//TITULO DEL REPORTE
	    //$this->ln();
	    /*$this->setFont("Arial","B",12);
		$this->SetWidths(array(260));
		$this->SetAligns(array("C"));
		//$this->SetBorder(1);
		$this->Row(array($this->titulos[0]));
		//$this->SetBorder(0);
		$this->SetFillTable(0);*/

   //ENCABEZADO DEL CUADRO
//   $this->ln();
   //$x = $this->getX();
   $y = $this->getY();
   $this->setXY(80,$y);

   $this->SetFont("Arial","B",10);
   $this->SetWidths(array(60,60));
   $this->SetAligns(array("C","C"));
   $this->SetBorder(1);
   $this->RowM(array($this->titulos[1],$this->titulos[2]));
   $this->SetBorder(0);
   $this->SetFillTable(0);
   //$this->ln();
   //VIENEN LOS DATOS
   $registro=count($this->arrp);
   $reg = 1;
   foreach($this->arrp as $dato){

       $reg++;
       $y = $this->getY();
	   $this->setXY(80,$y);

	   $this->SetFont("Arial","",8);
	   $this->SetWidths(array(60,60));
       $this->SetAligns(array("C","C"));
	   $this->SetBorder(1);
	   //$mensual = $dato["monanoact"]/12;
	  // print $mensual;exit;
	   $this->RowM(array($dato["id"],$dato["nombre"]));
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
