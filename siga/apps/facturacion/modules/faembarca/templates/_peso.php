  <?php $value = object_input_tag($faembarca, array('getPeso',true), array (
  'size' => 7,
  'onKeyPress' => 'return validaDecimal(event)',
  'onBlur' => 'event.keyCode=13;return formatoDecimal(event,this.id)',
  'control_name' => 'faembarca[peso]',
)); echo $value ? $value : '&nbsp;' ?>&nbsp;
<strong><? echo __('TN') ?></strong>