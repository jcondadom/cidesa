<?php $value = object_input_tag($caordcom, 'getOrdcomhas', array (
  'size' => 8,
  'maxlength' => 8,
  'control_name' => 'caordcom[ordcomhas]',
  'onBlur'=> remote_function(array(
  	'update' => 'divgrid',
    'url'      => 'almverordcom/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('caordcom_ordcomhas').value != ''",
    'script' => true,
    'with' => "'ajax=1&ordcom1='+$('caordcom_ordcomdes').value+'&ordcom2='+$('caordcom_ordcomhas').value+'&fec1='+$('caordcom_fecdes').value+'&fec2='+$('caordcom_fechas').value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/CaOrdCom_Almverordcom/clase/Caordcom/frame/sf_admin_edit_form/obj1/caordcom_ordcomhas/campo1/ordcom",'','','botoncat')?>