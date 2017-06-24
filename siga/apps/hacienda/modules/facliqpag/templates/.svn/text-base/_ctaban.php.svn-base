<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php echo label_for('fcliqpag[ctaban]', __('Cuenta Bancaria:'), 'class="required" Style="text-align:left; width:145px"') ?>
  <div class="content<?php if ($sf_request->hasError('fcliqpag{ctaban}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('fcliqpag{ctaban}')): ?>
    <?php echo form_error('fcliqpag{ctaban}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>
&nbsp;

 <?php $value = object_input_tag($fcliqpag, 'getCtaban', array (
  'size' => 20,
  'maxlength' => 20,
  'control_name' => 'fcliqpag[ctaban]',
   'onBlur'=> remote_function(array(
        'url'      => 'facespdec/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('facliqpag_ctaban').value != '' && $('id').value == ''",
        'with' => "'ajax=1&codigo='+this.value"
        )),
)); echo $value ? $value : '&nbsp;' ?>
  <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Ingreging_tsdefban/clase/Tsdefban/frame/sf_admin_edit_form/obj1/fcliqpag_ctaban/obj2/fcliqpag_nomcue/campo1/numcue/campo2/nomcue')?>

&nbsp;
  <?php $value = object_input_tag($fcliqpag, 'getNomcue', array (
  'disabled' => true,
  'control_name' => 'fcliqpag[nomcue]',
  'size'=> 40,
)); echo $value ? $value : '&nbsp;' ?>
    </div>
