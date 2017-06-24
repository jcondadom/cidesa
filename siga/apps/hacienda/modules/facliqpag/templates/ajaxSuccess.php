<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php  if ($ajax =='2'){ ?>
  <?php $value = get_partial('grid', array('type' => 'edit', 'fcliqpag' => $fcliqpag,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } ?>
 