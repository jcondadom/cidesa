  <?php $value = object_input_tag($contabc, 'getNumcomdes', array (
  'size' => 8,
  'maxlength' => 8,
  'control_name' => 'contabc[numcomdes]',
  'onBlur'=> remote_function(array(
  	'update' => 'divgrid',
    'url'      => 'confinelicom/ajax',
    'complete' => 'AjaxJSON(request, json)',
    'condition' => "$('contabc_numcomdes').value != ''",
    'script' => true,
    'with' => "'ajax=1&numcom1='+$('contabc_numcomdes').value+'&numcom2='+$('contabc_numcomhas').value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp;&nbsp;
<?php echo button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Contabc_ConFinEliCom/clase/Contabc/frame/sf_admin_edit_form/obj1/contabc_numcomdes/campo1/numcom",'','','botoncat')?>