<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

 echo Catalogo($fcdefins,1,array(
  'getprincipal' => 'getCodapu',
  'getsecundario' => 'getDescripcioncodapu',
  //cajitas abajo
  'campoprincipal' => 'codapu',
  'camposecundario' => 'descripcioncodapu',
  'campobase' => 'id'
  ), 'Facdefespins_fcdefins', 'Fcfuepre'); ?>


<script type="text/javascript" language="Javascript">
function numrupturas(id)
{
    if (id=='fcdefins_foract')
    {
        var aux=$(id).value.split("-");
        $('fcdefins_rupact').value=aux.length;
    }else if (id=='fcdefins_forveh') {
        var aux=$(id).value.split("-");
        $('fcdefins_rupveh').value=aux.length;
    }else if (id=='fcdefins_forcat') {
        var aux=$(id).value.split("-");
        $('fcdefins_rupcat').value=aux.length;
    }else if (id=='fcdefins_forubifis') {
        var aux=$(id).value.split("-");
        $('fcdefins_rupubifis').value=aux.length;
    }else if (id=='fcdefins_forubimag') {
        var aux=$(id).value.split("-");
        $('fcdefins_rupubimag').value=aux.length;
    }

}
</script>
