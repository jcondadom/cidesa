
<fieldset class="" id="sf_fieldset_none">
<h2>Datos de la Inicial</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>
    <?php echo label_for('fcconpag[porini]', __('Porcentaje(%):'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcconpag, array('getPorini',true), array (
		'size' => 10,
  		'control_name' => 'fcconpag[porini]',
               'onBlur'=> remote_function(array(
                 'update'   => 'divgridconvenio',
                 'url'      => 'facconvenio/ajax',
                 'script'   => true,
                 'complete' => 'AjaxJSON(request, json)',
                 'condition' => "$('id').value == ''",
                 'submit' => 'sf_admin_edit_form',
                )),
  		'readonly' => false,
		)); echo $value ? $value : '&nbsp;' ?>

</th>

<th><center> &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;</center></th>
<th>
    <?php echo label_for('fcconpag[monini]', __('Monto(Bs.):'), 'class="required" ') ?>

<?php $value = object_input_tag($fcconpag, 'getMonini', array (
  'size' => 10,
  'control_name' => 'fcconpag[monini]',
   'onBlur'=> remote_function(array(
                 'update'   => 'divgridconvenio',
                 'url'      => 'facconvenio/ajax',
                 'script'   => true,
                 'complete' => 'AjaxJSON(request, json)',
                 'condition' => "$('id').value == ''",
                 'submit' => 'sf_admin_edit_form',
                )),
  'readonly' => false,
)); echo $value ? $value : '&nbsp;' ?>

</th>
</tr>

</table>
</div>
</fieldset>

<fieldset class="" id="sf_fieldset_none">
<h2>Datos del Financiamiento</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>
    <?php echo label_for('fcconpag[porfin]', __('Porcentaje(%):'), 'class="required" ') ?>
     	<?php $value = object_input_tag($fcconpag, array('getPorfin',true), array (
		'size' => 10,
  		'control_name' => 'fcconpag[porfin]',
                'onBlur'=> remote_function(array(
                 'update'   => 'divgridconvenio',
                 'url'      => 'facconvenio/ajax',
                 'script'   => true,
                 'complete' => 'AjaxJSON(request, json)',
                 'condition' => "$('id').value == ''",
                 'submit' => 'sf_admin_edit_form',
                )),
  		'readonly' => false,
		)); echo $value ? $value : '&nbsp;' ?>
</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;</center></th>
<th>
    <?php echo label_for('fcconpag[monfin]', __('Monto(Bs.):'), 'class="required" ') ?>
     	<?php $value = object_input_tag($fcconpag, array('getMonfin',true), array (
		'size' => 10,
  		'control_name' => 'fcconpag[monfin]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>

</table>
</div>
</fieldset>
<fieldset class="" id="sf_fieldset_none">
<h2>Datos de las Cuotas</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>
    <?php echo label_for('fcconpag[numcuo]', __('Cantidad:'), 'class="required" ') ?>
     	<?php $value = object_input_tag($fcconpag, array('getNumcuo',true), array (
		'size' => 10,
  		'control_name' => 'fcconpag[numcuo]',
                'onBlur'=> remote_function(array(
                 'update'   => 'divgridconvenio',
                 'url'      => 'facconvenio/ajax',
                 'script'   => true,
                 'complete' => 'AjaxJSON(request, json)',
                 'condition' => "$('fcconpag_numcuo').value != '0,00' && $('id').value == ''",
                 'submit' => 'sf_admin_edit_form',
                )),
  		'readonly' => false,
		)); echo $value ? $value : '&nbsp;' ?>
</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;</center></th>
<th>
    <?php echo label_for('fcconpag[moncuo]', __('Monto por Cuota (Bs.):'), 'class="required" ') ?>
     	<?php $value = object_input_tag($fcconpag, array('getMoncuo',true), array (
		'size' => 10,
  		'control_name' => 'fcconpag[moncuo]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;</center></th>
<th>
    <?php echo label_for('fcconpag[totcuo]', __('Total (Bs.):'), 'class="required" ') ?>
     	<?php $value = object_input_tag($fcconpag, array('getTotcuo',true), array (
		'size' => 10,
  		'control_name' => 'fcconpag[totcuo]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>

</table>
</div>
</fieldset>
