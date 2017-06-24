<?
	  require_once("../../lib/general/fpdf/fpdf.php");
	  require_once("../../lib/general/Herramientas.class.php");
	  require_once("../../lib/bd/basedatosAdo.php");
	  require_once("../../lib/general/cabecera.php");
	  require_once("../../lib/modelo/sqls/facturacion/Facrlisdep.class.php");

	class pdfreporte extends fpdf
	{		

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");

                        $this->arrp=array("no_vacio");
			$this->cab=new cabecera();			

			$this->coddphdes=H::GetPost("coddphdes");
			$this->coddphhas=H::GetPost("coddphhas");
			$this->codclides=H::GetPost("codclides");
			$this->codclihas=H::GetPost("codclihas");
                        $this->codartdes=H::GetPost("codartdes");
			$this->codarthas=H::GetPost("codarthas");
                        $this->fecdes=H::GetPost("fecdes");
			$this->fechas=H::GetPost("fechas");


			$this->obj = new Facrlisdep();
                        $this->arrp = $this->obj->sqlp($this->coddphdes,$this->coddphhas,$this->codclides,$this->codclihas,$this->codartdes,$this->codarthas,$this->fecdes,$this->fechas);

			$this->llenartitulosmaestro();
			$this->llenaranchos();
		}

	function llenartitulosmaestro()
		{

				$this->titulosm[]="RIF CLIENTE";
				$this->titulosm[]="NOMBRE CLIENTE";
				$this->titulosm[]="FECHA DESP.";
                                $this->titulosm[]="CODIGO";
                                $this->titulosm[]="ARTICULO";
                                $this->titulosm[]="CANTIDAD DESP.";
                                $this->titulosm[]="CANTIDAD RESTANTE";


		}

function llenaranchos()
	{		
		$this->anchos[]=20;
		$this->anchos[]=40;
		$this->anchos[]=20;
		$this->anchos[]=25;
		$this->anchos[]=40;
		$this->anchos[]=25;
		$this->anchos[]=25;
	}


function Header()
		{
			    $this->cab->poner_cabecera($this,H::GetPost("titulo"),$this->conf,"s","n");
			    $this->setFont("Arial","B",10);
			    $this->SetWidths($this->anchos);
                            $this->SetAligns('C');
                            $this->setBorder(1);
                            $this->RowM($this->titulosm);
                            $this->setFont("Arial","",9);
		}

function Cuerpo()
		{
                    $totart=0;
                    $totdes=0;
                    $totres=0;
                    foreach($this->arrp as $dat)
                    {
                        $canres = ($dat['canfactot'] ? $dat['canfactot'] : $dat['canpedtot'])-$dat['candph'];
                        $this->rowm(array($dat['codpro'],$dat['nompro'],$dat['fecha'],$dat['codart'],$dat['desart'],H::FormatoMonto($dat['candph']),H::FormatoMonto($canres)));
                        $totart++;
                        $totdes+=$dat['candph'];
                        $totres+=$canres;
                    }
                    #TOTALTES
                    $this->ln();
                    $this->setFont("Arial","B",10);
                    $this->multicell(180,5,"TOTAL ARTICULOS: ".H::FormatoMonto($totart));
                    $this->multicell(180,5,"TOTAL ARTICULOS DESPACHADOS: ".H::FormatoMonto($totdes));
                    $this->multicell(180,5,"TOTAL ARTICULOS RESTANTES A DESPACHAR: ".H::FormatoMonto($totres));
                }//cuerpo


}//fin de la clase
?>
