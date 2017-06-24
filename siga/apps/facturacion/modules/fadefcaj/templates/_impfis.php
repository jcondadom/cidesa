  <?php $impfis = H::getConfApp2('impfis', 'facturacion', 'fafactur'); ?>

  <?php if($impfis == 'S' && $fadefcaj->getId()) : ?>


<h2 class="h2" onclick="javascript: return $('divImpresora Fiscal').toggle();"><?php echo __('Impresora Fiscal') ?></h2>
<fieldset id="sf_fieldset_impresora_fiscal" class="">

<div class="form-row" id="divImpresora Fiscal">
<div id="divimpfishost">
  <?php if($labels['fadefcaj{impfishost}']!='.:') { ?>
  <?php echo label_for('fadefcaj[impfishost]', __($labels['fadefcaj{impfishost}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fadefcaj{impfishost}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fadefcaj{impfishost}')): ?>
    <?php echo form_error('fadefcaj{impfishost}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($fadefcaj, 'getImpfishost', array (
  'size' => 30,
  'control_name' => 'fadefcaj[impfishost]',
)); echo $value ? $value : '&nbsp;' ?>
      
    
  <?php if($labels['fadefcaj{impfishost}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br/>
<div id="divimpfisname">
  <?php if($labels['fadefcaj{impfisname}']!='.:') { ?>
  <?php echo label_for('fadefcaj[impfisname]', __($labels['fadefcaj{impfisname}' ]), 'class="required" Style="text-align:left; width:150px"') ?>
  <div class="content<?php if ($sf_request->hasError('fadefcaj{impfisname}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fadefcaj{impfisname}')): ?>
    <?php echo form_error('fadefcaj{impfisname}', array('class' => 'form-error-msg')) ?>
  <?php endif; }?>  
  
   
  
  <?php $value = object_input_tag($fadefcaj, 'getImpfisname', array (
  'size' => 30,
  'control_name' => 'fadefcaj[impfisname]',
)); echo $value ? $value : '&nbsp;' ?>
      
    
  <?php if($labels['fadefcaj{impfisname}']!='.:') { ?>  
  

   
  </div>
  <?php  } ?> 

</div>
<br>
<div>
        <?php  echo button_to('       Generar Reporte X', 'fadefcaj/reporte?reporte=x&id=' . $fadefcaj->getId(), array (
      'confirm' => "¿Desea generar el reporte X para la impresora fiscal configurada para esta caja?"
      , 'class' => 'sf_admin_action_create float-center',)) ?>
</div>
<br>
<div>
        <?php  echo button_to('       Generar Reporte Z', 'fadefcaj/reporte?reporte=z&id=' . $fadefcaj->getId(), array (
      'confirm' => "¿Desea generar el reporte Z para la impresora fiscal configurada para esta caja?"
      , 'class' => 'sf_admin_action_list float-center',)) ?>
</div>
<br>
<div>
        <?php  echo button_to('       Cancelar Impresion Actual', 'fadefcaj/reporte?reporte=c&id=' . $fadefcaj->getId(), array (
      'confirm' => "¿Desea Cancelar la impresión actual de la impresora fiscal configurada para esta caja?"
      , 'class' => 'sf_admin_action_list float-center',)) ?>
</div>
<br>
<div>
        <?php  echo button_to('       Resetear Impresora Fiscal', 'fadefcaj/reporte?reporte=r&id=' . $fadefcaj->getId(), array (
      'confirm' => "¿Desea Resetear la impresora fiscal configurada para esta caja?"
      , 'class' => 'sf_admin_action_delete float-center',)) ?>
</div>

</div>
</fieldset>

  <?php endif; ?>
