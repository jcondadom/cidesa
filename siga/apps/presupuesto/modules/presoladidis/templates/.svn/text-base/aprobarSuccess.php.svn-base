<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpsoladidis, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">

<legend><?php echo __('Aprobación de Solicitud de Crédito Adición / Disminución') ?></legend>
<div id="divGrid"><?php echo form_tag('cpsoladidis/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>
<input id="fecadi" name="fecadi" type="hidden" value="<? print $cpsoladidis->getFecadi(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">
<input id="nivel" name="nivel" type="hidden" value="<? print $nivel; ?>">

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

  <?php echo label_for('cpsoladidis[fecapr]', __('Fecha'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoladidis{fecapr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoladidis{fecapr}')): ?>
    <?php echo form_error('cpsoladidis{fecapr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpsoladidis, 'getFecapr', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpsoladidis[fecapr]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cpsoladidis/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cpsoladidis_fecapr').value != ''",
        'with' => "'ajax=4&refadi='+$('refadi').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpsoladidis[desapr]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoladidis{desapr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoladidis{desapr}')): ?>
    <?php echo form_error('cpsoladidis{desapr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpsoladidis, 'getdeapr', array (
  'size' => 80,
  'control_name' => 'cpsoladidis[desapr]',
)); echo $value ? $value : '&nbsp;' ?>


    </div>

<div class="form-row">
  <?php echo label_for('cpsoladidis[staapr]', __('Conformado - Autorizado - Aprobado'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoladidis{staapr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoladidis{staapr}')): ?>
    <?php echo form_error('cpsoladidis{staapr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php
    echo radiobutton_tag('cpsoladidis[staapr]', 'S', false, array('disabled' => false ))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo radiobutton_tag('cpsoladidis[staapr]', 'N', true, array('disabled' => false ))."    No";
    ?>
</div>
<br><br>
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
  var desapr=$('cpsoladidis_desapr').value;
  var fecapr=$('cpsoladidis_fecapr').value;
  var nivel= $('nivel').value;
  var staapr;

  if ( $('cpsoladidis_staapr_S').checked == true){
      staapr = 'S';
      //alert(staapr);
  }else{
      staapr = 'N';
      //alert(staapr);
  }

  f=document.sf_admin_edit_form;
  f.action='salvarapr?id='+id+'&desapr='+desapr+'&refadi='+refadi+'&fecapr='+fecapr+'&staapr='+staapr+'&nivel='+nivel;
  f.submit();
}


</script>
