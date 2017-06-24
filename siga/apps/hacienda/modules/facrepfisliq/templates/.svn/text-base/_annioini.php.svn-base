<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="divannioini">
  <?php echo label_for('fcrepfis[annioini]', __('Desde:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{annioini}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcrepfis, 'getAnnioini', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'fcrepfis[annioini]',
   'onBlur'=> remote_function(array(
     'update'   => 'divgrid',
     'url'      => 'facrepfisliq/ajax',
     'script'   => true,
     'complete' => 'AjaxJSON(request, json)',
     'condition' => "$('fcrepfis_feccie').value != '' && $('id').value == ''",
     'with' => "'ajax=2&codigo='+this.value+'&fecini='+$('fcrepfis_fecini').value+'&numlic='+$('fcrepfis_numlic').value+'&annioini='+$('fcrepfis_annioini').value+'&anniofin='+$('fcrepfis_anniofin').value+'&numlic='+$('fcrepfis_numlic').value",
     'submit' => 'sf_admin_edit_form',

)))); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Solo Números') ?></div>
  </div>
</div>