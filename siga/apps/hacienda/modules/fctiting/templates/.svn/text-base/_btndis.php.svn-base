<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<ul class="sf_admin_actions">
<li>
<?php echo submit_to_remote('Submit2', 'Distribuir', array(
         'update'   => 'divgrid',
         'url'      => 'fctiting/ajax',
         'script'   => true,
         'condition' => 'confirm("Desea Distribuir El monto entre los Periodos?")',
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('use_style' => 'true', 'class' => 'sf_admin_action_list',)) ?>
</li>
</ul>