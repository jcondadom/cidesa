<?php

require_once("../../lib/general/Herramientas.class.php");
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/modelo/sqls/facturacion/Facrlibventas.class.php");

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=/tmp/facrlibventas_" . date('d/m/Y') . ".xls");

$bd = new basedatosAdo();

$numfacdes = H::GetPost("numfacdes");
$numfachas = H::GetPost("numfachas");
$anho = H::GetPost("anho");
$mes = H::GetPost("mes");
$codclides = H::GetPost("codclides");
$codclihas = H::GetPost("codclihas");

$farventas = new Facrlibventas();
$arrp = $farventas->sqlp($numfacdes, $numfachas, $anho, $mes, $codclides, $codclihas);

echo "<table>";
echo "<tr>";
echo "<td align = 'center'><b>" . "Fecha de la Factura" . "</b></td>";
echo "<td align = 'center'><b>" . "RIF" . "</b></td>";
echo "<td align = 'center'><b>" . "Nombre o Razón Social" . "</b></td>";
echo "<td align = 'center'><b>" . "N° de Factura" . "</b></td>";
echo "<td align = 'center'><b>" . "N° de Control" . "</b></td>";
echo "<td align = 'center'><b>" . "N° Nota Crédito" . "</b></td>";
echo "<td align = 'center'><b>" . "N° Nota Débito" . "</b></td>";
echo "<td align = 'center'><b>" . "N° Factura Afectada" . "</b></td>";
echo "<td align = 'right'><b>" . "Total Ventas Incluyendo IVA" . "</b></td>";
echo "<td align = 'right'><b>" . "Ventas no Gravadas" . "</b></td>";
echo "<td align = 'right'><b>" . "Base Imponible" . "</b></td>";
echo "<td align = 'center'><b>" . "% Al&iacute;cuota" . "</b></td>";
echo "<td align = 'right'><b>" . "Impuesto IVA" . "</b></td>";
echo "<td align = 'center'><b>" . "IVA retenido" . "</b></td>";
echo "<td align = 'center'><b>" . "Numero Comprobante" . "</b></td>";
echo "<td align = 'center'><b>" . "Fecha Comprobante" . "</b></td>";
echo "</tr>";
echo " </table>";

foreach ($arrp as $dato) {

    //$tipoajuste = '';
    $totalventa+=$dato["totalventas"];
    $totalexcenta+=$dato["nogravado"];
    $totalbase+=$dato["basimp"];
    //$totalfob+=$dato["valfob"];
    $totalmoniva+=$dato["impuesto"];
    $contador++;
    $tipoajuste = $dato["tipo"];

    if ($tipoajuste == 'DEBITO') {
        $debito = $dato["refaju"];
        $credito = '';
        $tipotransaccion = "02";
    } else
    if ($tipoajuste == 'CREDITO') {
        $credito = $dato["refaju"];
        $debito = '';
        $tipotransaccion = "03";
        //$montocredito+=$dato["totalventas"];
    } else {
        $credito = '';
        $debito = '';
        $tipotransaccion = "01";
    }

    if ($dato["recargo"] == 8.00) {
        $iva8+=$dato["impuesto"];
        $base8+=$dato["base"];
    } else
    if ($dato["recargo"] == 12.00) {
        $iva12+=$dato["impuesto"];
        $base12+=$dato["base"];
    }

    if ($dato["status"] == 'A')
        $status = 'Activa';
    else
    if ($dato["status"] == 'N')
        $status = 'Anulada';

    echo "<table>";
    echo "<tr>";
    echo "<td align = 'center'>" . $dato["fecha"] . "</td>";
    echo "<td align = 'center'>" . $dato["rif"] . "</td>";
    echo "<td align = 'left'>" . $dato["nombre"] . "</td>";
    echo "<td align = 'center'>" . $dato["reffac"] . "</td>";
    echo "<td align = 'center'>" . $dato["control"] . "</td>";
    echo "<td align = 'center'>" . $debito . "</td>";
    echo "<td align = 'center'>" . $credito . "</td>";
    echo "<td align = 'center'>" . $dato["codref"] . "</td>";
    echo "<td align = 'right'>" . H::FormatoMonto($dato["totalventas"]) . "</td>";
    echo "<td align = 'right'>" . H::FormatoMonto($dato["nogravado"]) . "</td>";
    echo "<td align = 'right'>" . H::FormatoMonto($dato["basimp"]) . "</td>";
    echo "<td align = 'center'>" . '12%' . "</td>";
    echo "<td align = 'right'>" . H::FormatoMonto($dato["impuesto"]) . "</td>";
    echo "<td align = 'center'> </td>";
    echo "<td align = 'center'>" . $dato["numcom"] . "</td>";
    echo "<td align = 'center'>" . $dato["fecha"] . "</td>";
    echo "</tr>";
    echo "</table>";
}

echo "<table>";
echo "<tr>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'left'><b>TOTALES</b></td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'right'><b>" . H::FormatoMonto($totalventa) . "</b></td>";
echo "<td align = 'right'><b>" . H::FormatoMonto($totalexcenta) . "</b></td>";
echo "<td align = 'right'><b>" . H::FormatoMonto($totalbase) . "</b></td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'right'><b>" . H::FormatoMonto($totalmoniva) . "</b></td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "<td align = 'center'>" . '' . "</td>";
echo "</tr>";
echo "</table>";

$bd->closed();
?>
