<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
 if(count($precios)!=0) {
  echo options_for_select($precios,'','include_custom=Seleccione...');
 }
?>
<?php if ($ajaxs=='13') { ?>
<?php $value = get_partial('grid_fadescartpro', array('fafacturpro' => $fafacturpro)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='12') { ?>
<?php $value = get_partial('grid_fargoartpro', array('fafacturpro' => $fafacturpro)); echo $value ? $value : '&nbsp;'; ?>
<script type="text/javascript">
calcularTotalRecargos();
</script>
<?php } else if ($ajaxs=='14') { ?>
<?php $value = get_partial('grid_faartfacpro', array('fafacturpro' => $fafacturpro)); echo $value ? $value : '&nbsp;'; ?>
<?php } else if ($ajaxs=='15') { ?>
<?php $value = get_partial('grid_fapedartpro', array('fafacturpro' => $fafacturpro)); echo $value ? $value : '&nbsp;'; ?>
<?php } ?>