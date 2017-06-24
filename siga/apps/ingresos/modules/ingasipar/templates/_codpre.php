<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
  $parametros="/param1/".$params[0];
        echo Catalogo($cideftit,1,array(
        'getprincipal' => 'getCodpre',
        'getsecundario' => 'getNompre',
        'campoprincipal' => 'codpre',
        'camposecundario' => 'nompre',
        'campobase' => 'id',), 'Cicatpre_Asignar', 'cicatpre',$parametros,'','divgrid',0);
?>
