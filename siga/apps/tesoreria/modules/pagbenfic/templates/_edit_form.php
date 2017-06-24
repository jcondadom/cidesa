<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/15 20:39:24
?>
<?php echo form_tag('pagbenfic/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo javascript_include_tag('dFilter', 'tools','observe', 'ajax') ?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Javascript','PopUp','Grid','Date','SubmitClick','tabs', 'Catalogo') ?>
<?php echo object_input_hidden_tag($opbenefi, 'getId') ?>
<?php echo input_hidden_tag('cargable', '') ?>
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Beneficiario') ?></legend>
<div class="form-row">
<table>
 <tr>
  <th>
<?php echo label_for('opbenefi[cedrif]', __($labels['opbenefi{cedrif}']), 'class="required" ') ?>
    <div
      class="content<?php if ($sf_request->hasError('opbenefi{cedrif}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('opbenefi{cedrif}')): ?> <?php echo form_error('opbenefi{cedrif}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
       <?php $value = object_input_tag($opbenefi, 'getCedrif', array (
      'size' => 20,
      'control_name' => 'opbenefi[cedrif]',
      'readonly' => $opbenefi->getId()!='' ? true : false ,
      'maxlength' => 15,
      )); echo $value ? $value : '&nbsp;' ?>
  </div>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
 <fieldset><legend><?php echo __('Tipo de Persona')?></legend>
      <div class="form-row">
 <?php if($opbenefi->getTipper()=='N') { ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Natural ".radiobutton_tag('opbenefi[tipper]', 'N', true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Jurídico ".radiobutton_tag('opbenefi[tipper]', 'J', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Gubernamental ".radiobutton_tag('opbenefi[tipper]', 'G', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
  <?php } elseif($opbenefi->getTipper()=='J') { ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Natural ".radiobutton_tag('opbenefi[tipper]', 'N', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Jurídico ".radiobutton_tag('opbenefi[tipper]', 'J', true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Gubernamental ".radiobutton_tag('opbenefi[tipper]', 'G', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
 <?php } elseif($opbenefi->getTipper()=='G') { ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Natural ".radiobutton_tag('opbenefi[tipper]', 'N', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Jurídico ".radiobutton_tag('opbenefi[tipper]', 'J', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Gubernamental ".radiobutton_tag('opbenefi[tipper]', 'G', true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
 <?php } else { ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Natural ".radiobutton_tag('opbenefi[tipper]', 'N', true).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Jurídico ".radiobutton_tag('opbenefi[tipper]', 'J', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Gubernamental ".radiobutton_tag('opbenefi[tipper]', 'G', false).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
<?php } ?>
      </div>
      </fieldset>
  </th>
 </tr>
 <tr>
 <th>
  <?php echo label_for('opbenefi[nitben]', __($labels['opbenefi{nitben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{nitben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{nitben}')): ?>
    <?php echo form_error('opbenefi{nitben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNitben', array (
  'size' => 20,
  'control_name' => 'opbenefi[nitben]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  </th>
  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th>
   <div id="divcedben" style="display:none">
  <?php echo label_for('opbenefi[cedben]', __($labels['opbenefi{cedben}']), 'class="required" Style="width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{cedben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{cedben}')): ?>
    <?php echo form_error('opbenefi{cedben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getCedben', array (
  'size' => 15,
  'control_name' => 'opbenefi[cedben]',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
    </div></div>
  </th>
 </tr>
</table>

<br>

    <?php echo label_for('opbenefi[nomben]', __($labels['opbenefi{nomben}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{nomben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{nomben}')): ?>
    <?php echo form_error('opbenefi{nomben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNomben', array (
  'size' => 80,
  'maxlength' => 250,
  'onkeyUp' =>  "javascript: return this.value = this.value.toUpperCase();",
  'control_name' => 'opbenefi[nomben]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <table>
  <tr>
  <th>
  <fieldset><legend><?php echo __('Nacionalidad')?></legend>
      <div class="form-row"><?php if($opbenefi->getNacionalidad()=='V') $val = true; else $val=false; ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'."Venezolano ".radiobutton_tag('opbenefi[nacionalidad]', 'V', $val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>&nbsp;
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Extranjero ".radiobutton_tag('opbenefi[nacionalidad]', 'E', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      </div>
      </fieldset>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
   <fieldset><legend><?php echo __('Residente')?></legend>
      <div class="form-row"><?php if($opbenefi->getResidente()=='S') $val = true; else $val=false; ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."Si             ".radiobutton_tag('opbenefi[residente]', 'S', $val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'."No             ".radiobutton_tag('opbenefi[residente]', 'N', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
      </div>
      </fieldset>
  </th>
  <th>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </th>
  <th>
    <fieldset><legend><?php echo __('Constituida')?></legend>
    <div class="form-row"><?php if($opbenefi->getConstituida()=='S') $val = true; else $val=false; ?>
    <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'."Si ".radiobutton_tag('opbenefi[constituida]', 'S', $val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
     <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;'."No ".radiobutton_tag('opbenefi[constituida]', 'N', !$val).'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' ?>
    </div>
    </fieldset>
  </th>
  </tr>
 </table>

 <br>

<?php echo label_for('opbenefi[dirben]', __($labels['opbenefi{dirben}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{dirben}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{dirben}')): ?> <?php echo form_error('opbenefi{dirben}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getDirben', array (
'size' => 80,
'control_name' => 'opbenefi[dirben]',
'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[telben]', __($labels['opbenefi{telben}']), 'class="required"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{telben}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{telben}')): ?> <?php echo form_error('opbenefi{telben}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getTelben', array (
'size' => 20,
'maxlength' => 30,
'control_name' => 'opbenefi[telben]',
'onBlur' =>"javascript:event.keyCode=13; return num(event)",
)); echo $value ? $value : '&nbsp;' ?></div>

<br>
<?php echo label_for('opbenefi[email]', __($labels['opbenefi{email}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{email}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{email}')): ?> <?php echo form_error('opbenefi{email}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getEmail', array (
  'size' => 55,
   'maxlength' => 50,
  'control_name' => 'opbenefi[email]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Cuentas');?>
<fieldset>
<div class="form-row">
<?php echo label_for('opbenefi[codcta]', __($labels['opbenefi{codcta}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codcta}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codcta}')): ?> <?php echo form_error('opbenefi{codcta}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodcta', array (
  'size' => 32,
  'control_name' => 'opbenefi[codcta]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codcta","opbenefi_nomcuentacont")',
        'condition' => "$('opbenefi_codcta').value != '' ",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentacont&cajtexcom=opbenefi_codcta&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codcta/obj2/opbenefi_nomcuentacont/campo1/codcta/campo2/descta/param1/1')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentacont', array (
'size' => 62,
'maxlength' => 32,
'disabled' => true,
'control_name' => 'opbenefi[nomcuentacont]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>

<br>

<?php echo label_for('opbenefi[codord]', __($labels['opbenefi{codord}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codord}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codord}')): ?> <?php echo form_error('opbenefi{codord}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodord', array (
  'size' => 32,
  'control_name' => 'opbenefi[codord]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codord","opbenefi_nomcuentaord")',
        'condition' => "$('opbenefi_codord').value != '' ",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentaord&cajtexcom=opbenefi_codord&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codord/obj2/opbenefi_nomcuentaord/campo1/codcta/campo2/descta/param1/2')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentaord', array (
  'size' => 62,
  'maxlength' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentaord]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codpercon]', __($labels['opbenefi{codpercon}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codpercon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codpercon}')): ?> <?php echo form_error('opbenefi{codpercon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> 

<?php $value = object_input_tag($opbenefi, 'getCodpercon', array (
  'size' => 32,
  'control_name' => 'opbenefi[codpercon]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codpercon","opbenefi_nomcuentapercon")',
        'condition' => "$('opbenefi_codpercon').value != '' ",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentapercon&cajtexcom=opbenefi_codpercon&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?> &nbsp;
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codpercon/obj2/opbenefi_nomcuentapercon/campo1/codcta/campo2/descta/param1/3')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentapercon', array (
  'size' => 62,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentapercon]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codtipben]', __($labels['opbenefi{codtipben}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codtipben}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codtipben}')): ?> <?php echo form_error('opbenefi{codtipben}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php echo input_auto_complete_tag('opbenefi[codtipben]', $opbenefi->getCodtipben(),
    'pagbenfic/autocomplete?ajax=1', array ('size' => 20, 'autocomplete' => 'off', 'maxlength' => 3, 'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opbenefi_codtipben').value != '' ",
        'with' => "'ajax=2&cajtexcom=opbenefi_codtipben&cajtexmos=opbenefi_tipobene&codigo='+this.value"
        ))),
   array('use_style' => 'true',)
  )
?>&nbsp;&nbsp;
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Optipben_Pagbenfi/clase/Optipben/frame/sf_admin_edit_form/obj1/opbenefi_codtipben/obj2/opbenefi_tipobene/campo1/codtipben/campo2/destipben')?>

<?php $value = object_input_tag($opbenefi, 'getTipobene', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'opbenefi[tipobene]',
  )); echo $value ? $value : '&nbsp;' ?></div>
<br>

<?php echo label_for('opbenefi[numcue]', __($labels['opbenefi{numcue}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{numcue}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{numcue}')): ?> <?php echo form_error('opbenefi{numcue}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($opbenefi, 'getNumcue', array (
  'size' => 25,
  'control_name' => 'opbenefi[numcue]',
  'maxlength' => 20,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opbenefi_numcue').value != ''",
        'with' => "'ajax=3&cajtexmos=opbenefi_nomcue&cajtexcom=opbenefi_numcue&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;&nbsp;
  <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ingreging_tsdefban/clase/Tsdefban/frame/sf_admin_edit_form/obj1/opbenefi_numcue/obj2/opbenefi_nomcue/campo1/numcue/campo2/nomcue')?>

<?php $value = object_input_tag($opbenefi, 'getNomcue', array (
  'size' => 60,
  'readonly' => true,
  'control_name' => 'opbenefi[nomcue]',
  )); echo $value ? $value : '&nbsp;' ?></div>

</div>

</fieldset>
<?php tabPageOpenClose("tp1", "tabPage2", 'Otras Cuentas (Actividad Secundaria)');?>
<fieldset>
<div class="form-row">
<?php echo label_for('opbenefi[codctasec]', __($labels['opbenefi{codctasec}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codctasec}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codctasec}')): ?> <?php echo form_error('opbenefi{codctasec}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodctasec', array (
  'size' => 32,
  'control_name' => 'opbenefi[codctasec]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codctasec","opbenefi_nomcuentacontsecun")',
        'condition' => "$('opbenefi_codctasec').value != '' ",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentacontsecun&cajtexcom=opbenefi_codctasec&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>

    <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codctasec/obj2/opbenefi_nomcuentacontsecun/campo1/codcta/campo2/descta/param1/6')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentacontsecun', array (
  'size' => 62,
  'maxlength' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentacontsecun]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codordadi]', __($labels['opbenefi{codordadi}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codordadi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codordadi}')): ?> <?php echo form_error('opbenefi{codordadi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodordadi', array (
  'size' => 32,
  'control_name' => 'opbenefi[codordadi]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codordadi","opbenefi_nomcuentaordsecun")',
        'condition' => "$('opbenefi_codordadi').value != '' ",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentaordsecun&cajtexcom=opbenefi_codordadi&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
      <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codordadi/obj2/opbenefi_nomcuentaordsecun/campo1/codcta/campo2/descta/param1/4')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentaordsecun', array (
  'size' => 62,
  'maxlength' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentaordsecun]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codperconadi]', __($labels['opbenefi{codperconadi}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codperconadi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codperconadi}')): ?> <?php echo form_error('opbenefi{codperconadi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodperconadi', array (
  'size' => 32,
  'control_name' => 'opbenefi[codperconadi]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codperconadi","opbenefi_nomcuentaperconsecun")',
        'condition' => "$('opbenefi_codperconadi').value != ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomcuentaperconsecun&cajtexcom=opbenefi_codperconadi&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
        <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codperconadi/obj2/opbenefi_nomcuentaperconsecun/campo1/codcta/campo2/descta/param1/5')?>

<?php $value = object_input_tag($opbenefi, 'getNomcuentaperconsecun', array (
  'size' => 62,
  'maxlength' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomcuentaperconsecun]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codctacajchi]', __($labels['opbenefi{codctacajchi}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codctacajchi}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codctacajchi}')): ?> <?php echo form_error('opbenefi{codctacajchi}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($opbenefi, 'getCodctacajchi', array (
  'size' => 32,
  'control_name' => 'opbenefi[codctacajchi]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codctacajchi","opbenefi_nomctacajchi")',
        'condition' => "$('opbenefi_codctacajchi').value != '' ",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomctacajchi&cajtexcom=opbenefi_codctacajchi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
       <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_pagbenfic/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codctacajchi/obj2/opbenefi_nomctacajchi/campo1/codcta/campo2/descta/param1/7')?>

<?php $value = object_input_tag($opbenefi, 'getNomctacajchi', array (
  'size' => 62,
  'maxlegth' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomctacajchi]',
  )); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('opbenefi[codctaant]', __($labels['opbenefi{codctaant}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codctaant}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codctaant}')): ?> <?php echo form_error('opbenefi{codctaant}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> 
<?php $value = object_input_tag($opbenefi, 'getCodctaant', array (
  'size' => 32,
  'control_name' => 'opbenefi[codctaant]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codctaant","opbenefi_nomctacajchi")',
        'condition' => "$('opbenefi_codctaant').value != ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomctafonant&cajtexcom=opbenefi_codctaant&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
       <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codctaant/obj2/opbenefi_nomctafonant/campo1/codcta/campo2/descta')?>

<?php $value = object_input_tag($opbenefi, 'getNomctafonant', array (
  'size' => 62,
  'maxlegth' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomctafonant]',
  )); echo $value ? $value : '&nbsp;' ?></div>  

<br> <br>

<?php echo label_for('opbenefi[codcopant]', __($labels['opbenefi{codcopant}']), 'class="required" Style="width:110px"') ?>
<div
  class="content<?php if ($sf_request->hasError('opbenefi{codcopant}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('opbenefi{codcopant}')): ?> <?php echo form_error('opbenefi{codcopant}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> 
<?php $value = object_input_tag($opbenefi, 'getCodcopant', array (
  'size' => 32,
  'control_name' => 'opbenefi[codcopant]',
  'onKeyDown'  => "javascript:return dFilter (event.keyCode, this,'$mascaracontabilidad')",
  'maxlength' => $lengthmask,
  'onBlur'=> remote_function(array(
        'url'      => 'pagbenfic/ajax',
        'complete' => 'AjaxJSON(request, json), verificar("opbenefi_codcopant","opbenefi_nomctacajchi")',
        'condition' => "$('opbenefi_codcopant').value != ''",
        'with' => "'ajax=1&cajtexmos=opbenefi_nomctaopant&cajtexcom=opbenefi_codcopant&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
       <?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp/clase/Contabb/frame/sf_admin_edit_form/obj1/opbenefi_codcopant/obj2/opbenefi_nomctaopant/campo1/codcta/campo2/descta')?>

<?php $value = object_input_tag($opbenefi, 'getNomctaopant', array (
  'size' => 62,
  'maxlegth' => 32,
  'disabled' => true,
  'control_name' => 'opbenefi[nomctaopant]',
  )); echo $value ? $value : '&nbsp;' ?></div>    
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage3", 'Informacion Bancaria');?>
<fieldset>
<div class="form-row">
    <?php echo label_for('opbenefi[codban]', __($labels['opbenefi{codban}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('opbenefi{codban}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opbenefi{codban}')): ?>
      <?php echo form_error('opbenefi{codban}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

        <?php $value = get_partial('codban', array('type' => 'edit', 'opbenefi' => $opbenefi)); echo $value ? $value : '&nbsp;' ?>
      </div>

<br >

    <?php echo label_for('opbenefi[numcueb]', __($labels['opbenefi{numcueb}']), 'class="required"') ?>
    <div class="content<?php if ($sf_request->hasError('opbenefi{numcueb}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opbenefi{numcueb}')): ?>
      <?php echo form_error('opbenefi{numcueb}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php $value = object_input_tag($opbenefi, 'getNumcueb', array (
    'size' => 30,
    'maxlength' => 20,
    'readonly' => $opbenefi->getTieCuePer()!='' ? true : false ,
    'control_name' => 'opbenefi[numcueb]',
  )); echo $value ? $value : '&nbsp;' ?>
      </div>

<br>
 <?php echo label_for('opbenefi[codtipban]', __($labels['opbenefi{codtipban}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{codtipban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{codtipban}')): ?>
    <?php echo form_error('opbenefi{codtipban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('opbenefi[codtipban]', options_for_select(TstipcuePeer::ListaTipoCuenta(),$opbenefi->getCodtipban(),'include_custom=Seleccione Uno')) ?>
    </div>         
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage4", 'Otros Datos');?>
<fieldset>
<legend><?php echo __('Intermediario')?></legend>
<div class="form-row">
  <?php echo label_for('opbenefi[banint]', __($labels['opbenefi{banint}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{banint}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{banint}')): ?>
    <?php echo form_error('opbenefi{banint}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($opbenefi, 'getBanint', array (
  'control_name' => 'opbenefi[banint]',
  'size' => '80x2',
  'maxlength' => 100,
  'onkeyup' => 'javascript:return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[numcueint]', __($labels['opbenefi{numcueint}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{numcueint}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{numcueint}')): ?>
    <?php echo form_error('opbenefi{numcueint}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNumcueint', array (
  'size' => 25,
  'control_name' => 'opbenefi[numcueint]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[dirbanint]', __($labels['opbenefi{dirbanint}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{dirbanint}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{dirbanint}')): ?>
    <?php echo form_error('opbenefi{dirbanint}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($opbenefi, 'getDirbanint', array (
  'control_name' => 'opbenefi[dirbanint]',
  'size' => '80x2',
  'maxlength' => 200,
  'onkeyup' => 'javascript:return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[codswiint]', __($labels['opbenefi{codswiint}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{codswiint}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{codswiint}')): ?>
    <?php echo form_error('opbenefi{codswiint}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getCodswiint', array (
  'size' => 25,
  'control_name' => 'opbenefi[codswiint]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[numabaint]', __($labels['opbenefi{numabaint}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{numabaint}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{numabaint}')): ?>
    <?php echo form_error('opbenefi{numabaint}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNumabaint', array (
  'size' => 25,
  'control_name' => 'opbenefi[numabaint]',
  'maxlength' => 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[numibaint]', __($labels['opbenefi{numibaint}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{numibaint}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{numibaint}')): ?>
    <?php echo form_error('opbenefi{numibaint}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNumibaint', array (
  'size' => 25,
  'control_name' => 'opbenefi[numibaint]',
  'maxlength' => 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[numrouint]', __($labels['opbenefi{numrouint}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{numrouint}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{numrouint}')): ?>
    <?php echo form_error('opbenefi{numrouint}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNumrouint', array (
  'size' => 25,
  'control_name' => 'opbenefi[numrouint]',
  'maxlength' => 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset> 
<fieldset>
<legend><?php echo __('Beneficiario')?></legend>
<div class="form-row">

  <?php echo label_for('opbenefi[banben]', __($labels['opbenefi{banben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{banben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{banben}')): ?>
    <?php echo form_error('opbenefi{banben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($opbenefi, 'getBanben', array (
  'control_name' => 'opbenefi[banben]',
  'size' => '80x2',
  'maxlength' => 100,
  'onkeyup' => 'javascript:return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[numcueben]', __($labels['opbenefi{numcueben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{numcueben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{numcueben}')): ?>
    <?php echo form_error('opbenefi{numcueben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNumcueben', array (
  'size' => 25,
  'control_name' => 'opbenefi[numcueben]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
 
<br>
  <?php echo label_for('opbenefi[dirbanben]', __($labels['opbenefi{dirbanben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{dirbanben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{dirbanben}')): ?>
    <?php echo form_error('opbenefi{dirbanben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($opbenefi, 'getDirbanben', array (
  'control_name' => 'opbenefi[dirbanben]',
  'size' => '80x2',
  'maxlength' => 200,
  'onkeyup' => 'javascript:return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[codswiben]', __($labels['opbenefi{codswiben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{codswiben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{codswiben}')): ?>
    <?php echo form_error('opbenefi{codswiben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getCodswiben', array (
  'size' => 25,
  'control_name' => 'opbenefi[codswiben]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opbenefi[numababen]', __($labels['opbenefi{numababen}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{numababen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{numababen}')): ?>
    <?php echo form_error('opbenefi{numababen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNumababen', array (
  'size' => 25,
  'control_name' => 'opbenefi[numababen]',
  'maxlength' => 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('opbenefi[numibaben]', __($labels['opbenefi{numibaben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{numibaben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{numibaben}')): ?>
    <?php echo form_error('opbenefi{numibaben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNumibaben', array (
  'size' => 25,
  'control_name' => 'opbenefi[numibaben]',
  'maxlength' => 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>


<br>
  <?php echo label_for('opbenefi[numrouben]', __($labels['opbenefi{numrouben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opbenefi{numrouben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opbenefi{numrouben}')): ?>
    <?php echo form_error('opbenefi{numrouben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opbenefi, 'getNumrouben', array (
  'size' => 25,
  'control_name' => 'opbenefi[numrouben]',
  'maxlength' => 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>  

<?php if ($opbenefi->getBenvarcta()=='S') tabPageOpenClose("tp1", "tabPage5", 'Cuentas Constables Activas');?>
<div id="datcuentas" style="display:none">
<fieldset>
<div class="form-row">
  <?php  echo grid_tag_v2($opbenefi->getObj()); ?>
</div>
</fieldset>  
</div>




  <?php tabInit('tp1','0');?>
<?php include_partial('edit_actions', array('opbenefi' => $opbenefi)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-rigth"><?php if ($opbenefi->getId()): ?>
<?php echo button_to(__('delete'), 'pagbenfic/delete?id='.$opbenefi->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">

var gridcuentas='<?php echo $opbenefi->getBenvarcta();?>';
if (gridcuentas=='S')
  $('datcuentas').show();

var tiecedben='<?php echo H::getConfApp2('tiecedben', 'tesoreria', 'pagbenfic');?>'
if (tiecedben=='S')
  $('divcedben').show();
function num(e) {
    evt = e ? e : event;
    tcl = (window.Event) ? evt.which : evt.keyCode;
    if ((tcl < 48 || tcl > 57 ) && tcl != '8')
    {
        return false;
    }
    return true;
}

function verificar(id,id2)
{
  if ($('cargable').value!='C' && $(id).value!="")
  {
  	alert('La Cuenta Contable no es Cargable, Por favor Cambiela por una Cuenta Cargable');
  	$(id).value="";
  	$(id2).value="";
  	$('cargable').value="";

  }
}
</script>
