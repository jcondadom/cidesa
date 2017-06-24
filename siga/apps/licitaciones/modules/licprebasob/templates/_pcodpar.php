<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arr=$params['arrpar'];?>

<div id="divpar"> 
  <?php echo select_tag('liprebas[codpar]', options_for_select($arr,$liprebas->getCodpar()), array (
      'onChange'=> remote_function(array(
      'update'   => 'divsec',
      'url'      => 'licprebasob/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=16&codpai='+$('liprebas_codpai').value+'&codedo='+$('liprebas_codedo').value+'&codmun='+$('liprebas_codmun').value+'&codigo='+this.value",
          )),
  )); ?>
</div>
    