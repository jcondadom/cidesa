 <?php $value = object_input_tag($manactest, 'getCodact', array (
  'size' => 10,
  'control_name' => 'manactest[codact]',
  'maxlength' => 8,
  'onFocus' => 'readonly(this.id)',
  'onBlur'=> remote_function(array(
    'url'      => 'manactest/ajax',
    'script' => true,
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('manactest_codact').value != ''",
      'with' => "'ajax=1&cajtexmos=manactest_desact&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>

<?php if (!$manactest->getId()) echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Mantenimiento_Manactest/clase/Manactest/frame/sf_admin_edit_form/obj1/manactest_codact/campo1/codact','','','botoncat')?>