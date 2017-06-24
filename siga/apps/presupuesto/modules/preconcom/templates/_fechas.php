<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $value = object_input_date_tag($cpcompro, 'getFechas', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'cpcompro[fechas]',
'date_format' => 'dd/MM/yyyy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
'onBlur'=> remote_function(array(
     'update'   => 'divgrid',
     'url'      => 'preconcom/ajax',
     'script'   => true,
     'complete' => 'AjaxJSON(request, json)',
     'with' => "'ajax=1&codigo='+$('cpcompro_cedrif').value+'&fecdes='+$('cpcompro_fecdes').value+'&fechas='+$('cpcompro_fechas').value"
 ))
)); echo $value ? $value : '&nbsp;' ?>