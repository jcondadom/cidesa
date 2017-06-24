 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php

 /*/echo Catalogo($fcdeclar,2,array(
  'getprincipal' => 'getRifrepcon',
  'getsecundario' => 'getNomconrep',
  //cajitas abajo
  'campoprincipal' => 'rifrepcon',
  'camposecundario' => 'nomconrep',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifrep', 'fcconrep', '', '','','1');*/ ?>

<?php	$value = object_input_tag($fcdeclar, 'getRifrepcon' , array (
  'size' => 20,
  'control_name' => 'fcdeclar[rifrepcon]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fcdeclar, 'getNomconrep', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fcdeclar[nomconrep]',
)); echo $value ? $value : '&nbsp;';
?>