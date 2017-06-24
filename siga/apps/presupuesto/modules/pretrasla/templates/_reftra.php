  <?php $value = object_input_tag($cptrasla, 'getReftra', array (
  'size' => 20,
  'maxlength' => 8,
  'readonly'  =>  $cptrasla->getId()!='' ? true : false ,
  'control_name' => 'cptrasla[reftra]',
  'onBlur'=> remote_function(array(
       'update'   => 'divgrid',
       'before'  => 'rellenar()',
       'url'      => 'pretrasla/ajax',
       'condition' => "$('cptrasla_reftra').value != '' && $('cptrasla_reftra').value != '########'",
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=1&cajtexmos=cptrasla_destra&cajtextot=cptrasla_tottra&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpsoltrasla_Presoltrasla/clase/Cpsoltrasla/frame/sf_admin_edit_form/obj1/cptrasla_reftra/campo1/reftra')?>

<script>
function rellenar()
{
    if ($('cptrasla_reftra').value == ''){
        $('cptrasla_reftra').value = $('cptrasla_reftra').value.pad(8,'#',0);
    }else if ($('cptrasla_reftra').value.length != 8)
    {
        $('cptrasla_reftra').value = $('cptrasla_reftra').value.pad(8,'0',0);
    }    
}

function formatoFecha(fecha)
{
    fec = fecha.split('/');
    ano = fec[0];
    mes = fec[1];
    dia = fec[2];

    $('cptrasla_fectra').value = dia+'/'+mes+'/'+ano;
}
</script>