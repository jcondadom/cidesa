<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

/*  $id="+'&tipmov=tra'";

  echo Catalogo($cpmovfuefin,7,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDestra',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'destra',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpsoltrasla', 'cpsoltrasla','',$id,'divGrid',1);*/
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
        'with' => "'ajax=7&cajtexmos=cpmovfuefin_destra&tipmov=tra&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Predisfuefinmov_Cpsoltrasla/clase/cpsoltrasla/frame/sf_admin_edit_form/obj1/cpmovfuefin_refmov/obj2/cpmovfuefin_destra/campo1/refmov/campo2/destra','','','botoncat')?>

<?php $value = object_textarea_tag($cpmovfuefin, 'getDestra', array (
  'control_name' => 'cpmovfuefin[destra]',
  'size' => '80x3',
  'readonly'  =>  true,
)); echo $value ? $value : '&nbsp;' ?>