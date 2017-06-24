 <?php echo select_tag('falisprc[conpag_id]', options_for_select(FaconpagPeer::getCondicionesForCombo(),$falisprc->getConpagId(),'include_custom=Seleccione uno'),array(
     'onChange' => remote_function(array(
   'update' => 'divgrid',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&codigo='+this.value+'&codtipcli='+$('falisprc_codtipcli').value+'&codprg='+$('falisprc_codprg').value",
   'script' => true
      ))
 )) ?>