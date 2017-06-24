<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $viasolviatra->getStatus2();?></font></strong></th>
  </tr>
</table>

<ul class="sf_admin_actions">
<li class="float-right">
<?php if ($viasolviatra->getId()!='') { ?>
  <input type="button" class="sf_admin_action_list" name="Submit" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>
</li>
</ul>