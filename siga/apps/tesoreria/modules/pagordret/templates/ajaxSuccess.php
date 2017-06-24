<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if ($ajaxs=='1') { ?>
<?php echo options_for_select($comboiva,'','include_custom=Seleccione uno'); ?>
<?php }else  if ($ajaxs=='2') { ?>
<?php echo options_for_select($comboislr,'','include_custom=Seleccione uno'); ?>
<?php }else  if ($ajaxs=='3') { ?>
<?php echo options_for_select($comboirs,'','include_custom=Seleccione uno'); ?>
<?php }else  if ($ajaxs=='4') { ?>
<?php echo options_for_select($comboimn,'','include_custom=Seleccione uno'); ?>
<?php } ?>