<?php
echo select_tag('hcregmedlab[tipmedlab]', options_for_select(Array('M' => 'Médico', 'L' => 'Laboratorio'), $hcregmedlab->getTipmedlab()));
?>
