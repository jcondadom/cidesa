<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arr=$params['arrpai'];?>

<div id="divpai"> 
  <?php echo select_tag('liprebas[codpai]', options_for_select($arr,$liprebas->getCodpai()), array (
      'onChange'=> remote_function(array(
      'update'   => 'divedo',
      'url'      => 'licprebasob/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=13&codigo='+this.value",
           )),
  )); ?>
</div>
    