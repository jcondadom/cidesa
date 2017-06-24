<?php $value = object_input_tag($bnregmue, 'getCodact', array (
  'size' => 15,
  'control_name' => 'bnregmue[codact]',
  'maxlength' => 30,    
  'onBlur'=> remote_function(array(
    'url'      => 'bieajubielot/ajax',
    'condition' => "$('bnregmue_codact').value != ''",
    'complete' => 'AjaxJSON(request, json)',
    'with' => "'ajax=1&cajtexcom=bnregmue_codact&codigo='+this.value",
)),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Biedisactmuenew/clase/Bnregmue/frame/sf_admin_edit_form/obj1/bnregmue_codact/campo1/codact')?>