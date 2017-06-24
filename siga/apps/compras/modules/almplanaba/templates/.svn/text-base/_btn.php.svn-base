<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>
<ul class="sf_admin_actions" >
<li class="float-center">
<?php echo submit_to_remote('Submit2', 'Cargar Ordenes de Compra', array(
         'url'      => 'almplanaba/ajax?ajax=1',
         'script'   => true,
         'update'=> 'divgrid2',         
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('class' => 'sf_admin_action_list')) ?>
</li>
</ul>
