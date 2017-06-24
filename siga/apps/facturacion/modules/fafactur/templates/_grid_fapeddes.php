<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<ul class="sf_admin_actions">
      <li>
<input type="button" name="Submit" value="Marcar" onClick="marcarDespachos();"/>
</li>
<li>
<input type="button" name="Submit" value="Desmarcar" onClick="desmarcarDespachos();"/>
</li>
</ul>
<br>
<?
	echo grid_tag_v2($fafactur->getObj5());
?>
