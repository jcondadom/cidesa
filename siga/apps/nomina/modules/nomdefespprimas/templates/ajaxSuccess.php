<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajaxs=='1') { ?>
<?php $value = get_partial('primahijos', array('type' => 'edit', 'npprimashijos' => $npprimashijos,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }else if ($ajaxs=='2') { ?>
<?php $value = get_partial('becnivins', array('type' => 'edit', 'npprimashijos' => $npprimashijos,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
<?php }?>