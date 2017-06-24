<?php
/**
 * Funciones de la vista.
 *
 * 
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: jlobaton $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 34583 2009-11-09 16:23:42Z jlobaton $
 */
// date: 2007/05/23 15:30:38
?>
<?php
   echo form_tag('faordrec/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,))
?>
<?php
  $fields = CarcpartPeer::getFieldNames();

  if(array_search('Codalmusu', $fields))
  {  ?>
  <h2 class="h2" onclick="javascript: return $('divusualms').toggle();"><?php echo __('Almacenes') ?></h2>
  <fieldset id="sf_fieldset_usualms" class="">
  <div class="form-row" id="divusualms">
    <?php echo label_for('carcpart[codalmusu]', __('Almacenes Por Usuario: '), 'class="required" Style="text-align:left; width:150px"') ?>
    <div class="content">
    <?php
      $almacenes = $sf_user->getAttribute('usualms',array());
      if(count($almacenes)>0){
        $keys = array_keys($almacenes);
        $codalm = $keys[0];
      }else $codalm = '';
      if($codalm == '') echo label_for('carcpart[codalmusu]', __('Usuario sin Almacen Asociado'), 'class="required" Style="text-align:left; width:150px"').'<br><br><br>';
      else echo select_tag('carcpart[codalmusu]',options_for_select($almacenes,$carcpart->getCodalmusu()!='' ? $carcpart->getCodalmusu() : $codalm), ( (count($almacenes)==1 || $carcpart->getId()) ? 'disabled=true' : '').' style=width:500px');
    ?>
    </div>
  </div>
  </fieldset>
<?php } ?>
<?php use_helper('Javascript','Linktoapp') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'facturacion/faordrec', 'tools','observe') ?>
<?php echo object_input_hidden_tag($carcpart, 'getId') ?>
<?php echo input_hidden_tag('verificaexisydisp', '') ?>
<?php echo input_hidden_tag('mensaje', '') ?>
<?php echo input_hidden_tag('existeubicacion', '') ?>

<fieldset id="sf_fieldset_none" class="">
<h2> <?php echo __('Recepción')?></h2>
<div class="form-row">
<table>
<tr>
<th>
  <?php echo label_for('carcpart[rcpart]', __($labels['carcpart{rcpart}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{rcpart}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{rcpart}')): ?>
      <?php echo form_error('carcpart{rcpart}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
      <?php $value = object_input_tag($carcpart, 'getRcpart', array (
      'size' => 16,
      'control_name' => 'carcpart[rcpart]',
      'maxlength' => 8,
      'readonly'  =>  $carcpart->getId()!='' ? true : false ,
      'onBlur'  => "javascript:enter(this.value);",));
      echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
<th>
  <?php echo label_for('carcpart[fecrcp]', __($labels['carcpart{fecrcp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{fecrcp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{fecrcp}')): ?>
      <?php echo form_error('carcpart{fecrcp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
      <?php $value = object_input_date_tag($carcpart, 'getFecrcp', array (
      'rich' => true,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'carcpart[fecrcp]',
      'date_format' => 'dd/MM/yyyy',
      'readonly'  =>  $carcpart->getId()!='' ? true : false ,
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",),date('Y-m-d'));
      echo $value ? $value : '&nbsp;' ?>
  </div>
</tr>
</table>
<br>
<br>
<table>
<tr>
<th>
<?php echo label_for('carcpart[ordcom]', __($labels['carcpart{ordcom}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('carcpart{ordcom}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('carcpart{ordcom}')): ?>
        <?php echo form_error('carcpart{ordcom}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>
        <?php echo input_auto_complete_tag('carcpart[ordcom]', $carcpart->getOrdcom(),
        'faordrec/autocomplete?ajax=2',  array('autocomplete' => 'off','size' => 16, 'maxlength' => 8,
        'readonly'  =>  $carcpart->getId()!='' ? true : false ,
        'onBlur'=> remote_function(array(
        'update'   => 'divGrid',
        'url'      => 'faordrec/grid',
        'condition' => "$('carcpart_ordcom').value != '' && $('id').value == ''",
        'script'   => true,
        'complete' => 'AjaxJSON(request, json),actualizarsaldos();',
        'with' => "'ajax=2&cajtexcom=carcpart_ordcom&codigo='+this.value+'&fecrec='+$('carcpart_fecrcp').value+'&codalm='+$('carcpart_codalmusu').value+'&numero='+$('carcpart_rcpart').value"))),
        array('use_style' => 'true'))
        ?>&nbsp;
        <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Faordcom_Faordrec/clase/faordcom/frame/sf_admin_edit_form/obj1/carcpart_ordcom/campo1/ordcom/param1/'+$('carcpart_codalmusu').value+'",'','','botoncat');?>
    </div>
</th>
<th>
<?php echo label_for('carcpart[fecord]', __($labels['carcpart{fecord}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('carcpart{fecord}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('carcpart{fecord}')): ?>
        <?php echo form_error('carcpart{fecord}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>
        <?php $value = object_input_date_tag($carcpart, 'getFecord', array (
        'rich' => true,
        'calendar_button_img' => '/sf/sf_admin/images/date.png',
        'control_name' => 'carcpart[fecord]',
        'readonly' => true,
        'date_format' => 'dd/MM/yyyy',
        'onkeyup' => "javascript: mascara(this,'/',patron,true)",));
        echo $value ? $value : '&nbsp;' ?>
    </div>
</th>
</tr>
</table>
<br>
<table>
<tr>
<div id="almacen" style="display: none">
    <?php echo label_for('carcpart[codalm]', __($labels['carcpart{codalm}']), 'class="required"') ?>
    <div class="content<?php if ($sf_request->hasError('carcpart{codalm}')): ?> form-error<?php endif; ?>">
        <?php if ($sf_request->hasError('carcpart{codalm}')): ?>
        <?php echo form_error('carcpart{codalm}', array('class' => 'form-error-msg')) ?>
        <?php endif; ?>
        <?php $value = object_input_tag($carcpart, 'getCodalm', array (
        'size' => 10,
        'maxlength' => 20,
        'control_name' => 'carcpart[codalm]'));
        echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</tr>
</table>
<br>
<br>
  <?php echo label_for('carcpart[desrcp]', __($labels['carcpart{desrcp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{desrcp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{desrcp}')): ?>
      <?php echo form_error('carcpart{desrcp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($carcpart, 'getDesrcp', array (
      'size' => 88,
      'control_name' => 'carcpart[desrcp]',));
      echo $value ? $value : '&nbsp;' ?>
  </div>
<br>
<br>
  <?php echo label_for('carcpart[codpro]', __($labels['carcpart{codpro}']), 'class="required" Style="width:200px"') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{codpro}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{codpro}')): ?>
      <?php echo form_error('carcpart{codpro}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
      <br>
      <br>
      <?php $value = object_input_tag($carcpart, 'getCodpro', array (
      'size' => 20,
      'control_name' => 'carcpart[codpro]',
      'maxlength' => 20,
      'readonly' => true,));
      echo $value ? $value : '&nbsp;' ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php $value = object_input_tag($carcpart, 'getNompro', array (
      'disabled' => true,
      'size' => 57,
      'control_name' => 'carcpart[nompro]',));
      echo $value ? $value : '&nbsp;' ?>
   </div>
<br>  
<br>
<table>
<tr>
<th>
  <?php echo label_for('carcpart[desconpag]', __($labels['carcpart{desconpag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{desconpag}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{desconpag}')): ?>
      <?php echo form_error('carcpart{desconpag}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($carcpart, 'getDesconpag', array (
      'disabled' => true,
      'control_name' => 'carcpart[desconpag]',));
      echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
<th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>
  <?php echo label_for('carcpart[desforent]', __($labels['carcpart{desforent}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{desforent}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{desforent}')): ?>
      <?php echo form_error('carcpart{desforent}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($carcpart, 'getDesforent', array (
      'disabled' => true,
      'control_name' => 'carcpart[desforent]',));
      echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
</tr>
</table>
<br>
<table>
<tr align="left">
<th>
  <?php echo label_for('carcpart[numfac]', __($labels['carcpart{numfac}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{numfac}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{numfac}')): ?>
      <?php echo form_error('carcpart{numfac}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($carcpart, 'getNumfac', array (
      'size' => 20,
      'control_name' => 'carcpart[numfac]',
      'maxlength' => 15,));
      echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
<th>
  <?php echo label_for('carcpart[nroent]', __($labels['carcpart{nroent}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{nroent}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{nroent}')): ?>
      <?php echo form_error('carcpart{nroent}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($carcpart, 'getNroent', array (
      'size' => 20,
      'control_name' => 'carcpart[nroent]',
      'maxlength' => 8,));
      echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
<th>
<?php echo label_for('carcpart[monrcp]', __($labels['carcpart{monrcp}']),'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{monrcp}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{monrcp}')): ?>
      <?php echo form_error('carcpart{monrcp}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
      <?php $value = object_input_tag($carcpart, array('getMonrcp',true), array (
      'size' => 15,
      'readonly' => true,
      'control_name' => 'carcpart[monrcp]',));
      echo $value ? $value : '&nbsp;' ?>
  </div>
</th>
</tr>

<tr align="left">
<th colspan="4">
<br>
  <?php echo label_for('carcpart[nomcli]', __($recmer=='S' ? $labels['carcpart{nomcli}'] : '' ) , 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{nomcli}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{nomcli}')): ?>
      <?php echo form_error('carcpart{nomcli}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
      <?php $value = get_partial('nomcli', array('type' => 'edit', 'carcpart' => $carcpart, 'recmer' => $recmer )); echo $value ? $value : '&nbsp;' ?>
  </div>
<br>
  <?php echo label_for('carcpart[cancaj]', __($recmer=='S' ? $labels['carcpart{cancaj}'] : '' ) , 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{cancaj}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{cancaj}')): ?>
      <?php echo form_error('carcpart{cancaj}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
      <?php $value = get_partial('cancaj', array('type' => 'edit', 'carcpart' => $carcpart, 'recmer' => $recmer )); echo $value ? $value : '&nbsp;' ?>
  </div>

<br>

  <?php echo label_for('carcpart[canjau]', __($recmer=='S' ? $labels['carcpart{canjau}'] : '' ) , 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('carcpart{canjau}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('carcpart{canjau}')): ?>
      <?php echo form_error('carcpart{canjau}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
      <?php $value = get_partial('canjau', array('type' => 'edit', 'carcpart' => $carcpart, 'recmer' => $recmer )); echo $value ? $value : '&nbsp;' ?>
  </div>

</th>
</tr>
</table>
</div>

</fieldset>
<div id="divGrid">
    <form name="form1" id="form1">
        <?php echo grid_tag($grid);?>
    </form>
</div>
<script type="text/javascript">
  var id="";
  var id='<?php echo $carcpart->getId()?>';
  actualiza(id);
</script>

<?php include_partial('edit_actions', array('carcpart' => $carcpart)) ?>

<ul class="sf_admin_actions">
    <li class="float-left"><?php if ($carcpart->getId() && $oculeli!="S"): ?>
    <?php echo button_to(__('delete'), 'faordrec/delete?id='.$carcpart->getId(), array (
      'post' => true,
      'confirm' => __('Are you sure?'),
      'class' => 'sf_admin_action_delete',))?>
    <?php endif; ?>
    </li>
</ul>

<script language="JavaScript" type="text/javascript">
nuevo='<?php echo $carcpart->getId() ?>';
if (nuevo=="")
{
     var manesolcorr='<?php echo $mansolocor; ?>';
     if (manesolcorr=='S')
     {
        $('carcpart_rcpart').value='########';
     	$('carcpart_rcpart').readOnly=true;
        $('carcpart_ordcom').focus();
     }
}

  var deshab='<?php echo $bloqfec; ?>';
  if (deshab=='S')
  {
  	$('trigger_carcpart_fecrcp').hide();
  	$('carcpart_fecrcp').readOnly=true;
  }

    var manforent='<?php echo H::getConfApp2('manforent', 'compras', 'almordcom'); ?>';
    if (manforent=='S')
    {
        $('almacen').show();
    }
</script>
