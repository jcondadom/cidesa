/**
 * LibrerÃ­as Javascript
 *
 * @package    Roraima
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */

function ajaxdetalle(e,id)
 {
   var aux = id.split("_");
    var name=aux[0];
    var fil=parseInt(aux[1]);
    var col=parseInt(aux[2]);

    var coldes=2;
    var coluni=3;
    var coldis=4;
    var colcantra=5;
    var descripcion=name+"_"+fil+"_"+coldes;
    var unidad=name+"_"+fil+"_"+coluni;
    var disponibilidad=name+"_"+fil+"_"+coldis;
    var transferir=name+"_"+fil+"_"+colcantra;
    var cod=$(id).value;

    if (e.keyCode==13 || e.keyCode==9)
    {
      if ($(id).value!="")
      {
    	new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=3&cajtexmos='+descripcion+'&cajtexcom='+id+'&unidad='+unidad+'&dispon='+disponibilidad+'&cantransf='+transferir+'&almori='+$('catraalm_almori').value+'&ubiori='+$('catraalm_codubiori').value+'&codigo='+cod})
      }
    }
 }

function validarcantidad(e,id)
{
if (e.keyCode==13 || e.keyCode==9)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);

  var colcandis=4;
  var colcantra=5;


  var cantransf=name+"_"+fil+"_"+colcantra;
  var candispon=name+"_"+fil+"_"+colcandis;

  var numcantransf=toFloat(cantransf);
  var numcandispon=toFloat(candispon);


   if (numcantransf>numcandispon)
   {
       alert("La cantidad a Transferir  no puede ser mayor a la Cantidad Disponible :"+document.getElementById(candispon).value);
       document.getElementById(cantransf).value=document.getElementById(candispon).value;
    }
    else
      entermonto(e,id);
  calculardiferencia(e,id);
}
}

function enter(valor)
 {
     if (valor!='')
     { valor=valor.pad(8, '0',0);}
     else
     {valor=valor.pad(8, '#',0);}

     $('catraalm_codtra').value=valor;

 }
 function Verificarrecepcion(){

     var estatus= $('catraalm_statra').value;
     var cedemp= $('cedemp').value;
     var codalm=$('catraalm_almdes').value;

     if(estatus=='T'){
      new Ajax.Request(getUrlModulo()+'ajax', {asynchronous:true, evalScripts:false, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=6&statra='+estatus+'&cedemp='+cedemp+'&codalm='+codalm})
 }}
  function recepcion(){
      var am=obtener_filas_grid('a',1);
      var fil=0; var fildes; var filrec;
      var acumdes=0; var acumrec=0;
      var  codigo; var estatus; var num1=0; var num2=0;
      var codalm=$('catraalm_almdes').value;
      var codtra=$('catraalm_codtra').value;
      var tiene=true;
       while (fil<am)
     {     codigo="ax"+"_"+fil+"_1";
           fildes="ax"+"_"+fil+"_5";
           filrec="ax"+"_"+fil+"_6";
           filmot="ax"+"_"+fil+"_9";
           if ($(codigo).value!=""){
                acumdes=acumdes+toFloat(fildes);
                acumrec=acumrec+toFloat(filrec);
                num1=toFloat(fildes);
                num2=toFloat(filrec);
                if ($('catraalm_statra').value=='T')
                {
                    if ((num1 !=num2) && $(filmot).value=='')
                    {
                        tiene=false;
                        break;
                    }
                }
           }
           fil=fil+1;

     }
     
     if (tiene) {
     if(acumdes !=acumrec){
         estatus='D';
     }else{
         estatus='R';
     }
     
      new Ajax.Updater('mens', getUrlModuloAjax(), {asynchronous:true, evalScripts:true, onComplete:function(request, json){AjaxJSON(request, json)}, parameters:'ajax=7&codigo='+$('catraalm_codtra').value+'&estatus='+estatus+'&codalm='+codalm+'&codtra='+codtra});
     }else {
        alert('El Articulo '+$(codigo).value+' tiene diferencias entre la Cantidad Despachada y la Recibida Ingrese el Motivo Faltante.');
     }
 }
function calculardiferencia(e,id)
{
if (e.keyCode==13 || e.keyCode==9)
{
  var aux = id.split("_");
  var name=aux[0];
  var fil=aux[1];
  var col=parseInt(aux[2]);
  var cantidad=0;
  
  var colcandisp=5;
  var colcanrec=6;
  var colcandev=7;
  var coldif=8;
  var candispo=name+"_"+fil+"_"+colcandisp;
  var canrecibida=name+"_"+fil+"_"+colcanrec;
  var candif=name+"_"+fil+"_"+coldif;
  var candev=name+"_"+fil+"_"+colcandev;
  var numdispon=toFloat(candispo);
  var numcanrec=toFloat(canrecibida);
  var numcandev=toFloat(candev);
   $(candif).value = format((numdispon -numcanrec).toFixed(2),'.',',','.');

  cantidad= (numcanrec+numcandev)-numdispon;
   if (numcanrec>numdispon)
   {
       alert("La Cantidad Recibida  no puede ser mayor a la Cantidad Despachada :"+document.getElementById(candispo).value);
  
    }else if (cantidad > 0)
   {
       alert("La Suma de Recibida + Devuelta  no puede ser mayor a la Cantidad Despachada :"+document.getElementById(cantidad).value);

    }
    else{
      entermonto(e,id);
  }
 // if(numcanrec==0){
 //      document.getElementById(canrecibida).value=document.getElementById(candispo).value;}
}
}
  function desmarcarTodos(){
     var fil=0;
     var am=obtener_filas_grid('a',1);
     while (fil<am)
     {
           var numero="ax"+"_"+fil+"_1";
             var colcandisp=5;
              var colcanrec=6;
              var colcandev=7;
              var coldif=8;
              var col9=9;
              var col10=10;
              var col11=11;
              var col12=12;

              var candispo="ax"+"_"+fil+"_"+colcandisp;
              var canrecibida="ax"+"_"+fil+"_"+colcanrec;
              var candif="ax"+"_"+fil+"_"+coldif;
              var candev="ax"+"_"+fil+"_"+colcandev;
              var cancol9="ax"+"_"+fil+"_"+col9;
              var cancol10="ax"+"_"+fil+"_"+col10;
              var cancol11="ax"+"_"+fil+"_"+col11;
              var cancol12="ax"+"_"+fil+"_"+col12;
           if ($(numero).value!=""){

                 $(candispo).readOnly= true;
                 $(canrecibida).readOnly= true;
                 $(candif).readOnly= true;
                 $(candev).readOnly= true;
                 $(cancol9).readOnly= true;
                 $(cancol10).readOnly= true;
                 $(cancol11).readOnly= true;
                 $(cancol12).readOnly= true;
           }
           fil=fil+1;

     }


  }