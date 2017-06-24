/**
 * Librerías Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */


  function marcarTodos()
  {
     var fil=0;
     var am=obtener_filas_grid('a',1);
      var criterio=$('fcpagos_criterio').value;
      var feccor=$('fcpagos_feccor').value;
      var rifcon =$('fcpagos_rifcon').value;
      var numpag=$('fcpagos_numpag').value;
      var pagcon=$('fcpagos_pagcon').value;
      var montodeuda =$('fcpagos_montodeuda').value;
      var porcentaje= $('fcpagos_porcentaje').value;
      var seleccion= $('fcpagos_seleccion').value;
     while (fil<am)
     {
           var numero="ax"+"_"+fil+"_2";
           if ($(numero).value!=""){
                var id="ax"+"_"+fil+"_1";
                var colum="ax"+"_"+fil+"_14";
                  $(id).checked=true;
                   if($('fcpagos_deudafrac').value =='S'){
                  $(colum).readOnly= false;
                 }

           }
           fil=fil+1;

     }
  var paramsA  = serializeGrid('a','0',1,$('ax_0_1'));
  var paramsC  = serializeGrid('c','0','1',$('cx_0_1'));

   new Ajax.Updater('divgridrecargdescto',getUrlModulo()+'ajaxgrid', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:'gridc='+paramsC+'&grid='+paramsA+'&fcpagos_criterio='+criterio+'&fcpagos_pagcon='+pagcon+'&fcpagos_montodeuda='+montodeuda+'&fcpagos_porcentaje='+porcentaje+'&fcpagos_rifcon='+rifcon+'&fcpagos_feccor='+feccor+'&fcpagos_numpag='+numpag+'&fcpagos_seleccion='+seleccion});

     calcularTotales();
      if($('fcpagos_deudafrac').value =='S'){
      //$("ax"+"_"+0+"_14").focus();
  }

  }
  function desmarcarTodos(){
     var fil=0;
     var am=obtener_filas_grid('a',1);
     while (fil<am)
     {
           var numero="ax"+"_"+fil+"_2";
           var monto="ax"+"_"+fil+"_15";

           if ($(numero).value!=""){
               var colum="ax"+"_"+fil+"_14";
                var id="ax"+"_"+fil+"_1";
                 $(id).checked=false;
                 $(colum).readOnly= true;
                 $(colum).value = $(monto).value
           }
           fil=fil+1;

     }

     calcularTotales();

  }
 function ajustarDescuento(){
       new Ajax.Updater('divgridrecargdescto',getUrlModulo()+'ajax', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:'ajax=5'});

 }

 function calcularTotales()
{
  var total=0;
  var i=0;
  var totalpag=0;
  var saldo=0;var saldo1=0;var saldo2=0;var saldo4=0;
  var am=obtener_filas_grid('a',1);
  var bm=obtener_filas_grid('b',1);
  var cm=obtener_filas_grid('c',1);
  var montos=0; var totalrec=0;
  var totalmd=0; var totalmor=0; var totalaut=0;var totalpro=0; var totalmontopag=0;
  var marpos=0;

  while (i<am)
  {
      var check ="ax_"+i+"_1";
      var moncon="ax_"+i+"_14";
      var montodeuda="ax_"+i+"_9";
      var montomora="ax_"+i+"_11";
      var montoaut="ax_"+i+"_10";
      var montopro="ax_"+i+"_12";
      var montopag="ax_"+i+"_13";
      var sumfue="ax_"+i+"_17";
      var num=toFloat(moncon);
     if($(check).checked){
         if ($(sumfue).value=='S')
         {
             total=total - num;
             totalmd=totalmd-toFloat(montodeuda);
             totalmor=totalmor-toFloat(montomora);
             totalaut=totalaut-toFloat(montoaut);
             totalpro=totalpro-toFloat(montopro);
             totalmontopag=totalmontopag-toFloat(montopag);
         }else {
             total=total + num;
              totalmd=totalmd+toFloat(montodeuda);
              totalmor=totalmor+toFloat(montomora);
              totalaut=totalaut+toFloat(montoaut);
              totalpro=totalpro+toFloat(montopro);
              totalmontopag=totalmontopag+toFloat(montopag);
              marpos=marpos+num;
         }
      
    }
    i++;
  }
  i=0;

  while (i<bm)
  {
      var monpag="bx_"+i+"_6";
      var numpag=toFloat(monpag);

      totalpag=totalpag + numpag;
    i++;
  }
  i=0;

  while (i<cm)
  {
      var monrec="cx_"+i+"_4";
      var numrec=toFloat(monrec);

      totalrec=totalrec + numrec;
    i++;
  }
  $('fcpagos_descuento').value=format(totalrec.toFixed(2),'.',',','.');
  $('fcpagos_saldo3').value=format(total.toFixed(2),'.',',','.');
  $('fcpagos_saldo5').value=format(total.toFixed(2),'.',',','.');
  montos=toFloat('fcpagos_saldo5') + toFloat('fcpagos_recargo') - toFloat('fcpagos_descuento'); //$('fcpagos_saldo5').toFloat()+$('fcpagos_recargo').toFloat()-$('fcpagos_descuento').toFloat();
 
  if (montos<0)
     $('fcpagos_monpag').value=format(marpos.toFixed(2),'.',',','.'); //format(montos.toFixed(2),'.',',','.');
   else
     $('fcpagos_monpag').value=format(montos.toFixed(2),'.',',','.'); //format(montos.toFixed(2),'.',',','.');

  $('fcpagos_totalpag').value=format(montos.toFixed(2),'.',',','.'); 
   saldo =$('fcpagos_monpag').toFloat() -totalpag;
  $('fcpagos_totalmon').value=format(totalpag.toFixed(2),'.',',','.');
  $('fcpagos_saldo').value=format(saldo.toFixed(2),'.',',','.');
  $('fcpagos_montotdeuda').value=format(totalmd.toFixed(2),'.',',','.');
  $('fcpagos_montodeuda').value=format(totalmd.toFixed(2),'.',',','.');
  $('fcpagos_montodeuda2').value='0,0';
  $('fcpagos_montomora').value=format(totalmor.toFixed(2),'.',',','.');
  $('fcpagos_montotmora').value=format(totalmor.toFixed(2),'.',',','.');
  $('fcpagos_montodscprntopago').value=format(totalpro.toFixed(2),'.',',','.');
  $('fcpagos_montotdscprntopago').value=format(totalpro.toFixed(2),'.',',','.');
   saldo1 = totalmd+totalmor-totalpro;
   saldo2=totalmontopag-totalmd;
   saldo4= saldo1-saldo2-total;
   $('fcpagos_saldo2').value=format(saldo2.toFixed(2),'.',',','.');
   $('fcpagos_saldo1').value=format(saldo1.toFixed(2),'.',',','.');
   $('fcpagos_saldo4').value=format(saldo4.toFixed(2),'.',',','.');
   $('fcpagos_montototalpagar').value=format(totalmontopag.toFixed(2),'.',',','.');
   $('fcpagos_pagcon').value=format(total.toFixed(2),'.',',','.');
   var salvalor=$('fcpagos_saldo1').value.substring(0,2);
   if (salvalor=='-0'){
    saldo1=saldo1*-1;
    $('fcpagos_saldo1').value=format(saldo1.toFixed(2),'.',',','.');
    saldo2=saldo2*-1;
    $('fcpagos_saldo2').value=format(saldo2.toFixed(2),'.',',','.');
    saldo4=saldo4*-1;
    $('fcpagos_saldo4').value=format(saldo4.toFixed(2),'.',',','.');
    total=total*-1;
    $('fcpagos_saldo3').value=format(total.toFixed(2),'.',',','.');
    $('fcpagos_saldo5').value=format(total.toFixed(2),'.',',','.');
    $('fcpagos_pagcon').value=format(total.toFixed(2),'.',',','.');
    totalmd=totalmd*-1;
    $('fcpagos_montotdeuda').value=format(totalmd.toFixed(2),'.',',','.');
    $('fcpagos_montodeuda').value=format(totalmd.toFixed(2),'.',',','.');
    totalmor=totalmor*-1;
    $('fcpagos_montomora').value=format(totalmor.toFixed(2),'.',',','.');
    $('fcpagos_montotmora').value=format(totalmor.toFixed(2),'.',',','.');
    totalpro=totalpro*-1;
    $('fcpagos_montodscprntopago').value=format(totalpro.toFixed(2),'.',',','.');
    $('fcpagos_montotdscprntopago').value=format(totalpro.toFixed(2),'.',',','.');
    totalmontopag=totalmontopag*-1;
    $('fcpagos_montototalpagar').value=format(totalmontopag.toFixed(2),'.',',','.');

    if (montos<0){
      marpos=marpos*-1;
     $('fcpagos_monpag').value=format(marpos.toFixed(2),'.',',','.'); //format(montos.toFixed(2),'.',',','.');
     montos=montos*-1;
     $('fcpagos_totalpag').value=format(montos.toFixed(2),'.',',','.'); 
    }
   else{
     montos=montos*-1;
     $('fcpagos_monpag').value=format(montos.toFixed(2),'.',',','.');
     $('fcpagos_totalpag').value=format(montos.toFixed(2),'.',',','.'); 
   }
   saldo=saldo*-1;
   $('fcpagos_saldo').value=format(saldo.toFixed(2),'.',',','.');

   }
   

}
function calcularDescuento(id){
  var i=id.split('_');
  var fila=i[1];
  var col=i[2];

  var paramsA  = serializeGrid('a','0','14',$('ax_0_14'));
  var paramsC  = serializeGrid('c',fila,col,$('cx_'+fila+'_'+col));
  var fecpag=$('fcpagos_fecpag').value;
  var pagcon=$('fcpagos_pagcon').value;
  var montodeuda =$('fcpagos_montodeuda').value;
  var porcentaje= $('fcpagos_porcentaje').value;
  var rifcon =$('fcpagos_rifcon').value;
  var seleccion =$('fcpagos_seleccion').value;
  var feccor=$('fcpagos_feccor').value;
  var numpag=$('fcpagos_numpag').value;
  var dec=$('fcpagos_vienededeclaracion').value;
   new Ajax.Request(getUrlModulo()+'ajaxgrid', {
      asynchronous:true,
      evalScripts:false,
      onComplete:
          function(request, json){
          AjaxJSON(request, json)
       }, parameters:'grida='+paramsA+'&grid='+paramsC+'&fcpagos_fecpag='+fecpag+'&fcpagos_pagcon='+pagcon+'&fcpagos_montodeuda='+montodeuda+'&fcpagos_porcentaje='+porcentaje+'&fcpagos_rifcon='+rifcon+'&fcpagos_seleccion='+seleccion+'&fcpagos_feccor='+feccor+'&fcpagos_numpag='+numpag+'&fcpagos_vienededeclaracion='+dec})
}

function calculardecdes(id){
  var i=id.split('_');
  var fila=i[1];
  var col= i[2];
  var criterio=$('fcpagos_criterio').value;
  var feccor=$('fcpagos_feccor').value;
  var rifcon =$('fcpagos_rifcon').value;
  var numpag=$('fcpagos_numpag').value;
  var pagcon=$('fcpagos_pagcon').value;
  var montodeuda =$('fcpagos_montodeuda').value;
  var porcentaje= $('fcpagos_porcentaje').value;
  var seleccion= $('fcpagos_seleccion').value;

  var paramsA  = serializeGrid('a',fila,col,$('ax_'+fila+'_'+col));
  var paramsC  = serializeGrid('c','0','1',$('cx_0_1'));

   new Ajax.Updater('divgridrecargdescto',getUrlModulo()+'ajaxgrid', {
      asynchronous:true,
      evalScripts:true,
      onComplete:
          function(request, json){
              AjaxJSON(request, json)
          },
      parameters:'gridc='+paramsC+'&grid='+paramsA+'&fcpagos_criterio='+criterio+'&fcpagos_pagcon='+pagcon+'&fcpagos_montodeuda='+montodeuda+'&fcpagos_porcentaje='+porcentaje+'&fcpagos_rifcon='+rifcon+'&fcpagos_feccor='+feccor+'&fcpagos_numpag='+numpag+'&fcpagos_seleccion='+seleccion});

}
function anular()
  {
    var numpag=$('fcpagos_numpag').value;

    window.open(getUrlModulo()+'anular?numpag='+numpag,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=300,resizable=yes,left=400,top=120');
  }
function salvar()
{
  var id= $('id').value;
  var motanu=$('fcpagos_motanu').value;
  var numpag=$('numpag').value;
  var rifcon=$('rifcon').value;
  f=document.sf_admin_edit_form;
  f.action='salvaranu?id='+id+'&numpag='+numpag+'&motanu='+motanu+'&rifcon='+rifcon;
  f.submit();
}

function actualizar()
  {
    var numpag=$('fcpagos_numpag').value;
  if(confirm('Cambiar el Número de Factura puede ocasionar una inconsistencia en los datos y como consecuencia pérdida de los mismos.  Si no está seguro, CANCELE el procedimiento.'))
    window.open(getUrlModulo()+'actualizar?numpag='+numpag,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=300,resizable=yes,left=400,top=120');
  }

function salvaractualizar()
{
  var id= $('id').value;
  var nuevonumpag=$('fcpagos_nuevonumpag').value;
  var numpag=$('numpag').value;
  var rifcon=$('rifcon').value;
  f=document.sf_admin_edit_form;
  f.action='salvaract?id='+id+'&numpag='+numpag+'&nuevonumpag='+nuevonumpag+'&rifcon='+rifcon;
  f.submit();
}
function invalidar(){
    var valor='';
    var numpag=$('fcpagos_numpag').value;
        valor = prompt('Ingrese password para reversar: ','');
   if (valor !=''){
      new Ajax.Request(getUrlModuloAjax(),{asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&password='+valor+'&numpag='+numpag})
   }}
function totalesGeneral(){
  var am=obtener_filas_grid('a',1);
  var bm=obtener_filas_grid('c',1);
  var montodeuda=0;var montocon=0;var montoaut=0;var saldocol=0;
  var totalmd=0; var totalcon=0;var totalmor=0; var totaldesc=0;var totalreca=0;
  var i=0;var montomora=0;var totalaut=0; var saldotmontopagar=0; var montodscprntopago=0;
  var totalgenreca=0;var colum; var totalsaldo=0;
  while (i<am)
  {
      montodeuda="ax_"+i+"_9";
      montomora="ax_"+i+"_11";
      montocon="ax_"+i+"_14";
      montoaut="ax_"+i+"_10";
      saldocol="ax_"+i+"_15";
      var check ="ax_"+i+"_1";
      montodscprntopago="ax_"+i+"_12";
      var num=toFloat(montodeuda);
      var mcon= toFloat(montocon);
      var mmor=toFloat(montomora);
      var mtaut=toFloat(montoaut);
      var mtodesc=toFloat(montodscprntopago);
      var mtosaldo= toFloat(saldocol);
      if($(check).checked){
          totalmd=totalmd + num;
          totalcon=totalcon+mcon;
          totalmor=totalmor+mmor;
          totalaut=totalaut+mtaut;
          totaldesc= totaldesc +mtodesc;
          totalsaldo=totalsaldo+mtosaldo;
  }
    i++;
  }
   i=0;

  while (i<bm)
  {
      var monpag="cx_"+i+"_4";
      var numpag=toFloat(monpag);

      totalreca=totalreca + numpag;
    i++;
  }
   $('fcpagos_montotdeuda').value=format(totalmd.toFixed(2),'.',',','.');
   $('fcpagos_montodeuda').value=format(totalmd.toFixed(2),'.',',','.');
   $('fcpagos_montodeuda2').value=format(totalmd.toFixed(2),'.',',','.');
   $('fcpagos_pagcon').value=format(totalcon.toFixed(2),'.',',','.');
   $('fcpagos_montomora').value=format(totalmor.toFixed(2),'.',',','.');
   $('fcpagos_montodautliq').value='0,0';
   $('fcpagos_montoautliq').value=format(totalaut.toFixed(2),'.',',','.');
   $('fcpagos_montodscprntopago').value=format(totaldesc.toFixed(2),'.',',','.');
   saldotmontopagar= totalmd-totalaut;
   $('fcpagos_saldo2').value=format(saldotmontopagar.toFixed(2),'.',',','.');
   $('fcpagos_saldo3').value=format(totalcon.toFixed(2),'.',',','.');
   $('fcpagos_saldo4').value=format(saldotmontopagar.toFixed(2),'.',',','.');
   $('fcpagos_saldo5').value=format(totalcon.toFixed(2),'.',',','.');
   $('fcpagos_descuento').value=format(totalreca.toFixed(2),'.',',','.');
   totalgenreca=totalcon-totalreca;
   $('fcpagos_totalpag').value=format(totalgenreca.toFixed(2),'.',',','.');
   $('fcpagos_saldogen').value=format(totalsaldo.toFixed(2),'.',',','.');

}
function verificarEliminar(){
  id =$('id').value;
  if (confirm("¿Esta seguro de eliminar?")) {
       window.open(getUrlModulo()+'eliminarreg?id='+id,'...','menubar=no,toolbar=no,scrollbars=yes,width=700,height=300,resizable=yes,left=400,top=120');
  }
  }
  function verificar(){
    var idq=$('id').value;
    var valor=$('fcpagos_password').value;
    f=document.sf_admin_edit_form;
     f.action='delete2?id='+idq+'&password='+valor;
    f.submit();

  }
  function habilitarCampo(id){
   var colum = obtenerColumna(id,'13','+');
   var colum14 = obtenerColumna(id,'12','+');
   if($(id).checked==true){
       
        if($('fcpagos_deudafrac').value =='S'){
            $(colum).readOnly= false;
            //$(colum).focus();
            calcularTotales();
        }else{
             $(colum).readOnly= true;
             $('fcpagos_saldo3').value=$('fcpagos_pagcon').value;
             calculardecdes(id);
             calcularTotales();
        }

      }else{
             $(colum).readOnly= true;
             $(colum).value= $(colum14).toFloat();
             $(colum).valueToFloatVE();
             calculardecdes(id);
             calcularTotales();
        }

  }

