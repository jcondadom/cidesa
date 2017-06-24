<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<? if ($ajax=='1') { ?>
<?php $value = get_partial('grid2', array('type' => 'edit', 'capdaoc' => $capdaoc,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<? }elseif ($ajax=='2') { ?>
<?php $value = get_partial('grid', array('type' => 'edit', 'capdaoc' => $capdaoc,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<? }elseif ($ajax=='3') { ?>
<?php $value = get_partial('grid3', array('type' => 'edit', 'capdaoc' => $capdaoc,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<? } ?>