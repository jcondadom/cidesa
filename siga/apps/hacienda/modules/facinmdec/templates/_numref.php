<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>

  <?php $value = object_input_tag($fcdeclar, 'getNumref', array (
  'size' => 20,
   //'onBlur' => "javascript: valor=this.value; valor=valor.pad(15, '0',0);document.getElementById('fcdeclar_numref').value=valor;document.getElementById('fcdeclar_numref').disabled=false;verificarRegInmueble();",
  'control_name' => 'fcdeclar[numref]',
  'maxlength' => 50,
  'onBlur'=> remote_function(array(
        'update'  =>  'divgrid',
        'url'      => 'facinmdec/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'condition' => "$('fcdeclar_numref').value != '' && $('id').value == ''",
        'with' => "'ajax=1&codigo='+this.value"))
)); echo $value ? $value : '&nbsp;' ?>

&nbsp;

<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo').'/metodo/Facinmdec_Fcreginm/clase/Fcreginm/frame/sf_admin_edit_form/obj1/fcdeclar_numref/campo1/nroinm')?>





