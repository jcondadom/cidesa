/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('caordcom_ordcom').value=valor;
     
     if ($('caordcom_ordcomdesh').value=='S')
     {
     	$('caordcom_ordcom').readOnly=true;
     }
 }


  function inizializo_descuentos()
  {
    var f=0;
    var am=obtener_filas_grid('a',2);
    while (f < am)
    {
      var id_desc="ax_"+f+"_14";
      cero=0;
      if ($(id_desc))
        $(id_desc).value=format(cero.toFixed(2),'.',',','.');

      f++;
    }
    }

  function Anular_orden()
  {
    var motivo='Motivo de la Anulación';
    var fecha= $('caordcom_fecord').value;
      if(confirm('¿Esta Seguro de anular la Orden de Compra?'))
      {
        var valor = prompt('Desea Anular la Orden con fecha: '+$('caordcom_fecord').value+' de Código:',motivo);
        if ($('caordcom_fechaanuserv').value!='S') fecha = prompt('Desea Anular Orden con fecha:',fecha);
          if (valor!=null)
          {
            if ($('caordcom_fechaanuserv').value!='S') {
            if (fecha!=null)
            {
              if (Validar_fecha(fecha))
              {
                new Ajax.Updater('anul', getUrlModulo()+'/salvaranu', {asynchronous:true, evalScripts:true, parameters:'ajax=1&valor='+valor+'&fecha='+fecha+'&ordcom='+$('caordcom_ordcom').value+'&fecord='+$('caordcom_fecord').value+'&fecserv='+$('caordcom_fechaanuserv').value});
              }
              else
              {
                alert_('Fecha de Anulaci&oacute;n Inv&aacute;lida');
              }
          }
          }else {
              new Ajax.Updater('anul', getUrlModulo()+'/salvaranu', {asynchronous:true, evalScripts:true, parameters:'ajax=1&valor='+valor+'&fecha='+fecha+'&ordcom='+$('caordcom_ordcom').value+'&fecord='+$('caordcom_fecord').value+'&fecserv='+$('caordcom_fechaanuserv').value});
          }
        }
      }
  }

  function generarDetalle()
  {
    var f=0;
    var cadena="";
    var am=obtener_filas_grid('g',2);
    while (f < am)
    {
      var id_check="gx_"+f+"_1";
      var id_refsol="gx_"+f+"_2";

      if ($(id_check)){
          refsol=$(id_refsol).value;
         if ($(id_check).checked==true)
         {
             cadena=cadena + refsol + '_';
         }
      }    
      f++;
    }

    new Ajax.Updater('divgrid', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=12&fecord='+$('caordcom_fecord').value+'&rifpro='+$('caordcom_rifpro').value+'&codigo='+cadena});
  }

function generarResumen()
{
  paramsA  = serializeGrid('a','0','2',$('ax_0_2'));
  paramsB  = serializeGrid('d','0','1',$('dx_0_1'));
  params = '&ajax=13&'+paramsA+'&'+paramsB;

  new Ajax.Updater('divgridres', getUrlModuloAjax(), {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:params
      });
}

function generarResumenPartidas()
{
  paramsA  = serializeGrid('a','0','2',$('ax_0_2'));
  params = '&ajax=14&'+paramsA;

  new Ajax.Updater('divgridrespar', getUrlModuloAjax(), {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:params
      });
}

function generarEntregas()
{
  paramsA  = serializeGrid('a','0','2',$('ax_0_2'));
  paramsB  = serializeGrid('b','0','1',$('bx_0_1'));
  params = '&ajax=15&'+paramsA+'&'+paramsB;

  new Ajax.Updater('divgridfecent', getUrlModuloAjax(), {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:params
      });
}

function mostrargridrecargos(id)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=parseInt(aux[1]);
  var col=parseInt(aux[2]);


  var codart=name+"_"+fil+"_2";
  var coduni=name+"_"+fil+"_6";
  var chk=name+"_"+fil+"_1";
  var refsol=name+"_"+fil+"_19";
  if ($(chk).checked==true)
  {
    if ($(codart).value!="")
    {
      if ($('caordcom_ordcom').value=='########') var ordcom=''; else var ordcom=$('caordcom_ordcom').value;
      var refsol=$(refsol).value;
      if ($('id').value!='') var nuevo="N"; else var nuevo="S";

      var articulo=$(codart).value;
      var codunidad=$(coduni).value;

      var canord=name+"_"+fil+"_8";
      var canaju=name+"_"+fil+"_9";
      var canrec=name+"_"+fil+"_10";
      var candes=name+"_"+fil+"_14";
      var costos=name+"_"+fil+"_12";

      var valcanord=toFloat(canord);
      var valcanaju=toFloat(canaju);
      var valcanrec=toFloat(canrec);
      var valcandes=toFloat(candes);
      var valcostos=toFloat(costos);

      var cantot=valcanord-valcanaju-valcanrec;
      var calculo= (cantot*valcostos)-valcandes;
      $('caordcom_totartsinrec').value=format(calculo.toFixed(2),'.',',','.');
      $('caordcom_actualfila').value=fil;
      var tipcom=$('caordcom_doccom').value;

      new Ajax.Updater('divgridrec', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json);distribuirRecargosenGrid(); Total_grid_recargos();$("divbotrecargos").hide();}, parameters:'ajax=20&articulo='+articulo+'&refsol='+refsol+'&coduni='+codunidad+'&ordcom='+ordcom+'&tipcom='+tipcom+'&nuevo='+nuevo})
    }
    else
    {
      alert_("Debe introducir el Art&iacute;culo antes de los cargar los Recargos..");
    }
  }
  else
  {
    alert("Debe marcar la primera casilla (Marque) antes de cargar los Recargos..");
  }
}

function distribuirRecargosenGrid()
{
  var j=$('caordcom_actualfila').value;
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
      var ccodrgo=aux3[0];
      var cdesrgo=aux3[1];
      var cmonrgoc=aux3[2];
      var ctiprgo=aux3[3];
      var cmonrgo=aux3[4];
      var ccodpar=aux3[5];


      var codrgo="dx"+"_"+z+"_1";
      var desrgo="dx"+"_"+z+"_2";
      var monrgoc="dx"+"_"+z+"_3";
      var tiprgo="dx"+"_"+z+"_4";
      var monrgo="dx"+"_"+z+"_5";
      var codpar="dx"+"_"+z+"_6";


      $(codrgo).value=ccodrgo;
      $(desrgo).value=cdesrgo;
      $(monrgoc).value=cmonrgoc;
      $(tiprgo).value=ctiprgo;
      $(monrgo).value=cmonrgo;
      $(codpar).value=ccodpar;
      //si el tipo de recargo es puntual "M" y el valor es cero (0), entonces se debe habilitar la cajita de texto del monto para que el usuario
      //pueda modificar el monto del recargo
      var monto_monrgo=toFloat2(aux3[2]);
      if (ctiprgo=="M" && monto_monrgo==0)
      {
        //$(monrgo).readOnly=false;
      }
      z++;
    }
  }
}

function Total_grid_recargos()
{
  i=0;
  monto_total_grid_recargo=0;
  var am=obtener_filas_grid('d',1);
  while (i < am)
  {
    var fila_monto_recargo_total = "dx_"+i+"_5";
    monto_recargo=0;
    if  ($(fila_monto_recargo_total)){
      var monto_recargo=toFloat(fila_monto_recargo_total);

      monto_total_grid_recargo = monto_total_grid_recargo + monto_recargo;
    }

    i++;
  }
  $('caordcom_totrecar').value=format(monto_total_grid_recargo.toFixed(4),'.',',','.');
}

function salvarmontorecargos()
{
  var cadena='';
  var fil=0;
  var am=obtener_filas_grid('d',1);
  while (fil<am)
  {
    var codrgo="dx"+"_"+fil+"_1";
    if ($(codrgo))
    {
      if ($(codrgo).value!="")
      {
        var desrgo="dx"+"_"+fil+"_2";
        var monrgoc="dx"+"_"+fil+"_3";
        var tiprgo="dx"+"_"+fil+"_4";
        var monrgo="dx"+"_"+fil+"_5";
        var codpar="dx"+"_"+fil+"_6";
        var cadena=cadena + $(codrgo).value+'_' + $(desrgo).value+'_' + $(monrgoc).value +'_'+ $(tiprgo).value+'_' + $(monrgo).value +'_' + $(codpar).value + '!';
      } else {fil=am;}
    }else {fil=am;}
    fil++;
  }


  var mifila=$('caordcom_actualfila').value;
  var infrecargos="ax"+"_"+mifila+"_18";
  var canord="ax"+"_"+mifila+"_8";
  var canaju="ax"+"_"+mifila+"_9";
  var canrec="ax"+"_"+mifila+"_10";
  var costos="ax"+"_"+mifila+"_12";
  var descto="ax"+"_"+mifila+"_14";
  var recargo="ax"+"_"+mifila+"_15";
  var total="ax"+"_"+mifila+"_16";
  var reqart="ax"+"_"+mifila+"_19";


  $(infrecargos).value=cadena;
  $(recargo).value=$('caordcom_totrecar').value;

  var recfil=toFloat('caordcom_totrecar');
  var valcanord=toFloat(canord);
  var valcanaju=toFloat(canaju);
  var valcanrec=toFloat(canrec);
  var moncos=toFloat(costos);

  var cantot=valcanord-valcanaju-valcanrec;
  var mondto=toFloat(descto);
  var monnet= cantot*moncos;

  montottot=monnet-mondto+recfil;
  $(total).value=format(montottot.toFixed(6),'.',',','.');

  $('divgridrec').hide();
  if ($(reqart).value=='')  $("divbotrecargos").show();
  ActualizarSaldosGrid("a",ArrTotales_a);
  total_completo();

}

function total_completo()
{
  i=0;
  total_cantidad_por_monto=0;
  total_cantidad_costo=0;
  total_rec=0;
  var am=obtener_filas_grid('a',2);
  while (i <am)
  {
    col_fila_art_1 = "ax_"+i+"_2";
    col_fila_art_2 = "ax_"+(i+1)+"_2";
    if ($(col_fila_art_1)) {

    var fila_cantidad = "ax_"+i+"_8";
    var fila_costo = "ax_"+i+"_12";
    var fila_cancost = "ax_"+i+"_11";
    var fila_descuento = "ax_"+i+"_14";
    var fila_recargo = "ax_"+i+"_15";
    var fila_total_monto_por_cantidad = "ax_"+i+"_16";

    var cantidad_art_total=toFloat(fila_cantidad);
    var costo_art_total=toFloat(fila_costo);
    var descuento_art_total=toFloat(fila_descuento);
    var recargo_art_total=toFloat(fila_recargo);
    total_rec= total_rec + recargo_art_total;
    total_cantidad_costo= total_cantidad_costo + (cantidad_art_total*costo_art_total);
    total_cantidad_por_monto = total_cantidad_por_monto + (cantidad_art_total*costo_art_total)+recargo_art_total-descuento_art_total;
  }
    i++;
  }
  $('caordcom_monord').value=format(total_cantidad_por_monto.toFixed(2),'.',',','.');
  $('caordcom_totorden').value=format(total_cantidad_costo.toFixed(6),'.',',','.');
  $('caordcom_totrecargo').value=format(total_rec.toFixed(4),'.',',','.');
}

function recalcularecargos2(id)
{

    var i=id.split('_');
    var fil=i[1];
    var id1="ax"+"_"+fil+"_1";
    var canord="ax"+"_"+fil+"_8";
    var canaju="ax"+"_"+fil+"_9";
    var canrec="ax"+"_"+fil+"_10";
    var cost="ax"+"_"+fil+"_12";
    var dest="ax"+"_"+fil+"_14";
    var recargo="ax"+"_"+fil+"_15";
    var total="ax"+"_"+fil+"_16";
    var infrecargos="ax"+"_"+fil+"_18";

    var valcanord=toFloat(canord);
    var valcanaju=toFloat(canaju);
    var valcanrec=toFloat(canrec);
    var moncos=toFloat(cost);
    var mondto=toFloat(dest);

    var cantot=valcanord-valcanaju-valcanrec;
    var monuni=moncos*cantot;

    var monrgotot=0;
    var cadena="";

    if ($(id1).checked==true)
    {
      var haydist="ax"+"_"+fil+"_18";
      if ($(haydist).value!="")
      {
        var distrib=$(haydist).value;
        var aux2=distrib.split("!");
        var z=0;
        while (z<((aux2.length)-1))
        {
          var reg=aux2[z];
          var aux3=reg.split("_");
          var ccodrgo=aux3[0];
          var cdesrgo=aux3[1];
          var cmonrgotab=toFloat2(aux3[2]);
          var ctiprgo=aux3[3];
          var cmonrgo=toFloat2(aux3[4]);
          var ccodpar=aux3[5];

          if (ctiprgo=='M')
          {
            cmonrgo=cmonrgotab;
          }
          else if (ctiprgo=='P')
          {
            cmonrgo= ((monuni*cmonrgotab)/100);
          }
          else
          {cmonrgo=0;}

          cmonrgotabfor=format(cmonrgotab.toFixed(2),'.',',','.');
          cmonrgofor=format(cmonrgo.toFixed(4),'.',',','.');
          cadena=cadena + ccodrgo+'_' + cdesrgo+'_' + cmonrgotabfor +'_'+ ctiprgo +'_' + cmonrgofor +'_' + ccodpar + '!';
          monrgotot=monrgotot+cmonrgo;
          z++;
        }//while
        $(infrecargos).value=cadena;
        $(recargo).value=format(monrgotot.toFixed(4),'.',',','.');
        var monrgototcaj=toFloat(recargo);
        montottot=monuni-mondto+monrgototcaj;
        $(total).value=format(montottot.toFixed(6),'.',',','.');

      }//  if ($(haydist).value!="")
    }//if ($(id1).checked==true)
    ActualizarSaldosGrid('a', ArrTotales_a);
    total_completo();  
}