<?php
$c = new Criteria();
$c->add(CatproductosPeer::ID,$metasvendedor->getCatproductosId());
$resultado = CatproductosPeer::doSelect($c);
echo $resultado['0'];
?>
