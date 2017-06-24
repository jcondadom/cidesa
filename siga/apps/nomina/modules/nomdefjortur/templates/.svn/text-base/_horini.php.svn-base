<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <?php $value = object_input_tag($npjortur, 'getHorini', array (
  'size' => 15,
  'control_name' => 'npjortur[horini]',
  'maxlength' => 8,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npjortur_horini').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'nomdefjortur/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('npjortur_horini').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexcom=npjortur_horini&hora='+$('npjortur_horfin').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>