<?php
$c = new Criteria();
$c->add(CatproductosPeer::ID,$radarventas->getCatproductosId());
$resultado = CatproductosPeer::doSelect($c);
echo $resultado['0'];
?>
