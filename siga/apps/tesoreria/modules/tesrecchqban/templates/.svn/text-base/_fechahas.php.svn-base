<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $value = object_input_date_tag($tsdefban, 'getFechahas', array (
'rich' => true,
'calendar_button_img' => '/sf/sf_admin/images/date.png',
'control_name' => 'tsdefban[fechahas]',
'date_format' => 'dd/MM/yyyy',
'onkeyup' => "javascript: mascara(this,'/',patron,true)",
'onBlur'=> remote_function(array(
     'update'   => 'divgrid',
     'url'      => 'tesrecchqban/ajax',
     'condition' => "$('tsdefban_fechahas').value != ''",
     'script'   => true,
     'complete' => 'AjaxJSON(request, json)',
     'with' => "'ajax=3&codigo='+$('tsdefban_fechahas').value+'&fecdes='+$('tsdefban_fechades').value+'&numcue='+$('tsdefban_numcue').value"
 ))
)); echo $value ? $value : '&nbsp;' ?>

<script type="text/javascript" lang="JavaScript">
 function mensaje(id)
 {
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var colmoneda=col-2;
    var colvalmo=col+2;
    var colnuemon=col+3;

    var moneda=name+"_"+fil+"_"+colmoneda;
    var valmon=name+"_"+fil+"_"+colvalmo;
    var nuevomon=name+"_"+fil+"_"+colnuemon;

   var num4=toFloat(id);
    
    if ($(moneda).value.substring(0,3)!='001')
    {
      var valormoneda = prompt('Tipo de Cambio que aplicara: ',$(valmon).value);
      if (toFloat2(valormoneda)>0)
      {
         var formato=toFloat2(valormoneda);
         $(valmon).value=format(formato.toFixed(6),'.',',','.');
         var cal2=num4/toFloat2(valormoneda);
         $(nuevomon).value=format(cal2.toFixed(2),'.',',','.');
      }
    }else {
        var valormoneda=1;
        $(valmon) .value=format(valormoneda.toFixed(6),'.',',','.');;
        $(id).value=format(num4.toFixed(2),'.',',','.');        
    }
 }
</script>
