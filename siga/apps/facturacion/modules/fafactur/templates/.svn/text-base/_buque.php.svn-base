<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php if (!$fafactur->getId())
{ ?>
<?php echo Catalogo($fafactur,31,array(
  'getprincipal' => 'getBuque',
  'getsecundario' => 'getNombuq',
  'campoprincipal' => 'buque',
  'camposecundario' => 'nombuq',
  'campobase' => 'buque_id',
  ), 'Buque_Fafactur', 'Fatipbuq', '', ''); ?>

<?php } else
{
	?>
<?php	$value = object_input_tag($fafactur, 'getBuque' , array (
  'size' => 20,
  'control_name' => 'fafactur[buque]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fafactur, 'getNombuq', array (
  'size' => 80,
  'disabled' => true,
  'control_name' => 'fafactur[nombuq]',
)); echo $value ? $value : '&nbsp;';

}
?>