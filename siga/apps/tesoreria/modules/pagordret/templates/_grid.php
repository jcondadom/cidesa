<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" value="Retenciones" class="sf_admin_action_create" onClick="javascript:$('divgrid_ret').toggle();"/>
</li>
</ul>

<?php
	echo grid_tag_v2($opordpag->getObjeto());
?>