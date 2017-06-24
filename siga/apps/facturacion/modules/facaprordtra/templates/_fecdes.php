<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($faordtra, 'getFecdes', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'faordtra[fecdes]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'facaprordtra/ajax',
         'script'   => true,
         'condition' => "$('faordtra_fecdes').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=faordtra_fechas&fecha='+$('faordtra_fechas').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>    