<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php if (!$fafactur->getId())
{ ?>
<?php echo Catalogo($fafactur,30,array(
  'getprincipal' => 'getCodcon',
  'getsecundario' => 'getNomcon',
  'campoprincipal' => 'codcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'codcon_id',
  ), 'Faconsignatario_Fafactur', 'Faconsignatario', '', ''); ?>

<?php } else
{
	?>
<?php	$value = object_input_tag($fafactur, 'getCodcon' , array (
  'size' => 20,
  'control_name' => 'fafactur[codcon]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fafactur, 'getNomcon', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fafactur[nomcon]',
)); echo $value ? $value : '&nbsp;';

}
?>