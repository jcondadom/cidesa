  <?php $value = object_input_tag($cpcompro, 'getRefcomd', array (
  'size' => 8,
  'maxlength' => 8,
  'control_name' => 'cpcompro[refcomd]',
  'onBlur'=> remote_function(array(
  	'update' => 'divgrip',
    'url'      => 'preaprcom/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('cpcompro_refcomd').value != ''",
    'script' => true,
    'with' => "'ajax=1&ref1='+$('cpcompro_refcomd').value+'&ref2='+$('cpcompro_refcomh').value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpcompro_preaprcom/clase/Cpcompro/frame/sf_admin_edit_form/obj1/cpcompro_refcomd/campo1/refcom')?>