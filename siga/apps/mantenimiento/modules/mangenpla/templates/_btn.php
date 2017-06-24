<ul class="sf_admin_actions">
<li class="float-left">
<?php	if ($mangenpla->getId()) { ?>
      <?php if ($mangenpla->getStaapr()=='N' or $mangenpla->getStaapr()=='') { ?>
         <?php echo submit_to_remote('Submit2', 'Aprobar Planificación', array(
                  'url'      => 'mangenpla/ajax',
                  'script'   => true,
                  'complete' => 'AjaxJSON(request, json)',
                  'submit' => 'sf_admin_edit_form',
                  ),array('class' => 'sf_admin_action_save')) ?>
      <?php }?>         
<?php } ?>
</li>
</ul>
