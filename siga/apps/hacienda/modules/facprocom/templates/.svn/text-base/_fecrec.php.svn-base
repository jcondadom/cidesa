
<?php
     if($fcprolic->getId()==''){
     	        $bandera1="";

            }else{
                  $bandera1="style=\"display:none;\"";
            }




?>
<div id="negacion2" <?php echo $bandera1; ?>  >
  <?php echo label_for('fcprolic[fecrec]', __('Fecha:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcprolic{fecrec}')): ?> form-error<?php endif; ?>">
 <?php
  $value = object_input_date_tag($fcprolic, 'getFecrec', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',

  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcprolic[fecrec]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';
 ?>
</div>
