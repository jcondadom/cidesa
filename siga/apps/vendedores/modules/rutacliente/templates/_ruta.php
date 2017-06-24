<?php
$r = new Criteria();
$r->add(RutaPeer::ID,$rutacliente->getRutaId());
$resultador = RutaPeer::doSelect($r);
echo $resultador['0'];
?>
