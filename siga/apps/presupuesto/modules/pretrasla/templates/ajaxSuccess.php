<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($ajaxs=='4') {?>
<?php $value = get_partial('grid_perdes', array('type' => 'edit', 'cptrasla' => $cptrasla,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
 <?php }elseif ($ajaxs=='5') {?>
 <?php $value = get_partial('grid_perhas', array('type' => 'edit', 'cptrasla' => $cptrasla,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
 <?php }else {?>
<?php $value = get_partial('grid', array('type' => 'edit', 'cptrasla' => $cptrasla,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
 <?php }?>
