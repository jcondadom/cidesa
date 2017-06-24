 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php
   echo Catalogo($fcreginm,10,array(
  'getprincipal' => 'getRifrepant',
  'getsecundario' => 'getNomrepant',
  // cajitasss
  'campoprincipal' => 'rifrepant',
  'camposecundario' => 'nomrepant',
  'tamanoprincipal' => '10',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifcon', 'Fcconrep', '','',''); ?>
