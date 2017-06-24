 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <?php /*
 $id="+'&numero='+$('fcdeclar_numsol').value+'&fecha='+$('fcdeclar_fecsol').value";

  echo Catalogo($fcdeclar,1,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  // cajitasss
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'id',
  ), 'Facpicsollic_Rifcon', 'Fcconrep', '', $id,'',1);*/ ?>


<?php	$value = object_input_tag($fcdeclar, 'getRifcon' , array (
  'size' => 20,
  'control_name' => 'fcdeclar[rifcon]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fcdeclar, 'getNomcon', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fcdeclar[nomcon]',
)); echo $value ? $value : '&nbsp;';
?>


