<?php $value = object_input_tag($contabc, 'getCodtiptra', array (
  'size' => 8,
  'maxlength' => 8,
  'control_name' => 'contabc[codtiptra]',
  'onBlur'=> remote_function(array(
  	'update' => 'divgrid',
    'url'      => 'confinactcom/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('contabc_codtiptra').value != ''",
    'script' => true,
    'with' => "'ajax=1&codtiptra='+this.value+'&fec1='+$('contabc_fecdes').value+'&fec2='+$('contabc_fechas').value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/ConFinActCom_Cotiptra/clase/Cotiptra/frame/sf_admin_edit_form/obj1/contabc_codtiptra/campo1/codtiptra",'','','botoncat')?>