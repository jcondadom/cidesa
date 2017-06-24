<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
//$forpre = "/param1/".str_replace('#','!',Herramientas :: ObtenerFormato('cpdefniv', 'forpre'));
//  $catparams="/param1/'+$('cpmovfuefin_tipmov').value+'";
  /*$id="+'&tipmov=com'";

  echo Catalogo($cpmovfuefin,3,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDescom',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'descom',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpcompro', 'cpcompro','',$id,'divGrid',1);  */
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
        'with' => "'ajax=3&cajtexmos=cpmovfuefin_descom&tipmov=com&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Predisfuefinmov_Cpcompro/clase/cpcompro/frame/sf_admin_edit_form/obj1/cpmovfuefin_refmov/obj2/cpmovfuefin_descom/campo1/refmov/campo2/descom','','','botoncat')?>

<?php $value = object_textarea_tag($cpmovfuefin, 'getDescom', array (
  'control_name' => 'cpmovfuefin[descom]',
  'size' => '80x3',
  'readonly'  =>  true,
)); echo $value ? $value : '&nbsp;' ?>
