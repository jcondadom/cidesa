<?php
$cc = new Criteria();
$cc->add(FaclientePeer::ID,$radarventas->getFaclienteId());
$resultadoc = FaclientePeer::doSelect($cc);
echo $resultadoc['0'];
?>
