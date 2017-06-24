<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="form-row" >
<table cellspacing="0" cellpadding="0" border="0">
<tr>
<th>
    <?php echo label_for('fcpagos[saldo5]', __('Pagado Contribuyente:'), 'class="required" ') ?>
     <?php $value = object_input_tag($fcpagos, array('getSaldo5',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[saldo5]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '+' ?>&nbsp;&nbsp;&nbsp;</strong></th>
<th>
	<?php echo label_for('fcpagos[recargo]', __('Recargos:'), 'class="required"') ?>
       <?php $value = object_input_tag($fcpagos, array('getRecargo',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[recargo]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '-' ?>&nbsp;&nbsp;&nbsp;</strong</th>
<th>
       <?php echo label_for('fcpagos[descuento]', __('Descuentos:'), 'class="required"') ?>
       <?php $value = object_input_tag($fcpagos, array('getDescuento',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[descuento]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
</th>
<th><strong>&nbsp;&nbsp;&nbsp;<?php echo '=' ?>&nbsp;&nbsp;&nbsp;</strong</th>
<th>
	<?php echo label_for('fcpagos[totalpag]', __('Total a Pagar:'), 'class="required"') ?>
        <?php $value = object_input_tag($fcpagos, array('getTotalpag',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[totalpag]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
</th>
</tr>
</table>


</div>