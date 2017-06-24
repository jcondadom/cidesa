<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<ul class="sf_admin_actions" >
<li class="float-right">
<?php echo submit_to_remote('Submit2', 'Buscar', array(
         'url'      => 'tesesttra/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_list',)) ?>
</li>
</ul>