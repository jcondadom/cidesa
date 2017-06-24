

<?php
     if($fcdeclar->getObservacion()==''){
     	        $bandera1="";

            }else{
                  $bandera1="style=\"display:none;\"";
            }

 
        

?>
<div id="negacion2" <?php echo $bandera1; ?>  >
  <?php echo label_for('fcdeclar[fecfin]', __('Fin del Periodo:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcdeclar{fecfin}')): ?> form-error<?php endif; ?>">
 <?php
  $value = object_input_date_tag($fcdeclar, 'getFecfin', array (
  //'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',
  'onBlur' => "Deuda();",
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcdeclar[fecfin]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';
 ?>
</div>

<script language="javascript">
     $$('.h2')[4].hide();
     $('divgridmulta').hide();

</script>