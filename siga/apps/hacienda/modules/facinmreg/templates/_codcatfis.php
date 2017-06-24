
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php


 echo Catalogo($fcreginm,4,array(
  'getprincipal' => 'getCodcatfis',
  'getsecundario' => 'getNomcatfis',
  //cajitas abajo
  'campoprincipal' => 'codcatfis',
  'camposecundario' => 'nomcatfis',
  'campobase' => 'id'
  ), 'Fcreginm_Fccatfis', 'Fccatfis','',''); ?>
