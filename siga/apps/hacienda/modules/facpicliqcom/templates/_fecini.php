<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_input_date_tag($fcdeclar, 'getFecini', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcdeclar[fecini]',
  'date_format' => 'dd/mm/yyyy',
  'size' => 10,
  'maxlength' => 10,
  'onBlur'=> remote_function(array(
         'update'   => 'divgridactcom',
         'url'      => 'facpicliqcom/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
        ))
)); echo $value ? $value : '&nbsp;' ?>