<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <?php $value = object_input_tag($fcregveh, 'getPlaveh', array (
  'size' => 10,
  'control_name' => 'fcregveh[plaveh]',
  'maxlength' => 10,
  'onBlur'=> remote_function(array(
        'url'      => 'facactpla/ajax',
        'condition' => "$('fcregveh_plaveh').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=fcregveh_rifcon&cajtexcom=fcregveh_plaveh&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Facactpla_plaveh/clase/Fcregveh/frame/sf_admin_edit_form/obj1/fcregveh_plaveh/obj2/fcregveh_rifcon/obj3/fcregveh_nomcon/campo1/plaveh/campo2/rifcon/campo3/nomcon')?>