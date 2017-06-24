<?php
echo select_tag('costipcal[ordpag]', options_for_select(Array('N' => 'NO', 'S' => 'SI'), $costipcal->getOrdpag()));
?>
