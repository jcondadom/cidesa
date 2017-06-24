<?php  $value = object_input_date_tag($contabc, 'getFechas', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'contabc[fechas]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'confinactcom/ajax',
         'script'   => true,
         'condition' => "$('contabc_fechas').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&codtiptra='+$('contabc_codtiptra').value+'&fec1='+$('contabc_fecdes').value+'&fec2='+$('contabc_fechas').value"
     ))
)); echo $value ? $value : '&nbsp;'
?>    