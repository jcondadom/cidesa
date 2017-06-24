<?php
        if($fcrepfis->getIncmod()=='I'){
     	    $bandera1="";

        }else{
            $bandera1="style=\"display:none;\"";
        }
	?>
<div id="divfecini"  <?php echo $bandera1; ?>>
<?php echo label_for('fcrepfis[feccie]', __(' Fecha CÃ¡lculo Vencimiento:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcrepfis{feccie}')): ?> form-error<?php endif; ?>">

  <?php $value = object_input_date_tag($fcrepfis, 'getFeccie', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcrepfis[feccie]',
  'date_format' => 'dd/mm/yyyy',
  'size' => 10,
  'maxlength' => 10,
  'onBlur'=> remote_function(array(
     'update'   => 'divgrid',
     'url'      => 'facrepfisliq/ajax',
     'script'   => true,
     'complete' => 'AjaxJSON(request, json)',
     'condition' => "$('fcrepfis_feccie').value != '' && $('id').value == ''",
     'with' => "'ajax=2&codigo='+this.value+'&fecini='+$('fcrepfis_fecini').value+'&numlic='+$('fcrepfis_numlic').value+'&annioini='+$('fcrepfis_annioini').value+'&anniofin='+$('fcrepfis_anniofin').value+'&numlic='+$('fcrepfis_numlic').value",
     'submit' => 'sf_admin_edit_form',
    ))
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>