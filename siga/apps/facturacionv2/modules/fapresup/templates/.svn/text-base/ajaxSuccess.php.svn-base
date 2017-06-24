<?php

?>

<?php //use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?
// echo grid_tag($obj);
?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>
<?php if($ajaxs=='5') { echo options_for_select($precios,'');?>
<?php }else if($ajaxs=='6') { echo select_tag('fapresup[faconpag_id]', options_for_select(FaconpagPeer::TipPagos($codprg,$cliente,$cod)),array())?>
<?php } else{ ?>
<?php $value = get_partial('grid', array('fapresup' => $fapresup)); echo $value ? $value : '&nbsp;'; ?>
<?php }?>