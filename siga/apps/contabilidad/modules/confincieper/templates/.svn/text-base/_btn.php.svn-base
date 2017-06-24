<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <table width="100%">
  <tr>
    <th>
    <div align="left">
    <p><img src="/images/alerta.png"  ><strong><?php echo __('Al realizar el Cierre del Período, usted no podrá volver a incluir ni actualizar ningún Comprobante del mismo.') ?></strong></p>
    <p><strong><?php echo __('Asegurese de que toda su información está completa antes de realizar el Cierre.') ?></strong></p>
   </div>
  </tr>
</table>

<ul class="sf_admin_actions" >
<li class="float-center">
<input id="actualizar" class="sf_admin_action_save" type="button" value="Abrir" onClick="abrirperiodo()">
</li>
<li class="float-center">
<input id="salir" class="sf_admin_action_cancel" type="button" value="Cerrar" onClick="cerrarPeriodo()">
</li>
</ul>


<script language="JavaScript" type="text/javascript">
$('trigger_contaba1_fecdes').hide();
$('trigger_contaba1_fechas').hide();
function abrirperiodo(){
 var status=$('contaba1_status').value;
 if (status=='A')
 	alert('El periodo ya esta abierto.');
 else
   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&fecdes='+$('contaba1_fecdes').value+'&pereje='+$('contaba1_pereje').value+'&fechas='+$('contaba1_fechas').value+'&codigo='+status})
}

function cerrarPeriodo(){
  var status=$('contaba1_status').value;
 if (status=='C')
 	alert('El periodo ya esta cerrado.');
 else {
 	if (confirm('Esta seguro que desea cerrar el Periodo?'))
    {
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&fecdes='+$('contaba1_fecdes').value+'&pereje='+$('contaba1_pereje').value+'&fechas='+$('contaba1_fechas').value+'&codigo='+status})
    }
  }
} 

</script>