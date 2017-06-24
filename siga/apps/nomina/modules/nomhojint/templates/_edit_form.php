<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_form.php 45313 2011-07-27 13:30:30Z dmartinez $
 */
// date: 2007/06/29 13:30:33
?>
<?php echo form_tag('nomhojint/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form', 'onsubmit'  => 'return false;',
  'multipart' => true,
  'onsubmit'  => 'double_list_submit(); return true;'
)) ?>

<?php echo object_input_hidden_tag($nphojint, 'getId') ?>
<?php echo javascript_include_tag('dFilter', 'ajax', 'tools', 'observe') ?>
<?php use_helper('PopUp', 'tabs', 'DoubleList', 'Javascript') ?>
<?php echo input_hidden_tag('fecha', '') ?>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"> <?php echo $nphojint->getEtiqueta() ;?></font></strong></th>
  </tr>
</table>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <table>
  <tr>
   <th><?php echo label_for('nphojint[codemp]', __($labels['nphojint{codemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codemp}')): ?>
    <?php echo form_error('nphojint{codemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $maskcodemp = $sf_user->getAttribute('maskcodemp','','nomhojint'); $maskcodemp=='' ? $maskcodemp=$nphojint->getForemp() : ''; ?>
<?php if ($nphojint->getId()=='') { 
  $rellecero=H::getConfApp2('relcodemp', 'nomina', 'nomhojint');
 if ($rellecero=='S'){  ?>
      <?php $value = object_input_tag($nphojint, 'getCodemp', array (
      'size' => 16,
      'maxlength' =>16,
      'control_name' =>'nphojint[codemp]',
      'onBlur'  => "javascript:event.keyCode=13; enter(event,this.value);",  
    )); echo $value ? $value : '&nbsp;' ?>

<?php }else { ?>
<?php $value = object_input_tag($nphojint, 'getCodemp', array (
  'size' => strlen($maskcodemp),
  'maxlength' =>strlen($maskcodemp),
  'control_name' =>'nphojint[codemp]',
  'onKeyPress' => "javascript : return dFilterv2(event,this,'$maskcodemp')",
  'onBlur'=> remote_function(array(
  'url'      => 'nomhojint/ajax',
  'condition' => "$('nphojint_codemp').value != '' && $('id').value == ''",
  'complete' => 'AjaxJSON(request, json)',
  'with' => "'ajax=8&cajtexcom=nphojint_codemp&codigo='+this.value",
  ))
)); echo $value ? $value : '&nbsp;' ?>

<?php } }else{ ?>
    <?php $value = object_input_tag($nphojint, 'getCodemp', array (
  'size' => strlen($maskcodemp),
  'maxlength' =>strlen($maskcodemp),
  'readonly' => true,
  'control_name' => 'nphojint[codemp]',
)); echo $value ? $value : '&nbsp;' ?>

<?php } ?>

    </div></th>
   <th style="display:none"> <?php echo label_for('nphojint[nomemp]', __($labels['nphojint{nomemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{nomemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{nomemp}')): ?>
    <?php echo form_error('nphojint{nomemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNomemp', array (
  'size' => 60,
  'readonly' => true,
  'maxlength' => 100,
  'control_name' => 'nphojint[nomemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>

   <th> <?php echo label_for('nphojint[nomcar]', __($labels['nphojint{nomcar}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{nomcar}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{nomcar}')): ?>
    <?php echo form_error('nphojint{nomcar}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNomcar', array (
  'size' => 60,
  'readonly' => true,
  'maxlength' => 100,
  'control_name' => 'nphojint[nomcar]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
  </tr>
  </table>
  <table>
  <tr>
  	<th>&nbsp</th>
  </tr>
  <tr>
  	<th>

		  <?php echo label_for('nphojint[prinom]', __($labels['nphojint{prinom}']), 'class="required"') ?>
		  <div class="content<?php if ($sf_request->hasError('nphojint{prinom}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('nphojint{prinom}')): ?>
		    <?php echo form_error('nphojint{prinom}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($nphojint, 'getPrinom', array (
		  'size' => 25,
  		  'maxlength' => 25,
                  'onkeyUp' =>  "javascript: return this.value = this.value.toUpperCase();",
		  'control_name' => 'nphojint[prinom]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>

  	</th>
	<th>

		  <?php echo label_for('nphojint[segnom]', __($labels['nphojint{segnom}']), 'class="required"') ?>
		  <div class="content<?php if ($sf_request->hasError('nphojint{segnom}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('nphojint{segnom}')): ?>
		    <?php echo form_error('nphojint{segnom}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($nphojint, 'getSegnom', array (
		  'size' => 25,
  		  'maxlength' => 25,
                  'onkeyUp' =>  "javascript: return this.value = this.value.toUpperCase();",
		  'control_name' => 'nphojint[segnom]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>

	</th>
        <th>

		  <?php echo label_for('nphojint[sueldo]', __($labels['nphojint{sueldo}']), 'class="required"') ?>
		  <div class="content<?php if ($sf_request->hasError('nphojint{sueldo}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('nphojint{sueldo}')): ?>
		    <?php echo form_error('nphojint{sueldo}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($nphojint, 'getSueldo', array (
		  'size' => 10,
  		  'maxlength' => 10,
                  'onkeyUp' =>  "javascript: return this.value = this.value.toUpperCase();",
		  'control_name' => 'nphojint[sueldo]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>

	</th>
  </tr>
  <tr>
  	<th></th>
  </tr>
  <tr>
  	<th>

		  <?php echo label_for('nphojint[priape]', __($labels['nphojint{priape}']), 'class="required"') ?>
		  <div class="content<?php if ($sf_request->hasError('nphojint{priape}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('nphojint{priape}')): ?>
		    <?php echo form_error('nphojint{priape}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($nphojint, 'getPriape', array (
		  'size' => 25,
  		  'maxlength' => 25,
                  'onkeyUp' =>  "javascript: return this.value = this.value.toUpperCase();",
		  'control_name' => 'nphojint[priape]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>

  	</th>
	<th>

		  <?php echo label_for('nphojint[segape]', __($labels['nphojint{segape}']), 'class="required"') ?>
		  <div class="content<?php if ($sf_request->hasError('nphojint{segape}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('nphojint{segape}')): ?>
		    <?php echo form_error('nphojint{segape}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($nphojint, 'getSegape', array (
		  'size' => 25,
  		  'maxlength' => 25,
                  'onkeyUp' =>  "javascript: return this.value = this.value.toUpperCase();",
		  'control_name' => 'nphojint[segape]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>


	</th>
        <th><?php echo label_for('nphojint[fecing]', __($labels['nphojint{fecing}']), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('nphojint{fecing}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('nphojint{fecing}')): ?>
                <?php echo form_error('nphojint{fecing}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_date_tag($nphojint, 'getFecing', array (
              'rich' => true,
              'maxlength' => 10,
              'size' => 10,
              'calendar_button_img' => '/sf/sf_admin/images/date.png',
              'control_name' => 'nphojint[fecing]',
              'date_format' => 'dd/MM/yy',
              'onkeyup' => "javascript: mascara(this,'/',patron,true)",
            )); echo $value ? $value : '&nbsp;' ?>
                </div>
        </th>
  </tr>
  </table>
  <br>
 <table>
  <tr>
   <th><?php echo label_for('nphojint[codniv]', __($labels['nphojint{codniv}']), 'class="required"') ?>
      <div class="content<?php if ($sf_request->hasError('nphojint{codniv}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('nphojint{codniv}')): ?>
        <?php echo form_error('nphojint{codniv}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_tag($nphojint, 'getCodniv', array (
      'size' => 20,
      'maxlength' => $lonnivel,
      'control_name' => 'nphojint[codniv]',
      'onKeyPress' => "javascript:cadena=rayaenter(event,this.value);",
      'onBlur' => "nivel(event,1);",
      'onKeyDown' => "javascript:return dFilter (event.keyCode, this,'$mascaranivel')",

    )); echo $value ? $value : '&nbsp;' ?></div></th>
       <th>&nbsp;&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npestorg_Nomhojint/clase/Npestorg/frame/sf_admin_edit_form/obj1/nphojint_codniv/obj2/nphojint_desniv/campo1/codniv/campo2/desniv/param1/'.$lonnivel)?></th>
       <th> <?php $value = object_input_tag($nphojint, 'getDesniv', array (
      'readonly' => true,
      'size' => 60,
      'control_name' => 'nphojint[desniv]',
    )); echo $value ? $value : '&nbsp;' ?></th>

  </tr>
  <tr>
  <tr>
  <th>
  <div id="ubidepen" style="display:none">
<?php echo label_for('nphojint[depen]', __($labels['nphojint{depen}']), 'class="required"') ?>
      <div class="content<?php if ($sf_request->hasError('nphojint{depen}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('nphojint{depen}')): ?>
        <?php echo form_error('nphojint{depen}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?> 
    
  
  <?php $value = object_input_tag($nphojint, 'getDepen', array (
  'disabled' => true,
  'control_name' => 'nphojint[depen]',
  'style' => 'border:none',
)); echo $value ? $value : '&nbsp;' ?>  
    
  </div>

    </div>
  </th>
  </tr>
  </table>
<br>
  <div id="datuniads" style="display:none">
  <?php echo label_for('nphojint[coduniads]', __($labels['nphojint{coduniads}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{coduniads}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{coduniads}')): ?>
    <?php echo form_error('nphojint{coduniads}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCoduniads', array (
  'size' => 20,
  'control_name' => 'nphojint[coduniads]',  
  'maxlength' => 20,
  'onBlur'=> remote_function(array(
    'url'      => 'nomhojint/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('nphojint_coduniads').value != '' ",
    'with' => "'ajax=20&cajtexmos=nphojint_desuniads&cajtexcom=nphojint_coduniads&nivel='+$('nphojint_codniv').value+'&codigo='+this.value"
    ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Nomina_Npuniads/clase/Npuniads/frame/sf_admin_edit_form/obj1/nphojint_coduniads/obj2/nphojint_desuniads/campo1/coduniads/campo2/desuniads/param1/'+$('nphojint_codniv').value+'")?>

  <?php $value = object_input_tag($nphojint, 'getDesuniads', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'nphojint[desuniads]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
  </div>  
<br>
  <div id="datlocal" style="display:none">
  <?php echo label_for('nphojint[coddirec]', __($labels['nphojint{coddirec}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{coddirec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{coddirec}')): ?>
    <?php echo form_error('nphojint{coddirec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCoddirec', array (
  'size' => 5,
  'control_name' => 'nphojint[coddirec]',  
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
    'url'      => 'nomhojint/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('nphojint_coddirec').value != '' ",
    'with' => "'ajax=18&cajtexmos=nphojint_desdirec&cajtexcom=nphojint_coddirec&codigo='+this.value"
    ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Tesdefcueban_coddirec/clase/Cadefdirec/frame/sf_admin_edit_form/obj1/nphojint_coddirec/obj2/nphojint_desdirec/campo1/coddirec/campo2/desdirec')?>

  <?php $value = object_input_tag($nphojint, 'getDesdirec', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'nphojint[desdirec]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
    <?php echo label_for('nphojint[codubi]', __($labels['nphojint{codubi}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codubi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codubi}')): ?>
    <?php echo form_error('nphojint{codubi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getcodubi', array (
  'size' => 20,
  'control_name' => 'nphojint[codubi]',  
  'maxlength' => 20,
  'onBlur'=> remote_function(array(
    'url'      => 'nomhojint/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('nphojint_codubi').value != '' ",
    'with' => "'ajax=19&cajtexmos=nphojint_desubi&cajtexcom=nphojint_codubi&codigo='+this.value"
    ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Bnubibie_Bieregactmued/clase/Bnubibie/frame/sf_admin_edit_form/obj1/nphojint_codubi/obj2/nphojint_desubi/campo1/codubi/campo2/desubi')?>

  <?php $value = object_input_tag($nphojint, 'getDesubi', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'nphojint[desubi]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
  </div>
  <br>
  <div id="manofi" style="display:none">
  <?php echo label_for('nphojint[codofi]', __($labels['nphojint{codofi}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codofi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codofi}')): ?>
    <?php echo form_error('nphojint{codofi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodofi', array (
  'size' => 5,
  'control_name' => 'nphojint[codofi]',  
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
    'url'      => 'nomhojint/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('nphojint_codofi').value != '' ",
    'with' => "'ajax=17&cajtexmos=nphojint_desofi&cajtexcom=nphojint_codofi&codigo='+this.value"
    ))
  )); echo $value ? $value : '&nbsp;' ?>
  &nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Nomhojint_Npdefofi/clase/Npdefofi/frame/sf_admin_edit_form/obj1/nphojint_codofi/obj2/nphojint_desofi/campo1/codofi/campo2/desofi')?>

  <?php $value = object_input_tag($nphojint, 'getDesofi', array (
  'size' => 60,
  'disabled' => true,
  'control_name' => 'nphojint[desofi]',
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
  </div>
</div>
</fieldset>

<br>

<?php tabMainJS("tp1","tabPane1", "tabPage1", 'Datos Personales');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <table>
   <tr>
    <th>
 <?php $maskcedemp = $nphojint->getForced(); 
 $maskcodemp = H::getConfApp2('maskcodemp','nomina','nomhojint'); 
 $maskcedemp!='' ? $maskara=$maskcedemp : $maskara=$maskcodemp; ?>
      <?php echo label_for('nphojint[cedemp]', __($labels['nphojint{cedemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{cedemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{cedemp}')): ?>
    <?php echo form_error('nphojint{cedemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCedemp', array (
  'size' => 20,
  'maxlength' => $maskara!='' ? strlen($maskara) : 9,
  //'onKeyPress' => "javascript : return dFilter(event,this,'$maskara')",
  'onKeyDown' => " if ($('id').value=='' && '$maskara'!='') {javascript: cadena=this.value;cadena=cadena.toUpperCase();document.getElementById('nphojint_cedemp').value=cadena;  dFilter (event.keyCode, this,'$maskara')}",
  'onBlur' => "if ($('id').value=='' && '$maskara'!='') {javascript:cadena=rayitas(this.value);document.getElementById('nphojint_cedemp').value=cadena; validarFormatoCed(this.value);}",
  'control_name' => 'nphojint[cedemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp</th>

    <th><?php echo label_for('nphojint[rifemp]', __($labels['nphojint{rifemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{rifemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{rifemp}')): ?>
    <?php echo form_error('nphojint{rifemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $maskrif = $sf_user->getAttribute('maskrif','','nomhojint'); $maskrif=='' ? $maskrif='##########' : '' ;?>
  <?php $value = object_input_tag($nphojint, 'getRifemp', array (
  'size' => strlen($maskrif),
  'maxlength' => strlen($maskrif),
  'control_name' => 'nphojint[rifemp]',
  'onKeyPress' => "javascript:return validarif(event,this,'$maskrif')",
)); echo $value ? $value : '&nbsp;' ?>

    </div></th>

    <th>&nbsp;&nbsp;&nbsp;&nbsp</th>

    <th><?php echo label_for('nphojint[edociv]', __($labels['nphojint{edociv}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{edociv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{edociv}')): ?>
    <?php echo form_error('nphojint{edociv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[edociv]', options_for_select($listaestadocivil,$nphojint->getEdociv(),'include_custom=Seleccione Uno'),array(
     'onChange' => "mostrarfechamat(this.value)"

  )) ?>
    </div></th>

    <th id='thfecmat'<?php if($nphojint->getEdociv()!='C') echo 'style="display:none"' ?>><?php echo label_for('nphojint[fecmat]', __($labels['nphojint{fecmat}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecmat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecmat}')): ?>
    <?php echo form_error('nphojint{fecmat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecmat', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecmat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th>
   <div id="contrato">
    <?php echo label_for('nphojint[numcon]', __($labels['nphojint{numcon}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{numcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{numcon}')): ?>
    <?php echo form_error('nphojint{numcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNumcon', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'nphojint[numcon]',
)); echo $value ? $value : '&nbsp;' ?>


    </div> </div> </th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</th>
    <th>

  <?php  $value = get_partial('fotemp', array('type' => 'edit', 'nphojint' => $nphojint)); echo $value ? $value : '&nbsp;' ?>

  <?php echo label_for('nphojint[fotemp]', __($labels['nphojint{fotemp}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fotemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fotemp}')): ?>
    <?php echo form_error('nphojint{fotemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($nphojint, 'getFotemp', array (
  'control_name' => 'nphojint[fotemp]',
  'include_link' => 'fotos',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Tamaño de la foto 90x100 (jpg, gif o png)') ?></div>  </div>


   </tr>
   <tr>
   	  <th>
   <div id="punto">
   	  	  <?php echo label_for('nphojint[numpuncue]', __($labels['nphojint{numpuncue}']), 'class="required" ') ?>
		  <div class="content<?php if ($sf_request->hasError('nphojint{numpuncue}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('nphojint{numpuncue}')): ?>
		    <?php echo form_error('nphojint{numpuncue}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>
		
		  <?php $value = object_input_tag($nphojint, 'getNumpuncue', array (
		  'size' => 20,
		  'maxlength' => 20,
		  'control_name' => 'nphojint[numpuncue]',
		)); echo $value ? $value : '&nbsp;' ?>
    </div>  </div>
   	  </th>
      <th>
          <?php echo label_for('nphojint[numtarces]', __($labels['nphojint{numtarces}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('nphojint{numtarces}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('nphojint{numtarces}')): ?>
        <?php echo form_error('nphojint{numtarces}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>
    
      <?php $value = object_input_tag($nphojint, 'getNumtarces', array (
      'size' => 20,
      'maxlength' => 50,
      'control_name' => 'nphojint[numtarces]',
    )); echo $value ? $value : '&nbsp;' ?>
    </div>  
      </th>      
   </tr>
  </table>



<br>

  <table>
   <tr>
    <th>
    <fieldset id="sf_fieldset_none" class="">
    <h2><?php echo __('Nacionalidad')?></h2>
  <div class="form-row">
<?php if ($nphojint->getNacemp()=='E')  {
  ?><?php echo radiobutton_tag('nphojint[nacemp]', 'V', false)        ."Venezolano(a)".'&nbsp;&nbsp;';
      echo radiobutton_tag('nphojint[nacemp]', 'E', true)."   Extranjero(a)";?>
    <?php
}else{
  echo radiobutton_tag('nphojint[nacemp]', 'V', true)        ."Venezolano(a)".'&nbsp;&nbsp;';
  echo radiobutton_tag('nphojint[nacemp]', 'E', false)."   Extranjero(a)";
} ?></div></fieldset></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><fieldset id="sf_fieldset_none" class="">
    <h2><?php echo __('Sexo')?></h2>
  <div class="form-row">
<?php if ($nphojint->getSexemp()=='M')  {
  ?><?php echo radiobutton_tag('nphojint[sexemp]', 'M', true)        ."   Masculino".'&nbsp;&nbsp;';
      echo radiobutton_tag('nphojint[sexemp]', 'F', false)."     Femenino";?>
    <?php
}else{
  echo radiobutton_tag('nphojint[sexemp]', 'M', false)        ."Masculino".'&nbsp;&nbsp;';
  echo radiobutton_tag('nphojint[sexemp]', 'F', true)."   Femenino";

} ?></div></fieldset></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo __('Profesional').'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;'?></h2></legend>
  <div class="form-row">
<?php if ($nphojint->getProfes()=='S')  {
  ?><?php echo radiobutton_tag('nphojint[profes]', 'S', true)        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('nphojint[profes]', 'N', false)."     No";?>
    <?php
}else{
  echo radiobutton_tag('nphojint[profes]', 'S', false)        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('nphojint[profes]', 'N', true)."   No";

} ?></div></fieldset></th>
   <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th><div id="segurohcm"><fieldset id="sf_fieldset_none" class="">
   	<legend><h2><?php echo __('Seguro HCM').'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;'?></h2></legend>
	<div class="form-row">
<?php if ($nphojint->getSeghcm()=='S')  {
  ?><?php echo radiobutton_tag('nphojint[seghcm]', 'S', true, array('onclick'=>'porcentajehcm(this.id)'))        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('nphojint[seghcm]', 'N', false, array('onclick'=>'porcentajehcm(this.id)'))."     No";?>
	  <?php echo __('Porcentaje:&nbsp;');
	        $value = object_input_tag($nphojint, array('getPorseghcm',true), array (
			'size' => 10,
			'maxlength' => 6,
			'class' => 'grid_txtright',
			'onblur'=> "javascript:event.keyCode=13;return entermontootro(event,this.id)",
			'control_name' => 'nphojint[porseghcm]',
			)); echo $value ? $value : '&nbsp;'; ?>

    <?php
}else{
  echo radiobutton_tag('nphojint[seghcm]', 'S', false, array('onclick'=>'porcentajehcm(this.id)'))        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('nphojint[seghcm]', 'N', true,  array('onclick'=>'porcentajehcm(this.id)'))."   No";
  echo '&nbsp;&nbsp;&nbsp;';
echo  __('Porcentaje:&nbsp');
$value = object_input_tag($nphojint, 'getPorseghcm', array (
			'size' => 4,
			'readonly' => true,
			'class' => 'grid_txtright',
			'onblur'=> "javascript:event.keyCode=13;return entermontootro(event,this.id)",
			'maxlength' => 6,
			'control_name' => 'nphojint[porseghcm]',
			)); echo $value ? $value : '&nbsp;';

} ?>
	</div></fieldset></div></th>
     <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   <th><div id="segurofun"><fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo __('Seguro Funerario').'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;'?></h2></legend>
  <div class="form-row">
    
        <?php $value = object_checkbox_tag($nphojint, 'getTiefun', array (
        'control_name' => 'nphojint[tiefun]',
        'onclick' => "segunfun(this.id)"
      )); echo $value ? $value : '&nbsp;' ?>
  </div></fieldset></div></th>
   </tr>
  </table>
  <?php echo label_for('nphojint[numpas]', __($labels['nphojint{numpas}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{numpas}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{numpas}')): ?>
    <?php echo form_error('nphojint{numpas}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNumpas', array (
  'size' => 20,
  'control_name' => 'nphojint[numpas]',
  'maxlength' => 20,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>


<br>

  <table>
   <tr>
    <th>
  <?php echo label_for('nphojint[codpainac]', __($labels['nphojint{codpainac}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codpainac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codpainac}')): ?>
    <?php echo form_error('nphojint{codpainac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('codpainac', array('type' => 'edit', 'nphojint' => $nphojint)); echo $value ? $value : '&nbsp;' ?>
    </div>
    </th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[lugnac]', __($labels['nphojint{lugnac}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{lugnac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{lugnac}')): ?>
    <?php echo form_error('nphojint{lugnac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getLugnac', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'nphojint[lugnac]',
)); echo $value ? $value : '&nbsp;' ?></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[fecnac]', __($labels['nphojint{fecnac}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecnac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecnac}')): ?>
    <?php echo form_error('nphojint{fecnac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecnac', array (
  'rich' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecnac]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'onChange'=> remote_function(array(
        'url'      => 'nomhojint/ajax',
        'complete' => 'AjaxJSON(request, json)',
          'with' => "'ajax=1&cajtexmos=nphojint_edaemp&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[edaemp]', __($labels['nphojint{edaemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{edaemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{edaemp}')): ?>
    <?php echo form_error('nphojint{edaemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getEdaact', array (
  'size' => 3,
  'readonly' => true,
  'control_name' => 'nphojint[edaemp]',
)); echo $value ? $value : '&nbsp;' ?></th>
   </tr>
  </table>


<br>

 <?php echo label_for('nphojint[emaemp]', __($labels['nphojint{emaemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{emaemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{emaemp}')): ?>
    <?php echo form_error('nphojint{emaemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getEmaemp', array (
  'size' => 40,
  'maxlength' => 40,
  'control_name' => 'nphojint[emaemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

  <?php echo label_for('nphojint[emaopc]', __($labels['nphojint{emaopc}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{emaopc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{emaopc}')): ?>
    <?php echo form_error('nphojint{emaopc}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getEmaopc', array (
  'size' => 40,
  'control_name' => 'nphojint[emaopc]',
  'maxlength' => 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>

 <?php echo label_for('nphojint[dirhab]', __($labels['nphojint{dirhab}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{dirhab}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{dirhab}')): ?>
    <?php echo form_error('nphojint{dirhab}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($nphojint, 'getDirhab', array (
  'size' => '80x3',
  'maxlength' => 1000,
  'control_name' => 'nphojint[dirhab]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
   <?php $masktel = $sf_user->getAttribute('masktel','nomina','nomhojint'); $masktel=='' ? $masktel='99999999999999999999' : ''?>
  <table>
   <tr>
   <th> <?php echo label_for('nphojint[celemp]', __($labels['nphojint{celemp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{celemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{celemp}')): ?>
    <?php echo form_error('nphojint{celemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCelemp', array (
  'size' => strlen($masktel),
  'maxlength' => strlen($masktel),
  'onKeyPress' => "javascript : return dFilterv2(event,this,'$masktel')",
  'control_name' => 'nphojint[celemp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
   <th> <?php echo label_for('nphojint[telhab]', __($labels['nphojint{telhab}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{telhab}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{telhab}')): ?>
    <?php echo form_error('nphojint{telhab}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>


  <?php $value = object_input_tag($nphojint, 'getTelhab', array (
  'size' => strlen($masktel),
  'maxlength' => strlen($masktel),
  'onKeyPress' => "javascript : return dFilterv2(event,this,'$masktel')",
  'control_name' => 'nphojint[telhab]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>        
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <td>
    <fieldset id="sf_fieldset_none" class="">
      <div class="form-row">
      <?php if ($nphojint->getDerzur()=='Z')  { ?>
        <?php echo radiobutton_tag('nphojint[derzur]', 'D', false)        ."   Derecho".'&nbsp;&nbsp;'."<Br>";
              echo radiobutton_tag('nphojint[derzur]', 'Z', true)."     Zurdo"."<Br>";?>
        <?php }else{
          echo radiobutton_tag('nphojint[derzur]', 'D', true)        ."Derecho".'&nbsp;&nbsp;'."<Br>";
          echo radiobutton_tag('nphojint[derzur]', 'Z', false)."   Zurdo"."<Br>";
        } ?></div>
      </fieldset>
    </td>    
   </tr>
  </table>

<br>

<table>
   <tr>    
    <th><?php echo label_for('nphojint[grusan]', __($labels['nphojint{grusan}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{grusan}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{grusan}')): ?>
    <?php echo form_error('nphojint{grusan}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[grusan]', options_for_select($listagruposanguineo,$nphojint->getGrusan(),'include_custom=Seleccione Uno')) ?>
  </div></th>       
  <th>&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[talcam]', __($labels['nphojint{talcam}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{talcam}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{talcam}')): ?>
    <?php echo form_error('nphojint{talcam}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[talcam]', options_for_select($listatalla,$nphojint->getTalcam(),'include_custom=Seleccione Uno')) ?>
  </div></th>
    <th>&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[talpan]', __($labels['nphojint{talpan}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{talpan}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{talpan}')): ?>
    <?php echo form_error('nphojint{talpan}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getTalpan', array (
  'size' => 5,
  'maxlength' => 2,
  'control_name' => 'nphojint[talpan]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[talcal]', __($labels['nphojint{talcal}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{talcal}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{talcal}')): ?>
    <?php echo form_error('nphojint{talcal}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getTalcal', array (
  'size' => 5,
  'maxlength' => 4,
  'control_name' => 'nphojint[talcal]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>

<br>
 <?php echo label_for('nphojint[obsgen]', __($labels['nphojint{obsgen}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{obsgen}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{obsgen}')): ?>
    <?php echo form_error('nphojint{obsgen}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($nphojint, 'getObsgen', array (
  'size' => '80x3',
  'maxlength' => 1000,
  'control_name' => 'nphojint[obsgen]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
<table>    
<tr>
<th>
    <div id="ubicados">
 <?php echo label_for('nphojint[ubifis]', __($labels['nphojint{ubifis}']), 'class="required" style="width: 100px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{ubifis}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{ubifis}')): ?>
    <?php echo form_error('nphojint{ubifis}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($nphojint, 'getUbifis', array (
  'size' => 20,
  'maxlength' => 6,
  'control_name' => 'nphojint[ubifis]',
  'onBlur' => "nivel(event,2);"
         )); echo $value ? $value : '&nbsp;' ?></div></div></th>
<th><div id="ubicados2">&nbsp;&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npdefubi_Nomhojint/clase/Npdefubi/frame/sf_admin_edit_form/obj1/nphojint_ubifis/obj2/nphojint_desniv2/campo1/codubi/campo2/desubi')?></div></th>
   <th> <div id="ubicados3"><?php $value = object_input_tag($nphojint, 'getDesniv2', array (
  'readonly' => true,
  'size' => 60,
  'control_name' => 'nphojint[desniv2]',
           )); echo $value ? $value : '&nbsp;' ?></div></th>

  </tr>
  </div>    
 </table>

<br>

 <?php echo label_for('nphojint[codtipemp]', __($labels['nphojint{codtipemp}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codtipemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codtipemp}')): ?>
    <?php echo form_error('nphojint{codtipemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[codtipemp]', options_for_select($listtipemp,$nphojint->getCodtipemp(),'include_custom=Seleccione Uno')) ?>
    </div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage2", 'Habitación');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('nphojint[codpai]', __($labels['nphojint{codpai}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codpai}')): ?>
    <?php echo form_error('nphojint{codpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[codpai]', options_for_select($estados,$nphojint->getCodpai(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipios',
    'url'      => 'nomhojint/combo?par=1',
    'with' => "'estado='+this.value"
  ))));?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('nphojint[codest]', __($labels['nphojint{codest}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codest}')): ?>
    <?php echo form_error('nphojint{codest}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <div id="divMunicipios">
<?php echo select_tag('nphojint[codest]', options_for_select($municipios,$nphojint->getCodest(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias',
    'url'      => 'nomhojint/combo?par=2',
    'with' => "'estado='+document.getElementById('nphojint_codpai').value+'&municipio='+this.value"
  ))));?></div>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[codciu]', __($labels['nphojint{codciu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codciu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codciu}')): ?>
    <?php echo form_error('nphojint{codciu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<div id="divParroquias">
<?php echo select_tag('nphojint[codciu]', options_for_select($parroquias,$nphojint->getCodciu(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divotro',
    'url'      => 'nomhojint/combo?par=3',
    'with' => "'estado='+document.getElementById('nphojint_codpai').value+'&municipio='+document.getElementById('nphojint_codest').value+'&parroquia='+this.value"
  ))));?></div>
    </div></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
   <th><?php echo label_for('nphojint[telotr]', __($labels['nphojint{telotr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{telotr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{telotr}')): ?>
    <?php echo form_error('nphojint{telotr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getTelotr', array (
   'size' => strlen($masktel),
  'maxlength' => strlen($masktel),
  'onKeyPress' => "javascript : return dFilterv2(event,this,'$masktel')",
  'control_name' => 'nphojint[telotr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>   
   </tr>
  </table>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Otra Ubicación')?></h2></legend>
<div class="form-row">
 <?php echo label_for('nphojint[dirotr]', __($labels['nphojint{dirotr}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{dirotr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{dirotr}')): ?>
    <?php echo form_error('nphojint{dirotr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($nphojint, 'getDirotr', array (
  'size' => '80x3',
  'maxlength' => 1000,
  'control_name' => 'nphojint[dirotr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <table>
   <tr>
    <th><?php echo label_for('nphojint[codpa2]', __($labels['nphojint{codpa2}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codpa2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codpa2}')): ?>
    <?php echo form_error('nphojint{codpa2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo select_tag('nphojint[codpa2]', options_for_select($estados2,$nphojint->getCodpa2(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipios2',
    'url'      => 'nomhojint/combo?par=4',
    'with' => "'estado2='+this.value"
  ))));?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('nphojint[codes2]', __($labels['nphojint{codes2}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codes2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codes2}')): ?>
    <?php echo form_error('nphojint{codes2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <div id="divMunicipios2">
<?php echo select_tag('nphojint[codes2]', options_for_select($municipios2,$nphojint->getCodes2(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias2',
    'url'      => 'nomhojint/combo?par=5',
    'with' => "'estado2='+document.getElementById('nphojint_codpa2').value+'&municipio2='+this.value"
  ))));?></div>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('nphojint[codci2]', __($labels['nphojint{codci2}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codci2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codci2}')): ?>
    <?php echo form_error('nphojint{codci2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <div id="divParroquias2">
<?php echo select_tag('nphojint[codci2]', options_for_select($parroquias2,$nphojint->getCodci2(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divotro2',
    'url'      => 'nomhojint/combo?par=6',
    'with' => "'estado2='+document.getElementById('nphojint_codpa2').value+'&municipio2='+document.getElementById('nphojint_codes2').value+'&parroquia2='+this.value"
  ))));?></div>
    </div></th>
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th><?php echo label_for('nphojint[telha2]', __($labels['nphojint{telha2}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{telha2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{telha2}')): ?>
    <?php echo form_error('nphojint{telha2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getTelha2', array (
   'size' => strlen($masktel),
  'maxlength' => strlen($masktel),
  'onKeyPress' => "javascript : return dFilterv2(event,this,'$masktel')",
  'control_name' => 'nphojint[telha2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[telot2]', __($labels['nphojint{telot2}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{telot2}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{telot2}')): ?>
    <?php echo form_error('nphojint{telot2}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getTelot2', array (
 'size' => strlen($masktel),
  'maxlength' => strlen($masktel),
  'onKeyPress' => "javascript : return dFilterv2(event,this,'$masktel')",
  'control_name' => 'nphojint[telot2]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('nphojint[codpos]', __($labels['nphojint{codpos}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codpos}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codpos}')): ?>
    <?php echo form_error('nphojint{codpos}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCodpos', array (
  'size' => 20,
  'maxlength' => 4,
  'control_name' => 'nphojint[codpos]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage3", 'Ingresos');?>
<div id="div_tab3">
<fieldset id="sf_fieldset_none_tab3" class="">
<?php echo button_to_popup('Ver Historial de Permisos',cross_app_link_to('nomina','/nomfalperper/edit/codigoemp/'.$nphojint->getCodemp()),'','','','1000','800')?>
<?php echo button_to_popup('Ver Historial de Reposos',cross_app_link_to('nomina','/nomfalperrep/edit/codigoemp/'.$nphojint->getCodemp()),'','','','1000','800')?>
<?php echo button_to_popup('Ver Disfrute de Vacaciones',cross_app_link_to('nomina','/vachistorico/edit/id/'.$nphojint->getId()),'','','','1000','800')?>
<?php echo button_to_popup('Ver Histórico de Anticipo de Prestaciones',cross_app_link_to('nomina','/presnomreghisantpre/edit/id/'.H::getX_vacio('Codemp', 'Npantpre', 'Id', $nphojint->getCodemp())),'','','','1000','800')?>
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Fechas') ?></h2></legend>
<div class="form-row">
<?php if ($nphojint->getId()=='')
  {?>
  <table>
   <tr>

    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[fecret]', __($labels['nphojint{fecret}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecret}')): ?>
    <?php echo form_error('nphojint{fecret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecret', array (
  'rich' => true,
  'readonly' =>true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecret]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>

<br>

<?php echo label_for('nphojint[fecrei]', __($labels['nphojint{fecrei}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecrei}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecrei}')): ?>
    <?php echo form_error('nphojint{fecrei}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecrei', array (
  'rich' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecrei]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<?php }else {?>
  <table>
   <tr>

    <th><?php echo label_for('nphojint[fecret]', __($labels['nphojint{fecret}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecret}')): ?>
    <?php echo form_error('nphojint{fecret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecret', array (
  'rich' => true,
  'maxlength' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecret]',
  'date_format' => 'dd/MM/yy',
  'onChange' => "retiro(this)",
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
   </tr>
  </table>

<br>

<?php echo label_for('nphojint[codmot]', __($labels['nphojint{codmot}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codmot}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codmot}')): ?>
    <?php echo form_error('nphojint{codmot}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

 <?php $value = object_input_tag($nphojint, 'getCodmot', array (
  'size' => 20,
  'maxlength' => 4,
  'control_name' => 'nphojint[codmot]',
  'onBlur'=> remote_function(array(
        'url'      => 'nomhojint/ajax', 
	'condition' => "$('nphojint_codmot').value!='' ",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=9&cajtexmos=nphojint_desmot&cajtexcom=nphojint_codmot&codigo='+this.value",
        ))
)); echo $value ? $value : '&nbsp;' ?>

  &nbsp;&nbsp;&nbsp;<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Npmotegr_Nomhojint/clase/Npmotegr/frame/sf_admin_edit_form/obj1/nphojint_codmot/obj2/nphojint_desmot/campo1/codmot/campo2/desmot')?>
&nbsp;&nbsp;&nbsp;
 <?php $value = object_input_tag($nphojint, 'getDesmot', array (
  'readonly' => true,
  'size' => 60,
  'control_name' => 'nphojint[desmot]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

<?php echo label_for('nphojint[fecrei]', __($labels['nphojint{fecrei}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecrei}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecrei}')): ?>
    <?php echo form_error('nphojint{fecrei}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
<?php if ($nphojint->getFecret()=="") {?>
  <?php $value = object_input_date_tag($nphojint, 'getFecrei', array (
  'rich' => true,
  'readonly' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecrei]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
<?php }else {?>
<?php $value = object_input_date_tag($nphojint, 'getFecrei', array (
  'rich' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecrei]',
  'date_format' => 'dd/MM/yy',
  'onChange' => "reingreso(this)",
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
<?php }?>

    </div>
<?php }?>
<div id="divfectitular">
<br>

<?php echo label_for('nphojint[fectitular]', __($labels['nphojint{fectitular}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fectitular}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fectitular}')): ?>
    <?php echo form_error('nphojint{fectitular}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFectitular', array (
  'rich' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fectitular]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
</div>
</div>
</fieldset>

<br>

<?php
echo grid_tag($obj);
?>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Otros Datos') ?></h2></legend>
<div class="form-row">

<div id="divfecadmpub" style="display:none">
<?php echo label_for('nphojint[fecadmpub]', __($labels['nphojint{fecadmpub}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{fecadmpub}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{fecadmpub}')): ?>
    <?php echo form_error('nphojint{fecadmpub}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($nphojint, 'getFecadmpub', array (
  'rich' => true,
  'maxlength' => 10,
  'size' => 10,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'nphojint[fecadmpub]',
  'date_format' => 'dd/MM/yy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
)); echo $value ? $value : '&nbsp;' ?>
</div>
<br><br>
</div>

<?php echo label_for('nphojint[staemp]', __($labels['nphojint{staemp}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{staemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{staemp}')): ?>
    <?php echo form_error('nphojint{staemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[staemp]', options_for_select($listaestatus,$nphojint->getStaemp(),'include_custom=Seleccione Uno'),array('onChange' => "validaregreso(this.value);")) ?>
    </div>
    <br>
<?php echo label_for('nphojint[situac]', __($labels['nphojint{situac}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{situac}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{situac}')): ?>
    <?php echo form_error('nphojint{situac}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[situac]', options_for_select($listasituacion,$nphojint->getSituac(),'include_custom=Seleccione Uno')) ?>
    </div>
    <br>
    <?php echo label_for('nphojint[fecinicon]', __($labels['nphojint{fecinicon}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('nphojint{fecinicon}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('nphojint{fecinicon}')): ?>
        <?php echo form_error('nphojint{fecinicon}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_date_tag($nphojint, 'getFecinicon', array (
      'rich' => true,
      'maxlength' => 10,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'nphojint[fecinicon]',
      'date_format' => 'dd/MM/yy',
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
    <br>
    <?php echo label_for('nphojint[fecfincon]', __($labels['nphojint{fecfincon}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('nphojint{fecfincon}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('nphojint{fecfincon}')): ?>
        <?php echo form_error('nphojint{fecfincon}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_date_tag($nphojint, 'getFecfincon', array (
      'rich' => true,
      'maxlength' => 10,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'nphojint[fecfincon]',
      'date_format' => 'dd/MM/yy',
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
    <br>
    <div id="fecsso">
    <?php echo label_for('nphojint[fecingsso]', __($labels['nphojint{fecingsso}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('nphojint{fecingsso}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('nphojint{fecingsso}')): ?>
        <?php echo form_error('nphojint{fecingsso}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php $value = object_input_date_tag($nphojint, 'getFecingsso', array (
      'rich' => true,
      'maxlength' => 10,
      'calendar_button_img' => '/sf/sf_admin/images/date.png',
      'control_name' => 'nphojint[fecingsso]',
      'date_format' => 'dd/MM/yy',
      'onkeyup' => "javascript: mascara(this,'/',patron,true)",
    )); echo $value ? $value : '&nbsp;' ?>
        </div>
        </div>
    <br> 
        <br>        
</div>
</fieldset>
</div>
</fieldset>
</div>
<?php tabPageOpenClose("tp1", "tabPage4", 'Información Bancaria');?>
<div id="div_tab4">
<fieldset id="sf_fieldset_none_tab4" class="">
<div class="form-row">
 <?php echo label_for('nphojint[codtippag]', __($labels['nphojint{codtippag}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codtippag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codtippag}')): ?>
    <?php echo form_error('nphojint{codtippag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[codtippag]', options_for_select($listaformapago,$nphojint->getCodtippag(),'include_custom=Seleccione Uno')) ?>
    </div>

<br>

 <?php echo label_for('nphojint[codban]', __($labels['nphojint{codban}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codban}')): ?>
    <?php echo form_error('nphojint{codban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[codban]', options_for_select($bancos,$nphojint->getCodban(),'include_custom=Seleccione Uno')); ?>
    </div>

<br>

 <?php echo label_for('nphojint[numcue]', __($labels['nphojint{numcue}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{numcue}')): ?>
    <?php echo form_error('nphojint{numcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
 <?php $longfunda = H::getConfApp2('longfunda','nomina','nomhojint'); 
 $longfunda=='S' ? $mxl=20 : $mxl=31; ?>

  <?php $value = object_input_tag($nphojint, 'getNumcue', array (
  'size' => 31,
  'maxlength' =>  $mxl,
  'control_name' => 'nphojint[numcue]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <?php echo label_for('nphojint[tipcue]', __($labels['nphojint{tipcue}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{tipcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{tipcue}')): ?>
    <?php echo form_error('nphojint{tipcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[tipcue]', options_for_select($listatipocuenta,$nphojint->getTipcue(),'include_custom=Seleccione Uno')) ?>
    </div>

<br>

 <?php echo label_for('nphojint[numcueaho]', __($labels['nphojint{numcueaho}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{numcueaho}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{numcueaho}')): ?>
    <?php echo form_error('nphojint{numcueaho}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNumcueaho', array (
  'size' => 31,
  'maxlength' => 31,
  'control_name' => 'nphojint[numcueaho]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <?php echo label_for('nphojint[tipcueaho]', __($labels['nphojint{tipcueaho}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{tipcueaho}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{tipcueaho}')): ?>
    <?php echo form_error('nphojint{tipcueaho}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[tipcueaho]', options_for_select($listatipocuenta,$nphojint->getTipcueaho(),'include_custom=Seleccione Uno')) ?>
    </div>

<br>

 <?php echo label_for('nphojint[numcuefid]', __($labels['nphojint{numcuefid}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{numcuefid}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{numcuefid}')): ?>
    <?php echo form_error('nphojint{numcuefid}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNumcuefid', array (
  'size' => 31,
  'maxlength' => 31,
  'control_name' => 'nphojint[numcuefid]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
 <?php echo label_for('nphojint[tipcuefid]', __($labels['nphojint{tipcuefid}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{tipcuefid}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{tipcuefid}')): ?>
    <?php echo form_error('nphojint{tipcuefid}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[tipcuefid]', options_for_select($listatipocuenta,$nphojint->getTipcuefid(),'include_custom=Seleccione Uno')) ?>
    </div>
<br>
 <?php echo label_for('nphojint[codbanfid]', __($labels['nphojint{codbanfid}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codbanfid}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codbanfid}')): ?>
    <?php echo form_error('nphojint{codbanfid}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[codbanfid]', options_for_select($bancos,$nphojint->getCodbanfid(),'include_custom=Seleccione Uno')); ?>
    </div>
    <br>
<div id="cuentamatriz" style="display:none">
   <?php echo label_for('nphojint[cuebanmat]', __($labels['nphojint{cuebanmat}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{cuebanmat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{cuebanmat}')): ?>
    <?php echo form_error('nphojint{cuebanmat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getCuebanmat', array (
  'size' => 31,
  'maxlength' => 20,
  'control_name' => 'nphojint[cuebanmat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div id="datbonoali" style="display:none">
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Información de Bono de Alimentación') ?></h2></legend>
<div class="form-row">
<?php echo label_for('nphojint[codpagbon]', __($labels['nphojint{codpagbon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codpagbon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codpagbon}')): ?>
    <?php echo form_error('nphojint{codpagbon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[codpagbon]', options_for_select($listaformapago,$nphojint->getCodpagbon(),'include_custom=Seleccione Uno')) ?>
    </div>

<br>

 <?php echo label_for('nphojint[codbanbon]', __($labels['nphojint{codbanbon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codbanbon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codbanbon}')): ?>
    <?php echo form_error('nphojint{codbanbon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[codbanbon]', options_for_select($bancos,$nphojint->getCodbanbon(),'include_custom=Seleccione Uno')); ?>
    </div>

<br>

 <?php echo label_for('nphojint[numcuebon]', __($labels['nphojint{numcuebon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{numcuebon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{numcuebon}')): ?>
    <?php echo form_error('nphojint{numcuebon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
 <?php $longfunda = H::getConfApp2('longfunda','nomina','nomhojint'); 
 $longfunda=='S' ? $mxl=20 : $mxl=31; ?>

  <?php $value = object_input_tag($nphojint, 'getNumcuebon', array (
  'size' => 31,
  'maxlength' =>  $mxl,
  'control_name' => 'nphojint[numcuebon]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

 <?php echo label_for('nphojint[tipcuebon]', __($labels['nphojint{tipcuebon}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{tipcuebon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{tipcuebon}')): ?>
    <?php echo form_error('nphojint{tipcuebon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[tipcuebon]', options_for_select($listatipocuenta,$nphojint->getTipcuebon(),'include_custom=Seleccione Uno')) ?>
    </div>
</div>
</fieldset>
</div>

</div>
</fieldset>
</div>

<?php tabPageOpenClose("tp1", "tabPage5", 'Información Prestaciones Sociales(Acumulado)');?>
<div id="div_tab5">
<fieldset id="sf_fieldset_none_tab5" class="">
<div class="form-row">

<table>
	<tr>
		<th>
			  <?php echo label_for('nphojint[feccoracu]', __($labels['nphojint{feccoracu}']), 'class="required"') ?>
				  <div class="content<?php if ($sf_request->hasError('nphojint{feccoracu}')): ?> form-error<?php endif; ?>">
				  <?php if ($sf_request->hasError('nphojint{feccoracu}')): ?>
				    <?php echo form_error('nphojint{feccoracu}', array('class' => 'form-error-msg')) ?>
				  <?php endif; ?>

				  <?php $value = object_input_date_tag($nphojint, 'getFeccoracu', array (
				  'rich' => true,
				  'calendar_button_img' => '/sf/sf_admin/images/date.png',
				  'control_name' => 'nphojint[feccoracu]',
				)); echo $value ? $value : '&nbsp;' ?>
				    </div>
		</th>
		<th width="150">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		<th><?php echo label_for('nphojint[capactacu]', __($labels['nphojint{capactacu}']), 'class="required"') ?>
			  <div class="content<?php if ($sf_request->hasError('nphojint{capactacu}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('nphojint{capactacu}')): ?>
			    <?php echo form_error('nphojint{capactacu}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($nphojint, array('getCapactacu',true), array (
			  'size' => 10,
			  'control_name' => 'nphojint[capactacu]',
			  'onBlur'=> "javascript:event.keyCode=13;entermontootro(event, this.id); "
			)); echo $value ? $value : '&nbsp;' ?>
			    </div>
		</th>
	</tr>
	<tr>
		<th>&nbsp;&nbsp;&nbsp;</th>
	</tr>
	<tr>
		<th>&nbsp;&nbsp;&nbsp;</th>
	</tr>
	<tr>
		<th>
			<?php echo label_for('nphojint[intacu]', __($labels['nphojint{intacu}']), 'class="required"') ?>
			  <div class="content<?php if ($sf_request->hasError('nphojint{intacu}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('nphojint{intacu}')): ?>
			    <?php echo form_error('nphojint{intacu}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($nphojint, array('getIntacu',true), array (
			  'size' => 10,
			  'control_name' => 'nphojint[intacu]',
			  'onBlur'=> "javascript:event.keyCode=13;entermontootro(event, this.id); "
			)); echo $value ? $value : '&nbsp;' ?>
			    </div>
		</th>
        <th>&nbsp;&nbsp;&nbsp;</th>
		<th>
		  <?php echo label_for('nphojint[antacu]', __($labels['nphojint{antacu}']), 'class="required"') ?>
		  <div class="content<?php if ($sf_request->hasError('nphojint{antacu}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('nphojint{antacu}')): ?>
		    <?php echo form_error('nphojint{antacu}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($nphojint, array('getAntacu',true), array (
		  'size' => 10,
		  'control_name' => 'nphojint[antacu]',
		  'onBlur'=> "javascript:event.keyCode=13;entermontootro(event, this.id); "
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
		</th>
	</tr>
	<tr>
		<th>&nbsp;&nbsp;&nbsp;</th>
	</tr>
	<tr>
		<th>&nbsp;&nbsp;&nbsp;</th>
	</tr>
	<tr>
		<th><?php echo label_for('nphojint[diaacu]', __($labels['nphojint{diaacu}']), 'class="required"') ?>
		  <div class="content<?php if ($sf_request->hasError('nphojint{diaacu}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('nphojint{diaacu}')): ?>
		    <?php echo form_error('nphojint{diaacu}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($nphojint, 'getDiaacu', array (
		  'size' => 10,
		  'control_name' => 'nphojint[diaacu]',
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
		</th>
		<th>&nbsp;&nbsp;&nbsp;</th>
		<th>
			<?php echo label_for('nphojint[diaadiacu]', __($labels['nphojint{diaadiacu}']), 'class="required"') ?>
			  <div class="content<?php if ($sf_request->hasError('nphojint{diaadiacu}')): ?> form-error<?php endif; ?>">
			  <?php if ($sf_request->hasError('nphojint{diaadiacu}')): ?>
			    <?php echo form_error('nphojint{diaadiacu}', array('class' => 'form-error-msg')) ?>
			  <?php endif; ?>

			  <?php $value = object_input_tag($nphojint, 'getDiaadiacu', array (
			  'size' => 10,
			  'control_name' => 'nphojint[diaadiacu]',
			)); echo $value ? $value : '&nbsp;' ?>
			    </div>
		</th>
	</tr>
</table>

</div>
</fieldset>
</div>

<?php tabPageOpenClose("tp1", "tabPage6", 'Experiencia Laboral');?>
<div id="div_tab6">
<fieldset id="sf_fieldset_none_tab6" class="">
  <?php echo button_to_popup('Ver Jornada Laboral',cross_app_link_to('nomina','/nomjorlabind/edit/id/'.H::getX_vacio('Codemp', 'npempjorlab', 'Id', $nphojint->getCedemp())),'','','','1000','800')?>
<div class="form-row">
<?php
echo grid_tag($obj2);
?>

<br>

<?php
echo grid_tag($obj3);
?>
</div>
</fieldset>
</div>

<?php tabPageOpenClose("tp1", "tabPage7", 'Información Curricular');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php echo label_for('nphojint[codnivedu]', __($labels['nphojint{codnivedu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codnivedu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codnivedu}')): ?>
    <?php echo form_error('nphojint{codnivedu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[codnivedu]', options_for_select($listanivelestudio,$nphojint->getCodnivedu(),'include_custom=Seleccione Uno')) ?>
    </div>
<br>
<?php
echo grid_tag($obj4);
?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage8", 'Información Familiar');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<?php
echo grid_tag($obj5);
?>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage9", 'Otras Características');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Ubicación Laboral')?></h2></legend>
<div class="form-row">
  <table>
   <tr>
    <th><?php echo label_for('nphojint[codregpai]', __($labels['nphojint{codregpai}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codregpai}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codregpai}')): ?>
    <?php echo form_error('nphojint{codregpai}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <?php echo select_tag('nphojint[codregpai]', options_for_select($estados3,$nphojint->getCodregpai(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divMunicipios3',
    'url'      => 'nomhojint/combo?par=7',
        'complete' => 'AjaxJSON(request, json)',
    'with' => "'estado3='+this.value"
  ))));?>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th><?php echo label_for('nphojint[codregest]', __($labels['nphojint{codregest}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codregest}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codregest}')): ?>
    <?php echo form_error('nphojint{codregest}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <div id="divMunicipios3">
<?php echo select_tag('nphojint[codregest]', options_for_select($municipios3,$nphojint->getCodregest(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divParroquias3',
    'url'      => 'nomhojint/combo?par=8',
    'with' => "'estado3='+document.getElementById('nphojint_codregpai').value+'&municipio3='+this.value"
  ))));?></div>
    </div></th>
    <th>&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th> <?php echo label_for('nphojint[codregciu]', __($labels['nphojint{codregciu}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codregciu}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codregciu}')): ?>
    <?php echo form_error('nphojint{codregciu}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

   <div id="divParroquias3">
<?php echo select_tag('nphojint[codregciu]', options_for_select($parroquias3,$nphojint->getCodregciu(),'include_custom=Seleccione Uno'),array('onChange'=> remote_function(array(
    'update'   => 'divotro3',
    'url'      => 'nomhojint/combo?par=9',
    'with' => "'estado3='+document.getElementById('nphojint_codregpai').value+'&municipio3='+document.getElementById('nphojint_codregest').value+'&parroquia3='+this.value"
  ))));?></div>
</div></th>
   </tr>
  </table>
</div>
</fieldset>

<br>

  <table>
   <tr>
    <th>
     <fieldset id="sf_fieldset_none" class="">
     <legend><h2><?php echo __('Condición Contractual')?></h2></legend>
      <div class="form-row">
      <?php echo label_for('nphojint[grulab]', __($labels['nphojint{grulab}']), 'class="required" ') ?>
      <div class="content<?php if ($sf_request->hasError('nphojint{grulab}')): ?> form-error<?php endif; ?>">
      <?php if ($sf_request->hasError('nphojint{grulab}')): ?>
      <?php echo form_error('nphojint{grulab}', array('class' => 'form-error-msg')) ?>
      <?php endif; ?>

      <?php echo select_tag('nphojint[grulab]', options_for_select($grupol,$nphojint->getGrulab(),'include_custom=Seleccione Uno')) ?>
      </div>

      <br>

       <?php echo label_for('nphojint[gruotr]', __($labels['nphojint{gruotr}']), 'class="required" ') ?>
       <div class="content<?php if ($sf_request->hasError('nphojint{gruotr}')): ?> form-error<?php endif; ?>">
       <?php if ($sf_request->hasError('nphojint{gruotr}')): ?>
       <?php echo form_error('nphojint{gruotr}', array('class' => 'form-error-msg')) ?>
       <?php endif; ?>

       <?php $value = object_input_tag($nphojint, 'getGruotr', array (
       'size' => 30,
       'maxlength' => 30,
       'control_name' => 'nphojint[gruotr]',
       )); echo $value ? $value : '&nbsp;' ?>
       </div>
      </div>
     </fieldset>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
     <fieldset id="sf_fieldset_none" class="">
     <legend><h2><?php echo __('Forma de Traslado al Trabajo')?></h2></legend>
      <div class="form-row">
       <?php echo label_for('nphojint[traslado]', __($labels['nphojint{traslado}']), 'class="required" ') ?>
       <div class="content<?php if ($sf_request->hasError('nphojint{traslado}')): ?> form-error<?php endif; ?>">
       <?php if ($sf_request->hasError('nphojint{traslado}')): ?>
       <?php echo form_error('nphojint{traslado}', array('class' => 'form-error-msg')) ?>
       <?php endif; ?>

       <?php echo select_tag('nphojint[traslado]', options_for_select($listaformatraslado,$nphojint->getTraslado(),'include_custom=Seleccione Uno')) ?>
       </div>

       <br>

       <?php echo label_for('nphojint[traotr]', __($labels['nphojint{traotr}']), 'class="required" ') ?>
       <div class="content<?php if ($sf_request->hasError('nphojint{traotr}')): ?> form-error<?php endif; ?>">
       <?php if ($sf_request->hasError('nphojint{traotr}')): ?>
       <?php echo form_error('nphojint{traotr}', array('class' => 'form-error-msg')) ?>
       <?php endif; ?>

       <?php $value = object_input_tag($nphojint, 'getTraotr', array (
       'size' => 30,
       'maxlength' => 30,
       'control_name' => 'nphojint[traotr]',
       )); echo $value ? $value : '&nbsp;' ?>
       </div>
      </div>
      </fieldset>
    </th>
    <th>
     <fieldset id="sf_fieldset_none" class="">
     <legend><h2><?php echo __('Vehículo Propio')?></h2></legend>
      <div class="form-row">
       <?php echo label_for('nphojint[posveh]', __($labels['nphojint{posveh}']), 'class="required" style="width: 150px"') ?>
       <?php echo select_tag('nphojint[posveh]', options_for_select(array(0 => 'No', 1 => 'Sí'),$nphojint->getPosveh(),'')) ?>
      </div>
       <br>

       <div class="form-row">
       <?php echo label_for('nphojint[marveh]', __($labels['nphojint{marveh}']), 'class="required" ') ?>

       <?php $value = object_input_tag($nphojint, 'getMarveh', array (
       'size' => 30,
       'maxlength' => 30,
       'control_name' => 'nphojint[marveh]',
       )); echo $value ? $value : '&nbsp;' ?>
       </div>
       <br>

       <div class="form-row">
       <?php echo label_for('nphojint[modveh]', __($labels['nphojint{modveh}']), 'class="required" ') ?>

       <?php $value = object_input_tag($nphojint, 'getModveh', array (
       'size' => 30,
       'maxlength' => 30,
       'control_name' => 'nphojint[modveh]',
       )); echo $value ? $value : '&nbsp;' ?>
       </div>
       <br>

       <div class="form-row">
       <?php echo label_for('nphojint[colveh]', __($labels['nphojint{colveh}']), 'class="required" ') ?>

       <?php $value = object_input_tag($nphojint, 'getColveh', array (
       'size' => 30,
       'maxlength' => 30,
       'control_name' => 'nphojint[colveh]',
       )); echo $value ? $value : '&nbsp;' ?>
       </div>
       <br>

       <div class="form-row">
       <?php echo label_for('nphojint[anoveh]', __($labels['nphojint{anoveh}']), 'class="required" ') ?>

       <?php $value = object_input_tag($nphojint, 'getAnoveh', array (
       'size' => 30,
       'maxlength' => 30,
       'control_name' => 'nphojint[anoveh]',
       )); echo $value ? $value : '&nbsp;' ?>
       </div>
       <br>

       <div class="form-row">
       <?php echo label_for('nphojint[plaveh]', __($labels['nphojint{plaveh}']), 'class="required" ') ?>

       <?php $value = object_input_tag($nphojint, 'getPlaveh', array (
       'size' => 30,
       'maxlength' => 30,
       'control_name' => 'nphojint[plaveh]',
       )); echo $value ? $value : '&nbsp;' ?>
      </div>
      <br>
       <div class="form-row">
         <?php echo label_for('nphojint[privehmot]', __($labels['nphojint{privehmot}']), 'class="required" style="width: 150px"') ?>
 
        <?php $value = object_checkbox_tag($nphojint, 'getPrivehmot', array (
        'control_name' => 'nphojint[privehmot]',
      )); echo $value ? $value : '&nbsp;' ?> <br>
       </div>  

      </fieldset>
    </th>
   </tr>
  </table>

<br>

  <table>
   <tr>
    <th>
     <fieldset id="sf_fieldset_none" class="">
     <legend><h2><?php echo __('Número de Expediente')?></h2></legend>
      <div class="form-row">
       <table>
        <tr>
        <th><?php echo label_for('nphojint[numexp]', __($labels['nphojint{numexp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{numexp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{numexp}')): ?>
    <?php echo form_error('nphojint{numexp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getNumexp', array (
  'size' => 20,
  'maxlength' => 15,
  'control_name' => 'nphojint[numexp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
        <th> <?php echo label_for('nphojint[detexp]', __($labels['nphojint{detexp}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{detexp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{detexp}')): ?>
    <?php echo form_error('nphojint{detexp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($nphojint, 'getDetexp', array (
  'size' => '30x2',
  'maxlength' => 15,
  'control_name' => 'nphojint[detexp]',
)); echo $value ? $value : '&nbsp;' ?>
    </div></th>
        </tr>
       </table>
      </div>
      </fieldset>
    </th>
   </tr>
  </table>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage10", 'Condiciones de la Vivienda');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">
<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Tipo de Vivienda')?></h2></legend>
<div class="form-row">
<?php echo label_for('nphojint[tipviv]', __($labels['nphojint{tipviv}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{tipviv}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{tipviv}')): ?>
    <?php echo form_error('nphojint{tipviv}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[tipviv]', options_for_select($listatipovivienda,$nphojint->getTipviv(),'include_custom=Seleccione Uno')) ?>
  </div>
<br>
   <?php echo label_for('nphojint[vivotr]', __($labels['nphojint{vivotr}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{vivotr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{vivotr}')): ?>
    <?php echo form_error('nphojint{vivotr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getVivotr', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'nphojint[vivotr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Forma de Tenencia')?></h2></legend>
<div class="form-row">
<?php echo label_for('nphojint[forten]', __($labels['nphojint{forten}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{forten}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{forten}')): ?>
    <?php echo form_error('nphojint{forten}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php echo select_tag('nphojint[forten]', options_for_select($listaformatenencia,$nphojint->getForten(),'include_custom=Seleccione Uno')) ?>
</div>

<br>

<?php echo label_for('nphojint[tenotr]', __($labels['nphojint{tenotr}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{tenotr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{tenotr}')): ?>
    <?php echo form_error('nphojint{tenotr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, 'getTenotr', array (
  'size' => 30,
  'maxlength' => 30,
  'control_name' => 'nphojint[tenotr]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset id="sf_fieldset_none" class="">
<legend><h2><?php echo __('Servicios de la Comunidad donde Vive')?></h2></legend>
<div class="form-row">
<?php $arr= array(); if ($nphojint->getSercon()!="") {$arr=split('-',$nphojint->getSercon());}?>
<?php echo select_tag('arreglo', options_for_select($listaservicios,$arr,''),array('multiple' => true, 'size' => 4)) ?>
</div>  <!-- Para Efectos de reportes revisar la en Lib/Contanstes.class.php/Lista de Servicios
  para que puedan saber con que comparar no se guarda igual que en visual Basic-->
</fieldset>
</div>
</fieldset>

<!-- Pestaña de Discapacidades-->
<?php tabPageOpenClose("tp1", "tabPage11", 'Discapacidades');?>
<fieldset id="sf_fieldset_none" class="">
<div class="form-row">

<div id="doblelista"class="form-row">
  <div class="content<?php if ($sf_request->hasError('nphojint{incapacidades}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{incapacidades}')): ?>
    <?php echo form_error('nphojint{incapacidades}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_double_list_criteria($c,$nphojint, 'getIncapacidades', array (
  'control_name' => 'nphojint[incapacidades]',
  'through_class' => 'Nphojintinc',
  'unassociated_label' => 'Discapacidades',
  'associated_label' => 'Discapacidades Seleccionadas',
  'style' => 'width:450px'
)); echo $value ? $value : '&nbsp;' ?>
<!-- Fin Pestaña de Incapacidades-->

    </div>
</div>
</div>
</fieldset>

<?php tabPageOpenClose("tp1", "tabPage12", 'Documentos que Reposan en el Expediente');?>
<div id="div_tab12">
<fieldset id="sf_fieldset_none_tab12" class="">
<div class="form-row">
<?php
echo grid_tag($obj6);
?>
</div>
</fieldset>
</div>

<?php tabPageOpenClose("tp1", "tabPage13", 'Información Embargos de Sueldos y otros');?>
<div id="div_tab13">
<fieldset id="sf_fieldset_none_tab13" class="">
<div class="form-row">
 <?php echo label_for('nphojint[obsembret]', __($labels['nphojint{obsembret}']), 'class="required" style="width: 150px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{obsembret}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{obsembret}')): ?>
    <?php echo form_error('nphojint{obsembret}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($nphojint, 'getObsembret', array (
  'size' => '80x3',
  'maxlength' => 1000,
  'control_name' => 'nphojint[obsembret]',
  'onkeyup' => "javascript:return ismaxlength(this)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>

    <br>
    <?php if ($nphojint->getId()) { ?>
    <input name="relemp" type="button" value="Agregar Otros Datos Relacionados al Empleado" onClick="mostrarFormulario()">
    <?php //echo button_to_popup('Agregar Otros Datos Relacionados al Empleado',cross_app_link_to('nomina','/nomdatrelemp/edit/id/'.$nphojint->getId()),'','','','1000','800')?>
    <?php } ?>
</div>
</fieldset>
</div>

<?php tabPageOpenClose("tp1", "tabPage14", 'Información de los Herederos');?>
<div id="div_tab14">
<fieldset id="sf_fieldset_none_tab14" class="">
<div class="form-row">
<?php
echo grid_tag($obj7);
?>
</div>
</fieldset>
</div>
<?php tabPageOpenClose("tp1", "tabPage15", 'Núcleos');?>
<div id="div_tab15">
<fieldset id="sf_fieldset_none_tab15" class="">
<div class="form-row">
<?php
echo grid_tag_v2($obj8);
?>
</div>
</fieldset>
</div>

<?php tabPageOpenClose("tp1", "tabPage16", 'Otros Datos');?>
<div id="div_tab16">
<fieldset id="sf_fieldset_none_tab16" class="">
<div class="form-row">
  <?php echo label_for('nphojint[pesemp]', __($labels['nphojint{pesemp}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{pesemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{pesemp}')): ?>
    <?php echo form_error('nphojint{pesemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, array('getPesemp',true), array (
  'size' => 7,
  'control_name' => 'nphojint[pesemp]',
  'class' => 'grid_txtright',
  'onblur'=> "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('nphojint[estemp]', __($labels['nphojint{estemp}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{estemp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{estemp}')): ?>
    <?php echo form_error('nphojint{estemp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, array('getEstemp',true), array (
  'size' => 7,
  'control_name' => 'nphojint[estemp]',
  'class' => 'grid_txtright',
  'onblur'=> "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>    
<br>
  <?php echo label_for('nphojint[monindem]', __($labels['nphojint{monindem}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{monindem}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{monindem}')): ?>
    <?php echo form_error('nphojint{monindem}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($nphojint, array('getMonindem',true), array (
  'size' => 10,
  'control_name' => 'nphojint[monindem]',
  'class' => 'grid_txtright',
  'onblur'=> "javascript:event.keyCode=13;return entermontootro(event,this.id)",
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('nphojint[codpro]', __($labels['nphojint{codpro}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{codpro}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{codpro}')): ?>
    <?php echo form_error('nphojint{codpro}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('codpro', array('type' => 'edit', 'nphojint' => $nphojint)); echo $value ? $value : '&nbsp;' ?>
    </div>  
  <?php echo label_for('nphojint[soshog]', __($labels['nphojint{soshog}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{soshog}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{soshog}')): ?>
    <?php echo form_error('nphojint{soshog}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($nphojint, 'getSoshog', array (
  'control_name' => 'nphojint[soshog]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('nphojint[capbie]', __($labels['nphojint{capbie}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{capbie}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{capbie}')): ?>
    <?php echo form_error('nphojint{capbie}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($nphojint, 'getCapbie', array (
  'control_name' => 'nphojint[capbie]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<br>
  <?php echo label_for('nphojint[tipetn]', __($labels['nphojint{tipetn}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{tipetn}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{tipetn}')): ?>
    <?php echo form_error('nphojint{tipetn}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($nphojint, 'getTipetn', array (
  'control_name' => 'nphojint[tipetn]',
  'size' => '80x5',
  'maxlength' => 1000,
  'onkeyup' => 'return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>    
<br>
  <?php echo label_for('nphojint[tipmed]', __($labels['nphojint{tipmed}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{tipmed}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{tipmed}')): ?>
    <?php echo form_error('nphojint{tipmed}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($nphojint, 'getTipmed', array (
  'control_name' => 'nphojint[tipmed]',
  'size' => '80x5',
  'maxlength' => 1000,
  'onkeyup' => 'return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('nphojint[esalerg]', __($labels['nphojint{esalerg}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{esalerg}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{esalerg}')): ?>
    <?php echo form_error('nphojint{esalerg}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_checkbox_tag($nphojint, 'getEsalerg', array (
  'control_name' => 'nphojint[esalerg]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('nphojint[desaler]', __($labels['nphojint{desaler}']), 'class="required" style="width: 120px"') ?>
  <div class="content<?php if ($sf_request->hasError('nphojint{desaler}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('nphojint{desaler}')): ?>
    <?php echo form_error('nphojint{desaler}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($nphojint, 'getDesaler', array (
  'control_name' => 'nphojint[desaler]',
  'size' => '80x5',
  'maxlength' => 1000,
  'onkeyup' => 'return ismaxlength(this)',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
    <br>
    <fieldset id="sf_fieldset_none" class="">
    <legend><h2><?php echo __('¿Tiene Prima Transporte?').'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;'?></h2></legend>
  <div class="form-row">
<?php if ($nphojint->getPritra()=='S')  {
  ?><?php echo radiobutton_tag('nphojint[pritra]', 'S', true)        ."   Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
      echo radiobutton_tag('nphojint[pritra]', 'N', false)."     No";?>
    <?php
}else{
  echo radiobutton_tag('nphojint[pritra]', 'S', false)        ." Si".'&nbsp;&nbsp;'.'&nbsp;&nbsp;'.'&nbsp;&nbsp;';
  echo radiobutton_tag('nphojint[pritra]', 'N', true)."   No";

} ?></div></fieldset>   
</div>
</fieldset>
</div>

<?php tabInit('tp1','0');?>

<?php include_partial('edit_actions', array('nphojint' => $nphojint)) ?>
<script type="text/javascript">
var oculdatpesper='<?php echo $nphojint->getOculdatpesper();?>';
if (oculdatpesper=='S')
{
    $('punto').hide();
    $('contrato').hide();
    $('segurohcm').hide();
    $('fecsso').hide();
    $('ubicados').hide();
    $('ubicados2').hide();
    $('ubicados3').hide();
}


var nuevo='<?php echo $nphojint->getId();?>';
var esben='<?php echo $nphojint->esBeneficiario();?>';  

 var modulo='<?php echo sfContext::getInstance()->getUser()->getAttribute('menu','','autenticacion')?>';
 if (modulo=='seguridad'){
   $('tab2').hide();
   $('div_tab3').hide();
   $('tab3').hide();
   $('div_tab4').hide();
   $('tab4').hide();
   $('div_tab5').hide();
   $('tab5').hide();
   $('div_tab6').hide();
   $('tab11').hide();
   $('div_tab12').hide();
   $('tab12').hide();
   $('div_tab13').hide();
   $('tab13').hide();
   $('div_tab14').hide();
   $('tab14').hide();
   $('div_tab15').hide();
   $('tab15').hide();
   $('div_tab16').hide();
   if (nuevo!='')
   //$$('.sf_admin_action_list')[0].hide();
   $$('.sf_admin_action_create')[0].hide();
 }

  

if (nuevo!='' && esben=='S' && $('nphojint_rifemp').value!=''){
  $('nphojint_cedemp').readOnly=true;
  $('nphojint_rifemp').readOnly=true;
}

var mosfectit='<?php echo H::getConfApp2('mosfectit', 'nomina', 'nomhojint'); ?>';
if (mosfectit!='S')
{
    $('divfectitular').hide();
}

var moscuemat='<?php echo H::getConfApp2('moscuemat', 'nomina', 'nomhojint'); ?>';
if (moscuemat=='S')
{
    $('cuentamatriz').show();
}

var manofi='<?php echo H::getConfApp2('manofi', 'nomina', 'nomhojint'); ?>';
if (manofi=='S')
  $('manofi').show();

var mandatloc='<?php echo H::getConfApp2('mandatloc', 'nomina', 'nomhojint'); ?>';
if (mandatloc=='S')
  $('datlocal').show();

var manuniads='<?php echo H::getConfApp2('manuniads', 'nomina', 'nomhojint'); ?>';
if (manuniads=='S')
  $('datuniads').show();

var datbonoali='<?php echo H::getConfApp2('datbonoali', 'nomina', 'nomhojint'); ?>';
if (datbonoali=='S')
  $('datbonoali').show();

var mosfecadmpub='<?php echo H::getConfApp2('mosfecadmpub', 'nomina', 'nomhojint'); ?>';
if (mosfecadmpub=='S' && nuevo!='')
  $('divfecadmpub').show();



var mandepsta='<?php echo H::getConfApp2('mandepsta', 'nomina', 'nomdefespnivorg'); ?>';
if (mandepsta=='S')
  $('ubidepen').show();


function egreso(e,id)
{
  if (e.keyCode==13)
  {
    fil=0;
    cuentafil=0;
    while (fil<15)
    {
      ida="ax"+"_"+fil+"_2";
      if ($(ida).value=="")
      {
        cuentafil=fil;
        fil=15;
      }
     fil++;
    }
   id3="ax"+"_"+cuentafil+"_1";
   id4="ax"+"_"+cuentafil+"_2";
   id5="ax"+"_"+cuentafil+"_3";

   $(id3).value=$('nphojint_fecing').value;
   $(id4).value=$('nphojint_fecret').value;
   $(id5).value=$(id).value;

  }
}

function reingreso(id)
{
  //if (e.keyCode==13 || e.keyCode==9)
 // {
   $('fecha').value=$('nphojint_fecing').value;
   $('nphojint_fecing').value=$(id).value;
   $('nphojint_fecret').value="";
   $('nphojint_fecret').readOnly=true;
   $('nphojint_codmot').value="";
   $('nphojint_desmot').value="";
   $('nphojint_codmot').readOnly=true;
   $(id).value="";
   $(id).readOnly=true;
  //}
}

function retiro(id)
{
  //if (e.keyCode==13 || e.keyCode==9)
  //{
    var limnivel='<?php echo H::getConfApp2('limnivel', 'nomina', 'nomhojint');?>';
    if (limnivel=='S') {
     $('nphojint_codniv').value="";
     $('nphojint_desniv').value="";
    }

  //}
}

function nivel(e,numero)
{
  var longitud='<?php echo $lonnivel?>';
  var longitud2='<?php echo $lonnivel2?>';
  var conniveles='<?php echo H::getConfApp2('connivel', 'nomina', 'nomhojint');?>'
  if (numero==1){
    if (($('nphojint_codniv').value.length < longitud) && ($('nphojint_codniv').value!='') && conniveles!='S')
	  {
	    $('nphojint_codniv').value = '';
	    alert('El nivel organizacional no es de ultimo Nivel');
	  }else{
	    var cod=$('nphojint_codniv').value;
	    var cajamos='nphojint_desniv';
	    var cajacom='nphojint_codniv';
	    new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&cajtexmos='+cajamos+'&cajtexcom='+cajacom+'&codigo='+cod})
	  }
  }else{

    var cod=$('nphojint_ubifis').value;
    var cajamos='nphojint_desniv2';
    var cajacom='nphojint_ubifis';
    new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&cajtexmos='+cajamos+'&cajtexcom='+cajacom+'&codigo='+cod})

  }
}

 function ajax(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coledad=col+1;
    var edad=name+"_"+fil+"_"+coledad;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
    if ($(id).value!='')
    {
      new Ajax.Request('/nomina'+getEnv()+'.php/nomhojint/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&cajtexmos='+edad+'&cajtexcom='+id+'&codigo='+cod})
    }
  }
  }

   function ajaxexplab(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;
    var colsuec=col+4;
    var colcom=col+5;
    var descrip=name+"_"+fil+"_"+coldes;
    var suecar=name+"_"+fil+"_"+colsuec;
    var comcar=name+"_"+fil+"_"+colcom;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
    if ($(id).value!='')
    {
      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&cajtexmos='+descrip+'&cajtexcom='+id+'&suecar='+suecar+'&comcar='+comcar+'&codigo='+cod})
    }
  }
  }
 function porcentajehcm(id)
 {
 	if($(id).value=='S')
	{
		$('nphojint_porseghcm').readOnly=false;
	}
	if($(id).value=='N')
	{
		$('nphojint_porseghcm').value='';
		$('nphojint_porseghcm').readOnly=true;
	}
  if ($('nphojint_seghcm_S').checked==true)
  {
    new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=11&cedemp='+$('nphojint_cedemp').value+'&codemp='+$('nphojint_codemp').value})
  }
 }

 function segunfun(id)
 {
  if ($(id).checked==true)
  {
    new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=15&cedemp='+$('nphojint_cedemp').value+'&codemp='+$('nphojint_codemp').value})
  }
 }

 function verificarbenhcm(id)
 {
    var aux = id.split("_");

    var name=aux[0];
    var fila=parseInt(aux[1]);
    var col =aux[2];

    cedula=name+"_"+fila+"_1";
    var cedfam=$(cedula).value;

    if ($(id).checked==true){
      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&idseghcm='+id+'&cedfam='+cedfam+'&codemp='+$('nphojint_codemp').value})     
    }
    //cambiarComboParentesco(id);
 }
 function activar_check(id)
{

  var aux = id.split("_");

    var name=aux[0];
    var fila=parseInt(aux[1]);
    var col =aux[2];
    if ($(id).checked==true){

    for (i=0; i<=5; i++){
      if (fila==i)
    $(name+"_"+i+"_"+col).checked = true;
    else
    $(name+"_"+i+"_"+col).checked = false;

     }

    }
}

 function ajaxubiad(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=col+1;

    var descrip=name+"_"+fil+"_"+coldes;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
    if ($(id).value!='')
    {
      new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&cajtexmos='+descrip+'&cajtexcom='+id+'&codigo='+cod})
    }
  }
  }

  function validaregreso(valor)
  {
     var estatusegre='<?php echo $nphojint->getStatusegr(); ?>'; //Estatus que se define en el app que sera de egreso retirado en que se defina en el cliente

      if (valor==estatusegre && $('nphojint_fecret').value=="")
      {
          alert('Para cambiar el estatus a Retirado debe introducir la Fecha de Egreso');
          $('nphojint_staemp').value='';
      }
  }

  function validarif(e,t,m)
  {
        evt = e ? e : event;
        tcl = (window.Event) ? evt.which : evt.keyCode;

         if(tcl==8 || tcl==9 || tcl ==13)
         {
            return true;
         }else
         {
                if(parseInt(t.value.length)<1)
                 {
                     val = String.fromCharCode(tcl);
                     if(val=='J' || val=='G' || val=='V')
                     {
                         return true;
                     }else
                      {
                         return false;
                      }
                 }else
                 {
                      return   dFilterv2(e,t,m);
                 }
         }
  }
  
  function mostrarfechamat(valor)
  {
     var oculdatpesper='<?php echo $nphojint->getOculdatpesper();?>';
     if (oculdatpesper!='S') {
      if(valor=='C') { 
          $('thfecmat').show(); 
      }else { 
          $('thfecmat').hide() ;
      }
     }
  }
  
  function colocardatosgriding()
  {
      var fila=totalregistros('ax',1,15);
      
      var id1="ax_"+fila+"_1";
      var id2="ax_"+fila+"_2";
      var id3="ax_"+fila+"_3";
      
      $(id1).value=$('nphojint_fecing').value;
      $(id2).value=$('nphojint_fecret').value;
      $(id3).value=$('nphojint_desmot').value;
  }

  function mostrarFormulario(){
    var id='<?php echo $nphojint->getId(); ?>';
    window.open('/nomina'+getEnv()+'.php/nomdatrelemp/edit/id/'+id,'...','menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
  }

  function validarFormatoCed(id)
{
  if (id!="")
  {
    var mascara='<?php echo $maskara; ?>';
    if (mascara!="") {
    var letra='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var numero='1234567890';
    var val=id.split("-");
    var rup=parseInt(val.length);
    var descrip='<?php echo $maskara;?>';
    var val2=descrip.split("-");
    var rup2=parseInt(val2.length);
    
    if (id.length==descrip.length)
    {
       if (rup==rup2)
       {
        var j=0;
        while (j<rup2)
        {
           var tamcad=parseInt( val2[j].length);
           var l=0;
           while (l<tamcad)
           {               
               var caract = val2[j].substr(l,1);  //Verifico si es una letra lo que va en el formato
               var pos = letra.indexOf(caract);
               if (pos!=-1)
               {
                   var caract2=val[j].substr(l,1);
                   var pos2 = letra.indexOf(caract2);
                   if (pos2==-1)
                   {
                       alert_('La C&eacute;dula no cumple con el Formato Definido, existe un caracter que debe ser una Letra');
                        $('nphojint_cedemp').value='';
                        $('nphojint_cedemp').focus();
                   }
                   
                   
               }else {  //Verifico si es un numero
                   var pos = numero.indexOf(caract);
                   if (pos!=-1)
                   {
                       var caract2=val[j].substr(l,1);
                       var pos2 = numero.indexOf(caract2);
                       if (pos2==-1)
                       {
                           alert_('La C&eacute;dula no cumple con el Formato Definido, existe un caracter que debe ser un N&uacute;mero');
                            $('nphojint_cedemp').value='';
                            $('nphojint_cedemp').focus();
                       }
                   }
                        
               }
               
               l++;
           }
            j++;
        }
        }else {
        alert_('La C&eacute;dula no cumple con el Formato Definido');
        $('nphojint_cedemp').value='';
        $('nphojint_cedemp').focus();
    }
    }else {
        alert_('La C&eacute;dula no cumple con el Formato Definido');
        $('nphojint_cedemp').value='';
        $('nphojint_cedemp').focus();
    }
    }
  }
}

function  validarFamiliar(id){
  var aux = id.split("_");
  var name=aux[0];
  var fila=aux[1];
  var col=parseInt(aux[2]);

  var colced="1";
  var ced=name+"_"+fila+"_"+colced;
  var cedula=$(ced).value;

   var cedularepetida=false;
   var am=totalregistros2('ex',1,obtener_filas_grid('e',1));
   var i=0;
   while (i<am)
   {
    var ced2="ex"+"_"+i+"_1"
    var cedula2=$(ced2).value;
    if (i!=fila)
    {
      if (cedula==cedula2)
      {
        cedularepetida=true;
        break;
      }
    }
   i++;
   }
   
   if (cedularepetida)
   {
     alert_('La C&eacute;dula del Familiar esta Repetida');
     $(id).value='';
   }else {
      if ($(id).value==$('nphojint_cedemp').value) {
        alert('El Beneficiario no puede ser el mismo Empleado');
        $(id).value='';
      }else {
        var novalfam='<?php echo H::getConfApp2('novalfam', 'nomina', 'nomhojint');?>';
        if (novalfam!='S')
          new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=13&codemp='+$('nphojint_codemp').value+'&id='+id+'&codigo='+$(id).value})
      }
   }
}

function validarParentesco(id){
  var aux = id.split("_");
  var name=aux[0];
  var fila=aux[1];
  var col=parseInt(aux[2]);

  var colparen="15";
  var parent=name+"_"+fila+"_"+colparen;
  var parentesco=$(parent).value;

   var parentrepetido=false;
   var am=totalregistros2('ex',1,obtener_filas_grid('e',1));
   var i=0;
   while (i<am)
   {
    var parent2="ex"+"_"+i+"_15"
    var parentesco2=$(parent2).value;
    if (i!=fila)
    {
      if (parentesco==parentesco2)
      {
        parentrepetido=true;
        break;
      }
    }
   i++;
   }
   
   if (parentrepetido)
   {
     alert_('Este Parentesco no puede estar Repetido');
     $(id).value='';
   }
}

 function ajaxparentesco(id){

  var aux = id.split("_");
  var name=aux[0];
  var fila=aux[1];
  var col=parseInt(aux[2]);

  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=14&id='+id+'&codigo='+$(id).value})
 }

function cambiarComboParentesco(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);

  var seghcm=name+"_"+fil+"_10";
  var segfun=name+"_"+fil+"_14";
  var parent=name+"_"+fil+"_15";

  new Ajax.Updater(parent, getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=16&seghcm='+$(seghcm).checked+'&segfun='+$(segfun).checked});   
} 

 function enter(e,valor)
 {
   if (e.keyCode==13 || e.keyCode==9)
   {
     if (valor!='')
     { 
      var relforemp='<?php echo H::getConfApp2('relforemp', 'nomina', 'nomhojint');?>';
      if (relforemp=='S'){
        var mascara='<?php echo $nphojint->getForemp();?>'
        valor=valor.pad(mascara.length, '0',0);
      }else valor=valor.pad(16, '0',0);
     }
     $('nphojint_codemp').value=valor;

     if ($('nphojint_codemp').value!='' && $('id').value=='')
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=8&cajtexcom=nphojint_codemp&codigo='+$('nphojint_codemp').value})
   }
 }

</script>

</form>
