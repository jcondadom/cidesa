
<?php
        if($fcregveh->getNumtra()!=''){
     	    $bandera1="";

        }else{
            $bandera1="style=\"display:none;\"";
        }
         if($fcregveh->getNumdes()!=''){
     	    $bandera2="";

        }else{
            $bandera2="style=\"display:none;\"";
        }

        $bandera3="style=\"display:none;\"";
       
	if ($fcregveh->getId()!='')	{	?>

<table>
<tr>
  <?php if($fcregveh->getNumtra()==''){ ?>
    <th>
		<ul  class="sf_admin_actions" >
       <input type="button" name="Submit1" value="Traspasar Vehiculo" class="sf_admin_action_save" onclick="ajaxtraspaso()"  />

		</ul>
    </th>
    <?php }?>
    <?php  if($fcregveh->getNumdes()==''){ ?>
      <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Desincorporar Vehiculo" class="sf_admin_action_delete" onclick="ajaxdesincorpora()" />
		</ul>
    </th>
    <?php }?>
    <th>
		<ul  class="sf_admin_actions" >
			<input type="button" name="Submit1" value="Modificación" class="sf_admin_action_save" onclick="$('modificacion').show();$('fcregveh_modificar').value='S';" />
		</ul>
    </th>
</tr>
</table>

<div id="negacion2" <?php echo $bandera1; ?>>
<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Datos del Traspaso')?></h2>
<div class="form-row">
<div id="divnumtra">
  <?php echo label_for('fcregveh[numtra]', __('Número:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{numtra}')): ?> form-error<?php endif; ?>">

 <?php $value = object_input_tag($fcregveh, 'getNumtra', array (
  'readonly'  =>  $fcregveh->getIdtra()!='' ? true : false ,
  'size' => 10,
  'maxlength' => 10,
  'onBlur' => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('fcregveh_numtra').value=valor;document.getElementById('fcregveh_numtra').disabled=false;",
  'control_name' => 'fcregveh[numtra]',
)); echo $value ? $value : '&nbsp;' ?>

<div class="sf_admin_edit_help"><?php echo __('Solo Números') ?></div>

  </div>
</div>
<br>
<div id="divfectra">
  <?php echo label_for('fcregveh[fectra]', __('Fecha:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{fectra}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_date_tag($fcregveh, 'getFectra', array (
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcregveh[fectra]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
<br>

<div id="divfunrectra">
  <?php echo label_for('fcregveh[funrectra]', __('Funcionario:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{funrectra}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_tag($fcregveh, 'getFunrectra', array (
  'size' => 40,
  'control_name' => 'fcregveh[funrectra]',
)); echo $value ? $value : '&nbsp;' ?>
<div class="sf_admin_edit_help"><?php echo __('Solo Letras') ?></div>
  </div>
</div>
<br>

<fieldset class="" id="sf_fieldset_7___documentos">
<h2 >Contribuyente anterior</h2>
<div id="documentos" class="form-row">
<div id="divrifconant">
  <?php echo label_for('fcregveh[rifconant]', __('C.I./R.I.F.:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{rifconant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcregveh{rifconant}')): ?>
    <?php echo form_error('fcregveh{rifconant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
  <?php $value = get_partial('rifconant', array('type' => 'edit', 'fcregveh' => $fcregveh,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
</div>
</fieldset>
<br>

<fieldset class="" id="sf_fieldset_7___documentos">
<h2 >Representante anterior</h2>
<div id="documentos" class="form-row">
<div id="divrifrepant">
  <?php echo label_for('fcregveh[rifrepant]', __('C.I./R.I.F.:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{rifrepant}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcregveh{rifrepant}')): ?>
  <?php echo form_error('fcregveh{rifrepant}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = get_partial('rifrepant', array('type' => 'edit', 'fcregveh' => $fcregveh,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>
</div>
</fieldset>
<?php if ($fcregveh->getNumtra()=='') { ?>
<table>
<tr>
    <th>
    <ul  class="sf_admin_actions" >
      <input type="button" name="Submit1" value="Cancelar" class="sf_admin_action_cancel" onclick="$('negacion2').hide();$('fcregveh_traspaso').value='N';" />
    </ul>
    </th>
    <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
</tr>
</table>
<?php } ?>
</div>
</fieldset>  
</div>

<div id="desincorporar" <?php echo $bandera2; ?>>
<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Datos de la Desincorporación')?></h2>
<div class="form-row">
<div id="divnumdes">
  <?php echo label_for('fcregveh[numdes]', __('Numero:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{numdes}')): ?> form-error<?php endif; ?>">

<?php if ($fcregveh->getNumdes()=='') { ?>
  <?php
 $value = object_input_tag($fcregveh, 'getNumdes', array (
    'size' => 10,
    'maxlength' => 10,
    'control_name' => 'fcregveh[numdes]',
    'onChange' => "javascript: valor=this.value; valor=valor.pad(10, '0',0);document.getElementById('fcregveh_numdes').value=valor;document.getElementById('fcregveh_numdes').disabled=false;",

  ));
  echo $value ? $value : '&nbsp;'
?>
<?php } else  { ?>
 <?php
 $value = object_input_tag($fcregveh, 'getNumdes', array (
    'size' => 10,
    'readonly' => true,
    'maxlength' => 10,
    'control_name' => 'fcregveh[numdes]',

  ));
  echo $value ? $value : '&nbsp;'
?>
<?php }?>
<div class="sf_admin_edit_help"><?php echo __('Solo Numeros') ?></div>

  </div>
</div>
<br>
<div id="divfundes">
  <?php echo label_for('fcregveh[fundes]', __('Funcionario:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{fundes}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_tag($fcregveh, 'getFundes', array (
    'size' => 40,
    'readonly' => true,
    'control_name' => 'fcregveh[fundes]',
  ));
  echo $value ? $value : '&nbsp;'
?>
<div class="sf_admin_edit_help"><?php echo __('Solo Letras') ?></div>
  </div>
</div>
<br>
<div id="divmotdes">
  <?php echo label_for('fcregveh[motdes]', __('Motivo:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{motdes}')): ?> form-error<?php endif; ?>">
  <?php
 $value = object_input_tag($fcregveh, 'getMotdes', array (
    'size' => 60,
    'control_name' => 'fcregveh[motdes]',

  ));
  echo $value ? $value : '&nbsp;'
?>

  </div>
</div>
<?php if ($fcregveh->getNumdes()=='') { ?>
<table>
<tr>
    <th>
    <ul  class="sf_admin_actions" >
      <input type="button" name="Submit1" value="Cancelar" class="sf_admin_action_cancel" onclick="$('desincorporar').hide();$('fcregveh_desincorporar').value='N';" />
    </ul>
    </th>
    <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
</tr>
</table>
<?php } ?>
</div>
</fieldset>
</div>

<div id="modificacion" <?php echo $bandera3; ?>>
<fieldset id="sf_fieldset_none" class="">
<h2><?php echo __('Datos de la Modificación')?></h2>
<div class="form-row">
<div id="divrefmod">
  <?php echo label_for('fcregveh[refmod]', __('Referencia:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{refmod}')): ?> form-error<?php endif; ?>">
  
  <?php $value = object_input_tag($fcregveh, 'getRefmod', array (
    'size' => 10,
    'readonly' => false,
    'control_name' => 'fcregveh[refmod]',
                'onBlur' => "javascript: valor=this.value; if (valor!='') {valor=valor.pad(10, '0',0);}else{valor=valor.pad(10, '#',0);};document.getElementById('fcregveh_refmod').value=valor;document.getElementById('fcregveh_refmod').disabled=false;",
                'onblur' => "Rvalor(this.valor);"

  ));
  echo $value ? $value : '&nbsp;'?>
  <div class="sf_admin_edit_help"><?php echo __('Solo Numeros') ?></div>
  </div>
</div>
<br>

<div id="divfunrecmod">
  <?php echo label_for('fcregveh[funrecmod]', __('Funcionario:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{funrecmod}')): ?> form-error<?php endif; ?>">
  <?php
  $value = object_input_tag($fcregveh, 'getFunrecmod', array (
    'size' => 40,
    'readonly' => false,
    'control_name' => 'fcregveh[funrecmod]'

  ));
  echo $value ? $value : '&nbsp;'
?>
<div class="sf_admin_edit_help"><?php echo __('Solo Letras') ?></div>
</div>
</div>
<br>
<div id="divfec">
  <?php echo label_for('fcregveh[fec]', __('Fecha:'), 'class="required" Style="text-align:left; width:50px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcregveh{fec}')): ?> form-error<?php endif; ?>">
  <?php $value = object_input_date_tag($fcregveh, 'getFec', array (
  'rich' => true,
  'size' => 10,
  'maxlength' => 10,
  'onkeyup' => 'javascript: mascara(this,\'/\',patron,true)',
  'calendar_button_img' => '/sf/sf_admin/images/date.png',
  'control_name' => 'fcregveh[fec]',
  'date_format' => 'dd/MM/yyyy',
)); echo $value ? $value : '&nbsp;' ?>
  </div>
</div>

<table>
<tr>
    <th>
    <ul  class="sf_admin_actions" >
      <input type="button" name="Submit1" value="Cancelar" class="sf_admin_action_cancel" onclick="$('modificacion').hide();$('fcregveh_modificar').value='N';" />
    </ul>
    </th>
    <th>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </th>
</tr>
</table>

</div>  
</fieldset>
</div>  

<?php }  ?>

<script type="text/javascript">
function ajaxdesincorpora()
{
  $('desincorporar').show();
  $('fcregveh_desincorporar').value='S';

  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5'});

}

function ajaxtraspaso()
{
  $('negacion2').show();
  $('fcregveh_traspaso').value='S';
  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6'});
}

</script>