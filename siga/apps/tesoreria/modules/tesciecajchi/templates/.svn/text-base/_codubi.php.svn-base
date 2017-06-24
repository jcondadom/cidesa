<?php

$masc=$opciecaj->getMascaraubi();

$value = object_input_tag($opciecaj, 'getCodubi', array (
  'size' => 20,
  'maxlength' => $opciecaj->getLonubi(),
  'readonly'  =>  $opciecaj->getId()!='' ? true : false ,
  'control_name' => 'opciecaj[codubi]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masc')",
  'onBlur'=> remote_function(array(
        'url'      => 'tesciecajchi/ajax',
        'condition' => "$('opciecaj_codubi').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=opciecaj_desubi&cajtexcom=opciecaj_codubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php
if ($opciecaj->getId()=='')
echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/opciecaj_codubi/obj2/opciecaj_desubi/campo1/codubi/campo2/desubi/param1/'.$opciecaj->getLonubi(),'','','botoncat')?>

<?php $value = object_input_tag($opciecaj, 'getdesubi', array (
  'disabled' => true,
  'size' => 40,
  'control_name' => 'opciecaj[desubi]',
)); echo $value ? $value : '&nbsp;' ?>