<?php use_helper('Object', 'Javascript', 'PopUp', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>
<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('tools') ?>
<?php echo javascript_include_tag('ajax') ?>

<div id="sf_admin_container">
<?php echo object_input_hidden_tag($cpsoltrasla, 'getId') ?>
<fieldset id="sf_fieldset_none" class="">

<legend><?php echo __('Aprobación de Solicitud de Traslado') ?></legend>
<div id="divGrid"><?php echo form_tag('cpsoltrasla/edit', array(
'id'        => 'sf_admin_edit_form',
'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
'multipart' => true,
)) ?>
<input id="fectra" name="fectra" type="hidden" value="<? print $cpsoltrasla->getFectra(); ?>">
<input id="refer" name="refer" type="hidden" value="<? print $referencia; ?>">
<input id="nivel" name="nivel" type="hidden" value="<? print $nivel; ?>">

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

  <?php echo label_for('cpsoltrasla[fecapr]', __('Fecha'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoltrasla{fecapr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoltrasla{fecapr}')): ?>
    <?php echo form_error('cpsoltrasla{fecapr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($cpsoltrasla, 'getFecapr', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'cpsoltrasla[fecapr]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'cpsoltrasla/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('cpsoltrasla_fecapr').value != ''",
        'with' => "'ajax=4&reftra='+$('reftra').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('cpsoltrasla[desapr]', __('Descripción'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoltrasla{desapr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoltrasla{desapr}')): ?>
    <?php echo form_error('cpsoltrasla{desapr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($cpsoltrasla, 'getdeapr', array (
  'size' => 80,
  'control_name' => 'cpsoltrasla[desapr]',
)); echo $value ? $value : '&nbsp;' ?>


    </div>

<div class="form-row">
  <?php echo label_for('cpsoltrasla[staapr]', __('Conformado - Autorizado - Aprobado'), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('cpsoltrasla{staapr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cpsoltrasla{staapr}')): ?>
    <?php echo form_error('cpsoltrasla{staapr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <?php
    echo radiobutton_tag('cpsoltrasla[staapr]', 'S', false, array('disabled' => false ))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
    echo radiobutton_tag('cpsoltrasla[staapr]', 'N', true, array('disabled' => false ))."    No";
    ?>
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
  var desapr=$('cpsoltrasla_desapr').value;
  var fecapr=$('cpsoltrasla_fecapr').value;
  var nivel= $('nivel').value;
  var staapr;

  if ( $('cpsoltrasla_staapr_S').checked == true){
      staapr = 'S';
      //alert(staapr);
  }else{
      staapr = 'N';
      //alert(staapr);
  }

  f=document.sf_admin_edit_form;
  f.action='salvarapr?id='+id+'&desapr='+desapr+'&reftra='+reftra+'&fecapr='+fecapr+'&staapr='+staapr+'&nivel='+nivel;
  f.submit();
}


</script>
