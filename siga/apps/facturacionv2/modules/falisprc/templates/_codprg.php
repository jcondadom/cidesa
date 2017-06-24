 <?php echo select_tag('falisprc[codprg]', options_for_select(FadefprgPeer::getProgramasForCombo(),$falisprc->getCodprg(),'include_custom=Seleccione uno'),array(
   'onChange' => remote_function(array(
   'update' => 'divgrid',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=3&codigo='+this.value+'&codtipcli='+$('falisprc_codtipcli').value+'&conpag_id='+$('falisprc_conpag_id').value",
   'script' => true
      ))
 )) ?>
