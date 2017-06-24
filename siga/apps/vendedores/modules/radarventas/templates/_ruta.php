<?php
$r = new Criteria();
$r->add(RutaPeer::ID,$radarventas->getRutaId());
$resultador = RutaPeer::doSelect($r);
echo $resultador['0'];
?>
