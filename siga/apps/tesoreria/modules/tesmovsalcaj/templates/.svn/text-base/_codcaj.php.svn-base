 <?php echo select_tag('tssalcaj[codcaj]', options_for_select(TsdefcajchiPeer::getCajas(),$tssalcaj->getCodcaj()),array(
   'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=5&codigo='+this.value"
      ))
 )) ?>
