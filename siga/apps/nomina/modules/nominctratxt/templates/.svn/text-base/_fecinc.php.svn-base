  <?php $value = object_input_date_tag($npinctratxt, 'getFecinc', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npinctratxt[fecinc]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'update' => 'divgrid',
        'url'      => 'nominctratxt/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('npinctratxt_fecinc').value != ''",
        'script' => true,
        'with' => "'ajax=1&status='+$('npinctratxt_status').checked+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>  
