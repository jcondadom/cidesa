<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
       <?php $value = object_input_tag($fcusoveh, array('getPorali',true), array (
        'size' => 15,
        'control_name' => 'fcusoveh[porali]',
        'onBlur' => "javascript:event.keyCode=13; return entermontodecimal(event,this.id,4)",
      )); echo $value ? $value : '&nbsp;' ?>