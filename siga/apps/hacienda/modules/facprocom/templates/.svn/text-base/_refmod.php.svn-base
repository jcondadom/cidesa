
<?php
     if($fcprolic->getId()!=''){
     	        $bandera1="";

            }else{
                  $bandera1="style=\"display:none;\"";
            }




?>
<div id="negacion2" <?php echo $bandera1; ?>  >
  <?php echo label_for('fcprolic[refmod]', __('Referencia:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcprolic{refmod}')): ?> form-error<?php endif; ?>">
 <?php
   $value = object_input_tag($fcprolic, 'getRefmod', array (
  'size' => 10,
  'control_name' => 'fcprolic[refmod]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' 
 ?>
</div>

