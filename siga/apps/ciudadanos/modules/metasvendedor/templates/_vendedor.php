<?php
$c = new Criteria();
$c->add(VendedoresPeer::ID,$metasvendedor->getVendedoresId());
$resultado = VendedoresPeer::doSelect($c);
echo $resultado['0'];
?>
