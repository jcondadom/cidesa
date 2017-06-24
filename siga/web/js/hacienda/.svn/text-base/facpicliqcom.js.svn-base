
function calcularTotales()
{
  var total=0;
  var i=0;
  var am=obtener_filas_grid('b',1);
  while (i<am)
  {
      var moncuo="bx_"+i+"_4";
      var num=toFloat(moncuo);

      total=total + num;
    i++;
  }

  $('fcdeclar_montodcl').value=format(total.toFixed(2),'.',',','.');

  if ($('fcdeclar_modo_E').ckecked==true && total>0)
  {
      var num1=toFloat('fcdeclar_montodcl');
      var num2=toFloat('fcdeclar_montoimp');
      var num3=toFloat('fcdeclar_montoreb');
      var num4=toFloat('fcdeclar_montoexo');

      if (num1!=(num2+num3+num4))
      {
        var dif=(num2+num3+num4)-num1;
        var moncuota="bx_0_4";
        var num5=toFloat(moncuota);
        var calculo=num5+dif;
        $(moncuota).value=format(calculo.toFixed(2),'.',',','.');
        var sumatoria=(num2+num3+num4)
        $('fcdeclar_montodcl').value=format(sumatoria.toFixed(2),'.',',','.');
      }
  }
}

function calcularTotalesSinRedondeo()
{
  var total=0;
  var i=0;
  var am=obtener_filas_grid('b',1);
  while (i<am)
  {
      var moncuo="bx_"+i+"_4";
      var num=toFloat(moncuo);
     if (num!=0)
       total=total + num;
    i++;
  }

  $('fcdeclar_montodcl').value=format(total.toFixed(2),'.',',','.');
}
function Recalcular()
{
    new Ajax.Updater('divgridactcom', '/hacienda'+getEnv()+'.php/facpicliqcom/ajax', {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:Form.serialize(document.getElementById('sf_admin_edit_form'))});
}
function Distribuir(id,valor)
{    var i=id.split('_');
     var fila=i[1];
     var col=i[2];
     var paramsA  = serializeGrid('a',fila,col,$('ax_'+fila+'_'+col));
     var numdec=$('fcdeclar_numdec').value;
     var fecdec=$('fcdeclar_fecdec').value;
     var modo='';
     if($('fcdeclar_modo_D').checked){
         modo='D';
     }else{
         modo='E';
     }
     var fecini=$('fcdeclar_fecini').value;
     var estacion=$('fcdeclar_estacion').value;
     var feccie=$('fcdeclar_feccie').value;
     var nuevo=$('fcdeclar_id').value;
     var anodec=$('fcdeclar_anodec').value;
     var primeravez=$('fcdeclar_primeravez').value;
     ValidarMontoGridv2(valor);
      new Ajax.Updater('divgriddisdeu',getUrlModulo()+'ajaxgrid', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:'grid='+paramsA+'&fcdeclar[numdec]='+numdec+'&fcdeclar[fecdec]='+fecdec+'&fcdeclar[modo]='+modo+'&fcdeclar[fecini]='+fecini+'&fcdeclar[feccie]='+feccie+'&fcdeclar[nuevo]='+nuevo+'&fcdeclar[anodec]='+anodec+'&fcdeclar[primeravez]='+primeravez+'&fcdeclar[estacion]='+estacion});

}

