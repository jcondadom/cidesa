<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <?php echo label_for('fcprolic[texpub]', __('Texto de Publicidad:'), 'class="required" id="label41" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcprolic{texpub}')): ?> form-error<?php endif; ?>">
 <?php
   $value = object_input_tag($fcprolic, 'getTexpub', array (
  'size' => 10,
  'control_name' => 'fcprolic[texpub]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;'
 ?>
  </div>
