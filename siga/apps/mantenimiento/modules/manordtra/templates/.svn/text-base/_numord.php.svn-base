 <?php $value = object_input_tag($manordtra, 'getNumord', array (
  'size' => 10,
  'control_name' => 'manordtra[numord]',
  'maxlength' => 8,
  'onFocus' => 'readonly(this.id)',
  'onBlur'=> remote_function(array(
    'url'      => 'manordtra/ajax',
    'script' => true,
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('id').value==''",
    'with' => "'ajax=6&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>

<?php if (!$manordtra->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Mantenimiento_Manordtra/clase/Manordtra/frame/sf_admin_edit_form/obj1/manordtra_numord/campo1/numord','','','botoncat')?>