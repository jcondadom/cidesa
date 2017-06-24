<?php echo select_tag('tspagele[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$tspagele->getCodmon(),'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=10&cajtexmos=tspagele_valmon&codigo='+this.value"
      ))
  )) ?>
