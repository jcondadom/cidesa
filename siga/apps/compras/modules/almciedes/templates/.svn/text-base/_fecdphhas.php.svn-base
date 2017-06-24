<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php  $value = object_input_date_tag($cadphart, 'getFecdphhas', array (
	'rich' => true,
	'calendar_button_img' => '/sf/sf_admin/images/date.png',
	'control_name' => 'cadphart[fecdphhas]',
	'date_format' => 'dd/MM/yyyy',
	'size' => 10,
	'maxlength' => 10,
	'onkeyup' => "javascript: mascara(this,'/',patron,true)",
        'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'almciedes/ajax',
         'script'   => true,
         'condition' => "$('cadphart_fecdphhas').value != ''",
         'complete' => 'AjaxJSON(request, json)',
         'with' => "'ajax=1&cajtexmos=cadphart_fecdphdes&fecha='+$('cadphart_fecdphdes').value+'&codigo='+this.value"
     ))
)); echo $value ? $value : '&nbsp;'
?>   