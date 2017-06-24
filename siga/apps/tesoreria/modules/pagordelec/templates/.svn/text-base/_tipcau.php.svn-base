<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th>
            <?php echo label_for('opordpag[tipcau1]', __('Tipo Orden Desde:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{tipcau1}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{tipcau1}')): ?>
                <?php echo form_error('opordpag{tipcau1}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opordpag, 'getTipcau1', array (
              'size' => 20,
              'control_name' => 'opordpag[tipcau1]',
              'maxlength' => 4,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccau_Pagemiord/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opordpag_tipcau1/campo1/tipcau','','','botoncat')?>
            </div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php echo label_for('opordpag[tipcau2]', __('Tipo Orden Hasta:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{tipcau2}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{tipcau2}')): ?>
                <?php echo form_error('opordpag{tipcau2}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opordpag, 'getTipcau2', array (
              'size' => 20,
              'control_name' => 'opordpag[tipcau2]',
              'maxlength' => 4,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Cpdoccau_Pagemiord/clase/Cpdoccau/frame/sf_admin_edit_form/obj1/opordpag_tipcau2/campo1/tipcau','','','botoncat')?>
            </div>
        </td>
    </tr>    
</table>