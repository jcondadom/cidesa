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
    <?php echo label_for('fcpagos[monpag]', __('Total a Pagar:'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcpagos, array('getMonpag',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[monpag]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[totalmon]', __('Total Monto:'), 'class="required" ') ?>

<?php $value = object_input_tag($fcpagos, 'getTotalmon', array (
  'size' => 10,
  'control_name' => 'fcpagos[totalmon]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp; = &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcpagos[saldo]', __('Saldo:'), 'class="required" ') ?>
     	<?php $value = object_input_tag($fcpagos, array('getSaldo',true), array (
		'size' => 10,
  		'control_name' => 'fcpagos[saldo]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>
</th>

</tr>

</table>
</div>
