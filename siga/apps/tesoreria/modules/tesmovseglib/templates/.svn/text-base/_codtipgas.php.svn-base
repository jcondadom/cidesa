<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if ($tsmovlib->getId()=='')
{
 echo Catalogo($tsmovlib,11,array(
  'getprincipal' => 'getCodtipgas',
  'getsecundario' => 'getDestipgas',
  'campoprincipal' => 'codtipgas',
  'camposecundario' => 'destipgas',
  'campobase' => 'nptipgas_id'
  ), 'Nomina_Nptipgas', 'Nptipgas');

  }else
{
 echo object_input_hidden_tag($tsmovlib, 'getCodtipgas',array('control_name' => 'tsmovlib[codtipgas]')) ?>
  <?php $value = object_input_tag($tsmovlib, 'getCodtipgas', array (
  'size' => 16,
  'maxlength' => 16,
  'readonly'  =>   true,
  'control_name' => 'tsmovlib[codtipgas]',
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
  <?php $value = object_input_tag($tsmovlib, 'getDestipgas', array (
  'readonly' => true,
   'size' => 80,
  'control_name' => 'tsmovlib[destipgas]',
)); echo $value ? $value : '&nbsp;';
}
?>