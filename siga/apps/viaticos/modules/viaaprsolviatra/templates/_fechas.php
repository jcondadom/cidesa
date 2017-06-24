<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($viasolviatra, 'getFechas', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'viasolviatra[fechas]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'viaaprsolviatra/ajax',
         'script'   => true,
         'condition' => "$('viasolviatra_fechas').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=viasolviatra_fecdes&fecha='+$('viasolviatra_fecdes').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>   