 <?php $value = object_input_tag($mantarpro, 'getCodtar', array (
  'size' => 10,
  'control_name' => 'mantarpro[codtar]',
  'maxlength' => 8,
  'onFocus' => 'readonly(this.id)',
  'onBlur'=> remote_function(array(
    'url'      => 'mantarpro/ajax',
    'script' => true,
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('mantarpro_codtar').value != ''",
      'with' => "'ajax=1&cajtexmos=mantarpro_destar&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>

<?php if (!$mantarpro->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Mantenimiento_Mantarpro/clase/Mantarpro/frame/sf_admin_edit_form/obj1/mantarpro_codtar/campo1/codtar','','','botoncat')?>