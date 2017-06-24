<?
  require_once("../../lib/general/fpdf/fpdf.php");
  require_once("../../lib/bd/basedatosAdo.php");
  require_once("../../lib/general/cabecera.php");
    require_once("../../lib/general/Herramientas.class.php");
    require_once("../../lib/modelo/sqls/facturacion/Fartipmov.class.php");
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

      $this->far= new Fartipmov();
      $this->cab=new cabecera();
      $this->llenartitulosmaestro();
      $this->arrp=$this->far->sqlp($this->cod1,$this->cod2);


        }// fin del pdf

function llenartitulosmaestro()
    {
        $this->titulos[0]="TIPOS DE MOVIMIENTO ";
        $this->titulos[1]="CÓDIGO";
        $this->titulos[2]="DESCRIPCIÓN";
        $this->titulos[3]="NOMBRE ABREVIADO";
        $this->titulos[4]="CODIGO DE CUENTA";
        $this->titulos[5]="TIPO DE MOV. DEBITO/CREDITO";
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
	    /*$this->ln();
	    $this->setFont("Arial","B",12);
		$this->SetWidths(array(260));
		$this->SetAligns(array("C"));
		//$this->SetBorder(1);
		$this->Row(array($this->titulos[0]));
		//$this->SetBorder(0);
		$this->SetFillTable(0);*/

   //ENCABEZADO DEL CUADRO
   //$this->ln();
   //$x = $this->getX();
   $y = $this->getY();
   $this->setXY(30,$y);

   $this->SetFont("Arial","B",10);
   $this->SetWidths(array(36,36,36,36,36));
   $this->SetAligns(array("C","C","C","C","C"));
   $this->SetBorder(1);
   $this->RowM(array($this->titulos[1],$this->titulos[2],$this->titulos[3],$this->titulos[4],$this->titulos[5]));
   $this->SetBorder(0);
   $this->SetFillTable(0);
   //$this->ln();
   //VIENEN LOS DATOS
   $registro=count($this->arrp);
   $reg = 1;
   foreach($this->arrp as $dato){

       $reg++;
       $y = $this->getY();
	   $this->setXY(30,$y);

	   $this->SetFont("Arial","",8);
	   $this->SetWidths(array(36,36,36,36,36));
	   $this->SetAligns(array("C","C","C","C","C"));
	   $this->SetBorder(1);
	   $this->RowM(array($dato["id"],$dato["desmov"],$dato["nomabr"],$dato["codcta"],$dato["debcre"]));
	   $this->SetBorder(0);
	   $this->SetFillTable(0);
       $y = $this->GetY();
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
