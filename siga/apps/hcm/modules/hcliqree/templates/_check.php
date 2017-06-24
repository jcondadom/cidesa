<?php $value = object_checkbox_tag($hcliqree, 'getCheck', array (
  'control_name' => 'hcliqree[check]',
  'onClick' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=4&codigo='+this.checked+'&titular='+$('hcliqree_cedemp').value"
)))); echo $value ? $value : '&nbsp;' ?>
