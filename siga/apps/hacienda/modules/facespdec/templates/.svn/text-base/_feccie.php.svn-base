<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php

  $value = object_input_date_tag($fcdeclar, 'getFeccie', array (
  'readonly' => true,
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yyyy',
  'onBlur'=> remote_function(array(
        'update' => 'divgriddeuda',
        'url'      => 'facespdec/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fcdeclar_feccie').value != '' && $('id').value == ''",
        'with' => "'ajax=2&codigo='+$('fcdeclar_numref').value+'&fecfin='+this.value+'&fecini='+$('fcdeclar_fecini').value+'&fecdec='+$('fcdeclar_fecdec').value+'&fuente='+$('fcdeclar_fuente').value+'&rifcon='+$('fcdeclar_rifcon').value+'&desesp='+$('fcdeclar_desesp').value+'&tipesp='+$('fcdeclar_tipesp').value"
        )),
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcdeclar[feccie]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;';

?>
