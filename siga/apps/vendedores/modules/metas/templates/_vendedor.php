<?php
$c = new Criteria();
$c->add(VendedoresPeer::ID,$metas->getVendedoresId());
$resultado = VendedoresPeer::doSelect($c);
echo $resultado['0'];
?>
