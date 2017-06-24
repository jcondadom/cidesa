<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
 <table width="100%">
  <tr>
    <th>
    <div align="left">
    <p><img src="/images/alerta.png"  ><strong><?php echo __('Recuerde que al Cerrar la Etapa de Definicion no podra modificar la Asignacion Inicial de los Titulos Presupuestarios.') ?></strong></p>
    <p><strong><?php echo __('Asegurese de que toda su información está completa antes de realizar el Cierre.') ?></strong></p>
   </div>
  </tr>
</table>

<?php if ($cpdefniv->getId()) {?>
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
 var etadef='<?php echo $cpdefniv->getEtadef(); ?>';
 if (etadef=='A')
 	alert('La Etapa de Definicion ya esta abierto.');
 else
   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&etadef='+etadef})
}

function cerrarPeriodo(){
  var etadef='<?php echo $cpdefniv->getEtadef(); ?>';
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