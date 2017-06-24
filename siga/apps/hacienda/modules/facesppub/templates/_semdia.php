
<div id="divsemdia" >
  <?php echo label_for('fcesplic[semdia]', __('Semana:'), 'class="required" id="label41" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcesplic{semdia}')): ?> form-error<?php endif; ?>">

 <?php $value = object_input_tag($fcesplic, 'getSemdia', array (
  'readOnly' => true,
  'size' => 10,
  'maxlength' => 10,
  'control_name' => 'fcesplic[semdia]',
)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>
