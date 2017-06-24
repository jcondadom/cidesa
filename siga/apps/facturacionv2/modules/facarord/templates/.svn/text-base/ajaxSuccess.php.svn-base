<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<?php if($ajaxs=='5') {
 if(count($precios)!=0) {
  $keys = array_keys($precios);
  echo options_for_select($precios,$keys[0]);
} else{
echo options_for_select($precios,'');
}?>
<?php } else if ($ajaxs=='6') { ?>
<?php echo select_tag('facarord[conpag]', options_for_select(FaconpagPeer::TipPagos($codprg,$tipcte,$concre),$facarord->getConpag()),array()) ?>
<?php } else if ($ajaxs=='16') { ?>

<?php } else if ($ajaxs=='17') { ?>

<?php } else if ($ajaxs=='18') { ?>

<?php } else{ ?>

<?php }?>


