<?php

?>

<?php //use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
// echo grid_tag($obj);
?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>
<?php if($ajaxs=='5') { echo options_for_select($precios,'');?>
<?php } else if ($ajaxs=='6') { ?>
<?php $value = get_partial('grid_fargopre', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='10') { ?>
<?php $value = get_partial('gridcon', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='12') { ?>
<?php echo options_for_select($unidades,''); ?>
<?php } else if ($ajaxs=='14') { ?>
<?php $value = get_partial('gridclau', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='15') { ?>
<?php $value = get_partial('gridmat', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='16') { ?>
<?php $value = get_partial('gridequ', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='17') { ?>
<?php $value = get_partial('gridman', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='22') { ?>
<?php $value = get_partial('gridser', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php } else{ ?>
<?php $value = get_partial('grid', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<script type="text/javascript">
monto_recargo()
monto_descto();
monto_total();
</script>
<?php }?>