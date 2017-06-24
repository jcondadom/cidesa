<?php echo button_to_remote('Buscar',array(
   'update' => 'divGrid',
   'script' => true,
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&usodesde='+$('fcdeclar_usodesde').value+'&usohasta='+$('fcdeclar_usohasta').value"
      ),array()) ?>