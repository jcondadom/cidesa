<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <?php $value = object_input_tag($fcsollic, 'getNumlic', array (
  'size' => 10,
  'control_name' => 'fcsollic[numlic]',
  'maxlength' => 12,
  'onBlur'=> remote_function(array(
        'url'      => 'facactlic/ajax',
        'condition' => "$('fcsollic_numlic').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=fcsollic_rifcon&cajtexcom=fcsollic_numlic&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Facactlic_Fcsollic/clase/Fcsollic/frame/sf_admin_edit_form/obj1/fcsollic_numlic/obj2/fcsollic_rifcon/obj3/fcsollic_nomcon/campo1/numlic/campo2/rifcon/campo3/nomcon')?>