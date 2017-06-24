<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arr=$params['arredo'];?>

<div id="divedo"> 
  <?php echo select_tag('liprebas[codedo]', options_for_select($arr,$liprebas->getCodedo()), array (
      'onChange'=> remote_function(array(
      'update'   => 'divmun',
      'url'      => 'licprebasob/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=14&codpai='+$('liprebas_codpai').value+'&codigo='+this.value",
           )),
  )); ?>
</div>
    