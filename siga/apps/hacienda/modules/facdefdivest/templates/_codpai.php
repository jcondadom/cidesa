<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php if (!$fcestado->getId()) { ?>
<?php echo Catalogo($fcestado,1,array(
  'getprincipal' => 'getCodpai',
  'getsecundario' => 'getNompai',
  'campoprincipal' => 'codpai',
  'camposecundario' => 'nompai',
  'campobase' => 'codpai_id',
  ), 'Fcpais_Facdefdivest', 'Fcpais', '', ''); ?>

<?php } else { 	?>
<?php	$value = object_input_tag($fcestado, 'getCodpai' , array (
  'size' => 20,
  'control_name' => 'fcestado[codpai]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fcestado, 'getNompai', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fcestado[nompai]',
)); echo $value ? $value : '&nbsp;';

}?>