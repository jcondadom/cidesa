 <?php echo select_tag('opordpag[codfonant]', options_for_select(TsdeffonantPeer::getFondos(),$opordpag->getCodfonant(), 'include_custom=Seleccione uno'),array(
 'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'script'=>true,
   'with' => "'ajax=6&codigo='+this.value"
      ))
 )) ?>
