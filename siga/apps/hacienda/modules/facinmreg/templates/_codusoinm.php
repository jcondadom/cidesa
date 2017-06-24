<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcreginm,8,array(
  'getprincipal' => 'getCoduso',
  'getsecundario' => 'getNomusoinm',
  //cajitas abajo
  'campoprincipal' => 'codusoinm',
  'camposecundario' => 'nomusoinm',
  'campobase' => 'id'
  ), 'Fcreginm_Fcusoinm', 'fcusoinm','',''); ?>