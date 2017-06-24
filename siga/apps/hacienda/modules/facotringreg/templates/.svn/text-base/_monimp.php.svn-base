
<?

  $value = object_input_tag($fcotring, 'getMonimp', array (
  'size' => '10',
  'maxlength' => '20',
  'readonly'  =>  $fcotring->getId()!='' ? true : false ,
  'control_name' => 'fcotring[monimp]',
  'onKeyPress' => 'javascript:return  validaDecimal(event)',
   'onBlur'=> remote_function(array(
          'update'   => 'divgriddeuda',
          'script' => true,
          'condition' => "$('fcotring_monimp').value != '' && $('id').value == ''",
          'url' => 'facotringreg/ajax',
          'before'=>'event.keyCode=13; formatoDecimal(event,this.id)',
          'complete' => 'AjaxJSON(request, json)',
           'with' => "'ajax=4&codigo='+this.value+'&estatus='+$('fcotring_valor').value+'&fecreg='+$('fcotring_fecreg').value+'&codfue='+$('fcotring_codfue').value",
        )
      )));echo $value ? $value : '&nbsp;' ;
?>
