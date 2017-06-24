

<?php $value = object_input_tag($cpcompro, 'getTipnom', array (
  'control_name' => 'cpcompro[tipnom]',
  'size' => 10,
  'maxlength' => 4,
  'onBlur'=> remote_function(array(
        'update'  =>  'divgrid',
        'url'      => 'pregencomnom/ajax',
        'complete' => 'AjaxJSON(request, json)',
        'condition' => "$('cpcompro_tipnom').value != ''",
        'with' => "'ajax=3&fecha='+$('cpcompro_fecnom').value+'&gasto='+$('cpcompro_gasto').value+'&banco='+$('cpcompro_banco').value+'&especial='+$('cpcompro_nomespecial').value+'&codnomesp='+$('cpcompro_codnomesp').value+'&codigo='+this.value"))
)); echo $value ? $value : '&nbsp;' ?>
&nbsp; &nbsp;&nbsp;&nbsp;

<?php 
$sql="Select distinct((CASE when c.cedemp is null THEN b.nomnom else C.NOMEMP||' ('||B.NOMNOM||')' END)) as nomina,
         A.CODNOM as codigo,A.FECNOM as fecha,a.codtipgas as gasto,A.CODBAN as codban, A.ESPECIAL as especial, A.CODNOMESP as nominaesp
         FROM NPNOMINA B,NPCIENOM A left outer join NPHOJINT C on A.CODBAN=C.CEDEMP
         WHERE A.CODNOM=B.CODNOM AND A.ASIDED<>'P' AND A.ASIDED<>'D' AND A.REFCOM is null order by nomina,fecha;";

echo  button_to_popup('...',cross_app_link_to('herramientas','catalogobuscar').'/space/catalogo1/objs/cpcompro_tipnom-cpcompro_nomina-cpcompro_fecnom-cpcompro_gasto-cpcompro_banco-cpcompro_nomespecial-cpcompro_codnomesp/campos/codigo-nomina-fecha-gasto-codban-especial-nominaesp',$sql,'catalogo1')?>