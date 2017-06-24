<?php $value = object_checkbox_tag($hccarava, 'getCheck', array (
  'control_name' => 'hccarava[check]',
  'onClick' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=4&codigo='+this.checked+'&titular='+$('hccarava_cedemp').value"
)))); echo $value ? $value : '&nbsp;' ?>
