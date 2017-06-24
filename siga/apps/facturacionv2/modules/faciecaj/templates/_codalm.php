<?php
     echo select_tag('faciecaj[codalm]',options_for_select($params['opciones'], $faciecaj->getCodalm(),'include_custom=Seleccione Uno...'), array(
   'onChange' => remote_function(array(
   'update' => 'combocaja',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&codigo='+this.value"
      ))));
?>
