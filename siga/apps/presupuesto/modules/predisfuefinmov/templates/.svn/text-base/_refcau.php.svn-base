<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php

  /*$id="+'&tipmov=cau'";

  echo Catalogo($cpmovfuefin,4,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDescau',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'descau',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpcausad', 'cpcausad','',$id,'divGrid',1);*/
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
        'with' => "'ajax=4&cajtexmos=cpmovfuefin_descau&tipmov=cau&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Predisfuefinmov_Cpcausad/clase/cpcausad/frame/sf_admin_edit_form/obj1/cpmovfuefin_refmov/obj2/cpmovfuefin_descau/campo1/refmov/campo2/descau','','','botoncat')?>

<?php $value = object_textarea_tag($cpmovfuefin, 'getDescau', array (
  'control_name' => 'cpmovfuefin[descau]',
  'size' => '80x3',
  'readonly'  =>  true,
)); echo $value ? $value : '&nbsp;' ?>