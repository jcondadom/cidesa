

<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 42548 2011-02-16 08:45:40Z cramirez $
 */
// date: 2007/03/16 17:37:55
?>
<?php echo form_tag('almsolegr/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>
<?php echo object_input_hidden_tag($casolart, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'compras/almsolegr', 'tools') ?>
<?php echo input_hidden_tag('generapre', '') ?>
<?php echo input_hidden_tag('haydesp', $haydespacho) ?>
<?php echo input_hidden_tag('modifi', $modifico) ?>
<?php echo input_hidden_tag('tiporecarg', $tiporec) ?>
<?php echo object_input_hidden_tag($casolart, 'getPrecom') ?>
<?php echo input_hidden_tag('casolart[claartdes]', $casolart->getClaartdes()) ?>
<?php echo input_hidden_tag('casolart[finpre]', $casolart->getFinpre()) ?>
<?php echo input_hidden_tag('casolart[manunialt]', $casolart->getManunialt()) ?>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $casolart->getEtiqueta() ;?></font></strong></th>
  </tr>
</table>
<fieldset id="sf_fieldset_none" class="">
<h2>
<?php if ($cambiareti=="") {?>
<?php echo __('Solicitud de Egreso') ?>
<?php }else {?>
<?php echo __($nometifor) ?>
<?php }?>
</h2>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('casolart[reqart]', __($labels['casolart{reqart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{reqart}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{reqart}')): ?>
    <?php echo form_error('casolart{reqart}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getReqart', array (
  'size' => 8,
  'maxlength' => 8,
  'readonly'  =>  $casolart->getId()!='' ? true : false ,
  'control_name' => 'casolart[reqart]',
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('casolart_fecreq').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enters(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('casolart[fecreq]', __($labels['casolart{fecreq}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{fecreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{fecreq}')): ?>
    <?php echo form_error('casolart{fecreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($casolart, 'getFecreq', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'size' => '10',
  'control_name' => 'casolart[fecreq]',
  'date_format' => 'dd/MM/yy',
  'readonly'  =>  $casolart->getId()!='' ? true : false ,
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json), validafec()',
        'condition' => "$('casolart_fecreq').value != '' && $('id').value == ''",
        'with' => "'ajax=7&codigo='+this.value"
        ))
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>

<?php echo input_hidden_tag('valfec', '') ?><?php echo input_hidden_tag('valfec2', '') ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('casolart[tipmon]', __($labels['casolart{tipmon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{tipmon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{tipmon}')): ?>
    <?php echo form_error('casolart{tipmon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
      <?php if ($casolart->getTipmon()=='') $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); else $var=$casolart->getTipmon();?>
  <?php echo select_tag('casolart[tipmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
  'onChange' => remote_function(array(
   'url'      => sfContext::getInstance()->getModuleName().'/ajax',
   'complete' => 'AjaxJSON(request, json)',
   'with' => "'ajax=12&cajtexmos=casolart_valmon&nuevo='+$('id').value+'&valmone='+$('casolart_valmon').value+'&variable=$var&codigo='+this.value"
      ))      
  )) ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>
        <?php echo label_for('casolart[valmon]', __($labels['casolart{valmon}']), 'class="required"') ?>
          <div class="content<?php if ($sf_request->hasError('casolart{valmon}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('casolart{valmon}')): ?>
            <?php echo form_error('casolart{valmon}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>             

           <?php $value = object_input_tag($casolart, array('getValmon',true), array (
            'size' => 15,
            'control_name' => 'casolart[valmon]',
            'readonly'  =>  $casolart->getId()!='' ? true : false ,
            'onBlur' => "javascript:event.keyCode=13; return entermontodecimal(event, this.id,6)",
          )); echo $value ? $value : '&nbsp;' ?>
            </div>
        </th>
   </tr>
  </table>

    <table >
        <tr style="display:<?php if($casolart->getId()=='' && $sf_user->getAttribute('prebas')=='S' || H::getConfApp2('refprebas', 'compras', 'almsolegr') == 'S') echo ''; else echo 'none';?>">
  <th>
      <?php echo label_for('casolart[refpre]', __($labels['casolart{refpre}']), 'class="required" style="width: 150px"') ?>
      <div class="content<?php if ($sf_request->hasError('casolart{refpre}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('casolart{refpre}')): ?>
        <?php echo form_error('casolart{refpre}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_checkbox_tag($casolart, 'getRefpre', array (
      'control_name' => 'casolart[refpre]',
        'onClick' => 'MostratCatalogo(this.id)',
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
  </th>
  <th id="divprebas" style="<?php if($casolart->getPrebas()!='') echo ''; else echo 'display:none'; ?>">
      <?php echo label_for('casolart[prebas]', __($labels['casolart{prebas}']), 'class="required" style="width: 150px"') ?>
      <div class="content<?php if ($sf_request->hasError('casolart{prebas}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('casolart{prebas}')): ?>
        <?php echo form_error('casolart{prebas}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($casolart, 'getPrebas', array (
      'control_name' => 'casolart[prebas]',
       'onBlur'=> remote_function(array(
        'update'  =>  'gridreq',
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('casolart_fecreq').value != '' && $('id').value == ''",
        'with' => "'ajax=11&codigo='+this.value"))
    )); echo $value ? $value : '&nbsp;' ?>
        <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/liprebas_reqart/clase/liprebas/frame/sf_admin_edit_form/obj1/casolart_prebas/campo1/numpre','','','buttoncat')?>
        </div>

  </th>
  </tr>

    </table>
<br>

  <?php if(H::getConfApp2('moscodpro', 'compras', 'almsolegr')=='S') : ?>
        <?php echo label_for('casolart[codpro]', __($labels['casolart{codpro}']), 'class="required" style="width: 150px"') ?>
        <div class="content<?php if ($sf_request->hasError('casolart{codpro}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('casolart{codpro}')): ?>
          <?php echo form_error('casolart{codpro}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>

        <?php $value = object_input_tag($casolart, 'getCodpro', array (
        'control_name' => 'casolart[codpro]'
      )); echo $value ? $value : '&nbsp;' ?>
      <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Caprovee_Almordcom/clase/Caprovee/frame/sf_admin_edit_form/obj1/casolart_codpro/obj2/casolart_nompro/campo1/rifpro/campo2/nompro",'','','botoncat')?>        
      <?php $value = object_input_tag($casolart, 'getNompro', array (
        'size' => 70,
        'control_name' => 'casolart[nompro]',
        )); echo $value ? $value : '&nbsp;' ?>
      <div class="sf_admin_edit_help"></div>
    </div>
  <?php endif; ?>


<br>

  <?php echo label_for('casolart[desreq]', __($labels['casolart{desreq}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{desreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{desreq}')): ?>
    <?php echo form_error('casolart{desreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getDesreq', array (
  'size' => '80x2',
  'maxlength' => 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'casolart[desreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <table>
   <tr>
    <th><?php echo label_for('casolart[monreq]', __($labels['casolart{monreq}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{monreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{monreq}')): ?>
    <?php echo form_error('casolart{monreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getMonreq', array (
  'size' => 15,
  'readonly' => true,
  'control_name' => 'casolart[monreq]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('casolart[unires]', __($labels['casolart{unires}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{unires}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{unires}')): ?>
    <?php echo form_error('casolart{unires}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getUnires', array (
  'size' => $loncat,
  'maxlength' => $loncat,
  'control_name' => 'casolart[unires]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaracategoria')",
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('casolart_unires').value != '' && $('id').value == ''",
        'with' => "'ajax=1&cajtexmos=casolart_nomcat&cajtexcom=casolart_unires&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
</div></th>
<th>&nbsp;</th>
<th>
<?php if ($catbnubica!='S') {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npcatpre_Almsolegr/clase/Npcatpre/frame/sf_admin_edit_form/obj1/casolart_unires/obj2/casolart_nomcat/campo1/codcat/campo2/nomcat/param1/'.$loncat.'/param2/almsolegr','','','botoncat')?>
<?php } else  {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/casolart_unires/obj2/casolart_nomcat/campo1/codubi/campo2/desubi/param1/'.$loncat)?>
<?php } ?>

    </th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php $value = object_input_tag($casolart, 'getNomcat', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[nomcat]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
   <th>
   <?php echo label_for('casolart[tipreq]', __($labels['casolart{tipreq}']), 'class="required" style="width:50px"') ?>
    <?php if ($casolart->getTipreq()=='') $vartipreq='C'; else $vartipreq=$casolart->getTipreq();?>
   <?php echo select_tag('casolart[tipreq]', options_for_select($listatipo,$vartipreq, 'include_custom=Seleccione Uno')); ?></th>
   <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th> <?php echo label_for('casolart[tipfin]', __($labels['casolart{tipfin}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{tipfin}')): ?>
    <?php echo form_error('casolart{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getTipfin', array (
      'size' => 4,
      'maxlength' => 4,
      'control_name' => 'casolart[tipfin]',
      'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('casolart_tipfin').value != '' && $('id').value == ''",
        'with' => "'ajax=2&cajtexmos=casolart_nomext&cajtexcom=casolart_tipfin&codpre1='+$('ax_0_6').value+'&codigo='+this.value"))
    )); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...',"/metodo/Fortipfin_Almsolegr/clase/Fortipfin/frame/sf_admin_edit_form/obj1/casolart_tipfin/obj2/casolart_nomext/campo1/codfin/campo2/nomext/param1/'+$('ax_0_6').value+'")?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($casolart, 'getNomext', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[nomext]',
)); echo $value ? $value : '&nbsp;' ?></th>
<th><?php if ($casolart->getId()!="" && $precompromete=='S' && $autorizaprecom=='S' && $casolart->getPrecom()=='N' && $casolart->getAprobpresu()!='S') { ?>
<?php echo button_to(__('Generar Precompromiso'), 'almsolegr/generarcompromiso?id='.$casolart->getId()) ?>
   <? }?></th>
      <th>&nbsp;&nbsp;&nbsp;</th>
   <th>
     <?php if ($casolart->getId()!='') { ?>
  <input type="button" name="Submit" class="sf_admin_action_list" value="      Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>
   </th>
   </tr>
  </table>

<br>
<div id="centrocosto">
<table>
    <tr>
   <th> <?php echo label_for('casolart[codcen]', __($labels['casolart{codcen}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{codcen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{codcen}')): ?>
    <?php echo form_error('casolart{codcen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getCodcen', array (
  'size' => 10,
  'maxlength' => 32,
  'control_name' => 'casolart[codcen]',
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
         'condition' => "$('casolart_codcen').value != ''",
         'script' => true,
        'with' => "'ajax=10&cajtexmos=casolart_descen&cajtexcom=casolart_codcen&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...',"/metodo/Cadefcen_Almsolegr2/clase/Cadefcen/frame/sf_admin_edit_form/obj1/casolart_codcen/obj2/casolart_descen/campo1/codcen/campo2/descen/param1/'+$('casolart_unires').value+'")?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($casolart, 'getDescen', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[descen]',
)); echo $value ? $value : '&nbsp;' ?></th>
    </tr>

</table>
</div>
<br>
<div id="eventos" style="display:none">
<table>
    <tr>
   <th> <?php echo label_for('casolart[codeve]', __($labels['casolart{codeve}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{codeve}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{codeve}')): ?>
    <?php echo form_error('casolart{codeve}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getCodeve', array (
  'size' => 10,
  'maxlength' => 6,
  'control_name' => 'casolart[codeve]',
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
         'condition' => "$('casolart_codeve').value != ''",
         'script' => true,
        'with' => "'ajax=15&cajtexmos=casolart_deseve&cajtexcom=casolart_codeve&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...',"/metodo/Preprecom_Cpevepre/clase/Cpevepre/frame/sf_admin_edit_form/obj1/casolart_codeve/obj2/casolart_deseve/campo1/codeve/campo2/deseve")?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($casolart, 'getDeseve', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[deseve]',
)); echo $value ? $value : '&nbsp;' ?></th>
    </tr>
</table>
</div>
<br>
<div id="divcoddirec" style="display:none">
<table>
    <tr>
   <th> <?php echo label_for('casolart[coddirec]', __($labels['casolart{coddirec}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{coddirec}')): ?>
    <?php echo form_error('casolart{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getCoddirec', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'casolart[coddirec]',
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
         'condition' => "$('casolart_coddirec').value != ''",
         'script' => true,
        'with' => "'ajax=16&cajtexmos=casolart_desdirec&unires='+$('casolart_unires').value+'&cajtexcom=casolart_coddirec&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...',"/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/casolart_coddirec/obj2/casolart_desdirec/campo1/coddirec/campo2/desdirec")?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($casolart, 'getDesdirec', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[desdirec]',
)); echo $value ? $value : '&nbsp;' ?></th>
    </tr>
</table>
</div>
<br>
<div id="divcoddivi" style="display:none">
<table>
    <tr>
   <th> <?php echo label_for('casolart[coddivi]', __($labels['casolart{coddivi}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{coddivi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{coddivi}')): ?>
    <?php echo form_error('casolart{coddivi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getCoddivi', array (
  'size' => 10,
  'maxlength' => 6,
  'control_name' => 'casolart[coddivi]',
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
         'condition' => "$('casolart_coddivi').value != ''",
         'script' => true,
        'with' => "'ajax=17&cajtexmos=casolart_desdivi&coddirec='+$('casolart_coddirec').value+'&cajtexcom=casolart_coddivi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...',"/metodo/Cadefdivi_Almordcom/clase/Cadefdivi/frame/sf_admin_edit_form/obj1/casolart_coddivi/obj2/casolart_desdivi/campo1/coddivi/campo2/desdivi/param1/'+$('casolart_coddirec').value+'")?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($casolart, 'getDesdivi', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[desdivi]',
)); echo $value ? $value : '&nbsp;' ?></th>
    </tr>
</table>
</div>
<br>
<div id="divcodubi" style="display:none">
<table>
    <tr>
   <th>
<?php echo label_for('casolart[codubi]', __($labels['casolart{codubi}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{codubi}')): ?>
    <?php echo form_error('casolart{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $mascaraubi = H::ObtenerFormato('Opdefemp','Forubi');
    $lonubi=strlen($mascaraubi);?>
<?php $value = object_input_tag($casolart, 'getCodubi', array (
  'size' => 32,
  'maxlength' => $lonubi,
  'control_name' => 'casolart[codubi]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'condition' => "$('casolart_codubi').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=18&cajtexmos=casolart_desubi&cajtexcom=casolart_codubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
    <th><?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubica_PagemiordNew/clase/Bnubica/frame/sf_admin_edit_form/obj1/casolart_codubi/obj2/casolart_desubi/campo1/codubi/campo2/desubi/param1/'.$lonubi,'','','botoncat')?></th>
    <th> <?php $value = object_input_tag($casolart, 'getDesubi', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'casolart[desubi]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>
</div>
<br>
<table>
    <tr>
   <th> <?php echo label_for('casolart[codreg]', __($labels['casolart{codreg}']), 'class="required" style="width:100px') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{codreg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{codreg}')): ?>
    <?php echo form_error('casolart{codreg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getCodreg', array (
  'size' => 10,
  'maxlength' => 4,
  'control_name' => 'casolart[codreg]',
  'onBlur'=> remote_function(array(
        'url'      => 'almsolegr/ajax',
        'complete' => 'AjaxJSON(request, json)',
         'condition' => "$('casolart_codreg').value != ''",
         'script' => true,
        'with' => "'ajax=19&cajtexmos=casolart_nomreg&cajtexcom=casolart_codreg&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  </div></th>
<th>
&nbsp;</th>
<th>
<?php echo  button_to_popup_('...',"/metodo/Casolart_Caregiones/clase/Caregiones/frame/sf_admin_edit_form/obj1/casolart_codreg/obj2/casolart_nomreg/campo1/codreg/campo2/nomreg")?>
    </th>
   <th>&nbsp;&nbsp;&nbsp;</th>
   <th>  <?php $value = object_input_tag($casolart, 'getNomreg', array (
  'size' => 50,
  'disabled' => true,
  'control_name' => 'casolart[nomreg]',
)); echo $value ? $value : '&nbsp;' ?></th>
    </tr>

</table>

<?php echo label_for('casolart[numproc]', __($labels['casolart{numproc}']), 'class="required"') ?>
<div class="content<?php if ($sf_request->hasError('casolart{numproc}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('casolart{numproc}')): ?> <?php echo form_error('casolart{numproc}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($casolart, 'getNumproc', array (
'size' => 20,
'maxlength'  =>  30,
'control_name' => 'casolart[numproc]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<div id="divlugent" style="display:none">
<br>

  <?php echo label_for('casolart[lugent]', __($labels['casolart{lugent}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{lugent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{lugent}')): ?>
    <?php echo form_error('casolart{lugent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getLugent', array (
  'control_name' => 'casolart[lugent]',
  'size' => '80x3',
  'maxlength' => 2500,
  'onkeyup' => 'return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Detalle Solicitud');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<div id="recargos" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
 echo input_hidden_tag('totartsinrec', '0');
 echo input_hidden_tag('actualfila', '0');
?>
<div id="grid_recargo">
<?
echo grid_tag_v2($obj2);
?>
</div>
<div align="center">
<table>
<tr>
<th>
<?php echo label_for('',__('Total') , 'class="required" Style="width:100px"') ?>
<?php echo input_tag('totrecar','0,0000', 'size=15 class=grid_txtright readonly=true') ?>
</th>
</tr>
</table>
</div>


<div align="right">
<?php if ($modifico=='S'){ ?>
<?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontorecargos()")?>
<?php }
else
{?>
 <?php echo link_to_function(image_tag('/images/salir.gif'), "$('recargos').hide();")?>
<?php }?>
</div>
</div>
</fieldset>
</div>

<!--
<ul class="sf_admin_actions">
<li class="float-rigth">
<input type="button" name="Submit" value="Recargos" onClick="javascript:$('recargos').toggle();"/>
</li>
</ul>Boton para aplicar recargos(llama al div recargos) -->
<?php if ($modifico=='S'){ ?>
<div align="left" id="botonesmarcar">
<table>
<tr>
<th>
<input type="button" name="Submit" value="Marcar" onClick="marcarTodo();"/>
</th>
<th>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</th>
<th>
<input type="button" name="Submit" value="Desmarcar" onClick="desmarcarTodo();"/>
</th>
</tr>
</table>
</div>
<?php } else {?>
<div align="left" id="botonesmarcar">
</div>
	<?php } ?>
<div id="gridreq">
<?
echo grid_tag_v2($obj);
?>
</div>
<?php echo input_hidden_tag('totmarcadas', '0,00') ?>

</div>
</fieldset>
<?php if ($casolart->getIndetiqueta()=='S') {
        tabPageOpenClose("tp1", "tabPage2", 'Justificación');

    }else{
        tabPageOpenClose("tp1", "tabPage2", 'Motivo');
    }?>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('casolart{motreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{motreq}')): ?>
    <?php echo form_error('casolart{motreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getMotreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'casolart[motreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php if ($casolart->getCampest()=='S') 
  tabPageOpenClose("tp1", "tabPage3", 'Funcionario Responsable');
  else
    tabPageOpenClose("tp1", "tabPage3", 'Beneficio');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('casolart{benreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{benreq}')): ?>
    <?php echo form_error('casolart{benreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getBenreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'casolart[benreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
   </div>
</fieldset>

<?php if ($casolart->getCampest()=='S') 
    tabPageOpenClose("tp1", "tabPage4", 'Lugar  de Entrega');
   else
    tabPageOpenClose("tp1", "tabPage4", 'Observaciones');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('casolart{obsreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{obsreq}')): ?>
    <?php echo form_error('casolart{obsreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($casolart, 'getObsreq', array (
  'size' => '80x5',
  'maxlength' => 1000,
  'control_name' => 'casolart[obsreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
<?php tabPageOpenClose("tp1", "tabPage6", 'Razon de Compra');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?
echo grid_tag_v2($obj3);
?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage7", 'Otros Datos');?>
<fieldset id="sf_fieldset_none_dat" class="">
<div class="form-row">
  <?php echo label_for('casolart[nomben]', __($labels['casolart{nomben}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{nomben}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{nomben}')): ?>
    <?php echo form_error('casolart{nomben}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getNomben', array (
  'size' => 80,
  'maxlength' => 250,
  'control_name' => 'casolart[nomben]',
)); echo $value ? $value : '&nbsp;' ?>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Casolart/clase/Opbenefi/frame/sf_admin_edit_form/obj1/casolart_nomben/campo1/nomben','','','buttoncat')?>
    </div>
<br><br>
  <?php echo label_for('casolart[cedrif]', __($labels['casolart{cedrif}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{cedrif}')): ?>
    <?php echo form_error('casolart{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getCedrif', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'casolart[cedrif]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('casolart[fecsal]', __($labels['casolart{fecsal}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{fecsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{fecsal}')): ?>
    <?php echo form_error('casolart{fecsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($casolart, 'getFecsal', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'casolart[fecsal]',
  'size' => 15,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('casolart[horsal]', __($labels['casolart{horsal}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{horsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{horsal}')): ?>
    <?php echo form_error('casolart{horsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getHorsal', array (
  'size' => 20,
  'maxlength' => 10,
  'control_name' => 'casolart[horsal]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('casolart[fecreg]', __($labels['casolart{fecreg}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{fecreg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{fecreg}')): ?>
    <?php echo form_error('casolart{fecreg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($casolart, 'getFecreg', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'casolart[fecreg]',
  'size' => 15,
  'maxlength' => 10,
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('casolart[horreg]', __($labels['casolart{horreg}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('casolart{horreg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('casolart{horreg}')): ?>
    <?php echo form_error('casolart{horreg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($casolart, 'getHorreg', array (
  'size' => 20,
  'maxlength' => 10,
  'control_name' => 'casolart[horreg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<?php tabInit("tp1", "0");?>
<?php $manevento=H::getConfApp2('manevento', 'compras', 'almsolegr');
$oculcencos=H::getConfApp2('oculcencos', 'compras', 'almsolegr');?>

<?php include_partial('edit_actions', array('casolart' => $casolart)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-right">
      <?php if ($oculeli!="S"): ?>
      <?php if ($casolart->getId() && $haydespacho!='S' && $cotiz!='S' && $casolart->getStareq()!='N'): ?>
<?php echo button_to(__('delete'), 'almsolegr/delete?id='.$casolart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
  'onclick' => 'elimin()',
)) ?><?php endif; ?> <?php endif; ?>
</li>
<li>
<div id="anul" style="display:none">
<input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
</div>
</li
  </ul>
<?
  $pdfjasper="N";
  $dirrepconfig = $sf_user->getAttribute('reportes').'reportes/config.yml';
  $configyml = sfYaml::load($dirrepconfig);

  if(is_array($configyml)){
    if(array_key_exists('compras',$configyml)){
      if(array_key_exists('carsolegrpre',$configyml["compras"])){
        if(array_key_exists('parameterjasper',$configyml["compras"]["carsolegrpre"])){
          $pdfjasper = $configyml["compras"]["carsolegrpre"]["parameterjasper"];
        }
      }
    }
  }

?>
<script language="JavaScript" type="text/javascript">
  var ids='<?php echo $casolart->getId()?>';
  var deshab='<?php echo $bloqfec; ?>';
  var tipo='<?php echo $casolart->getTipof()?>';
  var manevento='<?php echo $manevento?>';
  var oculcencos='<?php echo $oculcencos?>';
  if(tipo !='' && ids==''){
      $('casolart_tipfin').value=tipo;
      $('casolart_tipfin').focus();
      $('casolart_reqart').focus();
      //new Ajax.Request('/compras_dev.php/almsolegr/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=2&cajtexmos=casolart_nomext&cajtexcom=casolart_tipfin&codigo='+tipo})
  }
  if (deshab=='S')
  {
  	$('trigger_casolart_fecreq').hide();
  	$('casolart_fecreq').readOnly=true;
  }
  var correla='<?php echo $mansolocor; ?>';
  if (correla=='S' && ids=='')
  {
  	$('casolart_reqart').value='########';
  	$('casolart_reqart').readOnly=true;
  }
  if (manevento=='S')
    $('eventos').show();
  if (oculcencos=='S')
    $('centrocosto').hide();

  $('casolart_reqart').focus();

  var estatus='<?php echo $casolart->getStareq()?>';
  if (ids!="" && $('haydesp').value!='S' && estatus!='N')
  {
    $('anul').show();
  }

  if (ids=='')
  {
      var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
      if (valor!="")
      {
          calculo=toFloat2(valor);
         var num2=toFloat('casolart_valmon');
         if (num2==0)
          $('casolart_valmon').value=format(calculo.toFixed(6),'.',',','.');
      }
  }

    var tienedirdiv='<?php echo $casolart->getTienedirdiv();?>';
  if (tienedirdiv=='S') {
     $('divcoddirec').show();
     $('divcoddivi').show();
     $('casolart_unires').readonly=true;
     $$('.botoncat')[0].disabled=true;
  }

  var tienecodubi='<?php echo H::getConfApp2('moscodubi', 'compras', 'almsolegr');?>';
  if (tienecodubi=='S')
    $('divcodubi').show();

  var tieotrdat='<?php echo H::getConfApp2('tieotrdat', 'compras', 'almsolegr');?>';
  if (tieotrdat!='S') {
    $('sf_fieldset_none_dat').hide();
    $('tab5').hide();
  }

  var moslugent='<?php echo H::getConfApp2('moslugent', 'compras', 'almsolegr');?>';
  if (moslugent=='S')
    $('divlugent').show();


    function enters(e,valor)
  {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else{valor=valor.pad(8, '#',0);}

     $('casolart_reqart').value=valor.toUpperCase();
     var numsoldesh='<?php echo $numsoldesh; ?>';
     if (numsoldesh=='S')
     {
     	$('casolart_reqart').readOnly=true;
     }

   }
  }

  function anular()
  {
    var reqart=$('casolart_reqart').value;
    var fecreq=$('casolart_fecreq').value;
    window.open('/compras_dev.php/almsolegr/anular?reqart='+reqart+'&fecreq='+fecreq,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=400,resizable=yes,left=400,top=120');
  }
  function validargrid(id)
 {
    var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
    var descripcion=name+"_"+fila+"_"+coldes;

	if (razon_repetido(id))
	{
		alert('La Razon de Compra se encuentra repetido');
		$(id).value="";
		$(descripcion).value="";
	}

 }

 function razon_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var razon=$(id).value;

   var razonrepetido=false;
   var am=totalregistros('cx',1,10);
   var i=0;
   while (i<am)
   {
    var codigo="cx"+"_"+i+"_1";

    var razon2=$(codigo).value;

    if (i!=fila)
    {
      if (razon==razon2)
      {
        razonrepetido=true;
        break;
      }
    }
   i++;
   }
   return razonrepetido;
 }

  function recargo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var recargo=$(id).value;

   var recargorepetido=false;
   var am=totalregistros('bx',1,20);
   var i=0;
   while (i<am)
   {
    var codigo="bx"+"_"+i+"_1";

    var recargo2=$(codigo).value;

    if (i!=fila)
    {
      if (recargo==recargo2)
      {
        recargorepetido=true;
        break;
      }
    }
   i++;
   }
   return recargorepetido;
 }

  function validargrid2(id)
 {
    var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes=col+1;
   var colmont=col+4;
    var descripcion=name+"_"+fila+"_"+coldes;
    var monto=name+"_"+fila+"_"+colmont;

	if (recargo_repetido(id))
	{
		alert('El Recargo  se encuentra repetido');
		$(id).value="";
		$(descripcion).value="";
		$(monto).value="0,00";
	}

 }

 function totalregistros(letra,posicion,filas)
  {
    var fil=0;
    var total=0;
    while (fil<filas)
    {
      var chk=letra+"_"+fil+"_"+posicion;
      if ($(chk).value!="")
      { total=total + 1; }
     fil++;
    }
    return total;
  }

  function ajax(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var descripcion=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {

    new Ajax.Request('/compras_dev.php/almsolegr/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json), validargrid(id); }, parameters:'ajax=5&cajtexmos='+descripcion+'&cajtexcom='+id+'&codigo='+cod})
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
     if($(siguiente))
     {
      if (!$(siguiente).readOnly) $(siguiente).focus();
     }
   }
  }

  function validafec()
  {
    if ($('valfec2').value=='S')
  	{
  	  alert('La Fecha no se encuentra del Período Fiscal');
  	  $('casolart_fecreq').value="";
  	  $('casolart_fecreq').focus();
  	}
  	else if ($('valfec').value=='S')
  	{
  	  alert('La Fecha se encuentra dentro un Período Cerrado');
  	  $('casolart_fecreq').value="";
  	  $('casolart_fecreq').focus();
  	}
  }

  function Mostrar_orden_preimpresa()
  {
          var codreqdes=$('casolart_reqart').value;
          var codreqhas=$('casolart_reqart').value;
          var fecreq=$('casolart_fecreq').value;
          var  mostrarjasper='<?php echo $pdfjasper;?>';
          var nombrerep='<?php echo $casolart->getNomreporte(); ?>';
          var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';

          if (nombrerep!='') {
            if (mostrarjasper=='S') 
              pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=compras&r="+nombrerep+"&s=<?php echo $sf_user->getAttribute('schema');?>&codreqdes="+codreqdes+"&codreqhas="+codreqhas+"&fecreqmin="+fecreq+"&fecreqmax="+fecreq;
            else
              pagina=ruta+"/reportes/reportes/compras/r.php=?r="+nombrerep+".php&codreqdes="+codreqdes+"&codreqhas="+codreqhas;
        }else{
           if (mostrarjasper=='S') 
            pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/jasper.php?m=compras&r=carsolegrpre.php&s=<?php echo $sf_user->getAttribute('schema');?>&codreqdes="+codreqdes+"&codreqhas="+codreqhas+"&fecreqmin="+fecreq+"&fecreqmax="+fecreq;
          else
            pagina=ruta+"/reportes/reportes/compras/r.php?r=carsolegrpre.php&codreqdes="+codreqdes+"&codreqhas="+codreqhas;
        }
        
        window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")
  }

  function MostratCatalogo(id)
  {
      if($(id).checked==true)
        $('divprebas').show();
      else
        $('divprebas').hide();
  }
</script>
