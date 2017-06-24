<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($faordtra, 'getFechas', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'faordtra[fechas]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'prorecordtra/ajax',
         'script'   => true,
         'condition' => "$('faordtra_fechas').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=faordtra_fecdes&fecha='+$('faordtra_fecdes').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>