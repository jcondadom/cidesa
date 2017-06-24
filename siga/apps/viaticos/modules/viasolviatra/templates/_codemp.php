<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<table>
<tr>	
<th>
  <?php $value = object_input_tag($viasolviatra, 'getCodemp', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'viasolviatra[codemp]',
  'onBlur'=> remote_function(array(
	  'url'      => 'viasolviatra/ajax',
	  'script' => true,
	  'complete' => 'AjaxJSON(request, json)',
	  'condition' => "$('viasolviatra_codemp').value != '' && $('id').value == ''",
	  'with' => "'ajax=1&cajtexmos=viasolviatra_nomemp&esnoemp='+$('viasolviatra_esnoemp').checked+'&codigo='+this.value"
	  ))
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
 <div id="cathojint">
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Viasolviatra_empleado/clase/Nphojint/frame/sf_admin_edit_form/obj1/viasolviatra_codemp/obj2/viasolviatra_nomemp/campo1/codemp/campo2/nomemp/param1/'+$('viasolviatra_esnoemp').checked+'",'','','botoncat')?>
 </div>
</th> 
<th>
 <div id="catnoemp">
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Viasolviatra_empleado/clase/Vianoemp/frame/sf_admin_edit_form/obj1/viasolviatra_codemp/obj2/viasolviatra_nomemp/campo1/codemp/campo2/nomemp/param1/'+$('viasolviatra_esnoemp').checked+'",'','','botoncat')?>
 </div>
</th> 
<th>
<?php $value = object_input_tag($viasolviatra, 'getNomemp', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'viasolviatra[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>

<script type="text/javascript">
 if ($('viasolviatra_esnoemp').checked==false)
 	$('catnoemp').hide();
 else
 	$('cathojint').hide();

 function MostraCat()
 {
 	 if ($('viasolviatra_esnoemp').checked==true){
 	 	$('cathojint').hide();
 	 	$('catnoemp').show();
 	 }else{
 	 	$('cathojint').show();
 	 	$('catnoemp').hide();
 	 } 	
 }
</script>