<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter', 'tools', 'ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($fadevolu, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anular Devolución') ?></legend>
<div id="divGrid">
<?php echo form_tag('fadevolu/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="nrodev" name="nrodev" type="hidden" value="<? print $fadevolu->getNrodev(); ?>">
<input id="fecdev" name="fecdev" type="hidden" value="<? print $fadevolu->getFecdev(); ?>">


  <div class="form-row">
  <?php echo label_for('label1', __('Referencia'), 'class="required" ') ?>
  <?php $value = input_tag('refanu', '', array (
  'control_name' => 'refanu',
  'size' => 20,
  'readOnly' => true,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('fadevolu[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fadevolu{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fadevolu{desanu}')): ?>
    <?php echo form_error('fadevolu{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($fadevolu, 'getDesanu', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'fadevolu[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>

  <?php echo label_for('fadevolu[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('fadevolu{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fadevolu{fecanu}')): ?>
    <?php echo form_error('fadevolu{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($fadevolu, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fadevolu[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'fadevolu/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('fadevolu_fecanu').value != ''",
        'with' => "'ajax=4&nrodev='+$('nrodev').value+'&codigo='+this.value"
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
$('refanu').value=$('nrodev').value;
function salvar()
{
  var id='<? print $fadevolu->getId(); ?>';
  var nrodev=$('nrodev').value;
  var fecanu=$('fadevolu_fecanu').value;
  var desanu=$('fadevolu_desanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&nrodev='+nrodev+'&desanu='+desanu+'&fecanu='+fecanu;
  f.submit();
}
</script>