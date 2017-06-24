<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php $value = get_partial('gridperins', array('type' => 'edit', 'rhinscur' => $rhinscur,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>