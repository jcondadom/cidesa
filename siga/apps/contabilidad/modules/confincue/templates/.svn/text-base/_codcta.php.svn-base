  <?php $mascara=$contabb->Mascara(); $value = object_input_tag($contabb, 'getCodcta', array (
  'size' => 32,
  'maxlength'=> $contabb->Loncta(),
  'readonly'  =>  $contabb->getId()!='' ? true : false ,
  'control_name' => 'contabb[codcta]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
    'url'      => 'confincue/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('contabb_codcta').value != '' && $('id').value == ''",
    'script' => true,
    'with' => "'ajax=1&cajtexmos=contabb_descta&codigo='+this.value",
  )),
)); echo $value ? $value : '&nbsp;' ?>