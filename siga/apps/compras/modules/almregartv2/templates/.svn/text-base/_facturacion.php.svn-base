
<div class="form-row">
  <?php echo label_for('caregart[ctavta]', __($labels['caregart{ctavta}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{ctavta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{ctavta}')): ?>
    <?php echo form_error('caregart{ctavta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getctavta', array (
  'size' => 20,
  'maxlength' => $longcont,
  'control_name' => 'caregart[ctavta]',
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('caregart_ctavta').value=cadena; var aux=$('caregart_ctavta').value; aux2=aux.split('-'); if (aux2[0]=='' || $('caregart_ctavta').value=='undefined'){ $('caregart_ctavta').value='';}",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'almregartv2/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caregart_ctavta').value != ''",
        'script' => true,
         'with' => "'ajax=13&cajtexcom=caregart_ctavta&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregart/clase/Contabb/frame/sf_admin_edit_form/campo1/codcta/obj1/caregart_ctavta','','','botoncat')?></th>

  </div>
</div>

<div class="form-row">
  <?php echo label_for('caregart[ctacos]', __($labels['caregart{ctacos}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{ctacos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{ctacos}')): ?>
    <?php echo form_error('caregart{ctacos}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getctacos', array (
  'size' => 20,
  'maxlength' => $longcont,
  'control_name' => 'caregart[ctacos]',
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('caregart_ctacos').value=cadena; var aux=$('caregart_ctacos').value; aux2=aux.split('-'); if (aux2[0]=='' || $('caregart_ctacos').value=='undefined'){ $('caregart_ctacos').value='';}",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'almregartv2/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caregart_ctacos').value != ''",
        'script' => true,
         'with' => "'ajax=13&cajtexcom=caregart_ctacos&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregart/clase/Contabb/frame/sf_admin_edit_form/campo1/codcta/obj1/caregart_ctacos','','','botoncat')?></th>
  </div>
</div>


<div class="form-row">
  <?php echo label_for('caregart[ctapro]', __($labels['caregart{ctapro}']), 'class="required" Style="width:110px"') ?>
  <div class="content<?php if ($sf_request->hasError('caregart{ctapro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caregart{ctapro}')): ?>
    <?php echo form_error('caregart{ctapro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caregart, 'getctapro', array (
  'size' => 20,
  'maxlength' => $longcont,
  'control_name' => 'caregart[ctapro]',
  'onBlur' => "javascript:cadena=rayitas(this.value);document.getElementById('caregart_ctapro').value=cadena; var aux=$('caregart_ctapro').value; aux2=aux.split('-'); if (aux2[0]=='' || $('caregart_ctapro').value=='undefined'){ $('caregart_ctapro').value='';}",
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'onBlur'=> remote_function(array(
        'url'      => 'almregartv2/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('caregart_ctapro').value != ''",
        'script' => true,
         'with' => "'ajax=13&cajtexcom=caregart_ctapro&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Almregart/clase/Contabb/frame/sf_admin_edit_form/campo1/codcta/obj1/caregart_ctapro','','','botoncat')?></th>
  </div>
</div>
