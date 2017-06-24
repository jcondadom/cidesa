<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<? if (($caordcom->getOrdcom()=='' || ($caordcom->getOrdcom()!='') && $caordcom->getCompro()=='N')) { ?>
<ul class="sf_admin_actions">
<li>
<input id="marrec" class="sf_admin_action_save" type="button" value="Marcar" onClick="marcarTodo();">
</li>
<li>
<input id="desmar" class="sf_admin_action_save" type="button" value="Desmarcar" onClick="desmarcarTodo();">
</li>
</ul>
<?php } ?>