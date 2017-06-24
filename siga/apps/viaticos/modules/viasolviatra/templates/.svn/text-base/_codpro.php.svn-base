<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
if (H::getConfApp2('catprofor', 'compras', 'almordcom')=='S')
{ ?>
<?php echo Catalogo($viasolviatra,16,array(
  'getprincipal' => 'getCodpro',
  'getsecundario' => 'getDespro',
  'campoprincipal' => 'codpro',
  'camposecundario' => 'despro',
  'campobase' => 'id',
  ), 'Fordefpry_Forpoa',  'Fordefpry',  '',  '',  '');
?>
<?php }else{ ?>
<?php echo Catalogo($viasolviatra,16,array(
  'getprincipal' => 'getCodpro',
  'getsecundario' => 'getDespro',
  'campoprincipal' => 'codpro',
  'camposecundario' => 'despro',
  'campobase' => 'id',
  ), 'Catippro_Almordcom',  'Catippro',  '',  '',  '');

?>
<?php } ?>