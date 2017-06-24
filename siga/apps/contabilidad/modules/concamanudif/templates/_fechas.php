<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php $value = object_input_date_tag($contabc, 'getFechas', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'contabc[fechas]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
      'url'      => sfContext::getInstance()->getModuleName().'/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('contabc_fechas').value != ''",
      'update' => 'divgrid',
      'script' => true,
      'with' => "'ajax=1&fecdes='+$('contabc_fecdes').value+'&fechas='+$('contabc_fechas').value"
      ))
)); echo $value ? $value : '&nbsp;' ?>