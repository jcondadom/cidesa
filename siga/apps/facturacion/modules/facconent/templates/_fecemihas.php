<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_input_date_tag($fafactur, 'getFecemihas', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fafactur[fecemihas]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'update' => 'divgrid',
        'before' => 'if ($("fafactur_fecemides").value=="") alert("Debe indicar una fecha de emision desde");',
        'url'      => 'facconent/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fafactur_fecemihas').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cedrif='+$('fafactur_rifpro').value+'&fecemides='+$('fafactur_fecemides').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
