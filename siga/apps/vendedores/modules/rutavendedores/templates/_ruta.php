<?php
$r = new Criteria();
$r->add(RutaPeer::ID,$rutavendedores->getRutaId());
$resultador = RutaPeer::doSelect($r);
echo $resultador['0'];
?>
