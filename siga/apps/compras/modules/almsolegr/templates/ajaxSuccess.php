<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($ajaxs=='22') {?>

<?php
echo options_for_select($unidades,'');
 ?>
<?php }else {?> 
<?php echo grid_tag_v2($obj); ?>
<?php }?> 