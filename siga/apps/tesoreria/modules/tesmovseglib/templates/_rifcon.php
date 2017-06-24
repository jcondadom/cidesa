<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($tsmovlib->getId()=='')
{
 echo Catalogo($tsmovlib,10,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'ciconrep_id'
  ), 'Opbenefi_Pagemiord', 'opbenefi');

  }else
{
 echo object_input_hidden_tag($tsmovlib, 'getRifcon',array('control_name' => 'tsmovlib[rifcon]')) ?>
  <?php $value = object_input_tag($tsmovlib, 'getRifcon', array (
  'size' => 16,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'tsmovlib[rifcon]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($tsmovlib, 'getNomcon', array (
  'readonly' => true,
   'size' => 80,
  'control_name' => 'tsmovlib[nomcon]',
)); echo $value ? $value : '&nbsp;';
}
?>
