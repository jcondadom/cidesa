<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2007/07/26 10:09:06
?>
<?php echo form_tag('teschecus/edit', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($tscheemi, 'getId') ?>
<?php echo javascript_include_tag('dFilter','ajax','tools') ?>

<?php $status=$tscheemi->getStatus();
if (($status=='E' || $status=='A') && $tscheemi->getFaldat()!='S')
	{
		$block=true;
	}
	else
	{
		$block=false;
	}
?>
<fieldset>
<?php if ($tscheemi->getCaducado()=="S")
{  	?>
<table width="100%">
  <tr>
    <th><strong><font color="#CC0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">El Cheque esta caducado</font></strong></th>
  </tr>
</table>
<?php } ?>
<div class="form-row">

<fieldset>
<legend><?php echo __('Datos del Cheque')?></legend>
<div class="form-row">
<table>
  <tr>
    <th>
     <?php echo label_for('tscheemi[numche]', __($labels['tscheemi{numche}']), 'class="required" ') ?>
		  <div class="content<?php if ($sf_request->hasError('tscheemi{numche}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('tscheemi{numche}')): ?>
		    <?php echo form_error('tscheemi{numche}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_tag($tscheemi, 'getNumche', array (
		  'size' => 20,
		  'control_name' => 'tscheemi[numche]',
		  'maxlength' => 20,
		  'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
    </th>
    <th>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
    <th>
		  <?php echo label_for('tscheemi[fecemi]', __($labels['tscheemi{fecemi}']), 'class="required" Style="width:130px"') ?>
		  <div class="content<?php if ($sf_request->hasError('tscheemi{fecemi}')): ?> form-error<?php endif; ?>">
		  <?php if ($sf_request->hasError('tscheemi{fecemi}')): ?>
		    <?php echo form_error('tscheemi{fecemi}', array('class' => 'form-error-msg')) ?>
		  <?php endif; ?>

		  <?php $value = object_input_date_tag($tscheemi, 'getFecemi', array (
		  'rich' => true,
		  'calendar_button_img' => '/sf/sf_admin/images/date.png',
		  'control_name' => 'tscheemi[fecemi]',
		  'date_format' => 'dd/MM/yyyy',
		  'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
		    </div>
    </th>
  </tr>
</table>

<br>

  <?php echo label_for('tscheemi[monche]', __($labels['tscheemi{monche}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{monche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{monche}')): ?>
    <?php echo form_error('tscheemi{monche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, array('getMonche',true), array (
  'size' => 10,
  //'class' => 'grid_txtright',
  'control_name' => 'tscheemi[monche]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>

  <?php echo label_for('tscheemi[cedrif]', __($labels['tscheemi{cedrif}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{cedrif}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{cedrif}')): ?>
    <?php echo form_error('tscheemi{cedrif}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getCedrif', array (
  'size' => 15,
  'control_name' => 'tscheemi[cedrif]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

  <?php $value = object_input_tag($tscheemi, 'getBenefi', array (
  'control_name' => 'tscheemi[benefi]',
  'size' => 50,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>

<br>
  <?php echo label_for('tscheemi[cedrifsus]', __($labels['tscheemi{cedrifsus}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{cedrifsus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{cedrifsus}')): ?>
    <?php echo form_error('tscheemi{cedrifsus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getCedrifsus', array (
  'size' => 20,
  'readonly' => true,
  'control_name' => 'tscheemi[cedrifsus]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>    
<br><br>
  <?php echo label_for('tscheemi[nombensus]', __($labels['tscheemi{nombensus}']), 'class="required"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{nombensus}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{nombensus}')): ?>
    <?php echo form_error('tscheemi{nombensus}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNombensus', array (
  'size' => 80,
  'readonly' => true,
  'control_name' => 'tscheemi[nombensus]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>    
    <br>
</div>
</fieldset>

<br>

<fieldset>
<legend><?php echo __('Datos del Banco')?></legend>
<div class="form-row">
  <?php echo label_for('tscheemi[numcue]', __($labels['tscheemi{numcue}']), 'class="required" style="width: 130px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numcue}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numcue}')): ?>
    <?php echo form_error('tscheemi{umcue}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNumcue', array (
  'size' => 30,
  'control_name' => 'tscheemi[numcue]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

  <?php $value = object_input_tag($tscheemi, 'getNomcue', array (
  'control_name' => 'tscheemi[nomcue]',
  'readonly' => true,
  'size' => 80,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>

<br>

<fieldset>
<div class="form-row">
  <?php echo label_for('tscheemi[orden]', __($labels['tscheemi{orden}']), 'class="required" style="width: 130px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{orden}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{orden}')): ?>
    <?php echo form_error('tscheemi{orden}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getOrden', array (
  'control_name' => 'tscheemi[orden]',
  'size' => 80,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('tscheemi[numcom]', __($labels['tscheemi{numcom}']), 'class="required"  style="width: 130px"	') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numcom}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numcom}')): ?>
    <?php echo form_error('tscheemi{numcom}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNumcom', array (
  'control_name' => 'tscheemi[numcom]',
  'size' => 80,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('tscheemi[numcomegr]', __($labels['tscheemi{numcomegr}']), 'class="required"  style="width: 130px"	') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{numcomegr}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{numcomegr}')): ?>
    <?php echo form_error('tscheemi{numcomegr}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getNumcomegr', array (
  'control_name' => 'tscheemi[numcomegr]',
  'size' => 80,
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
<br>
  <?php echo label_for('tscheemi[status]', __($labels['tscheemi{status}']), 'class="required" style="width: 130px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{status}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{status}')): ?>
    <?php echo form_error('tscheemi{status}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php  $val1=""; $val2=""; $val3=""; $val4=""; ?>
<?php if($tscheemi->getStatus()=='A'){ $val1=true; $val2=false; $val3=false; $val4=false;} ?>
<?php if($tscheemi->getStatus()=='E'){ $val2=true; $val1=false; $val3=false; $val4=false;} ?>
<?php if($tscheemi->getStatus()=='C'){ $val3=true; $val1=false; $val2=false; $val4=false;} ?>
<?php if($tscheemi->getStatus()=='D'){ $val4=true; $val1=false; $val2=false; $val3=false;} ?>

<?php echo " Anulado " . radiobutton_tag('tscheemi[status]', 'A',
$val1, array('onClick' => 'push1();')); ?>
&nbsp;&nbsp;&nbsp;
<?php echo " Devuelto " . radiobutton_tag('tscheemi[status]', 'D',
$val4, array('onClick' => 'push4();')); ?>
&nbsp;&nbsp;&nbsp;
<?php echo " Entregado " . radiobutton_tag('tscheemi[status]', 'E',
$val2, array('onClick' => 'push2();')); ?>
&nbsp;&nbsp;&nbsp;
<?php echo " Caja " . radiobutton_tag('tscheemi[status]', 'C',
$val3, array('onClick' => 'push3();')); ?></div>
<br>
<div id="divimpreso" style="display : none">
<fieldset>
<div class="form-row">
   <?php echo label_for('tscheemi[cheimp]', __($labels['tscheemi{cheimp}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{cheimp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{cheimp}')): ?>
    <?php echo form_error('tscheemi{cheimp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if ($tscheemi->getCheimp()=='S')  {
  ?><?php echo radiobutton_tag('tscheemi[cheimp]', 'S', true, array('onClick' => 'ocul_mos()'))        ."Si".'&nbsp;&nbsp;';
      echo radiobutton_tag('tscheemi[cheimp]', 'N', false, array('onClick' => 'ocul_mos()'))."   No";?>
    <?php
}else{
  echo radiobutton_tag('tscheemi[cheimp]', 'S', false, array('onClick' => 'ocul_mos()'))        ."Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('tscheemi[cheimp]', 'N', true, array('onClick' => 'ocul_mos()'))."   No";
} ?>
</div>
<br>
<div id="divfecimp" style="display : none">
  <?php echo label_for('tscheemi[fecimp]', __($labels['tscheemi{fecimp}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fecimp}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fecimp}')): ?>
    <?php echo form_error('tscheemi{fecimp}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tscheemi, 'getFecimp', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tscheemi[fecimp]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>    
</div>
</fieldset>
</div>

<br>
<ul class="sf_admin_actions">
<li class="float-rigth">
<?php $nomrep=H::getConfApp2('nomrepcret', 'tesoreria', 'teschecus');
if ($nomrep!='') { ?>
<input type="button" name="Submit" class="sf_admin_action_list" value="Comprobante de Retenciones" onclick="javascript:MostrarCompRET();" />
<?php }?>
</li>
<li class="float-rigth">
<?php $nomrep=H::getConfApp2('nomrepiva', 'tesoreria', 'teschecus');
if ($nomrep!='') { ?>
<input type="button" name="Submit" class="sf_admin_action_list" value="Comprobante de Retención IVA" onclick="javascript:MostrarCompIVA();" />
<?php }?>
</li>
<li class="float-rigth">
<?php $nomrep=H::getConfApp2('nomrepislr', 'tesoreria', 'teschecus');
if ($nomrep!='') { ?>
<input type="button" name="Submit" class="sf_admin_action_list" value="Comprobante de Retención ISLR" onclick="javascript:MostrarCompISLR();" />
<?php }?>
</li>
<li class="float-rigth">
<?php $nomrep=H::getConfApp2('nomrepltf', 'tesoreria', 'teschecus');
if ($nomrep!='') { ?>
<input type="button" name="Submit" class="sf_admin_action_list" value="Comprobante de Retención LTF" onclick="javascript:MostrarCompLTF();" />
<?php }?>
</li>
</ul>
</div>
</fieldset>

<br>
<div id="divent" style="display : none">
<fieldset>
    <div class="form-row">
  <?php echo label_for('tscheemi[fecent]', __($labels['tscheemi{fecent}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fecent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fecent}')): ?>
    <?php echo form_error('tscheemi{fecent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if (!$block) { ?>
	  <?php $value = object_input_date_tag($tscheemi, 'getFecent', array (
	  'rich' => true,
	  'calendar_button_img' => '/sf/sf_admin/images/date.png',
	  'control_name' => 'tscheemi[fecent]',
	  'date_format' => 'dd/MM/yyyy',
          'onkeyup' => "javascript: mascara(this,'/',patron,true)",
	),date('Y-m-d')); echo $value ? $value : '&nbsp;' ?>
<?php } else { ?>
	  <?php $value = object_input_date_tag($tscheemi, 'getFecent', array (
	  'rich' => true,
	  'calendar_button_img' => '/sf/sf_admin/images/date.png',
	  'control_name' => 'tscheemi[fecent]',
	  'date_format' => 'dd/MM/yyyy',
	  'readonly' => true,
	)); echo $value ? $value : '&nbsp;' ?>
<?php } ?>
    </div>
<br>
<div id="divcomentcon" style="display:none">
   <?php echo label_for('tscheemi[comentcon]', __($labels['tscheemi{comentcon}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{comentcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{comentcon}')): ?>
    <?php echo form_error('tscheemi{comentcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if ($tscheemi->getComentcon()=='S')  {
  ?><?php echo radiobutton_tag('tscheemi[comentcon]', 'S', true, array('onClick' => 'ocul_mosfec()'))        ."Si".'&nbsp;&nbsp;';
      echo radiobutton_tag('tscheemi[comentcon]', 'N', false, array('onClick' => 'ocul_mosfec()'))."   No";?>
    <?php
}else{
  echo radiobutton_tag('tscheemi[comentcon]', 'S', false, array('onClick' => 'ocul_mosfec()'))        ."Si".'&nbsp;&nbsp;';
  echo radiobutton_tag('tscheemi[comentcon]', 'N', true, array('onClick' => 'ocul_mosfec()'))."   No";
} ?>
</div>

<br>
<br>
<br>
<div id="divfecentcon" style="display:none">
  <?php echo label_for('tscheemi[fecentcon]', __($labels['tscheemi{fecentcon}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fecentcon}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fecentcon}')): ?>
    <?php echo form_error('tscheemi{fecentcon}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php $value = object_input_date_tag($tscheemi, 'getFecentcon', array (
    'rich' => true,
    'calendar_button_img' => '/sf/sf_admin/images/date.png',
    'control_name' => 'tscheemi[fecentcon]',
    'date_format' => 'dd/MM/yyyy',
    'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  )); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</div>
<br><br><br>
  <?php echo label_for('tscheemi[obsent]', __($labels['tscheemi{obsent}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{obsent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{obsent}')): ?>
    <?php echo form_error('tscheemi{obsent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if (!$block) { ?>
	  <?php $value = object_input_tag($tscheemi, 'getObsent', array (
	  'size' => 80,
	  'control_name' => 'tscheemi[obsent]',
	  'maxlength' => 80,
	)); echo $value ? $value : '&nbsp;' ?>
<?php } else { ?>
	  <?php $value = object_input_tag($tscheemi, 'getObsent', array (
	  'size' => 80,
	  'control_name' => 'tscheemi[obsent]',
	  'readonly' => true,
	)); echo $value ? $value : '&nbsp;' ?>

<?php } ?>
    </div>

<br>

  <?php echo label_for('tscheemi[nomrec]', __($labels['tscheemi{nomrec}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{nomrec}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{nomrec}')): ?>
    <?php echo form_error('tscheemi{nomrec}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if (!$block) { ?>
	  <?php $value = object_input_tag($tscheemi, 'getNomrec', array (
	  'size' => 80,
	  'control_name' => 'tscheemi[nomrec]',
	  'maxlength' => 250,
	)); echo $value ? $value : '&nbsp;' ?>
<?php } else { ?>
	  <?php $value = object_input_tag($tscheemi, 'getNomrec', array (
	  'size' => 80,
	  'control_name' => 'tscheemi[nomrec]',
	  'readonly' => true,
	)); echo $value ? $value : '&nbsp;' ?>
<?php } ?>
    </div>
<br>
  <?php echo label_for('tscheemi[codent]', __($labels['tscheemi{codent}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{codent}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{codent}')): ?>
    <?php echo form_error('tscheemi{codent}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

<?php if (!$block) { ?>
	  <?php $value = object_input_tag($tscheemi, 'getCodent', array (
	  'size' => 80,
	  'readonly' => true,
	  'control_name' => 'tscheemi[codent]',
	  'maxlength' => 80,
	)); echo $value ? $value : '&nbsp;' ?>
<?php } else { ?>
	  <?php $value = object_input_tag($tscheemi, 'getCodent', array (
	  'size' => 80,
	  'control_name' => 'tscheemi[codent]',
	  'readonly' => true,
	)); echo $value ? $value : '&nbsp;' ?>
<?php } ?>
    </div>
<br>

  <?php echo label_for('tscheemi[fotper]', __($labels['tscheemi{fotper}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fotper}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fotper}')): ?>
    <?php echo form_error('tscheemi{fotper}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($tscheemi, 'getFotper', array (
  'control_name' => 'tscheemi[fotper]',
  'include_link' => 'chequesentregados',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Tamaño de la foto 90x100 (jpg, gif o png)') ?></div>  </div>
<br>
  <?php echo label_for('tscheemi[fotced]', __($labels['tscheemi{fotced}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fotced}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fotced}')): ?>
    <?php echo form_error('tscheemi{fotced}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($tscheemi, 'getFotced', array (
  'control_name' => 'tscheemi[fotced]',
  'include_link' => 'chequesentregados',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Tamaño de la foto 90x100 (jpg, gif o png)') ?></div>  </div>
<br>
  <?php echo label_for('tscheemi[fotche]', __($labels['tscheemi{fotche}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fotche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fotche}')): ?>
    <?php echo form_error('tscheemi{fotche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_admin_input_file_tag($tscheemi, 'getFotche', array (
  'control_name' => 'tscheemi[fotche]',
  'include_link' => 'chequesentregados',
  'include_remove' => true,
)); echo $value ? $value : '&nbsp;' ?>
  <div class="sf_admin_edit_help"><?php echo __('Tamaño de la foto 90x100 (jpg, gif o png)') ?></div>  </div>

</div>
</fieldset>
</div>

<div id="divdev" style="display : none">
<fieldset>
    <div class="form-row">
  <?php echo label_for('tscheemi[fecdev]', __($labels['tscheemi{fecdev}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{fecdev}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{fecdev}')): ?>
    <?php echo form_error('tscheemi{fecdev}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_date_tag($tscheemi, 'getFecdev', array (
  'rich' => true,
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'tscheemi[fecdev]',
  'date_format' => 'dd/MM/yyyy',
  'onkeyup' => "javascript: mascara(this,'/',patron,true)",
  'readonly' => $status=='D' ? true : false,
  'maxlength' => 10,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
<br>
  <?php echo label_for('tscheemi[motdev]', __($labels['tscheemi{motdev}']), 'class="required" style="width: 110px"') ?>
  <div class="content<?php if ($sf_request->hasError('tscheemi{motdev}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('tscheemi{motdev}')): ?>
    <?php echo form_error('tscheemi{motdev}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($tscheemi, 'getMotdev', array (
  'size' => 80,
  'control_name' => 'tscheemi[motdev]',
  'readonly' => $status=='D' ? true : false,
  'maxlength' => 100,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
</fieldset>
</div>

</div>
</fieldset>

<?php include_partial('edit_actions', array('tscheemi' => $tscheemi)) ?>

</form>

<script type="text/javascript">
	var status='<?php print $status; ?>';
	var faldat='<?php print $tscheemi->getFaldat()?>';
    if ((status=='E' && faldat=='S') || (status=='D' && faldat=='S'))
	  {document.getElementById('divx').style.display="block";}

   if (status=='E')
   {
     document.getElementById('divent').style.display="block";
     $('trigger_tscheemi_fecent').hide();
   }else if (status=='D')
   {
     document.getElementById('divdev').style.display="block";
     $('trigger_tscheemi_fecdev').hide();
   }

   $('trigger_tscheemi_fecemi').hide();

   var moscoment='<?php echo H::getConfApp2('moscoment', 'tesoreria', 'teschecus');?>';
   if (moscoment=='S'){
     $('divcomentcon').show();
     if ($('tscheemi_comentcon_S').checked==true){
      $('divfecentcon').show();
      if ($('tscheemi_fecentcon').value=='')
        document.getElementById('divx').style.display="block";
    }

   }

   var mosdatimp='<?php echo H::getConfApp2('mosdatimp', 'tesoreria', 'teschecus');?>';
   if (mosdatimp=='S'){
     $('divimpreso').show();
     if ($('tscheemi_cheimp_S').checked==true){
      $('divfecimp').show();
      if ($('tscheemi_fecimp').value!='') {
        $('tscheemi_fecimp').readOnly=true;
        $('trigger_tscheemi_fecimp').hide();
      }
    }
   }

function push1()
{
	var status='<?php print $status; ?>'
	if (status=='C')
	{document.sf_admin_edit_form.tscheemi_status_C.checked=true;}
	else if (status=='E')
	{document.sf_admin_edit_form.tscheemi_status_E.checked=true;}
        else if (status=='D')
	{document.sf_admin_edit_form.tscheemi_status_D.checked=true;}
        else if (status=='A')
	{document.sf_admin_edit_form.tscheemi_status_A.checked=true;}
}

function push2()
{
	var status='<?php print $status; ?>'
  var caducado='<?php echo $tscheemi->getCaducado()?>'
	if (status=='A')
	{document.sf_admin_edit_form.tscheemi_status_A.checked=true;}
        else if (status=='D')
	{document.sf_admin_edit_form.tscheemi_status_D.checked=true;}
        else if (status=='E')
	{
           document.sf_admin_edit_form.tscheemi_status_E.checked=true;
           document.getElementById('divent').style.display="block";
        }
	else if (status=='C')
	{
    if (caducado!='S'){
          document.getElementById('divx').style.display="block";
          document.getElementById('divent').style.display="block";
    }else {
         alert('El Cheque esta caducado no puede ser Entregado')
    }
  }
}
function push3()
{
	var status='<?php print $status; ?>'  
	if (status=='A')
	{
    document.sf_admin_edit_form.tscheemi_status_A.checked=true;
  }else if (status=='E')
	{
    document.sf_admin_edit_form.tscheemi_status_E.checked=true;
	}
  else if (status=='D')
	{
    document.sf_admin_edit_form.tscheemi_status_D.checked=true;
	}
	else if (status=='C')
	{
    document.getElementById('divx').display="none";
  }
}

function push4()
{
	var status='<?php print $status; ?>'
	if (status=='A')
	{document.sf_admin_edit_form.tscheemi_status_A.checked=true;}
	else if (status=='E')
	{
	 document.getElementById('divx').style.display="block";
         document.getElementById('divdev').style.display="block";
         document.getElementById('divent').style.display="none";
	}
        else if (status=='C')
	{
         document.sf_admin_edit_form.tscheemi_status_C.checked=true;
        }
	else if (status=='D')
	{
         document.getElementById('divx').display="none";
         document.getElementById('divdev').style.display="block";
        }

}

function ocul_mos(){
  var cheimpcon='<?php echo $tscheemi->getCheimp()?>'
  if ($('tscheemi_cheimp_S').checked==true && cheimpcon!='S'){    
    var status='<?php print $status; ?>'
    var caducado='<?php echo $tscheemi->getCaducado()?>'
    if (status=='C')  
      if (caducado!='S'){
        $('divfecimp').show();
        document.getElementById('divx').style.display="block";
      }else alert('El Cheque esta caducado no puede ser Impreso')
  }
  else{
    if (cheimpcon=='S')  $('tscheemi_cheimp_S').checked=true;
    else {
      $('divfecimp').hide();
      $('tscheemi_fecimp').value='';
      document.getElementById('divx').style.display="none";
    }
  }
}

function ocul_mosfec(){
  if ($('tscheemi_comentcon_S').checked==true){  
    $('divfecentcon').show();
    document.getElementById('divx').style.display="block";

  }else{
      $('divfecentcon').hide();
      $('tscheemi_fecentcon').value=''; 
      document.getElementById('divx').style.display="none";   
  }
}

  function MostrarCompIVA()
  {
      var  numord='<? echo $tscheemi->getOrden();?>';
      var nomrep='<?php echo H::getConfApp2('nomrepiva', 'tesoreria', 'teschecus'); ?>';

      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';

      //pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/"+nomrep+".php?orde="+numord;

      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+nomrep+".php&orde="+numord;

      window.open(pagina,numord,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");


  }

  function MostrarCompISLR()
  {
      var  numord='<? echo $tscheemi->getOrden();?>';
      var nomrep='<?php echo H::getConfApp2('nomrepislr', 'tesoreria', 'teschecus'); ?>';
      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';

      //pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/"+nomrep+".php?orde="+numord;

      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+nomrep+".php&orde="+numord;

      window.open(pagina,numord,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
  }

  function MostrarCompLTF()
  {
      var  numord='<? echo $tscheemi->getOrden();?>';
      var nomrep='<?php echo H::getConfApp2('nomrepltf', 'tesoreria', 'teschecus'); ?>';


      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';

      //pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/"+nomrep+".php?orde="+numord;

      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+nomrep+".php&orde="+numord;

      window.open(pagina,numord,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
  }

  function MostrarCompRET()
  {
      var  numord='<? echo $tscheemi->getOrden();?>';
      var nomrep='<?php echo H::getConfApp2('nomrepcret', 'tesoreria', 'teschecus'); ?>';
      var ben1='<?php echo H::getX_vacio('NUMORD', 'Opordpag', 'Cedrif', $tscheemi->getOrden()); ?>';
      var tipcau1='<?php echo H::getX_vacio('NUMORD', 'Opordpag', 'Tipcau', $tscheemi->getOrden()); ?>';
      var tipret1='<?php echo H::getX_vacio_Ord('NUMORD', 'Opretord', 'Codtip', $tscheemi->getOrden(),array('CODTIP')); ?>';
      var tipret2='<?php echo H::getX_vacio_Ord('NUMORD', 'Opretord', 'Codtip', $tscheemi->getOrden(),array('CODTIP'),'DESC'); ?>';
      var fecreg1='<?php echo H::getX_vacio('NUMORD', 'Opordpag', 'Fecemi', $tscheemi->getOrden()); ?>';
      var status='T';

      var  ruta='http://'+'<?echo $this->getContext()->getRequest()->getHost();?>';

      //pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/"+nomrep+".php?orde="+numord;

      pagina=ruta+"/<?php echo $sf_user->getAttribute('reportes_web');?>/tesoreria/r.php?r="+nomrep+".php&nroord1="+numord+"&ben1="+ben1+"&ben2="+ben1+"&tipcau1="+tipcau1+"&tipcau2="+tipcau1+"&fecreg1="+fecreg1+"&fecreg2="+fecreg1+"&tipret1="+tipret1+"&tipret2="+tipret2+"&status="+status;

      window.open(pagina,numord,"menubar=yes,toolbar=yes,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80");
  }


</script>

