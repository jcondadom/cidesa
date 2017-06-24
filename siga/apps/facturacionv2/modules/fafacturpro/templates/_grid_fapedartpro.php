<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php
	echo grid_tag_v2($fafacturpro->getObj3());
?>

<ul class="sf_admin_actions">
<li class="float-rigth">
<input id="ocul2" class="sf_admin_action_save" type="button" value="ocultar" onClick="ocul_ped_des();">
</li>
</ul>