<ul class="sf_admin_actions">     
<li><?php if (!$tsmovlib->getId()): ?>
<?php echo button_to(__('Guardar'), 'tesmigmovlib/salvar?id='.$tsmovlib->getId(), array (
  'id' => 'salvar',
  'class' => 'sf_admin_action_save',
  'onClick' => 'document.sf_admin_edit_form.submit();',
  'style' => 'display:none',
)) ?><?php endif; ?>
</li>
      <li><?php if (!$tsmovlib->getId()): ?>
<?php echo button_to(__('Cargar Archivo'), 'tesmigmovlib/cargar?id='.$tsmovlib->getId(), array (
  'id' => 'cargar',
  'class' => 'sf_admin_action_save',
  'onClick' => 'cargararchivo(\'tsmovlib_archixls\')',
)) ?><?php endif; ?>
</li>
      <li><?php if (!$tsmovlib->getId()): ?>
<?php echo button_to(__('Leer Archivo'), 'tesmigmovlib/leer?id='.$tsmovlib->getId(), array (
  'id' => 'leer',
  'class' => 'sf_admin_action_save',
  'onClick' => 'leerarchivo(\'tsmovlib_archixls\')',
)) ?><?php endif; ?>
</li>
</ul>
                          