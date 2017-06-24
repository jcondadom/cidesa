 <?php echo select_tag('falisprc[codtipcli]', options_for_select(FatipctePeer::TiposCliente(),$falisprc->getCodtipcli(),'include_custom=Seleccione uno'),array(
  'onChange' => remote_function(array(
   'update' => 'divgrid',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=2&codigo='+this.value+'&conpag_id='+$('falisprc_conpag_id').value+'&codprg='+$('falisprc_codprg').value",
   'script' => true
      ))
 )) ?>