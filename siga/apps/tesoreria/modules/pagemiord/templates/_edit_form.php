<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 37989 2010-05-06 14:43:24Z dmartinez $
 */
// date: 2007/07/09 16:18:38
?>
<?php echo form_tag('pagemiord/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>

<?php use_helper('Linktogob') ?>
<?php echo object_input_hidden_tag($opordpag, 'getId') ?>
<input id="idrefer" name="idrefer" type="hidden" value="<? print $opordpag->getIdrefer(); ?>">
<input id="numcom" name="numcom" type="hidden" value="<? print $opordpag->getNumcom(); ?>">

<?php echo javascript_include_tag('dFilter', 'ajax', 'tesoreria/pagemiord', 'tools') ?>
<?php echo input_hidden_tag('moneref', '') ?>
<?php echo input_hidden_tag('monofi', H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001')) ?>
<?php echo input_hidden_tag('ranminmax', H::getConfApp2('ranminmax', 'tesoreria', 'pagemiord')) ?>
<?php echo input_hidden_tag('valnumfac', H::getConfApp2('valnumfac', 'tesoreria', 'pagemiord')) ?>
<?php echo input_hidden_tag('opordpag[gencomnom]', $opordpag->getGencomnom()) ?>
<?php echo input_hidden_tag('modifico1', 'true') ?>
<?php echo input_hidden_tag('modifico2', 'true') ?>
<?php echo input_hidden_tag('unidad', $unidad) ?>
<?php echo input_hidden_tag('numgridconsulta', $numconsul) ?>
<?php echo input_hidden_tag('numgridret', $numretencion) ?>
<?php echo input_hidden_tag('opordpag[presiono]', $opordpag->getPresiono()) ?>
<?php echo input_hidden_tag('opnomina', $ordpagnom) ?>
<?php echo input_hidden_tag('opaporte', $ordpagapo) ?>
<?php echo input_hidden_tag('opliquidacion', $ordpagliq) ?>
<?php echo input_hidden_tag('opfideicomiso', $ordpagfid) ?>
<?php echo input_hidden_tag('compadicional', $compadic) ?>
<?php echo input_hidden_tag('generactaord', $genctaord) ?>
<?php echo input_hidden_tag('opordpag[totalcomprobantes]', $opordpag->getTotalcomprobantes()) ?>
<?php echo input_hidden_tag('opordpag[cuentarendicion]', $opordpag->getCuentarendicion()) ?>
<?php echo input_hidden_tag('opordpag[totfonter]', $opordpag->getTotfonter()) ?>
<?php echo input_hidden_tag('opordpag[datosnomina]', $opordpag->getDatosnomina()) ?>
<?php echo input_hidden_tag('opordpag[datosaporte]', $opordpag->getDatosaporte()) ?>
<?php echo input_hidden_tag('opordpag[observe]', $opordpag->getObserve()) ?>
<?php echo input_hidden_tag('opordpag[modbasimpiva]', $opordpag->getModbasimpiva()) ?>
<?php echo input_hidden_tag('opordpag[limbaseret]', $opordpag->getLimbaseret()) ?>
<?php echo input_hidden_tag('opordpag[numfilas]', $opordpag->getNumfilas()) ?>
<?php echo input_hidden_tag('opordpag[numfilfac]', $opordpag->getNumfilfac()) ?>
<?php echo input_hidden_tag('opordpag[refcre]', $opordpag->getRefcre()) ?>
<?php echo input_hidden_tag('opordpag[refsolpag]', $opordpag->getRefsolpag()) ?>
<?php echo input_hidden_tag('opordpag[numfilret]', $opordpag->getNumfilret()) ?>
<?php echo input_hidden_tag('opordpag[sincalret]', $opordpag->getSincalret()) ?>
<?php echo input_hidden_tag('opordpag[notieamo]', $opordpag->getNotieamo()) ?>
<?php echo input_hidden_tag('opordpag[comnoiva]', $opordpag->getComnoiva()) ?>
<?php echo input_hidden_tag('opordpag[monorddisrgo]', $opordpag->getMonorddisrgo()) ?>
<?php echo input_hidden_tag('opordpag[aplrecop]', $opordpag->getAplrecop()) ?>
<?php echo input_hidden_tag('opordpag[tiepar411]', $opordpag->getTiepar411()) ?>
<?php echo input_hidden_tag('opordpag[codprehcm]', $opordpag->getCodprehcm()) ?>
<?php echo input_hidden_tag('opordpag[referenciashcm]', $opordpag->getReferenciashcm()) ?>
<table width="100%">
  <tr>
    <th><strong><font color="<? print $color;?>" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <? print $eti;?></font></strong></th>
  </tr>
</table>

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Orden')?></legend>
<div class="form-row">
  <table width="100%">
   <tr>
    <th><?php echo label_for('opordpag[numord]', __($labels['opordpag{numord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numord}')): ?>
    <?php echo form_error('opordpag{numord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumord', array (
  'size' => 20,
  'control_name' => 'opordpag[numord]',
  'maxlength' => 8,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('opordpag_fecemi').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    
    <th> <?php echo label_for('opordpag[fecemi]', __($labels['opordpag{fecemi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecemi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecemi}')): ?>
    <?php echo form_error('opordpag{fecemi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecemi]',
  'date_format' => 'dd/MM/yyyy',
  'maxlength' => 10,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('opordpag_fecemi').value != '' && $('id').value == ''",
        'with' => "'ajax=16&cajtexcom=opordpag_fecemi&cedrif='+$('opordpag_cedrif').value+'&ordamo='+$('opordpag_numordamo').value+'&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('valfec', '') ?>
    </div></th>
    
    <th>  <?php if ($opordpag->getCodmon()=='') $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); else $var=$opordpag->getCodmon();?>
    <?php echo label_for('opordpag[codmon]', __($labels['opordpag{codmon}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('opordpag{codmon}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{codmon}')): ?> <?php echo form_error('opordpag{codmon}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

      <?php echo select_tag('opordpag[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
      'onChange' => remote_function(array(
       'url'      => sfContext::getInstance()->getModuleName().'/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=27&cajtexmos=opordpag_valmon&moneref='+$('moneref').value+'&nuevo='+$('id').value+'&refiere='+$('opordpag_documento').value+'&valmone='+$('opordpag_valmon').value+'&fechaemi='+$('opordpag_fecemi').value+'&codigo='+this.value"
          ))
      )) ?>
    </div></th>
    
    <th><?php echo label_for('opordpag[valmon]', __($labels['opordpag{valmon}']), 'class="required" ') ?>
        <div class="content<?php if ($sf_request->hasError('opordpag{valmon}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('opordpag{valmon}')): ?> <?php echo form_error('opordpag{valmon}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>

       <?php $value = object_input_tag($opordpag, array('getValmon',true), array (
        'size' => 15,
        'control_name' => 'opordpag[valmon]',
        'readonly'  =>  $opordpag->getId()!='' ? true : false ,
        'onBlur' => "javascript:event.keyCode=13; return entermontodecimal(event, this.id,6)",
      )); echo $value ? $value : '&nbsp;' ?>
        </div></th>        
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th><?php echo label_for('opordpag[tipcau]', __($labels['opordpag{tipcau}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipcau}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipcau}')): ?>
    <?php echo form_error('opordpag{tipcau}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getTipcau', array (
  'size' => 20,
  'control_name' => 'opordpag[tipcau]',
  'maxlength' => 4,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opordpag_tipcau').value=cadena",
  'onBlur'=> remote_function(array(
        'update'   => 'divGrid',
        'condition' => "$('opordpag_tipcau').value != '' && $('id').value == ''",
        'url'      => 'pagemiord/ajax',
        'complete' => 'AjaxJSON(request, json), actualizarsaldos() , mostrarcat()',
        'script' => true,
        'with' => "'ajax=1&cajtexmos=opordpag_nomext&cajtexcom=opordpag_tipcau&opordpag_monord='+$('opordpag_monord').value+'&opordpag_monret='+$('opordpag_monret').value+'&opordpag_mondes='+$('opordpag_mondes').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccau_Pagemiord/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opordpag_tipcau/obj2/opordpag_nomext/campo1/tipcau/campo2/nomext','','','botoncat')?></th>
    <th><?php $value = object_input_tag($opordpag, 'getNomext', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[nomext]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>
<div id="divAdi">
</div>

<div id="divCon">
</div>

<br><?php echo input_hidden_tag('opordpag[afectapre]', $opordpag->getAfectapre()) ?> <?php echo input_hidden_tag('partidas', '') ?><?php echo input_hidden_tag('opordpag[documento]', $opordpag->getDocumento()) ?>
<?php $cadestatus=substr($eti,0,6);?>

 <?php echo label_for('opordpag[desord]', __($labels['opordpag{desord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desord}')): ?>
    <?php echo form_error('opordpag{desord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($opordpag, 'getDesord', array (
  'size' => '80x3',
  'readonly'  =>  $cadestatus=='PAGADA' ? true : false ,
  'control_name' => 'opordpag[desord]',
  'maxlength'=> 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<table>
   <tr>
    <th><?php echo label_for('opordpag[cedrif]', __($labels['opordpag{cedrif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{cedrif}')): ?>
    <?php echo form_error('opordpag{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('opordpag[cedrif]', $opordpag->getCedrif(),
    'pagemiord/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 15,
'readonly'  =>  $opordpag->getId()!='' ? true : false ,
'onBlur'=> remote_function(array(
        'update'   => 'combo',
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_cedrif').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json), actualizarbenefi() ',
        'script' => true,
        'before' => 'var cod=$("opordpag_cedrif").value; var i=0; while (i<cod.length){ cod=cod.replace(".","@"); i++;}',
          'with' => "'ajax=2&cajtexmos=opordpag_nomben&cajtexcom=opordpag_cedrif&cuenta=opordpag_ctapag&descuenta=opordpag_descta&cuenta2=codctasec&codigo='+cod"
        ))),
     array('use_style' => 'true', 'complete' => 'actualizarbenefi()',)
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;<?php echo input_hidden_tag('existeben', '') ?></th>
    <th><?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Pagemiord/clase/Opbenefi/frame/sf_admin_edit_form/obj1/opordpag_cedrif/obj2/opordpag_nomben/campo1/cedrif/campo2/nomben','','','botoncat')?></th>
    <th>
    <div id="combo">
    </div>
    </th>
    </tr>
  </table>

<br>

  <?php echo label_for('opordpag[nomben]', __($labels['opordpag{nomben}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nomben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nomben}')): ?>
    <?php echo form_error('opordpag{nomben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNomben', array (
  'size' => 80,
  'control_name' => 'opordpag[nomben]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('opordpag[nombensus]', __($labels['opordpag{nombensus}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nombensus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nombensus}')): ?>
    <?php echo form_error('opordpag{nombensus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNombensus', array (
  'size' => 80,
  'control_name' => 'opordpag[nombensus]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <table>
   <tr>
    <th><?php echo label_for('opordpag[ctapag]', __($labels['opordpag{ctapag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{ctapag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{ctapag}')): ?>
    <?php echo form_error('opordpag{ctapag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCtapag', array (
  'size' => 32,
  'maxlength' => $loncta,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[ctapag]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_ctapag').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json), verificar()',
          'with' => "'ajax=3&cajtexmos=opordpag_descta&cajtexcom=opordpag_ctapag&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('cargable', '') ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Contabb_Pagemiord/clase/Contabb/frame/sf_admin_edit_form/obj1/opordpag_ctapag/obj2/opordpag_descta/campo1/codcta/campo2/descta/param1/'+$('opordpag_cedrif').value+'",'','','botoncat')?></th>
    <th><?php $value = object_input_tag($opordpag, 'getDescta', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[descta]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>
 &nbsp;&nbsp;&nbsp;<?php echo object_input_hidden_tag($opordpag, 'getCodctasec') ?>
<br>
<?php if ($opordpag->getFilordcbtp()=='S') { ?>
<?php echo label_for('opordpag[numcta]', __($labels['opordpag{numcta}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numcta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numcta}')): ?>
    <?php echo form_error('opordpag{numcta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('opordpag[numcta]', $opordpag->getNumcta(),
    'pagemiord/autocomplete?ajax=8',  array('autocomplete' => 'off','maxlength' => 20, 'size' => 23, 'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opordpag_numcta').value != ''",
          'with' => "'ajax=25&cajtexmos=opordpag_nomcue2&cajtexcom=opordpag_numcta&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefban_Tesmovemiche/clase/Tsdefban/frame/sf_admin_edit_form/obj1/opordpag_numcta/obj2/opordpag_nomcue2/campo1/numcue/campo2/nomcue')?>

&nbsp;
  <?php $value = object_input_tag($opordpag, 'getNomcue2', array (
  'disabled' => true,
  'control_name' => 'opordpag[nomcue2]',
  'size'=> 60,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('opordpag[tipdoc]', __($labels['opordpag{tipdoc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipdoc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipdoc}')): ?>
    <?php echo form_error('opordpag{tipdoc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php echo input_auto_complete_tag('opordpag[tipdoc]', $opordpag->getTipdoc(),
    'pagemiord/autocomplete?ajax=9',  array('autocomplete' => 'off','maxlength' => 4, 'size' => 23, 'onBlur'=> remote_function(array(
       'url'      => 'pagemiord/ajax',
       'condition' => "$('opordpag_tipdoc').value != ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=26&cajtexmos=opordpag_destip2&cajtexcom=opordpag_tipdoc&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
  ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdocpag_Tesmovemiche/clase/Cpdocpag/frame/sf_admin_edit_form/obj1/opordpag_tipdoc/obj2/opordpag_destip2/campo1/tippag/campo2/nomext')?>

&nbsp;
  <?php $value = object_input_tag($opordpag, 'getDestip2', array (
   'disabled' => true,
  'control_name' => 'opordpag[destip2]',
  'size'=> 60,
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>
<?php } ?>
 <table>
   <tr>
    <th><?php echo label_for('opordpag[coduni]', __($labels['opordpag{coduni}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{coduni}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{coduni}')): ?>
    <?php echo form_error('opordpag{coduni}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($opordpag, 'getCoduni', array (
  'size' => 32,
  'maxlength' => $lonubi,
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'control_name' => 'opordpag[coduni]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_coduni').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=4&cajtexmos=opordpag_desubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
    <th><?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_PagemiordNew/clase/Bnubica/frame/sf_admin_edit_form/obj1/opordpag_coduni/obj2/opordpag_desubi/obj3/generaotro/campo1/codubi/campo2/desubi/param1/'.$lonubi,'','','botoncat')?></th>
    <th> <?php $value = object_input_tag($opordpag, 'getdesubi', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[desubi]',
)); echo $value ? $value : '&nbsp;' ?> <?php echo input_hidden_tag('generaotro', '') ?></th>
   </tr>
  </table>

<br>
   <div id="divcodpro" style="display:none">
<table>
  <tr>
    <th>   
    <?php echo label_for('opordpag[codpro]', __($labels['opordpag{codpro}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{codpro}')): ?>
    <?php echo form_error('opordpag{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCodpro', array (
    'size' => 10,
    'control_name' => 'opordpag[codpro]',
    'maxlength' => 20,
    'onBlur'=> remote_function(array(
          'url'      => 'pagemiord/ajax',
          'condition' => "$('opordpag_codpro').value != ''",
          'complete' => 'AjaxJSON(request, json)',
            'with' => "'ajax=34&cajtexmos=opordpag_despro&cajtexcom=opordpag_codpro&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>
</div></th>
    <th>
      <?php
    $catprofor=H::getConfApp2('catprofor', 'compras', 'almordcom');
    if ($catprofor=='S') {?>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fordefpry_Forpoa/clase/Fordefpry/frame/sf_admin_edit_form/obj1/opordpag_codpro/obj2/opordpag_despro/campo1/codpro/campo2/nompro','','','')?>
    <?php }else {?>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catippro_Almordcom/clase/Catippro/frame/sf_admin_edit_form/obj1/opordpag_codpro/obj2/opordpag_despro/campo1/codpro/campo2/despro','','','')?>
    <?php }?></th>
    <th> <?php $value = object_input_tag($opordpag, 'getDespro', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[despro]',
)); echo $value ? $value : '&nbsp;' ?></th>
 </tr>
</table>
 </div>
 <table>
 <tr>
 <tr>
    <th><?php echo label_for('opordpag[tipfin]', __($labels['opordpag{tipfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipfin}')): ?>
    <?php echo form_error('opordpag{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('opordpag[tipfin]', $opordpag->getTipfin(),
    'pagemiord/autocomplete?ajax=5',  array('autocomplete' => 'off','maxlength' => 4,
    'readonly'  =>  $opordpag->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_tipfin').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=5&cajtexmos=opordpag_nomext2&cajtexcom=opordpag_tipfin&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fortipfin_Pagemiord/clase/Fortipfin/frame/sf_admin_edit_form/obj1/opordpag_tipfin/obj2/opordpag_nomext2/campo1/codfin/campo2/nomext','','','botoncat')?></th>
    <th> <?php $value = object_input_tag($opordpag, 'getNomext2', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[nomext2]',
)); echo $value ? $value : '&nbsp;' ?></th>
 </tr>
 <tr>
    <th><?php echo label_for('opordpag[coddirec]', __($labels['opordpag{coddirec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{coddirec}')): ?>
    <?php echo form_error('opordpag{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCoddirec', array (
    'size' => 20,
    'control_name' => 'opordpag[coddirec]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'pagemiord/ajax',
      'condition' => "$('opordpag_coddirec').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=38&cajtexmos=opordpag_desdirec&cajtexcom=opordpag_coddirec&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>

</div></th>
    <th>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/opordpag_coddirec/obj2/opordpag_desdirec/campo1/coddirec/campo2/desdirec','','','botoncat')?></th>
    <th> <?php $value = object_input_tag($opordpag, 'getDesdirec', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[desdirec]',
)); echo $value ? $value : '&nbsp;' ?></th>
 </tr> 
   <tr>
    <th><?php echo label_for('opordpag[codconcepto]', __($labels['opordpag{codconcepto}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{codconcepto}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{codconcepto}')): ?>
    <?php echo form_error('opordpag{codconcepto}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo input_auto_complete_tag('opordpag[codconcepto]', $opordpag->getCodconcepto(),
    'pagemiord/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 4,
    'readonly'  =>  $opordpag->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_codconcepto').value != ''",
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=23&cajtexmos=opordpag_nomconcepto&cajtexcom=opordpag_codconcepto&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opconpag_Pagemiord/clase/Opconpag/frame/sf_admin_edit_form/obj1/opordpag_codconcepto/obj2/opordpag_nomconcepto/campo1/codconcepto/campo2/nomconcepto','','','botoncat')?></th>
    <th> <?php $value = object_input_tag($opordpag, 'getNomconcepto', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[nomconcepto]',
)); echo $value ? $value : '&nbsp;' ?></th>
<th>
<? if ($opordpag->getId()=='' && $comprobaut!='S') { ?>
<?php echo submit_to_remote('Submit2', 'Generar Comprobante', array(
         'update'   => 'comp',
         'url'      => 'pagemiord/ajaxcomprobante',
         'script'   => true,
         'complete' => 'AjaxJSON(request, json)',
         'submit' => 'sf_admin_edit_form',
         ),array('id' => 'btncomp')) ?>
<? } else if ($opordpag->getId()!='') { ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input id="btncomp" name="Comprobante" type="button" value="Comprobantes" onClick="consultarComp()">
  <input type="button" name="Submit" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
  <?php if ($opordpag->getNumche()!="") { ?>
  <input type="button" name="Submit" value="Cheque" onclick="javascript:Mostrar_cheque_preimpreso();" />
  <?php } ?>
<?php } ?>

</th>
<th> <?php echo link_to_seniat($opordpag->getCedrif()) ?> </th>
<th> <?php echo link_to_snc($opordpag->getCedrif()) ?> </th>
   </tr>
   <tr>
   <th>
   <?php echo label_for('opordpag[numforpre]', __($labels['opordpag{numforpre}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numforpre}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numforpre}')): ?>
    <?php echo form_error('opordpag{numforpre}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumforpre', array (
  'size' => 20,
  'control_name' => 'opordpag[numforpre]',
  'maxlength' => 15,
)); echo $value ? $value : '&nbsp;' ?>
   </th>
   <th>
       &nbsp;&nbsp;
   </th>
   <th>
     <?php echo label_for('opordpag[amortiza]', __($labels['opordpag{amortiza}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{amortiza}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{amortiza}')): ?>
    <?php echo form_error('opordpag{amortiza}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

       <?php $value = object_input_tag($opordpag, array('getAmortiza',true), array (
    'size' => 15,
    'control_name' => 'opordpag[amortiza]',
    'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
  )); echo $value ? $value : '&nbsp;' ?>
  </div>
   </th>
      <th>           
   <?php echo label_for('opordpag[ordsnc]', __($labels['opordpag{ordsnc}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{ordsnc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{ordsnc}')): ?>
    <?php echo form_error('opordpag{ordsnc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

      <?php echo select_tag('opordpag[ordsnc]', options_for_select(array('S' => 'Si', 'N' => 'No'),$opordpag->getOrdsnc(),'include_custom=Seleccione'),array(
      )) ?>
    </div>
       </th>
   </tr>
 <tr>
   <th>
   <?php echo label_for('opordpag[numcon]', __($labels['opordpag{numcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numcon}')): ?>
    <?php echo form_error('opordpag{numcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumcon', array (
  'size' => 20,
  'control_name' => 'opordpag[numcon]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
   </th>
   <th>
       &nbsp;&nbsp;
   </th>
      <th>           
   <?php echo label_for('opordpag[mescon]', __($labels['opordpag{mescon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{mescon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{mescon}')): ?>
    <?php echo form_error('opordpag{mescon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

      <?php echo select_tag('opordpag[mescon]', options_for_select(Constantes::ListaMeses(),$opordpag->getMescon(),'include_custom=Seleccione'),array(
      )) ?>
    </div>
       </th>
       <th>
        <?php $mosbtnpag=H::getConfApp2('mosbtnpag', 'tesoreria', 'pagemiord');
        if ($opordpag->getId() && $opordpag->getStatus()=='N' && $mosbtnpag=='S') { ?>
          <input type="button" id="btnactpag" name="Submit" value="Actualizar Pago" onClick="javascript:$('divpagado').toggle();"/>
        <?php } ?>
        </th>          
   </tr> 
  </table>
<br>
<div id="divpagado" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos del Pago')?></legend>
<div class="form-row">
  <?php echo label_for('opordpag[ctaban]', __($labels['opordpag{ctaban}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{ctaban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{ctaban}')): ?>
    <?php echo form_error('opordpag{ctaban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCtaban', array (
  'size' => 20,
  'control_name' => 'opordpag[ctaban]',
  'maxlength' => 20,
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_ctaban').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=41&cajtexmos=opordpag_nomcue3&cajtexcom=opordpag_ctaban&codigo='+this.value",

        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsmovlib_tesmovdeglib/clase/Tsdefban/frame/sf_admin_edit_form/obj1/opordpag_ctaban/obj2/opordpag_nomcue3/campo1/numcue/campo2/nomcue/param1/1','','','botoncat')?>

<?php $value = object_input_tag($opordpag, 'getNomcue3', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'opordpag[nomcue3]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>

  <?php echo label_for('opordpag[numche]', __($labels['opordpag{numche}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numche}')): ?>
    <?php echo form_error('opordpag{numche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumche', array (
  'size' => 20,
  'control_name' => 'opordpag[numche]',
  'maxlength' => $opordpag->getReflibmay8()=='S' ? 20 : 8 ,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
  <?php echo label_for('opordpag[tipmov]', __($labels['opordpag{tipmov}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipmov}')): ?>
    <?php echo form_error('opordpag{tipmov}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getTipmov', array (
  'size' => 20,
  'control_name' => 'opordpag[tipmov]',
  'maxlength' => 4 ,
  'onBlur'=> remote_function(array(
    'url'      => 'pagemiord/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('opordpag_tipmov').value != ''",
      'with' => "'ajax=40&cajtexmos=opordpag_destip4&cajtexcom=opordpag_tipmov&codigo='+this.value",
    ))
   )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp3/clase/Tstipmov/frame/sf_admin_edit_form/obj1/opordpag_tipmov/obj2/opordpag_destip4/campo1/codtip/campo2/destip','','','botoncat')?>

  <?php $value = object_input_tag($opordpag, 'getDestip4', array (
  'disabled' => true,
  'size' => 50,
  'maxlength' => 80,
  'control_name' => 'opordpag[destip4]',
   )); echo $value ? $value : '&nbsp;' ?>
    </div>   
<br>
  <div align="center">
    <?php echo submit_to_remote('Submit2', 'Pagar', array(
       'url'      => 'pagemiord/ajax?ajax=39',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'submit' => 'sf_admin_edit_form',
       ),array('id' => 'btnpagar')) ?>
  </div>
</div>
</fieldset> 
</div>


</div>
<div id="datvaluacion" style="display:none">
  <?php echo label_for('opordpag[numval]', __($labels['opordpag{numval}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numval}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numval}')): ?>
    <?php echo form_error('opordpag{numval}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumval', array (
  'size' => 20,
  'control_name' => 'opordpag[numval]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
<table>
<tr>
  <th>
   <?php echo label_for('opordpag[numordamo]', __($labels['opordpag{numordamo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{numordamo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{numordamo}')): ?>
    <?php echo form_error('opordpag{numordamo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNumordamo', array (
  'size' => 10,
  'control_name' => 'opordpag[numordamo]',
  'maxlength' => 8,
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opordpag_numordamo').value != '' && $('id').value == ''",
        'with' => "'ajax=30&cajtexcom=opordpag_numordamo&cedrif='+$('opordpag_cedrif').value+'&fecemi='+$('opordpag_fecemi').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Opordpag_Pagemiord/clase/Opordpag/frame/sf_admin_edit_form/obj1/opordpag_numordamo/campo1/numord/param1/'+$('opordpag_cedrif').value+'",'','','botoncat')?>
   </th>    
   <th>
       &nbsp;&nbsp;
   </th>
   <th>
     <?php echo label_for('opordpag[montoamo]', __($labels['opordpag{montoamo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{montoamo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{montoamo}')): ?>
    <?php echo form_error('opordpag{montoamo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

       <?php $value = object_input_tag($opordpag, array('getMontoamo',true), array (
    'size' => 15,
    'readOnly' => true,
    'control_name' => 'opordpag[montoamo]',
    //'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
  )); echo $value ? $value : '&nbsp;' ?>
  </div>
   </th>
             <th>
       &nbsp;&nbsp;
   </th>
   <th>
     <?php echo label_for('opordpag[restoamo]', __($labels['opordpag{restoamo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{restoamo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{restoamo}')): ?>
    <?php echo form_error('opordpag{restoamo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

       <?php $value = object_input_tag($opordpag, array('getRestoamo',true), array (
    'size' => 15,
    'readOnly' => true,
    'control_name' => 'opordpag[restoamo]',
    //'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
  )); echo $value ? $value : '&nbsp;' ?>
  </div>
   </th>
 </tr> 
 <tr>
    <?php 
    $repcomp=array();
    $sqlrep='SELECT comiva, comislr, comltf, comrs FROM opdefemp';
    H::BuscarDatos($sqlrep, $repcomp);
    if (H::getConfApp2('comproret', 'tesoreria', 'pagemiord')=="S") { ?>
    <td>
    <?php if($repcomp[0]['comiva']!=""){?>    
    <input type="button" name="Submit" value="Comprobante IVA" onclick="javascript:Mostrar_ComprobanteRetencion('IVA','<?php echo $repcomp[0]['comiva']?>');" />
    <?php } if($repcomp[0]['comislr']!=""){?>
    <input type="button" name="Submit" value="Comprobante ISLR" onclick="javascript:Mostrar_ComprobanteRetencion('ISLR','<?php echo $repcomp[0]['comislr']?>');" />
    <?php } if($repcomp[0]['comltf']!=""){?>
    <input type="button" name="Submit" value="Comprobante LTF" onclick="javascript:Mostrar_ComprobanteRetencion('LTF','<?php echo $repcomp[0]['comltf']?>');" />
    <?php } if($repcomp[0]['comrs']!=""){?>
    <input type="button" name="Submit" value="Comprobante RS" onclick="javascript:Mostrar_ComprobanteRetencion('RS','<?php echo $repcomp[0]['comrs']?>');" />
    </td>
    <?php } } ?>
 </tr>
</table>  
  <table>
    <tr>
    <th>         
  <div id="adici" style="display:none">  
   <?php echo label_for('opordpag[codadi]', __($labels['opordpag{codadi}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{codadi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{codadi}')): ?>
    <?php echo form_error('opordpag{codadi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

      <?php echo select_tag('opordpag[codadi]', options_for_select(TsdefbanPeer::Listacodigos(),$opordpag->getCodadi(),'include_custom=Seleccione'),array(
      )) ?>
    </div>
  </div>
       </th>
   <th>
       &nbsp;&nbsp;&nbsp;&nbsp;
   </th>
       <th>         
             <div id="tipdescuen" style="display:none">  
   <?php echo label_for('opordpag[codtde]', __($labels['opordpag{codtde}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{codtde}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{codtde}')): ?>
    <?php echo form_error('opordpag{codtde}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

      <?php echo select_tag('opordpag[codtde]', options_for_select(OptipdesPeer::ListaDescuento(),$opordpag->getCodtde(),'include_custom=Seleccione'),array(
      )) ?>
    </div>
  </div>
       </th>       
   </tr>  
  </table>
<div id="comp">
</div>

</div>
</fieldset>
<br>
<div id="genret"></div>


<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Imputaciones Presupuestarias');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<div id="mensaj"></div>
<div id="botonret" style="display:none">
<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" value="Retenciones" onClick="javascript:$('reten').toggle();"/>
</li>
</ul>
</div>

  <div id="divGrid">
  <?
  echo grid_tag($obj);
  ?></div>

<div id="aplrec"style="display:none">

<?php echo label_for('opordpag[codrgo]', __($labels['opordpag{codrgo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{codrgo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{codrgo}')): ?>
    <?php echo form_error('opordpag{codrgo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_tag($opordpag, 'getCodrgo', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'opordpag[codrgo]',  
  'readonly'  =>  $opordpag->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiord/ajax',
        'condition' => "$('opordpag_codrgo').value != '' && $('id').value == ''",        
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=32&cajtexmos=opordpag_nomrgo&moncal=opordpag_monrgo&monart='+$('totmarcadas').value+'&cajtexcom=opordpag_codrgo&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Optipret_Carecarg/clase/Carecarg/frame/sf_admin_edit_form/obj1/opordpag_codrgo/obj2/opordpag_nomrgo/campo1/codrgo/campo2/nomrgo')?>
&nbsp;
  <?php $value = object_input_tag($opordpag, 'getNomrgo', array (
  'size'=> 60,
  'readOnly' => true,
  'control_name' => 'opordpag[nomrgo]',  
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
  <?php echo label_for('opordpag[monrgo]', __($labels['opordpag{monrgo}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{monrgo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{monrgo}')): ?>
    <?php echo form_error('opordpag{monrgo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, array('getMonrgo',true), array (
    'size' => 15,
    'control_name' => 'opordpag[monrgo]',
    'readonly'  =>  $opordpag->getId()!='' ? true : false ,
    'onBlur' => "javascript:event.keyCode=13; entermontootro(event, this.id); sumardatosgrid();",
  )); echo $value ? $value : '&nbsp;' ?>
  </div>


  </div>
  <?php echo input_hidden_tag('noexiste', '') ?><?php echo input_hidden_tag('noasigna', '') ?><?php echo input_hidden_tag('nonivel', '') ?><?php echo input_hidden_tag('errormonto', '') ?><?php echo input_hidden_tag('montodisponible', '') ?><?php echo input_hidden_tag('codigopresupuestario', '') ?> <?php echo input_hidden_tag('nopar411', '') ?>
  <?php echo input_hidden_tag('totmarcadas', '0,00') ?><?php echo input_hidden_tag('opordpag[referencias]', $opordpag->getReferencias()) ?>

  <br>
  <?php echo input_hidden_tag('afectarec', $afectarec) ?><?php echo input_hidden_tag('formato', $formatpar) ?><?php echo input_hidden_tag('inicio', $iniciopar) ?>
  <table>
    <tr>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th><?php echo label_for('Totales', __('TOTALES'), 'class="required" ') ?></th>
      <th>&nbsp;&nbsp;</th>
      <th><?php $value = object_input_tag($opordpag, array('getMonord',true), array (
    'size' => 15,
    'readonly' => true,
    'class' => 'grid_txtright',
    'control_name' => 'opordpag[monord]',
  )); echo $value ? $value : '&nbsp;' ?></th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th>  <?php $value = object_input_tag($opordpag, array('getMonret',true), array (
    'size' => 15,
    'readonly' => true,
    'class' => 'grid_txtright',
    'control_name' => 'opordpag[monret]',
  )); echo $value ? $value : '&nbsp;' ?></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php $value = object_input_tag($opordpag, array('getMondes',true), array (
      'size' => 15,
      'readonly' => true,
      'class' => 'grid_txtright',
      'control_name' => 'opordpag[mondes]',
    )); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

  <br>
  <table>
    <tr>
    <th>
    <?php echo label_for('',__('Neto a Pagar') , 'class="required" Style="width:100px"') ?>
    <?php echo input_tag('opordpag[neto]',$opordpag->getNeto(), 'size=15 class=grid_txtright readonly=true onBlur="javascript:event.keyCode=13; return entermontootro(event, this.id); sumardatosgrid();"') ?>
    </th>
    </tr>
  </table>

  <br>

  <div id="reten" style="display:none">
    <fieldset id="sf_fieldset_none" class="">
    <div class="form-row">
    <? echo grid_tag($obj5);?>
    <?php echo input_hidden_tag('totalmontorete', '') ?><?php echo input_hidden_tag('existeretencion', '') ?>
    <div align="center">
      <?php echo link_to_function(image_tag('/images/salir.gif'), "salvarretenciones()") ?>
    </div>
    </div>
    </fieldset>
    </div>

    <div id="consulta" style="display:none">
      <? //echo grid_tag($obj6);?>
    </div>
    <?php echo input_hidden_tag('mensaje', '') ?><?php echo input_hidden_tag('ajaxs', '') ?>
  </div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Observaciones');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
    <?php echo label_for('opordpag[obsord]', __($labels['opordpag{obsord}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('opordpag{obsord}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{obsord}')): ?>
      <?php echo form_error('opordpag{obsord}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

      <?php $value = object_textarea_tag($opordpag, 'getObsord', array (
      'size' => '80x5',
      'control_name' => 'opordpag[obsord]',
      'maxlength' => 250,
      'onkeyup' => "javascript:return ismaxlength(this)",
    )); echo $value ? $value : '&nbsp;' ?>
    </div>
  </div>
</fieldset>


<?php tabPageOpenClose("tp1", "tabPage3", 'Factura');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
    <div id="botonfac">
      <?php echo submit_to_remote('btnFactura', 'Factura', array(
       'update'   => 'divFac',
       'url'      => 'pagemiord/ajaxfactura',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json), notas() ',
       'submit' => 'sf_admin_edit_form',
      )) ?>
    </div>
    <br>
    <?php echo input_hidden_tag('nota', '') ?>
    <?php echo input_hidden_tag('referencia2', '') ?>
    <?php echo input_hidden_tag('opordpag[vacio]', $opordpag->getVacio()) ?>
    <div id="divFac" Style="display:none">
      <? echo grid_tag($obj2);?>
    </div>
  </div>
</fieldset>

<?php if ($opordpag->getId()!='') //ES UNA CONSULTA
{?>
<?php tabPageOpenClose("tp1", "tabPage4", 'Retenciones');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
    <? echo grid_tag($obj3);?>
    <br>
    <?php echo input_hidden_tag('esta', $esta) ?>
    <?php echo input_hidden_tag('fac', '') ?>
    <table>
      <tr>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th><?php echo label_for('',__('Total Retenciones') , 'class="required" Style="width:100px"') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo input_tag('total', '', array(
        'size'=> 20,
        'class'=> 'grid_txtright',
        'readonly'=> true,
        )) ?></th>
      </tr>
    </table>
  </div>
</fieldset>
<?}?>

<?
if ( ($opordpag->getId()!='')) //ES CONSULTA
    {
      echo javascript_tag("
                    javascript:actualizarsaldos_d();
        ");
    }
?>

<fieldset>
<div id="anul" style="display:none">
 <?php echo label_for('opordpag[desanu]', __($labels['opordpag{desanu}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desanu}')): ?>
    <?php echo form_error('opordpag{desanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getDesanu', array (
  'size' => 80,
  'control_name' => 'opordpag[desanu]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<?php echo label_for('opordpag[fecanu]', __($labels['opordpag{fecanu}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecanu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecanu}')): ?>
    <?php echo form_error('opordpag{fecanu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecanu', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecanu]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onkeyPress' => "javascript: validar(event,this.id)",
  ),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
</filedset>




<?php tabPageOpenClose("tp1", "tabPage5", 'SIGECOF');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
    <?php echo label_for('opordpag[numsigecof]', __($labels['opordpag{numsigecof}']), 'class="required"') ?>
    <div class="content<?php if ($sf_request->hasError('opordpag{numsigecof}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{numsigecof}')): ?> <?php echo form_error('opordpag{numsigecof}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_tag($opordpag, 'getNumsigecof', array (
    'size' => 8,
    'control_name' => 'opordpag[numsigecof]',
    )); echo $value ? $value : '&nbsp;' ?>
    </div>

  <br>
  <?php echo label_for('opordpag[fecsigecof]', __($labels['opordpag{fecsigecof}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecsigecof}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{fecsigecof}')): ?> <?php echo form_error('opordpag{fecsigecof}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_date_tag($opordpag, 'getFecsigecof', array (
      'rich' => true,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'opordpag[fecsigecof]',
      'date_format' => 'dd/MM/yyyy',
      'maxlength' => 10,
      'readonly'  =>  $opordpag->getId()!='' ? true : false ,
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",
      'onBlur'=> remote_function(array(
            'url'      => 'pagemiord/ajax',
            'complete' => 'AjaxJSON(request, json), validafec()',
            'condition' => "$('opordpag_fecsigecof').value != '' && $('id').value == ''",
            'with' => "'ajax=16&codigo='+this.value"
            ))
      ),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?><?php echo input_hidden_tag('valfec', '') ?>
  </div>
  <br>

  <?php echo label_for('opordpag[expsigecof]', __($labels['opordpag{expsigecof}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{expsigecof}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{expsigecof}')): ?> <?php echo form_error('opordpag{expsigecof}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_tag($opordpag, 'getExpsigecof', array (
    'size' => 8,
    'control_name' => 'opordpag[expsigecof]',
    )); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage6", 'SNC');?>
<fieldset id="sf_fieldset_none" class="">
  <div class="form-row">
  <?php echo label_for('opordpag[codsnc]', __($labels['opordpag{codsnc}']), 'class="required"') ?>
     <div class="content<?php if ($sf_request->hasError('opordpag{codsnc}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{codsnc}')): ?> <?php echo form_error('caordcom{codsnc}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

      <?php $value = object_input_tag($opordpag, 'getCodsnc', array (
      'size' => 10,
      'maxlength' => 20,
      'control_name' => 'opordpag[codsnc]',
      'onBlur'=> remote_function(array(
            'url' => 'pagemiord/ajax',
            'condition' => "$('opordpag_codsnc').value!=''",
            'complete' => 'AjaxJSON(request, json)',
            'with' => "'ajax=28&cajtexmos=opordpag_dessnc&cajtexcom=opordpag_codsnc&codigo='+this.value",
            )),
    )); echo $value ? $value : '&nbsp;' ?>

    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cacatsnc_Almregart/clase/Cacatsnc/frame/sf_admin_edit_form/obj1/opordpag_codsnc/obj2/opordpag_dessnc/campo1/codsnc/campo2/dessnc')?>

    <?php $value = object_input_tag($opordpag, 'getDessnc', array (
    'size' => 50,
    'maxlength' => 50,
    'disabled' => true,
    'control_name' => 'opordpag[dessnc]',
    )); echo $value ? $value : '&nbsp;' ?>
    </div>
      
  <br>
  <?php echo label_for('opordpag[fecini]', __($labels['opordpag{fecini}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecini}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{fecini}')): ?> <?php echo form_error('opordpag{fecini}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_date_tag($opordpag, 'getFecini', array (
      'rich' => true,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'opordpag[fecini]',
      'date_format' => 'dd/MM/yyyy',
      'maxlength' => 10,
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",
      )); echo $value ? $value : '&nbsp;' ?>
  </div>
  
  <br>
  <?php echo label_for('opordpag[fecfin]', __($labels['opordpag{fecfin}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecfin}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{fecfin}')): ?> <?php echo form_error('opordpag{fecfin}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_date_tag($opordpag, 'getFecfin', array (
      'rich' => true,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'opordpag[fecfin]',
      'date_format' => 'dd/MM/yyyy',
      'maxlength' => 10,
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",
      )); echo $value ? $value : '&nbsp;' ?>
  </div>  
  
      <br>
      <?php echo label_for('opordpag[medcom]', __($labels['opordpag{medcom}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{medcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{medcom}')): ?>
    <?php echo form_error('opordpag{medcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('opordpag[medcom]', options_for_select(array('I' => 'Invitación', 'P' => 'Prensa'),$opordpag->getMedcom(),'include_custom=Seleccione')) ?>
  </div>
      <br>
      <?php echo label_for('opordpag[modcon]', __($labels['opordpag{modcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{modcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{modcon}')): ?>
    <?php echo form_error('opordpag{modcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('opordpag[modcon]', options_for_select(Constantes::listaContrataciones(),$opordpag->getModcon(),'include_custom=Seleccione')) ?>
  </div>  
  <br>

  <?php echo label_for('opordpag[lugeje]', __($labels['opordpag{lugeje}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{lugeje}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{lugeje}')): ?> <?php echo form_error('opordpag{lugeje}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?> <?php $value = object_input_tag($opordpag, 'getLugeje', array (
    'size' => 16,
    'maxlength' => 16,
    'control_name' => 'opordpag[lugeje]',
    )); echo $value ? $value : '&nbsp;' ?>
  </div>
  <br>
  <? echo grid_tag($obj7);?>
  
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage7", 'Carta Aval');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row" id="datcarava">
<?php echo label_for('opordpag[refava]', __($labels['opordpag{refava}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{refava}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{refava}')): ?>
    <?php echo form_error('opordpag{refava}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getRefava', array (
  'size' => 25,
  'control_name' => 'opordpag[refava]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opordpag[fecava]', __($labels['opordpag{fecava}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecava}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecava}')): ?>
    <?php echo form_error('opordpag{fecava}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecava', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecava]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opordpag[nompacava]', __($labels['opordpag{nompacava}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{nompacava}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{nompacava}')): ?>
    <?php echo form_error('opordpag{nompacava}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getNompacava', array (
  'size' => 80,
  'control_name' => 'opordpag[nompacava]',
  'maxlength' => 200,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opordpag[cedpacava]', __($labels['opordpag{cedpacava}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{cedpacava}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{cedpacava}')): ?>
    <?php echo form_error('opordpag{cedpacava}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCedpacava', array (
  'size' => 20,
  'control_name' => 'opordpag[cedpacava]',
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opordpag[motsolava]', __($labels['opordpag{motsolava}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{motsolava}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{motsolava}')): ?>
    <?php echo form_error('opordpag{motsolava}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($opordpag, 'getMotsolava', array (
  'control_name' => 'opordpag[motsolava]',
  'size' => '80x5',
  'maxlength' => 500,
  'onkeyup' => 'javascript:return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('opordpag[moncarava]', __($labels['opordpag{moncarava}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{moncarava}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{moncarava}')): ?>
    <?php echo form_error('opordpag{moncarava}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, array('getMoncarava',true), array (
  'size' => 7,
  'control_name' => 'opordpag[moncarava]',
  'onBlur' => "javascript:event.keyCode=13; return entermontootro(event, this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabInit('tp1','0'); ?>

<?php include_partial('edit_actions', array('opordpag' => $opordpag)) ?>
</form>

<ul class="sf_admin_actions">
<li class="float-rigth">
<?php if ($opordpag->getId() && $opordpag->getStatus()!='A' && (!H::ComprobanteAnulado($opordpag->getNumcom())) && H::Puede_Eliminar($sf_user->getAttribute('loguse'),$sf_context->getModuleName(),$sf_user->getAttribute('empresa')) ) {?>
  <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
<?php }?>
</li>
<li class="float-rigth">
<?php if ($opordpag->getId() && $opordpag->getStatus()!='A' && $oculeli!='S'  && (!H::ComprobanteAnulado($opordpag->getNumcom())) && H::Puede_Eliminar($sf_user->getAttribute('loguse'),$sf_context->getModuleName(),$sf_user->getAttribute('empresa'))): ?>
  <input id="eliminarboton" type="button" name="Submit2" value="Eliminar" class="sf_admin_action_delete" onclick="javascript:eliminar();"/>
<?php endif; ?>
</li>
</ul>
<?php
  $pdfparform="n";

  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';

  $configyml = sfYaml::load($dirrepconfig);

  if(is_array($configyml)){
    if(array_key_exists('tesoreria',$configyml)) {
       if(array_key_exists('tsrvoucher',$configyml['tesoreria'])) {  
          if(array_key_exists('parameterform',$configyml['tesoreria']["tsrvoucher"])) 
            $pdfparform = $configyml["tesoreria"]["tsrvoucher"]["parameterform"];
       }
    }      
  }

?>
<?php 
   $pdfjasper="N";
   $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
   $configyml = sfYaml::load($dirrepconfig);
   if(is_array($configyml)){
     if(array_key_exists('tesoreria',$configyml)) {
       if(array_key_exists('pagemiord',$configyml['tesoreria'])) {     
         if(array_key_exists('parameterjasper',$configyml['tesoreria']["pagemiord"])) 
           $pdfjasper= $configyml["tesoreria"]["pagemiord"]["parameterjasper"];
      }
    }
  }
 ?>
<script type="text/javascript">
var nuevo='<?php echo $opordpag->getId()?>';
    if (nuevo=='')
    {
     var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('opordpag_numord').value='########';
     	$('opordpag_numord').readOnly=true;
        if ($('opordpag_tipcau').value=='') {$('opordpag_tipcau').focus(); }
     }else{
      $('opordpag_numord').focus();
     }
     var deshcta='<?php echo $opordpag->getCuendesh();?>';
    if (deshcta)
    {
       $('opordpag_ctapag').readOnly=true;
         $$('.botoncat')[2].disabled=true;
    }
    var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
    if (valor!="")
    {
        calculo=toFloat2(valor);
        var num2=toFloat('opordpag_valmon');
        if (num2==0)
           $('opordpag_valmon').value=format(calculo.toFixed(6),'.',',','.');
    }
     $('tab5').hide();  
     $('datcarava').hide();  

    }else {
       var orddea='<?php echo H::getX_vacio('CODEMP','Opdefemp','Ordant','001'); ?>';
       var orddeacom='<?php echo H::getX_vacio('CODEMP','Opdefemp','Ordantcom','001'); ?>';
       var opsincom411='<?php echo H::getConfApp2('opsincom411', 'tesoreria', 'pagemiord'); ?>';
        if (opsincom411=='S') {
          if ((orddea!='' && orddea!=$('opordpag_tipcau').value) && (orddeacom!='' && orddeacom!=$('opordpag_tipcau').value))        
             $('btncomp').show();
          else
            $('btncomp').hide();
        }

        var mancarava='<?php echo H::getConfApp2('mancarava', 'tesoreria', 'pagemiord');?>';
        var ordcarava='<?php echo H::getX_vacio('CODEMP','Opdefemp','Ordcarava','001'); ?>';
      if (mancarava=='S' && ordcarava==$('opordpag_tipcau').value){
        $('tab6').show();  
        $('datcarava').show();  
      }else {
        $('tab6').hide();  
        $('datcarava').hide(); 
      }
    }
  var aplrecop='<?php echo H::getConfApp2('aplrecop', 'tesoreria', 'pagemiord');?>';
  if (aplrecop=='S')
    $('aplrec').show();

  var codbanco='<?php echo $opordpag->getTiecodadi();?>';
  if (codbanco=='S')
    $('adici').show();

  var tienumval='<?php echo $opordpag->getTienumval();?>';
  if (tienumval=='S')
    $('datvaluacion').show();
  

  var tipdesc='<?php echo $opordpag->getTietipodes();?>';
  if (tipdesc=='S')
    $('tipdescuen').show();  

 var mosproy='<?php echo H::getConfApp2('mosproy', 'tesoreria', 'pagemiord');?>';
  if (mosproy=='S')
    $('divcodpro').show();

var ordpagval='<?echo $ordpagval;?>';
var ocubtnret='<?php echo H::getConfApp2('ocubtnret', 'tesoreria', 'pagemiord');?>';
if ($('opordpag_tipcau').value!='' && ($('opordpag_tipcau').value!=$('opnomina').value || $('opordpag_tipcau').value!='OPNN') && ($('opordpag_tipcau').value!=$('opaporte').value || $('opordpag_tipcau').value!='APOR') && ($('opordpag_tipcau').value!=$('opliquidacion').value || $('opordpag_tipcau').value!='LIQU') && ($('opordpag_tipcau').value!=$('opfideicomiso').value || $('opordpag_tipcau').value!='OPFD') && ($('opordpag_tipcau').value!=ordpagval || $('opordpag_tipcau').value!='OPVA') && ocubtnret!='S')
{
  $('botonret').show();
}
mostarq();
actualiza();


var aplico='<?php echo $sf_user->getAttribute('retencion','','pagemiord')?>';
var grabo='<?echo $grabo;?>';
var presiona='<?php echo $numretencion?>';
var genordret='<?php echo $genordret?>';

if (grabo=='S' && presiona>0 && aplico=='S' && genordret=='S')
{
  if(confirm("¿Desea Generar las Órdenes de Pago de las Retenciones?"))
  {
    new Ajax.Updater('genret', '/tesoreria'+getEnv()+'.php/pagemiord/ajaxretenciones', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});
  }
}

function num(e) {
    evt = e ? e : event;
    tcl = (window.Event) ? evt.which : evt.keyCode;
    if ((tcl < 48 || tcl > 57))
    {
        return false;
    }
    return true;
}
  function notas()
  {
   var nuev='<?php echo $opordpag->getId()?>';
   if ($('nota').value!="")
   {
    alert($('nota').value);
    $('nota').value="";
   }
  }

  function actualiza()
  { var id="";
    var id='<?php echo $opordpag->getId()?>';
    if (id!="")
    {
      $('trigger_opordpag_fecemi').hide();
      $('opordpag_nomben').readOnly=true;
     $$('.botoncat')[0].disabled=true;
    $$('.botoncat')[1].disabled=true;
    $$('.botoncat')[2].disabled=true;
    $$('.botoncat')[3].disabled=true;
    $$('.botoncat')[4].disabled=true;
      actualizarsaldos();
      netos();
   }

    var deshab='<?php echo $bloqfec; ?>';
    if (deshab=='S')
    {
    	$('trigger_opordpag_fecemi').hide();
    	$('opordpag_fecemi').readOnly=true;
    }
  }

 function actualizarbenefi()
 {
     if ($('existeben').value=='S')
     {
      $('opordpag_nomben').readOnly=true;
     }
     else
     {
       alert('El Beneficiario no Existe. Ingrese uno nuevo');
       $('opordpag_nomben').value="";
       $('opordpag_ctapag').value="";
       $('opordpag_descta').value="";

       $('opordpag_nomben').readOnly=false;
     }
 }

 function actualizargrid()
 {
   if (($('eliva').value!=0) || ($('elislr').value!=0) || ($('eltimbre')!=0) || ($('elirs').value!=0) || ($('elimn').value!=0))
    {
      $('divFac').show();
       n=0;
       while (n<10)
       {
         var alicuota="bx"+"_"+n+"_11";
         for(i=8;i<=21;i++)
         {
         var campo="bx"+"_"+n+"_"+i;
         if ((i!=11) && (i!=14) && (i!=15))
         {
          if ($(campo).value=="")
          {
            $(campo).value="0,00";
          }
         }

         if (($(alicuota).value="0,00") || ($(alicuota).value=""))
         {
          $(alicuota).value=$('eliva').value;
         }
        }
         n++;
       }
    }
    else { alert('No hay Retenciones que generen comprobante');}

 }

 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('opordpag_numord').value=valor;
     var desh='<?php echo $numdesh; ?>';
     if (desh=='S')
     {
     	$('opordpag_numord').readOnly=true;
     }

   }
 }

 function mostrarcat()
 {
   if ($('opordpag_afectapre').value==0)
   {
     $('opordpag_neto').readOnly=false;
   }

   if($('opordpag_documento').value=='P')
   {
     $('cpprecom').show();
   }else { $('cpcompro').show();}


 }


  function comprobante(formulario)
  {
      window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function consultarComp()
  {
    window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/id/'+document.getElementById("idrefer").value,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function anular()
  {
    if ($('numcom').value!="")
    {
     var referencia="RE"+$('numcom').value.substr(2,6);
    }
    else
    {
     var referencia=$('opordpag_numord').value;
    }
    var numord=$('opordpag_numord').value;
    var fecemi=$('opordpag_fecemi').value;
    var compadic=$('compadicional').value;
    window.open('/tesoreria'+getEnv()+'.php/pagemiord/anular?numord='+numord+'&referencia='+referencia+'&fecemi='+fecemi+'&compadic='+compadic,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=250,resizable=yes,left=400,top=120');
  }


  function eliminar()
  {
  if (confirm("¿Esta seguro de eliminar la Orden de Pago?"))
  {
    var numord=$('opordpag_numord').value.replace('+','*');
    var tipcau=$('opordpag_tipcau').value;
    var compadic=$('compadicional').value;
    var coduni=$('opordpag_coduni').value;

    location.href='/tesoreria'+getEnv()+'.php/pagemiord/ajax?ajax=8&numord='+numord+'&tipcau='+tipcau+'&compadic='+compadic+'&coduni='+coduni;
  }
  }

  function perderfocus(e,id,totcol)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   if (col!=totcol)
   {
    var colsig=col+1;
    var siguiente=name+"_"+fil+"_"+colsig;
   }
   else
   {
    var fila=fil+1;
    var siguiente=name+"_"+fila+"_2";
   }

   if (e.keyCode==13 || e.keyCode==9)
   {
    $(siguiente).focus();
   }
  }

  function mostarq()
  {
  	if ($('opordpag_vacio').value=='1')
  	{
  		$('divFac').show();
  		$('botonfac').hide();
  	}
  }

  function verificar()
 {
  if ($('cargable').value!='C' && $('opordpag_ctapag').value!='')
  {
    alert('La Cuenta Contable no es Cargable, Por favor Cambiela por una Cuenta Cargable');
    $('opordpag_ctapag').value="";
    $('opordpag_descta').value="";
  }
 }

 function retenciones(formulario)
 {
   window.open('/tesoreria'+getEnv()+'.php/pagemiret/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
 }

 function generar()
 {
   var nfil=parseInt($('opordpag_numfilas').value);
   var y=totalregistros('ax',2,nfil);
  if ($('opordpag_cedrif').value=="" || $('opordpag_ctapag').value=="" || y<=0)
  {
    alert('Verique si introdujo los Datos del Beneficiario, el Código Contable y las Imputaciones Presupuestarias, para luego generar el comprobante');
  }
 }

  function validafec()
  {
    if ($('valfec').value=='S')
    {
      alert('La Fecha no se encuentra del Período Fiscal');
      $('casolart_fecreq').value="";
      $('casolart_fecreq').focus();
    }
  }


 function Mostrar_orden_preimpresa()
  {
      f=0;
      i=0;
    /*  var primer_art=$("ax_0_2").value;
      while (f < $('numero_filas_orden').value)
      {
        var campo="ax_"+f+"_2";
        if(!$(campo))
        {
                i=f-1;
                var campo2="ax_"+i+"_2";
                var ultimo_art=$(campo2).value;
            break;
        }
            f++;
      }*/
      if(confirm("¿Desea imprimir la orden Pre-Impresa?"))
      {
            var ordpagdes=$('opordpag_numord').value;
            var ordpaghas=$('opordpag_numord').value;

            var codprodes=$('opordpag_cedrif').value;
            var codprohas=$('opordpag_cedrif').value;

            var tiporddes=$('opordpag_tipcau').value;
            var tipordhas=$('opordpag_tipcau').value;

            //var codartdes=primer_art;
            //var codarthas=ultimo_art;

            var fecorddes=$('opordpag_fecemi').value;
            var fecordhas=$('opordpag_fecemi').value;

            var status='Todas';

          var  ruta='http://'+'<? echo $this->getContext()->getRequest()->getHost();?>';
          var  mostrarjasper='<?php echo $pdfjasper;?>';
          var nombrerep='<?php echo $opordpag->getNomreporte();?>';
          if (nombrerep!='')
          {
            if (mostrarjasper=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=tesoreria&r="+nombrerep+".php&s=<?php echo $sf_user->getAttribute('schema');?>&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
            else
              pagina=ruta+"/<? echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+nombrerep+".php&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
          }else {
            if (mostrarjasper=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=tesoreria&r=oprordpre.php&s=<?php echo $sf_user->getAttribute('schema');?>&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
            else
              pagina=ruta+"/<? echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=oprordpre.php&ordpagdes="+ordpagdes+"&ordpaghas="+ordpaghas;
          }

          window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
      }
  }
  
  function Mostrar_ComprobanteRetencion(tipo,reporte)
  {
    if(confirm("¿Desea imprimir el Comprobante de Retención de "+tipo+"?")){
        var ordpag=$('opordpag_numord').value;
        var ruta='http://'+'<? echo $this->getContext()->getRequest()->getHost();?>';

        pagina=ruta+"/<? echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+reporte+".php&orde="+ordpag;

        window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
    }
  }


  function Mostrar_cheque_preimpreso()
  {
      var  numches='<? echo $opordpag->getNumche();?>';
      var  numcues='<? echo $opordpag->getCtaban();?>';
      var  mosparform='<? echo $pdfparform;?>';
      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
        if (mosparform=='S')
        {
                pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/tsrvoucher.php?numchedes="+numches+"&numchehas="+numches+"&numcuedes="+numcues+"&numcuehas="+numcues;
        }else
        {
                pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r=tsrvoucher.php&numchedes="+numches+"&numchehas="+numches+"&numchehas="+numches+"&numcuedes="+numcues+"&numcuehas="+numcues;
        }
        window.open(pagina,numches,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");

      
  }
function mostrartex(id) { 
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colnom=col+6;
    var nombre=name+"_"+fil+"_"+colnom;
    
    mensaj.innerHTML=$(nombre).value; 
}
function ocultartex() { 
  mensaj.innerHTML="" 
}


 </script>
