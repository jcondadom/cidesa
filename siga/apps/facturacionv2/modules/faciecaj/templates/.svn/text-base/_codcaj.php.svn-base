<div id="combocaja">
<?php
    echo select_tag('faciecaj[codcaj]', options_for_select(FaapecajPeer::seleccionCaja($faciecaj->getCodalm()), $faciecaj->getCodcaj(),'include_custom=Seleccione Una...'), array(
   'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=2&codigo='+this.value",
   'script' => true
      ))));
?>
</div>
