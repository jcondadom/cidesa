<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($nphojint,10,array(
  'getprincipal' => 'getCodpro',
  'getsecundario' => 'getDespro',
  'campoprincipal' => 'codpro',
  'camposecundario' => 'despro',
  'campobase' => 'codpro_id',
  ), 'Catippro_Almordcom', 'Catippro', '', ''); ?>