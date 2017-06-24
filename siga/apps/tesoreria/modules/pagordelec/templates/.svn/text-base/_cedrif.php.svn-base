<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th>
            <?php echo label_for('opordpag[cedrif1]', __('Beneficiario Desde:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{cedrif1}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{cedrif1}')): ?>
                <?php echo form_error('opordpag{cedrif1}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opordpag, 'getCedrif1', array (
              'size' => 20,
              'control_name' => 'opordpag[cedrif1]',
              'maxlength' => 16,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Tesmovemiche/clase/Opbenefi/frame/sf_admin_edit_form/obj1/opordpag_cedrif1/campo1/cedrif','','','botoncat')?>
            </div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php echo label_for('opordpag[cedrif2]', __('Beneficiario Hasta:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{cedrif2}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{cedrif2}')): ?>
                <?php echo form_error('opordpag{cedrif2}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opordpag, 'getCedrif2', array (
              'size' => 20,
              'control_name' => 'opordpag[cedrif2]',
              'maxlength' => 16,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Tesmovemiche/clase/Opbenefi/frame/sf_admin_edit_form/obj1/opordpag_cedrif2/campo1/cedrif','','','botoncat')?>
            </div>
        </td>
    </tr>    
</table>