<?php
        if($fcrepfis->getIncmod()=='I'){
     	    $bandera1="";

        }else{
            $bandera1="style=\"display:none;\"";
        }
	?>

<div id="divfecini"  <?php echo $bandera1; ?>>
<?php echo label_for('fcrepfis[fecini]', __('Fecha CÃ¡lculo Inicio:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcrepfis{fecini}')): ?> form-error<?php endif; ?>">

  <?php $value = object_input_date_tag($fcrepfis, 'getFecini', array (
  'rich' => true,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcrepfis[fecini]',
  'date_format' => 'dd/mm/yyyy',
  'size' => 10,
  'maxlength' => 10,
  'onBlur'=> remote_function(array(
         'update'   => 'divgrid',
         'url'      => 'facrepfisliq/ajax',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>