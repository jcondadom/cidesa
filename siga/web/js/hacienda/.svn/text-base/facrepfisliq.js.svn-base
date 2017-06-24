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




function DistribuirDeclaracion(id)
{ var i=id.split('_');
  var fila=i[1];
  var col=i[2];
  var fuenterep=$('fcrepfis_fuerep').value;
  var fuentesan=$('fcrepfis_fuesan').value;
  var paramsA  = serializeGrid('a',fila,col,$('ax_'+fila+'_'+col));

   new Ajax.Request(getUrlModulo()+'ajaxgrid', {
      asynchronous:true,
      evalScripts:false,
      onComplete:
          function(request, json){
          AjaxJSON(request, json)
       }, parameters:'grid='+paramsA+'&fuenterep='+fuenterep+'&fuentesan='+fuentesan})



 }

  function rellenar(valor)
 {
     if (  $('fcrepfis_numrep').value!='')
     {  $('fcrepfis_numrep').value= $('fcrepfis_numrep').value.pad(15, '0',0);}
     else{ $('fcrepfis_numrep').value= $('fcrepfis_numrep').value.pad(15, '#',0);}


  }
   function CalcularTotales(){
        var monpag=0;var totalpag=0;
        var bm=obtener_filas_grid('b',1);
        var i=0;

          while (i<bm)
          {
              var monpag="bx_"+i+"_5";
              var numpag=toFloat(monpag);

              totalpag=totalpag + numpag;
            i++;
          }

         $('fcrepfis_monrep').value=format(totalpag.toFixed(2),'.',',','.');
   }