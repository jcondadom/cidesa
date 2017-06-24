<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Grid') ?>

<?php echo grid_tag_v2($cobtransa->getObjdetche()); ?>
<br>
 <?php echo label_for('cobtransa[montotche]', __($labels['cobtransa{montotche}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('cobtransa{montotche}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('cobtransa{montotche}')): ?>
    <?php echo form_error('cobtransa{montotche}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php
 $value = object_input_tag($cobtransa, 'getMontotche', array (
	'readonly' => true,
	'class' => 'grid_txtright',
	'control_name' => 'cobtransa[montotche]',

));
echo $value ? $value : '&nbsp;'
?>
    </div>

<ul class="sf_admin_actions" >
<li class="float-center">
<input id="aceptache" class="sf_admin_action_save" type="button" value="Aceptar" onClick="aceptardetche();">
</li>
</ul>