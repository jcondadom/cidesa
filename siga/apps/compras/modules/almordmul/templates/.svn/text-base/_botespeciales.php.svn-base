<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<ul class="sf_admin_actions">
<li>
<? if ($caordcom->getId()!='' and $caordcom->getAprobacion()=='S' and $caordcom->getCompro()=='N') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Compromiso', array(
         'url'      => 'almordmul/ajax',
         'script'   => true,
         'class' => 'sf_admin_action_save',
         'complete' => 'AjaxJSON(request, json)' )
         ,array('use_style' => 'true', 'class' => 'sf_admin_action_save')) ?>
<? }?>
</li>
<li>
<?php if ($caordcom->getId()!='') { ?>
  <input type="button" name="Submit" class="sf_admin_action_list" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>
</li>
</ul>

<div id="anul">
</div>	