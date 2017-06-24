<?php $value = object_checkbox_tag($hcregconhcm, 'getCheck', array (
  'control_name' => 'hcregconhcm[check]',
  'onClick' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=4&codigo='+this.checked+'&titular='+$('hcregconhcm_cedemp').value"
)))); echo $value ? $value : '&nbsp;' ?>
