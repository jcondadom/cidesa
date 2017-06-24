 <?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>


 <?php

   $criterio="/param1/'+$('fcpagos_seleccion').value+'/param2/'+$('fcpagos_criterio').value+'";
   $ajaxparams="+'&seleccion='+$('fcpagos_seleccion').value+'&fecpag='+$('fcpagos_fecpag').value+'&numpag='+$('fcpagos_numpag').value+'&vienededeclaracion='+$('fcpagos_vienededeclaracion').value+'&feccor='+$('fcpagos_feccor').value+'&criterio='+$('fcpagos_criterio').value";
  echo Catalogo($fcpagos,1,array(
  'getprincipal' => 'getRifcon',
  'getsecundario' => 'getNomcon',
  // cajitasss
  'campoprincipal' => 'rifcon',
  'camposecundario' => 'nomcon',
  'campobase' => 'id',
  ), 'Facrecpag_Rifcon', 'Fcdeclar', $criterio,$ajaxparams,'divgriddetalles');

  ?>


