<?php $value = object_checkbox_tag($hcexacon, 'getCheck', array (
  'control_name' => 'hcexacon[check]',
  'onClick' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=4&codigo='+this.checked+'&titular='+$('hcexacon_cedemp').value"
)))); echo $value ? $value : '&nbsp;' ?>
