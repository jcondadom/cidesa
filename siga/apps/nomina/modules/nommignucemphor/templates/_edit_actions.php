<?php
// auto-generated by PropelCidesa
// date: 2014/03/27 08:48:29
?>
<?php

/**
 *
 * @package    Roraima
 * @subpackage vistas
 
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: _edit_actions.php 32815 2009-09-08 16:52:04Z lhernandez $
 * @copyright  Copyright 2007, Cide S.A.
 *
 */
 ?>
<ul class="sf_admin_actions">
      <li><?php if (!$npnucemphor->getId()): ?>
<?php echo button_to(__('Cargar Archivo'), 'nommignucemphor/cargar?id='.$npnucemphor->getId(), array (
  'id' => 'cargar',
  'class' => 'sf_admin_action_save',
  'onClick' => 'cargararchivo(\'npnucemphor_archixls\')',
)) ?><?php endif; ?>
</li>
      <li><?php if (!$npnucemphor->getId()): ?>
<?php echo button_to(__('Leer Archivo'), 'nommignucemphor/leer?id='.$npnucemphor->getId(), array (
  'id' => 'leer',
  'class' => 'sf_admin_action_save',
  'onClick' => 'leerarchivo(\'npnucemphor_archixls\')',
)) ?><?php endif; ?>
</li>
<li><?php echo submit_tag_click(__('save'), array (
  'name' => 'save',
  'class' => 'sf_admin_action_save',
)) ?></li>
      <li><?php if (!$npnucemphor->getId()): ?>
<?php echo button_to(__('Guardar'), 'nommignucemphor/salvar?id='.$npnucemphor->getId(), array (
  'id' => 'salvar',
  'class' => 'sf_admin_action_save',
  'onClick' => 'document.sf_admin_edit_form.submit();',
  'style' => 'display:none',
)) ?><?php endif; ?>
</li>
</ul>
                      