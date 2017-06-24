<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<table>
<tr>	
<th>
  <?php $value = object_input_tag($viasoltraterre, 'getCodempusu', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'viasoltraterre[codempusu]',
  'onBlur'=> remote_function(array(
	  'url'      => 'viasoltransterre/ajax',
	  'script' => true,
	  'complete' => 'AjaxJSON(request, json)',
	  'condition' => "$('viasoltraterre_codempusu').value != '' && $('id').value == ''",
	  'with' => "'ajax=4&cajtexmos=viasoltraterre_nomemp&esnoemp='+$('viasoltraterre_esnoemp').checked+'&codigo='+this.value"
	  ))
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
 <div id="cathojint">
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Viasolviatra_empleado/clase/Nphojint/frame/sf_admin_edit_form/obj1/viasoltraterre_codempusu/obj2/viasoltraterre_nomemp/campo1/codemp/campo2/nomemp/param1/'+$('viasoltraterre_esnoemp').checked+'",'','','botoncat')?>
 </div>
</th> 
<th>
 <div id="catnoemp">
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Viasolviatra_empleado/clase/Vianoemp/frame/sf_admin_edit_form/obj1/viasoltraterre_codempusu/obj2/viasoltraterre_nomemp/campo1/codemp/campo2/nomemp/param1/'+$('viasoltraterre_esnoemp').checked+'",'','','botoncat')?>
 </div>
</th> 
<th>
<?php $value = object_input_tag($viasoltraterre, 'getNomemp', array (
  'size' => 55,
  'disabled' => true,
  'control_name' => 'viasoltraterre[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>

<script type="text/javascript">
 if ($('viasoltraterre_esnoemp').checked==false)
 	$('catnoemp').hide();
 else
 	$('cathojint').hide();

 function MostraCat()
 {
 	 if ($('viasoltraterre_esnoemp').checked==true){
 	 	$('cathojint').hide();
 	 	$('catnoemp').show();
 	 }else{
 	 	$('cathojint').show();
 	 	$('catnoemp').hide();
 	 } 	
 }
</script>