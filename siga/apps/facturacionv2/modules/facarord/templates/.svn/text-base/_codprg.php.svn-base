
<?php if($facarord->getCodprg()=='' && isset($params['fadefcaj'])) : ?>
  <?php echo input_tag('facarord[desprg]', $params['fadefcaj']->getDesprg(), array('readonly' => true, 'id' => 'facarord_desprg', 'size' => 70)) ?>
  <?php echo input_hidden_tag('facarord[codprg]', $params['fadefcaj']->getCodprg(), array('id' => 'facarord_codprg')) ?>
<?php else: ?>
  <?php echo select_tag('facarord[codprg]', options_for_select(FadefprgPeer::getProgramasForCombo(),$facarord->getCodprg() ), array()) ?>
<?php endif; ?>

