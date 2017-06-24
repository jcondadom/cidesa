<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpsoltrasla, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">

<legend><?php echo __('Anular Solicitud de Traslado') ?></legend>
<div id="divGrid"><?php echo form_tag('cpsoltrasla/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>
<input id="fectra" name="fectra" type="hidden" value="<? print $cpsoltrasla->getFectra(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">
  <div class="form-row">
  <?php echo label_for('cpsoltrasla[reftra]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoltrasla{reftra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoltrasla{reftra}')): ?>
    <?php echo form_error('cpsoltrasla{reftra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpsoltrasla, 'getReftra', array (
  'size' => 20,
  'control_name' => 'cpsoltrasla[reftra]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpsoltrasla[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoltrasla{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoltrasla{fecanu}')): ?>
    <?php echo form_error('cpsoltrasla{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpsoltrasla, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpsoltrasla[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cpsoltrasla/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cpsoltrasla_fecanu').value != ''",
        'with' => "'ajax=3&reftra='+$('reftra').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpsoltrasla[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoltrasla{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoltrasla{desanu}')): ?>
    <?php echo form_error('cpsoltrasla{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpsoltrasla, 'getdesanu', array (
  'size' => 80,
  'control_name' => 'cpsoltrasla[desanu]',
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
$('cpsoltrasla_reftra').value = $('refer').value;
function salvar(){
  var id='<? print $cpsoltrasla->getId(); ?>';
  var reftra=$('cpsoltrasla_reftra').value;
  var desanu=$('cpsoltrasla_desanu').value;
  var fecanu=$('cpsoltrasla_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&reftra='+reftra+'&fecanu='+fecanu;
  f.submit();
}


</script>
