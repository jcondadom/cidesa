
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcreginm,5,array(
  'getprincipal' => 'getCodcarinm',
  'getsecundario' => 'getNomcarinm',
  //cajitas abajo
  'campoprincipal' => 'codcarinm',
  'camposecundario' => 'nomcarinm',
  'tamanoprincipal' => '3',
  'campobase' => 'id'
  ), 'Fcreginm_Fccarinm', 'fccarinm','',''); ?>