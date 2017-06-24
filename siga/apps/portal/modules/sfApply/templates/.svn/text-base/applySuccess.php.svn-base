<?php
// Override the login slot so that we don't get a login prompt on the
// apply page. The user can cancel if they want to do that, and it
// prevents problems with validation and fillin. 0.6

if(!empty($_GET['m'])){
    $_SESSION['modulo']=   $_GET['m'];
}
     
   

?>
<?php
// Override the login slot so that we don't get a login prompt on the
// apply page. The user can cancel if they want to do that, and it
// prevents problems with validation and fillin. 0.6
 if (!isset($nombre)){ 
    $nombre = ''; 

}
if (!isset($email)){ 
    $email = ''; 
}
if (!isset($institucion)){ 
    $institucion = ''; 
}
?>
<?php slot('login') ?>
<?php end_slot() ?>
<?php use_helper('Validation') ?>
<?php echo form_tag('sfApply/apply', array('name' => 'sf_apply_apply', 'id' => 'sf_apply_apply')) ?>
<?php include_partial('apps/titulo', array('app' => $modulo)); ?>
<div style="font-size:16px; height:500px;">
<div class="span3 well offset3 registro ingSistema2 " style="color: #fff">
    <div class="ingHeader"><h3>Crear Cuenta</h3></div>
    <div class="sf_apply_row">
        <!-- <label for="fullname">Nombre Completo: </label> -->
        <div class="sf_apply_row_content">
            <?php echo form_error('fullname') ?>
            <input id="fullname" name="fullname" class="input-block-level" type="text" placeholder="Nombre y Apellido" value="<?php echo $nombre ?>">
        </div>
    </div>
    
    <div class="sf_apply_row">
        <!-- <label for="email">Email: </label> -->
        <div class="sf_apply_row_content">
            <?php echo form_error('email') ?>
            <input id="email" name="email" class="input-block-level" type="text" placeholder="Email" value="<?php echo $email ?>">
        </div>
    </div>
    
    <div class="sf_apply_row">
        <div class="sf_apply_row_content">
            <?php echo form_error('institution') ?>
            <input id="institution" name="institution" class="input-block-level" type="text" placeholder="Empresa o Persona Natural" value="<?php echo $institucion ?>">
        </div>
    </div>
    
    
    <span class="help-block" style="margin-bottom: -5px;color: #fff;">Tipo Usuario:</span>
    <label class="radio inline" style="font-size:16px;" >
      <input type="radio" name="optionsRadios" id="optionsRadios" value="Publica" checked>
      Publica
    </label>
    <label class="radio inline" style="font-size:16px;" >
      <input type="radio" name="optionsRadios" id="optionsRadios" value="Privada">
      Privada
    </label>
    <label class="radio inline" style="font-size:16px;" >
      <input type="radio" name="optionsRadios" id="optionsRadios" value="Mixta">
      Mixta
    </label>
    
    <div class="sf_apply_row">
    <span class="help-block" style="margin-bottom: 1px;color: #fff;">Pais:</span>
    
    <select id="pais" name="pais" class="span3">
        
        <option value="venezuela">Venezuela</option>
        <option value="EEUU">EEUU</option>
        <option value="mexico">Mexico</option>
        <option value="cuba">Cuba</option>
    </select>
    </div>
    <div class="sf_apply_row">
        <span class="help-block" style="margin-bottom: 1px; color: #fff">Comentario:</span>
        <textarea id="comentario" name="comentario" rows="3"></textarea>
    </div>
    
    <div class="sf_apply_submit_row">
        <label class="checkbox" style="font-size:16px;">
          <input id="information" name="information" type="checkbox" checked="true">
          ¿Recibir boletines informativos?
        </label>
    </div>
    
    <div class="sf_apply_submit_row" align="center">
        <button class="btn" style="font-family: 'stylo2'; font-size:16px;">Registrar</button>
        <?php echo link_to('Cancelar','@apps', array('query_string' => 'm='.$_SESSION['modulo'], 'class' => 'btn', 'style' =>'font-size:16px;')) ?>
    </div>
    
</form>
</div>
    <div class="sf_apply_row">            
        <div class="sf_apply_row_content">
            <?php echo form_error('password') ?>
            <input id="password" name="password" class="input-block-level" type="password" placeholder="Contrasena" value="CIDESA" style="visibility: hidden;">
        </div>
    </div>
    <div class="sf_apply_row">
        <div class="sf_apply_row_content">
            <input id="password2" name="password2"class="input-block-level" type="password" placeholder="Confirme Contrasena" value="CIDESA" style="visibility: hidden;">
        </div>
    </div>
</div>