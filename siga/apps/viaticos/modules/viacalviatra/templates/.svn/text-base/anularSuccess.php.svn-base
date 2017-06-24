<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($viacalviatra, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Cálculo de Viáticos') ?></legend>
<div id="divGrid"><?php echo form_tag('viacalviatra/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="numcal" name="numcal" type="hidden" value="<? print $viacalviatra->getNumcal(); ?>">
<input id="feccal" name="feccal" type="hidden" value="<? print $viacalviatra->getFeccal(); ?>">

  <div class="form-row"> 

  <?php echo label_for('viacalviatra[desanu]', __('Motivo de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{desanu}')): ?>
    <?php echo form_error('viacalviatra{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($viacalviatra, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'viacalviatra[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('viacalviatra[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('viacalviatra{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viacalviatra{fecanu}')): ?>
    <?php echo form_error('viacalviatra{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($viacalviatra, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'viacalviatra[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'viacalviatra/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('viacalviatra_fecanu').value != ''",
        'with' => "'ajax=3&numcal='+$('numcal').value+'&codigo='+this.value"
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
function salvar()
{
  var id='<? print $viacalviatra->getId(); ?>';
  var numcal=$('numcal').value;
  var motanu=$('viacalviatra_desanu').value;
  var fecanu=$('viacalviatra_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&motanu='+motanu+'&numcal='+numcal+'&fecanu='+fecanu;
  f.submit();
}
</script>