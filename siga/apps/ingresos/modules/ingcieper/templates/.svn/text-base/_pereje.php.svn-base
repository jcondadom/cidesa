<?php echo select_tag('cipereje[pereje]', options_for_select(CiperejePeer::Periodos(),$cipereje->getPereje(),'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&codigo='+this.value"
      ))
  )) ?>

