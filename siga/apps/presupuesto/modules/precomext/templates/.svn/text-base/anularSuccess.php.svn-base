<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpcomext, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Compromiso en Moneda Extranjera') ?></legend>
<div id="divGrid"><?php echo form_tag('precomext/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="refcomext" name="refcomext" type="hidden" value="<? print $cpcomext->getRefcomext(); ?>">
<input id="feccom" name="feccomext" type="hidden" value="<? print $cpcomext->getFeccom(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $refcomext; ?>">

  <div class="form-row">
  <?php echo label_for('cpcomext[refcomext]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcomext{refcomext}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcomext{refcomext}')): ?>
    <?php echo form_error('cpcomext{refcomext}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpcomext, 'getRefcomext', array (
  'size' => 20,
  'control_name' => 'cpcomext[refcomext]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpcomext[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcomext{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcomext{fecanu}')): ?>
    <?php echo form_error('cpcomext{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpcomext, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpcomext[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'precomext/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('cpcomext_fecanu').value != ''",
        'with' => "'ajax=1&refcomext='+$('refcomext').value+'&codigo='+this.value"
        ))),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('cpcomext[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpcomext{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpcomext{desanu}')): ?>
    <?php echo form_error('cpcomext{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpcomext, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'cpcomext[desanu]',
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
$('cpcomext_refcomext').value=$('refer').value;

function salvar()
{
  var id='<? print $cpcomext->getId(); ?>';
  var refcomext=$('refcomext').value;
  var feccom=$('feccom').value;
  var fecanu=$('cpcomext_fecanu').value;
  var desanu=$('cpcomext_desanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&fecanu='+fecanu+'&refcomext='+refcomext+'&feccom='+feccom;
  f.submit();
}
</script>
