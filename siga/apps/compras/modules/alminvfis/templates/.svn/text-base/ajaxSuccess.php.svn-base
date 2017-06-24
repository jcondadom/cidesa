<?php

?>

<?php use_helper('Object', 'Validation', 'Javascript', 'Grid', 'SubmitClick') ?>
<?
if ($ajax=='1') { ?>
<div id="grid">
<?php echo grid_tag($obj); ?>
</div>
<?php } else if ($ajax=='2') { ?>
<div id="gridubi">
<div id="periodos">
<?php echo grid_tag($objAlmUbi); ?>
<?php echo input_hidden_tag('fila', '') ?>
<?php echo input_hidden_tag('totalubi', '') ?>
<?php echo input_hidden_tag('totalubi2', '') ?>
<?php echo input_hidden_tag('totalm2', '') ?>

<div align="center">
<?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontos()") ?>
</div>
</div>
</div>
<? } ?>
