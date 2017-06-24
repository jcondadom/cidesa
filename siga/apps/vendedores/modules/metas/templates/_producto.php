<?php
$c = new Criteria();
$c->add(CatproductosPeer::ID,$metas->getCatproductosId());
$resultado = CatproductosPeer::doSelect($c);
echo $resultado['0'];
?>
