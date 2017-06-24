<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<?php
//$forpre = "/param1/".str_replace('#','!',Herramientas :: ObtenerFormato('cpdefniv', 'forpre'));
//  $catparams="/param1/'+$('cpmovfuefin_tipmov').value+'";
  /*$id="+'&tipmov=prc'";

  echo Catalogo($cpmovfuefin,2,array(
  'getprincipal' => 'getRefmov',
  'getsecundario' => 'getDesprc',
  'campoprincipal' => 'refmov',
  'camposecundario' => 'desprc',
  'campobase' => 'id',
  ), 'Predisfuefinmov_Cpprecom', 'cpprecom','',$id,'divGrid',1);*/
  //CatalogoSimple($objeto,$ajaxindex, $oit=array(),$metodo,$clase,$uri_params = '',$params_ajax = '', $div = '')
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
        'with' => "'ajax=2&cajtexmos=cpmovfuefin_desprc&tipmov=prc&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Predisfuefinmov_Cpprecom/clase/cpprecom/frame/sf_admin_edit_form/obj1/cpmovfuefin_refmov/obj2/cpmovfuefin_desprc/campo1/refmov/campo2/desprc','','','botoncat')?>

<?php $value = object_textarea_tag($cpmovfuefin, 'getDesprc', array (
  'control_name' => 'cpmovfuefin[desprc]',
  'size' => '80x3',
  'readonly'  =>  true,
)); echo $value ? $value : '&nbsp;' ?>