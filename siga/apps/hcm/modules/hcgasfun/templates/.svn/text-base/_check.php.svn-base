<?php $value = object_checkbox_tag($hcgasfun, 'getCheck', array (
  'control_name' => 'hcgasfun[check]',
  'onClick' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=3&codigo='+this.checked+'&titular='+$('hcgasfun_cedemp').value"
)))); echo $value ? $value : '&nbsp;' ?>
