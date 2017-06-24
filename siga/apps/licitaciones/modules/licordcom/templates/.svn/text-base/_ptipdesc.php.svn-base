<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

  <?php if($labels['liordcom{tipdesc}']!='.:') { ?>
  <?php echo label_for('liordcom[tipdesc]', __($labels['liordcom{tipdesc}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('liordcom{tipdesc}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liordcom{tipdesc}')): ?>
    <?php echo form_error('liordcom{tipdesc}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('liordcom[tipdesc]', options_for_select(array(''=>'Seleccione...','P'=>'Porcentaje(%)','M'=>'Monto'),$liordcom->getTipdesc()), array (
)); ?>


  <?php if($labels['liordcom{tipdesc}']!='.:') { ?>



  </div>
  <?php  } ?>
