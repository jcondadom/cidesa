<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php
	echo grid_tag_v2($opordpag->getObjret());
?>

<?php echo input_hidden_tag('totalmontorete', '') ?>
<div align="center">
  <?php echo link_to_function(image_tag('/images/salir.gif'), "salvarretenciones()") ?>
</div>