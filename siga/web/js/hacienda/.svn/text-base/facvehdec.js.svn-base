function cargargrid()
{
	new Ajax.Updater('divGrid', '/hacienda.php/facvehdec/grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=2&codigo='+$('fcdeclar_plaveh').value});
//	new Ajax.Updater('divGridDeuda', '/hacienda.php/facvehdec/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&tipnom='+tipnom+'&fecha='+fecha+'&gasto='+gasto+'&divu=2&referencias='+referencias+'&nomespecial='+nomespecial+'&codnomesp='+codnomesp+'&banco='+banco});
}

function verificarRegVehiculo(){
     var nroveh    = $('fcdeclar_numref').value;
     new Ajax.Updater('divgrid', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+nroveh});
}
 function Deuda()
 {

    var fecfin    = $('fcdeclar_fecfin').value;
    var fecini    = $('fcdeclar_fecini').value;
    var fecdec    = $('fcdeclar_fecdec').value;
    var fuente    = $('fcdeclar_fuente').value;
    var numref  = $('fcdeclar_numref').value;
    var anoveh  = $('fcdeclar_anoveh').value;
    var coduso  = $('fcdeclar_coduso').value;
    var valori  = $('fcdeclar_valori').value;

    new Ajax.Updater('divgriddeuda', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&codigo='+numref+'&fecfin='+fecfin+'&fecini='+fecini+'&fecdec='+fecdec+'&fuente='+fuente+'&anoveh='+anoveh+'&coduso='+coduso+'&valori='+valori});

}