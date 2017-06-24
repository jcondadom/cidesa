function cargargrid()
{

	new Ajax.Updater('divGridDeuda', '/hacienda'+getEnv()+'.php/facprodec/grid', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=1&codigo='+$('fcdeclar_numref').value+'&rifcon='+$('fcdeclar_rifcon').value+'&tippro='+$('fcdeclar_tippro').value+'&fecdec='+$('fcdeclar_fecdec').value});
}
function totalGeneral(){
     var bm=obtener_filas_grid('b',1);var total=0;
     var i=0; var montodeuda;
      while (i<bm)
  {
       montodeuda="bx_"+i+"_5";
       total=total +toFloat(montodeuda);
       i++;
  }
  $('fcdeclar_totmondec').value=format(total.toFixed(2),'.',',','.');
}