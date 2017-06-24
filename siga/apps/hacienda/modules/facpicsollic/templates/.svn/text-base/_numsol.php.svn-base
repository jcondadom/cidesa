<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
if ($fcsollic->getId()=='')
{?>
  <?php $value = object_input_tag($fcsollic, 'getNumsol', array (
  'size' => 14,
  'control_name' => 'fcsollic[numsol]',
  'maxlength' => 10,
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",  
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 10 caracteres') ?></div>
<?php
}
else
{
?>
  <?php $value = object_input_tag($fcsollic, 'getNumsol', array (
  'size' => 14,
  'readonly' => 'readonly',
  'control_name' => 'fcsollic[numsol]',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Máximo 10 caracteres') ?></div>
<?php
}
?>

<script type="text/javascript">
function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(10, '0',0);}
     else{valor=valor.pad(10, '#',0);}

     $('fcsollic_numsol').value=valor;
   }
 }
</script>