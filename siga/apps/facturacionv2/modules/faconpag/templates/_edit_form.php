<?php
// auto-generated by PropelCidesa
// date: 2008/11/20 14:50:05
?>
<?php echo form_tag('faconpag/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($faconpag, 'getId') ?>



<fieldset id="sf_fieldset_none" class="">

<div class="form-row" id="divNONE">
<div id="divdesconpag">
  <?php echo label_for('faconpag[desconpag]', __($labels['faconpag{desconpag}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faconpag{desconpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faconpag{desconpag}')): ?>
    <?php echo form_error('faconpag{desconpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($faconpag, 'getDesconpag', array (
  'size' => 40,
  'control_name' => 'faconpag[desconpag]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<br/>
<div id="divnumdia">
  <?php echo label_for('faconpag[numdia]', __($labels['faconpag{numdia}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faconpag{numdia}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faconpag{numdia}')): ?>
    <?php echo form_error('faconpag{numdia}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($faconpag, 'getNumdia', array (
  'size' => 7,
  'onKeyPress' => 'javascript:return validaEntero(event)',
  'control_name' => 'faconpag[numdia]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>
<br/>
<div id="divtipconpag">
  <?php echo label_for('faconpag[tipconpag]', __($labels['faconpag{tipconpag}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('faconpag{tipconpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('faconpag{tipconpag}')): ?>
    <?php echo form_error('faconpag{tipconpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

	<?
	if ($faconpag->getTipconpag()=='C')	{
	  ?><?php echo radiobutton_tag('faconpag[tipconpag]', 'C', true)        ."Contado".'&nbsp;&nbsp;&nbsp;';
	          echo radiobutton_tag('faconpag[tipconpag]', 'R', false)."   Crédito".'&nbsp;&nbsp;&nbsp;';
                  echo radiobutton_tag('faconpag[tipconpag]', 'O', false)."   Carta Orden".'&nbsp;&nbsp;&nbsp;';
                  echo radiobutton_tag('faconpag[tipconpag]', 'D', false)."   Donación";?>
			<?

	}elseif ($faconpag->getTipconpag()=='R'){
		echo radiobutton_tag('faconpag[tipconpag]', 'C', false)        ."Contado".'&nbsp;&nbsp;&nbsp;';
		echo radiobutton_tag('faconpag[tipconpag]', 'R', true)."   Crédito".'&nbsp;&nbsp;&nbsp;';
                echo radiobutton_tag('faconpag[tipconpag]', 'O', false)."   Carta Orden".'&nbsp;&nbsp;&nbsp;';
                echo radiobutton_tag('faconpag[tipconpag]', 'D', false)."   Donación";

	}elseif ($faconpag->getTipconpag()=='O'){
                echo radiobutton_tag('faconpag[tipconpag]', 'C', false)        ."Contado".'&nbsp;&nbsp;&nbsp;';
		echo radiobutton_tag('faconpag[tipconpag]', 'R', false)."   Crédito".'&nbsp;&nbsp;&nbsp;';
                echo radiobutton_tag('faconpag[tipconpag]', 'O', true)."   Carta Orden".'&nbsp;&nbsp;&nbsp;';
                echo radiobutton_tag('faconpag[tipconpag]', 'D', false)."   Donación";
        }elseif ($faconpag->getTipconpag()=='D'){
                echo radiobutton_tag('faconpag[tipconpag]', 'C', false)        ."Contado".'&nbsp;&nbsp;&nbsp;';
		echo radiobutton_tag('faconpag[tipconpag]', 'R', false)."   Crédito".'&nbsp;&nbsp;&nbsp;';
                echo radiobutton_tag('faconpag[tipconpag]', 'O', false)."   Carta Orden".'&nbsp;&nbsp;&nbsp;';
                echo radiobutton_tag('faconpag[tipconpag]', 'D', true)."   Donación";
        }else {
                echo radiobutton_tag('faconpag[tipconpag]', 'C', true)        ."Contado".'&nbsp;&nbsp;&nbsp;';
		echo radiobutton_tag('faconpag[tipconpag]', 'R', false)."   Crédito".'&nbsp;&nbsp;&nbsp;';
                echo radiobutton_tag('faconpag[tipconpag]', 'O', false)."   Carta Orden".'&nbsp;&nbsp;&nbsp;';
                echo radiobutton_tag('faconpag[tipconpag]', 'D', false)."   Donación";
        }?>

    </div>
</div>
<br/>
</div>
</fieldset>

<?php include_partial('edit_actions', array('faconpag' => $faconpag)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($faconpag->getId()): ?>
<?php echo button_to(__('delete'), 'faconpag/delete?id='.$faconpag->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
