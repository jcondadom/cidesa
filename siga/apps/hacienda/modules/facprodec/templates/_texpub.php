<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="divtexpub" >
  <?php echo label_for('fcdeclar[texpub]', __('Medidas en M2:'), 'class="required" id="label41" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcdeclar{texpub}')): ?> form-error<?php endif; ?>">

 <?php $value = object_input_tag($fcdeclar, 'getTexpub', array (
  'size' => 60,
  'maxlength' => 60,
  'control_name' => 'fcdeclar[texpub]',
)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>
