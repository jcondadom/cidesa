 <?php echo select_tag('seggruapl[codapl]', options_for_select(AplicacionPeer::CargarModulos(),$seggruapl->getCodapl()),array(
  'onChange' => remote_function(array(
   'update' => 'divgrid',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'script' => true,
   'with' => "'ajax=2&codigo='+this.value+'&grupo='+$('seggruapl_codgru').value"
      ))
  )) ?>