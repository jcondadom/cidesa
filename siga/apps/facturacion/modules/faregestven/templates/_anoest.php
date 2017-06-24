<?php echo select_tag('faestven[anoest]', options_for_select(Constantes::Empresa_Ano(),$faestven->getAnoest(),'include_custom=Seleccione'),array(
   'onChange' => remote_function(array(
   	   'update' => 'divgrid',
	   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
	   'complete' => 'AjaxJSON(request, json)',
	   'condition' => "$('faestven_anoest').value != ''",
	   'script' => true,
	   'with' => "'ajax=1&codigo='+this.value"
      ))
  )) ?>
