<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <table width="100%">
  <tr>
    <th>
    <div align="left">
    <p><img src="/images/alerta.png"  ><strong><?php echo __('Al realizar el Cierre del Período, usted no podrá volver a incluir ni actualizar ningún Registro que Afecten al Presupuesto.') ?></strong></p>
    <p><strong><?php echo __(' Asegurese de que toda su información está completa antes de realizar el Cierre.') ?></strong></p>
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
$('trigger_cppereje_fecdes').hide();
$('trigger_cppereje_fechas').hide();
function abrirperiodo(){
 var status=$('cppereje_cerrado').value;
 if (status=='N')
 	alert_('El Per&iacute;odo ya esta abierto.');
 else
   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&fecdes='+$('cppereje_fecdes').value+'&pereje='+$('cppereje_pereje').value+'&fechas='+$('cppereje_fechas').value+'&codigo='+status})
}

function cerrarPeriodo(){
  var status=$('cppereje_cerrado').value;
 if (status=='C')
 	alert_('El Per&iacute;odo ya esta cerrado.');
 else {
 	if (confirm('Esta seguro que desea cerrar el Periodo?'))
    {
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&fecdes='+$('cppereje_fecdes').value+'&pereje='+$('cppereje_pereje').value+'&fechas='+$('cppereje_fechas').value+'&codigo='+status})
    }
  }
} 

</script>