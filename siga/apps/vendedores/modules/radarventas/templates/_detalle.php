<?php
$cc = new Criteria();
$cc->add(FaclientePeer::ID,$radarventas->getFaclienteId());
$resultadoc = FaclientePeer::doSelect($cc);
echo "<b>Cliente:</b> ".$resultadoc['0']."<br>";

$c = new Criteria();
$c->add(VendedoresPeer::ID,$radarventas->getVendedoresId());
$resultado = VendedoresPeer::doSelect($c);
echo "<b>Vendedor:</b> ".$resultado['0']."<br>";

echo "<b>Fecha:</b> ".sfGraphics::CamFormFech($radarventas->getFecha())."<br>";

$cf = new Criteria();
$cf->add(FafacturPeer::ID,$radarventas->getFafacturId());
$resultadof = FafacturPeer::doSelect($cf);
if (count($resultadof)>0)
{
echo "<b>Factura:</b> ".$resultadof['0']."<br>";
}
?>
