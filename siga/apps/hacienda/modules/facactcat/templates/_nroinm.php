<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
  <?php $value = object_input_tag($fcreginm, 'getNroinm', array (
  'size' => 10,
  'control_name' => 'fcreginm[nroinm]',
  'maxlength' => 15,
  'onBlur'=> remote_function(array(
        'url'      => 'facactcat/ajax',
        'condition' => "$('fcreginm_nroinm').value != ''",
        'complete' => 'AjaxJSON(request, json)',
        'with' => "'ajax=1&cajtexmos=fcreginm_rifcon&cajtexcom=fcreginm_nroinm&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Facinmdec_Fcreginm/clase/Fcreginm/frame/sf_admin_edit_form/obj1/fcreginm_nroinm/obj2/fcreginm_rifcon/obj3/fcreginm_nomcon/campo1/nroinm/campo2/rifcon/campo3/nomcon')?>