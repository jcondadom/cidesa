<ul class="sf_admin_actions">     
<li><?php if (!$tsmovban->getId()): ?>
<?php echo button_to(__('Guardar'), 'tesmigmovban/salvar?id='.$tsmovban->getId(), array (
  'id' => 'salvar',
  'class' => 'sf_admin_action_save',
  'onClick' => 'document.sf_admin_edit_form.submit();',
  'style' => 'display:none',
)) ?><?php endif; ?>
</li>
      <li><?php if (!$tsmovban->getId()): ?>
<?php echo button_to(__('Cargar Archivo'), 'tesmigmovban/cargar?id='.$tsmovban->getId(), array (
  'id' => 'cargar',
  'class' => 'sf_admin_action_save',
  'onClick' => 'cargararchivo(\'tsmovban_archixls\')',
)) ?><?php endif; ?>
</li>
      <li><?php if (!$tsmovban->getId()): ?>
<?php echo button_to(__('Leer Archivo'), 'tesmigmovban/leer?id='.$tsmovban->getId(), array (
  'id' => 'leer',
  'class' => 'sf_admin_action_save',
  'onClick' => 'leerarchivo(\'tsmovban_archixls\')',
)) ?><?php endif; ?>
</li>
</ul>
                          