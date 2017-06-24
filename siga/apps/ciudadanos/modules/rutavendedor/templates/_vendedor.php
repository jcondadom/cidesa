<?php
$c = new Criteria();
$c->add(VendedoresPeer::ID,$rutavendedor->getVendedoresId());
$resultado = VendedoresPeer::doSelect($c);
echo $resultado['0'];
?>
