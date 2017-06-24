<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php if($ajax=='1') : ?>
<?php
    echo select_tag('faciecaj[codcaj]', options_for_select(FaapecajPeer::seleccionCaja($almacen), $faciecaj->getCodcaj(),'include_custom=Seleccione Una...'), array(
   'onChange' => remote_function(array(
   'update' => 'divgridm',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=2&codigo='+this.value",
   'script' => true
      ))));
?>
<?php elseif($ajax=='2') : ?>

<?php echo include_partial('gridm',array('params' => $params)) ?>

<?php endif; ?>