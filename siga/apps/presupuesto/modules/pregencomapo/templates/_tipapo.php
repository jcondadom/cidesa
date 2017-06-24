

<?php $value = object_input_tag($cpcompro, 'getTipapo', array (
  'control_name' => 'cpcompro[tipapo]',
  'size' => 10,
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
        'update'  =>  'divgrid',
        'url'      => 'pregencomapo/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('cpcompro_tipapo').value != ''",
        'with' => "'ajax=3&fecha='+$('cpcompro_fecnom').value+'&gasto='+$('cpcompro_gasto').value+'&codigo='+this.value"))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp; &nbsp;&nbsp;&nbsp;

<?php 
$sql="SELECT DISTINCT B.NOMCON,A.CODCON as codigoaporte, A.FECNOM as fecnom,A.CODTIPGAS AS GASTO  FROM NPCIENOM A, NPDEFCPT B
           Where A.CODCON = B.CODCON AND A.ASIDED='P' AND A.REFCOM is null order by a.fecnom, a.codcon";

echo  button_to_popup('...',cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/cpcompro_tipapo-cpcompro_fecnom-cpcompro_gasto/campos/codigoaporte-fecnom-gasto',$sql,'catalogo1')?>