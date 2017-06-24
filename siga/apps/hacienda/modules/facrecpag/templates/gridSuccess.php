<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

  <?php $value = get_partial('gridrecargdescto', array('type' => 'edit', 'fcpagos' => $fcpagos,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>



