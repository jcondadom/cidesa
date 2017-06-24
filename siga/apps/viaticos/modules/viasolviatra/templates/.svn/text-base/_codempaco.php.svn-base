<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if (H::getConfApp2('beneficiario', 'viaticos', 'viasolviatra')=='S')
{ ?>
<?php echo Catalogo($viasolviatra,2,array(
  'getprincipal' => 'getCodempaco',
  'getsecundario' => 'getNomempaco',
  'campoprincipal' => 'codempaco',
  'camposecundario' => 'nomempaco',
  'campobase' => 'id',
  ), 'Viasolviatra_empleado',  'opbenefi',  '',  '',  '');
?>
<?php }else{ ?>
<?php	echo Catalogo($viasolviatra,2,array(
  'getprincipal' => 'getCodempaco',
  'getsecundario' => 'getNomempaco',
  'campoprincipal' => 'codempaco',
  'camposecundario' => 'nomempaco',
  'campobase' => 'id',
  ), 'Viasolviatra_empleado',  'nphojint',  '',  '',  '');
}
?>