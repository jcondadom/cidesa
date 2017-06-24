<ul class="sf_admin_actions">
<li class="float-left">
<?php $apr =  $params[2];
	if ($apr=='S') { ?>
      <?php if (($cpcompro->getAprcom()=='N' or $cpcompro->getAprcom()=='') and $cpcompro->getStacom()!='N') { ?>
         <?php echo submit_to_remote('Submit2', 'Aprobar', array(
                  'update'   => 'comp',
                  'url'      => 'precompro/ajax?ajax=2',
                  'script'   => true,
                  'complete' => 'AjaxJSON(request, json)',
                  'submit' => 'sf_admin_edit_form',
                  ),array('class' => 'sf_admin_action_save')) ?>
      <?php } else { ?>
         <?php if ($cpcompro->getAprcom()=='S' and $cpcompro->getStacom()!='N'){ ?>
         <div class="form-error">
         	<h3 align="center">Este Documento ha sido Aprobado</h3>
         </div>
         <?php } ?>
      <?php } ?>
<?php } ?>
</li>
<li class="float-left">
<?php 
$desaprcom=H::getConfApp2('desaprcom', 'presupuesto', 'precompro');
if ($desaprcom=='S' and $cpcompro->getAprcom()=='S' and $cpcompro->getCausado()=='N') { ?>
<?php echo submit_to_remote('Submit2', 'DesAprobar', array(        
         'url'      => 'precompro/ajax?ajax=6',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('class' => 'sf_admin_action_save')) ?>
<?php } ?>
</li>
</ul>
<div id="comp">
</div>
