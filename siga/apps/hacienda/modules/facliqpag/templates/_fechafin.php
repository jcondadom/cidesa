
<div id="fechafin"  >
  <?php echo label_for('fcliqpag[fechafin]', __('Fecha Hasta:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcliqpag{fechafin}')): ?> form-error<?php endif; ?>">
 <?php
  $value = object_input_date_tag($fcliqpag, 'getFechafin', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',
  'onBlur'=> remote_function(array(
    'update' => 'divgrid',
    'url'      => 'facliqpag/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('fcliqpag_fechafin').value != '' && $('id').value == ''",
    'with' => "'ajax=2&codigo='+this.value+'&fecini='+$('fcliqpag_fechaini').value"
    )),
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcliqpag[fechafin]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';
 ?>
</div>

