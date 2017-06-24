<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php $value = get_partial('grip', array('type' => 'edit', 'cpcompro' => $cpcompro,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>