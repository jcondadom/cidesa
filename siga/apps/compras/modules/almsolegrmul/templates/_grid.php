<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<? echo grid_tag_v2($casolart->getGrid());?>

<ul class="sf_admin_actions">
<li>
<?php echo submit_to_remote('Submit2', 'Generar Detalle Solicitudes', array(
         'url'      => 'almsolegrmul/ajax',
         'update' => 'divgrid3',
         'script'   => true,
         'class' => 'sf_admin_action_save',
         'complete' => 'AjaxJSON(request, json)' )
         ,array('use_style' => 'true', 'class' => 'sf_admin_action_save')) ?>
</li>
</ul>