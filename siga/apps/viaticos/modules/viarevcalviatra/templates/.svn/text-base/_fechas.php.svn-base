<?php $value = object_input_date_tag($viacalviatra, 'getFechas', array (
  'control_name' => 'viacalviatra[fechas]',
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange' => remote_function(array(
   'update'   => 'grid',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&fechas='+this.value+'&fecdes='+$('viacalviatra_fecdes').value"
   ))
)); echo $value ? $value : '&nbsp;' ?>
