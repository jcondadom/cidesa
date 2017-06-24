<?php

  $value = object_input_date_tag($fcdefut, 'getFecfin', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',
   'onBlur'=> remote_function(array(
        'url'      => 'facdefut/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fcdefut_fecini').value != '' && $('id').value == ''",
        'with' => "'ajax=1&codigo='+$('fcdefut_fecini').value+'&fecfin='+this.value"
        )),
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcdefut[fecfin]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';

?>
