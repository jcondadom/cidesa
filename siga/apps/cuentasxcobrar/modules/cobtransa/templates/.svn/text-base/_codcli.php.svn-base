<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>



<?php 

$ajaxparams="+'&fecdes='+$('cobtransa_fecdes').value+'&centro='+$('cobtransa_codcenaco').value+'&fechas='+$('cobtransa_fechas').value+'&estado='+$('cobtransa_estado').value";

echo Catalogo($cobtransa,1,array(
  'getprincipal' => 'getCodcli',
  'getsecundario' => 'getNompro',
  'campoprincipal' => 'codcli',
  'camposecundario' => 'nompro',
  'campobase' => 'codpro',
  ), 'Rifcli_Cobdocume', 'Facliente', '', $ajaxparams,'grid'); ?>
