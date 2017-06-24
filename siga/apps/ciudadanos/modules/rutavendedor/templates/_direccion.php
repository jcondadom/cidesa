<?php
$ce = new Criteria();
$ce->add(AtestadosPeer::ID,$rutavendedor->getAtestadosId());
$resultadoe = AtestadosPeer::doSelect($ce);
echo $resultadoe['0']."<br>";
$cm = new Criteria();
$cm->add(AtmunicipiosPeer::ID,$rutavendedor->getAtmunicipiosId());
$resultadom = AtmunicipiosPeer::doSelect($cm);
echo $resultadom['0']."<br>";
$cp = new Criteria();
$cp->add(AtparroquiasPeer::ID,$rutavendedor->getAtparroquiasId());
$resultadop = AtparroquiasPeer::doSelect($cp);
echo $resultadop['0']."<br>";
$cc = new Criteria();
$cc->add(FaclientePeer::ID,$rutavendedor->getFaclienteId());
$resultadoc = FaclientePeer::doSelect($cp);
echo $resultadoc['0'];
?>
