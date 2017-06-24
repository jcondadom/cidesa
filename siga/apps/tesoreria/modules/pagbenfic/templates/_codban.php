<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
  echo Catalogo($opbenefi,4,array(
  'getprincipal' => 'getCodban',
  'getsecundario' => 'getDesban',
  'campoprincipal' => 'codban',
  'camposecundario' => 'desban',
  'tamanoprincipal' => '4',
  'campobase' => 'id',
  ), 'Almregpro_Cabanco', 'cabanco','','','');

?>
