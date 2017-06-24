
<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter', 'tools', 'ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($caentalm, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Entrada') ?></legend>
<div id="divGrid">
<?php echo form_tag('almentdes/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="rcpart" name="rcpart" type="hidden" value="<? print $caentalm->getRcpart(); ?>">
<input id="fecrcp" name="fecrcp" type="hidden" value="<? print $caentalm->getFecrcp(); ?>">


  <div class="form-row">
  <?php echo label_for('label1', __('Referencia'), 'class="required" ') ?>
  <?php $value = input_tag('refanu', '', array (
  'control_name' => 'refanu',
  'size' => 20,
  'readOnly' => true,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('caentalm[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{desanu}')): ?>
    <?php echo form_error('caentalm{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caentalm, 'getDesanu', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'caentalm[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>

  <?php echo label_for('caentalm[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{fecanu}')): ?>
    <?php echo form_error('caentalm{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($caentalm, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'caentalm[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almentdes/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caentalm_fecanu').value != ''",
        'with' => "'ajax=8&rcpart='+$('rcpart').value+'&codigo='+this.value"
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
$('refanu').value=$('rcpart').value;
function salvar()
{
  var id='<? print $caentalm->getId(); ?>';
  var rcpart=$('rcpart').value;
  var fecanu=$('caentalm_fecanu').value;
  var desanu=$('caentalm_desanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&rcpart='+rcpart+'&desanu='+desanu+'&fecanu='+fecanu;
  f.submit();
}
</script>