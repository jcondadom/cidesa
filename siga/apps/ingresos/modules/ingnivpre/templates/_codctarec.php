<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php echo javascript_include_tag('dFilter') ?>

  <?php
  $mascara=$cidefniv->getMascaraConta();
  $value = object_input_tag($cidefniv, 'getCodctarec', array (
  'size' => 20,
  'maxlength' => $cidefniv->getLoncta(),
  'control_name' => 'cidefniv[codctarec]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'ingnivpre/ajax',
        'condition' => "$('cidefniv_codctarec').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=cidefniv_descta&codigo='+this.value",
        ))));echo $value ? $value : '&nbsp;' ;
?>
&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ingtitpre_contabb/clase/Contabb/frame/sf_admin_edit_form/obj1/cidefniv_codctarec/obj2/cidefniv_descta/campo1/codcta/campo2/descta','','','botoncat')?>

<?php $value = object_input_tag($cidefniv, 'getDescta', array (
  'disabled' => true,
  'size' => 40,
  'control_name' => 'cidefniv[descta]',
)); echo $value ? $value : '&nbsp;' ?>
