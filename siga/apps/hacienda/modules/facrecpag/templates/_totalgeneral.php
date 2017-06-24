<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div id="divmontodeuda">
  <?php echo label_for('fcpagos[montotdeuda]', __('Monto de la Deuda (A):'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{montotdeuda}')): ?> form-error<?php endif; ?>">

	<?php $value = object_input_tag($fcpagos, array('getMontotdeuda',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montotdeuda]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>
<br>
<div id="divmontoautliq">
  <?php echo label_for('fcpagos[montoautliq]', __(' Monto Auto-Liquidación:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{montoautliq}')): ?> form-error<?php endif; ?>">

	<?php $value = object_input_tag($fcpagos, array('getMontoautliq',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montoautliq]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>
<br>
<div id="divmontomora">
  <?php echo label_for('fcpagos[montomora]', __('Monto de Mora (C):'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{montomora}')): ?> form-error<?php endif; ?>">

	<?php $value = object_input_tag($fcpagos, array('getMontomora',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montomora]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>
<br>
<div id="divmontodscprntopago">
  <?php echo label_for('fcpagos[montodscprntopago]', __('Descuento Pronto Pago (D):'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{montodscprntopago}')): ?> form-error<?php endif; ?>">

	<?php $value = object_input_tag($fcpagos, array('getMontodscprntopago',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montodscprntopago]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>
<br>
<div id="divmontototalpagar">
  <?php echo label_for('fcpagos[montototalpagar]', __('Monto a Pagar (A+D-C):'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{montototalpagar}')): ?> form-error<?php endif; ?>">

	<?php $value = object_input_tag($fcpagos, array('getMontototalpagar',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[montototalpagar]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>
<br>
<div id="divpagcon">
  <?php echo label_for('fcpagos[pagcon]', __('Monto Pagado Contribuyente (E):'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{pagcon}')): ?> form-error<?php endif; ?>">

	<?php $value = object_input_tag($fcpagos, array('getPagcon',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[pagcon]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

  </div>

</div>
<br>
<div id="divsaldogen">
  <?php echo label_for('fcpagos[saldogen]', __('Saldo (A+C-D)-E:'), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcpagos{saldogen}')): ?> form-error<?php endif; ?>">

	<?php $value = object_input_tag($fcpagos, array('getSaldogen',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[saldogen]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

  </div>
</div>
