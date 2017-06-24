  <?php $value = object_input_tag($casolart, 'getReqartdes', array (
  'size' => 8,
  'maxlength' => 8,
  'control_name' => 'casolart[reqartdes]',
  'onBlur'=> remote_function(array(
  	'update' => 'divgrip',
    'url'      => 'almaprsolegr/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('casolart_reqartdes').value != ''",
    'script' => true,
    'with' => "'ajax=2&req1='+$('casolart_reqartdes').value+'&req2='+$('casolart_reqarthas').value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Casolart_Almaprsolart/clase/Casolart/frame/sf_admin_edit_form/obj1/casolart_reqartdes/campo1/reqart",'','','botoncat')?>