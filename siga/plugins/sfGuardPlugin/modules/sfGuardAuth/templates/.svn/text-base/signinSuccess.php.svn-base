<?php use_helper('Validation', 'I18N') ?>
<div class="ingSistema container" style="font-size: 16px;">
<div id="sf_guard_auth_form">
<?php echo form_tag('@sf_guard_signin') ?>

  <fieldset>
    <div class="ingHeader"> <b style="color: #fff">Ingrese los Datos</b></div>

    <div class="form-row" id="sf_guard_auth_username"  style="color: #fff">
      <?php
      echo form_error('username'), 
      label_for('username', __('usuario:')), //aqui se carga la verificacion
      input_tag('username', $sf_data->get('sf_params')->get('username'));
      ?>
    </div>

    <div class="form-row" id="sf_guard_auth_password"  style="color: #fff">
      <?php
      echo form_error('password'), 
        label_for('password', __('contraseña:')),
        input_password_tag('password');
      ?>
    </div>
    <div class="form-row" id="sf_guard_auth_remember"  style="color: #fff">
      <?php
      echo label_for('remember', __('Recordarme?')),
      checkbox_tag('remember');
      ?>
    </div>
  </fieldset>

  <?php 
  echo submit_tag(__('Entrar')), 
  link_to(__('¿Olvidó su contraseña?'), '@sf_guard_password', array('id' => 'sf_guard_auth_forgot_password')) 
  ?>
</form>
</div>
</div>