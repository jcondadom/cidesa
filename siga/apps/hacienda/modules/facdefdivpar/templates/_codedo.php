<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
   $catparams="/param1/'+$('fcparroq_codpai').value+'";
?>
<?php
  $ajaxparams="+'&pais='+$('fcparroq_codpai').value";
?>
<?php if (!$fcparroq->getId()) { ?>
<?php echo Catalogo($fcparroq,2,array(
  'getprincipal' => 'getCodedo',
  'getsecundario' => 'getNomedo',
  'campoprincipal' => 'codedo',
  'camposecundario' => 'nomedo',
  'campobase' => 'codedo_id',
  ), 'Fcestado_Facdefdivmun', 'Fcestado', $catparams, $ajaxparams); ?>

<?php } else { 	?>
<?php	$value = object_input_tag($fcparroq, 'getCodedo' , array (
  'size' => 20,
  'control_name' => 'fcparroq[codedo]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;';

   echo '&nbsp;';

  $value = object_input_tag($fcparroq, 'getNomedo', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'fcparroq[nomedo]',
)); echo $value ? $value : '&nbsp;';

}?>
