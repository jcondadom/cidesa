<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  $var=$fcusoveh->getMascara();
  $lon=strlen(trim($fcusoveh->getMascara()));
  $value = object_input_tag($fcusoveh, 'getCoduso', array (
  'size' => $lon+2,
  'maxlength' => $lon,
  'control_name' => 'fcusoveh[coduso]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$var')",
   'onBlur'=> remote_function(array(
    'url'      => 'facvehcla/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('fcusoveh_coduso').value != '' && $('id').value == ''",
    'script' => true,
     'with' => "'ajax=1&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>



