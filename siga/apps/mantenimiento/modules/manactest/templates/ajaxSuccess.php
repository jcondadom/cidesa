<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajaxs=='2') { ?>
<?php $value = get_partial('grid', array('type' => 'edit', 'manactest' => $manactest,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($ajaxs=='3') {  ?>
<?php $value = get_partial('grid2', array('type' => 'edit', 'manactest' => $manactest,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }  ?>
