<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th>
            <?php echo label_for('tscheemi[fecemi1]', __('Fecha Desde:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('tscheemi{fecemi1}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('tscheemi{fecemi1}')): ?>
                <?php echo form_error('tscheemi{fecemi1}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_date_tag($tscheemi, 'getFecemi1', array (
                  'rich' => true,
                  'calendar_button_img' => '/sf/sf_admin/images/date.png',
                  'control_name' => 'tscheemi[fecemi1]',
                  'date_format' => 'dd/MM/yyyy',
                  'maxlength' => 10,
                  'onkeyup' => "javascript: mascara(this,'/',patron,true)",    
                )); echo $value ? $value : '&nbsp;' ?>
            </div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>
        <td>
            <?php echo label_for('tscheemi[fecemi2]', __('Fecha Hasta:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('tscheemi{fecemi2}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('tscheemi{fecemi2}')): ?>
                <?php echo form_error('tscheemi{fecemi2}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_date_tag($tscheemi, 'getFecemi2', array (
                  'rich' => true,
                  'calendar_button_img' => '/sf/sf_admin/images/date.png',
                  'control_name' => 'tscheemi[fecemi2]',
                  'date_format' => 'dd/MM/yyyy',
                  'maxlength' => 10,
                  'onkeyup' => "javascript: mascara(this,'/',patron,true)",    
                )); echo $value ? $value : '&nbsp;' ?>
            </div>
        </td>
    </tr>    
</table>