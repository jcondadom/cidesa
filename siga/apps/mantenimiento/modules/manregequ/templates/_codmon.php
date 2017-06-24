<?php echo select_tag('manregequ[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$manregequ->getCodmon(),'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&cajtexmos=manregequ_valmon&codigo='+this.value"
      ))
  )) ?>