<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 42532 2011-02-15 15:27:14Z cramirez $
 */
// date: 2007/06/12 16:56:51
?>
<?php echo form_tag('almtraalmv2/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Date') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe', 'compras/almtraalmv2') ?>
<?php echo object_input_hidden_tag($catraalm, 'getId') ?>
<?php echo object_input_hidden_tag($catraalm, 'getCedemp') ?>
<?php echo input_hidden_tag('catraalm[statra]', $catraalm->getStatra()) ?>
<?php echo input_hidden_tag('catraalm[estatus]', $catraalm->getStatus()) ?>
<fieldset id="sf_fieldset_none" class="">


<br>
<table width="100%">
    <tr >
        <th width="25%"></th>
        <th width="40%"><strong><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
               <?php echo label_for('', __(''), 'class="required" id="label41" Style="text-align:center; width:200px" ') ?></font></strong></th>
        
   </tr>

</table>
  <div  id="viejo"  align="center">
                <h3 align="center"><?php  echo $catraalm->getMensaje(); ?></h3>
        </div>

<table width="100%">
  <tr>

   <div id="mens">
       
    </div>
       

  </tr>
</table>


   
<div class="form-row">
  <?php echo label_for('catraalm[codtra]', __($labels['catraalm{codtra}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('catraalm{codtra}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('catraalm{codtra}')): ?> <?php echo form_error('catraalm{codtra}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

<?php $value = object_input_tag($catraalm, 'getCodtra', array (
'size' => 15,
'maxlength' => 8,
'readonly'  =>  $catraalm->getId()!='' ? true : false,
'control_name' => 'catraalm[codtra]',
'onBlur'  => "javascript: enter(this.value);",
)); echo $value ? $value : '&nbsp;' ?>
</div>
<div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>
<br>
<?php echo label_for('catraalm[fectra]', __($labels['catraalm{fectra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{fectra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{fectra}')): ?>
    <?php echo form_error('catraalm{fectra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($catraalm, 'getFectra', array (
  'size' => 11,
  'maxlength' => 10,  'rich' => true,
  'readonly'  =>  $catraalm->getId()!='' ? true : false ,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'catraalm[fectra]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('catraalm[destra]', __($labels['catraalm{destra}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{destra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{destra}')): ?>
    <?php echo form_error('catraalm{destra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($catraalm, 'getDestra', array (
  'size' => 80,
  'maxlength' => 255,
  'control_name' => 'catraalm[destra]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('catraalm[almori]', __($labels['catraalm{almori}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{almori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{almori}')): ?>
    <?php echo form_error('catraalm{almori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php echo input_auto_complete_tag('catraalm[almori]', $catraalm->getAlmori(),
  'almtraalmv2/autocomplete?ajax=1',  array('autocomplete' => 'off', 'size' => 10,   'readonly'  =>  $catraalm->getId()!='' ? true : false , 'maxlength' => 6, 'onBlur'=> remote_function(array(
  'url'      => 'almtraalmv2/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'condition' => "$('catraalm_almori').value != '' && $('id').value == ''",
  'with' => "'ajax=1&cajtexmos=catraalm_almaori&cajtexcom=catraalm_almori&codigo='+this.value"
			  ))),
  array('use_style' => 'true')
  )  ?> &nbsp;
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefalm_Almtraalm/clase/Cadefalm/frame/sf_admin_edit_form/obj1/catraalm_almori/obj2/catraalm_almaori/campo1/codalm/campo2/nomalm','','','botoncat')?>
   <?php $value = object_input_tag($catraalm, 'getAlmaori', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'catraalm[almaori]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <?php echo label_for('catraalm[codubiori]', __($labels['catraalm{codubiori}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{codubiori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{codubiori}')): ?>
    <?php echo form_error('catraalm{codubiori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($catraalm, 'getCodubiori', array (
  'size' => 10,
  'maxlength' => $lonubi,
  'control_name' => 'catraalm[codubiori]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'readonly'  =>  $catraalm->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
       'url'      => 'almtraalmv2/ajax',
       'script'   => true,
       'condition' => "$('catraalm_codubiori').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&cajtexmos=catraalm_nomubiori&codalm='+$('catraalm_almori').value+'&origen=O&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
 &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cadefubi_Almdes/clase/Cadefubi/frame/sf_admin_edit_form/obj1/catraalm_codubiori/obj2/catraalm_nomubiori/campo1/codubi/campo2/nomubi/param1/'+$('catraalm_almori').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($catraalm, 'getNomubiori', array (
  'disabled' => true,
   'size' => 60,
  'control_name' => 'catraalm[nomubiori]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
  <?php echo label_for('catraalm[almdes]', __($labels['catraalm{almdes}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{almdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{almdes}')): ?>
    <?php echo form_error('catraalm{almdes}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>
    <?php echo input_auto_complete_tag('catraalm[almdes]', $catraalm->getAlmdes(),
    'almtraalmv2/autocomplete?ajax=1',  array('autocomplete' => 'off', 'size' => 10,   'readonly'  =>  $catraalm->getId()!='' ? true : false , 'maxlength' => 6, 'onBlur'=> remote_function(array(
    'url'      => 'almtraalmv2/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('catraalm_almdes').value != '' && $('id').value == ''",
    'with' => "'ajax=1&cajtexmos=catraalm_almades&cajtexcom=catraalm_almdes&codigo='+this.value"
			  ))),
    array('use_style' => 'true')
    )
    ?> &nbsp;
 <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefalm_Almtraalmdes/clase/Cadefalm/frame/sf_admin_edit_form/obj1/catraalm_almdes/obj2/catraalm_almades/campo1/codalm/campo2/nomalm','','','botoncat')?>

 <?php $value = object_input_tag($catraalm, 'getAlmades', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'catraalm[almades]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <?php echo label_for('catraalm[codubides]', __($labels['catraalm{codubides}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{codubides}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{codubides}')): ?>
    <?php echo form_error('catraalm{codubides}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($catraalm, 'getCodubides', array (
  'size' => 10,
  'maxlength' => $lonubi,
  'control_name' => 'catraalm[codubides]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'readonly'  =>  $catraalm->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
       'url'      => 'almtraalmv2/ajax',
       'script'   => true,
       'condition' => "$('catraalm_codubides').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=2&cajtexmos=catraalm_nomubides&codalm='+$('catraalm_almdes').value+'&origen=D&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
 &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cadefubi_Almdes/clase/Cadefubi/frame/sf_admin_edit_form/obj1/catraalm_codubides/obj2/catraalm_nomubides/campo1/codubi/campo2/nomubi/param1/'+$('catraalm_almdes').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($catraalm, 'getNomubides', array (
  'disabled' => true,
   'size' => 60,
  'control_name' => 'catraalm[nomubides]',
)); echo $value ? $value : '&nbsp;' ?>

        

</div>

<br>


  <?php echo label_for('catraalm[codemptra]', __($labels['catraalm{codemptra}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{codemptra}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{codemptra}')): ?>
    <?php echo form_error('catraalm{codemptra}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($catraalm, 'getCodemptra', array (
  'related_class' => 'Faemptra',
  'control_name' => 'catraalm[codemptra]',
  'include_blank' => true,
  'disabled' => $catraalm->getId() ? true : false,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br><br>

  <?php echo label_for('catraalm[fadefveh_id]', __($labels['catraalm{fadefveh_id}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{fadefveh_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{fadefveh_id}')): ?>
    <?php echo form_error('catraalm{fadefveh_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($catraalm, 'getFadefvehId', array (
  'related_class' => 'Fadefveh',
  'control_name' => 'catraalm[fadefveh_id]',
  'include_blank' => true,
  'disabled' => $catraalm->getId() ? true : false,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('catraalm[fadefcho_id]', __($labels['catraalm{fadefcho_id}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{fadefcho_id}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{fadefcho_id}')): ?>
    <?php echo form_error('catraalm{fadefcho_id}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_select_tag($catraalm, 'getFadefchoId', array (
  'related_class' => 'Fadefcho',
  'control_name' => 'catraalm[fadefcho_id]',
  'include_blank' => true,
  'disabled' => $catraalm->getId() ? true : false,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('catraalm[fecsal]', __($labels['catraalm{fecsal}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{fecsal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{fecsal}')): ?>
    <?php echo form_error('catraalm{fecsal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($catraalm, 'getFecsal', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'catraalm[fecsal]',
  'readonly' => $catraalm->getId() ? true : false,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

<?php if($catraalm->getId()) : ?>

  <?php echo label_for('catraalm[feclle]', __($labels['catraalm{feclle}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('catraalm{feclle}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('catraalm{feclle}')): ?>
    <?php echo form_error('catraalm{feclle}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($catraalm, 'getFeclle', array (
  'rich' => true,
  'withtime' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'catraalm[feclle]',
  'readonly' => $catraalm->getStatra()!='T' ? true : false,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<?php endif; ?>

<br>
 <div id="botonrec" style = "display:none">
<ul class="sf_admin_actions">
<li class="float-rigth">

    <input type="button" name="Submit" value="Recepción" onClick="recepcion();"/>
</li>
</ul>
</div>

<input name="Forma" type="button" value="Forma-Preimpresa" class="sf_admin_action_save" onClick="formapreimpresa()">

<?php echo grid_tag($obj);?>
</div>
</fieldset>

<?php include_partial('edit_actions', array('catraalm' => $catraalm)) ?>

</form>

<ul class="sf_admin_actions">
<li class="float-rigth">
<?php if ($catraalm->getId() && $catraalm->getStatra()!='N') {?>
  <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
<?php }?>
</li>
      <li class="float-left"><?php if ($catraalm->getId()): ?>
<?php echo button_to(__('delete'), 'almtraalmv2/delete?id='.$catraalm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">

    var id='<?php echo $catraalm->getId()?>';

    if (id!="")
    {
      $('trigger_catraalm_fectra').hide();
      $$('.botoncat')[0].disabled=true;
      $$('.botoncat')[1].disabled=true;
      $$('.botoncat')[2].disabled=true;
      $$('.botoncat')[3].disabled=true;
      
      $$('.sf_admin_action_save')[0].hide();
    
     Verificarrecepcion();
      
    }

  var deshab='<?php echo H::getConfApp2('bloqfec', 'compras', 'almtraalm'); ?>';
  if (deshab=='S')
  {
    $('trigger_catraalm_fectra').hide();
    $('catraalm_fectra').readOnly=true;
  }
  
   function formapreimpresa()
  {
      var  codtra='<? echo $catraalm->getCodtra();?>';

      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      
      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/compras/r.php?r=cartraalm.php&codtrades="+codtra+"&codtrahas="+codtra;

      window.open(pagina,codtra,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");      
  }

    function anular()
  {
    var codtra=$('catraalm_codtra').value;
    var fectra=$('catraalm_fectra').value;

    window.open(getUrlModulo()+'anular?codtra='+codtra+'&fectra='+fectra,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=400,resizable=yes,left=400,top=120');
  }
</script>
