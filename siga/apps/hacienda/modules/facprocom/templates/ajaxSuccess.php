<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>

<?php $value = get_partial('grid', array('type' => 'edit', 'fcprolic' => $fcprolic,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>