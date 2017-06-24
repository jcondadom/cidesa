<?php 
$mancuecon=H::getConfApp2('mancuecon', 'presupuesto', 'predoccau');
if ($mancuecon=='S') {?>

<?php
 $masc=$cpdoccau->getMascaraConta();

 $value = object_input_tag($cpdoccau, 'getCodcta', array (
  'size' => 20,
  'maxlength' => $cpdoccau->getLoncta(),
  'control_name' => 'cpdoccau[codcta]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$masc')",
  'onBlur'=> remote_function(array(
        'url'      => 'predoccau/ajax',
        'condition' => "$('cpdoccau_codcta').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=cpdoccau_descta&cajtexcom=cpdoccau_codcta&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php

echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregrgo/clase/Contabb/frame/sf_admin_edit_form/obj1/cpdoccau_codcta/obj2/cpdoccau_descta/campo1/codcta/campo2/descta','','','botoncat')?>

<?php $value = object_input_tag($cpdoccau, 'getdescta', array (
  'disabled' => true,
  'size' => 40,
  'control_name' => 'cpdoccau[descta]',
)); echo $value ? $value : '&nbsp;' ?>
<?php } ?>

<script type="text/javascript" lang="JavaScript">
var mancuecon='<?php echo $mancuecon; ?>';
if (mancuecon!='S') {
    $$('.h2')[5].hide();
    $('divCuenta Contable').hide();
}
</script>
    