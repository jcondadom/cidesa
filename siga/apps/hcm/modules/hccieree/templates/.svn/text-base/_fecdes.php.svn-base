<?php $value = object_input_date_tag($hccieree, 'getFecdes', array (
  'control_name' => 'hccieree[fecdes]',
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange' => remote_function(array(
   'update'   => 'gridr',
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=1&fecdes='+this.value+'&fechas='+$('hccieree_fechas').value"
   ))
)); echo $value ? $value : '&nbsp;' ?>
