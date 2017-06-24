<?php echo select_tag('opdefemp[tiptra]', options_for_select(array('1' => 'Requisición de Compra', '2' => 'Orden de Compra', '3' => 'Cálculo de Viáticos', '4' => 'Compromiso', '5' => 'Orden de Pago', '6' => 'Pago Electrónico', '7' => 'Cheque'),$opdefemp->getTiptra(),'include_custom=Seleccione uno ...'),array('onChange' => "mostrarFiltros(this.id)")) ?>

<script type="text/javascript">
function mostrarFiltros(id){
	if ($(id).value=='7'){
		$('divnumref').show();
		$('divnumcue').show();
		$('divtipmov').show();
	}else {
		$('divnumref').show();
		$('divnumcue').hide();
		$('divtipmov').hide();
	}
}

function  cargarDatosRequi(reqart){
	var tiptra=$('opdefemp_tiptra').value;
   new Ajax.Updater('divgrid1', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&tiptra='+tiptra+'&reqart='+reqart});
}

function cargarDatosOC(reqart){
  var tiptra=$('opdefemp_tiptra').value;
   new Ajax.Updater('divgrid2', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&tiptra='+tiptra+'&reqart='+reqart});
}


function cargarDatosCOM(reqart){
var tiptra=$('opdefemp_tiptra').value;
   new Ajax.Updater('divgrid4', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&tiptra='+tiptra+'&reqart='+reqart});
}

function cargarDatosOP(reqart) {
var tiptra=$('opdefemp_tiptra').value;
   new Ajax.Updater('divgrid5', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&tiptra='+tiptra+'&reqart='+reqart});
}

function cargarDatosPagos(reqart){
	var tiptra=$('opdefemp_tiptra').value;
	var numcue=$('opdefemp_numcue').value;
	var tipmov=$('opdefemp_tipmov').value;
   new Ajax.Updater('divgrid6', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&tiptra='+tiptra+'&reqart='+reqart});
   new Ajax.Updater('divgrid7', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&tiptra='+tiptra+'&numcue='+numcue+'&tipmov='+tipmov+'&reqart='+reqart});
}

function cargarDatosPagEle(reqart){
   var tiptra=$('opdefemp_tiptra').value;
   new Ajax.Updater('divgrid6', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&tiptra='+tiptra+'&reqart='+reqart});

}

function cargarDatosChe(reqart){
	var tiptra=$('opdefemp_tiptra').value;
	var numcue=$('opdefemp_numcue').value;
	var tipmov=$('opdefemp_tipmov').value;
   new Ajax.Updater('divgrid7', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&tiptra='+tiptra+'&numcue='+numcue+'&tipmov='+tipmov+'&reqart='+reqart});
}

function cargarDatosCheOP(reqart){
	var tiptra=$('opdefemp_tiptra').value;
	var numcue=$('opdefemp_numcue').value;
	var tipmov=$('opdefemp_tipmov').value;
   new Ajax.Updater('divgrid5', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&tiptra='+tiptra+'&numcue='+numcue+'&tipmov='+tipmov+'&reqart='+reqart});
}

function cargarDatosCalvia(reqart){
var tiptra=$('opdefemp_tiptra').value;
   new Ajax.Updater('divgrid3', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&tiptra='+tiptra+'&reqart='+reqart});
}


</script>