<?php echo select_tag('casolart[tipmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$casolart->getTipmon(),'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=4&cajtexmos=casolart_valmon&codigo='+this.value"
      ))
  )) ?>