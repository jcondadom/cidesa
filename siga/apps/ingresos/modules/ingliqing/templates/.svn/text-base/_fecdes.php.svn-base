<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($ciliqing, 'getFecdes', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'ciliqing[fecdes]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'ingliqing/ajax',
         'script'   => true,
         'condition' => "$('ciliqing_fecdes').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=ciliqing_fechas&fecha='+$('ciliqing_fechas').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>    