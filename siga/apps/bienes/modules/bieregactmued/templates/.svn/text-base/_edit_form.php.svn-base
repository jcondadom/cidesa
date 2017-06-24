<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/04/02 20:18:52
?>
<?php echo form_tag('bieregactmued/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Javascript','PopUp','Grid','Date','SubmitClick','tabs', 'Catalogo') ?>
<?php echo javascript_include_tag('dFilter','bienes/bieregactmued','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($bnregmue, 'getId') ?>
<?php echo object_input_hidden_tag($bnregmue, 'getStamue') ?>
<?php echo input_hidden_tag('incorporacion', $incorporacion) ?>
<?php echo input_hidden_tag('bnregmue[renovo]', $bnregmue->getRenovo()) ?>
<?php echo input_hidden_tag('bnregmue[numcom]', $bnregmue->getNumcom()) ?>
<input id="idrefer" name="idrefer" type="hidden" value="<? print $bnregmue->getIdrefer(); ?>">

<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="4" face="Verdana, Arial, Helvetica, sans-serif"> <? print $desincorp;?></font></strong></th>
  </tr>
</table>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Registro ');?>
<a name="registro"></a>
<fieldset>
<div class="form-row">
    
<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Datos Principales') ?></h2>
<div class="form-row">
  <?php echo label_for('bnregmue[codact]', __($labels['bnregmue{codact}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codact}')): ?>
    <?php echo form_error('bnregmue{codact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;
  <?php $value = object_input_tag($bnregmue, 'getCodact', array (
  'size' => 16,
  'control_name' => 'bnregmue[codact]',
  'maxlength' => $lonact,
  'readonly'  =>  $bnregmue->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$foract')",
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
         'condition' => "$('bnregmue_codact').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=bnregmue_codact&cajtexcom=bnregmue_desmue&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefact_Bieregactmued/clase/Bndefact/frame/sf_admin_edit_form/obj1/bnregmue_codact/obj2/bnregmue_desmue/obj3/bnregmue_viduti/campo1/codact/campo2/desact/campo3/viduti','','','botoncat')?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Código Mueble:') ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php $value = object_input_tag($bnregmue, 'getCodmue', array (
  'size' => 12,
  'control_name' => 'bnregmue[codmue]',
  'maxlength' => 20,
  'readonly'  =>  $bnregmue->getId()!='' ? true : false ,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('bnregmue[desmue]', __($labels['bnregmue{desmue}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{desmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{desmue}')): ?>
    <?php echo form_error('bnregmue{desmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;
  <?php $value = object_textarea_tag($bnregmue, 'getDesmue', array (
  'control_name' => 'bnregmue[desmue]',
  'maxlength'    => '250',
  'cols' => '84',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
  <br>
 <?php echo label_for('bnregmue[codalt]', __($labels['bnregmue{codalt}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codalt}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codalt}')): ?>
    <?php echo form_error('bnregmue{codalt}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;&nbsp;
  <?php $value = object_input_tag($bnregmue, 'getCodalt', array (
  'size' => 20,
  'maxlength' => 30,
  'control_name' => 'bnregmue[codalt]',
)); echo $value ? $value : '&nbsp;' ?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php if ($bnregmue->getEtifeccal()=='S') {?>
<strong><? echo __('Fecha de Recepción del Bien:  ') ?></strong>
<?php }else if ($bnregmue->getEtifeccal2()=='S') {?>
<strong><? echo __('Fecha de Ingreso:  ') ?></strong>
<?php } else {?>
<strong><? echo __('Fecha Cálculo:  ') ?></strong>
<?php }?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_date_tag($bnregmue, 'getFecreg', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecreg]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br><br>
<div id="divfecins" style="display:none">
  <?php echo label_for('bnregmue[fecins]', __($labels['bnregmue{fecins}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{fecins}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{fecins}')): ?>
    <?php echo form_error('bnregmue{fecins}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnregmue, 'getFecins', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecins]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<br>
  <div id="divsudebip" style="display:none">
<?php echo label_for('bnregmue[sudebip]', __($labels['bnregmue{sudebip}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{sudebip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{sudebip}')): ?>
    <?php echo form_error('bnregmue{sudebip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getSudebip', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'bnregmue[sudebip]',
)); echo $value ? $value : '&nbsp;' ?>    
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bncatsudebip_Bieregmue/clase/Bncatsudebip/frame/sf_admin_edit_form/obj1/bnregmue_sudebip/obj2/desudebip/campo1/sudebip/campo2/desudebip')?>
&nbsp;
    <?php echo input_tag('desudebip',$bnregmue->getDesudebip(),'disabled=true, size=41')?>
  </div>
    </div>
<br>
<div id="feccont" style="display:none">
<?php echo label_for('bnregmue[fecont]', __($labels['bnregmue{fecont}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{fecont}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{fecont}')): ?>
    <?php echo form_error('bnregmue{fecont}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_date_tag($bnregmue, 'getFecont', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecont]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?></div>   
</div>    
<br>
  <div id="divanoinv" style="display:none">
<?php echo label_for('bnregmue[anoinv]', __($labels['bnregmue{anoinv}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{anoinv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{anoinv}')): ?>
    <?php echo form_error('bnregmue{anoinv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getAnoinv', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'bnregmue[anoinv]',
)); echo $value ? $value : '&nbsp;' ?>    
  </div>
    </div> 
<br>
<div id="divbiemuedep" style="display:none">
<?php echo label_for('bnregmue[codactdep]', __($labels['bnregmue{codactdep}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codactdep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codactdep}')): ?>
    <?php echo form_error('bnregmue{codactdep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodactdep', array (
  'size' => 16,
  'control_name' => 'bnregmue[codactdep]',
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codactdep').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=24&cajtexmos=bnregmue_codmuedep&codmuedep='+$('bnregmue_codmuedep').value+'&codact='+$('bnregmue_codact').value+'&codmue='+$('bnregmue_codmue').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Biedisactmuenew/clase/Bnregmue/frame/sf_admin_edit_form/obj1/bnregmue_codactdep/obj2/bnregmue_codmuedep/campo1/codact/campo2/codmue')?>
    </div>
<br>
  <?php echo label_for('bnregmue[codmuedep]', __($labels['bnregmue{codmuedep}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codmuedep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codmuedep}')): ?>
    <?php echo form_error('bnregmue{codmuedep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodmuedep', array (
  'size' => 20,
  'readOnly' => true,
  'control_name' => 'bnregmue[codmuedep]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</div>
</fieldset>
    
<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Datos de Adquisión') ?></h2>    
<div class="form-row">
  <?php echo label_for('bnregmue[ordcom]', __($labels['bnregmue{ordcom}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{ordcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{ordcom}')): ?>
    <?php echo form_error('bnregmue{ordcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getOrdcom', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'bnregmue[ordcom]',
  'onBlur'=> remote_function(array(
        'url' => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_ordcom').value != '' ",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=2&cajtexmos=bnregmue_ordcom&cajtexmos_uno=bnregmue_codpro&cajtexmos_dos=nomprovee&cajtexmos_tres=bnregmue_feccom&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caordcom_Bieregactmued/clase/Caordcom/frame/sf_admin_edit_form/obj1/bnregmue_ordcom/obj2/bnregmue_codpro/obj3/bnregmue_feccom/obj4/nomprovee/campo1/ordcom/campo2/codpro/campo3/fecord/campo4/nompro')?>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Fecha Compra:  ') ?></strong>
  <?php $value = object_input_date_tag($bnregmue, 'getFeccom', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[feccom]',
  'date_format' => 'dd/MM/yyyy',
   'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
    <?php echo label_for('bnregmue[ordrcp]', __($labels['bnregmue{ordrcp}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{ordrcp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{ordrcp}')): ?>
    <?php echo form_error('bnregmue{ordrcp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($bnregmue, 'getOrdrcp', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'bnregmue[ordrcp]',
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('bnregmue_ordrcp').value=valor;document.getElementById('bnregmue_ordrcp').disabled=false;",
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Fecha Factura:  ') ?></strong>
  <?php $value = object_input_date_tag($bnregmue, 'getFecfac', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecfac]',
  'date_format' => 'dd/MM/yyyy',
   'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<div id="divnumord" style="display:none">
<br>
<?php echo label_for('bnregmue[numord]', __($labels['bnregmue{numord}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{numord}')): ?>
    <?php echo form_error('bnregmue{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getNumord', array (
  'size' => 15,
  'maxlength' => 8,
  'control_name' => 'bnregmue[numord]',
  'onBlur'=> remote_function(array(
        'url' => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_numord').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=8&cajtexmos=bnregmue_numord&cajtexmos=bnregmue_numord&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opordpag_Bieregactmued/clase/Opordpag/frame/sf_admin_edit_form/obj1/bnregmue_numord/campo1/numord')?>
</div>
</div>
   
<br>
<?php echo label_for('bnregmue[nrocon]', __($labels['bnregmue{nrocon}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('bnregmue{nrocon}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bnregmue{nrocon}')): ?> <?php echo form_error('bnregmue{nrocon}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getNrocon', array (
'size' => 15,
'maxlength' => 20,
'control_name' => 'bnregmue[nrocon]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Fecha de Control:  ') ?></strong>
  <?php $value = object_input_date_tag($bnregmue, 'getFeccon', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[feccon]',
  'date_format' => 'dd/MM/yyyy',
   'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
  </div>
<br>
  <?php echo label_for('bnregmue[codpro]', __($labels['bnregmue{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codpro}')): ?>
    <?php echo form_error('bnregmue{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodpro', array (
  'size' => 15,
  'maxlength' => 20,
  'control_name' => 'bnregmue[codpro]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caprovee_Bieregactmued/clase/Caprovee/frame/sf_admin_edit_form/obj1/bnregmue_codpro/obj2/nomprovee/campo1/codpro/campo2/nompro')?>
&nbsp;
  <? echo input_tag('nomprovee',$bnregmue->getNomprovee(),'disabled=true,size=41')?>
    </div>
<br>
  <?php echo label_for('bnregmue[codproc]', __($labels['bnregmue{codproc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codproc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codproc}')): ?>
    <?php echo form_error('bnregmue{codproc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodproc', array (
  'size' => 10,
  'maxlength' => 3,
  'control_name' => 'bnregmue[codproc]',
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codproc').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=15&cajtexmos=bnregmue_codproc&cajtexcom=desproc&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndefpro_Bieregmue/clase/Bndefpro/frame/sf_admin_edit_form/obj1/bnregmue_codproc/obj2/desproc/campo1/codproc/campo2/desproc')?>
&nbsp;
  <? echo input_tag('desproc',$bnregmue->getDesproc(),'disabled=true,size=41')?>
    </div>  
<br><br>
<?php echo label_for('bnregmue[codusobie]', __($labels['bnregmue{codusobie}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codusobie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codusobie}')): ?>
    <?php echo form_error('bnregmue{codusobie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodusobie', array (
  'size' => 10,
  'maxlength' => 3,
  'control_name' => 'bnregmue[codusobie]',
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codusobie').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=23&cajtexmos=desusobie&cajtexcom=bnregmue_codusobie&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnusobie_Bieregactmued/clase/Bnusobie/frame/sf_admin_edit_form/obj1/bnregmue_codusobie/obj2/desusobie/campo1/codusobie/campo2/desusobie')?>
&nbsp;
  <? echo input_tag('desusobie',$bnregmue->getDesusobie(),'disabled=true,size=41')?>
    </div>  
<br>
<div id="divactrec" style="display:none">
  <?php echo label_for('bnregmue[actrec]', __($labels['bnregmue{actrec}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{actrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{actrec}')): ?>
    <?php echo form_error('bnregmue{actrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getActrec', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'bnregmue[actrec]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</div>
</fieldset>
    
    <fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Traslado del Bien') ?></h2>    
<div class="form-row">
    <?php echo label_for('bnregmue[codest]', __($labels['bnregmue{codest}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codest}')): ?>
    <?php echo form_error('bnregmue{codest}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodest', array (
  'size' => 5,
  'control_name' => 'bnregmue[codest]',
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codest').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=10&cajtexmos=bnregmue_codest&cajtexcom=desest&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Bnestcon/clase/Bnestcon/frame/sf_admin_edit_form/obj1/bnregmue_codest/obj2/desest/campo1/codest/campo2/desest','','','botoncat')?>
&nbsp;&nbsp;
  <? echo input_tag('desest',$bnregmue->getDesest(),'size=41')?>
    </div>

<br>
<?php echo label_for('bnregmue[codmod]', __($labels['bnregmue{codmod}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codmod}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codmod}')): ?>
    <?php echo form_error('bnregmue{codmod}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodmod', array (
  'size' => 5,
  'control_name' => 'bnregmue[codmod]',
  'maxlength' => 3,
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codmod').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=11&cajtexmos=bnregmue_codmod&cajtexcom=desmod&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnregmue_Bnmodtra/clase/Bnmodtra/frame/sf_admin_edit_form/obj1/bnregmue_codmod/obj2/desmod/campo1/codmod/campo2/desmod','','','botoncat')?>
&nbsp;&nbsp;
  <? echo input_tag('desmod',$bnregmue->getDesmod(),'size=41')?>
    </div>
    </div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Ubicación') ?></h2>
<div class="form-row">
  <?php echo label_for('bnregmue[codubi]', __($labels['bnregmue{codubi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codubi}')): ?>
    <?php echo form_error('bnregmue{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodubi', array (
  'size' => 25,
  'control_name' => 'bnregmue[codubi]',
  'maxlength' => $lonubi,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codubi').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=3&cajtexmos=bnregmue_codubi&cajtexcom=desubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Bieregactmued/clase/Bnubibie/frame/sf_admin_edit_form/obj1/bnregmue_codubi/obj2/desubi/campo1/codubi/campo2/desubi')?>
&nbsp;&nbsp;
  <? echo input_tag('desubi',$bnregmue->getNomubicac(),'size=41')?>
    </div>

    <br>

<?php echo label_for('bnregmue[codubiadm]', __($labels['bnregmue{codubiadm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codubiadm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codubiadm}')): ?>
    <?php echo form_error('bnregmue{codubiadm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodubiadm', array (
  'size' => 25,
  'control_name' => 'bnregmue[codubiadm]',
  'maxlength' => $lonubiadm,
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$forubiadm')",
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codubiadm').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=9&cajtexmos=bnregmue_codubiadm&cajtexcom=desubiadm&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/bnregmue_codubiadm/obj2/desubiadm/campo1/codubi/campo2/desubi/param1/'.$lonubiadm,'','','botoncat')?>
&nbsp;&nbsp;
  <? echo input_tag('desubiadm',$bnregmue->getDesubiadm(),'size=41')?>
    </div>
<br>

<strong><?php echo 'Procedencia '?></strong>
&nbsp;
<?php if ($bnregmue->getProced()=='N')  {
  ?><?php echo radiobutton_tag('bnregmue[proced]', 'N', true)        ."Nacional".'&nbsp;&nbsp;';
      echo radiobutton_tag('bnregmue[proced]', 'R', false)."   Regional";?>
    <?php
}else{
  echo radiobutton_tag('bnregmue[proced]', 'N', false)        ."Nacional".'&nbsp;&nbsp;';
  echo radiobutton_tag('bnregmue[proced]', 'R', true)."   Regional";
} ?>    
<br>
<br>
  <?php echo label_for('bnregmue[codpai]', __($labels['bnregmue{codpai}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codpai}')): ?>
    <?php echo form_error('bnregmue{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodpai', array (
  'size' => 10,
  'control_name' => 'bnregmue[codpai]',
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codpai').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=18&cajtexcom=bnregmue_codpai&cajtexmos=nompai&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnpais_Bieregactmued/clase/Bnpais/frame/sf_admin_edit_form/obj1/bnregmue_codpai/obj2/nompai/campo1/codpai/campo2/nompai')?>
&nbsp;&nbsp;
  <? echo input_tag('nompai',$bnregmue->getNompai(),'size=41')?>
    </div>

    <br>

  <?php echo label_for('bnregmue[codes2]', __($labels['bnregmue{codes2}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codes2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codes2}')): ?>
    <?php echo form_error('bnregmue{codes2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodes2', array (
  'size' => 10,
  'control_name' => 'bnregmue[codes2]',
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codes2').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=19&cajtexcom=bnregmue_codes2&cajtexmos=nomest&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnestado_Bieregactmued/clase/Bnestado/frame/sf_admin_edit_form/obj1/bnregmue_codes2/obj2/nomest/campo1/codes2/campo2/nomest')?>
&nbsp;&nbsp;
  <? echo input_tag('nomest',$bnregmue->getNomest(),'size=41')?>
    </div>

    <br>    


  <?php echo label_for('bnregmue[codmun]', __($labels['bnregmue{codmun}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codmun}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codmun}')): ?>
    <?php echo form_error('bnregmue{codmun}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodmun', array (
  'size' => 10,
  'control_name' => 'bnregmue[codmun]',
  'maxlength' => 6,
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codmun').value != '' && $('bnregmue_codes2').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=20&cajtexcom=bnregmue_codmun&cajtexmos=nommun&estado='+$('bnregmue_codes2').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Bnmunicip_Bieregactmued/clase/Bnmunicip/frame/sf_admin_edit_form/obj1/bnregmue_codmun/obj2/nommun/campo1/codmun/campo2/nommun/param1/'+$('bnregmue_codes2').value+'")?>
&nbsp;&nbsp;
  <? echo input_tag('nommun',$bnregmue->getNommun(),'size=41')?>
    </div>

    <br>

  <?php echo label_for('bnregmue[codpar]', __($labels['bnregmue{codpar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codpar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codpar}')): ?>
    <?php echo form_error('bnregmue{codpar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodpar', array (
  'size' => 10,
  'control_name' => 'bnregmue[codpar]',
  'maxlength' => 6,
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codmun').value != '' && $('bnregmue_codpar').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=21&cajtexcom=bnregmue_codpar&cajtexmos=nompar&municipio='+$('bnregmue_codmun').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Bnparroq_Bieregactmued/clase/Bnparroq/frame/sf_admin_edit_form/obj1/bnregmue_codpar/obj2/nompar/campo1/codpar/campo2/nompar/param1/'+$('bnregmue_codmun').value+'")?>
&nbsp;&nbsp;
  <? echo input_tag('nompar',$bnregmue->getNompar(),'size=41')?>
    </div>

    <br>

  <?php echo label_for('bnregmue[codciu]', __($labels['bnregmue{codciu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{codciu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{codciu}')): ?>
    <?php echo form_error('bnregmue{codciu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCodciu', array (
  'size' => 10,
  'control_name' => 'bnregmue[codciu]',
  'maxlength' => 12,
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_codmun').value != '' && $('bnregmue_codciu').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=22&cajtexcom=bnregmue_codciu&cajtexmos=nomciu&municipio='+$('bnregmue_codmun').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Bnciudad_Bieregactmued/clase/Bnciudad/frame/sf_admin_edit_form/obj1/bnregmue_codciu/obj2/nomciu/campo1/codciu/campo2/nomciu/param1/'+$('bnregmue_codmun').value+'")?>
&nbsp;&nbsp;
  <? echo input_tag('nomciu',$bnregmue->getNomciu(),'size=41')?>
    </div>

    <br>    
 </div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Vida Util (Meses)')?> </h2>
<div class="form-row">
&nbsp;
<strong><? echo __('Original')?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo '(+)' ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo '(-)'?></strong>
<br>
  <?php $value = object_input_tag($bnregmue, 'getViduti', array (
  'size' => 20,
  'maxlength' => 20,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[viduti]',
 )); echo $value ? $value : '&nbsp;' ?>
 <?php $value = object_input_tag($bnregmue, 'getAumviduti', array (
  'size' => 5,
  'maxlength' => 4,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[aumviduti]',
)); echo $value ? $value : '&nbsp;' ?>
  <?php $value = object_input_tag($bnregmue, 'getDimviduti', array (
  'size' => 5,
  'maxlength' => 4,
   'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[dimviduti]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo 'Actual = '?></strong>
&nbsp;
<?php echo input_tag('vidaAct',$bnregmue->getVidutiactual(),'disabled=true,size=10')?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo 'Depreciable '?></strong>
&nbsp;
<? if ($bnregmue->getDeprec()=='S')  {
  ?><?php echo radiobutton_tag('bnregmue[deprec]', 'S', true)        ."Sí".'&nbsp;&nbsp;';
      echo radiobutton_tag('bnregmue[deprec]', 'N', false)."   No";?>
    <?
}else{
  echo radiobutton_tag('bnregmue[deprec]', 'S', false)        ."Sí".'&nbsp;&nbsp;';
  echo radiobutton_tag('bnregmue[deprec]', 'N', true)."   No";
} ?>
</div>
</fieldset>

<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Responsables')?> </h2>
<div class="form-row">
  <?php echo label_for('bnregmue[codrespat]', __($labels['bnregmue{codrespat}']), 'class="required" Style="width:200px"') ?>
   <div class="contentform-error">
  <?php echo Catalogo($bnregmue,14,array(
  'getprincipal' => 'getCodrespat',
  'getsecundario' => 'getNomrespat',
  'campoprincipal' => 'codrespat',
  'camposecundario' => 'nomrespat',
  'tamanoprincipal' => '10',
  'campobase' => 'id_codrespat',
  ), 'Nphojint_Almdespser', 'Nphojint', ''); ?>
  </div>
  <br>
    <?php echo label_for('bnregmue[codresuso]', __($labels['bnregmue{codresuso}']), 'class="required" Style="width:200px"') ?>
 
<?php $respusoben=H::getConfApp2('respusoben', 'bienes', 'bieregactmued'); 
  if ($respusoben=='S') { ?>
 <?php echo Catalogo($bnregmue,5,array(
  'getprincipal' => 'getCodresuso',
  'getsecundario' => 'getNomresuso',
  'campoprincipal' => 'codresuso',
  'camposecundario' => 'nomresuso',
  'tamanoprincipal' => '10',
  'campobase' => 'id_codresuso',
  ), 'Opbenefi_Pagemiord', 'Opbenefi', ''); ?>
<?php }else  {?>  
 <?php echo Catalogo($bnregmue,5,array(
  'getprincipal' => 'getCodresuso',
  'getsecundario' => 'getNomresuso',
  'campoprincipal' => 'codresuso',
  'camposecundario' => 'nomresuso',
  'tamanoprincipal' => '10',
  'campobase' => 'id_codresuso',
  ), 'Nphojint_Almdespser', 'Nphojint', ''); ?>
<?php }?>    
  <br>
  <div id="fechas" style="display:none">
  <?php echo label_for('bnregmue[fecasiact]', __($labels['bnregmue{fecasiact}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{fecasiact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{fecasiact}')): ?>
    <?php echo form_error('bnregmue{fecasiact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnregmue, 'getFecasiact', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecasiact]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br><br>
  <?php echo label_for('bnregmue[fecdesact]', __($labels['bnregmue{fecdesact}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{fecdesact}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{fecdesact}')): ?>
    <?php echo form_error('bnregmue{fecdesact}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($bnregmue, 'getFecdesact', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecdesact]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </div> 
 <br>      <br>
  <?php echo label_for('bnregmue[perest]', __($labels['bnregmue{perest}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{perest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{perest}')): ?>
    <?php echo form_error('bnregmue{perest}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($bnregmue, 'getPerest', array (
  'control_name' => 'bnregmue[perest]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
<br>
    <?php echo label_for('bnregmue[cedest]', __($labels['bnregmue{cedest}']), 'class="required" Style="width:200px"') ?>
   <div class="contentform-error">
  <?php echo Catalogo($bnregmue,16,array(
  'getprincipal' => 'getCedest',
  'getsecundario' => 'getNomapeest',
  'campoprincipal' => 'cedest',
  'camposecundario' => 'nomapeest',
  'tamanoprincipal' => '10',
  'campobase' => 'id_cedest',
  ), 'Bncatest_Bieregmue', 'Bncatest', ''); ?>
  </div>
<br>
<?php echo label_for('bnregmue[cedrep]', __($labels['bnregmue{cedrep}']), 'class="required" Style="width:200px"') ?>
<?php $value = object_input_tag($bnregmue, 'getCedrep', array (
'size' => 20,
'disabled' => true,
'control_name' => 'bnregmue[cedrep]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($bnregmue, 'getNomaperep', array (
'size' => 60,
'disabled' => true,
'control_name' => 'bnregmue[nomaperep]',
)); echo $value ? $value : '&nbsp;' ?>
<br> <br>
<?php echo label_for('bnregmue[tippro]', __($labels['bnregmue{tippro}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('bnregmue{tippro}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bnregmue{tippro}')): ?> <?php echo form_error('bnregmue{tippro}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getTippro', array (
  'size' => 8,
  'maxlength' => 4,
  'control_name' => 'bnregmue[tippro]',
  'onBlur'=> remote_function(array(
       'url' => 'bieregactmued/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=7&cajtexmos=bnregmue_despro&cajtexcom=bnregmue_tippro&codigo='+this.value",
        )),
)); echo $value ? $value : '&nbsp;' ?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catippro_Almordcom/clase/Catippro/frame/sf_admin_edit_form/obj1/bnregmue_tippro/obj2/bnregmue_despro/campo1/codpro/campo2/despro')?></th>

<?php $value = object_input_tag($bnregmue, 'getDespro', array (
'size' => 60,
'disabled' => true,
'control_name' => 'bnregmue[despro]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
  <br>

<?php echo label_for('bnregmue[logusu]', __($labels['bnregmue{logusu}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('bnregmue{logusu}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bnregmue{logusu}')): ?> <?php echo form_error('bnregmue{logusu}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getNomuse', array (
'size' => 60,
'disabled' => true,
'control_name' => 'bnregmue[nomuse]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
  
  <br>  
<?php echo label_for('bnregmue[canmueigu]', __($labels['bnregmue{canmueigu}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('bnregmue{canmueigu}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('bnregmue{canmueigu}')): ?> <?php echo form_error('bnregmue{canmueigu}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCanmueigu', array (
'size' => 60,
'control_name' => 'bnregmue[canmueigu]',
)); echo $value ? $value : '&nbsp;' ?>
</div>  
</div>
</fieldset>


<div id="divmuedep" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<h2><? echo __('Muebles Dependientes')?> </h2>
<div class="form-row">
<?php  echo grid_tag_v2($bnregmue->getObj1()); ?>
</div>
</fieldset>
</div>

</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage2", 'Caracteristicas del Mueble');?>
<a name="caracteristicas"></a>
<fieldset>

<h2><? echo __('Datos Generales') ?></h2>
<div class="form-row">

<?php echo label_for('bnregmue[marmue]', __($labels['bnregmue{marmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{marmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{marmue}')): ?>
    <?php echo form_error('bnregmue{marmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getMarmue', array (
  'size' => 20,
  'maxlength' => 50,
  'control_name' => 'bnregmue[marmue]',
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Modelo:') ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php $value = object_input_tag($bnregmue, 'getModmue', array (
  'size' => 50,
  'maxlength' => 100,
  'control_name' => 'bnregmue[modmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('bnregmue[anomue]', __($labels['bnregmue{anomue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{anomue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{anomue}')): ?>
    <?php echo form_error('bnregmue{anomue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getAnomue', array (
  'size' => 20,
  'maxlength' =>10,
  'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[anomue]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
    <br>
<div id="divcolmue">
<strong><? echo 'Color:  ' ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php $value = object_input_tag($bnregmue, 'getColmue', array (
  'size' => 20,
  'maxlength' =>25,
  'control_name' => 'bnregmue[colmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
<?php echo label_for('bnregmue[capmue]', __($labels['bnregmue{capmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{capmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{capmue}')): ?>
    <?php echo form_error('bnregmue{capmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getCapmue', array (
  'size' => 20,
  'maxlength' =>20,
  'control_name' => 'bnregmue[capmue]',
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<strong><? echo __('Tipo:  ') ?></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

  <?php $value = object_input_tag($bnregmue, 'getTipmue', array (
  'size' => 20,
  'maxlength' =>20,
  'control_name' => 'bnregmue[tipmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('bnregmue[sermue]', __($labels['bnregmue{sermue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{sermue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{sermue}')): ?>
    <?php echo form_error('bnregmue{sermue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getSermue', array (
  'size' => 65,
  'maxlength' =>80,
  'control_name' => 'bnregmue[sermue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<table>
<tr>
<th>
  <?php echo label_for('bnregmue[nropie]', __($labels['bnregmue{nropie}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{nropie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{nropie}')): ?>
    <?php echo form_error('bnregmue{nropie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getNropie', array (
  'size' => 20,
  'maxlength' =>10,
  'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[nropie]',
)); echo $value ? $value : '&nbsp;' ?>  </div>

</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('bnregmue[pesmue]', __($labels['bnregmue{pesmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{pesmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{pesmue}')): ?>
    <?php echo form_error('bnregmue{pesmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($bnregmue,'getPesmue', array (
  'size' => 20,
  'maxlength' =>20,
  //'onkeypress' =>"javascript:return num(event)",
  'control_name' => 'bnregmue[pesmue]',
)); echo $value ? $value : '&nbsp;' ?></div>

</th>
</tr>
<tr>
<th>
<br>
<?php echo label_for('bnregmue[usomue]', __($labels['bnregmue{usomue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{usomue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{usomue}')): ?>
    <?php echo form_error('bnregmue{usomue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getUsomue',true), array (
  'size' => 20,
  'maxlength' =>25,
  'control_name' => 'bnregmue[usomue]',
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>
  <?php echo label_for('bnregmue[altmue]', __($labels['bnregmue{altmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{altmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{altmue}')): ?>
    <?php echo form_error('bnregmue{altmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getAltmue', array (
  'size' => 20,
   'maxlength' =>45,
   'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
  'control_name' => 'bnregmue[altmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

</th>
</tr>
<tr>
<th>
<br>
  <?php echo label_for('bnregmue[larmue]', __($labels['bnregmue{larmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{larmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{larmue}')): ?>
    <?php echo form_error('bnregmue{larmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getLarmue',true), array (
  'size' => 20,
  'maxlength' =>45,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
  'control_name' => 'bnregmue[larmue]',
)); echo $value ? $value : '&nbsp;' ?></div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>
 <?php echo label_for('bnregmue[ancmue]', __($labels['bnregmue{ancmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{ancmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{ancmue}')): ?>
    <?php echo form_error('bnregmue{ancmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($bnregmue, array('getAncmue',true), array (
  'size' => 20,
  'maxlength' =>45,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event,this.id)",
  'control_name' => 'bnregmue[ancmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th></tr></table>
<br>
      <?php echo label_for('bnregmue[codcol]', __($labels['bnregmue{codcol}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('bnregmue{codcol}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('bnregmue{codcol}')): ?>
        <?php echo form_error('bnregmue{codcol}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>


      <?php $value = object_input_tag($bnregmue, 'getCodcol', array (
      'size' => 10,
      'control_name' => 'bnregmue[codcol]',
      'maxlength' => 3,
      'onBlur'=> remote_function(array(
            'url'      => 'bieregactmued/ajax',
            'condition' => "$('bnregmue_coddis').value != ''",
            'complete' => 'AjaxJSON(request, json)',
            'script' => true,
            'with' => "'ajax=17&cajtexmos=bnregmue_codcols&cajtexcom=descol&codigo='+this.value"
            ))
    )); echo $value ? $value : '&nbsp;' ?>

        &nbsp;
        <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bncatcol_Bieregactmued/clase/Bncatcol/frame/sf_admin_edit_form/obj1/bnregmue_codcol/obj2/descol/campo1/codcol/campo2/descol')?>
        &nbsp;&nbsp;
          <? echo input_tag('descol',$bnregmue->getDescol(),'disabled=true,size=42')?>
         </div>
    <br>

  <?php echo label_for('bnregmue[fotmue]', __($labels['bnregmue{fotmue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{fotmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{fotmue}')): ?>
    <?php echo form_error('bnregmue{fotmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($bnregmue, 'getFotmue', array (
  'control_name' => 'bnregmue[fotmue]',
  'include_link' => 'muebles',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Tamaño de la foto 90x100 (jpg, gif o png)') ?></div>  </div>

<br>

  <?php echo label_for('bnregmue[detmue]','Observaciones', 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{detmue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{detmue}')): ?>
    <?php echo form_error('bnregmue{detmue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_textarea_tag($bnregmue, 'getdetmue', array (
  'size' => '83x5',
  'control_name' => 'bnregmue[detmue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
     </div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Costo');?>
<a name="costo"></a>


<fieldset>
<h2><? echo __('Costo Historico') ?></h2>

<div class="form-row">
<table>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
  <?php echo label_for('bnregmue[valini]', __($labels['bnregmue{valini}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valini}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valini}')): ?>
    <?php echo form_error('bnregmue{valini}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getValini',true), array (
  'size' => 17,
  'maxlength' =>17,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[valini]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>

<?php echo label_for('bnregmue[valres]', __($labels['bnregmue{valres}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valres}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valres}')): ?>
    <?php echo form_error('bnregmue{valres}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getValres',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[valres]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
</tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>
  <?php echo label_for('bnregmue[depmen]', __($labels['bnregmue{depmen}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{depmen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{depmen}')): ?>
    <?php echo form_error('bnregmue{depmen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getDepmen',true), array (
   'size' => 17,
  'maxlength' =>17,
 'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[depmen]',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
 </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
 <?php echo label_for('bnregmue[depacu]', __($labels['bnregmue{depacu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{depacu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{depacu}')): ?>
    <?php echo form_error('bnregmue{depacu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getDepacu',true), array (
 'size' => 17,
  'maxlength' =>17,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[depacu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>

<?php echo label_for('bnregmue[vallib]', __($labels['bnregmue{vallib}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{vallib}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{vallib}')): ?>
    <?php echo form_error('bnregmue{vallib}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getVallib',true), array (
  'size' => 17,
  'maxlength' =>17,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[vallib]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
  </div>
 </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<?php echo label_for('bnregmue[valadi]', __($labels['bnregmue{valadi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valadi}')): ?>
    <?php echo form_error('bnregmue{valadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getValadi',true), array (
 'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[valadi]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</th>
</tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>

<br>
  <?php echo label_for('bnregmue[valrex]', __($labels['bnregmue{valrex}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valrex}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valrex}')): ?>
    <?php echo form_error('bnregmue{valrex}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($bnregmue, array('getValrex',true), array (
   'size' => 17,
  'maxlength' =>17,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[valrex]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
  </th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
 <?php echo label_for('bnregmue[cosrep]', __($labels['bnregmue{cosrep}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{cosrep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{cosrep}')): ?>
    <?php echo form_error('bnregmue{cosrep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getCosrep',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[cosrep]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>
</th>
</tr>
<tr>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<br>
<?php echo label_for('bnregmue[valactual]', __($labels['bnregmue{valactual}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{valactual}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{valactual}')): ?>
    <?php echo form_error('bnregmue{valactual}', array('class' => 'form-error-msg')) ?>

  <?php endif; ?>
    <?php $value = object_input_tag($bnregmue, array('getValactual',true), array (
  'size' => 17,
  'disabled' =>true,
  'control_name' => 'bnregmue[valactmue]',
)); echo $value ? $value : '&nbsp;' ?>
 </div>
</th>
</tr></table>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a name="guardar"></a>

</fieldset>

<?php if ($bnregmue->getId()=='') tabPageOpenClose("tp1", "tabPage4", 'Incorporación del Bien');?>
<div id="datinseg">
<fieldset>
    <div class="form-row">
      <?php echo label_for('bnregmue[coddis]', __($labels['bnregmue{coddis}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('bnregmue{coddis}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('bnregmue{coddis}')): ?>
        <?php echo form_error('bnregmue{coddis}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>


  <?php $value = object_input_tag($bnregmue, 'getCoddis', array (
  'size' => 10,
  'control_name' => 'bnregmue[coddis]',
  'maxlength' => 25,
  'onBlur'=> remote_function(array(
        'url'      => 'bieregactmued/ajax',
        'condition' => "$('bnregmue_coddis').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=4&cajtexmos=bnregmue_coddis&cajtexcom=desdis&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

    &nbsp;
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bndisbie_Bieregactmued/clase/Bndisbie/frame/sf_admin_edit_form/obj1/bnregmue_coddis/obj2/desdis/campo1/coddis/campo2/desdis')?>
    &nbsp;&nbsp;
      <? echo input_tag('desdis',$bnregmue->getNomdispos(),'disabled=true,size=42')?>
     </div>

<ul class="sf_admin_actions">
<li >
    <?php echo submit_to_remote('Submit2', 'Generar Comprobante Incorporación', array(
             'update'   => 'comp2',
             'url'      => 'bieregactmued/ajaxcomprobante2',
             'script'   => true,
             'complete' => 'AjaxJSON(request, json)',
             'submit' => 'sf_admin_edit_form',
             ),array('class' => 'sf_admin_action_save')) ?>
</li>
</ul>

<div id="comp2">
</div>
    </div>
</fieldset>
</div>

<?php if ($bnregmue->getMansegbie()=='S' && $bnregmue->getId()=='') tabPageOpenClose("tp1", "tabPage5", 'Datos del Seguro'); else if ($bnregmue->getMansegbie()=='S' && $bnregmue->getId()!='') tabPageOpenClose("tp1", "tabPage4", 'Datos del Seguro');?>
<div id="datseguro" style="display:none">
<fieldset>
<div class="form-row">
<ul class="sf_admin_actions">
    <li >
<?php if ($bnregmue->getFecdepseg()!='') { ?>
<input id="renseg" class="sf_admin_action_save" type="button" value="Renovar Seguro" onClick="limpiardatosseguro();">
<?php } ?>    
    </li>
</ul>  
 <?php echo label_for('bnregmue[numcue]', __($labels['bnregmue{numcue}']), 'class="required"') ?>
   <div class="contentform-error">
  <?php echo Catalogo($bnregmue,12,array(
  'getprincipal' => 'getNumcue',
  'getsecundario' => 'getNomcue',
  'campoprincipal' => 'numcue',
  'camposecundario' => 'nomcue',
  'tamanoprincipal' => '20',
  'campobase' => 'id_numcue',
  ), 'Ingreging_tsdefban', 'Tsdefban', ''); ?>
  </div>
<br>

<?php echo label_for('bnregmue[fecregcom]', __($labels['bnregmue{fecregcom}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{fecregcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{fecregcom}')): ?>
    <?php echo form_error('bnregmue{fecregcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
      
  <?php $value = object_input_date_tag($bnregmue, 'getFecregcom', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecregcom]',
  'date_format' => 'dd/MM/yyyy',
   'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>    
    <br>
<?php echo label_for('bnregmue[numdep]', __($labels['bnregmue{numdep}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{numdep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{numdep}')): ?>
    <?php echo form_error('bnregmue{numdep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, 'getNumdep', array (
  'size' => 25,
  'maxlength' => 20,
  'control_name' => 'bnregmue[numdep]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('bnregmue[fecdepseg]', __($labels['bnregmue{fecdepseg}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{fecdepseg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{fecdepseg}')): ?>
    <?php echo form_error('bnregmue{fecdepseg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
      
  <?php $value = object_input_date_tag($bnregmue, 'getFecdepseg', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'bnregmue[fecdepseg]',
  'date_format' => 'dd/MM/yyyy',
   'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<?php echo label_for('bnregmue[codtip]', __($labels['bnregmue{codtip}']), 'class="required"') ?>
   <div class="contentform-error">
  <?php echo Catalogo($bnregmue,13,array(
  'getprincipal' => 'getCodtip',
  'getsecundario' => 'getDestip',
  'campoprincipal' => 'codtip',
  'camposecundario' => 'destip',
  'tamanoprincipal' => '10',
  'campobase' => 'id_numcue',
  ), 'Opdefemp_pagdefemp3', 'Tstipmov', ''); ?>
  </div>

<br>

 <?php echo label_for('bnregmue[monpag]', __($labels['bnregmue{monpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{monpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{monpag}')): ?>
    <?php echo form_error('bnregmue{monpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getMonpag',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[monpag]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>

<br>
 <?php echo label_for('bnregmue[porpri]', __($labels['bnregmue{porpri}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{porpri}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{porpri}')): ?>
    <?php echo form_error('bnregmue{porpri}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getPorpri',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13; entermontootro(event, this.id); calpri();",
  'control_name' => 'bnregmue[porpri]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>
<br>
 <?php echo label_for('bnregmue[monpri]', __($labels['bnregmue{monpri}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{monpri}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{monpri}')): ?>
    <?php echo form_error('bnregmue{monpri}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getMonpri',true), array (
  'size' => 17,
  'maxlength' =>17,
  'readOnly' => true,
  'control_name' => 'bnregmue[monpri]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>

<br>
 <?php echo label_for('bnregmue[segnom]', __($labels['bnregmue{segnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{segnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{segnom}')): ?>
    <?php echo form_error('bnregmue{segnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <? if ($bnregmue->getDeprec()=='S')  { ?>
      <?php echo radiobutton_tag('bnregmue[segnom]', 'S', true, array('onclick'=>'mostrardatos(this.id)'))        ."Sí".'&nbsp;&nbsp;';
        echo radiobutton_tag('bnregmue[segnom]', 'N', false, array('onclick'=>'mostrardatos(this.id)'))."   No";?>
      <?
  }else{
    echo radiobutton_tag('bnregmue[segnom]', 'S', false, array('onclick'=>'mostrardatos(this.id)'))        ."Sí".'&nbsp;&nbsp;';
    echo radiobutton_tag('bnregmue[segnom]', 'N', true, array('onclick'=>'mostrardatos(this.id)'))."   No";
  } ?>   
   </div>
<br><br>
<div id="datnom" style="display:none">
 <?php echo label_for('bnregmue[monnom]', __($labels['bnregmue{monnom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{monnom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{monnom}')): ?>
    <?php echo form_error('bnregmue{monnom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($bnregmue, array('getMonnom',true), array (
  'size' => 17,
  'maxlength' =>17,
  'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
  'control_name' => 'bnregmue[monnom]',
)); echo $value ? $value : '&nbsp;' ?>
   </div>
<br>
 <?php echo label_for('bnregmue[frenom]', __($labels['bnregmue{frenom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('bnregmue{frenom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('bnregmue{frenom}')): ?>
    <?php echo form_error('bnregmue{frenom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <? if ($bnregmue->getFrenom()=='Q')  {
    ?><?php echo radiobutton_tag('bnregmue[frenom]', 'Q', true)        ."Quincenal".'&nbsp;&nbsp;';
        echo radiobutton_tag('bnregmue[frenom]', 'M', false)."   Mensual";?>
  <?  }else{
    echo radiobutton_tag('bnregmue[frenom]', 'Q', false)        ."Quincenal".'&nbsp;&nbsp;';
    echo radiobutton_tag('bnregmue[frenom]', 'M', true)."   Mensual";
  } ?>   
   </div>
</div>
<ul class="sf_admin_actions">
    <li >
        <?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
                 'update'   => 'comp',
                 'url'      => 'bieregactmued/ajaxcomprobante',
                 'script'   => true,
                 'complete' => 'AjaxJSON(request, json)',
                 'submit' => 'sf_admin_edit_form',
                 ),array('class' => 'sf_admin_action_save')) ?>
    </li>
</ul>

<div id="comp">
</div>

<?php if ($bnregmue->getFecdepseg()!='') { ?>
<?php  echo grid_tag_v2($bnregmue->getObj()); ?>
<?php } ?>

</div>
</fieldset>
</div>


<?php tabInit('tp1','0');?>
<?php include_partial('edit_actions', array('bnregmue' => $bnregmue)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($bnregmue->getId()): ?>
<?php echo button_to(__('delete'), 'bieregactmued/delete?id='.$bnregmue->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">
   var cuentaban='<?php echo $bnregmue->getNumcue() ?>';
   if (cuentaban!='') {
     $$('.sf_admin_action_save')[1].hide();
   }

    var seguro='<?php echo $bnregmue->getSegnom() ?>';
    if (seguro=='S')
      $('datnom').show();

   var mosfeccont='<?php echo H::getConfApp2('mosfeccont', 'bienes', 'bieregactmued');?>';
   if (mosfeccont=='S')
   {
      $('feccont').show();
   }

   var occolordes='<?php echo H::getConfApp2('occolordes', 'bienes', 'bieregactmued');?>';
   if (occolordes=='S')
   {
      $('divcolmue').hide();
   }   
    

   var savenumord='<?php echo $bnregmue->getSavenumord()?>';
   if (savenumord=='S')
   {
      $('divnumord').show();
   }
   var mosdatfun='<?php echo H::getConfApp2('mosdatfun', 'bienes', 'bieregactmued');?>';
   if (mosdatfun=='S')
   {
      $('divsudebip').show();
      $('divactrec').show();
   }

   var mosfecact='<?php echo H::getConfApp2('mosfecact', 'bienes', 'bieregactmued');?>';
   if (mosfecact=='S')
   {
      $('fechas').show();
   }

   var mosanoinv='<?php echo H::getConfApp2('mosanoinv', 'bienes', 'bieregactmued');?>';
   if (mosanoinv=='S')
   {
      $('divanoinv').show();
   }

   var mosmuedep='<?php echo H::getConfApp2('mosmuedep', 'bienes', 'bieregactmued');?>';
   if (mosmuedep=='S')
   {
      $('divbiemuedep').show();
   }

   var mosfecreg='<?php echo H::getConfApp2('mosfecreg', 'bienes', 'bieregactmued');?>';
   if (mosfecreg=='S')
   {
      $('divfecins').show();
   }


  if ($('id').value=='') {
   var mansolcor='<?php echo $bnregmue->getMansolcor()?>';
   var mancornacreg='<?php echo H::getConfApp2('mancornacreg', 'bienes', 'bieregactmued');?>';
   var modcormue='<?php echo H::getX_vacio('CODINS','Bndefins','Modcormue','001');?>';
   if (mansolcor=='S' || mancornacreg=='S')
   {
      $('bnregmue_codmue').value='########';
      if (modcormue==false)
        $('bnregmue_codmue').readOnly=true;
   }

   }else {
    $('datinseg').hide();
    var tiemuedep='<?php echo $bnregmue->TieMuedep();?>';
    if (tiemuedep=='S')
      $('divmuedep').show();
   }
   
   var mansegbie='<?php echo $bnregmue->getMansegbie();?>';
   if (mansegbie=='S')
       $('datseguro').show();
function num(e) {
    evt = e ? e : event;
    tcl = (window.Event) ? evt.which : evt.keyCode;
    if ((tcl < 48 || tcl > 57 ) && tcl != '8')
    {
        return false;
    }
    return true;
}

function calpri()
{
    var num1=toFloat('bnregmue_cosrep');
    var num2=toFloat('bnregmue_porpri');
    
    var cal=num1*num2/100;
    $('bnregmue_monpri').value=format(cal.toFixed(2),'.',',','.');
}

function enter(e,valor)
 {

   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(10, '0',0);}
     else
     {valor=valor.pad(10, '#',0);}

     $('bnregmue_codmue').value=valor;
   }
 }

var incorporacion='<?php echo $incorporacion;  ?>';
var  id='<? echo $bnregmue->getId();?>';
if (id){
	     $$('.botoncat')[0].disabled=true;
}

if (incorporacion!=''){
  alert(incorporacion);
}
var gencorcodalt='<?php echo H::getConfApp2('gencorcodalt', 'bienes', 'bieregactmued');?>';
if (gencorcodalt=='')
  $('bnregmue_codalt').readonly=true;

  function comprobante(formulario)
  {
      window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function consultarComp()
  {
    window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/id/'+document.getElementById("idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function  limpiardatosseguro()
  {
    $('bnregmue_renovo').value='S';
    $('bnregmue_numcom').value='';
    $('bnregmue_numcue').value='';
    $('bnregmue_nomcue').value='';
    $('bnregmue_numdep').value='';
    $('bnregmue_fecdepseg').value='';
    $('bnregmue_codtip').value='';
    $('bnregmue_destip').value='';
    $('bnregmue_monpag').value='0,00';
    $('bnregmue_porpri').value='0,00';
    $('bnregmue_monpri').value='0,00';
    $('bnregmue_segnom_N').checked=true;
    $('datnom').hide();
    $('bnregmue_monnom').value='0,00';
    $('bnregmue_frenom_M').checked=true;
    $('bnregmue_monnom').value='0,00';
    $('bnregmue_frenom_M').checked=true;
    $$('.sf_admin_action_save')[1].show();
  }

  function mostrardatos(id)
  {
    if ($(id).value=='S')
    {
      $('datnom').show();
      $$('.sf_admin_action_save')[1].hide();
    }else {
      $('datnom').hide();
      $('bnregmue_monnom').value='0,00';
      $('bnregmue_frenom_M').checked=true;
    }
  }
  </script>
