<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
$masca=$fcreginm->getMascara();
$lenmasc=strlen($masca);
$forstr=$fcreginm->getFormatostring();

$value = object_input_tag($fcreginm, 'getCodcatinm', array (
  'size' =>  $lenmasc + 10,
  'maxlength' => $lenmasc,
  'control_name' => 'fcreginm[codcatinm]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masca')",
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __($forstr) ?></div>

