/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function mostrarperiodos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codart=name+"_"+fil+"_1";
    var cadper=name+"_"+fil+"_15";
    var colmon=name+"_"+fil+"_6";

    var categoria=$('forestcoscat_codcat').value;
    var cadena=$(cadper).value;
    var articulo=$(codart).value;

    if (articulo!='')
    {
       new Ajax.Updater('divgridper', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=4&categoria='+categoria+'&articulo='+articulo+'&cadena='+cadena+'&colmon='+colmon+'&filper='+fil});
    }else{
        alert_('Debe Introducir el Art&iacute;culo');
    }
}

function ocultarPeriodos()
{
  var l=0;
  var acumu=0;
  var cadena='';
  while (l<12)
  {
    var per="bx_"+l+"_1";
    var canper="bx_"+l+"_2";

    var num1=toFloat(canper);

    cadena=cadena + $(per).value+'_' + $(canper).value + '!';

    acumu=acumu + num1;
    l++;
  }

  var canart="ax_"+$('forestcoscat_filper').value+"_6";
  var cadper="ax_"+$('forestcoscat_filper').value+"_15";
  var monart="ax_"+$('forestcoscat_filper').value+"_8";
  var totpre="ax_"+$('forestcoscat_filper').value+"_9";

  var num2=toFloat(monart);
  var cal=acumu*num2;

  $(canart).value=format(acumu.toFixed(2),'.',',','.');
  $(cadper).value=cadena;
  $(totpre).value=format(cal.toFixed(2),'.',',','.');

   $('divgridper').hide();
   $('divgrid').show();
}


function mostrarfinanciamientos(id)
{
    var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var codart=name+"_"+fil+"_1";
    var cadfin=name+"_"+fil+"_16";
    var colmon=name+"_"+fil+"_6";

    var categoria=$('forestcoscat_codcat').value;
    var cadena=$(cadfin).value;
    var articulo=$(codart).value;

    if (articulo!='')
    {
       new Ajax.Updater('divgridfue', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=5&categoria='+categoria+'&cadena='+cadena+'&colmon='+colmon+'&filfin='+fil+'&articulo='+articulo});
    }else{
        alert_('Debe Introducir el Art&iacute;culo ');
    }
}

function totalfinanciamiento()
{
  var filas=parseInt($('forestcoscat_totfil').value);
  var l=0;
  var acum=0;
  while (l<filas)
  {
      var monfin="cx_"+l+"_3";

      var num1=toFloat(monfin);
      acum=acum+ num1;
      l++;
  }

  return acum;
}

function ocultarFuentes()
{
    var filafin=parseInt($('forestcoscat_filfin').value);

    var montopre=toFloat("ax_"+filafin+"_9");
    var montofin=totalfinanciamiento();

    var codfin="ax_"+$('forestcoscat_filfin').value+"_10";
    var nomext="ax_"+$('forestcoscat_filfin').value+"_11";
    var cadfin="ax_"+$('forestcoscat_filfin').value+"_16";

      var filas=parseInt($('forestcoscat_totfil').value);
      var l=0;
      var cuantos=0;
      var cadena='';
      while (l<filas)
      {
          var codparing="cx_"+l+"_1";
          var nomexting="cx_"+l+"_2";
          var monfin="cx_"+l+"_3";

          var num1=toFloat(monfin);
          if (num1!=0)
          {
            cuantos++;
            $(codfin).value=$(codparing).value;
            $(nomext).value=$(nomexting).value;
          }

          cadena=cadena + $(codparing).value+'_' + $(nomexting).value +'_' + $(monfin).value + '!';
          l++;
      }

      $(cadfin).value=cadena;
      if (cuantos>1)
      {
          $(codfin).value="Mixtos";
          $(nomext).value="Diversos";
      }

       $('divgridfue').hide();
       $('divgrid').show();
}

function validarDisponibilidad(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fil=parseInt(aux[1]);
   var col=parseInt(aux[2]);

   var idcodfin=name+"_"+fil+"_1";
   var idmonfin=name+"_"+fil+"_3";

   var filafin=$('forestcoscat_filfin').value;
   var montopre=toFloat("ax_"+filafin+"_9");
   var totfin=totalfinanciamiento();
   var monfin=toFloat(idmonfin);
   var codfin=$(idcodfin).value;

   new Ajax.Request(getUrlModuloAjax(), {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&montopre='+montopre+'&totfin='+totfin+'&monfin='+monfin+'&codfin='+codfin+'&codigo='+id})

}

function validararticulorepetida(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var coldes= col + 1;
   var coluni= col + 2;
   var colpar= col + 3;
   var colnom= col + 4;
   var colmon= col + 8;
   var descripcion=name+"_"+fila+"_"+coldes;
   var unidad=name+"_"+fila+"_"+coluni;
   var part=name+"_"+fila+"_"+colpar;
   var nompar=name+"_"+fila+"_"+colnom;
   var mont=name+"_"+fila+"_"+colmon;

   if (articulo_repetida(id))
   {
      alert_('El Articulo ya se encuentra Asociado a esa Actividad');
      $(id).value="";
      $(descripcion).value="";
      $(unidad).value="";
      $(part).value="";
      $(nompar).value="";
      $(mont).value="0,00";
      $(id).focus();
   }

}

 function articulo_repetida(id)
 {
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   var act=name+"_"+fila+"_1";

   var compara=$(act).value+""+$(id).value;

   var articulorepetido=false;
   var am=obtener_filas_grid('a',1);
   var i=0;
   while (i<am)
   {
    var codigo="ax"+"_"+i+"_1";

    var compara2=$(codigo).value;

    if (i!=fila)
    {
      if (compara==compara2)
      {
        articulorepetido=true;
        break;
      }
    }
   i++;
   }
   return articulorepetido;
 }

function Calcular(id)
{
   var aux = id.split("_");
   var name=aux[0];
   var fila=aux[1];
   var col=parseInt(aux[2]);

   if (col==10)
   {
     if ($(id).value=='A')
     {
       var colcant= col - 1;
       var colult= col + 10;
       var colrel= col + 11;
       var colmon= col + 1;
       var coltot= col + 2;
       var cantart=name+"_"+fila+"_"+colcant;
       var costou=name+"_"+fila+"_"+colult;
       var relac=name+"_"+fila+"_"+colrel;
       var monp=name+"_"+fila+"_"+colmon;
       var totp=name+"_"+fila+"_"+coltot;

       var num4=toFloat(costou);
       var num5=toFloat(relac);
       var num6=toFloat(cantart);

       cosunit=num4/num5;
       
       calculo= num6*cosunit;
       
       $(monp).value=format(cosunit.toFixed(2),'.',',','.');
       $(totp).value=format(calculo.toFixed(2),'.',',','.');
     }
   }else {        
   var colcant= col - 2;
   var coltot= col + 1;
   var cantart=name+"_"+fila+"_"+colcant;
   var totalpre=name+"_"+fila+"_"+coltot;

   var num1=toFloat(cantart);
   var num2=toFloat(id);

   var cal=num1*num2;

   $(totalpre).value=format(cal.toFixed(2),'.',',','.');
}
}