
<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter', 'tools', 'ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($careqart, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Anulación de Requisición de Almacen') ?></legend>
<div id="divGrid">
<?php echo form_tag('almreq/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>

<input id="reqart" name="reqart" type="hidden" value="<? print $careqart->getReqart(); ?>">
<input id="fecreq" name="fecreq" type="hidden" value="<? print $careqart->getFecreq(); ?>">


  <div class="form-row">
  <?php echo label_for('label1', __('Referencia'), 'class="required" ') ?>
  <?php $value = input_tag('refanu', '', array (
  'control_name' => 'refanu',
  'size' => 20,
  'readOnly' => true,
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>

<br><br>

  <?php echo label_for('careqart[desanu]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('careqart{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqart{desanu}')): ?>
    <?php echo form_error('careqart{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($careqart, 'getDesanu', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'careqart[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>

  <?php echo label_for('careqart[fecanu]', __('Fecha de Anulación'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('careqart{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqart{fecanu}')): ?>
    <?php echo form_error('careqart{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($careqart, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'careqart[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almreq/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('careqart_fecanu').value != ''",
        'with' => "'ajax=11&reqart='+$('reqart').value+'&codigo='+this.value"
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
$('refanu').value=$('reqart').value;
function salvar()
{
  var id='<? print $careqart->getId(); ?>';
  var reqart=$('reqart').value;
  var fecanu=$('careqart_fecanu').value;
  var desanu=$('careqart_desanu').value;

  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&reqart='+reqart+'&desanu='+desanu+'&fecanu='+fecanu;
  f.submit();
}
</script>