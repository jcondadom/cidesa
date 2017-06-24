<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>

<ul class="sf_admin_actions" >
<li class="float-left">
<input id="trasladar" class="sf_admin_action_list" type="button" value="Trasladar Saldos" onClick="trasladarSaldos()">
</li>
<li class="float-left">
<input id="generar" class="sf_admin_action_list" type="button" value="Generar Comprobantes de Cierre" onClick="GenerarComCie()">
</li>
</ul>

<div id="comp">
</div>


<script language="JavaScript" type="text/javascript">
$('trigger_contaba_fecini').hide();
$('trigger_contaba_feccie').hide();

function trasladarSaldos(){
   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&esqori='+$('contaba_esqori').value+'&esqdes='+$('contaba_esqdes').value})
}

function GenerarComCie(){
  new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&fecini='+$('contaba_fecini').value+'&feccie='+$('contaba_feccie').value})      
} 

function comprobante(formulario)
{
  window.open('/tesoreria'+getEnv()+'.php/confincomgen/edit/?formulario='+formulario,formulario,'menubar=no,toolbar=no,scrollbars=yes,width=1200,height=800,resizable=yes,left=1000,top=80');
}

function generarComprobantes(){
	new Ajax.Updater('comp', getUrlModulo()+'ajaxcomprobante', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});
}

</script>