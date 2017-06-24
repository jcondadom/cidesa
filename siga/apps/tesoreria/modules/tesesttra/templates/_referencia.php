<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table>
    <tr>
        <th><div id="divnumref" style="display:none">
            <?php echo label_for('opdefemp[numref]', __('Referencia:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opdefemp{numref}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opdefemp{numref}')): ?>
                <?php echo form_error('opdefemp{numref}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opdefemp, 'getNumref', array (
              'size' => 20,
              'control_name' => 'opdefemp[numref]',
              'maxlength' => 10,
            )); echo $value ? $value : '&nbsp;' ?>            
            </div></div>
        </th>
        <td>
            &nbsp;&nbsp;&nbsp;
        </td>        
    </tr>    
    <tr>
      <td><div id="divnumcue" style="display:none">
            <?php echo label_for('opdefemp[numcue]', __('Cuenta Bancaria:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opdefemp{numcue}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opdefemp{numcue}')): ?>
                <?php echo form_error('opdefemp{numcue}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opdefemp, 'getNumcue', array (
              'size' => 25,
              'control_name' => 'opdefemp[numcue]',
              'maxlength' => 20,
            )); echo $value ? $value : '&nbsp;' ?>             
              </div></div>
        </td>
    </tr>
    <tr>
      <td><div id="divtipmov" style="display:none">
            <?php echo label_for('opdefemp[tipmov]', __('Tipo de Documento:'), 'class="required" ') ?>
              <div class="content<?php if ($sf_request->hasError('opdefemp{tipmov}')): ?> form-error<?php endif; ?>">
              <?php if ($sf_request->hasError('opdefemp{tipmov}')): ?>
                <?php echo form_error('opdefemp{tipmov}', array('class' => 'form-error-msg')) ?>
              <?php endif; ?>

              <?php $value = object_input_tag($opdefemp, 'getTipmov', array (
              'size' => 10,
              'control_name' => 'opdefemp[tipmov]',
              'maxlength' => 4,
            )); echo $value ? $value : '&nbsp;' ?>           
              </div> </div>
        </td>
    </tr>
</table>