<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="divanniofin">
  <?php echo label_for('fcrepfis[anniofin]', __('Hasta:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{anniofin}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcrepfis, 'getAnniofin', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'fcrepfis[anniofin]',
   'onBlur'=> remote_function(array(
     'update'   => 'divgrid',
     'url'      => 'facrepfisliq/ajax',
     'script'   => true,
     'complete' => 'AjaxJSON(request, json)',
     'condition' => "$('fcrepfis_anniofin').value != '' && $('id').value == ''",
     'with' => "'ajax=2&codigo='+this.value+'&numlic='+$('fcrepfis_numlic').value+'&annioini='+$('fcrepfis_annioini').value",

))
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Solo Números') ?></div>
  </div>
</div>
