  <?php $value = object_input_tag($casolart, 'getReqarthas', array (
  'size' => 8,
  'maxlength' => 8,
  'control_name' => 'casolart[reqarthas]',
  'onBlur'=> remote_function(array(
    'update' => 'divgrip',
    'url'      => 'almaprsolegr/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('casolart_reqarthas').value != ''",
    'script' => true,
    'with' => "'ajax=2&req1='+$('casolart_reqartdes').value+'&req2='+$('casolart_reqarthas').value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Casolart_Almaprsolart/clase/Casolart/frame/sf_admin_edit_form/obj1/casolart_reqarthas/campo1/reqart",'','','botoncat')?>