
<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter', 'tools', 'ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($catraalm, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Traspaso') ?></legend>
<div id="divGrid">
<?php echo form_tag('almtraalmv2/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="codtra" name="codtra" type="hidden" value="<? print $catraalm->getCodtra(); ?>">
<input id="fectra" name="fectra" type="hidden" value="<? print $catraalm->getFectra(); ?>">


  <div class="form-row">
  <?php echo label_for('label1', __('Referencia'), 'class="required" ') ?>
  <?php $value = input_tag('refanu', '', array (
  'control_name' => 'refanu',
  'size' => 20,
  'readOnly' => true,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('catraalm[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{desanu}')): ?>
    <?php echo form_error('catraalm{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catraalm, 'getDesanu', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'catraalm[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>

  <?php echo label_for('catraalm[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{fecanu}')): ?>
    <?php echo form_error('catraalm{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($catraalm, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'catraalm[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almtraalmv2/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('catraalm_fecanu').value != ''",
        'with' => "'ajax=8&codtra='+$('codtra').value+'&codigo='+this.value"
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
$('refanu').value=$('codtra').value;
function salvar()
{
  var id='<? print $catraalm->getId(); ?>';
  var codtra=$('codtra').value;
  var fecanu=$('catraalm_fecanu').value;
  var desanu=$('catraalm_desanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&codtra='+codtra+'&desanu='+desanu+'&fecanu='+fecanu;
  f.submit();
}
</script>