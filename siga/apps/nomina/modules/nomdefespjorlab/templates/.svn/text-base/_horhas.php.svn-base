<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <?php $value = object_input_tag($npdefjorlab, 'getHorhas', array (
  'size' => 15,
  'control_name' => 'npdefjorlab[horhas]',
  'maxlength' => 8,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npdefjorlab_horhas').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'nomdefjortur/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('npdefjorlab_horhas').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexcom=npdefjorlab_horhas&hora='+$('npdefjorlab_hordes').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>