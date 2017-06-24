<?php use_helper('Object', 'ObjectAdmin', 'I18N') ?>

<?php $tablas = $params['tablas']?>

  <?php if($labels['liasigdec{tabla}']!='.:') { ?>
  <?php echo label_for('liasigdec[tabla]', __($labels['liasigdec{tabla}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('liasigdec{tabla}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('liasigdec{tabla}')): ?>
    <?php echo form_error('liasigdec{tabla}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>


  <?php echo select_tag('liasigdec[tabla]', options_for_select($tablas,$liasigdec->getTabla()), array (
      'onChange' => "if(this.value!='') toAjaxUpdater('divgrid','1',getUrlModuloAjax(),this.value,'','');",
)); ?>


  <?php if($labels['liasigdec{tabla}']!='.:') { ?>



  </div>
  <?php  } ?>
