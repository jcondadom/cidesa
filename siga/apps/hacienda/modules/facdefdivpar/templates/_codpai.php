<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php if (!$fcparroq->getId()) { ?>
<?php echo Catalogo($fcparroq,1,array(
  'getprincipal' => 'getCodpai',
  'getsecundario' => 'getNompai',
  'campoprincipal' => 'codpai',
  'camposecundario' => 'nompai',
  'campobase' => 'codpai_id',
  ), 'Fcpais_Facdefdivest', 'Fcpais', '', ''); ?>

<?php } else { 	?>
<?php	$value = object_input_tag($fcparroq, 'getCodpai' , array (
  'size' => 20,
  'control_name' => 'fcparroq[codpai]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fcparroq, 'getNompai', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fcparroq[nompai]',
)); echo $value ? $value : '&nbsp;';

}?>