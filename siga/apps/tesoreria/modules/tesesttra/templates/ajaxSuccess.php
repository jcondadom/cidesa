<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajaxs=='1') {?>
<?php $value = get_partial('grid1', array('type' => 'edit', 'opdefemp' => $opdefemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else if ($ajaxs=='2') {?>
<?php $value = get_partial('grid2', array('type' => 'edit', 'opdefemp' => $opdefemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else if ($ajaxs=='3') {?>
<?php $value = get_partial('grid3', array('type' => 'edit', 'opdefemp' => $opdefemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else if ($ajaxs=='4') {?>
<?php $value = get_partial('grid4', array('type' => 'edit', 'opdefemp' => $opdefemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else if ($ajaxs=='5') {?>
<?php $value = get_partial('grid5', array('type' => 'edit', 'opdefemp' => $opdefemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else if ($ajaxs=='6') {?>
<?php $value = get_partial('grid6', array('type' => 'edit', 'opdefemp' => $opdefemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else if ($ajaxs=='7') {?>
<?php $value = get_partial('grid7', array('type' => 'edit', 'opdefemp' => $opdefemp,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }?>