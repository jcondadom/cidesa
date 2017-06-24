<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cptrasla, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">

<legend><?php echo __('Anular Traslado') ?></legend>
<div id="divGrid"><?php echo form_tag('cptrasla/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>
<input id="fectra" name="fectra" type="hidden" value="<? print $cptrasla->getFectra(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">
  <div class="form-row">
  <?php echo label_for('cptrasla[reftra]', __('Referencia'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cptrasla{reftra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cptrasla{reftra}')): ?>
    <?php echo form_error('cptrasla{reftra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cptrasla, 'getReftra', array (
  'size' => 20,
  'control_name' => 'cptrasla[reftra]',
  'maxlength' => 8,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cptrasla[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cptrasla{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cptrasla{fecanu}')): ?>
    <?php echo form_error('cptrasla{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cptrasla, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cptrasla[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cptrasla/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cptrasla_fecanu').value != ''",
        'with' => "'ajax=3&reftra='+$('reftra').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cptrasla[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cptrasla{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cptrasla{desanu}')): ?>
    <?php echo form_error('cptrasla{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cptrasla, 'getdesanu', array (
  'size' => 80,
  'control_name' => 'cptrasla[desanu]',
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
$('cptrasla_reftra').value = $('refer').value;
function salvar(){
  var id='<? print $cptrasla->getId(); ?>';
  var reftra=$('cptrasla_reftra').value;
  var desanu=$('cptrasla_desanu').value;
  var fecanu=$('cptrasla_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&desanu='+desanu+'&reftra='+reftra+'&fecanu='+fecanu;
  f.submit();
}


</script>
