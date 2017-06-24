<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?  if ($params){ ?>
<?  echo $params[2]; ?>
<br>
  <?php
  $mascara    = $params[0];
  $long = $params[1];

  $value = object_input_tag($cpdeftit, 'getCodpre', array (
  'size' => $long,
  'readonly'  =>  $cpdeftit->getId()!='' ? true : false ,
  'maxlength' => $long,
  'control_name' => 'cpdeftit[codpre]',
  'onKeyDown'    => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'pretitpre/ajax',
        'condition' => "$('cpdeftit_codpre').value!= '' && $('id').value== ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&codigo='+this.value",
        ))

)); echo $value ? $value : '&nbsp;' ?>
<? } ?>
