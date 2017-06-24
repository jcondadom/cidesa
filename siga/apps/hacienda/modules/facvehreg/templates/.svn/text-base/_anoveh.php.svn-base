
<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<br>

<div id="divanoveh">
  <?php echo label_for('fcregveh[anoveh]', __('Año:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{anoveh}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcregveh, 'getAnoveh', array (
  'size' => 4,
  'control_name' => 'fcregveh[anoveh]',
  'onBlur' => "calcularEdad()"
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('') ?></div>
  </div>
</div>