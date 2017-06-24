  <?php $value = object_input_date_tag($empresa, 'getFecnom', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'empresa[fecnom]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>