<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpajuste, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Ajuste') ?></legend>
<div id="divGrid"><?php echo form_tag('preajuste/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="refaju" name="refaju" type="hidden" value="<? print $cpajuste->getRefaju(); ?>">
<input id="fecaju" name="fecaju" type="hidden" value="<? print $cpajuste->getFecaju(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">

  <div class="form-row">
  <?php echo label_for('cpajuste[refaju]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpajuste{refaju}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpajuste{refaju}')): ?>
    <?php echo form_error('cpajuste{refaju}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpajuste, 'getRefaju', array (
  'size' => 20,
  'control_name' => 'cpajuste[refaju]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpajuste[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpajuste{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpajuste{desanu}')): ?>
    <?php echo form_error('cpajuste{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpajuste, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'cpajuste[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpajuste[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpajuste{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpajuste{fecanu}')): ?>
    <?php echo form_error('cpajuste{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpajuste, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpajuste[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'preajuste/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('cpajuste_fecanu').value != ''",
        'with' => "'ajax=3&refajua='+$('refaju').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
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
$('cpajuste_refaju').value=$('refer').value;

function salvar()
{
  var id='<? print $cpajuste->getId(); ?>';
  var refaju=$('refaju').value;
  var desanu=$('cpajuste_desanu').value;
  var fecanu=$('cpajuste_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&refaju='+refaju+'&fecanu='+fecanu;
  f.submit();
}
</script>
