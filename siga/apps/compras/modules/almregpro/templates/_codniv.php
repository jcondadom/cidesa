<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  echo Catalogo($caprovee,0,array(
  'getprincipal' => 'getCodniv',
  'getsecundario' => 'getDesniv',
  'campoprincipal' => 'codniv',
  'camposecundario' => 'desniv',
  'tamanoprincipal' => '4',
  'campobase' => 'id',
  ), 'Compras_Canivconsnc', 'canivconsnc','','','');


?>
