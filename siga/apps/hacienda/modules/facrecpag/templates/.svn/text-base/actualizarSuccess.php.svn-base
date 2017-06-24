<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>



<div id="sf_admin_container">
<?php echo object_input_hidden_tag($fcpagos, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Actualizar Número de Factura') ?></legend>
<div id="divGrid"><?php echo form_tag('facrecpag/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="numpag" name="numpag" type="hidden" value="<? print $fcpagos->getNumpag(); ?>">
<input id="rifcon" name="rifcon" type="hidden" value="<? print $fcpagos->getRifcon(); ?>">
<input id="id" name="id" type="hidden" value="<? print $fcpagos->getId(); ?>">

<br>
<div id="nuevonumpag" style="display:none">

  <?php echo label_for('fcpagos[nuevonumpag]', __('Nuevo Número de Factura:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{nuevonumpag}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcpagos, 'getNuevonumpag', array (
  'size' => 10,
  'maxlength' => 10,
  'control_name' => 'fcpagos[nuevonumpag]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('fcpagos_nuevonumpag').value=valor;document.getElementById('fcpagos_nuevonumpag').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
  </div>

</div>
<div class="form-row" align="center">
   <input type="button" value="Salvar" onClick="salvaractualizar();">
   <input type="button" value="Cancelar" onClick="self.close();">
</div>

</div>
</form>
</fieldset>
</div>
<script type="text/javascript">

  if ($('numpag').value!='')
  {
  	$('nuevonumpag').show();
  }


</script>