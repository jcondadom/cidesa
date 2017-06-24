<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$fafactur->getId())
{ ?>
<?php echo Catalogo($fafactur,32,array(
  'getprincipal' => 'getPuedph',
  'getsecundario' => 'getNompue',
  'campoprincipal' => 'puedph',
  'camposecundario' => 'nompue',
  'campobase' => 'puedph_id',
  ), 'Puerto_Fafactur', 'Fatippue', '', ''); ?>

<?php } else
{
	?>
<?php	$value = object_input_tag($fafactur, 'getPuedph' , array (
  'size' => 20,
  'control_name' => 'fafactur[puedph]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fafactur, 'getNompue', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'fafactur[nompue]',
)); echo $value ? $value : '&nbsp;';

}
?>