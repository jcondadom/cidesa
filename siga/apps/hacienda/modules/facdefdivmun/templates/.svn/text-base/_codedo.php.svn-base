<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $catparams="/param1/'+$('fcmunici_codpai').value+'";
?>
<?php
  $ajaxparams="+'&pais='+$('fcmunici_codpai').value";
?>
<?php if (!$fcmunici->getId()) { ?>
<?php echo Catalogo($fcmunici,2,array(
  'getprincipal' => 'getCodedo',
  'getsecundario' => 'getNomedo',
  'campoprincipal' => 'codedo',
  'camposecundario' => 'nomedo',
  'campobase' => 'codedo_id',
  ), 'Fcestado_Facdefdivmun', 'Fcestado', $catparams, $ajaxparams); ?>

<?php } else { 	?>
<?php	$value = object_input_tag($fcmunici, 'getCodedo' , array (
  'size' => 20,
  'control_name' => 'fcmunici[codedo]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fcmunici, 'getNomedo', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fcmunici[nomedo]',
)); echo $value ? $value : '&nbsp;';

}?>
