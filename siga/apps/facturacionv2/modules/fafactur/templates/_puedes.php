<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$fafactur->getId())
{ ?>
<?php echo Catalogo($fafactur,33,array(
  'getprincipal' => 'getPuedes',
  'getsecundario' => 'getNompue2',
  'campoprincipal' => 'puedes',
  'camposecundario' => 'nompue2',
  'campobase' => 'puedes_id',
  ), 'Puerto_Fafactur', 'Fatippue', '', ''); ?>

<?php } else
{
	?>
<?php	$value = object_input_tag($fafactur, 'getPuedes' , array (
  'size' => 20,
  'control_name' => 'fafactur[puedes]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fafactur, 'getNompue2', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'fafactur[nompue2]',
)); echo $value ? $value : '&nbsp;';

}
?>