<?php
$ce = new Criteria();
$ce->add(AtestadosPeer::ID,$ruta->getAtestadosId());
$resultadoe = AtestadosPeer::doSelect($ce);
echo "<b>Estado:</b> ".$resultadoe['0']."<br>";
$cm = new Criteria();
$cm->add(AtmunicipiosPeer::ID,$ruta->getAtmunicipiosId());
$resultadom = AtmunicipiosPeer::doSelect($cm);
echo "<b>Municipio:</b> ".$resultadom['0']."<br>";
$cp = new Criteria();
$cp->add(AtparroquiasPeer::ID,$ruta->getAtparroquiasId());
$resultadop = AtparroquiasPeer::doSelect($cp);
echo "<b>Parroquia:</b> ".$resultadop['0']."<br>";
echo "<b>Zona Limitrofe Desde:</b> ".$ruta->getZonaLimiDesde()."<br>";
echo "<b>Zona Limitrofe Hasta:</b> ".$ruta->getZonaLimiHastas();
?>
