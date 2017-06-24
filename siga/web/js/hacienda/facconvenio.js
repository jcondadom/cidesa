/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


 function distribuirRubros()
  {
  var paramsB  = serializeGrid('b','0','1',$('bx_0_1'));
  var paramsA  = serializeGrid('a','0',1,$('ax_0_1'));
  var rifcon=$('fcconpag_rifcon').value;
  var seleccion=$('fcconpag_seleccion').value;
  var criterio=$('fcconpag_criterio').value;
  var totalcon=$('fcconpag_totalcon').value;
   new Ajax.Updater('divgridrubro',getUrlModulo()+'ajaxgrid', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:'gridb='+paramsB+'&grid='+paramsA+'&fcconpag_rifcon='+rifcon+'&fcconpag_seleccion='+seleccion+'&fcconpag_criterio='+criterio+'&fcconpag_totalcon='+totalcon});

  }
   function actualizarTotales()
  {
    var am=obtener_filas_grid('a',1);
    var bm=obtener_filas_grid('b',1);
    var cm=obtener_filas_grid('c',1);
    var fil=0;var i=0;var totalmonto=0;
    var totalmd=0;var totalmor=0;var totalaut=0;var totalpro=0;var totalmontopag=0;var totalmontopagcon=0;
    var totalsaldo=0;
    var totalmoncuo=0;
    var saldo=0;
     while (fil<am)
     {
      var check ="ax_"+fil+"_1";
      var montodeuda="ax_"+fil+"_9";
      var montoaut="ax_"+fil+"_10";
      var montomora="ax_"+fil+"_11";
      var montopro="ax_"+fil+"_12";
      var montoapag="ax_"+fil+"_13";
      var montopagcon="ax_"+fil+"_14";
      var saldo="ax_"+fil+"_15";
      if (!($(check).checked) && $('fcconpag_id').value==''){

      totalmd=totalmd+toFloat(montodeuda);
      totalmor=totalmor+toFloat(montomora);
      totalaut=totalaut+toFloat(montoaut);
      totalpro=totalpro+toFloat(montopro);
      totalmontopag=totalmontopag+toFloat(montoapag);
      totalmontopagcon=totalmontopagcon+toFloat(montopagcon);
    }else if ($(check).checked && $('fcconpag_id').value==''){

      totalmd=totalmd-toFloat(montodeuda);
      totalmor=totalmor-toFloat(montomora);
      totalaut=totalaut-toFloat(montoaut);
      totalpro=totalpro-toFloat(montopro);
      totalmontopag=totalmontopag-toFloat(montoapag);
      totalmontopagcon=totalmontopagcon-toFloat(montopagcon);
    }
    else  if (($(check).checked)&&($('fcconpag_id').value!='')){

      totalmd=totalmd+toFloat(montodeuda);
      totalmor=totalmor+toFloat(montomora);
      totalaut=totalaut+toFloat(montoaut);
      totalpro=totalpro+toFloat(montopro);
      totalmontopag=totalmontopag+toFloat(montoapag);
      totalmontopagcon=totalmontopagcon+toFloat(montopagcon);
    }


      fil++;
   }
     i=0
     while (i<bm)
     {   var moncuo="bx_"+i+"_4";
         totalmoncuo=totalmoncuo+toFloat(moncuo);
         i++;
     }
     i=0;
      while (i<cm)
     {   var monto="cx_"+i+"_5";
         totalmonto=totalmonto+toFloat(monto);
         i++;
     }

    $('fcconpag_moncon').value=format(totalmd.toFixed(2),'.',',','.');
    $('fcconpag_totalcon').value=format(totalmd.toFixed(2),'.',',','.');    
    $('fcconpag_totalmondec').value=format(totalmd.toFixed(2),'.',',','.');
    $('fcconpag_totalautliq').value=format(totalaut.toFixed(2),'.',',','.');
    $('fcconpag_totalmora').value=format(totalmor.toFixed(2),'.',',','.');
    $('fcconpag_totalprontopg').value=format(totalpro.toFixed(2),'.',',','.');
    $('fcconpag_totalmontopag').value=format(totalmontopag.toFixed(2),'.',',','.');
    $('fcconpag_totalmontopagcon').value=format(totalmontopagcon.toFixed(2),'.',',','.');
    $('fcconpag_tmonfin').value=format(totalmoncuo.toFixed(2),'.',',','.');
    saldo=$('fcconpag_totalcon').toFloat()-$('fcconpag_tmonfin').toFloat();
     $('fcconpag_totalmoncon').value=format(totalmoncuo.toFixed(2),'.',',','.');
  }