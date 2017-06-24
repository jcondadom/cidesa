<?php
echo select_tag('cafirdocpre[tipdoc]', options_for_select(array('SC' => 'SC', 'SS' => 'SS', 'OC' => 'OC', 'OS' => 'OS', 'OP' => 'OP', 'VO' => 'VO'), $cafirdocpre->getTipdoc(), 'include_custom=Seleccione uno ...'));
?>
