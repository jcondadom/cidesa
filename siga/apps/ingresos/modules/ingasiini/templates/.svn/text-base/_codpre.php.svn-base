<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

$masc=$ciasiini->getMascarapre();

$value = object_input_tag($ciasiini, 'getCodpre', array (
  'size' => 30,
  'maxlength' => $ciasiini->getLonpre(),
  'readonly'  =>  $ciasiini->getId()!='' ? true : false ,
  'control_name' => 'ciasiini[codpre]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masc')",
  'onBlur'=> remote_function(array(
        'url'      => 'ingasiini/ajax',
        'condition' => "$('ciasiini_codpre').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=ciasiini_nompre&cajtexcom=ciasiini_codpre&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php
if ($ciasiini->getId()=='')
echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Ingadidis_cideftit/clase/Cideftit/frame/sf_admin_edit_form/obj1/ciasiini_codpre/obj2/ciasiini_nompre/campo1/codpre/campo2/nompre/param1/".$ciasiini->getLonpre(),'','','botoncat')?>
