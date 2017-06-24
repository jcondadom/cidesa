<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajaxs=='1') { ?>
<?php $value = get_partial('gridactcom', array('type' => 'edit', 'fcdeclar' => $fcdeclar,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

<?php }else  if ($ajaxs=='5'){ ?>
<?php $value = get_partial('griddisdeu', array('type' => 'edit', 'fcdeclar' => $fcdeclar,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

<?php } ?>
