<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $arrpag = $params['arrpag']?>

  <?php if($labels['liordcom{conpag}']!='.:') { ?>
  <?php echo label_for('liordcom[conpag]', __($labels['liordcom{conpag}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('liordcom{conpag}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liordcom{conpag}')): ?>
    <?php echo form_error('liordcom{conpag}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('liordcom[conpag]', options_for_select($arrpag,$liordcom->getConpag()), array (
)); ?>


  <?php if($labels['liordcom{conpag}']!='.:') { ?>



  </div>
  <?php  } ?>
