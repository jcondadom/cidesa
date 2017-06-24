<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($tspagele, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de Anulación') ?></legend>
<div id="divGrid"><?php echo form_tag('tesmovemipagele/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="refpag" name="refpag" type="hidden" value="<? print $tspagele->getRefpag(); ?>">
<input id="fecemi" name="fecemi" type="hidden" value="<? print $tspagele->getFecpag(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">

  <div class="form-row">
  <?php echo label_for('tspagele[refpag]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tspagele{refpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tspagele{refpag}')): ?>
    <?php echo form_error('tspagele{refpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tspagele, 'getRefpag', array (
  'size' => 20,
  'control_name' => 'tspagele[refpag]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tspagele[fecanu]', __('Fecha'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tspagele{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tspagele{fecanu}')): ?>
    <?php echo form_error('tspagele{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tspagele, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tspagele[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'tesmovemipagele/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('tspagele_fecanu').value != ''",
        'with' => "'ajax=6&refpag='+$('refpag').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('tspagele[desanu]', __('Motivo de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tspagele{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tspagele{desanu}')): ?>
    <?php echo form_error('tspagele{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tspagele, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'tspagele[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </div>


<div class="form-row" align="center">
   <input type="button" value="Salvar" onClick="salvar();">
   <input type="button" value="Cancelar" onClick="self.close();">
</div>

</div>
</form>
</fieldset>
</div>
<script type="text/javascript">
$('tspagele_refpag').value=$('refer').value;

function salvar()
{
  var id='<? print $tspagele->getId(); ?>';
  var refpag=$('refpag').value;
  var desanu=$('tspagele_desanu').value;
  var fecanu=$('tspagele_fecanu').value;
  
  if (confirm("Recuerde que se anularan todos los movimientos asociados a este pago, ¿Desea Continuar?"))
  {
      f=document.sf_admin_edit_form;
      f.action='salvaranu?id='+id+'&desanu='+desanu+'&refpag='+refpag+'&fecanu='+fecanu;
      f.submit();
  }else {
      self.close();
  }
}
</script>