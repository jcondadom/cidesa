<?php
 if($fcregveh->getId()!=''){

?>
<div id="divrefmod">
  <?php echo label_for('fcregveh[refmod]', __('Referencia:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{refmod}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_tag($fcregveh, 'getRefmod', array (
		'size' => 10,
		'readonly' => false,
 		'control_name' => 'fcregveh[refmod]',
                'onBlur' => "javascript: valor=this.value; if (valor!='') {valor=valor.pad(10, '0',0);}else{valor=valor.pad(10, '#',0);};document.getElementById('fcregveh_refmod').value=valor;document.getElementById('fcregveh_refmod').disabled=false;",
                'onblur' => "Rvalor(this.valor);"

	));
	echo $value ? $value : '&nbsp;'
?>

  </div>


</div>
<?php }?>