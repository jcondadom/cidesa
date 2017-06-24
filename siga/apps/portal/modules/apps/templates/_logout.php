<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<div id="sf_guard_auth_form">
<form method="post" action="/portal_dev.php/logout">   
    <div class="ingSistema3">
<?php echo form_tag('@sf_guard_signout') ?>
        <div class="div">
            <h3 style="z-index: 30; color: #fff; text-align: center;">Bienvenido</h3>
		</div>
		<br>
        <div class="div" style="text-align: center;">
        	<h5><?php echo strtoupper ($usuario) ?> </h5>
    	</div>
    <button class="btn" style="font-family: 'stylo2'; font-size: 16px;" type="submit">Salir</button>
    </div>
</form>
</div>
