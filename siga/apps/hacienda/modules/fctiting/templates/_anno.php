<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php $value = object_input_tag($fcpreing, 'getAnno', array (
  'control_name' => 'fcpreing[anno]',
  'size' => 10,
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
    'update'      => 'divgrid',
    'url'      => 'fctiting/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('fcpreing_anno').value != ''",
    'script' => true,
     'with' => "'ajax=2&codpar='+$('fcpreing_codpar').value+'&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>
