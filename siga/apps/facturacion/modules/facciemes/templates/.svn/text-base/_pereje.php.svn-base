 <?php echo select_tag('faciemes[pereje]', options_for_select(Constantes::ListaMeses(),$faciemes->getPereje(),'include_custom=Seleccione uno'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&codigo='+this.value"
      ))
  )) ?>
