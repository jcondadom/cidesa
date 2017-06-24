<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <table width="100%">
  <tr>
    <th>
    <div align="left">
    <p><img src="/images/alerta.png"  ><strong><?php echo __('Recuerde revisar todos los Saldos Anteriores de sus Cuentas, Antes de Ejecutar esta opcion. ') ?></strong></p>
    <p><strong><?php echo __('El Archivo de Saldos por Periodo sera Actualizado y no se permitiran mas modificaciones.') ?></strong></p>
   </div>
  </tr>
</table>

<?php if ($contaba->getId()) {?>
<ul class="sf_admin_actions" >
<li class="float-center">
<input id="actualizar" class="sf_admin_action_save" type="button" value="Abrir" onClick="abrirperiodo()">
</li>
<li class="float-center">
<input id="salir" class="sf_admin_action_cancel" type="button" value="Cerrar" onClick="cerrarPeriodo()">
</li>
</ul>
<?php } ?>

<script language="JavaScript" type="text/javascript">
function abrirperiodo(){
 var etadef='<?php echo $contaba->getEtadef(); ?>';
 if (etadef=='A')
 	alert('La Etapa de Definicion ya esta abierto.');
 else
   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&etadef='+etadef})
}

function cerrarPeriodo(){
  var etadef='<?php echo $contaba->getEtadef(); ?>';
 if (etadef=='C')
 	alert('La Etapa de Definicion ya esta Cerrada.');
 else {
 	if (confirm('Esta seguro que desea cerrar la Etapa de Definicion?'))
    {
       new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&etadef='+etadef})
    }
  }
} 

</script>