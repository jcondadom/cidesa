function CargarCatalogo(id)
{   	 
   	 var valor = $(id).value;
   	// alert('el titulo presupuestario '+valor+' no existe en presupuesto');	   	 
   	 new Ajax.Request('/nomina'+getEnv()+'.php/vacdefgen/ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json) }, parameters:'ajax=1&cod='+valor});
}
