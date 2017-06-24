
 <?php
 $id="+'&codigo='+$('fcdeclar_zonahasta').value+'&zonadesde='+$('fcdeclar_zonadesde').value";
  echo Catalogo($fcdeclar,1,array(
  'getprincipal' => 'getCodzon',
  'getsecundario' => 'getDeszon',
  // cajitasss
  'campoprincipal' => 'zonahasta',
  'camposecundario' => 'deszonh',
  'campobase' => 'id',
  ), 'Facdecinmlot_zona', 'Fcvalinm', '', $id,'divGrid'); ?>