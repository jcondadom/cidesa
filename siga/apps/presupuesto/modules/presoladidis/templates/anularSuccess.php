<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpsoladidis, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">

<legend><?php echo __('Anular Solicitud de Crédito Adición / Disminución') ?></legend>
<div id="divGrid"><?php echo form_tag('cpsoladidis/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>
<input id="fecadi" name="fecadi" type="hidden" value="<? print $cpsoladidis->getFecadi(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">
  <div class="form-row">
  <?php echo label_for('cpsoladidis[refadi]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoladidis{refadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoladidis{refadi}')): ?>
    <?php echo form_error('cpsoladidis{refadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpsoladidis, 'getRefadi', array (
  'size' => 20,
  'control_name' => 'cpsoladidis[refadi]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpsoladidis[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoladidis{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoladidis{fecanu}')): ?>
    <?php echo form_error('cpsoladidis{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpsoladidis, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpsoladidis[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cpsoladidis/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cpsoladidis_fecanu').value != ''",
        'with' => "'ajax=3&refadi='+$('refadi').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpsoladidis[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoladidis{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoladidis{desanu}')): ?>
    <?php echo form_error('cpsoladidis{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpsoladidis, 'getdesanu', array (
  'size' => 80,
  'control_name' => 'cpsoladidis[desanu]',
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
$('cpsoladidis_refadi').value = $('refer').value;
function salvar(){
  var id='<? print $cpsoladidis->getId(); ?>';
  var refadi=$('cpsoladidis_refadi').value;
  var desanu=$('cpsoladidis_desanu').value;
  var fecanu=$('cpsoladidis_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&refadi='+refadi+'&fecanu='+fecanu;
  f.submit();
}


</script>
