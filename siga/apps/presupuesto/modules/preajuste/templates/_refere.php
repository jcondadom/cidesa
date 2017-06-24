<table>
    <tr>
        <th>
            <?php  $value = object_input_tag($cpajuste, 'getRefere', array (
  'size' => 15,
  'maxlength' => 8,
  'readonly'  =>  $cpajuste->getId()!='' ? true : false ,
  'control_name' => 'cpajuste[refere]',
  'onBlur'=> remote_function(array(
        'update'  => 'divgrid',
        'url'      => 'preajuste/ajax',
        'condition' => "$('cpajuste_refere').value != '' && $('id').value == ''",
        'complete' => 'AjaxJSON(request, json)',
        'script' => true,
        'with' => "'ajax=2&cajtexmos=cpajuste_desmov&cajtexcom=cpajuste_refere&reftipaju='+$('cpajuste_reftipaju').value+'&afeaju='+$('cpajuste_afeaju').value+'&fecaju='+$('cpajuste_fecaju').value+'&codigo='+this.value"
        ))
)); echo $value ? $value : '&nbsp;' ?>
        </th>
        <th>
            <?php if ($cpajuste->getId()=='') {  ?>
<div id="divprecom" >
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cpprecom_PreAjuste/clase/Cpprecom/frame/sf_admin_edit_form/obj1/cpajuste_refere/obj2/cpajuste_fecmov/obj3/cpajuste_desmov/campo1/refprc/campo2/fecprc/campo3/desprc/param1/'+replaceAll($('cpajuste_fecaju').value,'/','*')+'/param2/1/param3/'+$('cpajuste_afeaju').value+'",'','','botoncat')?>
</div>    
<div id="divcompro" style="display: none">
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cpcompro_PreAjuste/clase/Cpcompro/frame/sf_admin_edit_form/obj1/cpajuste_refere/obj2/cpajuste_fecmov/obj3/cpajuste_desmov/campo1/refcom/campo2/feccom/campo3/descom/param1/'+replaceAll($('cpajuste_fecaju').value,'/','*')+'/param2/1/param3/'+$('cpajuste_afeaju').value+'",'','','botoncat')?>
</div> 
<div id="divcausad" style="display: none">
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cpcausad_PreAjuste/clase/Cpcausad/frame/sf_admin_edit_form/obj1/cpajuste_refere/obj2/cpajuste_fecmov/obj3/cpajuste_desmov/campo1/refcau/campo2/feccau/campo3/descau/param1/'+replaceAll($('cpajuste_fecaju').value,'/','*')+'/param2/1/param3/'+$('cpajuste_afeaju').value+'",'','','botoncat')?>
</div> 
<div id="divpagado" style="display: none">
    <?php echo  button_to_popup('...',cross_app_link_to('herramientas','catalogo')."/metodo/Cppagos_PreAjuste/clase/Cppagos/frame/sf_admin_edit_form/obj1/cpajuste_refere/obj2/cpajuste_fecmov/obj3/cpajuste_desmov/campo1/refpag/campo2/fecpag/campo3/despag/param1/'+replaceAll($('cpajuste_fecaju').value,'/','*')+'/param2/1/param3/'+$('cpajuste_afeaju').value+'",'','','botoncat')?>
</div> 
<?php } ?>
        </th>
    </tr>
</table>



