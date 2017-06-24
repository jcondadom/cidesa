

<?php

  $value = object_input_date_tag($catraalm, 'getFectra', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',
  'onBlur'=> remote_function(array(
        'update' => 'divgrid',
        'url'      => 'almaprtra/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('catraalm_fectra').value != '' && $('id').value == ''",
        'with' => "'ajax=1&fecha='+this.value+'&codigo='+$('catraalm_codalm').value"
        )),
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'catraalm[fectra]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';

?>
