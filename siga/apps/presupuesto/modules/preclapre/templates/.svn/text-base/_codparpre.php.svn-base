<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

  <?php
  $mascara= H::getMascaraPartida();
  $long= strlen($mascara);

  $value = object_input_tag($cpdefparpre, 'getCodparpre', array (
  'size' => $long+5,
  'readonly'  =>  $cpdefparpre->getId()!='' ? true : false ,
  'maxlength' => $long,
  'control_name' => 'cpdefparpre[codparpre]',
  'onKeyDown'    => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
    'url'      => 'preclapre/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('cpdefparpre_codparpre').value != '' && $('id').value == ''",
    'script' => true,
    'with' => "'ajax=1&codigo='+this.value"
   ))
)); echo $value ? $value : '&nbsp;' ?>
