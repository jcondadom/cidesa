<?php
$cc = new Criteria();
$cc->add(VendedoresPeer::ID,$rutavendedores->getVendedoresId());
$resultadoc = VendedoresPeer::doSelect($cc);
echo $resultadoc['0'];
?>
