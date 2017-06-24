
 <?php
 $id="+'&codigo='+$('fcdeclar_usohasta').value+'&usodesde='+$('fcdeclar_usodesde').value";
  echo Catalogo($fcdeclar,1,array(
  'getprincipal' => 'getCoduso',
  'getsecundario' => 'getDesuso',
  // cajitasss
  'campoprincipal' => 'usohasta',
  'camposecundario' => 'desusoh',
  'campobase' => 'id',
  ), 'Facdecvehlot_uso', 'Fcusoveh', '', $id,'divGrid'); ?>