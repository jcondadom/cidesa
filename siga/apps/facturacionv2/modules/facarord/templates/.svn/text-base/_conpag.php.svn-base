<div id="comboconpag">

<?php if($facarord->getConpag()=='' && isset($params['fadefcaj'])) : ?>
  <?php echo input_tag('facarord[desconpag]', $params['fadefcaj']->getDesconpag(), array('readonly' => true, 'id' => 'facarord_desconpag', 'size' => 70)) ?>
  <?php echo input_hidden_tag('facarord[conpag]', $params['fadefcaj']->getConpagpreId(), array('id' => 'facarord_conpag')) ?>
<?php else: ?>
  <?php echo select_tag('facarord[conpag]', options_for_select(FaconpagPeer::TipPagos(),$facarord->getConpag()=='' ? $params['fadefcaj']->getCodpagpreId() : $facarord->getConpag()),$facarord->getConpag()=='' ? array('disabled' => true) : array()) ?>
<?php endif; ?>
</div>