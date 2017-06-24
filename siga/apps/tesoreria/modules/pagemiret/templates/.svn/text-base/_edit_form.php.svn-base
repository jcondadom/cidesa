<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/04 11:49:52
?>
<?php echo form_tag('pagemiret/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($opordpag, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'tools', 'ajax') ?>

<input id="formulario" type="hidden" name="formulario" value='<? echo $formulario; ?>'/>

<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<fieldset id="sf_fieldset_none" class="">
<legend><?php echo __('Datos de la Orden')?></legend>
<div class="form-row">
  <table>
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
  'onKeyPress' => "javascript:if (event.keyCode==13 || event.keyCode==9){document.getElementById('opordpag_fecemi').focus();}",
  'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('opordpag[fecemi]', __($labels['opordpag{fecemi}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{fecemi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{fecemi}')): ?>
    <?php echo form_error('opordpag{fecemi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($opordpag, 'getFecemi', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'opordpag[fecemi]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th>  <?php if ($opordpag->getCodmon()=='') $var=H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'); else $var=$opordpag->getCodmon();?>
    <?php echo label_for('opordpag[codmon]', __($labels['opordpag{codmon}']), 'class="required" ') ?>
    <div class="content<?php if ($sf_request->hasError('opordpag{codmon}')): ?> form-error<?php endif; ?>">
    <?php if ($sf_request->hasError('opordpag{codmon}')): ?> <?php echo form_error('opordpag{codmon}', array('class' => 'form-error-msg')) ?>
    <?php endif; ?>

      <?php echo select_tag('opordpag[codmon]', objects_for_select(TsdesmonPeer::getMonedasExactas(),'getCodmon','getNommon',$var,'include_custom=Seleccione'),array(
      'onChange' => remote_function(array(
       'url'      => sfContext::getInstance()->getModuleName().'/ajax',
       'complete' => 'AjaxJSON(request, json)',
       'with' => "'ajax=5&cajtexmos=opordpag_valmon&codigo='+this.value"
          ))
      )) ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
  'onKeyPress' => "javascript:cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('opordpag_tipcau').value=cadena",
  'onBlur'=> remote_function(array(
  'url'      => 'pagemiret/ajax',
  'complete' => 'AjaxJSON(request, json)',
  'condition' => "$('opordpag_tipcau').value != '' && $('id').value == ''",
  'with' => "'ajax=1&cajtexmos=opordpag_nomext&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccau_Pagemiret/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opordpag_tipcau/obj2/opordpag_nomext/campo1/tipcau/campo2/nomext')?></th>
    <th><?php $value = object_input_tag($opordpag, 'getNomext', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[nomext]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <?php echo label_for('opordpag[desord]', __($labels['opordpag{desord}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{desord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{desord}')): ?>
    <?php echo form_error('opordpag{desord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($opordpag, 'getDesord', array (
  'size' => '80x3',
  'maxlength'=> 1000,
  'onkeyup' => "javascript:return ismaxlength(this)",
  'control_name' => 'opordpag[desord]',
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
    'pagemiret/autocomplete?ajax=2',  array('autocomplete' => 'off','maxlength' => 15, 'onBlur'=> remote_function(array(
        'url'      => 'pagemiret/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opordpag_cedrif').value != '' && $('id').value == ''",
        'with' => "'ajax=2&cajtexmos=opordpag_nomben&cajtexcom=opordpag_cedrif&cuenta=opordpag_ctapag&descuenta=opordpag_descta&codigo='+this.value"
        ))),
     array('use_style' => 'true')
  )
?></div></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Pagemiord/clase/Opbenefi/frame/sf_admin_edit_form/obj1/opordpag_cedrif/obj2/opordpag_nomben/campo1/cedrif/campo2/nomben')?></th>
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

  <table>
   <tr>
    <th><?php echo label_for('opordpag[ctapag]', __($labels['opordpag{ctapag}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{ctapag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{ctapag}')): ?>
    <?php echo form_error('opordpag{ctapag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCtapag', array (
  'size' => 32,
  'maxlength' => $lonmas,
  'control_name' => 'opordpag[ctapag]',
  'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascara')",
  'onBlur'=> remote_function(array(
        'url'      => 'pagemiret/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opordpag_ctapag').value != '' && $('id').value == ''",
        'with' => "'ajax=3&cajtexmos=opordpag_descta&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;<?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Contabb_Pagemiord/clase/Contabb/frame/sf_admin_edit_form/obj1/opordpag_ctapag/obj2/opordpag_descta/campo1/codcta/campo2/descta')?></th>
    <th><?php $value = object_input_tag($opordpag, 'getDescta', array (
  'disabled' => true,
  'size' => 60,
  'control_name' => 'opordpag[descta]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th><div id="finan"><?php echo label_for('opordpag[tipfin]', __($labels['opordpag{tipfin}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{tipfin}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{tipfin}')): ?>
    <?php echo form_error('opordpag{tipfin}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getTipfin', array (
    'size' => 10,
    'control_name' => 'opordpag[tipfin]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
       'url'      => 'pagemiret/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('opordpag_tipfin').value != '' && $('id').value == ''",
        'with' => "'ajax=4&cajtexmos=opordpag_nomext2&cajtexcom=opordpag_tipfin&codigo='+this.value"
        ))
  )); echo $value ? $value : '&nbsp;' ?>
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Fortipfin_Pagemiord/clase/Fortipfin/frame/sf_admin_edit_form/obj1/opordpag_tipfin/obj2/opordpag_nomext2/campo1/codfin/campo2/nomext')?>

    <?php $value = object_input_tag($opordpag, 'getNomext2', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'opordpag[nomext2]',
)); echo $value ? $value : '&nbsp;' ?></div></div></th>
   </tr>
   <tr>
     <th>&nbsp;</th>
   </tr>
    <tr>
    <th><div id="divcoddirec" style="display:none"><?php echo label_for('opordpag[coddirec]', __($labels['opordpag{coddirec}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{coddirec}')): ?>
    <?php echo form_error('opordpag{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCoddirec', array (
    'size' => 10,
    'control_name' => 'opordpag[coddirec]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'pagemiret/ajax',
      'condition' => "$('opordpag_coddirec').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=7&cajtexmos=opordpag_desdirec&cajtexcom=opordpag_coddirec&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>


    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/opordpag_coddirec/obj2/opordpag_desdirec/campo1/coddirec/campo2/desdirec','','','botoncat')?>
    <?php $value = object_input_tag($opordpag, 'getDesdirec', array (
  'disabled' => true,
  'size' => 30,
  'control_name' => 'opordpag[desdirec]',
)); echo $value ? $value : '&nbsp;' ?></div></div></th>
<th><div id="divcoddirechas" style="display:none"><?php echo label_for('opordpag[coddirechas]', __($labels['opordpag{coddirechas}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{coddirechas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{coddirechas}')): ?>
    <?php echo form_error('opordpag{coddirechas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, 'getCoddirechas', array (
    'size' => 10,
    'control_name' => 'opordpag[coddirechas]',
    'maxlength' => 4,
    'onBlur'=> remote_function(array(
      'url'      => 'pagemiret/ajax',
      'condition' => "$('opordpag_coddirechas').value != '' && $('id').value == ''",
      'complete' => 'AjaxJSON(request, json)',
      'with' => "'ajax=7&cajtexmos=opordpag_desdirechas&cajtexcom=opordpag_coddirechas&codigo='+this.value"
          ))
  )); echo $value ? $value : '&nbsp;' ?>


    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cadefdirec_Almdefdiv/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/opordpag_coddirechas/obj2/opordpag_desdirechas/campo1/coddirec/campo2/desdirec','','','botoncat')?>
    <?php $value = object_input_tag($opordpag, 'getDesdirechas', array (
  'disabled' => true,
  'size' => 30,
  'control_name' => 'opordpag[desdirechas]',
)); echo $value ? $value : '&nbsp;' ?></div></div></th>
 </tr> 
  </table>
</div>
</fieldset>
</div>
</fieldset>

<br>


<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Retenciones');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
 <table>
     <tr>
         <th><?php echo label_for('opordpag[codtip2]', __($labels['opordpag{codtip2}']), 'class="required" ') ?>
          <div class="content<?php if ($sf_request->hasError('opordpag{codtip2}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('opordpag{codtip2}')): ?>
            <?php echo form_error('opordpag{codtip2}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

             <?php $value = object_input_tag($opordpag, 'getCodtip2', array (
                  'size' => 10,
                  'maxlength' => 4,
                  'control_name' => 'opordpag[codtip2]',
                  'onBlur'=> remote_function(array(
                        'url'      => 'pagemiret/ajax',
                        'complete' => 'AjaxJSON(request, json)',
                        'condition' => "$('opordpag_codtip2').value != '' && $('id').value == ''",
                        'with' => "'ajax=6&cajtexmos=opordpag_destip3&codigo='+this.value"
                        ))
                )); echo $value ? $value : '&nbsp;' ?></div></th>
            <th><?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Optipret_Pagemiret/clase/Optipret/frame/sf_admin_edit_form/obj1/opordpag_codtip2/obj2/opordpag_destip3/campo1/codtip/campo2/destip')?></th>
            <th> <?php $value = object_input_tag($opordpag, 'getDestip3', array (
          'disabled' => true,
          'size' => 50,
          'control_name' => 'opordpag[destip3]',
        )); echo $value ? $value : '&nbsp;' ?></th>
     </tr>
  <tr>
   <th> <?php echo label_for('opordpag[codtip]', __($labels['opordpag{codtip}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{codtip}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{codtip}')): ?>
    <?php echo form_error('opordpag{codtip}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo input_auto_complete_tag('opordpag[codtip]', $opordpag->getCodtip(),
    'pagemiret/autocomplete?ajax=5',  array('autocomplete' => 'off','size' => 10,'maxlength' => 3, 'onBlur'=> remote_function(array(
        'update'   => 'divGrid',
        'url'      => 'pagemiret/grid',
        'condition' => "$('opordpag_codtip').value!=''",
        'complete' => 'AjaxJSON(request, json), actualizarsaldos() ',
        'script' => true,
        'with' => "'ajax=5&cajtexmos=opordpag_destip&cajtexcom=opordpag_codtip&tipo=opordpag_tipcau&codigo='+this.value+'&tipret2='+$('opordpag_codtip2').value+'&coddirec='+$('opordpag_coddirec').value+'&coddirechas='+$('opordpag_coddirechas').value+'&codigo2='+document.getElementById('opordpag_tipcau').value"
        ))),
     array('use_style' => 'true')
  )
?></div></th><?php echo input_hidden_tag('fila', '') ?>
   <th><?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Optipret_Pagemiret/clase/Optipret/frame/sf_admin_edit_form/obj1/opordpag_codtip/obj2/opordpag_destip/campo1/codtip/campo2/destip')?></th>
   <th> <?php $value = object_input_tag($opordpag, 'getDestip', array (
  'disabled' => true,
  'size' => 50,
  'control_name' => 'opordpag[destip]',
)); echo $value ? $value : '&nbsp;' ?>
</th>
<th><?php echo label_for('opordpag[monord]', __($labels['opordpag{monord}']), 'class="required" style="50px"') ?>
  <div class="content<?php if ($sf_request->hasError('opordpag{monord}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('opordpag{monord}')): ?>
    <?php echo form_error('opordpag{monord}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($opordpag, array('getMonord',true), array (
  'size' => 15,
  'readonly' => true,
  'control_name' => 'opordpag[monord]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
  </tr>
  <tr>
  <th colspan=4>
    <table>
      <tr>
        <th>
		    <br>
		    <?php echo label_for('opordpag[fecdes]', __($labels['opordpag{fecdes}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('opordpag{fecdes}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('opordpag{fecdes}')): ?>
			    <?php echo form_error('opordpag{fecdes}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>
			 <?php $value = object_input_date_tag($opordpag, 'getFecdes', array (
			  'rich' => true,
			  'calendar_button_img' => '/sf/sf_admin/images/date.png',
			  'control_name' => 'opordpag[fecdes]',
			  'date_format' => 'dd/MM/yyyy',
			  'value' => "",
			  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
			  /*'onBlur'=> remote_function(array(
			         'update'   => 'divGrid',
			         'url'      => 'pagemiret/grid',
			         'script'   => true,
			         'complete' => 'AjaxJSON(request, json)',
			         'with' => "'ajax=5&cajtexmos=opordpag_destip&cajtexcom=opordpag_codtip&tipo=opordpag_tipcau&codigo='+document.getElementById('opordpag_codtip').value+'&codigo2='+document.getElementById('opordpag_tipcau').value+'&fecdes='+document.getElementById('opordpag_fecdes').value+'&fechas='+document.getElementById('opordpag_fechas').value"
			     )),*/
			)); echo $value ? $value : '&nbsp;' ?>
			</div>
    	</th>

    	<th>
    		 <br>
		    <?php echo label_for('opordpag[fechas]', __($labels['opordpag{fechas}']), 'class="required" ') ?>
			  <div class="content<?php if ($sf_request->hasError('opordpag{fechas}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('opordpag{fechas}')): ?>
			    <?php echo form_error('opordpag{fechas}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>
			 <?php $value = object_input_date_tag($opordpag, 'getFechas', array (
			  'rich' => true,
			  'calendar_button_img' => '/sf/sf_admin/images/date.png',
			  'control_name' => 'opordpag[fechas]',
			  'date_format' => 'dd/MM/yyyy',
			  'value' => "",
			  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
			  /*'onBlur'=> remote_function(array(
			         'update'   => 'divGrid',
			         'url'      => 'pagemiret/grid',
			         'script'   => true,
			         'complete' => 'AjaxJSON(request, json)',
			         'with' => "'ajax=5&cajtexmos=opordpag_destip&cajtexcom=opordpag_codtip&tipo=opordpag_tipcau&codigo='+document.getElementById('opordpag_codtip').value+'&codigo2='+document.getElementById('opordpag_tipcau').value+'&fecdes='+document.getElementById('opordpag_fecdes').value+'&fechas='+document.getElementById('opordpag_fechas').value"
			     )),*/
			)); echo $value ? $value : '&nbsp;' ?>
			</div>
    	</th>
    	<th>
	    	<br>
			<?php echo button_to_remote('Filtrar', array(
	         'update'   => 'divGrid',
			 'url'      => 'pagemiret/grid',
			 'script'   => true,
			 'complete' => 'AjaxJSON(request, json)',
			 'with' => "'ajax=5&cajtexmos=opordpag_destip&cajtexcom=opordpag_codtip&tipo=opordpag_tipcau&codigo='+$('opordpag_codtip').value+'&codigo2='+$('opordpag_tipcau').value+'&fecdes='+$('opordpag_fecdes').value+'&fechas='+$('opordpag_fechas').value+'&coddirec='+$('opordpag_coddirec').value+'&coddirechas='+$('opordpag_coddirechas').value+'&tipret2='+$('opordpag_codtip2').value"
         )) ?>
    	</th>
    	<th>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	</th>
    	<th>
    	<input type="button" name="Submit" value="Marcar Todos" onClick="marcarTodo();"/>
    	</th>
    	<th>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    	</th>
    	<th>
    	<input type="button" name="Submit" value="Desmarcar Todos" onClick="desmarcarTodo();"/>
    	</th>
      </tr>
    </table>
    </th>
  </tr>
 </table>

<br>

<div class="form-row" id="divGrid">
<?php echo grid_tag($obj);?>
</div>

</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'SIGECOF');?>
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

</div>
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
$('opordpag_numord').focus();
var ocufuefin='<?php echo H::getConfApp2('ocufuefin', 'tesoreria', 'pagemiret');?>';
if (ocufuefin=='S')
  $('finan').hide();

var numero='<?php echo $numero; ?>';
if (numero!="")
{
  alert_('El N&uacute;mero de Orden es: '+numero);
}
llenarvariables();
actualizarsaldos();
 var valor='<?php echo H::getX_vacio('CODMON','Tsdesmon','Valmon',H::getX_vacio('CODEMP', 'Opdefemp', 'Codmon', '001'));?>';
if (valor!="")
{
  calculo=toFloat2(valor);
  var num2=toFloat('opordpag_valmon');
  if (num2==0)
     $('opordpag_valmon').value=format(calculo.toFixed(6),'.',',','.');
}

 var filsoldir='<?php echo H::getConfApp2('filsoldir', 'compras', 'almsolegr')?>';
 var cambiareti='<?php echo H::getConfApp2('cameti', 'compras', 'almdefdirec')?>';
  if (filsoldir=='S'){
    $('divcoddirec').show();
    if (cambiareti=='S')
      $('divcoddirechas').show();
  }

var impordret='<?php echo $impordret;?>';
if (impordret=='S')
{
    if(confirm("¿Desea imprimir la Orden de Retención?"))
    {
        var ordpagdes='<?php echo $numero;?>';
        var ordpaghas='<?php echo $numero;?>';

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

function totalmarcadas(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var colmonto=col+5;
  var colmoneda=col+10;
  var montoret=name+"_"+fil+"_"+colmonto;
  var valmon=name+"_"+fil+"_"+colmoneda;

  var montotot=toFloat('opordpag_monord');
  var num1=toFloat(montoret);
  var num2=toFloat(valmon);

  if ($(id).checked==true)
  {
    acum=montotot + (num1*num2);
    $('opordpag_monord').value=format(acum.toFixed(2),'.',',','.');
  }
  else
  {
    acum=montotot - (num1*num2);
    $('opordpag_monord').value=format(acum.toFixed(2),'.',',','.');
  }
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

 function llenarvariables()
 {
   if ($('formulario').value!="")
   {
    var habdatft='<?php echo H::getConfApp2('habdatft', 'tesoreria', 'pagemiret');?>';
   	
    $('opordpag_tipcau').value='<?php echo $tipo?>';
    $('opordpag_nomext').value='<?php echo $nomext?>';
    $('opordpag_desord').value='<?php echo $concepto?>';
    $('opordpag_codtip').value='<?php echo $tiporet?>';

    if (habdatft!='S'){
      $('opordpag_numord').value='########';
     	$('opordpag_numord').readOnly=true;
     	$('opordpag_fecemi').readOnly=true;
    }
   	$('opordpag_codtip').focus();
   	$('opordpag_cedrif').focus();
   }
 }

 function validar()
 {
 	if ($('fila').value==0)
 	{
 	  alert('No hay Retenciones asociadas a los Datos Suministrados');
 	  $('opordpag_codtip').value="";
 	  $('opordpag_destip').value="";
 	}
 }

 function marcarTodo()
 {
 	 var acum=0;
 	 var numfil=$$('.grid_fila input[type=checkbox]');

   numfil.each(function(item) {
      aux = item.id.split("_");
      num1=toFloat(aux[0]+'_'+aux[1]+'_'+'6');
      item.checked=true;
      acum= acum + num1;
   });
   $('opordpag_monord').value=format(acum.toFixed(2),'.',',','.');
 }

 function desmarcarTodo()
 {
 	 var numfil=$$('.grid_fila input[type=checkbox]');

   numfil.each(function(item) {
      item.checked=false;
   });
   $('opordpag_monord').value="0,00";
 }

</script>

<?php include_partial('edit_actions', array('opordpag' => $opordpag)) ?>

</form>
