
<?php

  $value = object_input_date_tag($fcdeclar, 'getFecfin', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',
  'onBlur'=> remote_function(array(
        'update' => 'divgriddeuda',
        'url'      => 'facprodec/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fcdeclar_fecfin').value != '' && $('id').value == ''",
        'with' => "'ajax=3&codigo='+$('fcdeclar_numref').value+'&fecfin='+this.value+'&fecini='+$('fcdeclar_fecini').value+'&fecdec='+$('fcdeclar_fecdec').value+'&fuente='+$('fcdeclar_fuente').value+'&tippro='+$('fcdeclar_tippro').value+'&rifcon='+$('fcdeclar_rifcon').value"
        )),
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcdeclar[fecfin]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';

?>
