<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
     <?
      echo radiobutton_tag('fcconrep[criterio]', 'I', true, array('onClick' => 'Busqueda(this.value)'))."Industría y Comercio".'<br> ';
      echo radiobutton_tag('fcconrep[criterio]', 'V', true, array('onClick' => 'Busqueda(this.value)' ))."Vehiculo           ".'<br> ';
      echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.radiobutton_tag('fcconrep[criterio]', 'U', true, array('onClick' => 'Busqueda(this.value)'))."Inmuebles Urbanos   ".'<br> ';
      echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.radiobutton_tag('fcconrep[criterio]', 'A', true, array('onClick' => 'Busqueda(this.value)'))."Apuestas Licitas    ".'<br> ';
      echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.radiobutton_tag('fcconrep[criterio]', 'G', true, array('onClick' => 'Busqueda(this.value)'))."General             ".'<br> ';
      ?>
 


<script  language="JavaScript" type="text/javascript">
  function Busqueda(valor)
  {

  switch (valor)
  {
   case 'I':
            var nro = prompt('Ingrese el # de Licencia: ','');       
            new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+valor+'&ref='+nro})
            break;
   case 'V':
            var nro = prompt('Ingrese el # de Placa: ','');
            new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+valor+'&ref='+nro})
            
            break;
   case 'U':
            var nro = prompt('Ingrese el # de Registro de Inmueble: ','');
            new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+valor+'&rifcon='+$('fcconrep_rifcon').value+'&ref='+nro})

            break;
   case 'A':
            var nro = prompt('Ingrese el # de Expediente: ','');
            new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+valor+'&ref='+nro})
            break;
   default:
            var nro ='';
           if ($('fcconrep_rifcon').value != '' ) { new Ajax.Updater('divgrid',getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&cajtexmos=fcconrep_nomcon&codigo='+$('fcconrep_rifcon').value+'&fecha='+$('fcconrep_feccon').value}); };
            break;
  }

  }
</script>