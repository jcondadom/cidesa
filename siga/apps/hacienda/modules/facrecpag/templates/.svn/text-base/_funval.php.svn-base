<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 if($fcpagos->getEdopag()==''&& $fcpagos->getId()!=''){
     	    $bandera1="";

        }else{
            $bandera1="style=\"display:none;\"";
        }

?>
<div id="divfunval"  <?php echo $bandera1; ?> >
 <?php echo label_for('fcpagos[funval]', __('Funcionario  Validador:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{funval}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_tag($fcpagos, 'getFunval', array (
		'size' => 40,
		'readonly' => false,
		'control_name' => 'fcpagos[funval]',
	));
	echo $value ? $value : '&nbsp;'
?>
</div>
</div>