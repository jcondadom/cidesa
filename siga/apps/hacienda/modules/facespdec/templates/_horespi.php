<div id="divhorespi" >
  <?php echo label_for('fcdeclar[horespi]', __('Hora Desde:'), 'class="required" id="label41" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcdeclar{horespi}')): ?> form-error<?php endif; ?>">

 <?php $value = object_input_tag($fcdeclar, 'getHorespi', array (
  'readOnly' => true,
  'size' => 10,
  'maxlength' => 10,
  'control_name' => 'fcdeclar[horespi]',
)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>