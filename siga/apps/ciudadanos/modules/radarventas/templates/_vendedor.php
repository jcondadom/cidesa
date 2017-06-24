<?php
$c = new Criteria();
$c->add(VendedoresPeer::ID,$radarventas->getVendedoresId());
$resultado = VendedoresPeer::doSelect($c);
echo $resultado['0'];
?>
