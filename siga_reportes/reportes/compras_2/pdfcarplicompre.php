<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/general/Herramientas.class.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");
	require_once("../../lib/modelo/sqls/compras/Carplicompre_new.class.php");

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
		var $analizado;
		var $evaluado;
		var $autorizado;
		var $conf;
		var $a;
		var $b;


		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
	              $this->arrp=array("no_vacio");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
                     $this->codreqdes=H::GetPost("codreqdes");
			$this->rifpro=H::GetPost("rifpro");
			$this->proc=H::GetPost("proc");
			$this->conent=H::GetPost("conent");
			$this->valofe=H::GetPost("valofe");
			$this->fecacl=H::GetPost("fecacl");
			$this->fecacl2=H::GetPost("fecacl2");
	  	       $this->carplicompre= new Carplicompre();
		       $this->arrp2=$this->carplicompre->sqlp($this->codreqdes,$this->rifpro);

		}
		function Header()
		{

			    $arriba=$this->GetY();
			    $this->SetDrawColor(255,255,255);
			    $this->cab->poner_cabecera($this,"","","s");
			    $this->SetDrawColor(0,0,0);
                $this->SetY($arriba+5);
                	//Borde superior izquierdo
                $this->line(8,6,207,6);
				$this->line(8,6,8,260);
					//Borde Inferior y Derecho
			$this->line(207,6,207,260);
			$this->line(8,260,207,260);
				$this->ln(3);
				//Paginas
				$this->setx(45);
					$this->setFont("Arial","B",9);
				$this->Cell(170,5,'G20000239-5',0,0,'L',0);
				$this->ln(3);
					$this->setFont("Arial","B",10);
				$this->cell(205,10,'SOLICITUD DE COTIZACION ',0,0,'C');


			///////////////////////////////////////////
			//cuadro 1
			//$this->line(15,$this->getY(),200,$this->getY());
		       //$this->line(15,$this->getY(),15,65);
			//$this->line(200,$this->getY(),200,65);
			//$this->setXY(15,$this->getY());
		       //$y=$this->getY();
			$this->setFont("Arial","",8);
			//$this->setXY(15,$this->getY()-2);
			$this->ln(15);
			$this->cell(150,4,'       La  Contraloria  Municipal de Chacao,  de  conformidad con lo establecido en la  ley de Contrataciones  Públicas en su reforma  parcial publicada en '); 
			$this->ln();
			$this->cell(150,4,'Gaceta Oficial Nro. 39503 de fecha 06 de Septiembre de 2010 articulos  73 y 74 hace  del conocimiento de las empresas que han sido preseleccionadas');
			$this->ln();
			$this->cell(150,4,'para participar en el PROCESO DE CONSULTA DE PRECIOS, seńalado a continuacion:');

			$this->setFont("Arial","B",8);
			$this->ln();
			$this->cell(140,4,'Procedimiento Nro. '.$this->proc);
			$this->cell(40,4,'Solicitud Nro: '.$this->codreqdes);
			$this->ln();
			$this->setFont("Arial","",8);
			$this->multicell(190,4,'Descripcion: '.$this->arrp2[0]["desreq"]);
			
			//cuadro 2
			$this->line(15,65,200,65);
			$this->setXY(15,66);
			$this->setFont("Arial","B",8);
			$this->cell(20,5,'   Cantidad');
			$this->cell(60,5,'Unidad de Medida');
			$this->cell(100,5,'                Denominacion');
        	       $this->line(15,70,200,70);
			$this->line(35,65,35,177);
			$this->line(62,65,62,177);
			
			$this->line(15,65,15,177);
			$this->line(200,65,200,177);
			$this->line(15,177,200,177);
			//cuadro 3
			$this->line(108,240,108,260);
			$this->line(8,240,207,240);
			$this->line(8,244,207,244);

			$this->setXY(15,180);
			$this->setFont("Arial","",8);
			$this->multicell(185,3,'OBSERVACIONES: ' .$this->arrp2[0]["obsreq"]);
			$this->setXY(15,198);
			$this->cell(185,5,'CONDICIONES DE ENTREGA O EJECUCION: '.$this->conent);
			$this->setXY(15,202);
			$this->cell(185,5,'VALIDEZ DE LA OFERTA: '.$this->valofe);

			$this->setXY(15,206);
			$this->cell(185,5,'LAPSO Y LUGAR PARA ACLARATORIAS:    Hasta  el  día ' .$this->fecacl. ',  por  escrito  a  traves de oficio,   fax o e-mail  contactos:  Reinaldo Rodriguez.');              
			$this->setXY(15,209);
			$this->cell(185,5,'');
			$this->setXY(15,213);
			$this->cell(185,5,'LAPSO Y ENTREGA DE OFERTAS:    Hasta  el día, '.$this->fecacl2. ' ,  4:00 pm,    las  cuales   deberán   ser  enviadas   vía  fax   al    (0212 285-31-74)   o vía '); 
			$this->setXY(15,216);
			$this->cell(185,5,'electrónica  (e-mail)  compras.contraloriachacao@gmail.com,  compras2.contraloriachacao@gmail.com detallando:  Precio  Unitario,  cantidades,'); 
  			$this->setXY(15,219);
			$this->cell(185,5,'precio total,  IVA   y precio total de la  oferta, Nro. de procedimiento,  tiempo  o  fecha  de entrega,  validez  de  la  oferta,  condiciones  de  pago,');
			$this->setXY(15,222);
			$this->cell(185,5,'dirección,  teléfonos, RIF, firmada y sellada.');			
			$this->setXY(15,226);
			$this->cell(185,5,'CRITERIOS DE EVALUACION:  A  los efectos de la adjudicación,  el precio de las ofertas  será uno de los elementos a tomarse en consideración ');
			$this->setXY(15,229);
			$this->cell(185,5,'mas no  sera determinante.  La  Contraloria  no quedara  obligado  a  adjudicar la  misma  en  base a la oferta de menor  precio sino a  la que, del');
			$this->setXY(15,232);
			$this->cell(185,5,'estudio  que  se realice  sobre el  conjunto de  elementos y  valores que componen la  documentación  requerida, resulte  como  mas conveniente '); 
			$this->setXY(15,235);
			$this->cell(185,5,'para este órgano de control.');
			$this->setXY(15,240);
			$this->cell(185,5,'Firma: Dir.Adm.Y Finanzas - Compras                                                               Recibido por el Proveedor (Segun R.L.C.P. Art Nro.33)');	
			$this->setXY(15,254);
			$this->cell(185,5,'Fecha:																														                                   															                  											     Fecha:	');
			$this->setXY(15,247);		
			////////////////////////////////////////////cabecera
			 $this->setFont("Arial","B",8);
			       $this->setWidths(array(25,120,40));
			       $this->setAligns(array("L","L","C"));
			       $this->setXY(245,22);
				 $this->setFont("Arial","B",9);
				 
		}
		function Cuerpo()
		{  $y=72;
			 $y2=0;

			foreach($this->arrp2 as $dato)
			{
			     $this->setFont("Arial","",8);
                           $this->setXY(15,$y);
		 	     $this->setwidths(array(20,27,120));
			     $this->setaligns(array("R","C","L"));
			     $this->rowm(array($dato["canreq"],$dato["unimed"],$dato["desart"]));
				 //$this->ln();

				  $y=$this->GetY();
				  $y2=$this->GetY();

					     if($y2>=175)
					     {
					     $this->AddPage();
					     $y=72;
					     $y2=0;

					     }//if

                 
			}//fin de foreach
          		}//funcion cuerpo
	}
?>
