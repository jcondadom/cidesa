<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul class="sf_admin_actions">
<li class="float-center">
<?php echo submit_to_remote('Submit2', 'Abrir', array(
         'before'   => '$("faciemes_proceso").value="A";',
         'url'      => 'facciemes/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_create',)) ?>
</li>
<li class="float-center">
<?php echo submit_to_remote('Submit3', 'Cerrar', array(
         'before'   => '$("faciemes_proceso").value="C";',
         'url'      => 'facciemes/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_save',)) ?>    
</li>
</ul>

<script type="text/javascript" lang="Javascript">
$('trigger_faciemes_fecdes').hide();
$('trigger_faciemes_fechas').hide();
</script>