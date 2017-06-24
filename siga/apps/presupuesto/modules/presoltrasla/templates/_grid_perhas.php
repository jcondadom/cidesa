<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'tabs', 'Javascript', 'PopUp', 'Grid') ?>
<div style="padding-top: 40px">
<?php echo grid_tag_v2($cpsoltrasla->getObj4());?>

<ul class="sf_admin_actions">
<li>
<input type="button" name="Submit" class="sf_admin_action_save" value="Aplicar" onclick="javascript:salvarmontoperiodoshas();" />
</li>
</ul>
</div>
