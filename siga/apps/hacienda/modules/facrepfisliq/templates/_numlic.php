 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

 <?php
 $id="+'&fecha='+$('fcrepfis_fecrep').value";
   echo Catalogo($fcrepfis,1,array(
  'getprincipal' => 'getNumlic',
  'getsecundario' => 'getNomneg',
  // cajitasss
  'campoprincipal' => 'numlic',
  'camposecundario' => 'nomneg',
  'tamanoprincipal' => '10',
  'campobase' => 'id',
  ), 'Facrepfisliq_Numlic', 'fcsollic', '','',''); ?>
