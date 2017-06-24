<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  /*$id="+'&tipmov=pag'";

  echo Catalogo($cpmovfuefin,5,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDespag',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'despag',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cppagos', 'cppagos','',$id,'divGrid',1);*/
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
        'with' => "'ajax=5&cajtexmos=cpmovfuefin_despag&tipmov=pag&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Predisfuefinmov_Cppagos/clase/cppagos/frame/sf_admin_edit_form/obj1/cpmovfuefin_refmov/obj2/cpmovfuefin_despag/campo1/refmov/campo2/despag','','','botoncat')?>

<?php $value = object_textarea_tag($cpmovfuefin, 'getDespag', array (
  'control_name' => 'cpmovfuefin[despag]',
  'size' => '80x3',
  'readonly'  =>  true,
)); echo $value ? $value : '&nbsp;' ?>