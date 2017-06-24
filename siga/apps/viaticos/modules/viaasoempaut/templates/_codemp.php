<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<table>
<tr>	
<th>
  <?php $value = object_input_tag($viaasoempaut, 'getCodemp', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'viaasoempaut[codemp]',
  'onBlur'=> remote_function(array(
	  'url'      => 'viaasoempaut/ajax',
	  'script' => true,
	  'complete' => 'AjaxJSON(request, json)',
	  'condition' => "$('viaasoempaut_codemp').value != '' && $('id').value == ''",
	  'with' => "'ajax=1&cajtexmos=viaasoempaut_nomemp&codigo='+this.value"
	  ))
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/viasolviatra_empleado/clase/Nphojint/frame/sf_admin_edit_form/obj1/viaasoempaut_codemp/obj2/viaasoempaut_nomemp/campo1/codemp/campo2/nomemp",'','','botoncat')?>
</th> 
<th>
<?php $value = object_input_tag($viaasoempaut, 'getNomemp', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'viaasoempaut[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
