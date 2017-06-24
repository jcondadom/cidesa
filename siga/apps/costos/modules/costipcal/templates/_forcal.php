<?php
echo select_tag('costipcal[forcal]', options_for_select(Array('D' => 'Directo', 'P' => 'Porcentual'), $costipcal->getForcal()));
?>
