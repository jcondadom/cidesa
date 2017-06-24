<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php echo Catalogo($npasicaremp,0,array(
  'getprincipal' => 'getCodtipempnew',
  'getsecundario' => 'getDestipempnew',
  'campoprincipal' => 'codtipemp',
  'camposecundario'=> 'destipempnew',
  'campobase' => 'id',
  ), 'Npforasicaremp_Nptipemp', 'nptipemp', '', '' );
?>


