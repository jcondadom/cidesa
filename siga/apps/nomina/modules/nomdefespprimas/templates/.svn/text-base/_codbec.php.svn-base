 <?php $value = object_input_tag($npprimashijos, 'getCodbec', array (
  'size' => 15,
  'maxlength' => 4,
  'control_name' => 'npprimashijos[codbec]',
  'onBlur'=> remote_function(array(
  	    'update' => 'divbecnivins',
	    'url'      => 'nomdefespprimas/ajax',
	    'complete' => 'AjaxJSON(request, json)',
	    'condition' => "$('npprimashijos_codbec').value != ''",
	    'with' => "'ajax=2&codigo='+this.value"
	    ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Npbecnivins_Nomdefespprimas/clase/Npbecnivins/frame/sf_admin_edit_form/obj1/npprimashijos_codbec/campo1/codbec",'','','botoncat')?>