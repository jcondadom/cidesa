<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

  <?php $value = get_partial('grid', array('type' => 'edit', 'fcregveh' => $fcregveh,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
