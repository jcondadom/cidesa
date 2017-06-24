<?php echo select_tag('caordcom[tipmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$caordcom->getTipmon(),'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=16&cajtexmos=caordcom_valmon&codigo='+this.value"
      ))
  )) ?>
