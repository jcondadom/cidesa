<?php $value = object_input_tag($bnregmue, 'getCodhas', array (
  'size' => 15,
  'maxlength' => 20,    
  'control_name' => 'bnregmue[codhas]',
  'onBlur'=> remote_function(array(
	  'url'      => 'bieajubielot/ajax',
	  'condition' => "$('bnregmue_codhas').value != ''",
	  'complete' => 'AjaxJSON(request, json)',
	  'with' => "'ajax=2&codact='+$('bnregmue_codact').value+'&cajtexcom=bnregmue_codhas&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Biedisactmuenew1/clase/Bnregmue/frame/sf_admin_edit_form/obj1/bnregmue_codhas/campo1/codmue')?>