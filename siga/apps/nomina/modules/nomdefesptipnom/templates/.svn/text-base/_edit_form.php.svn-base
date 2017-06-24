<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/20 20:25:45
?>
<?php echo form_tag('nomdefesptipnom/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($npnomina, 'getId') ?>
<?php echo javascript_include_tag('ajax', 'tools', 'observe', 'dFilter') ?>

<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Datos del Tipo de Nómina') ?></h2>
<div class="form-row">
  <table>
    <tr>
      <th> <?php echo label_for('npnomina[codnom]', __($labels['npnomina{codnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{codnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{codnom}')): ?>
    <?php echo form_error('npnomina{codnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomina, 'getCodnom', array (
  'size' => 3,
  'control_name' => 'npnomina[codnom]',
  'maxlength' => 3,
  'readonly'  =>  $npnomina->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('npnomina_codnom').value=cadena",
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(3, '0',0);$('npnomina_codnom').value=valor;",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
    <?php echo label_for('npnomina[frecal]', __($labels['npnomina{frecal}']), 'class="required" Style="width:140px"') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{frecal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{frecal}')): ?>
    <?php echo form_error('npnomina{frecal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php
	echo
	select_tag('npnomina[frecal]', options_for_select(
	$listafrecpag,
	$npnomina->getFrecal(),'include_custom=Seleccione Uno'),
	array( 'onChange'=> remote_function(array(
		'script'   => true,
		'url'      => 'nomdefesptipnom/ajax?ajax=1',
		'condition' => "$('npnomina_ultfec').value != ''",
		'complete' => 'AjaxJSON(request, json)',
		'with' => "'codigo='+this.value+'&ultfec='+$('npnomina_ultfec').value"
		)))
	);
?>

  </div>
  </th>
    </tr>
  </table>

<br>

  <?php echo label_for('npnomina[nomnom]', __($labels['npnomina{nomnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{nomnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{nomnom}')): ?>
    <?php echo form_error('npnomina{nomnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomina, 'getNomnom', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'npnomina[nomnom]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Fechas de Procesamiento') ?></h2>
<div class="form-row">
  <table>
    <tr>
      <th> <?php echo label_for('npnomina[ultfec]', __($labels['npnomina{ultfec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{ultfec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{ultfec}')): ?>
    <?php echo form_error('npnomina{ultfec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npnomina, 'getUltfec', array (
  'rich' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npnomina[ultfec]',
  'date_format' => 'dd/MM/yy',
  'maxlength' => 10,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
   'onChange'=> remote_function(array(
        'url'      => 'nomdefesptipnom/ajax?ajax=1',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('npnomina_ultfec').value != ''",
        'with' => "'codigo='+$('npnomina_frecal').value+'&ultfec='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

    </div></th><th>
    <?php echo label_for('npnomina[profec]', __($labels['npnomina{profec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{profec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{profec}')): ?>
    <?php echo form_error('npnomina{profec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

    <div id="divProfec">
	  <?php
	  /*$value = object_input_tag($npnomina, 'getProfec', array (
	  	'maxlength' => 10,
	  	'size' => 10,
	  	'readonly' => true,
	  	'control_name' => 'npnomina[profec]',
		)); echo $value ? $value : '&nbsp;' */ ?>

	  <?php /*$value = object_input_tag($npnomina, 'getProfec_', array (
	  	'maxlength' => 10,
	  	'size' => 10,
	  	//'readonly' => true,
	  	'control_name' => 'npnomina[profec_]',
		)); echo $value ? $value : '&nbsp;' */?>
          <?php $value = object_input_date_tag($npnomina, 'getProfec', array (
          'rich' => true,
          'maxlength' => 10,
          'size' => 10,
          'calendar_button_img' => '/sf/sf_admin/images/date.png',
          'control_name' => 'npnomina[profec]',
          'date_format' => 'dd/MM/yy',
          'maxlength' => 10,
          'onkeyup' => "javascript: mascara(this,'/',patron,true)",
		)); echo $value ? $value : '&nbsp;' ?>

	</div>

    </div></th><th>  <?php echo label_for('npnomina[numsem]', __($labels['npnomina{numsem}']), 'class=required') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{numsem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{numsem}')): ?>
    <?php echo form_error('npnomina{numsem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomina, 'getNumsem', array (
  'size' => 2,
  'maxlength' => 2,
  'readonly' => true,
  'control_name' => 'npnomina[numsem]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    </tr>
  </table>
</div>
</fieldset>
<br>
<div style="display:none">
  <?php echo label_for('npnomina[ordpag]', __($labels['npnomina{ordpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{ordpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{ordpag}')): ?>
    <?php echo form_error('npnomina{ordpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('npnomina[ordpag]', options_for_select($listagenordpag,$npnomina->getOrdpag())) ?>
    </div>
</div>

<?php echo label_for('npnomina[codban]', __($labels['npnomina{codban}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{codban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{codban}')): ?>
    <?php echo form_error('npnomina{codban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomina, 'getCodban', array (
  'size' => 5,
  'control_name' => 'npnomina[codban]',
  'maxlength' => 2,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('npnomina[numcue]', __($labels['npnomina{numcue}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{numcue}')): ?>
    <?php echo form_error('npnomina{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npnomina, 'getNumcue', array (
  'size' => 25,
  'control_name' => 'npnomina[numcue]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<div id="mancuenta" style="display:none">
<?php $mascaracontabilidad=H::ObtenerFormato('Contaba','Forcta');?>
<?php echo label_for('npnomina[codcta]', __($labels['npnomina{codcta}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npnomina{codcta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npnomina{codcta}')): ?>
    <?php echo form_error('npnomina{codcta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($npnomina, 'getCodcta', array (
  'size' => 32,
  'control_name' => 'npnomina[codcta]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => strlen($mascaracontabilidad),
  'onBlur'=> remote_function(array(
    'url'      => 'nomdefesptipnom/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('npnomina_codcta').value != '' ",
    'with' => "'ajax=2&cajtexmos=npnomina_descta&cajtexcom=npnomina_codcta&codigo='+this.value"
    ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp/clase/Contabb/frame/sf_admin_edit_form/obj1/npnomina_codcta/obj2/npnomina_descta/campo1/codcta/campo2/descta')?>

  <?php $value = object_input_tag($npnomina, 'getDescta', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'npnomina[descta]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</div>
</fieldset>

<?php include_partial('edit_actions', array('npnomina' => $npnomina)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($npnomina->getId()): ?>
<?php echo button_to(__('delete'), 'nomdefesptipnom/delete?id='.$npnomina->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript" language="JavaScript">
var mancodcta='<?php echo H::getConfApp2('mancodcta', 'nomina', 'nomdefesptipnom'); ?>';
  if (mancodcta=='S')
  $('mancuenta').show();
$('npnomina_profec').readOnly=true;
$('trigger_npnomina_profec').hide();
</script>
