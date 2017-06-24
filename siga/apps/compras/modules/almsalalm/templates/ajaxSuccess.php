<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if ($ajaxs=='10'){?>
<?php echo options_for_select($unidades,''); ?>
<?php }else {?>
<?php echo options_for_select($lotes,$numlot,'include_custom=Seleccione...');?>
<?php }?>