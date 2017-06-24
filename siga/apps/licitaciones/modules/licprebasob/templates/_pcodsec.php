<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arr=$params['arrsec'];?>

<div id="divsec"> 
  <?php echo select_tag('liprebas[codsec]', options_for_select($arr,$liprebas->getCodsec()), array (
      #'onChange'=> remote_function(array(
      #'update'   => 'divgridvaca',
      #'url'      => 'presnomliquidacion/ajax',
      #'condition' => "$('liprebas_codemp').value != '' && $('id').value == '' && $('liprebas_codsec').value != ''",
      #'complete' => 'AjaxJSON(request, json)',
      #'with' => "'ajax=1&codigo='+$('liprebas_codemp').value+'&tipret='+this.value",
       #     )),
  )); ?>
</div>
    