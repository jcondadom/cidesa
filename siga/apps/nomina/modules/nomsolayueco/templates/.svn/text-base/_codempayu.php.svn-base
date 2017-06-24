<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<table>
<tr>	
<th>
  <?php $value = object_input_tag($npsolayueco, 'getCodempayu', array (
  'size' => 20,
  'maxlength' => 16,
  'control_name' => 'npsolayueco[codempayu]',
  'onBlur'=> remote_function(array(
	  'url'      => 'nomsolayueco/ajax',
	  'script' => true,
	  'complete' => 'AjaxJSON(request, json)',
	  'condition' => "$('npsolayueco_codempayu').value != '' && $('id').value == ''",
	  'with' => "'ajax=2&cajtexmos=npsolayueco_nomemp&esnoemp1='+$('npsolayueco_esnoemp_S').checked+'&esnoemp2='+$('npsolayueco_esnoemp_N').checked+'&codigo='+this.value"
	  ))
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th>
 <div id="cathojint">
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Viasolviatra_empleado/clase/Nphojint/frame/sf_admin_edit_form/obj1/npsolayueco_codempayu/obj2/npsolayueco_nomemp/campo1/codemp/campo2/nomemp/param1/'+$('npsolayueco_esnoemp_N').checked+'",'','','botoncat')?>
 </div>
</th> 
<th>
 <div id="catnoemp">
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Viasolviatra_empleado/clase/Vianoemp/frame/sf_admin_edit_form/obj1/npsolayueco_codempayu/obj2/npsolayueco_nomemp/campo1/codempayu/campo2/nomemp/param1/'+$('npsolayueco_esnoemp_S').checked+'",'','','botoncat')?>
 </div>
</th> 
<th>
<?php $value = object_input_tag($npsolayueco, 'getNomemp', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'npsolayueco[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>

<script type="text/javascript">
 if ($('npsolayueco_esnoemp_S').checked==true)
 	$('catnoemp').hide();
 else if ($('npsolayueco_esnoemp_N').checked==true)
  $('cathojint').hide();
 else
 	$('catnoemp').hide();

</script>