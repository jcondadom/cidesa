<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 42893 2011-03-03 05:43:17Z cramirez $
 */
// date: 2007/03/23 19:26:15
?>
<?php echo form_tag('nomfalpersal/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date','SubmitClick','tabs') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>
<?php echo object_input_hidden_tag($npfalper, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('npfalper[codemp]', __($labels['npfalper{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{codemp}')): ?>
    <?php echo form_error('npfalper{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getCodemp', array (
  'size' => 20,
  'control_name' => 'npfalper[codemp]',
  'maxlength' => 9,
  'onBlur'=> remote_function(array(
        'url'      => 'nomfalpersal/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'condition' =>"$('npfalper_codemp').value!=''",
        'with' => "'ajax=1&cajtexmos=npfalper_nomemp&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
      &nbsp;      &nbsp;&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npfalper_Nomfalpersal/clase/Nphojint/frame/sf_admin_edit_form/obj1/npfalper_codemp/obj2/npfalper_nomemp/campo1/codemp/campo2/nomemp/param1/')?>

    </div>
    <br>
  <?php echo label_for('npfalper[nomemp]', __($labels['npfalper{nomemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{nomemp}')): ?>
    <?php echo form_error('npfalper{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getNomemp', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'npfalper[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('npfalper[codmot]', __($labels['npfalper{codmot}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{codmot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{codmot}')): ?>
    <?php echo form_error('npfalper{codmot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getCodmot', array (
  'size' => 6,
  'control_name' => 'npfalper[codmot]',
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
        'url'      => 'nomfalpersal/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=2&cajtexmos=npfalper_desmotfal&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npmotfal_Nomfalpersal/clase/Npmotfal/frame/sf_admin_edit_form/obj1/npfalper_codmot/obj2/npfalper_desmotfal/campo1/codmotfal/campo2/desmotfal/param1/')?>

    </div>
    <br>
  <?php echo label_for('npfalper[desmotfal]', __($labels['npfalper{desmotfal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{desmotfal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{desmotfal}')): ?>
    <?php echo form_error('npfalper{desmotfal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getDesmotfal', array (
  'size' => 50,
  'readonly' => true,
  'control_name' => 'npfalper[desmotfal]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
    <div id="desde">
  <?php echo label_for('npfalper[fecdes]', __($labels['npfalper{fecdes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{fecdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{fecdes}')): ?>
    <?php echo form_error('npfalper{fecdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npfalper, 'getFecdes', array (
  'rich' => true,
'onChange' => "toAjax(3,getUrlModulo()+'/ajax',this.value,'','&fecdes='+$('npfalper_fecdes').value+'&fechas='+$('npfalper_fechas').value+'&codmot='+$('npfalper_codmot').value+'&codemp='+$('npfalper_codemp').value)",
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npfalper[fecdes]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'date_format' => 'dd/MM/yyyy',
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
    </div>
        <br>
  <?php echo label_for('npfalper[fechas]', __($labels['npfalper{fechas}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{fechas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{fechas}')): ?>
    <?php echo form_error('npfalper{fechas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npfalper, 'getFechas', array (
  'rich' => true,
  'onChange' => "toAjax(3,getUrlModulo()+'/ajax',this.value,'','&fecdes='+$('npfalper_fecdes').value+'&fechas='+$('npfalper_fechas').value+'&codmot='+$('npfalper_codmot').value+'&codemp='+$('npfalper_codemp').value)",
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npfalper[fechas]',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
        <br>
  <?php echo label_for('npfalper[fecinc]', __($labels['npfalper{fecinc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{fecinc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{fecinc}')): ?>
    <?php echo form_error('npfalper{fecinc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($npfalper, 'getFecinc', array (
  'rich' => true,  
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'npfalper[fecinc]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>        
        <br>
  <?php echo label_for('npfalper[nrodia]', __($labels['npfalper{nrodia}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{nrodia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{nrodia}')): ?>
    <?php echo form_error('npfalper{nrodia}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getNrodia', array (
  'size' => 7,
  'onBlur' => "toAjax(4,getUrlModulo()+'/ajax',this.value,'','&fecdes='+$('npfalper_fecdes').value+'&nrodia='+$('npfalper_nrodia').value+'&codmot='+$('npfalper_codmot').value+'&codemp='+$('npfalper_codemp').value)",
  'control_name' => 'npfalper[nrodia]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
        <br>
  <?php echo label_for('npfalper[nrohoras]', __($labels['npfalper{nrohoras}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{nrohoras}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{nrohoras}')): ?>
    <?php echo form_error('npfalper{nrohoras}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, array('getNrohoras',true), array (
  'size' => 7,
  'control_name' => 'npfalper[nrohoras]',
  'onBlur'  => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
    <?php echo label_for('npfalper[tipsal]', __($labels['npfalper{tipsal}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{tipsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{tipsal}')): ?>
    <?php echo form_error('npfalper{tipsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('npfalper[tipsal]', options_for_select(array('P' => 'Permiso', 'R' => 'Reposo'),$npfalper->getTipsal(),'include_custom=Seleccione Uno'),array(
     'onChange' => "mostrarrep()"
  )) ?>
    </div>
    <br>
    <div id="permisos" style="display:none">
      <?php echo label_for('npfalper[tipper]', __($labels['npfalper{tipper}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{tipper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{tipper}')): ?>
    <?php echo form_error('npfalper{tipper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('npfalper[tipper]', options_for_select(array('R' => 'Remunerado', 'N' => 'No Remunerado'),$npfalper->getTipper(),'include_custom=Seleccione Uno')) ?>
    </div>
    </div>
    <div id="reposos" style="display:none">
        <?php echo label_for('npfalper[medexp]', __($labels['npfalper{medexp}']), 'class="required"') ?>
      <div class="content<?php if ($sf_request->hasError('npfalper{medexp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('npfalper{medexp}')): ?>
        <?php echo form_error('npfalper{medexp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($npfalper, 'getMedexp', array (
      'size' => 80,
      'control_name' => 'npfalper[medexp]',
      'maxlength' => 500,
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
        <br>
        <?php echo label_for('npfalper[espmed]', __($labels['npfalper{espmed}']), 'class="required"') ?>
      <div class="content<?php if ($sf_request->hasError('npfalper{espmed}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('npfalper{espmed}')): ?>
        <?php echo form_error('npfalper{espmed}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($npfalper, 'getEspmed', array (
      'size' => 80,
      'control_name' => 'npfalper[espmed]',
      'maxlength' => 500,
    )); echo $value ? $value : '&nbsp;' ?>
    </div>
<div id="reposos2" style="display:none">
<br>
  <?php echo label_for('npfalper[cenate]', __($labels['npfalper{cenate}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{cenate}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{cenate}')): ?>
    <?php echo form_error('npfalper{cenate}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getCenate', array (
  'size' => 80,
  'maxlength' => 200,
  'control_name' => 'npfalper[cenate]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br><br>
  <?php echo label_for('npfalper[tipdoc]', __($labels['npfalper{tipdoc}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{tipdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{tipdoc}')): ?>
    <?php echo form_error('npfalper{tipdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getTipdoc', array (
  'size' => 80,
  'maxlength' => 100,
  'control_name' => 'npfalper[tipdoc]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('npfalper[diarep]', __($labels['npfalper{diarep}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{diarep}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{diarep}')): ?>
    <?php echo form_error('npfalper{diarep}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($npfalper, 'getDiarep', array (
  'size' => '80x3',
  'control_name' => 'npfalper[diarep]',
  'maxlength'=> 500,
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </div>
    </div>
    <br>
  <?php echo label_for('npfalper[nomsup]', __($labels['npfalper{nomsup}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{nomsup}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{nomsup}')): ?>
    <?php echo form_error('npfalper{nomsup}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getNomsup', array (
  'size' => 80,
  'control_name' => 'npfalper[nomsup]',
  'maxlength' => 500,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
      <?php echo label_for('npfalper[monsup]', __($labels['npfalper{monsup}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{monsup}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{monsup}')): ?>
    <?php echo form_error('npfalper{monsup}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, array('getMonsup',true), array (
  'size' => 7,
  'control_name' => 'npfalper[monsup]',
  'onBlur'  => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
  <?php echo label_for('npfalper[observ]', __($labels['npfalper{observ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{observ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{observ}')): ?>
    <?php echo form_error('npfalper{observ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($npfalper, 'getObserv', array (
  'size' => '80x3',
  'control_name' => 'npfalper[observ]',
  'maxlength'=> 250,
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
    <div id="control">  <?php echo label_for('npfalper[numctr]', __($labels['npfalper{numctr}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('npfalper{numctr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('npfalper{numctr}')): ?>
    <?php echo form_error('npfalper{numctr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($npfalper, 'getNumctr', array (
  'size' => 10,
  'control_name' => 'npfalper[numctr]',
  'maxlength' => 8,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('npfalper' => $npfalper)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($npfalper->getId()): ?>
<?php echo button_to(__('delete'), 'nomfalpersal/delete?id='.$npfalper->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script language="JavaScript" type="text/javascript">
var ocultar='<?php echo $npfalper->getOculnumcon(); ?>';
if (ocultar=='S')
{
    $('control').hide();
}

if ($('id').value!="")
{
    $('desde').show();
    if ($('npfalper_tipsal').value=='P')
        $('permisos').show();
    else
        $('reposos').show();
}

function mostrarrep(){
  var mosotrdatrep='<?php echo H::getConfApp2('mosotrdatrep', 'nomina', 'nomfalpersal'); ?>'; 
  if($('npfalper_tipsal').value=='P') { 
    $('permisos').show();  
    $('reposos').hide();     
    if (mosotrdatrep=='S') $('reposos2').hide(); 
  }else { 
    $('reposos').show(); 
    $('permisos').hide(); 
    if (mosotrdatrep=='S') $('reposos2').show();
  }
}

</script>
