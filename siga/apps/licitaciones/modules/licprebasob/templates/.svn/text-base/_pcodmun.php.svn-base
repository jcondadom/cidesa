<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arr=$params['arrmun'];?>

<div id="divmun"> 
  <?php echo select_tag('liprebas[codmun]', options_for_select($arr,$liprebas->getCodmun()), array (
      'onChange'=> remote_function(array(
      'update'   => 'divpar',
      'url'      => 'licprebasob/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=15&codpai='+$('liprebas_codpai').value+'&codedo='+$('liprebas_codedo').value+'&codigo='+this.value",
          )),
  )); ?>
</div>
    