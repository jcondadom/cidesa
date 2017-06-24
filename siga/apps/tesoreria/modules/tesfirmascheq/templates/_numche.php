<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th>
            <?php echo label_for('tscheemi[numche1]', __('N° Cheque Desde:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('tscheemi{numche1}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('tscheemi{numche1}')): ?>
                <?php echo form_error('tscheemi{numche1}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($tscheemi, 'getNumche1', array (
              'size' => 20,
              'control_name' => 'tscheemi[numche1]',
              'maxlength' => 20,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Numche_Tscheemi/clase/Tscheemi/frame/sf_admin_edit_form/obj1/tscheemi_numche1/campo1/numche','','','botoncat')?>
            </div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php echo label_for('tscheemi[numche2]', __('N° Cheque Hasta:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('tscheemi{numche2}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('tscheemi{numche2}')): ?>
                <?php echo form_error('tscheemi{numche2}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($tscheemi, 'getNumche2', array (
              'size' => 20,
              'control_name' => 'tscheemi[numche2]',
              'maxlength' => 20,
            )); echo $value ? $value : '&nbsp;' ?>
              &nbsp;&nbsp;
              <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Numche_Tscheemi/clase/Tscheemi/frame/sf_admin_edit_form/obj1/tscheemi_numche2/campo1/numche','','','botoncat')?>
              </div>
        </td>
    </tr>    
</table>