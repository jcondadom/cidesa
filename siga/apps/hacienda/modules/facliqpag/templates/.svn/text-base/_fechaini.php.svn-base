
<div id="fechafin"  >
  <?php echo label_for('fcliqpag[fechaini]', __('Fecha Desde:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcliqpag{fechaini}')): ?> form-error<?php endif; ?>">
 <?php
  $value = object_input_date_tag($fcliqpag, 'getFechaini', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcliqpag[fechaini]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';
 ?>
</div>

