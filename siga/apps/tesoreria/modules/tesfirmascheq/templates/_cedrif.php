<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th>
            <?php echo label_for('tscheemi[cedrif1]', __('Beneficiario Desde:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('tscheemi{cedrif1}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('tscheemi{cedrif1}')): ?>
                <?php echo form_error('tscheemi{cedrif1}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($tscheemi, 'getCedrif1', array (
              'size' => 20,
              'control_name' => 'tscheemi[cedrif1]',
              'maxlength' => 16,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Tscheemi/clase/Opbenefi/frame/sf_admin_edit_form/obj1/tscheemi_cedrif1/campo1/cedrif','','','botoncat')?>
            </div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php echo label_for('tscheemi[cedrif2]', __('Beneficiario Hasta:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('tscheemi{cedrif2}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('tscheemi{cedrif2}')): ?>
                <?php echo form_error('tscheemi{cedrif2}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($tscheemi, 'getCedrif2', array (
              'size' => 20,
              'control_name' => 'tscheemi[cedrif2]',
              'maxlength' => 16,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opbenefi_Tscheemi/clase/Opbenefi/frame/sf_admin_edit_form/obj1/tscheemi_cedrif2/campo1/cedrif','','','botoncat')?>
            </div>
        </td>
    </tr>    
</table>