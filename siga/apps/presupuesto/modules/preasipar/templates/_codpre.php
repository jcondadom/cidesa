<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
  $parametros="/param1/".$params[0];
        echo Catalogo($cpdeftit,1,array(
        'getprincipal' => 'getCodpre',
        'getsecundario' => 'getNompre',
        'campoprincipal' => 'codpre',
        'camposecundario' => 'nompre',
        'campobase' => 'id',), 'NconceptosCat_Asignar', 'npcatpre',$parametros,'','divgrid',0);
?>
