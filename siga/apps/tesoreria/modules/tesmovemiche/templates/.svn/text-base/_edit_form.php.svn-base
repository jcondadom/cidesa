<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 16:38:19
?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tesoreria/tesmovemiche', 'tools', 'observe', 'grid') ?>
<?php ini_set("memory_limit","1024M");?>
<?php echo form_tag('tesmovemiche/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tscheemi, 'getId') ?>
<?php echo input_hidden_tag('desctacre', '') ?>
<?php echo input_hidden_tag('ctapag', '') ?>
<?php echo input_hidden_tag('moneref', '') ?>
<?php echo input_hidden_tag('tscheemi[operacion]', $tscheemi->getOperacion() ) ?>
<?php echo input_hidden_tag('totalcomprobantes', '') ?>
<?php echo input_hidden_tag('tipdocact',  $tscheemi->getTipdoc()) ?>
<?php echo input_hidden_tag('tscheemi[bloqueado]',  $tscheemi->getBloqueado()) ?>
<?php echo input_hidden_tag('tscheemi[codadiban]',  $tscheemi->getCodadiban()) ?>
<?php echo input_hidden_tag('tscheemi[compret]',  $tscheemi->getCompret()) ?>
<?php echo input_hidden_tag('tscheemi[chequegen]',  $tscheemi->getChequegen()) ?>
<div id="sf_admin_container">
<fieldset id="sf_fieldset_none" class="">
<legend><? echo __('Datos del Cheque')?></legend>
<div class="form-row">
<div id="divcoddirec" style="display:none">
  <?php echo label_for('tscheemi[coddirec]', __($labels['tscheemi{coddirec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{coddirec}')): ?>
    <?php echo form_error('tscheemi{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getCoddirec', array (
    'size' => 20,
    'control_name' => 'tscheemi[coddirec]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'tesmovemiche/ajax',
      'condition' => "$('tscheemi_coddirec').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=9&cajtexmos=tscheemi_desdirec&cajtexcom=tscheemi_coddirec&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/tscheemi_coddirec/obj2/tscheemi_desdirec/campo1/coddirec/campo2/desdirec','','','botoncat')?>
&nbsp;
<?php $value = object_input_tag($tscheemi, 'getDesdirec', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'tscheemi[desdirec]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
</div>
  <?php echo label_for('tscheemi[tipdoc]', __($labels['tscheemi{tipdoc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{tipdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{tipdoc}')): ?>
    <?php echo form_error('tscheemi{tipdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('tscheemi[tipdoc]', $tscheemi->getTipdoc(),
    'tesmovemiche/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 4, 'size' => 23, 'onBlur'=> remote_function(array(
       'update'   => 'divGrid',
       'url'      => 'tesmovemiche/ajax',
       'condition' => "$('tscheemi_tipdoc').value != '' && $('tscheemi_tipdoc').value != $('tipdocact').value ",
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=1&cajtexmos=tscheemi_destip&cajtexcom=tscheemi_tipdoc&mostrardato=N&numcomegr='+$('tscheemi_numcomegr').value+'&tipdoc='+this.value"
        ))),
     array('use_style' => 'true')
  )
  ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdocpag_Tesmovemiche/clase/Cpdocpag/frame/sf_admin_edit_form/obj1/tscheemi_tipdoc/obj2/tscheemi_destip/campo1/tippag/campo2/nomext')?>

&nbsp;
  <?php $value = object_input_tag($tscheemi, 'getDestip', array (
   'disabled' => true,
  'control_name' => 'tscheemi[destip]',
  'size'=> 60,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
  <?php echo label_for('tscheemi[numcue]', __($labels['tscheemi{numcue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numcue}')): ?>
    <?php echo form_error('tscheemi{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('tscheemi[numcue]', $tscheemi->getNumcue(),
    'tesmovemiche/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 20, 'size' => 23, 'onBlur'=> remote_function(array(
        'url'      => 'tesmovemiche/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('tscheemi_numcue').value != ''",
          'with' => "'ajax=3&cajtexmos=tscheemi_nomcue&cajtexcom=tscheemi_numcue&bloq='+$('tscheemi_bloqueado').value+'&codigo='+this.value+'&tipdoc='+$('tscheemi_tipdoc').value"
        ))),
     array('use_style' => 'true')
  )
?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefban_TesmovemicheNew/clase/Tsdefban/frame/sf_admin_edit_form/obj1/tscheemi_numcue/obj2/tscheemi_nomcue/campo1/numcue/campo2/nomcue')?>

&nbsp;
  <?php $value = object_input_tag($tscheemi, 'getNomcue', array (
  'disabled' => true,
  'control_name' => 'tscheemi[nomcue]',
  'size'=> 60,
)); echo $value ? $value : '&nbsp;' ?>  <?php echo input_hidden_tag('tscheemi[nomrep]',  $tscheemi->getNomrep()) ?>
    </div>
<br>
<div id="divnumche">
<?php echo label_for('tscheemi[numche]', __($labels['tscheemi{numche}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numche}')): ?>
    <?php echo form_error('tscheemi{numche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($tscheemi, 'getNumche', array (
  'size' => 23,
  'control_name' => 'tscheemi[numche]',
  'maxlength' => 20,
  'onBlur'=> remote_function(array(
    'url'      => 'tesmovemiche/ajax',
    'condition' => "$('tscheemi_numche').value != '' && $('tscheemi_chequegen').value!=''",
    'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=12&cajtexcom=tscheemi_numche&chegen='+$('tscheemi_chequegen').value+'&codigo='+this.value"
    ))
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>
<br/>
  <?php echo label_for('tscheemi[cedrif]', __($labels['tscheemi{cedrif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{cedrif}')): ?>
    <?php echo form_error('tscheemi{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_auto_complete_tag('tscheemi[cedrif]', $tscheemi->getCedrif(),
    'tesmovemiche/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 20, 'size' => 23, 'onBlur'=> remote_function(array(
         'update'   => 'divGrid',
         'url'      => 'tesmovemiche/ajax',
         'script'   => true,
          'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexmos=tscheemi_nomben&cajtexcom=tscheemi_cedrif&mostrardato=S&operacion='+document.getElementById('tscheemi_operacion').value+'&tipdoc='+document.getElementById('tscheemi_tipdoc').value+'&numcue='+document.getElementById('tscheemi_numcue').value+'&fecemi='+document.getElementById('tscheemi_fecemi').value+'&codadiban='+$('tscheemi_codadiban').value+'&coddirec='+$('tscheemi_coddirec').value+'&cedrif='+this.value"
     ))),
     array('use_style' => 'true')
  )
?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Tesmovemiche/clase/Opbenefi/frame/sf_admin_edit_form/obj1/tscheemi_cedrif/obj2/tscheemi_nomben/campo1/cedrif/campo2/nomben')?>

&nbsp;
  <?php $value = object_input_tag($tscheemi, 'getNomben', array (
  'disabled' => true,
  'control_name' => 'tscheemi[nomben]',
  'size' => 60,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
  <?php echo label_for('tscheemi[cedrifsus]', __($labels['tscheemi{cedrifsus}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{cedrifsus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{cedrifsus}')): ?>
    <?php echo form_error('tscheemi{cedrifsus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getCedrifsus', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'tscheemi[cedrifsus]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br><br>
  <?php echo label_for('tscheemi[nombensus]', __($labels['tscheemi{nombensus}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{nombensus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{nombensus}')): ?>
    <?php echo form_error('tscheemi{nombensus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNombensus', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'tscheemi[nombensus]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<div id="divnumcomegr" style="display:none">
<br>
  <?php echo label_for('tscheemi[numcomegr]', __($labels['tscheemi{numcomegr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numcomegr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numcomegr}')): ?>
    <?php echo form_error('tscheemi{numcomegr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNumcomegr', array (
  'size' => 10,
  'maxlength' => 8,
  'control_name' => 'tscheemi[numcomegr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
    <div id="concepto" style="display:none">
<br>
<?php echo label_for('tscheemi[codconcepto]', __($labels['tscheemi{codconcepto}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{codconcepto}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{codconcepto}')): ?>
    <?php echo form_error('tscheemi{codconcepto}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('tscheemi[codconcepto]', $tscheemi->getCodconcepto(),
    'tesmovemiche/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 4,
    'readonly'  =>  $tscheemi->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'tesmovemiche/ajax',
        'condition' => "$('tscheemi_codconcepto').value != ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=10&cajtexmos=tscheemi_nomconcepto&cajtexcom=tscheemi_codconcepto&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?>
&nbsp;

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opconpag_Pagemiord/clase/Opconpag/frame/sf_admin_edit_form/obj1/tscheemi_codconcepto/obj2/tscheemi_nomconcepto/campo1/codconcepto/campo2/nomconcepto','','','botoncat')?>

&nbsp;
<?php $value = object_input_tag($tscheemi, 'getNomconcepto', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'tscheemi[nomconcepto]',
)); echo $value ? $value : '&nbsp;' ?></div></div>
<div id="divcodpro" style="display:none">
<br>
<?php echo label_for('tscheemi[codpro]', __($labels['tscheemi{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{codpro}')): ?>
    <?php echo form_error('tscheemi{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getCodpro', array (
    'size' => 10,
    'control_name' => 'tscheemi[codpro]',
    'maxlength' => 20,
    'onBlur'=> remote_function(array(
      'url'      => 'tesmovemiche/ajax',
      'condition' => "$('tscheemi_codpro').value != ''",
      'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=11&cajtexmos=tscheemi_despro&cajtexcom=tscheemi_codpro&codigo='+this.value"
      ))
  )); echo $value ? $value : '&nbsp;' ?>
&nbsp;

<?php
  $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
  if ($catprofor=='S') {?>
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_Forpoa/clase/Fordefpry/frame/sf_admin_edit_form/obj1/tscheemi_codpro/obj2/tscheemi_despro/campo1/codpro/campo2/despro','','','')?>
  <?php }else {?>
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catippro_Almordcom/clase/Catippro/frame/sf_admin_edit_form/obj1/tscheemi_codpro/obj2/tscheemi_despro/campo1/codpro/campo2/despro','','','')?>
  <?php }?>

&nbsp;
<?php $value = object_input_tag($tscheemi, 'getDespro', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'tscheemi[despro]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>
<br>
<table>
    <tr>
        <th>
<?php echo label_for('tscheemi[fecemi]', __($labels['tscheemi{fecemi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fecemi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fecemi}')): ?>
    <?php echo form_error('tscheemi{fecemi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
 <?php $value = object_input_date_tag($tscheemi, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tscheemi[fecemi]',
  'date_format' => 'dd/MM/yyyy',
 'onkeyup' => "javascript: mascara(this,'/',patron,true)",
 'onBlur'=> remote_function(array(
         'update'   => 'divGrid',
         'url'      => 'tesmovemiche/ajax',
         'script'   => true,
          'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=2&cajtexmos=tscheemi_nomben&cajtexcom=tscheemi_cedrif&mostrardato=S&operacion='+document.getElementById('tscheemi_operacion').value+'&tipdoc='+document.getElementById('tscheemi_tipdoc').value+'&numcue='+document.getElementById('tscheemi_numcue').value+'&fecemi='+document.getElementById('tscheemi_fecemi').value+'&codadiban='+$('tscheemi_codadiban').value+'&coddirec='+$('tscheemi_coddirec').value+'&cedrif='+document.getElementById('tscheemi_cedrif').value"
     ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
      </div>
            </th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th><?php if ($tscheemi->getCodmon()=='') $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); else $var=$tscheemi->getCodmon();?>
    <?php echo label_for('tscheemi[codmon]', __($labels['tscheemi{codmon}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('tscheemi{codmon}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('tscheemi{codmon}')): ?> <?php echo form_error('tscheemi{codmon}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

      <?php echo select_tag('tscheemi[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
      'onChange' => remote_function(array(
       'url'      => sfContext::getInstance()->getModuleName().'/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=8&cajtexmos=tscheemi_valmon&operacion='+$('tscheemi_operacion').value+'&valmone='+$('tscheemi_valmon').value+'&moneref='+$('moneref').value+'&codigo='+this.value"
          ))
      )) ?>
    </div></th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th><?php echo label_for('tscheemi[valmon]', __($labels['tscheemi{valmon}']), 'class="required" ') ?>
        <div class="content<?php if ($sf_request->hasError('tscheemi{valmon}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('tscheemi{valmon}')): ?> <?php echo form_error('tscheemi{valmon}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>

       <?php $value = object_input_tag($tscheemi, array('getValmon',true), array (
        'size' => 15,
        'control_name' => 'tscheemi[valmon]',
        'onBlur' => "javascript:event.keyCode=13; return entermontodecimal(event, this.id,6)",
      )); echo $value ? $value : '&nbsp;' ?>
        </div></th>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
            <th>
<? if ($comprobaut!='S' && $gencomaut!='S') { ?>
  <?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comprobante',
         'url'      => 'tesmovemiche/comprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
    )) ?><?php }?>
    </th>
    </tr>
    </table>
    </div>
</fieldset>
</div>

<div id="divGrid">
  <?php include_partial('tesmovemiche/grid', array('tscheemi' => $tscheemi, 'gridOrdPag' => $gridOrdPag, 'gridCompro' => $gridCompro, 'gridPrecom' => $gridPrecom, 'gridPagdir' => $gridPagdir, 'mensajeBen' => $mensajeBen, 'bloqueaopc' => $bloqueaopc, 'valoropc' => $valoropc)) ?>
</div>

<div id="comprobante">
</div>
<?php include_partial('edit_actions', array('tscheemi' => $tscheemi)) ?>
</form>
<?
  $pdfparform="n";
  $pdfjasper="N";

  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';

  $configyml = sfYaml::load($dirrepconfig);


  if(is_array($configyml)){
    if(array_key_exists('tesoreria',$configyml)) {
        if(array_key_exists('tsrvoucher',$configyml['tesoreria'])) {
          if(array_key_exists('parameterform',$configyml['tesoreria']["tsrvoucher"])) 
            $pdfparform = $configyml["tesoreria"]["tsrvoucher"]["parameterform"];
          if(array_key_exists('parameterjasper',$configyml['tesoreria']["tsrvoucher"])) 
            $pdfjasper= $configyml["tesoreria"]["tsrvoucher"]["parameterjasper"];
      }
    }
  }

?>
<script type="text/javascript">
var nuevo='<?php echo $tscheemi->getId()?>';
if (nuevo=='')
{
  var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
  if (valor!="")
  {
      calculo=toFloat2(valor);
      var num2=toFloat('tscheemi_valmon');
      if (num2==0)
         $('tscheemi_valmon').value=format(calculo.toFixed(6),'.',',','.');
  }
}

if ($('tscheemi_numcomegr').value!='')
   $('divnumcomegr').show();

 var mosproy='<?php echo H::getConfApp2('mosproy', 'tesoreria', 'tesmovemiche');?>';
  if (mosproy=='S')
    $('divcodpro').show();

var mosconpag='<?php echo H::getConfApp2('mosconpag', 'tesoreria', 'tesmovemiche')?>';
if (mosconpag=='S')
  $('concepto').show();

var filsoldir='<?php echo H::getConfApp2('filsoldir', 'compras', 'almsolegr')?>';

var filsoldir2='<?php echo H::getConfApp2('filsoldir', 'presupuesto', 'preprecom')?>';
if (filsoldir=='S' || filsoldir2=='S')
  $('divcoddirec').show();


var deshab='<?php echo $bloqfec; ?>';
if (deshab=='S')
{
	$('trigger_tscheemi_fecemi').hide();
	$('tscheemi_fecemi').readOnly=true;
} 

var mostrardivg='<?php echo $sf_user->getAttribute('tipodocumento',null,'tesmovemiche');?>';
if (mostrardivg!="")
{
    MostrarDivGrid();
}

var impche='<?php echo $impche;?>';

var numcomegr='<?php echo $numcomegr; ?>';
if (numcomegr!="")
{
  alert_('El N&uacute;mero de Comprobante de Egresos es: '+numcomegr);
}

if (impche=='S')
{
    if(confirm("¿Desea imprimir el/los Cheques emitidos?"))
    {
      var  numches='<? print $numches;?>';
      var  numcues='<? print $numcues;?>';
      var  mosparform='<? print $pdfparform;?>';
      var  mostrarjasper='<? print $pdfjasper;?>';
      var anumche=numches.split(",");
      var anumcue=numcues.split(",");
      var serache='<?php echo $scheque; ?>';
      var repdische='<?php echo H::getConfApp2('repdische', 'tesoreria', 'tesmovemiche')?>';
	  for (r=0;r<anumche.length;r++)
	  {
	  	var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      var nombrerep='<?php $aux=split(',',$numcues);
      echo H::getX_vacio('NUMCUE','Tsdefban','Nomrep',$aux[0]);?>';
     if (nombrerep!="")
     {
    		if (mosparform=='S')
    		{
    			pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/"+nombrerep+".php?numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
    		}else
    		{
    	            if (mostrarjasper=='S')
                            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=tesoreria&r="+nombrerep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
                        else
                            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+nombrerep+".php&numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
    		}
     }else {
        if (mosparform=='S')
    		{
    			pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/tsrvoucher.php?numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
    		}else
    		{
            if (mostrarjasper=='S') {
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=tesoreria&r=tsrvoucher.php&s=<?php echo $sf_user->getAttribute('schema');?>&numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
              }
            else{
              if (repdische=='S'){
                if (serache=='N')
                  pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=tsrformovlib.php&numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
                else
                  pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=tsrvoucher.php&numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
              }else 
                pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=tsrvoucher.php&numchedes="+anumche[r]+"&numchehas="+anumche[r]+"&numchehas="+anumche[r]+"&numcuedes="+anumcue[r]+"&numcuehas="+anumcue[r];
              }
        }
     }
     $('tscheemi_tipdoc').value='';
		window.open(pagina,anumche[r],"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
		
	  }
    }
}

function MostrarDivGrid()
{
    if ($('tscheemi_tipdoc').value != '') {
     new Ajax.Updater('divGrid', '/tesoreria'+getEnv()+'.php/tesmovemiche/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&cajtexmos=tscheemi_destip&cajtexcom=tscheemi_tipdoc&mostrardato=N&tipdoc='+$('tscheemi_tipdoc').value});
    }
}



</script>
