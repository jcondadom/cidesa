<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
 <?php $value = object_input_date_tag($caordcom, 'getFecord', array (
  'size' => 11,
  'maxlength' => 10,
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caordcom[fecord]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'readonly'  =>  $caordcom->getId()!='' ? true : false,
  'onBlur'=> remote_function(array(
        'url'      => 'almordmul/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caordcom_fecord').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexcom=caordcom_fecord&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>