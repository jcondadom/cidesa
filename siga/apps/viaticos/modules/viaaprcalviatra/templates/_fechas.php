<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($viacalviatra, 'getFechas', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'viacalviatra[fechas]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'viaaprcalviatra/ajax',
         'script'   => true,
         'condition' => "$('viacalviatra_fechas').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=viacalviatra_fecdes&fecha='+$('viacalviatra_fecdes').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>   