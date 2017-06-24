<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  $var=$fcpreing->getMascara();
  $lon=strlen(trim($fcpreing->getMascara()));
  $value = object_input_tag($fcpreing, 'getCodpar', array (
  'size' => $lon+2,
  'maxlength' => $lon,
  'control_name' => 'fcpreing[codpar]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$var')",
   'onBlur'=> remote_function(array(
    'url'      => 'fctiting/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('fcpreing_codpar').value != '' && $('id').value == ''",
    'script' => true,
     'with' => "'ajax=1&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>



