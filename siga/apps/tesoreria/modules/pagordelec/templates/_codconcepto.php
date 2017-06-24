<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th>
            <?php echo label_for('opordpag[codconcepto1]', __('Concepto de Pago Desde:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{codconcepto1}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{codconcepto1}')): ?>
                <?php echo form_error('opordpag{codconcepto1}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opordpag, 'getCodconcepto1', array (
              'size' => 20,
              'control_name' => 'opordpag[codconcepto1]',
              'maxlength' => 4,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opconpag_Pagemiord/clase/Opconpag/frame/sf_admin_edit_form/obj1/opordpag_codconcepto1/campo1/codconcepto','','','botoncat')?>
            </div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php echo label_for('opordpag[codconcepto2]', __('Concepto de Pago Hasta:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opordpag{codconcepto2}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opordpag{codconcepto2}')): ?>
                <?php echo form_error('opordpag{codconcepto2}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opordpag, 'getCodconcepto2', array (
              'size' => 20,
              'control_name' => 'opordpag[codconcepto2]',
              'maxlength' => 4,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Opconpag_Pagemiord/clase/Opconpag/frame/sf_admin_edit_form/obj1/opordpag_codconcepto2/campo1/codconcepto','','','botoncat')?>
            </div>
        </td>
    </tr>    
</table>