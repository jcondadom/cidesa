<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<div id="sf_guard_auth_form" class="login">
  <div class="ingSistema" style="margin-top: 0px;"> <!-- Agregado-->
    <div class="ingHeader"> <!-- Agregado-->
      <p>Ingrese al Sistema</p>
    </div>
  <?php echo form_tag('@sf_guard_signin') ?>
    <div class="form-row" id="sf_guard_auth_username">
        <?php echo form_error('username') ?>
        
        <input id="username" name="username" class="input-block-level" type="text" placeholder="Usuario" style="width: 80%">
    </div>
    <div class="form-row" id="sf_guard_auth_password">
      <?php echo form_error('password') ?>
        <input id="password" name="password" class="input-block-level" type="password" placeholder="Contraseña" style="width: 80%">
    </div>
    <button class="btn" type="submit" style="font-family: 'stylo2'; font-size: 16px;" >Entrar</button>
    
  </form>
   <!-- <div>
        <input type="button" value="¿Olvido su contraseña?"  class="btn" href="#"/>
    </div>
    <div>
        <input type="button" value="Registrar Usuario"  class="btn" onclick="#"/>
    </div>--> 
    <br>
    <div ><?php echo link_to('¿Olvidó su contraseña?','', array('query_string' => 'm='.$app, 'class' =>"btn", 'style' =>'font-size:16px;')) ?></div>
    <div > <?php echo link_to('Registar Usuario','@apply', array('query_string' => 'm='.$app, 'class' =>"btn", 'style' =>'font-size:16px;')) ?>
    </div>
  </div>
</div>
