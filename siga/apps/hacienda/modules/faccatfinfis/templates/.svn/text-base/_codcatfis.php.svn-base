<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
  <?php
  $var=$fccatfis->getMascara();
  $lon=strlen(trim($fccatfis->getMascara()));
  $value = object_input_tag($fccatfis, 'getCodcatfis', array (
  'size' => $lon+2,
  'maxlength' => $lon,
  'control_name' => 'fccatfis[codcatfis]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$var')",
  'onBlur'=> remote_function(array(
        'url'      => 'faccatfinfis/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fccatfis_codcatfis').value != '' && $('id').value == ''",
        'script' => true,
         'with' => "'ajax=1&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>