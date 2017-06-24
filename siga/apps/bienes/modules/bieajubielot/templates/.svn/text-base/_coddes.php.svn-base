<?php $value = object_input_tag($bnregmue, 'getCoddes', array (
  'size' => 15,
  'maxlength' => 30,    
  'control_name' => 'bnregmue[coddes]',
  'onBlur'=> remote_function(array(
	  'url'      => 'bieajubielot/ajax',
	  'condition' => "$('bnregmue_coddes').value != ''",
	  'complete' => 'AjaxJSON(request, json)',
	  'with' => "'ajax=2&codact='+$('bnregmue_codact').value+'&cajtexcom=bnregmue_coddes&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Biedisactmuenew1/clase/Bnregmue/frame/sf_admin_edit_form/obj1/bnregmue_coddes/campo1/codmue')?>