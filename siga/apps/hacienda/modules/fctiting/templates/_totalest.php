<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <?php $value = object_input_tag($fcpreing, 'getTotalest', array (
  'control_name' => 'fcpreing[totalest]',
  'size' => 10,
  'readonly' => false,
  'class' => 'grid_txtright',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id); $$('.sf_admin_action_list')[0].focus();",
)); echo $value ? $value : '&nbsp;' ?>