/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function mostrarAlmacen(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);

    var codart=name+"_"+fil+"_8";
    var cant=name+"_"+fil+"_10";
    var idfil=name+"_"+fil+"_19";

    if ($(codart).value!="")
    {
        var articulo=$(codart).value;
        var cantidad=$(cant).value;
        idfila=$(idfil).value
        $('capdaoc_actfil').value=fil;

        new Ajax.Updater('divgrid3', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json); distribuirAlmacenes();}, parameters:'ajax=3&articulo='+articulo+'&idreg='+idfila+'&cant='+cantidad})
    }
    else
    {
        alert_("Debe introducir el Art&iacute;culo antes de hacer la Distribuci&oacute;n");
    }
}

 function distribuirAlmacenes()
 {
     var j=$('capdaoc_actfil').value;
     var haydist="ax"+"_"+j+"_18";
     if ($(haydist).value!="")
     {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");
        var z=0;
        while (z<((aux2.length)-1))
        {
         var reg=aux2[z];
         var aux3=reg.split("_");
         var ccodalm=aux3[0];
         var cnomalm=aux3[1];
         var ccodubi=aux3[2];
         var cnomubi=aux3[3];
         var ccandis=aux3[4];
         
         if (!$(codalm))  NuevaFilaGrid('c');

         var codalm="cx"+"_"+z+"_1";
         var nomalm="cx"+"_"+z+"_2";
         var codubi="cx"+"_"+z+"_3";
         var nomubi="cx"+"_"+z+"_4";
         var candis="cx"+"_"+z+"_5";

         $(codalm).value=ccodalm;
         $(nomalm).value=cnomalm;
         $(codubi).value=ccodubi;
         $(nomubi).value=cnomubi;
         $(candis).value=ccandis;         
         z++;
        }
      }
 }
 
function salvarDistribucion()
{
  var cadena='';
  var fil=0;
  var totreg=totalregistros2('cx',1,obtener_filas_grid('c',1));
  while (fil<totreg)
    {
      var codalm="cx"+"_"+fil+"_1";
      var codubi="cx"+"_"+fil+"_3";
      var cant="cx"+"_"+fil+"_5";
      
      var num1=toFloat(cant);
      if ($(codalm).value!="" && $(codubi).value!="" && num1>0)
      {
        var nomalm="cx"+"_"+fil+"_2";
    	var nomubi="cx"+"_"+fil+"_4";
	cadena=cadena + $(codalm).value+'_' + $(nomalm).value+'_' + $(codubi).value +'_'+ $(nomubi).value+'_' + $(cant).value + '!';
      }
      
      fil++;
    }


  var mifila=$('capdaoc_actfil').value;
  var infalmacenes="ax"+"_"+mifila+"_18";

  $(infalmacenes).value=cadena;  
} 
