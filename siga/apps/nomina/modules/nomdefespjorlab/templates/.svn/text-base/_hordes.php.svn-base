<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <?php $value = object_input_tag($npdefjorlab, 'getHordes', array (
  'size' => 15,
  'control_name' => 'npdefjorlab[hordes]',
  'maxlength' => 8,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npdefjorlab_hordes').value=cadena",
  'onBlur'=> remote_function(array(
        'url'      => 'nomdefespjorlab/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('npdefjorlab_hordes').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexcom=npdefjorlab_hordes&hora='+$('npdefjorlab_horhas').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>