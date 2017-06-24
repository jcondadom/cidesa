<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($fapresup, 'getFechas', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'fapresup[fechas]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'facaprpresup/ajax',
         'script'   => true,
         'condition' => "$('fapresup_fechas').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=fapresup_fecdes&fecha='+$('fapresup_fecdes').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>