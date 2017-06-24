<div id="divhorespf" >
  <?php echo label_for('fcdeclar[horespf]', __('Hora Hasta:'), 'class="required" id="label41" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcdeclar{horespf}')): ?> form-error<?php endif; ?>">

 <?php $value = object_input_tag($fcdeclar, 'getHorespf', array (
  'readOnly' => true,
  'size' => 10,
  'maxlength' => 10,
  'control_name' => 'fcdeclar[horespf]',
)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>