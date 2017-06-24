<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $value = object_input_date_tag($tsdefban, 'getFechades', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'tsdefban[fechades]',
'date_format' => 'dd/MM/yyyy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
'onBlur'=> remote_function(array(     
     'url'      => 'tesrecchqban/ajax',
     'condition' => "$('tsdefban_fechades').value != ''",
     'complete' => 'AjaxJSON(request, json)',
     'with' => "'ajax=2&codigo='+this.value"
 ))
)); echo $value ? $value : '&nbsp;' ?>