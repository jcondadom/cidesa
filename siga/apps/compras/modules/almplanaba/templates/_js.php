<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript" lang="JavaScript">
$('divgrid2').hide(); $$('.sf_admin_action_save')[0].hide();
$('divgrid3').hide(); $$('.sf_admin_action_save')[1].hide();

var consulta='<?php echo $capdaoc->getId()?>';
if (consulta!="")
{
    $$('.h2')[1].hide();
    $('divFiltros').hide();
    $$('.sf_admin_action_list')[0].hide();
}

</script>