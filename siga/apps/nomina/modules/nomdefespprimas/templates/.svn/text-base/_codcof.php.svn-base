 <?php $value = object_input_tag($npprimashijos, 'getCodcof', array (
  'size' => 15,
  'maxlength' => 4,
  'control_name' => 'npprimashijos[codcof]',
  'onBlur'=> remote_function(array(
  	    'update' => 'divprimahijos',
	    'url'      => 'nomdefespprimas/ajax',
	    'complete' => 'AjaxJSON(request, json)',
	    'condition' => "$('npprimashijos_codcof').value != ''",
	    'with' => "'ajax=1&codigo='+this.value"
	    ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npprimashijos_Nomdefespprimas/clase/Npprimashijos/frame/sf_admin_edit_form/obj1/npprimashijos_codcof/campo1/codcof",'','','botoncat')?>