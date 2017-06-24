<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/05/24 18:33:08
?>
<?php echo form_tag('AlmReq/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php use_helper('Javascript') ?>
<?php use_helper('PopUp') ?>
<?php use_helper('Grid') ?>
<?php echo javascript_include_tag('dFilter') ?>
<?php echo javascript_include_tag('ajax') ?>
<?php echo javascript_include_tag('tools','observe','compras/almdesp') ?>
<?php use_helper('tabs') ?>

<?php echo object_input_hidden_tag($careqart, 'getId') ?>
<?php echo input_hidden_tag('careqart[novalcat]', $careqart->getNovalcat()) ?>
<?php echo input_hidden_tag('careqart[manunialt]', $careqart->getManunialt()) ?>

<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php print $careqart->getEstatus();?></font></strong></th>
  </tr>
</table>
<fieldset><legend><?php  echo __('Requisión')?></legend>
<div class="form-row"><?php echo label_for('careqart[reqart]', __($labels['careqart{reqart}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{reqart}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{reqart}')): ?> <?php echo form_error('careqart{reqart}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($careqart, 'getReqart', array (
'size' => 8,
'maxlength' => 8,
'readonly'  =>  $careqart->getId()!='' ? true : false ,
'control_name' => 'careqart[reqart]',
'onBlur'  => "javascript: enter(this.value);",
)); echo $value ? $value : '&nbsp;' ?>

<div class="sf_admin_edit_help"><?php echo __('Máximo 8 caracteres') ?></div>
</div>
<br>

<?php echo label_for('careqart[fecreq]', __($labels['careqart{fecreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{fecreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{fecreq}')): ?> <?php echo form_error('careqart{fecreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_date_tag($careqart, 'getFecreq', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'careqart[fecreq]',
  'date_format' => 'dd/MM/yyyy',
   'maxlength' => 10,
//   'readonly'  =>  $careqart->getId()!='' ? true : false ,
   'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
</div>
<br>
<?php echo label_for('careqart[desreq]', __($labels['careqart{desreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{desreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{desreq}')): ?> <?php echo form_error('careqart{desreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> 
<?php $trajo=H::getX_vacio('REQART', 'Cadphart', 'REQART', $careqart->getReqart())?>
<?php $value = object_input_tag($careqart, 'getDesreq', array (
  'size' => 80,
  'maxlength' => 500,
  'readonly'  =>  $trajo!='' ? true : false ,
  'control_name' => 'careqart[desreq]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>
<?php echo label_for('careqart[motivo]', __($labels['careqart{motivo}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('careqart{motivo}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqart{motivo}')): ?>
    <?php echo form_error('careqart{motivo}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($careqart, 'getMotivo', array (
  'size' => 80,
  'control_name' => 'careqart[motivo]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<?php echo label_for('careqart[codcatreq]', __($labels['careqart{codcatreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{codcatreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{codcatreq}')): ?> <?php echo form_error('careqart{codcatreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($careqart, 'getCodcatreq', array (
  'size' => $lonubi,
  'control_name' => 'careqart[codcatreq]',
  'maxlength' => $lonubi,
  'readonly'  =>  $careqart->getId()!='' ? true : false ,
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$forubi')",
  'onBlur'=> remote_function(array(
       'url'      => 'almreq/ajax',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('careqart_codcatreq').value != ''",
       'with' => "'ajax=1&cajtexmos=careqart_desubi&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
  <?php $catubibnu=H::getConfApp2('catubibnu', 'compras', 'almreq');
  $catubidir=H::getConfApp2('catubidir', 'compras', 'almreq');
   if ($catubibnu=='S') { ?>
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Bnubica_Pagemiord/clase/Bnubica/frame/sf_admin_edit_form/obj1/careqart_codcatreq/obj2/careqart_desubi/campo1/codubi/campo2/desubi/param1/".$lonubi,'','','botoncat')?></th>
<?php }else if ($catubidir=='S'){?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/careqart_codcatreq/obj2/careqart_desubi/campo1/coddirec/campo2/desdirec','','','botoncat')?></th>
<?php }else {?>
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Almreq/clase/Bnubibie/frame/sf_admin_edit_form/obj1/careqart_codcatreq/obj2/careqart_desubi/campo1/codubi/campo2/desubi','','','botoncat')?></th>
<?php }?>
<?php $value = object_input_tag($careqart, 'getDesubi', array (
'disabled' => true,
'size' => 65,
'control_name' => 'careqart[desubi]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>

<div id="divcodcen">
<?php echo label_for('careqart[codcen]', __($labels['careqart{codcen}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{codcen}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{codcen}')): ?> <?php echo form_error('careqart{codcen}', array('class' => 'form-error-msg')) ?>
<?php endif; ?>

 <?php $value = object_input_tag($careqart, 'getCodcen', array (
  'size' => 10,
  'control_name' => 'careqart[codcen]',
  'maxlength' => 32,
  'readonly'  =>  $careqart->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
       'url'      => 'almreq/ajax',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('careqart_codcen').value != ''",
       'with' => "'ajax=4&cajtexmos=careqart_descen&cajtexcom=careqart_codcen&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
  &nbsp;
   <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefcen_Almsolegr/clase/Cadefcen/frame/sf_admin_edit_form/obj1/careqart_codcen/obj2/careqart_descen/campo1/codcen/campo2/descen','','','botoncat')?>
<?php $value = object_input_tag($careqart, 'getDescen', array (
'disabled' => true,
'size' => 65,
'control_name' => 'careqart[descen]',
)); echo $value ? $value : '&nbsp;' ?></div></div>
<br>

<div id="almacenes" style="display:none">
<?php $mascaraubi=Herramientas::ObtenerFormato('Cadefart','Forubi');?>    
<?php echo label_for('careqart[codalm]', __($labels['careqart{codalm}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('careqart{codalm}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqart{codalm}')): ?>
    <?php echo form_error('careqart{codalm}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
      
 <?php $value = object_input_tag($careqart, 'getCodalm', array (
  'size' => 10,
  'control_name' => 'careqart[codalm]',
  'maxlength' => 6,
  'readonly'  =>  $careqart->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
      'url'      => 'almreq/ajax',
      'complete' => 'AjaxJSON(request, json)',
      'condition' => "$('careqart_codalm').value != '' && $('id').value == ''",
      'with' => "'ajax=7&cajtexmos=careqart_nomalm&cajtexcom=careqart_codalm&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>      
 &nbsp;
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefalm_Almtraalm/clase/Cadefalm/frame/sf_admin_edit_form/obj1/careqart_codalm/obj2/careqart_nomalm/campo1/codalm/campo2/nomalm','','','botoncat')?>
   
  <?php $value = object_input_tag($careqart, 'getNomalm', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'careqart[nomalm]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <?php echo label_for('careqart[codubi]', __($labels['careqart{codubi}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('careqart{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqart{codubi}')): ?>
    <?php echo form_error('careqart{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = object_input_tag($careqart, 'getCodubi', array (
  'size' => 10,
  'maxlength' => strlen($mascaraubi),
  'control_name' => 'careqart[codubi]',
  'onKeyPress' => "javascript:return dFilter (event.keyCode, this,'$mascaraubi')",
  'readonly'  =>  $careqart->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
       'url'      => 'almreq/ajax',
       'script'   => true,
       'condition' => "$('careqart_codubi').value != '' && $('id').value == ''",
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=8&cajtexmos=careqart_nomubi&codalm='+$('careqart_codalm').value+'&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
 &nbsp;
<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cadefubi_Almdes/clase/Cadefubi/frame/sf_admin_edit_form/obj1/careqart_codubi/obj2/careqart_nomubi/campo1/codubi/campo2/nomubi/param1/'+$('careqart_codalm').value+'",'','','botoncat')?>

  <?php $value = object_input_tag($careqart, 'getNomubi', array (
  'disabled' => true,
   'size' => 60,
  'control_name' => 'careqart[nomubi]',
)); echo $value ? $value : '&nbsp;' ?>
</div>  
</div>
<br>
 <?php echo label_for('careqart[coddirec]', __($labels['careqart{coddirec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('careqart{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqart{coddirec}')): ?>
    <?php echo form_error('careqart{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($careqart, 'getCoddirec', array (
    'size' => 20,
    'control_name' => 'careqart[coddirec]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'almreq/ajax',
      'condition' => "$('careqart_coddirec').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=9&cajtexmos=careqart_desdirec&cajtexcom=careqart_coddirec&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/careqart_coddirec/obj2/careqart_desdirec/campo1/coddirec/campo2/desdirec','','','botoncat')?>

   <?php $value = object_input_tag($careqart, 'getDesdirec', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'careqart[desdirec]',
)); echo $value ? $value : '&nbsp;' ?>
</div>

<br>

<?php echo label_for('careqart[monreq]', __($labels['careqart{monreq}']), 'class="required" ') ?>
<div
  class="content<?php if ($sf_request->hasError('careqart{monreq}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('careqart{monreq}')): ?> <?php echo form_error('careqart{monreq}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($careqart, array('getMonreq',true), array (
  'size' => 15,
  'readonly'=>true,
  'control_name' => 'careqart[monreq]',
)); echo $value ? $value : '&nbsp;' ?> &nbsp;&nbsp;&nbsp;&nbsp;</div>

<div id="divRepApl" style="display:none">
  <br>
  <?php echo label_for('careqart[codest]', __($labels['careqart{codest}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('careqart{codest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqart{codest}')): ?>
    <?php echo form_error('careqart{codest}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($careqart, 'getCodest', array (
    'size' => 20,
    'control_name' => 'careqart[codest]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'almreq/ajax',
      'update' => 'divgrid',
      'condition' => "$('careqart_codest').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
      'script' => true,
      'with' => "'ajax=12&cajtexmos=careqart_desest&cajtexcom=careqart_codest&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>

  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Mantenimiento_Manesttra/clase/Manesttra/frame/sf_admin_edit_form/obj1/careqart_codest/obj2/careqart_desest/campo1/codest/campo2/desest','','','botoncat')?>

   <?php $value = object_input_tag($careqart, 'getDesest', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'careqart[desest]',
)); echo $value ? $value : '&nbsp;' ?></div>
</div>

<?php
if ($careqart->getId()!="" &&  $autorizareq=='S' && $careqart->getAprreq()!='S') { ?>
<br>
<?php echo submit_to_remote('Submit2', 'Autorizar para poder ser Despachada', array(
       'url'      => 'almreq/autoriza',
       'script'   => true,
       'complete' => 'AjaxJSON(request, json)',
       'condition' => "$('careqart_codcatreq').value != ''",
       'with' => "'id='+$('id').value")) ?>
   <? }?>

<br>
<ul class="sf_admin_actions">
<li class="float-rigth">
<?php if ($careqart->getId()!='') { ?>
  <input type="button" name="Submit" class="sf_admin_action_list" value="Forma Pre-Impresa" onclick="javascript:Mostrar_orden_preimpresa();" />
<? } ?>
</li>
</ul>
<br>
<div id="divgrid">
<?php echo grid_tag($obj);?>
</div>
<br>
<fieldset id="sf_fieldset_none" class="">
<h2><?php  echo __('Observaciones')?></h2>
<div class="form-row">
  <div align ="left" class="content<?php if ($sf_request->hasError('careqart{obsreq}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('careqart{obsreq}')): ?>
    <?php echo form_error('careqart{obsreq}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($careqart, 'getObsreq', array (
  'size' => '80x5',
  'maxlength' => 2000,
  'control_name' => 'careqart[obsreq]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
</div>
</fieldset>

<?php include_partial('edit_actions', array('careqart' => $careqart)) ?>

</form>

<ul class="sf_admin_actions">
<li class="float-rigth">
<?php if ($careqart->getId() && $careqart->getStareq()!='N' && $oculeli!="S" && !H::getHay_Despacho($careqart->getReqart())) {?>
  <input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:anular();" />
<?php }?>
</li>
      <li class="float-left"><?php if ($careqart->getId() && $oculeli!="S" && $careqart->getStareq()!='N'): ?>
<?php echo button_to(__('delete'), 'almreq/delete?id='.$careqart->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>

<script type="text/javascript">

 var id='<?php echo $careqart->getId()?>';
 var estatus='<?php echo $careqart->getStareq()?>';
    if (id!="")
    {
     $$('.botoncat')[0].disabled=true;
     $$('.botoncat')[1].disabled=true;
     if (estatus=='N')
       $$('.sf_admin_action_save')[0].hide();
   }else{
   	     var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('careqart_reqart').value='########';
     	$('careqart_reqart').readOnly=true;
        $('careqart_desreq').focus();
     }
     var modulo='<?php echo sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion');?>';
     if (modulo=='mantenimiento'){
       $('divRepApl').show();
     }
   }

  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_careqart_fecreq').hide();
  	$('careqart_fecreq').readOnly=true;
  }
  
  var manalmubi='<?php echo H::getConfApp2('manalmubi', 'compras', 'almreq'); ?>';
  if (manalmubi=='S')
  {
  	$('almacenes').show();
  }

  var oculcencos='<?php echo H::getConfApp2('oculcencos', 'compras', 'almreq'); ?>';
  if (oculcencos=='S')
  {
    $('divcodcen').hide();
  }

function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('careqart_reqart').value=valor;
     var desh='<?php echo $numdesh; ?>';
     if (desh=='S')
     {
       $('careqart_reqart').readOnly=true;
     }
 }

function calcularcosto(e,id)
{
 if (e.keyCode==13)
 {
	var aux = id.split("_");
	var name=aux[0];
	var fil=aux[1];
	var col=parseInt(aux[2]);

	var colcantrec=5;
	var colcosto=7;
    var coltotal=8;

	var canrec=name+"_"+fil+"_"+colcantrec;
	var costo=name+"_"+fil+"_"+colcosto;
	var total=name+"_"+fil+"_"+coltotal;

	 var numcanrec=toFloat(canrec);

	 var numcosto=toFloat(costo);

	 numtotal = (numcanrec * numcosto)

	 document.getElementById(canrec).value=format(numcanrec.toFixed(2),'.',',','.');
	 document.getElementById(costo).value=format(numcosto.toFixed(2),'.',',','.');
	 document.getElementById(total).value=format(numtotal.toFixed(2),'.',',','.');

	 entermonto(e,id);
}

}

  function Mostrar_orden_preimpresa()
  {
    var primer_art=$("ax_0_1").value;
    var ultimo_art=$("ax_0_1").value;
    var codcatdes=$("ax_0_3").value;
    var codcathas=$("ax_0_3").value;
    var f=1;
    while ($("ax_"+f+"_1").value!=""){
        ultimo_art=$("ax_"+f+"_2").value;
        var codcathas=$("ax_"+f+"_3").value;
        f++;
    }
    var codreqdes=$('careqart_reqart').value;
    var codreqhas=$('careqart_reqart').value;
    


    var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';
    pagina=ruta+"/reportes/reportes/compras/r.php=?r=carreqpre.php&codreqdes="+codreqdes+"&codreqhas="+codreqhas+"&codcatdes="+codcatdes+"&codcathas="+codcathas+"&codesde="+primer_art+"&codhasta="+ultimo_art;
    window.open(pagina,1,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80")

  }

function anular()
  {
    var reqart=$('careqart_reqart').value;
    var fecreq=$('careqart_fecreq').value;
    
    window.open(getUrlModulo()+'anular?reqart='+reqart+'&fecreq='+fecreq,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=400,resizable=yes,left=400,top=120');
  }
</script>
