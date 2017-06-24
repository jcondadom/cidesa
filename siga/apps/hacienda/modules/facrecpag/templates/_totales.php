

<fieldset class="" id="sf_fieldset_none">
<h2>Monto a Pagar (A)</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>

    <?php echo label_for('fcpagos[montodeuda]', __('Monto de la Deuda:'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcpagos, array('getMontodeuda',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montodeuda]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp; + &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[montotmora]', __('Monto de Mora:'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcpagos, array('getMontotmora',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montotmora]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>

<th><center> &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[montotdscprntopago]', __('Desc.Pronto Pago:'), 'class="required" ') ?>

<?php $value = object_input_tag($fcpagos, 'getMontotdscprntopago', array (
  'size' => 10,
  'control_name' => 'fcpagos[montotdscprntopago]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</th>


<th><center> &nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[saldo1]', __('Saldo:'), 'class="required" ') ?>
       <?php $value = object_input_tag($fcpagos, array('getSaldo1',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[saldo1]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
</th>

</tr>

</table>
</div>
</fieldset>


<fieldset class="" id="sf_fieldset_none">
<h2>Diferencia (B)</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>
    <?php echo label_for('fcpagos[montodeuda2]', __('Monto de la Deuda'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcpagos, array('getMontodeuda2',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montodeuda2]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[montodautliq]', __('Monto Auto-Liquidación'), 'class="required" ') ?>

<?php $value = object_input_tag($fcpagos, 'getMontodautliq', array (
  'size' => 10,
  'control_name' => 'fcpagos[montodautliq]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</th>

<th><center> &nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[saldo2]', __('Saldo'), 'class="required" ') ?>
           <?php $value = object_input_tag($fcpagos, array('getSaldo2',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[saldo2]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
</th>

</tr>

</table>
</div>
</fieldset>


<fieldset class="" id="sf_fieldset_none">
<h2>Pagado Contribuyente (C)</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>

<th>
    <?php echo label_for('fcpagos[saldo3]', __('Monto'), 'class="required" ') ?>
     <?php $value = object_input_tag($fcpagos, array('getSaldo3',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[saldo3]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>

</tr>
</table>
</div>
</fieldset>


<fieldset class="" id="sf_fieldset_none">
<h2>Saldo (A-B-C)</h2>
<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>

<th>
    <?php echo label_for('fcpagos[saldo4]', __('Saldo'), 'class="required" ') ?>
     <?php $value = object_input_tag($fcpagos, array('getSaldo4',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[saldo4]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>

</tr>
</table>
</div>
</fieldset>