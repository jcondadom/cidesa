  <?php $value = object_input_tag($cpadidis, 'getRefadi', array (
  'size' => 20,
  'maxlength' => 8,
  'control_name' => 'cpadidis[refadi]',
  'onBlur'=> remote_function(array(
       'update'   => 'divmovimiento',
       'before'  => 'rellenar()',
       'url'      => 'preadidis/ajax',
       'condition' => "$('cpadidis_refadi').value != '' && $('cpadidis_refadi').value != '########'",
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=1&cajtexmos=cpadidis_desadi&cajtextot=cpadidis_totadi&codigo='+this.value+'&cajtexjus=cpadidis_justificacion'"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpsoladidis_Presoladidis/clase/Cpsoladidis/frame/sf_admin_edit_form/obj1/cpadidis_refadi/campo1/refadi')?>

<script>
function rellenar()
{
    if ($('cpadidis_refadi').value == ''){
        $('cpadidis_refadi').value = $('cpadidis_refadi').value.pad(8,'#',0);
    }else if ($('cpadidis_refadi').value.length != 8)
    {
        $('cpadidis_refadi').value = $('cpadidis_refadi').value.pad(8,'0',0);
    }
}

function formatoFecha(fecha)
{
    fec = fecha.split('/');
    ano = fec[0];
    mes = fec[1];
    dia = fec[2];

    $('cpadidis_fecadi').value = dia+'/'+mes+'/'+ano;
}
</script>
