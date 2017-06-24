<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <?php $value = object_input_tag($npjortur, 'getHorfin', array (
  'size' => 15,
  'control_name' => 'npjortur[horfin]',
  'maxlength' => 8,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npjortur_horfin').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'nomdefjortur/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('npjortur_horfin').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexcom=npjortur_horfin&hora='+$('npjortur_horini').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>