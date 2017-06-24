<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajax=='1') {?>
<?php $value = get_partial('grid', array('type' => 'edit', 'casolart' => $casolart,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($ajax=='2') {?>
<?php $value = get_partial('grid2', array('type' => 'edit', 'casolart' => $casolart,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($ajax=='3') {?>
<?php $value = get_partial('grid3', array('type' => 'edit', 'casolart' => $casolart,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }?>