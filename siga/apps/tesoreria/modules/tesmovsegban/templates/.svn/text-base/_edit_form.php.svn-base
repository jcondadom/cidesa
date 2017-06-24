<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/09 10:55:55
?>
<?php echo form_tag('tesmovsegban/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>
<?php use_helper('Javascript','PopUp','Grid','Linktoapp') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools','observe') ?>
<?php echo object_input_hidden_tag($tsmovban, 'getId') ?>
<script>
  function CatalogoGrid()
  {
  	var obj1=document.getElementById('tsmovban_numcue').value;
        var obj2=document.getElementById('tsmovban_refban').value;
        var obj3=document.getElementById('tsmovban_fecban').value;
        var obj4=document.getElementById('tsmovban_tipmov').value;
  	window.open('/tesoreria'+getEnv()+'.php/tesmovsegban/anular?obj1='+obj1+'&refban='+obj2+'&fecban='+obj3+'&tipmov='+obj4,'...','menubar=no,toolbar=no,scrollbars=yes,width=500,height=300,resizable=yes,left=500,top=80')
  }
</script>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('tsmovban[numcue]', __($labels['tsmovban{numcue}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{numcue}')): ?>
    <?php echo form_error('tsmovban{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('tsmovban[numcue]', $tsmovban->getNumcue(),
  'tesmovsegban/autocomplete?ajax=1',  array('autocomplete' => 'off','maxlength' => 20,
  'readonly'  =>  $tsmovban->getId()!='' ? true : false ,
  'onBlur'=> remote_function(array(
  'url'      => 'tesmovsegban/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'condition' => "$('tsmovban_numcue').value != '' && $('id').value == ''",
  'script' => true,
  'with' => "'ajax=1&cajtexmos=tsmovban_nombanco&cajtexcom=tsmovban_numcue&codigo='+this.value"
			  ))),
  array('use_style' => 'true')
  )?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tsdefban_Tesmovemiche/clase/Tsdefban/frame/sf_admin_edit_form/obj1/tsmovban_numcue/obj2/tsmovban_nombanco/obj3/tsmovban_codcta/campo1/numcue/campo2/nomcue/campo3/codcta','','','botoncat')?>

  <?php $value = object_input_tag($tsmovban, 'getNombanco', array (
  'disabled' => true,
  'control_name' => 'tsmovban[nombanco]',
  'size' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<div style="display:none">
  <?php echo label_for('tsmovban[codcta]', __($labels['tsmovban{codcta}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{codcta}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{codcta}')): ?>
    <?php echo form_error('tsmovban{codcta}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovban, 'getCodcta', array (
  'size' => 32,
  'control_name' => 'tsmovban[codcta]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<br>

  <table>
   <tr>
    <th>
      <?php echo label_for('tsmovban[refban]', __($labels['tsmovban{refban}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{refban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{refban}')): ?>
    <?php echo form_error('tsmovban{refban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovban, 'getRefban', array (
  'size' => 20,
  'control_name' => 'tsmovban[refban]',
  'maxlength' => $tsmovban->getRefbanmay8()=='S' ? 20 : 8 ,
  'readonly'  =>  $tsmovban->getId()!='' ? true : false ,
  'onBlur'  => "javascript: valor=this.value; valor=valor.pad(8, '0',0);document.getElementById('tsmovban_refban').value=valor",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
    <?php echo label_for('tsmovban[fecban]', __($labels['tsmovban{fecban}']), 'class="required" Style="width:130px"') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{fecban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{fecban}')): ?>
    <?php echo form_error('tsmovban{fecban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tsmovban, 'getFecban', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tsmovban[fecban]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
<th>
    <?php echo input_hidden_tag('moneref', $tsmovban->getCodmon()) ?>
    <?php if ($tsmovban->getCodmon()=='') $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); else $var=$tsmovban->getCodmon();?>
    <?php echo label_for('tsmovban[codmon]', __($labels['tsmovban{codmon}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('tsmovban{codmon}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('tsmovban{codmon}')): ?> <?php echo form_error('tsmovban{codmon}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

      <?php echo select_tag('tsmovban[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
      'onChange' => remote_function(array(
       'url'      => sfContext::getInstance()->getModuleName().'/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=3&cajtexmos=tsmovban_valmon&moneref='+$('moneref').value+'&nuevo='+$('id').value+'&codigo='+this.value"
          ))
      )) ?>
    </div>
    </th>
   <th>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   </th>
   <th>
     <?php echo label_for('tsmovban[valmon]', __($labels['tsmovban{valmon}']), 'class="required" ') ?>
        <div class="content<?php if ($sf_request->hasError('tsmovban{valmon}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('tsmovban{valmon}')): ?> <?php echo form_error('tsmovban{valmon}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>

       <?php $value = object_input_tag($tsmovban, array('getValmon',true), array (
        'size' => 15,
        'control_name' => 'tsmovban[valmon]',
        'readonly'  =>  $tsmovban->getId()!='' ? true : false ,
        'onBlur' => "javascript:event.keyCode=13; return entermontodecimal(event, this.id,6)",
      )); echo $value ? $value : '&nbsp;' ?>
        </div>
   </th>    
   </tr>
  </table>

<br>

  <?php echo label_for('tsmovban[tipmov]', __($labels['tsmovban{tipmov}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{tipmov}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{tipmov}')): ?>
    <?php echo form_error('tsmovban{tipmov}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

    <?php echo input_auto_complete_tag('tsmovban[tipmov]', $tsmovban->getTipmov(),
    'tesmovsegban/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 4,
    'readonly'  =>  $tsmovban->getId()!='' ? true : false ,
    'onBlur'=> remote_function(array(
    'url'      => 'tesmovsegban/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('tsmovban_tipmov').value != '' && $('id').value == ''",
    'with' => "'ajax=2&cajtexmos=tsmovban_nommovim&cajtexcom=tsmovban_tipmov&codigo='+this.value"
			  ))),
    array('use_style' => 'true')
    )?>

<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opdefemp_pagdefemp3/clase/Tstipmov/frame/sf_admin_edit_form/obj1/tsmovban_tipmov/obj2/tsmovban_nommovim/campo1/codtip/campo2/destip','','','botoncat')?>

  <?php $value = object_input_tag($tsmovban, 'getNommovim', array (
  'disabled' => true,
  'control_name' => 'tsmovban[nommovim]',
  'size' => 50,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('tsmovban[desban]', __($labels['tsmovban{desban}']), 'class="required" ') ?>
<div class="content<?php if ($sf_request->hasError('tsmovban{desban}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('tsmovban{desban}')): ?> <?php echo form_error('tsmovban{desban}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($tsmovban, 'getDesban', array (
'size' => 80,
'maxlength' => 250,
'control_name' => 'tsmovban[desban]',
)); echo $value ? $value : '&nbsp;' ?></div>

<br>

<?php echo label_for('tsmovban[monmov]', __($labels['tsmovban{monmov}']), 'class="required" ') ?>
<div
	class="content<?php if ($sf_request->hasError('tsmovban{monmov}')): ?> form-error<?php endif; ?>">
<?php if ($sf_request->hasError('tsmovban{monmov}')): ?> <?php echo form_error('tsmovban{monmov}', array('class' => 'form-error-msg')) ?>
<?php endif; ?> <?php $value = object_input_tag($tsmovban, array('getMonmov',true), array (
'size' => 12,
'onBlur' => "javascript:event.keyCode=13;return entermontootro(event, this.id)",
'control_name' => 'tsmovban[monmov]',
)); echo $value ? $value : '&nbsp;' ?></div>
<br>

    <?php echo label_for('tsmovban[coddirec]', __($labels['tsmovban{coddirec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tsmovban{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tsmovban{coddirec}')): ?>
    <?php echo form_error('tsmovban{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tsmovban, 'getCoddirec', array (
    'size' => 20,
    'control_name' => 'tsmovban[coddirec]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'tesmovsegban/ajax',
      'condition' => "$('tsmovban_coddirec').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=4&cajtexmos=tsmovban_desdirec&cajtexcom=tsmovban_coddirec&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>


    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/tsmovban_coddirec/obj2/tsmovban_desdirec/campo1/coddirec/campo2/desdirec','','','botoncat')?>
   <?php $value = object_input_tag($tsmovban, 'getDesdirec', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'tsmovban[desdirec]',
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br>

<div align="center">
<?php echo button_to('Mostrar Movimientos Según Libros', 'tesmoslib/index?id='.$tsmovban->getId()) ?>
</div>

</div>
</fieldset>

<?php include_partial('edit_actions', array('tsmovban' => $tsmovban)) ?>
</form>

	<ul class="sf_admin_actions">
		<li class="float-rigth"><?php if ($tsmovban->getId()): ?> <?php echo button_to(__('delete'), 'tesmovsegban/delete?id='.$tsmovban->getId(), array (
	'post' => true,
	'confirm' => __('Está seguro de Eliminar'),
	'class' => 'sf_admin_action_delete',
	)) ?><?php endif; ?></li>
	 <li class="float-rigth">
      <?php if ($tsmovban->getId()!='') { ?>
	<input type="button" name="Submit" value="Anular" class="sf_admin_action_delete" onclick="javascript:CatalogoGrid();" />
<? } ?>
	 </li>
	</ul>

<script language="JavaScript" type="text/javascript">
var nuevo='<?php echo $tsmovban->getId()?>';
if (nuevo=='')
{
  var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
  if (valor!="")
  {
      calculo=toFloat2(valor);
      var num2=toFloat('tsmovban_valmon');
      if (num2==0)
         $('tsmovban_valmon').value=format(calculo.toFixed(6),'.',',','.');
  }
}
</script>

