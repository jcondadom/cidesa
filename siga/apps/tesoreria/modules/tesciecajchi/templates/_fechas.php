<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_input_date_tag($opciecaj, 'getFechas', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opciecaj[fechas]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'update' => 'divgridsal',
        'script' => true,
        'url'      => 'tesciecajchi/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opciecaj_fechas').value != '' && $('id').value == ''",
        'with' => "'ajax=5&codcajchi='+$('opciecaj_codcajchi').value+'&fecdes='+$('opciecaj_fecdes').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<br>

<ul class="sf_admin_actions" >
<li class="float-center">
<input id="marcatodos" class="sf_admin_action_save" type="button" value="Marcar Todos" onClick="martodoscie();">
</li>
<li class="float-center">
<input id="desmartodos" class="sf_admin_action_cancel" type="button" value="Desmarcar Todos" onClick="destodoscie();">
</li>
</ul>