<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodpro',
  'getsecundario' => 'getDescripcioncodpro',
  'campoprincipal' => 'codpro',
  'camposecundario' => 'descripcioncodpro',
  'campobase' => 'id'
  ), 'Facdefespins_fcdefins', 'Fcfuepre'); ?>

