<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodajupic',
  'getsecundario' => 'getNomfue',
  'campoprincipal' => 'codajupic',
  'camposecundario' => 'nomfue',
  'campobase' => 'id'
  ), 'Facdefespins_fcdefins', 'Fcfuepre'); ?>

