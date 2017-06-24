<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $value = object_input_tag($fctippro, 'getParpro', array (
'maxlength' => 300,
'size' => 80,
'style' => 'text-transform:uppercase;',
'control_name' => 'fctippro[parpro]',
'onBlur'  => "javascript: verificar_formula();",
)); echo $value ? $value : '&nbsp;' ?>
