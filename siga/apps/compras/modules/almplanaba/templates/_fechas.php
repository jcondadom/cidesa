<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $value = object_input_date_tag($capdaoc, 'getFechas', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'capdaoc[fechas]',
'date_format' => 'dd/MM/yy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>