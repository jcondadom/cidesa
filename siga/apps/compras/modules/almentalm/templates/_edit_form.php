<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/03/16 16:31:01
?>
<?php echo form_tag('almentalm/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript') ?>
<?php use_helper('Grid') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('SubmitClick') ?>
<?php use_helper('tabs') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'compras/almentalm', 'tools','observe') ?>


<?php echo object_input_hidden_tag($caentalm, 'getId') ?>
<?php echo input_hidden_tag('caentalm[manunialt]', $caentalm->getManunialt()) ?>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php print $caentalm->getEstatus();?></font></strong></th>
  </tr>
</table>
<fieldset id="sf_fieldset_none" class="">
<legend>Entrada</legend>
<div class="form-row">
<table>
<tr>
	<th width="100">
		  <?php echo label_for('caentalm[rcpart]', __($labels['caentalm{rcpart}']), 'class="required" ') ?>
		  <div class="content<?php if ($sf_request->hasError('caentalm{rcpart}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('caentalm{rcpart}')): ?>
		    <?php echo form_error('caentalm{rcpart}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($caentalm, 'getRcpart', array (
		  'size' => 12, 'maxlength' => 8,
		  'onBlur'  => "javascript: valor=this.value; if (valor!=''){ valor=valor.pad(8, '0',0); }else{ valor=valor.pad(8, '#',0); }  $('caentalm_rcpart').value=valor;",
		  'control_name' => 'caentalm[rcpart]',
		   'readonly'  =>  $caentalm->getId()!='' ? true : false,
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
	</th>
	<th width="200"></th>
	<th>
		  <?php echo label_for('caentalm[fecrcp]', __($labels['caentalm{fecrcp}']), 'class="required" style="width: 1px"') ?>
		  <div class="content<?php if ($sf_request->hasError('caentalm{fecrcp}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('caentalm{fecrcp}')): ?>
		    <?php echo form_error('caentalm{fecrcp}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_date_tag($caentalm, 'getFecrcp', array (
		  'rich' => true,
		  'calendar_button_img' => '/sf/sf_admin/images/date.png',
		  'control_name' => 'caentalm[fecrcp]',
		  'date_format' => 'dd/MM/yyyy',
		  'readonly'  =>  $caentalm->getId()!='' ? true : false,
		  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
		),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
		   </div>
	</th>
</tr>
</table>
<br>
  <?php echo label_for('caentalm[codpro]', __($labels['caentalm{codpro}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{codpro}')): ?>
    <?php echo form_error('caentalm{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_auto_complete_tag('caentalm[codpro]', $caentalm->getRifpro(),
    'almentalm/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 20,  'readonly'  =>  $caentalm->getId()!='' ? true : false , 'onBlur'=> remote_function(array(
			  'url'      => 'almentalm/ajax',
			  'condition' => "$('caentalm_codpro').value != '' && $('id').value == ''",
			  'complete' => 'AjaxJSON(request, json)',
  			  'with' => "'ajax=2&cajtexmos=caentalm_nompro&cajtexcom=caentalm_codpro&codigo='+this.value"
			  ))),
     array('use_style' => 'true'))?>
     &nbsp;
<?php  $modulo=sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');
if ($modulo=='facturacion')
   echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Rifcli_Fapedido/clase/Facliente/frame/sf_admin_edit_form/obj1/caentalm_codpro/obj2/caentalm_nompro/obj3/caentalm_rifpro/campo1/codpro/campo2/nompro/campo3/rifpro','','','botoncat');
else
   echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Caprovee_Almentalm/clase/Caprovee/frame/sf_admin_edit_form/obj1/caentalm_codpro/obj2/caentalm_nompro/obj3/caentalm_rifpro/campo1/codpro/campo2/nompro/campo3/rifpro','','','botoncat');
?>

<?php echo input_tag('caentalm[nompro]',$caentalm->getNompro(),'size=50,disabled=true'); ?>
</div>
<br>
<?php echo label_for('caentalm[rifpro]', __($labels['caentalm{rifpro}']), 'class="required" Style="width:200px"') ?>
<div class="content<?php if ($sf_request->hasError('caentalm{rifpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{rifpro}')): ?>
    <?php echo form_error('caentalm{rifpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php echo input_tag('caentalm[rifpro]',$caentalm->getRifpro(),'size=15,disabled=true'); ?>
    </div>

<br>
  <?php echo label_for('caentalm[desrcp]', __($labels['caentalm{desrcp}']), 'class="required" ') ?>
	  <div class="content<?php if ($sf_request->hasError('caentalm{desrcp}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caentalm{desrcp}')): ?>
	    <?php echo form_error('caentalm{desrcp}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($caentalm, 'getDesrcp', array (
	  'size' => 100,
	  'control_name' => 'caentalm[desrcp]',
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
<br>

<table>
<tr>
	<th>
	  <?php echo label_for('caentalm[tipmov]', __($labels['caentalm{tipmov}']), 'class="required"') ?>
	  <div class="content<?php if ($sf_request->hasError('caentalm{tipmov}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caentalm{tipmov}')): ?>
	    <?php echo form_error('caentalm{tipmov}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php echo input_auto_complete_tag('caentalm[tipmov]', $caentalm->getTipmov(),
    'almentalm/autocomplete?ajax=3',  array('autocomplete' => 'off','maxlength' => 3, 'size' => 4,   'readonly'  =>  $caentalm->getId()!='' ? true : false,  'onBlur'=> remote_function(array(
			  'url'      => 'almentalm/ajax',
			  'complete' => 'AjaxJSON(request, json)',
			  'condition' => "$('caentalm_tipmov').value != '' && $('id').value == ''",
  			  'with' => "'ajax=3&cajtexmos=caentalm_nomtip&cajtexcom=caentalm_tipmov&codigo='+this.value"
			  ))),
     array('use_style' => 'true')
  )
?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Catipent_Almentalm/clase/Catipent/frame/sf_admin_edit_form/obj1/caentalm_tipmov/obj2/caentalm_nomtip/campo1/codtipent/campo2/destipent','','','botoncat')?>

 <?php echo input_tag('caentalm[nomtip]',$caentalm->getNomtip(),'size=30,disabled=true'); ?>
	    </div>
	</th>
	<th width="100"></th>
	<th>
	  <?php echo label_for('caentalm[monrcp]', __($labels['caentalm{monrcp}']), 'class="required"') ?>
	  <div class="content<?php if ($sf_request->hasError('caentalm{monrcp}')): ?> form-error<?php endif; ?>">
	  <?php if ($sf_request->hasError('caentalm{monrcp}')): ?>
	    <?php echo form_error('caentalm{monrcp}', array('class' => 'form-error-msg')) ?>
	  <?php endif; ?>

	  <?php $value = object_input_tag($caentalm, array('getMonrcp',true), array (
	  'size' => 15,
	  'control_name' => 'caentalm[monrcp]', 'readonly' => true,
	)); echo $value ? $value : '&nbsp;' ?>
	    </div>
    </th>
</tr>
<tr>
    <th>
<?php echo label_for('caentalm[codcen]', __($labels['caentalm{codcen}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{codcen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{codcen}')): ?>
    <?php echo form_error('caentalm{codcen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php $value = object_input_tag($caentalm, 'getCodcen', array (
  'size' => 20,
  'control_name' => 'caentalm[codcen]',
  'maxlength' => 32,
  'readonly'  =>  $caentalm->getId()!='' ? true : false,
  'onBlur'=> remote_function(array(
       'url'      => 'almdesp/ajax',
       'script'   => true,
       'condition' => "$('caentalm_codcen').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=7&cajtexmos=caentalm_descen&cajtexcom=caentalm_codcen&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefcen_Almsolegr/clase/Cadefcen/frame/sf_admin_edit_form/obj1/caentalm_codcen/obj2/caentalm_descen/campo1/codcen/campo2/descen','','','botoncat')?>
&nbsp;&nbsp;
 <?php $value = object_input_tag($caentalm, 'getDescen', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'caentalm[descen]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
</tr>
</table>
<br>
<br>
 <?php echo label_for('caentalm[coddirec]', __($labels['caentalm{coddirec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{coddirec}')): ?>
    <?php echo form_error('caentalm{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caentalm, 'getCoddirec', array (
    'size' => 20,
    'control_name' => 'caentalm[coddirec]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'almentalm/ajax',
      'condition' => "$('caentalm_coddirec').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=8&cajtexmos=caentalm_desdirec&cajtexcom=caentalm_coddirec&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/caentalm_coddirec/obj2/caentalm_desdirec/campo1/coddirec/campo2/desdirec','','','botoncat')?>

   <?php $value = object_input_tag($caentalm, 'getDesdirec', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'caentalm[desdirec]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
  <?php echo label_for('caentalm[observ]', __($labels['caentalm{observ}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{observ}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{observ}')): ?>
    <?php echo form_error('caentalm{observ}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($caentalm, 'getObserv', array (
  'control_name' => 'caentalm[observ]',
  'size' => '100x3',
  'maxlength' => 1000,
  'onkeyup' => '"ismaxlength(this)"',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<div id="divcodsada" style="display:none">
  <?php echo label_for('caentalm[codsada]', __($labels['caentalm{codsada}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{codsada}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{codsada}')): ?>
    <?php echo form_error('caentalm{codsada}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caentalm, 'getCodsada', array (
  'size' => 20,
  'maxlength' => 8,
  'readonly'  =>  ($caentalm->getId()!='' && $caentalm->getCodsada()!='') ? true : false,
  'control_name' => 'caentalm[codsada]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caentalm[nroentdes]', __($labels['caentalm{nroentdes}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{nroentdes}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{nroentdes}')): ?>
    <?php echo form_error('caentalm{nroentdes}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caentalm, 'getNroentdes', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'caentalm[nroentdes]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caentalm[nrocarveh]', __($labels['caentalm{nrocarveh}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{nrocarveh}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{nrocarveh}')): ?>
    <?php echo form_error('caentalm{nrocarveh}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caentalm, 'getNrocarveh', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'caentalm[nrocarveh]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('caentalm[nrocontro]', __($labels['caentalm{nrocontro}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{nrocontro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{nrocontro}')): ?>
    <?php echo form_error('caentalm{nrocontro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caentalm, 'getNrocontro', array (
  'size' => 20,
  'maxlength' => 20,
  'readonly'  =>  ($caentalm->getId()!='' && $caentalm->getNrocontro()!='') ? true : false,
  'control_name' => 'caentalm[nrocontro]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('caentalm[nrocon]', __($labels['caentalm{nrocon}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('caentalm{nrocon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('caentalm{nrocon}')): ?>
    <?php echo form_error('caentalm{nrocon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($caentalm, 'getNrocon', array (
  'size' => 20,
  'maxlength' => 20,
  'readonly'  =>  ($caentalm->getId()!='' && $caentalm->getNrocon()!='') ? true : false,
  'control_name' => 'caentalm[nrocon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>    
</div>

<ul class="sf_admin_actions">
 <?php if ($caentalm->getId()) {?>
    <li class="float-rigth">
        <input name="Forma" type="button" value="Forma-Preimpresa" class="sf_admin_action_save" onClick="formapreimpresa()">
    </li>
    <?php }?>
</ul>
</div>
</fieldset>
<br>

<form name="form1" id="form1">
<?
echo grid_tag($obj);
?>
</form>

<?php include_partial('edit_actions', array('caentalm' => $caentalm)) ?>

</form>

<ul class="sf_admin_actions">
<li class="float-rigth">
<?php if ($caentalm->getId() && $caentalm->getStarcp()!='N') {?>
  <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
<?php }?>
</li>
      <li class="float-left"><?php if ($caentalm->getId() && $oculeli!="S"  && $caentalm->getStarcp()!='N'): ?>
<?php echo button_to(__('delete'), 'almentalm/delete?id='.$caentalm->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
<script type="text/javascript">
  var id="";
  var id='<?php echo $caentalm->getId()?>';
  actualiza(id);
  if (id=='')
  {
	var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('caentalm_rcpart').value='########';
     	$('caentalm_rcpart').readOnly=true;
        $('caentalm_codpro').focus();
     }
  }

  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_caentalm_fecrcp').hide();
  	$('caentalm_fecrcp').readOnly=true;
  }

  var mancodsada='<?php echo H::getConfApp2('mancodsada', 'compras', 'almentalm'); ?>';
  if (mancodsada=='S')
  {
    $('divcodsada').show();
  }  
  
     function formapreimpresa()
  {
      var  rcpart='<? echo $caentalm->getRcpart();?>';

      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
      
      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/compras/r.php?r=carentalm.php&codentdes="+rcpart+"&codenthas="+rcpart;

      window.open(pagina,rcpart,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");      
  }
  function anular()
  {
    var rcpart=$('caentalm_rcpart').value;
    var fecrcp=$('caentalm_fecrcp').value;
    
    window.open(getUrlModulo()+'anular?rcpart='+rcpart+'&fecrcp='+fecrcp,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=400,resizable=yes,left=400,top=120');
  }
</script>
