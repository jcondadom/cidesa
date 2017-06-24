  <?php 
   $value = object_input_tag($fcdeclar, 'getAnodec', array (
  'size' => '10',
  'maxlength' => '4',
  'readonly'  =>  $fcdeclar->getId()!='' ? true : false ,
  'control_name' => 'fcdeclar[anodec]',
  'onKeyPress' => 'javascript:return  validaEntero(event)',
   'onBlur'=> remote_function(array(
          'script' => true,
          'condition' => "$('fcdeclar_anodec').value != '' && $('id').value == ''",
          'url' => 'facpicliqcom/ajax',
          'complete' => 'AjaxJSON(request, json)',
           'with' => "'ajax=2&codigo='+this.value",
        )
      )));echo $value ? $value : '&nbsp;' ;
  ?>