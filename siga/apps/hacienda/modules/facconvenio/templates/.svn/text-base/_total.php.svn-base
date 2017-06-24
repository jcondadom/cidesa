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
    <?php echo label_for('fcconpag[totalcon]', __('Total a Convenir:'), 'class="required" ') ?>

	<?php $value = object_input_tag($fcconpag, array('getTotalcon',true), array (
		'size' => 10,
  		'control_name' => 'fcconpag[totalcon]',
  		'readonly' => true,
		)); echo $value ? $value : '&nbsp;' ?>

</th>
<th><center> &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;</center></th>

<th>
    <?php echo label_for('fcconpag[tmonfin]', __('Total a Pagar (Financiado):'), 'class="required" ') ?>

<?php $value = object_input_tag($fcconpag, 'getTmonfin', array (
  'size' => 10,
  'control_name' => 'fcconpag[tmonfin]',
  'readonly' => true,
)); echo $value ? $value : '&nbsp;' ?>

</th>

</tr>

</table>
</div>
