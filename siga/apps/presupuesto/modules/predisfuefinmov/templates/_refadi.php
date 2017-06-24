<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  /*$id="+'&tipmov=adi'";

  echo Catalogo($cpmovfuefin,6,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDesadi',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'desadi',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpadidis', 'cpadidis','',$id,'divGrid',1);*/
?>

<?php $value = object_input_tag($cpmovfuefin, 'getRefmov', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'cpmovfuefin[refmov]',
  'onBlur'=> remote_function(array(
  	    'update' => 'divGrid',
        'url'      => 'predisfuefinmov/ajax',
        'condition' => "$('cpmovfuefin_refmov').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=6&cajtexmos=cpmovfuefin_desasi&tipmov=adi&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Predisfuefinmov_Cpadidis/clase/cpadidis/frame/sf_admin_edit_form/obj1/cpmovfuefin_refmov/obj2/cpmovfuefin_desasi/campo1/refmov/campo2/desasi','','','botoncat')?>

<?php $value = object_textarea_tag($cpmovfuefin, 'getDesasi', array (
  'control_name' => 'cpmovfuefin[desasi]',
  'size' => '80x3',
  'readonly'  =>  true,
)); echo $value ? $value : '&nbsp;' ?>