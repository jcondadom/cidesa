<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <table width="100%">
  <tr>
    <th>
    <div align="left">
    <p><img src="/images/alerta.png"  ><strong><?php echo __('Al realizar el Cierre del Banco, usted no podrá Registrar ningún Movimiento Bancario.') ?></strong></p>
    <p><strong><?php echo __('Asegúrese de que toda su información está registrada antes de realizar el Cierre.') ?></strong></p>
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
function abrirperiodo(){
   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&fecdes='+$('tsciebanfec_fecdes').value+'&banco='+$('tsciebanfec_numcue').value+'&fechas='+$('tsciebanfec_fechas').value+'&codigo=A'})
}

function cerrarPeriodo(){
 	if (confirm('Esta seguro que desea cerrar el Banco?'))
  {
     new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&fecdes='+$('tsciebanfec_fecdes').value+'&banco='+$('tsciebanfec_numcue').value+'&fechas='+$('tsciebanfec_fechas').value+'&codigo=C'})
  }  
} 

</script>