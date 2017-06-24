<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if($ajax=='1') : ?>
  <?php $value = get_partial('grid', array('type' => 'edit', 'fcdeclar' => $fcdeclar,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php endif; ?>