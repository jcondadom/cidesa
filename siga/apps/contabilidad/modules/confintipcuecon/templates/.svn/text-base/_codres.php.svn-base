<fieldset id="sf_fieldset_none" class="">
<legend><strong><?php echo __('Cuenta Resultado de Ejercicios Actual')?></strong></legend>
<div class="form-row">
<table width="100%">
  <tr>
    <th>
    <div align="left">
    <p><img src="/images/alerta.png"  ><strong><u><?php echo __('En esta cuenta se alojará el resultado de restar los Ingresos menos los Egresos del Ejercicio en Curso (INGRESOS - EGRESOS)') ?></u></strong></p>
   </div>
  </tr>
</table>
 <?php $mascara=$contaba->Mascara(); $value = object_input_tag($contaba, 'getCodres', array (
  'size' => 32,
  'maxlength'=> strlen($mascara),
  'control_name' => 'contaba[codres]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
	'url'      => 'confintipcuecon/ajax',
	'complete' => 'AjaxJSON(request, json)',
	'condition' => "$('contaba_codres').value != ''",
	'script' => true,
	'with' => "'ajax=1&cajtexcom=contaba_codres&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Pagemiord/clase/Contabb/frame/sf_admin_edit_form/obj1/contaba_codres/campo1/codcta')?>
</div>
</fieldset>