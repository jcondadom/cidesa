<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $value = object_input_tag($fctipesp, 'getParesp', array (
'maxlength' => 300,
'size' => 80,
'style' => 'text-transform:uppercase;',
'control_name' => 'fctipesp[paresp]',
'onBlur'  => "javascript: verificar_formula();",
)); echo $value ? $value : '&nbsp;' ?>
