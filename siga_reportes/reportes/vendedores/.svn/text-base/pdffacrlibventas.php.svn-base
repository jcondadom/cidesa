<?

require_once("../../lib/general/fpdf/fpdf.php");
require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/cabecera.php");
require_once("../../lib/modelo/sqls/facturacion/Facrlibventas.class.php");

class pdfreporte extends fpdf {

    var $bd;
    var $archtxt;
    
    function pdfreporte() {
        $this->conf = "l";
        $this->fpdf($this->conf, "mm", array(230, 370));

        $this->arrp = array("no_vacio");
        $this->cab = new cabecera();
        $this->bd = new basedatosAdo();
        

        $this->numfacdes = H::GetPost("numfacdes");
        $this->numfachas = H::GetPost("numfachas");
        $this->anho = H::GetPost("anho");
        $this->mes = H::GetPost("mes");
        $this->codclides = H::GetPost("codclides");
        $this->codclihas = H::GetPost("codclihas");
        $this->archtxt   = H::GetPost('archtxt');

        $this->farventas = new Facrlibventas();
        $this->arrp = $this->farventas->sqlp($this->numfacdes, $this->numfachas, $this->anho, $this->mes, $this->codclides, $this->codclihas);
        $this->llenartitulosmaestro();
        $this->llenaranchos();
    }

    function llenartitulosmaestro() {

        $this->titulosm[0] = "Fecha de la Factura";
        //$this->titulosm[1] = "Número de Factura";
        $this->titulosm[1] = "RIF";
        $this->titulosm[2] = "Nombre o Razón Social";
        //$this->titulosm[2] = "Número de Nota de Crédito";
        //$this->titulosm[2] = "RIF";
        //$this->titulosm[3] = "Número de Nota de Débito";
        $this->titulosm[3] = "N° de Factura";
        $this->titulosm[4] = "N° de Control";
        $this->titulosm[5] = "N° Nota Crédito";
        $this->titulosm[6] = "N° Nota Débito";
        $this->titulosm[7] = "N° Factura Afectada";
        $this->titulosm[8] = "Total Ventas Incluyendo IVA";
        $this->titulosm[9] = "Ventas no Gravadas";
        $this->titulosm[10] = "Base Imponible";
        $this->titulosm[11] = "% Alícuota";
        $this->titulosm[12] = "Impuesto IVA";
        $this->titulosm[13] = "IVA retenido";
        $this->titulosm[14] = "Numero Comprobante";
        $this->titulosm[15] = "Fecha Comprobante";
        //$this->titulosm[16] = "Ventas Gravadas";
        //totales
        $this->titulosm[17] = "TOTALES";
        $this->titulosm[18] = "TOTAL VENTAS INTERNAS NO GRAVADAS";
        $this->titulosm[19] = "TOTAL VENTAS INTERNAS AFECTAS SOLO ALICUOTA GENERAL";
        $this->titulosm[20] = "TOTAL VENTAS INTERNAS AFECTAS SOLO ALICUOTA REDUCIDA";
        $this->titulosm[21] = "Base Imponible";
        $this->titulosm[22] = "Débito Fiscal";
        $this->titulosm[23] = "PERIODO FISCAL";
        $this->titulosm[24] = "AÑO: ";
        $this->titulosm[25] = "MES: ";
        $this->titulosm[26] = "TOTAL VENTAS EXPORTACION: ";
        $this->titulosm[27] = "TOTAL VENTAS INTERNAS AFECTAS SOLO ALICUOTA GENERAL + ADICIONAL: ";
    }
        
    function llenaranchos() {
        $this->anchos = array();
        $this->anchos[0] = 190;
        $this->anchos[1] = 140;
        $this->anchos[2] = 110;
        $this->anchos[3] = 100;
        $this->anchos[5] = 50;
        //$this->anchos[5]=140;
    }

    function Header() {
        $this->cab->poner_cabecera_legal2($this, H::GetPost("titulo"), $this->conf, "n", "n");
        
        $this->setFont("Arial", "B", 7);
        $this->Rect(300, 10, 50, 5);
        $this->Rect(300, 15, 25, 5);
        $this->Rect(325, 15, 25, 5);
        
        $this->SetXY(300, 10.3);
        $this->Multicell(37, 5, $this->titulosm[23], 0, 0, 'C');
        $this->SetXY(300, 15);
        $this->Multicell(20, 5, $this->titulosm[24]." ".$this->anho, 0, 0, 'L');
        $this->SetXY(325, 15);
        $this->Multicell(20, 5, $this->titulosm[25]." ".$this->mes, 0, 0, 'L');
        
        $this->setFont("Arial","B",7);
        if($this->archtxt == 'SI') {
            $dir = parse_url($_SERVER['HTTP_REFERER']);
            $dir = eregi_replace(".php","_excel.php",$dir['scheme'].'://'.$dir['host'].$dir['path']);

            $this->setXY(310,55);
            $this->PutLink(trim($dir).'?numfacdes='.$this->numfacdes.'&numfachas='.$this->numfachas.'&anho='.$this->anho.'&mes='.$this->mes.'&codclides='.$this->codclides.'&codclihas='.$this->codclihas.'&titulo='.$_POST["titulo"].'&schema='.$_SESSION["schema"],'Visualizar HOJA DE CALCULO');
        }
        
        $this->setFont("Arial", "B", 7);
        $this->ln(5);
        $this->Rect(10, 60, 15, 20);
        $this->Rect(25, 60, 17, 20);
        //

        //$this->Rect(100, 60, 15, 20);
        //$this->Rect(70, 60, 15, 20);

        //$this->Rect(85, 60, 15, 20);
        $this->Rect(42, 60, 46, 20);
        $this->Rect(88, 60, 17, 20);
        $this->Rect(105, 60, 15, 20);
        $this->Rect(120, 60, 15, 20);
        $this->Rect(135, 60, 17, 20);
        
        $this->Rect(152, 60, 18, 20);

        $this->Rect(170, 60, 20, 20);
        $this->Rect(190, 60, 20, 20);

        $this->Rect(210, 60, 20, 20);
        $this->Rect(230, 60, 15, 20);
        $this->Rect(245, 60, 20, 20);

        $this->Rect(265, 60, 15, 20);
        $this->Rect(280, 60, 25, 20);

        $this->Rect(305, 60, 20, 20);
        //$this->Rect(340, 60, 20, 20);

        $this->SetXY(10, 65);
        $this->Multicell(15, 4, $this->titulosm[0], 0, 'C',0);
        $this->SetXY(25, 65);
        $this->Multicell(15, 5, $this->titulosm[1], 0, 'C',0);
        $this->SetXY(40, 62);
        $this->Multicell(55, 5, $this->titulosm[2], 0, 'C',0);

        $this->SetXY(90, 62);
        $this->Multicell(15, 5, $this->titulosm[3], 0, 'C',0);

        $this->SetXY(105, 62);
        $this->Multicell(15, 5, $this->titulosm[4], 0, 'C',0);

        $this->SetXY(120, 62);
        $this->Multicell(15, 5, $this->titulosm[5], 0, 'C',0);

        $this->SetXY(132, 62);
        $this->Multicell(20, 5, $this->titulosm[6], 0, 'C',0);
        
        $this->SetXY(152, 67);
        //$this->setFont("Arial", "B", 6);
        $this->Multicell(18, 5, $this->titulosm[7], 0, 'C',0);
        $this->SetXY(170, 65);
        $this->Multicell(20, 5, $this->titulosm[8], 0, 'C',0);

        $this->SetXY(190, 65);
        //$this->setFont("Arial", "B", 6);
        $this->Multicell(20, 5, $this->titulosm[9], 0, 'C',0);
        
        //$this->setFont("Arial", "B", 7);
        $this->SetXY(210, 65);
        $this->Multicell(20, 4, $this->titulosm[10], 0, 'C',0);

        $this->SetXY(230, 65);
        $this->Multicell(15, 4, $this->titulosm[11], 0, 'C',0);

        $this->SetXY(247.5, 65);
        $this->Multicell(15, 4, $this->titulosm[12], 0, 'C',0);
        
        $this->SetXY(265, 65);
        $this->Multicell(15, 4, $this->titulosm[13], 0, 'C',0);

        $this->SetXY(279.5, 65);
        $this->Multicell(25, 4, $this->titulosm[14], 0, 'C',0);

        $this->SetXY(303, 65);
        $this->Multicell(25, 4, $this->titulosm[15], 0, 'C', 0);

       // $this->SetXY(340, 65);
        //$this->Multicell(20, 4, $this->titulosm[16], 0, 'C', 0);

        $this->SetXY(10, 85);
    }

    function Cuerpo() {
        
    /////para el link del archivo
            /*$nombre_archivo="Libro_Ventas".date('d_m_Y').".xls";
            if (!file_exists($nombre_archivo))
            {
                    fopen($nombre_archivo,"w");
            }
            chmod ($nombre_archivo,777);
            $host = $_SERVER["HTTP_HOST"];
            $aux = split('/',$_SERVER["REQUEST_URI"]);
            $uri='';
            for ($i=0;$i<count($aux)-1;$i++)
                    $uri = $uri.$aux[$i]."/";
            $archivo='http://'.$host.$uri;
            $depositos = fopen($nombre_archivo,'w+');*/
   ////////////////////
        
        $totalventas_cont = '';
        $ventasexcentas_cont = '';
        $ventasexon_cont = '';
        $baseimp_cont = '';
        $credifiscal_cont = '';

        $totalventas_nocont = '';
        $ventasexcentas_nocont = '';
        $ventasexon_nocont = '';
        $baseimp_nocont = '';
        $credifiscal_nocont = '';

        $tipoajuste='';
        $deposito='';
        $credito='';
        $tipotransaccion="01";
        $texto="Según Reglamento General de la Ley que establece el Impuesto al Valor Agregado, publicado en la Gaceta Oficial N° 5.363 E";
        $totalventa = 0;
        $totalexcenta =0;
        $totalbase =0;
        $totalmoniva = 0;
        $contador = 0;
        $iva12 =0;
        $iva8=0;
        $base12=0;
        $base8 =0;
        $baseexportacion=0;
        $ivaexportacion=0;
        $baseventasadicional=0;
        $ivaventasadicional=0;
        $status ='';
        
        //imprimimos el encabezado en el archivo
        /*$cadena="<table>
        <tr>
        <td align = 'center'><b>"."Fecha de la Factura"."</b></td>
        <td align = 'center'><b>"."Nro. de Factura"."</b></td>
        <td align = 'center'><b>"."Nro. de Nota de Cr&eacute;dito"."</b></td>
        <td align = 'center'><b>"."Nro. de Nota de D&eacute;bito"."</b></td>
        <td align = 'center'><b>"."Nro. de Control"."</b></td>
        <td align = 'center'><b>"."Nro. de Factura Afectada"."</b></td>
        <td align = 'center'><b>"."Nombre o Raz&oacute;n Social"."</b></td>
        <td align = 'center'><b>"."RIF"."</b></td>
        <td align = 'right'><b>"."Total Ventas Incluyendo IVA"."</b></td>
        <td align = 'right'><b>"."Ventas no Gravadas"."</b></td>
        <td align = 'right'><b>"."Base Imponible"."</b></td>
        <td align = 'center'><b>"."% Al&iacute;cuota"."</b></td>
        <td align = 'right'><b>"."Impuesto IVA"."</b></td>
        <td align = 'center'><b>"."Estatus de Factura"."</b></td>
        <td align = 'center'><b>"."Fecha de Anulaci&oacute;n"."</b></td>
        <td align = 'center'><b>"."Descripci&oacute;n de Factura"."</b></td>
        <td align = 'right'><b>"."Ventas Gravadas"."</b></td>       
        </tr>
        </table>";
        fwrite($depositos, $cadena);*/
        ////////////////
        
        foreach ($this->arrp as $dato) {

            //$tipoajuste = '';
            $totalventa+=$dato["totalventas"];
            $totalexcenta+=$dato["nogravado"];
            $totalbase+=$dato["basimp"];
            //$totalfob+=$dato["valfob"];
            $totalmoniva+=$dato["impuesto"];
            $contador++;
            $tipoajuste =$dato["tipo"];
            
            if($tipoajuste == 'DEBITO')
            {
                $debito=$dato["refaju"];
                $credito = '';
                $tipotransaccion="02";
            }
            else
            if ($tipoajuste == 'CREDITO') 
             {
                $credito = $dato["refaju"];
                $debito = '';
                $tipotransaccion="03";
                //$montocredito+=$dato["totalventas"];
             }
            else
             {
                $credito = '';
                $debito = '';
                $tipotransaccion="01";
             }
             
            if ($dato["recargo"]==8.00)
            {
                $iva8+=$dato["impuesto"];
                $base8+=$dato["base"];
            }
            else
                if($dato["recargo"]==12.00)
                {
                    $iva12+=$dato["impuesto"];
                    $base12+=$dato["base"];
                }

            if($dato["status"] == 'A')
                $status='Activa';
            else
                if($dato["status"] == 'N')
                $status='Anulada';
                
            $this->setFont("Arial", "", 7);
            $this->SetWidths(array(15, 17, 46, 17, 15, 15, 17, 18, 20, 20, 20, 15, 20, 15, 25, 20));
            $this->SetAligns(array("C", "L", "C", "L", "L", "C", "C", "L", "R", "R", "R", "C", "R", "C", "C", "C", "C"));
            $this->setBorder(1);
            $this->Row(array( $dato["fecha"], $dato["rif"], $dato["nombre"], $dato["reffac"], $dato["control"], $debito, $credito, $dato["codref"], H::FormatoMonto($dato["totalventas"]), H::FormatoMonto($dato["nogravado"]), H::FormatoMonto($dato["basimp"]), '12%',H::FormatoMonto($dato["impuesto"]),'',$dato["numcom"],$dato["fecha"]));
            ///////////////////////contenido del xls
            /*$cadena="<table>
            <tr>
            <td align = 'center'>".$dato["fecha"]."</td>
            <td align = 'center'>".$dato["reffac"]."</td>
            <td align = 'center'>".$credito."</td>
            <td align = 'center'>".$debito."</td>
            <td align = 'center'>".$dato["control"]."</td>
            <td align = 'center'>".$dato["codref"]."</td>
            <td align = 'left'>".$dato["nombre"]."</td>
            <td align = 'center'>".$dato["rif"]."</td>
            <td align = 'right'>".H::FormatoMonto($dato["totalventas"])."</td>
            <td align = 'right'>".H::FormatoMonto($dato["nogravado"])."</td>
            <td align = 'right'>".H::FormatoMonto($dato["base"])."</td>
            <td align = 'center'>".$dato["iva"]."</td>
            <td align = 'right'>".H::FormatoMonto($dato["impuesto"])."</td>
            <td align = 'center'>".$status."</td>
            <td align = 'center'>".$dato["anulacion"]."</td>
            <td align = 'center'>".$dato["descripcion"]."</td>
            </tr>
            </table>";

            fwrite($depositos, $cadena);*/
            ///////////////////////////////////////////////////////////
        }
        $this->setFont("Arial", "B", 7);
        $this->SetWidths(array(15, 15, 15, 15, 15, 15, 52, 18, 20, 20, 20, 15, 20, 15, 15, 45, 20));
        $this->SetAligns(array("C", "L", "C", "L", "L", "R", "R", "R", "R", "R", "R", "R", "R", "R", "C", "R"));
        $this->setBorder(0);
        $this->Row(array( '', '', '', '', '', '', $this->titulosm[17], '',H::FormatoMonto($totalventa), H::FormatoMonto($totalexcenta), H::FormatoMonto($totalbase), '', H::FormatoMonto($totalmoniva),'','',''));
        $this->setFont("Arial", "B", 8);
        $this->SetWidths(array(290, 40,20));
        $this->SetAligns(array("C","C","C"));
        $this->setBorder(0);
        $this->Row(array( '', 'TOTAL DE FACTURAS:', H::FormatoSinDecimal($contador)  ));
        $this->Ln(10);
        
        ///////////////////////contenido del xls
            /*$cadena="<table>
            <tr>
            <td align = 'center'>".''."</td>
            <td align = 'center'>".''."</td>
            <td align = 'center'>".''."</td>
            <td align = 'center'>".''."</td>
            <td align = 'center'>".''."</td>
            <td align = 'center'>".''."</td>
            <td align = 'left'><b>".$this->titulosm[17]."</b></td>
            <td align = 'center'>".''."</td>
            <td align = 'right'><b>".H::FormatoMonto($totalventa)."</b></td>
            <td align = 'right'><b>".H::FormatoMonto($totalexcenta)."</b></td>
            <td align = 'right'><b>".H::FormatoMonto($totalbase)."</b></td>
            <td align = 'center'>".''."</td>
            <td align = 'right'><b>".H::FormatoMonto($totalmoniva)."</b></td>
            <td align = 'center'>".''."</td>
            <td align = 'center'>".''."</td>
            <td align = 'center'>".''."</td>
            </tr>
            </table>";

            fwrite($depositos, $cadena);
            ///////////////////////////////////////////////////////////
        
        $this->Ln();
        fclose($depositos);   
        if ($this->archtxt=='SI'){
            H::PutLink($archivo.'descargar.php?archivo='.$nombre_archivo,'Generar xls',$this);
        }*/
    }
}

//fin de la clase
?>
