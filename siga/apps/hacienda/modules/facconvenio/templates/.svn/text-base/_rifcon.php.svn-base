 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

 <?php

   $criterio="/param1/'+$('fcconpag_seleccion').value+'/param2/'+$('fcconpag_criterio').value+'";
   $ajaxparams="+'&seleccion='+$('fcconpag_seleccion').value+'&criterio='+$('fcconpag_criterio').value";
  echo Catalogo($fcconpag,1,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  // cajitasss
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'id',
  ), 'Facrecpag_Rifcon', 'Fcdeclar', $criterio,$ajaxparams,'divgrid');

  ?>




