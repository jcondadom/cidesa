<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php if (!$fcmunici->getId()) { ?>
<?php echo Catalogo($fcmunici,1,array(
  'getprincipal' => 'getCodpai',
  'getsecundario' => 'getNompai',
  'campoprincipal' => 'codpai',
  'camposecundario' => 'nompai',
  'campobase' => 'codpai_id',
  ), 'Fcpais_Facdefdivest', 'Fcpais', '', ''); ?>

<?php } else { 	?>
<?php	$value = object_input_tag($fcmunici, 'getCodpai' , array (
  'size' => 20,
  'control_name' => 'fcmunici[codpai]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fcmunici, 'getNompai', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fcmunici[nompai]',
)); echo $value ? $value : '&nbsp;';

}?>