<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th>
            <?php echo label_for('opordpag[numord1]', __('N° Orden Desde:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{numord1}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{numord1}')): ?>
                <?php echo form_error('opordpag{numord1}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opordpag, 'getNumord1', array (
              'size' => 20,
              'control_name' => 'opordpag[numord1]',
              'maxlength' => 8,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Numord_Opordpag/clase/Opordpag/frame/sf_admin_edit_form/obj1/opordpag_numord1/campo1/numord','','','botoncat')?>
            </div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php echo label_for('opordpag[numord2]', __('N° Orden Hasta:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{numord2}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{numord2}')): ?>
                <?php echo form_error('opordpag{numord2}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opordpag, 'getNumord2', array (
              'size' => 20,
              'control_name' => 'opordpag[numord2]',
              'maxlength' => 8,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Numord_Opordpag/clase/Opordpag/frame/sf_admin_edit_form/obj1/opordpag_numord2/campo1/numord','','','botoncat')?>
              </div>
        </td>
    </tr>    
</table>