<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajaxs=='3') { ?>
<?php $value = get_partial('grid', array('type' => 'edit', 'manregequ' => $manregequ,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php } else if ($ajaxs=='4') {  ?>
<?php $value = get_partial('grid2', array('type' => 'edit', 'manregequ' => $manregequ,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }  ?>
