<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $value = object_input_date_tag($npgrutur, 'getFecfin', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'npgrutur[fecfin]',
'date_format' => 'dd/MM/yyyy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
'onBlur'=> remote_function(array(
     'update'   => 'divgrid',
     'url'      => 'nomasigrutur/ajax',
     'condition' => "$('npgrutur_fecfin').value != ''",
     'script'   => true,
     'complete' => 'AjaxJSON(request, json)',
     'with' => "'ajax=3&codigo='+$('npgrutur_fecfin').value+'&fecini='+$('npgrutur_fecini').value+'&turno='+$('npgrutur_codtur').value+'&nomina='+$('npgrutur_codnom').value"
 ))
)); echo $value ? $value : '&nbsp;' ?>

<script type="text/javascript" lang="JavaScript">
 function validarepetido(id)
 {
   if ($(id).value!="") {
     if (grupo_repetido(id))
     {
      alert_('El Grupo esta Repetido');
      $(id).value="";
      $(id).focus();    
     }
   }
 }
    
 function grupo_repetido(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var grupo=$(id).value;

   var gruporepetido=false;
   var am=totalregistros('ax',1,obtener_filas_grid('a',1));
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var grupo2=$(codigo).value;

    if (i!=fila)
    {
      if (grupo==grupo2)
      {
        gruporepetido=true;
        break;
      }
    }
   i++;
   }
   return gruporepetido;
 }
</script>