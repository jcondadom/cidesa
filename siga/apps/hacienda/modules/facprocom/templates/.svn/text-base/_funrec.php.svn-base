<?php
     if($fcprolic->getId()==''){
     	        $bandera1="";

            }else{
                  $bandera1="style=\"display:none;\"";
            }




?>
<div id="negacion2" <?php echo $bandera1; ?>  >
  <?php echo label_for('fcprolic[funrec]', __('Funcionario:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcprolic{funrec}')): ?> form-error<?php endif; ?>">
 <?php
   $value = object_input_tag($fcprolic, 'getFunrec', array (
  'size' => 50,
  'control_name' => 'fcprolic[funrec]',
  'maxlength' => 30,
)); echo $value ? $value : '&nbsp;'
 ?>
</div>
