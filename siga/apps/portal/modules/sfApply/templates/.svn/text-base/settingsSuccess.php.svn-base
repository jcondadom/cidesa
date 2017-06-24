<?php use_helper('Validation') ?>
<h2 class="sf_apply_heading">Configuración de Cuenta</h2>
<?php echo form_tag('sfApply/settings', array('name' => 'sf_apply_settings', 'id' => 'sf_apply_settings')) ?>
<div class="sf_apply_row">
<label for="fullname">Nombre Completo: </label>
<div class="sf_apply_row_content">
<?php echo form_error('fullname') ?>
<?php echo input_tag('fullname', $sf_user->getGuardUser()->getProfile()->getFullname()) ?>
</div>
</div>
<?php echo submit_tag('Save') ?> 
<?php echo button_to('Cancel', '@homepage') ?>
</form>
<?php echo form_tag('sfApply/resetRequest', array('name' => 'sf_apply_reset_request', 'id' => 'sf_apply_reset_request')) ?>
<p>
  Presione en el siguiente botón para cambiar su password. por razones de seguridad
  recibiras un correo de confirmación que contendrá un enlace que servirá para
  completar el cambio de tu password.
</p>
<?php echo input_hidden_tag('username', $sf_user->getGuardUser()->getUsername()) ?>
<?php echo submit_tag('Cambiar Password') ?>
</form>
