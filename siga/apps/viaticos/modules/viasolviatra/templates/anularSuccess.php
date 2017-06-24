<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($viasolviatra, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Solicitud de Viáticos') ?></legend>
<div id="divGrid"><?php echo form_tag('viasolviatra/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form',
'multipart' => true,
)) ?>

<input id="numsol" name="numsol" type="hidden" value="<? print $viasolviatra->getNumsol(); ?>">
<input id="fecsol" name="fecsol" type="hidden" value="<? print $viasolviatra->getFecsol(); ?>">

  <div class="form-row"> 

  <?php echo label_for('viasolviatra[desanu]', __('Motivo de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('viasolviatra{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viasolviatra{desanu}')): ?>
    <?php echo form_error('viasolviatra{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($viasolviatra, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'viasolviatra[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('viasolviatra[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('viasolviatra{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('viasolviatra{fecanu}')): ?>
    <?php echo form_error('viasolviatra{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($viasolviatra, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'viasolviatra[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'viasolviatra/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('viasolviatra_fecanu').value != ''",
        'with' => "'ajax=10&numsol='+$('numsol').value+'&codigo='+this.value"
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
  var id='<? print $viasolviatra->getId(); ?>';
  var numsol=$('numsol').value;
  var motanu=$('viasolviatra_desanu').value;
  var fecanu=$('viasolviatra_fecanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&motanu='+motanu+'&numsol='+numsol+'&fecanu='+fecanu;
  f.submit();
}
</script>