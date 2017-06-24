<?php

?>

<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid', 'Javascript') ?>
<?php if($ajaxs=='5') { if(count($precios)!=0) {
	$keys = array_keys($precios);
  echo options_for_select($precios,$keys[0]);
} else{
echo options_for_select($precios,'');
}?>
<?php }else if($ajaxs=='9') { echo select_tag('fapedido[conpag_id]', options_for_select(FaconpagPeer::TipPagos($codprg,$cliente,$cod)),array())?>
<?php } else{ ?>
<?php $value = get_partial('grid', array('fapedido' => $fapedido)); echo $value ? $value : '&nbsp;'; ?>
<?php }?>

