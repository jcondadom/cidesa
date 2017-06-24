 <?php echo select_tag('contabc[stacom]', options_for_select(array('' => 'Seleccione Uno ...', 'D' => 'Diferido', 'A' =>'Actualizado', 'T' => 'Todos'),$contabc->getStacom()),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'update' => 'divgrid',
   'script' => true,
   'with' => "'ajax=1&estatus='+this.value+'&tipcom='+$('contabc_tipcom').value+'&fecdes='+$('contabc_fecdes').value+'&fechas='+$('contabc_fechas').value"
      ))
  )) ?>